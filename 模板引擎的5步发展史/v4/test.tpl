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