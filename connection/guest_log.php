<?php
session_start();
include '../db/db.php';

$temp_user = htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');

if (!empty($temp_user)) {
	$_SESSION['gest_user'] = 'Gest-'.rand(1000,9999).'-'.rand(1000,9999).'-'.rand(1000,9999);
	$g_user = $_SESSION['gest_user'];
	$tmp_id=htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');

	$sql_invo = mysqli_query($conn, "SELECT inv_id FROM live_cart WHERE tmp_id = '$tmp_id'");
	
	if(mysqli_num_rows($sql_invo) == 0) {
		if (isset($_SESSION['file'])) {
			$file = strip_tags(trim($_SESSION['file']));
		
		} else {
			$file = '';
		}

		$redirectUrl = "../$file";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	} else {
		$sql = "UPDATE live_cart SET User_ID='$g_user' , inv_id = '$g_user' WHERE tmp_id= '$tmp_id'";
		$result = mysqli_query($conn, $sql);

		if ($result) {
			//unset($_SESSION['temp_user']);
			//echo "Logo Database inserted";

			$redirectUrl = "../confirm.php";
			echo "<script type=\"text/javascript\">";
			echo "window.location.href = '$redirectUrl'";
			echo "</script>";
		}
	}

}else{
	$redirectUrl = "../index.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
}
?>