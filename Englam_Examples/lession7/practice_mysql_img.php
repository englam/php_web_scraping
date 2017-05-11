<?php

/*
include ('LIB_mysql.php');

$file_path = "download.jpg";

$data_array['IMAGE_ID'] = "6";
$data_array['IMAGE'] = base64_encode(file_get_contents($file_path));

insert("php_scraping", $table="test",$data_array);
*/

$file_path = "download.jpg";
$a = base64_encode(file_get_contents($file_path));
$b = base64_decode($a);

echo $file_path."\n";
echo $a."\n";
echo $b."\n";