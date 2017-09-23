<?php
	require_once 'PHT/autoload.php';
	session_start();

	$cookieToken = "*****";
	$cookieTokenSecret = "*****";

	$config = array(
			'CONSUMER_KEY' => '*****',
			'CONSUMER_SECRET' => '*****'
			//'CACHE' => 'apc',
			//'LOG_TYPE' => 'file',
			//'LOG_LEVEL' => \PHT\Log\Level::DEBUG,
			//'LOG_FILE' => __DIR__ . '/pht.log'
		);


	if(isset($_COOKIE[$cookieToken]) and isset($_COOKIE[$cookieTokenSecret]) ){
		$config['OAUTH_TOKEN'] = $_COOKIE[$cookieToken];
		$config['OAUTH_TOKEN_SECRET'] = $_COOKIE[$cookieTokenSecret];
	} elseif(isset($_SESSION['tmpToken'])){


		$HT = new \PHT\Connection($config);
		// retrive the $tmpToken saved in previous step
		$tmpToken = $_SESSION['tmpToken'];
		$access = $HT->getChppAccess($tmpToken, $_REQUEST['oauth_token'], $_REQUEST['oauth_verifier']);
		if ($access === false) {
			// handle failed connection
			echo "Impossible to confirm chpp connection";
			exit();
		}
		// if you want to save user credentials for future use
		// do it now by saving $access->oauthToken and $access->oauthTokenSecret
		// then you can request xml data
		$config['OAUTH_TOKEN'] = $access->oauthToken;
		$config['OAUTH_TOKEN_SECRET'] = $access->oauthTokenSecret;
		setcookie($cookieToken, $access->oauthToken, time() + (86400 * 360), "/");
		setcookie($cookieTokenSecret, $access->oauthTokenSecret, time() + (86400 * 360), "/");

	}

	if(isset($config['OAUTH_TOKEN'])){
		$HT = new \PHT\PHT($config);
		$_SESSION['HT']=$HT;
	}

?>



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
                        <li class="active"><a href="index.php">Home</a></li>
                        <li><a href="radar.php">Compare players</a></li>

                        <?php
                        if(!isset($_SESSION['HT'])){
                        	echo '<li><a href="login.php">Login</a></li>';
                        } else {
                        	echo '<li><a href="logout.php">Logout</a></li>';
                        }

                        ?>

                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="slider-area">
        <div class="zigzag-bottom"></div>
        <div id="slide-list" class="carousel carousel-fade slide" data-ride="carousel">
            
            <div class="slide-bulletz">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <ol class="carousel-indicators slide-indicators">
                                <li data-target="#slide-list" data-slide-to="0" class="active"></li>
                                <li data-target="#slide-list" data-slide-to="1"></li>
                                <!--<li data-target="#slide-list" data-slide-to="2"></li>-->
                            </ol>                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <div class="single-slide">
                        <div class="slide-bg slide-one"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>HT Radar</h2>
                                                <p>Compares a custom player and one of the market, changing experience, form and loyalty to see who is the best.<br>Compare two players from the market to decide who is the best for your team. <br>
												<a href="radar.php" class="readmore">Learn more</a>                                             
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="single-slide">
                        <div class="slide-bg slide-two"></div>
                        <div class="slide-text-wrapper">
                            <div class="slide-text">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-md-offset-6">
                                            <div class="slide-content">
                                                <h2>HT Radar</h2>
                                                <p>Compares a player of your team and one of the market, changing experience, form and loyalty to see who is the best.<br>
												Compares two players of your team to see who is the best.<br><h3>Coming soon!</h3></p>
												<!--<a href="radar.php" class="readmore">Learn more</a>-->
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
    </div> <!-- End slider area -->
    
 
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
