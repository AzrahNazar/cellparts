<?php include "db/db.php"; 
$uid = '';
session_start();


if (isset($_SESSION['user']))
{
	$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

}

if ((isset($_POST['search'])))
{
	$key = htmlspecialchars(trim($_POST['search']), ENT_QUOTES, 'UTF-8');

}
else{
	$key='';
}

if($key){
	$shosql="SELECT * FROM bookinfo where book LIKE'%$key%'";
	$shoresult=mysqli_query($conn,$shosql);

	while ($rowq = mysqli_fetch_array($shoresult)){
		$title=$rowq['subcat'];
	}
}
else
{

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
	<link rel="stylesheet" href="css/responsive.css"><script src="js/vendor/jquery-2.1.4.min.js"></script>
	<script src="js/vendor/modernizr-2.8.3.min.js"></script>

	<style>


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

		<h4> Search results for :  <font style="color:#f4a137;"><?php echo $key; ?></font></h4>		
		<div class="row hidden-xs">
			<ul class="nav nav-tabs" style="margin-left: 14px;border-bottom:0px solid #ffffff;">
				<li class="active"><a data-toggle="tab" href="#home" style="background-color: #dcdcdc; 
				border: none;border-bottom-color: #f5f5f5;"><i class="icon fa fa-th-large"></i> Grid</a></li>
				<li><a data-toggle="tab" href="#menu1" style="background-color: #dcdcdc; 
				border: none;border-bottom-color: #f5f5f5;"><i class="icon fa fa-th-list"></i> List</a></li>

			</ul>

		</div>			

		<div class="tab-content">			
			
			
			<!------------------------------tab1-------------------------------------------------->	
			<div id="home" class="tab-pane fade in active">		


				<div class="row">
					
					<div class="col-lg-12 col-md-12 col-sm-12">
						



						<?php 

						$num_rec_per_page=32;
						if (isset($_GET["page"])) { $page  = htmlspecialchars(trim($_GET["page"]), ENT_QUOTES, 'UTF-8'); } else { $page=1; }; 
						$start_from = ($page-1) * $num_rec_per_page;


						$res_match = mysqli_query($conn,  "SELECT * FROM bookinfo WHERE book = '$key'");
						$res_num =mysqli_num_rows($res_match);

						if($res_num != 1){
							$space = substr_count($key, ' ');
							$space = $space+1;
							$string_length = strlen($key) - substr_count($key, ' ');
							
							$avg_cnt = $string_length/$space;
							

							$tokens = explode(' ',$key);
							$squery = '';
							//array_map('trim', $tokens);

							//foreach($tokens as $token){
								//echo $avg_cnt;
								if($avg_cnt<3){
									$shosql = mysqli_query($conn, "SELECT * FROM bookinfo where book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY price desc LIMIT $start_from, $num_rec_per_page");

									 $query = "SELECT * FROM bookinfo where book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY price desc LIMIT $start_from, $num_rec_per_page";
									$result_p = mysqli_query($conn, $query);
								}else{
									$x= "SELECT *, MATCH (book, details) AGAINST ('$key*' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book, details) AGAINST ('$key*' IN BOOLEAN MODE) OR book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY score DESC LIMIT $start_from, $num_rec_per_page ";
									$shosql = mysqli_query($conn, $x);
									 $query = "SELECT *, MATCH (book, details) AGAINST ('$key*' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book, details) AGAINST ('$key*' IN BOOLEAN MODE) OR book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY score DESC LIMIT $start_from, $num_rec_per_page ";
									$result_p = mysqli_query($conn, $query);
								}
							//}

						}else{
							$space = substr_count($key, ' ');
							$space = $space+1;
							$string_length = strlen($key) - substr_count($key, ' ');
							
							$avg_cnt = $string_length/$space;

							$tokens = explode(' ',$key);
							$squery = '';
							array_map('trim', $tokens);

							//foreach($tokens as $token){
								if($avg_cnt<3){
									$shosql = mysqli_query($conn, "SELECT * FROM bookinfo where book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY price desc LIMIT $start_from, $num_rec_per_page ");

									$query = "SELECT * FROM bookinfo where book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY price desc";
									$result_p = mysqli_query($conn, $query);
								}
								else{
									$shosql = mysqli_query($conn, "SELECT *, MATCH (book, details) AGAINST ('$key*' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book, details) AGAINST ('$key*' IN BOOLEAN MODE) AND book !='$key*' OR book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY score DESC LIMIT $start_from, $num_rec_per_page");
									$query = "SELECT *, MATCH (book, details) AGAINST ('$key' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book, details) AGAINST ('$key*' IN BOOLEAN MODE) AND book !='$key*' OR book LIKE'%$key%' OR details LIKE '%$key%' ORDER BY score DESC ";
									$result_p = mysqli_query($conn, $query);
								}
							//}
						}



						$total_records = mysqli_num_rows($result_p);
						$total_pages = ceil($total_records / $num_rec_per_page);
						$i = 0;

						while($search = mysqli_fetch_array($res_match)){ ?>

							<div class="single-product  white-bg col-md-3 col-sm-12" style="height:330px">
								<div class="product-img pt-20">

									<?php	  if ($search['eq_code']!=''){
										echo "<a href=\"details-equility-products-search.php?key=4&id=".$search['eq_code']."\" style=\"color:#666666;\"> <img src=\"images/sumeda_p/".$search['imgpath']."\" style=\"height:167px;width:162px;\" id=\"myImg" .$i." \"alt=\"" .$search['book']."\"/> </a> "; 
									} else { ?>
										<a href="details-products-sumedacellular-kurunegala?subc=<?php echo $search['sccode'];?>&icode=<?php echo $search['itemcode'];?>">
											<img src="images/sumeda_p/<?php echo $search['imgpath'];?>" style="height:167px;width:162px;" id="myImg" alt="<?php echo $search['book'];?>"/>
											</a> <?php } ?>
										</div>
										<div class="product-content ">
											<div class="pro-title">
												<?php	  if ($search['eq_code']!=''){
													echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#99FF00\" size=\"2\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products-search.php?key=4&id=".$search['eq_code']."\">Equality Items Available</a></font></td>  <h5><a href=\"details-equility-products-search.php?key=4&id=".$search['eq_code']."\" style=\"color:#666666;\">".$search['book']."</a></h5> "; 
												} else { ?> 

													<h5><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $search['sccode'];?>&icode=<?php echo $search['itemcode'];?>" title="<?php echo $search['book'];?>" style="color:#666666;"> 

														<?php 
														$maxLength = 30;

														echo substr($search['book'], 0, $maxLength); }?>

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
												<span class="price product-price price_rs">Rs <?php echo $search['price'];?></span>
												<span class="price product-price price_usd">$ <?php echo number_format($search['price']/$dollar,2);?></span>
												
												
											</div>

											<?php
											$subc = $search['sccode'];
											$icode = $search['itemcode']; 
											$sql1  = "SELECT * FROM books where sccode='$subc' AND itemcode='$icode'";
											$result1 = mysqli_query($conn, $sql1);
											$row1 = mysqli_fetch_array($result1);
											$qty = $row1['qty'];


											if(($qty == 0) && ($search['eq_code']=='')){
												$stk = "No stock available";
												$color  =  "orange";
												$display ="display:none;";
												?>
												<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
												<a href="contact-us-sumedacellular-kurunegala-srilanka?inquiry=1&id=<?php echo $search['itemcode'];?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-phone"></i> CONTACT US</span></a>
												<?php 
											}if(($qty == 0) && ($search['eq_code']!='')){
												$stk = "Switch to equal";
												$color  =  "white";
												$display ="display:none;";
												?>
												<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
												<a href="details-equility-products.php?key=4&id=<?php echo $search['eq_code']; ?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-reply"></i> SIMILAR PRODUCT</span></a>
												<?php 
											}else if($qty != 0){
												$stk = "Stock Available";
												$color  =  "green";
												$display = "";
												?> 	
												<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
											<?php 	}
											?>
											
											<!--<div class="product-icon" style="<?php //echo $display;?>">
												<div class="f-left pntr">
												<?php //if (isset($_SESSION['user'])) { ?>	
							 
														<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart" data-id-product="<?php //if ($search['eq_code']!=''){echo $search['eq_code'];} else {echo $search['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
														
															 <?php //} else { ?>	

														<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart-temp" data-id-product="<?php //if ($search['eq_code']!=''){echo $search['eq_code'];} else {echo $search['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
															
															<?php //} ?>
												</div>
											
											</div>-->
											
											<div class="product-icon" style="<?php echo $display; ?> margin-top: 13px;">
												<div class="f-left pntr">
													<?php if (isset($_SESSION['user'])) { ?>
														<a href="buy_now?id=<?php if ($search['eq_code']!=''){echo $search['eq_code'];} else {echo $search['itemcode'];}?>" class="button btn-warning" style="padding:5px;"><span> Buy Now</span></a>										 	
														
														<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart" data-id-product="<?php if ($search['eq_code']!=''){echo $search['eq_code'];} else {echo $search['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
														
													<?php } else { ?>	
														<a href="buy_now?id=<?php if ($search['eq_code']!=''){echo $search['eq_code'];} else {echo $search['itemcode'];}?>" class="button btn-warning" style="padding:5px;"><span> Buy Now</span></a>

														<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart-temp" data-id-product="<?php if ($search['eq_code']!=''){echo $search['eq_code'];} else {echo $search['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
														
													<?php } ?>
												</div>
												
											</div>
											
											
											<!--<label style="color: red;"><?php echo $stk; ?></label>-->





										</div>
									</div>


								<?php } ?> 


								<?php if($total_records > 0){

									$i=0;
									while($shrow = mysqli_fetch_array($shosql)){ $i++; ?>

										<div class="single-product  white-bg col-md-3 col-sm-12" style="height:330px">
											<div class="product-img pt-20">

												<?php	  if ($shrow['eq_code']!=''){
													echo "<a href=\"details-equility-products-search.php?key=4&id=".$shrow['eq_code']."\" style=\"color:#666666;\"> <img src=\"images/sumeda_p/".$shrow['imgpath']."\" style=\"height:167px;width:162px;\" id=\"myImg" .$i." \"alt=\"" .$shrow['book']."\"/> </a> "; 
												} else { ?>
													<a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>">
														<img src="images/sumeda_p/<?php echo $shrow['imgpath'];?>" style="height:167px;width:162px;" id="myImg<?php echo $i;?>" alt="<?php echo $shrow['book'];?>"/>
														</a> <?php } ?>
													</div>
													<div class="product-content ">
														<div class="pro-title">
															<?php	  if ($shrow['eq_code']!=''){
																echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#99FF00\" size=\"2\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products-search.php?key=4&id=".$shrow['eq_code']."\">Equality Items Available</a></font></td>  <h5><a href=\"details-equility-products-search.php?key=4&id=".$shrow['eq_code']."\" style=\"color:#666666;\">".$shrow['book']."</a></h5> "; 
															} else { ?> 

																<h5><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>" title="<?php echo $shrow['book'];?>" style="color:#666666;"> 

																	<?php 
																	$maxLength = 30;

																	echo substr($shrow['book'], 0, $maxLength); }?>

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
											
											<?php
											$subc = $shrow['sccode'];
											$icode = $shrow['itemcode']; 
											$sql1  = "SELECT * FROM books where sccode='$subc' AND itemcode='$icode'";
											$result1 = mysqli_query($conn, $sql1);
											$row1 = mysqli_fetch_array($result1);
											$qty = $row1['qty'];


											if(($qty == 0) && ($shrow['eq_code']=='')){
												$stk = "No stock available";
												$color  =  "orange";
												$display ="display:none;";
												?>
												<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
												<a href="contact-us-sumedacellular-kurunegala-srilanka?inquiry=1&id=<?php echo $shrow['itemcode'];?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-phone"></i> CONTACT US</span></a>
												<?php 
											}if(($qty == 0) && ($shrow['eq_code']!='')){
												$stk = "Switch to equal";
												$color  =  "white";
												$display ="display:none;";
												?>
												<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
												<a href="details-equility-products.php?key=4&id=<?php echo $shrow['eq_code']; ?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-reply"></i> SIMILAR PRODUCT</span></a>
												<?php 
											}else if($qty != 0){
												$stk = "Stock Available";
												$color  =  "green";
												$display = "";
												?> 	
												<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
											<?php 	}
											?>
											
											<!--<div class="product-icon" style="<?php //echo $display;?>">
												<div class="f-left pntr">
																	 <?php //if (isset($_SESSION['user'])) { ?>	
							 
							<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart" data-id-product="<?php //if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
							
								 <?php //} else { ?>	

							<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart-temp" data-id-product="<?php //if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
								
								<?php //} 
							//}?>
												</div>
											
											</div>
											<label style="color: red;"><?php echo $stk; ?></label>-->


											<div class="product-icon" style="<?php echo $display; ?> margin-top: 13px;">
												<div class="f-left pntr">
													<?php if (isset($_SESSION['user'])) { ?>
														<a href="buy_now?id=<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>" class="button btn-warning" style="padding:5px;"><span> Buy Now</span></a>										 	
														
														<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart" data-id-product="<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
														
													<?php } else { ?>	
														<a href="buy_now?id=<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>" class="button btn-warning" style="padding:5px;"><span> Buy Now</span></a>

														<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart-temp" data-id-product="<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
														
													<?php } ?>
												</div>
												
											</div>


										</div>
									</div>
									



								<?php } ?>
							</div>
							<div class="row"> 
								<div class="col-lg-12 col-sm-12 col-md-12"> 
									<div class="pager"> 

									<?php } ?>
								</div>
							</div>
						</div> 

					</div>

				</div>
				
				
				<!------------------------------tab2-------------------------------->

				<div id="menu1" class="tab-pane fade">		
					<div class="row">

						<div class="col-lg-12 col-md-12 col-sm-12">


							<?php 

							$num_rec_per_page=16;
							if (isset($_GET["page"])) { $page  = htmlspecialchars(trim($_GET["page"]), ENT_QUOTES, 'UTF-8'); } else { $page=1; }; 
							$start_from = ($page-1) * $num_rec_per_page;

							$res_match = mysqli_query($conn,  "SELECT * FROM bookinfo WHERE book = '$key'");
							$res_num =mysqli_num_rows($res_match);
           // echo $res_num;

							if($res_num != 1){
            	//echo("test1");
								$shosql = mysqli_query($conn, "SELECT *, MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) ORDER BY score DESC LIMIT $start_from, $num_rec_per_page ");

								$result_p = mysqli_query($conn, "SELECT *, MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) ORDER BY score DESC");
							}else{
        		//echo"test2";
								$shosql = mysqli_query($conn, "SELECT *, MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) AND book !='$key' ORDER BY score DESC LIMIT $start_from, $num_rec_per_page ");

								$result_p = mysqli_query($conn, "SELECT *, MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) AS score FROM bookinfo WHERE MATCH (book) AGAINST ('$key' IN BOOLEAN MODE) AND book !='$key' ORDER BY score DESC");
							}

							$total_records = mysqli_num_rows($result_p);
							$total_pages = ceil($total_records / $num_rec_per_page); 

							if($total_records > 0){

								$i=0;
								while($shrow = mysqli_fetch_array($shosql)){ $i++; ?>

									<div class="single-product  white-bg col-md-12 col-sm-12" style="max-height: 195px;">

										<div class="col-md-4 col-sm-4" style="width:25%; border-right: 1px solid #f5f5f5;">
											<div class="product-img pt-20" style="padding-bottom:25px;  padding-top: 17px;">
												<?php	  if ($shrow['eq_code']!=''){
													echo "<a href=\"details-equility-products-search.php?key=4&id=".$shrow['eq_code']."\" style=\"color:#666666;\"> <img src=\"images/sumeda_p/".$shrow['imgpath']."\" style=\"height:167px;width:162px;\" id=\"myImg" .$i." \"alt=\"" .$shrow['book']."\"/> </a> "; 
												} else { ?>
													<a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>">
														<img src="images/sumeda_p/<?php echo $shrow['imgpath'];?>" style="height:160px;width:162px;" id="myImg<?php echo $i;?>" alt="<?php echo $shrow['book'];?>"/>
														</a> <?php } ?>
													</div>


												</div>

												<div class="col-md-6 col-md-6" style="border-right: 1px solid #f5f5f5;"> 
													<div style="padding:25px;">
														<div class="pro-title">


															<h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>" title="<?php echo $shrow['book'];?>"  style="color:#666666;">

																<?php echo $shrow['book'];?>

															</a></h4>
															<?php	  if ($shrow['eq_code']!=''){
																echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#99FF00\" size=\"1\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products-search.php?key=4&id=".$shrow['eq_code']."\">Equality Items Available</a></font></td>  <h5><a href=\"details-equility-products-search.php?key=4&id=".$shrow['eq_code']."\" style=\"color:#666666;\">".$shrow['book']."</a></h5> "; 
															} else { ?> 

																<h5><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>" title="<?php echo $shrow['book'];?>" style="color:#666666;"> 

																	<?php 
																	$maxLength = 30;

																	echo substr($shrow['book'], 0, $maxLength); }?>

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
											
											
											<p><?php echo $row['details'];?></p>


										</div>
									</div>
									<div class="col-md-3 col-md-3">
										<div style="margin-top:30px;">
											<div class="f-left pntr">
												<div class="header-compire" style="margin-bottom:30px;">
													<a href="#" style="color:#666666;" ><i class="fa fa-heart"></i> Wish List 0 </a><br>
													<a href="#" style="color:#666666;"><i class="fa fa-refresh"></i> Compare  0 </a>
												</div>

												<?php
												$subc = $shrow['sccode'];
												$icode = $shrow['itemcode']; 
												$sql1  = "SELECT * FROM books where sccode='$subc' AND itemcode='$icode'";
												$result1 = mysqli_query($conn, $sql1);
												$row1 = mysqli_fetch_array($result1);
												$qty = $row1['qty'];

												if(($qty == 0) && ($shrow['eq_code']=='')){
													$stk = "No stock available";
													$color  =  "orange";
													$display ="display:none;";
													?>
													<h5 style=" color: <?php echo $color; ?>; margin-top: 10px;"><?php echo $stk; ?></h5>
													<a href="contact-us-sumedacellular-kurunegala-srilanka?inquiry=1&id=<?php echo $shrow['itemcode'];?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-phone"></i> CONTACT US</span></a>
													<?php 
												}if(($qty == 0) && ($shrow['eq_code']!='')){
													$stk = "";
													$color  =  "";
													$display ="display:none;";
													?>
													<a href="details-equility-products.php?key=4&id=<?php echo $shrow['eq_code']; ?>" class="button btn-primary" style="padding:5px;"><span><i class="fa fa-reply"></i> SIMILAR PRODUCT</span></a>
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
													<a href="buy_now?id=<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>" class="button btn-warning" style="padding:5px; <?php echo $display;?>"><span> Buy Now</span></a>

													<a class="button btn-primary " style="padding:5px; <?php echo $display;?>"><span class="pro-add-to-cart" data-id-product="<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>

												<?php } else { ?>
													<a href="buy_now?id=<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>" class="button btn-warning" style="padding:5px; <?php echo $display;?>"><span> Buy Now</span></a>	

													<a class="button btn-primary " style="padding:5px; <?php echo $display;?>"><span class="pro-add-to-cart-temp" data-id-product="<?php if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>

												<?php } ?>

							<!--		
							<?php //if (isset($_SESSION['user'])) { ?>	
							 
							<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart" data-id-product="<?php //if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
							
								 <?php //} else { ?>	

							<a class="button btn-primary" style="padding:5px;"><span class="pro-add-to-cart-temp" data-id-product="<?php //if ($shrow['eq_code']!=''){echo $shrow['eq_code'];} else {echo $shrow['itemcode'];}?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
								
							<?php //} ?>-->
						</div>

					</div>



				</div>

			</div>


		<?php } ?>
	</div>
	<div class="row"> 
		<div class="col-lg-12 col-sm-12 col-md-12"> 
			<div class="pager"> 

			<?php } ?>
		</div>
	</div>
</div> 

</div>	

</div>
</div>
</div>

</div>
<!-- slider-area-end -->

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
<!-- The Modal -->
<!-- <script src="js/vendor/jquery-2.1.4.min.js"></script> -->
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
				//////////////////other products add to cart//////////////////

				$(".pro-add-to-cart").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

	        	add_to_cart($(this).attr('data-id-product'));

	           /* $.post('connection/index.php', {'cart_no': 'data'}, function (data) {
	                $(".count").text(data);
	            });*/

	            
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#ffffff;'></i> Added to Cart</span></a>" );

	            //$(".cart_adding").fadeOut();

	        });

				$(".pro-add-to-cart-temp").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

	        	$.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	                //$(".ajax_cart_quantity").text(data);
	            });

	        	add_to_cart_temp($(this).attr('data-id-product'));

	           /* $.post('connection/index.php', {'cart_no': 'data'}, function (data) {
	                $(".count").text(data);
	                
	            });*/

	            

	            //$(this).css("background-color","red");
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button' style='font-size: 13px;color:#ffffff;'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#ffffff;'></i> Added to Cart</span></a>" );

	           // $(".cart_adding").fadeOut();
	       });
				$.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {

				});

				function add_to_cart_temp(id) {
					$.post('connection/cart_index.php', {'add_to_cart_temp': 'data', id: id}, function (data) {

					});
					setTimeout(function(){
						cart_data_load_show();
					},100);

				}

				function add_to_cart(id) {
					var uid = $('#uid').val();

					$.post('connection/cart_index.php', {'add_to_cart': 'data', id: id, uid: uid}, function (data) {

					});
					setTimeout(function(){
						cart_data_load_show();
					},100);
				}


			</script>
		</body>
		</html>
