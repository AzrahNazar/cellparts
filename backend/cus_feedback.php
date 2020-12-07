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
	
	

    $sqlu = "SELECT * FROM user WHERE user='$log' AND val='$val'";
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

	<!-- Theme style -->
	<link rel="stylesheet" href="css/master_style.css">

	<!-- minimal_admin Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="css/skins/_all-skins.css">



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
        Customer Feedback
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="orders.php">Customer Feedback</a></li>
        
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
<div class="row">
   <div class="col-xl-3 col-md-6 col-6">
        <a href="accepted_feedback.php"> 
        	<div class="small-box bg-green">
	            <div class="inner">
	              	<h4>Accepted Feedback</h4>
	            </div>
          	</div>
        </a>
    </div>
</div>
	
      <div class="row">
        <div class="col-12">
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Customer Feedback</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped table-responsive">
                <thead>
					<tr>
					
						<th style="width: 5%;">#</th>
						<th style="width: 15%;">Date</th>
						<th style="width: 15%;">Customer Name</th>
						<th style="width: 15%;">Contact No</th>
						<th style="width: 5%;">Order id</th>
						<th style="width: 5%;">Rating</th>
						<th style="width: 50%;">Feedback</th>
						<th style="width: 5%;">Accept</th>
						<th style="width: 5%;">Reject</th>
						
					</tr>
				</thead>
				<tbody>
			    			<?php
							
$cosql3="SELECT feedback.id, feedback.order_id, feedback.rating, feedback.comment, feedback.date, feedback.flag, order_details.fname, order_details.lname, order_details.Mob_no
FROM feedback Inner Join order_details ON feedback.order_id = order_details.inv_id WHERE flag=0 GROUP BY order_details.inv_id";
	$coresult3=mysqli_query($conn, $cosql3);
	$x=0;
	while ($row3 = mysqli_fetch_array($coresult3)){ 
		$oid = $row3['order_id'];
		$x++;
	?>
		<tr><td><?php  echo $x; ?>.</td>

			<td><?php  echo $row3['date']; ?></td>
			<td><?php  echo $row3['fname'].' '.$row3['lname']; ?></td>
			<td><?php  echo $row3['order_id']; ?></td>
			<td><?php  echo $row3['Mob_no']; ?></td>
			<td><?php  echo $row3['rating']; ?> stars</td>
			<td><?php  echo $row3['comment']; ?></td>
			
			<td>
				<a href="#" class="btn btn-lg btn-success btn_accept" data-order-id="<?php echo $oid; ?>" width="45">
					<i class="ti-plus"></i>ACCEPT
				</a>
			</td>

			<td>
				<a href="#" class="btn btn-lg btn-success btn_reject" data-order-id="<?php echo $oid; ?>" width="45">
					<i class="ti-plus"></i>REJECT
				</a>
			</td>
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
      
    </div>Copyright &copy; 2019 <a href="cyclomax.net">Cyclomax</a>. 
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
	
	<script>
		$('.btn_accept').click(function(){
			var oid = $(this).attr('data-order-id');

			$.post('func/cus_feedback_fun.php', {'accept_feed': 'data', oid :oid }, function (data) {
				if(data === 'success')
				{
					alert('The feedback was successfully accepted!');
					window.location.href = "cus_feedback.php";
				}else{
					alert("There was some problem accepting the feedback. Please try again later!!");
					window.location.href = "cus_feedback.php";
				}
			});
		});

		$('.btn_reject').click(function(){
			var oid = $(this).attr('data-order-id');

			$.post('func/cus_feedback_fun.php', {'reject_feed': 'data', oid :oid }, function (data) {
				if(data === 'success'){
					alert('The feedback was successfully rejected!');
					window.location.href = "cus_feedback.php";
				}else{
					alert("There was some problem rejecting the feedback. Please try again later!!");
					window.location.href = "cus_feedback.php";
				}
			});
		});
	</script>	

</body>



</html>
