<?php
$list = array(10,3,5,7,18,11,45,64,74,23,21,6);
$list = insert_sort($list);
var_dump($list);

function insert_sort($array){
	$return = array();
	for ($i=0,$count=count($array); $i < $count; $i++) {
		$last = true;
		for ($j=0,$size=count($return); $j < $size; $j++) { 
			if($return[$j] > $array[$i]){
				$last= false;				
				$m = $size;
				while($m > $j){
					$return[$m] = $return[$m-1];
					$m--;
				}
				$return[$j] = $array[$i];
				break;
			}
		}
		if($last){
			$return[] = $array[$i];
		}
	}
	return $return;
}




function insertsort($arr1,$max=11){   
       
    for($i=1;$i<=$max;$i++){   
        $tmp = $arr1[$i];   
        $j = $i - 1;   
        while($j>=0 && $tmp<$arr1[$j]){   
            $arr1[$j+1] = $arr1[$j];   
            $j--;   
        }   
        $arr1[$j+1] = $tmp;   
    }   
       
    return $arr1;
}   
?>