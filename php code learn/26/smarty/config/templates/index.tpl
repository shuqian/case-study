{config_load file="foo.conf"}                       	{* 加载配置文件 *}
<html>           
	<head><title>{#pageTitle#}</title></head>        	{* 引用配置文件中声明的标题变量 *}
	<body bgcolor="{#bodyBgColor#}">               	
		<table border="{#tableBorderSize#}" bgcolor="{#tableBgColor#}">
			<tr bgcolor="{#rowBgColor#}">         	
				<td>First</td>
				<td>Last</td>
				<td>Address</td>
			</tr>
		</table>
	</body>
</html>

