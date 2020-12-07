<?php include "db/db.php";
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

$newpwd = htmlspecialchars(trim($_GET['newpwd']), ENT_QUOTES, 'UTF-8');



$sqlm ="SELECT * FROM currency";
$resultm =mysqli_query($conn,$sqlm);
while ($rowm = mysqli_fetch_array($resultm)) {

  $dollar = $rowm['doller'];

}

?>

<!doctype html>
<html class="no-js" lang="en">
<head>
        <!--<meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CellParts.lk</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">-->

        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta charset="utf-8" />
        <title>CellParts.lk</title>
        <meta name="description" content="mybroker.lk" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />


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

        <link rel="stylesheet" href="bootstrap-sweetalert/lib/sweet-alert.css"/>
        <script src="bootstrap-sweetalert/lib/sweet-alert.min.js"></script>

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
            background: #f7f7f7;
            padding: 30px;
            border: 1px solid #ddd;

          </style>  


        </head>

        <body>

          <!-- Add your site or application content here -->
          <!-- header -->
          <?php include "common/header.php";?>                                            <!-- header -->
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
    <div class="row" style="">
      <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
      <div class="col-lg-6 col-md-6 col-sm-12">
        <div class="box" style="margin-top:40px;margin-bottom:150px;">
          <!--<h3>Login</h3>-->

          <?php
          $selector = htmlspecialchars(strip_tags(trim($_GET['selector'])), ENT_QUOTES, 'UTF-8');
          $validator = htmlspecialchars(strip_tags(trim($_GET['validator'])), ENT_QUOTES, 'UTF-8');

          if (empty($newpwd)) {

          } else {
            echo "The password you entered don't match!";
          }

          if(empty($selector) || (empty($validator))){
            echo "Could not validate your request!";
          }else{
            if((ctype_xdigit($selector)!== false) && (ctype_xdigit($validator)!== false)){
              ?>

              <form class="form" method="post"  action="connection/reset_password.php">
                <h3 style="text-align: center;">Reset your Password</h3>

                <input type="hidden" name="selector" value="<?php echo $selector;?>">
                <input type="hidden" name="validator" value="<?php echo $validator;?>">

                <p class="card-description text-center">Please enter a new password for your account..</p>

                <div class="form-group">
                  <!-- <label>Enter your email adddres:<span class="required">*</span></label> -->
                  <input type="password" class="form-control" placeholder="Enter a new password..." name="password"><br/>
                </div>

                <div class="form-group">
                  <!--  <label>Enter your email adddres:<span class="required">*</span></label> -->
                  <input type="password" class="form-control" placeholder="Repeat new password...." name="password_repeat">
                </div>

                <div class="row"> 

                  <div class="col-md-12" style="text-align: center;">
                    <button type="submit" name="btn_reset_password" class="btn btn-primary">RESET PASSWORD</button>
                  </div>
                  <?php
                }
              }
              ?>
              <!-- <div class="col-md-4"></div> -->

            </div>

          </form>

        </div>
            <!--<div class="slider-product dotted-style-1 pt-30" style="padding-top: 0px;">
              <a href="#">
                <img class="img_a" src="img/banner/4.jpg" alt="mobile phones sumedacellular Kurunegala" style="height:170px;" />
                
              </a>
            </div>-->
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
            <!--<div class="slider-sidebar" style="margin-top:50px;">
            
                <?php 
                
            /*$sql3="SELECT * FROM end_page_image LIMIT 1";
            $result3=mysqli_query($conn,$sql3);
            while ($row3 = mysqli_fetch_array($result3)){ */?>
              <div class="slider-single-img mb-20">
                <a href="#">
                  <img class="img_a" src="img/banner/<?php //echo $row3['img'];?>" alt="" style="width:409px; height:150px;" />
                  <img class="img_b" src="img/banner/<?php //echo $row3['img'];?>" alt="" style="width:409px; height:150px;" />
                </a>
              </div>
              <?php //} ?>
              
                    <?php 
                
            /*$sql3="SELECT * FROM end_page_image LIMIT 1,1";
            $result3=mysqli_query($conn,$sql3);
            while ($row3 = mysqli_fetch_array($result3)){ */?>
            <div class="slider-single-img mb-20">
                <a href="#">
                  <img class="img_a" src="img/banner/<?php //echo $row3['img'];?>" alt="" style="width:409px; height:150px;" />
                  <img class="img_b" src="img/banner/<?php //echo $row3['img'];?>" alt="" style="width:409px; height:150px;" />
                </a>
              </div>
                <?php //} ?>
              
              </div>-->
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
      <div class="footer-top-area border-1 ptb-30 bg-color-3" style="margin-top:10px;">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="footer-title">
                <h4 style="margin: 0 0 5px;">Sumedacellular</h4>
              </div>
              <div class="footer-widget">
                <div class="contact-info">
                  <ul>
                    <li style="padding-bottom: 10px;">
                      <div class="contact-icon">
                        <i class="fa fa-home"></i>
                      </div>
                      <div class="contact-text">
                        <span>CellParts.lk,<br> No:13, Maliyadeva Street,<br> 1st Floor, New Busstand Complex,<br> Kurunegala</span>
                      </div>
                    </li>
                    <li style="padding-bottom: 10px;">
                      <div class="contact-icon">
                        <i class="fa fa-envelope-o"></i>
                      </div>
                      <div class="contact-text">
                        <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sumedacellular@gmail.com"><span>sumedacellular@gmail.com</span></a>
                      </div>
                    </li>
                    <li style="padding-bottom: 10px;">
                      <div class="contact-icon">
                        <i class="fa fa-phone"></i>
                      </div>
                      <div class="contact-text">
                        <span>+94 37 205 6554 / +94 37 222 1055</span>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="footer-title">
                <h4 style="margin: 0 0 5px;">Information</h4>
              </div>
              <div class="footer-widget">
                <div class="list-unstyled">
                  <ul>
                    <li><a href="https://sumedacellular.com">Home</a></li>
                    <li><a href="about-us-sumedacellular-kurunegala-srilanka">About Us</a></li>
                    <li><a href="accessories-sumedacellular-kurunegala-srilanka">Accessories</a></li>
                    <li><a href="newarrivals-sumedacelullar-kurunegala-srilanka">New Arrivals</a></li>
                    <li><a href="contact-us-sumedacellular-kurunegala-srilanka">Contact Us</a></li>
                    
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <div class="footer-title">
                <h4 style="margin: 0 0 5px;">My Account</h4>
              </div>
              <div class="footer-widget">
                <div class="list-unstyled">
                  <ul>
                    <li><a href="account">My Account</a></li>
                    <li><a href="login_cart">Login</a></li>
                    <li><a href="register">Register</a></li>
                    <li><a href="faqs">FAQ's</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
              <!--<div class="footer-title">
                <h4 style="margin: 0 0 5px;">Gallery</h4>
              </div>
              <div class="footer-widget"> 
                <div class="footer-widget-img">
                  <div class="single-img">
                    <a href="#"><img src="img/product/15.jpg" alt="" /></a>
                  </div>
                  <div class="single-img">
                    <a href="#"><img src="img/product/16.jpg" alt="" /></a>
                  </div>
                  <div class="single-img">
                    <a href="#"><img src="img/product/11.jpg" alt="" /></a>
                  </div>
                  <div class="single-img">
                    <a href="#"><img src="img/product/14.jpg" alt="" /></a>
                  </div>
                  <div class="single-img">
                    <a href="#"><img src="img/product/9.jpg" alt="" /></a>
                  </div>
                  <div class="single-img">
                    <a href="#"><img src="img/product/16.jpg" alt="" /></a>
                  </div>
                </div>
              </div>-->
              

            </div>
          </div>
        </div>
      </div>
    </footer>
    <div class="copyright-area text-center bg-color-3">
      <div class="container"> 
        <div class="copyright-border ptb-30" style="padding: 20px 0;">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="copyright text-left">
                <p>Copyright <a href="https://cyclomax.net/">Cyclomax</a>. All Rights Reserved</p>
              </div>
            </div>
            
            
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

              <!-----------------messenger plugin-------------->            

 <!--<div class="fb-customerchat" 
 page_id="2553520888205415 "
 theme_color="#5bab01"
 logged_in_greeting="How can we help you?"
 logged_out_greeting="How can we help you?">
</div>-->
</div>
</div>
</div>
</div>
</div>

<div id="social_block">

  <ul>
    <li class="" style="background-image: url('img/fb.png');margin-bottom: 10px;"><a href="#"></a></li>
    <li style="background-image: url('img/g+.png');margin-bottom: 10px;"><a href="#"></a></li>
    <li style="background-image: url('img/pinterest.png');margin-bottom: 10px;"><a href="#"></a></li>
  </ul>

</div>
<!-- copyright-area-start -->

<!-- copyright-area-end -->
<!-- social_block-start -->

<!-- social_block-end -->


<!-- all js here -->



<script>

// JavaScript Validation For Registration Page
$('document').ready(function()
{
  $("#btn_acc_verify").click(function(){

    var verify_code = $('#acc_code').val();

    //alert(verify_code);

    $.post( "connection/regis_fun_cart.php", { val_verify_code: "data" , verify_code:verify_code}, function( data ){

      if (data.status === "ok") {

        swal({
          title: "Welcome!",
          text: "You have Successfully Registed to CellParts.lk!",
          type: "success",
          confirmButtonText: "OK"
        },
        function (isConfirm) {
          if (isConfirm) {
            window.location.href = "index";
          }
        });
        
      }else{

        swal("Oops!", "Something wrong with verification code Please Try Again!", "warning");

      }

    }, "json");

  });
});
</script> 
<script src="backend/assets/jquery.validate.min.js"></script>
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
<!-- <script src="js/main.js"></script>-->
</body>
</html>
