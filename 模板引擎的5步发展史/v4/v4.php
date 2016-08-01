<?php
	/* 第4版：封装1个模板类，使用对象的方式分配数据，显示模板 */
	$link = mysqli_connect('127.0.0.1', 'root', '', 'ishop') or die("数据库连接失败：".mysqli_error());
	mysqli_set_charset($link, 'utf8');

	$sql = "SELECT * FROM `shop_user`";
	$res = mysqli_query($link, $sql);

	if($res){
		while($row = mysqli_fetch_assoc($res)){
			$userlist[] = $row;
		}
	}
	
	mysqli_close($link);

	// 引入模板引擎类
	include './MySmarty.class.php';

	// 创建1个模板对象
	$tpl = new MySmarty();

	$tpl->assign('userlist', $userlist);
	$tpl->display('./test.tpl');
?>