<?php
	/* 第3版：PHP和HTML页面分离技术, 使用include引入模板文件 */
	$link = mysqli_connect('127.0.0.1', 'root', '', 'ishop') or die("数据库连接失败：".mysqli_error());
	mysqli_set_charset($link, 'utf8');

	$sql = "SELECT * FROM `shop_user`";
	$res = mysqli_query($link, $sql);

	if($res){
		while($row = mysqli_fetch_assoc($res)){
			$userlist[] = $row;
		}
	}
	
	// 使用include引入模板文件
	include './test.tpl';

	mysqli_close($link);
?>