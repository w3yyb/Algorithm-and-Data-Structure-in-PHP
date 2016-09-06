<?php

/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 16/1/12
 * Time: 下午5:37
 */
class Stack
{
    private $_data;
    private $_end;

    public function __construct()
    {
        $this->_data = array();
        $this->_end = null;
    }

    public function InitStack()
    {
        $this->__construct();
    }

    public function ClearStock()
    {
        $this->__construct();
    }

    public function StackEmpty()
    {
        if (null === $this->_end) {
            return false;
        }
        return true;
    }

    public function Push($data)
    {
        if (null === $this->_end) {
            $this->_end = 0;
        } else {
            $this->_end++;
        }
        $this->_data[$this->_end] = $data;
    }

    public function Pop()
    {
        if (null === $this->_end) {
            return false;
        }
        $re = $this->_data[$this->_end];
        unset($this->_data[$this->_end]);
        0 === $this->_end ? $this->_end = null : $this->_end--;
        return $re;
    }

    public function GetTop()
    {
        if (null === $this->_end) {
            return false;
        }
        return end($this->_data);
    }


    public function StackLength()
    {
        return count($this->_data);
    }


    public function PrintStack()
    {
        return $this->_data;
    }
}


//echo "test";
//$stack = new Stack();
//$stack->Push("aaaa");
//$stack->Push("bbbb");
//$stack->Push("cccc");
//
//var_dump($stack->PrintStack());
//$stack->Pop();
//var_dump($stack->PrintStack());
//echo $stack->StackLength();
//echo $stack->GetTop();

