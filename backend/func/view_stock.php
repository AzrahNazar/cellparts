<?php
session_start();
include '../../db/db.php';

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

// if (empty($log)) {
     
// 	$redirectUrl = "../../login.php";
// 	echo "<script type=\"text/javascript\">";
// 	echo "window.location.href = '$redirectUrl'";
// 	echo "</script>";
	 
// }else{

// 	$sqlu="SELECT * FROM user WHERE user='$log'";
// 	$resultu=mysqli_query($conn,$sqlu);
// 	$countu=mysqli_num_rows($resultu);
// 	if($countu==1){

// 		//$id = htmlspecialchars(trim($_GET['icode']), ENT_QUOTES, 'UTF-8');
// 		//$subc = htmlspecialchars(trim($_GET['subc']), ENT_QUOTES, 'UTF-8');

// 		// $redirectUrl = "../stock.php?subc=$subc";
// 		// echo "<script type=\"text/javascript\">";
// 		// echo "window.location.href = '$redirectUrl'";
// 		// echo "</script>";
// 	}


// }
/****************************** View_Panel New Arrival*************************************/
		
		if (array_key_exists('View_Panel', $_POST)) {
			$itm_code = htmlspecialchars(strip_tags(trim($_POST['ID'])), ENT_QUOTES, 'UTF-8');
			$flag = htmlspecialchars(strip_tags(trim($_POST['flag'])), ENT_QUOTES, 'UTF-8');

			$sql = "UPDATE books SET new_arrival = $flag WHERE itemcode = '$itm_code'";
			$stmt_log = mysqli_query( $conn, $sql);
			if( $stmt_log === false ) {
				echo json_encode(array("msgType" => 2, "msg" => "Error"));
			
			} else {
				echo json_encode(array("msgType" => 1, "msg" => "Success"));
			}
		}

/****************************** View_Panel Accessories*************************************/
		
		if (array_key_exists('View_Panel2', $_POST)) {
			$itm_code = htmlspecialchars(strip_tags(trim($_POST['ID'])), ENT_QUOTES, 'UTF-8');
			$flag = htmlspecialchars(strip_tags(trim($_POST['flag'])), ENT_QUOTES, 'UTF-8');

			$sql = "UPDATE books SET accessories = $flag WHERE itemcode = '$itm_code'";
			$stmt_log = mysqli_query( $conn, $sql);
			if( $stmt_log === false ) {
				echo json_encode(array("msgType" => 2, "msg" => "Error"));
			
			} else {
				echo json_encode(array("msgType" => 1, "msg" => "Success"));
			}
		}

/****************************** View_Panel Car Accessories*************************************/
		
		if (array_key_exists('View_Panel3', $_POST)) {
			$itm_code = htmlspecialchars(strip_tags(trim($_POST['ID'])), ENT_QUOTES, 'UTF-8');
			$flag = htmlspecialchars(strip_tags(trim($_POST['flag'])), ENT_QUOTES, 'UTF-8');

			$sql = "UPDATE books SET car_access = $flag WHERE itemcode = '$itm_code'";
			$stmt_log = mysqli_query( $conn, $sql);
			if( $stmt_log === false ) {
				echo json_encode(array("msgType" => 2, "msg" => "Error"));
			
			} else {
				echo json_encode(array("msgType" => 1, "msg" => "Success"));
			}
		}
?>



