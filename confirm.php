<?php
session_start();
include "db/db.php";
if (isset($_SESSION['gest_user'])) {
	$user_id = htmlspecialchars(strip_tags(trim($_SESSION['temp_user'])), ENT_QUOTES, 'UTF-8');
	$g_user = htmlspecialchars(strip_tags(trim($_SESSION['gest_user'])), ENT_QUOTES, 'UTF-8');
	$whr = 'tmp_id';
	
	$sqlt = mysqli_query($conn, "SELECT * FROM live_cart WHERE tmp_id=$user_id AND flag!='0'"); //  AND User_ID='tmp_".$user_id."'
	if(mysqli_num_rows($sqlt) > 0) {
		//$sql_up = mysqli_query($conn, "UPDATE live_cart SET User_ID='$g_user', inv_id='$g_user' WHERE tmp_id='$user_id'");
		$row_inv = mysqli_fetch_assoc($sqlt);
		$g_inv = $row_inv['inv_id'];
		$sql_up = mysqli_query($conn, "UPDATE live_cart SET User_ID='$g_inv', inv_id='$g_inv' WHERE tmp_id='$user_id'");
	}

} else {
	if (!isset($_SESSION['user'])) {
		$redirectUrl = "login_cart";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";	
	
	} else {
		$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');
		$sqlu = "SELECT id FROM cust WHERE usern='$log'";
		$resultu = mysqli_fetch_assoc(mysqli_query($conn, $sqlu));
		$user_id = $resultu['id'];
		$whr = 'User_ID';
	}
}
$x = "SELECT inv_id FROM live_cart WHERE $whr=$user_id AND flag!='0'";
$sql = mysqli_query($conn, $x);
if(mysqli_num_rows($sql) == 0) {
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
label {
    font-size: 13px;
}#pre_loader{
	background:#f3f3f396 url(img/loading.gif) no-repeat center center; height:100%;position:fixed;z-index:9999999;right:0;left:0;bottom:0;top:0;overflow-y:hidden
}
.loading{overflow:hidden}
#pre_loader {display:none}
</style>	

	
		
</head>
	
	
    <body>
  <div id="pre_loader"></div>
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
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
					<div class="col-lg-6 col-md-6 col-sm-12">
						<div class="main-slider" style="">
							<div class="slider-container">

			            <div class="box" style="margin-top:40px;margin-bottom:40px;">
						<h4>SHIPPING ADDRESS</h4><hr>
			  
              <form id="chk_form" method="post" action="javascript:void(0);">
			  
            
			<div class="row">
			<div class="col-md-6">
               
			   <div class="form-group">
			   <label>First Name<span class="required">*</span></label>
                    <input type="text" class="form-control" name="fname" id="fname" autocomplete="off"  value="" required />
					<span class="help-block"></span>
					</div>
				 </div>
				
				<div class="form-group">
				<div class="col-md-6">
				<label>Last Name <span class="required">*</span></label>
                    <input type="text" class="form-control" name="lname" id="lname" autocomplete="off" value="" required />
					<span class="help-block"></span>
				</div>	
				</div>	
					
				</div>	
           
				  	 <div class="form-group">
                  		<label for="name">Delivery Address<span class="required">*</span></label><br>
					
				<textarea rows="3" cols="70" name="address" id="address" required>
</textarea><span class="help-block"></span>
                </div>

            <div class="form-group">
                <label class="col-md-12" style="padding-left: 1px;">Town/City</label>
                <input type="text" id="toAddress" name="city" class="form-control" value="">
                <input type="hidden" id="distance" name="distance" name="to" class="form-control" value="">
            </div>


            <div id="locations"style="display: none;"></div><!-- To Display list of locations entered -->
            <div class="">
              <label class="info-title"> </label>
              <div class="">
                <div id="summary" ></div><!-- To Display general summary (Distance & Duration) -->
              </div>
            </div>

             <!-- Modal -->
            <div id="mapModal" class="well" style="display: none;">
                <div id="map_area">
                    <div id="map_canvas"></div><!-- To Display Map -->
                    <div id="directions"></div><!-- To Display all directions with Waypoints -->
                </div>
            </div>
				

				
				
				<div class="row">
				<div class="col-md-6">
				 <div class="form-group">
                   <label>Phone No</label>
                    <input type="text" class="form-control " name="tele" id="tele" value="" autocomplete="off"/>
					<span class="help-block"></span>
					</div>
					</div>
					<div class="col-md-6">
					<div class="form-group">
					 <label>Mobile No<span class="required">*</span></label>
                    <input type="text" class="form-control " name="mobile" id="mobile" value="" autocomplete="off" required>
					<span class="help-block"></span>
					</div>
					</div>
					
					</div>
                
				
				 <div class="form-group">
                 <label>Email Address<span class="required">*</span></label>
                    <input type="text" value="" class="form-control " name="eadd" id="eadd" required />
					<span class="help-block"></span>
                </div>
				
	
                
				<div id="errorDiv" style="float: left;padding-left: 30px;"></div>
				<input type="submit" value="Place Order" id="btn_checkout" name="btn_checkout" class="btn btn-primary btn-inline">
				
              </form></div>
			
							
		
							</div>	
						</div>
						
					</div>
					
				</div>
			<!--	<div class="row" >
					<div class="col-md-3"></div>
		  <div class="col-md-8" style="margin-left:12px;"><table>
                <tr bgcolor="#CCCCCC"> 
                  <td width="75" height="27" bgcolor="#F0F0F0"><strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif">&nbsp;Name:</font></strong></td>
                  <td width="253" bgcolor="#CAEEFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;O.A.A.M.Amarasekara</font></strong></td>
                </tr>
                <tr bgcolor="#CCCCCC"> 
                  <td height="24" bgcolor="#F0F0F0"><strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif">&nbsp;Acc 
                    No:</font></strong></td>
                  <td bgcolor="#CAEEFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;334100120000845</font></strong></td>
                </tr>
                <tr bgcolor="#CCCCCC"> 
                  <td height="25" bgcolor="#F0F0F0"><strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif">&nbsp;Bank:</font></strong></td>
                  <td bgcolor="#CAEEFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;Peoples 
                    bank</font></strong></td>
                </tr>
                <tr bgcolor="#CCCCCC"> 
                  <td height="23" bgcolor="#F0F0F0"><strong><font color="#990000" size="2" face="Arial, Helvetica, sans-serif">&nbsp;Fax:</font></strong></td>
                  <td bgcolor="#CAEEFF"><strong><font size="2" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;0372221055</font></strong></td>
                </tr>
              </table></div>
				
				
				</div>
	-->
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

        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyAuWch6HsB-2Xj_a7gr0VpM-JJNOrLdMtE"></script>
		<script type="text/javascript" src="assets/main.js"></script>
<script>
$(document).ready(function () {
	// valid email pattern
	var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	$.validator.addMethod("validemail", function (value, element) {
		return this.optional(element) || eregex.test(value);
	});
	
	// contact no validation
	var telregex = /^\d{10}$/;
	$.validator.addMethod("validtel", function (value, element) {
		return this.optional(element) || telregex.test(value);
	});	
	
	// JavaScript Validation For Register Form 
	$("#chk_form").validate({
		rules: {
			eadd: {
				validemail: true
			},
			mobile: {
				validtel: true,
			},
			tele: {
				validtel: true,
			}
		},
		messages: {
			eadd: {
				validemail: "Please Enter Valid Email Address"
			},
			mobile: {
				validtel: "Invalid Mobile Number"
			},
			tele: {
				validtel: "Invalid Contact Number"
			}
		},
		errorPlacement: function (error, element) {
			$(element).closest('.form-group').find('.help-block').html(error.html());
		},
		highlight: function (element) {
			$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
		},
		unhighlight: function (element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass('has-error');
			$(element).closest('.form-group').find('.help-block').html('');
		},
		submitHandler: submitForm
	});

	function submitForm() {
		$("#pre_loader").show();
		$.ajax({
		type: 'POST',
		async: false,
		url: 'connection/checkout_fun.php',
		data: $('#chk_form').serialize(),
		dataType: 'json',
		success: function (data) {
			setTimeout(function () {
				if (data.status === '1') {
					window.location.href = 'order-summary';
				
				} else if (data.status === '3') {
					alert('Session Expired. Please Try Again!');
					window.location.href = 'login_cart';
				
				} else {
					$('#errorDiv').slideDown(200, function () {
						$('#errorDiv').html('<div class="alert alert-danger style2"><h4 class="alert_title">' + data.message + '</h4></div>');
						$('#errorDiv').delay(5000).slideUp(100);
					});
				}

			}, 1000);
		},
		error: function () {
			$("#pre_loader").fadeOut("slow");
			alert('An unknown error occoured, Please try again Later...!')
		}
		});
		return false;
	}
	
	$.post("connection/checkout_fun.php", {'get_chkout_data': "data"}, function( data ) {
		if(data === '') {
		
		} else {
			$("#fname").val(data.fname);
			$("#lname").val(data.lname);
			$("#tele").val(data.Tel_no);
			$("#mobile").val(data.Mob_no);
			$("#address").val(data.address);
			$("#toAddress").val(data.town);
			$("#eadd").val(data.email);
		}		

	}, "json");
	
});

</script>
</body>
</html>