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
	
	if($countu == 1){	
		$row = mysqli_fetch_array($resultu);
		$name = $row['nic'];
		$uid = $row['id'];

	}else{
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
<link rel="icon" href="../img/favicon.png" />
<style>
.cust-details td {
	border-top: none !important;
	padding-left: 20px !important
}

.widget-container .heading{
  background: #666666;
}

</style>
</head>
<body class="page-header-fixed bg-1">
<div class=modal-shiftfix>
  <?php include "common/header.php"; ?>
  <div class="container-fluid main-content"> 
    
    <!-- Start Row -->
    <div class=row>
      <div class="col-md-3 col-sm-3">
        <div class="row"  style="margin:10px; margin-top:0"> <a href="wish-list">
          <div class="item social-widget pinterest" style="background-color: #0c4879;"> <i class="fa fa-heart"></i>
            <div class=social-data>
              <h2> Wish List </h2>
            </div>
          </div>
          </a> </div>
		  <div class="row"  style="margin:10px; margin-top:0"> <a href="online-orders?pg=1">
          <div class="item social-widget twitter"> <i class="fa fa-clipboard"></i>
            <div class=social-data>
              <h2> Pending Orders </h2>
            </div>
          </div>
          </a> </div>
        <div class="row"  style="margin:10px;"> <a href="online-orders?pg=2">
          <div class="item social-widget dribbble"> <i class="fa fa-check-square-o"></i>
            <div class=social-data>
              <h2> Accepted Orders</h2>
            </div>
          </div>
          </a> </div>
        <div class="row"  style="margin:10px;"> <a href="online-orders?pg=3">
          <div class="item social-widget facebook"> <i class="fa fa-th-list"></i>
            <div class=social-data>
              <h2> Order History </h2>
            </div>
          </div>
          </a> </div>

          <div class="row hidden-md hidden-lg" style="margin:10px;"> <a href="online-orders?pg=4">
            <div class="item social-widget facebook" style="background-color: #5bb9aa;"> <i class="fa fa-map-marker"></i>
              <div class=social-data>
                <h2> Track Order </h2>
              </div>
            </div>
            </a> </div>
      </div>
      <div class="col-lg-9 col-sm-9">
        <div class="widget-container fluid-height">
          <div class=heading> Account Details</div>
          <br>
		  <div class="row">
          <div class="col-md-6 pull-right">
            <form action="order-details" class="form-horizontal" id="frm" method="get">
              <div class="form-group" style="margin-bottom:5px">
                <input type="text" class="form-control pull-left" id="inv" name="inv" autocomplete="off" placeholder="Enter Order ID" style="width:65%; margin-right:8px;" required>
                <button class="btn btn-primary" type="submit">Search</button>
              </div>
            </form>
          </div>
          </div>
		  <hr>
          <table class="table table-filters cust-details">
            <tbody>
              <tr>
                <td width="20%"> Name </td>
                <td width="80%"><?php echo $row['title'].' '.$row['nic'].' '.$row['lname'] ?></td>
              </tr>
              <tr>
                <td> Address </td>
                <td><?php echo $row['add1'].'<br>'.$row['town']; ?></td>
              </tr>
              <tr>
                <td> Contact No (Mobile) </td>
                <td><?php echo $row['mobi'] ?></td>
              </tr>
			  <tr>
                <td> Contact No (Home)</td>
                <td><?php echo $row['home'] ?></td>
              </tr>
              <tr>
                <td> Email </td>
                <td><?php echo $row['eadd'] ?></td>
              </tr>
            </tbody>
          </table>
          <br><hr>
          <p style="margin: 0 10px"><a href="user-account"><i class="fa fa-pencil"></i> &nbsp;&nbsp;Edit Account Details</a></p>
          <p style="margin:10px 0 0 10px"><a href="user-account"><i class="fa fa-lock"></i> &nbsp;&nbsp;Change Password</a></p>
          <br><br>
        </div>
      </div>
    </div>


    <div class="row">
      <div class="widget-container fluid-height" style="padding: 10px;">
        <div class="heading" style="background: #0c4879;"> Bank Deposit Account Details</div>
        <br>
            <h5>Make your payment directly into any one of our bank accounts given below. Please use your Order ID as the payment reference. Your order won’t be shipped until the funds have cleared in our account.</h5>

          <div class="row">
            <div class="col-sm-3">
              <h5><b>Account Holder's Name:  O.A.A.M.Amarasekara<br>
                Account Number: 100657746319<br>
              Bank:  Sampath Bank<br>
              Branch: Kurunegala Super</b></h5>
              <hr>
            </div>
            <div class="col-sm-3">
              <h5><b>Account Holder's Name:  K. Ranasinghe<br>
                Account Number: 100120010283<br>
              Bank:  Nations Trust Bank<br>
              Branch: Kurunegala</b></h5>
              <hr>
            </div>
            <div class="col-sm-3">
              <h5><b>Account Hoder's Name:  O.A.A.M.Amarasekara<br>
                Account Number: 334100120000845<br>
              Bank:  Peoples Bank</b></h5>
              <hr>
            </div>
            <div class="col-sm-3">
              <h5><b>Account Holder's Name:  O.A.A.M.Amarasekara<br>
                Account Number: 85874556<br>
                Bank:  Bank of Ceylon<br>
                Branch Code: 513 <br>
                Branch: 2nd City Branch, Kurunegala</b></h5>
              <hr>
            </div>
              
            </div>
      </div>
    </div>
    <!-- End Row --> 
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