<?php include "db/db.php"; 
session_start();
$uid = '';

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


$records_per_page = 12;
require 'pagination/pagination.php';
$page_blog = new Zebra_Pagination();

$sqlb = "
    SELECT 
    SQL_CALC_FOUND_ROWS * 
    FROM books
    WHERE new_arrival =1
    ORDER BY price DESC 
    LIMIT
        " . (($page_blog->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '
';

if (!($resultb = @mysqli_query($conn, $sqlb))) {
    die(mysqli_error($conn));

}
$rows = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT FOUND_ROWS() AS rowsb'));
$page_blog->records($rows['rowsb']);
$page_blog->records_per_page($records_per_page);

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

        <!-- pagination -->
		<link rel="stylesheet" href="pagination/public/css/zebra_pagination.css">
		<!-- pagination -->
		<script type="text/javascript" src="pagination/public/javascript/zebra_pagination.js"></script>
		
        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="js/vendor/jquery-2.1.4.min.js"></script>


	<style>
	.single-product
{
margin-right:10px;
margin-bottom:10px;	
}
.product-img
{
	padding-left:40px;
}	
.product-content
{
padding-left:40px;	
}

.single-product
{
margin-right:10px;
margin-bottom:10px;	
}
.pagination > li > a
{
    width: 30px;	
	font-size: 13px;
    height: 35px;
	border-radius: 7%;
}
.pntr{
	cursor: pointer;
}

@media (min-width: 320px) and (max-width: 480px) {
	.container{
    	width: 350px;
	}

	.single-product {
		margin-right: 0px;
		height:325px;
	}	

	h4{
		font-size: 14px;
	} 

	.product-img
	{
		padding-left:unset;
	}	
	.product-content
	{
	padding-left:unset;	
	} 
}

</style>	

	
		
    </head>
	
	
    <body style="background-color: #f5f5f5;">
    	<input id="uid" type="hidden" class="form-control" value="<?php echo $uid ;?>" style="width:250px">
  
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
	<ul class="nav nav-tabs" style="margin-left: 14px;border-bottom:0px solid #ffffff;">
	    <li class="active"><a class="tab-change" data-value="1" data-toggle="tab" href="#home" style="background-color: #dcdcdc; 
	    border: none;border-bottom-color: #f5f5f5;"><i class="icon fa fa-th-large"></i> Grid</a></li>
	    <li><a class="tab-change" data-value="2" data-toggle="tab" href="#menu1" style="background-color: #dcdcdc; 
	    border: none;border-bottom-color: #f5f5f5;"><i class="icon fa fa-th-list"></i> List</a></li>
	</ul>
			</div>		
			
<div class="tab-content">			
			
<!------------------------tab1---------------------------------------------------->			
<div id="home" class="tab-pane fade in active">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
						
		<?php
					$resultb = @mysqli_query($conn, $sqlb);
                	while ($row = mysqli_fetch_array($resultb)) {
				
 		?>

			<div class="single-product  white-bg col-md-3 col-sm-12 col-xs-6">
				<div class="product-img pt-20" style=" height: 175px; overflow: hidden;">
					<a <?php if(($row['eq_code']!='') && ($row['qty'] == 0)){?>href="details-equility-products.php?key=4&id=<?php echo $row['eq_code']; ?>" <?php }else{?> href="details-products-sumedacellular-kurunegala?subc=<?php echo $row['sccode'];?>&icode=<?php echo $row['itemcode'];?>" <?php }?>><img src="images/sumeda_p/<?php echo $row['imgpath'];?>" alt="<?php echo $row['book']; ?>" style="width:180px; min-height: 150px;"/></a>
				</div>

				<div class="product-content " style="margin-bottom: 10px;">
					<div class="pro-title">
						<h5 style="height: 32px;overflow: hidden;"><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row['sccode'];?>&icode=<?php echo $row['itemcode'];?>" title="<?php echo $row['book']; ?>" style="color:#666666;">
						
						<?php 
			
						echo ($row['book']);?>
						
						</a></h5>
					</div>
				
					
					<div class="price-box">
						<span class="price product-price price_rs">Rs <?php echo $row['price'];?></span>
						<span class="price product-price price_usd">$ <?php echo number_format($row['price']/$dollar,2);?></span>	
					</div>
					
					<?php
						$subc = $row['sccode'];
						$icode = $row['itemcode'];
						$sql1  = "SELECT * FROM books where sccode='$subc' AND itemcode='$icode'";
						$result1 = mysqli_query($conn, $sql1);
						$row1 = mysqli_fetch_array($result1);
						$qty = $row1['qty'];

						if(($qty == 0) && ($row['eq_code']=='')){
							$stk = "No stock available";
							$color  =  "orange";
							$display ="display:none;";
						?>
					<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
					<a href="contact-us-sumedacellular-kurunegala-srilanka?inquiry=1&id=<?php echo $row['itemcode'];?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-phone"></i> CONTACT US</span></a>
					<?php 
						}if(($qty == 0) && ($row['eq_code']!='')){
							$stk = "Switch to equal";
							$color  =  "white";
							$display ="display:none;";
					?>
					<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
					<a href="details-equility-products.php?key=4&id=<?php echo $row['eq_code']; ?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-reply"></i> SIMILAR PRODUCT</span></a>
					<?php 
						}else if($qty != 0){
							$stk = "Stock Available";
							$color  =  "green";
							$display = "";
					?> 	
					<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
					<?php 	}
					?>

					<!--<label style="color: <?php echo $color; ?>; margin-top: 2px;"><?php echo $stk; ?></label>-->

					<div class="product-icon hidden-xs" style="<?php echo $display;?> margin-top: 13px;">
						<div class="f-left pntr">
						
							<?php if (isset($_SESSION['user'])) { ?>
								<a href="buy_now?id=<?php echo $row['itemcode'];?>" class="button btn-warning" style="padding:5px;"><span> Buy Now</span></a>	

								<a class="button btn-primary" style="padding:5px;"><span class="add-to-cart-new" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>

								<a href="javascript:void(0);" style="color: red; font-size: 15px;" class="wish_item" title="Add to Wishlist" data-value="<?php echo $row['itemcode']; ?>"><i class="fa fa-heart-o" id="wish_<?php echo $row['itemcode']; ?>"></i></a>
								
								<?php } else { ?>	
								<a href="buy_now?id=<?php echo $row['itemcode'];?>" class="button btn-warning" style="padding:5px;"><span> Buy Now</span></a>

								<a class="button btn-primary" style="padding:5px;"><span class="add-to-cart-new-temp" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
								
								<a href="javascript:void(0);" style="color: red; font-size: 15px;" class="wish_item" title="Add to Wishlist" data-value="<?php echo $row['itemcode']; ?>"><i class="fa fa-heart-o" id="wish_<?php echo $row['itemcode']; ?>"></i></a>
									
							<?php }
							 ?>
						</div>
					</div>
					
				</div>
			</div>
													 
 			<?php } ?>
		  
		</div>
	
		<div class="row"> 
	        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
	          	<?php // render the pagination links
	                $page_blog->render();
	            ?>
	        </div>
	 	</div> 
	</div>				
</div>

				
<!--------------------------tab2-------------------------->
<div id="menu1" class="tab-pane fade">	
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">			
			<?php
				$resultb2 = @mysqli_query($conn, $sqlb);
	                	while ($row = mysqli_fetch_array($resultb2)) {
	 		?>

			<div class="single-product  white-bg col-md-12 col-sm-12 col-xs-12" style="height: 200px;">
				<div class="row">
						<div class="col-md-3 col-sm-4 col-xs-6"  style="border-right: 1px solid #f5f5f5; height: 175px; overflow: hidden;">
							<div class="product-img pt-20" style="padding-bottom:25px; padding-top: 17px;">
								<a <?php if(($row['eq_code']!='') && ($row['qty'] == 0)){?>href="details-equility-products.php?key=4&id=<?php echo $row['eq_code']; ?>" <?php }else{?> href="detailsnew-products-sumedacellular-kurunegala?id=<?php echo $row['itemcode'];?>" <?php } ?>><img src="images/sumeda_p/<?php echo $row['imgpath'];?>" alt="<?php echo $row['book']; ?>" style="width:180px; min-height: 150px;"/></a>
							</div>
						</div>
				
						<div class="col-md-6 col-sm-6 col-xs-6" style="border-right: 1px solid #f5f5f5;">
							<div style="padding: 40px 0px 0px 0px;">
								<div class="pro-title">
									<h4><a href="detailsnew-products-sumedacellular-kurunegala?id=<?php echo $row['itemcode'];?>" title="<?php echo $row['book']; ?>" style="color:#666666;">
										<?php echo $row['book']; ?>
									</a></h4>
								</div>
			
								<div class="price-box">
									<span class="price product-price price_rs">Rs <?php echo $row['price'];?></span>
									<span class="price product-price price_usd">$ <?php echo number_format($row['price']/$dollar,2);?></span>	
								</div>
								
								<!-- <p><?php echo $row['details'];?></p> -->
					
							</div>
							
						</div>
							
						<div class="col-md-3 col-sm-2 hidden-xs">
							<div style="margin-top:40px;">

								<div class="f-left pntr" style="<?php $display;?>">	
									<div class="header-compire" style="margin-bottom:50px;">
										<a href="#" style="color:#666666;" ><i class="fa fa-heart"></i> Wish List 0 </a><br>
										<a href="#" style="color:#666666;"><i class="fa fa-refresh"></i> Compare  0 </a>
									</div>	

									<?php
										$subc = $row['sccode'];
										$icode = $row['itemcode'];
										$sql1  = "SELECT * FROM books where sccode='$subc' AND itemcode='$icode'";
										$result1 = mysqli_query($conn, $sql1);
										$row1 = mysqli_fetch_array($result1);
										$qty = $row1['qty'];
									   
										if(($qty == 0) && ($row['eq_code']=='')){
											$stk = "No stock available";
											$color  =  "orange";
											$display ="display:none;";
									?>
									<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
									<a href="contact-us-sumedacellular-kurunegala-srilanka?inquiry=1&id=<?php echo $row['itemcode'];?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-phone"></i> CONTACT US</span></a>
									<?php 
										}if(($qty == 0) && ($row['eq_code']!='')){
											$stk = "Switch to equal";
											$color  =  "white";
											$display ="display:none;";
									?>
									<a href="details-equility-products.php?key=4&id=<?php echo $row['eq_code']; ?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-reply"></i> SIMILAR PRODUCT</span></a>
									<?php 
										}else if($qty != 0){
											$stk = "Stock Available";
											$color  =  "green";
											$display = "";
									?> 	
									<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
									<?php 	}
									?>
												
									<?php if (isset($_SESSION['user'])) { ?>
									<a href="buy_now?id=<?php echo $row['itemcode'];?>" class="button btn-warning" style="padding:5px; <?php echo $display;?>"><span> Buy Now</span></a>	
							 
									<a class="button btn-primary" style="padding:5px; <?php echo $display;?>"><span class="add-to-cart-new" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
							
									<a href="javascript:void(0);" style="color: red; font-size: 15px; <?php echo $display;?>" class="wish_item" title="Add to Wishlist" data-value="<?php echo $row['itemcode']; ?>"><i class="fa fa-heart-o" id="wish2_<?php echo $row['itemcode']; ?>"></i></a>
							
								 	<?php } else { ?>
										<a href="buy_now?id=<?php echo $row['itemcode'];?>" class="button btn-warning" style="padding:5px; <?php echo $display;?>"><span> Buy Now</span></a>	

										<a class="button btn-primary" style="padding:5px; <?php echo $display;?>"><span class="add-to-cart-new-temp" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
										
										<a href="javascript:void(0);" style="color: red; font-size: 15px; <?php echo $display;?>" class="wish_item" title="Add to Wishlist" data-value="<?php echo $row['itemcode']; ?>"><i class="fa fa-heart-o" id="wish2_<?php echo $row['itemcode']; ?>"></i></a>
								
									<?php } ?>
										
								</div>
								<!--<label style="color: <?php echo $color; ?>; margin-top: 2px;"><?php echo $stk; ?></label>-->
												<!--<div class="product-icon-right floatright">
													<a href="#" data-toggle="tooltip" title="Compare"><i class="fa fa-exchange"></i></a>
													<a href="#" data-toggle="tooltip" title="Wishlist"><i class="fa fa-heart"></i></a>
												</div>-->
							</div>
						</div>		
					</div>
				</div>							
					 
 <?php } ?>
					  
           
			</div>
		<div class="row"> 
            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
              	<?php // render the pagination links
	                $page_blog->render();
	            ?>
        	</div>
        </div> 
						
	</div>
				
</div>
				
				</div>
			</div>
		
		</div>
		<!-- slider-area-end -->
		
		
		<!-- newletter-area-start -->
		
		<!-- newletter-area-end -->
		<?php include "common/footer.php"; ?>
		<!-- copyright-area-start -->

		<!-- copyright-area-end -->
		<!-- social_block-start -->
		
		<!-- social_block-end -->
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


		<script type="text/javascript">


			if (localStorage['tab'] == '' && localStorage['tab'].length == 0) {
				localStorage['tab'] = 1;	
			}
			
				$('.tab-change').click(function(){	
				    localStorage['tab'] = $( this ).attr("data-value");
				    //alert(localStorage['tab']);

				});

				if(localStorage['tab'] == 1){
				     $('.nav-tabs a[href="#home"]').tab('show');
				}else 
				if(localStorage['tab'] == 2){
					$('.nav-tabs a[href="#menu1"]').tab('show');
				} 



			///////////////new arrivals add to cart/////////////////
			
				$(".add-to-cart-new").click(function () {


	            add_to_cart_new($(this).attr('data-id-product'));

				
	            
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#ffffff;'></i> Added to Cart</span></a>" );

	            //$(".cart_adding").fadeOut();

	        });

	        $(".add-to-cart-new-temp").click(function () {


	            $.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	            });

	            add_to_cart_new_temp($(this).attr('data-id-product'));

	  
	            

	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#ffffff;'></i> Added to Cart</span></a>" );

	        });
			 $.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	       
	    });
			function add_to_cart_new(id) {
			
			var uid = $('#uid').val();
			
	        $.post('connection/cart_index.php', {'add_to_cart_new': 'data', id: id, uid: uid}, function (data) {

	        });
			setTimeout(function(){
				cart_data_load_show();
			},100);
	    }

	    function add_to_cart_new_temp(id) {
			
	        $.post('connection/cart_index.php', {'add_to_cart_new_temp': 'data', id: id}, function (data) {

	        });
			setTimeout(function(){
				cart_data_load_show();
			},100);
	    }	
			
		</script>
		<!-- all js here -->
		<!-- jquery-1.12.0 -->
       
	

    </body>
</html>
