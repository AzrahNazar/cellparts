<?php

	include '../db/db.php';

	session_start();

////////////////////other products//////////////

	if (array_key_exists('add_to_cart', $_POST)) {

	
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');
	
		$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

		$itm_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		echo $sqls = "SELECT * FROM live_cart WHERE User_ID = '$user_id' AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);



			$sql = "INSERT INTO live_cart VALUES (NULL ,'$user_id','$itm_id', '".$rows['book']."', '".$rows['imgpath']."' ,'1', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','0','order pending','3')";

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

		$itm_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		$sqls = "SELECT * FROM live_cart WHERE tmp_id = $user_id AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


			$sql = "INSERT INTO live_cart VALUES (NULL ,'tmp_$user_id','$itm_id', '".$rows['book']."', '".$rows['imgpath']."' ,'1', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','$user_id','order pending','3')";

		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }
//////////////////////new arrivals///////////////////////////	
	
	
	if (array_key_exists('add_to_cart_new', $_POST)) {
		
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');
		
		$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

		$itm_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		$sqls = "SELECT * FROM live_cart WHERE User_ID = $user_id AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);



			$sql = "INSERT INTO live_cart VALUES (NULL ,'".$_POST['uid']."','$itm_id', '".$rows['book']."', '".$rows['imgpath']."' ,'1', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','0','order pending','1')";

		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }


    if (array_key_exists('add_to_cart_new_temp', $_POST)) {

    	// $_SESSION['temp_user'];

    	

    	$tmp_id=htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');


		$user_id = $tmp_id;

		$itm_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		$sqls = "SELECT * FROM live_cart WHERE tmp_id = $user_id AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


			$sql = "INSERT INTO live_cart VALUES (NULL ,'tmp_$user_id','$itm_id', '".$rows['book']."', '".$rows['imgpath']."' ,'1', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','$user_id','order pending','1')";

		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }	
	//////////////////////accessories add to cart///////////////////////////	
	
	
	if (array_key_exists('add_to_acc', $_POST)) {
		
		$user_id = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');

		$user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

		$itm_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		$sqls = "SELECT * FROM live_cart WHERE User_ID = $user_id AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);



			$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);



			$sql = "INSERT INTO live_cart VALUES (NULL ,'".$_POST['uid']."','$itm_id', '".$rows['book']."', '".$rows['imgpath']."' ,'1', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','0','order pending','2')";

		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }

    if (array_key_exists('add_to_acc_temp', $_POST)) {

    	// $_SESSION['temp_user'];

    	$tmp_id = htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
    	



		$user_id = $tmp_id;

		$itm_id = htmlspecialchars(trim($_POST['id']), ENT_QUOTES, 'UTF-8');

		$sqls = "SELECT * FROM live_cart WHERE tmp_id = $user_id AND Item_Code = '$itm_id'";

		//echo $sqls;

		$resultc = mysqli_query($conn, $sqls);

		//echo $sqls;

		//var_dump(mysqli_query($conn, $query));

		$row = mysqli_fetch_assoc($resultc);

		if ($row == 0) {

			$sqls = "SELECT * FROM bookinfo WHERE itemcode = '$itm_id'";

			$results = mysqli_query($conn, $sqls);

			$rows = mysqli_fetch_assoc($results);


			echo$sqlu = "SELECT * FROM cust WHERE id = '$user_id'";

			$resultu = mysqli_query($conn, $sqlu);

			$rowu = mysqli_fetch_assoc($resultu);


			echo$sql = "INSERT INTO live_cart VALUES (NULL ,'tmp_$user_id','$itm_id', '".$rows['book']."', '".$rows['imgpath']."' ,'1', '".$rows['price']."' , '$user_id"."_".$rowu['order_id']."','".$rowu['order_id']."','".date("Y-m-d")."','$user_id','order pending','2')";


		    //echo $sql;

		    $result = mysqli_query($conn, $sql);

		    //$row = mysqli_fetch_assoc($result);

		    echo "Add";

		}else{

			echo "Already Added!!!!";

		}

    }	
	
	?>