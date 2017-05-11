<?php

//剥去字符串中的 HTML 标签，但是 <b>可以用
echo strip_tags("Hello <b><i>world!</i></b>","<b>")."\n";

//剥去字符串中的 HTML 标签，但是 <i>可以用
echo strip_tags("Hello <b><i>world!</i></b>","<i>")."\n";

$str=" 測試字串，前後空白都會被清除   ";
echo trim("$str");