<?php

namespace Spl\Example;

class BrokenHeap extends \SplHeap
{
    protected function compare($value1, $value2)
    {
        if ($value1 > $value2) {
            return 1;
        }
        
        if ($value1 < $value2) {
            throw new \Exception("A wild Exception appears!!");
        }
        
        if ($value1 == $value2) {
            return 0;
        }
    }
}
