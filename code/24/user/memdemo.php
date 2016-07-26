<?php
	/**
		file: memdemo.php 用于演示通过自定义memcached方式存储Session信息的过程
	*/
	/* 加载自定义Session的memcached存储方式类MEMSession所在的文件 */
	require "memsession.class.php";
	/* 创建Memcache类的对象 */
	$mem = new Memcache;
	/* 添加memcached的服务器，可以添加多个做分布式 */
	$mem -> addServer("localhost", 11211);
	//$mem -> addServer("www.brophp.com", 11211);
	//$mem -> addServer("www.lampbrother.net", 11211);	
	
	/* 使用MEMSession中静态方法start(),并传递memcache类对象，使用自定义memcached的Session处理的方式 */
	MEMSession::start($mem);
	
	/* 向$_SESSION变量中存和取一个数据，演示自定义memcached方式是否可用 */
	$_SESSION["username"]="admin";
	echo $_SESSION["username"];
	
	