<?php
	header('Content-type: text/xml');
	include 'PHT/autoload.php';
	session_start();
	if(isset($_SESSION['HT'])){
		$HT = $_SESSION['HT'];
	
     //$player1 = $HT->getPlayer($_POST['playerID']);
	$player1 = $HT->getSeniorPlayer('407708616');
	echo "<xml>".print_r($player1)."</xml>";/*
	  if($player1->isSkillAvailable()){
		  
		  $name = $player1->getName();
		  $stamina = $player1->getStamina();
		  $form = $player1Description.$player1->getForm();
		  $experience = $player1Description.$player1->getExperience();
		  $loyalty = $player1Description.$player1->getLoyalty();
		  $motherClubBonus = hasMotherClubBonus();
		  $skillArray = [$player->getKeeper(), $player->getDefender(), $player->getPlaymaker(), $player->getPassing(), $player->getWinger(), $player->getScorer(), $player->getSetPieces()];
		  
		  $player1Description = "<xml><playerBox><![CDATA[";
		  $player1Description.="<h2><span class='player".$_POST['playerNum']."' ".$name."</span></h2><br>";
		  $player1Description.="<h4>Stamina: <span class='player".$_POST['playerNum']."' ".$stamina."</span></h4><br>";
		  $player1Description.="<h4>Player form <input id='form".$_POST['playerNum']."' class='player".$_POST['playerNum']."' slider char".$_POST['playerNum']."' type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='".$form."'/><br>";
		  $player1Description.="<h4>Experience <input id='experience".$_POST['playerNum']."' class='player".$_POST['playerNum']."' slider char".$_POST['playerNum']."' clatype='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$experience."'/><br>";
		  $player1Description.="<h4>Loyalty <input id='loyalty".$_POST['playerNum']."' class='player".$_POST['playerNum']."' slider char".$_POST['playerNum']."' type='text' data-slider-min='1' data-slider-max='20' data-slider-step='1' data-slider-value='".$loyalty."'/><br>";
		  $player1Description.="<h4>Mother club bonus  <i class='player".$_POST['playerNum']."' fa fa-heart '";
		  if($motherClubBonus)//mother club
			  $player1Description.="style='color:green' onclick='changeStyle(this)'></i> </h4>";
		  else $player1Description.="style='color:grey' onclick='changeStyle(this)'></i> </h4>";

		  $skill = 0;
		  foreach($skillArray as $value){
			  $skill+=$value;
		  }
		  $skill+= $loyalty/20 + log($experience,10)*(4/3);
		  if($motherClubBonus)
			  $skill+=0.5;
		  $skill*=pow((($form-0.5)/7),0.45)*pow((($stamina+6.5)/14),0.6);
		  $player1Description.="<h2 id='skill".$_POST['playerNum']."'>".$skill."</h2>";	  
		  
		  
		 $player1Description.="]]></playerBox><serie>[";
		 for($i=0;$i<$skillArray.count();$i++){
			 $player1Description.= $skillArray[$i];
			 if($i!=6)
				 $player1Description.=", ";
		 }
		 $player1Description.="]</serie><name>".$name."</name></xml>";

	  }
	  
	  echo $player1Description;*/
	}
	//echo "<xml><playerBox><![CDATA[<input id='ex8' class='slider char1' type='text' data-slider-min='1' data-slider-max='8' data-slider-step='1' data-slider-value='5'/><br><br>]]></playerBox><serie>[3,3,3,3,3,3,3]</serie><name>cass</name></xml>"

  
          ?>