<?php

require_once __DIR__ . '/vendor/autoload.php';

use Spl\Example\Heap;

// Numeric example
$data = range(0, 20);
shuffle($data);
var_dump($data);

$heap = new Heap();

foreach ($data as $value) {
    $heap->insert($value);
}

foreach ($heap as $result) {
    var_dump($result);
}

// Alphabetic example
$data = range(65, 90);
shuffle($data);

$heap = new Heap();

foreach ($data as &$value) {
    $value = chr($value);
    
    $heap->insert($value);
}
var_dump($data);

foreach ($heap as $result) {
    var_dump($result);
}
