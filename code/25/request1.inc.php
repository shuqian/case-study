<?php
	/**
		自定义通过CURL请求URL函数
		@param string	 url 目标网址
		@return	string	 返回网页内容
	*/
	function request($url) {				
		$ch = curl_init();								//创建一个新的curl资源赋给变量$ch
		
		curl_setopt($ch,CURLOPT_URL,$url);				//设置url,同样方式也可以设置其它选项
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);	//设置获取得内容但不输出
		
		$output = curl_exec($ch);						//执行，并将获取内容赋给变量$output
		
		curl_close($ch);								//释放资源
		return $output;									//返回获取的网页内容
	}
	
	echo request('http://www.ydma.cn');					//调用函数，将输出返回的网页内容
