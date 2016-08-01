<?php
	/*第2版：高级分离。页面顶部放PHP代码处理业务逻辑*/
	$link = mysqli_connect('127.0.0.1', 'root', '', 'ishop') or die("数据库连接失败：".mysqli_error());
	mysqli_set_charset($link, 'utf8');

	$sql = "SELECT * FROM `shop_user`";
	$res = mysqli_query($link, $sql);

	if($res){
		while($row = mysqli_fetch_assoc($res)){
			$userlist[] = $row;
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>V1</title>
</head>
<body>
	<table border="1" width="350">
		<caption><h2>用户表</h2></caption>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>AddTime</th>
		</tr>
		<?php foreach($userlist as $v): ?>
			<tr>
				<td><?php echo $v['id'] ?></td>
				<td><?php echo $v['username'] ?></td>
				<td><?php echo $v['addtime'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
</body>
</html>
<?php mysqli_close($link); ?>