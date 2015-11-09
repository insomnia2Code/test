<?php
// echo time();
// echo '<br/>';
// echo strtotime(date('Y-m-d',time()));
// echo '<br/>';
// $today  = date('Y-m-d',time());
// $today_start = strtotime($today." 00:00:00");
// echo $today_start;
// $time = strtotime('201510'.'01');
// echo strlen('201506');
// echo substr('201506',0, -2);
// echo $time;
// echo '<br/>';
// $time1 = strtotime(strval(intval('201515')+1).'01');
// echo $time1;
// echo '<br/>';
// echo date('Y-m-d H:i:s', $time1);
// echo '<br/>';
// echo $time;
// echo '<br/>';
// echo date('Y-m-d H:i:s', $time);
// $time = '201501';
// $timeBegin = strtotime($time.'01');
// $month = substr($time, -2);
// $year = substr($time, 0, -2);
// if($month ==12){
//     $end_time = strval($year+1).'0101';
// }else{
//     $end_time = strval(intval($time)+1).'01';
// }

// $timeEnd = strtotime($end_time);
// echo $timeBegin.'<br/>';
// echo $timeEnd.'<br/>';
// echo date('Y-m-d H:i:s', $timeBegin).'<br/>';
// echo date('Y-m-d H:i:s', $timeEnd);

$begin = strtotime('2015-10-19');
echo $begin;
?>