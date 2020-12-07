<?php
session_start();
include "db/db.php";
if (isset($_SESSION['gest_user'])) {
	$user_id = htmlspecialchars(strip_tags(trim($_SESSION['temp_user'])), ENT_QUOTES, 'UTF-8');
	$g_user = htmlspecialchars(strip_tags(trim($_SESSION['gest_user'])), ENT_QUOTES, 'UTF-8');
	$whr = 'tmp_id';

} else {
	if (!isset($_SESSION['user'])) {
		$redirectUrl = "login";
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
$yy = "SELECT inv_id, SUM(price*Qty) AS tot FROM live_cart WHERE $whr=$user_id";
$sql = mysqli_query($conn, $yy);
if(mysqli_num_rows($sql) == 0) {
	$redirectUrl = "index";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";	

} else {
	$row = mysqli_fetch_assoc($sql);
	$inv_id = $row['inv_id'];
	$tot = $row['tot'];

	$sqlu = "SELECT * FROM order_details_temp WHERE User_ID='$user_id' AND inv_id='$inv_id'";
	$resultu = mysqli_query($conn, $sqlu);
	$countu = mysqli_num_rows($resultu);

	if($countu == 0) {
		$redirectUrl = "index";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";		
		
	} else {
		$sqltmp = mysqli_fetch_assoc($resultu);		
	}	
}



$sqluu = "SELECT scat.deli_method, books.sccode FROM books Inner Join scat ON books.sccode = scat.sccode
Inner Join live_cart ON books.itemcode = live_cart.Item_Code
WHERE live_cart.User_ID =  '$user_id' AND scat.deli_method =  '1'
GROUP BY books.sccode";
$resultuu = mysqli_query($conn, $sqluu);
$countuu = mysqli_num_rows($resultu);

if($countuu == 0) {
	$show = "";	
} else {
	$show = "display:none";
}

$sqlw = "SELECT books.sccode, scat.wrapping FROM books Inner Join scat ON books.sccode = scat.sccode Inner Join live_cart ON books.itemcode = live_cart.Item_Code WHERE live_cart.User_ID =  '$user_id' AND scat.wrapping = '1' GROUP BY books.sccode";
$resultw = mysqli_query($conn, $sqlw);
$countw = mysqli_num_rows($resultw);

if($countw == 0) {
	$wrap = 0;	
} else {
	$wrap = 100;
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
		}

		.table1 > tbody > tr > td, .table1 > tbody > tr > th, .table1 > tfoot > tr > td, .table1 > tfoot > tr > th, .table1 > thead > tr > td, .table1 > thead > tr > th {
			border-top: none;

		}
		.table2 > tbody > tr > td, .table2 > tbody > tr > th, .table2 > tfoot > tr > td, .table2 > tfoot > tr > th, .table2 > thead > tr > td, .table2 > thead > tr > th {
			font-size: 14px;
			text-align: right
		}

		.table2 tr.heading-bar-table {
			border-top: 5px solid #FF5313;
		}

		b, strong {
			font-weight: 600;
			font-size: 13px;
		}

		input[type=radio] {
			height: auto;
			position: relative !important;
			margin-right: 20px !important;
			width: auto;
			float: left;
			margin-left: 0 !important;
		}

		#payment div.payment_box {
			position: relative;
			width: 96%;
			padding: 1em 2%;
			margin: 1em 0 1em 0;
			font-size: 0.92em;
			-webkit-border-radius: 2px;
			-moz-border-radius: 2px;
			border-radius: 2px;
			line-height: 1.5em;
			background: #f7f7f7;
    /*background: -webkit-gradient(linear,left top,left bottom,from(#ebe9eb),to(#dfdbdf));
    background: -webkit-linear-gradient(#ebe9eb,#dfdbdf);
    background: -moz-linear-gradient(center top,#ebe9eb 0%,#dfdbdf 100%);
    background: -moz-gradient(center top,#ebe9eb 0%,#dfdbdf 100%);*/
    box-shadow: 0 1px 2px 0 rgba(0,0,0,0.25);
    -webkit-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.25);
    -moz-box-shadow: 0 1px 2px 0 rgba(0,0,0,0.25);
    color: #5e5e5e;
    text-shadow: 0 1px 0 rgba(255,255,255,0.8);
}
.payment_box {
	box-shadow: none !important;
	text-shadow: none !important;
}
.payment_box {
	display: none;
	}.payment_box h5 {
		line-height: 22px;
		font-size: 13.2px;
		}#pre_loader{
			background:#f3f3f396 url(img/loading.gif) no-repeat center center; height:100%;position:fixed;z-index:9999999;right:0;left:0;bottom:0;top:0;overflow-y:hidden
		}
		.loading{overflow:hidden}
		#pre_loader {display:none}

		@media (max-width: 767px) {
			.box {
				padding: 10px;
			}
			.table-responsive {
				padding: 10px;
			}
		}
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
			
			<div class="col-lg-6">
				<!-- <div class="main-slider" style="">
					<div class="slider-container">
						<div class="box" style="margin-top:40px;margin-bottom:40px;">
							<h4>DELIVERY METHOD</h4>
							<hr>
							<div class="table-responsive">
								<table width="100%" border="0">
									<tr>
										<ul class="billing-form">
											<div id="payment" style="border:none;">
												<li>
													<div class="label-holder">
														<label class="radio b-label">Courier Service
															<input type="radio" name="del_method" value="1" checked>
														</label>
														<div style="<?php //echo $show; ?>">
															<label class="radio b-label">Register Post (Very Small Item)
																<input type="radio" name="del_method" value="2">
															</label>
														</div>
														<label class="radio b-label">Pay by Customer
															<input type="radio" name="del_method" value="3">
														</label>
													</div>
												</li>
											</div>
										</ul>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
				 -->
				
				<div class="main-slider" style="">
					<div class="slider-container">

						<div class="box" style="margin-top:40px; margin-bottom:40px;">
							<input type="radio" name="del_method" value="1" checked style="display: none;">
							<h4>PAYMENT METHOD</h4><hr>
							<div class="table-responsive">
								<table width="100%" border="0">
									<tr>
										<ul class="billing-form">
											<div id="payment" style="border:none;">
												<li>
													<div class="label-holder">
														<label class="radio b-label">Credit/Debit Card, Mobile Wallet and Internet Banking via PayHere 
															<input type="radio" name="payment_method" id="optionsRadios1" value="1">
														</label>
														
														<img src="img/payhere.png" alt="PayHere" width="">
														
														<div class="payment_box payment_method_card">
															<h5><b>PayHere allows you to pay online payments from</b>
																<ul style="list-style-type:square;margin: 10px 30px;">
																	<li>Credit/Debit Cards: Visa, MasterCard, Amex</li>
																	<li>Mobile Wallets: eZcash, mCash, PayApp</li>
																	<li>Internet Banking: Sampath Vishwa, HNB</li>
																</ul></h5>
																<div class="alert alert-danger" style="margin: 10px 0;padding: 10px;"><p class="alert_title" style="font-size: 13px;"><i>3% of the transaction value will be applied as transaction fees. Subjected to change without prior notice</i></p></div>
																<br>
																<button id="btn_order" class="btn btn-primary btn-inline">CONFIRM ORDER</button>
															</div>
															
															<hr>
															
															
															<label class="radio b-label">Bank Transfer/Bank Deposits
																<input type="radio" name="payment_method" id="optionsRadios3" value="2">
															</label>
															
															<div class="payment_box payment_method_bacs">
																<h5>Make your payment directly into our bank account. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</h5>
																<h5><b>Bank Account Name:  O.A.A.M.Amarasekara<br>
																	Account Number: 334100120000845<br>Bank:  Peoples Bank</b></h5>
																	
																	<br>
																	<button id="btn_order_bank" class="btn btn-primary btn-inline">CONFIRM ORDER</button>
																</div>
																

															</div>

														</li>
													</div>
												</ul>
												<br>
											</tr>
										</table>
									</div>				
									
								</div>
							</div>	
						</div>
						
					</div>
					
					
					<div class="col-lg-6">
						<div class="main-slider" style="">
							<div class="slider-container">

								<div class="box" style="margin-top:40px;margin-bottom:40px;">
									<h4>ORDER SUMMARY</h4><hr>
									
									<div class="table-responsive">
										<table width="100%" cellpadding="8" class="table table1">
											<tr>
												<td align="left" width="35%"><b>Name</b></td>
												<td><?php echo $sqltmp['fname'].' '.$sqltmp['lname']; ?></td>
											</tr>
											<tr>
												<td align="left"><b>Contact Number</b></td>
												<td><?php echo $sqltmp['Tel_no']; ?></td>
											</tr>
											<tr>
												<td align="left"><b>Mobile Number</b></td>
												<td><?php echo $sqltmp['Mob_no']; ?></td>
											</tr>
											<tr>
												<td align="left"><b>Email Address</b></td>
												<td><?php echo $sqltmp['email']; ?></td>
											</tr>
											<tr>
												<td align="left"><b>Delivery Address</b></td>
												<td><?php echo $sqltmp['address']; ?></td>
											</tr>
											<tr>
												<td align="left"><b>City</b></td>
												<td><?php echo $sqltmp['town'];
												$del_fee = 200;
												if($countw != 0){
													$g_tot = $tot + $del_fee + 100;
												}else{
													$g_tot = $tot + $del_fee; } ?></td>
												
											</tr>
										</table>
									</div>
									<input type="hidden" value="<?php echo $g_tot; ?>" id="sub_tot_val" readonly>

									<div class="accordion-inner no-p table-responsive">
										<table width="100%" border="0" cellpadding="14" class="table table2" style="margin-bottom: 0;">
											<tr class="heading-bar-table">
												<th width="35%" align="left">Item Name</th>
												<th width="25%" align="right">Unit Price</th>
												<th width="12%" align="right">Quantity</th>
												<th width="28%" align="right">Subtotal (Rs)</th>
											</tr>
											<?php $sql_c = mysqli_query($conn, "SELECT
												live_cart.name,
												live_cart.Qty,
												live_cart.Item_Code,
												live_cart.price
												FROM
												live_cart
												WHERE
												live_cart.$whr =  $user_id");$sub = 0;
											while($row_c = mysqli_fetch_array($sql_c)) 
											{
												$itm_code = $row_c['Item_Code'];

												
												$sql_del = "SELECT scat.deli_method, books.sccode FROM books Inner Join scat ON books.sccode = scat.sccode
												WHERE itemcode =  '$itm_code' GROUP BY books.sccode";
												$sql2 = mysqli_query($conn, $sql_del); 
												$row2 = mysqli_fetch_array($sql2);


												?>
												<tr>
													<td align="left"><?php echo $row_c['name']; ?></td>
													<td align="right"><?php echo number_format($row_c['price'], 2); ?></td>
													<td align="right"><?php echo $row_c['Qty']; ?></td>

													<td align="right"><?php $sub_tot = $row_c['price']*$row_c['Qty']; echo number_format($sub_tot, 2); ?></td>
												</tr>
												<?php $sub += $row_c['price']*$row_c['Qty'];} ?>
												<tr>
													<td colspan="3" align="right">
														<h5>Subtotal</h5>
														<h5>Shipping Charges</h5>
														<h5>Payment Processing Fee</h5>
														<?php if($countw !=0){?>
															<h5>Packaging Fee</h5><?php }?>
															<br> 
															<h4 style="color:#fb530d;">GRAND TOTAL</h4></td>
															<td align="right">
																<h5>LKR <?php echo number_format($sub, 2); ?></h5>
																<h5>LKR <span id="del_fee">200.00</span></h5>
																<h5>LKR <span id="pro_fee">0.00</span></h5>
																<?php 
																	if($countw !=0){
																?>
																	<h5>LKR <span id="wrapping" data-value="100.00">100.00</span></h5><br>

																	<h4 style="color:#fb530d;"> LKR <span id="tot_amnt"><?php echo number_format($g_tot, 2); ?></span></h4> 
																<?php }else{?>
																	<h4 style="color:#fb530d;"> LKR <span id="tot_amnt"><?php echo number_format($g_tot, 2); ?></span></h4> 
																<?php } ?>
															</tr>
															<tr>

															</tr>
														</table>
													</div>



												</div>
											</div>	
										</div>

									</div>




								</div>

								<form method="post" action="https://www.payhere.lk/pay/checkout" id="form_sandbox" style="display:none">
									<!--<form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="form_sandbox" style="display:none"> SandBox URL -->
										<input type="hidden" name="merchant_id" value="212597" readonly>
										<!-- <input type="hidden" name="merchant_id" value="1211943" readonly> SandBox ID -->
										<input type="hidden" name="return_url" value="https://www.cellparts.lk/order-confirm" readonly>
										<input type="hidden" name="cancel_url" value="https://www.cellparts.lk/order-cancel" readonly>
										<input type="hidden" name="notify_url" value="https://www.cellparts.lk/connection/payment_verify" readonly>
										<br><br>Item Details<br>
										<input type="hidden" name="order_id" id="order_id" value="<?php echo $inv_id; ?>" readonly>
										<input type="hidden" name="items" value="CellParts.lk" readonly><br>
										<input type="hidden" name="currency" value="LKR" readonly>
										<input type="hidden" name="amount" value="<?php echo $g_tot; ?>" id="g_tot_amnt" readonly>
										<br><br>Customer Details<br>
										<input type="hidden" name="first_name" value="<?php echo $sqltmp['fname']; ?>" readonly>
										<input type="hidden" name="last_name" value="<?php echo $sqltmp['lname']; ?>" readonly><br>
										<input type="hidden" name="email" value="<?php echo $sqltmp['email']; ?>" readonly>
										<input type="hidden" name="phone" value="<?php echo $sqltmp['Mob_no']; ?>" readonly><br>
										<input type="hidden" name="address" value="<?php echo $sqltmp['address']; ?>" readonly>
										<input type="hidden" name="city" value="<?php echo $sqltmp['town']; ?>" readonly>
										<input type="hidden" name="country" value="Sri Lanka" readonly><br><br>    
									</form>


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
				
				
          </div>-->
          
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
  <script>


  	$("#btn_order").click(function() {
  		$("#pre_loader").show();
  		var tot_amnt = parseFloat($('#g_tot_amnt').val()).toFixed(2);
  		if (tot_amnt > 0) {
  			var chk = $("input[name='del_method']:checked").is(':checked');
  			if(chk) {
  				var inv = $("#order_id").val();
  				var del_type = $("input[name='del_method']:checked").val();
  				
  				$.post('connection/payment_confirm.php', {'up_payment_method': 'data', inv: inv, pay_type: '1', del_type: del_type}, function (data) {
  					if (data.status === 'success') {
  						$("#form_sandbox").submit();
  						
  					} else if (data.status === 'error') {
  						alert('Something Went Wrong. Please Try Again');
  						window.location.href = 'confirm';
  						
  					} else {
  						window.location.href = 'login_cart';
  					}
  				}, "json");
  			} else {
  				alert('Please Select Delivery Method');
  				$("#pre_loader").fadeOut("slow");
  			}
  			
  		} else {
  			$("#pre_loader").fadeOut("slow");
  			alert('Invalid Total Payment');
  		}
  	});

  	$("#btn_order_bank").click(function() {
  		var tot_amnt = parseFloat($('#g_tot_amnt').val()).toFixed(2);
  		var packaging =  parseFloat($('#wrapping').attr('data-value')).toFixed(2);
  		if (tot_amnt > 0) {
  			var chk = $("input[name='del_method']:checked").is(':checked');
  			if(chk) {
  				$("#pre_loader").show();
  				var del_type = $("input[name='del_method']:checked").val();
  				
  				$.post('connection/payment_confirm.php', {'payment_confirm': 'data', del_type: del_type, packaging:packaging}, function (data) {
  					if (data.status === 'success') {
  						var inv = data.inv_id;
  						window.location.href = 'order-confirm?order_id='+inv;
  						
  					} else if (data.status === 'mysql error') {
  						alert('Something Went Wrong. Please Try Again');
  						window.location.href = 'confirm';
  						
  					} else {
  						window.location.href = 'login_cart';
  					}
  				}, "json");
  			} else {
  				alert('Please Select Delivery Method');
  			}
  			
  		} else {
  			alert('Invalid Total Payment');
  		}
  	});

  	$("input[name='del_method']").on('change', function() {
  		$("#pre_loader").show();
  		var val = $(this).val();
  		var del_fee = 0;
  		
  		if(val == '1') {
  			del_fee = 200;
  			
  		} else if(val == '2') {
  			del_fee = 100;
  			
  		} else {
  			del_fee = 0;
  		}


  		
  		var tot = $('#sub_tot_val').val();
  		var pro_fee = $('#pro_fee').text();
  		// $('#del_fee').text(parseFloat(del_fee).toFixed(2));
  		
  		var pay_type = $("input[name='payment_method']:checked").val();
  		if(pay_type === '1') {
  			pro_fee = ((parseFloat(tot))*3.9)/100+39;
  			
  		} else {
  			pro_fee = 0;
  		}
  		
  		$('#pro_fee').text(parseFloat(pro_fee).toFixed(2));
  		var g_tot = parseFloat(tot) + parseFloat(pro_fee);
  		$('#tot_amnt').text(parseFloat(g_tot).toFixed(2));
  		$('#g_tot_amnt').val(parseFloat(g_tot).toFixed(2));

  		$("#pre_loader").fadeOut("slow");
  	});

  	$("input[name='payment_method']").on('change', function() {
  		$("#pre_loader").show();
  		var val = $(this).val();
  		var pro_fee = 0;
  		var sub_tot = $('#sub_tot_val').val();
  		// var del_fee = $('#del_fee').text();
  		
  		if(val == '1') {
  			pro_fee = ((parseFloat(sub_tot))*3.9)/100+39;
  			$(".payment_box.payment_method_card").css("display", "block");
  			$(".payment_box.payment_method_bacs").css("display", "none");
  			
  		} else {
  			pro_fee = 0;
  			$(".payment_box.payment_method_bacs").css("display", "block");
  			$(".payment_box.payment_method_card").css("display", "none");
  		}
  		
  		var g_tot = parseFloat(sub_tot) + parseFloat(pro_fee);
  		
  		$('#pro_fee').text(parseFloat(pro_fee).toFixed(2));
  		$('#tot_amnt').text(parseFloat(g_tot).toFixed(2));
  		$('#g_tot_amnt').val(parseFloat(g_tot).toFixed(2));
  		
  		$("#pre_loader").fadeOut("slow");
  	});

  </script>
</body>
</html>