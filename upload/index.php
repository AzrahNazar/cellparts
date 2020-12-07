<?php

session_start();
include "../db/db.php";
$gtot=0;


$log=$_SESSION['user'];
if (empty($log)) {

	$redirectUrl = "../login.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";


}else
{

	$sqlu = "SELECT * FROM user WHERE user='$log'";
	$resultu = mysqli_query($conn,$sqlu);
	$countu = mysqli_num_rows($resultu);
	if ($countu == 1) {

		$sql5 = "SELECT * FROM cust WHERE usern='$log'";
		$result5 = mysqli_query($conn,$sql5);

		while ($row5 = mysqli_fetch_array($result5)) {

			$user = $row5['usern'];
			$uid = $row5['id'];
		}

	}

}

$sqlm ="SELECT * FROM currency";
$resultm =mysqli_query($conn,$sqlm);
while ($rowm = mysqli_fetch_array($resultm)) {

	$dollar = $rowm['doller'];

}


/*
Directory Listing Script - Version 3
====================================
Script Author: Ash Young <ash@evoluted.net> / www.evoluted.net

REQUIREMENTS
============
This script requires PHP and GD2 if you wish to use the 
thumbnail functionality.

INSTRUCTIONS
============
1) Unzip all files 
2) Edit this file, making sure everything is setup as required.
3) Upload to server

CONFIGURATION
=============
Edit the variables in this section to make the script work as
you require.

Include URL - If you are including this script in another file, 
please define the URL to the Directory Listing script (relative
from the host)
*/
$includeurl = false;

/*
Start Directory - To list the files contained within the current 
directory enter '.', otherwise enter the path to the directory 
you wish to list. The path must be relative to the current 
directory and cannot be above the location of index.php within the 
directory structure.
*/
$startdir = '.';

/*
Show Thumbnails? - Set to true if you wish to use the 
scripts auto-thumbnail generation capabilities.
This requires that GD2 is installed.
*/
$showthumbnails = true; 

/*
Memory Limit - The image processor that creates the thumbnails
may require more memory than defined in your PHP.INI file for 
larger images. If a file is too large, the image processor will
fail and not generate thumbs. If you require more memory, 
define the amount (in megabytes) below
*/
$memorylimit = false; // Integer

/*
Show Directories - Do you want to make subdirectories available?
If not set this to false
*/
$showdirs = true;

/* 
Force downloads - Do you want to force people to download the files
rather than viewing them in their browser?
*/
$forcedownloads = false;

/*
Hide Files - If you wish to hide certain files or directories 
then enter their details here. The values entered are matched
against the file/directory names. If any part of the name 
matches what is entered below then it is not shown.
*/
$hide = array(
	'dlf',
	'index.php',
	'Thumbs',
	'.htaccess',
	'.htpasswd'
);

/* Only Display Files With Extension... - if you only wish the user
to be able to view files with certain extensions, add those extensions
to the following array. If the array is commented out, all file
types will be displayed.
*/
/*$showtypes = array(
					'jpg',
					'png',
					'gif',
					'zip',
					'txt'
				);*/

/* 
Show index files - if an index file is found in a directory
to you want to display that rather than the listing output 
from this script?
*/			
$displayindex = false;

/*
Allow uploads? - If enabled users will be able to upload 
files to any viewable directory. You should really only enable
this if the area this script is in is already password protected.
*/
$allowuploads = false;

/* Upload Types - If you are allowing uploads but only want
users to be able to upload file with specific extensions,
you can specify these extensions below. All other file
types will be rejected. Comment out this array to allow
all file types to be uploaded.
*/
/*$uploadtypes = array(
						'zip',
						'gif',
						'doc',
						'png'
					);*/

/*
Overwrite files - If a user uploads a file with the same
name as an existing file do you want the existing file
to be overwritten?
*/
$overwrite = false;

/*
Index files - The follow array contains all the index files
that will be used if $displayindex (above) is set to true.
Feel free to add, delete or alter these
*/

$indexfiles = array (
	'index.html',
	'index.php',
	'index.htm',
	'default.htm',
	'default.html'
);

/*
File Icons - If you want to add your own special file icons use 
this section below. Each entry relates to the extension of the 
given file, in the form <extension> => <filename>. 
These files must be located within the dlf directory.
*/
$filetypes = array (
	'png' => 'jpg.gif',
	'jpeg' => 'jpg.gif',
	'bmp' => 'jpg.gif',
	'jpg' => 'jpg.gif', 
	'gif' => 'gif.gif',
	'zip' => 'archive.png',
	'rar' => 'archive.png',
	'exe' => 'exe.gif',
	'setup' => 'setup.gif',
	'txt' => 'text.png',
	'htm' => 'html.gif',
	'html' => 'html.gif',
	'fla' => 'fla.gif',
	'swf' => 'swf.gif',
	'xls' => 'xls.gif',
	'doc' => 'doc.gif',
	'sig' => 'sig.gif',
	'fh10' => 'fh10.gif',
	'pdf' => 'pdf.gif',
	'psd' => 'psd.gif',
	'rm' => 'real.gif',
	'mpg' => 'video.gif',
	'mpeg' => 'video.gif',
	'mov' => 'video2.gif',
	'avi' => 'video.gif',
	'eps' => 'eps.gif',
	'gz' => 'archive.png',
	'asc' => 'sig.gif',
);

/*
That's it! You are now ready to upload this script to the server.

Only edit what is below this line if you are sure that you know what you
are doing!
*/

if($includeurl)
{
	$includeurl = preg_replace("/^\//", "${1}", $includeurl);
	if(substr($includeurl, strrpos($includeurl, '/')) != '/') $includeurl.='/';
}

error_reporting(0);
if(!function_exists('imagecreatetruecolor')) $showthumbnails = false;
if($startdir) $startdir = preg_replace("/^\//", "${1}", $startdir);
$leadon = $startdir;
if($leadon=='.') $leadon = '';
if((substr($leadon, -1, 1)!='/') && $leadon!='') $leadon = $leadon . '/';
$startdir = $leadon;

if($_GET['dir']) {
	//check this is okay.
	
	if(substr($_GET['dir'], -1, 1)!='/') {
		$_GET['dir'] = strip_tags($_GET['dir']) . '/';
	}
	
	$dirok = true;
	$dirnames = split('/', strip_tags($_GET['dir']));
	for($di=0; $di<sizeof($dirnames); $di++) {
		
		if($di<(sizeof($dirnames)-2)) {
			$dotdotdir = $dotdotdir . $dirnames[$di] . '/';
		}
		
		if($dirnames[$di] == '..') {
			$dirok = false;
		}
	}
	
	if(substr($_GET['dir'], 0, 1)=='/') {
		$dirok = false;
	}
	
	if($dirok) {
		$leadon = $leadon . strip_tags($_GET['dir']);
	}
}

if($_GET['download'] && $forcedownloads) {
	$file = str_replace('/', '', $_GET['download']);
	$file = str_replace('..', '', $file);

	if(file_exists($includeurl . $leadon . $file)) {
		header("Content-type: application/x-download");
		header("Content-Length: ".filesize($includeurl . $leadon . $file)); 
		header('Content-Disposition: attachment; filename="'.$file.'"');
		readfile($includeurl . $leadon . $file);
		die();
	}
	die();
}

if($allowuploads && $_FILES['file']) {
	$upload = true;
	if(!$overwrite) {
		if(file_exists($leadon.$_FILES['file']['name'])) {
			$upload = false;
		}
	}
	
	if($uploadtypes)
	{
		if(!in_array(substr($_FILES['file']['name'], strpos($_FILES['file']['name'], '.')+1, strlen($_FILES['file']['name'])), $uploadtypes))
		{
			$upload = false;
			$uploaderror = "<strong>ERROR: </strong> You may only upload files of type ";
			$i = 1;
			foreach($uploadtypes as $k => $v)
			{
				if($i == sizeof($uploadtypes) && sizeof($uploadtypes) != 1) $uploaderror.= ' and ';
				else if($i != 1) $uploaderror.= ', ';
				
				$uploaderror.= '.'.strtoupper($v);
				
				$i++;
			}
		}
	}
	
	if($upload) {
		move_uploaded_file($_FILES['file']['tmp_name'], $includeurl.$leadon . $_FILES['file']['name']);
	}
}

$opendir = $includeurl.$leadon;
if(!$leadon) $opendir = '.';
if(!file_exists($opendir)) {
	$opendir = '.';
	$leadon = $startdir;
}

clearstatcache();
if ($handle = opendir($opendir)) {
	while (false !== ($file = readdir($handle))) { 
		//first see if this file is required in the listing
		if ($file == "." || $file == "..")  continue;
		$discard = false;
		for($hi=0;$hi<sizeof($hide);$hi++) {
			if(strpos($file, $hide[$hi])!==false) {
				$discard = true;
			}
		}
		
		if($discard) continue;
		if (@filetype($includeurl.$leadon.$file) == "dir") {
			if(!$showdirs) continue;

			$n++;
			if($_GET['sort']=="date") {
				$key = @filemtime($includeurl.$leadon.$file) . ".$n";
			}
			else {
				$key = $n;
			}
			$dirs[$key] = $file . "/";
		}
		else {
			$n++;
			if($_GET['sort']=="date") {
				$key = @filemtime($includeurl.$leadon.$file) . ".$n";
			}
			elseif($_GET['sort']=="size") {
				$key = @filesize($includeurl.$leadon.$file) . ".$n";
			}
			else {
				$key = $n;
			}
			
			if($showtypes && !in_array(substr($file, strpos($file, '.')+1, strlen($file)), $showtypes)) unset($file);
			if($file) $files[$key] = $file;
			
			if($displayindex) {
				if(in_array(strtolower($file), $indexfiles)) {
					header("Location: $leadon$file");
					die();
				}
			}
		}
	}
	closedir($handle); 
}

//sort our files
if($_GET['sort']=="date") {
	@ksort($dirs, SORT_NUMERIC);
	@ksort($files, SORT_NUMERIC);
}
elseif($_GET['sort']=="size") {
	@natcasesort($dirs); 
	@ksort($files, SORT_NUMERIC);
}
else {
	@natcasesort($dirs); 
	@natcasesort($files);
}

//order correctly
if($_GET['order']=="desc" && $_GET['sort']!="size") {$dirs = @array_reverse($dirs);}
if($_GET['order']=="desc") {$files = @array_reverse($files);}
$dirs = @array_values($dirs); $files = @array_values($files);


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>CellParts.lk</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" href="../img/favicon.png" />
	<!-- Place favicon.ico in the root directory -->

	<!-- all css here -->
	<!-- bootstrap.min.css -->
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	
	<!-- font-awesome.min.css -->
	<link rel="stylesheet" href="../css/font-awesome.min.css">
	<!-- owl.carousel.css -->
	<link rel="stylesheet" href="../css/owl.carousel.css">
	<!-- owl.carousel.css -->
	<link rel="stylesheet" href="../css/meanmenu.min.css">
	<!-- shortcode/shortcodes.css -->
	<link rel="stylesheet" href="../css/shortcode/shortcodes.css">
	<!-- nivo-slider.css -->
	<link rel="stylesheet" href="../css/nivo-slider.css">
	<!-- style.css -->
	<link rel="stylesheet" href="../style.css">
	<!-- responsive.css -->
	<link rel="stylesheet" href="../css/responsive.css">
	<script src="../js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="../js/vendor/jquery-2.1.4.min.js"></script>

	<style>
	
	
</style>	
	<style>
	.mini-products-list
	{
		max-height: 200px;
		overflow-y: scroll;
	}
	

	.sticky {
		position: fixed;
		top: 0;
		width: 100%;
		z-index: 1000;

	}	
</style>

<script src="../js/jquery.session.js"></script>

<script type="text/javascript">

	//$.session.set("user_price", 1);

	$( document ).ready(function() {
		  //alert("test");
		  //alert($.session.get("user_price"));
		  if (!$.session.get("user_price") ) {
		  	$.session.set("user_price", 1);   
		  }

		  $("#rpu").click(function(){
		  	$.session.set("user_price", 1);
		  	$.session.clear("user_price", 1);
		  	location.reload();
			//alert("test");
		});
		  
		  $("#usd").click(function(){
		  	$.session.set("user_price", 2);
		  	location.reload();
		  });
		  
		  
		  if($.session.get("user_price")==1){
		  	$(".price_rs").css("display","block");
		  	$(".price_usd").css("display","none");
		  }
		  
		  if($.session.get("user_price")==2){
		  	$(".price_usd").css("display","block");
		  	$(".price_rs").css("display","none");
		  }
		  
		  
		});
	</script>


</head>


<body>

	<?php if ((isset($_SESSION['user'])))
		  { ?>
	<input id="uid" type="hidden" class="form-control" value="<?php echo $uid;?>" style="width:250px">
	<?php } ?>
	
		
	<header>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

	<script src="../js/jquery.session.js"></script>

		<script type="text/javascript">
		
			//$.session.set("user_price", 1);
				
	          $( document ).ready(function() {
				  //alert("test");
				  //alert($.session.get("user_price"));
				   if (!$.session.get("user_price") ) {
					$.session.set("user_price", 1);   
				   }
		
				  $("#rpu").click(function(){
					$.session.set("user_price", 1);
					$.session.clear("user_price", 1);
					location.reload();
					//alert("test");
				  });
				  
				  $("#usd").click(function(){
					$.session.set("user_price", 2);
					location.reload();
				  });
				  
				  
				  if($.session.get("user_price")==1){
					$(".price_rs").css("display","block");
					$(".price_usd").css("display","none");
				  }
				  
				  if($.session.get("user_price")==2){
					$(".price_usd").css("display","block");
					$(".price_rs").css("display","none");
				  }
				  
				  
			  });
		</script>


				<!-- header-top-area-start -->
				<div class="header-top-area black-bg ptb-7">
					<div class="container">
						<div class="row">
							<div class="col-lg-5 col-md-5 col-sm-4">
								<div class="header-top-left">
									<span style="">
									<a href="whatsapp://send?phone=+94777444584"><img src="../img/whatup.png" style="width:28px;height:28px;"></a></span>
									
									<span style="">
									<a href="viber://chat?number=%2B94777444584"><img src="../img/viber.png" style="width:28px;height:28px;"></a> </span>
									
									<span style="">
									<a href="#"><img src="../img/imo.png" style="width:28px;height:28px;"></a> </span>
									
									<span style="color: #FF5313">
								
									(+94) 77 744 4584</span>
								</div>
							</div>
							<div class="col-lg-7 col-md-7 col-sm-8 hidden-xs">
								<div class="header-top-right">
									<ul>
									<li class="slide-toggle"><a href="faqs.php"><i class="fa fa-comment-o"></i> FAQ's</a>
										</li>
									</ul>
									<ul>
										<li class="slide-toggle"><a href="account"><i class="fa fa-user"></i> My Account</a>
										</li>
									
									</ul>
									<ul>
										<li class="slide-toggle"><a href="register"><i class="fa fa-rss"></i> Register</a>
										</li>
									</ul>
									<ul>
									
									<?php if(empty($log)) { ?>
									
									<li class="slide-toggle"><a href="login"><i class="fa fa-lock"></i> Login</a>
									</li>
									<?php } else { ?>
									<li class="slide-toggle"><a href="../destroy.php"><i class="fa fa-lock"></i> Logout</a>
									</li>
									
										<?php } ?>
									</ul>
									<ul>
										<li class="slide-toggle-2 text-uppercase" ><a href="#" id="usd">$</a>
											
										</li>
									</ul>
									<ul>
										<li class="slide-toggle-3 text-uppercase"><a href="#" id="rpu">Rs</a>
												
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- header-top-area-end -->
				<!-- header-bottom-area-start -->
				<div class="header-bottom-area bg-color-1 ptb-25" >
					<div class="container">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
								<div class="logo">
									<a href="https://cellparts.lk"><img src="../img/logo.png" alt="" style="width:220px;"/></a>
								</div>
							</div>
							<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
								<div class="header-bottom-middle">
								<div class="top-search">
										<span class="tex_top_skype"><i class="fa fa-skype"></i>Skype: <span class="">cellparts.skype</span></span>
										<span class="tex_top_email"><i class="fa fa-envelope"></i>Email: <span class="">cellparts@gmail.com</span></span>
									</div>
									<div class="search-box">
										<form method="post" action="search.php">
											<select name="#" id="select" onchange="location = this.value;">
												<option value="">All categories</option>
											<?php
					
					$sql="SELECT * FROM cat ORDER BY cat ASC";
	                $resultm=mysqli_query($conn,$sql);
					
					while ($row = mysqli_fetch_array($resultm)){ ?>
						  
						  						<?php
		$cosql3="SELECT * FROM scat WHERE ccode='".$row['ccode']."'";
		$coresult3=mysqli_query($conn,$cosql3);
		
		while ($row3 = mysqli_fetch_array($coresult3)){ ?>
		
												<option value="products.php?subc=<?php echo $row3['sccode']; ?>"><?php echo $row3['subcat']; ?></option>

													  <?php } ?>
	                      
						  
					<?php } ?>
																						
											</select>
											<input type="text" placeholder="Search..." name="search"/>
											<button><i class="fa fa-search"></i></button>
										</form>
									</div>								
								</div>
								<div class="header-bottom-right">
									<div class="left-cart">
										<div class="header-compire">
											<a href="#"><i class="fa fa-heart"></i> Wish List 0 </a>
											<a href="#"><i class="fa fa-refresh"></i> Compare  0 </a>
										</div>
									</div>
									
									
									<div class="shop-cart-area">
									
				<div class="shop-cart-area">
										<div class="top-cart-wrapper">
																	 <?php if ((isset($_SESSION['user'])))
		  { ?>
	       <input id="uid" type="hidden" class="form-control" value="<?php echo $uid ;?>" style="width:250px">
		 <?php } ?>
										
											<div class="block-cart">
												<div class="top-cart-title" style="line-height: 15px;">
													<a href="#">
														<span class="title-cart">my cart</span>
														<span class="count-item qty_count"></span>
														
														<span class="price" >items</span><br>
														<span class="price stot" ></span>
													</a>
												</div>
	                                            <div class="top-cart-content">
	                                                <ol class="mini-products-list">
	                                                 
	                                                 

	                                                </ol>
	                                                <!--<div class="top-subtotal">
	                                                    Subtotal: <span class="sig-price">$444.00</span>
	                                                </div>-->
	                                                <div class="cart-actions">
													<div class="row">
													<div class="col-md-6" style="padding:5px 5px;">
	                                                    <a href="cart"><button><span>View Cart</span></button>
														</a>
														
													</div>
														<?php	 if ((isset($_SESSION['user'])))
												 {?>
											 <div class="col-md-6" style="padding:5px 5px;">
													  <a href="confirm"> <button><span >Checkout</span></button></a>
														</div>
	                                                  
												 <?php } else { ?>
												 <div class="col-md-6" style="padding:5px 5px;">
													  <a href="login_cart"><button><span>Checkout</span></button>
														</a>
														</div>
												 
												 <?php } ?>
														</div>
														
															
															
															
														
														
														
														
	                                                </div>
	                                            </div>											
											</div>
										</div>
									</div>
							
								</div>							
							</div>
						</div>
					</div>
				</div>

				<!-- header-bottom-area-end -->
			</header>			
		<script type="text/javascript">
	                                cart_data_load_show();
	                                function cart_data_load_show() {//get values which comes from view
									//alert('test');
									var uid = $('#uid').val();
									
	                                    var tot = 0;
										var qty = 0;
										
	                                    var tableData = '';
										$('.mini-products-list').html('').append('');
										/*$.post('connection/index.php', {'cart_no': 'data', uid:uid}, function (data) {
		        $(".count").text(data);
		        count = data;
		    });*/
	                                    //var postData = {cart_data_load: 'table'};//data pass to model
	                                    $.post('../connection/cart_data_load.php', {'cart_data_load_show': 'data',uid: uid}, function (e) {
	                                    
	                                        //alert("test");
												$.each(e, function (index, data) {
	                                            var pri;
												if($.session.get("user_price")==1){
						pri = "Rs." + parseFloat(data.price).toFixed(2);
						
					}
					
					if($.session.get("user_price")==2){
						pri="$." + ((data.price)/data.dollar).toFixed(2);
						
					}
											
									if(data.flag==1){		
											
												tableData +='<li>';
	                                            tableData +='<a href="#" class="product-image"><img src="../images/new_p/'+data.img+'" style="width:50px;width:50px;"></a>';
												 
									}
										if(data.flag==2){		
											
												tableData +=' <li>';
	                                            tableData +='<a href="#" class="product-image"><img src="../images/access/'+data.img+'" style="width:50px;width:50px;"></a>';
												 
									}
											if(data.flag==3){		
											
												tableData +=' <li>';
	                                            tableData +='<a href="#" class="product-image"><img src="../images/sumeda_p/'+data.img+'" style="width:50px;width:50px;"></a>';
												 
									}
										
												 
	                                            tableData +='<div class="product-details"><p class="cartproduct-name"><a href="">'+data.name+'</a></p><strong class="qty">qty:'+data.Qty+'</strong><span class="sig-price">'+pri+'</span></div>';
												tableData +='<div class="pro-action"><a class="btn-remove" href="#" data-row-no = '+data.id+'>remove</a></div>';
	                                            tableData +='</li>';
												


	                 $('.mini-products-list').html('').append(tableData);
												
	                if($.session.get("user_price")==1){
						tot = tot + (data.Qty*data.price);
					}
					if($.session.get("user_price")==2){
						tot = tot + ((data.Qty*data.price)/data.dollar);
					}
	                   
							qty += parseInt(data.Qty);
					   		   


	                                        });
											$(".qty_count").text(qty);	
											
		      $(".btn-remove").click(function(){
	                                                    id_for_delete = $(this).attr('data-row-no');
	    
	                                                    $.post("connection/cart_data_load.php", {delete_cart_top: 'data', id_for_delete: id_for_delete}, function (valueDel) {//delete data table id pass to model
	                                                    //$.each(delMsg, function (index, valueDel) {
	                                                        //return confirm('Are you sure you want to delete this details?');
															//alert(valueDel);
															
	                                                        if (valueDel === 'ok') {
																cart_data_load_show();//refresh data table
	                                                            //alert('Deleted data successfully');
	                                                        } else if (valueDel === 'error') {
	                                                            //alert('Something went wrong.Please check your field');
	                                                        }
	                                                    //});
	                                                    //cart_data_load_show();//refresh data table
	                                                    //cart_data_load();
	                                                    });

	                                                });
	                                        //Load Json Data to Table
	                                        //alert(tot);
											if($.session.get("user_price")==1){
	                                        $('.stot').text('Rs. '+tot.toFixed(2));
											}
											if($.session.get("user_price")==2){
											$('.stot').text('$ '+tot.toFixed(2));
											}
										
	                                    }, "json");
	                                }
	                            </script>
			 
				
				
				

			
			
			
			
			
	






<!-- header -->
<!-- mainmenu-area-start -->
<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm" id="myHeader">
	<div class="container">
		<div class="row">
					<!--<div class="col-lg-3 col-md-3">
		<?php //include "common/categorybar.php" ?>
	</div>-->
	<div class="col-lg-3 col-md-3 cat_dis" style="display:none;">
		<div class="product-menu-title " style="background-image: url('../img/navlogo.jpg');height:54px;">
			<!--<h2>All categories <i class="fa fa-arrow-circle-down"></i></h2>-->
		</div>
	</div>




	<div class="col-lg-9 col-md-9">
		<div class="mainmenu">
			<nav>
				<ul>
				
				<li class="<?php if(basename($_SERVER['PHP_SELF'])=='index.php'){echo 'active';} ?>"><a href="../index">Home</a></li>
					<li class="<?php if(basename($_SERVER['PHP_SELF'])=='about-us-sumedacellular-kurunegala-srilanka.php'){echo 'active';} ?> "><a href="../about-us-sumedacellular-kurunegala-srilanka">About Us</a></li>
					<li class=" <?php if(basename($_SERVER['PHP_SELF'])=='accessories-sumedacellular-kurunegala-srilanka.php'){echo 'active';} ?>"><a href="../accessories-sumedacellular-kurunegala-srilanka">Accessories</a></li>
					<li class="<?php if(basename($_SERVER['PHP_SELF'])=='newarrivals-sumedacelullar-kurunegala-srilanka.php'){echo 'active';} ?>" ><a href="../newarrivals-sumedacelullar-kurunegala-srilanka">New Arrivals</a></li>
					<li class="<?php if(basename($_SERVER['PHP_SELF'])=='contact-us-sumedacellular-kurunegala-srilanka.php'){echo 'active';} ?>"><a href="../contact-us-sumedacellular-kurunegala-srilanka">Contact Us</a></li>
					<li class="<?php if(basename($_SERVER['PHP_SELF'])=='upload/index'){echo 'active';} ?>"><a href="../upload/index">Free Download</a></li>
					<li class="<?php if(basename($_SERVER['PHP_SELF'])=='gallery.php'){echo 'active';} ?>"><a href="../gallery">Gallery</a></li>
					<li class="<?php if(basename($_SERVER['PHP_SELF'])=='customer_review.php'){echo 'active';} ?>"><a href="../customer_review">Customer Reviews</a></li>
					
					
				</ul>
			</nav>
		</div>
		<script>
			window.onscroll = function() {myFunction()};

			var header = document.getElementById("myHeader");
			var sticky = header.offsetTop;

			function myFunction() {
				if (window.pageYOffset > sticky) {
					header.classList.add("sticky");

					$('.cat_display').css("display","none");

				} else {
					header.classList.remove("sticky");
					$('.cat_display').css("display","block");
				}
			}
		</script>


	</div>
</div>
</div>
</div>
<!-- mobile-menu-start -->
<div class="mobile-menu-area hidden-md hidden-lg">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="mobile-menu">
					<nav id="mobile-menu">
						<ul>
							<li class="active"><a href="../index.php">Home</a>

							</li>									
							<li><a href="../about-us-sumedacellular-kurunegala-srilanka.php">About Us</a></li>
							<li><a href="../accessories-sumedacellular-kurunegala-srilanka.php">Accessories</a></li>
							<li><a href="../newarrivals-sumedacelullar-kurunegala-srilanka.php">New Arrivals</a></li>
							<li><a href="../contact-us-sumedacellular-kurunegala-srilanka.php"> Contact Us</a></li>
							<li><a href="index.php"> Free Download</a> </li>
							<li><a href="../register.php"> Register</a></li>
							<li><a href="../account.php"> My account</a></li>
							<li><a href="../login.php">Login</a></li>

						</ul>	
					</nav>
				</div>
<script>
	window.onscroll = function() {myFunction()};

	var header = document.getElementById("myHeader");
	var sticky = header.offsetTop;

	function myFunction() {
		if (window.pageYOffset > sticky) {
			header.classList.add("sticky");


			$('.cat_display').css("display","none");

			$('.cat_dis').css("display","block");

	
} else {
	header.classList.remove("sticky");
	$('.cat_display').css("display","block");
	$('.cat_dis').css("display","none");
	
	
}
}
</script>				


</div>
</div>
</div>
</div>
<!-- mobile-menu-end -->		
<!-- mainmenu-area-end -->
<!-- slider-area-start -->
<div class="slider-area">
	<div class="container">
		<div class="row">
			<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>-->
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="main-slider">
					<div class="slider-container">

						<h2 style="color:#666666;">Free Download </h2>

						<div class="table-responsive" style="width:80%;" >
							<table  style="margin-top:25px;">
								<?php
								// $breadcrumbs = split('/', str_replace($startdir, '', $leadon));
								// if(($bsize = sizeof($breadcrumbs))>0) {
								// 	$sofar = '';
								// 	for($bi=0;$bi<($bsize-1);$bi++) {
								// 		$sofar = $sofar . $breadcrumbs[$bi] . '/';
								// 		echo ' &gt; <a href="'.strip_tags($_SERVER['PHP_SELF']).'?dir='.urlencode($sofar).'">'.$breadcrumbs[$bi].'</a>';
								// 	}
								// }

								// $baseurl = strip_tags($_SERVER['PHP_SELF']) . '?dir='.strip_tags($_GET['dir']) . '&amp;';
								// $fileurl = 'sort=name&amp;order=asc';
								// $sizeurl = 'sort=size&amp;order=asc';
								// $dateurl = 'sort=date&amp;order=asc';

								// switch ($_GET['sort']) {
								// 	case 'name':
								// 	if($_GET['order']=='asc') $fileurl = 'sort=name&amp;order=desc';
								// 	break;
								// 	case 'size':
								// 	if($_GET['order']=='asc') $sizeurl = 'sort=size&amp;order=desc';
								// 	break;

								// 	case 'date':
								// 	if($_GET['order']=='asc') $dateurl = 'sort=date&amp;order=desc';
								// 	break;  
								// 	default:
								// 	$fileurl = 'sort=name&amp;order=desc';
								// 	break;
								// }
								?>



								<thead >
									<tr style="border:1px;margin-top:20px;">


										<th style="width:15%;">
											<div id="headerfile"><a href="<?php echo $baseurl . $fileurl;?>" style="font-size:14px;">File</a></div></th>
											<th style="width:15%;"><div id="headersize"><a href="<?php echo $baseurl . $sizeurl;?>" style="font-size:14px;">Size</a></div></th>
											<th style="width:10%;"><div id="headermodified"><a href="<?php echo $baseurl . $dateurl;?>" style="font-size:14px;">Last Modified</a></div></th>

										</tr>
									</thead> 
									<tbody>               

										<?php
										$class = 'b';
										if($dirok) {
											?>
											<tr><td><a href="<?php echo strip_tags($_SERVER['REQUEST_URI']).'?dir='.urlencode($dotdotdir);?>" class="<?php echo $class;?>"><img src="<?php echo $includeurl; ?>dlf/dirup.png" alt="Folder" /><strong>..</strong> <em>&nbsp;</em>&nbsp;</a></td></tr>
											<?php
											if($class=='b') $class='w';
											else $class = 'b';
										}
										$arsize = sizeof($dirs);
										for($i=0;$i<$arsize;$i++) {
											?>
											<tr ><td><a href="<?php echo strip_tags($_SERVER['REQUEST_URI']).'?dir='.urlencode(str_replace($startdir,'',$leadon).$dirs[$i]);?>" class="<?php echo $class;?>"><img src="<?php echo $includeurl; ?>dlf/folder.png" alt="<?php echo $dirs[$i];?>" /><strong style="font-size:14px;"> &nbsp<?php echo $dirs[$i];?> </strong></td> <em></em><td></td><td> <?php echo date ("M d Y h:i:s A", filemtime($includeurl.$leadon.$dirs[$i]));?></a></td></tr>
											<?php
											if($class=='b') $class='w';
											else $class = 'b';	
										}

										$arsize = sizeof($files);
										for($i=0;$i<$arsize;$i++) {
											$icon = 'unknown.png';
											$ext = strtolower(substr($files[$i], strrpos($files[$i], '.')+1));
											$supportedimages = array('gif', 'png', 'jpeg', 'jpg');
											$thumb = '';

											if($showthumbnails && in_array($ext, $supportedimages)) {
												$thumb = '<span><img src="dlf/trans.gif" alt="'.$files[$i].'" name="thumb'.$i.'" /></span>';
												$thumb2 = ' onmouseover="o('.$i.', \''.urlencode($leadon . $files[$i]).'\');" onmouseout="f('.$i.');"';

											}

											if($filetypes[$ext]) {
												$icon = $filetypes[$ext];
											}

											$filename = $files[$i];
											if(strlen($filename)>43) {
												$filename = substr($files[$i], 0, 40) . '...';
											}

											$fileurl = $includeurl . $leadon . $files[$i];
											if($forcedownloads) {
												$fileurl = $_SESSION['REQUEST_URI'] . '?dir=' . urlencode(str_replace($startdir,'',$leadon)) . '&download=' . urlencode($files[$i]);
											}

											?>
											<tr><td><a href="<?php echo $fileurl;?>" class="<?php echo $class;?>"<?php echo $thumb2;?>><img src="<?php echo $includeurl; ?> dlf/<?php echo $icon;?>" alt="<?php echo $files[$i];?>" /><strong style="font-size:14px;"> &nbsp<?php echo $filename;?></strong></td> <td><em><?php echo round(filesize($includeurl.$leadon.$files[$i])/1024);?>KB</em></td> <td><?php echo date ("M d Y h:i:s A", filemtime($includeurl.$leadon.$files[$i]));?><?php echo $thumb;?></a></td></tr>
											<?php
											if($class=='b') $class='w';
											else $class = 'b';	
										}	
										?>			


									</tbody>

									<tfoot>
										<?php
										if($allowuploads) {
											$phpallowuploads = (bool) ini_get('file_uploads');		
											$phpmaxsize = ini_get('upload_max_filesize');
											$phpmaxsize = trim($phpmaxsize);
											$last = strtolower($phpmaxsize{strlen($phpmaxsize)-1});
											switch($last) {
												case 'g':
												$phpmaxsize *= 1024;
												case 'm':
												$phpmaxsize *= 1024;
											}

											?>
											<div id="upload">
												<div id="uploadtitle">
													<strong>File Upload</strong> (Max Filesize: <?php echo $phpmaxsize;?>KB)

													<?php if($uploaderror) echo '<div class="upload-error">'.$uploaderror.'</div>'; ?>
												</div>

												<div id="uploadcontent">
													<?php
													if($phpallowuploads) {
														?>
														<form method="post" action="<?php echo strip_tags($_SERVER['REQUEST_URI']);?>?dir=<?php echo urlencode(str_replace($startdir,'',$leadon));?>" enctype="multipart/form-data">
															<input type="file" name="file" /> <input type="submit" value="Upload" />
														</form>
														<?php
													}
													else {
														?>
														File uploads are disabled in your php.ini file. Please enable them.
														<?php
													}
													?>
												</div>

											</div>
											<?php
										}
										?>

										
									</tfoot>



								</table>    
							</div>

						</div>	
					</div>
						<!--<div class="slider-product dotted-style-1 pt-30" style="margin-top:104px;">
							
							<a href="#">
								<img class="img_a" src="../img/banner/4.jpg" alt="mobile phones sumedacellular Kurunegala" style="height:170px;" />
								
							</a>
														
							
						</div>-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="slider-sidebar">
							<div class="slider-single-img mb-20">
								<a href="#">
									<img class="img_a" src="../img/menu-l/1-5.jpg" alt="" />
									<img class="img_b" src="../img/menu-l/1-5.jpg" alt="" />
								</a>
							</div>
							<div class="slider-single-img none-sm">
								<a href="#">
									<img class="img_a" src="../img/menu-l/1-3.jpg" alt="" style="height:409px; width:300px;"/>
									<img class="img_b" src="../img/menu-l/1-3.jpg" alt="" style="height:409px;width:300px;"/>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		
		
		<!-- electronic-tab-area-start -->

		<!-- electronic-tab-area-end -->
		
		
		
		<!-- all-product-area-start -->

		<!-- all-product-area-end -->
		<!-- brand-area-start -->
		<div class="brand-area pb-60 dotted-style-2" style="padding-bottom: 15px;">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h3>Brands</h3>
						</div>					
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="brand-active border-1">
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand3.jpg" alt="htc cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand2.jpg" alt="huawei cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand1.jpg" alt="apple cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand5.jpg" alt="sony cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand7.jpg" alt="nokia cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand8.jpg" alt="micromax cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand9.jpg" alt="oppo cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand10.jpg" alt="lenovo cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand4.jpg" alt="samsung cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand11.jpg" alt="blackberry cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand12.jpg" alt="intex cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand13.jpg" alt="motorola cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand14.jpg" alt="zte cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="../img/brand/brand15.jpg" alt="dell cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- brand-area-end -->
		<!-- blog-area-start -->

		<!-- blog-area-end -->
		<!-- newletter-area-start -->
		
		<!-- newletter-area-end -->
		<footer>
			<!-- footer-top-area -->
			<div class="footer-top-area border-1 ptb-30 bg-color-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							
							<div class="footer-widget">
								<div class="contact-info">
									<ul>
										<li>
											<div class="contact-icon">
												<i class="fa fa-home"></i>
											</div>
											<div class="contact-text">
												<span>Sumeda cellular,<br> No:13, Maliyadeva Street,<br> 1st Floor, New Busstand Complex,<br> Kurunegala</span>
											</div>
										</li>
										<li>
											<div class="contact-icon">
												<i class="fa fa-envelope-o"></i>
											</div>
											<div class="contact-text">
												<a href="https://mail.google.com/mail/?view=cm&fs=1&to=sumedacellular@gmail.com"><span>sumedacellular@gmail.com</span></a>
											</div>
										</li>
										<li>
											<div class="contact-icon">
												<i class="fa fa-phone"></i>
											</div>
											<div class="contact-text">
												<span>+94 37 205 6554 /
												+94 37 222 1055</span>
											</div>
										</li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="footer-title">
								<h4>Information</h4>
							</div>
							<div class="footer-widget">
								<div class="list-unstyled">
									<ul>
										<li><a href="https://sumedacellular.com">Home</a></li>
										<li><a href="../about-us-sumedacellular-kurunegala-srilanka">About Us</a></li>
										<li><a href="../accessories-sumedacellular-kurunegala-srilanka">Accessories</a></li>
										<li><a href="../newarrivals-sumedacelullar-kurunegala-srilanka">New Arrivals</a></li>
										<li><a href="../contact-us-sumedacellular-kurunegala-srilanka">Contact Us</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="footer-title">
								<h4 style="margin: 0 0 5px;">My Account</h4>
							</div>
							<div class="footer-widget">
								<div class="list-unstyled">
									<ul>
										<li><a href="../account">My Account</a></li>
										<li><a href="../login">Login</a></li>
										<li><a href="../register">Register</a></li>
										<li><a href="../faqs">FAQ's</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="footer-title">
								<h4>Instagram</h4>
							</div>
							<div class="footer-widget">	
								<div class="footer-widget-img">
									<div class="single-img">
										<a href="#"><img src="../img/product/11.jpg" alt="" style="width:83px;height:83px;"/></a>
									</div>
									<div class="single-img">
										<a href="#"><img src="../img/product/1.jpg" alt="" style="width:83px;height:83px;"/></a>
									</div>
									<div class="single-img">
										<a href="#"><img src="../img/product/15.jpg" alt="" style="width:83px;height:83px;"/></a>
									</div>
									<div class="single-img">
										<a href="#"><img src="../img/product/14.jpg" alt="" style="width:83px;height:83px;"/></a>
									</div>
									<div class="single-img">
										<a href="#"><img src="../img/product/11.jpg" alt="" style="width:83px;height:83px;"/></a>
									</div>
									<div class="single-img">
										<a href="#"><img src="../img/product/10.jpg" alt="" style="width:83px;height:83px;"/></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- copyright-area-start -->
		<div class="copyright-area text-center bg-color-3">
			<div class="container"> 
				<div class="copyright-border ptb-30">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="copyright text-left">
								<p>Copyright <a href="https://cyclomax.net/">Cyclomax</a>. All Rights Reserved</p>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
							<div class="payment text-right">
								<a href="#"><img src="../img/visa.png" alt="" /></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- copyright-area-end -->
		<!-- social_block-start -->
		<div id="social_block">
			<ul>
				<li class="" style="background-image: url('../img/fb.png');margin-bottom: 10px;"><a href="https://www.facebook.com/Sumeda-Cellular-Service-250715129085247"></a></li>
				
				<li style="background-image: url('../img/g+.png');margin-bottom: 10px;"><a href="#"></a></li>
				<li style="background-image: url('../img/pinterest.png');margin-bottom: 10px;"><a href="#"></a></li>
			</ul>
		</div>
		<!-- social_block-end -->
		
		
		<!-- all js here -->
		<!-- jquery-1.12.0 -->

		<!-- bootstrap.min.js -->
		<script src="../js/bootstrap.min.js"></script>
		<!-- nivo.slider.js -->
		<script src="../js/jquery.nivo.slider.pack.js"></script>
		<!-- jquery-ui.min.js -->
		<script src="../js/jquery-ui.min.js"></script>
		<!-- jquery.magnific-popup.min.js -->
		<script src="../js/jquery.magnific-popup.min.js"></script>
		<!-- jquery.meanmenu.min.js -->
		<script src="../js/jquery.meanmenu.js"></script>
		<!-- jquery.scrollup.min.js-->
		<script src="../js/jquery.scrollup.min.js"></script>
		<!-- owl.carousel.min.js -->
		<script src="../js/owl.carousel.min.js"></script>		
		<!-- plugins.js -->
		<script src="../js/plugins.js"></script>
		<!-- main.js -->
		<script src="../js/main.js"></script>
	</body>
	</html>
