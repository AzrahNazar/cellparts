<?php
session_start();
include '../db/db.php';

if(isset($_SESSION['user'])) {
	$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');	

} else {
	$log = '';
}

if(empty($log)) {
	$redirectUrl = "../login";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";

} else {
	$sqlu = "SELECT * FROM cust WHERE usern='$log'";
	$resultu = mysqli_query($conn, $sqlu);
	$countu = mysqli_num_rows($resultu);
	
	if($countu == 1) {	
		$row = mysqli_fetch_array($resultu);
		$name = $row['nic'];
		$uid = $row['id'];

	} else {
		$redirectUrl = "../destroy.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<title>CellParts.lk</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" media=all rel=stylesheet />
<link href="stylesheets/bootstrap.min.css" media=all rel=stylesheet />
<link href="stylesheets/font-awesome.min.css" media=all rel=stylesheet />
<link href="stylesheets/hightop-font.css" media=all rel=stylesheet />
<link href="stylesheets/isotope.css" media=all rel=stylesheet />
<link href="stylesheets/jquery.fancybox.css" media=all rel=stylesheet />
<link href="stylesheets/fullcalendar.css" media=all rel=stylesheet />
<link href="stylesheets/wizard.css" media=all rel=stylesheet />
<link href="stylesheets/select2.css" media=all rel=stylesheet />
<link href="stylesheets/morris.css" media=all rel=stylesheet />
<link href="stylesheets/datatables.css" media=all rel=stylesheet />
<link href="stylesheets/datepicker.css" media=all rel=stylesheet />
<link href="stylesheets/timepicker.css" media=all rel=stylesheet />
<link href="stylesheets/colorpicker.css" media=all rel=stylesheet />
<link href="stylesheets/bootstrap-switch.css" media=all rel=stylesheet />
<link href="stylesheets/bootstrap-editable.css" media=all rel=stylesheet />
<link href="stylesheets/daterange-picker.css" media=all rel=stylesheet />
<link href="stylesheets/typeahead.css" media=all rel=stylesheet />
<link href="stylesheets/summernote.css" media=all rel=stylesheet />
<link href="stylesheets/ladda-themeless.min.css" media=all rel=stylesheet />
<link href="stylesheets/social-buttons.css" media=all rel=stylesheet />
<link href="stylesheets/jquery.fileupload-ui.css" media=screen rel=stylesheet />
<link href="stylesheets/dropzone.css" media=screen rel=stylesheet />
<link href="stylesheets/nestable.css" media=screen rel=stylesheet />
<link href="stylesheets/pygments.css" media=all rel=stylesheet />
<link href="stylesheets/style.css" media=all rel=stylesheet />
<link href="stylesheets/color/green.css" media=all rel="alternate stylesheet" title=green-theme />
<link href="stylesheets/color/orange.css" media=all rel="alternate stylesheet" title=orange-theme />
<link href="stylesheets/color/magenta.css" media=all rel="alternate stylesheet" title=magenta-theme />
<link href="stylesheets/color/gray.css" media=all rel="alternate stylesheet" title=gray-theme />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name=viewport>
<style>
.nav-wizard > li {
  float: left;
   line-height: 40px;
	width: 20%;
	font-size: 15px;
}
.nav-wizard > li > a {
  position: relative;
  background-color: #9999994a;
  padding: 0 20px;
}
.nav-wizard > li > a .badge {
  margin-left: 3px;
  color: #9999994a;
  background-color: #428bca;
}
.nav-wizard > li:not(:first-child) > a {
  padding-left: 34px;
}
.nav-wizard > li:not(:first-child) > a:before {
  width: 0px;
  height: 0px;
  border-top: 20px inset transparent;
  border-bottom: 20px inset transparent;
  border-left: 20px solid #ffffff;
  position: absolute;
  content: "";
  top: 0;
  left: 0;
}
.nav-wizard > li:not(:last-child) > a {
  margin-right: 6px;
}
.nav-wizard > li:not(:last-child) > a:after {
  width: 0px;
  height: 0px;
  border-top: 20px inset transparent;
  border-bottom: 20px inset transparent;
  border-left: 20px solid #d7d7d7;
  position: absolute;
  content: "";
  top: 0;
  right: -20px;
  z-index: 2;
}
.nav-wizard > li:first-child > a {
  border-top-left-radius: 4px;
  border-bottom-left-radius: 4px;
}
.nav-wizard > li:last-child > a {
  border-top-right-radius: 4px;
  border-bottom-right-radius: 4px;
}
.nav-wizard > li.done:hover > a,
.nav-wizard > li:hover > a {
  background-color: #d5d5d5;
}
.nav-wizard > li.done:hover > a:before,
.nav-wizard > li:hover > a:before {
  border-right-color: #d5d5d5;
}
.nav-wizard > li.done:hover > a:after,
.nav-wizard > li:hover > a:after {
  border-left-color: #d5d5d5;
}
.nav-wizard > li.done > a {
  background-color: #e2e2e2;
}
.nav-wizard > li.done > a:before {
  border-right-color: #e2e2e2;
}
.nav-wizard > li.done > a:after {
  border-left-color: #e2e2e2;
}
.nav-wizard > li.active > a,
.nav-wizard > li.active > a:hover,
.nav-wizard > li.active > a:focus {
  color: #ffffff;
  background-color: #428bca;
}
.nav-wizard > li.active > a:after {
  border-left-color: #428bca;
}
.nav-wizard > li.active > a .badge {
  color: #428bca;
  background-color: #ffffff;
}

.nav-wizard > li.inactive > a,
.nav-wizard > li.inactive > a:hover,
.nav-wizard > li.inactive > a:focus {
  color: #278db8;
  background-color: #c2def7;
}
.nav-wizard > li.inactive > a:after {
  border-left-color: #c2def7;
}
.nav-wizard > li.inactive > a .badge {
  color: #c2def7;
  background-color: #ffffff;
}
.nav-wizard > li.disabled > a {
  color: #777777;
}
.nav-wizard > li.disabled > a:hover,
.nav-wizard > li.disabled > a:focus {
  color: #777777;
  text-decoration: none;
  background-color: #9999994a;
  cursor: default;
}
.nav-wizard > li.disabled > a:before {
  border-right-color: #9999994a;
}
.nav-wizard > li.disabled > a:after {
  border-left-color: #9999994a;
}
.nav-wizard.nav-justified > li {
  float: none;
}
.nav-wizard.nav-justified > li > a {
  padding: 10px 15px;
}
@media (max-width: 768px) {
  .nav-wizard.nav-justified > li > a {
    border-radius: 4px;
    margin-right: 0;
  }
  .nav-wizard.nav-justified > li > a:before,
  .nav-wizard.nav-justified > li > a:after {
    border: none !important;
  }
  .nav-wizard {display:none}
}
</style>
</head>

<body class="page-header-fixed bg-1">
<div class=modal-shiftfix>
<?php include "common/header.php"; ?>
  <div class="container-fluid main-content"> 
 
<?php 
if(isset($_GET['inv'])) {
	$inv = htmlspecialchars(strip_tags(trim($_GET['inv'])), ENT_QUOTES, 'UTF-8');	
	if(empty($inv)) {
		$redirectUrl = "index";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	
	} else {
		$sql_ord = mysqli_query($conn, "SELECT * FROM order_details WHERE inv_id='$inv' AND User_ID='$uid' AND guest=0");
		if(mysqli_num_rows($sql_ord) == 0) { ?>

		<div class=invoice>
      <div class=row>

          <div class="col-md-3">
          </div>
		  
		  <div class="col-md-6">
            <form action="order-details" class="form-horizontal" id="frm" method="get">
              <div class="form-group" style="margin-bottom:5px">
                <input type="text" class="form-control pull-left" id="inv" name="inv" autocomplete="off" placeholder="Enter Order ID" style="width:65%; margin-right:8px;" required>
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </form><br>
			<p> Invalid Invoice Number.</p>
          </div>		
		

          </div>
        </div>
<?php	} else {
			$sql_inv = mysqli_fetch_assoc($sql_ord); 
		 	$order_st = $sql_inv['status']; ?><br>
			
	<div class=page-title>
      <h1> Order Details </h1>
    </div>
    <div class=invoice>
      <div class=row>
        <div class=col-lg-12>
          <div class="row invoice-header">
            <div class="col-md-6">
              <h2> Invoice No: <?php echo $inv; ?> </h2>
              <p> <?php echo $sql_inv['order_date']; ?> </p>
            </div>
          </div>
        </div>
      </div>
      <div class=row>
        <div class=col-md-6>
          <div class=well> <strong>Delivery Address</strong>
            <h3> <?php echo $sql_inv['fname'].' '.$sql_inv['lname']; ?> </h3>
            <p> <?php echo $sql_inv['address']; ?>,<br>
             <?php echo $sql_inv['town']; ?>
			 <br><br>
             <?php echo $sql_inv['Tel_no']; ?><br>
             <?php echo $sql_inv['Mob_no']; ?><br>
              <?php echo $sql_inv['email']; ?></p>
          </div>
        </div>

      </div>
      <div class=row>
        <div class=col-lg-12>
          <div class="widget-container fluid-height">
            <div class="widget-content padded clearfix"><br>
			Payment Method: <?php if($sql_inv['pay_method'] == 1) { echo 'Credit/Debit Card'; } else if($sql_inv['pay_method'] == 2){ echo 'Bank Transfer/Bank Deposits'; } ?><hr>
              <div class=table-responsive>
			  <table class="table table-striped invoice-table">
                <thead>
                <th width="5%">#</th>
                  <th> Product </th>
                  <th width="10%"> Qty </th>
                  <th width="15%"> Unit Price (Rs)</th>
                  <th width="15%"> Subtotal </th>
                    </thead>
                <tbody>
				<?php $sql_pr = mysqli_query($conn, "SELECT * FROM cart_details WHERE inv_id='$inv' AND User_ID=$uid");
				$x = 0; $sub = 0;
				while($row_pr = mysqli_fetch_array($sql_pr)) { $x++; ?>
                  <tr>
                    <td> <?php echo $x; ?>. </td>
                    <td> <?php echo $row_pr['name']; ?> </td>
                    <td> <?php echo $row_pr['Qty']; ?> </td>
                    <td> <?php echo number_format($row_pr['price'], 2); ?> </td>
                    <td> <?php echo number_format($row_pr['Qty']*$row_pr['price'], 2); ?> </td>
                  </tr>
				            <?php 
                    $sub += $row_pr['price']*$row_pr['Qty'];

                    $sqll = "SELECT MAX(books.wrap_charges) AS wrap_charges FROM cart_details Inner Join books ON cart_details.Item_Code = books.itemcode Inner Join scat ON books.sccode = scat.sccode WHERE cart_details.inv_id='".$inv."'";
                    $resultl=mysqli_query($conn, $sqll);
                    $rowl = mysqli_fetch_array($resultl);
                      $wrap = $rowl['wrap_charges'];

                      $w_price = $rowl['wrap_charges'];


                    $sqld = "SELECT MAX(books.deli_charges) AS deli_charges FROM cart_details Inner Join books ON cart_details.Item_Code = books.itemcode  WHERE cart_details.inv_id='".$inv."'";
                    $resultd = mysqli_query($conn, $sqld);
                    $rowd = mysqli_fetch_array($resultd);
                      $del = $rowd['deli_charges'];
                      $dl_fee = $del;
                  } 

                  if($wrap >= 1){
                    $wrap_fee = $w_price;
                  }else{
                    $wrap_fee = 0;
                  }

                  if($dl_fee == 0){
                    $del_fee = 250;
                  }else{
                    $del_fee = $dl_fee;
                  }

                  if($sql_inv['pay_method'] == 1) {
                    $fee = ($sub + $del_fee + $wrap_fee )*3.9/100+39;

                  } else {
                    $fee = 0;
                  }

                  $grand_total = ($sub+$del_fee+$wrap_fee+$fee);
      } ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td class=text-right colspan=4><strong>Subtotal</strong></td>
                    <td> LKR <?php echo number_format($sub, 2); ?> </td>
                  </tr>
                  <tr>
                    <td class=text-right colspan=4><strong>Courier Charges</strong></td>
                    <td> LKR  <?php $ship_chg = $del_fee; echo number_format($ship_chg, 2); ?> </td>
                  </tr>
                  <tr>
                    <td class=text-right colspan=4><strong>Pakaging Charges</strong></td>
                    <td> LKR  <?php number_format($wrap_fee, 2); ?> </td>
                  </tr>
                  <tr>
                    <td class=text-right colspan=4><strong>Payment Processing Fee</strong></td>
                    <td> LKR  <?php echo bcdiv($fee, 1, 2); ?> </td>
                  </tr>
                  <tr>
                    <td class=text-right colspan=4><h4 class=text-primary> Grand Total </h4></td>
                    <td><h4 class=text-primary>LKR  <?php echo number_format($grand_total, 2); ?> </h4></td>
                  </tr>
                </tfoot>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
 
    </div>
	
<?php		}
	}

 else {
	$redirectUrl = "index";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";	
}
?>

  </div>
</div>
<script src="javascripts/jquery-1.10.2.min.js"></script> 
<script src="javascripts/jquery-ui.js"></script> 
<script src="javascripts/bootstrap.min.js"></script> 
<script src="javascripts/raphael.min.js"></script> 
<script src="javascripts/selectivizr-min.js"></script> 
<script src="javascripts/jquery.mousewheel.js"></script> 
<script src="javascripts/jquery.vmap.min.js"></script> 
<script src="javascripts/jquery.vmap.sampledata.js"></script> 
<script src="javascripts/jquery.vmap.world.js"></script> 
<script src="javascripts/jquery.bootstrap.wizard.js"></script> 
<script src="javascripts/fullcalendar.min.js"></script> 
<script src="javascripts/gcal.js"></script> 
<script src="javascripts/jquery.dataTables.min.js"></script> 
<script src="javascripts/datatable-editable.js"></script> 
<script src="javascripts/jquery.easy-pie-chart.js"></script> 
<script src="javascripts/excanvas.min.js"></script> 
<script src="javascripts/jquery.isotope.min.js"></script> 
<script src="javascripts/isotope_extras.js"></script> 
<script src="javascripts/modernizr.custom.js"></script> 
<script src="javascripts/jquery.fancybox.pack.js"></script> 
<script src="javascripts/select2.js"></script> 
<script src="javascripts/styleswitcher.js"></script> 
<script src="javascripts/wysiwyg.js"></script> 
<script src="javascripts/typeahead.js"></script> 
<script src="javascripts/summernote.min.js"></script> 
<script src="javascripts/jquery.inputmask.min.js"></script> 
<script src="javascripts/jquery.validate.js"></script> 
<script src="javascripts/bootstrap-fileupload.js"></script> 
<script src="javascripts/bootstrap-datepicker.js"></script> 
<script src="javascripts/bootstrap-timepicker.js"></script> 
<script src="javascripts/bootstrap-colorpicker.js"></script> 
<script src="javascripts/bootstrap-switch.min.js"></script> 
<script src="javascripts/typeahead.js"></script> 
<script src="javascripts/spin.min.js"></script> 
<script src="javascripts/ladda.min.js"></script> 
<script src="javascripts/moment.js"></script> 
<script src="javascripts/mockjax.js"></script> 
<script src="javascripts/bootstrap-editable.min.js"></script> 
<script src="javascripts/xeditable-demo-mock.js"></script> 
<script src="javascripts/xeditable-demo.js"></script> 
<script src="javascripts/address.js"></script> 
<script src="javascripts/daterange-picker.js"></script> 
<script src="javascripts/date.js"></script> 
<script src="javascripts/morris.min.js"></script> 
<script src="javascripts/skycons.js"></script> 
<script src="javascripts/fitvids.js"></script> 
<script src="javascripts/jquery.sparkline.min.js"></script> 
<script src="javascripts/dropzone.js"></script> 
<script src="javascripts/jquery.nestable.js"></script> 
<script src="javascripts/main.js"></script> 
<script src="javascripts/respond.js"></script>
</body>
</html>