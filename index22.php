<?php 
include "db/db.php"; 
session_start();
// $uid = "";
if (isset($_SESSION['user']))
{
  $log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');
//echo ($log);
}
if (empty($log)) {
      $user = "";
      $uid = "";

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
	<meta content="Content-Type: text/html; charset=UTF-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>CellParts.lk</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta name="description" content="CellParts.lk Mobile Phone and mobile accessories in Sri Lanka.CellParts.lk Center was found in 1995.CellParts.lk has been continuing to expand and improve, We are the leading mobile phone repair centre in the City of Kurunegala." />
	<meta name="keywords" content="CellParts.lk,srilanka,mobile phones, Mobile Phone Prices in Sri Lanka, Nokia Phones, Samsung, Sony Ericsson, LG, HTC, iPhone, Send Free ,Mobile Phone Classifieds,Sri lanka phone Accessories,phone Accessories,sri lanka phone Accessories prices,phone Accessories prices in sri lanka,Bluetooth Accessories for Sale in Sri Lanka,PDA Accessories,Nokia Phones,New & Used Mobile Phones,Nokia, Samsung, Sony Ericsson, Motorola, LG, HTC, iPhone, Blackberry,Mobile Phone News" />
	<link rel="icon" href="img/favicon.png"/>
	<!-- Place favicon.ico in the root directory -->

	<!-- all css here -->
	<!-- bootstrap.min.css -->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- font-awesome.min.css -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- owl.carousel.css -->
	<link rel="stylesheet" href="css/owl.carousel.css">
  <!-- <link rel="stylesheet" href="assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/owlcarousel/assets/owl.theme.default.min.css"> -->
    <!-- owl.carousel.css -->
    <link rel="stylesheet" href="css/meanmenu.min.css">
    <!-- shortcode/shortcodes.css -->
    <link rel="stylesheet" href="css/shortcode/default.css">
    <link rel="stylesheet" href="css/shortcode/header.css">
    <link rel="stylesheet" href="css/shortcode/mainmenu.css">
    <link rel="stylesheet" href="css/shortcode/slider.css">
    <link rel="stylesheet" href="css/shortcode/product-tab.css">
    <!--<link rel="stylesheet" href="css/shortcode/client.css">-->
    <!--<link rel="stylesheet" href="css/shortcode/blog.css">-->
    <link rel="stylesheet" href="css/shortcode/product.css">
    <link rel="stylesheet" href="css/shortcode/other-page.css">
    <link rel="stylesheet" href="css/shortcode/footer.css">
    <!-- nivo-slider.css -->
    <link rel="stylesheet" href="css/nivo-slider.css">

    <!-- Vertical Nav Bar -->
    <link rel="stylesheet" href="css/nav-bar/menu.min.css">
    <link rel="stylesheet" href="css/nav-bar/menu.css">

    <!-- style.css -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive.css -->
    <link rel="stylesheet" href="css/responsive.css">
    <script src="js/vendor/modernizr-2.8.3.min.js" defer></script>
    <script src="js/vendor/jquery-2.1.4.min.js"></script>

    <!-- javascript -->
    <!-- <script src="assets/vendors/jquery.min.js"></script> -->

    <!-- jquery-ui.min.js --> 
    <script src="js/jquery-ui.min.js" defer></script> 
    <!-- <script src="assets/owlcarousel/owl.carousel.js"></script> -->

    <!--categorybar scroll on hover-->
    <!--<link rel="stylesheet" href="css/style.css" type="text/css" media="screen, projection"/>-->

    <!--//-->

    <style>
      .single-client a p {
       border-bottom: 1px solid #eeeeee;
       color: #666666;
       display: block;
       margin: 10px 5px 15px;
       padding: 15px;
       text-align: left;
     }
     .clint-img {
       overflow: hidden;
       padding: 0 15px 25px;
     }
     .client-img-left {
       float: left;
       width: 40%;
     }
     .client-name {
       float: left;
       width: 60%;
     }
     .client-name span {
       display: block;
       margin-left: 20px;
       margin-top: 31px;
     }
     /* home-2 */
     .client-2 .clint-img {
       width: 45%;
       padding-top: 22px;
       margin-bottom: 30px;
     }
     .product-img {
       padding-left: 18px;
     }
     .product-content {
       padding-left: 18px;
     }
     .single-product {
       margin-right: 10px;
       margin-bottom: 10px;
     }

     .js1:hover .ss {
      opacity: 1;
      stroke: #ffffff;
    }
    .js1:hover .arrow {
      opacity: 1;
      display: block;
    }
    .pntr {
      cursor: pointer;
    }


    @media (min-width: 320px) and (max-width: 480px) {
      .container{
        width: 350px;
      }

      .single-product {
        margin-right: 0px;
        height:280px
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
  <?php include "common/header.php";?>

  <!-- header --> 
  <!-- mainmenu-area-start -->
  <div class="mainmenu-area bg-color-2 hidden-xs hidden-sm" id="myHeader">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 cat_display">
          <?php include "common/categorybar.php"; ?>
        </div>
        <div class="col-lg-3 col-md-3 cat_dis" style="display:none;">
          <div class="product-menu-title " style="background-image: url('img/navlogo.jpg');height:54px;"> 
            <!--<h2>All categories <i class="fa fa-arrow-circle-down"></i></h2>--> 
          </div>
        </div>
        <div class="col-lg-9 col-md-9">
          <?php include "common/navbar.php"; ?>
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
        <div class="col-lg-3 col-md-3 hidden-sm hidden-xs">
          <!-- <div class="product_vmegamenu">
            <ul>
              <?php

              $sql="SELECT * FROM cat WHERE flag=1 ORDER BY cat ASC LIMIT 14";
              $resultm=mysqli_query($conn,$sql);

              while ($row = mysqli_fetch_array($resultm)){ ?>
                <li>
                  <?php if(!empty($row['img'])) { ?>
                    <a href="#"  class=""><img src="img/menu-l/<?php echo $row['img']; ?> " alt="" /><?php echo $row['cat']; ?><i class="fa fa-angle-right pull-right" style="font-size:18px;margin-right:15px;margin-top:10px;"></i></a>
                  <?php } else {?>
                    <a href="#"  class=""><img src="img/menu-l/7.png" alt="" /><?php echo $row['cat']; ?><i class="fa fa-angle-right pull-right" style="font-size:18px;margin-right:15px;margin-top:10px;"></i></a>
                  <?php } ?>
                  <div class="vmegamenu">
                    <?php
                    $cosql3="SELECT * FROM scat WHERE ccode='".$row['ccode']."'";
                    $coresult3=mysqli_query($conn,$cosql3);

                    while ($row3 = mysqli_fetch_array($coresult3)){ ?>
                      <p style="float: left;
                      padding: 0px;
                      width: 25%;"> <a href="products?subc=<?php echo $row3['sccode']; ?>"><i class="fa fa-angle-double-right" style="font-size:14px;margin-right:5px;margin-right:10px;"></i><?php echo $row3['subcat']; ?></a> </p>
                    <?php } ?>
                  </div>
                </li>
              <?php } ?>
            </ul>
          </div> -->
        </div>
        <div class="col-lg-6 col-md-6 col-sm-12">
          <div class="main-slider">
            <div class="slider-container"> 
              <!-- Slider Image --> 
              <script src="js/jssor.slider-27.4.0.min.js" type="text/javascript"></script> 
              <script type="text/javascript" defer>

                jssor_1_slider_init = function() {

                  var jssor_1_SlideshowTransitions = [
                  {$Duration:800,$Opacity:2}
                  ];

                  var jssor_1_options = {
                    $AutoPlay: 1,
                    $SlideshowOptions: {
                      $Class: $JssorSlideshowRunner$,
                      $Transitions: jssor_1_SlideshowTransitions,
                      $TransitionsOrder: 1
                    },
                    $ArrowNavigatorOptions: {
                      $Class: $JssorArrowNavigator$
                    },
                    $BulletNavigatorOptions: {
                      $Class: $JssorBulletNavigator$
                    }
                  };

                  var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

                  /*#region responsive code begin*/

                  var MAX_WIDTH = 980;

                  function ScaleSlider() {
                    var containerElement = jssor_1_slider.$Elmt.parentNode;
                    var containerWidth = containerElement.clientWidth;

                    if (containerWidth) {

                      var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                      jssor_1_slider.$ScaleWidth(expectedWidth);
                    }
                    else {
                      window.setTimeout(ScaleSlider, 30);
                    }
                  }

                  ScaleSlider();

                  $Jssor$.$AddEvent(window, "load", ScaleSlider);
                  $Jssor$.$AddEvent(window, "resize", ScaleSlider);
                  $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
                  /*#endregion responsive code end*/
                };
              </script>
              <style>
                /*jssor slider loading skin spin css*/
                .jssorl-009-spin img {
                  animation-name: jssorl-009-spin;
                  animation-duration: 1.6s;
                  animation-iteration-count: infinite;
                  animation-timing-function: linear;
                }

                @keyframes jssorl-009-spin {
                  from { transform: rotate(0deg); }
                  to { transform: rotate(360deg); }
                }

                .js1:hover .jssora051 {

                  background-color: #000;

                  border-radius: 5px;

                }

                .js1:hover .jssora051:hover {
                  background-color: #fff;
                }

                /*jssor slider bullet skin 051 css*/
                .jssorb051 .i {position:absolute;cursor:pointer;}
                .jssorb051 .i .b {fill:#444444;fill-opacity:0.5;}
                .jssorb051 .i:hover .b {fill-opacity:.7;}
                .jssorb051 .iav .b {fill-opacity: 1;}
                .jssorb051 .i.idn {opacity:.3;}

                /*jssor slider arrow skin 051 css*/
                .jssora051 {display:block;position:absolute;cursor:pointer;}
                .jssora051 .a {fill:none;stroke:#ffffff;stroke-width:1500;stroke-miterlimit:10;opacity: 0;}
                .jssora051 svg:hover {fill:none;stroke:#000;stroke-width:1500;stroke-miterlimit:10;}
                .jssora051 .a.ss:hover { stroke: #000;}
                /*.jssora051:hover {opacity:.8;stroke:black;}*/




                .jssora051.jssora051dn {opacity:.5;}
                .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
              </style>
              <div id="jssor_1" class="js1" style="position:relative;margin:0 auto;top:0px;left:0px;overflow:hidden;width:870px;height:600px;"> 
                <!-- Loading Screen -->
                <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);"> <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/spin.svg" /> </div>
                <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:868px;height:600px;overflow:hidden;">
                  <?php
                  $sql4="SELECT * FROM banner ORDER BY b_id DESC";
                  $result4=mysqli_query($conn,$sql4);
                  while ($row4 = mysqli_fetch_array($result4)){

                    ?>
                    <div> <a href="<?php  echo $row4['link']; ?>"> <img data-u="image" src="img/slider/<?php echo $row4['img']; ?>"/></a> </div>
                  <?php } ?>
                </div>
                <!-- Bullet Navigator -->
                <div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
                  <div data-u="prototype" class="i" style="width:16px;height:16px;"> <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                  </svg> </div>
                </div>
                <!-- Arrow Navigator -->
                <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75" > <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;" class="arrow">
                  <polyline class="a ss" points="11040,1920 4960,8000 11040,14080 " ></polyline>
                </svg> </div>
                <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75" > <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;" class="arrow">
                  <polyline class="a ss" points="4960,1920 11040,8000 4960,14080 " ></polyline>
                </svg> </div>
              </div>
              <script type="text/javascript">jssor_1_slider_init();</script> 
            </div>
          </div>
          <div>
            <div class="slider-product dotted-style-1 pt-30 col-sm-12 col-lg-12 col-md-12 col-sm-12 col-xs-12" style="padding-right: 0px;
            padding-left: 0px; padding-top: 0px;" >
            <?php 

            $sql3="SELECT * FROM minibanner_bottom ORDER by id DESC LIMIT 1";
            $result3=mysqli_query($conn,$sql3);
            while ($row3 = mysqli_fetch_array($result3)){ ?>
              <div class="banner-area ptb-40" style="padding: 14px 0">
                <div class="slider-single-img res"> <a href="http://www.sumedacellunlock.com/" target="_blank"> <img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" style="width:100%; height:175px;"/> <img class="img_b" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" style="width:100%;height:175px;"/> </a> </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12">
        <div class="slider-sidebar">
          <?php 

          $sql3="SELECT * FROM top_right_img ORDER by id DESC LIMIT 1";
          $result3=mysqli_query($conn,$sql3);
          while ($row3 = mysqli_fetch_array($result3)){ ?>
            <div class="slider-single-img mb-20"> <a href="#"> <img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" /> <img class="img_b" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" /> </a> </div>
          <?php } ?>
          <?php 

          $sql3="SELECT * FROM bottom_right_img ORDER by id DESC LIMIT 1";
          $result3=mysqli_query($conn,$sql3);
          while ($row3 = mysqli_fetch_array($result3)){ ?>
            <div class="slider-single-img none-sm"> <a href="#"> <img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" /> <img class="img_b" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" /> </a> </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <!-- slider-area-end --> 

  <!-- electronic-tab-area-start --> 
  <!-- electronic-tab-area-end --> 

  <!-- all-product-area-start -->
  <div class="all-product-area pb-60" style="margin-top:20px;padding-bottom:5px;">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 xxx"> 
          <!-- client-area-start  -->
          <div class="client-area dotted-style-2" style="padding-bottom:5px;margin-bottom:20px;">
            <div class="section-title">
              <h3>Cell Parts.lk</h3>
            </div>
            <div class="clinet-active border-1">
              <div class="single-client fix white-bg">
                <div class="client-content"> <a href="#">
                  <p>Welcome to our CellParts.lk phone accessories category, these mobile phone accessories can help you to make your mobile phones better.Mobile phone accessories like charger, battery, case/cover, housing, bluetooth products etc, mobile phone spare parts like lcd, buzzer, speaker, connectors,ic and many other parts,repairing<br>
                    <br>
                  </p>
                </a> </div>
              </div>
              <div class="single-client fix white-bg">
                <div class="client-content"> <a href="#">
                  <p> tools- screw driver set,ic and many other parts, repairing tools- screw driver set, work stations, cleanser, microscope etc.., unlocking clips, unlocking sim cards and many other products....</p>
                </a> </div>
              </div>
            </div>
          </div>

          <!-- bestseller-area -->
          <div class="bestseller-area dotted-style-2 hidden-xs" style="">
            <div class="section-title">
              <h3>Car Accessories</h3>
            </div>
            <div class="single-product-items-active border-1">
              <div class="single-product-items">
                <?php	$sql4="SELECT * FROM bookinfo WHERE ccode=54 AND car_access=1 ORDER BY price DESC LIMIT 0,10";
                $result4=mysqli_query($conn,$sql4);
                while ($row4 = mysqli_fetch_array($result4)){ ?>
                  <div class="single-product single-product-sidebar white-bg" style="height: 175px; overflow: hidden;">
                    <input id="pid" type="hidden" class="form-control" value="<?php echo $row4['itemcode'];?>" style= "width:250px;">
                    <div class="product-img product-img-left" style="    padding-left: 10px;"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row4['sccode'];?>&icode=<?php echo $row4['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row4['imgpath'];?>" alt="cell phone accessories in kurunegala" style="min-height:100px; width:108px;"/> </a> </div>
                    <div class="product-content product-content-right">
                      <div class="pro-title">
                        <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row4['sccode'];?>&icode=<?php echo $row4['itemcode'];?>" title="<?php echo $row4['book']; ?>">
                          <?php
                          $maxLength=35;

                          echo substr($row4['book'], 0, $maxLength);?>
                        </a></h4>
                      </div>
                      <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row4['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row4['price']/$dollar,2);?></span> </div>
                      <div class="product-icon">
                        <div class="product-icon-left f-left">
                          <?php if (isset($_SESSION['user'])) { ?>
                            <a class="button"><span class="pro-add-to-cart pntr" data-id-product="<?php echo $row4['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                          <?php } else { ?>
                            <a class="button"><span class="pro-add-to-cart-temp pntr" data-id-product="<?php echo $row4['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
              <div class="single-product-items">
                <?php	$sql4="SELECT * FROM bookinfo WHERE ccode=54 AND car_access=1 ORDER BY price DESC LIMIT 15,17";
                $result4=mysqli_query($conn,$sql4);
                while ($row4 = mysqli_fetch_array($result4)){ ?>
                  <div class="single-product single-product-sidebar white-bg">
                    <div class="product-img product-img-left"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row4['sccode'];?>&icode=<?php echo $row4['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row4['imgpath'];?>" alt="cell phone accessories in kurunegala" style="height:108px;width:105px;"/></a> </div>
                    <div class="product-content product-content-right">
                      <div class="pro-title">
                        <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row4['sccode'];?>&icode=<?php echo $row4['itemcode'];?>" title="<?php echo $row4['book']; ?>">
                          <?php
                          $maxLength=20;

                          echo substr($row4['book'], 0, $maxLength);?>
                        </a></h4>
                      </div>
                      <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row4['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row4['price']/$dollar,2);?></span> </div>
                      <div class="product-icon">
                        <div class="product-icon-left f-left">
                          <?php if (isset($_SESSION['user'])) { ?>
                            <a class="button"><span class="pro-add-to-cart pntr" data-id-product="<?php echo $row4['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                          <?php } else { ?>
                            <a class="button"><span class="pro-add-to-cart-temp pntr" data-id-product="<?php echo $row4['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12"> 
          <!-- feature-product-area -->

          <div class="new-product-area dotted-style-2 hidden-xs">
            <div class="section-title">
              <h3>New Arrivals</h3>
            </div>
            <div class="new-product-active border-1">
              <?php for ($ii=0; $ii<64; $ii++){ $xx =$ii; ?>
                <div class="new-product-items">
                  <?php
                  $sql3="SELECT * FROM books WHERE new_arrival = '1' ORDER BY price DESC LIMIT $xx, 1";
                  $result3=mysqli_query($conn,$sql3);
                  while ($row3 = mysqli_fetch_array($result3)){	  
                    ?>
                    <div class="single-product white-bg">
                      <div class="product-img pt-20" style="height: 175px; overflow: hidden;"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="<?php echo $row4['book'];?>" style="width:180px; min-height: 150px;"/></a> </div>
                      <div class="product-content product-i">
                        <div class="pro-title">
                          <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>">
                            <?php $maxLength = 35;
                            echo substr($row3['book'], 0, $maxLength);?>
                          </a></h4>
                        </div>
                        <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                        <div class="product-icon">
                          <div class="product-icon-left f-left">
                            <?php if (isset($_SESSION['user'])) { ?>
                              <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                            <?php } else { ?>
                              <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                            <?php } ?>
                          </div>
                        </div>
                      </div>
                      <span class="new">new</span> </div>
                    <?php }
                    $xx = $xx+1;
                    $sql3="SELECT * FROM books WHERE new_arrival = '1' ORDER BY price DESC LIMIT $xx, 1";
                    $result3=mysqli_query($conn,$sql3);
                    while ($row3 = mysqli_fetch_array($result3)){

                      ?>
                      <div class="single-product  white-bg">
                        <div class="product-img pt-20"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="cell phone accessories in kurunegala srilanka" style="height:167px;width:162px;"/></a> </div>
                        <div class="product-content product-i">
                          <div class="pro-title">
                            <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>" title="<?php echo $row3['book']; ?>">
                              <?php 
                              $maxLength = 35;

                              echo substr($row3['book'], 0, $maxLength);?>
                            </a></h4>
                          </div>
                          <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                          <div class="product-icon">
                            <div class="product-icon-left f-left">
                              <?php if (isset($_SESSION['user'])) { ?>
                                <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                              <?php } else { ?>
                                <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                              <?php } ?>
                            </div>
                          </div>
                        </div>
                        <span class="new">new</span> </div><?php }
                        $xx = $xx+1;
                        $sql3="SELECT * FROM books WHERE new_arrival = '1' ORDER BY price DESC LIMIT $xx, 1";
                        $result3=mysqli_query($conn,$sql3);
                        while ($row3 = mysqli_fetch_array($result3)){

                          ?>
                          <div class="single-product  white-bg">
                            <div class="product-img pt-20"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="cell phone accessories in kurunegala srilanka" style="height:167px;width:162px;"/></a> </div>
                            <div class="product-content product-i">
                              <div class="pro-title">
                                <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>" title="<?php echo $row3['book']; ?>">
                                  <?php 
                                  $maxLength = 35;

                                  echo substr($row3['book'], 0, $maxLength);?>
                                </a></h4>
                              </div>
                              <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                              <div class="product-icon">
                                <div class="product-icon-left f-left">
                                  <?php if (isset($_SESSION['user'])) { ?>
                                    <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                  <?php } else { ?>
                                    <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                            <span class="new">new</span> </div>

                          <?php }
                          $xx = $xx+1;
                          $sql3="SELECT * FROM books WHERE new_arrival = '1' ORDER BY price DESC LIMIT $xx, 1";
                          $result3=mysqli_query($conn,$sql3);
                          while ($row3 = mysqli_fetch_array($result3)){

                            ?>
                            <div class="single-product  white-bg">
                              <div class="product-img pt-20"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="cell phone accessories in kurunegala srilanka" style="height:167px;width:162px;"/></a> </div>
                              <div class="product-content product-i">
                                <div class="pro-title">
                                  <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>" title="<?php echo $row3['book']; ?>">
                                    <?php 
                                    $maxLength = 35;

                                    echo substr($row3['book'], 0, $maxLength);?>
                                  </a></h4>
                                </div>
                                <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                                <div class="product-icon">
                                  <div class="product-icon-left f-left">
                                    <?php if (isset($_SESSION['user'])) { ?>
                                      <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                    <?php } else { ?>
                                      <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                    <?php } ?>
                                  </div>
                                </div>
                              </div>
                              <span class="new">new</span> </div>
                              <?php 
                            } $ii = $xx;?>
                          </div>
                        <?php } ?>
                      </div>
                    </div>


                    <!-- New Arrivals Moboile -->
                    <div class="col-lg-12 col-md-12 col-xs-12 hidden-md hidden-lg" style="padding: unset;">
                      <div class="section-title">
                        <h3>New Arrivals</h3>
                      </div>
                      <?php 


                      $shosql = mysqli_query($conn, "SELECT * FROM books WHERE new_arrival = '1' ORDER BY price DESC LIMIT 10");
                      $i=0;
                      while($shrow = mysqli_fetch_array($shosql)){ $i++; ?>

                        <div class="single-product  white-bg col-md-3 col-xs-6">
                          <div class="product-img pt-20" style="height: 175px; overflow: hidden;">
                            <a <?php if (($shrow['eq_code']!='') && ($shrow['qty'] == 0)){?>href="details-equility-products.php?key=4&id=<?php echo $shrow['eq_code']; ?>" <?php }else{?>href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>"<?php }?>>
                              <img src="images/sumeda_p/<?php echo $shrow['imgpath'];?>" style="width:180px; min-height: 150px;;" id="myImg<?php echo $i;?>" alt="<?php echo $shrow['book'];?>"/>
                            </a>
                          </div>
                          <div class="product-content ">
                            <div class="pro-title">

                              <?php   if (($shrow['eq_code']!='') && ($shrow['qty'] == 0)){
                                echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#99FF00\" size=\"1\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products.php?key=4&id=".$shrow['eq_code']."\" style=\"font-size: 13px; color:green;\">Equality Items Available</a></font></td>";
                              }else{
                                echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#ffff\" size=\"1\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products.php?key=4&id=".$shrow['eq_code']."\" style=\"font-size: 13px; color:white;\">None</a></font></td>";
                              } ?>
                              <h5 style="height: 30px; overflow: hidden;"><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>" title="<?php echo $shrow['book'];?>" style="color:#666666;">

                                <?php                         
                                echo $shrow['book'];?>

                              </a></h5>
                            </div>

                            <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $shrow['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($shrow['price']/$dollar,2);?></span> </div>

                          </div>
                        </div>

                      <?php } ?>
                    </div>



                    <!-- banner-area -->
                    <?php 

                    $sql3="SELECT * FROM banner_middle LIMIT 1";
                    $result3=mysqli_query($conn,$sql3);
                    while ($row3 = mysqli_fetch_array($result3)){ ?>
                      <div class="banner-area ptb-40" style="padding: 20px 0">
                        <div class="slider-single-img res"> <a href="#"> <img class="img_a" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" width="870" height="174"/> <img class="img_b" src="img/minibanners/<?php echo $row3['img']; ?>" alt="" width="870" height="174"/> </a> </div>
                      </div>
                    <?php } ?>

                    <!-- new-product-area -->
                    <div class="new-product-area dotted-style-2 hidden-xs">
                      <div class="section-title">
                        <h3>Cellphone Accessories</h3>
                      </div>
                      <div class="new-product-active border-1">
                        <?php for ($i=0; $i<64; $i++){ $x =$i; ?>
                          <div class="new-product-items">
                            <?php
                            $sql3="SELECT * FROM books WHERE accessories = '1' ORDER BY price DESC LIMIT $x, 1";
                            $result3=mysqli_query($conn,$sql3);
                            while ($row3 = mysqli_fetch_array($result3)){	  
                              ?>
                              <div class="single-product white-bg">
                                <div class="product-img pt-20" style="height: 175px; overflow: hidden;"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="cell phone accessories in kurunegala srilanka" style="width:180px; min-height: 150px;"/></a> </div>
                                <div class="product-content product-i">
                                  <div class="pro-title">
                                    <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>">
                                      <?php $maxLength = 35;
                                      echo substr($row3['book'], 0, $maxLength);?>
                                    </a></h4>
                                  </div>

                                  <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                                  <div class="product-icon">
                                    <div class="product-icon-left f-left">
                                      <?php if (isset($_SESSION['user'])) { ?>
                                        <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                      <?php } else { ?>
                                        <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            <?php }
                            $x = $x+1;
                            $sql3="SELECT * FROM books WHERE accessories = '1' ORDER BY price DESC LIMIT $x, 1";
                            $result3=mysqli_query($conn,$sql3);
                            while ($row3 = mysqli_fetch_array($result3)){

                             ?>
                             <div class="single-product  white-bg">
                              <div class="product-img pt-20"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="cell phone accessories in kurunegala srilanka" style="height:167px;width:162px;"/></a> </div>
                              <div class="product-content product-i">
                                <div class="pro-title">
                                  <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>" title="<?php echo $row3['book']; ?>">
                                    <?php 
                                    $maxLength = 20;

                                    echo substr($row3['book'], 0, $maxLength);?>
                                  </a></h4>
                                </div>
                                <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                                <div class="product-icon">
                                  <div class="product-icon-left f-left">
                                    <?php if (isset($_SESSION['user'])) { ?>
                                      <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                    <?php } else { ?>
                                      <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                    <?php } ?>
                                  </div>
                                </div>
                              </div>
                            </div>

                          <?php }
                          $x = $x+1;
                          $sql3="SELECT * FROM books WHERE accessories = '1' ORDER BY price DESC LIMIT $x, 1";
                          $result3=mysqli_query($conn,$sql3);
                          while ($row3 = mysqli_fetch_array($result3)){

                           ?>
                           <div class="single-product  white-bg">
                            <div class="product-img pt-20"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="cell phone accessories in kurunegala srilanka" style="height:167px;width:162px;"/></a> </div>
                            <div class="product-content product-i">
                              <div class="pro-title">
                                <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>" title="<?php echo $row3['book']; ?>">
                                  <?php 
                                  $maxLength = 20;

                                  echo substr($row3['book'], 0, $maxLength);?>
                                </a></h4>
                              </div>
                              <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                              <div class="product-icon">
                                <div class="product-icon-left f-left">
                                  <?php if (isset($_SESSION['user'])) { ?>
                                    <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                  <?php } else { ?>
                                    <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                  <?php } ?>
                                </div>
                              </div>
                            </div>
                          </div>

                        <?php }
                        $x = $x+1;
                        $sql3="SELECT * FROM books WHERE accessories = '1' ORDER BY price DESC LIMIT $x, 1";
                        $result3=mysqli_query($conn,$sql3);
                        while ($row3 = mysqli_fetch_array($result3)){

                         ?>
                         <div class="single-product  white-bg">
                          <div class="product-img pt-20"> <a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>"><img src="images/sumeda_p/<?php  echo $row3['imgpath'];?>" alt="cell phone accessories in kurunegala srilanka" style="height:167px;width:162px;"/></a> </div>
                          <div class="product-content product-i">
                            <div class="pro-title">
                              <h4><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $row3['sccode'];?>&icode=<?php echo $row3['itemcode'];?>" title="<?php echo $row3['book']; ?>">
                                <?php 
                                $maxLength = 20;

                                echo substr($row3['book'], 0, $maxLength);?>
                              </a></h4>
                            </div>
                            <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $row3['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($row3['price']/$dollar,2);?></span> </div>
                            <div class="product-icon">
                              <div class="product-icon-left f-left">
                                <?php if (isset($_SESSION['user'])) { ?>
                                  <a class="button"><span class="add-to-acc pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                <?php } else { ?>
                                  <a class="button"><span class="add-to-acc-temp pntr" data-id-product="<?php echo $row3['itemcode'];?>"><i class="fa fa-shopping-cart"></i> Add to Cart</span></a>
                                <?php } ?>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php 
                      } $i = $x;?>
                    </div>
                  <?php } ?>
                </div>
              </div>


              <!-- Cellphone Accessories Mobile -->
              <div class="col-lg-12 col-md-12 col-xs-12 hidden-md hidden-lg" style="padding: unset;">
                <div class="section-title">
                  <h3>Cellphone Accessories</h3>
                </div>
                <?php 


                $shosql = mysqli_query($conn, "SELECT * FROM books WHERE accessories = '1' ORDER BY price DESC LIMIT 10");
                $i=0;
                while($shrow = mysqli_fetch_array($shosql)){ $i++; ?>

                  <div class="single-product  white-bg col-md-3 col-xs-6">
                    <div class="product-img pt-20" style="height: 175px; overflow: hidden;">
                      <a <?php if (($shrow['eq_code']!='') && ($shrow['qty'] == 0)){?>href="details-equility-products.php?key=4&id=<?php echo $shrow['eq_code']; ?>" <?php }else{?>href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>"<?php }?>>
                        <img src="images/sumeda_p/<?php echo $shrow['imgpath'];?>" style="width:180px; min-height: 150px;;" id="myImg<?php echo $i;?>" alt="<?php echo $shrow['book'];?>"/>
                      </a>
                    </div>
                    <div class="product-content ">
                      <div class="pro-title">

                        <?php   if (($shrow['eq_code']!='') && ($shrow['qty'] == 0)){
                          echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#99FF00\" size=\"1\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products.php?key=4&id=".$shrow['eq_code']."\" style=\"font-size: 13px; color:green;\">Equality Items Available</a></font></td>";
                        }else{
                          echo "<td colspan=2  width=\"96\" align=\"center\"><font color=\"#ffff\" size=\"1\" face=\"Arial, Helvetica, sans-serif\"><a class=\"style2\" href=\"details-equility-products.php?key=4&id=".$shrow['eq_code']."\" style=\"font-size: 13px; color:white;\">None</a></font></td>";
                        } ?>
                        <h5 style="height: 30px; overflow: hidden;"><a href="details-products-sumedacellular-kurunegala?subc=<?php echo $shrow['sccode'];?>&icode=<?php echo $shrow['itemcode'];?>" title="<?php echo $shrow['book'];?>" style="color:#666666;">

                          <?php                         
                          echo $shrow['book'];?>

                        </a></h5>
                      </div>

                      <div class="price-box"> <span class="price product-price price_rs">Rs <?php echo $shrow['price'];?></span> <span class="price product-price price_usd">$ <?php echo number_format($shrow['price']/$dollar,2);?></span> </div>

                    </div>
                  </div>

                <?php } ?>
              </div>

              <!-- banner-area-start -->
              <div class="banner-area pt-40" style="padding-top: 20px;">
                <div class="row">
                  <?php 

                  $sql3="SELECT * FROM end_page_image LIMIT 1";
                  $result3=mysqli_query($conn,$sql3);
                  while ($row3 = mysqli_fetch_array($result3)){ ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="slider-single-img res"> <a href="#"> <img class="img_a" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:156px;"/> <img class="img_b" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:156px;"/> </a> </div>
                    </div>
                  <?php } ?>
                  <?php 

                  $sql3="SELECT * FROM end_page_image LIMIT 1,1";
                  $result3=mysqli_query($conn,$sql3);
                  while ($row3 = mysqli_fetch_array($result3)){ ?>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                      <div class="slider-single-img"> <a href="#"> <img class="img_a" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:156px;"/> <img class="img_b" src="img/banner/<?php echo $row3['img'];?>" alt="best cell phone accessories in sri lanka" style="width:409px; height:156px;"/> </a> </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- newletter-area-end -->
      <?php include "common/footer.php"; ?>
      <!-- copyright-area-start --> 

      <!-- copyright-area-end --> 
      <!---start --> 

      <!-- social_block-end --> 
      <script type="text/javascript">

       $(document).ready(function () {

			//////////////////other products add to cart//////////////////

     $(".pro-add-to-cart").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

           add_to_cart($(this).attr('data-id-product'));


	           /* $.post('connection/index.php', {'cart_no': 'data'}, function (data) {
	                $(".count").text(data);
               });*/


               $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#F4A137;'></i> Added to Cart</span></a>" );

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
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#F4A137;'></i> Added to Cart</span></a>" );

	           // $(".cart_adding").fadeOut();
           });


			///////////////new arrivals add to cart/////////////////
			
      $(".add-to-cart-new").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

           add_to_cart_new($(this).attr('data-id-product'));
	            /*$.post('connection/index.php', {'cart_no': 'data'}, function (data) {
	                $(".count").text(data);
               });*/


               $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#F4A137;'></i> Added to Cart</span></a>" );

	            //$(".cart_adding").fadeOut();

           });

      $(".add-to-cart-new-temp").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

           $.post('connection/tmp_cart.php', {'tmp_cat_add': 'data'}, function (data) {
	                //$(".ajax_cart_quantity").text(data);
               });

           add_to_cart_new_temp($(this).attr('data-id-product'));

	           /* $.post('connection/index.php', {'cart_no': 'data'}, function (data) {
	                $(".count").text(data);
	                
               });*/



	            //$(this).css("background-color","red");
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#F4A137;'></i> Added to Cart</span></a>" );

	           // $(".cart_adding").fadeOut();
           });

		//////////////////////cell accessories add to cart/////////////////
   $(".add-to-acc").click(function () {

	        	//$(this).parents(".product").find(".cart_adding").css("display","block");

           add_to_acc($(this).attr('data-id-product'));


           $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#F4A137;'></i> Added to Cart</span></a>" );

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
	            $(this).replaceWith(  "<a class='button pro-add-to-cart' title='Added to cart' type='button'><span><i class='fa fa-shopping-cart' style='font-size: 16px;color:#F4A137;'></i> Added to Cart</span></a>" );

	           // $(".cart_adding").fadeOut();
           });		





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
			 //alert(uid);
       $.post('connection/cart_index.php', {'add_to_cart': 'data', id: id, uid: uid}, function (data) {

       });
       setTimeout(function(){
        cart_data_load_show();
      },100); 
     }
     function add_to_cart_new(id) {

       var uid = $('#uid').val();
			//alert(uid);
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
   <script src="js/bootstrap.min.js" defer></script> 
   <!-- nivo.slider.js --> 
   <script src="js/jquery.nivo.slider.pack.js" defer></script> 

   <!-- jquery.magnific-popup.min.js --> 
   <script src="js/jquery.magnific-popup.min.js" defer></script> 
   <!-- jquery.meanmenu.min.js --> 
   <script src="js/jquery.meanmenu.js" defer></script> 
   <!-- jquery.scrollup.min.js--> 
   <script src="js/jquery.scrollup.min.js"></script> 
   <!-- owl.carousel.min.js --> 
   <script src="js/owl.carousel.min.js" defer></script> 
   <!-- plugins.js --> 
   <script defer>
    (function() {
      var method;
      var noop = function () {};
      var methods = [
      'assert', 'clear', 'count', 'debug', 'dir', 'dirxml', 'error',
      'exception', 'group', 'groupCollapsed', 'groupEnd', 'info', 'log',
      'markTimeline', 'profile', 'profileEnd', 'table', 'time', 'timeEnd',
      'timeline', 'timelineEnd', 'timeStamp', 'trace', 'warn'
      ];
      var length = methods.length;
      var console = (window.console = window.console || {});

      while (length--) {
        method = methods[length];

        // Only stub undefined methods.
        if (!console[method]) {
          console[method] = noop;
        }
      }
    }());

  </script> 
  <!-- main.js --> 
  <script src="js/main.js" defer></script> 

  <!-- Vertical Nav Bar --> 
  <script src="js/nav-bar/menu.min.js" defer></script> 
  <script>
    $(function() {
      $('#auto-collapse-menu-demo').metisMenu();
    });
  </script>

  <!--Start of Tawk.to Script-->
  <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
      var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
      s1.async=true;
      s1.src='https://embed.tawk.to/5d3ff1d7e5ae967ef80d6fde/default';
      s1.charset='UTF-8';
      s1.setAttribute('crossorigin','*');
      s0.parentNode.insertBefore(s1,s0);
    })();
  </script>
  <!--End of Tawk.to Script-->

</body>
</html>
