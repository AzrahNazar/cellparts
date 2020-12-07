<?php include "db/db.php"; 
session_start();


if (isset($_SESSION['user']))
{
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

}


if (empty($log)) {
	   $user = "";
		$uid = "";
} else {

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
?>
<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta http-equiv="Content-Security-Policy" content="base-uri 'self'">
        <title>CellParts.lk</title>
    
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="Contact Us CellParts.lk Mobile Phone and mobile accessories in Sri Lanka" />
<meta name="keywords" content="CellParts.lk,srilanka,mobile phones, Mobile Phone Prices in Sri Lanka, Nokia Phones, Samsung, Sony Ericsson, LG, HTC, iPhone, Send Free ,Mobile Phone Classifieds,Sri lanka phone Accessories,phone Accessories,sri lanka phone Accessories prices,phone Accessories prices in sri lanka,Bluetooth Accessories for Sale in Sri Lanka,PDA Accessories,Nokia Phones,New & Used Mobile Phones,Nokia, Samsung, Sony Ericsson, Motorola, LG, HTC, iPhone, Blackberry,Mobile Phone News" />
		
		
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

.mainmenu{
 /* padding: 10px 16px;*/
  background: #666666;
  color: #f1f1f1;
}	
p{
	text-align: justify;
}
	
	</style>	
	
    </head>
	
	
    <body>
  
        <!-- Add your site or application content here -->
        <!-- header -->
					<?php include "common/header.php";?>
					<!-- header -->
		<!-- mainmenu-area-start -->
		<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm " id="myHeader">
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
		<div class="slider-area content" >
			<div class="container">
				<div class="row">
					<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>-->
					<div class="col-lg-9 col-md-9 col-sm-12">
						<div class="main-slider">
							<div class="slider-container">
								
							<h2 style="color:#666666;">About Us </h2>
							
							<p>CellParts.lk Center was found in 1995. We engaged in mobile phone repairs, mobile phone unlocking and sell of cellular accessories. We have been served more than 20 Branded Products. It includes mobile phone accessories, mobile phone parts, cell phone housing, LCD, keypad, antenna, flex cable, battery, lens, speaker, related small parts, data cable, holster and so on.

CellParts.lk has been continuing to expand and improve, We are the leading mobile phone repair centre in the City of Kurunegala.</p><p> We can repair and unlock 99% of mobile phones in the market. We deal with basic repairs like broken LCD replacements, speaker, microphone and charging problems. We also offer high level component replacement like the treatment of liquid damage and physical damage. We are constantly upgrading our mobile phone unlocking systems this means we can unlock the latest phones.</p>

<p>If you have any questions about our mobile phone repairs or mobile phone unlocking services please do not hesitate to Contact us.</p>
					
							</div>	
						</div>
								<?php 
								
					  $sql3="SELECT * FROM banner_middle LIMIT 1";
					  $result3=mysqli_query($conn,$sql3);
					  while ($row3 = mysqli_fetch_array($result3)){ ?>
						
						<div class="slider-product dotted-style-1 pt-30 hidden-xs hidden-sm" style="margin-top:80px;">
							
							<a href="#">
								<img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="mobile phones sumedacellular Kurunegala" style="height:170px;" />
								
							</a>
														
							
						</div>
						  <?php } ?>
						
					</div>
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-bottom:10px;">
						<div class="slider-sidebar">
						<?php 
								
					  $sql3="SELECT * FROM top_right_img ORDER by id DESC LIMIT 1";
					  $result3=mysqli_query($conn,$sql3);
					  while ($row3 = mysqli_fetch_array($result3)){ ?>
						
							<div class="slider-single-img mb-20" >
								<a href="#">
									<img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" />
									<img class="img_b" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" />
								</a>
							</div>
					  <?php } ?>
							
							
								<?php 
								
					  $sql3="SELECT * FROM bottom_right_img ORDER by id DESC LIMIT 1";
					  $result3=mysqli_query($conn,$sql3);
					  while ($row3 = mysqli_fetch_array($result3)){ ?>
							<div class="slider-single-img none-sm">
								<a href="#">
								<img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" />
								<img class="img_b" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" />
								</a>
							</div>
							
							  <?php } ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		
		
		
		
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
