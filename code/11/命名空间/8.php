<?php
	namespace cn\ydma;				 //在cn\ydma空间中声明一个类User
	class User { }

	namespace broshop;					//在broshop空间中声明两个类User和CYUser
	class User { }
	Class CYUser { }


	use cn\ydma\User;					//导入一个类
	$ydma_User = new User(); 			//与当前空间的User发生冲突，程序产生致命错误

	use cn\ydma\User as CYUser;			//为类使用别名
	$ydma_User = new CYUser();			//与当前空间的CYUser发生冲突，程序产生致命错误
