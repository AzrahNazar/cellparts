<?php 
include '../db/db.php';
session_start();

date_default_timezone_set('Asia/Colombo');
$date = date('Y-m-d');



/****************************** Add to wish list ***************************************/

if (array_key_exists('add_to_wishlist', $_POST)) {
	$itm_id = htmlspecialchars(strip_tags(trim($_POST['item_id'])), ENT_QUOTES, 'UTF-8');	


	if (isset($_SESSION['user']))
	{
		$user_id = htmlspecialchars(strip_tags(trim($_POST['uid'])), ENT_QUOTES, 'UTF-8');


		$x =  "SELECT * FROM wish_list WHERE user_id = $user_id AND item_id='$itm_id'";
		$sql_wh = mysqli_query($conn, $x);
		if(mysqli_num_rows($sql_wh) == 0) {
			$sql = "INSERT INTO wish_list SET user_id=$user_id, item_id='$itm_id', date='$date'";
			
			if(mysqli_query($conn, $sql)) {
				echo json_encode(array("msgType" => 1, "msg" => "success"));

			} else {
				echo json_encode(array("msgType" => 2, "msg" => "Sorry ! Could not be Save your Data"));
			}

		} else {
			echo json_encode(array("msgType" => 4, "msg" => "Already Exists!"));
		}

	} else {
		echo json_encode(array("msgType" => 3, "msg" => "login"));
	}
}



/****************************** Wish List Count ***************************************/
if (array_key_exists('wish_list_count', $_POST)) {
	$user_id = htmlspecialchars(strip_tags(trim($_POST['uid'])), ENT_QUOTES, 'UTF-8');

	$sql =  "SELECT COUNT(user_id) AS wish_cnt FROM wish_list WHERE user_id=$user_id";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$data[] = $row;
		}
	} else {
		$data = '';
	}

	echo json_encode($data);

}

?>