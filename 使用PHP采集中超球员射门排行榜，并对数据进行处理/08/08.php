<?php 
/*
步骤8：写一个Class，该Class的构造函数传入参数$shoot_arr，返回一个重新排序的数组（数组结构与$shoot_arr相同，键值从0开始）。实例化并执行该Class，将结果保存到$sort_arr。排序规则如下：
1.	所有球员按左脚射门次数从高到低排列
2.	左脚射门次数相同的，再以右脚射门次数从高到低排序
3.	左右脚射门次数均相同的，再以头球次数从高到低排序
 */

include './02.php';

class PlayerSort
{
	private $shoot;
	
	function __construct($arr)
	{
		$this->shoot = $arr;
	}

	function fun(){
		foreach ($this->shoot as $key => $value) {
			$a1[] = $value[4];
			$a2[] = $value[5];
			$a3[] = $value[6];
		}

		array_multisort($a1, $a2, $a3, $this->shoot);

		return $this->shoot;
	}
}


$data = new PlayerSort($shoot_arr);
$res = array_reverse($data->fun());

// var_dump($res);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<div>
	<p>步骤8：写一个Class，该Class的构造函数传入参数$shoot_arr，返回一个重新排序的数组（数组结构与$shoot_arr相同，键值从0开始）。实例化并执行该Class，将结果保存到$sort_arr。排序规则如下：<br>
1.	所有球员按左脚射门次数从高到低排列<br>
2.	左脚射门次数相同的，再以右脚射门次数从高到低排序<br>
3.	左右脚射门次数均相同的，再以头球次数从高到低排序</p>
</div>
<table width="800" border="1">
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
	<?php foreach($res as $val): ?>
		<tr>
			<td><?php echo $val[0] ?></td>
			<td><?php echo $val[1] ?></td>
			<td><?php echo $val[2] ?></td>
			<td><?php echo $val[3] ?></td>
			<td><?php echo $val[4] ?></td>
			<td><?php echo $val[5] ?></td>
			<td><?php echo $val[6] ?></td>
			<td><?php echo $val[7] ?></td>
		</tr>
	<?php endforeach; ?>
</table>
</body>
</html>