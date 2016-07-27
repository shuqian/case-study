<?php
	/**
		file:login.php 提拱用户登录表单和处理用户登录
	*/
	session_start();      
	/* 包含连接数据库的文件connect.inc.php */
	require "connect.inc.php";       
	/* 如果用户单击提交表单的事件则进行验证 */
	if(isset($_POST['sub'])) {              	
        /*使用从表单中接收到的用户名和密码，作为在数据库用户表user中查询的条件 */
		$stmt = $pdo->prepare("SELECT id,username FROM user WHERE username=? and userpwd=?");
		$stmt -> execute(array($_POST["username"], md5($_POST["password"])));
		/*如果能从user表中获取到数据记录则登录成功*/
		if($stmt->rowCount() > 0){           	
			$_SESSION = $stmt -> fetch(PDO::FETCH_ASSOC);		//将用户信息全部注册到Session中
			$_SESSION["isLogin"]=1;         					//注册一个用来判断登录成功的变量
			header("Location:index.php");      					//将脚本执行转向邮件系统的首页
		}else{                              	
			echo '<font color="red">用户名或密码错误！</font>'; //如果用户名或密码无效则登录失败    
		}	
	}
?>
<html>
	<head><title>邮件系统登录</title></head>
	<body>
		<p>欢迎光临邮件系统,Session ID:<?php echo session_id(); ?></p>    
		<form action="login.php" method="post">
			用户名：<input type="text" name="username"><br>
			密&nbsp;&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"><br>
			<input type="submit" name="sub" value="登录">
		</form>
	</body>
</html>


