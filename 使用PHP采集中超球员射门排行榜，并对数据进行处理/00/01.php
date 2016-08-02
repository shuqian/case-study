<?php 
include './readdata.php';

/*
步骤8：写一个Class，该Class的构造函数传入参数$shoot_arr，返回一个重新排序的数组（数组结构与$shoot_arr相同，键值从0开始）。实例化并执行该Class，将结果保存到$sort_arr。排序规则如下：
1.	所有球员按左脚射门次数从高到低排列
2.	左脚射门次数相同的，再以右脚射门次数从高到低排序
3.	左右脚射门次数均相同的，再以头球次数从高到低排序
 */

// 排名、姓名、球队、射门数、左脚、右脚、头球、其它部位

foreach ($shoot_arr as $key => $value) {
	$arr1[$key] = $value['4'];
	$arr2[$key] = $value['5'];
	$arr3[$key] = $value['6'];
}

array_multisort($arr1, $arr2, $arr3, $shoot_arr);

$sort_arr = array_reverse($shoot_arr);

$sort_arr_str = "<hr/>";
$sort_arr_str .= "<table border='1' width='800'>";
$sort_arr_str .= "<tr><th>排名</th><th>姓名</th><th>球队</th><th>射门数</th><th bgcolor='#ccc'>左脚</th><th>右脚</th><th>头部</th><th>其他部位</th></tr>";
foreach ($sort_arr as $value) {
	$sort_arr_str .= "<tr>";
	$sort_arr_str .= "<td align='center'>{$value[0]}</td><td align='center'>{$value[1]}</td><td align='center'>{$value[2]}</td><td align='center'>{$value[3]}</td><td align='center' bgcolor='#eee'>{$value[4]}</td><td align='center'>{$value[5]}</td><td align='center'>{$value[6]}</td><td align='center'>{$value[7]}</td>";
	$sort_arr_str .= "</tr>";
}
$sort_arr_str .= "</table>";

echo $sort_arr_str;

?>