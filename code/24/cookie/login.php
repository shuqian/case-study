<?php
    /* 声明一个删除Cookie的函数，调用时清除在客户端设置的所有Cookie */
	function clearCookies() {                    
		setCookie('username', '', time()-3600);    	//删除Cookie中的标识符为username的变量
		setCookie('isLogin', '', time()-3600);     	//删除Cookie中的标识符为isLogin的变量
	}
	
	/* 判断用户是否执行的是登录操作 */
	if($_GET["action"]=="login") {   
		/* 调用时清除在客户端先前设置的所有Cookie */
		clearCookies();                      	   
        /* 检查用户是否为admin，并且密码是否等于123456 */
		if($_POST["username"]=="admin" && $_POST["password"]=="123456")	{
            /* 向Cookie中设置标识符为username，值是表单中提交的，期限为一周 */
			setCookie('username', $_POST["username"], time()+60*60*24*7);  
            /* 向Cookie中设置标识符为isLogin，用来在其他页面检查用户是否登录 */
			setCookie('isLogin', '1', time()+60*60*24*7);
			/* 如果Cookie设置成功则转向网站首页 */
			header("Location:index.php");     	
		}else{
			die("用户名或密码错误！");
		}
	/* 判断用户是否执行的是退出操作	 */
	}else if($_GET["action"]=="logout"){   
		/* 退出时清除在客户端设置的所有Cookie */
		clearCookies();                      	
	}
?>
<html>
	<head><title>用户登录</title></head>
	<body>
		<h2>用户登录</h2>
		<form action="login.php?action=login" method="post">
			用户名 <input type="text" name="username"  /> <br>
			密&nbsp;&nbsp;&nbsp;&nbsp;码 <input type="password" name="password" /><br>
			<input type="submit" value="登录" />
		</form>
	</body>
</html>
