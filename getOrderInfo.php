<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

//MW86961433262373121
$order_title=isset($_GET["order_title"])?$_GET["order_title"]:"";
$where="";
if($order_title){
    $where=sprintf(" where order_title='%s' ",$order_title);
}
$sql=sprintf("select * from blog_express_orderinfo %s order by create_time desc limit 0,10",$where);
echo $sql;
$rs=mysql_query($sql);
if($rs){
    $arr=array();
    while($row=mysql_fetch_array($rs)){
        $arr[]=$row;
    }
    print_r($arr);
}

?>
