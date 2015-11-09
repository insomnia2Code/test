<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

$phone=isset($_GET['phone'])?$_GET['phone']:"";
if($phone){
    $sql=sprintf("delete from mall_userwx_map where phone_num='%s'",$phone);
    echo $sql;
    $rs=mysql_query($sql);
    if($rs){
        echo "删除成功";
    }else{
        echo "删除失败";
    }
}
?>
