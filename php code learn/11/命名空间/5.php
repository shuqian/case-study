<?php
	namespace cn\ydma;					//声明命名空间cn\ydma
	
	include './common.inc.php';			//引入当前目录下的脚本文件common.inc.php
	
	$demo = new Demo(); 				//出现致命错误：找不到cn\ydma\Demo类，默认会在本空间中查找
	$demo = new \Demo();				//正确，调用公共空间的方式是直接在元素名称前加 \ 就可以了
	
	var_dump();							//错误， 系统函数都在公共空间
	\var_dump();						//正确，使用了"/"

	
	
	
	