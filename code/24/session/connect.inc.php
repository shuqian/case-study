<?php
	/**
		file: conn.inc.php 作为数据库连接的公共文件
	*/
	define("DSN", "mysql:host=localhost;dbname=testmail");          //定义连接MySQL的DSN
	define("DBUSER", "mysql_user");                                 //MySQL的登录用户
	define("DBPASS", "mysql_pwd");                                  //MySQL的登录密码
	
	try {
		$pdo = new PDO(DSN, DBUSER, DBPASS);                        //创建连接数据库的PDO对象
	}catch(PDOException $e) {
		die("连接失败：".$e->getMessage());                         //失败退出并打印错误报告
	}
	
	
	
	