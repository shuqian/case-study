<html>
	<head>
		<!-- 在HTML中使用style标记嵌入CSS脚本 -->
		<style>
			body {
				margin:0px;
				background:#ccc;
			}
		</style>
	</head>

	<body>	
		<!-- 在HTML中使用script标记嵌入JavaScript脚本 -->
		<script>
			alert("客户端的时间"+(new Date()));
		</script>
		<!-- 在HTML中使用以下标记嵌入PHP脚本 -->
		<?php
			echo "服务器的时间".date("Y-m-d H:i:s")."<br>";
		?>
	</body>
</html>

