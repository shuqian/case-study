<?php
	/**
		自定义通过CURL请求URL函数,本函数用于测试curl_getinfo()的使用
		@param string	 url 目标网址
		@return	string	 返回网页内容
	*/
	function request($url) {				
		$ch = curl_init();								//创建一个新的curl资源赋给变量$ch
		
		curl_setopt($ch,CURLOPT_URL,$url);				//设置url,同样方式也可以设置其它选项
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);	//设置获取得内容但不输出
		
		$output = curl_exec($ch);						//执行，并将获取内容赋给变量$output
	
		/*通过curl_getinfo()函数，获取服务器返回信息， 并通过第二个参数CURLINFO_HTTP_CODE获取指定的返回状态码*/
		$response_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
		
		curl_close($ch);								//释放资源
		
		/*如果返回的状态码为404，表示请求的页面不存在 */
		if($response_code=='404'){
			echo '请求的页面不存在！';
			return false;
		}else{
			return $output;								//返回获取的网页内容
		}
	}
	
	echo request('http://www.ydma.cn/does/not/exist');	//调用函数，将输出返回的网页内容, 如果不存在返回false
	
	
	
	

	
	
	