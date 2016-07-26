<?php
	namespace cn\ydma;
	const PATH = '/cn/ydma';
	class User{ }

	
	echo namespace\PATH; 							//namespace关键字表示当前空间/cn/ydma
	$User = new namespace\User();			
	
	echo __NAMESPACE__; 							//魔法常量__NAMESPACE__的值是当前空间名称cn\ydma
	
	$User_class_name = __NAMESPACE__ . '\User';		//可以组合成字符串并调用
	$User = new $User_class_name();
	