<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

$sql="select * from blog_express_mycontact order by id desc limit 0,10";
$rs=mysql_query($sql);
if($rs){
    $arr=array();
    while($row=mysql_fetch_array($rs)){
        $arr[]=$row;
    }
    print_r($arr);
}

?>
