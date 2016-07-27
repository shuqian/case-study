<?php 
	try{
		$dbh=new PDO('mysql:dbname=testdb;host=localhost','mysql_user','mysql_pwd');　
	}catch(PDOException $e){　　　　　　　　　　　　　　
		echo '数据库连接失败：'.$e->getMessage();        
		exit;　　　　　　　　　　　　　　　　　　　　
	}
	echo '<table border="1" align="center" width=90%>';　　　	
	echo '<caption><h1>联系人信息表</h1></caption>';　　　
	echo '<tr bgcolor="#cccccc">';　　　　　　　　　　　　
	echo '<th>UID</th><th>姓名</th><th>联系地址</th><th>联系电话</th><th>电子邮件</th></tr>';

	$stmt=$dbh->query("select uid,name,address,phone,email from contactInfo");  //执行SELECT语句
	
	/* 以PDO::FETCH_NUM式获取索引并遍历 */
	while(list($uid, $name, $address, $phone, $email) = $stmt->fetch(PDO::FETCH_NUM)){　				
		echo '<tr>';　　　　　　　　　　　　　　　		//输出每行的开始标记
		echo '<td>'.$uid.'</td>';　　　　　　　		//从结果行数组中获取uid　　
		echo '<td>'.$name.'</td>';            		//从结果行数组中获取name
		echo '<td>'.$address.'</td>';           		//从结果行数组中获取address
		echo '<td>'.$phone.'</td>';           		//从结果行数组中获取phone
		echo '<td>'.$email.'</td>';            		//从结果行数组中获取email
		echo '</tr>';　　　　　　　　　　　　　　　		//输出每行的结束标记
	}
	echo '</table>';　　　　　　　　　　　　　　　　		


