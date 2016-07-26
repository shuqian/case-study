<html>
	<head>
		<!-- 在HTML标记对中嵌入PHP脚本，使用echo()输出标题 -->
		<title> <?php echo "PHP语言标记的使用" ?> </title>
	</head>
        <!-- 可以在HTML属性位置处嵌入PHP脚本，使用echo()输出网页背景颜色 -->
	<body <?php echo 'bgcolor="#cccccc"' ?> >

	<!--以下是在HTML中更高级的分离术 -->  
	<?php
		if ($expression) {
	?>
		<!-- 也可以在HTML标记属性的双引号中嵌入PHP标记 -->
		<p align="<?php echo 'center' ?>">This is true.</p>
   	<?php
		} else {
	?>
    		<p>This is false.</p>
   	<?php
		}
	?> 
	</body>
</html>

