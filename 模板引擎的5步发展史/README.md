#模板引擎的5步发展史
##第1版：代码混编（PHP和HTML混编）
	
	<table border="1" width="350">
		<caption><h2>用户表</h2></caption>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>AddTime</th>
		</tr>
		<?php
			/*第1版：代码混编*/
			$link = mysqli_connect('127.0.0.1', 'root', '', 'ishop') or die("数据库连接失败：".mysqli_error());
			mysqli_set_charset($link, 'utf8');

			$sql = "SELECT * FROM `shop_user`";
			$res = mysqli_query($link, $sql);

			if($res){
				while($row = mysqli_fetch_assoc($res)){
					echo "<tr>";
					echo "<td>{$row['id']}</td>";
					echo "<td>{$row['username']}</td>";
					echo "<td>".date('Y-m-d H:i:s', $row['addtime'])."</td>";
					echo "</tr>";
				}
			}

			mysqli_close($link);
		?>
	</table>

##第2版：高级分离。页面顶部放PHP代码处理业务逻辑

	<?php
		$link = mysqli_connect('127.0.0.1', 'root', '', 'ishop') or die("数据库连接失败：".mysqli_error());
		mysqli_set_charset($link, 'utf8');

		$sql = "SELECT * FROM `shop_user`";
		$res = mysqli_query($link, $sql);

		if($res){
			while($row = mysqli_fetch_assoc($res)){
				$userlist[] = $row;
			}
		}
	?>

	<!-- 省略部分html代码 -->
	<table border="1" width="350">
		<caption><h2>用户表</h2></caption>
		<tr>
			<th>ID</th>
			<th>Username</th>
			<th>AddTime</th>
		</tr>
		<?php foreach($userlist as $v): ?>
			<tr>
				<td><?php echo $v['id'] ?></td>
				<td><?php echo $v['username'] ?></td>
				<td><?php echo $v['addtime'] ?></td>
			</tr>
		<?php endforeach; ?>
	</table>
	<!-- 省略部分html代码 -->
	
	<?php mysqli_close($link); ?>

##第3版：PHP和HTML页面分离技术, 使用include引入模板文件

	<?php
		/* 第3版：PHP和HTML页面分离技术, 使用include引入模板文件 */
		$link = mysqli_connect('127.0.0.1', 'root', '', 'ishop') or die("数据库连接失败：".mysqli_error());
		mysqli_set_charset($link, 'utf8');

		$sql = "SELECT * FROM `shop_user`";
		$res = mysqli_query($link, $sql);

		if($res){
			while($row = mysqli_fetch_assoc($res)){
				$userlist[] = $row;
			}
		}
		
		// 使用include引入模板文件
		include './test.tpl';

		mysqli_close($link);
	?>

问题：所有的变量都可以在模板文件中输出。

解决问题：实现PHP和页面代码的分离

1. PHP分配数据给HTML页面(使用对象来传递变量，显示模板可以解决)
2. HTML页面，由美工负责，不能出现PHP代码

##第4版：封装1个模板类，使用对象的方式分配数据，显示模板

PHP文件：引入模板引擎类，传递变量

	// 引入模板引擎类
	include './MySmarty.class.php';

	// 创建1个模板对象
	$tpl = new MySmarty();

	$tpl->assign('userlist', $userlist);
	$tpl->display('./test.tpl');

模板引擎类：

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

##第5版：完成模板文件的编译过程

PHP文件：

	<?php
		/* 第5版：完成模板文件的编译过程 */

		// 引入模板引擎类
		include './MySmarty.class.php';

		// 创建1个模板对象
		$tpl = new MySmarty();
		$title = "这是一个测试标题";

		$tpl->assign('title', $title);
		$tpl->display('./test.tpl');
	?>

模板引擎类：

这里完成了一个简单的编译，把模板中的变量{$title}编译成php代码: <?php echo $title;?>


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
				
				//如果目录不存在则，创建编译后的存放目录
				if (!file_exists('./template_c/')) mkdir('./template_c/');
				file_put_contents($filename, $new_String);

				return $filename;
			}
		}

模板文件：

	//编译前：test.tpl
	<body>
		<?php echo $title ?>
	</body>

	//编译后：aa757471baa99de5a5035424b8cad130.php
	<body>
		<?php echo $title ?>
	</body>

完成编译后的代码，实际上还是PHP代码，然后通过display()方法，显示给前台。

以上就是模板引擎的5步发展史，对于理解Smarty等模板引擎有学习的帮助。