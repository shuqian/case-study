<?php 
/*
步骤5：使用电脑桌面上的SQLyog数据库管理软件连接Mysql数据库，在test_db中创建数据表shoot_tbl，用于保存后续步骤保存$shoot_arr。
 */

/*

数据库：test_db
SQL建表：shoot_tbl
CREATE TABLE `shoot`(
	`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`ranking` INT UNSIGNED NOT NULL,
	`player` VARCHAR(30) NOT NULL,
	`team` VARCHAR(30) NOT NULL,
	`shots` INT UNSIGNED NOT NULL,
	`lleg` INT UNSIGNED NOT NULL,
	`rleg` INT UNSIGNED NOT NULL,
	`head` INT UNSIGNED NOT NULL,
	`other` INT UNSIGNED NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

排名	姓名	球队	射门数	左脚	右脚	头部	其他部位
`ranking`, `player`, `team`, `shots`, `lleg`, `rleg`, `head`, `other`

 */

?>