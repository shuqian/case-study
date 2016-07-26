<?php
	/**
		为背景图片添加图片水印（位置随机）,背景图片格式为jpeg, 水印图片格式为gif
		@param	string	$filename	需要添加水印的背景图片
		@param	string	$water		水印图片
	*/
	function watermark($filename, $water){
		/* 获取背景图片的宽度和高度 */
		list($b_w, $b_h) = getimagesize($filename);
		
		/* 获取水印图片的宽度和高度 */
		list($w_w, $w_h) = getimagesize($water);
		
		/* 在背景图片中放水印图片的随机起始位置 */
		$posX = rand(0, ($b_w - $w_w)); 
		$posY = rand(0, ($b_h - $w_h)); 

		$back = imagecreatefromjpeg($filename);   				//创建背景图片的资源
		$water = imagecreatefromgif($water);                    //创建水印图片的资源
		
		/* 使用imagecopy()函数将水印图片复制到背景图片指定的位置中 */
		imagecopy($back, $water, $posX, $posY, 0, 0, $w_w, $w_h);
		
		/* 保存带有水印图片的背景图片 */
		imagejpeg($back,$filename);

		imagedestroy($back);				//销毁背京图片资源$back
		imagedestroy($water);               //销毁水印图片资源$water
	}
	
	/* 调用watermark()函数，为背景JPEG格式的图片brophp.jpg，添加GIF格式的水印图片logo.gif */
	watermark("brophp.jpg", "logo.gif");
	
	