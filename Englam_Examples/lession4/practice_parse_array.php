<?php
include ("LIB_parse.php");
include ("LIB_http.php");

$web_page = http_get($target="http://www.fbi.gov",$referer="");
$meta_tag_array = parse_array($web_page['FILE'],"<meta",">");

/*
 * example : <meta http-equiv="x-ua-compatible" content="ie=edge">,
 * 所以filter的時候 抓頭尾 "<meta" , ">"
 */

for ($i =0; $i < count($meta_tag_array); $i++)
	echo $meta_tag_array[$i]."\n";