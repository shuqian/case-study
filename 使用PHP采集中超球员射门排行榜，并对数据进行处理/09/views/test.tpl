<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<style>
		h1{ background-color: #ccc; text-align: center; }
		table{ text-align: center; }
	</style>
</head>
<body>
<h1>1</h1>
<table border="1" width="600">
	<caption><h3>50个球员的所有数据</h3></caption>
	<tr>
		<th>ranking</th>
		<th>player</th>
		<th>team</th>
		<th>shots</th>
		<th>lleg</th>
		<th>rleg</th>
		<th>head</th>
		<th>other</th>
	</tr>
	{foreach $shoot_arr as $val}    
		<tr>
			<td>{$val[0]}</td>
			<td>{$val[1]}</td>
			<td>{$val[2]}</td>
			<td>{$val[3]}</td>
			<td>{$val[4]}</td>
			<td>{$val[5]}</td>
			<td>{$val[6]}</td>
			<td>{$val[7]}</td>
		</tr>
	{/foreach}
</table>

<h1>2</h1>
<table border="1" width="600">
	<caption><h3>打乱顺序后前3个球员的数据</h3></caption>
	<tr>
		<th>ranking</th>
		<th>player</th>
		<th>team</th>
		<th>shots</th>
		<th>lleg</th>
		<th>rleg</th>
		<th>head</th>
		<th>other</th>
	</tr>
	{foreach $rand_top3_arr as $val}    
		<tr>
			<td>{$val[0]}</td>
			<td>{$val[1]}</td>
			<td>{$val[2]}</td>
			<td>{$val[3]}</td>
			<td>{$val[4]}</td>
			<td>{$val[5]}</td>
			<td>{$val[6]}</td>
			<td>{$val[7]}</td>
		</tr>
	{/foreach}
</table>

<h1>3</h1>
<table width="600" border="1">
	<caption><h3>取出左脚射门次数在10至50之间的球员数据</h3></caption>
	<tr>
		<th>ranking</th>
		<th>player</th>
		<th>team</th>
		<th>shots</th>
		<th>lleg</th>
		<th>rleg</th>
		<th>head</th>
		<th>other</th>
	</tr>
	{foreach $left_10to50_arr as $val}    
		<tr>
			<td>{$val[0]}</td>
			<td>{$val[1]}</td>
			<td>{$val[2]}</td>
			<td>{$val[3]}</td>
			<td>{$val[4]}</td>
			<td>{$val[5]}</td>
			<td>{$val[6]}</td>
			<td>{$val[7]}</td>
		</tr>
	{/foreach}
</table>

<h1>4</h1>
<table border="1" width="300">
	<caption><h3>上榜球员最多的前5个球队和对应的球员数</h3></caption>
	<tr>
		<th>球队</th>
		<th>球员数</th>
	</tr>
	{foreach $top_team5 as $key=>$val}
		<tr>
			<td>{$key}</td>
			<td>{$val}</td>
		</tr>
	{/foreach}
</table>

<h1>5</h1>
<table width="600" border="1">
	<caption><h3>左脚射门次数从高到低排列</h3></caption>
	<tr>
		<th>ranking</th>
		<th>player</th>
		<th>team</th>
		<th>shots</th>
		<th>lleg</th>
		<th>rleg</th>
		<th>head</th>
		<th>other</th>
	</tr>
	{foreach $sort_arr as $val}    
		<tr>
			<td>{$val[0]}</td>
			<td>{$val[1]}</td>
			<td>{$val[2]}</td>
			<td>{$val[3]}</td>
			<td>{$val[4]}</td>
			<td>{$val[5]}</td>
			<td>{$val[6]}</td>
			<td>{$val[7]}</td>
		</tr>
	{/foreach}
</table>
</body>
</html>