<?php
	/**
		图片沿Y轴翻转，以jpeg格式为例
		@param	string	$filename	图片名称
	*/
	function trun_y($filename){
		/* 创建图片背景资源，以jpeg格式为例 */
		$back = imagecreatefromjpeg($filename);

		$width = imagesx($back);    //获取图片的宽度
		$height = imagesy($back);   //获取图片的高度

		/* 创建一个新的图片资源，用来保存沿Y轴翻转后的图片 */
		$new = imagecreatetruecolor($width, $height);
		/* 沿Y轴翻转就是将原图从右向左按一个像素宽度向新资中逐个复制 */
		for($x=0; $x < $width; $x++){
			/* 逐条复制图片本身高度，1个像素宽度的图片到新资源中 */
			imagecopy($new, $back, $width-$x-1, 0, $x, 0, 1, $height);
		}
		
		/* 保存翻转后的图片资源 */
		imagejpeg($new, $filename);

		imagedestroy($back);        //销毁原背景图像资源
		imagedestroy($new);         //销毁新的图片资源
	}
	
	/* 图片沿Y轴翻转*/
	trun_y("brophp.jpg");
