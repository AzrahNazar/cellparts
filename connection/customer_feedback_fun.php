<?php 
include '../db/db.php';
session_start();
date_default_timezone_set('Asia/Colombo');
$dt = date("Y-m-d");

/****************************** Insert *************************************/		

if(isset($_POST['order_id'])) { 
	$order_id  = htmlspecialchars(strip_tags(trim($_POST['order_id'])), ENT_QUOTES, 'UTF-8');
	$rating  = htmlspecialchars(strip_tags(trim($_POST['rating'])), ENT_QUOTES, 'UTF-8');
	$message  = htmlspecialchars(strip_tags(trim($_POST['message'])), ENT_QUOTES, 'UTF-8');

	$stmt = mysqli_query( $conn, "SELECT inv_id FROM order_details WHERE inv_id='$order_id'"); 
	$row_count = mysqli_num_rows( $stmt );

	if($row_count == 0) {
		echo 'invalid';
	} else {
		$sql = "INSERT INTO feedback (order_id, rating, comment, date, flag) VALUES ('$order_id', '$rating', '$message', '$dt', 0)";
		$params = array($order_id, $message, 0);
		
		$stmt_log = mysqli_query( $conn, $sql);
		
		if( $stmt_log === false ) {
			echo 'error';
		
		} else {
			echo 'success'; 
		}
	}
}



?>