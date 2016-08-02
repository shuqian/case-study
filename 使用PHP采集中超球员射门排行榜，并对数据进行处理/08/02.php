<?php 
/*
题目概述：
请使用PHP采集新浪2014年中超赛季球员射门排行榜，保存到本地数据库，并按要求查询出来显示在页面上。

2014年中超赛季球员射门排行榜网址：
http://match.sports.sina.com.cn/football/csl/opta_rank.php?item=shoot&year=2014&lid=8&type=1&dpc=1
 */

// 步骤2：使用PHP自带函数读取shoot.html的内容，并使用正则表达式匹配出这50个球员的所有数据（排名、姓名、球队、射门数、左脚、右脚、头球、其它部位），保存到一个二维数组$shoot_arr。

include './01.php';

$data = file_get_contents($filename);

// 正则表达式匹配球员数据

/*
排名、姓名、球队、射门数、左脚、右脚、头球、其它部位
*/
$pattern = '/(<tr  (class="g" )?>)\s+\<td\>(\d+)\<\/td\>.*?blank\"\>(.*?)\<\/a\>.*?blank\"\>(.*?)\<\/a\>.*?td\>(\d+)\<.*?td\>(\d+)\<.*?td\>(\d+)\<.*?td\>(\d+)\<.*?td\>(\d+)\<.*?(<\/tr>)/s';

$res = preg_match_all($pattern, $data, $match);

/*
排名、姓名、球队、射门数、左脚、右脚、头球、其它部位
3,4,5,6,7,8,9,10
*/
$shoot_arr = array();
// $keys = array('排名', '姓名', '球队', '射门数', '左脚', '右脚', '头球', '其它部位');
for ($i=0; $i < 50; $i++) { 
		$shoot_arr[$i] = array($match[3][$i], $match[4][$i], $match[5][$i], $match[6][$i], $match[7][$i], $match[8][$i], $match[9][$i], $match[10][$i]);
}

// var_dump($shoot_arr);
?>