<?php
header("Content-type:text/html; charset=utf-8");
$a = Array(0 => Array('fathername' => '全部'),
    546 => Array
        (
            'fathername' => '智能手机',
            'fatherid' => 546,
            'child' => Array
                (
                    0 => Array
                        (
                            'value' => '华为',
                            'id' => '550',
                        ),
                    1 => Array
                        (
                            'value' => 'oppo',
                            'id' => '561',
                        ),
                    2 => Array
                        (
                            'value' => '三星',
                            'id' => '547',
                        )
                )
        )
);
$info = array();
$i = 0;
foreach($a as $k=> $v){
   $info[$i] = getParentCat($v); 
   $i++;
}
var_dump($info);



function getParentCat($array){
    $product = array();
    $sql = sprintf("select pid,cat_name from blog_category where cid=%d limit 1", $array['fatherid']);
    $q = mysql_query($sql);
    $row = mysql_fetch_array($q, MYSQL_ASSOC);
    if($row['pid'] !=0){
        $product['fathername'] = $row['cat_name'];
        $product['fatherid'] = $row['pid'];
        $product['cat_ids'] = $array;
        getParentCat($product);
    }else{
        return $product;
    }
}