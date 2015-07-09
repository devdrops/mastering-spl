<?php

namespace MasteringSpl;

class Calculator extends \SplStack
{
    public function calculate()
    {
        $value1   = $this->pop();
        $value2   = $this->pop();
        $operator = $this->pop();

        if ($operator == 'add') {
            $this->push($value1 + $value2);
        } elseif ($operator == 'subtract') {
            $this->push($value1 - $value2);
        } elseif ($operator == 'multiply') {
            $this->push($value1 * $value2);
        } elseif ($operator == 'divide') {
            $this->push($value1 / $value2);
        }
        
        if ($this->count() > 1) {
            $this->calculate();
        }
    }
}
