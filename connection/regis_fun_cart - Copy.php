<?php
include '../db/db.php';

if (array_key_exists('user_reg', $_POST)) {
		$title = htmlspecialchars(trim($_POST['title']), ENT_QUOTES, 'UTF-8');
		$nic = htmlspecialchars(trim($_POST['nic']), ENT_QUOTES, 'UTF-8');
		$add1 = htmlspecialchars(trim($_POST['address']), ENT_QUOTES, 'UTF-8');
		$ht = htmlspecialchars(trim($_POST['town']), ENT_QUOTES, 'UTF-8');
		$year = htmlspecialchars(trim($_POST['year']), ENT_QUOTES, 'UTF-8');
		$month = htmlspecialchars(trim($_POST['month']), ENT_QUOTES, 'UTF-8');
		$day = htmlspecialchars(trim($_POST['date']), ENT_QUOTES, 'UTF-8');
		$country = htmlspecialchars(trim($_POST['country']), ENT_QUOTES, 'UTF-8');
		$home = htmlspecialchars(trim($_POST['telno']), ENT_QUOTES, 'UTF-8');
		$mobi = htmlspecialchars(trim($_POST['mobno']), ENT_QUOTES, 'UTF-8');
		$eadd = htmlspecialchars(trim($_POST['email']), ENT_QUOTES, 'UTF-8');
		$eadd2 = htmlspecialchars(trim($_POST['confirm']), ENT_QUOTES, 'UTF-8');
		
		$usern = htmlspecialchars(trim($_POST['user']), ENT_QUOTES, 'UTF-8');
		$password = htmlspecialchars(trim($_POST['password']), ENT_QUOTES, 'UTF-8');
		$pass = htmlspecialchars(trim($_POST['conpass']), ENT_QUOTES, 'UTF-8');
		//$pass_with_sha = sha1($password);	 
	
	if (isset($_POST['regisno']))	
		{
		$bno = htmlspecialchars(trim($_POST['regisno']), ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['b_name']))	
		{
		$bname = htmlspecialchars(trim($_POST['b_name']), ENT_QUOTES, 'UTF-8');
		}
		if (isset($_POST['badd']))	
		{
		$badd = htmlspecialchars(trim($_POST['badd']), ENT_QUOTES, 'UTF-8');
		}
		
$sql3="SELECT * FROM cust";
$result3=mysqli_query($conn,$sql3); 

while($row = mysqli_fetch_array($result3)){
$nicid=$row['nic'];                                       
}	
	
$sql2="SELECT * FROM user";
$result2=mysqli_query($conn,$sql2); 

while($row = mysqli_fetch_array($result2)){
$val=$row['user'];                                       
}

 if ($usern==$val){
 echo "<script>alert('User Name Already Exist!')</script>";
$redirectUrl = "../regis_cart.php";
echo "<script type=\"text/javascript\">";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";  

}

else if ($nic==$nicid){
 echo "<script>alert('Nic Name Already Exist!')</script>";
$redirectUrl = "../regis_cart.php";
echo "<script type=\"text/javascript\">";
      echo "window.location.href = '$redirectUrl'";
        echo "</script>";  

}

else if($password != $pass){
 echo "<script>alert('Password Not Match!')</script>";
$redirectUrl = "../regis_cart.php";
echo "<script type=\"text/javascript\">";
      echo "window.location.href = '$redirectUrl'";
        echo "</script>"; 


}

else if($eadd !=$eadd2){
echo "<script>alert('Email Not Match!')</script>";
$redirectUrl = "../regis_cart.php";
echo "<script type=\"text/javascript\">";
      echo "window.location.href = '$redirectUrl'";
        echo "</script>"; 


}
else
{	
		
		$repair = htmlspecialchars(trim($_POST['repair']), ENT_QUOTES, 'UTF-8');	
		
		$comm = htmlspecialchars(trim($_POST['communi']), ENT_QUOTES, 'UTF-8');	
	
		$outlet = htmlspecialchars(trim($_POST['sales']), ENT_QUOTES, 'UTF-8'); 	
		
		$other = htmlspecialchars(trim($_POST['other']), ENT_QUOTES, 'UTF-8');	


$sql=mysqli_query($conn,"INSERT INTO cust(title,add1,district,home,mobi,eadd,br,usern,password,nic,country,year,month,day,town,bno,bname,badd,repair,comm,outlet,order_id,other) 
VALUES ('$title','$add1','','$home','$mobi','$eadd','','$usern','$password','$nic','$country','$year','$month','$day','$ht','$bno','$bname','$badd','$repair','$comm','$outlet','1','$other')");


 $sql1=mysqli_query($conn,"INSERT INTO user(user,pws,val,order_id) 
VALUES ('$usern','$password','$usern','1')");

	if($sql1) {

			$sqlu = mysqli_query($conn, "SELECT * FROM user WHERE user='$usern'");	

			$row = mysqli_fetch_assoc($sqlu);

			$_SESSION['user'] = $row['user'];

			//$_SESSION['id'] = $row['id'];

$response['status'] = 'ok';


		}

	
		else{

$response['status'] = 'error';
		
		}

		echo json_encode($response);

		//echo "In";
}

}
?>
