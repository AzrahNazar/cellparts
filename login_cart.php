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



$sqlm ="SELECT * FROM currency";

$resultm =mysqli_query($conn,$sqlm);

while ($rowm = mysqli_fetch_array($resultm)) {



	$dollar = $rowm['doller'];



}


if (isset($_SESSION['file'])) {
	$file = strip_tags(trim($_SESSION['file']));

} else {
	$file = '';
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
  <link rel="stylesheet" href="css/shortcode/header.css">
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
    p {
     font-size: 14px;
   }
   .form-selector {
     padding-bottom: 14px;
   }
   .box {
     background: #fff;
     padding: 30px;
     border: 1px solid #ddd;
   }
   label {
    font-size: 13.5px;
  }
  .btn-guest {
   background: #171717 ;
   border-color:#171717 ;
 }
 .has-error .help-block {
   color: #ed5858;
 }
</style>
</head>

<body>

  <!-- Add your site or application content here --> 

  <!-- header -->

  <?php include "common/header.php";?>
  <!-- header --> 

  <!-- mainmenu-area-start -->

  <div class="mainmenu-area bg-color-2 hidden-xs hidden-sm" id="myHeader">
    <div class="container">
      <div class="row">
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
        <div class="col-lg-5 col-md-5 col-sm-12">
          <div class="box" style="margin-top:40px;margin-bottom:40px;">
            <h4>LOGIN</h4><hr>
            <form id="login-form" method="post">
              <div class="form-group">
                <label>Username <span class="required">*</span></label>
                <input type="text" class="form-control" name="user" autofocus placeholder="Username" autocomplete="off" required>
                <span class="help-block" id="error"></span>
              </div>
              <div class="form-group">
                <div class="clearfix">
                  <label class="pull-left"> Password <span class="required">*</span> </label>
                </div>
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="help-block" id="error"></span>
              </div><br>
              <button type="submit" class="btn btn-primary btn-inline" id="btn-login">LOGIN</button>
              <span style="float: right;"><a href="reset_password">Forgot Password?</a></span> 
            </form>

            <br>
            <label>Don't have an account yet?</label>
            <a href="regis_cart" style="font-size:13.2px">Register with us</a> <span> &nbsp </span><br>
            <?php if(isset($_SESSION['temp_user'])) { ?>
              <hr><a href="connection/guest_log.php">
                <button class="btn btn-primary btn-guest btn-inline">CONTINUE AS GUEST</button>
              </a> <?php } ?></div>

            </div>



          </div>
        </div>
      </div>

      <!-- slider-area-end --> 

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
                      <div class="contact-icon"> <i class="fa fa-home"></i> </div>
                      <div class="contact-text"> <span>CellParts.lk,<br>
                        No:13, Maliyadeva Street,<br>
                        1st Floor, New Busstand Complex,<br>
                      Kurunegala</span> </div>
                    </li>
                    <li style="padding-bottom: 10px;">
                      <div class="contact-icon"> <i class="fa fa-envelope-o"></i> </div>
                      <div class="contact-text"> <a href="https://mail.google.com/mail/?view=cm&fs=1&to=sumedacellular@gmail.com"><span>sumedacellular@gmail.com</span></a> </div>
                    </li>
                    <li style="padding-bottom: 10px;">
                      <div class="contact-icon"> <i class="fa fa-phone"></i> </div>
                      <div class="contact-text"> <span>+94 37 205 6554 /

                      +94 37 222 1055</span> </div>
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



    <script>



// JavaScript Validation For Registration Page

$('document').ready(function()

{



//////////////////////////////////////////////////////////////////////////////////////



$("#login-form").validate({



  rules:

  {	

    password: {

     required: true

   },

   user: {

     required: true

   }

 },

 messages:

 {



  password: {

   required: "Password is Required.",

 },

 user: {

   required: "Username is Required.",

 }

},

errorPlacement : function(error, element) {

 $(element).closest('.form-group').find('.help-block').html(error.html());

},

highlight : function(element) {

 $(element).closest('.form-group').removeClass('has-success').addClass('has-error');

},

unhighlight: function(element, errorClass, validClass) {

 $(element).closest('.form-group').removeClass('has-error');

 $(element).closest('.form-group').find('.help-block').html('');

},

submitHandler: loginForm

}); 





   //////////////////////////////////////////
   function loginForm(){
    $.ajax({

     url: 'login_fun.php',

     type: 'POST',

     data: $('#login-form').serialize(),

     dataType: 'json'

   })

    .done(function(data){


     setTimeout(function(){



      if ( data.status==='ok' ) {


        // $.post( "connection/order_back.php", { change_log_id: "data"}, function( data ) {
        // }, "json");  

      alert('You are successfully logged in');

       <?php if(empty($file)) { ?>
        setTimeout('window.location.href = "confirm"; ',3);
      <?php } else { ?>
        window.location.href = '<?php echo $file; ?>';
     <?php } ?>

   } else 	{


			alert('Enter Correct username and Password');

    }



  },1000);



   })

    .fail(function(){

			  alert('Enter Correct username and Password');

     });

  }

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

<script src="js/main.js"></script>

</body>
</html>
