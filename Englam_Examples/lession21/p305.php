<?php
include("LIB_http.php");

$target = "http://www.webbotsspidersscreenscrapers.com/Listing_21_1.php";

http_get($target,"");

define("COOKIE_FILE","cookie.txt");