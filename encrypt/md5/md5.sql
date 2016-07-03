-- 创建用户表 users
CREATE TABLE `users`(
	`id` int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	`username` varchar(255) NOT NULL UNIQUE,
	`password` varchar(255) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8;