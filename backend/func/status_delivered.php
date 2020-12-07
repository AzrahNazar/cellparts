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



$sql=mysqli_query($conn,"UPDATE cart_details SET status='Delivered' WHERE inv_id='$order_id'");


$dt = date('Y-m-d H:i:s');
$sqlu=mysqli_query($conn,"UPDATE order_details SET status='Delivered', packed_by = '$log', packed_date='$dt'  WHERE inv_id='$order_id'");



echo "<script>alert('Delivered Successfully!')</script>";

$redirectUrl = "../confirm-order.php";

	echo "<script type=\"text/javascript\">";

        echo "window.location.href = '$redirectUrl'";

        echo "</script>";



?>