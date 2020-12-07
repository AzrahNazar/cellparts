<?php 
session_start();
include '../../db/db.php';
if(isset($_SESSION['user'])) {
	$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');	

} else {
	$log = '';
}

if(empty($log)) {
	$redirectUrl = "../../login";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";

} else {
	$sqlu = "SELECT id FROM cust WHERE usern='$log'";
	$resultu = mysqli_query($conn, $sqlu);
	$countu = mysqli_num_rows($resultu);
	
	if($countu == 1) {	
		$row = mysqli_fetch_array($resultu);
		$uid = $row['id'];
		
		date_default_timezone_set('Asia/Colombo');
		$date = date('Y-m-d H:i:s');

		/****************************** Update Acc Details **********************************/

		if (isset($_POST['update_btn'])) {
			$title = htmlspecialchars(strip_tags(trim($_POST['title'])), ENT_QUOTES, 'UTF-8');
			$fname = htmlspecialchars(strip_tags(trim($_POST['firstname'])), ENT_QUOTES, 'UTF-8');
			$lname = htmlspecialchars(strip_tags(trim($_POST['lastname'])), ENT_QUOTES, 'UTF-8');
			$home_no = htmlspecialchars(strip_tags(trim($_POST['home_no'])), ENT_QUOTES, 'UTF-8');
			$email = htmlspecialchars(strip_tags(trim($_POST['email'])), ENT_QUOTES, 'UTF-8');
			$address = htmlspecialchars(strip_tags(trim($_POST['address'])), ENT_QUOTES, 'UTF-8');
			$city = htmlspecialchars(strip_tags(trim($_POST['city'])), ENT_QUOTES, 'UTF-8');
			$tel_no = htmlspecialchars(strip_tags(trim($_POST['tel_no'])), ENT_QUOTES, 'UTF-8');

			$sql = "UPDATE cust SET title='$title', nic='$fname', lname='$lname', mobi='$tel_no', home='$home_no', eadd='$email', add1='$address', town='$city' WHERE id=$uid";
			
			if (mysqli_query($conn, $sql)) { 
				$response['status'] = '1';
		  
			} else {
				  $response['status'] = 'error';
				  // wrong details
				  $response['message'] = 'Something went wrong, please try again later...';
			}
			
			echo json_encode($response);
		}
		
		/****************************** Update Password **********************************/

		if (isset($_POST['update_pw'])) {
			$pw = htmlspecialchars(strip_tags(trim($_POST['password'])), ENT_QUOTES, 'UTF-8');
			$password = hash('sha256', $pw);

			if(!empty($pw)) {
				$sql = "UPDATE user SET pws='$password' WHERE user='$log'";
				if (mysqli_query($conn, $sql)) { 
					$response['status'] = '1';
			  
				} else {
					  $response['status'] = 'error';
					  // wrong details
					  $response['message'] = 'Something went wrong, please try again later...';
				}
			
			} else {
				$response['status'] = 'error';
				// wrong details
				$response['message'] = 'Something went wrong, please try again later...';
			}
			
			echo json_encode($response);
		}
		
		/****************** Deliver Order Finish ***************************************/
		
		if (array_key_exists('deliver_confirm_order', $_POST)) {
			$row_id = htmlspecialchars(trim($_POST['row_id']), ENT_QUOTES, 'UTF-8');
			
			$sql = "UPDATE order_details SET order_status ='4', date_del_confirm='$date', user='' WHERE id= '$row_id'";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$response['status'] = "ok";
			
			} else {
				$response['status'] = "err";
			}
			echo json_encode($response);
		}
		
		/****************** Remove wish list Item ***************************************/
		
		if (array_key_exists('remove_wishlist_item', $_POST)) {
			$row_id = htmlspecialchars(trim($_POST['row_id']), ENT_QUOTES, 'UTF-8');
			
			$sql = "DELETE FROM wish_list WHERE id= '$row_id' AND user_id='$uid'";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				$response['status'] = "ok";
			
			} else {
				$response['status'] = "err";
			}
			echo json_encode($response);
		}
		
		/***************************************************************************/
	
	} else {
		$redirectUrl = "../../destroy.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	}
}		
?>