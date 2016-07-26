<?php
	/** 用于 */
	session_start();                                          			//开启SESSION
	if(isset($_POST['submit'])){                               			//判断用户提交后执行
        /* 判断用户在表单中输入的字符串和验证码图片中的字符串是否相同  */
		if(strtoupper(trim($_POST["code"])) == $_SESSION['code']){  	//如果验证码输出成功
			echo '验证码输入成功<br>';                               	//输出成功的提示信息
		}else{                                            				//如果验证码输入失败
			echo '<font color="red">验证码输入错误！！</font><br>'; 	//输出失败的输入信息
		}
	}
?>
<html>
	<head>
		<title>Image</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<script>
            /* 定义一个JavaScript函数，当单击验证码时被调用，将重新请求并获取一个新的图片 */
			function newgdcode(obj,url) {
				/* 后面传递一个随机参数，否则在IE7和火狐下，不刷新图片 */
				obj.src = url+ '?nowtime=' + new Date().getTime();
			}
		</script>
	</head>
	<body>
        <!-- 在HTML中将PHP中动态生成的图片通过IMG标记输出，并添加了单击事件 -->
		<img src="imgcode.php" alt="看不清楚，换一张" style="cursor: pointer;" onclick="javascript: newgdcode(this, this.src);" />
		<form method="POST" action="image.php">
			<input type="text"  size="4" name="code" />
			<input type="submit" name="submit" value="提交">
		</form>
	</body>
</html>



