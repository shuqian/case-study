<html>
	<head>
		<title>开启PHP模式的四对不同的开始和结束标记</title>
	</head>
    <body>
	<?php echo "1. 这个标记是标准的PHP语言标记"; ?>
	<script language="php">
       	      echo "2. 这个标记是脚本风格，是最长的标记。";
   	</script>
	<? echo "3. 这个标记风格是最简单的简短风格" ?>
     <?=$expression ?> 这也是一种简写方式，等价于 <? echo $expression ?>
	<% echo "4. 这个标记风格类似于ASP标签的写法" %>
	<%=$expression %> 这也是一种简写方式，等价于 <% echo $expression %>
	</body>
</html>

