<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hattrick Radar</title>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    
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
   
    <!--div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="user-menu">
                        <ul>
                            <li><a href="#"><i class="fa fa-user"></i> My Account</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href="cart.html"><i class="fa fa-user"></i> My Cart</a></li>
                            <li><a href="checkout.html"><i class="fa fa-user"></i> Checkout</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Login</a></li>
                        </ul>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="header-right">
                        <ul class="list-unstyled list-inline">
                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">INR</a></li>
                                    <li><a href="#">GBP</a></li>
                                </ul>
                            </li>

                            <li class="dropdown dropdown-small">
                                <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">English</a></li>
                                    <li><a href="#">French</a></li>
                                    <li><a href="#">German</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div--> <!-- End header area -->
    
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.html">HT<span>Radar</span></a></h1>
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
                        <li class="active"><a href="index.html">Home</a></li>
                        <li><a href="compare-player.html">Compare players</a></li>
						<li><a href="#">Login</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>  
            </div>
        </div>
    </div> <!-- End mainmenu area -->
    
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Frase ad effettoooo</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        <div class="container">
            <div class="row">
			  <div class="col-md-3" id="marketPlayer1">
			   <br>
				<div class="form-group">
					<label for="pID1">Player ID</label>
					<input type="text" class="pID1" id="pID1" style="font-size: x-small"/>
					<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(1)"></span>
				</div>
				<br>
                <div class="form-group" id="player1box">
				
				
                </div>
			  </div>
			  
            <div class="col-md-6" id="radarChart">
              <div style="margin-top:20px; text-align:center"><input type="submit" value="Compare"  onclick="drawRadar(); "/></div>
              <div id="container" ></div>
            </div>
			
			<div class="col-md-3" id="marketPlayer2">
			   <br>
				<div class="form-group">
					<label for="pID2">Player ID</label>
					<input type="text" class="pID2" id="pID2" style="font-size: x-small"/>
					<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(2)"></span>
				</div>
				<br>
                <div class="form-group" id="player2box">
				
				
                </div>
			  </div>
         </div>
      </div>
    
    
   
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2017 HTRadar. All Rights Reserved. Coded with <i class="fa fa-heart"></i> by <a href="http://wpexpand.com" target="_blank">WP Expand</a></p>
                    </div>
                </div>                               
            </div>
        </div>
    </div> <!-- End footer bottom area -->
   
    <!-- Latest jQuery form server -->
    <script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
	
	<script src="utils/bootstrap-slider-master/bootstrap-slider.min.js"></script>
	<link rel="stylesheet" href="utils/bootstrap-slider-master/bootstrap-slider.min.css"></link>
	
	<!--Chart-->
	<!--<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>-->
	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/highcharts-more.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	

  </body>
</html>


<script>


function recomputeValue(player){
	
	if(document.getElementById("skill"+player)){
		
		var playerDetails = document.getElementsByClassName("player"+player);
		
		var stamina = Number(playerDetails[0].innerHTML);
		if(playerDetails[playerDetails.length-1].style.color == "green")
			motherClubBonus = 0.5;
		else 
			motherClubBonus = 0;
		
		var sliderSkill = {};
		for(i=1;i<playerDetails.length-1;i++){
			sliderSkill[playerDetails[i].id] = playerDetails[i].value;
		}
		
		var toChange = document.getElementById("skill"+player).innerHTML;
		temp = 0;
		if(radarSkill[player])
			radarSkill[player].foreach(function(value){
				temp += value;
			});
		temp += sliderSkill.loyalty/20 + motherClubBonus + (Math.log10(sliderSkill.experience)*(4/3));
		temp *= Math.pow(((sliderSkill.form - 0.5)/7), 0.45) * Math.pow(((stamina + 6.5)/14), 0.6);
		
		toChange = temp;
	}
}

function changeStyle(heart){
	if(heart.style.color == "green")
		heart.style.color = "grey";
	else heart.style.color = green;
}

	radarOptions = {

			chart: {
				polar: true,
				type: 'line'
			},

			title: {
				//text: 'Your Player vs your Player etc...',
				text:'',
				x: -80
			},

			pane: {
				size: '80%'
			},

			xAxis: {
				categories: ['Keeper','Defender','Playmaker','Passing','Winger','Scorer','SetPieces'],
				tickmarkPlacement: 'on',
				lineWidth: 0
			},

			yAxis: {
				gridLineInterpolation: 'polygon',
				lineWidth: 0,
				min: 0,
				tickInterval:2
			},

			tooltip: {
				shared: true,
				pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y:,.0f}</b><br/>'
			},

			legend: {
				align: 'center',
				y: 70,
				layout: 'vertical'
			},

			series: [{
				//name: 'Player A',
				//data: [5,22,20,15,8,3,19],
				pointPlacement: 'on',
				color: '#277f31'
			}, {
				//name: 'Player B',
				//data: [15,2,20,15,8,7,15],
				pointPlacement: 'on'
			}]

		};

	function drawRadar(){
		Highcharts.chart('container', radarOptions);
		console.log(radarOptions);
	}
	
	var radarSkill = {};
	function retrieveMarketPlayer(playerNumber){
		
		var id = $("#pID"+playerNumber).val();
        if($.isNumeric(id)){
          $.ajax({
            type: "POST",
            url: 'retrievePlayer.php',
			dataType: "xml",
            data: {playerID: id, playerNum:playerNumber}
          }).done(function( a, e, o) {
			  console.log("sono in done");
			  console.log(o);
			  htmlBox = o.responseXML.getElementsByTagName("playerBox")[0].innerHTML;
			  document.getElementById("player"+playerNumber+"box").innerHTML = htmlBox.substring(9, htmlBox.length-3);
			  
			  $(".slider").slider({
					formatter: function(value) {
						return value;
					}
				});
			  $(".char"+playerNumber).on("change",recomputeValue(playerNumber));
			  
			  var stringArray = o.responseXML.getElementsByTagName("serie")[0].innerHTML;
			  stringArray = stringArray.substring(1, stringArray.length-1);
			  numberArray = stringArray.split(",").map(Number);
			  radarOptions.series[playerNumber-1].data = numberArray;
			  
			  radarSkill[playerNumber] = {};
			  radarSkillName = radarOptions.xAxis.categories;
			  for(i=0;i<numberArray.length;i++){
				  radarSkill[playerNumber][radarSkillName[i]] = numberArray[i];
			  }
			  radarOptions.series[playerNumber-1].name = o.responseXML.getElementsByTagName("name")[0].innerHTML;			
            }).error(function(err){
					console.log(err.responseText);
					
				});
		}
	}	
	

</script>