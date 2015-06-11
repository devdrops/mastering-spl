<?php

require_once __DIR__ . '/vendor/autoload.php';

$foo = new \Introduction\DataStructures\AssociateArray();
$foo->set("key1", "value1");
$foo->set("key2", "value2");
var_dump($foo->get("key2"));
var_dump($foo->get("key1"));
var_dump($foo->get("whattheheck"));