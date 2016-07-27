<?php
	/* 第一步：加载自定义的Smarty初使化文件 */
	require "init.inc.php";                	       
	/* 开启会话并在session保存两个变量 */
	$_SESSION["username"] = "admin";
	$_SESSION["uid"] = 1; 

	/* 显示index.tpl模板 */
	$smarty->display('index.tpl');

