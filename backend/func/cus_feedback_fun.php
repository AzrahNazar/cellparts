<?php

include "../../db/db.php";

date_default_timezone_set('Asia/Colombo');
$dt = date("Y-m-d");

session_start();

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

 if (empty($log)) {
	$redirectUrl = "../login.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";

	   

  }

/************************** ACCEPT **************************/  
if (array_key_exists('accept_feed', $_POST)) {
	$oid = htmlspecialchars(trim($_POST['oid']), ENT_QUOTES, 'UTF-8');

	$sql = "UPDATE feedback SET flag=1 WHERE order_id='$oid'";
	$result = mysqli_query($conn, $sql);

	if( $result === false ) {
		echo 'error';
	} else {
		echo 'success';
    }
}


/************************** REJECT **************************/ 
if (array_key_exists('reject_feed', $_POST)) {
	$oid = htmlspecialchars(trim($_POST['oid']), ENT_QUOTES, 'UTF-8');

	$sql = "UPDATE feedback SET flag=2 WHERE order_id='$oid'";
	$result = mysqli_query($conn, $sql);

	if( $result === false ) {
		echo 'error';
	} else {
		echo 'success';
    }
}


/************************** REMOVE **************************/ 
if (array_key_exists('remove_feed', $_POST)) {
	$oid = htmlspecialchars(trim($_POST['oid']), ENT_QUOTES, 'UTF-8');

	$sql = "UPDATE feedback SET flag=3 WHERE order_id='$oid'";
	$result = mysqli_query($conn, $sql);

	if( $result === false ) {
		echo 'error';
	} else {
		echo 'success';
    }
}

/****************************** Edit *************************************/

if(isset($_POST['id_up'])) {
	$id = htmlspecialchars(strip_tags(trim($_POST['id_up'])), ENT_QUOTES, 'UTF-8'); 
	$reply  = htmlspecialchars(strip_tags(trim($_POST['reply'])), ENT_QUOTES, 'UTF-8');
		$sql = "UPDATE feedback SET reply='$reply', reply_date='$dt', reply_id=1  WHERE order_id='$id'";
		$stmt_log = mysqli_query($conn, $sql);
		
		if( $stmt_log === false ) {
			echo 'error';
		
		} else {
			echo 'success';
		}
	
}

/************************** LOAD REPLY **************************/ 
if (array_key_exists('get_dataset', $_POST)) {
	$id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

	$sql = "SELECT reply FROM feedback WHERE order_id='$id'";
	$stmt= mysqli_query($conn, $sql); 
	$row = mysqli_fetch_assoc($stmt);

	echo json_encode($row);
}
?>