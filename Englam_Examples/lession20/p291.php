<?php


$username   = "webbot";
$password   = "sp1der3";

$basic_url  = "http://www.webbotsspidersscreenscrapers.com/basic_authentication/index.php";
$cookie_url = "http://www.webbotsspidersscreenscrapers.com/cookie_authentication/";
$query_url  = "http://www.webbotsspidersscreenscrapers.com/query_authentication/";


$login 		= "webbot:sp1der3";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $basic_url);
curl_setopt($ch, CURLOPT_USERPWD, $login);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

$page = curl_exec($ch);
echo $page;

curl_close($ch);


