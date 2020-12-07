<?php
include "../../db/db.php";
session_start();
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
if (empty($log)) {
     
	 $redirectUrl = "../login.php";
echo "<script type=\"text/javascript\">";
      echo "window.location.href = '$redirectUrl'";
        echo "</script>";
	 
  }else{

$sqlu="SELECT * FROM user WHERE user='$log'";
$resultu=mysqli_query($conn, $sqlu);
$countu=mysqli_num_rows($resultu);

	if($countu==1){

		$link = htmlspecialchars(trim($_POST['link']), ENT_QUOTES, 'UTF-8');
	
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
			
				$file_name = htmlspecialchars(trim($_FILES["file"]["name"]), ENT_QUOTES, 'UTF-8');//$_FILES["file"]["name"];
				$temp_name=$_FILES["file"]["tmp_name"];
				$imgtype=$_FILES["file"]["type"];
				$ext= GetImageExtension($imgtype);
				//$imagename="$file_name".$ext;
				
				
				// can upload same image using rand function
				$final_image = rand(1000,1000000).strtolower($file_name);
				$target_path = "../../img/slider/".$final_image;
				
			
			
			
				  if(move_uploaded_file($temp_name, $target_path)) {
  
					  $query_upload="INSERT INTO banner SET img='$final_image', link='$link'";
					  echo "<script>alert('Details added successfully!')</script>";
					  $redirectUrl = "../banner-txt.php";
					  echo "<script type=\"text/javascript\">";
					  echo "window.location.href = '$redirectUrl'";
					  echo "</script>"; 
					  
					 mysqli_query($conn,$query_upload) or die(mysqli_error($conn));  
				  
				  }
				  else
				  {				
					  exit("Error While uploading image on the server");
				  } 
				
			}

			else {
				$query = mysqli_query($conn,"INSERT INTO vehicle SET name='$name', date='$date'");
				
				$redirectUrl = "../banner-txt.php";
				echo "<script type=\"text/javascript\">";
				echo "window.location.href = '$redirectUrl'";
				echo "</script>";			
			}	
			
	
	} else{
		$redirectUrl = "../banner-txt.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	}
}
?>