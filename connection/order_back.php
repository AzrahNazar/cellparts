<?php



include '../db/db.php';



session_start();



if (array_key_exists('change_log_id', $_POST)) {//data table

 echo $user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');


if(isset($_SESSION['temp_user'])){
  $tmp_id = htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
}
  $sql1 = "SELECT * FROM cust WHERE usern = '$user'";

  //echo $sql1;

  $result1 = mysqli_query($conn, $sql1);
  $row = mysqli_fetch_assoc($result1);

  $order_id = $row['order_id'];

  $uidcart = $row['id'];

  $inv_id = $uidcart."_".$order_id;

  $sql = "UPDATE live_cart SET User_ID='$uidcart' , inv_id = '$inv_id', order_id ='$order_id' WHERE tmp_id= '$tmp_id'";

  $result = mysqli_query($conn, $sql);

  if ($result) {

    unset($_SESSION['temp_user']);
    echo "Logo Database inserted";
  }
}



////////////// * validate cart items after login * ///////////////////////

if (array_key_exists('reg_log_id', $_POST)) {//data table



  $user = htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

  

  $tmp_id=htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8');
  

  $sql1 = "SELECT * FROM cust WHERE usern = '$user'";



  echo $sql1;



  $result1 = mysqli_query($conn, $sql1);



  $row = mysqli_fetch_assoc($result1);





  $order_id = $row['order_id'];

  $uidcart = $row['id'];



  $inv_id = $uidcart."_".$order_id;





  $sql = "UPDATE live_cart SET User_ID='$uidcart' , inv_id = '$inv_id' WHERE tmp_id= '$tmp_id'";



  $result = mysqli_query($conn, $sql);



  if ($result) {




    unset($_SESSION['temp_user']);

	



    echo "Logo Database inserted";



  }



}





?>