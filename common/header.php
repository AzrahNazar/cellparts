<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/css/bootstrap-select.min.css">

<style>
	.dropbtn{background-color:#666;color:#fff;padding:16px;font-size:16px;border:none;cursor:pointer}.drpdwn{position:relative;display:inline-block}.dropdown-content{display:none;position:absolute;background-color:#f9f9f9;min-width:160px;box-shadow:0 8px 16px 0 rgba(0,0,0,.2);z-index:1}.dropdown-content a{padding:12px 16px;text-decoration:none;display:block}.dropdown-content a:hover{background-color:#ff53131a;color:#fff}.drpdwn:hover .dropdown-content{display:block}.drpdwn:hover .drpbtn{background-color:#ff5313;color:#fff}.mini-products-list{max-height:200px;overflow-y:scroll}.sticky{position:fixed;top:0;width:100%}.filter-option{font-size:16px}.input-block-level{left:color: #fff}.search-box form input{padding-left:12px;color:#fff}.selectpicker{background:#fff}.bootstrap-select.btn-group .btn .filter-option{height:47px;padding-top:10px}.bootstrap-select>.btn{width:77%}.search-box form button{border-radius:6px 0 0 0}.search-box form input{border-radius:0}.bs-searchbox .form-control{height:35px}.header{background-color:#f1f1f1;padding:30px;text-align:center}#navbar{overflow:hidden;background-color:#333}#navbar a{float:left;display:block;color:#f2f2f2;text-align:center;padding:14px 16px;text-decoration:none;font-size:17px}#navbar a:hover{color:#eceff8}.topnav2{position:relative;overflow:hidden;background-color:#3f3f3f}.topnav2 a{float:left;color:#f2f2f2;text-align:center;padding:14px 16px;text-decoration:none;font-size:14px}.topnav2 a:hover{background-color:#ddd;color:#000}.topnav2 a.active{background-color:#ff5313;color:#fff}.topnav-right{float:right}.mobile-container{max-width:480px;margin:auto;border-radius:10px}.topnav{overflow:hidden;position:relative}.topnav .myLinks3{display:none}.topnav #myLinks{display:none}.topnav a{padding:10px 16px;text-decoration:none;font-size:14px;display:block}.topnav a.icon{background:#fff;display:block;position:absolute;right:0;top:0}.topnav a:hover{background-color:#ddd;color:#000;background:#262626}.badge{background-color:#333;border-radius:10px;color:#fff;display:inline-block;font-size:12px;line-height:1;padding:3px 7px;text-align:center;vertical-align:middle;white-space:nowrap}.s-icon{width:28px;height:28px;}

   .shopping-cart {
     margin: 20px 0;
     float: right;
     width: 320px;
     position: relative;
     border-radius: 3px;
     padding: 20px;
     
     
     .shopping-cart-header {
       border-bottom: 1px solid #E8E8E8;
       padding-bottom: 15px;
       
       .shopping-cart-total {
         float: right;
         margin-top:-10px;
       }
     }
     
     .shopping-cart-items {
       
       padding-top: 20px;

         li {
           margin-bottom: 18px;
         }

       img {
         float: left;
         margin-right: 12px;
       }
       
       .item-name {
         display: block;
         padding-top: 10px;
         font-size: 16px;
       }
       
       .item-price {
         color: $main-color;
         margin-right: 8px;
       }
       
       .item-quantity {
         color: $light-text;
       }
     }
      
   }



}

</style>


<header>
	<script src="js/jquery.session.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){$.session.get("user_price")||$.session.set("user_price",1),$("#rpu").click(function(){$.session.set("user_price",1),$.session.clear("user_price",1),location.reload()}),$("#usd").click(function(){$.session.set("user_price",2),location.reload()}),1==$.session.get("user_price")&&($(".price_rs").css("display","block"),$(".price_usd").css("display","none")),2==$.session.get("user_price")&&($(".price_usd").css("display","block"),$(".price_rs").css("display","none"))});
		
	</script>


		<!-- header-top-area-start -->
		<div class="header-top-area black-bg ptb-7">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-12 hidden-xs">
						<div class="header-top-left">
							<span style="">
								<a href="whatsapp://send?phone=+94777444584"><img class="s-icon" src="img/whatup.png" style="width:28px;height:28px;"></a>
							</span>
								
							<span style="">
								<a href="viber://chat?number=%2B94777444584"><img class="s-icon" src="img/viber.png" ></a> 
							</span>

							<span style="">
								<a href="#"><img class="s-icon" src="img/imo.png"></a> 
							</span>

							<span style="">
								<a href="#"><img class="s-icon" src="img/wechat.png"></a>
							</span>

							<?php 
								$sqlc = "SELECT * FROM contact_number";
								$resultc = mysqli_query($conn, $sqlc);
								while($rowc = mysqli_fetch_array($resultc)){

								$number = $rowc['con_number'];
							?>

							<span style="color: #FF5313; font-weight: bold; font-size: 14px;">
								<?php echo $number." | "; ?>
							</span><?php } ?>
						</div>
					</div>
					<!-- MOBILE VIEW -->
					<div class="col-sm-12 hidden-md hidden-lg" style="padding-left: unset; padding-right: unset;">
						<div class="header-top-center">
							<span style="">
								<a href="whatsapp://send?phone=+94777444584"><img src="img/whatup.png"></a>
							</span>
								
							<span style="">
								<a href="viber://chat?number=%2B94777444584"><img src="img/viber.png"></a> 
							</span>

							<span style="">
								<a href="#"><img src="img/imo.png"></a> 
							</span>

							<span style="">
								<a href="#"><img class="s-icon" src="img/wechat.png"></a>
							</span>
							<br>

							<?php 
								$sqlc = "SELECT * FROM contact_number";
								$resultc = mysqli_query($conn, $sqlc);
								while($rowc = mysqli_fetch_array($resultc)){

								$number = $rowc['con_number'];
							?>
							

							<span style="color: #FF5313; font-weight: bold; font-size: 10px;">
								<?php echo $number." | "; ?>
							</span><?php } ?>
						</div>
					</div>

					<div class="col-lg-6 col-md-6 col-sm-8 hidden-xs">
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

				<div id="navbar" class="hidden-lg hidden-md">
						

					<nav>
					  <div class="container" style="padding-right: unset; padding-left: unset; margin-right: unset; margin-left: unset; width: unset;">
					  	<ul class="navbar-right pull-left">
							<div class="logo">
								<a href="https://cellparts.lk"><img src="img/logo.png" alt="" style="width:125px;"/></a>
							</div>
					  	</ul> 

					    <ul class="navbar-right pull-right">
					      <li><a href="cart" id="cart" style="font-size: 14px;"><i  class="fa fa-shopping-cart"></i> Cart <span class="badge badge-light count-item qty_count"></span><span class="price" >item(s)</span></a></li>
					    </ul> 
					  </div>
					</nav>
		         </div>


			<!-- header-top-area-end -->
			<!-- header-bottom-area-start -->
			<div class="header-bottom-area bg-color-1 ptb-25" >
				<div class="container">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 hidden-xs">
							<div class="logo">
								<a href="https://cellparts.lk"><img src="img/logo.png" alt="" style="width:220px;"/></a>
							</div>
						</div>
						<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
							<div class="header-bottom-middle" style="width: 65%;">
								<div class="top-search">
									<span class="tex_top_skype"><i class="fa fa-skype"></i>Skype: <span class="">cellparts.skype</span></span>
									<span class="tex_top_email"><i class="fa fa-envelope"></i>Email: <span class="">cellparts.lk@gmail.com</span></span>
								</div>
								<div class="search-box">
									
									<form method="post" action="search.php">


										<div class="topnav col-md-4 hidden-xs" style="padding-left: 10px; padding-right: 10px;">
										  <a href="#" class="active" onclick="myFunction3()" style=": #000; font-family: 'Montserrat', sans-serif; font-size: 13px; font-weight: 600; display: block; text-transform: uppercase; background:#262626; color: #eceff8;">All Categories <i class="fa fa-bars" style="float: right;"></i></a>
										  <div class="myLinks3">
										    <ul class="menu-content" style="max-height: 200px; overflow-y: auto; ">


										      <?php $sqlm = mysqli_query($conn, "SELECT * FROM cat WHERE flag=1 ORDER BY cat ASC");
										      if(mysqli_num_rows($sqlm) > 0) { 

										        while($rowm = mysqli_fetch_array($sqlm)) {
										          ?>

										          <li class="level-1 parent nav_parent" style="border-bottom: 1px solid #f2f2f2;">
										            <a style="cursor: pointer; position: relative; font-family: 'Montserrat', sans-serif; text-transform: uppercase; font-weight: 400; color: #ebe2e2;"><span style="color: #777;"><?php echo $rowm['cat'] ?></span><i class="icon icon-angle-down" style="float: right;"></i></a>

										            <?php $sqlu = mysqli_query($conn, "SELECT * FROM scat WHERE ccode='".$rowm['ccode']."' ORDER BY subcat ASC");
										            if(mysqli_num_rows($sqlu) > 0) { ?>
										              <ul class="menu-dropdown cat-drop-menu lab-sub-auto nav_sub_menu" style="max-height: 400px;overflow-y: auto; display: none; padding: 0 0 0 15px;">
										                <?php while($row = mysqli_fetch_array($sqlu)) { ?>
										                  <li class="level-2 parent" style="border-bottom: 1px solid #f2f2f2;">
										                    <a href="products.php?subc=<?php echo $row['sccode']; ?>" class="page_rederaction" style="font-family: 'Montserrat', sans-serif;  font-weight: 400; color: #ebe2e2;"><span><?php echo $row['subcat']; ?></span></a>
										                  </li>
										                <?php } ?>
										              </ul>
										            <?php } ?>
										          </li>
										        <?php }} ?>


										      </div>
										    </div>
										
										<div class="col-md-8 col-xs-12" style="padding-right: unset; padding-left: unset;"> 
											<input type="text" placeholder="Search..." name="search"/>
											<button><i class="fa fa-search"></i></button>
										</div>

									</form>
								</div>								
							</div>
							<div class="header-bottom-right" style="width: 35%;">
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
													<span class="count-item qty_count"></span>

													<span class="price" >items</span><br>
													<span class="price tot" ></span>
												</a>
											</div>
										</div>
										<div class="top-cart-content">
											<ol class="mini-products-list">



											</ol>
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
	function cart_data_load_show(){var t=$("#u_id").val(),s=0,e=0,i="";$(".mini-products-list").html("").append("No Items available in the cart"),$.post("connection/cart_data_load.php",{cart_data_load_show:"data",uid:t},function(t){$.each(t,function(t,a){var o;1==$.session.get("user_price")&&(o="Rs."+parseFloat(a.price).toFixed(2)),2==$.session.get("user_price")&&(o="$."+(a.price/a.dollar).toFixed(2)),i+="<li>",i+='<div class="product-details"><p class="cartproduct-name"><a href="">'+a.name+'</a></p><strong class="qty">Qty: '+a.Qty+'</strong><span class="sig-price">'+o+"</span></div>",i+='<div class="pro-action"><a class="btn-remove" href="#" data-row-no = '+a.id+">remove</a></div>",i+="</li>",$(".mini-products-list").html("").append(i),1==$.session.get("user_price")&&(s+=a.Qty*a.price),2==$.session.get("user_price")&&(s+=a.Qty*a.price/a.dollar),e+=parseInt(a.Qty)}),$(".qty_count").text(e),$(".btn-remove").click(function(){id_for_delete=$(this).attr("data-row-no"),$.post("connection/cart_data_load.php",{delete_cart_top:"data",id_for_delete:id_for_delete},function(t){"ok"===t&&cart_data_load_show()})}),1==$.session.get("user_price")&&$(".stot").text("Rs. "+s.toFixed(2)),2==$.session.get("user_price")&&$(".stot").text("$ "+s.toFixed(2))},"json")}function wish_list(){var t=$("#u_id").val();$.post("connection/wish_list.php",{wish_list_count:"data",uid:t},function(t){$.each(t,function(t,s){$("#wish_count").text(s.wish_cnt)})},"json")}function myFunction3(){var t=$(".myLinks3");"block"==t.css("display")?t.slideUp("slow"):t.slideDown("slow")}cart_data_load_show(),$(".nav_parent").click(function(){var t=$(this).children("ul.nav_sub_menu");"block"==t.css("display")?t.slideUp():($(".nav_sub_menu").slideUp(),t.slideDown())});
        	

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.7.5/js/bootstrap-select.min.js"></script>









