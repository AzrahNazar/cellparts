<?php
include '../db/db.php';
session_start();
$subc = "";
$title = "";
$ccode = "";
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');


$val = 'admin';
$val2 = 'user';

if (empty($log)) {

    $redirectUrl = "../login.php";
    echo "<script type=\"text/javascript\">";
    echo "window.location.href = '$redirectUrl'";
    echo "</script>";
} 
else 

{
	

    $sqlu = "SELECT * FROM user WHERE user='$log' AND (val='$val' OR val='$val2')";
    $resultu = mysqli_query($conn,$sqlu);
    $countu = mysqli_num_rows($resultu);
	
    if ($countu == 1) {
		
		$sql5 = "SELECT * FROM user WHERE user='$log'";
		$result5 = mysqli_query($conn,$sql5);
		
		while ($row5 = mysqli_fetch_array($result5)) {

		    $user = $row5['user'];
		}
		
		$subc = htmlspecialchars(trim($_GET['subc']), ENT_QUOTES, 'UTF-8');							
		$cosql3="SELECT * FROM bookinfo where sccode='$subc'";
		$coresult3=mysqli_query($conn,$cosql3);
		
		while ($row4 = mysqli_fetch_array($coresult3)){
			$title=$row4['subcat'];
			$ccode=$row4['ccode']; 
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
	<link rel="stylesheet" href="assets/vendor_components/Ionicons/css/ionicons.min.css" >		

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
		<!-- jQuery 3 -->
	<script src="assets/vendor_components/jquery/dist/jquery.min.js"></script>
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
<?php include "common/sidebar2.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      Stock Details
      </h1>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="breadcrumb-item"><a href="#">Stock Details</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

	
      <div class="row">
        <div class="col-12">
         
         <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $title;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="example1" class="table table-bordered table-striped ">
              	<input id="myInput" type="text" placeholder="Search.." style="float: right;">
              	<br><br>
                <thead>
					<tr>
						<th style="text-align: center;"></th>
						<th style="text-align: center;">Item</th>
						<th style="text-align: center;">Price</th>
						<th style="text-align: center;">Wholse Sale Price</th>
						<th style="text-align: center;">Delivery Charges</th>
						<th style="text-align: center;">Wrapping Charges</th>
						<th style="text-align: center;">New Arrival</th>
						<th style="text-align: center;">Accessories</th>
						<?php if ($ccode==54){?>
						<th style="text-align: center;"> Car Accessories</th>
					<?php } ?>
						<th style="text-align: center;">Edit</th>
						<th style="text-align: center;">Remove</th>
						
					</tr>
				</thead>
				<tbody id="myTable">
				
				    			<?php
								
	$subc = htmlspecialchars(trim($_GET['subc']), ENT_QUOTES, 'UTF-8');							
	$cosql3="SELECT * FROM books where sccode='$subc'";
	$coresult3=mysqli_query($conn,$cosql3);
	
	while ($row3 = mysqli_fetch_array($coresult3)){



	?>
					<tr>
						<td><img src="../images/sumeda_p/<?php echo $row3['imgpath'];?>" width="150px" class="img-thumbnail"></td>
						<td style="padding-top: 23px;"><?php echo $row3['book'];?> </td>
						<td style="padding-top: 23px;">Rs.<?php echo $row3['price'];?> </td>
						<td style="padding-top: 23px;">Rs.<?php echo $row3['wholesales'];?></td>
						<td style="padding-top: 23px;">Rs.<?php echo $row3['deli_charges'];?></td>
						<td style="padding-top: 23px;">Rs.<?php echo $row3['wrap_charges'];?></td>

						<!-- <td>
							<img src="img/w.png" width="20" id="img2<?php //echo $row3['itemcode'] ?>" style="display:block;">
							<img src="img/r.png" width="20" id="img1<?php //echo $row3['itemcode'] ?>" style="display:none">
						</td> -->

						<td>
							<button class="btn btn-sm btn-warning btn_add" value="<?php echo $row3['itemcode']; ?>" id="add<?php echo $row3['itemcode']; ?>"  style="display:none; color: #fff; background-color: #dd4b39;border-color: #d73925; margin-top: 12px; "><i class="fa fa-eye"></i> &nbsp;NEW ARVL &nbsp;</button>
							<button class="btn btn-sm btn-success btn_del" value="<?php echo $row3['itemcode']; ?>" id="remove<?php echo $row3['itemcode']; ?>"  style="display:none; color: #fff; background-color: #398439;border-color: #255625; margin-top: 12px; "><i class="fa fa-eye-slash"></i> &nbsp;NEW ARVL &nbsp;</button>
						</td>

						<!-- <td>
							<img src="img/w.png" width="20" id="img22<?php //echo $row3['itemcode'] ?>" style="display:block;">
							<img src="img/r.png" width="20" id="img12<?php //echo $row3['itemcode'] ?>" style="display:none">
						</td> -->

						<td>
							<button class="btn btn-sm btn-warning btn_add2" value="<?php echo $row3['itemcode']; ?>" id="add2<?php echo $row3['itemcode']; ?>"  style="display:none; color: #fff; background-color: #dd4b39;border-color: #d73925; margin-top: 12px; "><i class="fa fa-eye"></i> &nbsp;ACSRZ &nbsp;</button>
							<button class="btn btn-sm btn-success btn_del2" value="<?php echo $row3['itemcode']; ?>" id="remove2<?php echo $row3['itemcode']; ?>"  style="display:none; color: #fff; background-color: #398439; border-color:#398439; margin-top: 12px; "><i class="fa fa-eye-slash"></i> &nbsp;ACSRZ &nbsp;</button>
						</td>

						<?php if ($ccode==54){?>
						<td>
							<button class="btn btn-sm btn-warning btn_add3" value="<?php echo $row3['itemcode']; ?>" id="add3<?php echo $row3['itemcode']; ?>"  style="display:none; color: #fff; background-color: #dd4b39;border-color: #d73925; margin-top: 12px; "><i class="fa fa-eye"></i> &nbsp;CAR ACSRZ &nbsp;</button>
							<button class="btn btn-sm btn-success btn_del3" value="<?php echo $row3['itemcode']; ?>" id="remove3<?php echo $row3['itemcode']; ?>"  style="display:none; color: #fff; background-color: #398439; border-color:#398439; margin-top: 12px; "><i class="fa fa-eye-slash"></i> &nbsp;CAR ACSRZ &nbsp;</button>
						</td>
						<?php } ?>


						
						<td><a href="edit_stock.php?subc=<?php echo $subc;?>&icode=<?php echo $row3['itemcode'];?>" class="btn btn-lg btn-success  margin-top-10">
						<i class="ti-plus fa fa-pencil"></i> 
						</a></td>
						<td><a href="func/remove_stock.php?subc=<?php echo $subc;?>&icode=<?php echo $row3['itemcode'];?>" onclick="return confirm('Are you sure you want to delete this?');" class="btn btn-lg btn-success margin-top-10">
						<i class="ti-plus fa fa-trash"></i>
						</a></td>

						<script>
							<?php if($row3['new_arrival'] == 0) { ?>
								//alert("test");
								$("#remove<?php echo $row3['itemcode']; ?>").hide();
								$("#add<?php echo $row3['itemcode']; ?>").show();
							
							<?php }else { ?>
								$("#remove<?php echo $row3['itemcode']; ?>").show();
								$("#add<?php echo $row3['itemcode']; ?>").hide();
							<?php  } ?> 

							 <?php if($row3['accessories'] == 0) { ?>
								$("#remove2<?php echo $row3['itemcode']; ?>").hide();
								$("#add2<?php echo $row3['itemcode']; ?>").show();
							
							<?php } else { ?> 
								$("#remove2<?php echo $row3['itemcode']; ?>").show();
								$("#add2<?php echo $row3['itemcode']; ?>").hide();
							<?php } ?> 

							<?php if($row3['car_access'] == 0) { ?>
								//alert("test");
								$("#remove3<?php echo $row3['itemcode']; ?>").hide();
								$("#add3<?php echo $row3['itemcode']; ?>").show();
							
							<?php }else { ?>
								$("#remove3<?php echo $row3['itemcode']; ?>").show();
								$("#add3<?php echo $row3['itemcode']; ?>").hide();
							<?php  } ?> 
						</script>
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
	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> -->

<script>


$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});

/**************************************************/

$(".btn_add").click(function(){
	//var x = $(this).val();
	//alert(x);
  View_Panel($(this).val(), 1); 
});

$(".btn_del").click(function(){
  View_Panel($(this).val(), 0); 
});

function View_Panel(itm_code, flag) {
  $.post( "func/view_stock.php", { View_Panel: "data", ID : itm_code, flag : flag}, function( data ) {
	if (data.msgType === 1) {
		
		if(flag == 1) {
			//$("#img1"+itm_code).show();
			//$("#img2"+itm_code).hide();
			$("#remove"+itm_code).show();
			$("#add"+itm_code).hide();
		
		} else if(flag == 0) {
			//$("#img1"+itm_code).hide();
			//$("#img2"+itm_code).show();
			$("#remove"+itm_code).hide();
			$("#add"+itm_code).show();
		}			
		
	}
  }, "json");	
}

/**************************************************/

$(".btn_add2").click(function(){
  View_Panel2($(this).val(), 1); 
});

$(".btn_del2").click(function(){
  View_Panel2($(this).val(), 0); 
});

function View_Panel2(itm_code, flag) {
  $.post( "func/view_stock.php", { View_Panel2: "data", ID : itm_code, flag : flag}, function( data ) {
	if (data.msgType === 1) {
		
		if(flag == 1) {
			$("#remove2"+itm_code).show();
			$("#add2"+itm_code).hide();
		
		} else if(flag == 0) {
			$("#remove2"+itm_code).hide();
			$("#add2"+itm_code).show();
		}			
		
	}
  }, "json");	
}

/**************************************************/

$(".btn_add3").click(function(){
  View_Panel3($(this).val(), 1); 
});

$(".btn_del3").click(function(){
  View_Panel3($(this).val(), 0); 
});

function View_Panel3(itm_code, flag) {
  $.post( "func/view_stock.php", { View_Panel3: "data", ID : itm_code, flag : flag}, function( data ) {
	if (data.msgType === 1) {
		
		if(flag == 1) {
			$("#remove3"+itm_code).show();
			$("#add3"+itm_code).hide();
		
		} else if(flag == 0) {
			$("#remove3"+itm_code).hide();
			$("#add3"+itm_code).show();
		}			
		
	}
  }, "json");	
}

</script>

</body>


</html>
