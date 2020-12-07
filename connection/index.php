<?php

	include '../db/db.php';

	session_start();

	if (array_key_exists('add_to_cart', $_POST)) {

		$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');
		$itm_id = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');
		$qty = htmlspecialchars(trim($_POST['qty']), ENT_QUOTES, 'UTF-8');
		$flag = htmlspecialchars(trim($_POST['flag']), ENT_QUOTES, 'UTF-8');

		$sqls = "SELECT * FROM live_cart WHERE User_ID = '$user_id' AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = $itm_id";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


 
			$sql = "INSERT INTO live_cart VALUES (NULL ,'".$_POST['uid']."','".$_POST['pid']."', '".$rows['name']."' , '".$rows['img']."' ,'".$_POST['qty']."', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','0','order pending','$flag')";

		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }
	
	if (array_key_exists('add_to_cart_temp', $_POST)) {

		$_SESSION['temp_user'];
		
		$user_id = htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
		$itm_id = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');
		$qty = htmlspecialchars(trim($_POST['qty']), ENT_QUOTES, 'UTF-8');
		$flag = htmlspecialchars(trim($_POST['flag']), ENT_QUOTES, 'UTF-8');
		
		$sqls = "SELECT * FROM live_cart WHERE tmp_id = $user_id AND Item_Code = '$itm_id'";


		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = $itm_id";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


 
			$sql = "INSERT INTO live_cart VALUES (NULL ,'tmp_$user_id','".$_POST['pid']."', '".$rows['name']."' , '".$rows['img']."' ,'".$_POST['qty']."', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','$user_id', 'order pending','$flag')";

		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}
		
		else{

			echo "Already Added!!!!";

		}

    }	
	
	
	
	if (array_key_exists('add_to_cart_acc', $_POST)) {

		$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');
		$itm_id = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');
		$qty = htmlspecialchars(trim($_POST['qty']), ENT_QUOTES, 'UTF-8');
		$flag = htmlspecialchars(trim($_POST['flag']), ENT_QUOTES, 'UTF-8');
		
		$sqls = "SELECT * FROM live_cart WHERE User_ID = '$user_id' AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = $itm_id";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


 
			 $sql = "INSERT INTO live_cart VALUES (NULL ,'".$_POST['uid']."','".$_POST['pid']."', '".$rows['name']."' , '".$rows['img']."' ,'".$_POST['qty']."', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','0', 'order pending','$flag')";

		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }
	
		if (array_key_exists('add_to_cart_acc_temp', $_POST)) {

		$_SESSION['temp_user'];
		
		$user_id = htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
		$itm_id = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');
		$qty = htmlspecialchars(trim($_POST['qty']), ENT_QUOTES, 'UTF-8');
		$flag = htmlspecialchars(trim($_POST['flag']), ENT_QUOTES, 'UTF-8');
		
		$sqls = "SELECT * FROM live_cart WHERE tmp_id = $user_id AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = $itm_id";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);


			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


			$sql = "INSERT INTO live_cart VALUES (NULL ,'tmp_$user_id','".$_POST['pid']."', '".$rows['name']."' , '".$rows['img']."' ,'".$_POST['qty']."', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','$user_id', 'order pending','$flag')";

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }
	
	
		if (array_key_exists('add_to_cart_pro', $_POST)) {

		$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');
		$itm_id = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');
		$qty = htmlspecialchars(trim($_POST['qty']), ENT_QUOTES, 'UTF-8');
		$flag = htmlspecialchars(trim($_POST['flag']), ENT_QUOTES, 'UTF-8');
		
		$sqls = "SELECT * FROM live_cart WHERE User_ID = '$user_id' AND Item_Code = '$itm_id'";


		$resultc = mysqli_query($conn, $sqls);



		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);
			$avl_qty = $rows['qty'];



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";
			
			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);

			if($qty <= $avl_qty){
				$sql = "INSERT INTO live_cart VALUES (NULL ,'".$_POST['uid']."','".$_POST['pid']."', '".$rows['book']."', '".$rows['imgpath']."' ,'".$_POST['qty']."', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','0','order pending','$flag')";


			    $result = mysqli_query($conn, $sql);
				
			    //$row = mysqli_fetch_assoc($result);

			    echo "Add";
			}else{
				echo "Invalid Stock";
			}

		}else{

			echo "Already Added!!!!";

		}

    }
	
	
	if (array_key_exists('add_to_cart_pro_temp', $_POST)) {

		$_SESSION['temp_user'];
		
		 $user_id = htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
		 $itm_id = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');
		 $qty = htmlspecialchars(trim($_POST['qty']), ENT_QUOTES, 'UTF-8');
		 $flag = htmlspecialchars(trim($_POST['flag']), ENT_QUOTES, 'UTF-8');
		
		$sqls = "SELECT * FROM live_cart WHERE tmp_id = '$user_id' AND Item_Code = '$itm_id'";


		$resultc = mysqli_query($conn, $sqls);

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";
			
			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


			 $sql = "INSERT INTO live_cart VALUES (NULL ,'tmp_$user_id','".$_POST['pid']."', '".$rows['book']."', '".$rows['imgpath']."' ,'".$_POST['qty']."', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','$user_id','order pending','$flag')";

			

		    $result = mysqli_query($conn, $sql);
			

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }
	
////////cart quantity change////////////////////////////	
	
    if (array_key_exists('cart_no', $_POST)) {//data table
	
	//$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');

    	if (!isset($_SESSION['user'])) {

    		$tot = 0;

    		$sql = "SELECT Qty FROM live_cart WHERE tmp_id = '".htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8')."'" ;

		    $result = mysqli_query($conn,$sql);

		    while($rowu = mysqli_fetch_array($result)) {

		    	$tot = $tot + $rowu['Qty'];

		    }

		    echo json_encode($tot);

    	}
		else{

    		$tot = 0;

		    $sql = "SELECT Qty FROM live_cart WHERE User_ID = '".htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8')."'" ;

		    $result = mysqli_query($conn,$sql);

		    while($rowu = mysqli_fetch_array($result)) {

		    	$tot = $tot + $rowu['Qty'];

		    }

		    echo json_encode($tot);

		}

	}
	

?>