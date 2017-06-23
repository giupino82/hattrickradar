<?php
	header('Content-type: text/xml');
	include 'PHT/autoload.php';
	session_start();

	if(isset($_SESSION['HT'])){

		$config = array(
			'CONSUMER_KEY' => 'xxxxx',
			'CONSUMER_SECRET' => 'xxxxx'
		);
		$HT = new \PHT\Connection($config);
		// retrive the $tmpToken saved in previous step
		//$tmpToken = $_SESSION["tmpToken"];

		$cookieToken = "htRadarOauthToken";
		$cookieTokenSecret = "htRadarOauthTokenSecret";
		
		if(isset($_COOKIE[$cookieToken]) and isset($_COOKIE[$cookieTokenSecret]) ){
			$config['OAUTH_TOKEN'] = $_COOKIE[$cookieToken];
			$config['OAUTH_TOKEN_SECRET'] = $_COOKIE[$cookieTokenSecret];
			$HT = new \PHT\PHT($config);

			$id = $_POST['playerID'];
			$player = $HT->getSeniorPlayer($id);
 
	  if($player->isSkillsAvailable()){

		  $name = $player->getName();
		  $stamina = $player->getStamina();
		  $form = $player->getForm();
		  $experience = $player->getExperience();
		  if($_POST['option']=='select')
			  $loyalty = $player->getLoyalty();
		  else $loyalty = 1;
		  $motherClubBonus = $player ->hasMotherClubBonus();

		  $xml =  $player->getXml()->getElementsByTagName('Player')->item(0);

		  foreach($xml as $key=>$value){
			  echo $key."   ->    ".$value->tagName."   ->    ".$value->nodeValue."\n";
		  }

		  $skillArray = [$player->getKeeper(), $player->getDefender(), $player->getPlaymaker(), $player->getPassing(), $player->getWinger(), $player->getScorer(), $player->getSetPieces()];
		  $skillArrayName = ["Keeper", "Defender", "Playmaker", "Passing", "Winger", "Scorer", "SetPieces"];
		  
		  $player1Description = "<xml><playerBox><![CDATA[";
		  
		  if($_POST['playerNum']==2)
			  $player1Description.="<div class='bluePlayer'>";
		  
		  $player1Description.="<h2><span id='name".$_POST['playerNum']."' class='".$_POST['option']."".$_POST['playerNum']." player".$_POST['playerNum']."' >".$name."</span></h2><br>";
		  $player1Description.="<h4>Stamina:  <input type='number' id='stamina".$_POST['playerNum']."' min='1' max='9' class='".$_POST['option']."".$_POST['playerNum']." player".$_POST['playerNum']." slider slider".$_POST['option']."".$_POST['playerNum']."  char".$_POST['playerNum']."' onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" value=".$stamina."></h4><br>";
		  $player1Description.="<h4>Player form <br><input id='form".$_POST['playerNum']."' class='".$_POST['option']."".$_POST['playerNum']." player".$_POST['playerNum']." slider  slider".$_POST['option']."".$_POST['playerNum']." char".$_POST['playerNum']."' onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='".$form."'/><br>";
		  $player1Description.="<h4>Experience <br><input id='experience".$_POST['playerNum']."' class='".$_POST['option']."".$_POST['playerNum']." player".$_POST['playerNum']." slider  slider".$_POST['option']."".$_POST['playerNum']." char".$_POST['playerNum']."'  onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" clatype='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$experience."'/><br>";
		  $player1Description.="<h4>Loyalty <br><input id='loyalty".$_POST['playerNum']."' class='".$_POST['option']."".$_POST['playerNum']." player".$_POST['playerNum']." slider  slider".$_POST['option']."".$_POST['playerNum']." char".$_POST['playerNum']."'  onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$loyalty."'/><br>";
		  $player1Description.="<h4>Mother club bonus  <i   id='motherClubBonus".$_POST['playerNum']."' class='".$_POST['option']."".$_POST['playerNum']." player".$_POST['playerNum']." fa fa-heart '";
		  $player1Description.="style='color:";
		  if($_POST['option']=='select'){
			  if($motherClubBonus){//mother club
				  if($_POST['playerNum']==1)
					  $player1Description.="green' ";
				 else $player1Description.="rgb(20, 155, 223)' ";
			  }
		  }else 
			  $player1Description.="grey' ";
		  $player1Description.="onclick=\"changeStyle(this,".$_POST['playerNum'].");recomputeValue(".$_POST['playerNum'].", 'other')\"></i> </h4>";

		  $player1Description.="<div class='checkbox'><label><input type='checkbox' onclick='showHideBox(this,".$_POST['playerNum'].")'>Modify skills</label></div><br>";
		  $player1Description.="<div id='skillBox".$_POST['playerNum']."".$_POST['option']."' style='display:none'>";
		  
		  $i=0;
		  foreach($skillArray as $value){			  
			  $player1Description.="<h4>".$skillArrayName[$i]." <br><input id='".$skillArrayName[$i]."".$_POST['playerNum']."' class='".$_POST['option']."".$_POST['playerNum']." player".$_POST['playerNum']." slider  slider".$_POST['option']."".$_POST['playerNum']." char".$_POST['playerNum']."'  onchange=\"recomputeValue(".$_POST['playerNum'].",'".$skillArrayName[$i]."')\" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$skillArray[$i] ."'/><br>";
			  $i++;
		  }
		  
		  $player1Description.="</div>";

		  if($_POST['playerNum']==2)
			  $player1Description.="<div class='bluePlayer'>";
		  
		 $player1Description.="]]></playerBox><name>".$name."</name></xml>";

	  }

	  echo $player1Description;
	  }
	}

          ?>
