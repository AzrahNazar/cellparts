<?php
$servername = "localhost";
$database = "cellparts_testdb";
$username = "cellparts_testuser";
$password = "Cellparts@3212";
 
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);

 if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
 }

?>
