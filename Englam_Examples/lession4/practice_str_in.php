<?php
include ("LIB_parse.php");
include ("LIB_http.php");


$web_page = http_get($target="http://www.schrenk.com",$referer="");

#搜索關鍵字，不分大小寫
if(stristr($web_page['FILE'],"well"))
	echo "This is a web page well \n";
else
	echo "No Well \n";

	
#搜索關鍵字，分大小寫
if(stristr($web_page['FILE'],"Well"))
	echo "This is a web page well \n";
	else
		echo "No Well 2 \n";
	
		
