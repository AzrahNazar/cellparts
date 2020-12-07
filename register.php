<?php include "db/db.php";
session_start();

if (isset($_SESSION['user']))
{
$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

}
if (empty($log)) {

} else {

    $sqlu = "SELECT * FROM user WHERE user='$log'";
    $resultu = mysqli_query($conn,$sqlu);
    $countu = mysqli_num_rows($resultu);
    if ($countu == 1) {

	$sql5 = "SELECT * FROM cust WHERE usern='$log'";
	$result5 = mysqli_query($conn,$sql5);
	
	while ($row5 = mysqli_fetch_array($result5)) {

	   $user = $row5['usern'];
	   $uid = $row5['id'];
	}

    }

}

$sqlm ="SELECT * FROM currency";
	$resultm =mysqli_query($conn,$sqlm);
	while ($rowm = mysqli_fetch_array($resultm)) {

	$dollar = $rowm['doller'];
		
	}
if (isset($_SESSION['file'])) {
	$file = strip_tags(trim($_SESSION['file']));

} else {
	$file = '';
}
 ?>
<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>CellParts.lk</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="icon" href="img/favicon.png" />
        <!-- Place favicon.ico in the root directory -->

        <!-- daterange picker -->
        <!-- <link rel="stylesheet" href="backend/plugins/daterangepicker_n/daterangepicker-bs3.css"> -->
				
		<!-- all css here -->
		<!-- bootstrap.min.css -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
	    <link rel="stylesheet" href="css/shortcode/header.css">
		<!-- font-awesome.min.css -->
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<!-- owl.carousel.css -->
        <link rel="stylesheet" href="css/owl.carousel.css">
		<!-- owl.carousel.css -->
        <link rel="stylesheet" href="css/meanmenu.min.css">
		<!-- shortcode/shortcodes.css -->
        <link rel="stylesheet" href="css/shortcode/shortcodes.css">
		<!-- nivo-slider.css -->
        <link rel="stylesheet" href="css/nivo-slider.css">
		<!-- style.css -->
        <link rel="stylesheet" href="style.css">
		<!-- responsive.css -->
        <link rel="stylesheet" href="css/responsive.css">
        <link rel="stylesheet" href="bootstrap-sweetalert/lib/sweet-alert.css" />

        <script src="js/vendor/modernizr-2.8.3.min.js"></script>
		<script src="js/vendor/jquery-2.1.4.min.js"></script>

		
<style>
	p
	{
	font-size:14px;	
		
	}
	.form-selector {
    padding-bottom: 14px;
	
}
.box {
    background: #fff;
    padding: 30px;
    border: 1px solid #ddd;
}
label {
    font-size: 13.5px;
}

</style>	

</head>
    <body>
  
        <!-- Add your site or application content here -->
        <!-- header -->
					<?php include "common/header.php";?> 																						<!-- header -->
		<!-- mainmenu-area-start -->
		<div class="mainmenu-area bg-color-2 hidden-xs hidden-sm" id="myHeader">
			<div class="container">
				<div class="row">
					<!--<div class="col-lg-3 col-md-3">
		<?php //include "common/categorybar.php" ?>
					</div>-->
					
															<div class="col-lg-3 col-md-3 cat_dis" style="display:none;">
							<div class="product-menu-title " style="background-image: url('img/navlogo.jpg');height:54px;">
								<!--<h2>All categories <i class="fa fa-arrow-circle-down"></i></h2>-->
							</div>
		</div>
					<div class="col-lg-9 col-md-9">
						<?php include "common/navbar.php" ?>
					</div>
				</div>
			</div>
		</div>
		<!-- mobile-menu-start -->
<?php include "common/mobilemenu.php"; ?>
		<!-- mobile-menu-end -->		
		<!-- mainmenu-area-end -->
		<!-- slider-area-start -->
		
		
			<div class="container">
			
	 <form id="form_cus" action="javascript:void(0);">
	  

	  <div class="row">
	  <div class="col-lg-3 col-md-3 hidden-sm hidden-xs"></div>
	  <div class="col-lg-6 col-md-12 col-sm-12">	   
        <div class="box" style="margin-top:40px;margin-bottom:40px;">
          <div class="box-header with-border">
            <h4 class="box-title">CREATE NEW ACCOUNT</h4><hr>
          </div>
          <div class="box-body">
            
            <!-- text input -->
			<div class="form-group">
				<div class="row">
					<div class="col-md-12"> 
						<label>Title:<font color="#FF0000"></font></label>
						<select class="form-control" placeholder="Select category" name="title" id="title" required>
							<option value="">Select a Title</option>
			                <option value="Mr.">Mr.</option>
			                <option value="Ms.">Ms.</option>
			                <option value="Dr.">Dr.</option>
			                <option value="Prof.">Prof.</option>
			                <option value="Rev.">Rev.</option>
			                <option value="Miss.">Miss.</option>
						</select>
					</div>
				</div>
			</div>
			
            <div class="form-group">
				<div class="row">
					<div class="col-md-6">
						<label>First Name<font color="#FF0000"><strong>*</strong></font></label>
						<input type="text" class="form-control" name="fname" id="fname" autocomplete="off" required />
					</div>
					<div class="col-md-6">
						<label>Last Name <font color="#FF0000"><strong>*</strong></font></label>
		            	<input type="text" class="form-control" name="lname" id="lname" autocomplete="off" required />
					</div>	
						
				</div>	
            </div>

            <div class="form-group">
            	<div class="row">
					<div class="col-md-6">
						<label>Email <font color="#FF0000"><strong>*</strong></font></label>
						<input type="text" class="form-control" name="email" id="email" autocomplete="off" required />
					</div>

					<div class="col-md-6">
						<label>Confirm Email <font color="#FF0000"><strong>*</strong></font></label>
						<input type="text" class="form-control " name="confirm" id="confirm" autocomplete="off" required />
						<span id="val_email" style="display:none"><font color="#F44336">Email does not match</font></span>
					</div>
				</div>
            </div>

            <div class="form-group">
            	<div class="row">
					<div class="col-md-12">
						<label>Tel no. <font color="#FF0000"><strong>*</strong></font></label>
						<input type="number" class="form-control " name="telno" id="telno" autocomplete="off" required />
						<span id="val_telno" style="display:none"><font color="#F44336">Telephone Number already exists</font></span>
					</div>
				</div>

            </div>
			
			
			
			<div class="form-group">
				<label>Address <font color="#FF0000"><strong>*</strong></font></label>
				<textarea type="text" class="form-control" name="address" id="address" autocomplete="off" required ></textarea>
			</div>

			<div class="form-group">
				<label>Username<font color="#FF0000"><strong>*</strong></font></label>
				<input type="text" class="form-control " name="user" id="user" autocomplete="off" required />
				<span id="val_username" style="display:none"><font color="#F44336">Username already exists</font></span>
            </div>

  			<div class="form-group">
  				<div class="row">
					<div class="col-md-6">
						<label>Password<font color="#FF0000"><strong>*</strong></font></label>
						<input type="password" class="form-control" name="password" id="password" required />
					</div>
					<div class="col-md-6">
						<label>Re-type password <font color="#FF0000"><strong>*</strong></font></label>
						<input type="password" class="form-control" name="conpass" id="conpass" required />
						<span id="val_conpass" style="display:none"><font color="#F44336">Password does not match</font></span>
					</div>
				</div>
            </div>


			
            
          </div>
		  <hr>

			<div class="box-footer">
				<button class="btn btn-primary" id="btn_register" name="submit" type="submit">CREATE ACCOUNT</button>
			</div>
	  
		  
        </div>





		</div>
		

			
		
		</div>

      </form>
				
				
			</div>
		
		<!-- slider-area-end -->
	
		
		<!-- newletter-area-end -->
		<?php include "common/footer.php"; ?>
		<!-- copyright-area-start -->
   
		<!-- copyright-area-end -->
		
		<!-- all js here -->
		<!-- jquery-1.12.0 -->
       <script>
      	$(document).ready(function () {
             
		   	$('#b_day').daterangepicker('1990-01-01');
		    $("#btn_reg").click(function(){
		    
		    reg_user();
			
		       
		    });

		});
////////////////////password validation/////////////			
			
$('#conpass').keyup(function () {

pass_confirm();
	
    });
    
     var pass_validate = true;
        function pass_confirm() {

            var pass1 = $("#password").val();
            var pass2 = $("#conpass").val();
            var len = $("#conpass").val().length;
            if (len !== 0) {
                if (pass1 === pass2) {
                    $("#val_conpass").fadeOut();
                    pass_validate = true;
                } else {
                    $("#val_conpass").fadeIn();
                    pass_validate = false;
                }
            } else {
                $("#val_conpass").fadeOut();
                pass_validate = false;

            }

        }
//////////////////email validation///////////////////////////////

$('#confirm').keyup(function () {

email_confirm();
		
    });
	
     var email_validate = true;
        function email_confirm() {

            var email1 = $("#email").val();
            var email2 = $("#confirm").val();
            var len = $("#confirm").val().length;
            if (len !== 0) {
                if (email1 === email2) {
                    $("#val_email").fadeOut();
                    pass_validate = true;
                } else {
                    $("#val_email").fadeIn();
                    pass_validate = false;
                }
            } else {
                $("#val_email").fadeOut();
                pass_validate = false;

            }

        }

/////////////////username already exist validation/////////////

$('#user').keyup(function () {

	cus_exist_fun();

});

var cus_exist = true;
function cus_exist_fun() {
	$('#val_username').fadeOut();
	var uname = $('#user').val();
	$.post('connection/regis_fun_cart.php', {cus_exist: 'data', uname: uname},
		function (data) {
			$.each(data, function (index, data) {
				if (data.user_count === "1") {
					$('#val_username').fadeIn();
					$('#btn_register').prop('disabled', true);
					cus_exist = false;
				} else {
					$('#val_username').fadeOut();
					$('#btn_register').prop('disabled', false);
					cus_exist = true;
				}
			});
		}, "json");
}


/////////////////Contact No already exist validation/////////////

$('#telno').keyup(function () {
	
	contact_exist_fun();
	
});

var contact_exist = true;
function contact_exist_fun() {
	$('#val_telno').fadeOut();
	var tp = $('#telno').val();
	$.post('connection/regis_fun_cart.php', {tp_exist: 'data', tp: tp},
		function (data) {
			$.each(data, function (index, data) {
				if (data.contact >= "1") {
					$('#val_telno').fadeIn();
					$('#btn_register').prop('disabled', true);
					contact_exist = false;
				} else {
					$('#val_telno').fadeOut();
					$('#btn_register').prop('disabled', false);
					contact_exist = true;
				}
			});
		}, "json");
}		

		

$("#form_cus").on('submit', (function (e) {

        e.preventDefault();
		pass_confirm();
		email_confirm();
		cus_exist_fun();
		contact_exist_fun();
		
	       if (pass_validate && email_validate && cus_exist && contact_exist) {
	

                var title = $("#title").val();
                var fname = $("#fname").val();
				var lname = $("#lname").val();
				var email = $("#email").val();
				var confirm = $("#confirm").val();
				var telno = $("#telno").val();
				var address = $("#address").val();
				var user = $("#user").val();
				var password = $("#password").val();
				var conpass = $("#conpass").val();



				var date = '';
				var zip = '';
                var town = '';
				var district = '';
                var year = '';
                var month = '';
                var country = '';
                var mobno = '';
				var regisno = '';
                var b_name = '';
                var badd = '';
                var repair = 0;
                var communi= 0;
                var sales= 0;
                var other= 0;

                $.post( "connection/regis_fun_cart.php", { user_reg: "data" , title : title , fname : fname, lname : lname, address : address , town : town , year : year , month : month, date : date, country : country, telno : telno, mobno : mobno, email: email, confirm : confirm, user : user, password: password, conpass : conpass, repair: repair, communi: communi, sales : sales, other: other, regisno:regisno, b_name:b_name, badd: badd, zip:zip, district:district }, function( data ) 
				
				{
                    
                    if (data.status === "ok") {
					
						var v_code = data.vcode;
						var telno = data.tp;
						send_sms_fun(telno, v_code);		
					 	<?php if(empty($file)) { ?>

					 		setTimeout(function(){ 
					 			window.location.href = "activation-sumedacellular-kurunegala-srilanka.php"; 
					 		}, 3000);

						
						
						<?php } else { ?>
							window.location.href = '<?php echo $file; ?>';
						<?php } ?>
					
                    }else if(data.status === 'exist') {
						$('#val_username').fadeIn();
						$('#btn_register').prop('disabled', true);
						cus_exist = false;

                    }else if(data.status === 'exist2') {
						$('#val_telno').fadeIn();
						$('#btn_register').prop('disabled', true);
						contact_exist = false;

                    }else{

                     	alert("Somthing went wrong!!!", "Please try again");

                    }
                  
                }, "json");
              }
	   
	   }));
	   
	   
// function send_sms_fun(mobile_no, v_code) { 
// 	var msg = "Successfully Registered on CellParts.lk. Thank You! Verify code"+v_code;
// 	var res = mobile_no.substring(1);
// 	var tel = '94'+res;
	
// 	$.ajax({
// 		type: "POST",
// 		async: false,
// 		dataType: 'jsonp',
// 		url: "https://sms.textware.lk:5001/sms/send_sms.php",
// 		data: {'username': 'sumecel',
// 		'password': 'sum12cel',
// 		'src': 'SUMEDA CELL',
// 		'dst': tel,
// 		'msg': msg,    
// 		'dr': '1',
// 		},
// 		success: function (response) {
// 			//alert(response);
// 		}
// 	});
// }


function send_sms_fun(mobile_no, v_code) { 
	 $.post( "connection/regis_fun_cart.php", { sms_verify_code: "data", mobile_no:mobile_no, v_code:v_code }, function( data ) {
	  $("#pre_loader").fadeOut("slow");
	    if($.trim(data) == '') {
	      swal("Oops...", "Something went wrong!", "warning");
	    } else {
	      if($.trim(data) === 'error')
	      {
	        swal("SQL Error!", "Please Try Again!", "warning");
	      }
	      if(data.status == "1602"){
	        swal({
	          title: "",
	          text: "Error occurred while SMS save into database!",
	          type: "warning",
	          timer: 2000,
	          showConfirmButton: false,
	        });
	      }else if(data.status == '1601'){
	        swal("Successfully Registered", "Thank You for registering with CellParts.lk!", "success");
	        setTimeout(
	        function() 
	        {window.location.href = "sms_supplier.php?menu="+menu;
	      }, 2000);

	      }else if(data.status == '1603'){
	        swal("Oops...", "Please recharge your account!", "warning");

	      }else if(data.status == '1604'){
	        swal("Oops...", "Invalid Phone number!", "warning");

	      }else{
	        swal("Oops...", "Error occurred while sending SMS!", "warning");

	      }
	    }  
	}, "json");

}	   
	   
	   
	   </script>
		<!-- bootstrap.min.js -->
        <script src="js/bootstrap.min.js"></script>
		<!-- nivo.slider.js -->
        <script src="js/jquery.nivo.slider.pack.js"></script>
		<!-- jquery-ui.min.js -->
        <script src="js/jquery-ui.min.js"></script>
		<!-- jquery.magnific-popup.min.js -->
        <script src="js/jquery.magnific-popup.min.js"></script>
		<!-- jquery.meanmenu.min.js -->
        <script src="js/jquery.meanmenu.js"></script>
		<!-- jquery.scrollup.min.js-->
        <script src="js/jquery.scrollup.min.js"></script>
		<!-- owl.carousel.min.js -->
        <script src="js/owl.carousel.min.js"></script>		
		<!-- plugins.js -->
        <script src="js/plugins.js"></script>
		<!-- main.js -->
        <script src="js/main.js"></script>

        <script src="bootstrap-sweetalert/lib/sweet-alert.min.js"></script> 

    </body>
</html>
