<?php

require_once __DIR__ . '/vendor/autoload.php';

use Spl\Example\Heap;
use Spl\Example\BrokenHeap;
use Spl\Example\AgeHeap;

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
     * 
     * Just to make it clear:
     * THIS PRACTICE IS DESIGNED TO KILL PANDAS. PLEASE, DO NOT KILL PANDAS.
     */
    foreach ($heap as $result) {
        try {
            var_dump($heap->extract());
        } catch (\Exception $ex) {
            $heap->recoverFromCorruption();
        }
    }
}

// Book example: the AgeHeap
$ageHeap = new AgeHeap();

$ageHeap->insert(['name' => 'John Doe', 'age' => 33]);
$ageHeap->insert(['name' => 'Joseph Potatoes', 'age' => 30]);
$ageHeap->insert(['name' => 'Ernest le Vampire', 'age' => 300]);
$ageHeap->insert(['name' => 'Conan the Barbarian', 'age' => 53]);
$ageHeap->insert(['name' => 'Eek the Cat', 'age' => 30]);

foreach ($ageHeap as $item) {
    var_dump($item['name']." is ".$item['age']." year old");
}
