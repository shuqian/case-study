<?php 
	class MySmarty
	{
		// 定义一个数组存储变量
		public $data = array();

		public function assign($key, $val)
		{
			$this->data[$key] = $val;
		}

		public function display($tpl)
		{
			// var_dump($this->data);    //测试$data是否存储了传过来的变量
			foreach ($this->data as $key => $val) {
				// 把数组里的值$data['userlist']，传递到该方法内$$key等同于$userlist
				$$key = $val;
			}

			// 引入模板，遍历$userlist的数组
			include $tpl;
		}
	}