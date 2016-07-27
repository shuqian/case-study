<?php
	namespace broshop\cart;					//使用命名空间表示处于brophp下的cart模块
	class Test{}							//声明Test类

	namespace brophp\order;					//使用命名空间表示处于brophp下的order模块
	class Test{}							//声明和上面空间相同的类

	
	$test = new Test();						//调用当前空间的类
	$cart_test = new \brophp\cart\Test();	//调用brophp\cart空间的类

	
	
	