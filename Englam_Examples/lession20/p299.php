<?php
include("LIB_http.php");
include("LIB_parse.php");

$domain 	= "http://www.webbotsspidersscreenscrapers.com/";
$target 	= $domain."query_authentication";
$page_array = http_get($target, $ref="");

echo $page_array['FILE'];

sleep(2);

echo "<hr>";

$login = $domain."query_authentication/index.php";


$data_array['enter']	= "Enter";
$data_array['username'] = "webbot";
$data_array['password'] = "sp1der3";
$page_array 			= http_post_form($login, $ref=$target, $data_array);

echo $page_array['FILE'];
sleep(2);

echo "<hr>";

$session = return_between($page_array['FILE'], "session=", "\"", EXCL);

$page2 = $target."/index2.php?session=".$session;
$page_array = http_get($page2, $ref="");

echo $page_array['FILE'];




