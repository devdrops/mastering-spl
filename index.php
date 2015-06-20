<?php

require_once __DIR__ . '/vendor/autoload.php';

/*
 * Doubly linked list playground (SplDoublyLinkedList)
 * 
 * Here we can see the following patterns:
 *  - The ITERATOR MODE affects the order of the itens while iterating, but not 
 *    the sequence that they were stored;
 *  - We can set the ITERATOR MODE whenever we want: before or after the object 
 *    creation;
 *  - Both top() and bottom() are not affected by the choosen ITERATOR MODE, but
 *     only for the itens creation sequence;
 *  - When in DELETE MODE, after a complete iteration, both top() and bottom() 
 *    will raise a RuntimeException when called, with the message: 'Can't peek 
 *    at an empty datastructure'.
 *  - We can combine the ITERATOR MODE, even with 2 values at the same time. 
 *    However, if we set both LIFO|FIFO, or FIFO|LIFO, LIFO will be settled - 
 *    even knowing that FIFO is the default (lolwut???).
 */

echo 'ITERATOR MODE: DEFAULT (IT_MODE_FIFO)'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}
var_dump('TOP: '.$foo->top());
var_dump('BOTTOM: '.$foo->bottom());

echo 'ITERATOR MODE: LIFO|IT_MODE_KEEP'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
$foo->setIteratorMode($foo::IT_MODE_LIFO);
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}
var_dump('TOP: '.$foo->top());
var_dump('BOTTOM: '.$foo->bottom());

echo 'ITERATOR MODE: FIFO|IT_MODE_KEEP'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
$foo->setIteratorMode($foo::IT_MODE_FIFO);
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}
var_dump('TOP: '.$foo->top());
var_dump('BOTTOM: '.$foo->bottom());

echo 'ITERATOR MODE: LIFO|IT_MODE_DELETE'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_LIFO|$foo::IT_MODE_DELETE);
foreach($foo as $element) {
    var_dump($element);
}
//var_dump('TOP: '.$foo->top());
//var_dump('BOTTOM: '.$foo->bottom());
print_r('COUNT: '.$foo->count().PHP_EOL);

echo 'ITERATOR MODE: LIFO|FIFO'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_LIFO|$foo::IT_MODE_FIFO);
foreach($foo as $element) {
    var_dump($element);
}
var_dump('TOP: '.$foo->top());
var_dump('BOTTOM: '.$foo->bottom());

echo 'ITERATOR MODE: FIFO|LIFO'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_FIFO|$foo::IT_MODE_LIFO);
foreach($foo as $element) {
    var_dump($element);
}
var_dump('TOP: '.$foo->top());
var_dump('BOTTOM: '.$foo->bottom());
