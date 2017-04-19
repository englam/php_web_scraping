<?php
# Include http library
include("LIB_http.php");

# Define the target and referrer web pages
$target = "http://www.schrenk.com/publications.php";
$ref    = "http://www.schrenk.com";

# Request the header
$return_array = http_get_withheader($target, $ref);

echo "eeeeeeeeeeeeeee\n";
echo $return_array."\n";
echo "eeeeeeeeeeeeeee\n";


# Display the header
echo "FILE CONTENTS \n";
var_dump($return_array['FILE']);

echo "ERRORS \n";
var_dump($return_array['ERROR']);

echo "STATUS \n";
var_dump($return_array['STATUS']);
