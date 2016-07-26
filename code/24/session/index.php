<?php
	/**
		file:index.php 主页面，用于显示用户信息及当前用户的邮件信息
	*/
	session_start();                    				
	/* 判断Session中的登录变量是否为真 */
	if(isset($_SESSION['isLogin']) && $_SESSION['isLogin'] === 1){                      	
		echo "<p>当前用户为：<b> ".$_SESSION["username"]."</b>,&nbsp;";  //输出登录用户名
		echo "<a href='logout.php'>退出</a></p>";						 //提供退出操作链接
	/* 如果用户没有登录则没有权限访问该页 */
	}else{                                       	
		header("Location:login.php");          							//转向登录页面重新登录
		exit;															//退出程序而不向下执行
	}
?>
<html>
	<head><title>邮件系统</title></head>
	<body>
		<?php
			/* 包含连接数据库的文件 */
			require "connect.inc.php";                  	
            /* 通过Session中传递的user id，作为mail表的查询条件，获取这个用户的邮件列表 */
			$stmt = $pdo -> prepare("SELECT id, mailtitle, maildt FROM MAIL WHERE uid=?");
			$stmt -> execute(array($_SESSION['id']));
		?>
		<p>你的信箱中有<b><?php echo $stmt -> rowCount(); ?></b>邮件</p>
		<table border="0" cellspacing="0" cellpadding="0" width="380">
			<tr><th>编号</th><th>邮件标题</th><th>接收时间</th></tr>
			<?php
				while(list($id, $mailtitle, $maildt) = $stmt -> fetch(PDO::FETCH_NUM)) {
					echo '<tr align="center">';                            
					echo '<td>'.$id.'</td>';                     		//输出邮件编号
					echo '<td>'.$mailtitle.'</td>';                		//输出邮件标题
					echo '<td>'.date("Y-m-d H:i:s",$maildt).'</td>'; 	//输出邮件接收日期
					echo '</tr>';
				}
			?>
		</table>
	</body>
</html>
