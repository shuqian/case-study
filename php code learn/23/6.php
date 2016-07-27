<?php
    /** 该函数用于执行有结果集的SQL语句，并将结果缓存到memcached服务器中
		@param	string	$sql 		有结果集的查询语句SQL
		@param	object	$memcache	Memcache类的对象
		@return	$data				返回结果集的数据    */
	function select($sql, Memcache $memcache){
		/* md5 SQL命令 作为 memcache的唯一标识符*/ 
		$key = md5($sql);
		/* 先从memcached服务器中获取数据 */
		$data = $memcache->get($key);
		/* 如果$data为false那么就是没有数据, 那么就需要从数据库中获取 */
		if(!$data) {
			try{     //很有必要将连接数据库的过程单独处理
				$pdo = new PDO("mysql:host=localhost;dbname=dbtest", "mysql_user", "mysql_pass");
			}catch(PDOException $e){
				die("连接失败：".$e->getMessage());
			}
			$stmt = $pdo->prepare($sql);
			$stmt->execute();
			/* 从数据库中获取数据,返回二维数组$data */
			$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
			/* 这里向memcached服务器写入从数据库中获取的数据*/
			$memcache -> add($key, $data,  MEMCACHE_COMPRESSED, 0);
		}
		return $data;
	}
	
	$memcache = new Memcache; 
	/* 可以使用addServer()方法添加多台memcached服务器 */
	$memcache -> connect('localhost', 11211);  
	/* 第一次运行还没有缓存数据, 会读取一次数据库, 当再次访问程序时, 就直接从memcache获取*/
	$data = select("SELECT * FROM user", $memcache);
	var_dump($data);   //输出数据


	
	