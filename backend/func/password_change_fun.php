<?php

	session_start();

	include '../backend/db/db.php';



	if (array_key_exists('user_login', $_POST)) {

		/*echo $_POST['uname'];*/

		$uname = htmlspecialchars(trim($_POST['un']), ENT_QUOTES, 'UTF-8');

		$pwd = htmlspecialchars(trim($_POST['pwd']), ENT_QUOTES, 'UTF-8');

		$upass = hash('sha1', $pwd);

		$sql = mysqli_query($conn, "SELECT * FROM details_of_users WHERE user='$uname'");	

		$row = mysqli_fetch_assoc($sql);

		

		if(mysqli_num_rows($sql) == 1) {	

			

			if($row['pass']==$upass){

				if ($row['val']==1) {
					$_SESSION['user'] = $row['user'];
					$response['status'] = 'admin';
				}
				if ($row['val']==3) {
					$response['status'] = 'ok'; // log in
					$_SESSION['normal_user'] = $row['user'];
					$_SESSION['normal_user_id'] = $row['id'];
				}

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

		echo json_encode($response);

		//echo "In";

	}



	if (array_key_exists('user_reg', $_POST)) {

		//echo("TEST");

		/*echo $_POST['uname'];*/

		//echo $_POST['lname'];

		$fname = htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');

		$lname = htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');

		$mobile = htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8');

		$email = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');

		$address = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');

		$pwd = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');

		$password = hash('sha1', $pwd);

		$sql = mysqli_query($conn, "INSERT INTO details_of_users VALUES (NULL , '$email' , '$password' , '3' , '0' ,'$fname', '$lname' , '$mobile','$address')");

		

		if($sql) {

			$sql = mysqli_query($conn, "SELECT * FROM details_of_users WHERE user='$email' and val=3");	

			$row = mysqli_fetch_assoc($sql);

			$_SESSION['normal_user'] = $row['user'];

			$_SESSION['normal_user_id'] = $row['id'];



			$response['status'] = 'ok';



		}

		

		else{

			$response['status'] = 'error';

			// wrong details

			$response['message'] = '<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Username or Password does not match.'; 

		}

		echo json_encode($response);

		//echo "In";

	}

?>