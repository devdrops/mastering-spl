<?php

$queue = new \SplQueue();
$queue->setIteratorMode(IT_MODE_FIFO|IT_MODE_KEEP);

for ($i = 0; $i < 15; $i++){
    $queue->enqueue($i);
}

foreach($queue as $item) {
    var_dump($item);
}

var_dump('COUNT: '.$queue->count());



$queue2 = new \SplQueue();
$queue2->setIteratorMode(IT_MODE_FIFO|IT_MODE_DELETE);

for ($i = 0; $i < 15; $i++){
    $queue2->enqueue($i);
}

foreach($queue2 as $item) {
    var_dump($item);
}

var_dump('COUNT: '.$queue2->count());



$queue3 = new \SplQueue();
$queue3->setIteratorMode(IT_MODE_FIFO|IT_MODE_DELETE);

for ($i = 0; $i < 15; $i++){
    $queue3->enqueue($i);
}

foreach($queue3 as $item) {
    $queue3->dequeue();
    
    var_dump('COUNT: '.$queue3->count());
}

var_dump('COUNT: '.$queue3->count());
$queue3->dequeue();
var_dump('COUNT: '.$queue3->count());
