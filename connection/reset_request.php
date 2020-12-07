<?php
require "../db/db.php";
require "../PHPMailer/class.phpmailer.php";

if (isset($_POST['btn_reset'])) {
	$selector = bin2hex(random_bytes(8));
	$token = random_bytes(32);

	$url = "https://cellparts.lk/create_new_password.php?selector=".$selector."&validator=".bin2hex($token);
	$expires = date("U") + 1800;

	// var_dump($_POST);
	$user_email = htmlspecialchars(strip_tags(trim($_POST['email'])), ENT_QUOTES, 'UTF-8');

	$sql = "DELETE FROM pwd_reset WHERE email=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error!";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "s", $user_email);
		mysqli_stmt_execute($stmt);
	}

	$sql = "INSERT INTO pwd_reset(email, selector, token, expires) VALUES(?, ?, ?, ?)";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error!";
		exit();
	}else{
		$hashed_token = password_hash($token, PASSWORD_DEFAULT);
		mysqli_stmt_bind_param($stmt, "ssss", $user_email, $selector, $hashed_token, $expires);
		mysqli_stmt_execute($stmt);

		$mail = new PHPMailer();

		$mail->IsSMTP();                                      // set mailer to use SMTP
		$mail->Host = "cellparts.lk";  // specify main and backup server
		$mail->SMTPAuth = true;     // turn on SMTP authentication
		$mail->Username = "info@cellparts.lk";  // SMTP username
		$mail->Password = "Info@3212"; // SMTP password
		$mail->SMTPSecure = 'ssl';
		$mail->Port = 465;
		$mail->From = "info@cellparts.lk";
		$mail->FromName = "Cellparts.lk";
		$mail->AddAddress($user_email, 'User');

		$mail->WordWrap = 50;                                 // set word wrap to 50 characters
		$mail->IsHTML(true);                                  // set email format to HTML

		$mail->Subject = "Reset your password for Cellparts.lk";
		$mail->Body    = "<p>Dear User,</p>
							<p>We received a password reset request. The link to reset your password is below. If you didnot make this request, you can ignore this Email.</p>
						<p>Here is your password reset link:</br>
						<a href=".$url.">".$url."</a></p>

						<p>With regards,</p>
						<p> Admin</p>
						<p> Cellparts.lk</p>";
		//$mail->AltBody = "Dear User,\n We received a password reset request. The link to reset your password is below. If you didnot make this request, you can ignore this Email.\n Here is your password reset link:".$url;

		if(!$mail->Send())
		{
		   echo "error";
		   exit;
		}else{
			 //echo 'success';
			header("Location:../reset_password.php?reset=success");
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);

	


	
}else{
	header("Location: ../index.php");
}
?>