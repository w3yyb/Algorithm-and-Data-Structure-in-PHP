<?php

/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 16/1/13
 * Time: 上午9:13
 */
class Deque
{

    private $_queue;

    public function __construct($dequeue = array())
    {
        if (is_array($dequeue)) {
            $this->_queue = $dequeue;
        }
    }

    public function GetFront()
    {
        return reset($this->_queue);
    }

    public function GetEnd()
    {
        return end($this->_queue);
    }

    public function DequEmpty()
    {
        return empty($this->_queue);
    }

    public function DequeLength()
    {
        return count($this->_queue);
    }

    public function PushEnd($elem)
    {
        array_push($this->_queue, $elem);
    }

    public function PushFront($elem)
    {
        array_unshift($this->_queue, $elem);
    }

    public function PopEnd()
    {
        return array_pop($this->_queue);
    }

    public function PopFront()
    {
        return array_shift($this->_queue);
    }

    public function ClearDeque()
    {
        $this->_queue = array();
    }

    public function PrintDeque()
    {
        return $this->_queue;
    }
}