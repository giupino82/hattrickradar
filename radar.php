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
    <div class="site-branding-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                    <div class="logo">
                        <h1><a href="index.html">HT<span>Radar</span></a></h1>
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
                        <li><a href="index.php">Home</a></li>
                        <li class="active"><a href="radar.php">Compare players</a></li>

                        <?php
                        if(!isset($_SESSION['HT'])){
                        	echo '<li><a href="login.php">Login</a></li>';
                        } else {
                        	echo '<li><a href="logout.php">Logout</a></li>';
                        }

                        ?>

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
			
			  <div class="col-md-3" style="text-align:center">
				 <br>
				 <div class="radio">
					 <label><input type="radio" name="optradio1" checked="checked" onchange="document.getElementById('player1box').style.display='block';document.getElementById('marketCompare1').style.display='none';document.getElementById('player1boxmarket').style.display='none';changeName=true;recomputeValue(1,'other');">Manual</label>
				 </div>
				 <div class="radio">
					 <label><input type="radio" name="optradio1" onchange="document.getElementById('marketCompare1').style.display='block';document.getElementById('player1box').style.display='none';document.getElementById('player1boxmarket').style.display='none';">Market</label>
				  </div>
			
			   <div class="marketCompare1" id="marketCompare1" style="display:none">
					<div class="form-group">
						<label for="pID1">Player ID</label>
						<input type="text" class="pID1" id="pID1" style="font-size: x-small"/>
						<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(1)"></span>
					</div>
				</div>
				<br>
				<div id="player1boxmarket" style="display:none">
				</div>
                <div class="form-group" id="player1box" class="manualCompare1">
					<h2><span class='player1' >Custom player 1</span></h2><br>
					<h4>Stamina: <input type="number" id="stamina1" min="1" max="9" class="player1 char1" value="1"></h4><br>
					<h4>Player form <br><input id='form1' class='player1 slider char1' onchange="recomputeValue(1, 'other')" type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Experience <br><input id='experience1' class='player1 slider char1'  onchange="recomputeValue(1, 'other')" clatype='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Loyalty <br><input id='loyalty1' class='player1 slider char1'  onchange="recomputeValue(1, 'other')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Mother club bonus  <i class='player1 fa fa-heart' id="motherClubBonus1" style='color:grey' onclick="changeStyle(this);recomputeValue(1, 'other')"></i></h4>
					<div id='skillBox1' style='display:block'>
						<h4>Keeper <br><input id='Keeper1' class='player1 slider char1'  onchange="recomputeValue(1, 'Keeper')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Defender <br><input id='Defender1' class='player1 slider char1'  onchange="recomputeValue(1, 'Defender')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Playmaker <br><input id='Playmaker1' class='player1 slider char1'  onchange="recomputeValue(1, 'Playmaker')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Passing <br><input id='Passing1' class='player1 slider char1'  onchange="recomputeValue(1, 'Passing')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Winger <br><input id='Winger1' class='player1 slider char1'  onchange="recomputeValue(1, 'Winger')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Scorer <br><input id='Scorer1' class='player1 slider char1'  onchange="recomputeValue(1, 'Scorer')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>SetPieces <br><input id='SetPieces1' class='player1 slider char1'  onchange="recomputeValue(1, 'SetPieces')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					</div>
                </div>
			</div>
		 
            <div class="col-md-6" id="radarChart">
              <div style="margin-top:20px; text-align:center" ><input type="submit" value="Compare"  onclick="drawRadar(); " style="display:none"/></div>
              <div id="container"></div>
            </div>
			
			<div class="col-md-3" style="text-align:center">
			   <br>
			   <div class="radio">
					 <label><input type="radio" name="optradio2" checked="checked" onchange="document.getElementById('marketCompare2').style.display='none';document.getElementById('player2boxmarket').style.display='none';document.getElementById('playerbox2').style.display='block';changeName=true;recomputeValue(1,'other');">Manual</label>
				 </div>
				 <div class="radio">
					 <label><input type="radio" name="optradio2" onchange="document.getElementById('player2box').style.display='none';document.getElementById('player2boxmarket').style.display='none';document.getElementById('marketCompare2').style.display='block';">Market</label>
				  </div>
			
				<div class="marketCompare2" style="display:none">
					<div class="form-group">
						<label for="pID2">Player ID</label>
						<input type="text" class="pID2" id="pID2" style="font-size: x-small"/>
						<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(2)"></span>
					</div>
				</div>
				<br>
				<div id="player2boxmarket" style="display:none">
				</div>
                <div class="form-group" id="playerbox2" class="manualCompare2">
					<h2><span class='player2' >Custom player 2</span></h2><br>
					<h4>Stamina: <input type="number" id="stamina2" min="1" max="9" class="player2 char2" value="1"></h4><br>
					<h4>Player form <br><input id='form2' class='player2 slider char2' onchange="recomputeValue(2, 'other')" type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Experience <br><input id='experience2' class='player2 slider char2'  onchange="recomputeValue(2, 'other')" clatype='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Loyalty <br><input id='loyalty2' class='player2 slider char2'  onchange="recomputeValue(2, 'other')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Mother club bonus  <i class='player2 fa fa-heart' id="motherClubBonus2" style='color:grey' onclick="changeStyle(this);recomputeValue(2, 'other')"></i></h4>
					<div id='skillBox2' style='display:block'>
						<h4>Keeper <br><input id='Keeper2' class='player2 slider char2'  onchange="recomputeValue(2, 'Keeper')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Defender <br><input id='Defender2' class='player2 slider char2'  onchange="recomputeValue(2, 'Defender')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Playmaker <br><input id='Playmaker2' class='player2 slider char2'  onchange="recomputeValue(2, 'Playmaker')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Passing <br><input id='Passing2' class='player2 slider char2'  onchange="recomputeValue(2, 'Passing')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Winger <br><input id='Winger2' class='player2 slider char2'  onchange="recomputeValue(2, 'Winger')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>Scorer <br><input id='Scorer2' class='player2 slider char2'  onchange="recomputeValue(2, 'Scorer')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
						<h4>SetPieces <br><input id='SetPieces2' class='player2 slider char2'  onchange="recomputeValue(2, 'SetPieces')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					</div>
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

$(".slider").slider({
	formatter: function(value) {
		return value;
	}
});

var chart;
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
				min: 0
				//tickInterval:2
			},

			tooltip: {
				shared: true,
				pointFormat: '<span style="color:{series.color}">{series.name}: <b>{point.y}</b><br/>'
			},

			legend: {
				align: 'center'				
			},

			series: [{
				name: 'Custom Player 1',
				//data: [],
				pointPlacement: 'on',
				color: '#277f31'
			}, {
				name: 'Custom Player 2',
				//data: [],
				pointPlacement: 'on'
			}]

		};
		
//util object to save recomputed value 
var radarSkill = {};
var utilSkill = ['Keeper','Defender','Playmaker','Passing','Winger','Scorer','SetPieces'];
for(j=1;j<3;j++){
	radarSkill[j] = {};
	radarSkillName = radarOptions.xAxis.categories;
	newArray = [];
	//change length to generic
	for(i=0;i<7;i++){
		radarSkill[j][radarSkillName[i]] = 0.22;
		newArray[i] =  0.22;
	}
	radarOptions.series[j-1].data = newArray;
	drawRadar();
}

function recomputeValue(player, skill){
	
	var playerDetails = document.getElementsByClassName("player"+player);
	//var playerDetails = document.querySelectorAll(".player"+player);
	//console.log("."+type+"Compare"+player+" ."+"player"+player);
			//console.log(playerDetails.input#Scorer1);
	var stamina = Number(playerDetails["stamina"+player].value);
	if(playerDetails["motherClubBonus"+player].style.color == "green")
		motherClubBonus = 0.5;
	else 
		motherClubBonus = 0;
	
	var genericSkillSlider = ['form','experience','loyalty'];
	var sliderSkill = {};
	for(i=0;i<genericSkillSlider.length;i++){
		sliderSkill[genericSkillSlider[i]] = playerDetails[genericSkillSlider[i]+player].value;
	}
	
	if(skill == 'other'){

		if(radarSkill[player]){
			console.log(radarSkill[player]);
			for(var key in radarSkill[player]){
				//prendere dagli slider
				temp = 0;
				temp += Number(playerDetails[key+player].value);
				//temp += radarSkill[player][key];
				temp += sliderSkill.loyalty/20 + motherClubBonus + (Math.log10(sliderSkill.experience)*(4/3));
				temp *= Math.pow(((sliderSkill.form - 0.5)/7), 0.45);
				temp *= Math.pow(((stamina + 6.5)/14), 0.6);	
				radarSkill[player][key] = Math.round(temp * 100) / 100;
			}
		}	

	}else{
		newValue = document.getElementById(skill+""+player).value;
		temp = newValue;
		temp += sliderSkill.loyalty/20 + motherClubBonus + (Math.log10(sliderSkill.experience)*(4/3));
		temp *= Math.pow(((sliderSkill.form - 0.5)/7), 0.45) * Math.pow(((stamina + 6.5)/14), 0.6);	
		radarSkill[player][skill] = Math.round(temp * 100) / 100;
		
	}
	
	redrawRadar(player);
}

function redrawRadar(player){
	var chartBox = document.getElementById('container');
	//if(chartBox.innerHTML!=""){
		newArray = [];
		for(i=0;i<utilSkill.length;i++){
			newArray[i] = radarSkill[player][utilSkill[i]];
		}
		console.log(chart.series);
		//chart.series[player-1].update({data: newArray});
		chart.series[player-1].setData(newArray, true);
		
		/*if(changeName){
			chart.series[player-1].update({name:'Custom Player '+player}, false);
			changeName = false;
			chart.redraw();
		}*/
		//chart.redraw();
		//radarOptions.series[player-1].data = newArray;
		//drawRadar();
	//}
}

function changeStyle(heart){
	if(heart.style.color == "green")
		heart.style.color = "grey";
	else heart.style.color = "green";
}

	function drawRadar(){
		chart = Highcharts.chart('container', radarOptions);
	}
	
	function showHideBox(checkbox, number){
		box = document.getElementById("skillBox"+number+"market");
		console.log(checkbox.checked);
		
		if(checkbox.checked && box.style.display == "none")
			box.style.display = "block"; 
		else if(!checkbox.checked && box.style.display == "block")
			box.style.display = "none";
	}
	
	
	function retrieveMarketPlayer(playerNumber){
		
		var id = $("#pID"+playerNumber).val();
        if($.isNumeric(id)){
          $.ajax({
            type: "POST",
            url: 'retrievePlayer.php',
			dataType: "xml",
            data: {playerID: id, playerNum:playerNumber}
          }).done(function( a, e, o) {
			  console.log(o);
			  htmlBox = o.responseXML.getElementsByTagName("playerBox")[0].innerHTML;
			  document.getElementById("player"+playerNumber+"boxmarket").innerHTML = htmlBox.substring(9, htmlBox.length-3);
			  document.getElementById("player"+playerNumber+"boxmarket").style.display='block';
			  
			  $(".slidermarket"+playerNumber).slider({
					formatter: function(value) {
						console.log(value);
						return value;
					}
				});
			  //$(".char"+playerNumber).on("change",recomputeValue(playerNumber));
			  
			  var stringArray = o.responseXML.getElementsByTagName("serie")[0].innerHTML;
			  stringArray = stringArray.substring(1, stringArray.length-1);
			  numberArray = stringArray.split(",").map(Number);
			  //insert data directly in the radar options
			  radarOptions.series[playerNumber-1].data = numberArray;
			  
			  //save the information in the util object 
			  radarSkill[playerNumber] = {};
			  radarSkillName = radarOptions.xAxis.categories;
			  for(i=0;i<numberArray.length;i++){
				  radarSkill[playerNumber][radarSkillName[i]] = numberArray[i];
			  }
			  radarOptions.series[playerNumber-1].name = o.responseXML.getElementsByTagName("name")[0].innerHTML;
			  drawRadar();			  
            }).error(function(err){
					console.log(err.responseText);
			});
		}
	}	
	

</script>