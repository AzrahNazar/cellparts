<?php
session_start();
include "db/db.php";

if(isset($_GET['order_id']) && $_GET['order_id'] != '') {
	$o_id = htmlspecialchars(strip_tags(trim($_GET['order_id'])), ENT_QUOTES, 'UTF-8');
	$sql_ordr = mysqli_fetch_assoc(mysqli_query($conn, "SELECT Mob_no FROM order_details WHERE inv_id='$o_id'"));
	$tel_no = $sql_ordr['Mob_no'];

} else {
	$redirectUrl = "index";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";	
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
    background: #fff;
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
				<div class="row" >
					<div class="col-lg-12">
						<div class="main-slider" style="">
							<div class="slider-container">

								<div class="box" style="margin-top:40px;margin-bottom:40px;">
								<h4>ORDER CONFIRM</h4><hr>
<section id="content-holder" class="container-fluid container" style="">
  <section class="row-fluid">
    <section class="span8">
      <section class="b-detail-holder">
        <article class="title-holder">
          <h4>Your order has been received.</h4>	
        </article>
        <section class="reviews-section">
          <figure class="right-sec r-border"> <span class="green-t">Thank for your purchase!</span>
            <p>Your order number is: <b><?php echo $o_id; ?></b><br/>
              You will receive an order confirmation email with details of your order.<br/></p><hr>
            <a href="index" class="btn btn-primary btn-inline">Continue Shopping</a> </figure>
        </section>
      </section>
    </section>
  </section>
</section>

<input type="hidden" value="<?php echo $o_id; ?>" id="inv_id">
<input type="hidden" value="<?php echo $tel_no; ?>" id="tel_no">
					  
								</div>
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
        <script type="text/javascript" src="js/jquery.validate.min.js"></script>
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
        <!--<script src="js/jquery.scrollup.min.js"></script>-->
		<!-- owl.carousel.min.js -->
        <script src="js/owl.carousel.min.js"></script>		
		<!-- plugins.js -->
        <script src="js/plugins.js"></script>
		<!-- main.js -->
        <script src="js/main.js"></script>

		<script type="text/javascript" src="assets/main.js"></script>
		
<script type="text/javascript">
$(document).ready(function () {
	var inv_id = $("#inv_id").val();
	var mobile_no = $("#tel_no").val();
	//send_sms_fun(mobile_no, inv_id);
	//send_sms_fun2(mobile_no, inv_id);
	
});

// function send_sms_fun(mobile_no, inv_id) {
// 	var msg = "Your order has been successfully placed. Thank you! Order ID is "+inv_id; 
// 	var msg2 = "New order has been received. Order ID is "+inv_id; 
// 	var res = mobile_no.substring(1);
// 	var tel = '94'+res;
	
// 	$.ajax({
// 		type: "POST",
// 		async: false,
// 		dataType: 'jsonp',
// 		url: "http://123.231.38.75:5000/sms/send_sms.php",
// 		data: {'username': 'sumecel',
// 		'password': 'SuDCe370',
// 		'src': 'SUMEDA CELL',
// 		'dst': tel,
// 		'msg': msg,
// 		'dr': '1',           
// 		},
// 		success: function (response) {
// 		//alert(response);
// 		}		
// 	});
	
// 	$.ajax({
// 		type: "POST",
// 		async: false,
// 		dataType: 'jsonp',
// 		url: "http://123.231.38.75:5000/sms/send_sms.php",
// 		data: {'username': 'sumecel',
// 		'password': 'SuDCe370',
// 		'src': 'SUMEDA CELL',
// 		'dst': '94777444584',
// 		//'dst': '94766511581',
// 		'msg': msg2,
// 		'dr': '1',           
// 		},
// 		success: function (response) {
// 		//alert(response);
// 		}		
// 	});
// }

function send_sms_fun(mobile_no, inv_id) { 
	 $.post( "connection/regis_fun_cart.php", { sms_confirm_order: "data", mobile_no:mobile_no, inv_id:inv_id }, function( data ) {
	  $("#pre_loader").fadeOut("slow");
	    if($.trim(data) == '') {
	      swal("Oops...", "Something went wrong!", "warning");
	    } else {
	      if($.trim(data) === 'error')
	      {
	        swal("SQL Error!", "Please Try Again!", "warning");
	      }
	      if(data.status == "1602"){
	        swal({
	          title: "",
	          text: "Error occurred while SMS save into database!",
	          type: "warning",
	          timer: 2000,
	          showConfirmButton: false,
	        });
	      }else if(data.status == '1601'){
	        swal("Successfully Registered", "Thank You for registering with CellParts.lk!", "success");
	        setTimeout(
	        function() 
	        {//window.location.href = "sms_supplier.php?menu="+menu;
	      }, 2000);

	      }else if(data.status == '1603'){
	        swal("Oops...", "Please recharge your account!", "warning");

	      }else if(data.status == '1604'){
	        swal("Oops...", "Invalid Phone number!", "warning");

	      }else{
	        swal("Oops...", "Error occurred while sending SMS!", "warning");

	      }
	    }  
	}, "json");

}

function send_sms_fun2(mobile_no, inv_id) { 
	 $.post( "connection/regis_fun_cart.php", { sms_confirm_order_owner: "data", mobile_no:mobile_no, inv_id:inv_id }, function( data ) {
	  $("#pre_loader").fadeOut("slow");
	    if($.trim(data) == '') {
	      swal("Oops...", "Something went wrong!", "warning");
	    } else {
	      if($.trim(data) === 'error')
	      {
	        swal("SQL Error!", "Please Try Again!", "warning");
	      }
	      if(data.status == "1602"){
	        swal({
	          title: "",
	          text: "Error occurred while SMS save into database!",
	          type: "warning",
	          timer: 2000,
	          showConfirmButton: false,
	        });
	      }else if(data.status == '1601'){
	        swal("Successfully Registered", "Thank You for registering with CellParts.lk!", "success");
	        setTimeout(
	        function() 
	        {//window.location.href = "sms_supplier.php?menu="+menu;
	      }, 2000);

	      }else if(data.status == '1603'){
	        swal("Oops...", "Please recharge your account!", "warning");

	      }else if(data.status == '1604'){
	        swal("Oops...", "Invalid Phone number!", "warning");

	      }else{
	        swal("Oops...", "Error occurred while sending SMS!", "warning");

	      }
	    }  
	}, "json");

}
</script>
</body>
</html>