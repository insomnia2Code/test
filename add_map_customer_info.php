<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

$sql="
select * from mall_userwx_map where phone_num not in(select customer_name from blog_express_customer)
";

$rs=mysql_query($sql);
if($rs){
    $arr=array();
    while($row=mysql_fetch_array($rs)){
      $arr[]=$row;
    }
    print_r($arr);
}

for($i=0;$i<count($arr);$i++){
    $sql=sprintf("insert into blog_express_customer(customer_name,customer_pass,customer_zhuceshijian,customer_alias) values('%s','%s',%d,'%s')",
        $arr[$i]['phone_num'],md5(111111),$arr[$i]['time'],$arr[$i]['nickname']);
    echo $sql."<br/>";
    $rs=mysql_query($sql);
    if($rs){
        echo $sql."<br/>";
    }
}

?>
