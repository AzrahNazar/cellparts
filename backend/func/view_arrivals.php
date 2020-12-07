<?php
session_start();
include '../../db/db.php';

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');


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

?>



