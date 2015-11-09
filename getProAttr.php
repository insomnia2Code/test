<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

//查询产品所有的一级属性
$article_id=72;
$article_attr=getArticleAttr($article_id);
print_r($article_attr);

function getArticleAttr($article_id){
    $sql=sprintf("select * from blog_shuxing where cid in( select pid from blog_shuxing where cid in(select attr_id from blog_goods_attr where goods_id = %d))",$article_id);
    $rs=mysql_query($sql);
    if($rs){
        $attr1=array();
        $temp=array();
        while($row=mysql_fetch_array($rs)){
            $temp['attr_id']=$row['cid'];
            $temp['attr_value']=$row['cat_name'];
            $temp['child']=getChildAttr($article_id,$temp['attr_id']);
            $attr1[]=$temp;
        }
        return $attr1;
    }
}

//查询所有产品的二级属性
function getChildAttr($article_id,$pid){
    $sql=sprintf("select * from blog_goods_attr where attr_id in(
    select cid from blog_shuxing where cid in(select attr_id from blog_goods_attr where goods_id = %d) and pid=%d
    ) and goods_id=%d",$article_id,$pid,$article_id);
    //echo $sql;
    $rs=mysql_query($sql);
    if($rs){
        $attr2=array();
        $temp=array();
        while($row=mysql_fetch_array($rs)){
            $temp['attr_id']=$row['attr_id'];
            $temp['attr_value']=$row['attr_value'];
            $temp['attr_price']=$row['attr_price'];
            $attr2[]=$temp;
        }
        return $attr2;
    }
}

echo "<br/>";
foreach($article_attr as $key=>$item){
    $str=sprintf("%s：<br/>",$item['attr_value']);
    echo $str;
    $str="";
    foreach($item['child'] as $key2=>$value2){
        $str.=" ".$value2['attr_value'].",";
    }
    echo $str."<br/>";
}



?>