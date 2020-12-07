<?php
require "../db/db.php";

if (isset($_POST['btn_reset_password'])) {
	$selector = htmlspecialchars(strip_tags(trim($_POST['selector'])), ENT_QUOTES, 'UTF-8');
	$validator = htmlspecialchars(strip_tags(trim($_POST['validator'])), ENT_QUOTES, 'UTF-8');
	$password = htmlspecialchars(strip_tags(trim($_POST['password'])), ENT_QUOTES, 'UTF-8');
	$password_repeat = htmlspecialchars(strip_tags(trim($_POST['password_repeat'])), ENT_QUOTES, 'UTF-8');

	if(empty($password) || (empty($password_repeat))){
		header("Location: ../create_new_password.php");
		exit();
	}else if($password != $password_repeat){
		header("Location: ../create_new_password.php?newpwd=pwdnotsame");
		exit();
	}

	$current_date = date("U");

	$sql = "SELECT * FROM pwd_reset WHERE selector=? AND expires>=?";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		echo "There was an error1!";
		exit();
	}else{
		mysqli_stmt_bind_param($stmt, "ss", $selector, $current_date);
		mysqli_stmt_execute($stmt);

		$result =mysqli_stmt_get_result($stmt);
		if (!$row = mysqli_fetch_assoc($result)) {
			echo "You need to re-submit your reset request1";
			exit();
		}else{
			$token_bin = hex2bin($validator);
			$token_check = password_verify($token_bin, $row['token']);

			if ($token_check === false) {
				echo "You need to re-submit your reset request2";
				exit();
			}else if($token_check === true){
				$token_email = $row['email'];

				$sql = "SELECT * FROM cust WHERE eadd=? ";
				$stmt = mysqli_stmt_init($conn);
				if (!mysqli_stmt_prepare($stmt, $sql)) {
					echo "There was an error2!";
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "s", $token_email);
					mysqli_stmt_execute($stmt);

					$result2 =mysqli_stmt_get_result($stmt);
					if (!$row2 = mysqli_fetch_assoc($result2)) {
						echo "Oops!! The requested Email address doesnot exist! Please try again with the email address you registred!!";
						exit();
					}else{
						$new_pwd_hash = hash('sha256', $password);
						
						$sql = "UPDATE cust SET password = ? WHERE eadd = ?" ;
						$stmt = mysqli_stmt_init($conn);

						if (!mysqli_stmt_prepare($stmt, $sql)) {
							echo "There was an error4!";
							exit();
						}else{
							$usern = $row2['usern'];
							$sql2 = "UPDATE user SET pws ='$new_pwd_hash' WHERE user = '$usern'" ;
							$stmt2 = mysqli_query($conn, $sql2);

							if( $stmt2 === false ) {
								echo 'errorpass';
							
							} else {
								echo 'successpass';
							}

							mysqli_stmt_bind_param($stmt, "ss", $new_pwd_hash, $token_email);
							mysqli_stmt_execute($stmt);


							$sql = "DELETE FROM pwd_reset WHERE email=?" ;
							$stmt = mysqli_stmt_init($conn);
							if (!mysqli_stmt_prepare($stmt, $sql)) {
								echo "There was an error5!";
								exit();
							}else{
								mysqli_stmt_bind_param($stmt, "s", $token_email);
								mysqli_stmt_execute($stmt);
								echo "<script type=\"text/javascript\">";
								echo "alert('You have successfully reset your password!!');";
								echo "</script>";
								header("Location: ../login_cart.php");
							}

						}

					}
				}

			}
		}
	}

}else{
	header("Location: ../index.php");
}

?>