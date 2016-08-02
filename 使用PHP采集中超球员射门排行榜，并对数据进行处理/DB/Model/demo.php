<?php
	include './Model.class.php';
	include './config.php';

	$res = Model::getModel('user');
	
	$map['status'] = 1;
	$map['id'] = array('elt', '41');

	$cur = isset($_GET['p'])?$_GET['p']:1;		//获取当前页
	$num = 5;							//每页显示数量
	$offset = $num*($cur-1);			//计算得出偏移数量
	$limit = $offset.', '.$num;			//搜索限制的条数和偏移量

	echo "<pre>";
	// print_r($res->field(array('id', 'username', 'fullname'))->where($map)->limit(10)->select());
	print_r($res->field(array('id', 'username', 'fullname'))->limit($limit)->select());
	echo "</pre>";

	//////////////
	// 单态模式 //
	//////////////
	$res2 = Model::getModel('user');

	if ($res === $res2) {
		echo "Y";
	} else{
		echo "N";
	}


	// 添加一条数据
	// $data['username'] = "zhu li 4";
	// $data['password'] = md5("123456");
	// $data['fullname'] = "朱丽叶";
	// $data['addtime'] = time();
	// echo $res->add($data);


	// 删除一条数据
	// echo $res->delete(82);

/*	// 更新一条数据
	$id = 85;
	$data = $res->field(array('username', 'fullname'))->find($id);
	$data['username'] = 'lulu2';
	echo $res->update($id, $data);*/

	/*
	面向对象编程思维的访问轨迹：
	1、实例化1个对象
	2、查看对象的实例化：初始化数据库的连接；把数据表传参给一个变量
	3、对象访问的成员方法
	4、查看对象的成员方法
	5、成员方法的运行代码：声明1个SQL语句遍历，作为参数传给一个成员方法
	6、查看成员方法的代码：数据库的查询操作，返回查询的结果
	7、对象调用的成员方法结束，返回结果给调用者！

	运用的面向对象知识：
	1、外部访问成员方法
	2、代码重用性：对象自身访问成员方法(辅助方法，封装性)

	 */