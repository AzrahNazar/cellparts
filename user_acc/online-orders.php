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
<link rel="stylesheet" href="../../backend/plugins/sweetalert/sweetalert.css" />
<link rel="icon" href="../img/favicon.png" />

<style>
.widget-container .heading{
	background: #666666;
}
</style>
	

</head>
<body class="page-header-fixed bg-1">
<div class=modal-shiftfix>
<?php include "common/header.php"; ?>
  <div class="container-fluid main-content"> 
    
<?php 
if(isset($_GET['pg'])) {
	$pg = htmlspecialchars(strip_tags(trim($_GET['pg'])), ENT_QUOTES, 'UTF-8');
	if($pg == 1) { // Pending Orders
		$result = mysqli_query($conn, "SELECT id, inv_id, order_date, status, g_total, pay_method FROM order_details WHERE status = 'Order Pending' AND User_ID='$uid' AND guest=0 ORDER BY id DESC");
		$title = 'Pending Orders';
	
	} else if($pg == 2) { // Accepted Orders
		$result = mysqli_query($conn, "SELECT id, inv_id, order_date, status, g_total, pay_method FROM order_details WHERE status = 'Confirmed' AND User_ID='$uid' AND guest=0 ORDER BY id DESC");
		$title = 'Accepted Orders';
	
	} else if($pg == 3) { // Order History
		$result = mysqli_query($conn, "SELECT id, inv_id, order_date, status, g_total, pay_method  FROM order_details WHERE User_ID='$uid' AND guest=0 ORDER BY id DESC");
		$title = 'Order History';
	
	} else if($pg == 4) { // Track Order
		$result = mysqli_query($conn, "SELECT id, inv_id, order_date, status, g_total, pay_method  FROM order_details WHERE User_ID='$uid' AND guest=0 ORDER BY id DESC");
		$title = 'Track my Orders';
	} else {
		$redirectUrl = "index";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";		
	}

} else {
	$redirectUrl = "index";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";	
}
?>   
    <div class=row> 
    <!-- Start Row -->
      <div class=col-lg-12>
          <!-- Table1 -->
		  <div class="widget-container fluid-height clearfix">
			<div class=heading> <?php echo $title; if($pg == 4){ ?> <span class="pull-right">Hotline: +94 114 422 733 | <a target="_blank" href="http://www.promptxpress.lk/BranchNetwork.aspx#" style="color: #fff;">BRANCHES</a></span><?php }  ?></div>
			<div class="widget-content padded clearfix">
			  <div class=table-responsive>
				<table class="table table-bordered table-striped table-hover" id=dataTable1>
				  <thead>
				    <th>ID</th>
					<th>Order Date</th>
					<th>Invoice No</th>
					<th>Total Payment (Rs)</th>
					<th>Payment Status</th>
					<?php if($pg == 3) { ?><th>Order Status</th>
					<?php } ?>
					<?php if($pg == 4) { ?><th>Tracking Number</th>
					<th>Track Order</th>
					<?php } ?>
					<td>View Order</td>
				  </thead>
				  <tbody>
					<?php
					$xx = 0;
					while ($row = mysqli_fetch_array($result)){ $xx++;
					?>
					<tr>
					  <td><?php echo $xx; ?>.</td>
					  <td><?php echo $row['order_date']; ?></td>
					  <td><?php echo $oid = $row['inv_id']; ?></td>
					  <td><?php echo $row['g_total']; ?></td>
						<?php 
						if( $row['pay_method']==1){
							$sql_inv = mysqli_query($conn, "SELECT * FROM order_verify WHERE order_id='$oid'");
							if(mysqli_num_rows($sql_inv) == 0) {
								$st = '<span class="label label-danger">Pending</span>';
								$paid = '';
								
							} else {
								$row_inv = mysqli_fetch_assoc($sql_inv);
								$paid = $row_inv['payhere_amount'];
								
								if($row_inv['status'] == 2 && $row_inv['payhere_amount'] == $row['g_total']) {
									$st = '<span class="label label-success">Success</span>';
								
								} else {
									$st = '<span class="label label-warning">Invalid Payment</span>';
								}
							}
						}else{
							$sql_inv = mysqli_query($conn, "SELECT * FROM bank_details WHERE order_id='$oid'");
							if(mysqli_num_rows($sql_inv) == 0) {
								$st = '<span class="label label-danger">Pending</span>';
								$paid = '';
								
							} else {
								$row_inv = mysqli_fetch_assoc($sql_inv);
								$paid = $row_inv['amount'];
								
								// if($row_inv['amount'] == $row['g_total']) {
									$st = '<span class="label label-success">Success</span>';
								
								// } else {
								// 	$st = '<span class="label label-warning">Invalid Payment</span>';
								// }
							}
						}
						?>
					  <td><?php echo $st; ?></td>
					  <?php if($pg == 3) { ?><td><?php echo $row['status']; ?></td><?php } ?>

					  <!-- TRACK ORDER -->
					  <?php 
					  	if($pg == 4) {
						  	$sqlt="SELECT * FROM track_order WHERE order_id='$oid' ";
						  	$resultt=mysqli_query($conn,$sqlt);
						  	$rowt = mysqli_fetch_array($resultt);

						  	$delivery = $rowt['delivery_service'];
						  	$tr_num = $rowt['tracking_num'];
						  	if(mysqli_num_rows($resultt) == 0) { ?>
						  		<td></td>
						  		<td></td>
						   <?php }else{ 
						   	if($delivery == 'Prompt Express'){
						   		$url = 'http://www.promptxpress.lk/Search';

						   	}else if($delivery == 'Citypak'){
						   		$url = 'https://customer.citypak.lk/tracking.jsp?tracking-numbers='.$tr_num;
						   	}
					   	?>
					   	<td><?php echo $tr_num; ?></td>
					  	<td><a href="<?php echo $url; ?>" class="btn btn-success btn-sm" target="_blank">Track Order</a></td><?php  } }?>


					  <td align="center"><a href="order-details?inv=<?php echo $oid; ?>" class="btn btn-primary btn-sm">View</a></td>
					</tr>
					<?php  } ?>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		  <!-- End Table1 -->   
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
<script src="../../backend/plugins/sweetalert/sweetalert.min.js"></script>
<script>
/* Confirm Delivery */
$('.btn_confirm').click(function() {
  var row_id = $(this).val();
  swal({
	title: "",
	text: "Are you sure you want to confirm the order!",
	type: "warning",
	showCancelButton: true,
	confirmButtonClass: "btn-danger",
	confirmButtonText: "Yes!",
	closeOnConfirm: false
  },
	function () {
	  $.post('connection/update_user_acc.php', {'deliver_confirm_order': 'data' , row_id : row_id}, function (e) {
		if (e.status == "ok") {
		  swal({
			title: "",
			text: "Successfully Confirmed",
			type: "success",
			confirmButtonText: "OK"
			  },
			  function (isConfirm) {
				window.location.href = "online-orders?pg=3";
		  });
		}else{
		  swal("Oops...", "Something went wrong!", "warning");
		}
	  }, "json");
	}
  );	
});
</script>
</body>
</html>