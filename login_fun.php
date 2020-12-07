<?php
	session_start();
	header('Content-type: application/json');
	include_once 'db/db.php';
	$response = array();

	if ($_POST) {
		
		$user = trim($_POST['user']);
		$pass = trim($_POST['password']);
		
		$uname = htmlspecialchars(strip_tags($user), ENT_QUOTES, 'UTF-8');
		$upass = htmlspecialchars(strip_tags($pass), ENT_QUOTES, 'UTF-8');
		
		$password = hash('sha256', $upass);

		$sql = "SELECT user,pws FROM user WHERE user='$uname' AND val!='admin'";
		$stmt = mysqli_query( $conn, $sql);

		$row_count = mysqli_num_rows( $stmt );
		$row = mysqli_fetch_array($stmt);

		$sqlcu = "SELECT * FROM cust WHERE usern='$uname' AND flag=1";
		$resultcu = mysqli_query($conn, $sqlcu);
		$row_countc = mysqli_num_rows( $resultcu );

		if($row_countc  == 1) {			
			
			if($row['pws'] == $password){
				
				$sqlu = "SELECT id, order_id FROM cust WHERE usern='$uname' AND flag=1";
				$resultu = mysqli_fetch_assoc(mysqli_query($conn, $sqlu));
				
				$uid = $resultu['id'];
				$oid = $resultu['order_id'];
				$inv_cart = $uid."_".$oid;
				
				if (isset($_SESSION['temp_user'])) {
					$tmp_id = htmlspecialchars(strip_tags(trim($_SESSION['temp_user'])), ENT_QUOTES, 'UTF-8');
					
					$sql_invo = mysqli_query($conn, "SELECT inv_id FROM live_cart WHERE User_ID='$uid'");
					if(mysqli_num_rows($sql_invo) == 0) {
						$sql_up = "UPDATE live_cart SET User_ID='$uid', inv_id='$inv_cart', order_id='$oid', tmp_id=0 WHERE tmp_id=$tmp_id";			
					
					} else {
						$row_invo = mysqli_fetch_assoc($sql_invo);
						// $inv_cart = $row_invo['inv_id'];
						$sql_up = "UPDATE live_cart SET User_ID='$uid', inv_id='$inv_cart', order_id='$oid', tmp_id=0 WHERE tmp_id=$tmp_id";				
					}
					
					$sqlt = mysqli_query($conn, "SELECT
		live_cart.inv_id
		FROM
		live_cart
		Inner Join order_details_temp ON order_details_temp.inv_id = live_cart.inv_id
		WHERE
		live_cart.tmp_id = $tmp_id");
					if(mysqli_num_rows($sqlt) == 0) {
						
					} else {
						$row_inv = mysqli_fetch_assoc($sqlt);
						$inv = $row_inv['inv_id'];
					}
					
					if (mysqli_query($conn, $sql_up)) {
						if(mysqli_num_rows($sqlt) == 0) {
							
						} else {
							mysqli_query($conn, "UPDATE order_details_temp SET User_ID='$uid', guest=0 WHERE User_ID=$tmp_id AND inv_id='$inv'");
						}
						
						//unset($_SESSION['temp_user']);
						unset($_SESSION['gest_user']);
									
						$response['status'] = 'ok';
						$_SESSION['user'] = $row['user'];
					}	
				
				} else {
					$sql_invo = mysqli_query($conn, "SELECT inv_id FROM live_cart WHERE User_ID = $uid");
					if(mysqli_num_rows($sql_invo) == 0) {
					
					} else {
						$row_invo = mysqli_fetch_assoc($sql_invo);
						$inv = $row_invo['inv_id'];
						mysqli_query($conn, "UPDATE live_cart SET inv_id='$inv' WHERE User_ID = $uid");
					}			
					
					$response['status'] = 'ok'; // log in
					$_SESSION['user'] = $row['user'];
				}
				
			} else {

				$response['status'] = 'error';
				 // wrong details
				$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Username or Password does not match.';
			}

		}else{
			
			$response['status'] = 'error';
			// wrong details
			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Username or Password does not match.'; 
		}
		
	}
	
	echo json_encode($response);
?>