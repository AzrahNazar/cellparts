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
  


$order_id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

//$status = htmlspecialchars(trim($_POST['status']), ENT_QUOTES, 'UTF-8');

$sql=mysqli_query($conn,"UPDATE cart_details SET status='Rejected' WHERE inv_id='$order_id'");

$sqlu=mysqli_query($conn,"UPDATE order_details SET status='Rejected' WHERE inv_id='$order_id'");

echo "<script>alert('Successfully Rejected!')</script>";
$redirectUrl = "../orders.php";
echo "<script type=\"text/javascript\">";
echo "window.location.href = '$redirectUrl'";
echo "</script>";

?>