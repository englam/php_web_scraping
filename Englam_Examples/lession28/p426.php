<?php
include ("LIB_http.php");
include ("LIB_parse.php");
include ("LIB_resolve_addresses.php");

$target = "http://webbotsspidersscreenscrapers.com/easy_form.php";
$page_base = "http://webbotsspidersscreenscrapers.com";
$web_page = http_get($target, $ref="");


//將<form 到</form>之間的資料都抓下來
$form_array = parse_array($web_page['FILE'], $open_tag="<form", $close_tag="</form>");

//print_r($form_array);

for ($xx=0; $xx<count($form_array); $xx++){
	//將form過濾，只留下form的資料，裡面有method and action
	$form_beginning_tag = return_between($form_array[$xx], "<form", ">", INCL);
	
	//得到action的值
	$form_action = get_attribute($form_beginning_tag, "action");
	
	if(strlen(trim($form_action))==0){
		$form_action = $target;
	}
	
	$full_resolved_form_action = resolve_address($form_action, $page_base);
	
	if (strtolower(get_attribute($form_beginning_tag, "method")=="post")){
		$form_method = "POST<br>\n";
	}
	else{
		$form_method = "GET<br>\n";
	}
	
	$form_element_array = parse_array($form_array[$xx], "<input", ">");
	print_r($form_element_array);
	
	echo "Form Method=$form_method<br>\n";
	echo "Form Action=$full_resolved_form_action<br>\n";
	
	
	for($yy=0; $yy<count($form_element_array); $yy++){
	
		$element_name = get_attribute($form_element_array[$yy], "name");
		$element_value = get_attribute($form_element_array[$yy], "value");
	
		echo "Element Name = $element_name, value=$element_value<br>\n";
	}
	
}
