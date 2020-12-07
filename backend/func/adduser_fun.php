<?php
include "../../db/db.php";
session_start();

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

if (empty($log)) {

	$redirectUrl = "../login.php";

	echo "<script type=\"text/javascript\">";

	echo "window.location.href = '$redirectUrl'";

	echo "</script>";

}

else{

	$sqlu="SELECT * FROM user WHERE user='$log'";

	$resultu=mysqli_query($conn, $sqlu);

	$countu=mysqli_num_rows($resultu);

	if($countu==1){
		$user_type = htmlspecialchars(trim($_POST['user_type']), ENT_QUOTES, 'UTF-8');
		$user_name = htmlspecialchars(trim($_POST['user_name']), ENT_QUOTES, 'UTF-8');
		$upass = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');

		$password = hash('sha256', $upass);

		$stmt = mysqli_query( $conn, "SELECT user FROM user WHERE user='$user_name' AND (val = 'admin' OR val = 'user')" );
		$row_count = mysqli_num_rows( $stmt );
		
		if($row_count == 0) {
				$sql = "INSERT INTO user (user,pws, val, order_id, verify_code) VALUES ('$user_name', '$password', '$user_type', 0, 0)";
			
			$stmt_log = mysqli_query( $conn, $sql);
			
			if( $stmt_log === false ) {
				echo '<script> alert("Some error occured while registereing user! Try again later!"); </script>';
			} else {
				echo '<script> alert("Successfully registered user!"); </script>';
			}
		
		} else {
			echo '<script> alert("User Name already exists!"); </script>';
		}



		$redirectUrl = "../add_users.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";			

	} 

	else

	{

		$redirectUrl = "../../index.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";



	}

}

?>