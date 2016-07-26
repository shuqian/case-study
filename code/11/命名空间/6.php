<?php
	namespace cn;						//创建空间cn
	
	class User{ }						//当前空间下声明一个测试类User		
	
	
	$cn_User = new User();				//非限定名称，表示当前cn空间,这个调用将被解析成 cn\User();
	$ydma_User = new ydma\User(); 		//限定名称，表示相对于cn空间,类前面没有反斜杆\, 这个调用将被解析成 cn\ydma\User();
	
	$ydma_User = new \cn\User();	 //完全限定名称，表示绝对于cn空间,类前面有反斜杆\,这个调用将被解析成 cn\User();
	
	
	$ydma_User = new \cn\ydma\User(); //完全限定名称，表示绝对于cn空间, 类前面有反斜杆\, 这个调用将被解析成 cn\ydma\User();

	//创建cn的子空间ydma
	namespace cn\ydma;
	class User { }
