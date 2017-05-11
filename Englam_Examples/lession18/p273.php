<?php

include ("LIB_http.php");
include ("LIB_parse.php");

$target = "http://www.schrenk.com";

$header_array = http_header($target, $ref="");

$local_server_time = return_between($header_array['FILE'], $start="Date:", $stop="\n", EXCL);
echo "Local Server Time : ".$local_server_time."\n";

$local_server_time_ts = strtotime($local_server_time);
echo "Local Server Time Ts: ".$local_server_time_ts."\n";


echo "\n Returned Header : \n";
echo $header_array['FILE']."\n";
echo "Parsed server timestamp = " .$local_server_time_ts. "\n";
echo "Formatted Server Time = " . date("r", $local_server_time_ts). "\n";

// date , r	RFC 822 格式的日期	ex：Thu, 21 Dec 2000 16:01:07 +0200