<?php
include 'PHT/autoload.php';
session_start();

$config = array(
    'CONSUMER_KEY' => 'XXXXXX',
    'CONSUMER_SECRET' => 'XXXXXX',
	'LOG_TYPE' => 'file',
	'LOG_LEVEL' => \PHT\Log\Level::DEBUG,
	'LOG_FILE' => __DIR__ . '/pht.log'
);
$HT = new \PHT\Connection($config);

$auth = $HT->getPermanentAuthorization('http://localhost/hattrickradar/index.php'); // put your own url
//$auth = $HT->getTemporaryAuthorization('http://hattrickradar.altervista.org/index.php');

if ($auth === false) {
    // handle failed connection
    echo "Impossible to initiate chpp connection";
    exit();
}
$tmpToken = $auth->temporaryToken; // save this token somewhere (session, database, file, ...) it's needed in next step
$_SESSION['tmpToken'] = $tmpToken;

header('Location: ' . $auth->url); // redirect to hattrick login page, or get the url and show a link on your site

?>
