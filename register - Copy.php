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
    background: #f7f7f7;
    padding: 30px;
    border: 1px solid #ddd;

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
	  
	  <h3> Register Form</h3>
	  <div class="row box" style="margin-bottom:20px;">
	  <div class="col-lg-4 col-md-4 col-sm-12">
	   <h4> Personal Details</h4>
        <div class="box-info">
          <div class="box-header with-border">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
            
            <!-- text input -->
				 <div class="form-group">
			 <label>Title:<font color="#FF0000"></font></label>
			 
			    <select class="form-control" placeholder="Select category" name="title" id="title" required>
                        
                 <option>Mr</option>
                  <option>Mrs</option>
                  <option>Miss</option>
                       
				</select>
			 </div>
			
            <div class="form-group">
               <label>nic </label>
                    <input type="text" class="form-control" name="nic" id="nic" autocomplete="off" required />
					<span id="val_nic" style="display:none"><font color="#F44336">Nic already exists</font></span>
            </div>
			
			 <div class="form-group">
                    <label>Address</label>
                    <input type="text" class="form-control" name="address" id="address" autocomplete="off" required />
                  </div>
			
			 <div class="form-group">
                    <label>Hometown</label>
                    <input type="text" class="form-control" name="town" id="town" autocomplete="off" required />
                  </div>
			
			 <div class="form-group">
				 <div class="row">
				
				<div class="col-md-3">
				<label for="">Date of Birth</label>
              
				</div>
				<div class="col-md-6">
<table>
<tr>
<td><input type="text" class="form-control" name="year" style="width:70px;margin-top:10px;margin-right:10px;" id="year" autocomplete="off" required >
     </td>
<td>   <select class="form-control" name="month" id="month" style="width:80px;margin-top:10px;margin-right:10px;" required >
                  <option>Jan</option>
                  <option>Feb</option>
                  <option>Mar</option>
                  <option>Apr</option>
                  <option>May</option>
                  <option>June</option>
				  <option>July</option>
                  <option>Aug</option>
                  <option>Sep</option>
				  <option>Oct</option>
                  <option>Nov</option>
                  <option>Dec</option>
                </select>
				</td>
<td>   <select class="form-control" id="date" name="date" style="width:70px;margin-top:10px;" required >
                  <option>1</option>
                  <option>2</option>
                  <option>3</option>
				  <option>4</option>
                  <option>5</option>
                  <option>6</option>
				  <option>7</option>
                  <option>8</option>
                  <option>9</option>
				  <option>10</option>
                  <option>11</option>
                  <option>12</option>
				  <option>13</option>
                  <option>14</option>
                  <option>15</option>
				  <option>16</option>
                  <option>17</option>
                  <option>18</option>
				  <option>19</option>
                  <option>20</option>
                  <option>21</option>
				  <option>22</option>
                  <option>23</option>
                  <option>24</option>
				  <option>25</option>
                  <option>26</option>
                  <option>27</option>
				  <option>28</option>
                  <option>29</option>
                  <option>30</option>
				  <option>31</option>
                 
                 
                </select> </td>

<tr>

</table>
</div>
 </div>
				</div>
				
			 <div class="form-group">
                 <label>Country</label>
                    <input type="text" class="form-control " name="country" id="country" autocomplete="off" required />
            </div>
			 <div class="form-group">
              <label>Tel no.</label>
                    <input type="number" class="form-control " name="telno" id="telno" autocomplete="off" required />
            </div>
			 <div class="form-group">
               <label>Mob no.</label>
                    <input type="number" class="form-control " name="mobno" id="mobno" autocomplete="off" required />
            </div>
	
            <!-- /.box-body -->
            
          </div>
        </div>
		</div>
		
 <div class="col-lg-4 col-md-4 col-sm-12">
 
 <h4> Account Details</h4>
 <div class="box-info">
  <div class="form-group">
                 <label>Email</label>
                    <input type="text" class="form-control" name="email" id="email" autocomplete="off" required />
            </div>
			 <div class="form-group">
             <label>Confirm mail</label>
                    <input type="text" class="form-control " name="confirm" id="confirm" autocomplete="off" required />
					<span id="val_email" style="display:none"><font color="#F44336">Email does not match</font></span>
					
            </div>
			 <div class="form-group">
              <label>Username</label>
                    <input type="text" class="form-control " name="user" id="user" autocomplete="off" required />
					<span id="val_username" style="display:none"><font color="#F44336">Username already exists</font></span>
            </div>
  <div class="form-group">
                  <label>Password</label>
                    <input type="password" class="form-control" name="password" id="password" required />
            </div>
			 <div class="form-group">
            <label>Re-type password</label>
                    <input type="password" class="form-control" name="conpass" id="conpass" required />
					<span id="val_conpass" style="display:none"><font color="#F44336">Password does not match</font></span>
            </div>
		
 
 
 </div>
 </div>		
 <div class="col-lg-4 col-md-4 col-sm-12" style="padding-left:28px;">
 
 
   <h4> * For wholesale customers</h4>
 
 <div class="box-info">
 
 <div class="row">
 
   <div class="form-group">
                <label>Business Regis no.</label>
                    <input type="text" class="form-control" name="regisno" id="regisno"/>
            </div>
			 <div class="form-group">
           <label>Name</label>
                    <input type="text" class="form-control " name="bname" id="bname"/>
					
            </div>
			 <div class="form-group">
                <label>Address</label>
                    <input type="text" class="form-control " name="badd" id="badd"/>
            </div>
			
			
	<div class="form-group">
	
	<div class="row">
	<div class="col-md-6">	 
      <label>
	  Repair center</label>
	  </div>
	  <div class="col-md-6">	
	  <input type="checkbox" value="1" id="repair" style="width:15px;height:15px;"/>
	  </div>
	  </div>
	  
		<div class="row">
		<div class="col-md-6">	 
      <label>
	 Communication</label>
	  </div>
	  <div class="col-md-6">	
	  <input type="checkbox" value="1" id="communi" style="width:15px;height:15px;"/>
	  </div>
	  </div>
	  	<div class="row">
		<div class="col-md-6">	 
      <label>
	  Phone sales outlet</label>
	  </div>
	  <div class="col-md-6">	
	  <input type="checkbox" value="1" id="sales" style="width:15px;height:15px;"/>
	  </div>
	  </div>
	    <div class="row">
	<div class="col-md-6">	 
      <label>
	  Other</label>
	  </div>
	  <div class="col-md-6">	
	  <input type="checkbox" value="1" id="other" style="width:15px;height:15px;"/>
	  </div>
	  </div>
	  
	</div>

			
			
 </div>
 
 <div class="row" style="margin-top:180px;">
 <div class="box-footer" style="margin-left: 250px;">
              <button class="btn btn-primary" name="submit" type="submit" style="padding:10px 30px 40px 30px">SUBMIT</button>
            </div>
 
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
             
			   
                $("#btn_reg").click(function(){
                
                reg_user();
				
                   
                });
		
            })
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
			    cus_exist = false;
			} else {
			    $('#val_username').fadeOut();
			    cus_exist = true;
			}
		    });
		}, "json");
	    }
		
/////////////////nic already exist validation/////////////

   $('#nic').keyup(function () {
	   
		nic_exist_fun();
		
	    });

	    var nic_exist = true;
	    function nic_exist_fun() {
		$('#val_nic').fadeOut();
		var nic = $('#nic').val();
		$.post('connection/regis_fun_cart.php', {nic_exist: 'data', nic: nic},
		function (data) {
		    $.each(data, function (index, data) {
			if (data.user_count === "1") {
			    $('#val_nic').fadeIn();
			    nic_exist = false;
			} else {
			    $('#val_nic').fadeOut();
			    nic_exist = true;
			}
		    });
		}, "json");
	    }		
		
		

$("#form_cus").on('submit', (function (e) {

        e.preventDefault();
		pass_confirm();
		email_confirm();
		cus_exist_fun();
		
	       if (pass_validate && email_validate && nic_exist && cus_exist) {
	
	
                var title = $("#title").val();
                var nic = $("#nic").val();
                var address = $("#address").val();
                var town = $("#town").val();
                var year = $("#year").val();
                var month = $("#month").val();
				var date = $("#date").val();
                var country = $("#country").val();
                var telno = $("#telno").val();
                var mobno = $("#mobno").val();
                var email = $("#email").val();
                var confirm = $("#confirm").val();
				var user = $("#user").val();
                var password = $("#password").val();
                var conpass = $("#conpass").val();
				
				var regisno = $("#regisno").val();
                var b_name = $("#bname").val();
                var badd = $("#badd").val();
				//alert(conpass);
			//alert(password);
				
if ($('#repair').is(":checked"))
{
 var repair = $("#repair").val();
 
}else
{
	var repair = 0;
}

if ($('#communi').is(":checked"))
{
 var communi = $("#communi").val();
}
else
{
	var communi= 0;
}


if ($('#sales').is(":checked"))
{
	
 var sales = $("#sales").val();

}
else
{
	var sales= 0;
}


if ($('#other').is(":checked"))
{
 var other = $("#other").val();

}
else
{	
var other= 0;	

}
//alert(other);
                $.post( "connection/regis_fun_cart.php", { user_reg: "data" , title : title , nic : nic, address : address , town : town , year : year , month : month, date : date, country : country, telno : telno, mobno : mobno, email: email, confirm : confirm, user : user, password: password, conpass : conpass, repair: repair, communi: communi, sales : sales, other: other, regisno:regisno, b_name:b_name, badd: badd }, function( data ) 
				
				{
                    
                    if (data.status === "ok") {
					
						
                 alert('You are successfully registered ');
				 window.location.href = "register.php";
				 
					  
                    }else{
                     alert("Somthing went wrong!!!", "Please try again");
                    }
                  
                }, "json");
              }
	   
	   }));
	   
	   
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
    </body>
</html>
