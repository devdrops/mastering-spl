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
 *     only for the itens creation sequence; count() still works fine.
 *  - When in DELETE MODE, after a complete iteration, both top() and bottom() 
 *    will raise a RuntimeException when called, with the message: 'Can't peek 
 *    at an empty datastructure'.
 *  - We can combine the ITERATOR MODE, even with 2 values at the same time. 
 *    However, if we set both LIFO|FIFO, or FIFO|LIFO, LIFO will be settled - 
 *    even knowing that FIFO is the default (lolwut???).
 *  - unshift() can add new values at the head of the SplDoublyLinkedList. 
 *    IT_MODE_KEEP neither IT_MODE_DELETE affect unshift().
 */

echo '<h1>ITERATOR MODE: DEFAULT (IT_MODE_FIFO)</h1>'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}
var_dump('TOP: '.$foo->top());
var_dump('BOTTOM: '.$foo->bottom());

echo '<h1>ITERATOR MODE: LIFO|IT_MODE_KEEP</h1>'.PHP_EOL;
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

echo '<h1>ITERATOR MODE: FIFO|IT_MODE_KEEP</h1>'.PHP_EOL;
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

echo '<h1>ITERATOR MODE: LIFO|IT_MODE_DELETE</h1>'.PHP_EOL;
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

echo '<h1>ITERATOR MODE: LIFO|FIFO</h1>'.PHP_EOL;
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

echo '<h1>ITERATOR MODE: FIFO|LIFO</h1>'.PHP_EOL;
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

/*
 * UNSHIFT 
 */
echo '<h1>UNSHIFT - IT_MODE_FIFO|IT_MODE_KEEP</h1>';
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 10; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_FIFO|$foo::IT_MODE_KEEP);
var_dump('HEAD is '.$foo->bottom());
$foo->unshift('elem9');
var_dump('Now, HEAD is '.$foo->bottom());
foreach($foo as $element) {
    var_dump($element);
}

echo '<h1>UNSHIFT - IT_MODE_FIFO|IT_MODE_DELETE</h1>';
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 10; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_FIFO|$foo::IT_MODE_DELETE);
var_dump('HEAD is '.$foo->bottom());
$foo->unshift('elem9');
var_dump('Now, HEAD is '.$foo->bottom());
foreach($foo as $element) {
    var_dump($element);
}


/*
 * PUSH 
 */
echo '<h1>PUSH - IT_MODE_FIFO|IT_MODE_KEEP</h1>';
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 10; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_FIFO|$foo::IT_MODE_KEEP);
var_dump('TAIL is '.$foo->top());
$foo->push(5);
var_dump('Now, TAIL is '.$foo->top());
foreach($foo as $element) {
    var_dump($element);
}

echo '<h1>PUSH - IT_MODE_LIFO|IT_MODE_KEEP</h1>';
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 10; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_LIFO|$foo::IT_MODE_KEEP);
var_dump('TAIL is '.$foo->top());
$foo->push(5);
var_dump('Now, TAIL is '.$foo->top());
foreach($foo as $element) {
    var_dump($element);
}

/*
 * SHIFT 
 */
echo '<h1>SHIFT - IT_MODE_FIFO|IT_MODE_KEEP</h1>';
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 10; $i++) {
    $foo->add($i, 'elem'.$i);
}
$foo->setIteratorMode($foo::IT_MODE_FIFO|$foo::IT_MODE_DELETE);
var_dump('HEAD is '.$foo->bottom());
$foo->shift();
var_dump('Now, HEAD is '.$foo->bottom());
foreach($foo as $element) {
    var_dump($element);
}
