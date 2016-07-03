# PHP中几种常见的加密形式 #

## md5()加密算法 ##

语法：
	
	string md5 ( string $str [, bool $raw_output = false ] )

参数：

	str 
	原始字符串。 

	raw_output 
	如果可选的 raw_output 被设置为 TRUE ，那么 MD5 报文摘要将以16字节长度的原始二进制格式返回。 

代码实例：

	<?php 
		echo md5('123');
		echo "<br>";
		echo md5('123', true);
	?>

输出：

	202cb962ac59075b964b07152d234b70
	, b    Y[ K_#Kp     //二进制格式乱码，以输出为准




## crypt()加密算法 ##

## sha1()加密算法 ##

## url编码加密技术 ##

## base64编码加密技术 ##