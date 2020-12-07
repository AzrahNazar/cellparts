<?php
include "../../db/db.php";
session_start();
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
if (empty($log)) {
     
	 $redirectUrl = "../login.php";
echo "<script type=\"text/javascript\">";
      echo "window.location.href = '$redirectUrl'";
        echo "</script>";
	 
  }
  else
  
  {

$sqlu="SELECT * FROM user WHERE user='$log'";
$resultu=mysqli_query($conn, $sqlu);
$countu=mysqli_num_rows($resultu);

	if($countu==1){
	
		$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
		$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
		$price = htmlspecialchars(trim($_POST['price']), ENT_QUOTES, 'UTF-8');
		$wprice = htmlspecialchars(trim($_POST['wprice']), ENT_QUOTES, 'UTF-8');
		$details = htmlspecialchars(trim($_POST['details']), ENT_QUOTES, 'UTF-8');
		
		
		
		$query1 = mysqli_query($conn,"SELECT name FROM home_forth WHERE name='$name' and bid!='$id'");
		$query2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT img FROM home_forth WHERE bid='$id'"));
		
		if (mysqli_num_rows($query1)!= 0){
			echo "<script>alert('Product Already Exists!')</script>";
			$redirectUrl = "../arrivals.php?id=$id";
			echo "<script type=\"text/javascript\">";
			echo "window.location.href = '$redirectUrl'";
			echo "</script>";  	 
		
		} else  { 
			
			function GetImageExtension($imagetype)
			 {
			   if(empty($imagetype)) return false;
			   switch($imagetype)
			   {
				   case 'image/bmp': return '.bmp';
				   case 'image/gif': return '.gif';
				   case 'image/jpeg': return '.jpg';
				   case 'image/png': return '.png';
				   default: return false;
			   }
			 } 
			 
			 if (!empty($_FILES["file"]["name"])) {
			 	
				$path = "../../images/new_p/".$query2['img'];
				$files = glob($path);
				
				foreach($files as $file) {
					unlink($file);
				}
			
				$file_name = htmlspecialchars(trim($_FILES["file"]["name"]), ENT_QUOTES, 'UTF-8'); //$_FILES["file"]["name"];
				$temp_name=$_FILES["file"]["tmp_name"];
				$imgtype=$_FILES["file"]["type"];
				$ext= GetImageExtension($imgtype);
				//$imagename="$reg_no".$ext;
				
				$final_image = rand(1000,1000000).strtolower($file_name);
				$target_path = "../../images/new_p/".$final_image;
				
				
				
				
					
					if(move_uploaded_file($temp_name, $target_path)) {
		
						$query_upload="UPDATE home_forth SET name='$name', price='$price', img='$final_image', details='$details', wprice='$wprice' WHERE bid='$id'";
					
						$redirectUrl = "../arrivals.php";
						echo "<script type=\"text/javascript\">";
						echo "window.location.href = '$redirectUrl'";
						echo "</script>"; 
						
						mysqli_query($conn,$query_upload) or die(mysqli_error($conn));  
					
					}else{				
						exit("Error While uploading image on the server");
					} 
				
			}

			else {
				$query = mysqli_query($conn,"UPDATE home_forth SET name='$name', price='$price', details='$details', wprice='$wprice' WHERE bid='$id'");
					
				$redirectUrl = "../arrivals.php";
				echo "<script type=\"text/javascript\">";
				echo "window.location.href = '$redirectUrl'";
				echo "</script>";			
			}	
		}	
	
	} else{
		$redirectUrl = "../../index.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	}
}
?>