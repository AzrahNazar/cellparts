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


		$number = htmlspecialchars(trim($_POST['number']), ENT_QUOTES, 'UTF-8');

		$stmt = mysqli_query( $conn, "SELECT con_number FROM contact_number WHERE con_number='$number'" );
		$row_count = mysqli_num_rows( $stmt );
		
		if($row_count == 0) {
			$stmt2 = mysqli_query( $conn, "SELECT * FROM contact_number" );
			$row_count2 = mysqli_num_rows( $stmt2 );

			if($row_count2 <= 3) {

				$sql = "INSERT INTO contact_number (con_number) VALUES ('$number')";
				
				$stmt_log = mysqli_query( $conn, $sql);
				
				if( $stmt_log === false ) {
					echo '<script> alert("Some error occured while entering number! Try again later!"); </script>';
				} else {
					echo '<script> alert("Successfully enter contact details!"); </script>';
				}
			}else{
				echo '<script> alert("A maximum of 3 contact numbers can only be added!"); </script>';
			} 
		}else {
			echo '<script> alert("Contact Number already exists!"); </script>';
		}



		$redirectUrl = "../add-number.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";			



}

?>