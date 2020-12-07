<?php
session_start();
unset($_SESSION['user']);

echo "<script>alert('Thank you for visiting!')</script>";
$redirectUrl = "login.php";
echo "<script type=\"text/javascript\">";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>"; 
		
?>
