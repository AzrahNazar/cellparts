<?php include "db/db.php"; 
$uid = '';
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




	$records_per_page = 18;
require 'pagination/pagination.php';
$page_blog = new Zebra_Pagination();

	$query = "SELECT SQL_CALC_FOUND_ROWS * FROM bookinfo LIMIT " . (($page_blog->get_page() - 1) * $records_per_page) . ', ' . $records_per_page . '';
    $sqlb = mysqli_query($conn, $query);

    if (!($resultb = @mysqli_query($conn, $sqlb))) {
    	//echo ("test");
	    die(mysqli_error($conn));
	}
	$rows = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT FOUND_ROWS() AS rowsb'));
	$page_blog->records($rows['rowsb']);
	$page_blog->records_per_page($records_per_page);

	$row = mysqli_fetch_array($resultb);


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
        <!-- pagination -->
		<link rel="stylesheet" href="pagination/public/css/zebra_pagination.css">

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="js/vendor/jquery-2.1.4.min.js"></script>

		<!-- pagination -->
		<script type="text/javascript" src="pagination/public/javascript/zebra_pagination.js"></script>
		
		
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
.wrapper{
margin: 60px auto;
text-align: center;
}
h1{
margin-bottom: 1.25em;
}
#pagination-demo{
display: inline-block;
margin-bottom: 1.75em;
}
#pagination-demo li{
display: inline-block;
}

.page-content{
background: #eee;
display: inline-block;
padding: 10px;
width: 100%;
max-width: 660px;
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
			<div class="row hidden-xs">
	<ul class="nav nav-tabs" style="margin-left: 14px;border-bottom:0px solid #ffffff;">
    <li class="active"><a data-toggle="tab" href="#home" style="background-color: #dcdcdc; 
    border: none;border-bottom-color: #f5f5f5;"><i class="icon fa fa-th-large"></i> Grid</a></li>
    <li ><a data-toggle="tab" href="#menu1" style="background-color: #dcdcdc; 
    border: none;border-bottom-color: #f5f5f5;"><i class="icon fa fa-th-list"></i> List</a></li>
    
	</ul>
		
			</div>
	<!-------------------------------------------- tab1   ------------------------------->			
<div class="tab-content">	
<div id="menu1" class="tab-pane fade list">
	
	<div class="row list">
					
		<div class="col-lg-12 col-md-12 col-sm-12">
					
		<?php
		//$resultb = @mysqli_query($conn, $sqlb);
                	while ($row = mysqli_fetch_array($resultb)) {
				
 		?>

			<div class="single-product  white-bg col-md-12 col-sm-12" style="max-height: 195px;">
		
				<div class="row">
					<div class="col-md-4 col-sm-4" style="width:25%; border-right: 1px solid #f5f5f5;">
						<div class="product-img pt-20 center" style="padding-bottom:25px;    padding-top: 17px;">
							<a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row['sccode'];?>&icode=<?php echo $row['itemcode'];?>"><img src="images/access/<?php  echo $row['imgpath'];?>" alt="<?php echo $row['book']; ?>" style="height:160px;width:160px;"/></a>
						</div>
					
					</div>

					<div class="col-md-6 col-sm-6" style="border-right: 1px solid #f5f5f5;">
						<div class="" style="padding: 40px 0px 0px 60px;">
							<div class="pro-title">
							
								<h4> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row['sccode'];?>&icode=<?php echo $row['itemcode'];?>" title="<?php echo $row['book']; ?>" style="color:#666666;">
								
								<?php echo $row['book']; ?>
								
								</a></h4>
							</div>
							
							
							<div class="price-box">
								<span class="price product-price price_rs">Rs <?php echo $row['price'];?></span>
								<span class="price product-price price_usd">$ <?php echo number_format($row['price']/$dollar,2);?></span>	
							</div>
							
							<!-- <p><?php echo $row['book'];?></p> -->
							
					
						</div> 
					</div>

					<div class="col-md-2 col-sm-2">
						<div class="" style="margin-top:40px;">
							<div class="f-left pntr">
								<div class="header-compire" style="margin-bottom:50px;">
									<a href="#" style="color:#666666;" ><i class="fa fa-heart"></i> Wish List 0 </a><br>
									<a href="#" style="color:#666666;"><i class="fa fa-refresh"></i> Compare  0 </a>
								</div>	
								
								
								<?php if (isset($_SESSION['user'])) { ?>	
			 
								<a class="button btn-primary" style="padding:5px;"><span class="add-to-acc" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
			
				 				<?php } else { ?>	

								<a class="button btn-primary" style="padding:5px;"><span class="add-to-acc-temp" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
				
								<?php } ?>
				
							</div>		
						</div>	
					</div>
				</div>	
			</div>						
															 
 		 <?php }  ?>	

		</div>
				 
		<div class="row"> 
            <div class="col-lg-12 col-sm-12 col-md-12"> 
             
                	<?php // render the pagination links
	                    $page_blog->render();
	                ?>
	              
             	
            </div>
        </div> 
	</div>				
</div>
<!-------------------------------------------- tab2----------------------------------->		

<div id="home" class="tab-pane fade in active">
	<div class="row">
		
		<div class="col-lg-12 col-md-12 col-sm-12"  id="page-content1">
			
		<?php
			$resultb2 = @mysqli_query($conn, $sqlb);
                	while ($row = mysqli_fetch_array($resultb2)) {
 		?>



		<div class="single-product  white-bg col-md-3 col-sm-12">
			<div class="product-img pt-20 center">
				<a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row['sccode'];?>&icode=<?php echo $row['itemcode'];?>"><img src="images/access/<?php  echo $row['imgpath'];?>" alt="<?php echo $row['book']; ?>" style="height:167px;width:162px;"/></a>
			</div>

			<div class="product-content " style="margin-bottom: 10px;">
				<div class="pro-title">
					<h5 ><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row['sccode'];?>&icode=<?php echo $row['itemcode'];?>" title="<?php echo $row['book']; ?>" style="color:#666666;">
					
					<?php 
					$maxLength = 22;
					
					echo substr($row['book'], 0, $maxLength);?>
					
					</a></h5>
				</div>
				
				<div class="price-box">
					<span class="price product-price price_rs">Rs <?php echo $row['price'];?></span>
					<span class="price product-price price_usd">$ <?php echo number_format($row['price']/$dollar,2);?></span>
				</div>
				
				<div class="product-icon">
					<div class=" f-left pntr">
					
						<?php if (isset($_SESSION['user'])) { ?>	
 
						<a class="button btn-primary" style="padding:5px;"><span class="add-to-acc" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>

	 					<?php } else { ?>	

						<a class="button btn-primary" style="padding:5px;"><span class="add-to-acc-temp" data-id-product="<?php echo $row['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
	
						<?php } ?>
					</div>
					
				</div>
			</div>
		</div>
						
					 
 <?php } ?>
					  
		</div>

		<div class="row"> 
            <div class="col-lg-12 col-sm-12 col-md-12"> 
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

		
		<!-- newletter-area-end -->
		<?php include "common/footer.php"; ?>
		<!-- copyright-area-start -->
    
		<!-- copyright-area-end -->
		<!-- social_block-start -->
	
		<!-- social_block-end -->
		<script type="text/javascript">
		
	    $(document).ready(function () {
		

			
		//////////////////////cell accessories add to cart/////////////////
	        $(".add-to-acc").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

	            add_to_acc($(this).attr('data-id-product'));

	           /* $.post('connection/index.php', {'cart_no': 'data'}, function (data) {
	                $(".count").text(data);
	            });*/
				
	            
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 14px;color:#ffffff;'></i> Added to Cart</span></a>" );

	            //$(".cart_adding").fadeOut();

	        });

	        $(".add-to-acc-temp").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

	            $.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	                //$(".ajax_cart_quantity").text(data);
	            });

	            add_to_acc_temp($(this).attr('data-id-product'));

	           /* $.post('connection/index.php', {'cart_no': 'data'}, function (data) {
	                $(".count").text(data);
	                
	            });*/
				
	            

	            //$(this).css("background-color","red");
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 14px;color:#fffff;'></i> Added to Cart</span></a>" );

	           // $(".cart_adding").fadeOut();
	        });		
			
			
			
			

	    });	
		
		$.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	       
	    });
		
			 function add_to_acc(id) {
			 var uid = $('#uid').val();
			//alert(uid);
			 
	        $.post('connection/cart_index.php', {'add_to_acc': 'data', id: id, uid: uid}, function (data) {

	        });
			setTimeout(function(){
				cart_data_load_show();
			},100); 
	    }

	    function add_to_acc_temp(id) {
	        $.post('connection/cart_index.php', {'add_to_acc_temp': 'data', id: id}, function (data) {

	        });
			setTimeout(function(){
				cart_data_load_show();
			},100); 
	    }
		
		</script>
		
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
