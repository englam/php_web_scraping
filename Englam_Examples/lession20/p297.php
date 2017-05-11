<?php
$username   = "webbot";
$password   = "sp1der3";

$basic_url  = "http://www.webbotsspidersscreenscrapers.com/basic_authentication/index.php";
$cookie_url = "http://www.webbotsspidersscreenscrapers.com/cookie_authentication/index.php";
$query_url  = "http://www.webbotsspidersscreenscrapers.com/query_authentication/";


$form_data 	= "enter=Enter&username=webbot&password=sp1der3";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $cookie_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt"); //寫入cookie的位置
curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt"); //PHP發送cookie內容的位置

curl_setopt($ch, CURLOPT_POST, TRUE); 
curl_setopt($ch, CURLOPT_POSTFIELDS, $form_data); //username and password
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE); //跟隨重導向

$page = curl_exec($ch);
echo $page;

curl_close($ch);