<?php	
	trait Demo1_trait {			/*声明一个简单的Trait， 有两个成员方法*/
		function method1() { 
			/* 这里是方法method1内部代码, 此处省略 */ 
		}
		function method2() { 
			/* 这里是方法method2内部代码, 此处省略 */ 
		}
	}

	class Demo1_class {			/*声明一个普通类， 在类中混入trait*/
		use Demo1_trait;		// 注意这行，使用use在类中使用Demo1_trait
	}

	$obj = new Demo1_class();	//实例化类Demo1_class的对象

	$obj->method1();			//通过Demo1_class的对象,可以直接调用混入该类中Demo1_trait中的成员方法method1()
	$obj->method2(); 			//通过Demo1_class的对象,可以直接调用混入该类中Demo1_trait中的成员方法method2()
	
	
	
	