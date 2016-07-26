<?php
	/**
		模拟用户登录函数
		@param	$url		string 	登录提交的地址
		@param	$cookie	string	设置Cookie信息保存的文件
		@param	$post	array	提交的post数据
	*/
	function login_post($url, $cookie, $post) { 
		$ch = curl_init();												//初始化curl模块 
		curl_setopt($ch, CURLOPT_URL, $url);							//登录提交的地址 
		curl_setopt($ch, CURLOPT_HEADER, 0);							//是否显示头信息 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 0);					//是否自动显示返回的信息 
		curl_setopt($ch, CURLOPT_COOKIEJAR, $cookie); 					//设置Cookie信息保存在指定的文件中 
		curl_setopt($ch, CURLOPT_POST, 1);								//post方式提交 
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post));	//要提交的信息 
		curl_exec($ch);													//执行cURL 
		curl_close($ch);												//关闭cURL资源，并且释放系统资源 
	} 
	
	/**
		登录成功后获取数据 
		@param	$url		string 	需要获取的内容地址
		@param	$cookie	string	读取Cookie信息保存的文件
		@return  string			抓取页面内容 
	*/
	function get_content($url, $cookie) { 
		$ch = curl_init(); 
		curl_setopt($ch, CURLOPT_URL, $url); 
		curl_setopt($ch, CURLOPT_HEADER, 0); 
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($ch, CURLOPT_COOKIEFILE, $cookie); 					//读取cookie 
		$rs = curl_exec($ch); 											//执行CURL抓取页面内容 
		curl_close($ch); 
		return $rs; 													//返回内容字符串
	} 
	
	
	
	$post = array ( 								//按原网站的表单，设置post的数据，数组下标和原网站一致
		'_username' => 'g@ydma.cn', 				//登录用户名
		'_password' => '123456', 					//登录密码
		'_submit' => '登录' 
	); 
	
	$url = "http://www.ydma.cn/login/check"; 		//登录地址，和原网站一致
	$cookie = dirname(__FILE__).'/cookie_ydma.txt'; //设置cookie保存路径 
	$url2 = "http://www.ydma.cn/course/59"; 		//登录后要获取信息的地址 
	
	login_post($url, $cookie, $post); 				//调用函数login_post()模拟登录 
	$content = get_content($url2, $cookie); 		//登录后，调用get_content()函数获取登录后指定的页面信息 
	
	@unlink($cookie); 								//删除cookie文件 							
	file_put_contents('save.txt',$content);			//保存抓取的页面内容
	
	
	
	
	