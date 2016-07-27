<?php


	function request_post($url,$data){ // 模拟提交数据函数      
		$ch = curl_init(); // 启动一个CURL会话      

		curl_setopt($ch, CURLOPT_URL, $url) ;  			// 要访问的地址 
		curl_setopt($ch, CURLOPT_POST, 1); // 发送一个常规的Post请求     
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // // Post提交的数据包     
  
  
		$tmpInfo = curl_exec($ch); // 执行操作      
		if (curl_errno($ch)) {      
			echo 'Errno'.curl_error($ch);      
		}      
    
		curl_close($ch); // 关键CURL会话      
		
		return $tmpInfo; // 返回数据      

	}

	
	$data = array("username"=>'gaoluofeng', 'age'=>30);
	
	echo request_post('http://localhost/g/demo.php', $data);