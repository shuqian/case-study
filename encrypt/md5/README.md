## md5登录注册 ##

#### 文件规划： ####

	/login.php
	/doAction.php
	/reg.php

#### 数据库规划： ####
	数据库：md5; 数据表：user

#### 思路： ####
1. 登录表单，POST传参数，GET传递行为
2. doAction.php 接收POST参数，判断GET传递行为，进行数据的处理(数据验证，写入数据库，返回结果)