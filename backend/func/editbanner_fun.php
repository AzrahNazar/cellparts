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
		$lrgtxt = htmlspecialchars(trim($_POST['lrgtxt']), ENT_QUOTES, 'UTF-8');
		$smltxt = htmlspecialchars(trim($_POST['smltxt']), ENT_QUOTES, 'UTF-8');
		
		
		
		
		$query1 = mysqli_query($conn,"SELECT text_larg FROM banner WHERE text_larg='$lrgtxt' and b_id!='$id'");
		$query2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT img FROM banner WHERE b_id='$id'"));
		
		if (mysqli_num_rows($query1)!= 0){
			echo "<script>alert('Details Already Exists!')</script>";
			$redirectUrl = "../banner-txt.php?id=$id";
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
			 	
				$path = "../../images/slider/".$query2['img'];
				$files = glob($path);
				
				foreach($files as $file) {
					unlink($file);
				}
			
				$file_name = htmlspecialchars(trim($_FILES["file"]["name"]), ENT_QUOTES, 'UTF-8'); //$_FILES["file"]["name"];
				$temp_name=$_FILES["file"]["tmp_name"];
				$imgtype=$_FILES["file"]["type"];
				$ext= GetImageExtension($imgtype);
				//$imagename="$reg_no".$ext;
				$target_path = "../../images/slider/".$file_name;
				
				if (file_exists("../../images/slider/".$_FILES["file"]["name"]))
				{
					echo $_FILES["file"]["name"] . " Already Exists.";
				} 
				
				else {
					
					if(move_uploaded_file($temp_name, $target_path)) {
		
						$query_upload="UPDATE banner SET text_larg='$lrgtxt', small_text='$smltxt', img='$file_name' WHERE b_id='$id'";
					
						$redirectUrl = "../banner-txt.php";
						echo "<script type=\"text/javascript\">";
						echo "window.location.href = '$redirectUrl'";
						echo "</script>"; 
						
						mysqli_query($conn,$query_upload) or die(mysqli_error($conn));  
					
					}else{				
						exit("Error While uploading image on the server");
					} 
				}
			}

			else {
				echo $query = mysqli_query($conn,"UPDATE banner SET text_larg='$lrgtxt', small_text='$smltxt' WHERE b_id='$id'");
					
				$redirectUrl = "../banner-txt.php";
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