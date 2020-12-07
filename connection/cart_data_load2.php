<?php

	include '../db/db.php';

	session_start();
if ((isset($_SESSION['user'])))
{
$user=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
}
if ((!isset($_SESSION['user'])))
{
$user=htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
}	

	
	
if (array_key_exists('cart_data_load', $_POST)) {//data table


if (!isset($_SESSION['user'])) {
			
			
$sqlu = "SELECT * FROM currency";
$data = array();
$resultu = mysqli_query($conn,$sqlu);
while ($rowu = mysqli_fetch_assoc($resultu)) {
	
	
$sql = "SELECT * FROM live_cart WHERE tmp_id = '".htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8')."' ORDER BY id DESC" ;

$result = mysqli_query($conn,$sql);
		
		    while ($row = mysqli_fetch_assoc($result)) {
		     array_push($data, array('dollar' => $rowu['doller'], 'img' => $row['img'], 'Qty' => $row['Qty'], 'name' => $row['name'], 'price' => $row['price'],'id' => $row['id'],'flag' => $row['flag']));
		    }
	
}

		    echo json_encode($data);	
	
		}
		
		else
		{
			
$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');	
			
$sqlu = "SELECT * FROM currency";
$data = array();
$resultu = mysqli_query($conn,$sqlu);
while ($rowu = mysqli_fetch_assoc($resultu)) {
	
	
$sql = "SELECT * FROM live_cart WHERE User_ID = '$user_id' ORDER BY id DESC" ;
$result = mysqli_query($conn,$sql);
		
		    while ($row = mysqli_fetch_assoc($result)) {
		     array_push($data, array('dollar' => $rowu['doller'], 'img' => $row['img'], 'Qty' => $row['Qty'], 'name' => $row['name'], 'price' => $row['price'],'id' => $row['id'],'flag' => $row['flag']));
		    }
	
}
		    echo json_encode($data);

		}

	}

if (array_key_exists('cart_data_load_show', $_POST)) {//data table


		if (isset($_SESSION['user'])) {
			
		$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');
		
		$sqlu = "SELECT * FROM currency";
		$data = array();
		$resultu = mysqli_query($conn,$sqlu);
		while ($rowu = mysqli_fetch_assoc($resultu)) {
	
	
		$sql = "SELECT * FROM live_cart WHERE User_ID = '$user_id' ORDER BY id DESC" ;
		$result = mysqli_query($conn,$sql);
		
		    while ($row = mysqli_fetch_assoc($result)) {
		     array_push($data, array('dollar' => $rowu['doller'], 'img' => $row['img'], 'Qty' => $row['Qty'], 'name' => $row['name'], 'price' => $row['price'],'id' => $row['id'],'flag' => $row['flag']));
		    }

}

		    echo json_encode($data);

		}
else 
{
	if (!isset($_SESSION['temp_user'])) {
	    $sql3 = "SELECT * FROM invoice_no";
	    $result3 = mysqli_query($conn,$sql3);
	    $row=mysqli_fetch_assoc($result3);

	    $_SESSION['temp_user'] = $row['token'];
	    $x = $row['token'];
	    $sql4 = "UPDATE invoice_no SET token='".++$x."'";
	    $result4 = mysqli_query($conn,$sql4);

	    $tmp = $_SESSION['temp_user'];
	    $user = $tmp;

	}else{
	    $user=htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
	}



		$sqlu = "SELECT * FROM currency";
		$data = array();
		$resultu = mysqli_query($conn,$sqlu);
		while ($rowu = mysqli_fetch_assoc($resultu)) {
	
			$sql = "SELECT * FROM live_cart WHERE tmp_id = '$user' ORDER BY id DESC" ;
			$result = mysqli_query($conn,$sql);
		
		    while ($row = mysqli_fetch_assoc($result)) {
		     array_push($data, array('dollar' => $rowu['doller'], 'img' => $row['img'], 'Qty' => $row['Qty'], 'name' => $row['name'], 'price' => $row['price'],'id' => $row['id'],'flag' => $row['flag']));
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

	    ///$response['status'] = 'ok';
		echo 'ok'; 

	    }
		else 
		{

	    	//$response['status'] = 'error';
			echo 'error';

	    }

	    //echo json_encode($data);

	}
	
	if (array_key_exists('update_qty', $_POST)) {//data table

		$id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		$val = htmlspecialchars(trim($_POST['val']), ENT_QUOTES, 'UTF-8');

		$s = "SELECT books.qty FROM live_cart Inner Join books ON live_cart.Item_Code = books.itemcode WHERE live_cart.id='$id'";
		$res = mysqli_query($conn,$s);
				
		$rw = mysqli_fetch_assoc($res);
		$qt = $rw['qty'];

		if($val <= $qt){

		    $sql = "UPDATE live_cart SET Qty='$val' WHERE id= '$id'";

		    $result = mysqli_query($conn,$sql);

		    if ($result) {

		        $response['status'] = 'ok';

		    }else {

		    	$response['status'] = 'error';

		    }
		}else{
			$response['status'] = 'qty exceed';
		}


	    echo json_encode($response);

	}
	


?>