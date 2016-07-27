<?php
	namespace cn\ydma;				//声明命名空间为cn\ydma
	class User { }					//当前空间下声明一个类User

	namespace broshop;				//再创建一个broshop空间
	
	use cn\ydma;					//导入一个命名空间cn\ydma
	$ydma_User = new ydma\User();	//导入命名空间后可使用限定名称调用元素
	
	use cn\ydma as u;				//为命名空间使用别名
	$ydma_User = new u\User();		//使用别名代替空间名
	
	use cn\ydma\User;				//导入一个类
	$ydma_User = new User();		//导入类后可使用非限定名称调用元素
	
	use cn\ydma\User as CYUser;		//为类使用别名
	$ydma_User = new CYUser();		//使用别名代替空间名

	
	