<?php

$file = __DIR__.'/../data/counter.txt';
$fp = fopen($file,"a+");
flock($fp, LOCK_EX);
$count = fread($fp, 1024);
@$count++;
ftruncate($fp, 0);
fwrite($fp, $count);
fflush($fp);
flock($fp, LOCK_UN);
fclose($fp);