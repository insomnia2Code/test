<?php
$arr1 = array(0=>array('a','b','c'),1=>array('d','e','f'));
$arr2 = array(0=>array('g','h','j'),1=>array('b','n','m'));
$arr3 = array_merge($arr1, $arr2);
print_r($arr3);
?>