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
		
		$subc = htmlspecialchars(trim($_GET['subc']), ENT_QUOTES, 'UTF-8');
		// $id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
		$id = urlencode($_GET['id']);
		$name = htmlspecialchars(trim($_POST['name']), ENT_QUOTES, 'UTF-8');
		$price = htmlspecialchars(trim($_POST['price']), ENT_QUOTES, 'UTF-8');
		$wprice = htmlspecialchars(trim($_POST['wprice']), ENT_QUOTES, 'UTF-8');
		$itemcode = htmlspecialchars(trim($_POST['itemcode']), ENT_QUOTES, 'UTF-8');
		$details = htmlspecialchars(trim($_POST['details']), ENT_QUOTES, 'UTF-8');
		$deli_charges = htmlspecialchars(trim($_POST['deli_charges']), ENT_QUOTES, 'UTF-8');
		$wrap_charges = htmlspecialchars(trim($_POST['wrap_charges']), ENT_QUOTES, 'UTF-8');
	
		$x = "SELECT book FROM books WHERE book='$name' and itemcode!='$id'";
		$query1 = mysqli_query($conn, $x);
		$query2 = mysqli_fetch_assoc(mysqli_query($conn,"SELECT imgpath FROM books WHERE itemcode='$id'"));
		
		if (mysqli_num_rows($query1)!= 0)
		{
			
			echo "<script>alert('Product Already Exists!')</script>";
			$redirectUrl = "../stock.php?subc=$subc";
			echo "<script type=\"text/javascript\">";
			echo "window.location.href = '$redirectUrl'";
			echo "</script>";  	 
		
		} else 
			
		{ 
			
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
			 	
				$path = "../../images/sumeda_p/".$query2['imgpath'];
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
				$target_path = "../../images/sumeda_p/".$final_image;
				
			
					if(move_uploaded_file($temp_name, $target_path)) {
		
						$query_upload="UPDATE books SET book='$name', price='$price', imgpath='$final_image', details='$details', wholesales='$wprice', deli_charges='$deli_charges', wrap_charges='$wrap_charges' WHERE itemcode='$id'";
					
						$redirectUrl = "../stock.php?subc=$subc";
						echo "<script type=\"text/javascript\">";
						echo "window.location.href = '$redirectUrl'";
						echo "</script>"; 
						
						mysqli_query($conn,$query_upload) or die(mysqli_error($conn));  
					
					}else{				
						exit("Error While uploading image on the server");
					} 
				
			}

			else {
				 $query = mysqli_query($conn,"UPDATE books SET book='$name', price='$price', details='$details', wholesales='$wprice', deli_charges='$deli_charges',  wrap_charges='$wrap_charges' WHERE itemcode='$id'");
					
				$redirectUrl = "../stock.php?subc=$subc";
				echo "<script type=\"text/javascript\">";
				echo "window.location.href = '$redirectUrl'";
				echo "</script>";			
			}	
		}	
	
	} 

	else{
		$redirectUrl = "../../index.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	}
}
?>