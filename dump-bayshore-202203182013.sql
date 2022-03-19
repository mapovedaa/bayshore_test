-- MySQL dump 10.13  Distrib 5.5.62, for Win64 (AMD64)
--
-- Host: 127.0.0.1    Database: bayshore
-- ------------------------------------------------------
-- Server version	8.0.28

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
-- Table structure for table `car_generation`
--

DROP TABLE IF EXISTS `car_generation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_generation` (
  `ID_CAR_GENERATION` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `year_begin` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `year_end` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `FK_CAR_MODEL` int DEFAULT NULL,
  PRIMARY KEY (`ID_CAR_GENERATION`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_generation`
--

LOCK TABLES `car_generation` WRITE;
/*!40000 ALTER TABLE `car_generation` DISABLE KEYS */;
INSERT INTO `car_generation` VALUES (1,'1 generation','2015','2021',1,'2022-03-18 15:58:47','2022-03-18 15:58:47',1);
/*!40000 ALTER TABLE `car_generation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_make`
--

DROP TABLE IF EXISTS `car_make`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_make` (
  `ID_CAR_MAKE` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CAR_MAKE`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_make`
--

LOCK TABLES `car_make` WRITE;
/*!40000 ALTER TABLE `car_make` DISABLE KEYS */;
INSERT INTO `car_make` VALUES (1,'Renault',1,'2022-03-18 15:56:49','2022-03-18 15:56:49'),(2,'Chevrolet',1,'2022-03-19 12:32:17',NULL),(3,'Mazda',1,'2022-03-18 07:34:20',NULL);
/*!40000 ALTER TABLE `car_make` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_model`
--

DROP TABLE IF EXISTS `car_model`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_model` (
  `ID_CAR_MODEL` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP,
  `FK_CAR_MAKE` int DEFAULT NULL,
  PRIMARY KEY (`ID_CAR_MODEL`),
  KEY `car_model_FK_CAR_MAKE_IDX` (`FK_CAR_MAKE`) USING BTREE,
  CONSTRAINT `car_model_FK` FOREIGN KEY (`FK_CAR_MAKE`) REFERENCES `car_make` (`ID_CAR_MAKE`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_model`
--

LOCK TABLES `car_model` WRITE;
/*!40000 ALTER TABLE `car_model` DISABLE KEYS */;
INSERT INTO `car_model` VALUES (1,'Sandero RS',1,'2022-03-18 15:57:16','2022-03-18 15:57:16',1);
/*!40000 ALTER TABLE `car_model` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_serie`
--

DROP TABLE IF EXISTS `car_serie`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_serie` (
  `ID_CAR_SERIE` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `FK_CAR_GENERATION` int DEFAULT NULL,
  `FK_CAR_MODEL` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CAR_SERIE`),
  KEY `car_serie_FK_CAR_MODEL_IDX` (`FK_CAR_MODEL`) USING BTREE,
  KEY `car_serie_FK_CAR_GENERATION_IDX` (`FK_CAR_GENERATION`) USING BTREE,
  CONSTRAINT `car_serie_FK` FOREIGN KEY (`FK_CAR_GENERATION`) REFERENCES `car_generation` (`ID_CAR_GENERATION`) ON UPDATE CASCADE,
  CONSTRAINT `car_serie_FK_1` FOREIGN KEY (`FK_CAR_MODEL`) REFERENCES `car_model` (`ID_CAR_MODEL`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_serie`
--

LOCK TABLES `car_serie` WRITE;
/*!40000 ALTER TABLE `car_serie` DISABLE KEYS */;
INSERT INTO `car_serie` VALUES (1,'Hatchback 5-doors',1,1,1,'2022-03-18 15:59:40','2022-03-18 15:59:40');
/*!40000 ALTER TABLE `car_serie` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_spec_value`
--

DROP TABLE IF EXISTS `car_spec_value`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_spec_value` (
  `ID_CAR_SPEC_VALUE` int NOT NULL AUTO_INCREMENT,
  `FK_CAR_TRIM` int DEFAULT NULL,
  `FK_CAR_SPECIFICATION` int DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `unit` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CAR_SPEC_VALUE`),
  KEY `car_specification_value_FK_CAR_TRIM_IDX` (`FK_CAR_TRIM`) USING BTREE,
  KEY `car_specification_value_FK_CAR_SPECIFICATION_IDX` (`FK_CAR_SPECIFICATION`) USING BTREE,
  CONSTRAINT `car_specification_value_FK` FOREIGN KEY (`FK_CAR_TRIM`) REFERENCES `car_trim` (`ID_CAR_TRIM`) ON UPDATE CASCADE,
  CONSTRAINT `car_specification_value_FK_1` FOREIGN KEY (`FK_CAR_SPECIFICATION`) REFERENCES `car_specification` (`ID_CAR_SPECIFICATION`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_spec_value`
--

LOCK TABLES `car_spec_value` WRITE;
/*!40000 ALTER TABLE `car_spec_value` DISABLE KEYS */;
/*!40000 ALTER TABLE `car_spec_value` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_specification`
--

DROP TABLE IF EXISTS `car_specification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_specification` (
  `ID_CAR_SPECIFICATION` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `FK_PARENT` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CAR_SPECIFICATION`),
  KEY `car_specification_FK_PARENT_IDX` (`FK_PARENT`) USING BTREE,
  CONSTRAINT `car_specification_FK` FOREIGN KEY (`FK_PARENT`) REFERENCES `car_specification` (`ID_CAR_SPECIFICATION`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=1572 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_specification`
--

LOCK TABLES `car_specification` WRITE;
/*!40000 ALTER TABLE `car_specification` DISABLE KEYS */;
INSERT INTO `car_specification` VALUES (1,'Bodywork',NULL,1,'2022-03-18 16:14:39','2022-03-18 16:14:39'),(2,'Body type',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(4,'Number of seater',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(5,'Length',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(6,'Width',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(7,'Height',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(8,'Wheelbase',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(9,'Front track',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(10,'Rear track',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(11,'Engine',NULL,1,'2022-03-18 16:14:39','2022-03-18 16:14:39'),(12,'Engine type',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(13,'Capacity',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(14,'Engine power',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(15,'Max power at RPM',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(16,'Maximum torque',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(17,'Injection type',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(19,'Cylinder layout',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(20,'Number of cylinders',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(22,'Fuel',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(23,'Gearbox and handling',NULL,1,'2022-03-18 16:14:39','2022-03-18 16:14:39'),(24,'Gearbox type',23,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(26,'Number of gear',23,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(27,'Drive wheels',23,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(29,'Front brakes',40,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(30,'Rear brakes',40,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(31,'Operating characteristics',NULL,1,'2022-03-18 16:14:39','2022-03-18 16:14:39'),(32,'Max speed',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(33,'Acceleration (0-100 km/h)',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(34,'Curb weight',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(35,'Fuel tank capacity',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(37,'Emission standards',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(38,'Ground clearance',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(39,'Valves per cylinder',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(40,'Suspension and brakes',NULL,1,'2022-03-18 16:14:39','2022-03-18 16:14:39'),(41,'Front suspension',40,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(42,'Back suspension',40,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(44,'Max trunk capacity',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(45,'Min trunk capacity',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(46,'Boost type',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(47,'Cylinder bore',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(48,'Stroke cycle',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(50,'City driving fuel consumption per 100 km',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(51,'Highway driving fuel consumption per 100 km',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(52,'Mixed driving fuel consumption per 100 km',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(57,'Turning circle',23,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(58,'Full weight',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(62,'Cruising range',31,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1564,'Turnover of maximum torque',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1565,'Payload',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1566,'Presence of intercooler',11,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1567,'Permitted road-train weight',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1568,'Front/rear axle load',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1569,'Loading height',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1570,'Cargo compartment (Length x Width x Height)',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14'),(1571,'Cargo compartment volume',1,1,'2022-03-18 16:15:14','2022-03-18 16:15:14');
/*!40000 ALTER TABLE `car_specification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `car_trim`
--

DROP TABLE IF EXISTS `car_trim`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `car_trim` (
  `ID_CAR_TRIM` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `start_production_year` int NOT NULL,
  `end_production_year` int DEFAULT NULL,
  `FK_CAR_MODEL` int DEFAULT NULL,
  `FK_CAR_SERIE` int DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `date_create` datetime DEFAULT CURRENT_TIMESTAMP,
  `date_update` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_CAR_TRIM`),
  KEY `car_trim_FK_CAR_MODEL_IDX` (`FK_CAR_MODEL`) USING BTREE,
  KEY `car_trim_FK_CAR_SERIE_IDX` (`FK_CAR_SERIE`) USING BTREE,
  CONSTRAINT `car_trim_FK` FOREIGN KEY (`FK_CAR_MODEL`) REFERENCES `car_model` (`ID_CAR_MODEL`) ON UPDATE CASCADE,
  CONSTRAINT `car_trim_FK_1` FOREIGN KEY (`FK_CAR_SERIE`) REFERENCES `car_serie` (`ID_CAR_SERIE`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `car_trim`
--

LOCK TABLES `car_trim` WRITE;
/*!40000 ALTER TABLE `car_trim` DISABLE KEYS */;
INSERT INTO `car_trim` VALUES (1,'2.0 MT (145 hp)',2015,NULL,1,1,1,'2022-03-18 16:02:25','2022-03-18 16:02:25');
/*!40000 ALTER TABLE `car_trim` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'bayshore'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-18 20:13:22
