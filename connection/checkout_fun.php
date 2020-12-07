<?php 
include '../db/db.php';
session_start();
	
if (isset($_SESSION['user'])) {
	$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');
	$sqlu = "SELECT id FROM cust WHERE usern='$log'";
	$resultu = mysqli_fetch_assoc(mysqli_query($conn, $sqlu));
	$user_id = $resultu['id'];
	
	$whr = 'User_ID';
	$guest = 0;

} else if (isset($_SESSION['temp_user'])) {
	$user_id = htmlspecialchars(strip_tags(trim($_SESSION['temp_user'])), ENT_QUOTES, 'UTF-8');
	$whr = 'tmp_id';
	$guest = 1;
}

$sql = mysqli_query($conn, "SELECT inv_id, SUM(price*Qty) AS tot FROM live_cart WHERE $whr=$user_id AND flag!='0'");
if(mysqli_num_rows($sql) == 1) {
	
	$row = mysqli_fetch_assoc($sql);
	$inv_id = $row['inv_id'];
	$tot = $row['tot'];

	date_default_timezone_set('Asia/Colombo');
	$date = date('Y-m-d');

	if (isset($_SESSION['user']) || isset($_SESSION['gest_user'])) {
	
		/****************************** Get Checkout Details **********************************/
		
		if (array_key_exists('get_chkout_data', $_POST)) {
			$sql_tmp = "SELECT fname, lname, Tel_no, Mob_no, email, address, town FROM order_details_temp WHERE inv_id='$inv_id'";
			$result_tmp = mysqli_query($conn, $sql_tmp);	
		
			if(mysqli_num_rows($result_tmp) == 1) {
				$sqltmp = mysqli_fetch_assoc($result_tmp);
				echo json_encode($sqltmp);
	
			} else {
				if (isset($_SESSION['user'])) {
					$sql = mysqli_query($conn, "SELECT nic AS fname, lname, home AS Tel_no, mobi AS Mob_no, eadd AS email, add1 AS address, town FROM cust WHERE usern='$log'");
					$row = mysqli_fetch_assoc($sql);
					echo json_encode($row);
				
				} else {
					echo json_encode('');
				}
			}
		}

		/****************************** Checkout **********************************/
	
		if (isset($_POST['btn_checkout'])) {

			$fname = htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');
			$lname = htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');
			$tel_no = htmlspecialchars(trim($_POST['tele']), ENT_QUOTES, 'UTF-8');
			$mobile = htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8');
			$address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
			$city = htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8');
			$email = htmlspecialchars(trim($_POST['eadd']), ENT_QUOTES, 'UTF-8');

			/**********************************************************************************************/

				$sqlu = "SELECT * FROM order_details_temp WHERE user_id = '$user_id' AND guest=$guest";
				$resultu = mysqli_query($conn, $sqlu);
				$countu = mysqli_num_rows($resultu);

				if($countu == 0) {
					$sql_add_order = "INSERT INTO order_details_temp SET inv_id='$inv_id', User_ID='$user_id', date='$date', fname='$fname', lname='$lname', Tel_no='$tel_no', Mob_no='$mobile', email='$email', address='$address', town='$city', guest=$guest, status='Order Pending', zip='0'";
					$result_add_order = mysqli_query($conn,$sql_add_order);

					if ($result_add_order) {
						$response['status'] = '1';
					
					} else {
						$response['status'] = '2';
						$response['message'] = 'MySQL Error! Please Try Again';
					}
				
				} else {
					$sql_add_order = "UPDATE order_details_temp SET date='$date', fname='$fname', lname='$lname', Tel_no='$tel_no', Mob_no='$mobile', email='$email', address='$address', town='$city', guest=$guest, inv_id='$inv_id', status='Order Pending' WHERE User_ID = '$user_id' AND guest=$guest";
					$result_add_order = mysqli_query($conn,$sql_add_order);

					if ($result_add_order) {
						$response['status'] = '1';
					
					} else {
						$response['status'] = '2';
						$response['message'] = 'MySQL Error! Please Try Again';
					}

				}
			
			echo json_encode($response);
		
		}	
		
		/****************************** // **********************************/
	
	} else {
		$response['status'] = '3'; // Session Expired
		//echo json_encode($response);
	}
	
	/************************************************************/
	
} else {
	$response['status'] = '3';
	echo json_encode($response);
}

?>