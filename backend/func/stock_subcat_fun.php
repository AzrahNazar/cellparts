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

		/*******************************************************************/
		
		if (array_key_exists('add_wrapping', $_POST)) {
			$id  = htmlspecialchars(strip_tags(trim($_POST['id'])), ENT_QUOTES, 'UTF-8');

			$sql = "UPDATE scat SET wrapping='1' WHERE sccode='$id'";
			$stmt_log = mysqli_query( $conn, $sql);
			if( $stmt_log === false ) {
				echo json_encode(array("msgType" => 2, "msg" => "Error"));
			
			} else {
				echo json_encode(array("msgType" => 1, "msg" => "Success"));
			}
		}


		if (array_key_exists('del_wrapping', $_POST)) {
			$id  = htmlspecialchars(strip_tags(trim($_POST['id'])), ENT_QUOTES, 'UTF-8');

			$sql = "UPDATE scat SET wrapping='0' WHERE sccode='$id'";
			$stmt_log = mysqli_query( $conn, $sql);
			if( $stmt_log === false ) {
				echo json_encode(array("msgType" => 2, "msg" => "Error"));
			
			} else {
				echo json_encode(array("msgType" => 1, "msg" => "Success"));
			}
		}

			

	} else{

		$redirectUrl = "../../index.php";

		echo "<script type=\"text/javascript\">";

		echo "window.location.href = '$redirectUrl'";

		echo "</script>";

	

	}

}

?>