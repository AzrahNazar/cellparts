<?php
include '../db/db.php';
session_start();
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

$val = 'admin';
$val2 = 'user';
if (empty($log)) {

	$redirectUrl = "../login.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
} else {
	
	

	$sqlu = "SELECT * FROM user WHERE user='$log' AND (val='$val' OR val='$val2')";
	$resultu = mysqli_query($conn,$sqlu);
	$countu = mysqli_num_rows($resultu);
	
	if ($countu == 1) {
		
		$sql5 = "SELECT * FROM user WHERE user='$log'";
		$result5 = mysqli_query($conn,$sql5);

		while ($row5 = mysqli_fetch_array($result5)) {

			$user = $row5['user'];
		}
		$sqlu="SELECT * FROM send_mail";
		$result=mysqli_query($conn,$sqlu);

		while($row = mysqli_fetch_array($result)){
			$eid=$row['id'];

		}
		$gtot=0;

		$id = htmlspecialchars(trim($_GET['id']), ENT_QUOTES, 'UTF-8');

		if(isset($_GET['flag'])) {
			$flg = htmlspecialchars(trim($_GET['flag']), ENT_QUOTES, 'UTF-8');
		} else {
			$flg = '';
		}

	}
	else 
	{
		$redirectUrl = "../login.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	}
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../images/favicon.ico">

	<title>CellParts.lk</title>

	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.min.css">
	
	<!-- Bootstrap 4.0-->
	<link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

	<!-- Font Awesome -->
	<link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.min.css">

	<!-- Ionicons -->
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.min.css">

	<link href="assets/date_picker/datepicker.css" rel="stylesheet" type="text/css" /> 
	<link rel="stylesheet" href="assets/daterangepicker/daterangepicker-bs3.css">		

	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- minimal_admin Skins. Choose a skin from the css/skins
		folder instead of downloading all of them to reduce the load. -->
		<link rel="stylesheet" href="css/skins/_all-skins.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- google font -->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<Style>
	.user-block .comment, .user-block .description, .user-block .username {
		margin-left: 0;
	}
</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include "common/header.php"; ?>

		<!-- Left side column. contains the logo and sidebar -->
		<?php include "common/sidebar.php"; 

		$sqlu="SELECT *, DATE_FORMAT(order_date, '%Y-%m-%d / %h:%i %p') AS odate FROM order_details where inv_id='".$id."'";
		$resultu=mysqli_query($conn,$sqlu);
		$rowu = mysqli_fetch_array($resultu);
		?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Order Details
				</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="orders.php">order</a></li>
					<li class="breadcrumb-item"><a href="#">order details</a></li>
				</ol>
			</section>

			<!-- Main content -->
			<section class="content">


				<div class="row">
					<div class="col-12">

						<h5>Order ID: <?php echo $id; ?></h5>
						<h5>Order Status: <?php echo $rowu['status']; ?></h5>
						<h5>Order Date: <?php echo $rowu['odate']; ?></h5>

						<div class="box">
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>
											<th></th>
											<th>Name</th>
											<th>Quantity</th>
											<th>Price</th>
											<th>Sub Total</th>

										</tr>
									</thead>
									<tbody>
										<?php 

										$g_total = $rowu['g_total'];


										$sqlx="SELECT * FROM cart_details where inv_id='".$id."'";

										$resultx=mysqli_query($conn,$sqlx);

										$wrap = 0; $dl_fee=0;
										while ($rowx = mysqli_fetch_array($resultx)){
											$subt=($rowx['price'])*($rowx['Qty']);


											$flag = $rowx['flag'];
											$itemcode = $rowx['Item_Code'];




											?>
											<tr>

												<td><img src="../images/sumeda_p/<?php echo $rowx['img']; ?>" width="80px" class="img-thumbnail"></td>


												<td><?php  echo $rowx['name']; ?></td>
												<td><?php  echo $rowx['Qty']; ?></td>
												<td>Rs. <?php  echo $rowx['price']; ?></td>
												<td><?php  echo $subt; $gtot=$gtot+$subt; ?></td>


											</tr>
										<?php 
											$sqll = "SELECT MAX(books.wrap_charges) AS wrap_charges FROM cart_details Inner Join books ON cart_details.Item_Code = books.itemcode Inner Join scat ON books.sccode = scat.sccode WHERE cart_details.inv_id='".$id."'";
											$resultl=mysqli_query($conn, $sqll);
											$rowl = mysqli_fetch_array($resultl);
												$wrap = $rowl['wrap_charges'];

												$w_price = $rowl['wrap_charges'];


											$sqld = "SELECT MAX(books.deli_charges) AS deli_charges FROM cart_details Inner Join books ON cart_details.Item_Code = books.itemcode  WHERE cart_details.inv_id='".$id."'";
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


										

										if($rowu['pay_method'] == 1) {
											$fee = ($gtot + $del_fee + $wrap_fee )*3.9/100+39;

										} else {
											$fee = 0;
										}

										$grand_total = ($gtot+$del_fee+$wrap_fee+$fee);

										
										



										?>
										<tr>
											<td colspan="4" align="right">Sub Total<br>
												Courier Charges<br>
												Pakaging Fee<br>
												Payment Processing Fee<br>
												<h4>Grand Total</h4></td>
											<td><?php echo number_format($gtot, 2); ?><br>
												<?php $ship_chg = $del_fee; echo number_format($ship_chg, 2); ?><br>
												<?php echo number_format($wrap_fee, 2); ?><br>
												<?php echo bcdiv($fee, 1, 2); ?><br>
												<h4>Rs. <?php  echo bcdiv($grand_total, 1, 2); ?></h4></td>
											</tr>
										</tbody>

									</table>
								</div>
								<!-- /.box-body -->
							</div>
							<!-- /.box -->

							<h5>Payment Method: <?php if($rowu['pay_method'] == 1) { echo 'Credit/Debit Card'; } else if($rowu['pay_method'] == 2){ echo 'Bank Transfer/Bank Deposits'; } if(($rowu['pay_method'] == 2) &&($flg == '1' || $flg == '2')){ ?> <div class="pull-right"><button class="btn btn-sm btn-primary bank_details" data-toggle="modal" data-target="#edit_data">Add Bank Details</button></div><?php } ?> </h5> 

							<?php
							$oid = '';
							$payid = '';
							$payamt = '';
							$paydt = '';
							if($rowu['pay_method'] == 1){
								$sql_inv = mysqli_query($conn, "SELECT * FROM order_verify WHERE order_id='$id'");
								if(mysqli_num_rows($sql_inv) == 0) {
									$st = 'Pending';
									$paid = '0';

									

								} else {
									$row_inv = mysqli_fetch_assoc($sql_inv);
									$paid = $row_inv['payhere_amount'];
									$oid = $row_inv['order_id'];
									$payid = $row_inv['payment_id'];
									$payamt = number_format($row_inv['payhere_amount'], 2);
									$paydt = $row_inv['date'];

									if(($row_inv['status'] == 2) && ($paid == bcdiv($grand_total, 1, 2))) {
										$st = 'Success';

									} else {
										$st = 'Invalid';
									}
								} ?>
								<h5 <?php if($st=='Invalid'){?> style="color: red; font-size: 14px;" <?php }?> >Payment Status: <?php echo $st; ?></h5>       
								<h5>Paid Amount: Rs. <?php echo number_format($paid, 2); ?></h5> 
							<?php }else if($rowu['pay_method'] == 2){ 
									$bk_det =  "SELECT bank_details.order_id, bank_details.amount, bank_details.dep_date,bank.bank FROM bank_details Inner Join bank ON bank_details.bank = bank.id WHERE bank_details.order_id='$id'";
									$sql_inv = mysqli_query($conn, $bk_det);
									if(mysqli_num_rows($sql_inv) == 0) {
										$status = "Pending";
										$ord_id = "";
										$bank = "";
										$amount = "";
										$dep_date = "";
									}else{
										$row_inv = mysqli_fetch_assoc($sql_inv);
										$status = "Success";
										$ord_id = $row_inv['order_id'];
										$bank = $row_inv['bank'];
										$amount = $row_inv['amount'];
										$dep_date = $row_inv['dep_date'];
									}

								?> 
							<h5>Bank: <?php echo $bank; ?> </h5>  
							<h5>Paid Amount: Rs. <?php echo number_format($amount, 2); ?></h5>      
							<h5>Deposit Date: Rs. <?php echo $dep_date; ?></h5>      
							<h5>Status: <?php echo $status; ?> </h5>       
							<?php } ?>     
							<!-- /.box -->          
						</div>
						<!-- /.col -->
					</div>


					 <div class="modal fade" id="edit_data" role="dialog">
					  <div class="modal-dialog">

					    <!-- Modal content-->
					    <div class="modal-content">
					      <div class="modal-header">
					        <button type="button" class="close" data-dismiss="modal">&times;</button>
					        <h4 class="modal-title" id="test_id">Add Bank Details</h4>
					      </div>
					      <div class="modal-body">

					        <form action="func/bank_fun.php" method="post">
					        <input type="hidden" name="odr_id" id="odr_id" value="<?php echo $id; ?>">
					        <input type="hidden" name="flag" id="flag" value="<?php echo $flg; ?>">

						        <div class="form-group">                 
						          <label>Bank:</label>
						          <select class="form-control" name="banks" id="banks" style="width: 100%;" autofocus="">
						          <?php 
						              $sql = "SELECT * FROM bank";
						              $result = mysqli_query($conn, $sql);
						              while($row = mysqli_fetch_array($result)){
						                ?>
						          <option value="<?php echo $row['id'];?>"><?php echo $row['bank'];?></option>
						      	<?php } ?>
						  		</select>

						        </div>

					          <div class="form-group"> 
					            <label>Amount:<font color="#FF0000"><strong>*</strong></font></label>
					            <input type="text" class="form-control" id="amount" name="amount" autocomplete="off" required onkeypress="return isNumberKey(event, this)">
					          </div>

					          <div class="form-group">
					            <label>Date of Deposit:<font color="#FF0000"><strong>*</strong></font></label>            
					            <div class="input-group date">
					              <div class="input-group-addon"> <i class="fa fa-calendar" style="padding: 0 !important;"></i> </div>
					              <input type="text" class="form-control pull-right" id="dep_date" name="dep_date" value="" autocomplete="off">
					            </div>
					          </div>

					          <!-- /.box-body -->
					          <div class="box-footer"> 
					            <button class="btn btn-danger">ADD DETAILS</button>
					          </div>
					        </form>

					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					      </div>
					    </div>

					  </div>
					</div>


					<div class="box box-widget">
						<div class="row">					                  
							<?php
		//$title=$rowu['title'];
							$nic=$rowu['fname'];
							$lname=$rowu['lname'];
							$mobi=$rowu['Mob_no'];
							$home=$rowu['Tel_no'];
							$eadd=$rowu['email'];
							$add1=$rowu['address']; 
							$town=$rowu['town']; 
							$confirmed_by=$rowu['confirmed_by'];
							$confirmed_date=$rowu['confirmed_date'];
							$packed_by=$rowu['packed_by'];
							$packed_date=$rowu['packed_date'];
							$additional_details=$rowu['additional_details'];

							?>
							<div class="col-lg-6"> 
								<?php if($flg == 1) { ?>

									<a href="func/status_confirm.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success margin" onclick="return confirm('Are you sure you want to confirm this order?');">Confirm</a>
									<a href="func/status_refund.php?id=<?php echo $id; ?>" class="btn btn-lg btn-primary margin" onclick="return confirm('Are you sure you want to refund for this order?');">Refund</a> 
									<a href="func/status_reject.php?id=<?php echo $id; ?>" class="btn btn-lg btn-danger margin" onclick="return confirm('Are you sure you want to reject this order?');">Reject</a>

								<?php } else if($flg == 2) { ?>

									<a href="func/status_delivered.php?id=<?php  echo $id; ?>" class="btn btn-lg btn-success margin" onclick="return confirm('Are you sure you want to deliver this order?');">Deliver</a>
									<a href="func/status_refund.php?id=<?php echo $id; ?>" class="btn btn-lg btn-primary margin" onclick="return confirm('Are you sure you want to refund for this order?');">Refund</a> 
									<a href="func/status_reject.php?id=<?php echo $id; ?>" class="btn btn-lg btn-danger margin" onclick="return confirm('Are you sure you want to reject this order?');">Reject</a> 

									<p>Confirmed By: <?php echo $confirmed_by; ?><br>
										Confirmed Date: <?php echo $confirmed_date; ?> </p>

								<?php } else if($flg == 3) { ?>
								<?php }else if($rowu['status'] == "Delivered"){  ?>
									<p>Packed By: <?php echo $packed_by; ?><br>
										Packed Date: <?php echo $packed_date; ?> </p>
								<?php } ?>

								<?php 
									// $oid = $row3['inv_id'];
									$stmt = mysqli_query( $conn, "SELECT order_id FROM track_order WHERE order_id='$id'" );
									$row_count = mysqli_num_rows( $stmt );
									
									if($row_count == 0) {
								?>
									<a target="_blank" href="track-order.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success margin" width="45">
									<i class="ti-plus"></i>Add Tracking</a>
								<?php }else{?>
									<a target="_blank" href="track-order.php?id=<?php echo $id; ?>" class="btn btn-lg btn-success margin" width="45">
									<i class="ti-plus"></i>EditTracking</a></td>
								<?php }?>


								<br>
								<?php if($additional_details != ''){?>
					            <div class="user-block">
					            	<span class="add_det"><a href="#">Additional Details</a></span>
					            	<span class="description"> <?php  echo $additional_details; ?></span>
					            </div>
					        <?php } ?>

						</div>

						<div class="col-lg-6">
		                  <form action="func/add_note.php?id=<?php  echo $id; ?>" method="post">
		                    <div class="form-group row">
		                      <div class="col-sm-12">
		                        <textarea id="notes" name="notes" placeholder="Add your notes here..." rows="4" cols="60"><?php echo $rowu['notes'];?></textarea>
		                      </div>
		                    </div>
		                    <div class="clearfix">
		                      <button type="submit" class="btn btn-blue"> Add Note </button>
		                    </div>
		                  </form>
		                </div>

								<div class="col-xl-6 col-lg-12">
									<!-- Box Comment -->
									<h5>&nbsp;&nbsp;Customer Details </h5>

									<div class="box-header with-border">
										<div class="user-block">

											<span class="username"><a href="#">Name</a></span>
											<span class="description"> <?php // echo $title; ?><?php  echo $nic; ?> <?php  echo $lname; ?></span>
										</div>
										<!-- /.user-block -->

										<!-- /.box-tools -->
									</div>
									<!-- /.box-header -->

									<div class="box-header with-border">
										<div class="user-block">

											<span class="username"><a href="#">Mobile</a></span>
											<span class="description"><?php  echo $mobi; ?> </span>
										</div>
										<!-- /.user-block -->

										<!-- /.box-tools -->
									</div>
									<!-- /.box-body -->
									<div class="box-header with-border">
										<div class="user-block">

											<span class="username"><a href="#">Tel</a></span>
											<span class="description">   <?php  echo $home; ?></span>
										</div>
										<!-- /.user-block -->

										<!-- /.box-tools -->
									</div>
									<!-- /.box-footer -->
									<div class="box-header with-border">
										<div class="user-block">

											<span class="username"><a href="#">E-mail</a></span>
											<span class="description"><?php  echo $eadd; ?></span>
										</div>
										<!-- /.user-block -->

										<!-- /.box-tools -->
									</div>
									<div class="box-header">
										<div class="user-block">

											<span class="username"><a href="#">Address(delivery)</a></span>
											<span class="description"><?php  echo $add1; ?> <?php  echo $town; ?></span>
										</div>
										<!-- /.user-block -->

										<!-- /.box-tools -->
									</div>
									<!-- /.box-footer -->


								</div>

								<div class="col-xl-6 col-lg-12">
									<h5>Payment Details </h5>
									<?php
										if($rowu['pay_method'] == 1){
									?>
									<table class="table table-bordered table-striped table-responsive">
										<tbody>
											<tr><td width="40%">Order No</td><td id="txt_inv"><?php echo $oid; ?></td></tr>
											<tr><td>Payment ID</td><td id="txt_pid"><?php echo $payid; ?></td></tr>
											<tr><td>Amount (Rs)</td><td id="txt_amt"><?php echo $payamt; ?></td></tr>
											<tr><td>Date</td><td id="txt_date"><?php echo $paydt; ?></td></tr>
										</tbody>
									</table>
								<?php }else{?>
									<table class="table table-bordered table-striped table-responsive">
										<tbody>
											<tr><td width="40%">Order No</td><td id="txt_inv"><?php echo $ord_id; ?></td></tr>
											<tr><td>Bank</td><td id="txt_amt"><?php echo $bank; ?></td></tr>
											<tr><td>Amount (Rs)</td><td id="txt_amt"><?php echo $amount; ?></td></tr>
											<tr><td>Date of Deposit</td><td id="txt_date"><?php echo $dep_date; ?></td></tr>
										</tbody>
									</table>
								<?php } ?>
									<br>

									<?php 
									$sql_trk = mysqli_query($conn, "SELECT * FROM track_order WHERE order_id='$id'");
									if(mysqli_num_rows($sql_trk) == 0) {
										$del = '';
										$trk_no = '';
										$title = ' - No tracking details found!!';
									} else {
										$row_trk= mysqli_fetch_assoc($sql_trk);
										$del = $row_trk['delivery_service'];
										$trk_no = $row_trk['tracking_num'];
										$title =  '';
									
									} ?>
									<h5>Tracking Details <?php echo $title; ?> </h5>
									<table class="table table-bordered table-striped table-responsive">
										<tbody>
											<tr><td width="40%">Delivery Service:</td><td id="txt_inv"><?php echo $del; ?></td></tr>
											<tr><td>Tracking Number:</td><td id="txt_pid"><?php echo $trk_no; ?></td></tr>
										</tbody>
									</table>

								</div>

								<!-- /.box -->
							</div>

						</div>
						<!-- /.row -->
					</section>
					<!-- /.content -->
				</div>
				<!-- /.content-wrapper -->

				<footer class="main-footer">
					<div class="pull-right d-none d-sm-inline-block">
					</div>Copyright &copy; 2020 <a href="cyclomax.net">Cyclomax</a>. 
				</footer>

				<!-- Control Sidebar -->

				<!-- /.control-sidebar -->

				<!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
				<div class="control-sidebar-bg"></div>
			</div>
			<!-- ./wrapper -->

			<!-- jQuery 3 -->
			<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>

			<!-- popper -->
			<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

			<!-- Bootstrap 4.0-->
			<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js"></script>

			<!-- DataTables -->
			<script src="assets/vendor_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="assets/vendor_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

			<!-- SlimScroll -->
			<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>

			<!-- FastClick -->
			<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

			<!-- minimal_admin App -->
			<script src="js/template.js"></script>

			<!-- minimal_admin for demo purposes -->
			<script src="js/demo.js"></script>

			<!-- This is data table -->
			<script src="assets/vendor_plugins/DataTables-1.10.15/media/js/jquery.dataTables.min.js"></script>

			<!-- start - This is for export functionality only -->
			<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/dataTables.buttons.min.js"></script>
			<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.flash.min.js"></script>
			<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/jszip.min.js"></script>
			<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/pdfmake.min.js"></script>
			<script src="assets/vendor_plugins/DataTables-1.10.15/ex-js/vfs_fonts.js"></script>
			<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.html5.min.js"></script>
			<script src="assets/vendor_plugins/DataTables-1.10.15/extensions/Buttons/js/buttons.print.min.js"></script>
			<!-- end - This is for export functionality only -->

			<!-- minimal_admin for Data Table -->
			<script src="js/pages/data-table.js"></script>

			<script src="js/jquery.mask.min.js"></script>

			<!-- InputMask --> 
			<script src="js/input-mask/jquery.inputmask.js"></script> 
			<script src="js/input-mask/jquery.inputmask.date.extensions.js"></script> 
			<script src="js/input-mask/jquery.inputmask.extensions.js"></script> 

			<script src="assets/daterangepicker/moment.min.js"></script> 
			<script src="assets/daterangepicker/daterangepicker.js"></script> 
			<script src="assets/date_picker/bootstrap-datepicker.js"></script>

			<script>

				$('#dep_date').daterangepicker();

				function isNumberKey(evt, obj) {
				  var charCode = (evt.which) ? evt.which : event.keyCode
				  var value = obj.value;
				  var dotcontains = value.indexOf(".") != -1;
				  if (dotcontains)
				    if (charCode == 46) return false;
				  if (charCode == 46) return true;
				  if (charCode > 31 && (charCode < 48 || charCode > 57))
				    return false;
				  return true;
				}

				  $('#dep_date').mask('YYYY-MM-DD', {'translation': {
				    Y: {pattern: /[0-9]/},
				    M: {pattern: /[0-9]/},
				    D: {pattern: /[0-9]/}
				  }
				});



				$('.bank_details').click(function(){
					var odr_id = $('#odr_id').val();
					var flag = $('#flag').val();
					 
					$.post( "func/bank_fun.php", { get_dataset: "data", odr_id : odr_id, flag:flag}, function( data ) {
					$("#banks").val(data.bank);		
					$("#amount").val(data.amount);		
					$("#dep_date").val(data.dep_date);		
					}, "json");
				});
			</script>


		</body>


		</html>
