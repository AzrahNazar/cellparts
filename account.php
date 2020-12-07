<?php
include 'db/db.php';
session_start();

if (isset($_SESSION['user']))	
{
	$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

}

if (empty($log)) {

	$redirectUrl = "login.php";
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
		$sql5 = "SELECT * FROM cust WHERE usern='$log'";
		$result5 = mysqli_query($conn,$sql5);
		
		while ($row5 = mysqli_fetch_array($result5)) {

			$user = $row5['usern'];
			$uid = $row5['id'];
		}
		
	}
}


?>
<!doctype html>
<html class="no-js" lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>CellParts.lk</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	
	<link rel="icon" href="img/favicon.png" />
	<!-- Place favicon.ico in the root directory -->
	
	<!-- all css here -->
	<!-- bootstrap.min.css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	
	
	
	<!-- font-awesome.min.css -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- owl.carousel.css -->
	<link rel="stylesheet" href="css/owl.carousel.css">
	<!-- owl.carousel.css -->
	<link rel="stylesheet" href="css/meanmenu.min.css">
	<!-- shortcode/shortcodes.css -->
	<link rel="stylesheet" href="css/shortcode/shortcodes.css">
	<!-- nivo-slider.css -->
	<link rel="stylesheet" href="css/nivo-slider.css">
	<!-- style.css -->
	<link rel="stylesheet" href="style.css">
	<!-- responsive.css -->
	<link rel="stylesheet" href="css/responsive.css">
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>
	<script src="js/vendor/jquery-2.1.4.min.js"></script>
	
	
	<style>
	p
	{
		font-size:14px;	
		
	}
	.form-selector {
		padding-bottom: 14px;
	}
	.box {
		background: #f7f7f7;
		padding: 30px;
		border: 1px solid #ddd;
	}

	</style>	

	
	
</head>


<body>
	
	<!-- Add your site or application content here -->
	<!-- header -->
	<?php include "common/header.php";?> 																						<!-- header -->
	<!-- mainmenu-area-start -->
	<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm" id="myHeader">
		<div class="container">
			<div class="row">
					<!--<div class="col-lg-3 col-md-3">
		<?php //include "common/categorybar.php" ?>
	</div>-->
	<div class="col-lg-3 col-md-3 cat_dis" style="display:none;">
		<div class="product-menu-title " style="background-image: url('img/navlogo.jpg');height:54px;">
			<!--<h2>All categories <i class="fa fa-arrow-circle-down"></i></h2>-->
		</div>
	</div>
	
	<div class="col-lg-9 col-md-9">
		<?php include "common/navbar.php" ?>
	</div>
</div>
</div>
</div>
<!-- mobile-menu-start -->
<?php include "common/mobilemenu.php"; ?>
<!-- mobile-menu-end -->		
<!-- mainmenu-area-end -->
<!-- slider-area-start -->
<div class="slider-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
			<div class="col-lg-6 col-md-6 col-sm-12">
				<div class="main-slider" style="margin-bottom:80px;">
					<div class="box" style="margin-top:40px;margin-bottom:40px;">
						<h3>Edit your details</h3>
						
						
						<?php
						$sql4="SELECT * FROM cust WHERE usern='$user'";
						$result4=mysqli_query($conn,$sql4);
						while ($row4 = mysqli_fetch_array($result4)){

							$Mr = '';
							$Ms = '';
							$Dr = '';
							$Prof = '';
							$Rev = '';
							$Miss = '';

							if ($row4['title'] == 'Mr.') {
								$Mr = 'selected';
							}
							if ($row4['title'] == 'Ms.') {
								$Ms = 'selected';
							}
							if ($row4['title'] == 'Dr.') {
								$Dr = 'selected';
							}
							if ($row4['title'] == 'Prof.') {
								$Prof = 'selected';
							}
							if ($row4['title'] == 'Rev.') {
								$Rev = 'selected';
							}
							if ($row4['title'] == 'Miss.') {
								$Miss = 'selected';
							}

							
							?>
							<form method="post" action="connection/edituser_details?id=<?php echo $row4['id']; ?>">
								
                <!--<div class="form-group">
                  <label>Address</label>
                    <input type="text" class="form-control" name="address" value="<?php //echo $row4['add1']; ?>"/>
                </div>-->
                <div class="form-group">
                	<div class="row">
                		<div class="col-md-12"> 
                			<label>Title:<font color="#FF0000"></font></label>
                			<select class="form-control" placeholder="Select category" name="title" id="title" required>
                				<option value="">Select a Title</option>
                				<option value="Mr." <?php echo $Mr ?> >Mr.</option>
                				<option value="Ms." <?php echo $Ms ?> >Ms.</option>
                				<option value="Dr." <?php echo $Dr ?> >Dr.</option>
                				<option value="Prof." <?php echo $Prof ?> >Prof.</option>
                				<option value="Rev." <?php echo $Rev ?> >Rev.</option>
                				<option value="Miss." <?php echo $Miss ?> >Miss.</option>
                			</select>
                		</div>
                	</div>
                </div>
                <div class="form-group">
                	<div class="row">
                		<div class="col-md-6">
                			<label>First Name</label>
                			<input type="text" class="form-control" name="fname" id="fname" autocomplete="off"  value="<?php echo $row4['nic']; ?>" required />
                			
                		</div>
                		<div class="col-md-6">
                			<label>Last Name </label>
                			<input type="text" class="form-control" name="lname" id="lname" autocomplete="off" value="<?php echo $row4['lname']; ?>" required />
                			
                		</div>	
                		
                	</div>	
                </div>
                
                <div class="form-group">
                	<label>Email</label>
                	<input type="text" class="form-control" readonly="" name="address" id="address" autocomplete="off" value="<?php echo $row4['eadd']; ?>" required />
                </div>

                <div class="form-group">
                	<label>Address</label>
                	<textarea type="text" class="form-control" name="address" id="address" autocomplete="off" value="" required ><?php echo $row4['add1']; ?></textarea>
                </div>
                
                
                <div class="form-group">
                	<div class="row">
                		<div class="col-md-6">
                			
                			<label>Tel no.</label>
                			<input type="text" class="form-control " name="tele" value="<?php echo $row4['home']; ?>" autocomplete="off"/>
                		</div>
                		<div class="col-md-6">
                			<label>Mobile no.</label>
                			<input type="text" class="form-control " name="mobile" value="<?php echo $row4['mobi']; ?>" autocomplete="off"/>
                			
                		</div>
                		
                	</div>
                </div>
                
                
                <div class="form-group">
                	<label>New Password</label>
                	<input type="password" class="form-control " name="password" value="<?php echo $row4['password']; ?>"/>
                </div>
                
                <div class="form-group">
                	<label>Retype Password</label>
                	<input type="password" class="form-control " name="con_password" value="<?php echo $row4['password']; ?>"/>
                </div>
                
                <button type="submit" class="btn btn-primary btn-inline" id="btn-login">Edit</button>
                
            </form>
            
        <?php } ?>
        
    </div>
    <div class="slider-product dotted-style-1 pt-30">
    	
    </div>
</div>
				<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="slider-sidebar">
							<?php 
					  /*$sql3="SELECT * FROM minibanner_top LIMIT 1";
					  $result3=mysqli_query($conn,$sql3);
					  while ($row3 = mysqli_fetch_array($result3)){ */?>
						
							<div class="slider-single-img mb-20">
								<a href="#">
									<img class="img_a" src="img/minibanners/<?php //echo $row3['img'];?>" alt="cellphone accessories in kurunegala" />
									<img class="img_b" src="img/minibanners/<?php //echo $row3['img'];?>" alt="cellphone accessories in kurunegala" />
								</a>
							</div>
								<?php // } ?>
							
									<?php 
								
					  /*$sql3="SELECT * FROM minibanner_bottom LIMIT 1";
					  $result3=mysqli_query($conn,$sql3);
					  while ($row3 = mysqli_fetch_array($result3)){ */?>
							
							<div class="slider-single-img none-sm">
								<a href="#">
								<img class="img_a" src="img/minibanners/<?php //echo $row3['img'];?>" alt="cellphone accessories in kurunegala" style="height:409px; width:300px;"/>
								<img class="img_b" src="img/minibanners/<?php //echo $row3['img'];?>" alt="cellphone accessories in kurunegala" style="height:409px;width:300px;"/>
								</a>
							</div>
							<?php // } ?>
							
							
						</div>
					</div>-->
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		
		
		<!-- electronic-tab-area-start -->

		<!-- electronic-tab-area-end -->
		
		
		
		<!-- all-product-area-start -->

		<!-- all-product-area-end -->
		<!-- brand-area-start -->

		<!-- brand-area-end -->
		<!-- blog-area-start -->

		<!-- blog-area-end -->
		<!-- newletter-area-start -->
		
		<!-- newletter-area-end -->
		<?php include "common/footer.php"; ?>
		<!-- copyright-area-start -->
		
		<!-- copyright-area-end -->
		<!-- social_block-start -->
		
		<!-- social_block-end -->
		
		
		<!-- all js here -->
		<!-- jquery-1.12.0 -->
		
		<!-- bootstrap.min.js -->
		<script src="js/bootstrap.min.js"></script>
		<!-- nivo.slider.js -->
		<script src="js/jquery.nivo.slider.pack.js"></script>
		<!-- jquery-ui.min.js -->
		<script src="js/jquery-ui.min.js"></script>
		<!-- jquery.magnific-popup.min.js -->
		<script src="js/jquery.magnific-popup.min.js"></script>
		<!-- jquery.meanmenu.min.js -->
		<script src="js/jquery.meanmenu.js"></script>
		<!-- jquery.scrollup.min.js-->
		<script src="js/jquery.scrollup.min.js"></script>
		<!-- owl.carousel.min.js -->
		<script src="js/owl.carousel.min.js"></script>		
		<!-- plugins.js -->
		<script src="js/plugins.js"></script>
		<!-- main.js -->
		<script src="js/main.js"></script>
	</body>
	</html>
