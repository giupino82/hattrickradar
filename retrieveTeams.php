<?php
/*
OUTPUT:
<select class="selectpicker" data-live-search="true" itle="Choose one of the following...">
	<optgroup label="team name" data-id="team id">
	   <option data-tokens="team name" data-id="player id">player name</option>
	   <option data-tokens="team name" data-id="player id">player name</option>
	 </optgroup>
	 <optgroup label="team name" data-id="team id">
	   <option data-tokens="team name" data-id="player id">player name</option>
	   <option data-tokens="team name" data-id="player id">player name</option>
	 </optgroup>
</select>

*/

	include 'PHT/autoload.php';
	session_start();

	if(isset($_SESSION['HT'])){

		$config = array(
			'CONSUMER_KEY' => 'xxxxxxxxx',
			'CONSUMER_SECRET' => 'xxxxxxxxxx'
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
			$user = $HT->getUser();
			$teams = $user->getTeams();
			
			$select = "";
			$userTeams = [];
			$i = 0;
			$team = $teams->current();
			while($team != null){

				$id = $team->getId();
				$name = $team->getName();
				$players = $HT->getSeniorPlayers($id);
				
				$select .= "<optgroup label='".$name."' data-id='".$id."'>";
				for($j=0; $j<$players->getPlayerNumber(); $j++){
					$player = $players->getPlayer($j);
					$namep = $player->getName();
					$idp = $player->getId();
					$select .= "<option data-tokens='".$name." ".$namep."' data-id='".$idp."'>".$namep."</option>";
				}
				$select .= "</optgroup>";
				$team = $teams->next();
				$i++;
			}
			
			echo $select;

	  }
	}

          ?>
