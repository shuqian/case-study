<?php
	/*
		使用trait关键字声明一个Trait, 需要运行在php5.4以后版本中
	*/
	trait DemoTrait {							//使用trait标识一个Trait，命名为DemoTrait
		public $property1 = true;			 	//可以在Trait中声明成员属性
		static $property2 = 1;				 	//可以在Trait中使用static关键字声明静态成员
		
		function method1() { /* codes */ }	 	//可以在Trait中声明成员方法
		abstract public function method2();  	//这里可以加入抽像修饰符，说明调用类必须实现它
	}
	
	
	
	
	