<?php
	/* 实例化Memcache类的对象 */
	$memcache = new Memcache; 
	/* 连接本机的memcached服务器 */
	$memcache -> connect('localhost', 11211);
	
	/* 向本机的memcached服务器中添加一组数据 */
	$is_add1 = $memcache->add('brophp', 'BroPHP框架');
	/* 向本机添加每一数组作为数据,数组或对象将会被序列化 */
	$is_add2 = $memcache->add('lamp', array('Linux', 'Apache', 'MySQL', 'PHP'));
	/* 如果添加的key已经存在，则添加将会失败 , MEMCACHE_COMPRESSED 使用zlib压缩， 0表示不过期*/
	$is_add3 = $memcache->add('lamp', 'LAMP兄弟连',  MEMCACHE_COMPRESSED, 0);
	
	/*设置一个指定 key 的缓存变量内容, 如果key不存中则新添加，如果存在则为修改 */
	$is_set1 = $memcache->set('phpfw', 'BroPHP框架');
	/* 指定的key已经存在，则修改内容 ，缓存一周*/
	$is_set2 = $memcache->set('brophp', 'BroPHP超经量组框架',MEMCACHE_COMPRESSED, 7*24*60*60);
	
	/* 使用replace()替换一个指定已存在key 的的缓存变量内容 是set()方法的别名 ,设置大于30天的缓存*/
	$is_replace = $memcache->replace('lamp', 'LAMP兄弟连',  MEMCACHE_COMPRESSED, time()+31*24*60*60);
	
	/* 关闭与memcached服务器的连接 */
	$memcache -> close();
	
	
	
	
	
	