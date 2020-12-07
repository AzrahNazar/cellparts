<?php include "db/db.php"; 
session_start();
if ((isset($_SESSION['user'])))
{
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
}

$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

 
if (empty($log)) {

} 
else {

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
	$sqlp ="SELECT * FROM bookinfo WHERE itemcode='$id'";
	$resultp =mysqli_query($conn,$sqlp);
	while ($rowp = mysqli_fetch_array($resultp)) {

	$key = $rowp['book'];
		
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
@media (min-width: 1200px) {
.xx
{
	
   width: 25%; 
}
	
}
@media (max-width: 767px) {
.heightrow	
{

height:620px;
}
}
@media (min-width: 1200px) {
.heightrow
{

height:410px;	
}
	
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
					<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>-->
					<div class="col-lg-9 col-md-9 col-sm-12">
						<div class="main-slider">
							<div class="slider-container">
					 <?php
				
				$sql="SELECT * FROM home_newar where bid='$id'";
                $resultm=mysqli_query($conn,$sql);
				
				while ($shrow = mysqli_fetch_array($resultm)){ ?>
							
							
							<div class="row heightrow" style="background-color:#fff; margin-bottom: 10px;
    margin-left: 2px;">
	
							<div class="col-md-6 col-sm-12 col-xs-12">
							<img src="images/access/<?php echo $shrow['img'];?>" style="padding-top:30px;" id="myImg" alt="<?php echo $shrow['name'];?>">
							<input id="pid" type="hidden" class="form-control" value="<?php echo $shrow['bid'];?>" style="width:250px">
							
							<input type="hidden" id="flag" class="form-control" value="2" >
							
							</div>
			
							<div class="col-md-6">
							<div class="row" style="padding-top:30px;">
							
							<h2 class="sss" style="margin-left: 12px;"><?php echo $shrow['name'];?></h2>
							
							</div>
							<hr>
							<div class="row" style="margin-left: 1px;">
							
												<span class="price product-price price_rs">Rs <?php echo $shrow['price'];?></span>
												<span class="price product-price price_usd">$ <?php echo number_format($shrow['price']/$dollar,2);?></span>
								
							
							</div>
							<hr>
							<div class="row aa" style="margin-left: 1px;">
							
							<?php echo $shrow['details'];?>
							
							</div><hr>
							
							<form action="#" method="post">
							<div class="row quan">
							<div class="col-md-4">
							 <label for="qty">Quantity:</label>
							 <input type="number" class="qty" title="Qty" maxlength="12" id="qty" name="qty" value="1">
							</div>
							<div class="col-md-2">
							</div>
							<div class="col-md-6 cart">
							
					<?php if (isset($_SESSION['user'])) { ?>		 
							<button class="button pro-add-to-cart btn btn-success" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
							
								 <?php } else { ?>	

								<button class="button pro-add-to-cart-temp btn btn-success" title="Add to Cart" type="button"><span><i class="fa fa-shopping-cart"></i> Add to Cart</span></button>
								
								<?php } ?>
											
							</div>
							
							</div>
							
							</form>
							</div>
							
							</div>
				<?php } ?>
							
							</div>	
						</div>
						<!--<div class="slider-product dotted-style-1 pt-30" style="margin-top:5px;padding-top: 10px;">
							
							<a href="#">
								<img class="img_a" src="img/banner/4.jpg" alt="mobile phones sumedacellular Kurunegala" style="height:170px;" />
								
							</a>
														
							
						</div>-->
					</div>
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
					<div class="row" style="margin-left:15px;">
								<?php 
								
					  $sql3="SELECT * FROM bottom_right_img ORDER by id DESC LIMIT 1";
					  $result3=mysqli_query($conn,$sql3);
					  while ($row3 = mysqli_fetch_array($result3)){ ?>
							<div class="slider-single-img none-sm">
								<a href="#">
								<img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" />
								<img class="img_b" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" />
								</a>
							</div>
							
							  <?php } ?>
								
							</div>
					</div>
				</div>
								<div class="row" style="margin-left: 1px;
    margin-bottom: 5px;">
	
	
	 
 <?php
		
$sql = mysqli_query($conn, "SELECT * FROM bookinfo where book LIKE'%key%' LIMIT 4");
	
$i=0;

if (mysqli_num_rows($sql) > 0){?>

<div class="row" style="
     margin-left: 1px;"><h4>Related Items</h4></div>
<?php

 while($shrow = mysqli_fetch_array($sql)){ $i++;

 ?>

										<div class="single-product white-bg col-md-3 col-sm-12 xx" style="height:270px;">
										<div class="product-img pt-20" style="margin-left:40px;">
											<a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>">
											<img src="images/sumeda_p/<?php echo $shrow['imgpath'];?>" style="height:167px;width:162px;" id="myImg<?php echo $i;?>" alt="<?php echo $shrow['book'];?>"/>
											</a>
										</div>
										<div class="product-content" style="margin-left:28px;">
											<div class="pro-title">
											
										<?php	  if ($shrow['eq_code']!=''){
       echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#99FF00\" size=\"1\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products.php?key=4&id=".$shrow['eq_code']."\">Equality Items Available</a></font></td>";
	    } ?>
												<h5><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>" title="<?php echo $shrow['book'];?>" style="color:#666666;">
												
												<?php 
												$maxLength = 25;
												
												echo substr($shrow['book'], 0, $maxLength);?>
												
												</a></h5>
											</div>
											<!--<div class="pro-rating ">
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star"></i></a>
												<a href="#"><i class="fa fa-star-o"></i></a>
											</div>-->
											
												<div class="price-box">
												<span class="price product-price price_rs">Rs <?php echo $shrow['price'];?></span>
												<span class="price product-price price_usd">$ <?php echo number_format($shrow['price']/$dollar,2);?></span>
												
												
											</div>
											
						
									
										</div>
									</div>

									
					 
<?php } } else {?>
		  
	
		  
				
<?php } ?>
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
														
                                                        $(".pro-add-to-cart").click(function () {

                                                            add_to_cart_acc($(this).attr('data-id-product'));

                                                            
                                                            //cart_data_load();
                                                            $(this).replaceWith( "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;'></i> Added to Cart</span></a>" );
														
                                                        });
                                                       
				
													  $(".pro-add-to-cart-temp").click(function () {

                                                            add_to_cart_acc_temp($(this).attr('data-id-product'));

                                                            
                                                            //cart_data_load();
                                                            $(this).replaceWith( "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;'></i> Added to Cart</span></a>" );
															
															

                                                        });
													
									   $.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	                //$(".ajax_cart_quantity").text(data);
	            }); 

                                                    });

                                                    function add_to_cart_acc(id) {
														
														var uid = $('#uid').val();
														var qty = $('#qty').val();
														var pid = $('#pid').val();
														var flag = $('#flag').val();
														
                                                        $.post('connection/index.php', {'add_to_cart_acc': 'data', id: id, uid: uid, qty:qty, pid:pid, flag:flag }, function (data) {

                                                        });
														cart_data_load_show();
                                                    }

													function add_to_cart_acc_temp(id) {
														
														var uid = $('#uid').val();
														var qty = $('#qty').val();
														var pid = $('#pid').val();
														var flag = $('#flag').val();
														
                                                        $.post('connection/index.php', {'add_to_cart_acc_temp': 'data', id: id, qty:qty, pid:pid, flag:flag}, function (data) {

                                                        });
														cart_data_load_show();
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
    </body>
</html>
