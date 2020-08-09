-- MySQL dump 10.13  Distrib 5.7.31, for osx10.15 (x86_64)
--
-- Host: localhost    Database: progift
-- ------------------------------------------------------
-- Server version	5.7.31

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
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `imagen` text COLLATE utf8mb4_unicode_ci,
  `orden` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (4,'Viajes & Vacaciones',NULL,NULL,43,1,'2020-05-06 09:21:28','2020-05-06 09:41:56',NULL),(5,'Verano',NULL,NULL,42,1,'2020-05-06 09:21:38','2020-05-06 09:41:56',NULL),(6,'Trofeos',NULL,NULL,41,1,'2020-05-06 09:21:47','2020-05-06 09:41:54',NULL),(7,'Salud & Belleza',NULL,NULL,40,1,'2020-05-06 09:22:19','2020-05-06 09:41:52',NULL),(8,'Ropa publicitaria',NULL,NULL,39,1,'2020-05-06 09:22:30','2020-05-06 09:41:51',NULL),(9,'Relojes',NULL,NULL,38,1,'2020-05-06 09:22:39','2020-05-06 09:41:47',NULL),(10,'Radios',NULL,NULL,37,1,'2020-05-06 09:22:48','2020-05-06 09:41:45',NULL),(11,'Pendrives',NULL,NULL,36,1,'2020-05-06 09:22:55','2020-05-06 09:41:43',NULL),(12,'Paraguas',NULL,NULL,35,1,'2020-05-06 09:23:03','2020-05-06 09:41:42',NULL),(13,'Mug, Tazones & Tazas',NULL,NULL,34,1,'2020-05-06 09:23:12','2020-05-06 09:41:40',NULL),(14,'Mochilas & Bananos',NULL,NULL,33,1,'2020-05-06 09:23:22','2020-05-06 09:41:36',NULL),(15,'Mochilas',NULL,NULL,32,1,'2020-05-06 09:23:30','2020-05-06 09:41:31',NULL),(16,'Maletines',NULL,NULL,31,1,'2020-05-06 09:23:37','2020-05-06 09:41:27',NULL),(17,'Llaveros',NULL,NULL,30,1,'2020-05-06 09:23:44','2020-05-06 09:41:22',NULL),(18,'Linternas',NULL,NULL,29,1,'2020-05-06 09:23:52','2020-05-06 09:41:10',NULL),(19,'Lápices promocionales',NULL,NULL,28,1,'2020-05-06 09:24:01','2020-05-06 09:41:05',NULL),(20,'Lápices metálicos',NULL,NULL,27,1,'2020-05-06 09:24:10','2020-05-06 09:41:00',NULL),(21,'Lanyards',NULL,NULL,26,1,'2020-05-06 09:24:20','2020-05-06 09:40:55',NULL),(22,'Juegos',NULL,NULL,25,1,'2020-05-06 09:24:28','2020-05-06 09:40:50',NULL),(23,'Jockeys & Gorros',NULL,NULL,24,1,'2020-05-06 09:24:38','2020-05-06 09:40:44',NULL),(24,'Invierno',NULL,NULL,23,1,'2020-05-06 09:24:47','2020-05-06 09:34:17',NULL),(25,'Hogar & Cocina',NULL,NULL,22,1,'2020-05-06 09:24:58','2020-05-06 09:34:03',NULL),(26,'Herramientas',NULL,NULL,21,1,'2020-05-06 09:25:07','2020-05-06 09:33:53',NULL),(27,'Espejos',NULL,NULL,20,1,'2020-05-06 09:25:16','2020-05-06 09:33:39',NULL),(28,'Encendedores',NULL,NULL,19,1,'2020-05-06 09:25:24','2020-05-06 09:33:28',NULL),(29,'Dulces & Calugas',NULL,NULL,18,1,'2020-05-06 09:25:34','2020-05-06 09:33:19',NULL),(30,'Deporte',NULL,NULL,17,1,'2020-05-06 09:25:43','2020-05-06 09:33:12',NULL),(31,'Cuadernos & Libretas',NULL,NULL,16,1,'2020-05-06 09:25:52','2020-05-06 09:33:03',NULL),(32,'Copas & Vasos',NULL,NULL,15,1,'2020-05-06 09:26:02','2020-05-06 09:32:52',NULL),(33,'Computación & Tecnología',NULL,NULL,14,1,'2020-05-06 09:26:13','2020-05-06 09:32:39',NULL),(34,'Carpetas',NULL,NULL,13,1,'2020-05-06 09:26:20','2020-05-06 09:32:31',NULL),(35,'Calendarios',NULL,NULL,12,1,'2020-05-06 09:26:29','2020-05-06 09:32:13',NULL),(36,'Calculadoras',NULL,NULL,11,1,'2020-05-06 09:26:38','2020-05-06 09:32:03',NULL),(37,'Botellas & Caramayolas',NULL,NULL,10,1,'2020-05-06 09:26:46','2020-05-06 09:31:50',NULL),(38,'Bolsos',NULL,NULL,9,1,'2020-05-06 09:26:54','2020-05-06 09:31:39',NULL),(39,'Bolsas',NULL,NULL,8,1,'2020-05-06 09:27:02','2020-05-06 09:31:30',NULL),(40,'Asado',NULL,NULL,7,1,'2020-05-06 09:27:11','2020-05-06 09:31:24',NULL),(41,'Artículos vino',NULL,NULL,6,1,'2020-05-06 09:27:19','2020-05-06 09:31:18',NULL),(42,'Artículos ecológicos',NULL,NULL,5,1,'2020-05-06 09:27:29','2020-05-06 09:31:06',NULL),(43,'Artículos de escritorio',NULL,NULL,4,1,'2020-05-06 09:27:37','2020-05-06 09:30:59',NULL),(44,'Artículos bamboo',NULL,NULL,3,1,'2020-05-06 09:27:47','2020-05-06 09:30:51',NULL),(45,'Artículos auto',NULL,NULL,2,1,'2020-05-06 09:27:55','2020-05-06 09:30:46',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clients`
--

DROP TABLE IF EXISTS `clients`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clients` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(400) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentarios` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clients`
--

LOCK TABLES `clients` WRITE;
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` VALUES (8,'lkasdkjasdl','22222222-2','Matias',123456789,'caromatiasm@gmail.com','Comentario de prueba','2020-05-14 06:10:04','2020-05-14 06:10:04',NULL),(9,'2121212','11111111-1','Matias',0,'caromatiasm@gmail.com','Vía cotizador','2020-05-22 06:09:32','2020-05-22 06:09:32',NULL),(10,'lkasdkjasdl','33333333-3','Matias',0,'caromatiasm@gmail.com','Vía cotizador','2020-05-22 06:53:30','2020-05-22 06:53:30',NULL),(11,'Empresa 1','44444444-4','Matias',0,'caromatiasm@gmail.com','Vía cotizador','2020-05-22 07:14:37','2020-05-22 07:14:37',NULL),(12,'lata digital','76821455-7','Javier',950988810,'javier@latadigital.cl','qweqwe q we qwe q we qw eq we qwe','2020-06-30 07:11:40','2020-06-30 07:11:40',NULL),(13,'Pedro Digital','16742183-0','Javier +2',950988810,'javier@latadigital-2.cl','da qwe qwe q eqweqw eq weq we qwe','2020-06-30 07:18:52','2020-06-30 07:18:52',NULL),(14,'Pro-Gift','76029873-5','Christian Kolbach',0,'christian@pro-gift.cl','Vía cotizador','2020-07-06 18:32:45','2020-07-06 18:32:45',NULL),(15,'Bigbuda','76136122-8','Marcel',227925594,'marcel@bigbuda.cl','Probando','2020-07-21 17:39:09','2020-07-21 17:39:09',NULL),(16,'Bigbuda','17317167-6','Francisco Sepúlveda',0,'francisco@bigbuda.cl','Vía cotizador','2020-08-09 20:31:33','2020-08-09 20:31:33',NULL);
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `colors`
--

DROP TABLE IF EXISTS `colors`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `colors` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `color` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `colors`
--

LOCK TABLES `colors` WRITE;
/*!40000 ALTER TABLE `colors` DISABLE KEYS */;
INSERT INTO `colors` VALUES (1,'Rojo',1,'2020-05-06 08:34:07','2020-05-06 08:34:07',NULL,'#d00800'),(2,'Azul',NULL,'2020-05-06 18:30:44','2020-05-06 18:30:44',NULL,'#0010ff'),(4,'Negro',NULL,'2020-08-09 21:49:43','2020-08-09 21:49:43',NULL,NULL);
/*!40000 ALTER TABLE `colors` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `contactos`
--

DROP TABLE IF EXISTS `contactos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contactos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `empresa` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rut` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contacto` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentarios` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contactos`
--

LOCK TABLES `contactos` WRITE;
/*!40000 ALTER TABLE `contactos` DISABLE KEYS */;
INSERT INTO `contactos` VALUES (1,'lkasdkjasdl','22.222.222-2','cscscsdc',982409067,'caromatiasm@gmail.com','sdcsdcsdcd','2020-05-06 22:48:45','2020-05-06 22:48:45',NULL),(2,'lkasdkjasdl','22.222.222-2','cscscsdc',982409067,'caromatiasm@gmail.com','sdcsdcsdcd','2020-05-06 22:58:14','2020-05-06 22:58:14',NULL),(3,'lkasdkjasdl','22.222.222-2','cscscsdc',982409067,'caromatiasm@gmail.com','lksaljdlaskjdasd','2020-05-06 22:58:23','2020-05-06 22:58:23',NULL),(4,'lkasdkjasdl','22.222.222-2','cscscsdc',982409067,'caromatiasm@gmail.com','saknsam.asmd-.asdm.asd','2020-05-06 23:05:27','2020-05-06 23:05:27',NULL),(5,'lkasdkjasdl','22.222.222-2','cscscsdc',982409067,'caromatiasm@gmail.com','jjhjhj','2020-05-06 23:10:43','2020-05-06 23:10:43',NULL);
/*!40000 ALTER TABLE `contactos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cotizaciones`
--

DROP TABLE IF EXISTS `cotizaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cotizaciones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `validez` int(11) DEFAULT NULL,
  `forma_pago` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `entrega` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detalle` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `descuento` int(11) DEFAULT NULL,
  `neto` int(11) NOT NULL,
  `iva` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `estado` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pdf` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipo` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `cotizaciones_client_id_index` (`client_id`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cotizaciones`
--

LOCK TABLES `cotizaciones` WRITE;
/*!40000 ALTER TABLE `cotizaciones` DISABLE KEYS */;
INSERT INTO `cotizaciones` VALUES (244,NULL,'web','10','[{\"nombre\":\"Altavoz Viancos\",\"color\":\"default\",\"imagen\":null,\"sku\":\"0\",\"imprenta\":\"default\",\"cantidad\":\"100\",\"precio\":1450,\"iva\":275.5,\"suma\":275.5}]',0,81,19,100,1,'2020-07-01 01:25:18','2020-07-01 01:25:18',NULL,9,2,'/cotizacion/cotizacionBig buda1593552318.pdf','Web'),(245,10,'A Convenir','A Convenir','[{\"nombre\":\"Parlante Smile\",\"imagen\":null,\"sku\":\"CDO-G196\",\"color\":\"ROJO\",\"imprenta\":\"4\\/0\",\"cantidad\":[\"1000\"],\"precio\":[\"1500000\"],\"suma\":[\"1500000000\"]}]',NULL,1215000000,285000000,5,1,'2020-07-06 18:32:45','2020-07-07 03:52:04',NULL,14,2,'/cotizacion/cotizacionPro-Gift1594079524.pdf','Normal'),(246,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"0\",\"imprenta\":\"default\",\"cantidad\":\"100\",\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-07-06 22:13:24','2020-07-06 22:13:24',NULL,9,2,'/cotizacion/cotizacionlata digital1594059204.pdf','Web'),(247,10,'A convenir','A convenir','[{\"nombre\":\"Parlante Smile\",\"imagen\":\"\\/storage\\/products\\\\\\/May2020\\\\\\/K8u8vozEcj0s3k3twDHO.jpg\",\"sku\":\"CDO-G196\",\"color\":\"ROJO\",\"imprenta\":\"4\\/0\",\"cantidad\":[\"250\"],\"precio\":[\"375000\"],\"suma\":[\"93750000\"]}]',0,75939930,17813070,93753000,0,'2020-07-12 02:01:53','2020-07-12 02:01:53',NULL,14,2,'/cotizacion/Pro-Gift_Christian+Kolbach2020-07-11.pdf','Normal'),(248,10,'A convenir','A convenir','[{\"nombre\":\"Altavoz Viancos\",\"imagen\":\"\\/storage\\/products\\\\\\/May2020\\\\\\/4LB0GR0XZGjUy7CPG0op.jpg\",\"sku\":\"IBCO-602057750\",\"color\":\"TURQUESA\",\"imprenta\":\"4\\/4\",\"cantidad\":[\"100\"],\"precio\":[\"145000\"],\"suma\":[\"14500000\"]}]',0,11745000,2755000,14500000,0,'2020-07-12 02:21:05','2020-07-12 02:21:05',NULL,14,2,'/cotizacion/Pro-Gift_Christian+Kolbach2020-07-11.pdf','Normal'),(249,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"0\",\"imprenta\":\"default\",\"cantidad\":\"100\",\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-07-21 17:39:09','2020-07-21 17:39:09',NULL,15,2,'/cotizacion/cotizacionBigbuda1595338749.pdf','Web'),(250,NULL,'web','10','[{\"nombre\":\"Altavoz Viancos\",\"color\":\"default\",\"imagen\":null,\"sku\":\"0\",\"imprenta\":\"default\",\"cantidad\":\"100\",\"precio\":1450,\"iva\":275.5,\"suma\":275.5}]',0,81,19,100,1,'2020-07-21 19:57:19','2020-07-21 19:57:19',NULL,15,2,'/cotizacion/cotizacionBigbuda1595347039.pdf','Web'),(251,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:40:09','2020-08-09 23:40:09',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002009.pdf','Web'),(252,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:41:50','2020-08-09 23:41:50',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002110.pdf','Web'),(253,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:43:05','2020-08-09 23:43:05',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002184.pdf','Web'),(254,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:44:14','2020-08-09 23:44:14',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002254.pdf','Web'),(255,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:44:26','2020-08-09 23:44:26',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002266.pdf','Web'),(256,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:46:46','2020-08-09 23:46:46',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002406.pdf','Web'),(257,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:50:46','2020-08-09 23:50:46',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002646.pdf','Web'),(258,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:51:30','2020-08-09 23:51:30',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597002690.pdf','Web'),(259,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"default\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"default\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-09 23:58:17','2020-08-09 23:58:17',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597003097.pdf','Web'),(260,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:01:00','2020-08-10 00:01:00',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597003260.pdf','Web'),(261,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:01:53','2020-08-10 00:01:53',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597003313.pdf','Web'),(262,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:05:44','2020-08-10 00:05:44',NULL,16,2,'/cotizacion/cotizacionLorem ipsum1597003544.pdf','Web'),(263,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:12:45','2020-08-10 00:12:45',NULL,16,2,NULL,'Web'),(264,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:12:57','2020-08-10 00:12:57',NULL,16,2,NULL,'Web'),(265,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:13:06','2020-08-10 00:13:06',NULL,16,2,NULL,'Web'),(266,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:14:26','2020-08-10 00:14:26',NULL,16,2,NULL,'Web'),(267,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:44:13','2020-08-10 00:44:13',NULL,16,2,NULL,'Web'),(268,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:46:48','2020-08-10 00:46:48',NULL,16,2,NULL,'Web'),(269,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:47:30','2020-08-10 00:47:30',NULL,16,2,NULL,'Web'),(270,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:48:57','2020-08-10 00:48:57',NULL,16,2,NULL,'Web'),(271,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285}]',0,81,19,100,1,'2020-08-10 00:51:14','2020-08-10 00:51:14',NULL,16,2,NULL,'Web'),(272,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:01:20','2020-08-10 01:01:20',NULL,16,2,NULL,'Web'),(273,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:02:16','2020-08-10 01:02:16',NULL,16,2,NULL,'Web'),(274,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:02:31','2020-08-10 01:02:31',NULL,16,2,NULL,'Web'),(275,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:03:47','2020-08-10 01:03:47',NULL,16,2,NULL,'Web'),(276,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:13:15','2020-08-10 01:13:15',NULL,16,2,NULL,'Web'),(277,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:19:50','2020-08-10 01:19:50',NULL,16,2,NULL,'Web'),(278,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:21:29','2020-08-10 01:21:29',NULL,16,2,NULL,'Web'),(279,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:23:30','2020-08-10 01:23:30',NULL,16,2,NULL,'Web'),(280,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:27:26','2020-08-10 01:27:26',NULL,16,2,NULL,'Web'),(281,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":null,\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:30:21','2020-08-10 01:30:21',NULL,16,2,NULL,'Web'),(282,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"\\/storage\\/products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:34:00','2020-08-10 01:34:00',NULL,16,2,NULL,'Web'),(283,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"\\/storage\\/products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:34:02','2020-08-10 01:34:02',NULL,16,2,NULL,'Web'),(284,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"\\/storage\\/products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:34:14','2020-08-10 01:34:14',NULL,16,2,NULL,'Web'),(285,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"\\/storage\\/products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:34:56','2020-08-10 01:34:56',NULL,16,2,NULL,'Web'),(286,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"\\/storage\\/products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:36:03','2020-08-10 01:36:03',NULL,16,2,NULL,'Web'),(287,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"\\/storage\\/products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 01:36:27','2020-08-10 01:36:27',NULL,16,2,NULL,'Web'),(288,NULL,'web','10','[{\"nombre\":\"Parlante Smile\",\"color\":\"no especifica\",\"imagen\":\"\\/storage\\/products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"sku\":\"CDO-G196\",\"imprenta\":\"a 1 color\",\"cantidad\":100,\"precio\":1500,\"iva\":285,\"suma\":285,\"descripcion\":\"Parlante bluetooth. Siempre feliz, esta simp\\u00e1tica carita, suave al tacto y s\\u00faper liviana, es ideal para llevar m\\u00fasica donde quiera que se vaya. Pl\\u00e1stico siliconado. \\u00d8 5,8 x 6,2 cm.\",\"product_id\":2}]',0,81,19,100,1,'2020-08-10 02:19:58','2020-08-10 02:19:58',NULL,16,2,NULL,'Web');
/*!40000 ALTER TABLE `cotizaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_rows`
--

DROP TABLE IF EXISTS `data_rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `data_type_id` int(10) unsigned NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `browse` tinyint(1) NOT NULL DEFAULT '1',
  `read` tinyint(1) NOT NULL DEFAULT '1',
  `edit` tinyint(1) NOT NULL DEFAULT '1',
  `add` tinyint(1) NOT NULL DEFAULT '1',
  `delete` tinyint(1) NOT NULL DEFAULT '1',
  `details` text COLLATE utf8mb4_unicode_ci,
  `order` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `data_rows_data_type_id_foreign` (`data_type_id`),
  CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=140 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_rows`
--

LOCK TABLES `data_rows` WRITE;
/*!40000 ALTER TABLE `data_rows` DISABLE KEYS */;
INSERT INTO `data_rows` VALUES (1,1,'id','number','ID',1,0,0,0,0,0,'{}',1),(2,1,'name','text','Nombre',1,1,1,1,1,1,'{}',2),(3,1,'email','text','Email',1,1,1,1,1,1,'{}',3),(4,1,'password','password','Contraseña',1,0,0,1,1,0,'{}',5),(5,1,'remember_token','text','Remember Token',0,0,0,0,0,0,'{}',6),(6,1,'created_at','timestamp','Creado',0,1,1,0,0,0,'{}',7),(7,1,'updated_at','timestamp','Actualizado',0,0,0,0,0,0,'{}',9),(8,1,'avatar','image','Avatar',0,1,1,1,1,1,'{}',10),(9,1,'user_belongsto_role_relationship','relationship','Role',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}',12),(10,1,'user_belongstomany_role_relationship','relationship','Roles',0,1,1,1,1,0,'{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}',13),(11,1,'settings','hidden','Settings',0,0,0,0,0,0,'{}',14),(12,2,'id','number','ID',1,0,0,0,0,0,NULL,1),(13,2,'name','text','Name',1,1,1,1,1,1,NULL,2),(14,2,'created_at','timestamp','Created At',0,0,0,0,0,0,NULL,3),(15,2,'updated_at','timestamp','Updated At',0,0,0,0,0,0,NULL,4),(16,3,'id','number','ID',1,0,0,0,0,0,'{}',1),(17,3,'name','text','Nombre',1,1,1,1,1,1,'{}',2),(18,3,'created_at','timestamp','Creado',0,0,0,0,0,0,'{}',3),(19,3,'updated_at','timestamp','Actualizado',0,0,0,0,0,0,'{}',4),(20,3,'display_name','text','Nombre para mostrar',1,1,1,1,1,1,'{}',5),(21,1,'role_id','text','Rol',0,1,1,1,1,1,'{}',11),(22,4,'id','text','Id',1,0,0,0,0,0,'{}',1),(23,4,'nombre','text','Nombre',1,1,1,1,1,1,'{}',2),(24,4,'descripcion_corta','text','Descripcion Corta',1,1,1,1,1,1,'{}',3),(25,4,'descripcion_larga','text','Descripcion Larga',0,1,1,1,1,1,'{}',4),(26,4,'precio','text','Precio',1,1,1,1,1,1,'{}',5),(27,4,'estado','text','Estado',1,1,1,1,1,1,'{}',6),(28,4,'created_at','timestamp','Fecha Creación',0,1,1,1,0,1,'{}',7),(29,4,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(30,4,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',9),(31,4,'imagen','multiple_images','Imagen',0,1,1,1,1,1,'{}',10),(39,7,'id','text','Id',1,0,0,0,0,0,'{}',1),(40,7,'nombre','text','Nombre',1,1,1,1,1,1,'{}',2),(41,7,'descripcion','text_area','Descripcion',0,1,1,1,1,1,'{}',3),(42,7,'imagen','image','Imagen',0,1,1,1,1,1,'{}',4),(43,7,'orden','number','Orden',0,0,0,0,0,0,'{}',5),(44,7,'estado','checkbox','Estado',0,1,1,1,1,1,'{}',6),(45,7,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',7),(46,7,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',8),(47,7,'deleted_at','timestamp','Deleted At',0,1,1,0,0,1,'{}',9),(48,4,'product_belongstomany_category_relationship','relationship','Categories',0,1,1,1,1,1,'{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"product_category\",\"pivot\":\"1\",\"taggable\":\"on\"}',11),(58,10,'id','text','Id',1,0,0,0,0,0,'{}',1),(59,10,'titulo','text','Titulo',1,1,1,1,1,1,'{}',2),(60,10,'portada','image','Portada',1,1,1,1,1,1,'{}',3),(61,10,'contenido','rich_text_box','Contenido',1,1,1,1,1,1,'{}',4),(62,10,'estado','checkbox','Estado',0,1,1,1,1,1,'{}',5),(63,10,'created_at','timestamp','Created At',0,1,1,0,0,1,'{}',6),(64,10,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',7),(65,10,'deleted_at','timestamp','Deleted At',0,0,1,0,0,1,'{}',8),(66,11,'id','text','Id',1,0,0,0,0,0,'{}',1),(67,11,'nombre','text','Nombre',1,1,1,1,1,1,'{}',2),(68,11,'orden','number','Orden',0,0,0,0,0,0,'{}',3),(69,11,'created_at','timestamp','Created At',0,1,1,1,0,1,'{}',4),(70,11,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(71,11,'deleted_at','timestamp','Deleted At',0,1,1,0,0,0,'{}',6),(72,11,'color','color','Color',1,1,1,1,1,1,'{}',7),(73,4,'product_belongstomany_color_relationship','relationship','Colores',0,1,1,1,1,1,'{\"model\":\"App\\\\Color\",\"table\":\"colors\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"product_color\",\"pivot\":\"1\",\"taggable\":\"on\"}',13),(74,14,'id','text','Id',1,0,0,0,0,0,'{}',1),(75,14,'nombre','text','Nombre',1,1,1,1,1,1,'{}',2),(76,14,'orden','hidden','Orden',0,0,0,0,0,0,'{}',3),(77,14,'created_at','timestamp','Creado',0,1,1,1,0,1,'{}',4),(78,14,'updated_at','timestamp','Actualizado',0,0,0,0,0,0,'{}',5),(79,14,'deleted_at','timestamp','Borrado',0,0,1,0,0,0,'{}',6),(81,4,'product_belongstomany_impresion_relationship','relationship','Impresiones',0,1,1,1,1,1,'{\"model\":\"App\\\\Impresion\",\"table\":\"impresions\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"product_impresion\",\"pivot\":\"1\",\"taggable\":\"on\"}',14),(82,4,'sku','text','Sku',1,1,1,1,1,1,'{}',12),(84,10,'slug','text','Slug',1,1,1,1,1,1,'{}',9),(85,15,'id','text','Id',1,0,0,0,0,0,'{}',1),(86,15,'empresa','text','Empresa',1,1,1,1,1,1,'{}',2),(87,15,'rut','text','Rut',1,1,1,1,1,1,'{}',3),(88,15,'contacto','text','Contacto',1,1,1,1,1,1,'{}',4),(89,15,'telefono','number','Telefono',1,1,1,1,1,1,'{}',5),(90,15,'email','text','Email',1,1,1,1,1,1,'{}',6),(91,15,'comentarios','text_area','Comentarios',1,1,1,1,1,1,'{}',7),(92,15,'created_at','timestamp','Creado',0,1,1,0,0,1,'{}',8),(93,15,'updated_at','timestamp','Actualizado',0,0,0,0,0,0,'{}',9),(94,15,'deleted_at','timestamp','Borrado',0,0,0,0,0,1,'{}',10),(95,16,'id','text','Id',1,0,0,0,0,0,'{}',1),(96,16,'email','text','Email',1,1,1,1,1,1,'{}',2),(97,16,'estado','checkbox','Estado',1,1,1,1,1,1,'{}',3),(98,16,'created_at','timestamp','Inscrito',0,1,1,0,0,1,'{}',4),(99,16,'updated_at','timestamp','Updated At',0,0,0,0,0,0,'{}',5),(100,16,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',6),(101,17,'id','text','Id',1,0,0,0,0,0,'{}',1),(103,17,'validez','number','Validez',0,0,1,1,1,1,'{}',2),(105,17,'forma_pago','text','Forma Pago',1,0,1,1,1,1,'{}',3),(107,17,'entrega','text','Entrega',1,0,1,1,1,1,'{}',4),(108,17,'detalle','text','Detalle',1,0,1,1,1,1,'{}',5),(109,17,'descuento','number','Descuento',0,0,1,1,1,1,'{}',6),(110,17,'neto','number','Neto',1,0,1,1,1,1,'{}',7),(111,17,'iva','number','Iva',1,0,1,1,1,1,'{}',8),(112,17,'total','number','Total',1,0,1,1,1,1,'{}',9),(113,17,'estado','checkbox','Estado',0,1,1,1,1,1,'{}',12),(114,17,'created_at','timestamp','Fecha',0,1,1,0,0,1,'{}',11),(115,17,'updated_at','timestamp','Updated At',0,0,1,0,0,0,'{}',14),(116,17,'deleted_at','timestamp','Deleted At',0,0,0,0,0,0,'{}',16),(117,4,'destacado','checkbox','Destacado',0,1,1,1,1,1,'{}',15),(118,18,'id','text','Id',1,0,0,0,0,0,'{}',1),(119,18,'nombre','text','Nombre',1,1,1,1,1,1,'{}',2),(120,18,'rut','text','Rut',1,1,1,1,1,1,'{}',3),(121,18,'contacto','text','Contacto',0,1,1,1,1,1,'{}',4),(122,18,'telefono','number','Telefono',1,1,1,1,1,1,'{}',5),(123,18,'email','text','Email',1,1,1,1,1,1,'{}',6),(124,18,'comentarios','text_area','Comentarios',0,1,1,1,1,1,'{}',7),(125,18,'created_at','timestamp','Creado',0,1,1,0,0,0,'{}',8),(126,18,'updated_at','timestamp','Actualizado',0,0,0,0,0,0,'{}',9),(127,18,'deleted_at','timestamp','Borrado',0,0,0,0,0,0,'{}',10),(128,17,'cotizacione_belongsto_client_relationship','relationship','Empresa',0,1,1,1,1,1,'{\"model\":\"App\\\\Client\",\"table\":\"clients\",\"type\":\"belongsTo\",\"column\":\"client_id\",\"key\":\"id\",\"label\":\"nombre\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}',10),(129,17,'client_id','text','Client Id',1,0,1,1,1,1,'{}',13),(130,17,'user_id','text','User Id',1,0,1,1,1,1,'{}',15),(131,17,'pdf','text','Pdf',0,0,1,0,0,0,'{}',17),(132,1,'email_verified_at','timestamp','Email verificado',0,1,1,1,1,1,'{}',8),(133,19,'id','number','Id',1,0,0,0,0,0,'{}',1),(134,19,'rut','text','Rut',1,1,1,1,1,1,'{}',2),(135,19,'vendedor','text','Vendedor',1,1,1,1,1,1,'{}',3),(136,19,'estado','checkbox','Estado',1,1,1,1,1,1,'{}',4),(137,19,'procedencia','select_dropdown','Procedencia',1,1,1,1,1,1,'{\"default\":\"option1\",\"options\":{\"option1\":\"Panel\"}}',5),(138,17,'tipo','text','Tipo',1,1,1,1,1,1,'{}',18),(139,1,'phone','text','Teléfono',1,1,1,1,1,1,'{}',4);
/*!40000 ALTER TABLE `data_rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_types`
--

DROP TABLE IF EXISTS `data_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT '0',
  `server_side` tinyint(4) NOT NULL DEFAULT '0',
  `details` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `data_types_name_unique` (`name`),
  UNIQUE KEY `data_types_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_types`
--

LOCK TABLES `data_types` WRITE;
/*!40000 ALTER TABLE `data_types` DISABLE KEYS */;
INSERT INTO `data_types` VALUES (1,'users','users','User','Users','voyager-person','TCG\\Voyager\\Models\\User','TCG\\Voyager\\Policies\\UserPolicy','TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',NULL,1,1,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-05-06 06:01:17','2020-08-09 20:12:54'),(2,'menus','menus','Menu','Menus','voyager-list','TCG\\Voyager\\Models\\Menu',NULL,'','',1,0,NULL,'2020-05-06 06:01:17','2020-05-06 06:01:17'),(3,'roles','roles','Role','Roles','voyager-lock','TCG\\Voyager\\Models\\Role',NULL,'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController',NULL,1,0,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-05-06 06:01:17','2020-06-10 23:43:12'),(4,'Products','products','Producto','Productos','voyager-list','App\\Product',NULL,NULL,NULL,1,1,'{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"asc\",\"default_search_key\":\"nombre\",\"scope\":null}','2020-05-06 06:20:50','2020-08-09 21:45:00'),(7,'Categories','categories','Category','Categories','voyager-categories','App\\Category',NULL,NULL,NULL,1,1,'{\"order_column\":\"orden\",\"order_display_column\":\"nombre\",\"order_direction\":\"asc\",\"default_search_key\":\"nombre\",\"scope\":null}','2020-05-06 06:46:32','2020-05-12 00:43:02'),(10,'Tips','tips','Tip','Tips','voyager-news','App\\Tip',NULL,NULL,NULL,1,1,'{\"order_column\":\"id\",\"order_display_column\":\"titulo\",\"order_direction\":\"asc\",\"default_search_key\":\"titulo\",\"scope\":null}','2020-05-06 07:52:20','2020-05-06 20:57:24'),(11,'Colors','colors','Color','Colors','voyager-thumb-tack','App\\Color',NULL,NULL,NULL,1,1,'{\"order_column\":\"id\",\"order_display_column\":\"id\",\"order_direction\":\"desc\",\"default_search_key\":\"nombre\",\"scope\":null}','2020-05-06 08:00:22','2020-05-12 00:43:16'),(14,'impresions','impresions','Impresion','Impresions',NULL,'App\\Impresion',NULL,NULL,NULL,1,1,'{\"order_column\":\"orden\",\"order_display_column\":\"nombre\",\"order_direction\":\"asc\",\"default_search_key\":\"nombre\",\"scope\":null}','2020-05-06 08:21:21','2020-06-10 23:47:32'),(15,'contactos','contactos','Contacto','Contactos',NULL,'App\\Contacto',NULL,NULL,NULL,1,1,'{\"order_column\":\"id\",\"order_display_column\":\"empresa\",\"order_direction\":\"asc\",\"default_search_key\":\"empresa\",\"scope\":null}','2020-05-06 21:59:07','2020-06-10 23:42:01'),(16,'newsletters','newsletters','Newsletter','Newsletters',NULL,'App\\Newsletter',NULL,NULL,NULL,1,1,'{\"order_column\":\"id\",\"order_display_column\":\"email\",\"order_direction\":\"asc\",\"default_search_key\":\"email\",\"scope\":null}','2020-05-07 00:24:43','2020-06-10 23:40:53'),(17,'cotizaciones','cotizaciones','Cotizacione','Cotizaciones','ni ni-money-coins text-primary','App\\Cotizacione',NULL,'App\\Http\\Controllers\\CotizacionesController',NULL,1,1,'{\"order_column\":\"id\",\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}','2020-05-11 05:29:19','2020-08-09 21:09:55'),(18,'clients','clients','Cliente','Clientes','voyager-people text-orange','App\\Client',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":\"nombre\"}','2020-05-14 04:53:29','2020-05-14 04:53:29'),(19,'match_ruts','match-ruts','Match Rut','Match Ruts',NULL,'App\\MatchRut',NULL,NULL,NULL,1,1,'{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":\"rut\"}','2020-06-30 02:16:40','2020-06-30 02:16:40');
/*!40000 ALTER TABLE `data_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `impresions`
--

DROP TABLE IF EXISTS `impresions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `impresions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `impresions`
--

LOCK TABLES `impresions` WRITE;
/*!40000 ALTER TABLE `impresions` DISABLE KEYS */;
INSERT INTO `impresions` VALUES (1,'a 1 color',NULL,'2020-05-06 08:33:00','2020-08-09 21:13:28',NULL),(2,'a 2 colores',NULL,'2020-08-09 21:13:37','2020-08-09 21:13:37',NULL),(3,'a 3 colores',NULL,'2020-08-09 21:13:50','2020-08-09 21:13:50',NULL),(4,'a 4 colores',NULL,'2020-08-09 21:14:00','2020-08-09 21:14:00',NULL),(5,'láser',NULL,'2020-08-09 21:14:24','2020-08-09 21:14:24',NULL),(6,'grabado',NULL,'2020-08-09 21:14:31','2020-08-09 21:14:31',NULL);
/*!40000 ALTER TABLE `impresions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `match_ruts`
--

DROP TABLE IF EXISTS `match_ruts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `match_ruts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rut` varchar(50) NOT NULL,
  `vendedor` varchar(200) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `procedencia` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `match_ruts`
--

LOCK TABLES `match_ruts` WRITE;
/*!40000 ALTER TABLE `match_ruts` DISABLE KEYS */;
INSERT INTO `match_ruts` VALUES (37,'22222222-1','email@email.com',1,'importador',NULL,NULL),(38,'22222222-2','email-2@email.com',1,'importador',NULL,NULL),(39,'22222222-3','email-3@email.com',1,'importador',NULL,NULL),(40,'22222222-4','email@email.com',1,'importador',NULL,NULL),(41,'23222222-5','email-2@email.com',1,'importador',NULL,NULL),(42,'11111111-1','javier+vendedor1@latadigital.cl',1,'importador',NULL,NULL),(43,'33333333-3','javier+vendedor2@latadigital.cl',1,'importador',NULL,NULL),(44,'78192190-4','paola@pro-gift.cl',1,'importador',NULL,NULL),(45,'76011769-2','paola@pro-gift.cl',1,'importador',NULL,NULL),(46,'77572950-3','paola@pro-gift.cl',1,'importador',NULL,NULL),(47,'76334890-3','paola@pro-gift.cl',1,'importador',NULL,NULL),(48,'78991830-9','paola@pro-gift.cl',1,'importador',NULL,NULL),(49,'76136122-8','javier+vendedor1@latadigital.cl',1,'Web',NULL,NULL),(50,'17317167-6','francisco.sepulveda30@gmail.com',1,'Web',NULL,NULL);
/*!40000 ALTER TABLE `match_ruts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_items` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `menu_items_menu_id_foreign` (`menu_id`),
  CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_items`
--

LOCK TABLES `menu_items` WRITE;
/*!40000 ALTER TABLE `menu_items` DISABLE KEYS */;
INSERT INTO `menu_items` VALUES (1,1,'Estadísticas','','_self','ni ni-tv-2 text-primary','#000000',NULL,1,'2020-05-06 06:01:17','2020-07-10 05:50:49','voyager.dashboard','null'),(2,1,'Media','','_self','voyager-images text-primary','#000000',NULL,14,'2020-05-06 06:01:17','2020-06-30 02:07:40','voyager.media.index','null'),(3,1,'Usuarios','','_self','ni ni-circle-08 text-pink','#000000',NULL,12,'2020-05-06 06:01:17','2020-05-14 22:05:57','voyager.users.index','null'),(4,1,'Roles','','_self','voyager-lock text-yellow','#000000',NULL,11,'2020-05-06 06:01:17','2020-05-14 22:05:57','voyager.roles.index','null'),(6,1,'Menu Builder','','_self','voyager-list',NULL,33,1,'2020-05-06 06:01:17','2020-05-06 06:29:27','voyager.menus.index',NULL),(7,1,'Database','','_self','voyager-data',NULL,33,2,'2020-05-06 06:01:17','2020-05-06 06:29:27','voyager.database.index',NULL),(8,1,'Compass','','_self','voyager-compass',NULL,33,3,'2020-05-06 06:01:17','2020-05-06 06:29:27','voyager.compass.index',NULL),(9,1,'BREAD','','_self','voyager-bread',NULL,33,4,'2020-05-06 06:01:17','2020-05-06 06:29:27','voyager.bread.index',NULL),(11,1,'Hooks','','_self','voyager-hook',NULL,33,5,'2020-05-06 06:01:18','2020-05-06 06:29:27','voyager.hooks',NULL),(12,1,'Productos','','_self','ni ni-cart text-yellow','#000000',NULL,3,'2020-05-06 06:20:50','2020-05-10 07:16:54','voyager.products.index','null'),(14,1,'Categorías','','_self','voyager-categories text-orange','#000000',NULL,2,'2020-05-06 06:46:32','2020-05-10 07:18:40','voyager.categories.index','null'),(16,1,'Tips','','_self','ni ni-tag text-orange','#000000',NULL,6,'2020-05-06 07:52:20','2020-05-14 22:05:57','voyager.tips.index','null'),(17,1,'Colores','','_self','voyager-thumb-tack text-primary','#000000',NULL,7,'2020-05-06 08:00:23','2020-05-14 22:05:57','voyager.colors.index','null'),(19,1,'Impresión','','_self','voyager-documentation text-yellow','#000000',NULL,8,'2020-05-06 08:21:21','2020-05-14 22:05:57','voyager.impresions.index','null'),(20,1,'Contactos','','_self','voyager-list text-red','#000000',NULL,9,'2020-05-06 21:59:07','2020-05-14 22:05:57','voyager.contactos.index','null'),(21,1,'Newsletters','','_self','voyager-new text-orange','#000000',NULL,10,'2020-05-07 00:24:44','2020-05-14 22:05:57','voyager.newsletters.index','null'),(22,1,'Nueva Cotización','/admin/cotizador','_self','ni ni-money-coins text-primary','#000000',23,1,'2020-05-07 01:13:24','2020-07-10 07:28:32',NULL,''),(23,1,'Cotizaciones','#','_self','ni ni-money-coins text-primary','#000000',NULL,4,'2020-05-11 05:29:20','2020-05-14 22:06:00',NULL,''),(24,1,'Histórico Cotizaciones','','_self','ni ni-money-coins text-primary','#000000',23,2,'2020-05-12 00:28:48','2020-07-10 07:28:20','voyager.cotizaciones.index','null'),(25,1,'Clientes','','_self','voyager-people text-orange',NULL,NULL,5,'2020-05-14 04:53:29','2020-05-14 22:06:00','voyager.clients.index',NULL),(26,1,'Importar','/admin/import','_self','voyager-list-add text-yellow','#000000',27,1,'2020-06-30 02:04:35','2020-06-30 02:07:55',NULL,''),(27,1,'Importador','','_self','voyager-file-text text-yellow','#000000',NULL,13,'2020-06-30 02:07:12','2020-06-30 02:07:20',NULL,''),(28,1,'Match Ruts','','_self','voyager-list text-yellow','#000000',27,2,'2020-06-30 02:16:41','2020-06-30 02:17:29','voyager.match-ruts.index','null'),(29,2,'Estadísticas','','_self','ni ni-tv-2 text-primary','#000000',NULL,1,'2020-07-10 07:05:00','2020-07-10 07:07:48','voyager.dashboard','null'),(30,2,'Cotizaciones','#','_self','ni ni-money-coins text-primary','#000000',NULL,2,'2020-07-10 07:05:30','2020-07-10 07:07:48',NULL,''),(31,2,'Histórico Cotizaciones','','_self','ni ni-money-coins text-primary','#000000',30,2,'2020-07-10 07:06:21','2020-07-10 07:07:52','voyager.cotizaciones.index','null'),(32,2,'Nueva Cotización','/admin/cotizador','_self','ni ni-money-coins text-primary','#000000',30,1,'2020-07-10 07:07:12','2020-07-10 07:07:50',NULL,''),(33,1,'Avanzado','#','_self','voyager-kraken',NULL,NULL,50,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `menu_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menus` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `menus_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
INSERT INTO `menus` VALUES (1,'admin','2020-05-06 06:01:17','2020-05-06 06:01:17'),(2,'vendedor','2020-07-10 07:03:10','2020-07-10 07:03:10');
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2016_01_01_000000_add_voyager_user_fields',1),(4,'2016_01_01_000000_create_data_types_table',1),(5,'2016_05_19_173453_create_menu_table',1),(6,'2016_10_21_190000_create_roles_table',1),(7,'2016_10_21_190000_create_settings_table',1),(8,'2016_11_30_135954_create_permission_table',1),(9,'2016_11_30_141208_create_permission_role_table',1),(10,'2016_12_26_201236_data_types__add__server_side',1),(11,'2017_01_13_000000_add_route_to_menu_items_table',1),(12,'2017_01_14_005015_create_translations_table',1),(13,'2017_01_15_000000_make_table_name_nullable_in_permissions_table',1),(14,'2017_03_06_000000_add_controller_to_data_types_table',1),(15,'2017_04_21_000000_add_order_to_data_rows_table',1),(16,'2017_07_05_210000_add_policyname_to_data_types_table',1),(17,'2017_08_05_000000_add_group_to_settings_table',1),(18,'2017_11_26_013050_add_user_role_relationship',1),(19,'2017_11_26_015000_create_user_roles_table',1),(20,'2018_03_11_000000_add_user_settings',1),(21,'2018_03_14_000000_add_details_to_data_types_table',1),(22,'2018_03_16_000000_make_settings_value_nullable',1),(24,'2019_08_19_000000_create_failed_jobs_table',2),(25,'2020_08_09_151406_add_phone_to_users_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `newsletters`
--

DROP TABLE IF EXISTS `newsletters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `newsletters` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `newsletters`
--

LOCK TABLES `newsletters` WRITE;
/*!40000 ALTER TABLE `newsletters` DISABLE KEYS */;
INSERT INTO `newsletters` VALUES (1,'caromatiasm@gmail.com',1,'2020-05-11 17:36:34','2020-05-11 17:36:34',NULL),(2,'caromatiasm@gmail.com',1,'2020-05-11 17:41:05','2020-05-11 17:41:05',NULL),(3,'caromatiasm@gmail.com',1,'2020-06-01 06:41:58','2020-06-01 06:41:58',NULL),(4,'javier@latadigital.cl',1,'2020-07-06 22:12:47','2020-07-06 22:12:47',NULL);
/*!40000 ALTER TABLE `newsletters` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `permission_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_permission_id_index` (`permission_id`),
  KEY `permission_role_role_id_index` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (1,1),(1,2),(2,1),(3,1),(4,1),(5,1),(6,1),(7,1),(8,1),(9,1),(10,1),(11,1),(12,1),(13,1),(14,1),(15,1),(16,1),(17,1),(18,1),(19,1),(20,1),(21,1),(22,1),(23,1),(24,1),(25,1),(26,1),(27,1),(28,1),(29,1),(30,1),(31,1),(37,1),(38,1),(39,1),(40,1),(41,1),(47,1),(48,1),(49,1),(50,1),(51,1),(52,1),(53,1),(54,1),(55,1),(56,1),(62,1),(63,1),(64,1),(65,1),(66,1),(67,1),(68,1),(69,1),(70,1),(71,1),(72,1),(73,1),(74,1),(75,1),(76,1),(77,1),(77,2),(78,1),(78,2),(79,1),(79,2),(80,1),(80,2),(81,1),(81,2),(82,1),(83,1),(84,1),(85,1),(86,1),(87,1),(88,1),(89,1),(90,1),(91,1);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permissions_key_index` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'browse_admin',NULL,'2020-05-06 06:01:17','2020-05-06 06:01:17'),(2,'browse_bread',NULL,'2020-05-06 06:01:17','2020-05-06 06:01:17'),(3,'browse_database',NULL,'2020-05-06 06:01:17','2020-05-06 06:01:17'),(4,'browse_media',NULL,'2020-05-06 06:01:17','2020-05-06 06:01:17'),(5,'browse_compass',NULL,'2020-05-06 06:01:17','2020-05-06 06:01:17'),(6,'browse_menus','menus','2020-05-06 06:01:17','2020-05-06 06:01:17'),(7,'read_menus','menus','2020-05-06 06:01:17','2020-05-06 06:01:17'),(8,'edit_menus','menus','2020-05-06 06:01:17','2020-05-06 06:01:17'),(9,'add_menus','menus','2020-05-06 06:01:17','2020-05-06 06:01:17'),(10,'delete_menus','menus','2020-05-06 06:01:17','2020-05-06 06:01:17'),(11,'browse_roles','roles','2020-05-06 06:01:17','2020-05-06 06:01:17'),(12,'read_roles','roles','2020-05-06 06:01:17','2020-05-06 06:01:17'),(13,'edit_roles','roles','2020-05-06 06:01:17','2020-05-06 06:01:17'),(14,'add_roles','roles','2020-05-06 06:01:17','2020-05-06 06:01:17'),(15,'delete_roles','roles','2020-05-06 06:01:17','2020-05-06 06:01:17'),(16,'browse_users','users','2020-05-06 06:01:17','2020-05-06 06:01:17'),(17,'read_users','users','2020-05-06 06:01:17','2020-05-06 06:01:17'),(18,'edit_users','users','2020-05-06 06:01:17','2020-05-06 06:01:17'),(19,'add_users','users','2020-05-06 06:01:17','2020-05-06 06:01:17'),(20,'delete_users','users','2020-05-06 06:01:17','2020-05-06 06:01:17'),(21,'browse_settings','settings','2020-05-06 06:01:18','2020-05-06 06:01:18'),(22,'read_settings','settings','2020-05-06 06:01:18','2020-05-06 06:01:18'),(23,'edit_settings','settings','2020-05-06 06:01:18','2020-05-06 06:01:18'),(24,'add_settings','settings','2020-05-06 06:01:18','2020-05-06 06:01:18'),(25,'delete_settings','settings','2020-05-06 06:01:18','2020-05-06 06:01:18'),(26,'browse_hooks',NULL,'2020-05-06 06:01:18','2020-05-06 06:01:18'),(27,'browse_Products','Products','2020-05-06 06:20:50','2020-05-06 06:20:50'),(28,'read_Products','Products','2020-05-06 06:20:50','2020-05-06 06:20:50'),(29,'edit_Products','Products','2020-05-06 06:20:50','2020-05-06 06:20:50'),(30,'add_Products','Products','2020-05-06 06:20:50','2020-05-06 06:20:50'),(31,'delete_Products','Products','2020-05-06 06:20:50','2020-05-06 06:20:50'),(37,'browse_Categories','Categories','2020-05-06 06:46:32','2020-05-06 06:46:32'),(38,'read_Categories','Categories','2020-05-06 06:46:32','2020-05-06 06:46:32'),(39,'edit_Categories','Categories','2020-05-06 06:46:32','2020-05-06 06:46:32'),(40,'add_Categories','Categories','2020-05-06 06:46:32','2020-05-06 06:46:32'),(41,'delete_Categories','Categories','2020-05-06 06:46:32','2020-05-06 06:46:32'),(47,'browse_Tips','Tips','2020-05-06 07:52:20','2020-05-06 07:52:20'),(48,'read_Tips','Tips','2020-05-06 07:52:20','2020-05-06 07:52:20'),(49,'edit_Tips','Tips','2020-05-06 07:52:20','2020-05-06 07:52:20'),(50,'add_Tips','Tips','2020-05-06 07:52:20','2020-05-06 07:52:20'),(51,'delete_Tips','Tips','2020-05-06 07:52:20','2020-05-06 07:52:20'),(52,'browse_Colors','Colors','2020-05-06 08:00:23','2020-05-06 08:00:23'),(53,'read_Colors','Colors','2020-05-06 08:00:23','2020-05-06 08:00:23'),(54,'edit_Colors','Colors','2020-05-06 08:00:23','2020-05-06 08:00:23'),(55,'add_Colors','Colors','2020-05-06 08:00:23','2020-05-06 08:00:23'),(56,'delete_Colors','Colors','2020-05-06 08:00:23','2020-05-06 08:00:23'),(62,'browse_impresions','impresions','2020-05-06 08:21:21','2020-05-06 08:21:21'),(63,'read_impresions','impresions','2020-05-06 08:21:21','2020-05-06 08:21:21'),(64,'edit_impresions','impresions','2020-05-06 08:21:21','2020-05-06 08:21:21'),(65,'add_impresions','impresions','2020-05-06 08:21:21','2020-05-06 08:21:21'),(66,'delete_impresions','impresions','2020-05-06 08:21:21','2020-05-06 08:21:21'),(67,'browse_contactos','contactos','2020-05-06 21:59:07','2020-05-06 21:59:07'),(68,'read_contactos','contactos','2020-05-06 21:59:07','2020-05-06 21:59:07'),(69,'edit_contactos','contactos','2020-05-06 21:59:07','2020-05-06 21:59:07'),(70,'add_contactos','contactos','2020-05-06 21:59:07','2020-05-06 21:59:07'),(71,'delete_contactos','contactos','2020-05-06 21:59:07','2020-05-06 21:59:07'),(72,'browse_newsletters','newsletters','2020-05-07 00:24:43','2020-05-07 00:24:43'),(73,'read_newsletters','newsletters','2020-05-07 00:24:43','2020-05-07 00:24:43'),(74,'edit_newsletters','newsletters','2020-05-07 00:24:43','2020-05-07 00:24:43'),(75,'add_newsletters','newsletters','2020-05-07 00:24:43','2020-05-07 00:24:43'),(76,'delete_newsletters','newsletters','2020-05-07 00:24:43','2020-05-07 00:24:43'),(77,'browse_cotizaciones','cotizaciones','2020-05-11 05:29:20','2020-05-11 05:29:20'),(78,'read_cotizaciones','cotizaciones','2020-05-11 05:29:20','2020-05-11 05:29:20'),(79,'edit_cotizaciones','cotizaciones','2020-05-11 05:29:20','2020-05-11 05:29:20'),(80,'add_cotizaciones','cotizaciones','2020-05-11 05:29:20','2020-05-11 05:29:20'),(81,'delete_cotizaciones','cotizaciones','2020-05-11 05:29:20','2020-05-11 05:29:20'),(82,'browse_clients','clients','2020-05-14 04:53:29','2020-05-14 04:53:29'),(83,'read_clients','clients','2020-05-14 04:53:29','2020-05-14 04:53:29'),(84,'edit_clients','clients','2020-05-14 04:53:29','2020-05-14 04:53:29'),(85,'add_clients','clients','2020-05-14 04:53:29','2020-05-14 04:53:29'),(86,'delete_clients','clients','2020-05-14 04:53:29','2020-05-14 04:53:29'),(87,'browse_match_ruts','match_ruts','2020-06-30 02:16:40','2020-06-30 02:16:40'),(88,'read_match_ruts','match_ruts','2020-06-30 02:16:40','2020-06-30 02:16:40'),(89,'edit_match_ruts','match_ruts','2020-06-30 02:16:40','2020-06-30 02:16:40'),(90,'add_match_ruts','match_ruts','2020-06-30 02:16:41','2020-06-30 02:16:41'),(91,'delete_match_ruts','match_ruts','2020-06-30 02:16:41','2020-06-30 02:16:41');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_category`
--

DROP TABLE IF EXISTS `product_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_category` (
  `product_id` bigint(20) unsigned NOT NULL,
  `category_id` bigint(20) unsigned NOT NULL,
  KEY `product_category_id_product_index` (`product_id`),
  KEY `product_category_id_category_index` (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_category`
--

LOCK TABLES `product_category` WRITE;
/*!40000 ALTER TABLE `product_category` DISABLE KEYS */;
INSERT INTO `product_category` VALUES (1,1),(1,2),(3,46),(2,33);
/*!40000 ALTER TABLE `product_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_color`
--

DROP TABLE IF EXISTS `product_color`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_color` (
  `product_id` int(10) unsigned NOT NULL,
  `color_id` int(10) unsigned NOT NULL,
  KEY `product_color_product_id_index` (`product_id`),
  KEY `product_color_color_id_index` (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_color`
--

LOCK TABLES `product_color` WRITE;
/*!40000 ALTER TABLE `product_color` DISABLE KEYS */;
INSERT INTO `product_color` VALUES (1,1),(2,1),(3,1),(2,2);
/*!40000 ALTER TABLE `product_color` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_impresion`
--

DROP TABLE IF EXISTS `product_impresion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_impresion` (
  `product_id` int(10) unsigned NOT NULL,
  `impresion_id` int(10) unsigned NOT NULL,
  KEY `product_impresion_product_id_index` (`product_id`),
  KEY `product_impresion_impresion_id_index` (`impresion_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_impresion`
--

LOCK TABLES `product_impresion` WRITE;
/*!40000 ALTER TABLE `product_impresion` DISABLE KEYS */;
INSERT INTO `product_impresion` VALUES (1,1),(2,1),(3,1);
/*!40000 ALTER TABLE `product_impresion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_corta` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_larga` text COLLATE utf8mb4_unicode_ci,
  `precio` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `imagen` text COLLATE utf8mb4_unicode_ci,
  `sku` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `destacado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (2,'Parlante Smile','sdsd','Parlante bluetooth. Siempre feliz, esta simpática carita, suave al tacto y súper liviana, es ideal para llevar música donde quiera que se vaya. Plástico siliconado. Ø 5,8 x 6,2 cm.',1500,1,'2020-05-06 09:47:00','2020-08-09 21:23:02',NULL,'[\"products\\/August2020\\/ZEDzXycZ09CQWw4sXUN7.jpg\",\"products\\/August2020\\/yMsY9vtOafxmr5VFwO1n.jpg\",\"products\\/August2020\\/kmom6F43vel3Tk7isYhT.jpg\",\"products\\/August2020\\/C80monmlMiACCIvMwLN2.jpg\",\"products\\/August2020\\/Cewxuw28x7ybaDNPHSpu.jpg\"]','CDO-G196',1),(3,'Altavoz Viancos','sdsd','Con conexión bluetooth, diseñado para marcaje en láser y así iluminar el logotipo marcado. Con conexión bluetooth 3.0, 3W de potencia, función de manos libres, ranura para tarjetas micro SD de hasta 32 GB, función radio FM, entrada auxiliar mediante conexión jack de 3,5mm y soportes de goma antideslizantes en la base. Compatible con iOS y Android, incluye cable de carga mini USB, cable auxiliar jack de 3,5mm. Color Negro y Azul',1450,1,'2020-05-06 09:58:00','2020-08-09 21:23:50',NULL,'[\"products\\/August2020\\/ZaAMJc9nV6zjwKJSkKiJ.jpg\"]','IBCO-602057750',1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'admin','Administrator','2020-05-06 06:01:17','2020-05-06 06:01:17'),(2,'vendedor','Vendedor','2020-05-06 06:01:17','2020-06-30 05:42:16');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `details` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '1',
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'site.title','Site Title','Progift','','text',1,'Site'),(2,'site.description','Site Description','Progift','','text',2,'Site'),(3,'site.logo','Site Logo','settings/August2020/lUU0NDJd7YdNDayZgzTJ.png','','image',3,'Site'),(4,'site.google_analytics_tracking_id','Google Analytics Tracking ID',NULL,'','text',4,'Site'),(5,'admin.bg_image','Admin Background Image','','','image',5,'Admin'),(6,'admin.title','Admin Title','Progift','','text',1,'Admin'),(7,'admin.description','Admin Description','Progift','','text',2,'Admin'),(8,'admin.loader','Admin Loader','settings/August2020/ldCmA04V1n06Jp5KoMIR.png','','image',3,'Admin'),(9,'admin.icon_image','Admin Icon Image','settings/August2020/JkwAGVpUW3YtGKdKkYlJ.png','','image',4,'Admin'),(10,'admin.google_analytics_client_id','Google Analytics Client ID (used for admin dashboard)',NULL,'','text',1,'Admin');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tips`
--

DROP TABLE IF EXISTS `tips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tips` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(400) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portada` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(450) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tips`
--

LOCK TABLES `tips` WRITE;
/*!40000 ALTER TABLE `tips` DISABLE KEYS */;
INSERT INTO `tips` VALUES (1,'REGALOS PUBLICITARIOS: 5 TIPS PARA TENER EN CUENTA','tips/May2020/1scHHBBNXAVaotqIoSlV.jpg','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\">Como sabemos, cada empresa tiene sus propias actividades en las cuales considera entregar lo que habitualmente llamamos regalos publicitarios o merchandising. Pero hay que tener presente que cada ocasi&oacute;n y evento tiene caracter&iacute;sticas &uacute;nicas.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\">Sin embargo, muchas veces las empresas logran un efecto contrario debido a que no dan relevancia a ciertos detalles al momento de elegir el o los regalos corporativos.<br style=\"box-sizing: border-box;\" />Siguiendo estos tips, podr&aacute;s garantizar que el regalo que entregar&aacute;s en tu evento o reuni&oacute;n sea m&aacute;s apreciado y valorado&hellip;por lo tanto la inversi&oacute;n ser&aacute; m&aacute;s efectiva.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">1 &ndash; &iquest;A qui&eacute;n va dirigido el regalo?</span><br style=\"box-sizing: border-box;\" />Dependiendo de nuestro target y tipo de acci&oacute;n, podemos elegir un tipo de regalo u otro. Es importante que nuestros clientes sepan que los tenemos presentes m&aacute;s all&aacute; de los contratos, o brindarles a nuestros trabajadores una muestra de aprecio por su dedicaci&oacute;n y esfuerzo demostrado hacia la compa&ntilde;&iacute;a.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">2 &ndash; &iquest;Qu&eacute; tipo de regalo queremos ofrecer?</span><br style=\"box-sizing: border-box;\" />En este caso tenemos dos opciones: Podemos ofrecer un regalo especial para sorprender y encantar a quien lo recibe, como una canasta de alimentos, una botella de vino o alg&uacute;n otro detalle consumible; O podemos inclinarnos hacia algo que permanezca mucho m&aacute;s como un pendrive o alg&uacute;n gadget que facilite su d&iacute;a a d&iacute;a.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">3 &ndash; Costo del regalo</span><br style=\"box-sizing: border-box;\" />Idealmente el presupuesto debe ajustarse a nuestras necesidades. Por esta raz&oacute;n debemos explorar el amplio abanico de opciones que tenemos para elegir un obsequio adecuado, de calidad, &uacute;til o muy creativo que revele de manera correcta los valores de la marca. Un regalo de mala calidad se nota y no queremos que esto nos suceda. Al contrario, queremos ser percibidos como una marca que sabe hacer las cosas bien y que los productos y servicios que ofrece en toda ocasi&oacute;n son de primera calidad.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">4- Determinar el momento de entrega del regalo</span><br style=\"box-sizing: border-box;\" />Detr&aacute;s de cada evento, hay una cuidadosa planificaci&oacute;n que busca conseguir un resultado lo m&aacute;s &oacute;ptimo posible. Entregar un obsequio totalmente ajeno a la ocasi&oacute;n o fuera del timing adecuado, sin duda influir&aacute; en el logro de un final exitoso. Para evitar esto, debemos entender realmente el prop&oacute;sito de nuestro regalo corporativo y de esa forma escoger el momento exacto de su entrega. &iquest;C&oacute;mo logramos esto? Muy f&aacute;cil, dependiendo del fin que tiene el obsequio elegiremos el momento adecuado. Por ejemplo, los regalos que se entregan al principio de cualquier evento est&aacute;n destinados a ser usados durante el mismo. Una libreta de apuntes, l&aacute;pices o note pads son excelentes para compilar las ideas de la presentaci&oacute;n. De esta forma los asistentes podr&aacute;n agradecer el contar con un medio para recopilar datos relevantes. Por el contrario, los regalos que se entregan luego de finalizada la actividad, normalmente tienden a centrarse en el contenido de &eacute;sta. Tambi&eacute;n producen un efecto positivo como acci&oacute;n de agradecimiento o despedida hacia el invitado. Algo con el branding de la marca, preferentemente deber&aacute; ser sencillo, adecuado y que dispare autom&aacute;ticamente un recuerdo atractivo sobre la experiencia recibida.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">5 &ndash; &iquest;C&oacute;mo deber&iacute;a ir brandeado el regalo?</span><br style=\"box-sizing: border-box;\" />Algunas marcas cometen el error de convertir el regalo en un festival de colores. Cuando se quiere mantener el estilo, lo mejor es ofrecer un brandeado discreto y refinado, que haga destacar el tipo y la calidad del producto o servicio. El nombre de la marca debe ser una agradable sorpresa al ver el regalo. Despu&eacute;s de todo, el objetivo es entregar una muestra de aprecio sin convertir a nuestros clientes o destinatarios del obsequio en un embajador ambulante de nuestra empresa. En general, siempre ser&aacute; m&aacute;s &uacute;til y f&aacute;cil realizar una evaluaci&oacute;n de nuestro p&uacute;blico objetivo para tomar la mejor decisi&oacute;n posible. No debemos olvidar, que un buen obsequio corporativo es siempre bien recibido y valorado. De esta manera la marca mantendr&aacute; una buena presencia por m&aacute;s tiempo.</p>',1,'2020-05-06 20:40:00','2020-05-06 20:56:54',NULL,'regalos-publicitarios-5-tips-para-tener-en-cuenta'),(2,'CÓMO RECONOCER A UNA BUENA EMPRESA DE MERCHANDISING','tips/May2020/nO5QUrOfo1JjMDNQVIzP.jpg','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\">Como cliente siempre buscamos encontrar el mejor servicio, al m&aacute;s bajo costo y la confiabilidad de un verdadero experto. Entonces &iquest;Qu&eacute; debemos considerar al momento de elegir a la empresa ideal para comprar nuestros regalos corporativos?<br style=\"box-sizing: border-box;\" />A continuaci&oacute;n podr&aacute;s encontrar algunos elementos que te ayudar&aacute;n a seleccionar al&nbsp;&nbsp;proveedor ideal para tu elecci&oacute;n de regalos corporativos.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Una excelente p&aacute;gina web:</span><br style=\"box-sizing: border-box;\" />Puede parecer algo com&uacute;n. Pero, sin embargo, no todos los proveedores de esta l&iacute;nea de negocios suelen dedicarle atenci&oacute;n a esta fundamental herramienta de informaci&oacute;n, comunicaci&oacute;n y contacto. Una empresa del &aacute;rea,&nbsp;&nbsp;profesional y confiable habr&aacute; destinado tiempo importante al desarrollo de su p&aacute;gina web, facilit&aacute;ndonos explorar todas las opciones destinadas&nbsp;a satisfacer nuestros requerimientos Mientras m&aacute;s amigable sea la navegaci&oacute;n mucho mejor, pues vamos a pasar buena parte del tiempo revisando diferentes opciones una y otra vez. Adem&aacute;s es importante que la visual de la p&aacute;gina sea agradable a la vista. Despu&eacute;s de todo, estamos eligiendo un obsequio corporativo que llevar&aacute; un mensaje claro sobre nosotros y nuestra empresa, no estamos eligiendo las verduras en un mercado.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Tienda online:</span><br style=\"box-sizing: border-box;\" />Tener la facilidad de consultar un cat&aacute;logo online, organizado por categor&iacute;as, de manera c&oacute;moda y sencilla puede hacer la diferencia al momento de cotizar y comprar un determinado producto. Una de las grandes caracter&iacute;sticas de empresas como Amazon es la sencillez con la que sus clientes pueden acceder a los productos, cada paso dentro de la web est&aacute; construido para brindar al usuario una experiencia de compra sencilla, agradable y de una calidad &uacute;nica.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Asistencia de primera:</span><br style=\"box-sizing: border-box;\" />Son los peque&ntilde;os detalles los que separan a un proveedor normal de uno excepcional. Llegar&aacute; un momento donde nos sentiremos ligeramente agobiados por las opciones o habremos llegado a una encrucijada de alternativas. Contar con la asesor&iacute;a de un especialista sobre la mejor elecci&oacute;n para lograr tu objetivo es algo que no tiene precio y que ofrece un valor agregado a la experiencia.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Log&iacute;stica:</span><br style=\"box-sizing: border-box;\" />El proceso debe ser simple y transparente para nosotros. La empresa debe brindarnos total seguridad en nuestra transacci&oacute;n y gestionar el env&iacute;o de nuestras compras de manera impecable. Un buen servicio construye fidelidad m&aacute;s all&aacute; de la calidad del producto. Si realizamos una ruta como consumidor para adquirir nuestros productos, nos daremos cuenta de cu&aacute;les son las &aacute;reas de oportunidad de cada empresa.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Buen gusto:</span><br style=\"box-sizing: border-box;\" />Queremos que nuestros regalos sean recordados. Y&hellip; &iquest;c&oacute;mo hacemos esto? Entregando un recuerdo inolvidable. Puedes enfocar tu b&uacute;squeda en p&aacute;ginas web o tiendas de dise&ntilde;o. Si son artistas locales, reconocidos, mucho mejor. Le est&aacute;n dando una firma &uacute;nica a tu detalle. Otra cosa que puedes hacer es escoger uno de estos artistas y pedirles una cantidad grande de regalos. Puedes personalizarlos por departamento, escoger los colores del objeto por &aacute;rea de desempe&ntilde;o, entre otras ideas. Recuerda: la belleza est&aacute; en el detalle.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Recomendaciones en Google:</span><br style=\"box-sizing: border-box;\" />Como decimos a diario: si no est&aacute; en Google, no existe. Trata de rastrear los mejores comentarios de cada empresa de merchandising que visites. Todo, absolutamente todo, tiene identidad digital. Y si no la tiene, tambi&eacute;n es una raz&oacute;n para dudar de su fiabilidad.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Redes sociales:</span><br style=\"box-sizing: border-box;\" />Como extensi&oacute;n del punto anterior, no dudes un segundo en revisar las redes sociales de la compa&ntilde;&iacute;a o tienda en la que quieres comprar. Pon especial atenci&oacute;n en la fecha del &uacute;ltimo post ya que esto te indicar&aacute; si est&aacute;n activos y produciendo contenido. Revisa si le han respondido a alg&uacute;n otro cliente y de qu&eacute; manera lo han hecho. Tambi&eacute;n, f&iacute;jate en el puntaje que tienen en su p&aacute;gina de facebook. La idea, finalmente, es que compres en un sitio con buena reputaci&oacute;n, excelente servicio al cliente y con productos de calidad.</p>',1,'2020-05-06 21:14:45','2020-05-06 21:14:45',NULL,'como-reconocer-a-una-buena-empresa-de-merchandising'),(3,'CÓMO MAXIMIZAR MI PRESUPUESTO DE MERCHANDISING','tips/May2020/oGzp4QhAAcFujNYxGueo.jpg','<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\">Como cliente siempre buscamos encontrar el mejor servicio, al m&aacute;s bajo costo y la confiabilidad de un verdadero experto. Entonces &iquest;Qu&eacute; debemos considerar al momento de elegir a la empresa ideal para comprar nuestros regalos corporativos?<br style=\"box-sizing: border-box;\" />A continuaci&oacute;n podr&aacute;s encontrar algunos elementos que te ayudar&aacute;n a seleccionar al&nbsp;&nbsp;proveedor ideal para tu elecci&oacute;n de regalos corporativos.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Una excelente p&aacute;gina web:</span><br style=\"box-sizing: border-box;\" />Puede parecer algo com&uacute;n. Pero, sin embargo, no todos los proveedores de esta l&iacute;nea de negocios suelen dedicarle atenci&oacute;n a esta fundamental herramienta de informaci&oacute;n, comunicaci&oacute;n y contacto. Una empresa del &aacute;rea,&nbsp;&nbsp;profesional y confiable habr&aacute; destinado tiempo importante al desarrollo de su p&aacute;gina web, facilit&aacute;ndonos explorar todas las opciones destinadas&nbsp;a satisfacer nuestros requerimientos Mientras m&aacute;s amigable sea la navegaci&oacute;n mucho mejor, pues vamos a pasar buena parte del tiempo revisando diferentes opciones una y otra vez. Adem&aacute;s es importante que la visual de la p&aacute;gina sea agradable a la vista. Despu&eacute;s de todo, estamos eligiendo un obsequio corporativo que llevar&aacute; un mensaje claro sobre nosotros y nuestra empresa, no estamos eligiendo las verduras en un mercado.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Tienda online:</span><br style=\"box-sizing: border-box;\" />Tener la facilidad de consultar un cat&aacute;logo online, organizado por categor&iacute;as, de manera c&oacute;moda y sencilla puede hacer la diferencia al momento de cotizar y comprar un determinado producto. Una de las grandes caracter&iacute;sticas de empresas como Amazon es la sencillez con la que sus clientes pueden acceder a los productos, cada paso dentro de la web est&aacute; construido para brindar al usuario una experiencia de compra sencilla, agradable y de una calidad &uacute;nica.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Asistencia de primera:</span><br style=\"box-sizing: border-box;\" />Son los peque&ntilde;os detalles los que separan a un proveedor normal de uno excepcional. Llegar&aacute; un momento donde nos sentiremos ligeramente agobiados por las opciones o habremos llegado a una encrucijada de alternativas. Contar con la asesor&iacute;a de un especialista sobre la mejor elecci&oacute;n para lograr tu objetivo es algo que no tiene precio y que ofrece un valor agregado a la experiencia.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Log&iacute;stica:</span><br style=\"box-sizing: border-box;\" />El proceso debe ser simple y transparente para nosotros. La empresa debe brindarnos total seguridad en nuestra transacci&oacute;n y gestionar el env&iacute;o de nuestras compras de manera impecable. Un buen servicio construye fidelidad m&aacute;s all&aacute; de la calidad del producto. Si realizamos una ruta como consumidor para adquirir nuestros productos, nos daremos cuenta de cu&aacute;les son las &aacute;reas de oportunidad de cada empresa.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Buen gusto:</span><br style=\"box-sizing: border-box;\" />Queremos que nuestros regalos sean recordados. Y&hellip; &iquest;c&oacute;mo hacemos esto? Entregando un recuerdo inolvidable. Puedes enfocar tu b&uacute;squeda en p&aacute;ginas web o tiendas de dise&ntilde;o. Si son artistas locales, reconocidos, mucho mejor. Le est&aacute;n dando una firma &uacute;nica a tu detalle. Otra cosa que puedes hacer es escoger uno de estos artistas y pedirles una cantidad grande de regalos. Puedes personalizarlos por departamento, escoger los colores del objeto por &aacute;rea de desempe&ntilde;o, entre otras ideas. Recuerda: la belleza est&aacute; en el detalle.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Recomendaciones en Google:</span><br style=\"box-sizing: border-box;\" />Como decimos a diario: si no est&aacute; en Google, no existe. Trata de rastrear los mejores comentarios de cada empresa de merchandising que visites. Todo, absolutamente todo, tiene identidad digital. Y si no la tiene, tambi&eacute;n es una raz&oacute;n para dudar de su fiabilidad.</p>\r\n<p style=\"box-sizing: border-box; margin-top: 0px; margin-bottom: 20px; color: #7e7c7c; font-family: Poppins, sans-serif; font-size: 13px;\"><span style=\"box-sizing: border-box; font-weight: bold; color: #393939;\">Redes sociales:</span><br style=\"box-sizing: border-box;\" />Como extensi&oacute;n del punto anterior, no dudes un segundo en revisar las redes sociales de la compa&ntilde;&iacute;a o tienda en la que quieres comprar. Pon especial atenci&oacute;n en la fecha del &uacute;ltimo post ya que esto te indicar&aacute; si est&aacute;n activos y produciendo contenido. Revisa si le han respondido a alg&uacute;n otro cliente y de qu&eacute; manera lo han hecho. Tambi&eacute;n, f&iacute;jate en el puntaje que tienen en su p&aacute;gina de facebook. La idea, finalmente, es que compres en un sitio con buena reputaci&oacute;n, excelente servicio al cliente y con productos de calidad.</p>',1,'2020-05-06 21:15:55','2020-05-06 21:15:55',NULL,'como-maximizar-mi-presupuesto-de-merchandising');
/*!40000 ALTER TABLE `tips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `translations`
--

DROP TABLE IF EXISTS `translations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `translations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) unsigned NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `translations`
--

LOCK TABLES `translations` WRITE;
/*!40000 ALTER TABLE `translations` DISABLE KEYS */;
/*!40000 ALTER TABLE `translations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_client`
--

DROP TABLE IF EXISTS `user_client`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_client` (
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  KEY `user_client_user_id_index` (`user_id`),
  KEY `user_client_client_id_index` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_client`
--

LOCK TABLES `user_client` WRITE;
/*!40000 ALTER TABLE `user_client` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_client` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_roles`
--

DROP TABLE IF EXISTS `user_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_roles` (
  `user_id` bigint(20) unsigned NOT NULL,
  `role_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `user_roles_user_id_index` (`user_id`),
  KEY `user_roles_role_id_index` (`role_id`),
  CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_roles`
--

LOCK TABLES `user_roles` WRITE;
/*!40000 ALTER TABLE `user_roles` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` bigint(20) unsigned DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`),
  CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'Francisco Sepúlveda','francisco@bigbuda.cl','users/May2020/AugXsU4TqcmkQy8lbqDK.jpg',NULL,'$2y$10$/YJN3uObxw3uKA4xuFvUuO4turdKPLdkgJBsUVtzOSQxJa6JnqJGC','fmgtzIblK087BqZqFuhzNvWTkqXeJDegPQODAcJ0UZJODZfMmkq1RPZs7Dz3','{\"locale\":\"es\"}','2020-05-06 06:05:04','2020-05-10 05:13:52',''),(2,2,'Vendedor 1','francisco.sepulveda30@gmail.com','users/default.png',NULL,'$2y$10$57IgTCNBk0njwU4SB4q8N.lioo7jXqUKtdJRm9RE7mNBqsdj4bTQS','t64TfOWkXHvPfVZUPuibZsNXTuUhkib30xv7eAIr0MCra6VtvUhiBQaHvD6g','{\"locale\":\"es\"}','2020-06-30 05:42:52','2020-06-30 05:42:52',''),(3,2,'Vendedor 1','javier+vendedor2@latadigital.cl','users/default.png',NULL,'$2y$10$S9XUL8HU9cuhXHPSkBDJaeuL43MgaT/29SxiPJBj/5W9U0XlEONyy',NULL,'{\"locale\":\"es\"}','2020-06-30 05:43:31','2020-08-09 20:30:22','+56984072329');
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

-- Dump completed on 2020-08-09 18:48:58
