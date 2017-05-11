<?php
include ("LIB_http.php");
include ("LIB_parse.php");
include ("LIB_resolve_addresses.php");

$target = "http://webbotsspidersscreenscrapers.com/head_redirection_test.php";
$page_base = "http://webbotsspidersscreenscrapers.com";
$page = http_get($target, $ref="");

$head_section = return_between($string=$page['FILE'], $start="<head>", $stop="</head>", $type=EXCL);

echo $head_section."\n";

$meta_tag_array = parse_array($head_section, $beg_tag="<meta", $close_tag=">");
print_r($meta_tag_array);


for ($xx=0; $xx<count($meta_tag_array); $xx++){
	$meta_attribute = get_attribute($meta_tag_array[$xx], $attribute="http-equiv");
	
	if(strtolower($meta_attribute) == "refresh"){
		$new_page = return_between($meta_tag_array[$xx], $start="URL", $stop=">", $type=EXCL);
		
		$new_page = trim(str_replace("", "", $new_page));
		$new_page = str_replace("=", "", $new_page);
		$new_page = str_replace("\"", "", $new_page);
		$new_page = str_replace("'", "", $new_page);

		
	}
	
	break;
}
				

echo "HTML Header redirection detected<br>\n";
echo "Redirect page" . $new_page;
				
				
				