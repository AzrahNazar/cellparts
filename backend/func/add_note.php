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

$notes = htmlspecialchars(trim($_POST['notes']), ENT_QUOTES, 'UTF-8');



$dt = date('Y-m-d H:i:s');
$sqlu=mysqli_query($conn,"UPDATE order_details SET notes= '$notes' WHERE inv_id='$order_id'");



echo "<script>alert('Added note Successfully!')</script>";

$redirectUrl = "../view-order.php?id=$order_id&flag=2";

	echo "<script type=\"text/javascript\">";

        echo "window.location.href = '$redirectUrl'";

        echo "</script>";



?>