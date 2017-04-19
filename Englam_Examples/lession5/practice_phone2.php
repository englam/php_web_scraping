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
		Example #11:(222) 222-0011
		Example #12:(333) 222.0012.";

echo $test_string;
#\d 為任意數字字元 ， \D為 非任意數字字元
$wo_parentheses = "\d{3}(\D)\d{3}(\D)\d{4}";
$w_parentheses = "\(\d{3}\)(\D)\d{3}(\D)\d{4}";

#把pattern用or的方式把二個公式加進來，之後再做filter
$pattern = "/(".$w_parentheses."|".$wo_parentheses.")/";
preg_match_all($pattern, $test_string,$matches_array);
var_dump($matches_array[0]);

#print_r($matches_array);




