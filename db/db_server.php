<?php
$servername = "localhost";
$database = "cellparts_cellparts";
$username = "cellparts_cellparts";
$password = "Cel77557";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

 if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
 }
 
// username and password sent from form 
// username and password sent from form 
$myusername=isset($_POST['myusername'])?$_POST['myusername']:''; 
$mypassword=isset($_POST['mypassword'])?$_POST['mypassword']:'';

// To protect mysqli injection (more detail about mysqli injection)
//$myusername = stripslashes($myusername);
//$mypassword = stripslashes($mypassword);
$myusername = mysqli_real_escape_string($conn,$myusername);
$mypassword = mysqli_real_escape_string($conn,$mypassword);



?>
