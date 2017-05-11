<?php
include("LIB_http.php");

$target 	= "http://schrenk.com";
$ref		= "";
$method 	= "GET";
$data_array = "";
$web_page	= http_get($target,$ref,$method,$data_array,EXCL_HEAD);

$uncompressed_size = strlen($web_page['FILE']);
$compressed_size   = strlen(gzcompress($web_page['FILE'],$compression_value =9));
$noformat_size	   = strlen(strip_tags($web_page['FILE']));


echo $uncompressed_size." bytes \n";
echo $compressed_size." bytes \n";
echo $noformat_size." bytes \n";