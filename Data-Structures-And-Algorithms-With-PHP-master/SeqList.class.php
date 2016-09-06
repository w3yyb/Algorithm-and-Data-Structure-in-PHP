<?php

/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 16/1/8
 * Time: 下午2:42
 */
class SeqStoreList
{
    private $_seq_arr;

    private $_length;


    public function __construct($arr = array())
    {
        $this->_seq_arr = $arr;
        $this->_length = count($arr);
    }


    public function InitList()
    {
        $this->_seq_arr = array();
        $this->_length = 0;
    }


    public function ListEmpty()
    {
        return $this->_length === 0;
    }


    public function ClearList()
    {
        $this->_seq_arr = array();
        $this->_length = 0;
    }


    public function GetElem($index)
    {
        if ($index > $this->_length || $index < 0 || $this->_length == 0 || !is_int($index)) return "err";
        return $this->_seq_arr[$index - 1];
    }


    public function LocateElem($elem)
    {
        for ($i = 0; $i < $this->_length; $i++) {
            if ($elem == $this->_seq_arr[$i]) {
                return $i + 1;
            }
        }
        return 0;
    }


    public function ListInsert($index, $elem)
    {
        if ($index < 1 || $index > $this->_length + 1 || !is_int($index)) return "err";
        for ($i = $this->_length - 1; $i >= $index - 1; $i--) {
            $this->_seq_arr[$i + 1] = $this->_seq_arr[$i];
        }
        $this->_seq_arr[$index - 1] = $elem;
        $this->_length++;
        return "ok";
    }


    public function ListDelete($index)
    {
        if ($index < 1 || $this->_length == 0 || !is_int($index) || $index > $this->_length) return "err";
        $elem = $this->_seq_arr[$index - 1];
        for ($i = $index; $i < $this->_length; $i++) {
            $this->_seq_arr[$i - 1] = $this->_seq_arr[$i];
        }
        unset($this->_seq_arr[$this->_length - 1]);
        $this->_length--;
        return $elem;
    }


    public function ListLength()
    {
        return $this->_length;
    }

    public function ListPrint()
    {
        return $this->_seq_arr;
    }

}

//测试
//$list = new SeqStoreList(array("A","C"));
//echo $list->GetElem(1);
//echo "\n";
//echo  $list->ListLength();
//echo "\n";
//echo $list->ListInsert(1,"v");
//echo "\n";
//var_dump($list->ListPrint());
//echo "\n";
//echo $list->ListInsert(3,"333");
//echo "\n";
//var_dump($list->ListPrint());
//echo "\n";
//echo $list->ListInsert(4,"34433");
//echo "\n";
//echo $list->ListInsert(6,"34433");
//echo "\n";
//echo $list->ListInsert(8,"34433");
//echo "\n";
//var_dump($list->ListPrint());
//echo "\n";
//echo $list->ListDelete(1);
//echo "\n";
//var_dump($list->ListPrint());
//echo "\n";
//echo $list->ListDelete(5);
//echo "\n";
//var_dump($list->ListPrint());
//echo "\n";
//echo $list->ListDelete(5);
//echo "\n";
//var_dump($list->ListPrint());
//echo "\n";
//echo $list->LocateElem("333");