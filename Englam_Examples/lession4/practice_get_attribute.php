<?php
include ("LIB_parse.php");
include ("LIB_http.php");

$web_page = http_get($target="http://www.schrenk.com",$referer="");

/*
 * example : <img src="art/spacer.gif" height="5">,
 * 所以filter的時候 抓頭尾 "<img" , ">"
*/

$meta_tag_array = parse_array($web_page['FILE'],"<img",">");

#$web_page['FILE'] 會顯示整個網站的全部內容
echo "Web page: ".$web_page['FILE']."\n";

/*
 * 因為已經用$meta_tag_array 把img 都存到陣列裡，所以用迴圈把每個陣列的值輸出
 */
for ($i =0; $i < count($meta_tag_array); $i++){
	//echo $meta_tag_array[$i]."\n";
	$name = get_attribute($tag=$meta_tag_array[$i], $attribute="src");
	echo $name ."\n";
}
	/*
for ($i=0; $i < count($meta_tag_array); $i++){
	$name = get_attribute($meta_tag_array[$i], $attribute="src");
	echo $name ."\n";
}
*/