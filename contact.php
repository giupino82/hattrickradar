<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hattrick Radar</title>
    <link rel="icon" href="img/favicon.ico" type="image/x-icon"/>
    
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
   
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.php">HT<span>Radar</span></a></h1>
                    </div>
                </div>
                
                <!--div class="col-sm-6">
                    <div class="shopping-item">
                        <a href="cart.html">Cart - <span class="cart-amunt">$800</span> <i class="fa fa-shopping-cart"></i> <span class="product-count">5</span></a>
                    </div>
                </div-->
            </div>
        </div>
    </div> <!-- End site branding area -->
    
    <div class="mainmenu-area">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div> 
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="radar.php">Compare players</a></li>
						
						<?php
						session_start();
                        if(!isset($_SESSION['HT'])){
                        	echo '<li><a href="login.php">Login</a></li>';
                        } else {
                        	echo '<li><a href="logout.php">Logout</a></li>';
                        }
                        ?>
						
                        <li class="active"><a href="contact.php">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="container">
		<div class="row">
			<div class="col-md-12 text-center"><br>
				<h2>Giupino</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<a href="https://www.hattrick.org/Club/Manager/?teamId=1691764" class="thumbnail">
					<img src="img/avatar.jpg">
				</a>
			</div>
			<div class="col-md-8">
				<p>Computer Engineer, IT consulting, and an embarrassing number of hobbies and passions. <br>
				Husband (happy) of a wife (<del>un</del>happy) and father of two beautiful children.</p>
				<p>Follow me on twitter: <a href="https://twitter.com/giupino"> here </a> </p>
				<p><a href="mailto:secondodevita@gmail.com">Send me a mail</a> </p>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"><br>
				<h2>Margar</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<a href="http://martinagarofalo.it" class="thumbnail">
					<img src="...">
				</a>
			</div>
			<div class="col-md-8">
				<p>Vedi che vuoi scrivere</p>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center"><br>
				<h2>Thanks to...</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<p><a href="https://www.hattrick.org"> Hattrick </a><p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<p><a href="https://github.com/jetwitaussi/PHT"> PHT </a> from <a href="https://www.hattrick.org/Club/Manager/?userId=653581" >teles</a><p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				<p>GitHub, yes we are <a href="https://github.com/giupino82/hattrickradar"> on it </a> <p>
			</div>
		</div>
	</div>


    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2017 HTRadar. Coded with <i class="fa fa-heart"></i> by <a href="http://martinagarofalo.it" target="_blank">Martina Garofalo</a> e <a href="contact.php">Giuseppe Garofalo.</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
  </body>
</html>
