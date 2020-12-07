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
		$query2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT imgpath FROM books WHERE sccode='$id'"));

		$path = "../../images/access/".$query2['imgpath'];
		$files = glob($path);
		
		foreach($files as $file) {
			unlink($file);
		}
		
		$sql = mysqli_query($conn,"DELETE FROM books WHERE sccode='$id'");
		
		$redirectUrl = "../accessories.php";
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