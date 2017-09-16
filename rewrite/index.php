<?php
header('content-type:text/html;charset=utf-8');
$page = $_GET['page'] ? $_GET['page'] : 1;
echo '当前是第' , $page , '页<hr>';
echo '随机数:' , mt_rand() , '<hr>';
for($n=1;$n<10;$n++){
	echo '<a href="index-' , $n , '.html">第' , $n , '页</a>&nbsp;&nbsp;' , "\n";
}
