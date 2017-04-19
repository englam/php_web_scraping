<?php

#將原本This is the test string裡的test 改成new
echo "Test 1: \n";
$resulting_string=preg_replace("/test/", "new", "This is the test string");
echo "resulting_string: ".$resulting_string."\n";


# 1 = true , 0 = false
#回傳值為1的時候，代表preg_match有對應，下例的string裡面有test, 所以有match
$result = preg_match("/test/", "This is the test string");
echo "Test 2: ".$result."\n";

#它將符合的次數都由陣列，顯示出來， 下例 顯示2 因為test出現2次
$result1 = preg_match_all("/test/", "This is a test of the test string", $result_array);
echo "Test 3: ". $result1."\n";

#將string分割成array , 根據 test
echo "Test 4: \n";
$result_split = preg_split("/test/","This is the test string");
print_r($result_split);

# \d 用來指定我們要找的數字用法 ， / / <-左右二邊是固定模式
echo "Test 5: \n";
$subject_string = "There are 129 stories about Tim and Tom";

print_r(preg_match_all("/\d/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#指定要找三個連在一起的數字
echo "Test 6: \n";
print_r(preg_match_all("/\d\d\d/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#用+號代表 找到連續的數字，不管他是幾個連續的
echo "Test 7: \n";
print_r(preg_match_all("/\d+/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#D 找尋字母， \b代表邊界
echo "Test 8: \n";
print_r(preg_match_all("/\b\D\D\D\b/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#用{} <-中間字數量 代表要找的數目	
echo "Test 9: \n";
print_r(preg_match_all("/\b\D{3}\b/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#\b代表邊界， T.m中間的點代表可以任意數, 如果 T m 中間空格的話，也會被找出來
echo "Test 10: \n";
print_r(preg_match_all("/\bT.m\b/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#\b代表邊界， 只找Tim or Tom的方法 ，中間用 |
echo "Test 11: \n";
print_r(preg_match_all("/\bTim|Tom\b/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#\b代表邊界， 只找Tim or Tom的方法 ，中間用 | , 更精簡用法
echo "Test 12: \n";
print_r(preg_match_all("/\bT(i|o)m\b/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";

#群組範圍尋找
echo "Test 13: \n";
print_r(preg_match_all("/\b[A-Z][aeiou][a-z]\b/",$subject_string,$matches_array));
print_r($matches_array);
echo "\n";
