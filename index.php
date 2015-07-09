<?php

require_once __DIR__ . '/vendor/autoload.php';

/*
 * SplStack()
 *  - It haves all the same funcionality of a SplDoublyLinkedList (SplStack
 *    extends SplDoublyLinkedList) with a obvious difference: it only accepts
 *    IT_MODE_LIFO as iterator mode - which makes it a stack :D
 *  - If you try to set IT_MODE_FIFO, it raises a RuntimeException, but
 *    only AT THE FIRST CALL TO setIteratorMode(). If you first call
 *    setIteratorMode(IT_MODE_LIFO), then do your job, and then call
 *    setIteratorMode(IT_MODE_FIFO), it will behave as a SplDoublyLinkedList!
 *    So it's not a stack anymore. WTFBBQ!
 */

echo '<h1>ITERATOR MODE: DEFAULT (IT_MODE_LIFO)</h1>'.PHP_EOL;
$stack = new \SplStack();
$stack->setIteratorMode(\SplStack::IT_MODE_LIFO);
for ($i = 0; $i < 10; $i++) {
    $stack->add($i, 'elem'.$i);
}
foreach($stack as $element) {
    var_dump($element);
}
var_dump('TOP: '.$stack->top());
var_dump('BOTTOM: '.$stack->bottom());

// Uncaught exception 'RuntimeException' with message 'Iterators' LIFO/FIFO modes for SplStack/SplQueue objects are frozen
$stack->setIteratorMode(\SplStack::IT_MODE_FIFO);
foreach($stack as $element) {
    var_dump($element);
}