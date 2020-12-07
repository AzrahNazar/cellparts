<?php
include '../db/db.php';
session_start();
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

$val = 'admin';


if (empty($log)) {

	$redirectUrl = "../login.php";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";
} else {

	$sqlu = "SELECT * FROM user WHERE user='$log'";
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

		$sql="SELECT User_ID,order_id,status FROM cart_details  group by User_ID,order_id,status having status <>'Delivered' and status <>'Delete'";
		$result=mysqli_query($conn,$sql);


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
<style>
	.btn-block {
		display: block;
		width: 130px;
	}
</style>
</head>

<body class="hold-transition skin-blue sidebar-mini">
	<div class="wrapper">

		<?php include "common/header.php"; ?>

		<!-- Left side column. contains the logo and sidebar -->
		<?php include "common/sidebar.php"; ?>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<section class="content-header">
				<h1>
					Activate Account
				</h1>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
					<li class="breadcrumb-item"><a href="orders.php">Activate Account</a></li>

				</ol>
			</section>

			<!-- Main content -->
			<section class="content">
				<div class="row">




				</div>

				<div class="row">
					<div class="col-12">

						<div class="box">
							<div class="box-header">
								<h3 class="box-title">Activate Account</h3>
							</div>
							<!-- /.box-header -->
							<div class="box-body">
								<table id="example1" class="table table-bordered table-striped table-responsive">
									<thead>
										<tr>

											<th>#</th>
											<th>User Name</th>
											<th>First Name</th>
											<th>Last Name</th>
											<th>Telephone</th>
											<th>Mobile No</th>
											<th>Registered Date</th>
											<th>Activate Account</th>

										</tr>
									</thead>
									<tbody>
										<?php 
										 	$sql = mysqli_query($conn,"SELECT * FROM cust WHERE flag= 0 ORDER BY id ASC");
												$x = 0;
												while($row = mysqli_fetch_array($sql)) {
													$x++; ?>

												<tr>
													<td><?php  echo $x; ?></td>
													<td><?php  echo $row['usern']; ?></td>
													<td><?php  echo $row['nic']; ?></td>
													<td><?php  echo $row['lname']; ?></td>
													<td><?php  echo $row['home']; ?></td>
							            			<td><?php  echo $row['mobi']; ?></td>
													<td><?php  echo $row['date_reg']; ?></td>
													<td><button  class="btn btn-lg btn-success btn-block btn_activate" data-user="<?php echo $row['usern']; ?>" width="45"><i class="ti-plus"></i>Activate Account</button></td>
												</tr>
												<?php } ?>

								</tbody>

							</table>
						</div>
						<!-- /.box-body -->
					</div>
					<!-- /.box -->


					<!-- /.box -->          
				</div>
				<!-- /.col -->
			</div>
			<!-- /.row -->
		</section>
		<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<footer class="main-footer">
		<div class="pull-right d-none d-sm-inline-block">

		</div>Copyright &copy; 2017 <a href="cyclomax.net">Cyclomax</a>. 
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
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.min.js">
</script>

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

<script>
	$('.btn_activate').click(function(){
		var user = $(this).attr('data-user');

		$.post('func/activate_account_fun.php', {'activate_acc': 'data', user :user }, function (data) {
			if(data === 'success'){
				alert('The Account was successfully actiavted!');
				window.location.href = "activate_account.php";
			}else{
				alert("There was some problem activating the account. Please try again later!!");
				window.location.href = "activate_account.php";
			}
		});
	});

</script>


</body>


</html>
