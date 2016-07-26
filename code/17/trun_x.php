<?php
	/**
		图片沿X轴翻转，以jpeg格式为例
		@param	string	$filename	图片名称
	*/
	function trun_x($filename){
		/* 创建图片背景资源，以jpeg格式为例 */
		$back = imagecreatefromjpeg($filename);

		$width = imagesx($back);    //获取图片的宽度
		$height = imagesy($back);   //获取图片的高度

		/* 创建一个新的图片资源，用来保存沿X轴翻转后的图片 */
		$new = imagecreatetruecolor($width, $height);
		
		/* 沿x轴翻转就是将原图从上向下按一个像素高度向新资中逐个复制 */
		for($y=0; $y < $height; $y++){
			/* 逐条复制图片本身宽度，1个像素高度的图片到新资源中 */
			imagecopy($new, $back,0, $height-$y-1, 0, $y, $width, 1);
		}
		
		/* 保存翻转后的图片资源 */
		imagejpeg($new, $filename);

		imagedestroy($back);        //销毁原背景图像资源
		imagedestroy($new);         //销毁新的图片资源
	}
	
	/* 将图片brophp.jpg沿x轴翻转 */
	trun_x("brophp.jpg");
	
	
