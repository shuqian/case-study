<?php 
$file = "./shoot.html";
$data = file_get_contents($file);



/*
步骤2：使用PHP自带函数读取shoot.html的内容，并使用正则表达式匹配出这50个球员的所有数据（排名、姓名、球队、射门数、左脚、右脚、头球、其它部位），保存到一个二维数组$shoot_arr。
 */

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
$keys = array('排名', '姓名', '球队', '射门数', '左脚', '右脚', '头球', '其它部位');
for ($i=0; $i < 50; $i++) { 
		$shoot_arr[$i] = array($match[3][$i], $match[4][$i], $match[5][$i], $match[6][$i], $match[7][$i], $match[8][$i], $match[9][$i], $match[10][$i]);
}

/*
步骤3：随机打乱所有球员数据（$shoot_arr）排列顺序，取出打乱顺序后前3个球员的数据保存到数组$rand_top3_arr（数组结构与$shoot_arr相同，键值从0开始）。
 */

shuffle($shoot_arr);

$rand_top3_arr = array_slice($shoot_arr, 0, 3);

$rand_top3_arr_str = "<table border='1' width='800'>";
$rand_top3_arr_str .= "<tr><th>排名</th><th>姓名</th><th>球队</th><th>射门数</th><th>左脚</th><th>右脚</th><th>头部</th><th>其他部位</th></tr>";
foreach ($rand_top3_arr as $value) {
	$rand_top3_arr_str .= "<tr>";
	$rand_top3_arr_str .= "<td align='center'>{$value[0]}</td><td align='center'>{$value[1]}</td><td align='center'>{$value[2]}</td><td align='center'>{$value[3]}</td><td align='center'>{$value[4]}</td><td align='center'>{$value[5]}</td><td align='center'>{$value[6]}</td><td align='center'>{$value[7]}</td>";
	$rand_top3_arr_str .= "</tr>";
}
$rand_top3_arr_str .= "</table>";
// echo $rand_top3_arr_str;

/*
步骤4：遍历所有球员数据（$shoot_arr），取出左脚射门次数在10至50之间的球员数据，并按照左脚射门次数从高到低排列，保存到数组$left_10to50_arr（数组结构与$shoot_arr相同，键值从0开始）。
*/
$left_10to50_arr = array();

for ($i=0; $i < count($shoot_arr); $i++) { 
	if ($shoot_arr[$i][4]>=10 && $shoot_arr[$i][4]<=50) {
		$left_10to50_arr[] = $shoot_arr[$i];
	}
}

// var_dump($left_10to50_arr_result);


foreach($left_10to50_arr as $key=>$value){
	// $left_sort[$key][] = $value[$key][4];
	// echo $value[4]."<br>";
	$left_sort[$key] = $value[4];
}

// var_dump($left_sort);

array_multisort($left_sort, SORT_DESC, $left_10to50_arr);

// var_dump($left_10to50_arr_result);

$left_10to50_arr_str = "<hr/>";
$left_10to50_arr_str .= "<p>二维数组排序函数：array_multisort — 对多个数组或多维数组进行排序</p>";
$left_10to50_arr_str .= "<table border='1' width='800'>";
$left_10to50_arr_str .= "<tr><th>排名</th><th>姓名</th><th>球队</th><th>射门数</th><th bgcolor='#ccc'>左脚</th><th>右脚</th><th>头部</th><th>其他部位</th></tr>";
foreach ($left_10to50_arr as $value) {
	$left_10to50_arr_str .= "<tr>";
	$left_10to50_arr_str .= "<td align='center'>{$value[0]}</td><td align='center'>{$value[1]}</td><td align='center'>{$value[2]}</td><td align='center'>{$value[3]}</td><td align='center' bgcolor='#eee'>{$value[4]}</td><td align='center'>{$value[5]}</td><td align='center'>{$value[6]}</td><td align='center'>{$value[7]}</td>";
	$left_10to50_arr_str .= "</tr>";
}
$left_10to50_arr_str .= "</table>";

// echo $left_10to50_arr_str;

/*
步骤5：使用电脑桌面上的SQLyog数据库管理软件连接Mysql数据库，在test_db中创建数据表shoot_tbl，用于保存后续步骤保存$shoot_arr。
 */


/*
步骤6：在PHP程序中将$shoot_arr的数据保存到上一步骤建立的shoot_tbl，要求一个球员为一条记录，一个属性为一个字段。
 */

/*插入数据库*/
$link = mysqli_connect("127.0.0.1", "root", "", "test") or die("数据库连接失败".mysqli_error());
mysqli_set_charset($link, 'utf8');

foreach ($left_10to50_arr as $value){
$sql = "INSERT INTO `shoot`(`ranking`, `player`, `team`, `shots`, `lleg`, `rleg`, `head`, `other`) VALUES($value[0], '{$value[1]}', '{$value[2]}', $value[3], $value[4], $value[5], $value[6], $value[7])";
// echo $sql;
$res = mysqli_query($link, $sql);
}
mysqli_close($link);


/*
步骤7：在PHP程序中使用SQL语句查询出上榜球员最多的前5个球队和对应的球员数，保存到数组$top_team5中。
 */


/*
步骤8：写一个Class，该Class的构造函数传入参数$shoot_arr，返回一个重新排序的数组（数组结构与$shoot_arr相同，键值从0开始）。实例化并执行该Class，将结果保存到$sort_arr。排序规则如下：
1.	所有球员按左脚射门次数从高到低排列
2.	左脚射门次数相同的，再以右脚射门次数从高到低排序
3.	左右脚射门次数均相同的，再以头球次数从高到低排序
 */

// 多维数组的排序，array_multisort()



?>