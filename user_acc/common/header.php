<?php 
if(isset($_GET['pg'])) {
	$pg = htmlspecialchars(strip_tags(trim($_GET['pg'])), ENT_QUOTES, 'UTF-8');
} else {
	$pg = '';
}
?>

<div class="navbar navbar-fixed-top scroll-hide">
	<div class="container-fluid top-bar">
	  <div class=pull-right>
		<ul class="nav navbar-nav pull-right">
		  <li class="dropdown user"><a data-toggle=dropdown class=dropdown-toggle href="#" style="text-transform:capitalize;"> <img width=34 height=34 src="images/user.png"/><?php echo $name ?><b class=caret></b></a>
			<ul class=dropdown-menu>
			  <li><a href="../"> <i class="glyphicon glyphicon-shopping-cart"></i> Online Shopping</a> </li>
			  <li><a href="index"> <i class="fa fa-home"></i> Dashboard</a> </li>
			  <li><a href="../destroy.php"> <i class="fa fa-sign-out"></i> Logout</a> </li>
			</ul>
		  </li>
		</ul>
	  </div>
	  <button class=navbar-toggle><span class=icon-bar></span><span class=icon-bar></span><span class=icon-bar></span></button>
	  <a class="logo" href="../">CellParts.lk</a> </div>
	<div class="container-fluid main-nav clearfix">
	  <div class=nav-collapse>
		<ul class=nav>
		  <li><a class="<?php if($pg == '') { echo 'current'; } ?>" href="index"><i class="fa fa-home"></i>Dashboard</a></li>
		  <li><a href="wish-list"><i class="fa fa-heart"></i>Wish List</a></li>
		  <li><a class="<?php if($pg == 1) { echo 'current'; } ?>" href="online-orders?pg=1"><i class="fa fa-clipboard"></i>Pending Orders</a></li>
		  <li><a class="<?php if($pg == 2) { echo 'current'; } ?>" href="online-orders?pg=2"><i class="fa fa-check-square-o"></i>Accepted Orders</a></li>
		  <li><a class="<?php if($pg == 3) { echo 'current'; } ?>" href="online-orders?pg=3"><i class="fa fa-th-list"></i>Order History</a></li>
		  <li><a class="<?php if($pg == 4) { echo 'current'; } ?>" href="online-orders?pg=4"><i class="fa fa-map-marker"></i>Track Order</a></li>
		  <li><a href="user-account"> <i class="fa fa-user"></i>Edit Account</a></li>          
		  <li><a href="../"> <i class="fa fa-shopping-cart"></i>Online Shopping</a></li>
		</ul>
	  </div>
	</div>
</div>