<?php

require_once __DIR__ . '/vendor/autoload.php';

// Doubly linked list playground

echo 'ITERATOR MODE: DEFAULT'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}

echo 'ITERATOR MODE: LIFO'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
$foo->setIteratorMode(IT_MODE_LIFO);
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}

echo 'ITERATOR MODE: FIFO'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
$foo->setIteratorMode(IT_MODE_FIFO);
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}
