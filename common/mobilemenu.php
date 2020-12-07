		
		
		<div class="topnav2 hidden-lg hidden-md">
			<div class="col-sm-12 col-xs-12" style="padding: unset;"> 
				<div class="col-sm-3 col-xs-3">
					<a class="<?php if(basename($_SERVER['PHP_SELF'])=='index.php'){echo 'active';} ?>" href="index">Home</a>
				</div>
				<div class="col-sm-3 col-xs-3">
					<a class="<?php if(basename($_SERVER['PHP_SELF'])=='about-us-sumedacellular-kurunegala-srilanka.php'){echo 'active';} ?> " href="about-us-sumedacellular-kurunegala-srilanka">About</a>
				</div>
				<div class="col-sm-3 col-xs-3">
					<a class="<?php if(basename($_SERVER['PHP_SELF'])=='track-order'){echo 'active';} ?> " href="track-order">Track</a>
				</div>
				<div class="col-sm-3 col-xs-3">
					<a class="<?php if(basename($_SERVER['PHP_SELF'])=='customer_review.php'){echo 'active';} ?> " href="customer_review">Reviews</a>
				</div>
			</div>	

		  <div class="">
		  	<?php if(empty($log)) { ?>
		  	<a class="<?php if(basename($_SERVER['PHP_SELF'])=='register.php'){echo 'active';} ?> pull-right" href="register"> Register</a>
		  	<a class="<?php if(basename($_SERVER['PHP_SELF'])=='login_cart.php'){echo 'active';} ?>  pull-left" href="login_cart">Login</a>
		  	<?php } else { ?>
		  	<a href="user_acc/" class="pull-right"> My Account</a>
		  	<a href="destroy" class="pull-left"> Logout</a>
		  	<?php } ?>
		  </div>
		  
		</div>	

		<div class="mobile-container">

		  <!-- Top Navigation Menu -->
		  <div class="topnav hidden-sm hidden-md hidden-lg">
		    <a href="#" class="active" onclick="myFunction2()" style="padding: 15px 15px; color: #000; font-family: 'Montserrat', sans-serif; font-size: 15px; font-weight: 600; display: block; text-transform: uppercase; background:#262626; color: #eceff8;">Categories <i class="fa fa-bars" style="float: right;"></i></a>
		    <div id="myLinks" style="background: #262626;">
		      <ul class="menu-content">


		        <?php $sqlm = mysqli_query($conn, "SELECT * FROM cat ORDER BY cat ASC");
		        if(mysqli_num_rows($sqlm) > 0) { 

		          while($rowm = mysqli_fetch_array($sqlm)) {
		            ?>

		            <li class="level-1 parent nav_parent2" style="border-bottom: 1px solid #f2f2f2;">
		              <a style="cursor: pointer; position: relative; font-family: 'Montserrat', sans-serif; text-transform: uppercase; font-weight: 400; color: #333333;"><span style="color: #999797;"><?php echo $rowm['cat'] ?></span><i class="icon icon-angle-down" style="float: right;"></i></a>

		              <?php $sqlu = mysqli_query($conn, "SELECT * FROM scat WHERE ccode='".$rowm['ccode']."' ORDER BY subcat ASC");
		              if(mysqli_num_rows($sqlu) > 0) { ?>
		                <ul class="menu-dropdown cat-drop-menu lab-sub-auto nav_sub_menu" style="max-height: 400px;overflow-y: auto; display: none; padding: 0 0 0 15px;">
		                  <?php while($row = mysqli_fetch_array($sqlu)) { ?>
		                    <li class="level-2 parent" style="border-bottom: 1px solid #f2f2f2;">
		                      <a href="products.php?subc=<?php echo $row['sccode']; ?>" class="page_rederaction" style="font-family: 'Montserrat', sans-serif;  font-weight: 400; color: #ccc;"><span><?php echo $row['subcat']; ?></span></a>
		                    </li>
		                  <?php } ?>
		                </ul>
		              <?php } ?>
		            </li>
		          <?php }} ?>


		        </div>
		      </div>

		    </div>										

		<script>
			function myFunction2(){var n=$("#myLinks");"block"==n.css("display")?n.slideUp():n.slideDown()}$(".nav_parent2").click(function(){var n=$(this).children("ul.nav_sub_menu");"block"==n.css("display")?n.slideUp():($(".nav_sub_menu").slideUp(),n.slideDown())});
		  
		</script>

			