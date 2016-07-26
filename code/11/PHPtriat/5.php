<?php
	trait Demo_trait {
		abstract public function func();	//这里可以加入修饰符，说明调用类必须实现它
	}

	class Demo_class {
		use Demo_trait;

		function func() {
			/* Code Here */
		}
	}