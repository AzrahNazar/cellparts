<?php
include "db/db.php"; 
session_start();

if (isset($_SESSION['user']))
{
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
$uid=htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');
$sql2="SELECT * FROM send_mail";
$result2=mysqli_query($conn,$sql2);

while($row = mysqli_fetch_array($result2)){
$mail=$row['mail'];

}

$id=htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');


$fname=htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');

$lname=htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');

$add1=htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');

$town=htmlspecialchars(trim($_POST['city']), ENT_QUOTES, 'UTF-8');

// $zip=htmlspecialchars(trim($_POST['zip']), ENT_QUOTES, 'UTF-8');

$mobi=htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8');

$home=htmlspecialchars(trim($_POST['tele']), ENT_QUOTES, 'UTF-8');

$eadd=htmlspecialchars(trim($_POST['eadd']), ENT_QUOTES, 'UTF-8');




$sqlm="SELECT * FROM live_cart where User_ID='$id' AND flag!='0'";
$resultm=mysqli_query($conn,$sqlm);

while ($row = mysqli_fetch_array($resultm)){
 
$item= $row['order_id'];

$invo = $row['inv_id'];


 
 }
 
$sqlr= mysqli_query($conn,"INSERT INTO order_details_temp(inv_id,User_ID,fname,lname,Tel_no,Mob_no,email,address,town,zip,status) 
VALUES ('$invo','$id','$fname','$lname','$home','$mobi','$eadd','$add1','$town','$zip','order pending')"); 


//$sql2=mysqli_query($conn,"INSERT INTO cart_details (select * from live_cart where User_ID='$id')");

//$sql3=mysqli_query($conn,"delete from live_cart where User_ID='$id'");
//$sqlm=mysqli_query($conn,"UPDATE cust SET order_id = order_id + 1  WHERE id='$id'");


echo "<script>alert('Order request confirmed')</script>";
$redirectUrl = "index.php";
	echo "<script type=\"text/javascript\">";
   	echo "window.location.href = '$redirectUrl'";
    echo "</script>";



}
 if (empty($log)) {
	 
	 
$id=htmlspecialchars(trim($_SESSION['gest_user']), ENT_QUOTES, 'UTF-8');
$sql2="SELECT * FROM send_mail";
$result2=mysqli_query($conn,$sql2);

while($row = mysqli_fetch_array($result2)){
$mail=$row['mail'];

}

$fname=htmlspecialchars(trim($_POST['fname']), ENT_QUOTES, 'UTF-8');

$lname=htmlspecialchars(trim($_POST['lname']), ENT_QUOTES, 'UTF-8');

$add1=htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');

$town=htmlspecialchars(trim($_POST['town']), ENT_QUOTES, 'UTF-8');

$zip=htmlspecialchars(trim($_POST['zip']), ENT_QUOTES, 'UTF-8');

$mobi=htmlspecialchars(trim($_POST['mobile']), ENT_QUOTES, 'UTF-8');

$home=htmlspecialchars(trim($_POST['tele']), ENT_QUOTES, 'UTF-8');

$eadd=htmlspecialchars(trim($_POST['eadd']), ENT_QUOTES, 'UTF-8');




$sqlm="SELECT * FROM live_cart where User_ID='$id' AND flag!='0'";
$resultm=mysqli_query($conn,$sqlm);

while ($row = mysqli_fetch_array($resultm)){
 
$item= $row['order_id'];
 
$invo = $row['inv_id']; 


 }

$sqlr= mysqli_query($conn,"INSERT INTO order_details_temp(inv_id,User_ID,fname,lname,Tel_no,Mob_no,email,address,town,zip,status) 
VALUES ('$invo','$id','$fname','$lname','$home','$mobi','$eadd','$add1','$town','$zip','order pending')"); 

//$sql2=mysqli_query($conn,"INSERT INTO cart_details (select * from live_cart where User_ID='$id')");

//$sql3=mysqli_query($conn,"delete from live_cart where User_ID='$id'");


echo "<script>alert('Order request confirmed')</script>";
$redirectUrl = "index.php";
	echo "<script type=\"text/javascript\">";
  echo "window.location.href = '$redirectUrl'";
        echo "</script>";


  }
  



?>
