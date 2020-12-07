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
   $sql="SELECT * FROM send_mail";
   $result=mysqli_query($conn,$sql);

   while($row = mysqli_fetch_array($result)){
    $eid=$row['id'];

  }
  $subc = htmlspecialchars(trim($_GET['subc']), ENT_QUOTES, 'UTF-8');




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
         Edit Delivery Method
       </h1>
       <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="stock.php">Sub Category Details</a></li>
        <li class="breadcrumb-item"><a href="#">Edit Delivery Method</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
       <div class="col-xl-6 connectedSortable">
        <!-- quick email widget -->
        <div class="box box-info">
          <div class="box-header">


            <h3 class="box-title">Edit Delivery Method</h3>
            <!-- tools box -->

            <!-- /. tools -->
          </div>
          <div class="box-body">
            <form action="func/edit_subcat_fun.php?subc=<?php echo $subc;?>" method="post">

              <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Delivery Method</label>
                <div class="col-sm-10">
                  <select class="form-control " name="deli_method" id="deli_method" style="width: 100%;">
                    <option value="1">Courier Service</option>
                    <option value="2">Register Post (Very Small Item)</option>
                  </select>
                </div>
              </div>

              <div class="box-footer clearfix">
                <button type="submit" class="pull-right btn btn-blue" id="save"> Edit</button>
              </div>
            </form>
          </div>

        </div>
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
<aside class="control-sidebar control-sidebar-dark">
  <!-- Create the tabs -->
  <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
    <li class="nav-item"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
    <li class="nav-item"><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-cog fa-spin"></i></a></li>
  </ul>
  <!-- Tab panes -->
  <div class="tab-content">
    <!-- Home tab content -->
    <div class="tab-pane" id="control-sidebar-home-tab">
      <h3 class="control-sidebar-heading">Recent Activity</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Admin Birthday</h4>

              <p>Will be July 24th</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-user bg-yellow"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Jhone Updated His Profile</h4>

              <p>New Email : jhone_doe@demo.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Disha Joined Mailing List</h4>

              <p>disha@demo.com</p>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <i class="menu-icon fa fa-file-code-o bg-green"></i>

            <div class="menu-info">
              <h4 class="control-sidebar-subheading">Code Change</h4>

              <p>Execution time 15 Days</p>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

      <h3 class="control-sidebar-heading">Tasks Progress</h3>
      <ul class="control-sidebar-menu">
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Web Design
              <span class="label label-danger pull-right">40%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-danger" style="width: 40%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Update Data
              <span class="label label-success pull-right">75%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-success" style="width: 75%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Order Process
              <span class="label label-warning pull-right">89%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-warning" style="width: 89%"></div>
            </div>
          </a>
        </li>
        <li>
          <a href="javascript:void(0)">
            <h4 class="control-sidebar-subheading">
              Development 
              <span class="label label-primary pull-right">72%</span>
            </h4>

            <div class="progress progress-xxs">
              <div class="progress-bar progress-bar-primary" style="width: 72%"></div>
            </div>
          </a>
        </li>
      </ul>
      <!-- /.control-sidebar-menu -->

    </div>
    <!-- /.tab-pane -->
    <!-- Stats tab content -->

    <!-- /.tab-pane -->
  </div>
</aside>
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
  <?php
  if (isset($_GET['subc'])) {
    $scat = $_GET['subc']; 
    $sql2="SELECT deli_method FROM scat WHERE sccode='$scat'";
    $result2=mysqli_query($conn,$sql2);

    $row = mysqli_fetch_array($result2);
     $deli_method=$row['deli_method']?>
    $("#deli_method").val('<?php echo $deli_method; ?>')
  <?php  }
  ?>
</script>


</body>


</html>
