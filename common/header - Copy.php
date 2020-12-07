<!--<script>
  window.fbAsyncInit = function() {
    FB.init({
     
      autoLogAppEvents : true,
      xfbml            : true,
      version          : 'v3.0'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
     fjs.parentNode.insertBefore(js, fjs);
	 FB.CustomerChat.showDialog();

   }(document, 'script', 'facebook-jssdk'));
</script>-->

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">

<style>
	.mini-products-list
	{
		max-height: 200px;
		overflow-y: scroll;
	}
	.sticky {
		position: fixed;
		top: 0;
		width: 100%;
	}

	.filter-option{
		font-size: 16px;
	}

	.input-block-level{
		text-align: ;left: 
		color: #fff;
	}

	.search-box form input{
		padding-left: 12px;
		color: #fff;
	}

	.selectpicker{
		background: #fff;
	}

	.bootstrap-select.btn-group .btn .filter-option {
	    height: 47px;
	    padding-top: 10px;
	}

	.bootstrap-select>.btn {
    	width: 77%;
    }

    .search-box form button {
        border-radius: 6px 0px 0px 0;
    }

    .search-box form input {
        border-radius: 0;
    }

    .bs-searchbox .form-control {
        height: 35px;
    }
}

</style>


<header>
	<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>-->

	<script src="js/jquery.session.js"></script>

	<script type="text/javascript">

		//$.session.set("user_price", 1);

		$( document ).ready(function() {
			  //alert("test");
			  //alert($.session.get("user_price"));
			  if (!$.session.get("user_price") ) {
			  	$.session.set("user_price", 1);   
			  }

			  $("#rpu").click(function(){
			  	$.session.set("user_price", 1);
			  	$.session.clear("user_price", 1);
			  	location.reload();
				//alert("test");
			});
			  
			  $("#usd").click(function(){
			  	$.session.set("user_price", 2);
			  	location.reload();
			  });
			  
			  
			  if($.session.get("user_price")==1){
			  	$(".price_rs").css("display","block");
			  	$(".price_usd").css("display","none");
			  }
			  
			  if($.session.get("user_price")==2){
			  	$(".price_usd").css("display","block");
			  	$(".price_rs").css("display","none");
			  }
			  
			  
			});
		</script>


		<!-- header-top-area-start -->
		<div class="header-top-area black-bg ptb-7">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-5 col-sm-4">
						<div class="header-top-left">
							<span style="">
								<a href="whatsapp://send?phone=+94777444584"><img src="img/whatup.png" style="width:28px;height:28px;"></a></span>
								
								<span style="">
									<a href="viber://chat?number=%2B94777444584"><img src="img/viber.png" style="width:28px;height:28px;"></a> </span>

									<span style="">
										<a href="#"><img src="img/imo.png" style="width:28px;height:28px;"></a> </span>

										<span style="">
											<a href="#"><img src="img/wechat.png" style="width:28px;height:28px;"></a> </span>

											<span style="color: #FF5313">

											(+94) 77 744 4584</span>
										</div>
									</div>
									<div class="col-lg-7 col-md-7 col-sm-8 hidden-xs">
										<div class="header-top-right">
											<ul>
												<li class="slide-toggle"><a href="faqs.php"><i class="fa fa-comment-o"></i> FAQ's</a>
												</li>
											</ul>
											<?php if(!isset($_SESSION['user'])) { ?>
												<ul>
													<li class="slide-toggle"><a href="regis_cart"><i class="fa fa-user-plus"></i> Register Now</a>
													</li>
												</ul>
												<ul>
													<li class="slide-toggle"><a href="login_cart"><i class="fa fa-lock"></i> Login</a></li>
												</ul>
											<?php } else { ?>
												<ul>
													<li class="slide-toggle"><a href="user_acc/"><i class="fa fa-user"></i> My Account</a></li>
												</ul>
												<ul>
													<li class="slide-toggle"><a href="destroy.php"><i class="fa fa-lock"></i> Logout</a></li>
												</ul>
												<?php 
													$log = $_SESSION['user'];
													$sqlu = "SELECT * FROM cust WHERE usern='$log'";
													$resultu = mysqli_query($conn, $sqlu);
													$row = mysqli_fetch_array($resultu);
													$logged_user_name = $row['nic'];

													if($logged_user_name == ''){
														echo "<script>alert('Your session has been expired. Please login to continue!')</script>";

														unset($_SESSION['user']);
														unset($_SESSION['temp_user']);

														session_destroy();

													}
															
												?>
												<ul>
													<li class="slide-toggle"><a href="user_acc/"><i class="fa fa-user"></i> Hello <?php echo $logged_user_name; ?>! </a></li>
												</ul>
											<?php } ?>

											<ul>
												<li class="slide-toggle-2 text-uppercase" ><a href="#" id="usd">$</a>

												</li>
											</ul>
											<ul>
												<li class="slide-toggle-3 text-uppercase"><a href="#" id="rpu">Rs</a>

												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!-- Google Translator -->
			<!-- <div class="col-lg-2" style="float: right;">
				<div style="padding: -2px;" id="google_translate_element"></div>

				<script type="text/javascript">
					function googleTranslateElementInit() {
					  new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
					}
				</script>

				<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
        
			</div> -->
			<!-- Google Translator -->


			<!-- header-top-area-end -->
			<!-- header-bottom-area-start -->
			<div class="header-bottom-area bg-color-1 ptb-25" >
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="logo">
								<a href="https://cellparts.lk"><img src="img/logo.png" alt="" style="width:220px;"/></a>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="header-bottom-middle">
								<div class="top-search">
									<span class="tex_top_skype"><i class="fa fa-skype"></i>Skype: <span class="">cellparts.skype</span></span>
									<span class="tex_top_email"><i class="fa fa-envelope"></i>Email: <span class="">cellparts.lk@gmail.com</span></span>
								</div>
								<div class="search-box">

									<form method="post" action="search.php">
										<div class="col-md-4">
											 <select class="selectpicker" data-style="btn-primary" data-live-search="true" onchange="location = this.value;"> 
												<option value="" style="font-size: 16px;">All categories</option>
												<?php

												$sql="SELECT * FROM cat ORDER BY cat ASC";
												$resultm=mysqli_query($conn,$sql);

												while ($row = mysqli_fetch_array($resultm)){ ?>
													<optgroup label="<?php echo $row['cat']; ?>"> 
														<?php 
													$cosql3="SELECT * FROM scat WHERE ccode='".$row['ccode']."' LIMIT 10";
													$coresult3=mysqli_query($conn,$cosql3);

													while ($row3 = mysqli_fetch_array($coresult3)){ ?>

														<option value="products.php?subc=<?php echo $row3['sccode']; ?>"><?php echo $row3['subcat']; ?></option> 
													<?php } ?>
													
														</optgroup>

												<?php } ?>
											</select>
										</div>
										
										<div class="col-md-8"> 
											<input type="text" placeholder="Search..." name="search"/>
											<button><i class="fa fa-search"></i></button>
										</div>
										<!-- <div class="row">
											<div class="col-md-5" style="padding-left: 40px;">
												<input type="radio" name="search" value="1" style="width: 25px; height: 20px;" checked><label>&nbsp;&nbsp;&nbsp;Search</label> 
											</div>
											<div class="col-md-6">
												<input type="radio" name="ad_search" value="1" style="width: 25px; height: 20px;"><label>&nbsp;&nbsp;&nbsp; Advanced Search</label> 
											</div>
											
										</div> -->
										


									</form>
								</div>								
							</div>
							<div class="header-bottom-right">
								<div class="left-cart">
									<div class="header-compire">

										<?php if ((isset($_SESSION['user'])))
										{ $log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8'); ?>
										<input id="uid" type="hidden" class="form-control" value="<?php echo $log;?>" style="width:250px">

										<?php 
										$sql3="SELECT * FROM cust WHERE usern ='$log'";
										$result3=mysqli_query($conn,$sql3);

										while ($row33 = mysqli_fetch_array($result3)){ ?>

											<input type="hidden" name="<?php echo $row33['id']; ?>" value="<?php echo $row33['id']; ?>" id="u_id">

										<?php } ?>

									<?php } ?>

									<!-- <div class="row">
										<div class="col-md-3" style="font-size: 42px; padding-top: 8px;">
											<i class="fa fa-heart"></i>
										</div>
										<div class="col-md-8" style=" padding-top: 8px; line-height: 10px; padding-left: 30px;">
											<a class=" title-cart" href="user_acc/wish-list.php" style="color: #fff; font-weight: bold; ont-size: 17px; line-height: 17px;  "> MY WISH LIST </a>
										</div>
									</div> -->
									<a href="user_acc/wish-list.php"><i class="fa fa-heart"></i> Wish List  </a><br/>
									<a href="#"><i class="fa fa-refresh"></i> Compare   </a>
								</div>
							</div>


							<div class="shop-cart-area">

								<div class="shop-cart-area">
									<div class="top-cart-wrapper">
										<?php if ((isset($_SESSION['user'])))
										{ $log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8'); ?>
										<input id="uid" type="hidden" class="form-control" value="<?php echo $log;?>" style="width:250px">

										<?php 
										$sql3="SELECT * FROM cust WHERE usern ='$log'";
										$result3=mysqli_query($conn,$sql3);

										while ($row33 = mysqli_fetch_array($result3)){ ?>

											<input type="hidden" name="<?php echo $row33['id']; ?>" value="<?php echo $row33['id']; ?>" id="u_id">

										<?php } ?>

									<?php } ?>

									<div class="block-cart" id="refresh_div" >
										<div class="top-cart-title row" style="line-height: 15px; padding-left: 20px;" >
											<div class="col-md-3" style="padding-top: 17px; padding-left: 5px;">
												<i  style="font-size: 45px;" class="fa fa-shopping-cart"></i>
											</div>
											<div class="col-md-9" style="padding-left: 10px:">
												<a href="#">
													<span class="title-cart">my cart</span>
													<span class="count-item" id="qty_count"></span>

													<span class="price" >items</span><br>
													<span class="price" id="stot" ></span>
												</a>
											</div>
										</div>
										<div class="top-cart-content">
											<ol class="mini-products-list">



											</ol>
                                                <!--<div class="top-subtotal">
                                                    Subtotal: <span class="sig-price">$444.00</span>
                                                </div>-->
                                                <div class="cart-actions">
                                                	<div class="row">
                                                		<div class="col-md-6" style="padding:5px 5px;">
                                                			<a href="cart"><button><span>View Cart</span></button>
                                                			</a>

                                                		</div>
                                                		<?php	 if ((isset($_SESSION['user'])))
                                                		{?>
                                                			<div class="col-md-6" style="padding:5px 5px;">
                                                				<a href="confirm"> <button><span >Checkout</span></button></a>
                                                			</div>

                                                		<?php } else { ?>
                                                			<div class="col-md-6" style="padding:5px 5px;">
                                                				<a href="confirm"><button><span>Checkout</span></button>
                                                				</a>
                                                			</div>

                                                		<?php } ?>
                                                	</div>
                                                </div>
                                            </div>											
                                        </div>
                                    </div>
                                </div>

                            </div>							
                        </div>
                    </div>
                </div>
            </div>

            <!-- header-bottom-area-end -->
        </header>			
        <script type="text/javascript">
        	cart_data_load_show();
                                function cart_data_load_show() {//get values which comes from view
								//alert('test');

								var uid = $('#u_id').val();
								// alert(uid);
								
								var tot = 0;
								var qty = 0;

								var tableData = '';
								$('.mini-products-list').html('').append('No Items available in the cart');
									/*$.post('connection/index.php', {'cart_no': 'data', uid:uid}, function (data) {
	        $(".count").text(data);
	        count = data;
	    });*/
                                    //var postData = {cart_data_load: 'table'};//data pass to model
                                    $.post('connection/cart_data_load.php', {'cart_data_load_show': 'data',uid: uid}, function (e) {

                                        //alert("test");
                                        $.each(e, function (index, data) {
                                        	var pri;
                                        	if($.session.get("user_price")==1){
                                        		pri = "Rs." + parseFloat(data.price).toFixed(2);

                                        	}

                                        	if($.session.get("user_price")==2){
                                        		pri="$." + ((data.price)/data.dollar).toFixed(2);

                                        	}

                                        	if(data.flag==1){		

                                        		tableData +='<li>';
                                        		tableData +='<a href="#" class="product-image"><img src="images/sumeda_p/'+data.img+'" style="width:50px;width:50px;"></a>';

                                        	}
                                        	if(data.flag==2){		

                                        		tableData +=' <li>';
                                        		tableData +='<a href="#" class="product-image"><img src="images/sumeda_p/'+data.img+'" style="width:50px;width:50px;"></a>';

                                        	}
                                        	if(data.flag==3){		

                                        		tableData +=' <li>';
                                        		tableData +='<a href="#" class="product-image"><img src="images/sumeda_p/'+data.img+'" style="width:50px;width:50px;"></a>';

                                        	}


                                        	tableData +='<div class="product-details"><p class="cartproduct-name"><a href="">'+data.name+'</a></p><strong class="qty">qty:'+data.Qty+'</strong><span class="sig-price">'+pri+'</span></div>';
                                        	tableData +='<div class="pro-action"><a class="btn-remove" href="#" data-row-no = '+data.id+'>remove</a></div>';
                                        	tableData +='</li>';



                                        	$('.mini-products-list').html('').append(tableData);

                                        	if($.session.get("user_price")==1){
                                        		tot = tot + (data.Qty*data.price);
                                        	}
                                        	if($.session.get("user_price")==2){
                                        		tot = tot + ((data.Qty*data.price)/data.dollar);
                                        	}

                                        	qty += parseInt(data.Qty);



                                        });
                                        $("#qty_count").text(qty);	

                                        $(".btn-remove").click(function(){
                                        	id_for_delete = $(this).attr('data-row-no');

                                                    $.post("connection/cart_data_load.php", {delete_cart_top: 'data', id_for_delete: id_for_delete}, function (valueDel) {//delete data table id pass to model
                                                    //$.each(delMsg, function (index, valueDel) {
                                                        //return confirm('Are you sure you want to delete this details?');
														//alert(valueDel);
														
														if (valueDel === 'ok') {
															cart_data_load_show();//refresh data table
                                                            //alert('Deleted data successfully');
                                                        } else if (valueDel === 'error') {
                                                            //alert('Something went wrong.Please check your field');
                                                        }
                                                    //});
                                                    //cart_data_load_show();//refresh data table
                                                    //cart_data_load();
                                                });

                                                });
                                        //Load Json Data to Table
                                        //alert(tot);
                                        if($.session.get("user_price")==1){
                                        	$('#stot').text('Rs. '+tot.toFixed(2));
                                        }
                                        if($.session.get("user_price")==2){
                                        	$('#stot').text('$ '+tot.toFixed(2));
                                        }

                                    }, "json");
}

function wish_list() {

	var uid = $('#u_id').val();

	var wish = 0;

	$.post('connection/wish_list.php', {'wish_list_count': 'data',uid: uid}, function (e) {

		$.each(e, function (index, data) {
			$('#wish_count').text(data.wish_cnt)
		});

	},'json');
}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>









