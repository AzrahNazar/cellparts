<?php
session_start();
include "db/db.php";

$file = strlen($_SERVER['QUERY_STRING']) ? basename($_SERVER['PHP_SELF'], ".php")."?".$_SERVER['QUERY_STRING'] : basename($_SERVER['PHP_SELF'],".php");

if (isset($_SESSION['file'])) {
  unset($_SESSION['file']);
  
} else {
  $_SESSION['file'] = $file;
}
if (isset($_GET['qty'])) {
  $qty = htmlspecialchars(strip_tags(trim($_GET['qty'])), ENT_QUOTES, 'UTF-8');
}else{
  $qty = '1';
}

if (isset($_SESSION['gest_user']) || isset($_SESSION['user'])) {
  $user_id = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');

  if (isset($_GET['id'])) {
    $item = urlencode($_GET['id']);
    $iitem = urldecode($_GET['id']);
    // $item = htmlspecialchars(strip_tags(trim($_GET['id'])), ENT_QUOTES, 'UTF-8');
    
    $rrr = "SELECT book, price, imgpath, sccode, deli_charges, wrap_charges FROM books WHERE itemcode='$item'";
    $sql_itm = mysqli_fetch_assoc(mysqli_query($conn, $rrr));
    $sub_tot = $sql_itm['price']*$qty;
    $sccode = $sql_itm['sccode'];

    $delicharges = $sql_itm['deli_charges'];
    if(empty($delicharges)){
      $deli_charges = 0.0;
    }else{
      $deli_charges = $delicharges;
    }
    $w_price = $sql_itm['wrap_charges'];

  } else {
    $redirectUrl = "index";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
  }
  
} else {
  if (!isset($_SESSION['temp_user'])) {
    $sql_inv = mysqli_fetch_assoc(mysqli_query($conn, "SELECT token FROM invoice_no"));
    $new_uid = $sql_inv['token'];
    
    $uid2 = $new_uid + 1;
    $sql_v = "UPDATE invoice_no SET token=$uid2";
    
    if(mysqli_query($conn, $sql_v)) {
      $_SESSION['temp_user'] = $new_uid;
    }
  }
  
  $redirectUrl = "login_cart";
  echo "<script type=\"text/javascript\">";
  echo "window.location.href = '$redirectUrl'";
  echo "</script>";
}


$sqluu = "SELECT scat.deli_method, books.sccode
FROM
books
Inner Join scat ON books.sccode = scat.sccode
WHERE
scat.deli_method =  '1'
GROUP BY books.sccode";
$resultuu = mysqli_query($conn, $sqluu);
$countuu = mysqli_num_rows($resultuu);
$rowu = mysqli_fetch_array($resultuu);


if($countuu == 0) {
  $show = ""; 
} else {
  $show = "display:none";
}


$sqlw = "SELECT wrapping FROM scat WHERE scat.sccode =  '$sccode'";
$resultw = mysqli_query($conn, $sqlw);
$roww = mysqli_fetch_array($resultw);
$wrapping = $roww['wrapping'];


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
    p{font-size:14px}.form-selector{padding-bottom:14px}.box{background:#fff;padding:30px;border:1px solid #ddd}label{font-size:13px}.table1>tbody>tr>td,.table1>tbody>tr>th,.table1>tfoot>tr>td,.table1>tfoot>tr>th,.table1>thead>tr>td,.table1>thead>tr>th{border-top:none}.table2>tbody>tr>td,.table2>tbody>tr>th,.table2>tfoot>tr>td,.table2>tfoot>tr>th,.table2>thead>tr>td,.table2>thead>tr>th{font-size:14px;text-align:right}.table2 tr.heading-bar-table{border-top:5px solid #ff5313}b,strong{font-weight:600;font-size:13px}input[type=radio]{height:auto;position:relative!important;margin-right:20px!important;width:auto;float:left;margin-left:0!important}#payment div.payment_box{position:relative;width:96%;padding:1em 2%;margin:1em 0 1em 0;font-size:.92em;-webkit-border-radius:2px;-moz-border-radius:2px;border-radius:2px;line-height:1.5em;background:#f7f7f7;box-shadow:0 1px 2px 0 rgba(0,0,0,.25);-webkit-box-shadow:0 1px 2px 0 rgba(0,0,0,.25);-moz-box-shadow:0 1px 2px 0 rgba(0,0,0,.25);color:#5e5e5e;text-shadow:0 1px 0 rgba(255,255,255,.8)}.payment_box{box-shadow:none!important;text-shadow:none!important}.payment_box{display:none}.payment_box h5{line-height:22px;font-size:13.2px}#pre_loader{background:#f3f3f396 url(img/loading.gif) no-repeat center center;height:100%;position:fixed;z-index:9999999;right:0;left:0;bottom:0;top:0;overflow-y:hidden}.loading{overflow:hidden}#pre_loader{display:none}@media (max-width:767px){.box{padding:10px}.table-responsive{padding:10px}}.has-error .help-block{color:#ed5858}
</style>
</head>

<body>
  <div id="pre_loader"></div>
  <!-- Add your site or application content here --> 
  <!-- header -->
  <?php include "common/header.php";?>
  <!-- header --> 
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
    <form id="chk_form" method="post" action="javascript:void(0);">
      <input type="hidden" value="<?php echo $item; ?>" name="item" readonly>
      <input type="hidden" value="<?php echo $qty; ?>" name="qty" readonly>
      <div id="shp_add">
        <div class="row" >
          <div class="col-lg-6 col-md-6 col-sm-12">
            <div class="main-slider" style="">
              <div class="slider-container">
                <div class="box" style="margin-top:40px;margin-bottom:40px;">
                  <h4>BUY NOW</h4>
                  <hr>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>First Name<span class="required">*</span></label>
                        <input type="text" class="form-control" name="fname" id="fname" autocomplete="off"  value="" required />
                        <span class="help-block"></span> </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6">
                          <label>Last Name <span class="required">*</span></label>
                          <input type="text" class="form-control" name="lname" id="lname" autocomplete="off" value="" required />
                          <span class="help-block"></span> </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="name">Delivery Address<span class="required">*</span></label>
                        <br>
                        <textarea rows="3" cols="70" name="address" id="address" required></textarea>
                        <span class="help-block"></span> </div>
                        <div class="form-group">
                          <label class="col-md-12" style="padding-left: 1px;">Town/City</label>
                          <input type="text" id="toAddress" name="city" class="form-control" value="">
                          <input type="hidden" id="distance" name="distance" class="form-control" value="">
                        </div>
                        <div id="locations"style="display: none;"></div>
                        <!-- To Display list of locations entered -->
                        <div class="">
                          <label class="info-title"> </label>
                          <div class="">
                            <div id="summary" ></div>
                            <!-- To Display general summary (Distance & Duration) --> 
                          </div>
                        </div>

                        <!-- Modal -->
                        <div id="mapModal" class="well" style="display: none;">
                          <div id="map_area">
                            <div id="map_canvas"></div>
                            <!-- To Display Map -->
                            <div id="directions"></div>
                            <!-- To Display all directions with Waypoints --> 
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Phone No</label>
                              <input type="text" class="form-control " name="tele" id="tele" value="" autocomplete="off"/>
                              <span class="help-block"></span> </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label>Mobile No<span class="required">*</span></label>
                                <input type="text" class="form-control " name="mobile" id="mobile" value="" autocomplete="off" required>
                                <span class="help-block"></span> </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Email Address<span class="required">*</span></label>
                              <input type="text" value="" class="form-control " name="eadd" id="eadd" autocomplete="off"  required />
                              <span class="help-block"></span> </div>
                              <input type="submit" value="Place Order" id="btn_checkout" name="btn_checkout" class="btn btn-primary btn-inline">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6">
                        <div class="accordion-inner  table-responsive" style="margin-top:40px;margin-bottom:40px;">
                          <table width="100%" border="0" cellpadding="14" class="table table2">
                            <tr class="heading-bar-table">
                              <th width="35%" align="left">Item</th>
                              <th width="25%" align="right">Unit Price</th>
                              <th width="12%" align="right">Quantity</th>
                              <th width="28%" align="right">Subtotal (Rs)</th>
                            </tr>
                            <tr>
                              <td align="left"><img src="images/sumeda_p/<?php echo $sql_itm['imgpath']; ?>" width="80">
                                <p style="line-height: 18px;margin-top: 8px;"><?php echo $sql_itm['book']; ?></p></td>
                                <td align="right"><?php echo number_format($sql_itm['price'], 2); ?></td>
                                <td align="right"><?php echo $qty; ?></td>
                                <td align="right"><?php echo number_format($sub_tot, 2); ?></td>
                              </tr>
                              <?php if($wrapping == 1){?>
                                <tr>
                                  <td colspan="3" align="right"><h4 style="color:#fb530d;">Packaging Fee</h4></td>
                                  <td align="right"><h4 style="color:#fb530d;">LKR <?php echo $w_price; ?></h4></td>
                                  <input type="text" name="pkg" value="<?php echo $w_price; ?>" style="display: none;">
                                </tr>
                                <tr>
                                  <td colspan="3" align="right"><h4 style="color:#fb530d;">SUB TOTAL</h4></td>
                                  <?php 
                                  $tot = $sub_tot+$w_price; 
                                  ?>
                                  <td align="right"><h4 style="color:#fb530d;">LKR <?php echo number_format($tot, 2); ?></h4></td>
                                  <input type="text" name="delCha" value="<?php echo $deli_charges; ?>" style="display: none;">
                                </tr>
                              <?php }else{?>
                                <tr>
                                  <td colspan="3" align="right"><h4 style="color:#fb530d;">SUB TOTAL</h4></td>
                                  <td align="right"><h4 style="color:#fb530d;">LKR <?php echo number_format($sub_tot, 2); ?></h4></td>
                                  <input type="text" name="delCha" value="<?php echo $deli_charges; ?>" style="display: none;">
                                </tr>
                              <?php } ?>
                              <tr> </tr>
                            </table>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div id="pay_method_1" style="display:none">
                      <div class="row" >
                        <div class="col-lg-12"> <br>
                          <a id="back_btn" class="btn btn-primary btn-inline" href="javascript:void(0);">BACK</a>
                          <hr>
                        </div>
                        <div class="col-lg-6">

                          <input type="radio" name="del_method" value="1" checked style="display: none;">
                          <div class="main-slider" style="">
                            <div class="slider-container">
                              <div class="box" style="margin-bottom:40px;">
                                <h4>PAYMENT METHOD</h4>
                                <hr>
                                <div class="table-responsive">
                                  <table width="100%" border="0">
                                    <tr>
                                      <ul class="billing-form">
                                        <div id="payment" style="border:none;">
                                          <li>
                                            <div class="label-holder">
                                              <label class="radio b-label">Credit/Debit Card, Mobile Wallet and Internet Banking via PayHere
                                                <input type="radio" name="payment_method" id="optionsRadios1" value="1">
                                              </label>
                                              <img src="img/payhere.png" alt="PayHere" width="">
                                              <div class="payment_box payment_method_card">
                                                <h5><b>PayHere allows you to pay online payments from</b>
                                                  <ul style="list-style-type:square;margin: 10px 30px;">
                                                    <li>Credit/Debit Cards: Visa, MasterCard, Amex</li>
                                                    <li>Mobile Wallets: eZcash, mCash, PayApp</li>
                                                    <li>Internet Banking: Sampath Vishwa, HNB</li>
                                                  </ul>
                                                </h5>
                                                <div class="alert alert-danger" style="margin: 10px 0;padding: 10px;">
                                                  <p class="alert_title" style="font-size: 13px;"><i>3% of the transaction value will be applied as transaction fees. Subjected to change without prior notice</i></p>
                                                </div>
                                                <div class="form-group">
                                                  <textarea autofocus id="additional_details_cr" name="additional_details_cr" placeholder="Add special notes here (if any)" rows="4" cols="60"></textarea>
                                                </div>
                                                <br>
                                                <button class="btn btn-primary btn-inline btn_order">CONFIRM ORDER</button>
                                              </div>
                                              <hr>
                                              <label class="radio b-label">Bank Transfer/Bank Deposits
                                                <input type="radio" name="payment_method" id="optionsRadios3" value="2">
                                              </label>
                                              <div class="payment_box payment_method_bacs">
                                                <h5>Make your payment directly into any one of our bank accounts given below. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</h5>

                                                <h5><b>Account Hoder's Name:   O.A.A.M.Amarasekara<br>
                                                  Account Number: 100657746319<br>
                                                Bank:  Sampath Bank<br>
                                                Branch: Kurunegala Super</b></h5>
                                                <hr>

                                                <h5><b>Account Hoder's Name:   K. Ranasinghe<br>
                                                  Account Number: 100120010283<br>
                                                Bank:  Nations Trust Bank<br>
                                                Branch: Kurunegala</b></h5>
                                                <hr>

                                                <h5><b>Account Hoder's Name:   O.A.A.M.Amarasekara<br>
                                                  Account Number: 334100120000845<br>
                                                Bank:  Peoples Bank</b></h5>
                                                <hr>

                                                <h5><b>Account Holder\'s Name:  O.A.A.M.Amarasekara<br>
                                                  Account Number: 85874556<br>
                                                  Bank:  Bank of Ceylon<br>
                                                  Branch Code: 513<br>
                                                  Branch: 2nd City Branch, Kurunegala</b></h5>
                                                <hr>

                                                <div class="form-group">
                                                    <textarea autofocus id="additional_details_bk" name="additional_details_bk" placeholder="Add special notes here (if any)" rows="4" cols="60"></textarea>
                                                </div>
                                                <br>
                                                <button class="btn btn-primary btn-inline btn_order">CONFIRM ORDER</button>
                                              </div>
                                            </div>
                                          </li>
                                        </div>
                                      </ul>
                                      <br>
                                      <div id="errorDiv" style="float: left;"></div>
                                    </tr>
                                  </table>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-lg-6">
                          <div class="main-slider" style="">
                            <div class="slider-container">
                              <div class="box" style="margin-bottom:40px;">
                                <h4>ORDER SUMMARY</h4>
                                <hr>
                                <div class="table-responsive">
                                  <table width="100%" cellpadding="8" class="table table1">
                                    <tr>
                                      <td align="left" width="35%"><b>Name</b></td>
                                      <td><span id="txt_name"></span></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><b>Contact Number</b></td>
                                      <td><span id="txt_tel"></span></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><b>Mobile Number</b></td>
                                      <td><span id="txt_mob"></span></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><b>Email Address</b></td>
                                      <td><span id="txt_email"></span></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><b>Delivery Address</b></td>
                                      <td><span id="txt_add"></span></td>
                                    </tr>
                                    <tr>
                                      <td align="left"><b>City</b></td>
                                      <td><span id="txt_city"></span>
                                        <?php 
                                          if($wrapping==1){
                                              $g_tot = $sub_tot+$w_price+$deli_charges;
                                          }else{
                                            $g_tot = $sub_tot+$deli_charges;                                             
                                          }
                                        ?>
                                      </td>
                                      </tr>
                                    </table>
                                  </div>
                                  <input type="hidden" value="<?php echo $sub_tot; ?>" id="sub_tot_val" readonly>
                                  <div class="accordion-inner no-p table-responsive">
                                    <input type="hidden" name="wrapping" id="wrapping" value="<?php echo $wrapping; ?>">
                                    <table width="100%" border="0" cellpadding="14" class="table table2" style="margin-bottom: 0;">
                                      <tr class="heading-bar-table">
                                        <th width="35%" align="left">Item Name</th>
                                        <th width="25%" align="right">Unit Price</th>
                                        <th width="12%" align="right">Quantity</th>
                                        <th width="28%" align="right">Subtotal (Rs)</th>
                                      </tr>
                                      <tr>
                                        <td align="left"><?php echo $sql_itm['book']; ?></td>
                                        <td align="right"><?php echo number_format($sql_itm['price'], 2); ?></td>
                                        <td align="right"><?php echo $qty; ?></td>
                                        <td align="right"><?php echo number_format($sub_tot, 2);?></td>
                                      </tr>
                                      <tr>
                                        <td colspan="3" align="right"><h5>Subtotal</h5>
                                          <h5>Courier Charges</h5>
                                          <h5>Payment Processing Fee</h5>
                                          <h5>Packaging Fee</h5>
                                          <br>
                                          <h4 style="color:#fb530d;">GRAND TOTAL</h4></td>
                                          <td align="right"><h5>LKR <?php echo number_format($sub_tot, 2); ?></h5>
                                            <h5>LKR <span id="del_fee"><?php echo number_format($deli_charges, 2); ?></span></h5>
                                            <h5>LKR <span id="pro_fee">0.00</span></h5>
                                            <?php if($wrapping==1){
                                              $sub_tot+=$w_price;?>
                                              <h5>LKR <span id="wrap_fee"><?php echo $w_price; ?></span></h5><?php }else{?>
                                                <h5>LKR <span id="wrap_fee">0.00</span></h5><?php } ?>
                                                <br>
                                                <h4 style="color:#fb530d;"> LKR <span id="tot_amnt"><?php echo number_format($g_tot, 2); ?></span></h4>
                                              </tr>
                                              <tr> </tr>
                                            </table>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </form>
                            <form method="post" action="https://www.payhere.lk/pay/checkout" id="form_sandbox" style="display:none">
                              <!--<form method="post" action="https://sandbox.payhere.lk/pay/checkout" id="form_sandbox" style="display:none"> SandBox URL -->
                                <input type="hidden" name="merchant_id" value="212597" readonly>
                                <!-- <input type="hidden" name="merchant_id" value="1211943" readonly> SandBox ID -->
                                <input type="hidden" name="return_url" value="https://www.cellparts.lk/order-confirm" readonly>
                                <input type="hidden" name="cancel_url" value="https://www.cellparts.lk/order-cancel" readonly>
                                <input type="hidden" name="notify_url" value="https://www.cellparts.lk/connection/payment_verify" readonly>
                                <br>
                                <br>
                                Item Details<br>
                                <input type="hidden" name="order_id" id="order_id" readonly>
                                <input type="hidden" name="items" value="CellParts.lk" readonly>
                                <br>
                                <input type="hidden" name="currency" value="LKR" readonly>
                                <input type="hidden" name="amount" id="g_amnt" readonly>
                                <br>
                                <br>
                                Customer Details<br>
                                <input type="" name="first_name" id="first_name" readonly>
                                <input type="" name="last_name" id="last_name" readonly>
                                <br>
                                <input type="" name="email" id="pay_email" readonly>
                                <input type="" name="phone" id="pay_phone" readonly>
                                <br>
                                <input type="" name="address" id="pay_address" readonly>
                                <input type="" name="city" id="pay_city" readonly>
                                <input type="hidden" name="country" value="Sri Lanka" readonly>
                                <br>
                                <br>
                              </form>
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
                          <script type="text/javascript" src="js/jquery.validate.min.js"></script> 
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
                          <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false&amp;libraries=places&key=AIzaSyAuWch6HsB-2Xj_a7gr0VpM-JJNOrLdMtE"></script> 
                          <script type="text/javascript" src="assets/main.js"></script> 
                          <script>
                            $(document).ready(function () {
  // valid email pattern
  var eregex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  $.validator.addMethod("validemail", function (value, element) {
    return this.optional(element) || eregex.test(value);
  });
  
  // contact no validation
  var telregex = /^\d{10}$/;
  $.validator.addMethod("validtel", function (value, element) {
    return this.optional(element) || telregex.test(value);
  }); 
  
  // JavaScript Validation For Register Form 
  $("#chk_form").validate({
    rules: {
      eadd: {
        validemail: true
      },
      mobile: {
        validtel: true,
      },
      tele: {
        validtel: true,
      }
    },
    messages: {
      eadd: {
        validemail: "Please Enter Valid Email Address"
      },
      mobile: {
        validtel: "Invalid Mobile Number"
      },
      tele: {
        validtel: "Invalid Contact Number"
      }
    },
    errorPlacement: function (error, element) {
      $(element).closest('.form-group').find('.help-block').html(error.html());
    },
    highlight: function (element) {
      $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).closest('.form-group').removeClass('has-error');
      $(element).closest('.form-group').find('.help-block').html('');
    },
    submitHandler: submitForm
  });

  function submitForm() {
    $("#pre_loader").show();
    $("#txt_name").text($("#fname").val()+' '+$("#lname").val());
    $("#txt_tel").text($("#tele").val());
    $("#txt_mob").text($("#mobile").val());
    $("#txt_add").text($("#address").val());
    $("#txt_email").text($("#eadd").val());
    $("#txt_city").text($("#toAddress").val());
    
    $("#first_name").val($("#fname").val());
    $("#last_name").val($("#lname").val());
    $("#pay_email").val($("#eadd").val());
    $("#pay_phone").val($("#mobile").val());
    $("#pay_address").val($("#address").val());
    $("#pay_city").val($("#toAddress").val());  
    
    setTimeout(function() {
      $("#pre_loader").fadeOut("slow");
      $('#pay_method_1').show();
      $('#shp_add').hide();
    }, 500);
    
    return false;
  }
  
  $.post("connection/buy_now_fun.php", {'get_chkout_data': "data"}, function( data ) {
    if(data === '') {

    } else {
      $("#fname").val(data.fname);
      $("#lname").val(data.lname);
      $("#tele").val(data.Tel_no);
      $("#mobile").val(data.Mob_no);
      $("#address").val(data.address);
      $("#toAddress").val(data.town);
      $("#eadd").val(data.email);
    }   

  }, "json");
  
});

  $("input[name='del_method']").on('change', function() {
    $("#pre_loader").show();

    var val = $(this).val();

    var del_fee = 0;

    if(val == '1') {
      del_fee = 250;

    } else if(val == '2') {
      del_fee = 100;

    } else {
      del_fee = 0;
    }

    var tot = $('#sub_tot_val').val();
    var pro_fee = $('#pro_fee').text();
    var wrap_fee = $('#wrap_fee').text();
    $('#del_fee').text(parseFloat(del_fee).toFixed(2));

    var pay_type = $("input[name='payment_method']:checked").val();
    if(pay_type === '1') {
      pro_fee = ((parseFloat(tot) + parseFloat(del_fee) + parseFloat(wrap_fee))*3.9)/100+39;

    } else {
      pro_fee = 0;
    }


    $('#pro_fee').text(parseFloat(pro_fee).toFixed(2));
    var g_tot = parseFloat(tot) + parseFloat(del_fee) + parseFloat(pro_fee) + parseFloat(wrap_fee);
    $('#tot_amnt').text(parseFloat(g_tot).toFixed(2));
    $('#g_amnt').val(parseFloat(g_tot).toFixed(2));

    $("#pre_loader").fadeOut("slow");
  });

  $("input[name='payment_method']").on('change', function() {
    $("#pre_loader").show();
    var val = $(this).val();
    var pro_fee = 0;
    var wrap_fee = $('#wrap_fee').text();
    var sub_tot = $('#sub_tot_val').val();
    var del_fee = $('#del_fee').text();

    if(val == '1') {
      pro_fee = ((parseFloat(sub_tot) + parseFloat(del_fee)+ parseFloat(wrap_fee))*3.9)/100+39;
      $(".payment_box.payment_method_card").css("display", "block");
      $(".payment_box.payment_method_bacs").css("display", "none");

    } else {
      pro_fee = 0;
      $(".payment_box.payment_method_bacs").css("display", "block");
      $(".payment_box.payment_method_card").css("display", "none");
    }

    var g_tot = parseFloat(sub_tot) + parseFloat(del_fee) + parseFloat(pro_fee)+ parseFloat(wrap_fee);

    $('#pro_fee').text(parseFloat(pro_fee).toFixed(2));
    $('#tot_amnt').text(parseFloat(g_tot).toFixed(2));
    $('#g_amnt').val(parseFloat(g_tot).toFixed(2));

    $("#pre_loader").fadeOut("slow");
  });

  $("#back_btn").click(function () {
    $("#pre_loader").show();
    setTimeout(function() {
      $("#pre_loader").fadeOut("slow");
      $('#shp_add').show();
      $('#pay_method_1').hide();
    }, 500);
  });

  $(".btn_order").click(function() {
    var chk = $("input[name='del_method']:checked").is(':checked');
    
     if(chk) {
      $("#pre_loader").show();
      $.ajax({
        type: 'POST',
        async: false,
        url: 'connection/buy_now_fun.php',
        data: $('#chk_form').serialize(),
        dataType: 'json',
        success: function (data) {
          setTimeout(function () {
            if (data.status === '1') {
              var inv = data.inv_id;
              $("#order_id").val(inv);
              var pay_type = $("input[name='payment_method']:checked").val();
              if(pay_type === '2') {
                window.location.href = 'order-confirm?order_id='+inv;

              } else {
                $("#form_sandbox").submit();
              }

            } else if (data.status === '3') {
              $("#pre_loader").fadeOut("slow");
              alert('Session Expired. Please Try Again!');
              window.location.href = 'login_cart';

            } else {
              $("#pre_loader").fadeOut("slow");
              $('#errorDiv').slideDown(200, function () {
                $('#errorDiv').html('<div class="alert alert-danger style2">' + data.message + '</div>');
                $('#errorDiv').delay(5000).slideUp(100);
              });
            }

          }, 1000);
        },
        error: function () {
          alert('An unknown error occoured, Please try again Later...!')
        }
      });
      return false;

     } 
     //else {
    //   $('#errorDiv').slideDown(200, function () {
    //    // $('#errorDiv').html('<div class="alert alert-danger style2">Please Select Delivery Method</div>');
    //     $('#errorDiv').delay(5000).slideUp(100);
    //   });
    // }
  });

  </script>
</body>
</html>
