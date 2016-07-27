<?php
	/**
		file: file.inc.php 用于自义Session的处理方式，还是将Session信息使用文件保存
	*/
	/*声明一个变量，设置Session文件在服务器中保存的路径，在l回调open()函数时自动设置 */
	$sess_save_path = ""; 
	
	/**				   	
		该函数在运行session_start()函数时执行
		@param	string	$save_path		系统会自动将php.ini中的session.save_path选项值传到这个参数中
		@param	string	$session_name	系统会自动将Session名称传到这个参数中，本例没有用到
		@retun	true					返回true表示函数执行成功
	*/
	function open($save_path, $session_name) {
		global $sess_save_path;
		$sess_save_path = $save_path;
		
		return true;
	}
	
	/**				   	
		该函数在在所有session操作完成后被执行，本例不对其操作，直接返回true即可
		@retun	true	返回true表示函数执行成功
	*/
	function close() {
		return true;
	}
	
	/**				   	
		在运行session_start()时执行，在开启会话时去read当前session数据并写入$_SESSION变量
		@param	string	$id		系统自动传递为当前用户分配的Session ID
		@retun	string			返回保存Session所有序列化的字符串信息
	*/
	function read($id) {
		global $sess_save_path;
		$sess_file = "{$sess_save_path}/sess_{$id}";
		return (string) @file_get_contents($sess_file);
	}
	
	/**				   	
		该函数在脚本结束和对$_SESSION变量赋值数据时执行
		@param	string	$id			系统自动传递为当前用户分配的Session ID
		@param	string	$sess_data	串行化后的所有Session信息字符串
		@retun	true				返回true表示函数执行成功
	*/
	function write($id, $sess_data) {
		global $sess_save_path;
		$sess_file = "{$sess_save_path}/sess_{$id}";
		
		if ($fp = @fopen($sess_file, "w")) {
			$return = fwrite($fp, $sess_data);
			fclose($fp);
			return $return;
		} else {
			return false;
		}
	}
	
	/**				   	
		在运行session_destroy()时执行，用于自定义销毁用户会话信息
		@param	string	$id			系统自动传递为当前用户分配的Session ID
		@retun	true				返回true表示函数执行成功
	*/
	function destroy($id) {
		global $sess_save_path;
		$sess_file = "{$sess_save_path}/sess_{$id}";
		return(@unlink($sess_file));
	}
	
	/**				   	
		垃圾回收程序启动时执行，用于删除所有过期的用户会话信息
		@param	string	$maxlifetime	系统自动将php.ini中的session.gc_maxlifetime选项值传给该参数		
		@retun	true					返回true表示函数执行成功
	*/
	function gc($maxlifetime) {
		global $sess_save_path;
		
		foreach (glob("{$sess_save_path}/sess_*") as $filename) {
			if (filemtime($filename) + $maxlifetime < time()) {
				@unlink($filename);
			}
		}
		return true;
	}
	/* 在php.ini中设置session.save_handler的值为“user”时被系统调用，开始调用每个生命周期过程 */
	session_set_save_handler("open", "close", "read", "write", "destroy", "gc");
	/* 开始会话 */
	session_start();

	//在以下的PHP代码中应用Session方式不变

