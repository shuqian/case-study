<?php 
/*步骤3：随机打乱所有球员数据（$shoot_arr）排列顺序，取出打乱顺序后前3个球员的数据保存到数组$rand_top3_arr（数组结构与$shoot_arr相同，键值从0开始）。*/

include './02.php';

// 随机打乱
shuffle($shoot_arr);

// echo "<pre>";
// print_r($shoot_arr);
// echo "</pre>";

// 截取数组
$rand_top3_arr = array_slice($shoot_arr, 0, 3);

echo "<pre>";
print_r($rand_top3_arr);
echo "</pre>";
?>