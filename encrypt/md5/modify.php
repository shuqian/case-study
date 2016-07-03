<?php 
var_dump($_GET);
$id = $_GET['id'];

/*查询数据库*/
$link = mysqli_connect("127.0.0.1", "root", "", "md5") or die("数据库连接失败：".mysqli_error());
mysqli_set_charset($link, 'utf8');

$sql = "SELECT * FROM `users` WHERE `id`={$id}";
$res = mysqli_query($link, $sql);
var_dump($res);

$result = mysqli_fetch_assoc($res);
mysqli_free_result($res);
mysqli_close($link);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>修改</title>
</head>
<body>
<h1>更新</h1>
<form action="./doAction.php?a=modify" method="post">
	用户名：<?php echo $result['username'] ?><br/>
	<input type="hidden" name="id" value="<?php echo $id ?>" />
	密码：<input type="password" name="password"><br/>
	<input type="submit" value="提交按钮">
</form>
</body>
</html