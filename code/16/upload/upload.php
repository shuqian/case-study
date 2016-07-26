<title>处理单个文件上传(上传成功)</title>
<?php
	/**
		file: upload.php 
		使用文件上传FileUpload类， 处理单个和多个文件上传
	*/
	require "fileupload.class.php";                      //加载文件上传类
	
	$up = new FileUpload;                                //实例化文件上传对象
	echo '<pre>';
/*	//可以通过set方法设置上传的属性，设置多个属性set方法可以单独调用，也可以连贯操作一起调用多个
	$up -> set('path', './newpath/')  					 //可以自己设置上传文件保存的路径      
	    -> set('size', 1000000)        					 //可以自己限制上传文件的大小
		-> set('allowtype', array('gif', 'jpg', 'png'))  //可以自己限制上传文件的类型
		-> set('israndname', false);    				 //可以使用原文件名，不让系统命名    */
	
	/* 调用$up对象的upload()方法上传文件, myfile是表单的名称，上传成功返回true,否则为false   */
	if( $up->upload('myfile') ) {  
		//如果上传多个文件，下面方法返回是数组，存放所有上传后的文件名。单文件上传则直接返回文件名称
		print_r($up->getFileName());       
	}else{
		//如果上传多个文件时，下面方法返回是数组，多条出错信息。单文件上传出错则直接返回一条错误报告
		print_r($up->getErrorMsg());
	}
	
	echo '</pre>';
	