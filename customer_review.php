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

		<!-- <link rel="stylesheet" href="dist/starrr.css"> -->
		
<style>
	p{
		font-size:14px;	
	}

	.form-selector {
    	padding-bottom: 14px;
	}

	.sss{
		font-size:14px;	
	}

	.starrr {
	  display: inline-block; 
	}
	.starrr a {
	    font-size: 25px;
	    padding: 0 4px;
	    cursor: pointer;
	    color: #FFD119;
	    text-decoration: none; 
	}

	.bs-callout {
	    padding: 20px;
        margin: 10px 40px;
        border: 1px solid #eee;
        border-left-width: 20px;
        border-radius: 3px;
	}
	.bs-callout h5 {
	    margin-top: 0;
	    margin-bottom: 5px;
	}
	.bs-callout p:last-child {
	    margin-bottom: 0;
	}
	.bs-callout code {
	    border-radius: 3px;
	}
	.bs-callout+.bs-callout {
	    margin-top: -5px;
	}
	.bs-callout-default {
	    border-left-color: #777;
	}

	.bs-callout-success {
	    border-left-color: #ff5313;
	}
	.bs-callout-success h5 {
	    color: #ff5313;
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
			<a href="customer_feedback.php" class="btn btn-primary pull-right" target="_blank"> LEAVE A FEEDBACK </a>
			
		
			<div class="row">
					
				<div class="col-lg-10 col-md-10 col-sm-12" style="margin-top:40px;">
				
					<h2 style="color:#666666;">Customer Review</h2>
					<hr>

					<?php 
					    $sql = "SELECT
feedback.flag,
feedback.date,
feedback.comment,
feedback.rating,
feedback.order_id,
feedback.reply,
feedback.reply_id,
feedback.reply_date,
order_details.fname,
order_details.lname,
cart_details.name,
cart_details.img
FROM
feedback
Inner Join order_details ON feedback.order_id = order_details.inv_id
Inner Join cart_details ON order_details.inv_id = cart_details.inv_id
WHERE feedback.flag = 1
GROUP BY order_details.inv_id
ORDER BY date DESC";
					    $result = mysqli_query($conn,$sql);
							
						while($row = mysqli_fetch_array($result)){

					?>

            		<div class="container col-lg-12 col-md-12 col-sm-12">
            			
						<div class="panel panel-primary" style="border-color: #777 ">
					      	<div class="panel-heading" style="background-color: #777; border-color: #777">
					      		<?php echo $row['fname']; ?> <?php echo $row['lname']; ?> on <?php echo $row['date']; ?>
					      	</div>

					      	<div class="panel-body">
					      		<p style="float: right;"><b>Purchased Item: <i><?php echo $row['name']; ?></i></b> </p>
		                  		<div class="form-group">
				                    <div class='starrr star2'></div>
				                    <input type='hidden' name='rating' value='<?php echo $row['rating']; ?>' class='star2_input' />
		                  		</div>

		                  		<div>
		                  			<p><?php echo $row['comment']; ?></p>
		                  		</div>
		                  		<?php if($row['reply_id']==1){?>
								    <div class="bs-callout bs-callout-success">
								      <h5><i class="fa fa-reply"></i> Admin replied on <?php echo $row['reply_date'];?></h5>
								      <?php echo $row['reply']; ?>
								    </div>
								<?php }?>
					      	</div>
					    </div>

					</div>
						<?php } ?>
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

        <script src="dist/starrr2.js"></script>

        <script>
		/**************************** Insert Embassy ****************************/
		
		$("#contact-form").on('submit',(function(e) {
			var menu = $("#menu").val();
			
			e.preventDefault();
			$.ajax({
	      url: "connection/customer_feedback_fun.php",
	      type: "POST",
	      data:  new FormData(this),
	      contentType: false,
	      cache: false,
	      processData:false,
	      beforeSend : function()
	      {
	      },
	      success: function(data){
	        if(data === '') {
	         alert("Something went wrong. Please try again later!")
	         
	       } else {
	         if(data ==='error')
	         {
	          salert("Something went wrong. Please try again later!")
	          
	        } else if(data ==='invalid') {
	          alert("Please enter a valid Order No!!")				  
	          
	        } else if(data ==='success') {
	          alert("Thank you for your feedback!!")
	          window.location.href = "customer_feedback.php";
	        }
	      }      
	    },
	    error: function(e) 
	    {
	      alert("err2");
	    }
	  });
		}));
        </script>


        <script>

          var $s2input = $('.star2_input');
          $('.star2').starrr({
            max: 5,
            rating: $s2input.val(),
             change: function(e, value){
               $s2input.val(value).trigger('input');
             }
          });
        </script>
        



    </body>
</html>