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



  }
  else 
  {
    $redirectUrl = "../login.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
  }
}

$uid = htmlspecialchars(strip_tags(trim($_GET['id'])), ENT_QUOTES, 'UTF-8');

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
          Customer Orders
        </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="breadcrumb-item"><a href="orders.php">Customer Orders</a></li>

        </ol>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
         <div class="col-xl-4 col-md-6 col-6">
          <!-- small box -->
          <a href="view-user-order.php?id=<?php echo $uid.'&pg=1'?>"> 
            <div class="small-box bg-green">
              <div class="inner">
                <h4>Pending Orders</h4>

              </div>
            </div>
          </a>
        </div>
        <div class="col-xl-4 col-md-6 col-6">
          <!-- small box -->
          <a href="view-user-order.php?id=<?php echo $uid.'&pg=2'?>"><div class="small-box bg-green">
            <div class="inner">
              <h4>Accepted Orders</h4>
            </div>
          </div></a>
        </div>
        <div class="col-xl-4 col-md-6 col-6">
          <!-- small box -->
          <a href="view-user-order.php?id=<?php echo $uid.'&pg=3'?>">
            <div class="small-box bg-green">
              <div class="inner">
                <h4>Order History</h4>
              </div>
            </div>
          </a>
        </div>



      </div>

      <div class="row">
        <div class="col-12">

      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo $title; ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped table-responsive">
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
                    $st = '<span class="label label-success">Success</span>';
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


                <td align="center"><a target="_blank" href="view-order.php?id=<?php echo $oid; ?>" class="btn btn-primary btn-sm">View</a></td>
              </tr>
              <?php  } ?>
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


</body>


</html>
