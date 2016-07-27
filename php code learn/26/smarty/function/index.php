<?php
	/* 第一步：加载自定义的Smarty初使化文件 */
	require "init.inc.php";                	       
	/* 第二步：用assign()方法将变量置入模板里 */                                              	
	$smarty->assign("title", "测试用的网页标题");  
	/* 也属于第二步，分配其他变量置入模板里,可以向模板中置入任何类型的变量 */
	$smarty->assign("content", "测试用的网页内容"); 	
	/* 利用Smarty对象中的display()方法将网页输出  */                                         	
	function myfun(){
		return date("H:i:s");
	}



	$smarty->display("test.htm");                   		

