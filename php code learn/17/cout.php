<?php
	/**
		在一个大的背景图片中剪裁出指定区域的图片，以jpeg图片格式为例
		@param	string	$filename	需要剪切的背景图片
		@param	int	$x		剪切图片左边开始的位置
		@param	int	$y		剪切图片顶部开始的位置
		@param	int	$width	图片剪裁的宽度
		@param	int	$height	图片剪裁的高度
	*/
	function cut($filename, $x, $y, $width, $height){
		/* 创建背景图片的资源 */
		$back = imagecreatefromjpeg($filename);
		/* 创建一个可以保存裁剪后图片的资源 */
		$cutimg = imagecreatetruecolor($width, $height);
		
		/* 使用imagecopyresampled()函数对图片进行裁剪 */
		imagecopyresampled($cutimg, $back, 0, 0, $x, $y, $width, $height, $width, $height);
		
		/* 保存裁剪后的图片，如果不想覆盖原图片，可以为裁剪后的图片加上前缀 */
		imagejpeg($cutimg, $filename);
		
		imagedestroy($cutimg);      		//销毁图像资源$cutimg
		imagedestroy($back);        		//销毁图像资源$back
	}

	/* 调用cut()函数去裁剪brophp.jpg图片，从50，50开始裁出宽度和高度都为200像素的图片 */
	cut("brophp.jpg", 50, 50, 200, 200);	
	
	
	