<?php

require_once '../mobile/dbconnect_utf.php';

$uid=63;
$cart=getCartByUid($uid);
$cartId=$cart['id'];
$cart=getCartDetailByCid($cartId);

echo json_encode($cart);


function getUserInfoByUid($uid){
    $sql=sprintf("select * from blog_express_customer where customer_id='%d'",$uid);
    $result=mysql_query($sql);
    if($result){
        $row=mysql_fetch_array($result);
    }
    return $row;
}
function getCartByUid($uid){
    $sql=sprintf("select * from blog_cart where user_id='%d'",$uid);
    $result=mysql_query($sql);
    if($result){
        $row=mysql_fetch_array($result);
    }
    return $row;
}
function getCartDetailByCid($uid){

    $sql=sprintf("select * from blog_cart_detail where cid='%d'",$uid);
    $result=mysql_query($sql);
    if($result){
        $cart=array();
        $temp=array();
        $totalMoney=0;
        while($row=mysql_fetch_array($result)){
            $productInfo=getProductInfo($row['pid']);
            $temp['pid']=$row['pid'];
            $temp['subject']=$productInfo['subject'];
            $temp['F_Price']=$productInfo['F_Price'];
            $temp['goods_attr']=$row['goods_attr'];
            $temp['count']=$row['count'];
            $totalMoney+=$temp['F_Price'];
            $cart[]=$temp;
        }
        $cart['totalMoney']=$totalMoney;
    }
    return $cart;
}
function getProductInfo($pid){
    $sql=sprintf("select * from blog_article where aid='%d'",$pid);
    $result=mysql_query($sql);
    if($result){
        $row=mysql_fetch_array($result);
    }
    return $row;
}
?>