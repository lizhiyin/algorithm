<?php


$data = [3, 2, 4, 1, 5, 7, 6, 111, 55, 4];
//创建多个任意随机数的数组
function createNumbers($num = 100000)
{
    $arr = array();
    for($i = 0; $i < $num; $i ++)
    {
    	$arr[] = rand(0, 1000000);
    }
    return $arr;
}
//获取微秒时间
function getMicrotime($start_time, $end_time)
{
	list($usec, $sec) = explode(' ', $start_time);
	$startTime = ((float)$usec + (float)$sec);
	list($usec, $sec) = explode(' ', $end_time);
	$endTime = ((float)$usec + (float)$sec);
    return $endTime - $startTime;
}
//插入排序
function insertionSort($data){
	$start_time = microtime();

	$length = count($data);
	if($length <= 1)
		return $data;
	//从第二位开始,将该位置的值与前面的一一比较
	for($j = 1; $j < $length; $j ++){
		$key = $data[$j];
		$i = $j -1;
		//左边的数组已排好序，现在要把右边的一个元素插入左边，所以要与左边的元素逐一比较
		while ($i >= 0 && $data[$i] > $key) {
			//空出了$data[$i]的位置，根据上面的条件判断$key值是否插入该位置
			$data[$i+1] = $data[$i];
			$i--;
		}
		//找到插入$key值的位置
		$data[$i+1] = $key;
	}
	$end_time = microtime();
	$total_time = getMicrotime($start_time, $end_time);
	echo "开始时间".$start_time." 结束时间".$end_time." 插入排序用时".$total_time.'s</br>';
	return $data;
}

insertionSort(createNumbers(10000));
// print_r($data);
// $data = insertionSort($data);
// print_r($data);
// echo time();
// echo microtime();
