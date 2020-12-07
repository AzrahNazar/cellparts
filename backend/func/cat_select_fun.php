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

	if($countu==1)
	{
	
	

$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

$query1 = mysqli_query($conn,"SELECT * FROM cat WHERE flag='1'");		
if (mysqli_num_rows($query1)>=14){

		echo "<script>alert('You can only select 14 categories!')</script>";
		$redirectUrl = "../index.php";
				echo "<script type=\"text/javascript\">";
				echo "window.location.href = '$redirectUrl'";
				echo "</script>";	
		
}

else
{
$query = mysqli_query($conn,"UPDATE cat SET flag='1' WHERE ccode='$id'");
					
					
				$redirectUrl = "../category.php";
				echo "<script type=\"text/javascript\">";
				echo "window.location.href = '$redirectUrl'";
				echo "</script>";			
				
			
	
	}
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