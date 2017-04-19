<?php
include ("LIB_parse.php");

$string = "The quick brown fox";
$parsed_text = split_string($string, "quick", BEFORE, INCL);

echo "Before : ". $parsed_text."\n";




$string = "The quick brown fox";
$parsed_text = split_string($string, "quick", AFTER, INCL);

echo "After : ". $parsed_text."\n";



$string2 = "hello<e>test</e>hahahaha";
$return_text = return_between($string2,"<e>","</e>", INCL);
echo "Between Test :".$return_text."\n";