<?php
	/* 如果用户没有通过身份验证,页面跳转至登录页面 */
	if(!(isset($_COOKIE['isLogin']) && $_COOKIE['isLogin'] == '1')) {
		header("Location:login.php");                        
		exit;        
	}
?>

<html>
	<head><title>网站主页面</title></head>               	
	<body>	
		<?php
			/* 从Cookie中获取用户名username */
			echo '您好：'.$_COOKIE["username"];   	
		?>
		<a href="login.php?action=logout">退出</a>
		<p>这里显示网页的主体内容</p>              		
</html>
