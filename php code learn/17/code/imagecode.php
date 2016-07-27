<?php
	session_start();                    //开启SESSION,会使用$_SESSION["code"]在服务器中保存验证码
	
	require_once('vcode.class.php');    //包含验证码所在的类文件
	echo new Vcode();                	//创建验证码对象，并直接被输出自动调用魔术__toString()方法
