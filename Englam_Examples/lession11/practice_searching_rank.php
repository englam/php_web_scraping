<?php
include("LIB_http.php");
include("LIB_parse.php");

$desired_site	 = "www.loremianam.com";
#$desired_site 	 = "www.dolorasita.com";
$search_term	 = "webbots";

$page_index 	 = 0;
$page_index_2    = 0;
$url_found		 = false;
$previous_target = "";

$target			 = "http://www.schrenk.com/nostarch/webbots/search";
$target			 = $target."?q=".urlencode(trim($search_term));

/*
 * http://www.schrenk.com/nostarch/webbots/search?q=webbots
 * echo "target = ",$target,"\n";
 * target 會回覆整個網站的url
*/

while ($url_found == false){
	$page_index++;
	echo "Searching for ranking on page #$page_index\n";
	
	//html_entity_decode, 會將一些特殊符號拿掉
	$target = html_entity_decode($target);
	$previous_target = html_entity_decode($previous_target);
	sleep(rand(3,6));
	
	/*
	 * echo "Page:";
	 * echo $page."\n";
	 * $page 會把整個網頁的內容都顯示出來
	 */
	$result = http_get($target,$ref=$previous_target,"GET","",EXCL_HEAD);
	$page = $result['FILE'];

	
	$separator = "<!--@gap;-->";
	$beg_position = strpos($page,$separator);
	
	/*
	 * stripos() - 查找字符串在另一字符串中第一次出现的位置（不区分大小写）
	 * echo "beg_position = ",$beg_position,"\n";
	 * $beg_position 從$page裡面找出符合 $separator的符號
	 */

	/*
	 * 重新寫page , 找出<!--@gap;-->, 找到<!--@gap;-->後
	 * page的內容被轉成<!--@gap;-->之後的網站內容，代表是<!--@gap;-->之前的網站內容都不要
	 * echo "page = ",$page,"\n";輸出會變成page = <data><!--@gap;-->...
	*/
	$page = substr($page, $beg_position,strlen($page));
	$page = "<data>".$page;
	#echo $page;
	/* 
	 * substr( $string , $start , $length )
	 * $strting 是原始的字串，$start 是要開始擷取的位置，
	 * $length 則為要截取的字串長度，要注要的是 $start 與 $length 都必須為數字才有作用
	 * echo substr("abcde", -1); <= 這樣會輸出 e，因為從字尾開始算一個字母。
	 */
	
	
	/*
	 * 將$page裡面符合$separator = "<!--@gap;-->" ，替換成 </data> <data>
	 * 上面一開始將<data>加在$page的前面是故意的，為了要讓後面的規則都符合 <data>....</data>
	 * 遇到第一個<!--@gap;--> , 程式把它寫成</data> <data>,整個的內容第一個的data 為 <data></data>
	 * 所以陣列0就直接存入<data></data>
	 * 陣列1開始把所有的網站的內容存入,因為套用上面的公式第一個內容<data>.........到第二個<!--@gap;--> 它也變成
	 * </data> <data>所以這樣可以找出第一個的內容，再開始第二個的內容，依循下去。
	 * echo "page = ",$page,"\n";
	 */
	$page = str_replace($separator,"</data> <data>", $page);
	$desired_content_array = parse_array($page, "<data>", "</data>",EXCL);
	for($page_rank=0; $page_rank<count($desired_content_array); $page_rank++){
		if(stristr($desired_content_array[$page_rank], trim($desired_site))){
			$url_found_rank_on_page = $page_rank;
			$url_found = true;
		}
	}
	#print_r($desired_content_array);
	
	for($page_rank=0; $page_rank<count($desired_content_array); $page_rank++)
	{
		// Look for the $desired_site to appear in one of the listings
		if(stristr($desired_content_array[$page_rank], trim($desired_site)))
		{
			$url_found_rank_on_page = $page_rank; // add one to compensate for listing 0
			$url_found=true;
		}
	}
	
	
	$search_links = parse_array($result['FILE'], "<a href=index.php", "</a>", EXCL);
	#print_r ($search_links);
	/*
	for($xx=0; $xx<count($search_links); $xx++)
	{
		
		if(strstr($search_links[$xx], "Next"))
		{
			$previous_target = $target;
			$target = get_attribute($search_links[$xx], "href");
			
	
			// Remember that this path is relative to the target page,
			// so add protocol and domain
			$target = "http://www.schrenk.com/nostarch/webbots/search/".$target;
		}
	}*/
	$previous_target = $target;
	$target = get_attribute($search_links[$page_index_2], "href");
	$target = "http://www.schrenk.com/nostarch/webbots/search/".$target;
	$page_index_2++;
	echo $target;
	
	
	# Don't seatch forever, stop after 10 pages
	if($page_index==10)
	{
		break;
	}
}
# End: Loop
#-------------------------------------------------

#-------------------------------------------------
# Start: Display report
echo "\n";
if($url_found)
{
	echo "When performing a search on the phrase \"$search_term\" \n";
	echo "\"$desired_site\" is ranked as item $url_found_rank_on_page ";
	echo "on page $page_index. \n";
	echo "Its ranking is: $page_index.$url_found_rank_on_page.\n";
}
else
{
	echo "TIMEOUT\n";
	echo "\"$desired_site\" was not found using the search term \"$search_term\" \n";
	echo "$page_index pages searched.\n";
}
echo "\n\n";
# End: Display report
#-------------------------------------------------

