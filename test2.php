<!DOCTYPE html>
<html>
<head>
	<title>test</title>
	<!--Import materialize.css-->
      	<link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>


     
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

	<h2 style="color:#666666;">Gallery </h2>

		<div class="carousel">
          <a class="carousel-item" href="#one!"><img src="images/gallery/1.jpg" width="500px" height="300px"></a>
          <a class="carousel-item" href="#two!"><img src="images/gallery/2.jpg" width="500px" height="300px"></a>
          <a class="carousel-item" href="#three!"><img src="images/gallery/1.jpg" width="500px" height="300px"></a>
          <a class="carousel-item" href="#four!"><img src="images/gallery/3.jpg" width="500px" height="300px"></a>
          <a class="carousel-item" href="#five!"><img src="images/gallery/2.jpg" width="500px" height="300px"></a>
        </div>

<script>
      	//Carousel
         $(document).ready(function(){
          $('.carousel.carousel').carousel();
         });
      	

      </script>

		<!--JavaScript at end of body for optimized loading-->
      <script type="text/javascript" src="materialize/js/materialize.min.js"></script>
      
      <!-- Compiled and minified JavaScript -->
      <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script> -->
      <!--JavaScript at end of body for optimized loading-->
      <!-- <script type="text/javascript" src="js/materialize.min.js"></script> -->
</body>
</html>