<?php 
	$url="http://match.sports.sina.com.cn/football/csl/opta_rank.php?item=shoot&year=2014&lid=8&type=1&dpc=1";

	$data = file_get_contents($url);

	// print_r($data);

	// var_dump($data);

	$filename = "shoot.html";

	file_put_contents($filename, $data);

?>