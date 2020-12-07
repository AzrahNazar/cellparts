<?php
include '../db/db.php';
session_start();
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');




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

   $row5 = mysqli_fetch_array($result5);

   $user = $row5['user'];
   $val = $row5['val'];

   $sql="SELECT * FROM send_mail";
   $result=mysqli_query($conn,$sql);

   while($row = mysqli_fetch_array($result)){
    $eid = $row['id'];

  }

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
  <link rel="icon" href="images/favicon.ico">

  <title>CellParts.lk</title>

  <!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap.css">

  <!-- Bootstrap 4.0-->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap/dist/css/bootstrap-extend.css">

  <!-- font awesome -->
  <link rel="stylesheet" href="assets/vendor_components/font-awesome/css/font-awesome.css">

  <!-- ionicons -->
  <link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.css">

  <!-- theme style -->
  <link rel="stylesheet" href="css/master_style.css">

  <!-- minimal_admin skins. choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="css/skins/_all-skins.css">

  <!-- weather weather -->
  <link rel="stylesheet" href="assets/vendor_components/weather-icons/weather-icons.css">

  <!-- jvectormap -->
  <link rel="stylesheet" href="assets/vendor_components/jvectormap/jquery-jvectormap.css">

  <!-- date picker -->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.css">

  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">


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
          Dashboard
        </h1>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->

      <section class="content">
       <div class="row" style="margin-bottom : 10px">
         <div class="col-lg-12">
           <img src="../images/phone.jpg" width="100%" height="300px">
         </div>
       </div>
       <?php
       if($val=='admin'){
         ?>

         <div class="row">
          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="arrivals.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>New Arrivals</h4>

              </div>

            </div></a>
          </div>
          <!-- ./col -->
          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="accessories.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>Cellphone Accessories</h4>

              </div>

            </div></a>
          </div>

          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="gallery_upload.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>Gallery</h4>

              </div>

            </div></a>
          </div>

          <!-- ./col -->
          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="banner-txt.php">  <div class="small-box bg-green">
              <div class="inner">
                <h4>Add Main Banner</h4>

              </div>

            </div></a>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <div class="row">
          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="stock.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>Stock Details</h4>

              </div>
              
            </div></a>
          </div>

          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="stock_subcat.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>Stock Sub-Categories</h4>

              </div>
              
            </div></a>
          </div>

          <!-- ./col -->
          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="pass-change.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>Change Password</h4>

              </div>

            </div></a>
          </div>
          <!-- ./col -->
          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="users.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>User Accounts</h4>

              </div>

            </div>
          </a>
        </div>
      </div>

      <!-- /.row -->			
      <div class="row">

          <div class="col-xl-3 col-md-6 col-6">
            <!-- small box -->
            <a href="activate_account.php"> <div class="small-box bg-green">
              <div class="inner">
                <h4>Activate Accounts</h4>

              </div>

            </div>
          </a>
        </div>

        <div class="col-xl-3 col-md-6 col-6">
          <!-- small box -->
          <a href="add_users.php"> <div class="small-box bg-green">
            <div class="inner">
              <h4>Add User </h4>

            </div>

          </div>
        </a>
      </div>

      <!-- ./col -->
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="dollar-rate.php">  <div class="small-box bg-green">
          <div class="inner">
            <h4>Add Dollar Rate</h4>

          </div>


        </div></a>
      </div>
      <!-- ./col -->

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="add-bank.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Add Banks</h4>


          </div>


        </div></a>
      </div>
      
      <!-- ./col -->

    </div>

    <!-- /.row -->
    <div class="row">
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="orders.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Online Orders</h4>


          </div>


        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="cus_feedback.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Customer Feedback</h4>
          </div>
        </div></a>
      </div>
      <!-- ./col -->

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="change-email.php?id=<?php echo $eid; ?>"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Change E-mail</h4>
          </div>
        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="add-number.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Add Contact Number</h4>
          </div>
        </div></a>
      </div>

      <!-- ./col -->
    </div>

    <div class="row">
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="banner-bottom.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Banner bottom</h4>
          </div>
        </div></a>
      </div>
      <!-- ./col -->

      <!-- ./col -->
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="image-middle.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Middle Image</h4>
          </div>
        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="end-page-images.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Page end images</h4>

          </div>
        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="category.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Select Category</h4>

          </div>


        </div></a>
      </div>
    </div>

    <div class="row">
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="banner-top.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Banner top right</h4>
          </div>
        </div></a>
      </div>
      
        <div class="col-xl-3 col-md-6 col-6">
          <!-- small box -->
          <a href="bottom-right-img.php"> <div class="small-box bg-green">
            <div class="inner">
              <h4>Banner bottom right</h4>
            </div>
          </div></a>
        </div> 
    </div>


     <p> <u>File Transfer Credentials</u></p>
     <div class="row">
       <div class="col-md-3"><p>Host: cellparts.lk</p></div>
       <div class="col-md-5"><p>Username: cellpartsfree@cellparts.lk </p> </div>
       <div class="col-md-3"><p>Password: Cel3212@ </p> </div>
     </div>

     <hr>
     <p> <u>Live Support Credentials</u></p>
     <div class="row">
       <div class="col-md-3"><p>Email: info@cellparts.lk </p> </div>
       <div class="col-md-3"><p>Password: Cel3212@</p> </div>
     </div>
             
  <?php }else if($val=='user'){ ?>
    <div class="row">

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="gallery_upload.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Gallery</h4>

          </div>

        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="banner-txt.php">  <div class="small-box bg-green">
          <div class="inner">
            <h4>Add Main Banner</h4>

          </div>

        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="stock.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Stock Details</h4>

          </div>
          
        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="stock_subcat.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Stock Sub-Categories</h4>

          </div>
          
        </div></a>
      </div>

    </div>

    <div class="row">
      <div class="col-xl-3 col-md-6 col-6">
        <a href="pass-change.php"> 
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Change Password</h4>
            </div>
          </div>
        </a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <a href="orders.php">
          <div class="small-box bg-green">
            <div class="inner">
              <h4>Online Orders</h4>
            </div>
          </div>
        </a>
      </div> 

      <!-- ./col -->
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="banner-bottom.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Banner bottom</h4>
          </div>
        </div></a>
      </div>
      <!-- ./col -->
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="image-middle.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Image middle</h4>
          </div>
        </div></a>
      </div>

    </div>

    <div class="row">

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="end-page-images.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Page end images</h4>

          </div>
        </div></a>
      </div>
      
      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="category.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Select Category</h4>

          </div>


        </div></a>
      </div>

      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="banner-top.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Banner top right</h4>
          </div>
        </div></a>
      </div>


      <div class="col-xl-3 col-md-6 col-6">
        <!-- small box -->
        <a href="bottom-right-img.php"> <div class="small-box bg-green">
          <div class="inner">
            <h4>Banner bottom right</h4>

            
          </div>
          

        </div></a>
      </div> 
    </div>
  <?php }?>


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
<script src="assets/vendor_components/jquery/dist/jquery.js"></script>

<!-- jQuery UI 1.11.4 -->
<script src="assets/vendor_components/jquery-ui/jquery-ui.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
 $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- popper -->
<script src="assets/vendor_components/popper/dist/popper.min.js"></script>

<!-- Bootstrap 4.0-->
<script src="assets/vendor_components/bootstrap/dist/js/bootstrap.js"></script>	

<!-- ChartJS -->
<script src="assets/vendor_components/chart-js/chart.js"></script>

<!-- Sparkline -->
<script src="assets/vendor_components/jquery-sparkline/dist/jquery.sparkline.js"></script>

<!-- jvectormap -->
<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>	
<script src="assets/vendor_plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

<!-- jQuery Knob Chart -->
<script src="assets/vendor_components/jquery-knob/js/jquery.knob.js"></script>

<!-- daterangepicker -->
<script src="assets/vendor_components/moment/min/moment.min.js"></script>
<script src="assets/vendor_components/bootstrap-daterangepicker/daterangepicker.js"></script>

<!-- datepicker -->
<script src="assets/vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.js"></script>

<!-- Bootstrap WYSIHTML5 -->
<script src="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>

<!-- Slimscroll -->
<script src="assets/vendor_components/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- FastClick -->
<script src="assets/vendor_components/fastclick/lib/fastclick.js"></script>

<!-- minimal_admin App -->
<script src="js/template.js"></script>

<!-- minimal_admin dashboard demo (This is only for demo purposes) -->
<script src="js/pages/dashboard.js"></script>

<!-- minimal_admin for demo purposes -->
<script src="js/demo.js"></script>

<!-- weather for demo purposes -->
<script src="assets/vendor_plugins/weather-icons/WeatherIcon.js"></script>


</body>


</html>
