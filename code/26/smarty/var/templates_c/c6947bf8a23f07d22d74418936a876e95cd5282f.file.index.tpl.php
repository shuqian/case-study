<?php /* Smarty version Smarty-3.1.8, created on 2012-07-04 06:20:47
         compiled from "C:/AppServ/www/book/smarty/a/templates\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:162594ff3e0bfc08be9-33350364%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6947bf8a23f07d22d74418936a876e95cd5282f' => 
    array (
      0 => 'C:/AppServ/www/book/smarty/a/templates\\index.tpl',
      1 => 1341382834,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '162594ff3e0bfc08be9-33350364',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.8',
  'unifunc' => 'content_4ff3e0bfcc72c8_51218511',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_4ff3e0bfcc72c8_51218511')) {function content_4ff3e0bfcc72c8_51218511($_smarty_tpl) {?>你好:<?php echo $_SESSION['username'];?>
， <a href="user.php?uid=<?php echo $_SESSION['uid'];?>
">个人中心</a>
<?php }} ?>