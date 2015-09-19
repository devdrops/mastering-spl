<?php

/* 
 * Book example.
 */

$eventHandler = new \SplQueue();
$eventHandler->enqueue('function1');
$eventHandler->enqueue('function2');

while (!$eventHandler->isEmpty()) {
    $event = (string)$eventHandler->dequeue();
    
    if (function_exists($event)) {
        $event($eventHandler);
    }
}


function function1(\SplQueue $eventHandler){
    var_dump('function1 was called. Adding function3 to the event handler.');
    
    $eventHandler->enqueue('function3');
    $eventHandler->enqueue('The Knights Who Say NI demands... A SACRIFICE!');
}

function function2(\SplQueue $eventHandler){
    var_dump('function2 was called. Nothing to do here...');
}

function function3(\SplQueue $eventHandler){
    $message = $eventHandler->dequeue();
    
    var_dump('function3 was called. Here is the message: '.$message);
}
