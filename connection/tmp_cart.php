<?php
    include '../db/db.php';

    session_start();


    if (array_key_exists('tmp_cat_add', $_POST)) {

        if (!isset($_SESSION['temp_user'])) {



            $sql3 = "SELECT * FROM invoice_no";



            $result3 = mysqli_query($conn,$sql3);



            $row=mysqli_fetch_assoc($result3);



            $_SESSION['temp_user'] = $row['token'];



            $x = $row['token'];





            $sql4 = "UPDATE invoice_no SET token='".++$x."'";



            $result4 = mysqli_query($conn,$sql4);



            //echo $_SESSION['temp_user'];



        }



        echo json_encode ($_SESSION['temp_user']);




    }

	

	

	

/*if (array_key_exists('item_exist_temp', $_POST)) {

	

	

if (isset($_SESSION['user'])) {

	

	

$uid = htmlspecialchars(trim($_POST['uid']), ENT_QUOTES, 'UTF-8');	

		

$pid = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');



	

$sql2 = "SELECT

count(Item_Code) as item_count

FROM

 live_cart  WHERE  live_cart.`User_ID`='$uid' AND live_cart.`Item_Code`='$pid'";

//echo $sql2;

   $result = mysqli_query($conn, $sql2);

    while ($row = mysqli_fetch_assoc($result)) {

	$data[] = $row;

    }

    echo json_encode($data);

}

else

{



	

$tmpid = htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');	

$pid = htmlspecialchars(trim($_POST['pid']), ENT_QUOTES, 'UTF-8');

	

$sql2 = "SELECT

count(Item_Code) as item_count

FROM

 live_cart  WHERE  live_cart.`tmp_id`='$tmpid' AND live_cart.`Item_Code`='$pid'";

//echo $sql2;

   $result = mysqli_query($conn, $sql2);

    while ($row = mysqli_fetch_assoc($result)) {

	$data[] = $row;

    }

    echo json_encode($data);	

	

}	





	

	

}	*/



?>