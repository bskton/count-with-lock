<?php

require __DIR__ . '/../vendor/autoload.php';

$file = __DIR__.'/../src/count-with-lock.php';

$loop = React\EventLoop\Factory::create();

for($i = 0; $i < 300; $i++) {
  $process = new React\ChildProcess\Process('php '.$file);;
  $process->start($loop);

  $process->stdout->on('data', function ($chunk) {
      echo $chunk;
  });

  $process->on('exit', function($exitCode, $termSignal) {
      echo 'Process exited with code ' . $exitCode . PHP_EOL;
  });
}

$loop->run();