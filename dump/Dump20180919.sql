-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: task_2
-- ------------------------------------------------------
-- Server version	5.6.38

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
-- Table structure for table `blog_news`
--

DROP TABLE IF EXISTS `blog_news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blog_news` (
  `id` int(11) NOT NULL,
  `tittle` varchar(255) NOT NULL,
  `image` varchar(45) NOT NULL,
  `description` longtext NOT NULL,
  `datetimes` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blog_news`
--

LOCK TABLES `blog_news` WRITE;
/*!40000 ALTER TABLE `blog_news` DISABLE KEYS */;
INSERT INTO `blog_news` VALUES (1,'Ближайшая к Земле экзопланета может быть «густо населенной»','images/news1.jpg','Небольшой прыжок в космос, прочь от Земли — и вы окажетесь на планете земного типа на орбите ближайшей к Солнцу звезды Проксимы Центавра. С момента открытия этой экзопланеты — Проксимы Центавра b — в 2016 году люди все не могут понять, может ли эта планета поддерживать жизнь.','2018-09-13 18:50:32',8),(2,'Альтернативная теория гравитации «спасена от смерти»','images/news2.jpg','Международная группа исследователей, включающая физиков из Сент-Эндрюсского университета, Шотландия, «вернула к жизни» ранее «развенчанную» теорию гравитации. ','2018-09-12 22:51:35',8),(3,'Магнитное поле Юпитера оказалось более сложным, чем предполагалось','images/news3.jpg','Известно, что диаметр Юпитера в 11 раз больше диаметра Земли, а магнитное поле сильнее земного в 20 000 раз. Аппарат «Юнона», вышедший на орбиту газового гиганта в 2016 году, раскрыл его новые особенности. ','2018-09-15 13:30:11',9),(4,'10 новых удивительных открытий, связанных с черными дырами','images/news4.jpg','Черные дыры являются, пожалуй, самыми странными и загадочными объектами в известной нам Вселенной. Их никто не видел, но ученые уверены в том, что они существуют.','2018-09-18 11:02:44',9),(5,'Ученые считают, что Млечный Путь в прошлом испытывал «клиническую смерть»','images/news5.jpg','Наша галактика Млечный Путь испытывала «клиническую смерть» в прошлом, когда у нее прекратился процесс образования новых звезд. Он длился около двух миллиардов и завершился около пяти лет назад.','2018-09-18 15:32:18',8);
/*!40000 ALTER TABLE `blog_news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `datetime` datetime NOT NULL,
  `ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (8,'slimic960','5nm4rv8qqqefe2d2c8d756f0ba891d41396f39f430f3yo1zzy2','','Дмитрий','test@mail.ru','2018-09-13 18:50:32','127.0.0.1'),(9,'testov','5nm4rv8qqqe0cc4856e4fbbab44b76c641ed8c0bb5f3yo1zzy2','','Fxg','fxg@mail.ru','2018-09-18 16:39:04','127.0.0.1');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-19 16:17:37
