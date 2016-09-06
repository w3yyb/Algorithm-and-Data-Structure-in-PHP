<?php

/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 16/1/12
 * Time: 下午1:16
 */
class DoubleLinkedList
{
    private $_headNode;

    public function __construct()
    {
        $this->_headNode = new dNode();
    }

    public function InitList()
    {
        $this->__construct();
    }

    public function ClearList()
    {
        unset($this->_headNode);
        $this->__construct();
    }

    public function GetElem($i)
    {
        //与单链表相同
        $j = 1;
        $headNode = $this->_headNode;
        $node = $headNode->getNext();
        while ($node && $j < $i) {
            $node = $node->getNext();
            $j++;
        }

        if (!$node || $j > $i) { //$i 个元素不存在时
            return "err";
        }

        $data = $node->getData(); //取第$i个元素的数据
        return $data;
    }

    public function LocateElem($elem)
    {
        //与单链表相同
        $j = 1;
        $headNode = $this->_headNode;
        $node = $headNode->getNext();
        while ($node) {
            if ($elem == $node->getData()) return $j;
            $node = $node->getNext();
            $j++;
        }
        return -1;
    }

    public function ListInsert($i, $data)
    {
        //后插
        $j = 1; //从第一个元素开始遍历
        $node = $this->_headNode; // 指向头结点

        while ($node && $j < $i) {
            $node = $node->getNext();
            $j++;
        }

        if (!$node || $j > $i) { // $i个结点不存在时
            return "err";
        }

        $newNode = new dNode();
        $nextNode = $node->getNext();
        $newNode->setData($data);
        $newNode->setNext($node->getNext());
        $newNode->setPre($node);
        $node->setNext($newNode);
        if ($nextNode) $nextNode->setPre($newNode);
        return true;
    }

    public function ListDelete($i)
    {
        $j = 1;
        $node = $this->_headNode; // 指向头结点
        while ($node && $j < $i) {
            $node = $node->getNext();
            $j++;
        }
        if (!$node || $j > $i) {
            return "err";
        }
        $delNode = $node->getNext();        // 需要删除的结点
        $nextNode = $delNode->getNext();
        $node->setNext($nextNode);
        $nextNode->setPre($node);
        unset($delNode);                    // 清除不需要的结点
        return true;
    }

    public function ListLength()
    {
        $j = 0;
        $headNode = $this->_headNode;
        if (!$headNode->getNext()) return 0;
        $node = $headNode->getNext();
        while ($node) {
            $j++;
            $node = $node->getNext();
        }
        return $j;
    }

    public function ListPrint()
    {
        $headNode = $this->_headNode;
        $node = $headNode->getNext();
        $str = "";
        while ($node) {
            $str = $str . $node->getData();
            if ($node->getNext()) {
                $str = $str . " <=> ";
            }
            $node = $node->getNext();
        }
        return $str;
    }
}

class dNode
{
    private $_data = ""; //存储数据
    private $_pre = null;//储存上一个结点的指针
    private $_next = null; //存储下一个结点的指针

    public function getData()
    {
        return $this->_data;
    }

    public function getNext()
    {
        return $this->_next;
    }

    public function getPre()
    {
        return $this->_pre;
    }

    public function setData($data)
    {
        $this->_data = $data;
    }

    public function setNext($next)
    {
        $this->_next = $next;
    }

    public function setPre($pre)
    {
        $this->_pre = $pre;
    }
}

//test
//$node = new DoubleLinkedList();
//$node->ListInsert(1, "a");
//$node->ListInsert(2, "s");
//$node->ListInsert(3, "b");
//$node->ListInsert(4, "c");
//$node->ListInsert(5, "x");
//$node->ListInsert(6, "i");
//
//$node->ListInsert(1,"111");
//$node->ListDelete(2);
//
//echo $node->ListPrint()."</br>";
//echo $node->ListLength();