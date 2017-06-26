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
	<link rel="icon" href="img/favicon.ico" type="image/x-icon"/>

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

	<div class="container">
         <div class="row">
             <div class="col-md-12 text-center"><br>
				<h1>Compare players</h1>
			</div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
		  <div class="col-md-3" style="text-align:center">
			 <br>
			 <!--Manual-->
			 <div class="radio">
				 <label><input type="radio" name="optradio1" checked="checked" onchange="document.getElementById('teamCompare1').style.display='none';document.getElementById('player1boxteam').style.display='none';document.getElementById('player1box').style.display='block';document.getElementById('marketCompare1').style.display='none';document.getElementById('player1boxmarket').style.display='none';radio1 = 'manual';recomputeValue(1,'other');">Manual</label>
			 </div>
			 <!--Market-->
			 <div class="radio">
				 <label><input type="radio" name="optradio1" onchange="document.getElementById('teamCompare1').style.display='none';document.getElementById('player1boxselect').style.display='none';document.getElementById('marketCompare1').style.display='block';document.getElementById('player1box').style.display='none';document.getElementById('player1boxmarket').style.display='block';radio1 = 'market';recomputeValue(1,'other');">Market</label>
			  </div>
			  <!--Team-->
			  <div class="radio">
				 <label><input type="radio" name="optradio1" onchange="retrieveTeams(1);document.getElementById('marketCompare1').style.display='none';document.getElementById('teamCompare1').style.display='block';document.getElementById('player1boxselect').style.display='block';document.getElementById('player1box').style.display='none';document.getElementById('player1boxmarket').style.display='none';radio1 = 'select';recomputeValue(1,'other');">Team</label>
			  </div>
			 <br>
			 
			 <!--From Team-->
			<div class="teamCompare1" id="teamCompare1" style="display:none">
				<div class="form-group">
					<label for="selectPlayer1">Teams</label>
					<select class='selectpicker' id="selectPlayer1" data-live-search='true' title='Choose one player...' onchange='retrieveSelectPlayer(this,1);selectFirstRetrieve1=false'>
					</select>
				<!--	<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(1);marketFirstRetrieve1=false"></span>-->
				</div>
			</div>
			
			<div id="player1boxteam" style="display:none">
			</div>			
		
			<!--From Market-->
		   <div class="marketCompare1" id="marketCompare1" style="display:none">
				<div class="form-group">
					<label for="pID1">Player ID</label>
					<input type="text" class="pID1" id="pID1" style="font-size: x-small"/>
					<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(1);marketFirstRetrieve1=false"></span>
				</div>
			</div>
			<br>
			
			
			<div class='alert alert-danger fade in' id='danger-team-1'  style='display:none'>Error in retrieve teams.</div>
			<div class='alert alert-danger fade in' id='danger-retrieve-1'  style='display:none'>You have to login for this feature.</div>
			<div class='alert alert-danger fade in' id='danger-player-1'  style='display:none'>This player is not on market.</div>
			<div class='alert alert-danger fade in' id='danger-format-1'  style='display:none'>No valid format.</div>
			
			<!--Team-->
			<div id="player1boxselect" style="display:none">
			</div>
			
			<!--Market 1-->
			<div id="player1boxmarket" style="display:none">
			</div>
			
			<!--Manual 1-->
			<div class="form-group" id="player1box" class="manualCompare1">
				<h2><span class='player1 manual' >Custom player 1</span></h2><br>
				<h4>Stamina <br><input id='stamina1' class='player1 slider char1 manual1' onchange="recomputeValue(1, 'other')" type='text' data-slider-min='1' data-slider-max='9' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Player form <br><input id='form1' class='player1 slider char1 manual1' onchange="recomputeValue(1, 'other')" type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Experience <br><input id='experience1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'other')" clatype='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Loyalty <br><input id='loyalty1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'other')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Mother club bonus  <i class='player1 fa fa-heart manual1' id="motherClubBonus1" style='color:grey' onclick="changeStyle(this,1);recomputeValue(1, 'other')"></i></h4>
				<div id='skillBox1' style='display:block'>
					<h4>Keeper <br><input id='Keeper1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'Keeper')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Defender <br><input id='Defender1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'Defender')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Playmaker <br><input id='Playmaker1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'Playmaker')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Passing <br><input id='Passing1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'Passing')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Winger <br><input id='Winger1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'Winger')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Scorer <br><input id='Scorer1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'Scorer')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>SetPieces <br><input id='SetPieces1' class='player1 slider char1 manual1'  onchange="recomputeValue(1, 'SetPieces')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
				</div>
			</div>
			
		</div>
		<!--end player 1-->
	 
		<div class="col-md-6" id="radarChart">
		  <div style="margin-top:20px; text-align:center" ><input type="submit" value="Compare"  onclick="drawRadar(); " style="display:none"/></div>
		  <div id="container"></div><!--style="position: fixed;overflow: hidden;"-->
		</div>
		<!--end radar-->
		
		
		<div class="col-md-3" style="text-align:center">
		   <br>
			<!--Manual-->
			<div class="radio">
				 <label><input type="radio" name="optradio2" checked="checked" onchange="document.getElementById('teamCompare2').style.display='none';document.getElementById('player2boxteam').style.display='none';document.getElementById('marketCompare2').style.display='none';document.getElementById('player2boxmarket').style.display='none';document.getElementById('playerbox2').style.display='block';radio2 = 'manual';recomputeValue(2,'other');">Manual</label>
			 </div>
			 <!--Market-->
			 <div class="radio">
				 <label><input type="radio" name="optradio2" onchange="document.getElementById('teamCompare2').style.display='none';document.getElementById('player2boxselect').style.display='none';document.getElementById('playerbox2').style.display='none';document.getElementById('player2boxmarket').style.display='block';document.getElementById('marketCompare2').style.display='block';radio2='market';recomputeValue(2,'other');">Market</label>
			  </div>
			  <!--Team-->
			 <div class="radio">
				 <label><input type="radio" name="optradio2" onchange="retrieveTeams(2);document.getElementById('marketCompare2').style.display='none';document.getElementById('teamCompare2').style.display='block';document.getElementById('player2boxselect').style.display='block';document.getElementById('playerbox2').style.display='none';document.getElementById('player2boxmarket').style.display='none';radio2 = 'select';recomputeValue(2,'other');">Team</label>
			  </div>
			  
			  <br>
			<!--From Team-->
			<div class="teamCompare2" id="teamCompare2" style="display:none">
				<div class="form-group">
					<label for="selectPlayer2">Teams</label>
					 <select class='selectpicker' id="selectPlayer2" data-live-search='true' title='Choose one player...' onchange='retrieveSelectPlayer(this,2);selectFirstRetrieve2=false'>
					</select>
				<!--	<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(1);marketFirstRetrieve1=false"></span>-->
				</div>
			</div>
			
			<!--From Market-->
			<div class="bluePlayer">
				<div class="marketCompare2 bluePlayer"id="marketCompare2"  style="display:none">
					<div class="form-group">
						<label for="pID2">Player ID</label>
						<input type="text" class="pID2" id="pID2" style="font-size: x-small"/>
						<span class="glyphicon glyphicon-play" aria-hidden="true" style="size:20px" onclick="retrieveMarketPlayer(2);marketFirstRetrieve2=false;"></span>
					</div>
				</div>
				<br>
				<div id="player2boxmarket" style="display:none">
				</div>
			</div>
			
			
			<div class='alert alert-danger fade in' id='danger-team-2'  style='display:none'>Error in retrieve teams.</div>
			<div class='alert alert-danger fade in' id='danger-retrieve-2'  style='display:none'>You have to login for this feature.</div>
			<div class='alert alert-danger fade in' id='danger-player-2'  style='display:none'>This player is not on market.</div>
			<div class='alert alert-danger fade in' id='danger-format-2'  style='display:none'>No valid format.</div>
			
			
			<!--Team player 2-->
			<div id="player2boxteam" style="display:none">
			</div>
			<br>
			<div id="player2boxselect" style="display:none">
			</div>
			  
			
			<!--Manual 2-->			
			<div class="form-group bluePlayer" id="playerbox2" class="manualCompare2">
				<h2><span class='player2 manual' >Custom player 2</span></h2><br>
				<h4>Stamina <br><input id='stamina2' class='player2 slider char2 manual2' onchange="recomputeValue(2, 'other')" type='text' data-slider-min='1' data-slider-max='9' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Player form <br><input id='form2' class='player2 slider char2 manual2' onchange="recomputeValue(2, 'other')" type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Experience <br><input id='experience2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'other')" clatype='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Loyalty <br><input id='loyalty2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'other')" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
				<h4>Mother club bonus  <i class='player2 fa fa-heart manual2' id="motherClubBonus2" style='color:grey' onclick="changeStyle(this,2);recomputeValue(2, 'other')"></i></h4>
				<div id='skillBox2' style='display:block'>
					<h4>Keeper <br><input id='Keeper2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'Keeper')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Defender <br><input id='Defender2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'Defender')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Passing <br><input id='Passing2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'Passing')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Winger <br><input id='Winger2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'Winger')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>Scorer <br><input id='Scorer2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'Scorer')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
					<h4>SetPieces <br><input id='SetPieces2' class='player2 slider char2 manual2'  onchange="recomputeValue(2, 'SetPieces')" type='text' data-slider-min='0' data-slider-max='20' data-slider-step='1' data-slider-value='1'/><br>
				</div>
			</div>
		 </div>
		  <!--end player 2-->
		  
	 </div><!--end row-->
  </div><!--end main container-->
    
    
   
    
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="copyright">
                        <p>&copy; 2017 HTRadar. Coded with <i class="fa fa-heart"></i> by <a href="http://martinagarofalo.altervista.org" target="_blank">Martina Garofalo</a> e Giuseppe Garofalo.</p>
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
	
	<script src="utils/bootstrap-slider-master/bootstrap-slider.min.js"></script>
	<link rel="stylesheet" href="utils/bootstrap-slider-master/bootstrap-slider.min.css"></link>
	
	<link rel="stylesheet" href="utils/bootstrap-select.min.css"></link>
	<script src="utils/bootstrap-select.js"></script>
	

	
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
	var radio1 = 'manual';
	var radio2 = 'manual';

	var marketFirstRetrieve1 = true;
	var marketFirstRetrieve2 = true;
	var selectFirstRetrieve1 = true;
	var selectFirstRetrieve2 = true;

	var radarSkill = {};
	var utilSkill = ['Keeper','Defender','Playmaker','Passing','Winger','Scorer','SetPieces'];
	//initially create chart
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

		//no player retrieved from market yet
		if(eval('radio'+player)=='market'){
			if(eval('marketFirstRetrieve'+player))
				return;
		}else if(eval('radio'+player)=='select'){
				if(eval('selectFirstRetrieve'+player))
					return;
		}
		var playerDetails = document.getElementsByClassName(eval('radio'+player)+""+player);
		
		if(playerDetails["motherClubBonus"+player].style.color == "grey")
			motherClubBonus = 0;
		else 
			motherClubBonus = 0.5;
		
		var genericSkillSlider = ['stamina','form','experience','loyalty'];
		var sliderSkill = {};
		for(i=0;i<genericSkillSlider.length;i++){
			sliderSkill[genericSkillSlider[i]] = Number(playerDetails[genericSkillSlider[i]+player].value);
		}
		
		//recompute all value
		if(skill == 'other'){

			if(radarSkill[player]){
				for(var key in radarSkill[player]){
					temp = 0;
					temp += Number(playerDetails[key+player].value);
					temp += sliderSkill.loyalty/20 + motherClubBonus + (Math.log10(sliderSkill.experience)*(4/3));
					temp *= Math.pow(((sliderSkill.form - 0.5)/7), 0.45);
					temp *= Math.pow(((sliderSkill.stamina + 6.5)/14), 0.6);	
					radarSkill[player][key] = (Math.round(temp * 100)) / 100;
				}
			}	

		}else{ //recompute single value
			newValue = Number(document.getElementById(skill+""+player).value);
			temp = newValue;
			temp += sliderSkill.loyalty/20 + motherClubBonus + (Math.log10(sliderSkill.experience)*(4/3));
			temp *= Math.pow(((sliderSkill.form - 0.5)/7), 0.45) ;
			temp *= Math.pow(((sliderSkill.stamina + 6.5)/14), 0.6);			
			radarSkill[player][skill] = (Math.round(temp * 100)) / 100;
		}
		
		redrawRadar(player);
	}

	function redrawRadar(player){
		var chartBox = document.getElementById('container');
		newArray = [];
		for(i=0;i<utilSkill.length;i++){
			newArray[i] = radarSkill[player][utilSkill[i]];
		}
		chart.series[player-1].setData(newArray, true);
		
		if(eval('radio'+player) == 'manual'){
			chart.series[player-1].update({name:'Custom Player '+player}, false);
			chart.redraw();
		}else if(eval('radio'+player) == 'market'){
			name = document.getElementsByClassName("market"+player)[0].innerHTML;
			chart.series[player-1].update({name:name}, false);
			chart.redraw();
		}else if(eval('radio'+player) == 'select'){
			name = document.getElementsByClassName("select"+player)[0].innerHTML;
			chart.series[player-1].update({name:name}, false);
			chart.redraw();
		}
	}

	function changeStyle(heart, player){
		if(player == 1){
			if(heart.style.color == "green")
				heart.style.color = "grey";
			else heart.style.color = "green";
		}else{
			if(heart.style.color == "rgb(20, 155, 223)")
				heart.style.color = "grey";
			else heart.style.color = "#149bdf";
		}
	}

	function drawRadar(){
		chart = Highcharts.chart('container', radarOptions);
	}
	
	function showHideBox(checkbox, number){
		box = document.getElementById("skillBox"+number+eval('radio'+number));
				
		if(checkbox.checked && box.style.display == "none")
			box.style.display = "block"; 
		else if(!checkbox.checked && box.style.display == "block")
			box.style.display = "none";
	}
	
	function retrieveMarketPlayer(playerNumber){
		//user logged
		if (document.cookie.length > 0){
			var login = document.cookie.indexOf('htRadarOauthToken=');
			if (login == -1){
				document.getElementById("danger-retrieve-"+playerNumber).style.display = 'block';
                setInterval(function(){ document.getElementById("danger-retrieve-"+playerNumber).style.display = 'none'; }, 5000);
				return;
			}
		}
		
		var id = $("#pID"+playerNumber).val();
        if($.isNumeric(id)){
          $.ajax({
            type: "POST",
            url: 'retrievePlayer.php',
			dataType: "xml",
            data: {playerID: id, playerNum:playerNumber, option: 'market'}
          }).done(function( a, e, o) {
			  if(o.responseXML == null){
				  
				  document.getElementById("danger-player-"+playerNumber).style.display = 'block';
				  setInterval(function(){ document.getElementById("danger-player-"+playerNumber).style.display = 'none'; }, 5000);
				  return;
			  }
			  htmlBox = o.responseXML.getElementsByTagName("playerBox")[0].innerHTML;
			  document.getElementById("player"+playerNumber+"boxmarket").innerHTML = htmlBox.substring(9, htmlBox.length-3);
			  document.getElementById("player"+playerNumber+"boxmarket").style.display='block';
			  
			  $(".slidermarket"+playerNumber).slider({
					formatter: function(value) {
						return value;
					}
				});
				
				recomputeValue(playerNumber, 'other'); 
            }).error(function(err){
				console.log(err);
				  document.getElementById("danger-player-"+playerNumber).style.display = 'block';
				  setInterval(function(){ document.getElementById("danger-player-"+playerNumber).style.display = 'none'; }, 5000);
				  return;
			});
		}else{
			document.getElementById("danger-format-"+playerNumber).style.display = 'block';
			setInterval(function(){ document.getElementById("danger-format-"+playerNumber).style.display = 'none'; }, 5000);
			return;
		}
	}	
	
	function retrieveTeams(player){
		
		$.ajax({
            type: "POST",
            url: 'retrieveTeams.php'
          }).done(function( a, e, o) {
			  if(o.responseText == null){
				  document.getElementById("danger-team-"+player).style.display = 'block';
				  setInterval(function(){ document.getElementById("danger-team-"+player).style.display = 'none'; }, 5000);
				  return;
			  }
			  document.getElementById("selectPlayer"+player).innerHTML = o.responseText;
			  $('#selectPlayer'+player).selectpicker('refresh');

            }).error(function(err){
				console.log(err.responseText);
				console.log(err);
				  document.getElementById("danger-team-"+player).style.display = 'block';
				  setInterval(function(){ document.getElementById("danger-team-"+player).style.display = 'none'; }, 5000);
				  return;
			});
	}
	
	function retrieveSelectPlayer(sel, player){
		
		if (document.cookie.length > 0){
			var login = document.cookie.indexOf('htRadarOauthToken=');
			if (login == -1){
				document.getElementById("danger-retrieve-"+playerNumber).style.display = 'block';
                setInterval(function(){ document.getElementById("danger-retrieve-"+playerNumber).style.display = 'none'; }, 5000);
				return;
			}
		}
		
		selectedOption = sel.options.item(sel.selectedIndex);
		id = selectedOption.getAttribute("data-id");
		
		$.ajax({
            type: "POST",
            url: 'retrievePlayer.php',
			dataType: "xml",
            data: {playerID: id, playerNum:player, option: 'select'}
          }).done(function( a, e, o) {
			  if(o.responseXML == null){
				  document.getElementById("danger-team-"+player).style.display = 'block';
				  setInterval(function(){ document.getElementById("danger-team-"+player).style.display = 'none'; }, 5000);
				  return;
			  }
			  htmlBox = o.responseXML.getElementsByTagName("playerBox")[0].innerHTML;
			  document.getElementById("player"+player+"boxselect").innerHTML = htmlBox.substring(9, htmlBox.length-3);
			  document.getElementById("player"+player+"boxselect").style.display='block';
			  
			  $(".sliderselect"+player).slider({
					formatter: function(value) {
						return value;
					}
				});
				
				recomputeValue(player, 'other'); 
            }).error(function(err){
				  document.getElementById("danger-team-"+player).style.display = 'block';
				  setInterval(function(){ document.getElementById("danger-team-"+player).style.display = 'none'; }, 5000);
				  return;
			});
	}

</script>
