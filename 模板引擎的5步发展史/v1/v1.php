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
		<?php
			/*第1版：代码混编*/
			$link = mysqli_connect('127.0.0.1', 'root', '', 'ishop') or die("数据库连接失败：".mysqli_error());
			mysqli_set_charset($link, 'utf8');

			$sql = "SELECT * FROM `shop_user`";
			$res = mysqli_query($link, $sql);

			if($res){
				while($row = mysqli_fetch_assoc($res)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['username']}</td>";
					echo "<td>".date('Y-m-d H:i:s', $row['addtime'])."</td>";
					echo "</tr>";
				}
			}

			mysqli_close($link);
		?>
	</table>
</body>
</html>