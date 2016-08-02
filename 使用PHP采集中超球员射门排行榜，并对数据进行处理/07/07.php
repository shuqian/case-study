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

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>球员列表</title>
</head>
<body>
<table border="1" width="200" align="center">
	<caption><h3>前5的球队</h3></caption>
	<tr>
		<th>球队</th>
		<th>球员数</th>
	</tr>
	<?php foreach ($top_team5 as $key=>$val): ?>
	<tr>
		<td><?php echo $key ?></td>
		<td><?php echo $val ?></td>
	</tr>
	<?php endforeach; ?>
</table>
<hr>
<table border="1" cellspacing="0" cellpadding="3" width="600" align="center">
	<caption><h3>球员列表</h3></caption>
	<tr>
		<th>ranking</th>
		<th>player</th>
		<th>team</th>
		<th>shots</th>
		<th>lleg</th>
		<th>rleg</th>
		<th>head</th>
		<th>other</th>
	</tr>
	<?php foreach ($list as $key => $val): ?>
		<tr>
			<td><?php echo $val['ranking'] ?></td>
			<td><?php echo $val['player'] ?></td>
			<td><?php echo $val['team'] ?></td>
			<td><?php echo $val['shots'] ?></td>
			<td><?php echo $val['lleg'] ?></td>
			<td><?php echo $val['rleg'] ?></td>
			<td><?php echo $val['head'] ?></td>
			<td><?php echo $val['other'] ?></td>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>