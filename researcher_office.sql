-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: localhost    Database: researcher_office
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.16.04.1

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
-- Table structure for table `diploma`
--

DROP TABLE IF EXISTS `diploma`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `diploma` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_EC218957A76ED395` (`user_id`),
  CONSTRAINT `FK_EC218957A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `diploma`
--

LOCK TABLES `diploma` WRITE;
/*!40000 ALTER TABLE `diploma` DISABLE KEYS */;
INSERT INTO `diploma` VALUES (2,'тап','апаптпатапт','2019-12-01 00:00:00',NULL,'2019-09-25 14:34:06','2019-09-26 13:52:11',12),(3,'svg','vberbeb','2009-10-01 00:00:00',NULL,'2019-09-25 14:35:25','2019-09-26 13:48:14',13);
/*!40000 ALTER TABLE `diploma` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration_versions` (
  `version` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `executed_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration_versions`
--

LOCK TABLES `migration_versions` WRITE;
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` VALUES ('20190924183014','2019-09-25 08:41:11'),('20190925103558','2019-09-25 10:36:05'),('20190925103856','2019-09-25 10:39:00');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publication`
--

DROP TABLE IF EXISTS `publication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `co_authors_simple` longtext COLLATE utf8mb4_unicode_ci,
  `place` longtext COLLATE utf8mb4_unicode_ci,
  `date` datetime NOT NULL,
  `pages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` longtext COLLATE utf8mb4_unicode_ci,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication`
--

LOCK TABLES `publication` WRITE;
/*!40000 ALTER TABLE `publication` DISABLE KEYS */;
INSERT INTO `publication` VALUES (2,'Но не многие подозревают о том, какая опасность тут скрывается.\r\nРассмотрим пример.','Stdit','https://habr.com/ru/post/136835/','2005-11-01 00:00:00','20-50','Причина кроется в амперсанде. Он сообщает, что на отмеченные данные ссылается кто-то ещё. Уходя, Вася не подтёр за собой временную переменную, которую использовал для перебора ($item). Переменная использовалась с разрешением на изменение источника (\"&\"), которое также называют «присваиванием по ссылке». Он был уверен, что переменная будет использоваться только внутри цикла. Петрович, используя переменную с таким же именем, в ходе своего перебора, менял её значение, и каждый раз менялось то место, где эта переменная хранилась. А хранилась она там же, где последний элемент массива Пупкина.',NULL,'2019-09-25 15:11:38','2019-09-26 18:00:51');
/*!40000 ALTER TABLE `publication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publication_user`
--

DROP TABLE IF EXISTS `publication_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publication_user` (
  `publication_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`publication_id`,`user_id`),
  KEY `IDX_866B578438B217A7` (`publication_id`),
  KEY `IDX_866B5784A76ED395` (`user_id`),
  CONSTRAINT `FK_866B578438B217A7` FOREIGN KEY (`publication_id`) REFERENCES `publication` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_866B5784A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publication_user`
--

LOCK TABLES `publication_user` WRITE;
/*!40000 ALTER TABLE `publication_user` DISABLE KEYS */;
INSERT INTO `publication_user` VALUES (2,12),(2,13),(2,14),(2,15),(2,18),(2,19),(2,20),(2,21),(2,22);
/*!40000 ALTER TABLE `publication_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `scientific_interest`
--

DROP TABLE IF EXISTS `scientific_interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `scientific_interest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_canonical` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `scientific_interest`
--

LOCK TABLES `scientific_interest` WRITE;
/*!40000 ALTER TABLE `scientific_interest` DISABLE KEYS */;
INSERT INTO `scientific_interest` VALUES (3,'Big data','big_data','2019-09-25 14:26:40','2019-09-25 14:26:40'),(4,'Computer science','computer_science','2019-09-25 14:26:40','2019-09-25 14:26:40'),(5,'Python','python','2019-09-25 14:26:40','2019-09-25 14:26:40'),(6,'Алгоритми','Алгоритми','2019-09-25 14:26:40','2019-09-25 14:26:40'),(7,'Web','web','2019-09-25 14:26:40','2019-09-25 14:26:40'),(8,'Design','design','2019-09-25 14:26:40','2019-09-25 14:26:40'),(9,'C++','c++','2019-09-25 14:26:40','2019-09-25 14:26:40'),(10,'Data science','data_science','2019-09-25 14:26:40','2019-09-25 14:26:40'),(11,'Linus','linus','2019-09-25 14:26:40','2019-09-25 14:26:40'),(12,'Бази даних','Бази_даних','2019-09-25 14:26:40','2019-09-25 14:26:40'),(13,'C#','c#','2019-09-25 14:26:40','2019-09-25 14:26:40'),(14,'Android','android','2019-09-25 14:26:40','2019-09-25 14:26:40'),(15,'Мобільна розробка','Мобільна_розробка','2019-09-25 14:26:40','2019-09-25 14:26:40'),(16,'Java','java','2019-09-25 14:26:40','2019-09-25 14:26:40'),(17,'Kotlin','kotlin','2019-09-25 14:26:40','2019-09-25 14:26:40'),(18,'iOS','ios','2019-09-25 14:26:40','2019-09-25 14:26:40'),(19,'Go','go','2019-09-25 14:26:40','2019-09-25 14:26:40'),(20,'PHP','php','2019-09-25 14:26:40','2019-09-25 14:26:40'),(21,'GameDev','gamedev','2019-09-25 14:26:40','2019-09-25 14:26:40'),(22,'Розробка ігор','Розробка_ігор','2019-09-25 14:26:40','2019-09-25 14:26:40'),(23,'Математика','Математика','2019-09-25 14:26:40','2019-09-25 14:26:40'),(24,'DevOps','devops','2019-09-25 14:26:40','2019-09-25 14:26:40'),(25,'Тестування','Тестування','2019-09-25 14:26:40','2019-09-25 14:26:40'),(26,'Blockchain','blockchain','2019-09-25 14:26:40','2019-09-25 14:26:40'),(27,'Delphi','delphi','2019-09-25 14:26:40','2019-09-25 14:26:40'),(28,'Pascal','pascal','2019-09-25 14:26:40','2019-09-25 14:26:40'),(29,'Assembler','assembler','2019-09-25 14:26:40','2019-09-25 14:26:40'),(30,'Графіка','Графіка','2019-09-25 14:26:40','2019-09-25 14:26:40');
/*!40000 ALTER TABLE `scientific_interest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` json NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `second_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` datetime NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patronymic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birth_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `biography` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQ_8D93D649F85E0677` (`username`),
  UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (12,'admin','[\"ROLE_ADMIN\"]','$argon2id$v=19$m=65536,t=4,p=1$VzestSKzQUpCxb1fw9Ns1A$b8lfQ2vOZqg5R8ZRi8LC0J6OJMuGGPq4+QQXZPK4qH4','Катерина','Балан','1959-09-25 00:00:00','admin@example.com','Григорівна','м. Сміла, Черкаської області','Смілянський природничо-математичний ліцей, КПІ ім. Ігоря Сікорського','Бакалавр','бла бла бла','2019-09-25 14:26:40','2019-09-25 14:41:36'),(13,'teacher0','[]','$argon2id$v=19$m=65536,t=4,p=1$r/KkktAvhhaLyUycTa1Xvg$R55amSDor7FbnIEve9bdqGebenP413DLiTXNIU2x9/Y','Teacher0','Researcher0','1957-09-13 00:00:00','teacher0@example.com',NULL,NULL,NULL,'teacher',NULL,'2019-09-25 14:26:40','2019-09-26 14:43:10'),(14,'teacher1','[]','$argon2id$v=19$m=65536,t=4,p=1$ZqOfMFvsbmb4B/6WzgcsgA$dUhClb5f+88j/lJVZxgRYRuDhRPo2RxQ1SkOD+PhaMQ','Teacher1','Researcher1','1973-09-25 00:00:00','teacher1@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:40','2019-09-25 14:27:39'),(15,'teacher2','[]','$argon2id$v=19$m=65536,t=4,p=1$D06DpfYM7U/9Cf/Gjb4Jlg$OmbqQSFnejVlVBjkvedH439rL4/rtqnvHi/mmDmm7PE','Teacher2','Researcher2','1986-09-25 14:26:40','teacher2@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:41','2019-09-25 14:26:41'),(16,'teacher3','[]','$argon2id$v=19$m=65536,t=4,p=1$OY9OZziwJ+MkY+sPxrJtyg$0thyHyCZWne2xyP1VlTsElaYNUvuG9aUizqhE8GJ6Ho','Teacher3','Researcher3','1989-09-25 14:26:41','teacher3@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:41','2019-09-25 14:26:41'),(17,'teacher4','[]','$argon2id$v=19$m=65536,t=4,p=1$vHG3h06rkJfKSaIEyjHHzw$7ufveLl4CL/Dswj6AnRcvWGXAYmOCU+MaRjrBJucIK4','Teacher4','Researcher4','1958-09-25 14:26:41','teacher4@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:41','2019-09-25 14:26:41'),(18,'teacher5','[]','$argon2id$v=19$m=65536,t=4,p=1$LH9ojZLxSxNrDzLfcEko2Q$NUy9FS9dfNKR666zb8kJBaJUEF2dwhj71F5/2jdL2rQ','Teacher5','Researcher5','1949-09-25 14:26:41','teacher5@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:41','2019-09-25 14:26:41'),(19,'teacher6','[]','$argon2id$v=19$m=65536,t=4,p=1$3uf209765kqYBN1fgkxryg$gOCZa16Bjzdok/9jixk8t7QwUYlfl5b2DW8ZONgHms0','Teacher6','Researcher6','1976-09-25 14:26:41','teacher6@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:41','2019-09-25 14:26:41'),(20,'teacher7','[]','$argon2id$v=19$m=65536,t=4,p=1$lSs4NTBLJ8Ws1YpuHFqOmw$Hk/aF6zMo5YOSM7MSKb+EHVq+hNKbPI+BnFNPqRAAeA','Teacher7','Researcher7','1960-09-25 00:00:00','teacher7@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:41','2019-09-25 16:24:12'),(21,'teacher8','[]','$argon2id$v=19$m=65536,t=4,p=1$O6bO1yeuX78mpo758cqNzQ$icygv6NUWexMKYOPiNxvw1WcGpBHw/BUmdQo7BxgTgk','Teacher8','Researcher8','1956-09-25 14:26:41','teacher8@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:42','2019-09-25 14:26:42'),(22,'teacher9','[]','$argon2id$v=19$m=65536,t=4,p=1$VENVKt0Umu346fLq0JZtkQ$F2dLKKCBkFIP8ZwC8SMXIxUQrXjPMGGZ69JVyyUaC4U','Teacher9','Researcher9','1988-09-25 14:26:42','teacher9@example.com',NULL,NULL,NULL,NULL,NULL,'2019-09-25 14:26:42','2019-09-25 14:26:42');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_scientific_interest`
--

DROP TABLE IF EXISTS `user_scientific_interest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_scientific_interest` (
  `user_id` int(11) NOT NULL,
  `scientific_interest_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`scientific_interest_id`),
  KEY `IDX_D06C3303A76ED395` (`user_id`),
  KEY `IDX_D06C330363156B8C` (`scientific_interest_id`),
  CONSTRAINT `FK_D06C330363156B8C` FOREIGN KEY (`scientific_interest_id`) REFERENCES `scientific_interest` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_D06C3303A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_scientific_interest`
--

LOCK TABLES `user_scientific_interest` WRITE;
/*!40000 ALTER TABLE `user_scientific_interest` DISABLE KEYS */;
INSERT INTO `user_scientific_interest` VALUES (12,3),(12,4),(12,5),(12,6),(12,9),(13,5),(13,7),(13,12),(13,15),(13,16),(14,15),(14,22),(20,7),(20,16);
/*!40000 ALTER TABLE `user_scientific_interest` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-27 13:30:11
