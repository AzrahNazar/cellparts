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

/****************************** Payment Verify **********************************/
date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d H:i:s');

$order_id = htmlspecialchars(strip_tags(trim($_POST['order_id'])), ENT_QUOTES, 'UTF-8'); // Order ID sent by Merchant to Checkout page
$merchant_id = htmlspecialchars(strip_tags(trim($_POST['merchant_id'])), ENT_QUOTES, 'UTF-8'); //PayHere Merchant ID of the merchant
$payment_id = htmlspecialchars(strip_tags(trim($_POST['payment_id'])), ENT_QUOTES, 'UTF-8'); // Unique Payment ID generated by PayHere for the processed payment
$payhere_amount = htmlspecialchars(strip_tags(trim($_POST['payhere_amount'])), ENT_QUOTES, 'UTF-8'); // Total Amount of the payment
$payhere_currency = htmlspecialchars(strip_tags(trim($_POST['payhere_currency'])), ENT_QUOTES, 'UTF-8'); // Currency code of the payment (LKR/USD)
$status_code = htmlspecialchars(strip_tags(trim($_POST['status_code'])), ENT_QUOTES, 'UTF-8'); // Payment status code (2, 0, -1, -2, -3)
// Payment Status Codes

// 2 - success
// 0 - pending
// -1 - canceled
// -2 - failed
// -3 - chargedback

$md5sig = htmlspecialchars(strip_tags(trim($_POST['md5sig'])), ENT_QUOTES, 'UTF-8'); // Encrypted signature to verify the payment
//$custom_1 = htmlspecialchars(strip_tags(trim($_POST['custom_1'])), ENT_QUOTES, 'UTF-8'); // Custom param 1 sent by merchant to Checkout page
//$custom_2 = htmlspecialchars(strip_tags(trim($_POST['custom_2'])), ENT_QUOTES, 'UTF-8'); // Custom param 2 sent by merchant to Checkout page

$merchant_secret = '366c0c19605420fd832c87d7e02d528a'; // Replace with your Merchant Secret
//$merchant_secret = 'Cellparts@3212'; // Replace with your Merchant Secret (SandBox)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if (($local_md5sig === $md5sig) AND ($status_code == 2) ) { // 
	// Update your database as payment success<br />
	mysqli_query($conn, "INSERT INTO order_verify SET order_id='$order_id', merchant_id='$merchant_id', payment_id='$payment_id', payhere_amount= '$payhere_amount', status='$status_code', date='$date'");

} else {
	mysqli_query($conn, "INSERT INTO order_verify_log SET order_id='$order_id', merchant_id='$merchant_id', payment_id='$payment_id', payhere_amount= '$payhere_amount', status='$status_code', date='$date'");
}

/********************************************************************************************/
		
$sql_t = "INSERT INTO order_details (inv_id, User_ID, fname, lname, Tel_no, Mob_no, email, address, town, zip, status, guest, date, order_date, g_total, pay_method, delivery_type) SELECT inv_id, User_ID, fname, lname, Tel_no, Mob_no, email, address, town, zip, status, guest, date, '$date', g_total, pay_method, delivery_type FROM order_details_temp WHERE inv_id='$order_id' LIMIT 1";
		
if(mysqli_query($conn, $sql_t)) {
	mysqli_query($conn, "DELETE FROM order_details_temp WHERE inv_id='$order_id'");
	
	$sqlc = "INSERT INTO cart_details (User_ID, Item_Code, name, img, Qty, price, order_id, inv_id, order_date, tmp_id, status, flag) SELECT User_ID, Item_Code, name, img, Qty, price, order_id, inv_id, order_date, tmp_id, status, flag FROM live_cart WHERE inv_id='$order_id'";
	
	if(mysqli_query($conn, $sqlc)) {
		mysqli_query($conn, "DELETE FROM live_cart WHERE inv_id='$order_id'");
		if (isset($_SESSION['temp_user'])) {
			unset($_SESSION['temp_user']);
			unset($_SESSION['gest_user']);
		}
	}
	
	/*********************** Customer Email ****************************/
  
  $sql_ordr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM order_details WHERE inv_id='$order_id'"));
  
	$uid = $sql_ordr['User_ID'];
	$guest = $sql_ordr['guest'];
	
	if($guest == 0) {
		$sql_usr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT order_id FROM cust WHERE id='$uid'"));
		$new_oid = $sql_usr['order_id'] + 1;
		mysqli_query($conn, "UPDATE cust SET order_id=$new_oid WHERE id='$uid'");
	}
  
  if($sql_ordr['pay_method'] == 1) {
	$pay_type = 'Credit/Debit Card';
  
  } else if($sql_ordr['pay_method'] == 2) {
	  $pay_type = 'Bank Transfer/Bank Deposits';
  } else {
	  $pay_type = '';
  }
  
  if($sql_ordr['delivery_type'] == 1) {
	$del_type = 'Courier Service';
	$del_fee = 200;
  
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
<tr><td style = "width: 20%;"><b>Order ID:</b> </td><td>'.$order_id.'</td></tr>
<tr><td><b>Order Date:</b> </td><td>'.$sql_ordr['order_date'].'</td></tr>
<tr><td><b>Total Amount:</b> </td><td>Rs. '.$sql_ordr['g_total'].'</td></tr>
<tr><td><b>Payment Method:</b> </td><td>'.$pay_type.'</td></tr>
<tr><td><b>Delivery Method:</b> </td><td>'.$del_type.'</td></tr>
<tr><td><b>Order Status:</b> </td><td>Pending</td></tr>
</table>
<br><hr>
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
	<th scope="col"><p style="margin:10px"><strong>Order No: '.$order_id.'</strong></p></th>
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
	$sql_c = mysqli_query($conn, "SELECT * FROM cart_details WHERE inv_id = '$order_id'");
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
	 if($sql_ordr['pay_method'] == 1) {
		$fee = ($sub + $del_fee)*3.9/100+39;
	 
	 } else {
		 $fee = 0;
	 }
	 
	//$grand_total = ($sub + 300 + $fee);
	
	$message1 .= '<tr>
	<td colspan="4" align="right">
	<h5>Subtotal</h5>
	<h5>Shipping Charges</h5>
	<h5>Payment Processing Fee</h5>
	<strong class=" large-f ">GRAND TOTAL</strong></td>
	<td align="right">
	<h5>LKR '.number_format($sub, 2).'</h5>
	<h5>LKR '.number_format($del_fee, 2).'</h5>
	<h5>LKR '.number_format($fee, 2).'</h5>
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
		$mail1->AddAddress("cellparts.lk@gmail.com", "Cellparts.lk");
		$mail1->IsHTML(true); // set email format to HTML
		$mail1->Subject = "Order Confirmation";
		$mail1->Body    = $message1;

		if(!$mail1->Send())
		{
		   //echo "Message could not be sent.";
		   //echo "Mailer Error: " . $mail->ErrorInfo;
		   exit;
		}
	
	/**************** // **********/
	
} else {

}
?>