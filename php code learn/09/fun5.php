<?php
	/**
		声明函数callback,需要传一匿名函数作为参数
	*/
	function callback($callback){
		$callback();						//参数只用是一个函数才能在这里调用
	}
	 
	
	callback(function(){					//调用函数同时直接传入一个匿名函数
		echo "闭包函数测试";
	});
	
	