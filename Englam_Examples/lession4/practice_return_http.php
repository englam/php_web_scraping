<?php
include ("LIB_parse.php");
include ("LIB_http.php");

$web_page = http_get($target="http://www.nostarch.com",$refer="");

#將抓下來的資料，filter between title後，要把<title> </title>留下來
$title_incl = return_between($web_page['FILE'],"<title>","</title>",INCL);

#將抓下來的資料，filter between title後，不留<title> </title>
$title_excl = return_between($web_page['FILE'],"<title>","</title>",EXCL);

echo "title_incl = ".$title_incl;
echo "\n";
echo "title_excl = ".$title_excl;