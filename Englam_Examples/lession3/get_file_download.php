<?php
// Download the target file
$target = "http://www.schrenk.com/nostarch/webbots/hello_world.html";
$downloaded_page_array = file($target);


echo count($downloaded_page_array)+'<br>';
echo "1111<br>";

//echo "111";



// Echo contents of file
for($xx=0; $xx<count($downloaded_page_array); $xx++)
	echo $downloaded_page_array[$xx];

