<?php /* Smarty version Smarty-3.1.8, created on 2012-07-04 06:17:52
         compiled from "C:/AppServ/www/book/smarty/a/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:302584ff3e0101c5b72-83174400%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6947bf8a23f07d22d74418936a876e95cd5282f' => 
    array (
      0 => 'C:/AppServ/www/book/smarty/a/templates\\index.tpl',
      1 => 1341382602,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '302584ff3e0101c5b72-83174400',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4ff3e01040e8b3_98167282',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff3e01040e8b3_98167282')) {function content_4ff3e01040e8b3_98167282($_smarty_tpl) {?><?php  $_config = new Smarty_Internal_Config("foo.conf", $_smarty_tpl->smarty, $_smarty_tpl);$_config->loadConfigVars(null, 'local'); ?>                       	
<html>           
	<head><title><?php echo $_smarty_tpl->getConfigVariable('pageTitle');?>
</title></head>        	
	<body bgcolor="<?php echo $_smarty_tpl->getConfigVariable('bodyBgColor');?>
">               	
		<table border="<?php echo $_smarty_tpl->getConfigVariable('tableBorderSize');?>
" bgcolor="<?php echo $_smarty_tpl->getConfigVariable('tableBgColor');?>
">
			<tr bgcolor="<?php echo $_smarty_tpl->getConfigVariable('rowBgColor');?>
">         	
				<td>First</td>
				<td>Last</td>
				<td>Address</td>
			</tr>
		</table>
	</body>
</html>

<?php }} ?>