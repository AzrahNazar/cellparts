<?php include "db/db.php"; 
session_start();


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
		$nic=$row5['nic'];
    $mobi=$row5['mobi'];
    $home=$row5['home'];
	$eadd=$row5['eadd'];
    $add1=$row5['add1'];
	}
	
	
$sql2="SELECT * FROM live_cart where user_id='$uid'";
$result2=mysqli_query($conn,$sql2);
  
 while ($row = mysqli_fetch_array($result2)){
  $User_ID=$row['User_ID'];
 $Item_Code=$row['Item_Code'];
  
 $Qty=$row['Qty'];
 $price=$row['price'];
  
 }	

    }

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

</style>	

	
		
</head>
	
	
    <body>
  
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
					<div class="col-lg-5 col-md-5 col-sm-12">
						<div class="main-slider" style="">
							<div class="slider-container">
								
							<h2 style="color:#666666;">Delivery Details</h2>
						
						<hr>
						<form action="order?id=<?php //echo $uid; ?>" method="post">
						      <div class="contact-form-box">
					  
							  
                  <div class="form-selector">
                    <label>Name</label>
                    <input type="text" class="form-control input-sm" value="<?php  //echo $nic; ?>" style="width:90%;" name="nic" required />
                  </div>
              
                 <div class="form-selector">
                    <label>Tel no.</label>
                    <input type="text" class="form-control input-sm" value="<?php // echo $home; ?>" style="width:90%;" name="home" required />
                  </div>
                  <div class="form-selector">
                    <label>Mob no.</label>
                    <input type="text" value="<?php  //echo $mobi; ?>" class="form-control input-sm" style="width:90%;" name="mobi" required />
                  </div>
				   <div class="form-selector">
                    <label>Email</label>
                    <input type="text" value="<?php // echo $eadd; ?>" class="form-control input-sm" style="width:90%;" name="eadd" required />
                  </div>
              		<label for="name">Address: (delivery)<span class="required">*</span></label><br>
					
				<textarea rows="10" cols="50" name="add1" style="height:70px;width: 315px;"><?php  //echo $add1; ?>
</textarea>
                  <div class="form-selector">
                    <button class="button"><i class="fa fa-power"></i>&nbsp; <span>Confirm</span></button>
                     </div>
					 
					 
					 
                </div>	
							</form>
							</div>	
						</div>
						
					</div>
					
		
				</div>
				<div class="row" style="margin-top:20px;">
					<div class="col-md-3"></div>
		  <div class="col-md-8"><table>
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
        <!--<script src="js/jquery.scrollup.min.js"></script>-->
		<!-- owl.carousel.min.js -->
        <script src="js/owl.carousel.min.js"></script>		
		<!-- plugins.js -->
        <script src="js/plugins.js"></script>
		<!-- main.js -->
        <script src="js/main.js"></script>
    </body>
</html>
