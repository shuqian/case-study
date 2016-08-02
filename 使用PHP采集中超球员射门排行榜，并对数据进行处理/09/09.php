<?php 
/*
步骤9：C:/web/include/class.quickskin.php是Quickskin模板引擎，在PHP中调用该Class，使用下图样式输出模板，将$shoot_arr、$rand_top3_arr、$left_10to50_arr、$top_team5、$sort_arr等数据输出。
 */

// 使用Smarty模板引擎

include './02.php';
include './03.php';
include './04.php';
include './07.php';
include './08.php';

include '../libs/Smarty.class.php';

$tpl = new Smarty();

// 设置模板目录
$tpl->template_dir = "./views";

// 设置编译目录
$tpl->compile_dir = "./runtime/views_c";

// 设置缓存目录
$tpl->cache_dir = "./runtime/cache";

// 开启缓存
$tpl->caching = true;

// 设置缓存时间
$tpl->cache_lifetime = 10;

// var_dump($shoot_arr);
// var_dump($rand_top3_arr);
// var_dump($left_10to50_arr);
// var_dump($top_team5);
// var_dump($sort_arr);

$tpl->assign('shoot_arr', $shoot_arr);
$tpl->assign('rand_top3_arr', $rand_top3_arr);
$tpl->assign('left_10to50_arr', $left_10to50_arr);
$tpl->assign('top_team5', $top_team5);
$tpl->assign('sort_arr', $sort_arr);

$tpl->display('./views/test.tpl');

?>