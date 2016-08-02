-- MySQL dump 10.13  Distrib 5.7.9, for Win32 (AMD64)
--
-- Host: localhost    Database: test_db
-- ------------------------------------------------------
-- Server version	5.7.9

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `shoot_tbl`
--

DROP TABLE IF EXISTS `shoot_tbl`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shoot_tbl` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ranking` int(10) unsigned NOT NULL,
  `player` varchar(30) NOT NULL,
  `team` varchar(30) NOT NULL,
  `shots` int(10) unsigned NOT NULL,
  `lleg` int(10) unsigned NOT NULL,
  `rleg` int(10) unsigned NOT NULL,
  `head` int(10) unsigned NOT NULL,
  `other` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoot_tbl`
--

LOCK TABLES `shoot_tbl` WRITE;
/*!40000 ALTER TABLE `shoot_tbl` DISABLE KEYS */;
INSERT INTO `shoot_tbl` VALUES (52,1,'埃尔克森','广州恒大',117,24,69,21,0),(53,2,'哈默德','广州富力',117,22,84,10,0),(54,3,'莫雷诺','上海绿地',96,78,6,11,0),(55,4,'武磊','上海上港',93,12,73,8,0),(56,5,'迪亚曼蒂','广州恒大',90,84,6,0,0),(57,6,'海森','上海上港',89,58,19,11,0),(58,7,'麦克布林','上海上港',87,50,18,19,0),(59,8,'埃尼尼奥','长春亚泰',82,6,75,1,0),(60,9,'米西莫维奇','贵州茅台',74,20,53,1,0),(61,10,'阿洛伊西奥','山东鲁能',71,10,47,12,0),(62,11,'德扬','北京国安',68,9,44,14,0),(63,12,'蒙蒂略','山东鲁能',66,10,55,1,0),(64,13,'达维','广州富力',63,45,12,6,0),(65,14,'洛维','山东鲁能',62,15,37,9,0),(66,15,'埃利亚斯','江苏舜天',59,4,43,11,0),(67,16,'多利','哈尔滨毅腾',59,9,36,13,0),(68,17,'里卡多','哈尔滨毅腾',58,9,18,30,0),(69,18,'安德烈齐尼奥','天津泰达',58,5,49,4,0),(70,19,'郜林','广州恒大',57,9,36,12,0),(71,20,'布鲁诺','大连阿尔滨',57,5,47,5,0),(72,21,'贝切莱','长春亚泰',55,8,31,16,0),(73,22,'拉斐尔.马克斯','河南建业',55,10,39,6,0),(74,23,'奥格布','辽宁宏运',54,8,29,16,0),(75,24,'瓦伦西亚','天津泰达',54,15,20,18,0),(76,25,'乌索','山东鲁能',54,7,40,7,0),(77,26,'尤里','贵州茅台',51,6,32,12,0),(78,27,'拉蒙','杭州绿城',50,13,24,13,0),(79,28,'马塞纳','杭州绿城',50,14,32,4,0),(80,29,'奥拉纳尔','萨尔普斯堡',49,26,11,10,0),(81,30,'阿甘','杭州绿城',49,9,37,3,0),(82,31,'巴塔拉','北京国安',49,7,38,4,0),(83,32,'吴曦','江苏舜天',46,10,33,3,0),(84,33,'瑞恩.约翰逊','河南建业',44,17,4,21,0),(85,34,'雷内','广州恒大',43,10,28,5,0),(86,35,'徐亮','上海绿地',42,33,8,1,0),(87,36,'巴雷','天津泰达',42,2,23,15,0),(88,37,'周海滨','天津泰达',41,11,20,10,0),(89,38,'刘彬彬','山东鲁能',41,8,32,1,0),(90,39,'于大宝','大连阿尔滨',40,16,17,7,0),(91,40,'张璐','河南建业',40,15,23,2,0),(92,41,'姜宁','广州富力',39,6,23,9,0),(93,42,'杜震宇','天津泰达',38,27,9,2,0),(94,43,'王永珀','山东鲁能',38,4,32,1,0),(95,44,'詹姆斯','辽宁宏运',38,2,31,5,0),(96,45,'汪嵩','杭州绿城',38,22,14,2,0),(97,46,'张呈栋','北京国安',37,12,13,12,0),(98,47,'德扬','北京国安',37,5,25,7,0),(99,48,'黄希扬','河南建业',36,9,27,0,0),(100,49,'张文钊','山东鲁能',36,20,15,1,0),(101,50,'张稀哲','北京国安',35,5,29,0,0);
/*!40000 ALTER TABLE `shoot_tbl` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-08-03  2:14:37
