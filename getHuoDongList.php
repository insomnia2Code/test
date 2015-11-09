<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';

//$sql="select * from blog_express_helpdesk where subject like '%糖猫%' limit 0,10";
$sql="select * from blog_express_helpdesk where recommend=1 and cat_id in(select cid from blog_category_help where cat_name like '%热门活动%')";
echo $sql."<br/>";
$rs=mysql_query($sql);
if($rs){
    $row=mysql_fetch_array($rs);
    print_r($row);
}

?>
