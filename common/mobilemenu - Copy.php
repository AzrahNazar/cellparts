		<div class="mobile-menu-area hidden-md hidden-lg ">

			<div class="container">

				<div class="row">

					<div class="col-md-12">

						<div class="mobile-menu">

							<nav id="mobile-menu">

								<ul>

									<li class="active"><a href="index">Home</a>

										

									</li>									

									<li><a href="about-us-sumedacellular-kurunegala-srilanka">About Us</a></li>

									<li><a href="accessories-sumedacellular-kurunegala-srilanka">Accessories</a></li>

									<li><a href="newarrivals-sumedacelullar-kurunegala-srilanka">New Arrivals</a></li>

									<li><a href="contact-us-sumedacellular-kurunegala-srilanka"> Contact Us</a></li>

									

									<li><a href=""> Free Download</a> </li>
									
									<li><a href="gallery"> Gallery</a> </li>
									
									<li><a href="faqs"> FAQ's</a></li>
									<?php if(empty($log)) { ?>
									<li><a href="register"> Register</a></li>
									<li><a href="login_cart">Login</a></li>
									<?php } else { ?>
									<li><a href="user_acc/"> My Account</a></li>
									<li><a href="destroy"> Logout</a></li>
									<?php } ?>
									

						<li><a href="http://www.sumedacellunlock.com">www.sumedaunlock.com</a></li>

								</ul>	

							</nav>

						</div>

					</div>

				</div>
			</div>
		</div>

				
		<div class="topnav hidden-lg hidden-md">

		  
		  <!-- Left-aligned links (default) -->
		  <a class="active" href="index">Home</a>
		  <a href="#contact">Contact</a>
		  
		  <!-- Right-aligned links -->
		  <div class="topnav-right">
		    <a href="#search">Search</a>
		    <a href="#about">About</a>
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
			      <li><a href="cart" id="cart" style="font-size: 14px;"><i  class="fa fa-shopping-cart"></i> Cart <span class="badge badge-light count-item qty_count"></span><span class="price" >items</span><!-- <br><span class="price stot pull-right" ></span> --></a></li>
			    </ul> 
			  </div>
			</nav>
         </div>											
		 

		

		<script>
		window.onscroll = function() {myFunction()};

		var navbar = document.getElementById("navbar");
		var sticky = navbar.offsetTop;

		function myFunction() {
		  if (window.pageYOffset >= sticky) {
		    navbar.classList.add("sticky")
		  } else {
		    navbar.classList.remove("sticky");
		  }
		}
		</script>

			