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
		$sccode = htmlspecialchars(trim($_GET['subc']), ENT_QUOTES, 'UTF-8');
		$deli_method = htmlspecialchars(trim($_POST['deli_method']), ENT_QUOTES, 'UTF-8');


			$sql = "UPDATE scat SET deli_method=$deli_method WHERE sccode='$sccode'";
			
			$stmt_log = mysqli_query( $conn, $sql);
			
			if( $stmt_log === false ) {
				echo '<script> alert("Some error occured!!"); </script>';
			} else {
				echo '<script> alert("Successfully updated delivery method!"); </script>';
			}
		
		



		$redirectUrl = "../stock_subcat.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";	
		
			
	
	} 

	else{
		$redirectUrl = "../../index.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	}
}
?>