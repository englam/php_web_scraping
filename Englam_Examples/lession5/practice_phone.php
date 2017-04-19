<?php
$test_string="
		Example #01:100 000 0001
		Example #02:200 010-0002
		Example #03:300.010.0003
		Example #04:400 000 0004.
		Example #05:<td>500 000-0005</td>
		Example #06:<td> 600.111.0006</td>
		Example #07:(700) 111 0007
		Example #08:(800) 111-0008
		Example #09:(900) 111.0009
		Example #10:(111) 222 0010
		Example #11:(222) 222-(0011)
		Example #12:(333) (222).0012.";

echo $test_string;
#\d 為任意數字字元 ， \D為 非任意數字字元

/*
 * 將test string裡面的數字 filter出來，但是如果數字有（）, ex (333)的則無法顯示
 */

$pattern = "/\d{3}(\D)\d{3}(\D)\d{4}/";
preg_match_all($pattern, $test_string,$matches_array);
var_dump($matches_array[0]);

#上列的沒辦法將有()的number過濾出來，用下面的方法是直接過濾有括號的出來顯示

/*
 * 將test string裡面的數字 filter出來，可以顯示(), ex (333)的則可以顯示
 */

$pattern_2 = "/\(\d{3}\)(\D)\d{3}(\D)\d{4}/";
preg_match_all($pattern_2, $test_string,$matches_array);
var_dump($matches_array[0]);


$pattern_3 = "/\(\d{3}\)(\D)\(\d{3}\)(\D)\d{4}/";
preg_match_all($pattern_3, $test_string,$matches_array);
var_dump($matches_array[0]);

$pattern_4 = "/\(\d{3}\)(\D)\d{3}(\D)\(\d{4}\)/";
preg_match_all($pattern_4, $test_string,$matches_array);
var_dump($matches_array[0]);
		
