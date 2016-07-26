<?php
	/**
		file: init.inc.php Smarty对象的实例化及初使化文件
	*/
	define("ROOT", str_replace("\\", "/",dirname(__FILE__)).'/');  //指定项目的根路径
	require ROOT.'libs/Smarty.class.php';                          //加载Smarty类文件         
	$smarty = new Smarty();                                        //实例化Smarty类的对象$smarty

    /* 推荐使用Smarty3以上版本方式设置默认的路径,设置成功后都返回$smarty对象本身，可以使用连贯操作 */
    $smarty ->setTemplateDir(ROOT.'templates/')                    //设置所有模板文件存放的目录
  //		->addTemplateDir(ROOT.'templates2/')                   //可以添加多个模板目录（前后台各一个）
            ->setCompileDir(ROOT.'templates_c/')                   //设置所有编译过的模板文件存放的目录
            ->setPluginsDir(ROOT.'plugins/')                       //设置为模板扩充插件存放的目录
            ->setCacheDir(ROOT.'cache/')                           //设置缓存文件存放的目录
            ->setConfigDir(ROOT.'configs');                        //设置模板配置文件存放的目录

//	$smarty ->debugging=true;
//	$smarty ->debug_tpl=ROOT.'/libs/debug.tpl';	
		
	$smarty->caching = false;                             		  //设置Smarty缓存开关功能
	$smarty->cache_lifetime = 60*60*24;                 		  //设置模板缓存有效时间段的长度为1天
//	$smarty->left_delimiter = '<{';                      		  //设置模板语言中的左结束符
//	$smarty->right_delimiter = '}>';                     		  //设置模板语言中的右结束符

	
