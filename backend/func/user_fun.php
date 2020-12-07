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
//////////////////////////////// * Bulk Delete * ///////////////////////////////////////////////
    if (array_key_exists('option_map', $_POST)) {
      
      if (isset($_POST['option'])) {  

        foreach ($_POST['option'] as $value) {
          $sql1 = "DELETE FROM cust WHERE id='$value'";
          $data=mysqli_query($conn, $sql1); 
        }
    }
      
      if ($data) {
            echo json_encode(array("msgType" => 1, "msg" => "Successfully Deleted")); //if sql result true pass magType1
        } else {
            echo json_encode(array("msgType" => 2, "msg" => "Sorry! Could not be Save your Data")); //if sql result true pass magType2
        }
    }
}
?>