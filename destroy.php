<?php
session_start();
unset($_SESSION['user']);unset($_SESSION['temp_user']);
session_destroy();
echo "<script>alert('Thank you for visiting!')</script>";
$redirectUrl = "index.php";
echo "<script type=\"text/javascript\">";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>"; 
		
?>
