<?php include "db/db.php"; 
session_start();
if ((isset($_SESSION['user'])) && (isset($_SESSION['id'])))
{
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
$id=htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');
}

$subc = htmlspecialchars(trim($_GET['subc']), ENT_QUOTES, 'UTF-8');
$shosql="SELECT * FROM cat WHERE ccode='$subc' ";
$shoresult=mysqli_query($conn,$shosql);

 while ($rowq = mysqli_fetch_array($shoresult))
 
 {
$title=$rowq['cat'];
 }


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
	
    </head>
	
	
    <body>
  
        <!-- Add your site or application content here -->
        <!-- header -->
					<?php include "common/header.php";?> 																						<!-- header -->
		<!-- mainmenu-area-start -->
		<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm">
			<div class="container">
				<div class="row">
					<!--<div class="col-lg-3 col-md-3">
		<?php //include "common/categorybar.php" ?>
					</div>-->
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
					<div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
					<div class="col-lg-12 col-md-12 col-sm-12">
						
					<h3> Category : <font style="color:#5bab01;"><?php echo $title;?></font></h3>
					
					
	
			   <?php 

			$num_rec_per_page=16;
            if (isset($_GET["page"])) { $page  = htmlspecialchars(trim($_GET["page"]), ENT_QUOTES, 'UTF-8'); } else { $page=1; }; 
            $start_from = ($page-1) * $num_rec_per_page;

            $shosql = mysqli_query($conn, "SELECT * FROM scat WHERE ccode='$subc' LIMIT $start_from, $num_rec_per_page");
			
            $result_p = mysqli_query($conn, "SELECT * FROM scat WHERE ccode='$subc'");
            
			$total_records = mysqli_num_rows($result_p);
            $total_pages = ceil($total_records / $num_rec_per_page); 

	if($total_records > 0){
	 
$ii=0;
 while($shrow = mysqli_fetch_array($shosql)){ //$ii=$ii+1; ?>

							<div class="single-product  white-bg col-md-3 col-sm-12">
										<div class="product-img pt-20">
											<a href="products?subc=<?php echo $shrow['sccode']; ?>"><img src="images/sumeda_p/noimg.jpg" alt="" /></a>
										</div>
										<div class="product-content product-i">
											<div class="pro-title">
												<h4><a href="products?subc=<?php echo $shrow['sccode']; ?>"
												title="<?php echo $shrow['subcat'];?>">
												
												<?php 
												$maxLength = 30;
												
												echo substr($shrow['subcat'], 0, $maxLength);?>
												
												</a></h4>
											</div>
										
										</div>
									</div>
											
					 
 <?php } ?>
					  
        
					   
					</div>
				 <div class="row"> 
            <div class="col-lg-12 col-sm-12 col-md-12"> 
              <div class="pager"> 
                <div class="pages"> 
                 
                  <ul class="pagination pull-right " style="margin-right:5px;">
                    <li><a href="productsall?page=1&subc=<?php echo $subc; ?>">&laquo;</a></li>
                    <?php for ($i=1; $i<=$total_pages; $i++) { 

		  ?>
                    <li class="<?php if($page == $i) { echo 'active'; }?>"> <a href="productsall?page=<?php echo $i; ?>&subc=<?php echo $subc; ?>"> 
                      <?php echo $i; ?>
                      </a></li>
					  
                    <?php };  ?>
                    <li><a href="productsall?page=<?php echo $total_pages; ?>&subc=<?php echo $subc; ?>">&raquo;</a></li>
                  </ul>
                </div>
                <?php } ?>
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
