<?php
/* Smarty version 3.1.30-dev/72, created on 2016-08-02 18:10:37
  from "C:\wamp\www\test.com\zhongchao\09\views\test.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/72',
  'unifunc' => 'content_57a0e21d9e70d4_92446490',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1943c023f86d4d6d68cbb3d08fe5fd9982a3df93' => 
    array (
      0 => 'C:\\wamp\\www\\test.com\\zhongchao\\09\\views\\test.tpl',
      1 => 1470161435,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_57a0e21d9e70d4_92446490 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->compiled->nocache_hash = '2064757a0e21d799310_78848839';
?>
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
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['shoot_arr']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>    
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[0];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[1];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[2];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[3];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[4];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[5];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[6];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[7];?>
</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rand_top3_arr']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>    
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[0];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[1];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[2];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[3];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[4];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[5];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[6];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[7];?>
</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['left_10to50_arr']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>    
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[0];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[1];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[2];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[3];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[4];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[5];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[6];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[7];?>
</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>

<h1>4</h1>
<table border="1" width="300">
	<caption><h3>上榜球员最多的前5个球队和对应的球员数</h3></caption>
	<tr>
		<th>球队</th>
		<th>球员数</th>
	</tr>
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['top_team5']->value, 'val', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['val']->value) {
?>
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value;?>
</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

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
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['sort_arr']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>    
		<tr>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[0];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[1];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[2];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[3];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[4];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[5];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[6];?>
</td>
			<td><?php echo $_smarty_tpl->tpl_vars['val']->value[7];?>
</td>
		</tr>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

</table>
</body>
</html><?php }
}
