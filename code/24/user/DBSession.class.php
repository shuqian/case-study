<?php
	/**
		file:DBSession.class.php Session的数据库驱动，将会话信息自定义到数据库中 
	*/
	class DBSession {
		protected static $pdo = null;              //声明处理器名称，使用PDO类对象处理
		protected static $ua = null;               //客户端代理浏览器，用于区分用户使用的浏览器类型
		protected static $ip = null;               //客户端IP，用于判断用户是否改变IP
		protected static $lifetime = null;         //Session的生存周期
		protected static $time = null;             //当前时间点
	
		/**
			Session数据库存储的启动方法
			@param	PDO	$pdo	创建好的PDO数据库连接对象，在本类中直接应用
		*/
		public static function start(PDO $pdo) {
			/* 初使化成员属性，在类外创建一个PDO类对象传入 */
			self::$pdo = $pdo;
			/* 获取客户端使用的代理浏览器 */
			self::$ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
			/* 获取客户端使用的IP地址 */
			self::$ip = !empty($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] :
						(!empty($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] :
						(!empty($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : 'unknown'));

			/* 判断是否为合法ip 地址格式 */
			filter_var(self::$ip, FILTER_VALIDATE_IP) === false && self::$ip = 'unknown';
			/* 从php.ini中获取session.gc_maxlifetime选项的值，确定Session的过期时间 */
			self::$lifetime = ini_get('session.gc_maxlifetime');
			/* 获取当前系统时间 */
			self::$time = time();

			/* 在php.ini中设置session.save_handler的值为“user”时被系统调用，开始调用每个生命周期过程 */
			/*  因为是回调类中的静态方法作为参数，所以每个参数需要使用数组指定静态方法所在的类 */
			session_set_save_handler(
					array(__CLASS__, 'open'),
					array(__CLASS__, 'close'),
					array(__CLASS__, 'read'),
					array(__CLASS__, 'write'),
					array(__CLASS__, 'destroy'),
					array(__CLASS__, 'gc')
			);
			/* 开启会话，启用数据库存储Session */
			session_start();
		}
		
		private static function open($path, $name) {
			return true;
		}

		public static function close()	{
			return true;
		}

		private static function read($sid) {
			/* 通过参数Session Id先从数据库中查找当前用户的会话信息 */
			$sql = "SELECT * FROM session WHERE sid = ?";
			$sth = self::$pdo->prepare($sql);
			$sth->execute(array($sid));
			
			/* 如果没有获取到结果，返回空字符串给$_SESSION变量 */
			if (!$result = $sth->fetch(PDO::FETCH_ASSOC)) {
				return '';
			}
			/* 如果用户更切换了浏览器，或更改了IP，则清除当前的Session，重新设置 */
			if (self::$ip != $result['client_ip'] || self::$ua != $result['user_agent']) {
				self::destroy($sid);
				return '';
			}
			/* 如果用户长时间没操作，Session已经过期，同样清除当前的Session, 重新设置 */
			if (($result['update_time'] + self::$lifetime) < self::$time) {
				self::destroy($sid);
				return '';
			}
			/* 返回从数据库获取的当前session数据（序列化的字符串）并写入$_SESSION变量 */
			return $result['data'];
		}

		public static function write($sid, $data) {
			/* 每次在写入之前先从数据库获取一下是否已经存在这个用户的会话信息 */
			$sql = "SELECT * FROM session WHERE sid = ?";
			$sth = self::$pdo->prepare($sql);
			$sth->execute(array($sid));

			/* 如果用户的会话信息已经存在，则去修改 */
			if ($result = $sth->fetch(PDO::FETCH_ASSOC)) {
				/* 如果Session数据没有改变，或s在30s外改变则更新 */
				if ($result['data'] != $data || self::$time > ($result['update_time'] + 30)) {
					$sql = "UPDATE session SET update_time = ?, data = ? WHERE sid = ?";
					$sth = self::$pdo->prepare($sql);
					$sth->execute(array(self::$time, $data, $sid));
				}
			/* 如果用户的会话信息不存在，则新添加一行记录 */
			} else {
				/* 如果用户没有设置Session,即空session则不插入记录 */
				if (!empty($data)) {
					/* 插入数据库一条新的Session数据 */
					$sql = "INSERT INTO session (sid, update_time, client_ip, user_agent, data) VALUES (?, ?, ?, ?, ?)";
					$sth = self::$pdo->prepare($sql);
					$sth->execute(array($sid, self::$time, self::$ip, self::$ua, $data));
				}
			}

			return true;
		}

		public static function destroy($sid) {
			/* 通过Session Id 删除当前用户的记录 */
			$sql = "DELETE FROM session WHERE sid = ?";
			$sth = self::$pdo->prepare($sql);
			$sth->execute(array($sid));

			return true;
		}

		private static function gc($lifetime) {
			/* 通过Session生存时间删除所有过期的记录 */
			$sql = "DELETE FROM session WHERE update_time < ?";
			$sth = self::$pdo->prepare($sql);
			$sth->execute(array(self::$time - $lifetime));

			return true;
		}
	}


