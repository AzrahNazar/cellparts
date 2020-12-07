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
  else
  
  {

$sqlu="SELECT * FROM user WHERE user='$log'";
$resultu=mysqli_query($conn, $sqlu);
$countu=mysqli_num_rows($resultu);

	if($countu==1){
	
	    $id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
		$uname = htmlspecialchars(trim($_POST['uname']), ENT_QUOTES, 'UTF-8');

		$pwd = htmlspecialchars(trim($_POST['pwd']), ENT_QUOTES, 'UTF-8');

		$password = hash('sha256', $pwd);
	

			
				$query = mysqli_query($conn,"UPDATE user SET user='$uname',pws='$password' WHERE id='$id'");
					
				$redirectUrl = "../pass-change.php";
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