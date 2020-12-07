<?php
	session_start();
	header('Content-type: application/json');
	include_once '../db/db.php';
	$response = array();

	if ($_POST) {
		
		$user = trim($_POST['user']);
		$pass = trim($_POST['password']);
		
		$uname = htmlspecialchars(strip_tags($user), ENT_QUOTES, 'UTF-8');
		$upass = htmlspecialchars(strip_tags($pass), ENT_QUOTES, 'UTF-8');
		
		$password = hash('sha256', $upass);

		$sql = "SELECT user,pws FROM user WHERE user='$uname' AND (val='admin' OR val='user')";
		$stmt = mysqli_query( $conn, $sql);

		$row_count = mysqli_num_rows( $stmt );
		$row = mysqli_fetch_array($stmt);
		
		if($row_count == 1) {			
			
			if($row['pws'] == $password){
				
				$response['status'] = 'ok'; // log in
				$_SESSION['user'] = $row['user'];
			
			} else{
				$response['status'] = 'error';
				 // wrong details
				$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Username or Password does not match.'; 
			}
		}
		
		else{
			$response['status'] = 'error';
			// wrong details
			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Username or Password does not match.'; 
		}
		
	}
	
	echo json_encode($response);
?>