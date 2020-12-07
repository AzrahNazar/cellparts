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
if (array_key_exists('activate_acc', $_POST)) {
	$user = htmlspecialchars(trim($_POST['user']), ENT_QUOTES, 'UTF-8');

	$sql = "UPDATE `cust` SET flag = '1' WHERE usern = '$user'";
	$result = mysqli_query($conn, $sql);

	if( $result === false ) {
		echo 'error';
	} else {
		echo 'success';
    }
}



?>