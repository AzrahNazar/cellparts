<?php
session_start();
include '../db/db.php';

if(isset($_SESSION['user'])) {
	$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');	

} else {
	$log = '';
}

if(empty($log)) {
	$redirectUrl = "../login";
	echo "<script type=\"text/javascript\">";
	echo "window.location.href = '$redirectUrl'";
	echo "</script>";

} else {
	$sqlu = "SELECT * FROM cust WHERE usern='$log'";
	$resultu = mysqli_query($conn, $sqlu);
	$countu = mysqli_num_rows($resultu);
	
	if($countu == 1) {	
		$row = mysqli_fetch_array($resultu);
		$name = $row['nic'];
		$uid = $row['id'];

	} else {
		$redirectUrl = "../destroy.php";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
<title>CellParts.lk</title>
<link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" media=all rel=stylesheet />
<link href="stylesheets/bootstrap.min.css" media=all rel=stylesheet />
<link href="stylesheets/font-awesome.min.css" media=all rel=stylesheet />
<link href="stylesheets/hightop-font.css" media=all rel=stylesheet />
<link href="stylesheets/isotope.css" media=all rel=stylesheet />
<link href="stylesheets/jquery.fancybox.css" media=all rel=stylesheet />
<link href="stylesheets/fullcalendar.css" media=all rel=stylesheet />
<link href="stylesheets/wizard.css" media=all rel=stylesheet />
<link href="stylesheets/select2.css" media=all rel=stylesheet />
<link href="stylesheets/morris.css" media=all rel=stylesheet />
<link href="stylesheets/datatables.css" media=all rel=stylesheet />
<link href="stylesheets/datepicker.css" media=all rel=stylesheet />
<link href="stylesheets/timepicker.css" media=all rel=stylesheet />
<link href="stylesheets/colorpicker.css" media=all rel=stylesheet />
<link href="stylesheets/bootstrap-switch.css" media=all rel=stylesheet />
<link href="stylesheets/bootstrap-editable.css" media=all rel=stylesheet />
<link href="stylesheets/daterange-picker.css" media=all rel=stylesheet />
<link href="stylesheets/typeahead.css" media=all rel=stylesheet />
<link href="stylesheets/summernote.css" media=all rel=stylesheet />
<link href="stylesheets/ladda-themeless.min.css" media=all rel=stylesheet />
<link href="stylesheets/social-buttons.css" media=all rel=stylesheet />
<link href="stylesheets/jquery.fileupload-ui.css" media=screen rel=stylesheet />
<link href="stylesheets/dropzone.css" media=screen rel=stylesheet />
<link href="stylesheets/nestable.css" media=screen rel=stylesheet />
<link href="stylesheets/pygments.css" media=all rel=stylesheet />
<link href="stylesheets/style.css" media=all rel=stylesheet />
<link href="stylesheets/color/green.css" media=all rel="alternate stylesheet" title=green-theme />
<link href="stylesheets/color/orange.css" media=all rel="alternate stylesheet" title=orange-theme />
<link href="stylesheets/color/magenta.css" media=all rel="alternate stylesheet" title=magenta-theme />
<link href="stylesheets/color/gray.css" media=all rel="alternate stylesheet" title=gray-theme />
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name=viewport>
<link rel="icon" href="../img/favicon.png" />

<style>
	.widget-container .heading{
	  background: #666666;
	}
</style>
</head>

<body class="page-header-fixed bg-1">
<div class=modal-shiftfix>
<?php include "common/header.php"; ?>
  <div class="container-fluid main-content"> 
    <div class=row>
      <div class=col-md-12>
        <div class=widget-container>
          <div class=heading> Edit Account Details </div>
          <div class="widget-content padded">
            <form action="javascript:void(0);" id=validate-form method=post>
              <fieldset>
                <div class=row>
                  <div class=col-md-6>
                    <div class=form-group>
                      <label for=firstname>Title</label>
					  <select class="form-control" placeholder="Select category" name="title" id="title" required>
						<option value="">Select a Title</option>
						<option value="Mr." <?php if ($row['title'] == 'Mr.') { echo 'selected'; } ?> >Mr.</option>
						<option value="Ms." <?php if ($row['title'] == 'Ms.') { echo 'selected'; } ?> >Ms.</option>
						<option value="Dr." <?php if ($row['title'] == 'Dr.') { echo 'selected'; } ?> >Dr.</option>
						<option value="Prof." <?php if ($row['title'] == 'Prof.') { echo 'selected'; } ?> >Prof.</option>
						<option value="Rev." <?php if ($row['title'] == 'Rev.') { echo 'selected'; } ?> >Rev.</option>
						<option value="Miss." <?php if ($row['title'] == 'Miss.') { echo 'selected'; } ?> >Miss.</option>
					  </select>
                    </div>
					<div class=form-group>
                      <label for=firstname>First Name</label>
                      <input class=form-control id=firstname name=firstname autocomplete="off" value="<?php echo $row['nic'] ?>">
                    </div>
                    <div class=form-group>
                      <label for=lastname>Last Name</label>
                      <input class=form-control id=lastname name=lastname autocomplete="off" value="<?php echo $row['lname'] ?>">
                    </div>
                    <div class=form-group>
                      <label>Contact No (Mobile)</label>
                      <input class=form-control id=tel_no name=tel_no required autocomplete="off" value="<?php echo $row['mobi'] ?>">
                    </div>
					<div class=form-group>
                      <label>Contact No (Home)</label>
                      <input class=form-control id=home_no name=home_no autocomplete="off" value="<?php echo $row['home'] ?>">
                    </div>
                  </div>
                  <div class=col-md-6>
                    <div class=form-group>
                      <label for=email>Email</label>
                      <input class=form-control type=email id=email name=email autocomplete="off" value="<?php echo $row['eadd'] ?>" required>
                    </div>
                    <div class=form-group>
                      <label>Address</label>
                      <input class=form-control id=address name=address type=text required autocomplete="off" value="<?php echo $row['add1'] ?>">
                    </div>
					<div class=form-group>
                      <label>City</label>
                      <input class=form-control id=city name=city type=text required autocomplete="off" value="<?php echo $row['town'] ?>">
                    </div>
                  </div>
                </div>
				<div id="errorDiv"></div>
                <input class="btn btn-primary" type=submit name="update_btn" value="UPDATE">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
	
	<div class=row>
      <div class=col-md-12>
        <div class=widget-container>
          <div class=heading> Change Password </div>
          <div class="widget-content padded">
            <form action="javascript:void(0);" id=rec_pw_form method=post>
              <fieldset>
                <div class=row>
                  <div class=col-md-6>
                    <div class=form-group>
                      <label for=password>New Password</label>
                      <input class=form-control id=password name=password type=password>
                    </div>
                    <div class=form-group>
                      <label for=c_pw>Confirm Password</label>
                      <input class=form-control id=c_pw name=c_pw type=password>
                    </div>					
                  </div>
                </div>
				<div id="errorDiv3"></div>
                <input class="btn btn-danger" type=submit name="update_pw" value="Change Password">
              </fieldset>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script src="javascripts/jquery-1.10.2.min.js"></script> 
<script src="javascripts/jquery-ui.js"></script> 
<script src="javascripts/bootstrap.min.js"></script> 
<script src="javascripts/raphael.min.js"></script> 
<script src="javascripts/selectivizr-min.js"></script> 
<script src="javascripts/jquery.mousewheel.js"></script> 
<script src="javascripts/jquery.vmap.min.js"></script> 
<script src="javascripts/jquery.vmap.sampledata.js"></script> 
<script src="javascripts/jquery.vmap.world.js"></script> 
<script src="javascripts/jquery.bootstrap.wizard.js"></script> 
<script src="javascripts/fullcalendar.min.js"></script> 
<script src="javascripts/gcal.js"></script> 
<script src="javascripts/jquery.dataTables.min.js"></script> 
<script src="javascripts/datatable-editable.js"></script> 
<script src="javascripts/jquery.easy-pie-chart.js"></script> 
<script src="javascripts/excanvas.min.js"></script> 
<script src="javascripts/jquery.isotope.min.js"></script> 
<script src="javascripts/isotope_extras.js"></script> 
<script src="javascripts/modernizr.custom.js"></script> 
<script src="javascripts/jquery.fancybox.pack.js"></script> 
<script src="javascripts/select2.js"></script> 
<script src="javascripts/styleswitcher.js"></script> 
<script src="javascripts/wysiwyg.js"></script> 
<script src="javascripts/typeahead.js"></script> 
<script src="javascripts/summernote.min.js"></script> 
<script src="javascripts/jquery.inputmask.min.js"></script> 
<script src="javascripts/jquery.validate.js"></script> 
<script src="javascripts/bootstrap-fileupload.js"></script> 
<script src="javascripts/bootstrap-datepicker.js"></script> 
<script src="javascripts/bootstrap-timepicker.js"></script> 
<script src="javascripts/bootstrap-colorpicker.js"></script> 
<script src="javascripts/bootstrap-switch.min.js"></script> 
<script src="javascripts/typeahead.js"></script> 
<script src="javascripts/spin.min.js"></script> 
<script src="javascripts/ladda.min.js"></script> 
<script src="javascripts/moment.js"></script> 
<script src="javascripts/mockjax.js"></script> 
<script src="javascripts/bootstrap-editable.min.js"></script> 
<script src="javascripts/xeditable-demo-mock.js"></script> 
<script src="javascripts/xeditable-demo.js"></script> 
<script src="javascripts/address.js"></script> 
<script src="javascripts/daterange-picker.js"></script> 
<script src="javascripts/date.js"></script> 
<script src="javascripts/morris.min.js"></script> 
<script src="javascripts/skycons.js"></script> 
<script src="javascripts/fitvids.js"></script> 
<script src="javascripts/jquery.sparkline.min.js"></script> 
<script src="javascripts/dropzone.js"></script> 
<script src="javascripts/jquery.nestable.js"></script> 
<script src="javascripts/main.js"></script> 
<script src="javascripts/respond.js"></script>
<script>
function submitForm() {
	$.ajax({
	type: 'POST',
	async: false,
	url: 'connection/update_user_acc.php',
	data: $('#validate-form').serialize(),
	dataType: 'json',
	success: function (data) {
		setTimeout(function () {
			if (data.status === '1') {
				window.location.href = 'index';
			
			} else {
				$('#errorDiv').slideDown(200, function () {
					$('#errorDiv').html('<div class="alert alert-danger style2">' + data.message + '</div>');
					$('#errorDiv').delay(5000).slideUp(100);
				});
			}

		}, 1000);
	},
	error: function () {
		alert('An unknown error occoured, Please try again Later...!')
	}
	});
	return false;
}

// JavaScript Validation For PW Reset
$("#rec_pw_form").validate({
	rules: {
		password: {
			required: true,
			minlength: 5,
			maxlength: 15
		},
		c_pw: {
			required: true,
			equalTo: '#password'
		},
	},
	messages: {
		password: {
			minlength: "Password at least have 5 characters",
			required: "Please Enter Your Password",
		},
		c_pw: {
			equalTo: "Passwords do not match!",
			required: "Please Confirm Your Password",
		},
	},
	submitHandler: PwRecFun
});

function PwRecFun() {
	$.ajax({
	url: 'connection/update_user_acc.php',
	type: 'POST',
	data: $('#rec_pw_form').serialize(),
	dataType: 'json'
	})
	.done(function (data) {
		setTimeout(function () {
			if (data.status === '1') {
				window.location.href = 'index';
			
			} else {
				$('#errorDiv3').slideDown('fast', function () {
					$('#errorDiv3').html('<div class="alert alert-danger style2">' + data.message + '</div>');
				}).delay(5000).slideUp('fast');
			}

		}, 1000);

	})
	.fail(function () {
		$("#rec_pw_form").trigger('reset');
		alert('An unknown error occoured, Please try again Later...');
	});
}
</script>
</body>
</html>