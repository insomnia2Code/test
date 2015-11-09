<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

$customer_name="LS14395390790382";
$sql=sprintf("select * from blog_express_customer where customer_name='%s'",$customer_name);

$rs=mysql_query($sql);
if($rs){
    $row=mysql_fetch_array($rs);
    print_r($row);
}else{
    echo "error";
}



?>
