<script>
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
</script>
	<style>
	.mini-products-list
{
    max-height: 200px;
    overflow-y: scroll;
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
			<div class="header-top-area black-bg ptb-7 hidden-xs">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-5 col-sm-4">
							<div class="header-top-left">
								<span><a href="#"><img src="img/icons.png" width="80px" height="20px"></a> (+94) 077 744 4584</span>
							</div>
						</div>
						<div class="col-lg-7 col-md-7 col-sm-8">
							<div class="header-top-right">
								<ul>
									<li class="slide-toggle"><a href="account.php"><i class="fa fa-user"></i> My Account</a>
									</li>
									
									
								</ul>
								<ul>
									<li class="slide-toggle"><a href="register.php"><i class="fa fa-rss"></i> Register</a>
									</li>
								</ul>
								<ul>
								
								<?php if(empty($log)) { ?>
								<li class="slide-toggle"><a href="login.php"><i class="fa fa-lock"></i> Login</a>
								</li>
								<?php } else { ?>
								<li class="slide-toggle"><a href="destroy.php"><i class="fa fa-lock"></i> Logout</a>
								</li>
									<?php } ?>
								
								</ul>
								
								
								
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
			<!-- header-top-area-end -->
			<!-- header-bottom-area-start -->
			<div class="header-bottom-area bg-color-1 ptb-25">
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
							<div class="logo">
								<a href="index.php"><img src="img/logo.png" alt="" /></a>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="header-bottom-middle">
								<div class="top-search">
									<!--<span class="tex_top_skype"><i class="fa fa-skype"></i>Skype: <span class="">Support.skype</span></span>-->
									<span class="tex_top_email" style="padding-left:115px;"><i class="fa fa-envelope"></i>Email: <span class="">sumedacellular@gmail.com</span></span>
								</div>
								<div class="search-box">
									<form method="post" action="search.php">
										<select name="#" id="select" onchange="location = this.value;">
											<option value="">All categories</option>
										<?php
				
				$sql="SELECT * FROM cat ORDER BY cat ASC";
                $resultm=mysqli_query($conn,$sql);
				
				while ($row = mysqli_fetch_array($resultm)){ ?>
					  
                  
					  						<?php
	$cosql3="SELECT * FROM scat WHERE ccode='".$row['ccode']."'";
	$coresult3=mysqli_query($conn,$cosql3);
	
	while ($row3 = mysqli_fetch_array($coresult3)){ ?>
											<option value="products.php?subc=<?php echo $row3['sccode']; ?>"><?php echo $row3['subcat']; ?></option>

												  <?php } ?>
                      
					  
				<?php } ?>
																					
										</select>
										<input type="text" placeholder="Search..." name="search"/>
										<button><i class="fa fa-search"></i></button>
									</form>
								</div>								
							</div>
							<div class="header-bottom-right">
								<!--<div class="left-cart">
									<div class="header-compire">
										<a href="#"><i class="fa fa-heart"></i> Wish List 0 </a>
										<a href="#"><i class="fa fa-refresh"></i> Compare  0 </a>
									</div>
								</div>-->
								
								
								 <?php if(empty($log)) { ?>
								 
								 	<div class="shop-cart-area" >
								
									<div class="top-cart-wrapper">
						
									
										<div class="block-cart">
										
											<div class="top-cart-title">
											
												<a href="login.php">
												
												
													<span class="title-cart">
													<i class="fa fa-shopping-cart" style="font-size:30px;">
													</i>&nbsp
													my cart</span>
													
													
												</a>
											</div>
											
											
											
                                            <div class="top-cart-content" style="display:none;">
											

                                                <ol class="mini-products-list" >
                                                    <!-- single item -->
                                                 
                                                    <!-- single item -->
                                                
                                                </ol>
                                                <!--<div class="top-subtotal">
                                                    Subtotal: <span class="sig-price">$444.00</span>
                                                </div>-->
                                                <div class="cart-actions">
												
												<a href="cart.php">
                                                    <button><span>Checkout</span></button>
													</a>
													
                                                </div>
                                            </div>											
										</div>
									</div>
								</div>
								 
								 
								 
								 <?php } else { ?>
								<div class="shop-cart-area">
								
									<div class="top-cart-wrapper">
											 <?php if ((isset($_SESSION['user'])))
	  { ?>
       <input id="uid" type="hidden" class="form-control" value="<?php echo $uid ;?>" style="width:250px">
	 <?php } ?>
									
									
										<div class="block-cart">
										
											<div class="top-cart-title">
											
												<a href="#">
												
												
													<span class="title-cart">
													<i class="fa fa-shopping-cart" style="font-size:30px;">
													</i>&nbsp
													my cart</span>
													
													
												</a>
											</div>
							
														<?php
				
				$sql="SELECT * FROM live_cart WHERE User_ID = '$uid'";
                $resultm=mysqli_query($conn,$sql);
				
								 while ($row = mysqli_fetch_array($resultm)) 
												
												{ 
												
											if(empty($row)) {?>
									
									
											
                                            <div class="top-cart-content" style="display:none">
                                                <ol class="mini-products-list">
                                                    <!-- single item -->
                                                 
                                                    <!-- single item -->
                                                
                                                </ol>
                                                <!--<div class="top-subtotal">
                                                    Subtotal: <span class="sig-price">$444.00</span>
                                                </div>-->
								
                                                
												
											
												
												 <div class="cart-actions">
												
												<a href="cart.php">
                                                    <button><span>Checkout</span></button>
													</a>
													
                                                </div>
								
				
                                            </div>	
 <?php } else { ?>
     <div class="top-cart-content" >
                                                <ol class="mini-products-list" >
                                                    <!-- single item -->
                                                 
												 
                                                  
												  <!-- single item -->
                                                </ol>
                                                <!--<div class="top-subtotal">
												
                                                Total:<span id="stot" class="sig-price">  </span>
													
                                                </div>-->
												
								
                                      
												 <div class="cart-actions">
												
												<a href="cart.php">
                                                    <button><span>Checkout</span></button>
													</a>
													
                                                </div>
								
				
                                            </div>	


											
 <?php 
 }
 
 } ?>
											
										</div>
										
										
										
										
											 <?php } ?>
										
										
										
									</div>
								</div>
								
								
								
							</div>							
						</div>
					</div>
				</div>
			</div>	
	<script type="text/javascript">
                                
                                cart_data_load_show();
                                function cart_data_load_show() {//get values which comes from view
								var uid = $('#uid').val();
								
                                    var tot = 0;
                                    var tableData;
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
											
											
										
											
											tableData +=' <li>';
                                            tableData +='<a class="product-image"><img src="images/sumeda_p/'+data.img+'" style="width:50px;width:50px;"></a>';
											 
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
                                            

                                        });
										
	      $(".btn-remove").click(function(){
                                                    id_for_delete = $(this).attr('data-row-no');
    
                                                    $.post("connection/cart_data_load.php", {delete_cart_top: 'delete', id_for_delete: id_for_delete}, function (delMsg) {//delete data table id pass to model
                                                    $.each(delMsg, function (index, valueDel) {
                                                        //return confirm('Are you sure you want to delete this details?');
                                                        if (valueDel.msgType === 1) {
                                                            alert('Deleted data successfully');
                                                        } else if (valueDel.msgType === 2) {
                                                            alert('Something went wrong.Please check your field');
                                                        }
                                                    });
                                                    cart_data_load_show();//refresh data table
                                                    //cart_data_load();
                                                    }, "json");

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
                            </script>
		 
			
			
			
			<!-- header-bottom-area-end -->
		</header>
		
		
		
		
		