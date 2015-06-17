<?php

require_once __DIR__ . '/vendor/autoload.php';

// Basic start

$foo = new \Introduction\DataStructures\AssociateArray();
$foo->set("key1", "value1");
$foo->set("key2", "value2");
var_dump($foo->get("key2"));
var_dump($foo->get("key1"));
var_dump($foo->get("whattheheck"));

// Quadratic complexity

$main = new \Introduction\DataStructures\QuadraticComplexity\Main();

for ($i = 0; $i < 10; $i++) {
    $node = new \Introduction\DataStructures\QuadraticComplexity\Node();
    $node->setElement($i);

    $main->set('element'.$i, $node);
}

foreach($main->getElements() as $element) {
    foreach($element as $item) {
        // A quadratic complexity can be found where you have a loop over another loop. 
        // This makes that if the first loop have 10 itens, and each of these itens have
        // 10 another itens, you'll find yourself in a complexity of 10 * 10 = 100 iterations!
        //
        // Of course that this is a simple example, but it suits the idea.
        var_dump($item);
    }
}
