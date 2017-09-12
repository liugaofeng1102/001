<?php
header('Content-Type:text/html;charset=utf-8');
/*无限极分类

示例：快递地址

安徽
--合肥
----庐阳区
------大杨镇
--安庆

江苏
--南京
----玄武区
------梅园新村街道
上海
--黄浦区
----外滩*/

$arr = array( array('id'=>1 , 'address'=>'安徽' , 'pid' => 0),
    array('id'=>2 , 'address'=>'江苏' , 'pid' => 0),
    array('id'=>3 , 'address'=>'合肥' , 'pid' => 1),
    array('id'=>4 , 'address'=>'庐阳区' , 'pid' => 3),
    array('id'=>5 , 'address'=>'大杨镇' , 'pid' => 4),
    array('id'=>6 , 'address'=>'南京' , 'pid' => 2),
    array('id'=>7 , 'address'=>'玄武区' , 'pid' => 6),
    array('id'=>8 , 'address'=>'梅园新村街道', 'pid' => 7),
    array('id'=>9 , 'address'=>'上海' , 'pid' => 0),
    array('id'=>10 , 'address'=>'黄浦区' , 'pid' => 9),
    array('id'=>11 , 'address'=>'外滩' , 'pid' => 10),
    array('id'=>12 , 'address'=>'安庆' , 'pid' => 1) );


function gettree($arr,$pid=0,$count=0,$html='-'){
    static $myarr = array();
    foreach($arr as $k=>$v){
        if($v['pid'] == $pid){
            $v['html'] = str_repeat($html, $count) ;
            $myarr[] = $v ;
            gettree($arr,$v['id'],$count+1,$html);
        }
    }
    return $myarr ;
}
foreach (gettree($arr) as $k=>$v){
    echo $v['html'].$v['address'].'<br/>';
}
echo '<br/>';

function childlist($arr,$id=1){
    $list = array();
    foreach($arr as $k=>$v){
        if($v['pid'] == $id){
            $v['child'] = childlist($arr,$v['id']);
            $list[] = $v ;
        }
    }

    return $list ;
}
foreach (childlist($arr) as $k=>$v){
    echo $v['address'].'<br/>';
}
