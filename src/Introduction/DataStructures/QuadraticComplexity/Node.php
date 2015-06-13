<?php

namespace Introduction\DataStructures\QuadraticComplexity;

class Node
{
    protected $_element;

    public function setElement($elementValue)
    {
        $this->_element = $elementValue;
    }

    public function getElement()
    {
        return $this->_element;
    }
}
