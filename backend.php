<?php

include 'db/db.php';

session_start();

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');



$val=htmlspecialchars(trim($_SESSION['val']), ENT_QUOTES, 'UTF-8');

//echo $val;



 //$val == 'admin';





if (empty($log)) {



    $redirectUrl = "../login.php";

    echo "<script type=\"text/javascript\">";

    echo "window.location.href = '$redirectUrl'";

    echo "</script>";

} 

else 

{



    $sqlu = "SELECT * FROM user WHERE user='$log'";

    $resultu = mysqli_query($conn,$sqlu);

    $countu = mysqli_num_rows($resultu);

    if ($countu == 1) {



	$sql5 = "SELECT * FROM user WHERE user='$log'";

	$result5 = mysqli_query($conn,$sql5);

	

	while ($row5 = mysqli_fetch_array($result5)) {



	    $user = $row5['user'];

	}

$sql="SELECT * FROM send_mail";

$result=mysqli_query($conn,$sql);



while($row = mysqli_fetch_array($result)){

$eid = $row['id'];



}

if ($val=='admin') {

	

$redirectUrl = "backend/index.php";

echo "<script type=\"text/javascript\">";

echo "window.location.href = '$redirectUrl'";

echo "</script>";

	



}

else

{

$redirectUrl = "index.php";

echo "<script type=\"text/javascript\">";

echo "window.location.href = '$redirectUrl'";

echo "</script>";



	

}



    }

}





?>