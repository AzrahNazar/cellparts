<?php

/*session_start();
include '../db/db.php';
$gtot=0;
$id=$_GET['id'];
$uid=$_GET['uid'];


$order_user="";
  $log=$_SESSION['login'];
 if (empty($id)) {
     
	 $redirectUrl = "index.php";
echo "<script type=\"text/javascript\">";
        echo "window.location.href = '$redirectUrl'";
        echo "</script>";
	 
  }*/

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
       Order details
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
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">New Arrivals</h3>
            </div>
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
								  

				
$sqlx="SELECT * FROM cart_details where order_id='".$id."' and User_ID='$uid'";
	
$resultx=mysqli_query($conn,$sqlx);
   			
		 while ($rowx = mysqli_fetch_array($resultx)){
		  $subt=($rowx['price'])*($rowx['Qty']);
		  
			$order_user=$uid;
			
	
 ?>
					<tr>
					
						<td><img src="../images/sumeda_p/<?php echo $rowx['img']; ?>" width="150px" class="img-thumbnail"></td>
						<td><?php  echo $rowx['name']; ?></td>
						<td><?php  echo $rowx['Qty']; ?></td>
						<td>Rs. <?php  echo $rowx['price']; ?></td>
						<td><?php  echo $subt; $gtot=$gtot+$subt; ?></td>
					
						
					</tr>
		 <?php } ?>
				<tr>
				<td colspan="4">Total</td><td>Rs.  <?php  echo $gtot; ?></td>
				
				</tr>
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
	  <div class="row">
	 
		<div class="box box-widget">
						                  
		<?php 
								  
$order_user=$uid;
				
$sqlu="SELECT * FROM cust where id='".$order_user."'";
	
$resultx=mysqli_query($conn,$sqlu);
   			
		 while ($rowx = mysqli_fetch_array($resultx)){ 
		 
		$title=$rowx['title'];

		  $nic=$rowx['nic'];

		   $mobi=$rowx['mobi'];

		   $home=$rowx['home'];

		  $eadd=$rowx['eadd'];

		  $add1=$rowx['add1']; 
	

		 } ?>

		  <div class="col-xl-6 col-lg-12">
          <!-- Box Comment -->
		                
	
            <div class="box-header with-border">
              <div class="user-block">
                
                <span class="username"><a href="#">Name</a></span>
                <span class="description"> <?php  echo $title; ?>&nbsp;&nbsp;<?php  echo $nic; ?></span>
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
			<div class="box-header with-border">
              <div class="user-block">
                
                <span class="username"><a href="#">Address(delivery)</a></span>
                <span class="description"><?php  echo $add1; ?></span>
              </div>
              <!-- /.user-block -->
             
              <!-- /.box-tools -->
            </div>
            <!-- /.box-footer -->
		
			
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
