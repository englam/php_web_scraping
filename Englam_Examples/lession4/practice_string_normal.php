<?php
$org_string = "I wish I had a Cat.\n";
$result_string = str_replace("Cat","Dog",$org_string);
echo $result_string."\n";

$noformat = str_replace("\t", "", $org_string);
echo $noformat;

#去除空白， 如果要用網頁的去空白則要把" " 換成 "&nbsp;"
$noformat = str_replace(" ", "", $org_string);
echo $noformat;

#測試相似度有多少
$string1= "englamtest12345";
$string2 ="englam54321";
$similarity_percentaage = similar_text($string1, $string2);
echo $similarity_percentaage;