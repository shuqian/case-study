<?php
	/* 实例化Memcache类的对象 */
	$memcache = new Memcache; 
	/* 连接本机的memcached服务器 */
	$memcache -> connect('localhost', 11211);

	/* 返回缓存的指定 brophp 的变量内容 */
	$var1 = $memcache->get('brophp');
	/*
		如果键brophp，lamp不存在 $var2 = array();
		如果brophp，lamp存在$var = array(‘brophp‘=>‘BroPHP超经量组框架‘, ‘lamp‘=>‘LAMP兄弟连‘);
	*/
	$var2 = $memcache->get(array('brophp', 'lamp'));
	
	var_dump($var1);
	var_dump($var2);
	
	/* 关闭与memcached服务器的连接 */
	$memcache -> close();
	
