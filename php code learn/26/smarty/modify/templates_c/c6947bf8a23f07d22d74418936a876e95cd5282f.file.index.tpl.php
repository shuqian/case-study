<?php /* Smarty version Smarty-3.1.8, created on 2012-07-04 06:36:52
         compiled from "C:/AppServ/www/book/smarty/a/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162594ff3e0bfc08be9-33350364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6947bf8a23f07d22d74418936a876e95cd5282f' => 
    array (
      0 => 'C:/AppServ/www/book/smarty/a/templates\\index.tpl',
      1 => 1341383788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162594ff3e0bfc08be9-33350364',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4ff3e0bfcc72c8_51218511',
  'variables' => 
  array (
    'articleTitle' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff3e0bfcc72c8_51218511')) {function content_4ff3e0bfcc72c8_51218511($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_spacify')) include 'C:\\AppServ\\www\\book\\smarty\\a\\libs\\plugins\\modifier.spacify.php';
if (!is_callable('smarty_modifier_truncate')) include 'C:\\AppServ\\www\\book\\smarty\\a\\libs\\plugins\\modifier.truncate.php';
?><?php echo $_smarty_tpl->tpl_vars['articleTitle']->value;?>
<br>                            		
<?php echo smarty_modifier_spacify(mb_strtoupper($_smarty_tpl->tpl_vars['articleTitle']->value, 'UTF-8'));?>
<br>                 	
<?php echo smarty_modifier_truncate(smarty_modifier_spacify(mb_strtolower($_smarty_tpl->tpl_vars['articleTitle']->value, 'UTF-8')));?>
<br>          	
<?php echo smarty_modifier_spacify(smarty_modifier_truncate(mb_strtolower($_smarty_tpl->tpl_vars['articleTitle']->value, 'UTF-8'),30));?>
<br>       	
<?php echo smarty_modifier_truncate($_smarty_tpl->tpl_vars['articleTitle']->value,30,"...");?>
<br>   	

<?php }} ?>