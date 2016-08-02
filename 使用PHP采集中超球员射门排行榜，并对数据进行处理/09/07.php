<?php 
/*
步骤7：在PHP程序中使用SQL语句查询出上榜球员最多的前5个球队和对应的球员数，保存到数组$top_team5中。
 */

// SQL查询

/*
1、连接数据库
2、设置字符集
3、SQL语句
4、执行SQL语句
5、结果查询
 */

$conn = mysqli_connect('localhost', 'root', '', 'test_db') or die("数据库连接失败：".mysqli_error());
mysqli_set_charset($conn, 'utf8');
$sql = "SELECT * FROM shoot_tbl";
$result = mysqli_query($conn, $sql);



$list = array();
if ($result) {
	while ($row = mysqli_fetch_assoc($result)) {
		$list[] = $row;
	}
}

// var_dump($list);

// 查找出球队
$team = array();
foreach ($list as $key => $value) {
	$team[] = $value['team'];
}

$team = array_unique($team);

// var_dump($team);

$top_team = array();
foreach ($team as $key => $value) {
	// 查找球员数
	$top_team[$value] = findtop5($value);
}
// 对键值排序
arsort($top_team);
$top_team5 = array_slice($top_team, 0, 5);
// var_dump($top_team5);

function findtop5($team){
	$conn = mysqli_connect('localhost', 'root', '', 'test_db') or die("数据库连接失败：".mysqli_error());
	mysqli_set_charset($conn, 'utf8');
	$sql = "SELECT * FROM shoot_tbl WHERE `team` = '{$team}'";
	$res = mysqli_query($conn, $sql);
	return mysqli_num_rows($res);
}
?>
