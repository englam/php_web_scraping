<?php
include ("LIB_parse.php");
include ("LIB_http.php");
$string = "<!----test---->,hhaaahhaa,  eeeee";
		
$practice_remove = remove($string,"<!----","---->");
echo $practice_remove;


$web_page = http_get($target="http://www.schrenk.com",$referer="");

#把抓下來的資料，移除註解的語法
$uncommented_page = remove($web_page['FILE'],"<!--","-->");
#把抓下來的資料，移除超連結的語法
$links_removed = remove($web_page['FILE'],"<a","</a>");
#把抓下來的資料，移除圖像的語法
$images_removed = remove($web_page['FILE'],"<img"," >");
#把抓下來的資料，移除script的語法
$javascript_removed = remove($web_page['FILE'],"<script", "</script>");



echo $uncommented_page."\n";

