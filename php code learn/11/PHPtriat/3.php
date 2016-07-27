<?php	
	trait Demo1_trait {			/*声明一个简单的Trait， 有一个成员方法*/
		function method1() { 
			/* 这里是方法method1内部代码, 此处省略 */ 
		}

	}
	
	trait Demo2_trait {			/*声明一个简单的Trait， 有一个成员方法*/
		use Demo1_trait;		//在Trait中使用use，将Demo1_trait混入，形成嵌套
		function method2() { 
			/* 这里是方法method2内部代码, 此处省略 */ 
		}
	}

	class Demo1_class {			/*声明一个普通类， 在类中混入trait*/
		use Demo2_trait;		//注意这行，使用use混入Demo2_trait
	}

	
	
	$obj = new Demo1_class();	//实例化类Demo1_class的对象

	$obj->method1();			//通过Demo1_class的对象,可以直接调用混入该类中Demo1_trait中的成员方法method1()
	$obj->method2(); 			//通过Demo1_class的对象,可以直接调用混入该类中Demo1_trait中的成员方法method2()
	
	
	
