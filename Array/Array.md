#数组
## 数组分类 ##

根据下标分类：

- 索引数组
- 关联数组

根据维度分类：

- 一维数组
- 二维或多维数组

## 数组的定义 ##

1. 直接赋值：
	
		$数组变量名[下标] = 值;

2. 使用array()函数声明数组：

		$数组变量名 = array(key1=>value1, key2=>value2, ..., keyN=>valueN);

3. 如果数组中的元素仍为数组，就构成了包含数组的数组，即多维数组。

## 数组的遍历 ##

1. for语句：遍历连续数字索引的一维数组。

		for($i=0; $i<count($array); $i++)
		{
			echo $array[$i];
		}

2. foreach语句：每次循环中，当前元素的值被赋值给$value，并且把数组内部的指针向后移动一步。

		第一种：
		foreach($array as $value)
		{
			循环体
		}

		第二种：
		foreach($array as $key=>$value)
		{
			循环体
		}

3. 使用list(), each(), while循环遍历数组

4. 使用数组内部指针控制函数遍历数组

	- current()
	- key()
	- next()
	- prev()
	- end()
	- reset()

## 预定义数组 ##

超全局数组变量：

- $_SERVER
- $_ENV
- $_GET
- $_POST
- $_REQUEST
- $_FILES
- $_COOKIE
- $_SESSION
- $GLOBALS
	
## 数组的处理函数 ##

1. 键、值操作函数
	
	- array_values()
	- array_keys()
	- in_array()
	- array_flip()
	- array_reverse()

2. 统计数组元素的个数和唯一性

	- count()
	- array_count_values()
	- array_unique()

3. 使用回调函数处理数组

	- array_filter() 	//用回调函数过滤数组中的元素，返回按用户自定义函数过滤后的新数组。
	- array_walk()
	- array_map()

4. 数组的排序函数

	- sort()
	- rsort()              //逆向排序
	- usort()              //用户自定义的回调函数对数组排序
	- uksort() 			   //用户自定义的回调函数对数组中的键名排序
	- uasort()             //用自定义的回调函数，保持索引不变的排序
	- asort()              //对数组进行有小到大的排序并保持索引不变
	- arsort() 			   //对数组进行有小到大的逆向排序并保持索引不变
	- ksort()
	- krsort()
	- natsort()
	- natcasesort()
	- array_multisort() 	//对多个数组或多维数组排序

5. 拆分、合并、分解和接合数组
	
	- array_slice()
	- array_splice()
	- array_combine() 		//合并两个数组，其中一个是键名，另一个为键值
	- array_merge() 		//把一个或多个数组合并为一个数组
	- array_intersect() 	//计算数组的交集
	- array_diff() 			//返回两个数组的差集数组

6. 数据结构

	- array_push()    		//入栈
	- array_pop() 			//出栈
	- array_unshift()       //在数组开头插入一个或多个元素
	- array_shift() 		//删除数组中的第一个元素

7. 其他有用的数组函数

	- array_rand()
	- shuffle()
	- array_sum()
	- range()

## 操作PHP数组需要注意的一些细节 ##

- 数组运算符号
- unset()
- 下标注意事项：key中的浮点数被取代为整型。