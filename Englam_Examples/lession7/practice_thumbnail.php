<?php

include ("LIB_http.php");
include ("LIB_thumbnail.php");

$target		= "http://www.schrenk.com/north_beach.jpg";
$ref		= "";
$method		= "GET";
$data_array = "";
$image 		= http_get($target, $ref,$method,$data_array,EXCL_HEAD);

$handle = fopen("test.jpg","w");
fputs($handle, $image['FILE']);
fclose($handle);

$org_file = "test.jpg";
$new_file_name = "thumbnail.jpg";

$max_width 	= 90;
$max_height = 90;

create_thumbnail($org_file,$new_file_name,$max_width,$max_height);
?>
Full-size image<br>
<img src="test.jpg">
<p>
Thumbnail image<br>
<img src="thumbnail.jpg">

