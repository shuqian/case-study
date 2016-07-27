<?php
	/**
		file: dbdemo.php 用于演示自定义使用数据库存储Session信息的过程
	*/
	/* 加载自定义Session数据库存储类DBSession所在的文件 */
	require "dbsession.class.php";
	
	/* 创建PDO类对象，连接数据库 */
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=testsession", "root", "123456");                        
	}catch(PDOException $e) {
		die("连接失败：".$e->getMessage());                     
	}
	/* 使用DBSession中的静态方法start(),并传递一个PDO对象，开启自定义数据库存储Session的方式 */
	DBSession::start($pdo);
	
	/* 向$_SESSION变量中存和取一个数据，演示自定义方式是否可用 */
	$_SESSION["username"]="admin";
	echo $_SESSION["username"];
	
	
	