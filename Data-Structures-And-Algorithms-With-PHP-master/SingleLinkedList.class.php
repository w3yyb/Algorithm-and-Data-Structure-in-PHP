<?php

/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 16/1/8
 * Time: 下午4:33
 */
class SingleLinkedList
{
    private $_headNode;

    public function __construct()
    {
        $this->_headNode = new Node();
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

        $newNode = new Node();
        $newNode->setData($data);
        $newNode->setNext($node->getNext());
        $node->setNext($newNode);
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
        $node->setNext($delNode->getNext());// 删除结点的后继结点赋值给结点
        unset($delNode);                    // 清除不需要的结点
        return true;
    }

    public function ListLength()
    {
        $j = 0;
        $headNode = $this->_headNode;
        if (!$headNode->getNext()) return 0;
        $node = $headNode->getNext();
        while (!$node) {
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
            $str = $str.$node->getData();
            if ($node->getNext()) {
                $str = $str." => ";
            }
            $node = $node->getNext();
        }
        return $str;
    }
}

/**
 *线性表的单链表存储结构
 */
class Node
{
    private $data = ""; //存储数据
    private $next = null; //存储下一个结点的指针

    public function getData()
    {
        return $this->data;
    }

    public function getNext()
    {
        return $this->next;
    }

    public function setData($data)
    {
        $this->data = $data;
    }

    public function setNext($next)
    {
        $this->next = $next;
    }
}


//echo "test</br>";
//$link = new SingleLinkedList();
//$link->ListInsert(1,"12");
//$link->ListInsert(2,"24");
//echo $link->GetElem(1)."</br>";
//echo $link->GetElem(2)."</br>";
//echo $link->GetElem(8)."</br>";
////$link->ListDelete(1);
//echo $link->LocateElem("24")."</br>";
//echo $link->GetElem(1)."</br>";
//
////echo "aaa";
//echo $link->ListPrint();