<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The SplQueue class
 * 
 * - Just like the SplStack class, we can find the same bug: once 
 *   you've already added values to the queue, you can change the
 *   iterator mode from FIFO to LIFO. Geez...
 */

$queue = new \SplQueue();

$queue->setIteratorMode(\SplDoublyLinkedList::IT_MODE_FIFO);
for ($i = 0; $i < 10; $i++) {
    $queue->enqueue('elem'.$i);
}
foreach($queue as $element) {
    var_dump($element);
}

for ($i = 0; $i < 10; $i++) {
    $queue->dequeue();
}
foreach($queue as $element) {
    var_dump($element);
}

/*
$queue->setIteratorMode(\SplDoublyLinkedList::IT_MODE_LIFO);
for ($i = 0; $i < 10; $i++) {
    $queue->enqueue('elem'.$i);
}
foreach($queue as $element) {
    var_dump($element);
}
*/

