<?php
$a = 'wrewsfwerwerwerwe';
$begin = microtime(true);
for($i = 0; $i<100000; $i++){
	echo 'hao do you '.$a;
}
$end = microtime(true);
$time = $end-$begin;
echo '<br/>';
echo $time;
echo '<br/>';
$begin2 = microtime(true);
for($i = 0; $i<100000; $i++){
	echo "hao do you $a";
}
$end2 = microtime(true);
$time2 = $end2-$begin2;
echo '<br/>';
echo $time;
echo '<br/>';
echo $time2;
echo '<br/>';