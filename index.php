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

echo 'ITERATOR MODE: LIFO|IT_MODE_KEEP'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
$foo->setIteratorMode($foo::IT_MODE_LIFO);
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}

echo 'ITERATOR MODE: FIFO|IT_MODE_KEEP'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
$foo->setIteratorMode($foo::IT_MODE_FIFO);
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}

echo 'ITERATOR MODE: FIFO|IT_MODE_DELETE'.PHP_EOL;
$foo = new \SplDoublyLinkedList();
$foo->setIteratorMode($foo::IT_MODE_FIFO|$foo::IT_MODE_DELETE);
for ($i = 0; $i < 20; $i++) {
    $foo->add($i, 'elem'.$i);
}
foreach($foo as $element) {
    var_dump($element);
}
print_r('COUNT: '.$foo->count().PHP_EOL);
