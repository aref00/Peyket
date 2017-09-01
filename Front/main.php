<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8' );
require_once('libs/config.php');
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}

	try {
		$conn = new PDO("mysql:host=". DB_HOST .";dbname=". DB_DATABASE .";charset=utf8", DB_USER , DB_PASSWORD);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
		$stmt = $conn->prepare("SELECT * FROM grocery ORDER BY id DESC LIMIT 0 , 10 "); 
		$stmt->execute();		
		$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

?>

<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Peyket</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://storage.googleapis.com/code.getmdl.io/1.0.6/material.min.js"></script>
  <script type="text/JavaScript" src="js/sha512.js"></script> 
  <script type="text/JavaScript" src="js/forms.js"></script> 
  <script src="project_files/js/main.js"></script>
  <script type="text/JavaScript" src="js/sha512.js"></script> 
  <script type="text/JavaScript" src="js/forms.js"></script> 
</head>
<body>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<div>
<nav class="navbar navbar-default navbar-inverse" role="navigation">
  <div class="container-fluid">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#Navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <strong class="navbar-brand">Peyket</strong> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="Navbar" >
      <ul class="nav navbar-nav">
        <li>

					<?php
		if (login_check($mysqli) == true) {
			echo '<a href="#">';
	    	echo htmlentities($_SESSION['username']) ;
			echo '<span class="sr-only">(current)</span></a> ';
} else {
	?>
		<a href="registration/login/">
    	Login
    	<span class="sr-only">(current)</span></a> 
    <?php
}
		?>
        
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Grocery</a> </li>
            <li><a href="#">Fruit</a> </li>
            <li><a href="#">Fast food</a> </li>
            <li class="divider"></li>
            <li><a href="#">Offers</a> </li>
            <li class="divider"></li>
            <li><a href="#">Best of all</a> </li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
      <ul class="nav navbar-nav navbar-right hidden-sm">
        <li><button onclick="showCart()" class="btn btn-danger navbar-btn"><span class="glyphicon glyphicon-shopping-cart"></span>Shoping Card</button>
        </li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
</div>


<div class="tab-content">
<div id="products" class="tab-pane active">






<div class="container">
    <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
        <div id="carousel1" class="carousel slide">
          <ol class="carousel-indicators">
            <li data-target="#carousel1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel1" data-slide-to="1" class=""></li>
            <li data-target="#carousel1" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active"> <img class="img-responsive" src="project_files/img/1920x500-1.jpg" alt="thumb"></img>
              <div class="carousel-caption"> We seve and deliver best foods for you. </div>
            </div>
            <div class="item"> <img class="img-responsive" src="project_files/img/1920x500-2.jpg" alt="thumb"></img>
              <div class="carousel-caption"> Every thing you want even friday. </div>
            </div>
            <div class="item"> <img class="img-responsive" src="project_files/img/1920x500-3.jpg" alt="thumb"></img>
              <div class="carousel-caption"> ingoone. </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel1" data-slide="prev"><span class="icon-prev"></span></a> <a class="right carousel-control" href="#carousel1" data-slide="next"><span class="icon-next"></span></a></div>
      </div>
</div>
    <hr>
  </div>
<div class="container">
  <div class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="project_files/img/40X40.gif"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>Free Delivery</h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="project_files/img/40X40.gif"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>Free Returns</h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
      <div class="row">
        <div class="col-lg-2 col-md-3 col-sm-3 col-xs-2"><img class="img-circle" alt="Free Shipping" src="project_files/img/delivery-3.png"></div>
        <div class="col-lg-6 col-md-9 col-sm-9 col-xs-9">
          <h4>Low Prices</h4>
        </div>
      </div>
    </div>
  </div>
</div>

<div>
<nav class="navbar navbar-default" role="navigation">
  <div class="container">

    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      <a class="navbar-brand">گروه ها</a> </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Grocery</a> </li>
            <li><a href="#">Fruit</a> </li>
            <li><a href="#">Fast food</a> </li>
            <li class="divider"></li>
            <li><a href="#">Offers</a> </li>
            <li class="divider"></li>
            <li><a href="#">Best of all</a> </li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Grocery</a> </li>
            <li><a href="#">Fruit</a> </li>
            <li><a href="#">Fast food</a> </li>
            <li class="divider"></li>
            <li><a href="#">Offers</a> </li>
            <li class="divider"></li>
            <li><a href="#">Best of all</a> </li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Grocery</a> </li>
            <li><a href="#">Fruit</a> </li>
            <li><a href="#">Fast food</a> </li>
            <li class="divider"></li>
            <li><a href="#">Offers</a> </li>
            <li class="divider"></li>
            <li><a href="#">Best of all</a> </li>
          </ul>
        </li>
        <li class="dropdown"> <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Category<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Grocery</a> </li>
            <li><a href="#">Fruit</a> </li>
            <li><a href="#">Fast food</a> </li>
            <li class="divider"></li>
            <li><a href="#">Offers</a> </li>
            <li class="divider"></li>
            <li><a href="#">Best of all</a> </li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-default">Submit</button>
      </form>
        </li>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container-fluid -->
</nav>
</div>



<hr>
<div class="container">
  <div class="row text-center">
	 
<?php
	$n = 0 ;
	$grocery = $stmt->fetchAll();
    foreach($grocery as $row) { 
		print "<div id='"   .   $row["id"]  .   "' data-price='" .   $row["price"]   .   "' class='col-sm-4 col-md-4 col-lg-4 col-xs-6'>";
        print "<div class='thumbnail'> <img id='img". $row["id"] . "'  src='upload_area/images/".$row["id"] .".jpg' alt='Thumbnail Image $n'  class='img-responsive'>";
		print "<div class='caption'>";
		echo "<h3 id='name" . $row["id"] ."' >" . $row["name"] . "</h3>";
		echo "<p>" 	.$row	["descri"].	"</p>";
		echo "<p><del>"	.$row ["rprice"].	"</del></p>";
		echo "<p id='price" . $row["id"] . "'>" 	.$row	["price"].	" R </p>";
		echo "<p><a onclick='AddToCart(" . $row['id'] . ")' class='btn btn-primary' role='button'><span class='glyphicon glyphicon-shopping-cart' aria-hidden='true'></span> Add to Cart</a></p>";
		print " </div>";
		print " </div>";
			print  "</div>";
    }
	
	}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
	
$conn = null;

?>
</div>

</div>
</div>
<div class="container tab-pane" id="cart" >
    <div class="row">
        <div class="col-sm-12 col-md-10 col-md-offset-1">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th class="text-center">Price</th>
                        <th class="text-center">Total</th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody id="card_table">
                
					</tbody>
					<script type="text/javascript" >
					window.onbeforeunload = confirmExit;
					</script>
					<tfoot>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Subtotal</h5></td>
                        <td  class="text-right"><h5><strong id="subtotal">0</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h5>Estimated shipping</h5></td>
                        <td  class="text-right"><h5><strong id="est_shipping">0</strong></h5></td>
                    </tr>
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td><h3>Total</h3></td>
                        <td class="text-right"><h3><strong id="total_price">0</strong></h3></td>
                    </tr> 
                    <tr>
                        <td>   </td>
                        <td>   </td>
                        <td>   </td>
                        <td>
                        <button type="button" class="btn btn-default" onclick='ContinueShoping()'>
                            <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                        </button></td>
                        <td>
                        <button type="button" class="btn btn-success">
                            Checkout <span class="glyphicon glyphicon-play"></span>
                        </button></td>
                    </tr>
                	</tfoot>
            </table>
        </div>
    </div>
</div>
</div>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    
    <footer class="text-center" style="background-color: #ddd;">
  <div class="container">

	<div class ="row">
		<div class="footerlinks col-md-3" >
			<h3>Categories</h3>
			<p><a href="#" title="Link">Contact Us </a></p>
			<p><a href="#" title="Link">About Us</a></p>
			<p><a href="#" title="Link">Support</a></p>
		</div>
				<div class="footerlinks col-md-3" >
				<h3>Categories</h3>
			<p><a href="#" title="Link">Contact Us </a></p>
			<p><a href="#" title="Link">About Us</a></p>
			<p><a href="#" title="Link">Support</a></p>
		</div>
				<div class="footerlinks col-md-3" >
				<h3>Categories</h3>
			<p><a href="#" title="Link">Contact Us </a></p>
			<p><a href="#" title="Link">About Us</a></p>
			<p><a href="#" title="Link">Support</a></p>
		</div>
		                <div class="col-lg-3 col-md-3"><!-- widgets column center -->
                
                   
                    
                        <ul class="list-unstyled clear-margins"><!-- widgets -->
                        
                        	<li class="widget-container widget_recent_news"><!-- widgets list -->
                    
                                <h1 class="title-widget">Contact Detail </h1>
                                
                                <div class="footerp"> 
                                
                                <h2 class="title-median">Peyket Pvt. Ltd.</h2>
                                <p><b>Email id:</b> <a href="mailto:info@picha.com">info@picha.com</a></p>
                                <p><b>Helpline Numbers </b>

    <b style="color:#ffc106;">(24 / 7):</b>  +98-12345678, +91-12345678  </p>
    
    <p><b>Corp Office / Postal Address</b></p>
    <p><b>Phone Numbers : </b>7042827160, </p>
    <p> 013-123545687, 12345678</p>
                                </div>
                                
                                <div class="social-icons">
                                
                                	<ul class="nomargin">
                                    
                <a href="https://www.facebook.com/bootsnipp"><i class="fa fa-facebook-square fa-3x social-fb" id="social"></i></a>
	            <a href="https://twitter.com/bootsnipp"><i class="fa fa-twitter-square fa-3x social-tw" id="social"></i></a>
	            <a href="https://plus.google.com/+Bootsnipp-page"><i class="fa fa-google-plus-square fa-3x social-gp" id="social"></i></a>
	            <a href="mailto:bootsnipp@gmail.com"><i class="fa fa-envelope-square fa-3x social-em" id="social"></i></a>
                                    
                                    </ul>
                                </div>
                    		</li>
                          </ul>
                       </div>
		    <div class="row">
	    <!-- This is the footer with default 3 divs -->
		<div class="col-sm-6">
			<p>We try our best for your health.</p>
		</div>
		<div class="col-sm-6">
			<p>Open source is our power.</p>
		</div>
	</div>
      <div class="col-xs-12">
        <p>Copyright © Peyket. All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>
<!--header-->

<div class="footer-bottom">

	<div class="container">

		<div class="row">

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="copyright">

					© 2017, Picha, All rights reserved

				</div>

			</div>

			<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">

				<div class="design">

					 <a href="#">RF </a> | <a href="#"> Web Design & Development by Picha</a>

				</div>

			</div>

		</div>

	</div>

</div>
</body>
</html>



        

