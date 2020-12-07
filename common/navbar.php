<style>

::-webkit-scrollbar {
    width: 5px;
	height: 4px;
}

/* Track */
::-webkit-scrollbar-track {
    box-shadow: inset 0 0 5px grey; 
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    background: #FF5313; 
    border-radius: 10px;
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    background: #FF5313; 
}

.sticky {
  position: fixed;
  top: 0;
  width: 100%;
      z-index: 1000;

}
</style>

						<div class="mainmenu" >
							<nav>
								<ul>
								
								<li class="<?php if(basename($_SERVER['PHP_SELF'])=='index.php'){echo 'active';} ?>"><a href="index">Home</a></li>
									<li class="<?php if(basename($_SERVER['PHP_SELF'])=='about-us-sumedacellular-kurunegala-srilanka.php'){echo 'active';} ?> "><a href="about-us-sumedacellular-kurunegala-srilanka">About Us</a></li>
									<li class=" <?php if(basename($_SERVER['PHP_SELF'])=='accessories-sumedacellular-kurunegala-srilanka.php'){echo 'active';} ?>"><a href="accessories-sumedacellular-kurunegala-srilanka">Accessories</a></li>
									<li class="<?php if(basename($_SERVER['PHP_SELF'])=='newarrivals-sumedacelullar-kurunegala-srilanka.php'){echo 'active';} ?>" ><a href="newarrivals-sumedacelullar-kurunegala-srilanka">New Arrivals</a></li>
									<li class="<?php if(basename($_SERVER['PHP_SELF'])=='contact-us-sumedacellular-kurunegala-srilanka.php'){echo 'active';} ?>"><a href="contact-us-sumedacellular-kurunegala-srilanka">Contact Us</a></li>
									<!-- <li class="<?php // if(basename($_SERVER['PHP_SELF'])=='upload/index'){echo 'active';} ?>"><a href="upload/index">Free Download</a></li> -->

									<!-- <li>
										<div class="drpdwn">
											<a class="drpbtn">Track Product</a>
											<div class="dropdown-content">
											  <a style="color: #676565;" target="_blank" href="http://www.promptxpress.lk/Search">Prompt Express</a>
											  <a style="color: #676565;" target="_blank" href="https://customer.citypak.lk/index.jsp">Citypak</a>
											  <a style="color: #676565;" target="_blank" href="track-order">Track Order</a>
											</div>
										</div>

									</li> -->
									<li class="<?php if(basename($_SERVER['PHP_SELF'])=='track-order.php'){echo 'active';} ?>"><a href="track-order">Track Order</a></li>
									<li class="<?php if(basename($_SERVER['PHP_SELF'])=='gallery.php'){echo 'active';} ?>"><a href="gallery">Gallery</a></li>
									<li class="<?php if(basename($_SERVER['PHP_SELF'])=='customer_review.php'){echo 'active';} ?>"><a href="customer_review">Reviews</a></li>
									<li><a href="https://cellparts.lk/blog">Blog</a></li>
									
									
								</ul>
							</nav>
						</div>

				
	<script>
window.onscroll = function() {myFunction()};

var header = document.getElementById("myHeader");
var sticky = header.offsetTop;

function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
	
	
	$('.cat_display').css("display","none");
	
	$('.cat_dis').css("display","block");
	//$('.cat_display').css('background-image', 'url("img/logo.jpg")');
	
	
  } else {
    header.classList.remove("sticky");
	$('.cat_display').css("display","block");
	$('.cat_dis').css("display","none");
	
	
  }
}
</script>			

				
				