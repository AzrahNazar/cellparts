<?php
ini_set('display_errors','on');
include 'db/db.php';

session_start();
$uid = "";

if ((isset($_SESSION['user'])))
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
while ($rowm = mysqli_fetch_array($resultm)) 
{

	$dollar = $rowm['doller'];
	
}


$chk=(isset($_GET['exists'])) ? ($_GET['exists']) : ''; 
$id = (isset($_GET['id'])) ? ($_GET['id']) : '0';
$key = (isset($_GET['key'])) ? ($_GET['key']) : '0';

$sql="SELECT * FROM cat";

if ($key==1){
	$sql2="SELECT * FROM home_samudrap where name='$id'";
}
if ($key==2){ 
	$sql2="SELECT * FROM home_newar where name='$id'";
}
if ($key==3){
	$sql2="SELECT * FROM home_forth where name='$id'";
}

if ($key==4){
	$sql2="SELECT * FROM bookinfo where itemcode='$id'";
}
if ($key==5){
	$sql2="SELECT * FROM bookinfo where eq_code='$id'";
}

$resultm=mysqli_query($conn,$sql);

$result2=mysqli_query($conn,$sql2);

$arr=mysqli_fetch_array ($result2);

if ($key==4){

	$name=$arr['book'];
	$price=$arr['price'];
	$wprice=$arr['wprice'];
 //  $isbn=$arr['isbn'];
	$details=$arr['details'];
	$img=$arr['imgpath'];
	$icode=$arr['itemcode'];
     $subc=$arr['sccode'];

}else{
	$name=$arr['name'];
	$price=$arr['price'];
	$wprice=$arr['wprice'];
//   $isbn=$arr['isbn'];
	$details=$arr['details'];
	$img=$arr['img'];
	$icode=$arr['itemcode'];
     $subc=$arr['sccode'];

}



$section =(isset($_GET['sel'])) ?($_GET['sel']) : '';
$first_name = (isset($_GET['dip'])) ?($_GET['dip']): '';
$scat = (isset($_GET['scat'])) ?($_GET['scat']): '';
$cats = (isset($_GET['cats'])) ?($_GET['cats']): '';
$combo = (isset($_GET['combo'])) ?($_GET['combo']): '';
$sqlm ="SELECT * FROM currency";
$resultm =mysqli_query($conn,$sqlm);
while ($rowm = mysqli_fetch_array($resultm)) 
{

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
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta name="description" content="CellParts.lk Mobile Phone and mobile accessories in Sri Lanka" />
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
	<style>
	@media (max-width: 767px) {
		.slider-sidebar	
		{

			margin-top:20px;
		}
	}
	@media (min-width: 1200px) {
		.slider-sidebar
		{


		}

	}
	@media (max-width: 767px) {
		.quan	
		{

			padding-top:5px;
		}
	}
	@media (min-width: 1200px) {
		.quan
		{

			padding-top:50px;	
		}

	}
	@media (max-width: 767px) {
		.cart	
		{

			padding-top:5px;
		}
	}
	@media (min-width: 1200px) {
		.cart
		{
			padding-top:39px;	

		}

	}
	@media (max-width: 767px) {
		.price	
		{

			padding-left:20px;
		}
	}
	@media (min-width: 1200px) {
		.price
		{


		}

	}
	@media (max-width: 767px) {
		.sss	
		{

			padding-left:20px;
		}
	}
	@media (min-width: 1200px) {
		.sss
		{


		}

	}
	#myImg {
		border-radius: 5px;
		cursor: pointer;
		transition: 0.3s;
	}
	#myImg:hover {opacity: 0.7;}
	/* The Modal (background) */
	.modal {
		display: none; /* Hidden by default */
		position: fixed; /* Stay in place */
		z-index: 1; /* Sit on top */
		padding-top: 100px; /* Location of the box */
		left: 0;
		top: 0;
		width: 100%; /* Full width */
		height: 100%; /* Full height */
		overflow: auto; /* Enable scroll if needed */
		background-color: rgb(0,0,0); /* Fallback color */
		background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
	}
	/* Modal Content (image) */
	.modal-content {
		margin: auto;
		display: block;
		width: 30%;
		max-width: 400px;
	}
	/* Caption of Modal Image */
	#caption {
		margin: auto;
		display: block;
		width: 80%;
		max-width: 700px;
		text-align: center;
		color: #ccc;
		padding: 10px 0;
		height: 150px;
	}
	/* Add Animation */
	.modal-content, #caption {    
		-webkit-animation-name: zoom;
		-webkit-animation-duration: 0.6s;
		animation-name: zoom;
		animation-duration: 0.6s;
	}
	@-webkit-keyframes zoom {
		from {-webkit-transform:scale(0)} 
		to {-webkit-transform:scale(1)}
	}
	@keyframes zoom {
		from {transform:scale(0)} 
		to {transform:scale(1)}
	}
	/* The Close Button */
	.close {
		position: absolute;

		right: 35px;
		color: #5bab01;;
		font-size: 40px;
		font-weight: bold;
		transition: 0.3s;
		color: #f4a137;
		display: block;
		margin: auto;
		left: 62%;
		z-index: 99;
	}
	.close:hover,
	.close:focus {
		color: #bbb;
		text-decoration: none;
		cursor: pointer;
	}
	/* 100% Image Width on Smaller Screens */
	@media only screen and (max-width: 700px){
		.modal-content {
			width: 100%;
		}
	}

	.value-button {
		display: initial;
		/*border: 1px solid #ddd;*/
		margin: 0px;
		width: 40px;
		height: 20px;
		text-align: center;
		vertical-align: middle;
		padding: 8px 10px;
		background: #eee;
		-webkit-touch-callout: none;
		-webkit-user-select: none;
		-khtml-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}


	.value-button:hover {
		cursor: pointer;
	}

	#decrease {
		margin-right: -3px;
		/*border-radius: 8px 0 0 8px;*/
	}

	#increase {
		margin-left: -4px;
		/*border-radius: 0 8px 8px 0;*/
	}

	#input-wrap {
		margin: 0px;
		padding: 0px;
	}

	input#number {
		text-align: center;
		border: none;
		/*border-left: 1px solid #ddd;*/
		/*border-right: 1px solid #ddd;*/
		/*border-top: 1px solid #ddd;*/
		/*border-bottom: 1px solid #ddd;*/
		margin: 0px;
		width: 40px;
		height: 40px;
	}

	input[type=number]::-webkit-inner-spin-button,
	input[type=number]::-webkit-outer-spin-button {
		-webkit-appearance: none;
		margin: 0;
	}
	
</style>	

</head>


<body>
	<?php if ((isset($_SESSION['user'])))
	{ ?>
		<input id="uid" type="hidden" class="form-control" value="<?php echo $uid ;?>" style="width:250px">
	<?php } ?>
	

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
			<p><?php echo $arr['cat'];?> > <a href="products?subc=<?php echo $arr['sccode']; ?>" > <?php echo $arr['subcat']; ?></a> </p>
			<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>-->
			<div class="col-lg-9 col-md-9 col-sm-12">
				<div class="main-slider">
					<div class="slider-container">



						<div class="row" style="background-color:#fff;">

							<!-- <div class="col-md-6">
								<img src="images/sumeda_p/<?php echo $img; ?>" style="padding-top:30px;width:250px;height:250px;" id="myImg" alt="<?php echo $name; ?>">
								<input id="pid" type="hidden" class="form-control" value="<?php //echo $shrow['itemcode'];?>" style="width:250px">
								<input type="hidden" id="flag" class="form-control" value="3">
							</div> -->
							<div class="col-md-6" style="height: 350px; overflow: hidden;">
								<img src="images/sumeda_p/<?php  echo $img;?>" style="padding-top:30px;width:350px;" id="myImg" alt="<?php echo $name;?>">
								<input id="pid" type="hidden" class="form-control" value="<?php echo $id;//echo $shrow['itemcode'];?>" style="width:250px">
								<input type="hidden" id="flag" class="form-control" value="3">
							</div>


							<div class="col-md-6">
								<div class="row" style="padding-top:30px;">

									<h4 class="sss"  style="margin-left: 12px; margin-bottom: -15px;" > <?php echo $name;   ?></h4>

								</div>
								<hr>
								<!-- <div class="row">

									<h4 class="sss">Item Code : <?php echo $id;?></h4>

								</div><hr> -->
								<div class="row" style="margin-left: 1px; margin-bottom: -15px; margin-top: -15px;">
									<span class="price product-price price_rs"> Rs <?php echo $price;?></span>
									<span class="price product-price price_usd"> $ <?php echo number_format($price/$dollar,2);?></span>
								</div><hr>

								<div class="row">
									
									<h5 class="sss" style="margin-left: 12px; text-align: justify; margin-right: 5px; margin-bottom: -10px; margin-top: -10px;"><?php echo $details;?></h5>
									
								</div><hr>


								<form action="#" method="post">
									<div class="row quan">

										<div class="col-md-5" style="margin-top: -15px;">
								 
								 	
								 	<div class="value-button" id="decrease" onclick="decreaseValue()" value="Decrease Value" style="font-weight: bold; font-size: 18px;">-</div>
								 	<input  id="number" class="qty" title="Qty" maxlength="5" name="qty" value="1" style="padding-bottom: 5px;" />
								 	<div class="value-button" id="increase" onclick="increaseValue()" value="Increase Value" style="font-weight: bold;  font-size: 18px;">+</div>

								 	<?php
								 		$sql1  = "SELECT * FROM books where sccode='$subc' AND itemcode='$icode'";
								 		$result1 = mysqli_query($conn, $sql1);
								 	    $row1 = mysqli_fetch_array($result1);
								 	    $qty = $row1['qty'];

								 	    if(($qty < 10) && ($qty >= 5) ){
								 	    	$stk = "Less than 10 available";
								 	    	$color  =  "green";
								 	    	$display = "";
								 	    }
								 	    else if(($qty < 5) && ($qty >= 1)){
								 	    	$stk = "Less than 5 available";
								 	    	$color  =  "green";
								 	    	$display = "";
								 	    }
								 	    else if($qty == 0){
								 	    	$stk = "No stock available";
								 	    	$color  =  "red";
								 	    	$display ="display:none;";
								 	    }
								 	    else{
								 	    	$stk = "More than 10 available";
								 	    	$color  =  "green";
								 	    	$display = "";
								 	    }
								 	?>
								 	<h5 class="sss" style=" color: <?php echo $color; ?>; margin-top: 10px;" id="stk_qty" data-value="<?php echo $qty;?>" ><?php echo $stk; ?></h5>
								 	
								 </div>
								
								<div class="col-md-7 cart" style="margin-top:-43px; <?php echo $display; ?>">
									
									<?php if (isset($_SESSION['user'])) { ?>

										<a href="buy_now?id=<?php echo $id;?>" class="button btn-warning" style="padding:8px;"><span> Buy Now</span></a>	

										<a class="button btn-primary" style="padding:8px; cursor: pointer;"><span class="pro-add-to-cart" data-id-product="<?php echo $id;?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>

										
									<?php } else { ?>	
										<a href="buy_now?id=<?php echo $id;?>" class="button btn-warning" style="padding:8px;"><span> Buy Now</span></a>

										<a class="button btn-primary" style="padding:8px; cursor: pointer;"><span class="pro-add-to-cart-temp" data-id-product="<?php echo $id;?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
										
									<?php } ?>

									
								</div>
								
							</div>
							

						</form>
					</div>

				</div>
				

			</div>	
		</div>
						<!--<div class="slider-product dotted-style-1 pt-30" style="margin-top:5px;padding-top: 10px;">
							
							<a href="#">
								<img class="img_a" src="img/banner/4.jpg" alt="mobile phones sumedacellular Kurunegala" style="height:170px;" />
								
							</a>
														
							
						</div>-->
					</div>
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="">
						<div class="row" >
							<?php 

							$sql3="SELECT * FROM end_page_image LIMIT 1";
							$result3=mysqli_query($conn,$sql3);
							while ($row3 = mysqli_fetch_array($result3)){ ?>

								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="slider-single-img res">
										<a href="#">
											<img class="img_a" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:150px;"/>
											<img class="img_b" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:150px;"/>
										</a>
									</div>
								</div>
							<?php } ?>


						</div>
						<div class="row" style="margin-top:43px;margin-bottom:20px;">
							<?php 

							$sql3="SELECT * FROM end_page_image LIMIT 1,1";
							$result3=mysqli_query($conn,$sql3);
							while ($row3 = mysqli_fetch_array($result3)){ ?>
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="slider-single-img">
										<a href="#">
											<img class="img_a" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:156px;"/>
											<img class="img_b" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:156px;"/>
										</a>
									</div>
								</div>
								
							<?php } ?>
							
							
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- slider-area-end -->
		
		<!-- blog-area-end -->
		<!-- newletter-area-start -->
		
		<!-- newletter-area-end -->
		<?php include "common/footer.php"; ?>
		<!-- copyright-area-start -->

		<!-- copyright-area-end -->
		<!-- social_block-start -->

		<!-- social_block-end -->

		<script type="text/javascript">
			$(document).ready(function () {
				$(".pro-add-to-cart").click(function () {

					add_to_cart_pro($(this).attr('data-id-product'));


						$(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#ffffff;'></i> Added to Cart</span></a>" );


                        //cart_data_load();
                        // $(this).replaceWith( "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#F4A137;'></i> Added to Cart</span></a>" );

                    });

				$(".pro-add-to-cart-temp").click(function () {
					$.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
				});	

					add_to_cart_pro_temp($(this).attr('data-id-product'));

						$(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#ffffff;'></i> Added to Cart</span></a>" );


                        //cart_data_load();
                        // $(this).replaceWith( "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;'></i> Added to Cart</span></a>" );

                    });

				// $.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	                //$(".ajax_cart_quantity").text(data);
	            // });	

			});


			function add_to_cart_pro(id) {

				var uid = $('#uid').val();
				var qty = $('#number').val();
				//alert(qty);
				var pid = $('#pid').val();
				// alert(pid);
				var flag = $('#flag').val();

				$.post('connection/index.php', {'add_to_cart_pro': 'data', id: id, uid: uid, qty:qty, pid:pid, flag:flag}, function (data) {

				});
				setTimeout(function(){
					cart_data_load_show();
				},100);
			}

			function add_to_cart_pro_temp(id) {

				var uid = $('#uid').val();
				var qty = $('#qty').val();
				var pid = $('#pid').val();
				var flag = $('#flag').val();

				$.post('connection/index.php', {'add_to_cart_pro_temp': 'data', id: id, qty:qty, pid:pid, flag:flag}, function (data) {

				});

				setTimeout(function(){
					cart_data_load_show();
				},100);
			}

		</script>
		
		<!-- all js here -->
		<!-- jquery-1.12.0 -->
		<!-- The Modal -->
		<div id="myModal" class="modal">
			<span class="close">&times;</span>
			<img class="modal-content" id="img01">
			<div id="caption"></div>
		</div>

		<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
	modal.style.display = "block";
	modalImg.src = this.src;
	captionText.innerHTML = this.alt;
}
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
	modal.style.display = "none";
}
</script>
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

<script>
	function increaseValue() {

		var value = parseInt(document.getElementById('number').value, 10);
		value = isNaN(value) ? 0 : value;
		value++;
		document.getElementById('number').value = value;

		var req_qty = value;
		var avl_qty = $('#stk_qty').attr("data-value");

		if(req_qty > avl_qty){
			alert("The requested quantity exceeds the available quantity.\n The maximum available stock is " +avl_qty);
			$('#number').val(avl_qty);
			
		}else{
		}
	}

	function decreaseValue() {
		var value = parseInt(document.getElementById('number').value, 10);
		if((value <= 1) || (value == "")){
			($('#decrease'). val(1));
		}else{
			var value = parseInt(document.getElementById('number').value, 10);
			value = isNaN(value) ? 1 : value;
			value--;
			// value > 1 ? value : value = 1;
			document.getElementById('number').value = value;
		}
	}

	$( "#number" ).on( "keyup", function( event ) {
		var value = parseInt(document.getElementById('number').value, 10);
		// var value = $('#number').toNum();
		value = isNaN(value) ? 0 : value;
		document.getElementById('number').value = value;

		var req_qty = value;
		var avl_qty = $('#stk_qty').attr("data-value");

		if(req_qty > avl_qty){
			alert("The requested quantity exceeds the available quantity.\n The maximum available stock is " +avl_qty)
		}else{

		}

	});


</script>

</body>
</html>
