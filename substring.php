<?php
$a = '15点-18点,20点-22点';
$onTime = str_replace('点', '', $a);
$onTimes = explode(',', $onTime);
$now = date('H',time());
foreach($onTimes as $on){
    list($begin, $end) = explode('-', $on);
    if($now>$begin && $now< $end){
        echo 111;
    }else{
    	echo 2222;
    }
}