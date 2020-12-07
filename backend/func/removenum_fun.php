<?php

session_start();

include '../../db/db.php';

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');


if (empty($log)) {

	$redirectUrl = "../../login.php";

	echo "<script type=\"text/javascript\">";

	echo "window.location.href = '$redirectUrl'";

	echo "</script>";

}else{



	$sqlu="SELECT * FROM user WHERE user='$log'";

	$resultu=mysqli_query($conn,$sqlu);

	$countu=mysqli_num_rows($resultu);

	if($countu==1){

		$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

		$sql = mysqli_query($conn,"DELETE FROM contact_number WHERE id='$id'");

		$redirectUrl = "../add-number.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";		



			

	} else{

		$redirectUrl = "../../index.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";

	

	}

}

?>