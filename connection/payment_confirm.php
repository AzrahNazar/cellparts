<?php 
include '../db/db.php';
session_start();

require("../PHPMailer/class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP(); // set mailer to use SMTP
$mail->Host = "cellparts.lk";  // specify main and backup server
$mail->SMTPAuth = true;     // turn on SMTP authentication
$mail->Username = "info@cellparts.lk";  // SMTP username
$mail->Password = 'Info@3212'; // SMTP password
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

if (isset($_SESSION['user']) || isset($_SESSION['gest_user'])) {
	
	if (isset($_SESSION['user'])) {
		$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');
		$sqlu = "SELECT id FROM cust WHERE usern='$log'";
		$resultu = mysqli_fetch_assoc(mysqli_query($conn, $sqlu));
		$user_id = $resultu['id'];
		
		$whr = 'User_ID';
	
	} else if (isset($_SESSION['temp_user'])) {
		$user_id = htmlspecialchars(strip_tags(trim($_SESSION['temp_user'])), ENT_QUOTES, 'UTF-8');
		$whr = 'tmp_id';
	}

	$sql = mysqli_query($conn, "SELECT inv_id, order_id, SUM(price*Qty) AS tot FROM live_cart WHERE $whr='$user_id' AND flag!='0' GROUP BY $whr");
	if(mysqli_num_rows($sql) == 1) {
		
		$row = mysqli_fetch_assoc($sql);
		$inv_id = $row['inv_id'];
		$order_id = $row['order_id'];
		$tot = $row['tot'];

		date_default_timezone_set('Asia/Colombo');
		$date = date('Y-m-d');
		$datetime = date('Y-m-d H:i:s');

		/****************************** Payment Verify **********************************/
		
		$sqlu = "SELECT * FROM order_details_temp WHERE User_ID='$user_id' AND inv_id='$inv_id'";
		$resultu = mysqli_query($conn, $sqlu);
		$countu = mysqli_num_rows($resultu);
		
		if($countu > 0) {
			if (array_key_exists('payment_confirm', $_POST)) {
				$del_type = htmlspecialchars(strip_tags(trim($_POST['del_type'])), ENT_QUOTES, 'UTF-8');
				$packaging = htmlspecialchars(strip_tags(trim($_POST['packaging'])), ENT_QUOTES, 'UTF-8');
				$del_fee = htmlspecialchars(strip_tags(trim($_POST['del_fee'])), ENT_QUOTES, 'UTF-8');
				$additional_details = htmlspecialchars(strip_tags(trim($_POST['additional_details'])), ENT_QUOTES, 'UTF-8');
				
				if($del_type == '1') { // Courier

					$del_fee = $del_fee; 
				
				} else if($del_type == '2') { // Postal
					$del_fee = 100;
				
				} else {
					$del_fee = 0;
				}

				$g_tot = ($tot + $del_fee + $packaging);
				
				$sql_t = "INSERT INTO order_details (inv_id, User_ID, fname, lname, Tel_no, Mob_no, email, address, town, zip, status, guest, date, order_date, pay_method, g_total, delivery_type, additional_details) SELECT inv_id, User_ID, fname, lname, Tel_no, Mob_no, email, address, town, zip, status, guest, date, '$datetime', 2, '$g_tot', '$del_type', '$additional_details' FROM order_details_temp WHERE User_ID='$user_id' AND inv_id='$inv_id' LIMIT 1";
						
				if(mysqli_query($conn, $sql_t)) {
					mysqli_query($conn, "DELETE FROM order_details_temp WHERE User_ID='$user_id' AND inv_id='$inv_id'");
					
					$sqlc = "INSERT INTO cart_details (User_ID, Item_Code, name, img, Qty, price, order_id, inv_id, order_date, tmp_id, status, flag) SELECT User_ID, Item_Code, name, img, Qty, price, order_id, inv_id, order_date, tmp_id, status, flag FROM live_cart WHERE $whr='$user_id' AND inv_id='$inv_id'";
					
					if(mysqli_query($conn, $sqlc)) {
						mysqli_query($conn, "DELETE FROM live_cart WHERE $whr = '$user_id' AND inv_id='$inv_id'");
						
						if (isset($_SESSION['user'])) {
							$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');
							$sql_usr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT order_id FROM cust WHERE usern='$log'"));
							$new_oid = $sql_usr['order_id'] + 1;
							mysqli_query($conn, "UPDATE cust SET order_id=$new_oid WHERE usern='$log'");
						
						} else if (isset($_SESSION['temp_user'])) {
							unset($_SESSION['temp_user']);
							unset($_SESSION['gest_user']);
						}
					}
					
					/******************* Customer Email ********************/
	
					  $sql_ordr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM order_details WHERE inv_id='$inv_id'"));
					  
					  if($sql_ordr['pay_method'] == 1) {
						$pay_type = 'Credit/Debit Card';
					  
					  } else if($sql_ordr['pay_method'] == 2) {
						  $pay_type = 'Bank Transfer/Bank Deposits';
					  }
					  
					  if($sql_ordr['delivery_type'] == 1) {
						$del_type = 'Courier Service';
						$del_fee = $del_fee;
					  
					  } else if($sql_ordr['delivery_type'] == 2) {
						$del_type = 'Register Post (Very Small Item)';
						$del_fee = 100;
					  
					  } else if($sql_ordr['delivery_type'] == 3) {
						$del_type = 'Pay by Customer';
						$del_fee = 0;
					  
					  } else {
						$del_type = '';
						$del_fee = 0;
					  }
						
						$message = '<!DOCTYPE html>
					<html><head><title></title><style>body {font-family: sans-serif;} .table .table-bordered{border: 1px solid #ccc;} table {border-collapse: collapse;}.table-bordered th, .table-bordered td {border: 1px solid #ccc;padding:10px;} </style>
					</head><body>
					<p>Dear Mr/Mrs '.$sql_ordr['fname'].',<br>Thank you for your order. Your order has been received and will be processed once payment has been confirmed.</p><p>You can track your order status below.</p>
					<p align="right"><img src="https://cellparts.lk/img/logo.png" style = "margin : 20px 0 10px 0;" width="250"></p>
					<table width="100%" border="1">
					<tr>
					<th scope="col"><p style="margin:10px"><strong>Order Confirmation</strong></p></th>
					</tr>
					</table>
					<br>
					<table style = "width: 100%;margin-top: 20px;" border="0">
					<tr><td style = "width: 20%;"><b>Order ID:</b> </td><td>'.$inv_id.'</td></tr>
					<tr><td><b>Order Date:</b> </td><td>'.$sql_ordr['order_date'].'</td></tr>
					<tr><td><b>Total Amount:</b> </td><td>Rs. '.$sql_ordr['g_total'].'</td></tr>
					<tr><td><b>Payment Method:</b> </td><td>'.$pay_type.'</td></tr>
					<tr><td><b>Delivery Method:</b> </td><td>'.$del_type.'</td></tr>
					<tr><td><b>Order Status:</b> </td><td>Pending</td></tr>
					</table>
					<br><hr>

					<h4>Bank Deposit Account Details</h4>
					<h5>Make your payment directly into any one of our bank accounts given below. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</h5>
					<table style = "width: 100%;margin-top: 20px;" border="0">
					<tr>
						<td style = "width: 50%;">	
							<b>Account Holder\'s Name:  O.A.A.M.Amarasekara<br>
						    Account Number: 100657746319<br>
						    Bank:  Sampath Bank<br>
						   	Branch: Kurunegala Super</b>
						</td>
						<td style = "width: 50%;">	
							<b>Account Holder\'s Name:  K. Ranasinghe<br>
					        Account Number: 100120010283<br>
					        Bank:  Nations Trust Bank<br>
					        Branch: Kurunegala</b>
						</td>
					</tr>
					<tr>
						<td style = "width: 50%;"><hr></td>
						<td style = "width: 50%;"><hr></td>
					</tr>
	
					<tr>
						<td style = "width: 50%;">
							<b>Account Hoder\'s Name:  O.A.A.M.Amarasekara<br>
							Account Number: 334100120000845<br>
							Bank:  Peoples Bank</b>	
						</td>
						<td style = "width: 50%;">
							<b>Account Holder\'s Name:  O.A.A.M.Amarasekara<br>
				            Account Number: 85874556<br>
				            Bank:  Bank of Ceylon<br>
				            Branch Code: 513<br>
				            Branch: 2nd City Branch, Kurunegala</b>
						</td>
						
					</tr>
					</table>
					<br>
					<br>

					Thank you for using our online shopping system.<br><br>
					CellParts.lk<br>
					Contact No: (+94) 77 744 4584<br>
					Website: www.cellparts.lk
					</body></html>';
					//echo $message;
						  
					$mail->From = "info@cellparts.lk";
					$mail->FromName = "Cellparts.lk";
					$mail->AddAddress($sql_ordr['email'], $sql_ordr['fname']);
					$mail->AddReplyTo("cellparts.lk@gmail.com", "Cellparts.lk");
					$mail->IsHTML(true); // set email format to HTML
					$mail->Subject = "Order Confirmation";
					$mail->Body    = $message;

					if(!$mail->Send())
					{
					   //echo "Message could not be sent.";
					   //echo "Mailer Error: " . $mail->ErrorInfo;
					   exit;
					}
	  
					/***************** Company Email *************************/
						  
						  $message1 = '<!DOCTYPE html>
					<html>
					<head>
					<title></title>
					<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
					<style>
					body {
					font-family: sans-serif;
					}
					.table .table-bordered {
					border: 1px solid #ccc;
					}
					table {
					border-collapse: collapse;
					}
					.table-bordered th, .table-bordered td {
					border: 1px solid #ccc;
					padding: 6px;
					}
					h5,.large-f {
					margin: 6px;
					}
					</style>
					</head>
					<body>
					<p align="right"><img src="https://cellparts.lk/img/logo.png" style = "margin : 20px 0 10px 0;" width="280"></p>
					<table width="100%" border="0" class="table table-bordered">
					<tr>
					<th scope="col"><p style="margin:10px"><strong>Order No: '.$inv_id.'</strong></p></th>
					</tr>
					</table>
					<br>
					<table style = "width: 100%;" border="0">
					<tr><td style = "width: 25%;"><b>Name:</b> </td><td>'.$sql_ordr['fname'].' '.$sql_ordr['lname'].'</td></tr>
					<tr><td><b>Address:</b> </td><td>'.$sql_ordr['address'].'</td></tr>
					<tr><td><b>City:</b> </td><td>'.$sql_ordr['town'].'</td></tr>
					<tr><td><b>Contact No (Mobile):</b> </td><td>'.$sql_ordr['Mob_no'].'</td></tr>
					<tr><td><b>Contact No (Home):</b> </td><td>'.$sql_ordr['Tel_no'].'</td></tr>
					<tr><td><b>Email:</b> </td><td>'.$sql_ordr['email'].'</td></tr>
					<tr><td><b>Order Date:</b> </td><td>'.$sql_ordr['order_date'].'</td></tr>
					<tr><td><b>Payment Method:</b> </td><td>'.$pay_type.'</td></tr>
					<tr><td><b>Delivery Method:</b> </td><td>'.$del_type.'</td></tr>
					</table>
					<br>		  
					<table width="100%" class="table table-bordered">
					<tr>
					<th width="35%" align="left">Product Name</th>
					<th width="25%" align="left">Product Code</th>
					<th width="15%" align="right">Unit Price (Rs)</th>
					<th width="10%" align="right">Qty</th>
					<th width="15%" align="right">Subtotal (Rs)</th>
					</tr>';
					$sql_c = mysqli_query($conn, "SELECT * FROM cart_details WHERE inv_id = '$inv_id'");
					$sub = 0;

					while($row_c = mysqli_fetch_array($sql_c)) {
						$message1 .= '<tr>
						<td align="left">'.$row_c['name'].'</td>
						<td align="left">'.$row_c['Item_Code'].'</td>
						<td align="right">'.$row_c['price'].'</td>
						<td align="right">'.$row_c['Qty'].'</td>
						<td align="right">'.$sub_tot = number_format($row_c['price']*$row_c['Qty'], 2).'</td>
						</tr>';
						$sub += $row_c['price']*$row_c['Qty'];
					}
					
					$message1 .= '<tr>
					<td colspan="4" align="right">
					<h5>Subtotal</h5>
					<h5>Courier Charges</h5>
					<strong class=" large-f ">GRAND TOTAL</strong></td>
					<td align="right">
					<h5>LKR '.number_format($sub, 2).'</h5>
					<h5>LKR '.number_format($del_fee, 2).'</h5>
					<strong class=" large-f ">LKR <span id="tot_amnt">'.number_format($sql_ordr['g_total'], 2).'</span></strong>
					</tr>
					</table>
					</body>
					</html>';
					//echo $message1;
							
						$mail1 = new PHPMailer();
						$mail1->IsSMTP(); // set mailer to use SMTP
						$mail1->Host = "cellparts.lk";  // specify main and backup server
						$mail1->SMTPAuth = true;     // turn on SMTP authentication
						$mail1->Username = "info@cellparts.lk";  // SMTP username
						$mail1->Password = 'Info@3212'; // SMTP password
						$mail1->SMTPSecure = 'ssl';
						$mail1->Port = 465;
						$mail1->From = "info@cellparts.lk";
						$mail1->FromName = "Cellparts.lk";
						$mail1->AddReplyTo($sql_ordr['email'], $sql_ordr['fname']);
						$mail1->AddAddress("cycrekiller@gmail.com", "Cellparts.lk");
						//$mail1->AddAddress("info@cellparts.lk", "Cellparts.lk");
						$mail1->IsHTML(true); // set email format to HTML
						$mail1->Subject = "Order Confirmation";
						$mail1->Body    = $message1;

						if(!$mail1->Send())
						{
						   //echo "Message could not be sent.";
						   //echo "Mailer Error: " . $mail->ErrorInfo;
						   exit;
						}	
							
						$response['status'] = 'success';
						$response['inv_id'] = $inv_id;
						
						/******************* // ****************/
						
					} else {
						 //echo("Error description: " . mysqli_error($conn));
						 $response['status'] = 'mysql error';
					}
			}
			
			if (array_key_exists('up_payment_method', $_POST)) {
				$order_id = htmlspecialchars(strip_tags(trim($_POST['inv'])), ENT_QUOTES, 'UTF-8');
				$pay_type = htmlspecialchars(strip_tags(trim($_POST['pay_type'])), ENT_QUOTES, 'UTF-8');
				$del_type = htmlspecialchars(strip_tags(trim($_POST['del_type'])), ENT_QUOTES, 'UTF-8');
				$deli_fee = htmlspecialchars(strip_tags(trim($_POST['del_fee'])), ENT_QUOTES, 'UTF-8');
				$packaging = htmlspecialchars(strip_tags(trim($_POST['packaging'])), ENT_QUOTES, 'UTF-8');
				$additional_details = htmlspecialchars(strip_tags(trim($_POST['additional_details'])), ENT_QUOTES, 'UTF-8');
				
				if($del_type == '1') { // Courier
					$del_fee = $deli_fee;
				
				} else if($del_type == '2') { // Postal
					$del_fee = 100;
				
				} else {
					$del_fee = 0;
				}
				
				$fee = ($tot + $del_fee + $packaging)*3.9/100+39;
				$g_tot = ($tot + $del_fee + $packaging + $fee);
						
				$sql = "UPDATE order_details_temp SET pay_method=$pay_type, delivery_type='$del_type', g_total='$g_tot', additional_details='$additional_details' WHERE inv_id='$order_id' AND User_ID='$user_id'";
				if(!empty($order_id) && !empty($pay_type) && !empty($del_type)) {
					if(mysqli_query($conn, $sql)) {
						$response['status'] = 'success';
					
					} else {
						$response['status'] = 'error';
					}
				
				} else {
					$response['status'] = 'error';
				}
			}
			
			/************************** // *****************************/			
		
		} else {
			$response['status'] = 'error';
		}
		
	} else {
		$response = '3'; // Invalid Login
	}

} else {
	$response = '3'; // Invalid Login
}
echo json_encode($response);
?>