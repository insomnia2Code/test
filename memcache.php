<?php
$mem = new Memcache();
$mem->connect('localhost', 11211) or die('could not connect');

// $version = $mem->getVersion();
// echo 'Server\'s version:'. $version .'<br/>';
// print_r($mem->getStats());

// $tmp_obj = new stdClass;
// $tmp_obj->str_attr = 'test';
// $tmp_obj->int_attr = 123;

// $mem->set('key', $tmp_obj, false, 10) or die('Failed to save data at the server');
// echo "store data in the cache (data will expire in 10 seconds<br/>";

// $get_result = $mem->get('key');
// echo '$data from the cache:<br/>';
// var_dump($get_result);

// $temp = array('1234234', '23423432','234324','23423423','234234234');

// $mem->add('value1', $temp, false, 30);

$value = $mem->get('value1');
print_r($value);