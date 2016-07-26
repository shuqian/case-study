<?php
	$var = 2;										//该变量作为用户输出值，分别设置1，2，3运行看结果
	
	switch($var) {
		case 1: 
			goto one;								//使用goto语句跳转至one标记处
			echo "one";								//goto已经跳转， 这条代码不会执行到
		case 2: 
			goto two;								//使用goto语句跳转至two标记处
			echo "two";								//goto已经跳转， 这条代码不会执行到
		case 3: 
			goto three;								//使用goto语句跳转至three标记处
			echo "three";							//goto已经跳转， 这条代码不会执行到
	}
	
	one:											//为goto语句声明第一个跳转标记，名称定义为one
		echo "如果变量的值是1， 将跳转到此处执行！";
		exit;
		
	two:											//为goto语句声明第二个跳转标记，名称定义为two
		echo "如果变量的值是2， 将跳转到此处执行！";
		exit;
		
	three:											//为goto语句声明第三个跳转标记，名称定义为three
		echo "如果变量的值是3， 将跳转到此处执行！";
		exit;
		
		
		