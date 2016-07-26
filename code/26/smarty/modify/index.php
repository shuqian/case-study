<?php
	/* 第一步：加载自定义的Smarty初使化文件 */
	require "init.inc.php";                	       

	$smarty->assign('articleTitle', 'Smokers are Productive, but Death Cuts Efficiency.');

	/* 显示index.tpl模板 */
	$smarty->display('index.tpl');

