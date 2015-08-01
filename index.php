<?php

require_once __DIR__ . '/vendor/autoload.php';

/**
 * The SplQueue class
 * 
 * - Curious:
 *		SplStack()->setIteratorMode(\SplDoublyLinkedList::IT_MODE_LIFO)
 */

$queue = new \SplQueue();

$queue->setIteratorMode(\SplDoublyLinkedList::IT_MODE_FIFO);
