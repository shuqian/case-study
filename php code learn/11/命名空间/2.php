<?php
	namespace MyProject1;  								//定义命名空间MyProject1
	
	const TEST='this is a const';						//在MyProject1中声明一个常量TEST
	
	function demo() {									//在MyProject1中声明一个函数
		echo "this is a function";
	}
	
	class User {      								   //此User属于MyProject1空间的类
		function fun() {
			echo "this is User's fun()";
		}
	}
 
	echo TEST;											//在自己命名空间直接使用常量
	demo();												//在自己命名空间中直接调用本空间函数
	
	/*********************************命名空间MyProject2******************************************/
	namespace MyProject2;  								//定义命名空间MyProject2
		
	const TEST2 = "this is MyProject2 const";			//在MyProject2中声明一个常量TEST2	
	echo TEST2;											//在自己命名空间直接使用常量

	\MyProject1\demo();									//调用MyProject1空间中的demo()函数
	
	$user = new \MyProject1\User();						//使用MyProject1空间的类实例化对象
	$user -> fun();
	
	
	