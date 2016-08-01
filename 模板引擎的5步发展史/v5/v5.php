<?php
	/* 第5版：完成模板文件的编译过程 */

	// 引入模板引擎类
	include './MySmarty.class.php';

	// 创建1个模板对象
	$tpl = new MySmarty();
	$title = "这是一个测试标题";

	$tpl->assign('title', $title);
	$tpl->display('./test.tpl');
?>