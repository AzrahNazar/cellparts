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
<link href="sweetalert/lib/sweet-alert.css" media=all rel=stylesheet>
<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name=viewport>
<link rel="icon" href="../img/favicon.png" />

<style>
	.widget-container .heading{
	  background: #666666
	}
</style>
</head>
<body class="page-header-fixed bg-1">
<div class=modal-shiftfix>
<?php include "common/header.php"; ?>
  <div class="container-fluid main-content">
    <div class=row> 
    <!-- Start Row -->
      <div class=col-lg-12>
          <!-- Table1 -->
		  <div class="widget-container fluid-height clearfix">
			<div class=heading> My Wish List</div>
			<div class="widget-content padded clearfix">
			  <div class=table-responsive>
				<table class="table table-bordered table-striped table-hover" id=dataTable1>
				  <thead>
				    <th>ID</th>
					<th>Date</th>
					<th>Image</th>
					<th>Product</th>
					<th>Unit Price (Rs)</th>
					<th>Add to Cart</th>
					<th>Remove</th>
				  </thead>
				  <tbody>
					<?php
					$result = mysqli_query($conn, "SELECT wish_list.date, wish_list.item_id, wish_list.id, books.book, books.price, books.imgpath, books.itemcode, books.sccode
                  FROM wish_list
                  INNER JOIN books ON wish_list.item_id = books.itemcode
                  WHERE wish_list.user_id ='$uid'");
					$xx = 0;
					while ($row = mysqli_fetch_array($result)){ $xx++;
					?>
					<tr>
					  <td><?php echo $xx; ?>.</td>
					  <td><?php echo $row['date']; ?></td>
					  <td><a href="../details-products-sumedacellular-kurunegala?subc=<?php echo $row['sccode'];?>&icode=<?php echo $row['itemcode'];?>" target="_blank"><img class="img-responsive" src="../images/sumeda_p/<?php echo $row['imgpath']; ?>" width="80" alt="<?php echo $row['book']; ?>"></a></td>
					  <td><?php echo $row['book']; ?></td>
					  <td align="right"><?php echo number_format($row['price'], 2); ?></td>
					  <td align="center"><button class="btn btn-success btn-sm btn_add" value="<?php echo $row['itemcode']; ?>" data-row-id="<?php echo $row['id']; ?>">Add to Cart</button></td>
					  <td align="center"><button class="btn btn-danger btn-sm btn_remove" value="<?php echo $row['id']; ?>">Remove</button></td>
					</tr>
					<?php  } ?>
				  </tbody>
				</table>
			  </div>
			</div>
		  </div>
		  <!-- End Table1 -->   
      </div>
    </div>
    <!-- End Row --> 
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
<script src="sweetalert/lib/sweet-alert.min.js"></script> 
<script>
/* Remove Item */
$('.btn_remove').click(function() {
  var row_id = $(this).val();
  swal({
	title: "",
	text: "Are you sure you want to remove this item?",
	type: "warning",
	showCancelButton: true,
	confirmButtonClass: "btn-danger",
	confirmButtonText: "Yes !",
	closeOnConfirm: false
  },
	function () {
	  $.post('connection/update_user_acc.php', {'remove_wishlist_item': 'data' , row_id : row_id}, function (e) {
		if (e.status == "ok") {
		  swal({
			title: "",
			text: "Successfully Deleted",
			type: "success",
			confirmButtonText: "OK"
			  },
			  function (isConfirm) {
				window.location.href = "wish-list";
		  });
		
		} else {
		  swal("Oops...", "Something went wrong. Please Try Again!", "warning");
		}
	  }, "json");
	}
  );
});

/* Add to Cart */
$('.btn_add').click(function() {
  var item_id = $(this).val();
  var row_id = $(this).attr('data-row-id');
  swal({
	title: "",
	text: "Are you sure you want to add this item to your cart?",
	type: "warning",
	showCancelButton: true,
	confirmButtonClass: "btn-danger",
	confirmButtonText: "Yes !",
	closeOnConfirm: false
  },
	function () {
	  /*$.post('../connection/cart_conn.php', {add_to_cart: 'data', item_id:item_id, qty: 1}, function (data) {
		if (data.msgType === 1) {
			$.post('connection/update_user_acc.php', {'remove_wishlist_item': 'data' , row_id : row_id}, function (e) {
				if (e.status == "ok") {
				  swal({
					title: "",
					text: "Successfully Added",
					type: "success",
					confirmButtonText: "OK"
					  },
					  function (isConfirm) {
						window.location.href = "wish-list";
				  });
				}
			}, "json");
		} else {
		  swal("Oops...", "Something went wrong. Please Try Again!", "warning");
		}
	  }, "json");*/
	  add_to_cart(item_id, row_id);
	}
  );
});

/* Add to Cart */
function add_to_cart(id, row_id) {
	$.post('../connection/cart_index.php', {'add_to_acc': 'data', id:id, uid: <?php echo $uid; ?>}, function (data) {
	  if (data === 'Add') {
		$.post('connection/update_user_acc.php', {'remove_wishlist_item': 'data' , row_id : row_id }, function (e) {
			if (e.status == "ok") {
			  swal({
				title: "",
				text: "Successfully Added",
				type: "success",
				confirmButtonText: "OK"
			  },
			  function (isConfirm) {
				window.location.href = "wish-list";
			  });
			}
		  }, "json");
	  } else {
		swal("Oops...", "This Item is already in the cart!!", "warning");
	  }
	});
}
</script>
</body>
</html>