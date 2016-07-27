<?php
	/**
		向不同格式的图片中间画一个字符串（也是文字水印）
		@param	string	$filename	图片的名称字符串，如果不是当前目录下的图片，请指明路径
		@param	string	$string		水印文字字符串，如果使用中文请使用utf-8字符串
	*/
    function image($filename, $string) {
        /* 获取图片的属性， 第一个宽度， 第二个高度， 类型1=>gif, 2=>jpeg, 3=>png  */
        list($width, $height, $type) = getimagesize($filename);
		/* 可以处理的图片类型 */
        $types = array(1=>"gif", 2=>"jpeg", 3=>"png");
		/* 通过图片类型去组合，可以创建对应图片格式的，创建图片资源的GD库函数 */
        $createfrom = "imagecreatefrom".$types[$type];
        /* 通过“变量函数”去打对应的函数去创建图片的资源 */
        $image = $createfrom($filename);
		/* 设置居中字体的X轴作标位置 */
		$x = ($width - imagefontwidth(5)*strlen($string)) / 2;
		/* 设置居中字体的Y轴作标位置 */
		$y = ($height -imagefontheight(5)) / 2;
		/* 设置字体的颜色为红色 */
		$textcolor = imagecolorallocate($image, 255, 0, 0);
		/* 向图片上画一个指定的字符串 */
		imagestring($image, 5, $x, $y, $string, $textcolor);
        /* 通过图片类型去组合保存对应格式的图片函数 */
        $output = "image".$types[$type];
		/* 通过变量函数去保存对应格式的图片 */
        $output($image, $filename);
        /* 销毁图像资源 */
        imagedestroy($image);
    }
	
	image("brophp.gif", "GIF");      //向brophp.gif格式为gif的图片中央画一个字符串GIF
	image("brophp.jpg", "JPEG");     //向brophp.jpg格式为jpeg的图片中央画一个字符串JPEG
	image("brophp.png", "PNG");      //向brophp.png格式为png的图片中央画一个字符串PNG

	
  