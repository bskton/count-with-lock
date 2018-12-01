<?php

$file = __DIR__.'/../data/counter.txt';
file_put_contents($file, file_get_contents($file) + 1);