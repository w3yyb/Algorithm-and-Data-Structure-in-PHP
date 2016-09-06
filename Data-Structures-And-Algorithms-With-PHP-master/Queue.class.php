<?php

/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 16/1/12
 * Time: 下午6:00
 */
class Queue
{
    private $_data;

    public function __construct()
    {
        $this->_data = array();
    }

    public function InitQueue()
    {
        $this->__construct();
    }

    public function DestoryQueue()
    {
        unset($this->_data);
    }

    public function ClearQueue()
    {
        $this->__construct();
    }

    public function QueueEmpty()
    {
        return count($this->_data) == 0;
    }

    public function GetHead()
    {
        return $this->_data[0];
    }

    public function EnQueue($element)
    {
        array_push($this->_data, $element);
    }

    public function DeQueue()
    {
        return array_shift($this->_data);
    }

    public function QueueLength()
    {
        return count($this->_data);
    }

    public function PrintQueue()
    {
        return $this->_data;
    }
}

//echo "test";
//$queue = new Queue();
//$queue->EnQueue("Aaa");
//$queue->EnQueue("bbbb");
//$queue->EnQueue("cccc");
//var_dump($queue->PrintQueue());
//$queue->DeQueue();
//var_dump($queue->PrintQueue());
//echo $queue->GetHead();
//$queue->ClearQueue();
//echo $queue->QueueLength();