<?php
	trait Demo1_trait {
		function func() { 
			echo "第一个Trait中的func方法";
		}
	}

	trait Demo2_trait {							// 这里的名称和 Demo1_trait 一样，会有冲突
		function func() { 
			echo "第二个Trait中的func方法";
		}
	}

	class first_class {
		use Demo1_trait, Demo2_trait {			// Demo2_trait 中声明的
			
			
			Demo1_trait::func insteadof Demo2_trait; // 在这里声明使用 Demo1_trait 的 func 替换
		}
	}  

	$obj = new first_class();

	
	$obj->func();								//输出: 第一个Trait中的func方法