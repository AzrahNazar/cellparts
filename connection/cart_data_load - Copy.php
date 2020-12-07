<?php

	include '../db/db.php';

	session_start();

	if (array_key_exists('cart_data_load', $_POST)) {//data table

        $user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');

		if (isset($_SESSION['user'])) {
			
			
			
$sqlu = "SELECT * FROM currency";
$data = array();
$resultu = mysqli_query($conn,$sqlu);
while ($rowu = mysqli_fetch_assoc($resultu)) {
	
	
$sql = "SELECT * FROM live_cart WHERE User_ID = '$user_id' ORDER BY id DESC" ;
$result = mysqli_query($conn,$sql);
		
		    while ($row = mysqli_fetch_assoc($result)) {
		     array_push($data, array('dollar' => $rowu['doller'], 'img' => $row['img'], 'Qty' => $row['Qty'], 'name' => $row['name'], 'price' => $row['price'],'id' => $row['id']));
		    }
	

	
}

		    echo json_encode($data);

		}

	}

if (array_key_exists('cart_data_load_show', $_POST)) {//data table

        $user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');

		if (isset($_SESSION['user'])) {
			
		$sqlu = "SELECT * FROM currency";
		$data = array();
		$resultu = mysqli_query($conn,$sqlu);
		while ($rowu = mysqli_fetch_assoc($resultu)) {
	
	
$sql = "SELECT * FROM live_cart WHERE User_ID = '$user_id' ORDER BY id DESC" ;
$result = mysqli_query($conn,$sql);
		
		    while ($row = mysqli_fetch_assoc($result)) {
		     array_push($data, array('dollar' => $rowu['doller'], 'img' => $row['img'], 'Qty' => $row['Qty'], 'name' => $row['name'], 'price' => $row['price'],'id' => $row['id']));
		    }
	

	
}

		    echo json_encode($data);

		}

	}
	
	if (array_key_exists('delete_cart_row', $_POST)) {//data table

		$id = htmlspecialchars(trim($_POST['id_for_delete']), ENT_QUOTES, 'UTF-8');

	    $sql = "DELETE FROM live_cart WHERE id=$id" ;

		//echo $sql;

	    $data = array();

	    $result = mysqli_query($conn,$sql);

	    if ($result) 
		{

	    $response['status'] = 'ok';

	    }
		else 
		{

	    	$response['status'] = 'error';

	    }

	    echo json_encode($data);

	}
	if (array_key_exists('delete_cart_top', $_POST)) {//data table

		$id = htmlspecialchars(trim($_POST['id_for_delete']), ENT_QUOTES, 'UTF-8');

	    $sql = "DELETE FROM live_cart WHERE id=$id" ;

		//echo $sql;

	    $data = array();

	    $result = mysqli_query($conn,$sql);

	    if ($result) 
		{

	    $response['status'] = 'ok';

	    }
		else 
		{

	    	$response['status'] = 'error';

	    }

	    echo json_encode($data);

	}
	
	if (array_key_exists('update_qty', $_POST)) {//data table

		$id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		$val = htmlspecialchars(trim($_POST['val']), ENT_QUOTES, 'UTF-8');

		//echo $val;

	    $sql = "UPDATE live_cart SET Qty='$val' WHERE id= '$id'";


	//echo $sql;


	    $result = mysqli_query($conn,$sql);

	    if ($result) {

	        $response['status'] = 'ok';

	    }else {

	    	$response['status'] = 'error';

	    }


	    echo json_encode($response);

	}

	

?>