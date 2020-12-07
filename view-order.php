<?php
session_start();
include "db/db.php";

 $sqlr="SELECT User_ID,order_id,status FROM cart_details group by User_ID,order_id,status having status <>'Delivered' and status <>'Delete'";
 $resultr=mysqli_query($conn,$sqlr); 

 if(isset($_GET['oid'])) {
  $oid = htmlspecialchars(trim($_GET['oid']), ENT_QUOTES, 'UTF-8');
  $txt = " where inv_id LIKE '%$oid%'";

} else {
  $oid = '';
  $txt = "";
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
<?php include "common/header.php";?> 																						
	<!-- mainmenu-area-start -->
	<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm" id="myHeader">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-3 cat_dis" style="display:none;">
					<div class="product-menu-title " style="background-image: url('img/navlogo.jpg');height:54px;">
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
								<h4> ORDER DETAILS</h4><hr>
								<section id="content-holder" class="container-fluid container" style="">
								  <section class="row-fluid">
								  	<?php 
								  	if(isset($_GET['inv'])) {
								  		$inv = htmlspecialchars(strip_tags(trim($_GET['inv'])), ENT_QUOTES, 'UTF-8');	
								  		if(empty($inv)) {
								  			$redirectUrl = "index";
								  			echo "<script type=\"text/javascript\">";
								  			echo "window.location.href = '$redirectUrl'";
								  			echo "</script>";
								  		
								  		} else {
								  			$sql_ord = mysqli_query($conn, "SELECT * FROM order_details WHERE inv_id='$inv'");
								  			if(mysqli_num_rows($sql_ord) == 0) { ?>

								  			<div class=invoice>
								  	      <div class=row>
							  	          <div class="col-md-3">
							  	          </div>
									  			  <div class="col-md-6">
							  	            <form action="order-details" class="form-horizontal" id="frm" method="get">
							  	              <div class="form-group" style="margin-bottom:5px">
							  	                <input type="text" class="form-control pull-left" id="inv" name="inv" autocomplete="off" placeholder="Enter Order ID" style="width:65%; margin-right:8px;" required>
							  	                <button class="btn btn-primary" type="submit">Search</button>
							  	              </div>
							  	            </form><br>
									  					<p> Invalid Invoice Number.</p>
									  	      </div>		
								  	    	</div>
								  	  	</div>
								  			<?php	} else {
								  				$sql_inv = mysqli_fetch_assoc($sql_ord); 
								  			 	$order_st = $sql_inv['status']; ?><br>
								  				
								  			<div class=page-title>
								  	    </div>
								  	    <div class=invoice>
								  	      <div class=row>
								  	        <div class=col-lg-12>
								  	          <div class="row invoice-header">
								  	            <div class="col-md-6">
								  	              <h4> Invoice No: <?php echo $inv; ?> </h4>
								  	              <p> <?php echo $sql_inv['order_date']; ?> </p>
								  	            </div>
								  	          </div>
								  	        </div>
								  	      </div>
								  	      <div class=row>
								  	        <div class=col-md-6>
								  	          <div class=well> <strong>Delivery Address</strong>
								  	            <h5> <?php echo $sql_inv['fname'].' '.$sql_inv['lname']; ?> </h5>
								  	            <p> <?php echo $sql_inv['address']; ?>,<br>
								  	             	<?php echo $sql_inv['town']; ?><br>
								  	             	<?php echo $sql_inv['Tel_no']; ?><br>
								  	             	<?php echo $sql_inv['Mob_no']; ?><br>
								  	              <?php echo $sql_inv['email']; ?>
								  	            </p>
								  	          </div>
								  	        </div>
								  	      </div>
								  	    </section>
											</section>
						  	      <div class=row>
						  	        <div class=col-lg-12>
						  	          <div class="widget-container fluid-height">
						  	            <div class="widget-content padded clearfix">
						  								Payment Method: <?php if($sql_inv['pay_method'] == 1) { echo 'Credit/Debit Card'; } else if($sql_inv['pay_method'] == 2){ echo 'Bank Transfer/Bank Deposits'; } ?><hr>
						  	              <div class=table-responsive>
						  				  					<table class="table table-striped invoice-table">
								  	                <thead>
								  	                	<th width="5%">#</th>
								  	                  <th> Product </th>
								  	                  <th width="10%"> Qty </th>
								  	                  <th width="15%"> Unit Price (Rs)</th>
								  	                  <th width="15%"> Subtotal </th>
						  	                    </thead>
						  	                		<tbody>
								  					<?php $sql_pr = mysqli_query($conn, "SELECT * FROM cart_details WHERE inv_id='$inv'");
								  					$x = 0; $sub = 0;
								  					while($row_pr = mysqli_fetch_array($sql_pr)) { 
								  						$x++; 

								  						$subt=number_format($row_pr['Qty']*$row_pr['price'], 2);
								  						?>
								  	                  <tr>
								  	                    <td> <?php echo $x; ?>. </td>
								  	                    <td> <?php echo $row_pr['name']; ?> </td>
								  	                    <td> <?php echo $row_pr['Qty']; ?> </td>
								  	                    <td> <?php echo number_format($row_pr['price'], 2); ?> </td>
								  	                    <td> <?php echo number_format($row_pr['Qty']*$row_pr['price'], 2); ?> </td>
								  	                  </tr>
						  													<?php $sub += $row_pr['price']*$row_pr['Qty'];

						  													$sqll = "SELECT MAX(books.wrap_charges) AS wrap_charges FROM cart_details Inner Join books ON cart_details.Item_Code = books.itemcode Inner Join scat ON books.sccode = scat.sccode WHERE cart_details.inv_id='".$inv."'";
						  													$resultl=mysqli_query($conn, $sqll);
						  													$rowl = mysqli_fetch_array($resultl);
						  														$wrap = $rowl['wrap_charges'];

						  														$w_price = $rowl['wrap_charges'];


						  													$sqld = "SELECT MAX(books.deli_charges) AS deli_charges FROM cart_details Inner Join books ON cart_details.Item_Code = books.itemcode  WHERE cart_details.inv_id='".$inv."'";
						  													$resultd = mysqli_query($conn, $sqld);
						  													$rowd = mysqli_fetch_array($resultd);
						  														$del = $rowd['deli_charges'];
						  														$dl_fee = $del;
						  												} 

						  												if($wrap >= 1){
																				$wrap_fee = $w_price;
																			}else{
																				$wrap_fee = 0;
																			}

																			if($dl_fee == 0){
																				$del_fee = 250;
																			}else{
																				$del_fee = $dl_fee;
																			}

																			if($sql_inv['pay_method'] == 1) {
																				$fee = ($sub + $del_fee + $wrap_fee )*3.9/100+39;

																			} else {
																				$fee = 0;
																			}

																			$grand_total = ($sub+$del_fee+$wrap_fee+$fee);
						  												?>
						  	                		</tbody>
						  	                		<tfoot>
								  	                  <tr>
								  	                    <td class=text-right colspan=4><strong>Subtotal</strong></td>
								  	                    <td> LKR <?php echo number_format($sub, 2); ?> </td>
								  	                  </tr>
								  	                  <tr>
								  	                    <td class=text-right colspan=4><strong>Courier Charges</strong></td>
								  	                    <td> LKR  <?php $ship_chg = $del_fee; echo number_format($ship_chg, 2); ?> </td>
								  	                  </tr>
								  	                  <tr>
								  	                    <td class=text-right colspan=4><strong>Pakaging Charges</strong></td>
								  	                    <td> LKR  <?php number_format($wrap_fee, 2); ?> </td>
								  	                  </tr>
						  					  						<tr>
								  	                    <td class=text-right colspan=4><strong>Payment Processing Fee</strong></td>
								  	                    <td> LKR  <?php echo bcdiv($fee, 1, 2); ?> </td>
								  	                  </tr>
								  	                  <tr>
								  	                    <td class=text-right colspan=4><h4 class=text-primary> Grand Total </h4></td>
								  	                    <td><h4 class=text-primary>LKR  <?php echo number_format($grand_total, 2); ?> </h4></td>
								  	                  </tr>
						  	                		</tfoot>
						  	              		</table>
						  	              	</div>
						  	            	</div>
							  	          </div>
							  	        </div>
							  	      </div>
						  	    	</div>
						  				<?php		}
						  				}

									  	} else {
									  		$redirectUrl = "track-order";
									  		echo "<script type=\"text/javascript\">";
									  		echo "window.location.href = '$redirectUrl'";
									  		echo "</script>";	
									  	}
						  			?>
								  
							</div>

					</div>	
				</div>
			</div>
		</div>		
	</div>
</div>
	<?php include "common/footer.php"; ?>

		
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

</script>
</body>
</html>