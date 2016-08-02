排名	姓名	球队	射门数	左脚	右脚	头部	其他部位
`ranking`, `player`, `team`, `shots`, `lleg`, `rleg`, `head`, `other`

-- 球员数据表shoot
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

