<?php include "db/db.php"; 
session_start();

$uid = "";

if (isset($_SESSION['gest_user'])) {
	$uid = htmlspecialchars(strip_tags(trim($_SESSION['temp_user'])), ENT_QUOTES, 'UTF-8');
	$g_user = htmlspecialchars(strip_tags(trim($_SESSION['gest_user'])), ENT_QUOTES, 'UTF-8');
	$whr = 'tmp_id';

} else {
	if (!isset($_SESSION['user'])) {
		$redirectUrl = "login";
		echo "<script type=\"text/javascript\">";
		echo "window.location.href = '$redirectUrl'";
		echo "</script>";	
		
	} else {
		$log = htmlspecialchars(strip_tags(trim($_SESSION['user'])), ENT_QUOTES, 'UTF-8');
		$sqlu = "SELECT id FROM cust WHERE usern='$log'";
		$resultu = mysqli_fetch_assoc(mysqli_query($conn, $sqlu));
		$uid = $resultu['id'];
		$whr = 'User_ID';
	}
}

if (empty($log)) {
	
} 

else {

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

while ($rowm = mysqli_fetch_array($resultm)) 
{
	$dollar = $rowm['doller'];
}


$sqlw = "SELECT MAX(books.wrap_charges) AS wrap_charges FROM books Inner Join scat ON books.sccode = scat.sccode Inner Join live_cart ON books.itemcode = live_cart.Item_Code WHERE live_cart.".$whr." =  '$uid' AND scat.wrapping = '1'";
$resultw = mysqli_query($conn, $sqlw);
$roww = mysqli_fetch_array($resultw);
$wp = $roww['wrap_charges'];


$countw = mysqli_num_rows($resultw);

if(empty($wp)) {
	$wrap = 0.00;	
} else {
	$wrap = $wp;
}

$sqldel = "SELECT MAX(books.deli_charges) AS deli_charges FROM books Inner Join live_cart ON books.itemcode = live_cart.Item_Code WHERE live_cart.".$whr." = '$uid' AND books.deli_charges!= 250";
$resultdel = mysqli_query($conn, $sqldel);
$rowdel = mysqli_fetch_array($resultdel);
$deli = $rowdel['deli_charges'];

if($deli == 0){
	$deli_char = 250;
}else{
	$deli_char = $deli;
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
		strong.qty {

			font-size: 16px;

		}
		td.a {
			text-align: center;
		}

		@media (max-width: 767px)
		{
			.sss
			{
				margin-left:50px;

			}
		}

		@media (min-width: 1200px) 
		{
			.sss
			{

				margin-left:50px;

			}

		}




	</style>	

	

</head>

<body>

	<input type="hidden" id="uid" value="<?php echo $uid; ?>" name="">

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




	<div class="row">
					
					<div class="col-lg-12 col-md-12 col-sm-12  container fluid-height clearfix">
						<div class="table-responsive" style="width:100%;border:1px;">
							<table  class="box" id="cart_tbody" style="margin-top:25px; width:90%;">
								<thead>
									<tr style="border:12px;margin-top:20px;">

										<th style="width:30%;"><h4></h4></th>
										<th style="width:20%;"><h4><strong>Description</strong></h4></th>
										<th style="width:10%;"><h4><strong>Qty</strong></h4></th>
										<th style="width:15%;"><h4><strong>Price</strong></h4></th>
										<th style="width:15%;"><h4><strong>Subtotal</strong></h4></th>
										<th style="width:10%;"><h4><strong>Remove</strong> </h4></th>

									</tr>

								</thead> 

								<tbody>              <!-- single item -->


								</tbody>

								<tfoot>

									<tr>
										<input type="hidden" name="wrapping" id="wrapping" value="<?php echo $countw;?>">
										<input type="hidden" name="w_price" id="w_price" value="<?php echo $wrap;?>">
										<input type="hidden" name="del" id="del" value="<?php echo $deli_char;?>">
										<td colspan="6" style="text-align:right;">
											<div class="top-subtotal">
												<span style="font-size:20px;"><strong> Total: &nbsp;</strong></span>
												<span class="sig-price" id="total_price_dis" style="font-size:20px;padding-right:10px;">
												</span>
											</div>   
										</td>
									</tr>

									<tr>
										<td colspan="6" style="text-align:right;">
											<div class="top-subtotal">
												<span style="font-size:20px;"><strong>Pakaging Charges: &nbsp; </strong></span>
												<span class="sig-price" id="wrap" style="font-size:20px;padding-right:10px;">
												</span>
											</div>   
										</td>
									</tr>

									<tr>
										<td colspan="6" style="text-align:right;">
											<div class="top-subtotal">
												<span style="font-size:20px;"><strong>Courier Charges: &nbsp; </strong></span>
												<span class="sig-price" id="shipping" style="font-size:20px;padding-right:10px;">
												</span>
											</div>   
										</td>
									</tr>

									<tr>	
										<td colspan="6" style="text-align:right;">
											<div class="top-subtotal">
												<span style="font-size:20px;"><strong>Grand Total: &nbsp; </strong></span>
												<span class="sig-price" id="grand_total" style="font-size:20px;padding-right:10px;">
												</span>
											</div>   
										</td>		
									</tr>

									<tr>
										<td>
											
											<div class="cart-actions" style="margin-bottom:10px;margin-top:10px;">
												<a href="index"> <button class="btn btn-success"><span style="">Keep Shopping </span></button></a>			
											</div>
											
											
										</td>
										<td colspan="6">			
											<div class="cart-actions" style="margin-top:20px;margin-bottom:20px;">	
												<?php 
												if ((isset($_SESSION['user'])))
												{
													$sqlm = "SELECT * FROM live_cart WHERE User_ID='$uid'";
												}
												else
												{	 
													$sqlm = "SELECT * FROM live_cart WHERE tmp_id = '".htmlspecialchars(trim($_SESSION['temp_user']), ENT_QUOTES, 'UTF-8')."'";	 
												}

												$resultu = mysqli_query($conn,$sqlm);

												$rowu = mysqli_fetch_assoc($resultu) ?>


												<?php if(empty($rowu)) { ?>
													<!--<button class="sss"><span style="font-size:18px;display:none;">Confirm </span></button>-->
												<?php } else { 
													
													if ((isset($_SESSION['user'])))
														{?>

															<a href="confirm"> <button class="btn btn-success" style="float: right;"><span >Checkout</span></button></a>


														<?php }else if (isset($_SESSION['gest_user'])){ ?>

															<a href="confirm"> <button class="btn btn-success" style="float: right;"><span >Checkout</span></button></a>



														<?php } }?>



													</div>



												</td>
											</tr>
										</tfoot>



									</table>    
								</div>					 
							</div>

						</div>
					</div>

					<!-- slider-area-end -->


					<!-- newletter-area-end -->
					<?php include "common/footer.php"; ?>
					<!-- copyright-area-start -->

					<!-- copyright-area-end -->
					<!-- social_block-start -->

					<!-- social_block-end -->



					<script type="text/javascript">
						$( document ).ready(function() {
	//alert('dgfd');
	cart_data_load_main();
});

</script>


<script type="text/javascript">

	function cart_data_load_main() {
		var tot = 0;
		var shipping = 0;
		var gtot = 0;
		var uid = $('#uid').val();
		// alert(<?php echo $uid; ?>);

		var tableData;
		var postData = {cart_data_load: 'table', uid: uid};
		$.post("connection/cart_data_load.php", postData, function (e) {
			if (e === undefined || e.length === 0 || e === null) {
				tableData = '<tr class="error"><td colspan="6"> <h4>Your cart is empty</h4> </td></tr>';

				$('#cart_tbody tbody').html('').append(tableData);
			} else {
				$.each(e, function (index, data) {

					var f_price;
					var price = parseFloat(data.price);

					var dollar = data.dollar;
					var div = parseFloat(price/dollar);

					if($.session.get("user_price")==1){

						f_price="Rs. " + (price).toFixed(2);

					}
					if($.session.get("user_price")==2){
						f_price="$. " + (div).toFixed(2);
					}

					var t_price;

					if($.session.get("user_price")==1){
						t_price="Rs. " + parseFloat(data.Qty*data.price).toFixed(2);
					}
					if($.session.get("user_price")==2){
						t_price="$. " + parseFloat((data.Qty*data.price)/data.dollar).toFixed(2);
					}


					tableData += '<tr>';

					if(data.flag==1){

						tableData += '<td><a href="#" class="pimage"><img src="images/sumeda_p/' + data.img +'" alt="' + data.name + '" style="margin-bottom:20px;width:150px;height:150px;"></a></td>';
					}
					if(data.flag==2){
						tableData += '<td ><a href="#" class="pimage"><img src="images/sumeda_p/' + data.img +'" alt="' + data.name + '" style="margin-bottom:20px;width:150px;height:150px;"></a></td>';   

					}
					if(data.flag==3){
						tableData += '<td ><a href="#" class="pimage"><img src="images/sumeda_p/' + data.img +'" alt="" style="margin-bottom:20px;width:150px;height:150px;"></a></td>';  

					}

					tableData += '<td class="cartproduct-name" style=""><a href="#" style="padding-left:0px;">' + data.name + '</a></td>';

					tableData += '<td class="th-details text-center" style=""><strong><input size="2" type="text" autocomplete="off" class="cart_quantity text-right form-control" data-row-no = '+data.id+' value="'+data.Qty+'" style="width:60%;"/></strong></td>';

					tableData += '<td class="th-details" style=""><h2><span class="sig-price"><a href="#" style="font-size:18px;padding-left:7px;"><strong>' +f_price+ '</strong></a></span></h2></td>';

					tableData += '<td class="th-details" style=""><h2><span class="sig-price"><a href="#" style="font-size:18px;padding-left:7px;"><strong>' +t_price+'</strong></a></span></h2></td>';

					tableData += '<td><a href="#" class="btn-remove pull-left" data-row-no = '+data.id+' style="font-size:18px;margin-left:30px;">X</a></td>';

					tableData += '<th class="td-add-to-cart"></th>';

					tableData += '</tr>';

					$('#cart_tbody tbody').html('').append(tableData);


					if($.session.get("user_price")==1){

						tot = tot + (data.Qty*data.price);
						shipping = $('#del').val();
						wrapping = $('#wrapping').val();
						w_price = $('#w_price').val();

						if(wrapping != 0){
							wrap = parseFloat(w_price);
							gtot = tot + parseFloat(shipping) + parseFloat(wrap);
						}else{
							wrap = 0.0;
							gtot = tot + parseFloat(shipping) + parseFloat(wrap);
						}
						
					}
					if($.session.get("user_price")==2){
						tot = tot + ((data.Qty*data.price)/data.dollar);
						shp = $('#del').val();
						shipping = shp/data.dollar;
						wrapping = $('#wrapping').val();
						w_price = $('#w_price').val();

						if(wrapping!=0){
							wrap =  parseFloat(w_price)/data.dollar;
							gtot = tot + parseFloat(shipping) + parseFloat(wrap);
						}else{
							wrap = 0;
							gtot = tot + parseFloat(shipping) + parseFloat(wrap);
						}
					}


				});
				$('.cart_quantity').on('change',function(){

					/*$(this).parents("tr").find(".stock_cal").replaceWith( "<span class='label label-success stock_cal'>In stock</span>" );*/
					var row_id = $(this).attr('data-row-no');
					var value = $(this).val();
                    //alert(value);
                    //alert($(this).parents("tr").attr('id'));
                    $.post('connection/cart_data_load.php', {'update_qty': 'data',id :row_id , val : value}, function (data) {

                        if (data.status === 'qty exceed') {
                        	alert("The selected quantity exceeds the available quantity");
                        }else{
                        	cart_data_load_main();//refresh data table
                        }
                    });
                });



				$(".btn-remove").click(function(){
					id_for_delete = $(this).attr('data-row-no');

                    $.post("connection/cart_data_load.php", {delete_cart_row: 'delete', id_for_delete: id_for_delete}, function (delMsg) {//delete data table id pass to model
                    	$.each(delMsg, function (index, valueDel) {
                        //return confirm('Are you sure you want to delete this details?');
                        if (valueDel.msgType === 1) {
                        	alert('Deleted data successfully');
                        } else if (valueDel.msgType === 2) {
                        	alert('Something went wrong.Please check your field');
                        }
                    });
                    cart_data_load_main();//refresh data table
                    //cart_data_load();
                }, "json");

                });

			//Load Json Data to Table
			
			if($.session.get("user_price")==1){
				$('#total_price_dis').text('Rs '+tot.toFixed(2));
				$('#shipping').text('Rs '+shipping);
				$('#wrap').text('Rs '+wrap.toFixed(2));
				$('#grand_total').text('Rs '+gtot.toFixed(2));
			}
			if($.session.get("user_price")==2){
				$('#total_price_dis').text('$ '+tot.toFixed(2));
				$('#shipping').text('$ '+shipping);
				$('#wrap').text('Rs '+wrap.toFixed(2));
				$('#grand_total').text('$ '+gtot.toFixed(2));
			}
			
		}
		    // $("#tot").val(e.balance);


		}, "json");

}


</script>
<script src="js/jquery.session.js"></script> 
<!-- all js here -->
<!-- jquery-1.12.0 -->

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
<!--<script src="js/jquery.scrollup.min.js"></script>-->
<!-- owl.carousel.min.js -->
<script src="js/owl.carousel.min.js"></script>		
<!-- plugins.js -->
<script src="js/plugins.js"></script>
<!-- main.js -->
<script src="js/main.js"></script>


</body>
</html>
