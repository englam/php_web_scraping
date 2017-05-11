<?php

include ('LIB_mysql.php');

$data_array['NAME'] = "test2";
$data_array['CITY'] = "Taiwan";
$data_array['STATE']= "CA";
$data_array['ZIP']	= "55410";


#新增
#insert("php_scraping", $table="test",$data_array);
#更新
#update(DATABASE,$table="test",$data_array,$key_column="id",$id="1");
#查詢
$array = exe_sql(DATABASE,"select * from test");
print_r($array);


