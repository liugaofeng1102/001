<?php
header('Content-Type:text/html;charset=utf-8');
$arr = array(
        0=>array('id'=>1,'name'=>'家用电器','pid'=>0),
		1=>array('id'=>2,'name'=>'手机','pid'=>0),
		2=>array('id'=>3,'name'=>'电脑办公','pid'=>0),
		3=>array('id'=>4,'name'=>'电视','pid'=>1),
		4=>array('id'=>5,'name'=>'空调','pid'=>1),
		5=>array('id'=>6,'name'=>'洗衣机','pid'=>1),
		6=>array('id'=>7,'name'=>'合资品牌','pid'=>4),
		7=>array('id'=>8,'name'=>'国产品牌','pid'=>4),
		8=>array('id'=>9,'name'=>'互联网品牌','pid'=>4),
		9=>array('id'=>10,'name'=>'挂式空调','pid'=>5),
		10=>array('id'=>11,'name'=>'柜式空调','pid'=>5),
		11=>array('id'=>12,'name'=>'中央空调','pid'=>5),
		12=>array('id'=>13,'name'=>'滚筒洗衣机','pid'=>6),
		13=>array('id'=>14,'name'=>'洗烘一体机','pid'=>6),
		14=>array('id'=>15,'name'=>'乐视','pid'=>8),
		15=>array('id'=>16,'name'=>'创维','pid'=>8)		
);

// foreach($arr as $k=>$v){
// 	echo $v['name'].'<br/>';
// }

  /*function gettree($arr,$pid=0){
      static $myarr = array();
      foreach ($arr as $k=>$v){
          if($v['pid']==$pid){
          $myarr[]=$v;
          gettree($arr,$v['id']);
          }
      }
      return $myarr;
  }*/


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
       echo $v['html'].$v['name'].'<br/>';
   }
 echo '<br/>';

   function childlist($arr,$id=0){
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
    echo $v['name'].'<br/>';
}





