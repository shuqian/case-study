﻿<?php
	echo date("M-d-Y", mktime(0, 0, 0, 12, 36, 2007))."\n";  //日期超过31天，计算后输出Jan-05-2008
	echo date("M-d-Y", mktime(0, 0, 0, 14, 1, 2008))."\n";   //月份超过12月，计算后输出Feb-01-2009
	echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 2009))."\n";    //没有问题的转变，输出结果 Jan-01-2009
	echo date("M-d-Y", mktime(0, 0, 0, 1, 1, 99))."\n";      //会将99年转变为1999年， Jan-01-1999
?>
