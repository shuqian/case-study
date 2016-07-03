<?php
$username = isset($_POST['username'])?$_POST['username']:NULL;
$password = isset($_POST['password'])?md5($_POST['password']):NULL;

$a = isset($_GET['a'])?$_GET['a']:NULL;

// 数据库连接
$link = mysqli_connect('127.0.0.1', 'root', '', 'md5') or die("数据库连接错误".mysqli_error());
mysqli_set_charset($link, 'utf8');

if ($a=="reg") {
	if (empty($username)) {
		echo "数据不能为空";
		echo "<meta http-equiv='refresh' content='2;url=./reg.php'>";
	}
	elseif (empty($_POST['password'])) {
		echo "数据不能为空";
		echo "<meta http-equiv='refresh' content='2;url=./reg.php'>";
	}
	else
	{
		// 写入数据库
		$sql = "INSERT INTO `users`(username, password) VALUES('$username', '$password')";
		$res = mysqli_query($link, $sql);
		echo "增：结果集：";
		var_dump($res);
		// var_dump(mysqli_insert_id($link));
		mysqli_close($link);

		if($res){
			echo "注册成功，2s后，跳转到登录页面";
			echo "<meta http-equiv='refresh' content='2;url=./login.php'>";
		} else{
			echo "注册失败，重新注册";
			echo "<meta http-equiv='refresh' content='2;url=./reg.php'>";
		}
	}
} elseif ($a=="login") {
	if (empty($username)) {
		echo "数据不能为空";
		echo "<meta http-equiv='refresh' content='2;url=./login.php'>";
	}
	elseif (empty($_POST['password'])) {
		echo "数据不能为空";
		echo "<meta http-equiv='refresh' content='2;url=./login.php'>";
	}
	else{
		// 查询数据库
		$sql = "SELECT `username`, `password` FROM `users` WHERE `username`='{$username}' AND `password`='{$password}'";
		$res = mysqli_query($link, $sql);
		echo "查：结果集：";
		var_dump($res);
		$result = mysqli_num_rows($res);	//必须放在释放结果集之前
		// 释放结果集
		mysqli_free_result($res);
		mysqli_close($link);

		if ($result==1) {
			echo "登录成功, 3s后跳转到首页";
			echo "<meta http-equiv='refresh' content='3;url=./login.php'>";
		} else{
			echo "登录失败, 3s后跳转到注册页面";
			echo "<meta http-equiv='refresh' content='3;url=./reg.php'>";
		}
	}
} elseif ($a=="del") {
	$id=$_GET['id'];
	// 删除一条数据
	$sql = "DELETE FROM `users` WHERE `id` = {$id}";
	$res = mysqli_query($link, $sql);
	echo "删：结果集";
	var_dump($res);

	if ($res) {
		echo "删除成功！2s后跳转回首页";
		echo "<meta http-equiv='refresh' content='2;url=./login.php'>";
	}

} elseif ($a=="modify") {
	var_dump($_POST);

	$id = $_POST['id'];
	$password = md5($_POST['password']);

	// 修改数据库
	$sql = "UPDATE `users` SET `password` = '{$password}' WHERE `id`={$id}";
	$res = mysqli_query($link, $sql);
	echo "改：结果集";
	var_dump($res);
	echo "受影响行数：".mysqli_affected_rows($link)."<br>";
	mysqli_close($link);

	if ($res) {
		echo "更改成功，2s后跳转到首页";
		die;
		echo "<meta http-equiv='refresh' content='2;url=./login.php'>";
	}
}
?>