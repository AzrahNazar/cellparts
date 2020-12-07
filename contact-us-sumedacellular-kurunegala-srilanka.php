<?php include "db/db.php"; 
session_start();

if ((isset($_GET['inquiry']))){
	$inquiry = htmlspecialchars(trim($_GET['inquiry']), ENT_QUOTES, 'UTF-8');
}else{
	$inquiry = 0;
}

if ((isset($_GET['id']))){
	$pro_id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');
}


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

		<script src="https://www.google.com/recaptcha/api.js" async defer></script>
		
<style>
	p
	{
	font-size:14px;	
		
	}
	.form-selector {
    padding-bottom: 14px;
}
.sss
{
font-size:14px;	
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
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1977.8942166219797!2d80.36420855757504!3d7.48859751544151!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae33a1e6f2dadc9%3A0xf5c0eb22c2bfd29b!2sSumeda+Cellular+Service!5e0!3m2!1sen!2slk!4v1509440116748" width="100%" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
			<div class="container">
			
		
				<div class="row">
					
				<div class="col-lg-8 col-md-8 col-sm-12" style="margin-top:40px;">
				
							<h2 style="color:#666666;">Contact Form</h2>
						<hr>
            <form action="mail/send_massage.php" id="contact-form" method="post">
              <div class="alert alert-success hidden" id="contact-alert-success"> <strong>Success!</strong> Thank you for your message. Reply will 
                be in a while! </div>
              <div class="alert alert-danger hidden" id="contact-alert-error"> <strong>Error!</strong> Something went wrong sending your message. </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Name <span class="required">*</span></label>
                    <input type="text" value="" data-msg-required="Please enter your name."
					class="form-control" name="name" id="name" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Email <span class="required">*</span></label>
                    <input type="email" value="" data-msg-required="Please enter your email address."
					data-msg-email="Please enter a valid email address." class="form-control" name="email" id="email" autocomplete="off">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Phone</label>
                    <input type="text" value="" data-msg-required="Please enter the subject."
					class="form-control" name="phone" id="phone" autocomplete="off">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Message <span class="required">*</span></label>
                    <textarea data-msg-required="Please enter your message." rows="10"
					class="form-control" name="message" id="message" autocomplete="off"><?php if($inquiry==1){?> I would like to make an inquiry regarding the availablity Product No: <?php echo $pro_id; }?></textarea>
                  </div>
                </div>
              </div>
              <div class="g-recaptcha" data-sitekey="6Lf_V5wUAAAAACjUstPpLtYTmte6P3SonhnFGtIc"></div>
              <br/>
              <div class="row">
                <div class="col-md-4">
                  <input type="submit" value="Send Message" class="btn btn-primary" data-loading-text="Loading...">
                </div>
              </div>
            </form>
						
						
						<div class="slider-product dotted-style-1 pt-30">
					
						</div>
					</div>
		<div class="col-lg-4 col-md-4 col-sm-12">
				<div class="footer-widget" style="margin-top:120px;">
								<div class="contact-info">
									<ul>
										<li>
											<div class="contact-icon">
												<i class="fa fa-home"></i>
											</div>
											<div class="contact-text">
												<span style="color:#626262;font-size:14px;">CellParts.lk,<br> No:13, Maliyadeva Street,<br> 1st Floor, New Busstand Complex,<br> Kurunegala</span>
											</div>
										</li>
										<li>
											<div class="contact-icon">
												<i class="fa fa-envelope-o"></i>
											</div>
											<div class="contact-text">
												<a href="https://mail.google.com/mail/?view=cm&fs=1&to=sumedacellular@gmail.com"><span style="color:#626262;font-size:14px;">cellparts.lk@gmail.com</span></a>
											</div>
										</li>
										<li>
										</li>
									</ul>
								</div>
							</div>

		</div>
		
		
				</div>
				
			</div>
		</div>
		<!-- slider-area-end -->
		
	
		<!-- newletter-area-end -->
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
								<a href="#"><img src="img/brand/brand3.jpg" alt="htc cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand2.jpg" alt="huawei cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand4.jpg" alt="samsung cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand1.jpg" alt="apple cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand5.jpg" alt="sony cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							
								<div class="single-brand">
								<a href="#"><img src="img/brand/brand7.jpg" alt="nokia cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand8.jpg" alt="micromax cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand9.jpg" alt="oppo cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand10.jpg" alt="lenovo cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand11.jpg" alt="blackberry cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand12.jpg" alt="intex cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
								<div class="single-brand">
								<a href="#"><img src="img/brand/brand13.jpg" alt="motorola cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand14.jpg" alt="zte cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							<div class="single-brand">
								<a href="#"><img src="img/brand/brand15.jpg" alt="dell cellphone accessories in kurunegala srilanka" style="width:165px;height:80px;"/></a>
							</div>
							
					
						</div>
					</div>
				</div>
			</div>
		</div>


<footer>

<!--------------messenger sdk script-------------->
<!--<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId            : '602268270131628',
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.0'
    });
  };

  (function(d, s, id){
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "https://connect.facebook.net/en_US/messenger.Extensions.js";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'Messenger'));
</script>-->

			<!-- footer-top-area -->
			<div class="footer-top-area border-1 ptb-30 bg-color-3">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="footer-title">
								<h4 style="margin: 0 0 5px;">CellParts.lk</h4>
							</div>
							<div class="footer-widget">
								<div class="contact-info">
									<ul>
									
									
										<li style="padding-bottom: 10px;">
											<div class="contact-icon">
												<i class="fa fa-home"></i>
											</div>
											<div class="contact-text">
											<span>CellParts.lk,<br> No:13, Maliyadeva Street,<br> 1st Floor, New Busstand Complex,<br> Kurunegala</span>
											</div>
										</li>
										<li style="padding-bottom: 10px;">
											<div class="contact-icon">
												<i class="fa fa-envelope-o"></i>
											</div>
											<div class="contact-text">
												<a href="#"><span>cellparts.lk@gmail.com</span></a>
											</div>
										</li>
										<!-- <li style="padding-bottom: 10px;">
											<div class="contact-icon">
												<i class="fa fa-phone"></i>
											</div>
											<div class="contact-text">
												<span>+94 37 205 6554 / +94 37 222 1055</span>
											</div>
										</li> -->
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="footer-title">
								<h4 style="margin: 0 0 5px;">Information</h4>
							</div>
							<div class="footer-widget">
								<div class="list-unstyled">
									<ul>
										<li><a href="https://sumedacellular.com">Home</a></li>
										<li><a href="about-us-sumedacellular-kurunegala-srilanka">About Us</a></li>
										<li><a href="accessories-sumedacellular-kurunegala-srilanka">Accessories</a></li>
										<li><a href="newarrivals-sumedacelullar-kurunegala-srilanka">New Arrivals</a></li>
										<li><a href="contact-us-sumedacellular-kurunegala-srilanka">Contact Us</a></li>
										
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
										<li><a href="account">My Account</a></li>
										<li><a href="login_cart">Login</a></li>
										<li><a href="register">Register</a></li>
										
									</ul>
								</div>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
					
							
	
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
                                <p>Copyright <a href="https://cyclomax.net/">Cyclomax</a>. All Rights Reserved &nbsp
								<a href="backend/login.php" ><i class="fa fa-lock" style="font-size:20px;"></i> </a></p>
								
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
				<li class="" style="background-image: url('img/fb.png');margin-bottom: 10px;"><a href="#"></a></li>
				
				<li style="background-image: url('img/g+.png');margin-bottom: 10px;"><a href="#"></a></li>
				<li style="background-image: url('img/pinterest.png');margin-bottom: 10px;"><a href="#"></a></li>
			</ul>
			
		</div>
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
