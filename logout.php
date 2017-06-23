<?php
	session_start();
    	if (isset($_COOKIE['htRadarOauthToken'])) {
		unset($_COOKIE['htRadarOauthToken']);
		unset($_COOKIE['htRadarOauthTokenSecret']);
		setcookie('htRadarOauthToken', null, -1, '/');
		setcookie('htRadarOauthTokenSecret', null, -1, '/');
		unset($_SESSION['tmpToken']);
		unset($_SESSION['HT']);
		}
	header("Location: index.php");
	exit();
?>
