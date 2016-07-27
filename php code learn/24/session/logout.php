<?php
	/**
		file: logout.php 注销用户的会话信息,用户退出
	*/
	session_start();           
	/* 从Session中获取登录用户名 */
	$username = $_SESSION["username"];         
	/* 删除所有Session的变量 */
	$_SESSION = array();                           		
	/* 判断是否是使用基于Cookie的Session, 删除包含Session Id的Cookie */	
	if (isset($_COOKIE[session_name()])) {            
   		setcookie(session_name(), '', time()-42000, '/');   	
	}
	/* 最后彻底销毁Session */
	session_destroy();                              	
?>
<html>
	<head><title>退出系统</title></head>
	<body>	
		<p><?php echo $username ?>再见！</p>
		<p><a href="login.php">重新登录邮件系统</a></p>
	</body>
</html>


