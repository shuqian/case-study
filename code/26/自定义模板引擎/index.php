<?php
	/* 包含模板引擎类所在文件 */
	require "mytpl.class.php";                                    	      
	
	/* 创建PDO对象并连接数据库 */
	try {
		$pdo = new PDO("mysql:host=localhost;dbname=mydb", "root", "123456"); 
	}catch(PDOException $e) {
		die("连接失败：".$e->getMessage());                         
	}

	/* 从数据表user中获取全部记录，以二维数组的格式保存到$users变量中 */
	$stmt = $pdo -> prepare("SELECT id, name, sex, age, email FROM user ORDER BY id");	
	$stmt -> execute();
	$users = $stmt -> fetchAll(PDO::FETCH_ASSOC);
	
	$tpl=new MyTpl;          						//创建模板引擎类对象
	
	$tpl->assign("title", "自定义模板引擎示例");    //分配标题变量给头部模板header.tpl
	$tpl->assign("tableName", "用户信息表");        //分配表名变量给主模板
	$tpl->assign("author", "高洛峰");               //分配作者变量给尾部模板footer.tpl
	$tpl->assign("users", $users);                  //分配存有表User的二维数组给主模板
	$tpl->assign("rowNum", $stmt->rowCount());      //分配所取的数据行数变量给主模板
	
	$tpl->display("main.html");                     //包括替换模板中的变量输出模板页面
	
	
	
	
	