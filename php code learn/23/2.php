<?php
	/* 实例化Memcache类的对象 */
	$memcache = new Memcache; 
	
	/* 注意第6个参数值15的作用 */
	$is_add = $memcache->addServer('localhost', 11211, true, 1, 1, 15, true); 
	
	/* 向本机的memcached服务器中添加一组数据 */
	$is_set = $memcache->set('brophp', 'BroPHP超经量组框架');
	
	
	