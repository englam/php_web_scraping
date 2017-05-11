<?php
include("LIB_http.php");

$action = "http://www.webbotsspidersscreenscrapers.com/form_analyzer.php";
$method	= "POST";
$ref	= "";

$data_array['sessionid'] = "sdfg73453845";
$data_array['email'] = "sales@schrenk.com";
$data_array['message'] = "This is a test message";
$data_array['status'] = "in school";
$data_array['gender'] = "M";
$data_array['vol'] = "on";


$response = http($target=$action,$ref,$method,$data_array,EXCL_HEAD);

print_r($response);