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


		$user_id = htmlspecialchars(trim($_POST['user_id']), ENT_QUOTES, 'UTF-8');
		$order_id = htmlspecialchars(trim($_POST['order_id']), ENT_QUOTES, 'UTF-8');
		$delivery = htmlspecialchars(trim($_POST['delivery']), ENT_QUOTES, 'UTF-8');
		$tr_num = htmlspecialchars(trim($_POST['tr_num']), ENT_QUOTES, 'UTF-8');

		$stmt = mysqli_query( $conn, "SELECT order_id FROM track_order WHERE order_id='$order_id'" );
		$row_count = mysqli_num_rows( $stmt );
		
		if($row_count == 0) {

			$sql = "INSERT INTO track_order (user_id, order_id, delivery_service, tracking_num) VALUES ('$user_id', '$order_id', '$delivery', '$tr_num')";
			
			$stmt_log = mysqli_query( $conn, $sql);
			
			if( $stmt_log === false ) {
				echo '<script> alert("Some error occured while entering details! Try again later!"); </script>';
			} else {
				echo '<script> alert("Successfully entered tracking details!"); </script>';
				}
			 
		}else {
			$sql2 = "UPDATE track_order SET delivery_service='$delivery', tracking_num='$tr_num', user_id='$user_id' WHERE order_id='$order_id'";
			
			$stmt_log2 = mysqli_query( $conn, $sql2);
			
			if( $stmt_log2 === false ) {
				echo '<script> alert("Some error occured while updating details! Try again later!"); </script>';
			} else {
				echo '<script> alert("Successfully updated tracking details!"); </script>';
			}
		}



		$redirectUrl = "../confirm-order.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";			



}

?>