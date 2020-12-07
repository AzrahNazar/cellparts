<?php
include "../db/db.php";
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
$fname = htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');
$lname = htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');

$address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
$town = htmlspecialchars(trim($_POST['town']), ENT_QUOTES, 'UTF-8');
$zip = htmlspecialchars(trim($_POST['zip']), ENT_QUOTES, 'UTF-8');

$tele = htmlspecialchars(trim($_POST['tele']), ENT_QUOTES, 'UTF-8');
$mobi = htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8');
$pass = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
$conpass = htmlspecialchars(trim($_POST['con_password']), ENT_QUOTES, 'UTF-8');


//$upass = hash('sha1', $pass);
if($conpass != $pass){
 echo "<script>alert('Confirm password Not Match!')</script>";
$redirectUrl = "../account.php";
echo "<script type=\"text/javascript\">";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>"; 


}
else
{

			$query = mysqli_query($conn,"UPDATE cust SET nic='$fname',lname='$lname',add1='$address',town='$town',zip='$zip',home='$tele', mobi='$mobi', password='$pass' WHERE id='$id'");
				
				
			$query1 = mysqli_query($conn,"UPDATE user SET pws='$pass' WHERE user='$log'");
				
					
				$redirectUrl = "../account.php";
				echo "<script type=\"text/javascript\">";
				echo "window.location.href = '$redirectUrl'";
				echo "</script>";			
				
			
}
	} 
	else
	{
		$redirectUrl = "../index.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	}
}
?>