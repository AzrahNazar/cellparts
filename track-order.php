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
									<div class="col-lg-12 hidden-xs hidden-sm">
										<h4>TRACK ORDER<span class="pull-right">Hotline: +94 114 422 733 | <a target="_blank" href="http://www.promptxpress.lk/BranchNetwork.aspx#">BRANCHES</a></span></h4><hr>
									</div>
									<div class="row hidden-lg hidden-md">
										<h4>TRACK ORDER</h4>
									</div>
									<div class="row hidden-lg hidden-md">
										<span>Hotline: +94 114 422 733 | <a target="_blank" href="http://www.promptxpress.lk/BranchNetwork.aspx#">BRANCHES</a></span>
										<hr>
									</div>
						  	    <form action="track-order.php" method="get">
						  	     	<div class="form-group row">
						  	      	<div class="col-sm-6">
						  	       		<input class="form-control" type="text" value="<?php echo $oid;?>" placeholder="Enter Order ID" autocomplete=off name="oid" required>
						  	     		</div>
						  	   		</div>
						  	   		<div class="clearfix">
						  	    		<button type="submit" class="btn btn-blue"> Search </button>
						  	  		</div>
						  		</form>		
								</div>
								<?php 
									if($oid !='') {
								?>
				  			<div class="row">
  								<div class="col-12">
				  		  		<div class="box">
				  		       	<div class="box-header">
				  		         	<h3 class="box-title">Orders</h3>
				  		       	</div>
				  		       <!-- /.box-header -->
				  		       	<div class="box-body table-responsive">
				  		         	<table id="example1" class="table table-bordered table-striped ">
				  		           	<thead>
				  		            	<tr>
						  		            <th>#</th>
						  		            <th>Date / Time</th>
						  		            <th>Customer Name</th>
						  		            <th>Order id</th>
						  		            <th>Tracking Number</th>
						  		            <th>Track Order</th>
						  		            <th>View Order</th>
					  		          </tr>
					  		        </thead>
					  		        <tbody>
				  		          <?php
					  		          $cosql3="SELECT *, DATE_FORMAT(order_date, '%Y-%m-%d / %h:%i %p') AS odate FROM order_details".$txt. "ORDER BY order_date DESC";
					  		          $coresult3=mysqli_query($conn,$cosql3);
					  		          $x=0;
					  		          while ($row3 = mysqli_fetch_array($coresult3)){ $x++;
				  		          ?>
				  		            <tr>
				  		            	<td><?php  echo $x; ?>.</td>
				  		             	<td><?php  echo $row3['odate']; ?></td>
				  		             	<td><?php  echo $row3['fname'].' '.$row3['lname']; ?></td>
				  		             	<td><?php  echo $row3['inv_id']; ?></td>
				  		             	<?php 
		  		             		  	$sqlt="SELECT * FROM track_order WHERE order_id='$oid' ";
		  		             		  	$resultt=mysqli_query($conn,$sqlt);
		  		             		  	$rowt = mysqli_fetch_array($resultt);

		  		             		  	$delivery = $rowt['delivery_service'];
		  		             		  	$tr_num = $rowt['tracking_num'];
		  		             		  	if(mysqli_num_rows($resultt) == 0) { ?>
		  		             		  		<td></td>
		  		             		  		<td></td>
			  		             		  <?php }else{ 
			  		             		   	if($delivery == 'Prompt Express'){
			  		             		   		$url = 'http://www.promptxpress.lk/Search';

			  		             		   	}else if($delivery == 'Citypak'){
			  		             		   		$url = 'https://customer.citypak.lk/tracking.jsp?tracking-numbers='.$tr_num;
			  		             		   	}
			  		             	   	?>
			  		             	   		<td><?php echo $tr_num; ?></td>
			  		             	  		<td><a href="<?php echo $url; ?>" class="btn btn-success btn-sm" target="_blank">Track Order</a></td>
				  		             	  <?php  } ?>
				  		             	<td>
				  		               	<a target='_blank' href="view-order.php?inv=<?php  echo $row3['inv_id']; ?>" class="btn btn-lg btn-success btn-block" width="45">
				  		                <i class="ti-plus"></i>View Order</a>
				  		            	</td>
				  		          	</tr>
				  		       		<?php } ?>
				  		      		</tbody>
				  		    		</table>
				  		  		</div>
						  		</div>
						  	</div>
						  </div>
						  <?php 
								}
							?>
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