<?php 
	// 连接数据库
	$link = mysqli_connect("127.0.0.1", "root", "", "md5") or die("数据库连接失败：".mysqli_error());
	mysqli_set_charset($link, 'utf8');

	// 查询数据库
	$sql = "SELECT * FROM `users` ORDER BY `id` DESC";
	$res = mysqli_query($link, $sql);
	echo "查：结果集";
	var_dump($res);

	if (mysqli_num_rows($res)>0) {
		$result = [];
		while ($row = mysqli_fetch_assoc($res)) {
			$result[] = $row;	
		}
	} else{
		echo "没有用户";
	}

	// var_dump($result);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>用户列表</title>
</head>
<body>
<h1>用户</h1>
<table width="800" border="1" cellspacing="0" cellpadding="10">
	<tr>
		<th>ID</th>
		<th>USER</th>
		<th>PASSWORD</th>
		<th>操作</th>
	</tr>
	<?php foreach($result as $data): ?>
		<tr>
			<td><?php echo $data['id']; ?></td>
			<td><?php echo $data['username']; ?></td>
			<td><?php echo $data['password']; ?></td>
			<td align="center"><a href="./doAction.php?a=del&id=<?php echo $data['id'] ?>">删除</a>, <a href="./modify.php?id=<?php echo $data['id'] ?>">更新</a></td>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>