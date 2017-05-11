<?php
# Get http library
include("LIB_http.php");

# Define and download lightweight test interface
$url = "http://www.schrenk.com/nostarch/webbots/26_3.php";
$download = http_get($url, "");


# Convert the received lines into array elements
$raw_vars_array = explode(";", $download['FILE']);



# Convert each of the array elements into a variable declaration
for($xx=0; $xx<count($raw_vars_array)-1; $xx++)
{
	list($variable, $value)=explode("=", $raw_vars_array[$xx]);
	$eval_string="$".trim($variable)."="."\"".trim($value)."\"".";";
	eval($eval_string);
}

# Echo imported variables
for($xx=0; $xx<count($color); $xx++)
{
	echo "BRAND=".$brand[$xx]."<br>
          COLOR=".$color[$xx]."<br>
          SIZE=".$size[$xx]."<br>
          PRICE=".$price[$xx]."<hr>";
}