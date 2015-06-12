<?php

namespace Introduction\DataStructures;

class AssociateArray
{
    protected $_elements;

    /**
     * Method complexity: O(1) [Constant Time Complexity]
     * It doesn't matter how much elements we have, the time for execution will always stay the same.
     * It doesn't mean in any ways that this function is always the fastest, neither the slowest.
     */
    public function set($key, $value)
    {
        $this->_elements[] = [$key, $value];
    }

    /**
     * Method complexity O(n).
     *
     * It depends on _findIndex().
     */
    public function del($key)
    {
        $index = $this->_findIndex($key);

        if ($index !== null) {
            unset($this->_elements[$index]);
        }
    }

    /**
     * Method complexity O(n).
     *
     * It depends on _findIndex().
     */
    public function get($key)
    {
        $index = $this->_findIndex($key);

        if ($index !== null) {
            return $this->_elements[$index][1];
        }
        
        return null;    
    }

    /**
     * Method complexity O(n) [Linear Complexity]
     * (n) is a linear complexity: if the ammount of elements doubles, it doubles the time to execute.
     *
     * BUT, if we only have a single element, the complexity turns to be Theta(1): it contains both the 
     * BEST and WORST scenarios (Big Theta).
     *
     * As we have a O(n) complexity for the _findIndex() method, we can point the following statements:
     *  > Big Omega: the BEST case scenario (the element we're looking for is the FIRST element).
     *  > Big-O:     the WORST case scenario (the element we're looking for is the LAST element).
     *  > Big Theta: when both the BEST and the WORST case scenario are the same.
     */
    protected function _findIndex($key)
    {
        foreach ($this->_elements as $index => $value) {
            if ($this->_elements[$index][0] == $key) {
                return $index;
            }
        }

        return null;
    }
}