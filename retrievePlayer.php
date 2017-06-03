<?php
	header('Content-type: text/xml');
	include 'PHT/autoload.php';
	session_start();

	if(isset($_SESSION['HT'])){

		$config = array(
			'CONSUMER_KEY' => '',
			'CONSUMER_SECRET' => '',
			//'CACHE' => 'apc',
			//'LOG_TYPE' => 'file',
			//'LOG_LEVEL' => \PHT\Log\Level::DEBUG,
			//'LOG_FILE' => __DIR__ . '/pht.log'
		);
		$HT = new \PHT\Connection($config);
		// retrive the $tmpToken saved in previous step
		$tmpToken = $_SESSION["tmpToken"];

		if(isset($_SESSION['OAUTH_TOKEN'])&&isset($_SESSION['OAUTH_TOKEN_SECRET'])){
			$config['OAUTH_TOKEN'] = $_SESSION['OAUTH_TOKEN'];
			$config['OAUTH_TOKEN_SECRET'] = $_SESSION['OAUTH_TOKEN_SECRET'];
			$HT = new \PHT\PHT($config);

			$id = $_POST['playerID'];
			$player = $HT->getSeniorPlayer($id);

	  if($player->isSkillsAvailable()){

		  $name = $player->getName();
		  $stamina = $player->getStamina();
		  $form = $player->getForm();
		  $experience = $player->getExperience();
		  $loyalty = $player->getLoyalty();
		  $motherClubBonus = $player->hasMotherClubBonus();


		  //$xml = $player->getXml()->getElementsByTagName('*');
		  $xml =  $player->getXml()->getElementsByTagName('Player')->item(0);

		  foreach($xml as $key=>$value){
			  echo $key."   ->    ".$value->tagName."   ->    ".$value->nodeValue."\n";
		  }

		  $skillArray = [$player->getKeeper(), $player->getDefender(), $player->getPlaymaker(), $player->getPassing(), $player->getWinger(), $player->getScorer(), $player->getSetPieces()];
		  $skillArrayName = ["Keeper", "Defender", "Playmaker", "Passing", "Winger", "Scorer", "SetPieces"];

		  $player1Description = "<xml><playerBox><![CDATA[";
		  $player1Description.="<h2><span class='player".$_POST['playerNum']."' >".$name."</span></h2><br>";
		  $player1Description.="<h4>Stamina:  <input type='number' id='stamina1' min='1' max='9' class='player".$_POST['playerNum']." slider char".$_POST['playerNum']."' onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" value=".$stamina."></h4><br>";
		  $player1Description.="<h4>Player form <input id='form".$_POST['playerNum']."' class='player".$_POST['playerNum']." slider char".$_POST['playerNum']."' onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='".$form."'/><br>";
		  $player1Description.="<h4>Experience <input id='experience".$_POST['playerNum']."' class='player".$_POST['playerNum']." slider char".$_POST['playerNum']."'  onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" clatype='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$experience."'/><br>";
		  $player1Description.="<h4>Loyalty <input id='loyalty".$_POST['playerNum']."' class='player".$_POST['playerNum']." slider char".$_POST['playerNum']."'  onchange=\"recomputeValue(".$_POST['playerNum'].", 'other')\" type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$loyalty."'/><br>";
		  $player1Description.="<h4>Mother club bonus  <i   id='motherClubBonus".$_POST['playerNum']."' class='player".$_POST['playerNum']." fa fa-heart '";
		  if($motherClubBonus)//mother club
			  $player1Description.="style='color:green' onclick=\"changeStyle(this);recomputeValue(".$_POST['playerNum'].", 'other')\"></i> </h4>";
		  else $player1Description.="style='color:grey' onclick=\"changeStyle(this);recomputeValue(".$_POST['playerNum'].", 'other')\"></i> </h4>";

		  $player1Description.="<div class='checkbox'><label><input type='checkbox' onclick='showHideBox(this,".$_POST['playerNum'].")'>Modify skills</label></div><br>";
		  $player1Description.="<div id='skillBox".$_POST['playerNum']."' style='display:none'>";
		  $i=0;
		  foreach($skillArray as $value){
			  $skill = 0;
			  $skill+=$value;
			  $skill+= $loyalty/20 + log($experience,10)*(4/3);
			  if($motherClubBonus)
				  $skill+=0.5;
			  $skill*=pow((($form-0.5)/7),0.45)*pow((($stamina+6.5)/14),0.6);

			  $player1Description.="<h4>".$skillArrayName[$i]." <input id='".$skillArrayName[$i].$_POST['playerNum']."' class='player".$_POST['playerNum']." slider char".$_POST['playerNum']."'  onchange='recomputeValue(".$_POST['playerNum'].",".$skillArrayName[$i].")' type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$skillArray[$i] ."'/><br>";
			  //$player1Description.="<h2 class='".$skillArrayName[$i].$_POST['playerNum']."'>".$skill."</h2><br>";
			  $skillArray[$i] = round($skill,2);
			  $i++;
		  }
		  $player1Description.="</div>";
		 /* $skill+= $loyalty/20 + log($experience,10)*(4/3);
		  if($motherClubBonus)
			  $skill+=0.5;
		  $skill*=pow((($form-0.5)/7),0.45)*pow((($stamina+6.5)/14),0.6);
		  $player1Description.="<h2 id='skill".$_POST['playerNum']."' class='".$skillArrayName."'>".$skill."</h2>";
		  */

		 $player1Description.="]]></playerBox><serie>[";
		 for($i=0;$i<count($skillArray);$i++){
			 $player1Description.= $skillArray[$i];
			 if($i!=6)
				 $player1Description.=", ";
		 }
		 $player1Description.="]</serie><name>".$name."</name></xml>";

	  }

	  echo $player1Description;
	  }
	}

          ?>
