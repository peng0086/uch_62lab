-- MariaDB dump 10.17  Distrib 10.4.11-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: cldb
-- ------------------------------------------------------
-- Server version	10.4.11-MariaDB

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
-- Table structure for table `comment`
--

DROP TABLE IF EXISTS `comment`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comment` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `comdate` datetime DEFAULT NULL,
  `messenge` text DEFAULT NULL,
  `reply` text DEFAULT NULL,
  `mid` char(30) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comment`
--

LOCK TABLES `comment` WRITE;
/*!40000 ALTER TABLE `comment` DISABLE KEYS */;
INSERT INTO `comment` VALUES (1,'2020-03-29 18:12:28','good!!','謝謝 thank!!!','b10613062'),(10,'2020-05-13 01:16:13','讚!!!','謝謝','b10613058'),(18,'2020-05-24 23:07:07','棒','','b10613155');
/*!40000 ALTER TABLE `comment` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `member` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mid` char(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL,
  `date` datetime DEFAULT NULL,
  `level` int(11) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `imgPath` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mid` (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES (1,'b10613062','peng','0000','2020-05-13 00:15:12',2,'0909131686','桃園市中壢區同慶路360巷6號8樓','chengyunpeng10@gmail.com','/62lab/imgs/member/led_5.png'),(2,'b10613058','ZHUANG','0000','2020-05-13 00:15:19',1,'0912345678','桃園市中壢區長沙路1號','b10613058@gapps.uch.edu.tw',''),(3,'b10613155','Daniel','0000','2020-05-13 00:15:27',0,'0987654321','桃園市中壢區長沙路2號','b10613155@gapps.uch.edu.tw','/62lab/imgs/member/led_11.png');
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orderdeteil`
--

DROP TABLE IF EXISTS `orderdeteil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `orderdeteil` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `orderList` varchar(10000) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `createDate` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orderdeteil`
--

LOCK TABLES `orderdeteil` WRITE;
/*!40000 ALTER TABLE `orderdeteil` DISABLE KEYS */;
/*!40000 ALTER TABLE `orderdeteil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `price` int(20) NOT NULL,
  `stock` int(20) NOT NULL,
  `info` text NOT NULL,
  `imgPath` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product`
--

LOCK TABLES `product` WRITE;
/*!40000 ALTER TABLE `product` DISABLE KEYS */;
INSERT INTO `product` VALUES (1,'T10小燈',150,20,'顏色:單一白色，用於小燈、尾燈、牌照燈等T10規格需解碼之燈泡。','/62lab/imgs/prod/led_1.png'),(2,'T10解碼小燈',600,199,'顏色:單一白色，高量燈泡，用於小燈、尾燈、牌照燈等T10規格需解碼之燈泡。','/62lab/imgs/prod/led_2.png'),(3,'30CM鋁條燈',800,200,'顏色:白藍紅紫，硬式燈條，用於日型燈、氣霸燈、底燈、後車廂燈。','/62lab/imgs/prod/led_3.png'),(4,'60CM鋁條燈',1000,1,'顏色:白藍紅紫，硬式燈條，用於日型燈、氣霸燈、底燈、後車廂燈。','/62lab/imgs/prod/led_4.png'),(20,'水晶淚眼日型燈',5500,20,'白黃雙色，開機刷燈模式，流水跑馬方向燈。','/62lab/imgs/prod/led_5.png'),(21,'氣氛燈',1800,2000,'顏色：七彩，增加車內行車氣氛。','/62lab/imgs/prod/led_6.png'),(22,'車底燈',900,2000,'汽車分前後左右，機車分前中後，價格歡迎私訊聊聊!!!','/62lab/imgs/prod/led_7.png');
/*!40000 ALTER TABLE `product` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipient`
--

DROP TABLE IF EXISTS `recipient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `recipient` (
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipient`
--

LOCK TABLES `recipient` WRITE;
/*!40000 ALTER TABLE `recipient` DISABLE KEYS */;
INSERT INTO `recipient` VALUES ('Daniel','daniel','daniel','daniel'),('peng','黃啟維','我高興','大路顛'),('ZHUANG','莊建鈞','0912345678','長沙路300號');
/*!40000 ALTER TABLE `recipient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shoppingcart`
--

DROP TABLE IF EXISTS `shoppingcart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `shoppingcart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `orderList` varchar(10000) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `createDate` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shoppingcart`
--

LOCK TABLES `shoppingcart` WRITE;
/*!40000 ALTER TABLE `shoppingcart` DISABLE KEYS */;
/*!40000 ALTER TABLE `shoppingcart` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-26 16:30:54
