<?php
	/**
		通过CURL进行本地文件上传函数
		@param	$url		string	提交的服务器位置，需要字符串参数
		@param	$srcFilePath	string	本地需要上传的文件路径， 需要字符串参数
		@param	$postParam	array	和上传文件一起提交给服务器的POST数据，需要数组参数
		@return	array	服务器返回的信息，是一个数组， 下标errno表示状态（0失败，1成功）、
		                  errmsg为反馈消息，data为服务器返回消息
	*/
	function uploadFile($url, $srcFilePath, $postParam)
	{
		//如果PHP为5.5以上版本，使用CURLFile
		if (version_compare(phpversion(), '5.5.0') >= 0) {
			$data = array(
				'object_file' => new CURLFile($srcFilePath)
			);
		//部署环境是5.4(仅@语法)，但开发环境是5.6(仅CURLFile)。 
		} else {
			//将需要上传的本地文件路径放入一个数组， 下标相录于上传文件的表单名称，路径前一定要有“@”符号
			$data = array(
				'object_file' => '@'.$srcFilePath
			);
		}
		//将上传的信息和post提交的信息合并，这样可以一起传给服务器
		$data = array_merge($postParam, $data);

		$ch = curl_init($url);								// 启动一个CURL会话   

		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);		// 设置获取得内容但不输出
		curl_setopt($ch, CURLOPT_POST, true);				// 发送一个常规的Post请求   
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);		// Post提交的数据包    
		$response = curl_exec($ch);							// 执行操作  
		
		if (curl_errno($ch) != 0) {							// 判断是否有错误
			return array('errno'=>0, 'errmsg'=>"上传$srcFilePath失败: ".curl_error($ch), 'data'=>'');
		}
		curl_close($ch);									// 关闭并释放资源
		if (!$response) {									// 判断上传文件是否为空
			return array('errno'=>0, 'errmsg'=>"上传$srcFilePath失败: response is empty", 'data'=>'');
		}
		//上传成功返回成功的结果数组
		return array('errno'=>1, 'errmsg'=>'ok', 'data'=>$response);
	}
	
	//本地需要上传的文件路径
	$srcFilePath = "C:/wamp/www/g/test.rar";
	
	//声明一个关联数组， 通过post方式，提交给服务器
	$postParam = array("username"=>'gaoluofeng', 'age'=>30);
	
	//调用uplodfile函数， 上传文件， 并提交post数据
	$arr = uploadFile("http://localhost/g/test.php", $srcFilePath, $postParam);
	echo '<pre>';
	print_r($arr);											//打印上传结果
	echo '</pre>';
	
	