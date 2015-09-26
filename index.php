<?php

require_once __DIR__ . '/vendor/autoload.php';

use Spl\Example\Heap;
use Spl\Example\BrokenHeap;

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

// Corrupted heap example
try {
    $data = range(0, 20);
    shuffle($data);

    $heap = new BrokenHeap();

    foreach ($data as $value) {
        $heap->insert($value);
    }    
} catch (\Exception $ex) {
    var_dump('PROBLEM: '.$ex->getMessage());
    
    /*
     * Output:
     *  Uncaught exception 'RuntimeException' with message 'Heap is corrupted, 
     *  heap properties are no longer ensured.'
     * 
     * Now trying with another try {} catch block to prevent the damage and
     * unblock the heap, using recoverFromCorruption().
     */
    foreach ($heap as $result) {
        try {
            var_dump($heap->extract());
        } catch (\Exception $ex) {
            $heap->recoverFromCorruption();
        }
    }
}
