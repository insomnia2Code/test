<?php
header("Content-Type: text/html; charset=UTF-8");
require_once '../touch/dbconnect_utf.php';
/*require_once '../mobile/api/getimgbaseurl.php';
$imgbaseurl=getImgBaseUrl();*/

//$sql="select * from mall_yingxiaohuodong where is_on_sale = 1 and flag = 'app' and show_position <>1 and  subject like '%%热门活动%%' order by listorder asc ";
//$sql="select * from mall_yingxiaohuodong where is_on_sale = 1 and flag = 'app' and show_position <>1 and  subject like '%%%%' order by listorder asc ";
$sql="select * from blog_express_helpdesk where recommend=1 and cat_id in(select cid from blog_category_help where cat_name like '%热门活动%')";
$rs=mysql_query($sql);
if($rs){
    $arr=array();
    while($row=mysql_fetch_array($rs)){
        $arr[]=$row;
    }
    print_r($arr);
}else{
    echo "获取失败，请重试";
}

/*foreach($arr as $key=>$item){
    echo $item
}*/

?>

<style type="text/css">
    .div_content{
        width:50%;
        margin: 0 auto;
    }
    .div_hd_item{
        float:left;
        background: #cccccc;
        font-size: 20px;
        width:100%;
        margin: 20px auto 20px auto;
    }
    .div_title{
        text-align: center;
    }
    .div_image{
        width: 100%;
    }
    .img_hd{
        width:100%;
    }
</style>

<div class="div_content">
    <?php

    if($arr){
        foreach($arr as $key=>$item){
            $str=sprintf('<div class="div_hd_item">
        <div class="div_title">
            %s
        </div>
        <div class="div_image">
            <a href="#"><img src="%s" class="img_hd"></a>
        </div>
    </div>',$item['subject'],$item['picurl']);

            echo $str;
        }
    }else{
        echo "暂无活动";
    }

    ?>

    <div style="clear:both;"></div>
</div>



