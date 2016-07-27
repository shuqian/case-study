<?php
	$pdo = new PDO("mysql:host=localhost;dbname=demo", "mysql_urer", "mysql_password");
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);  //设置异常处理模式
	$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 0);                   //关闭自动提交

	/* 使用异常处理试着去执行转账的事务，如果有异常转到catch区块中 */
	try {
		$price = 80;	            //商品交易价格，也是转账金额
		$pdo->beginTransaction();   //开始事备

		$affected_rows = $pdo->exec("update account set cash=cash-{$price} where name='userA'"); //转出
         
		if($affected_rows > 0)
            echo "userA成功转出｛$price｝元人民币<br>";
        else
			throw new PDOException('userA转出失败');      //失败抛出异常，不向下再执行，转到catch区块

		$affected_rows = $pdo->exec("update account set cash=cash+{$price} where name='userB'"); //转入
	
		if($affected_rows > 0)
            echo "成功向userB转入{$price}元人民币<br>";
        else
			throw new PDOException('userB转入失败');      //失败抛出异常，不向下再执行，转到catch区块

		echo "交易成功!";
		$pdo->commit();             //如果执行到此处表示前面两个查询执行成功，整个事务执行成功
	}catch(PDOException $e){
		echo "交易失败:".$e->getMessage();
		$pdo->rollback();           //如果执行到此处理表示事务中的语句出问题了， 整个事务全部撤消
	}

	$pdo->setAttribute(PDO::ATTR_AUTOCOMMIT, 1);          //重新开启自动提交

	
	

