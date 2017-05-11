<?php

# Initialization
include("LIB_http.php");                        // http library
include("LIB_parse.php");                       // parse library
include("LIB_resolve_addresses.php");           // address resolution library
include("LIB_exclusion_list.php");              // list of excluded keywords
include("LIB_simple_spider.php");               // spider routines used by this app.
include("LIB_download_images.php");

set_time_limit(3600);                           // Don't let PHP timeout

$SEED_URL        = "http://www.schrenk.com";    // First URL spider downloads
$MAX_PENETRATION = 1;                           // Set spider penetration depth
$FETCH_DELAY     = 1;                           // Wait one second between page fetches
$ALLOW_OFFISTE   = true;                        // Don't allow spider to roam from the SEED_URL's domain
$spider_array = array();

# Get links from $SEED_URL
# harvest_links會把所有的超連結找出來，並將它們變成真的url link

echo "Harvesting Seed URL    \n";
$temp_link_array = harvest_links($SEED_URL);

#archive_links 會先幫忙過濾一些javascript link及將所有的link加到陣列裡
$spider_array = archive_links($spider_array, 0, $temp_link_array);
//print_r($spider_array) ;

# Spider links in remaining penetration levels
#設定只搜索一次，所以把penetration_level設成 1
for($penetration_level=1; $penetration_level<=$MAX_PENETRATION; $penetration_level++)
{
	#因為spider_array的第一個陣列是0，所以這邊把前面設定的 penetration_level=1 , 減1，就可以從陣列第一個開始跑
	$previous_level = $penetration_level - 1;
	for($xx=0; $xx<count($spider_array[$previous_level]); $xx++)
	{
		# unset 销毁指定的变量
		sleep($FETCH_DELAY);
		unset($temp_link_array);
		$temp_link_array = harvest_links($spider_array[$previous_level][$xx]);
		echo "Level=$penetration_level, xx=$xx of ".count($spider_array[$previous_level])." <br>\n";
		$spider_array = archive_links($spider_array, $penetration_level, $temp_link_array);
		
		download_images_for_page($spider_array[$previous_level][$xx]);
		
	}
}





