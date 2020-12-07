

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
	<!--<link rel="stylesheet" href="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">-->
	

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
<style>
.btn-info {
    background-color: #ec9924;
    border-color: #ec9924;
}

</style>
   
  </head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../index" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <!--<span class="logo-mini"><img src="../../images/minimal.png" alt=""></span>-->
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>CellParts.lk</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
		  <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            </a>
            <!--<ul class="dropdown-menu scale-up">
               User image -->
             <!-- <li class="user-header">
                <img src="images/user.png" class="float-left rounded-circle" alt="User Image">

             
              </li>
              Menu Body -->
           
              <!-- Menu Footer-->
            
           <!-- </ul>-->
         <!-- </li>-->
          <!-- Messages: style can be found in dropdown.less-->

          <!-- Notifications: style can be found in dropdown.less -->

          <!-- Tasks: style can be found in dropdown.less -->

		  
          <!-- Control Sidebar Toggle Button -->
          <li>
           
			
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
  <!-- Left side column. contains the logo and sidebar -->
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
       
          <img src="images/logo.jpg" width="230" alt="">
        
     
		  <!-- search form -->
      
      <!-- /.search form -->
      </div> 
   </section>
    <!-- /.sidebar -->
  
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Sign In
      </h1>
     
    </section>

    <!-- Main content -->
  
		<section class="content">
       <form class="form-horizontal form-element" id="login-form" method="post">
              <div class="box-body">
                <div id="errorDiv"></div>
                <div class="form-group row">
                  <label class="col-sm-2 control-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="user" autofocus placeholder="Username" 
					autocomplete="off">
                    <span class="help-block" id="error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <label class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <span class="help-block" id="error"></span>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="ml-auto col-sm-10">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <br><button type="submit" id="btn-login" class="btn btn-info pull-right">Sign in</button>
              </div>
              <!-- /.box-footer -->
            </form>
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

<script src="js/jquery-2.1.4.min.js"></script> 
<script src="assets/vendor_components/jquery/dist/jquery.js"></script>
  	<script>

// JavaScript Validation For Registration Page
$('document').ready(function()
{

//////////////////////////////////////////////////////////////////////////////////////
   
 $("#login-form").validate({
			
  rules:
  {	
		password: {
			required: true
		},
		user: {
			required: true
		}
   },
   messages:
   {
		
		password: {
			required: "Password is Required.",
		},
		user: {
			required: "Username is Required.",
		}
   },
   errorPlacement : function(error, element) {
	  $(element).closest('.form-group').find('.help-block').html(error.html());
   },
   highlight : function(element) {
	  $(element).closest('.form-group').removeClass('has-success').addClass('has-error');
   },
   unhighlight: function(element, errorClass, validClass) {
	  $(element).closest('.form-group').removeClass('has-error');
	  $(element).closest('.form-group').find('.help-block').html('');
   },
		submitHandler: loginForm
   }); 

   
   ///////////////////////////////////////
   
  function loginForm(){
		 
	   $.ajax({
			  url: 'login_fun.php',
			  type: 'POST',
			  data: $('#login-form').serialize(),
			  dataType: 'json'
		 })
		 .done(function(data){
			  
			  $('#btn-login').html('LOGIN').prop('disabled', true);
			  $('input[type=text],input[type=password]').prop('disabled', true);
			  
			  setTimeout(function(){
							 
				  if ( data.status==='ok' ) {
			  
				  setTimeout('window.location.href = "index.php"; ',3);
					  
								 
				  } else {
								 
					  $('#errorDiv').slideDown('fast', function(){
						  $('#errorDiv').html('<div class="alert alert-danger">'+data.message+'</div>');
						  //$("#login-form").trigger('reset');
						  $('input[type=text],input[type=password]').prop('disabled', false);
						  $('#btn-login').html('Sign in').prop('disabled', false);
					  }).delay(3000).slideUp('fast');
				  }
							
			  },1000);
			  
		 })
		 .fail(function(){
			  //$("#login-form").trigger('reset');
			  alert('An unknown error occoured, Please try again Later...');
		 });
  }
});
</script> 
<script src="assets/jquery.validate.min.js"></script>
	 
	  
	<!-- jQuery 3 -->
	
	
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
	<!--<script src="assets/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js"></script>-->
	
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
