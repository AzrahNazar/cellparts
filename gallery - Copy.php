<?php include "db/db.php"; 
session_start();


if (isset($_SESSION['user']))
{
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

}


if (empty($log)) {

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
		
		
    
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		

		<!--Import Google Icon Font-->
      	<!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->
      	<!--Import materialize.css-->
      	<!-- <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/> -->

      	<!-- responsive.css -->
        <link rel="stylesheet" href="css/responsive.css">
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="js/vendor/jquery-2.1.4.min.js"></script>


		<!-- Compiled and minified JavaScript -->
    	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> -->
	<style>

.mainmenu{
 /* padding: 10px 16px;*/
  background: #666666;
  color: #f1f1f1;
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
								
							<h2 style="color:#666666;">Gallery </h2>

								<!-- <div class="carousel">
						          <a class="carousel-item" href="#one!"><img src="images/gallery/1.jpg"></a>
						          <a class="carousel-item" href="#two!"><img src="images/gallery/2.jpg"></a>
						          <a class="carousel-item" href="#three!"><img src="images/gallery/1.jpg"></a>
						          <a class="carousel-item" href="#four!"><img src="images/gallery/3.jpg"></a>
						          <a class="carousel-item" href="#five!"><img src="images/gallery/2.jpg"></a>
						        </div> -->





								<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  									<div class="carousel-inner">
    									<div class="carousel-item active">
											<img class="d-block w-100" src="images/gallery/1.jpg" alt="First slide" width="200px" height="100px;">
    									</div>
    									<div class="carousel-item">
      										<img class="d-block w-100" src="images/gallery/2.jpg" alt="Second slide">
    									</div>
									    <div class="carousel-item">
									      <img class="d-block w-100" src="images/gallery/3.jpg" alt="Third slide">
									    </div>
									</div>
									  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
									   	<span class="carousel-control-prev-icon" aria-hidden="true"></span>
									    <span class="sr-only">Previous</span>
									  </a>
									  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
									    <span class="carousel-control-next-icon" aria-hidden="true"></span>
									    <span class="sr-only">Next</span>
									 </a>
								</div>
							</div>	
						</div>	
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
       
		
        
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!--JavaScript at end of body for optimized loading-->
      <!-- <script type="text/javascript" src="materialize/js/materialize.min.js"></script> -->

      <!-- <script>
      	//Carousel
         $(document).ready(function(){
          $('.carousel.carousel').carousel();
         });

      </script> -->
    </body>
</html>
