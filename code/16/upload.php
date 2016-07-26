<?php
    $allowtype = array("gif", "png","jpg");   //设置充许上传的类型为gif, png, jpg	
    $size = 1000000; 					      //设置充许大小为1M（1000000字节）以内的文件
    $path = "./uploads"; 					  //设置上传后保存文件的路径，指定当前目录下的uploads目录

	/* 判断文件是否可以成功上传到服务器，$_FILES['myfile']['error']值为0表示上传成功 ，其它值则出错*/
	if($_FILES['myfile']['error'] > 0) {  	
		echo '上传错误: ';
    	switch ($_FILES['myfile']['error']) {
     		case 1:  die('上传文件大小超出了PHP配置文件中的约定值：upload_max_filesize');  
			case 2:  die('上传文件大小超出了表单中的约定值：MAX_FILE_SIZE');  
			case 3:  die('文件只被部分上载'); 
			case 4:  die('没有上传任何文件'); 
			default:  die('未知错误');
   		}
	}
	
	/* 判断上传的文件是否为充许的文件类型 */
	$hz = array_pop(explode(".",$_FILES['myfile']['name'])); //获取文件的后缀 名   
    /*通过判断文件的后缀方式，来决定文件是否是充许上传的文件类型 */        
    if(!in_array($hz, $allowtype)) {
        die("这个后缀是<b>".$hz."</b>, 不是充许的文件类型!");
    }
	
    /* 也可以通过获取上传文件的MIME类型中的主类型和子类型,来限制文件上传的类型
	list($maintype,$subtype)=explode("/",$_FILES['myfile']['type']);	
  	if ($maintype=="text") {    		  //通过主类型限制不能上传文本文件，例如.txt .html .php等文件
		die('问题: 不能上传文本文件。');  //如果用户上传文本文件则退出程序
	} */
	
    /* 判断上传的文件是否为充许尺寸范围内*/
    if($_FILES['myfile']["size"] > $size){
		die("超过了充许的<b>{$size}<b>字节大小!");
    }
					
	/*为了系统安全，也为了同名文件会被覆盖，上传后将文件名使用系统定义 */
    $filename = date("YmdHis").rand(100, 999).".".$hz;

	/* 判断是否为上传文件 */
	if (is_uploaded_file($_FILES['myfile']['tmp_name'])) { 	
 	    if(!move_uploaded_file($_FILES['myfile']["tmp_name"], $path.'/'.$filename)){   //从移动文件
			die('问题: 不能将文件移动到指定目录。');
		}
 	}else{
		die("问题: 上传文件{$_FILES['myfile']['name']}不是一个合法文件!");
	}
	
	/* 如果文件上传成功则输出 */
	echo "文件{$filename}上传成功,保存在目录{$path}中,大小为{$_FILES['myfile']['size']}字节";  