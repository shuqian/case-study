<?php 
/*
题目概述：
请使用PHP采集新浪2014年中超赛季球员射门排行榜，保存到本地数据库，并按要求查询出来显示在页面上。

2014年中超赛季球员射门排行榜网址：
http://match.sports.sina.com.cn/football/csl/opta_rank.php?item=shoot&year=2014&lid=8&type=1&dpc=1
 */

// 步骤1：使用PHP自带函数获取排行榜页面的完整HTML内容，保存在工作目录，命名为shoot.html。

$url = "http://match.sports.sina.com.cn/football/csl/opta_rank.php?item=shoot&year=2014&lid=8&type=1&dpc=1";

if (!file_exists('./data')) {
	mkdir('./data');
}

$filename = "./data/"."shoot.html";

$str = file_get_contents($url);
file_put_contents($filename, $str);
?>