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
			foreach ($this->data as $key => $val) {
				$$key = $val;
			}

			// 模板编译
			$filename = $this->compile($tpl);

			// 引入模板，遍历$userlist的数组
			include $filename;
		}

		// 这里进行一个简单的编译，把{$title}编译成php代码（部分省略）: php echo $title
		public function compile($tpl)
		{
			$tpl_String = file_get_contents($tpl);

			$preg = "/\{(.*?)\}/";
			$match = "<?php echo $1; ?>";

			// 文件后缀随便取名
			$filename = './template_c/'.md5($tpl).".php";

			$new_String = preg_replace($preg, $match, $tpl_String);
			if (!file_exists('./template_c/')) mkdir('./template_c/');
			file_put_contents($filename, $new_String);

			return $filename;
		}
	}