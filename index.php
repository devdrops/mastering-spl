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

for ($i = 0; $i < 9; $i++) {
    
}
