<?php
#找出關鍵字在第幾個字元
echo strpos("You love php, I love php too!","php");
echo "\n";
#找出第幾個的參數, substr(string,start,length)
echo substr("Hello world",6);
echo "\n";
echo substr("Hello world",6,2);

echo "\n";
#
$string="abcdefg";
echo strlen($string)."\n";

$orig = "I'll \"walk\" the <b>dog</b> now";

$a = htmlentities($orig);

$b = html_entity_decode($a);

echo $a."\n"; // I'll &quot;walk&quot; the &lt;b&gt;dog&lt;/b&gt; now

echo $b."\n"; // I'll "walk" the <b>dog</b> now