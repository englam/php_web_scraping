<?php
#lib parse , lession4 and 17 OK

# Initialization
include("LIB_http.php");                        // http library
include("LIB_parse.php");                       // parse library
include("LIB_resolve_addresses.php");           // address resolution library
include("LIB_exclusion_list.php");              // list of excluded keywords
include("LIB_simple_spider.php");               // spider routines used by this app.
include("LIB_download_images.php");


#for LIB_exclusion_list.php
print_r($exclusion_array);


//-----for harvest_links -------------

$url = "http://www.schrenk.com/";
$page_base = get_base_page_address($url);
//只取出url link，其他的不取，上面的url, 只會被取出http://www.schrenk.com/

$downloaded_page = http_get($url, "");
//print_r($downloaded_page);
//用http get 的方法，把網站內容取出


$anchor_tags = parse_array($downloaded_page['FILE'], "<a", "</a>", EXCL);
//print_r($anchor_tags);
//取出所有在網站裡的超連結
// ex <a href="index.php" border="0" style="color:#999;font-size:36pt;text-decoration:none;">Michael Schrenk&nbsp;</a>

for($xx=0; $xx<count($anchor_tags); $xx++)
{
	$href = get_attribute($anchor_tags[$xx], "href");
	//只取 href後面的參數， ex . href: index.php
	$resolved_addres = resolve_address($href, $page_base);
	//分析所有的link，並把他們加到原本的url , ex http://www.schrenk.com/ + index.php = http://www.schrenk.com/index.php
	$link_array[] = $resolved_addres;
	echo "Harvested: ".$resolved_addres." \n";
}

//-----for harvest_links -------------

