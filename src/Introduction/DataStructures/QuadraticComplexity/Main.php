<?php

namespace Introduction\DataStructures\QuadraticComplexity;

use Introduction\DataStructures\QuadraticComplexity\Node;

class Main
{
    protected $_nodeElements;

    /**
     *
     */
    public function set($key, Node $value)
    {
        $this->_nodeElements[] = [$key, $value];
    }

    /**
     *
     */
    public function getElements()
    {
        return $this->_nodeElements;
    }
}
