<?php 
/*步骤4：遍历所有球员数据（$shoot_arr），取出左脚射门次数在10至50之间的球员数据，并按照左脚射门次数从高到低排列，保存到数组$left_10to50_arr（数组结构与$shoot_arr相同，键值从0开始）。*/

include './02.php';

$left_10to50_arr = array();
foreach ($shoot_arr as $key => $value) {
	if ($value[4]>=10 && $value[4]<=50) {
		$left_10to50_arr[] = $value;
	}
}

// var_dump($left_10to50_arr);

foreach ($left_10to50_arr as $key => $value) {
	$a1[] = $value[4];
}

// var_dump($a1);
array_multisort($a1, $left_10to50_arr);
$left_10to50_arr = array_reverse($left_10to50_arr);
// var_dump($left_10to50_arr);

?>