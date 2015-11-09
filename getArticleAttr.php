<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

$aid=72;

$sql="select * from blog_article where aid=72 limit 0,1";
$rs=mysql_query($sql);
$articleInfo=array();
$row=mysql_fetch_array($rs);
$content=$row;

$sql="select * from blog_shuxing where cid in (select attr_id from blog_goods_attr where goods_id=72 )";
$rs=mysql_query($sql);
$arr=array();
while($row=mysql_fetch_array($rs)){
    $arr[]=$row;
}
$shuxing=$arr;

$sql="select * from blog_shuxing where cid in(select pid from blog_shuxing where cid in (select attr_id from blog_goods_attr where goods_id=72 ))";
$rs=mysql_query($sql);
$arr=array();
while($row=mysql_fetch_array($rs)){
    $arr[]=$row;
}
$category=$arr;

/*print_r($shuxing);
print_r($category);*/

$cate_info=array();
foreach($category as $key=>$value){
    $cate_info['cid']=$value['cid'];
    $cate_info['cat_name']=$value['cat_name'];
    //$arr_item=array();
    $arr_temp=array();
    foreach($shuxing as $key2=>$value2){
        if($value2['pid']==$value['cid']){
            $arr_temp['cid']=$value2['cid'];
            $arr_temp['cat_name']=$value2['cat_name'];
            //$arr_item[]=$arr_temp;
            $cate_info[$value['cat_name']][]=$arr_temp;
        }
    }
}

print_r($cate_info);



?>
