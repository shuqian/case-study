<?php
	/* 实例化Memcache类的对象 */
	$memcache = new Memcache; 
	/*
	$mem->addServer('192.168.0.11', 11211);   //添加第一个memcached服务器
	$mem->addServer('192.168.0.12', 11211);   //添加第二个memcached服务器
	$mem->addServer('192.168.0.13', 11211);   //添加第三个memcached服务器
	*/
	/* 通过配置文件可以动态设置多台memcached服务器的参数 */
	$mem_conf = array(
		array('host'=>'192.168.0.11', 'port'=>'11211'),
		array('host'=>'192.168.0.12', 'port'=>'11211'),
		array('host'=>'192.168.0.13', 'port'=>'11211')
	);

	/* 通过循环按$mem_conf数组中的内容设置多台memcached服务器 */
	foreach ( $mem_conf as $v ) {
		$memcache->addServer ( $v ['host'], $v ['port'] ); 
	}  

	/* 
		使用循环向3台memcached服务器中添加100条数据
		会使用“crc32(key) % current_server_num”哈希算法将 key 平均哈希到3台服务器中
	*/
	for($i=0; $i < 100; $i++) {
		$mem->set('key'.$i, md5($i).'This is a memcached test!', 0, 60); 
	}

	
	