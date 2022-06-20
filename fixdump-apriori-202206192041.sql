-- MySQL dump 10.13  Distrib 5.7.33, for Win64 (x86_64)
--
-- Host: localhost    Database: apriori
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `analisa_apriori`
--

DROP TABLE IF EXISTS `analisa_apriori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analisa_apriori` (
  `id` int(11) NOT NULL,
  `min_support` float NOT NULL,
  `min_confidence` float NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `analisa_apriori_FK` (`created_by`),
  CONSTRAINT `analisa_apriori_FK` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisa_apriori`
--

LOCK TABLES `analisa_apriori` WRITE;
/*!40000 ALTER TABLE `analisa_apriori` DISABLE KEYS */;
/*!40000 ALTER TABLE `analisa_apriori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `analisa_apriori_result`
--

DROP TABLE IF EXISTS `analisa_apriori_result`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analisa_apriori_result` (
  `id` int(11) NOT NULL,
  `id_analisa` int(11) NOT NULL,
  `antecedent` varchar(255) NOT NULL,
  `consequent` varchar(255) NOT NULL,
  `support` float NOT NULL,
  `confidence` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `analisa_apriori_detail_FK` (`id_analisa`),
  CONSTRAINT `analisa_apriori_detail_FK` FOREIGN KEY (`id_analisa`) REFERENCES `analisa_apriori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisa_apriori_result`
--

LOCK TABLES `analisa_apriori_result` WRITE;
/*!40000 ALTER TABLE `analisa_apriori_result` DISABLE KEYS */;
/*!40000 ALTER TABLE `analisa_apriori_result` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `analisa_apriroi_frequent`
--

DROP TABLE IF EXISTS `analisa_apriroi_frequent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `analisa_apriroi_frequent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_analisa` int(11) NOT NULL,
  `iterasi` int(11) NOT NULL,
  `item` varchar(255) NOT NULL,
  `frequency` int(11) NOT NULL,
  `support` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `analisa_apriroi_frequent_FK` (`id_analisa`),
  CONSTRAINT `analisa_apriroi_frequent_FK` FOREIGN KEY (`id_analisa`) REFERENCES `analisa_apriori` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `analisa_apriroi_frequent`
--

LOCK TABLES `analisa_apriroi_frequent` WRITE;
/*!40000 ALTER TABLE `analisa_apriroi_frequent` DISABLE KEYS */;
/*!40000 ALTER TABLE `analisa_apriroi_frequent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `groups`
--

LOCK TABLES `groups` WRITE;
/*!40000 ALTER TABLE `groups` DISABLE KEYS */;
INSERT INTO `groups` VALUES (1,'admin','Administrator'),(2,'members','General User');
/*!40000 ALTER TABLE `groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
INSERT INTO `login_attempts` VALUES (1,'::1','admin@admin.com',1655636409),(2,'::1','admin@admin.com',1655636460);
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `master_layanan`
--

DROP TABLE IF EXISTS `master_layanan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `master_layanan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `layanan` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `master_layanan`
--

LOCK TABLES `master_layanan` WRITE;
/*!40000 ALTER TABLE `master_layanan` DISABLE KEYS */;
INSERT INTO `master_layanan` VALUES (1,'Blow',15000,'2022-06-13 00:59:39',1,NULL,NULL,NULL,NULL),(2,'Cat Rambut',150000,'2022-06-13 01:01:29',1,NULL,NULL,NULL,NULL),(3,'Catok Rambut',25000,'2022-06-13 01:01:29',1,NULL,NULL,NULL,NULL),(4,'Creambath',55000,'2022-06-13 01:01:29',1,NULL,NULL,NULL,NULL),(5,'Facial',55000,'2022-06-13 01:01:29',1,NULL,NULL,NULL,NULL),(6,'Gunting',25000,'2022-06-13 01:01:29',1,NULL,NULL,NULL,NULL),(7,'Masker',55000,'2022-06-13 01:01:29',1,NULL,NULL,NULL,NULL),(8,'Smoothing',250000,'2022-06-13 01:01:29',1,NULL,NULL,NULL,NULL),(10,'Keramas',15000,'2022-06-13 01:04:01',1,'2022-06-19 05:40:30',1,'2022-06-19 05:40:30',1),(15,'Spa',50000,'2022-06-17 19:58:49',1,'2022-06-19 05:40:10',1,'2022-06-19 05:40:10',1);
/*!40000 ALTER TABLE `master_layanan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi`
--

DROP TABLE IF EXISTS `transaksi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_transaksi` varchar(32) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `no_telp` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `status` enum('0','1','9') NOT NULL DEFAULT '9' COMMENT '0 : ditolak, 1 : diterima, 9 : menunggu',
  `tanggal` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) unsigned DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `transaksi_un` (`id_transaksi`),
  KEY `transaksi_FK` (`updated_by`),
  KEY `transaksi_FK_users` (`created_by`),
  CONSTRAINT `transaksi_FK_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi`
--

LOCK TABLES `transaksi` WRITE;
/*!40000 ALTER TABLE `transaksi` DISABLE KEYS */;
INSERT INTO `transaksi` VALUES (1,'1','A','0895333536852222','apriori@apriori.com','1','2022-06-13 05:03:00','2022-06-13 01:15:08',1,NULL,NULL),(2,'2','B','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:00','2022-06-13 01:19:39',1,NULL,NULL),(3,'3','C','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:39','2022-06-13 01:19:39',1,NULL,NULL),(4,'4','D','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:39','2022-06-13 01:19:39',1,NULL,NULL),(5,'5','E','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:39','2022-06-13 01:19:39',1,NULL,NULL),(6,'6','F','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:39','2022-06-13 01:19:39',1,NULL,NULL),(7,'7','G','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:39','2022-06-13 01:19:39',1,NULL,NULL),(8,'8','H','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(9,'9','I','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(10,'10','J','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(11,'11','K','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(12,'12','L','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(13,'13','M','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(14,'14','N','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(15,'15','O','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(16,'16','P','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(17,'17','Q','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(18,'18','R','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(19,'19','S','0895333536852','apriori@apriori.com','1','2022-06-13 01:19:40','2022-06-13 01:19:40',1,NULL,NULL),(20,'20','T','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(21,'21','U','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(22,'22','V','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(23,'23','W','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(24,'24','X','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(25,'25','Y','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(26,'26','Z','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(27,'27','AA','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(28,'28','AB','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(29,'29','AC','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL),(30,'30','AD','0895333536852','apriori@apriori.com','1','2025-06-13 01:19:40','2025-06-13 01:19:40',1,NULL,NULL);
/*!40000 ALTER TABLE `transaksi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaksi_detail`
--

DROP TABLE IF EXISTS `transaksi_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaksi_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_transaksi` int(11) unsigned NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transaksi_detail_FK` (`id_transaksi`),
  KEY `transaksi_detail_FK_1` (`id_layanan`),
  CONSTRAINT `transaksi_detail_FK` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id`),
  CONSTRAINT `transaksi_detail_FK_1` FOREIGN KEY (`id_layanan`) REFERENCES `master_layanan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaksi_detail`
--

LOCK TABLES `transaksi_detail` WRITE;
/*!40000 ALTER TABLE `transaksi_detail` DISABLE KEYS */;
INSERT INTO `transaksi_detail` VALUES (36,1,10,15000,'2022-06-13 01:19:40',1,'2022-06-19 02:11:38',1,NULL,NULL),(37,1,6,25000,'2022-06-13 01:19:40',1,'2022-06-19 02:11:38',1,NULL,NULL),(38,1,4,55000,'2022-06-13 01:19:40',1,'2022-06-19 02:11:38',1,NULL,NULL),(40,2,10,15000,'2022-06-13 01:19:40',1,'2022-06-19 02:12:20',1,NULL,NULL),(41,2,6,25000,'2022-06-13 01:19:40',1,'2022-06-19 02:12:20',1,NULL,NULL),(42,2,1,15000,'2022-06-13 01:19:40',1,'2022-06-19 02:12:20',1,NULL,NULL),(43,3,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(44,3,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(45,3,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(46,4,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(47,4,4,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(48,5,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(49,5,3,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(50,5,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(51,6,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(52,6,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(53,6,1,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(54,7,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(55,7,8,250000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(56,8,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(57,8,5,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(58,9,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(59,9,4,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(60,10,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(61,10,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(62,10,1,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(63,11,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(64,11,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(65,11,1,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(66,12,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(67,12,3,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(68,12,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(69,13,3,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(70,13,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(71,14,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(72,14,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(73,14,2,150000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(74,15,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(75,15,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(76,16,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(77,16,5,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(78,17,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(79,17,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(80,17,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(81,18,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(82,18,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(83,18,2,150000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(84,19,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(85,19,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(86,19,1,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(87,20,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(88,20,4,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(89,21,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(90,21,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(91,22,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(92,22,5,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(93,23,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(94,23,2,150000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(95,23,8,250000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(96,24,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(97,24,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(98,24,2,150000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(99,25,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(100,25,3,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(101,25,7,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(102,26,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(103,26,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(104,26,4,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(105,27,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(106,27,1,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(107,28,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(108,28,1,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(109,29,10,15000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(110,29,6,25000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(111,29,4,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(112,30,4,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL),(113,30,5,55000,'2022-06-13 01:19:40',1,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `transaksi_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_email` (`email`),
  UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  UNIQUE KEY `uc_remember_selector` (`remember_selector`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'127.0.0.1','administrator','$2y$10$cN.vnGy6hSAaMH01egCfB.bNLoLg2N7x70xKBP4XBBGF2Crvic5eO','peterson@gmail.com',NULL,'',NULL,NULL,NULL,NULL,NULL,1268889823,1655636472,1,'Admin','Peterson','ADMIN','0');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_groups`
--

DROP TABLE IF EXISTS `users_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_groups`
--

LOCK TABLES `users_groups` WRITE;
/*!40000 ALTER TABLE `users_groups` DISABLE KEYS */;
INSERT INTO `users_groups` VALUES (1,1,1),(2,1,2);
/*!40000 ALTER TABLE `users_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'apriori'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-19 20:41:34
