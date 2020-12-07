<?php
include '../db/db.php';
require("../PHPMailer/class.phpmailer.php");
session_start();

date_default_timezone_set('Asia/Colombo');
$dt = date("Y-m-d");

if (array_key_exists('user_reg', $_POST)) {
		$title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES, 'UTF-8');
		$nic = htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');
		$lname = htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');
		$zip = htmlspecialchars(trim($_POST['zip']), ENT_QUOTES, 'UTF-8');
		$add1 = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
		$ht = htmlspecialchars(trim($_POST['town']), ENT_QUOTES, 'UTF-8');
		$year = htmlspecialchars(trim($_POST['year']), ENT_QUOTES, 'UTF-8');
		$month = htmlspecialchars(trim($_POST['month']), ENT_QUOTES, 'UTF-8');
		$day = htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8');
		$country = htmlspecialchars(trim($_POST['country']), ENT_QUOTES, 'UTF-8');
		$home = htmlspecialchars(trim($_POST['telno']), ENT_QUOTES, 'UTF-8');
		$mobi = htmlspecialchars(trim($_POST['mobno']), ENT_QUOTES, 'UTF-8');
		$eadd = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
		$eadd2 = htmlspecialchars(trim($_POST['confirm']), ENT_QUOTES, 'UTF-8');
		$district = htmlspecialchars(trim($_POST['district']), ENT_QUOTES, 'UTF-8');
		
		$usern = htmlspecialchars(trim($_POST['user']), ENT_QUOTES, 'UTF-8');
		$password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
		$pass = htmlspecialchars(trim($_POST['conpass']), ENT_QUOTES, 'UTF-8');
		$pass_with_sha = hash('sha256', $password);	 
	
	
	
	if (isset($_POST['regisno']))	
		{
		$bno = htmlspecialchars(trim($_POST['regisno']), ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['b_name']))	
		{
		$bname = htmlspecialchars(trim($_POST['b_name']), ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['badd']))	
		{
		$badd = htmlspecialchars(trim($_POST['badd']), ENT_QUOTES, 'UTF-8');
		}
		
$sql3="SELECT * FROM cust";
$result3=mysqli_query($conn,$sql3); 

while($row = mysqli_fetch_array($result3)){
$nicid=$row['nic'];                                       
}	
	
$sql2="SELECT * FROM user";
$result2=mysqli_query($conn,$sql2); 

while($row = mysqli_fetch_array($result2)){
	$val=$row['user'];                                       
}

		$repair = htmlspecialchars(trim($_POST['repair']), ENT_QUOTES, 'UTF-8');	
		
		$comm = htmlspecialchars(trim($_POST['communi']), ENT_QUOTES, 'UTF-8');	
	
		$outlet = htmlspecialchars(trim($_POST['sales']), ENT_QUOTES, 'UTF-8'); 	
		
		$other = htmlspecialchars(trim($_POST['other']), ENT_QUOTES, 'UTF-8');	

	$vcode = rand(100000, 999999);

	$query_v = "SELECT verify_code FROM user WHERE verify_code='$vcode'";
	$sql_v = mysqli_query($conn, $query_v);
	
	if(mysqli_num_rows($sql_v) == 0) {
		$sql_uname1 = mysqli_query($conn, "SELECT * FROM cust WHERE usern='$usern'");
		$sql_uname2 = mysqli_query($conn, "SELECT * FROM user WHERE user='$usern'");
		$sql_tel = mysqli_query($conn, "SELECT * FROM cust WHERE cust.`home`='$home'");
		
		if(mysqli_num_rows($sql_uname1) == 0 && mysqli_num_rows($sql_uname2) == 0) {
			if(mysqli_num_rows($sql_tel) == 0) {

  $query = "INSERT INTO cust(title, add1 ,district, home, mobi, eadd, br, usern, nic, lname, country, year, month, day, town, bno, bname, badd, repair, comm, outlet, order_id, other, flag, date_reg, password) 
VALUES ('$title','$add1','$district','$home','$mobi','$eadd','','$usern','$nic','$lname','$country','$year','$month','$day','$ht','$bno','$bname','$badd','$repair','$comm','$outlet','1','$other','0', '$dt', '$pass_with_sha')";
$sql=mysqli_query($conn,$query);

$query1= "INSERT INTO user(user,pws,val,order_id, verify_code) VALUES ('$usern','$pass_with_sha','$usern','1', '$vcode')";
$sql1=mysqli_query($conn,$query1);

				if($sql1) {
					$other = htmlspecialchars(trim($_POST['other']), ENT_QUOTES, 'UTF-8');

					$sqlu = mysqli_query($conn, "SELECT * FROM user WHERE user='$usern'");	

					$row = mysqli_fetch_assoc($sqlu);
				
						$message = '<!DOCTYPE html>
					<html><head><title></title><style>body {font-family: sans-serif;} .table .table-bordered{border: 1px solid #ccc;} table {border-collapse: collapse;}.table-bordered th, .table-bordered td {border: 1px solid #ccc;padding:10px;} </style>
					</head><body>
					<p>Dear '.$title.' '.$nic.' '.$lname.',<br>Thank you for registering with CellParts.lk</p><p>Your verification code to activate your acount: <b>'.$vcode.'</b></p>
					
					
					<br><hr>
					Thank you. Happy Shopping!!<br><br>
					CellParts.lk<br>
					Contact No: (+94) 77 744 4584<br>
					Website: www.cellparts.lk
					</body></html>';
					//echo $message;
					
					$mail = new PHPMailer();
					$mail->IsSMTP(); // set mailer to use SMTP
					$mail->Host = "cellparts.lk";  // specify main and backup server
					$mail->SMTPAuth = true;     // turn on SMTP authentication
					$mail->Username = "info@cellparts.lk";  // SMTP username
					 $mail->Password = 'Info@3212'; // SMTP password
					$mail->SMTPSecure = 'ssl';
					$mail->Port = 465;
					$mail->From = "info@cellparts.lk";
					$mail->FromName = "Cellparts.lk";
					$mail->AddAddress($eadd, $nic);
					$mail->AddReplyTo("cellparts.lk@gmail.com", "Cellparts.lk");
					$mail->IsHTML(true); // set email format to HTML
					$mail->Subject = "Cellparts.lk Activation Code";
					$mail->Body    = $message;

					if(!$mail->Send())
					{
					   //exit;
					}else{

						$_SESSION['tmp_user_reg'] = $row['user'];

						$response['status'] = 'ok';
						$response['vcode'] = $vcode;
						$response['tp'] = $home;
					}

				}

				else
					
				{
					$response['status'] = 'error';
				}
		
			} else {
				$response['status'] = 'exist2';
			}
		
		} else {
			$response['status'] = 'exist';
		}
		
		echo json_encode($response);

		//echo "In";
	}
		
}

/*************************** TP exists **************************/
if (array_key_exists("tp_exist", $_POST)) {
	$tp = htmlspecialchars(trim($_POST['tp']), ENT_QUOTES, 'UTF-8');
	
	
$sql2 = "SELECT
count(home) as contact
FROM
cust  WHERE cust.`home`='$tp'";
//echo $sql2;
   $result = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}


/*************************** Customer exists **************************/
if (array_key_exists("cus_exist", $_POST)) {
	
$sql2 = "SELECT
count(usern) as user_count
FROM
cust  WHERE cust.`usern`='{$_POST['uname']}'";
//echo $sql2;
   $result = mysqli_query($conn, $sql2);
    while ($row = mysqli_fetch_assoc($result)) {
	$data[] = $row;
    }
    echo json_encode($data);
}

/*************************** Verify Code **************************/
if (array_key_exists("val_verify_code", $_POST)) {

	$user = htmlspecialchars(trim($_SESSION['tmp_user_reg']), ENT_QUOTES, 'UTF-8');
	$code = htmlspecialchars(trim($_POST['verify_code']), ENT_QUOTES, 'UTF-8');

	$data = array();

	$sql2 = "SELECT * FROM  `user` WHERE user = '$user'";
   	$result2 = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result2);

    $v_code = $row['verify_code'];

    if ($code == $v_code) {

    	$sql = "UPDATE `cust` SET flag = '1' WHERE usern = '$user'";
   		$result = mysqli_query($conn, $sql);

    	$_SESSION['user'] = $row['user'];
    	$data['status'] = "ok";
    	
    }else{
    	$data['status'] = "error";
    }

    echo json_encode($data);
}


/*************************** SMS Verify Code **************************/
	if (array_key_exists('sms_verify_code', $_POST)) {
      $mobile_no = htmlspecialchars(strip_tags(trim($_POST['mobile_no'])), ENT_QUOTES, 'UTF-8');
      $v_code = htmlspecialchars(strip_tags(trim($_POST['v_code'])), ENT_QUOTES, 'UTF-8');

      	$url= 'https://smsserver.textorigins.com/Send_sms?';

     	 $success_count = 0;

     	 $data_sms = array(
     	 	'src' => 'CYCLOMAX1', //Mask
     	 	'email' => 'sumedacellular@gmail.com', //User Email
     	 	'pwd' => 'Sum66556', //User Password
     	 	'msg' => "Thank You for registering with CellParts.lk! Your verify code: ".$v_code, //Message
     	 	'dst' => $mobile_no); //Phone Number

     	 $msg = http_build_query($data_sms);

     	 $url .= $msg;

     	$ch = curl_init($url);

     	 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
     	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     	 curl_setopt($ch, CURLOPT_HEADER, false);
     	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     	 $result_set = curl_exec($ch);

     	 if (preg_replace('/\s+/', '',$result_set) == '{"status":"1601","message":"SMSSendSuccessful"}') {
     	 	$success_count++;
     	 }


     	 $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     	 curl_close($ch);
      

      $result['count'] = $success_count;
      $result['status'] = '1601';
      $result['message'] = 'Successfully Sent';

      echo json_encode($result);
      
      
    }

/*************************** SMS Confirm Order - Customer **************************/
	if (array_key_exists('sms_confirm_order', $_POST)) {
      $mobile_no = htmlspecialchars(strip_tags(trim($_POST['mobile_no'])), ENT_QUOTES, 'UTF-8');
      $inv_id = htmlspecialchars(strip_tags(trim($_POST['inv_id'])), ENT_QUOTES, 'UTF-8');

      	$url= 'https://smsserver.textorigins.com/Send_sms?';

     	 $success_count = 0;

     	 $data_sms = array(
     	 	'src' => 'CYCLOMAX1', //Mask
     	 	'email' => 'sumedacellular@gmail.com', //User Email
     	 	'pwd' => 'Sum66556', //User Password
     	 	'msg' => "Your order has been successfully placed. Thank you! Order ID: ".$inv_id, //Message
     	 	'dst' => $mobile_no); //Phone Number

     	 $msg = http_build_query($data_sms);

     	 $url .= $msg;

     	$ch = curl_init($url);

     	 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
     	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     	 curl_setopt($ch, CURLOPT_HEADER, false);
     	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     	 $result_set = curl_exec($ch);

     	 if (preg_replace('/\s+/', '',$result_set) == '{"status":"1601","message":"SMSSendSuccessful"}') {
     	 	$success_count++;
     	 }


     	 $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     	 curl_close($ch);
      

      $result['count'] = $success_count;
      $result['status'] = '1601';
      $result['message'] = 'Successfully Sent';

      echo json_encode($result);
      
      
    }


/*************************** SMS Confirm Order - Owner **************************/
	if (array_key_exists('sms_confirm_order_owner', $_POST)) {
      $mobile_no = htmlspecialchars(strip_tags(trim($_POST['mobile_no'])), ENT_QUOTES, 'UTF-8');
      $inv_id = htmlspecialchars(strip_tags(trim($_POST['inv_id'])), ENT_QUOTES, 'UTF-8');

      	$url= 'https://smsserver.textorigins.com/Send_sms?';

     	 $success_count = 0;

     	 $data_sms = array(
     	 	'src' => 'CYCLOMAX1', //Mask
     	 	'email' => 'sumedacellular@gmail.com', //User Email
     	 	'pwd' => 'Sum66556', //User Password
     	 	'msg' => "New order has been received. Order ID is ".$inv_id, //Message
     	 	'dst' => '0777444584'); //Phone Number

     	 $msg = http_build_query($data_sms);

     	 $url .= $msg;

     	$ch = curl_init($url);

     	 curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
     	 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
     	 curl_setopt($ch, CURLOPT_HEADER, false);
     	 curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

     	 $result_set = curl_exec($ch);

     	 if (preg_replace('/\s+/', '',$result_set) == '{"status":"1601","message":"SMSSendSuccessful"}') {
     	 	$success_count++;
     	 }


     	 $http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);
     	 curl_close($ch);
      

      $result['count'] = $success_count;
      $result['status'] = '1601';
      $result['message'] = 'Successfully Sent';

      echo json_encode($result);
      
      
    }

?>
