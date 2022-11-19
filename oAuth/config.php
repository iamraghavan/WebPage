<?php
require_once('vendor/autoload.php');

$google_client = new Google_Client();

$google_client->setClientId('332098524759-65272bqo8mu8hkoplrmkqvnuc3mc271n.apps.googleusercontent.com');

$google_client->setClientSecret('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');

$google_client->setRedirectUri('http://localhost/google_login/');

$google_client->addScope('email');
$google_client->addScope('profile');

session_start();

?>