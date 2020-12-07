<!DOCTYPE html>
<html>
<head>
	<title>test</title>

	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twbs-pagination/1.4.1/jquery.twbsPagination.min.js"></script>
	<style type="text/css">
		.wrapper{
		  margin: 60px auto;
		  text-align: center;
		}
		h1{
		  margin-bottom: 1.25em;
		}
		#pagination-demo{
		  display: inline-block;
		  margin-bottom: 1.75em;
		}
		#pagination-demo li{
		  display: inline-block;
		}

		.page-content{
		  background: #eee;
		  display: inline-block;
		  padding: 10px;
		  width: 100%;
		  max-width: 660px;
		}
	</style>
</head>
<body>

	<div class="wrapper">
  <div class="container">
    
    <div class="row">
      <div class="col-sm-12">
        <h1>jQuery Pagination</h1>
        <p>Simple pagination using the TWBS pagination JS library. Click the buttons below to navigate to the appropriate content</p>
        <ul id="pagination-demo" class="pagination-sm"></ul>
      </div>
    </div>

    <div id="page-content" class="page-content">Page 1</div>
  </div>
</div>

<script type="text/javascript">
	$('#pagination-demo').twbsPagination({
        totalPages: 16,
        visiblePages: 6,
        next: 'Next',
        prev: 'Prev',
        onPageClick: function (event, page) {
            //fetch content and render here
            $('#page-content').text('Page ' + page) + ' content here';
        }
    })
</script>

</body>
</html>



<!-- <!DOCTYPE html>
<html>
<head>
	<title>test2</title>

	<link type="text/css" rel="stylesheet" href="pagination/simplePagination.css"/>

	<script type="text/javascript" src="pagination/tests/lib/jquery.min.js"></script>
	<script type="text/javascript" src="pagination/jquery.simplePagination.js"></script>
</head>
<body>
	<div class="test"></div>

	<script type="text/javascript">
		$(function() {
		    $(".test").pagination({
		        items: 100,
		        itemsOnPage: 10,
		        cssStyle: 'light-theme'
		    });
		});

	</script>

</body>
</html> -->