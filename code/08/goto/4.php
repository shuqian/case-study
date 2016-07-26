<?php
	goto loop;								//使用goto语句跳转至loop标记处理（loop在循环中）
	
	for($i=0,$j=50; $i<100; $i++) {			//for循环结构
		while($j--) {						//while循环结构
			loop:							//在循环中设置goto的标记
		}
	}
	
	
	