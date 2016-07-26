<?php
	/* 实例化Memcache类的对象 */
	$memcache = new Memcache; 
	/* 连接本机的memcached服务器 */
	$memcache -> connect('localhost', 11211);

	$memcache -> delete('phpfw');       //立即删除phpfw的项
	$memcache -> delete('brophp', 0);   //立即删除brophp的项
	$memcache -> delete('lamp', 30);    //在30秒内删除lamp的项
	
	/* 关闭与memcached服务器的连接 */
	$memcache -> close();

	
	