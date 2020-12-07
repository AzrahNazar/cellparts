<?php include "db/db.php"; 

session_start();





if ((isset($_SESSION['user'])))

{

$log=htmlspecialchars(trim($_SESSION['user']), ENT_QUOTES, 'UTF-8');

//$id=htmlspecialchars(trim($_SESSION['id']), ENT_QUOTES, 'UTF-8');

}





if (empty($log)) {



} else {



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

	while ($rowm = mysqli_fetch_array($resultm)) {



	    $dollar = $rowm['doller'];

		

	}

?>

<!doctype html>

<html class="no-js" lang="en">

    <head>

        <meta charset="utf-8">

        <meta http-equiv="x-ua-compatible" content="ie=edge">

        <title>CellParts.lk</title>

    

        <meta name="viewport" content="width=device-width, initial-scale=1">

<meta name="description" content="Contact Us CellParts.lk Mobile Phone and mobile accessories in Sri Lanka" />

<meta name="keywords" content="CellParts.lk,srilanka,mobile phones, Mobile Phone Prices in Sri Lanka, Nokia Phones, Samsung, Sony Ericsson, LG, HTC, iPhone, Send Free ,Mobile Phone Classifieds,Sri lanka phone Accessories,phone Accessories,sri lanka phone Accessories prices,phone Accessories prices in sri lanka,Bluetooth Accessories for Sale in Sri Lanka,PDA Accessories,Nokia Phones,New & Used Mobile Phones,Nokia, Samsung, Sony Ericsson, Motorola, LG, HTC, iPhone, Blackberry,Mobile Phone News" />

		

		

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





.accordian {

  width: 100%;;

  box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);

  margin: 5% auto;

  color: #b5b5b5;

}

.accordian .title {

  background-color: #fff;

  color:#666666;

  padding: 1rem;

  margin: 0;

  border-bottom: 1px solid rgba(0, 0, 0, 0.1);

  font-weight: 600;

  transition: all .25s ease;

  font-size:16px;

}

.accordian .title:hover {

  background-color: rgba(0, 0, 0, 0.005);

}

.accordian ul li:last-child .title {

  border-bottom: 0;

}

.accordian ul ul li a {

  display: block;

  background-color: #eee;

  padding: 1rem;

  color: #666666;

  border-bottom: 1px solid rgba(0, 0, 0, 0.05);

  font-size:14px;

}

.accordian ul ul li a:hover {

  background-color: #55acee;

  color: #fff;

}

.accordian ul ul {

  display: none;

}

.open {

  transform: rotate(45deg);

  transition: all .25s ease;

}

.accordian ul ul li:last-child a {

  border-bottom: 0;

}

.fa {

  transition: all .25s ease;

  

}

.accordian h3 {

  cursor: pointer;

}



	

</style>	



    </head>

	

	

    <body>

  

        <!-- Add your site or application content here -->

        <!-- header -->

					<?php include "common/header.php";?>

					<!-- header -->

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

		<div class="slider-area">

			<div class="container">

				<div class="row">

					<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12"></div>-->

					<div class="col-lg-9 col-md-9 col-sm-12">

				

						<div class="slider-product dotted-style-1 none-sm" >

							

							<h2> FAQ's</h2>

														

							

						</div>

						

						

	<div class="main-slider" style="margin-top:20px;">

	

	<div class="slider-container">

		<div class="accordian">

  <ul>

    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        Where are you located?

      </h3>

      <ul>

        <li><a href="#">No:13, Maliyadeva Street,

1st Floor, New Busstand Complex,

Kurunegala</a></li>

       

      </ul>

    </li>

    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        Can I purchase items offline?

      </h3>

      <ul>

        <li><a href="#">Definitely, please come and visit us on above address. Wide range of items available for you to choose.</a></li>

       

      </ul>

    </li>

      <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        Can I purchase items which are not listed in the website?

      </h3>

      <ul>

        <li><a href="#">Yes, we do support for custom orders. Please drop us an email to cellparts.lk and we will reply you after checking the availability.</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        What are the payment methods supported at the website?

      </h3>

      <ul>

        <li><a href="#">We do support Credit/Debit Card, Mobile Wallet and Internet Banking via payment gateways, other than that you can pay for orders using bank deposit to our bank account in Sampath Bank.</a>

	<img src="img/payment.png" style="margin-top:8px;"/>

		

		</li>

     

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        Can I buy items on credit?

      </h3>

      <ul>

        <li><a href="#">Yes, But only if you are representing a reputed company. Credit process will be initiated after issuing a quotation from our end and followed by a valued purchase order (PO) from your end. Maximum credit period would be 30 days.</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        What are the delivery methods available?

      </h3>

      <ul>

        <li><a href="#">Quick Delivery : Duration 1-2 Days depending on your location.<br> 

Sri Lanka Post : Duration 2-3 Days depending on your location.</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        How do I create an account?

      </h3>

      <ul>

        <li><a href="#">Please go to the front page of our website, www.cellparts.lk, and click the Register Now link at the top-right corner. Enter your details  and then click the "CREATE ACCOUNT" button</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        How can I pay for an online order?

      </h3>

      <ul>

        <li><a href="#">A payment method can be chosen from the given options while making an online order in the “Review & Payments” stage. 

The options available are:<br>

Credit/Debit Card, Mobile Wallet and Internet Banking via PayHere - When this option is selected and click on the “Place Order” button, you will be automatically redirected to a website (payhere.lk). Here you make the payment either through a Credit/Debit Card, Mobile Wallet or Internet Banking. Once you submit the payment you will be redirected back to the CellParts website and you will see the 9 digit order number.<br>

Bank Transfer / Bank Deposit - Bank account details will be given when this option is selected. You have to continue with the order and finalize it by placing the order by clicking on the “Place Order” button. You can then make the payment by transferring money to our bank account. The order will be shipped only after a payment is made.

</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

        How is my online order delivered, how long it will take and how can it be tracked?

      </h3>

      <ul>

        <li><a href="#">There are two delivery option methods: <br>

Sri Lankan post - if you want the items delivered through standard post. This will usually take 2 – 3 days for the parcel to arrive, or even more depending on the destination. These are not registered thus there will not be a way of tracking them.<br>

Quick Delivery - if you want the items delivered through a courier service. You should receive the items the next day (1 day) after payment (a delivery to Jaffna takes 2 days). Our courier service is handled by a third party.After we hand over the parcel to the courier service we will send the customer a shipping confirmation email with a tracking number and contact details of the courier service.</a></li>     

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

       What are the extra charges for online payments?

      </h3>

      <ul>

        <li><a href="#">PayHere : 3.3% of the transaction value + LKR30.00 will be applied as transaction fees . *<br>



2Checkout : 3.9% of the transaction value + 0.45USD will be applied as transaction fees . *<br>



* Subjected to change without prior notice</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

       To which areas do you make deliveries through courier?

      </h3>

      <ul>

        <li>

		<a href="#">Our courier deliveries are handled by Lanka Courier Service. They deliver the products island wide.</a></li>

       

      </ul>

    </li>

	

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

       Can all items in your site be delivered through Sri Lanka post?

      </h3>

      <ul>

        <li><a href="#">There are a few items that are not allowed to be sent through standard post. If your order includes such an item then the option of “Sri Lankan Post” in the “Delivery Method” stage when you make an online order will not be available. Usually these items include chemicals and some materials used in PCB manufacturing.</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

       Do you store any credit card information in your website?

      </h3>

      <ul>

        <li><a href="#">Nope, we don’t. That is why we have handed the responsibility of handling credit card payments to PayHere, an online payment processing service. More details can be found on their website at www.payhere.lk.</a></li>

       

      </ul>

    </li>

	    <li>

      <h3 class="title"><span class="fa fa-plus"></span>

       Do I recieve warranty for any products I buy from your store?

      </h3>

      <ul>

        <li><a href="#">Unfortunately it is impossible for us to give you a warranty for electronic products. For Aptinex products (These are our company products) we will provide a service warranty for a limited period where we will replace any component parts (please note that the customer will have to pay for the replaced components) and provide any technical assistance you require.</a></li>

       

      </ul>

    </li>



		<li>

      <h3 class="title"><span class="fa fa-plus"></span>

   What are the opening and closing time of your store?

      </h3>

      <ul>

        <li><a href="#">We are open from 8:00am to 5:30pm on weekdays (Monday to Friday). We are closed on Sundays and on mercantile holidays.</a></li>

       

      </ul>

    </li>

	

		<li>

      <h3 class="title"><span class="fa fa-plus"></span>

   Can you give us your bank account details for us to transfer money for an order?

      </h3>

      <ul>

        <li><a href="#">Of course we can! Here you go...<br><br>

          Account Name : O.A.A.M.Amarasekara<br>
          Account No. : 100657746319<br>
          Bank : Sampath Bank<br>
          Branch : Kurunagala Super</a>
        </li>

        <li><a href="#">
          Account Hoder's Name:  K. Ranasinghe<br>
          Account Number: 100120010283<br>
          Bank:  Nations Trust Bank<br>
          Branch: Kurunegala</a>
        </li>

        <li><a href="#">
          Account Hoder's Name:  O.A.A.M.Amarasekara<br>
          Account Number: 334100120000845<br>
          Bank:  Peoples Bank</a>
        </li>

        <li><a href="#">
          Account Hoder's Name:  O.A.A.M.Amarasekara<br>
          Account Number: 85874556<br>
          Bank:  Bank of Ceylon<br>
          Branch Code: 513 <br>
          Branch: 2nd City Branch, Kurunegala</a>
        </li>
       

      </ul>



    </li>

  </ul>

</div>

					

							</div>	

						</div>

						

						<script>

						

$(function(){

  $(".accordian h3").click(function(e){

    $('accordian h3').find('.fa.fa-plus open').toggleClass('open');

    $($(e.target).find('.fa.fa-plus').toggleClass('open'));

  $(".accordian ul ul").slideUp();

    if ($(this).next().is(":hidden")){

    $(this).next().slideDown();

    }

  });

  



});

						

						</script>

						

						

						

					</div>

					<!--<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12" style="margin-bottom:10px;">

						<div class="slider-sidebar">

						<?php 

					  /*$sql3="SELECT * FROM minibanner_top LIMIT 1";

					  $result3=mysqli_query($conn,$sql3);

					  while ($row3 = mysqli_fetch_array($result3)){ ?>

						

							<div class="slider-single-img mb-20">

								<a href="#">

									<img class="img_a" src="img/menu-l/1-5.jpg" alt="" />

									<img class="img_b" src="img/menu-l/1-5.jpg" alt="" />

								</a>

							</div>

								<?php } ?>

							

									<?php 

								

					  $sql3="SELECT * FROM minibanner_bottom LIMIT 1";

					  $result3=mysqli_query($conn,$sql3);

					  while ($row3 = mysqli_fetch_array($result3)){ */?>

							

							<div class="slider-single-img none-sm">

								<a href="#">

								<img class="img_a" src="img/menu-l/1-3.jpg" alt="" style="height:409px; width:300px;"/>

								<img class="img_b" src="img/menu-l/1-3.jpg" alt="" style="height:409px;width:300px;"/>

								</a>

							</div>

							<?php //} ?>

							

						</div>

					</div>-->

				</div>

			</div>

		</div>

		<!-- slider-area-end -->

		

		<!-- newletter-area-end -->

		<?php include "common/footer.php"; ?>

		<!-- copyright-area-start -->



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

