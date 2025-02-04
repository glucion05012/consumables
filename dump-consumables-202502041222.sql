-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: consumables
-- ------------------------------------------------------
-- Server version	5.5.5-10.11.8-MariaDB-0ubuntu0.24.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `requeststocktemp`
--

DROP TABLE IF EXISTS `requeststocktemp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `requeststocktemp` (
  `request_temp_id` int(20) NOT NULL AUTO_INCREMENT,
  `ris_no` varchar(200) DEFAULT NULL,
  `stock_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `sku` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `product` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `count` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `requested_by` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`request_temp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `requeststocktemp`
--

LOCK TABLES `requeststocktemp` WRITE;
/*!40000 ALTER TABLE `requeststocktemp` DISABLE KEYS */;
INSERT INTO `requeststocktemp` VALUES (1,'2024-08-001','6',NULL,'PPMU-2023-06','Carbon film, A4 size','Carbon film, A4 size','221','5','AD-GSS','August 14, 2024 11:15:am  ','Completed'),(2,'2024-08-001','8',NULL,'PPMU-2023-08','Cartolina, assorted colors','Cartolina, assorted colors','3.67','100','AD-GSS','August 14, 2024 11:16:am  ','Completed'),(4,'2025-01-002','6',NULL,'PPMU-2023-06','Carbon film, A4 size','Carbon film, A4 size','221','2','AD-GSS','January 31, 2025 10:44:am  ','Completed'),(5,'2025-01-002','8',NULL,'PPMU-2023-08','Cartolina, assorted colors','Cartolina, assorted colors','3.67','2','AD-GSS','January 31, 2025 10:44:am  ','Completed'),(6,'2025-02-003','1',NULL,'PPMU-2023-01','Official Receipt','Official Receipt','100','2','AD-GSS','February 4, 2025 10:32:am  ','Completed'),(7,'2025-02-003','3',NULL,'PPMU-2023-03','Binder clips, 19mm','Binder clips, 19mm','8.76','4','AD-GSS','February 4, 2025 10:32:am  ','Completed');
/*!40000 ALTER TABLE `requeststocktemp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock`
--

DROP TABLE IF EXISTS `stock`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock` (
  `stock_id` int(20) NOT NULL AUTO_INCREMENT,
  `sku` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `product` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `description` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `rate` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `unit` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `threshold` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `amount` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `wish` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=154 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock`
--

LOCK TABLES `stock` WRITE;
/*!40000 ALTER TABLE `stock` DISABLE KEYS */;
INSERT INTO `stock` VALUES (1,'PPMU-2023-01','Official Receipt','Official Receipt','90','book','50','100',''),(2,'PPMU-2023-02','Battery AAA Eveready','Battery AAA Eveready','0','pc','2','19.7','FAD - Finance Section'),(3,'PPMU-2023-03','Binder clips, 19mm','Binder clips, 19mm','5','box','3','8.76',''),(4,'PPMU-2023-04','Bond paper with DENR letterhead, A4 size (new format)','Bond paper with DENR letterhead, A4 size (new format)','4','ream','10','1000',''),(5,'PPMU-2023-05','Bond paper with DENR letterhead, Legal size (new format)','Bond paper with DENR letterhead, Legal size (new format)','5','ream','10','1200','AD-GSS'),(6,'PPMU-2023-06','Carbon film, A4 size','Carbon film, A4 size','9','pack','10','221',''),(7,'PPMU-2023-07','Card case, A3, 115 x 92mm','Card case, A3, 115 x 92mm','2','pc','1','6.25',''),(8,'PPMU-2023-08','Cartolina, assorted colors','Cartolina, assorted colors','519','pc','50','3.67',''),(9,'PPMU-2023-09','Clearbook, A4 size','Clearbook, A4 size','6','pc','5','39.78',''),(10,'PPMU-2023-10','Clearbook, Legal size','Clearbook, Legal size','5','pc','5','42.38',''),(11,'PPMU-2023-11','Computer continuous form, 3 ply, 11 x 14.88 ADVANCE COMPUTER FORMS, INC.','Computer continuous form, 3 ply, 11 x 14.88 ADVANCE COMPUTER FORMS, INC.','3','box','2','1034.80',''),(12,'PPMU-2023-12','Computer continuous form, 3 ply, 280 x 378mm PREMIERE','Computer continuous form, 3 ply, 280 x 378mm PREMIERE','3','box','1','1,508.00',''),(13,'PPMU-2023-13','Correction tape, 4.5m','Correction tape, 4.5m','0','pc','2','330','ORD - Legal Unit'),(14,'PPMU-2023-14','Envelope brown, A4 size','Envelope brown, A4 size','77','pc','10','6850',''),(15,'PPMU-2023-15','Envelope brown, Legal size, expanding, kraftboard','Envelope brown, Legal size, expanding, kraftboard','6','pc','10','0','EMED - SWMS'),(16,'PPMU-2023-16','Envelope brown, Legal size','Envelope brown, Legal size','1254','pc','100','0',''),(17,'PPMU-2023-17','Envelope expanding, plastic','Envelope expanding, plastic','2','pc','2','650',''),(18,'PPMU-2023-18','Envelope mailing long, 105mm x 241mm, 70GSM, 500 pcs.','Envelope mailing long, 105mm x 241mm, 70GSM, 500 pcs.','2','box','10','200','ORD - Legal Unit'),(19,'PPMU-2023-19','Envelope mailing with DENR letterhead, 500/box (window type)','Envelope mailing with DENR letterhead, 500/box (window type)','17499','pc','100','1600',''),(20,'PPMU-2023-20','Envelopes pay golden kraft, 4 x 7 1/2, 75gsm, 500 pcs.','Envelopes pay golden kraft, 4 x 7 1/2, 75gsm, 500 pcs.','1000','pc','10','1600',''),(21,'PPMU-2023-21','Eraser, blackboard/whiteboard','Eraser, blackboard/whiteboard','1','pc','1','1700',''),(22,'PPMU-2023-22','File organizer','File organizer','1','pc','5','1050',''),(23,'PPMU-2023-23','File tab divider, A4 size','File tab divider, A4 size','25','set','5','1150',''),(24,'PPMU-2023-24','File tab divider, Legal size (new stock)','File tab divider, Legal size (new stock)','10','set','2','560',''),(25,'PPMU-2023-25','File tab divider, Legal size (old stock)','File tab divider, Legal size (old stock)','44','set','5','560',''),(26,'PPMU-2023-26','Highlighter Orange','Highlighter Orange','1','pc','2','325',''),(27,'PPMU-2023-27','Highlighter yellow','Highlighter yellow','1','pc','2','325',''),(28,'PPMU-2023-28','Highlighter green','Highlighter green','1','pc','2','325',''),(29,'PPMU-2023-29','Folder fancy, A4 size','Folder fancy, A4 size','59','pc','20','2400',''),(30,'PPMU-2023-30','Folder, L-type, A4 size, 216mm x 304mm, 50/pack','Folder, L-type, A4 size, 216mm x 304mm, 50/pack','4','pack','2','265',''),(31,'PPMU-2023-31','Folder, tagboard, A4 size','Folder, tagboard, A4 size','30','pc','5','265',''),(32,'PPMU-2023-32','Glue, all purpose (8-13-2021)','Glue, all purpose (8-13-2021)','57','pc','5','265',''),(33,'PPMU-2023-33','Index card box, 111mm x 143mm x 102mm','Index card box, 111mm x 143mm x 102mm','10','pc','5','265',''),(34,'PPMU-2023-34','Index card box, 3 x 5','Index card box, 3 x 5','3','pc','5','495',''),(35,'PPMU-2023-35','Index card box, 5 x 8','Index card box, 5 x 8','1','pc','5','2345',''),(36,'PPMU-2023-36','Index card, 3 x 5 500/pack','Index card, 3 x 5 500/pack','100','pc','10','2585',''),(37,'PPMU-2023-37','Index card, 5 x 8 500/pack','Index card, 5 x 8 500/pack','30','pc','10','2585',''),(38,'PPMU-2023-38','Index tabs, SPEEDO','Index tabs, SPEEDO','17','pc','5','2585',''),(39,'PPMU-2023-39','Looseleaf cover, 50/bundle','Looseleaf cover, 50/bundle','503','pc','100','259',''),(40,'PPMU-2023-40','Metro Manila CitiAtlas Accu-map','Metro Manila CitiAtlas Accu-map','1','pc','10','259',''),(41,'PPMU-2023-41','Mouse pad (EMED-WAQMS)','Mouse pad (EMED-WAQMS)','0','pc','2','259',''),(42,'PPMU-2023-42','Name plate/tag, acrylic','Name plate/tag, acrylic','10','pc','10','259',''),(43,'PPMU-2023-43','Note pad, 2 x 3','Note pad, 2 x 3','0','pc','5','37.06',''),(44,'PPMU-2023-44','Note pad, 3 x 3','Note pad, 3 x 3','5','pc','5','2550',''),(45,'PPMU-2023-45','Notebook Stenographer (new stock)','Notebook Stenographer (new stock)','1','pc','2','2690',''),(46,'PPMU-2023-46','Notebook, stenographer','Notebook, stenographer','338','pc','5','339.04',''),(47,'PPMU-2023-47','Paper, Multicopy, A4 size, 80gsm','Paper, Multicopy, A4 size, 80gsm','100','ream','5','3535',''),(48,'PPMU-2023-48','Paper, Multi-purpose, Legal size, 70gsm','Paper, Multi-purpose, Legal size, 70gsm','583','ream','5','4115',''),(49,'PPMU-2023-49','Parchment paper, EMERSON, 210mm x 297mm, 80GSM, 100 sheets (new stock)','Parchment paper, EMERSON, 210mm x 297mm, 80GSM, 100 sheets (new stock)','2','pack','2','4115',''),(50,'PPMU-2023-50','Pencil','Pencil','209','pc','10','4115',''),(51,'PPMU-2023-51','Permanent marker, red','Permanent marker, red','27','pc','10','3560',''),(52,'PPMU-2023-52','Push pins','Push pins','4','case','5','4200',''),(53,'PPMU-2023-53','Ribbon cartridge, S015531, for LQ-2190 printer','Ribbon cartridge, S015531, for LQ-2190 printer','11','pc','2','4200',''),(54,'PPMU-2023-54','Ring binder, 25mm, black','Ring binder, 25mm, black','28','pc','5','4200',''),(55,'PPMU-2023-55','Ring binder, 25mm, blue','Ring binder, 25mm, blue','110','pc','5','2857.92',''),(56,'PPMU-2023-56','Ring binder, 32mm, black','Ring binder, 32mm, black','56','pc','5','2857.92',''),(57,'PPMU-2023-57','Ring binder, 51mm, black','Ring binder, 51mm, black','24','pc','5','2420',''),(58,'PPMU-2023-58','Rubber band (8-13-2021)','Rubber band (8-13-2021)','394','box','10','14',''),(59,'PPMU-2023-59','Rubber eraser','Rubber eraser','2','pc','5','76',''),(60,'PPMU-2023-60','Ruled pad paper','Ruled pad paper','8','pc','5','68.64',''),(61,'PPMU-2023-61','Scissors, DIXON','Scissors, DIXON','2','pc','2','68.64',''),(62,'PPMU-2023-62','Sign pen, black (8-13-2021)','Sign pen, black (8-13-2021)','1735','pc','50','2550',''),(63,'PPMU-2023-63','Sign pen, blue (8-13-2021)','Sign pen, blue (8-13-2021)','478','pc','50','770.11',''),(64,'PPMU-2023-64','Stamp pad ink','Stamp pad ink','56','pc','5','36.3',''),(65,'PPMU-2023-65','Stamp pad felt','Stamp pad felt','40','pc','5','77.56',''),(66,'PPMU-2023-66','Staple remover, plier type','Staple remover, plier type','6','pc','5','82.16',''),(67,'PPMU-2023-67','Staple wire, 23/17, binder type','Staple wire, 23/17, binder type','36','box','5','18.67',''),(68,'PPMU-2023-68','Stapler with remover, standard type','Stapler with remover, standard type','2','pc','2','673.09',''),(69,'PPMU-2023-69','Time card, 190mm x 85mm, 100/bundle','Time card, 190mm x 85mm, 100/bundle','27','bundle','5','927',''),(70,'PPMU-2023-70','Typewriter ribbon, nylon','Typewriter ribbon, nylon','4','pc','5','738.4',''),(71,'PPMU-2023-71','Whiteboard marker, black','Whiteboard marker, black','2','pc','2','83.4',''),(72,'PPMU-2023-72','Whiteboard marker, blue','Whiteboard marker, blue','77','pc','10','83',''),(73,'PPMU-2023-73','Whiteboard marker, red','Whiteboard marker, red','5','pc','5','11444',''),(74,'PPMU-2023-74','Ink cartridge, canon 810, black','Ink cartridge, canon 810, black','1','pc','1','23500',''),(75,'PPMU-2023-75','Ink cartridge, canon 811, tri-color','Ink cartridge, canon 811, tri-color','1','pc','1','11444',''),(76,'PPMU-2023-76','Ink cartridge, hp 680, black','Ink cartridge, hp 680, black','0','pc','0','560',''),(77,'PPMU-2023-77','Ink cartridge, hp 680, tri-color','Ink cartridge, hp 680, tri-color','0','pc','1','22888','CPD - CHWMS'),(78,'PPMU-2023-78','Ink cartridge, HP 678, black ','Ink cartridge, HP 678, black ','4','pc','1','1144',''),(79,'PPMU-2023-79','Ink tank, CANON GI 790, cyan (CPD)','Ink tank, CANON GI 790, cyan (CPD)','1','pc','1','5613.25',''),(80,'PPMU-2023-80','Ink tank, CANON GI 790, magenta (CPD)','Ink tank, CANON GI 790, magenta (CPD)','1','pc','1','3066',''),(81,'PPMU-2023-81','Ink tank, CANON GI 790, yellow (CPD)','Ink tank, CANON GI 790, yellow (CPD)','1','pc','1','2.48',''),(82,'PPMU-2023-82','Ink tank, HP GT52, cyan (EMED)','Ink tank, HP GT52, cyan (EMED)','9','pc','1','952.64',''),(83,'PPMU-2023-83','Ink tank, HP GT52, magenta (EMED)','Ink tank, HP GT52, magenta (EMED)','9','pc','1','500',''),(84,'PPMU-2023-84','Ink tank, HP GT52, yellow (EMED)','Ink tank, HP GT52, yellow (EMED)','9','pc','1','700',''),(85,'PPMU-2023-85','Ink tank, HP GT53, black (EMED)','Ink tank, HP GT53, black (EMED)','9','pc','1','499',''),(86,'PPMU-2023-86','Toner cartridge, HP202A, CF500A black (ORD-PISMU2)','Toner cartridge, HP202A, CF500A black (ORD-PISMU2)','0','pc','1','380',''),(87,'PPMU-2023-87','Toner cartridge, HP202A, CF501A cyan (ORD-PISMU1)','Toner cartridge, HP202A, CF501A cyan (ORD-PISMU1)','8','pc','1','380',''),(88,'PPMU-2023-89','Toner cartridge, HP202A, CF502A yellow (ORD-PISMU1)','Toner cartridge, HP202A, CF502A yellow (ORD-PISMU1)','8','pc','1','380',''),(89,'PPMU-2023-91','Toner cartridge, HP202A, CF503A magenta (ORD-PISMU1)','Toner cartridge, HP202A, CF503A magenta (ORD-PISMU1)','12','pc','1','255',''),(90,'PPMU-2023-93','Toner cartridge, HP CB435A, black','Toner cartridge, HP CB435A, black','12','pc','1','90.22',''),(91,'PPMU-2023-94','Toner cartridge, HP CE285AC, black (CPD)','Toner cartridge, HP CE285AC, black (CPD)','1','pc','1','2485',''),(92,'PPMU-2023-95','Toner cartridge, HP CE285AC, black (EMED-CHWMS)','Toner cartridge, HP CE285AC, black (EMED-CHWMS)','9','pc','1','151.43',''),(93,'PPMU-2023-96','Toner cartridge, HP204A, CF510A black (EMED-CHWMS)','Toner cartridge, HP204A, CF510A black (EMED-CHWMS)','1','pc','1','48200',''),(94,'PPMU-2023-97','Toner cartridge, HP79A, CF279A black (EMED)','Toner cartridge, HP79A, CF279A black (EMED)','0','pc','1','111.3','ORD - Legal Unit'),(95,'PPMU-2023-98','Toner cartridge, LEXMARK, 58D3H00 (ORD-PISMU)','Toner cartridge, LEXMARK, 58D3H00 (ORD-PISMU)','2','pc','1','59.28',''),(96,'PPMU-2023-99','Toner cartridge, MP2501 (for photocopier)','Toner cartridge, MP2501 (for photocopier)','21','pc','1','930.8',''),(97,'PPMU-2023-100','Ink Cartridge 811 Tri color','Ink Cartridge 811 Tri color','0','pc','1','0',''),(98,'PPMU-2023-101','Ink Cartridge 810 Black','Ink Cartridge 810 Black','0','pc','1','0','EMED - SWMS'),(99,'PPMU-2023-102','Anti-virus, Kaspersky, 5 Devices, 2-year protection (EMED)','Anti-virus, Kaspersky, 5 Devices, 2-year protection (EMED)','5','pc','1','1850',''),(100,'PPMU-2023-103','External DVD/CD writer, 8x LITEON (FAD)','External DVD/CD writer, 8x LITEON (FAD)','1','pc','1','1800',''),(101,'PPMU-2023-104','External DVD/CD writer, 8x LITEON (CPD)','External DVD/CD writer, 8x LITEON (CPD)','0','pc','0','1800',''),(102,'PPMU-2023-105','External slim DVD-RW ASUS (EMED)','External slim DVD-RW ASUS (EMED)','1','pc','1','1750',''),(103,'PPMU-2023-106','External slim DVD-RW ASUS (SWMS)','External slim DVD-RW ASUS (SWMS)','3','pc','1','1750',''),(104,'PPMU-2023-107','Keyboard, A4TECH','Keyboard, A4TECH','5','pc','1','330',''),(105,'PPMU-2023-108','Printer cable, USB AD-Link high speed','Printer cable, USB AD-Link high speed','2','pc','1','650',''),(106,'PPMU-2023-109','USB hub, 2.0 HUB support 500GB, 4-ports (EMED-WAQMS)','USB hub, 2.0 HUB support 500GB, 4-ports (EMED-WAQMS)','16','pc','5','200',''),(107,'PPMU-2023-110','USB hub, UNITEK, 3.0, 4-port, 1.2M (EMED-WAQMS)','USB hub, UNITEK, 3.0, 4-port, 1.2M (EMED-WAQMS)','0','pc','1','1600',''),(108,'PPMU-2023-111','Calculator, mini-printing, CANON','Calculator, mini-printing, CANON','1','pc','1','930.80',''),(109,'PPMU-2023-112','Camera, document, 8MP (8-13-2021)','Camera, document, 8MP (8-13-2021)','1','pc','1','23,623.60',''),(110,'PPMU-2023-113','Camera, document, AVERVISION315AF','Camera, document, AVERVISION315AF','2','pc','1','28,860.00',''),(111,'PPMU-2023-114','Electric fan, industrial ground type (8-13-2021)','Electric fan, industrial ground type (8-13-2021)','2','unit','1','1,109.68',''),(112,'PPMU-2023-115','Electric fan, stand type, UNION, UGSF-1600, 16','Electric fan, stand type, UNION, UGSF-1600, 16','1','unit','1','967.10',''),(113,'PPMU-2023-116','Electric fan, wall type, UNION, UGM-16WF','Electric fan, wall type, UNION, UGM-16WF','0','unit','0','770.11',''),(114,'PPMU-2023-117','FACSIMILE Machine PANASONIC','FACSIMILE Machine PANASONIC','1','unit','1','5,642.00',''),(115,'PPMU-2023-118','IC Recorder SONY ICD-UX560F','IC Recorder SONY ICD-UX560F','0','pc','0','0',''),(116,'PPMU-2023-119','Paper trimmer/cutting machine tabletop (8-13-2021)','Paper trimmer/cutting machine tabletop (8-13-2021)','4','pc','1','9,297.60',''),(117,'PPMU-2023-120','Printer Impact DOT Matrix 9 pins 80 columns','Printer Impact DOT Matrix 9 pins 80 columns','0','unit','1','7,995.52',''),(118,'PPMU-2023-121','File Folder w/ tab Legal','File Folder w/ tab Legal','640','pc','50','3.5',''),(119,'PPMU-2023-122','Continuous Form 281 x 241mm','Continuous Form 281 x 241mm','20','pc','5','94.64',''),(120,'PPMU-2023-123','Polaris PVC (instant id System)','Polaris PVC (instant id System)','150','pc','5','86.72',''),(121,'PPMU-2023-124','Cutter knife','Cutter knife','5','pc','5','14.75',''),(122,'PPMU-2023-125','Cutter blade SPARE','Cutter blade SPARE','10','pc','5','11',''),(123,'PPMU-2023-126','Tape cloth','Tape cloth','3','pc','1','51.88',''),(124,'PPMU-2023-127','Staple 23/13','Staple 23/13','7','box','1','41.6',''),(125,'PPMU-2023-128','Calculator Canon Compact','Calculator Canon Compact','4','unit','1','105.61',''),(126,'PPMU-2023-129','Correction Tape AAU','Correction Tape AAU','0','pc','0','65',''),(127,'PPMU-2023-130','marker Permanent Black','marker Permanent Black','2','pc','2','28',''),(128,'PPMU-2023-131','Marker Permanent Blue','Marker Permanent Blue','0','pc','2','187.2','CPD - AWS'),(129,'PPMU-2023-132','Puncher (3 in 1)','Puncher (3 in 1)','2','pc','2','24.96',''),(130,'PPMU-2023-133','Stamp Pad small','Stamp Pad small','1','pc','1','960',''),(131,'PPMU-2023-134','Ruler','Ruler','0','pc','1','24.75',''),(132,'PPMU-2023-135','Record Book 500 Leaves','Record Book 500 Leaves','1','book','1','34.95',''),(133,'PPMU-2023-136','Record Book 300 Leaves','Record Book 300 Leaves','0','book','1','21.84',''),(134,'PPMU-2023-137','Tape scotch 24mm x 50 yd','Tape scotch 24mm x 50 yd','1','roll','1','19.76',''),(135,'PPMU-2023-138','Tape Packing Clear 48mm x 80yd','Tape Packing Clear 48mm x 80yd','0','roll','0','30.42',''),(136,'PPMU-2023-139','Tape Masking 48mm x 20yd','Tape Masking 48mm x 20yd','0','roll','1','155.48','EMED - WQMS'),(137,'PPMU-2023-140','Tape Masking 24mm x 20yd','Tape Masking 24mm x 20yd','1','roll','1','211',''),(138,'PPMU-2023-141','Ballpen Black ','Ballpen Black ','1','pc','1','48',''),(139,'PPMU-2023-142','Ballpen Blue','Ballpen Blue','4','pc','5','71.5','EMED - AMS'),(140,'PPMU-2023-143','Ballpen Red','Ballpen Red','3','pc','5','148.5','CPD - AWS'),(141,'PPMU-2023-144','Fastener plastic','Fastener plastic','1','box','1','500',''),(142,'PPMU-2023-145','HP 680 Tri Color','HP 680 Tri Color','0','pc','1','506',''),(143,'PPMU-2023-147','LED Projector','LED Projector','2','unit','1','148.5',''),(144,'PPMU-2023-148','Staple Wire Standard','Staple Wire Standard','54','box','10','23.76',''),(145,'PPMU-2023-150','Scandisk memory Card 32GB','Scandisk memory Card 32GB','2','pc','1','1508',''),(146,'PPMU-2023-151','Adaptor','Adaptor','3','pc','1','1',''),(147,'PPMU-2023-152','Laser Presenter (wireless)','Laser Presenter (wireless)','3','pc','1','1.5',''),(148,'PPMU-2023-154','UPS (Accu-Power)','UPS (Accu-Power)','11','pc','1','2970',''),(149,'PPMU-2023-155','UPS(APC)','UPS(APC)','2','pc','1','6220',''),(150,'PPMU-2023-157','Signature Pad','Signature Pad','4','unit','1','0',''),(151,'PPMU-2023-158','Avervision F17-8M Document Camera','Avervision F17-8M Document Camera','1','unit','1','0',''),(152,'PPMU-2023-159','Mavic Pro Drone','Mavic Pro Drone','2','unit','1','0',''),(153,'PPMU-2023-161','HP 285a','HP 285a','115','pc','10','3242.72','');
/*!40000 ALTER TABLE `stock` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stock_txn`
--

DROP TABLE IF EXISTS `stock_txn`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `stock_txn` (
  `stock_txn_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `stock_id` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `quantity` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `timestamp` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `activity` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `remarks` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`stock_txn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stock_txn`
--

LOCK TABLES `stock_txn` WRITE;
/*!40000 ALTER TABLE `stock_txn` DISABLE KEYS */;
INSERT INTO `stock_txn` VALUES (1,'1','6','AD-GSS','5','August 14, 2024 11:16:am  ','Stock Out','New count: 11<br> RIS No.: 2024-08-001'),(2,'1','8','AD-GSS','100','August 14, 2024 11:16:am  ','Stock Out','New count: 521<br> RIS No.: 2024-08-001'),(3,'1','6','AD-GSS','2','January 31, 2025 10:46:am  ','Stock Out','New count: 9<br> RIS No.: 2025-01-002'),(4,'1','8','AD-GSS','2','January 31, 2025 2:03:pm  ','Stock Out','New count: 519<br> RIS No.: 2025-01-002'),(5,'1','3','AD-GSS','4','February 4, 2025 10:33:am  ','Stock Out','New count: 5<br> RIS No.: 2025-02-003'),(6,'1','1','AD-GSS','2','February 4, 2025 10:33:am  ','Stock Out','New count: 90<br> RIS No.: 2025-02-003');
/*!40000 ALTER TABLE `stock_txn` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `middle_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `last_name` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `birthdate` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `email` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `contact` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `division` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `username` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `password` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `status` varchar(200) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'AD-GSS',NULL,NULL,NULL,NULL,NULL,'AD-GSS','gss','gss','1'),(2,'AD-AD-RECS',NULL,NULL,NULL,NULL,NULL,'AD-AD-RECS','ad-recs','ad-recs','1'),(3,'AD-OAD',NULL,NULL,NULL,NULL,NULL,'AD-OAD','oad','oad','1'),(4,'AD-CASH',NULL,NULL,NULL,NULL,NULL,'AD-CASH','cash','cash','1'),(5,'AD-PERSONNEL',NULL,NULL,NULL,NULL,NULL,'AD-PERSONNEL','personnel','personnel','1'),(6,'AD-PS',NULL,NULL,NULL,NULL,NULL,'AD-PS','ps','ps','1'),(7,'AD-HRDS',NULL,NULL,NULL,NULL,NULL,'AD-HRDS','hrds','hrds','1'),(8,'COA-COA',NULL,NULL,NULL,NULL,NULL,'COA-COA','coa','coa','1'),(9,'CDD-PFMS',NULL,NULL,NULL,NULL,NULL,'CDD-PFMS','pfms','pfms','1'),(10,'CDD-LPPWP',NULL,NULL,NULL,NULL,NULL,'CDD-LPPWP','lppwp','lppwp','1'),(11,'CDD-PAMBS',NULL,NULL,NULL,NULL,NULL,'CDD-PAMBS','pambs','pambs','1'),(12,'CDD-CRFMS',NULL,NULL,NULL,NULL,NULL,'CDD-CRFMS','crfms','crfms','1'),(13,'CDD-OCDD',NULL,NULL,NULL,NULL,NULL,'CDD-OCDD','ocdd','ocdd','1'),(14,'NCR-NCR',NULL,NULL,NULL,NULL,NULL,'NCR-NCR','ncr','ncr','1'),(15,'ED-OED',NULL,NULL,NULL,NULL,NULL,'ED-OED','oed','oed','1'),(16,'ED-PICO',NULL,NULL,NULL,NULL,NULL,'ED-PICO','pico','pico','1'),(17,'ED-CMIS',NULL,NULL,NULL,NULL,NULL,'ED-CMIS','cmis','cmis','1'),(18,'ED-SIS',NULL,NULL,NULL,NULL,NULL,'ED-SIS','sis','sis','1'),(19,'ED-WTMU',NULL,NULL,NULL,NULL,NULL,'ED-WTMU','wtmu','wtmu','1'),(20,'FD-BUDGET',NULL,NULL,NULL,NULL,NULL,'FD-BUDGET','budget','budget','1'),(21,'FD-ACCOUNTING',NULL,NULL,NULL,NULL,NULL,'FD-ACCOUNTING','accounting','accounting','1'),(22,'FD-OFD',NULL,NULL,NULL,NULL,NULL,'FD-OFD','ofd','ofd','1'),(23,'LD-LD',NULL,NULL,NULL,NULL,NULL,'LD-LD','ld','ld','1'),(24,'LPDD-FUS',NULL,NULL,NULL,NULL,NULL,'LPDD-FUS','fus','fus','1'),(25,'LPDD-OLPDD',NULL,NULL,NULL,NULL,NULL,'LPDD-OLPDD','olpdd','olpdd','1'),(26,'LPDD-PDS',NULL,NULL,NULL,NULL,NULL,'LPDD-PDS','pds','pds','1'),(27,'LPDD-WRPS',NULL,NULL,NULL,NULL,NULL,'LPDD-WRPS','wrps','wrps','1'),(28,'LPDD-WRUS',NULL,NULL,NULL,NULL,NULL,'LPDD-WRUS','wrus','wrus','1'),(29,'LPDD-LPDD-REC',NULL,NULL,NULL,NULL,NULL,'LPDD-LPDD-REC','lpdd-rec','lpdd-rec','1'),(30,'MEO-MEO-S',NULL,NULL,NULL,NULL,NULL,'MEO-MEO-S','meo-s','meo-s','1'),(31,'MEO-MEO-W',NULL,NULL,NULL,NULL,NULL,'MEO-MEO-W','meo-w','meo-w','1'),(32,'MEO-MEO-N',NULL,NULL,NULL,NULL,NULL,'MEO-MEO-N','meo-n','meo-n','1'),(33,'MEO-MEO-E',NULL,NULL,NULL,NULL,NULL,'MEO-MEO-E','meo-e','meo-e','1'),(34,'ARD-ARD-SC',NULL,NULL,NULL,NULL,NULL,'ARD-ARD-SC','ard-sc','ard-sc','1'),(35,'ARD-ARD-MS',NULL,NULL,NULL,NULL,NULL,'ARD-ARD-MS','ard-ms','ard-ms','1'),(36,'ARD-ARD-TS',NULL,NULL,NULL,NULL,NULL,'ARD-ARD-TS','ard-ts','ard-ts','1'),(37,'ORED-OPCEN',NULL,NULL,NULL,NULL,NULL,'ORED-OPCEN','opcen','opcen','1'),(38,'ORED-MBSCMO',NULL,NULL,NULL,NULL,NULL,'ORED-MBSCMO','mbscmo','mbscmo','1'),(39,'ORED-ORED',NULL,NULL,NULL,NULL,NULL,'ORED-ORED','ored','ored','1'),(40,'ORED-RSCIG',NULL,NULL,NULL,NULL,NULL,'ORED-RSCIG','rscig','rscig','1'),(41,'ORED-RAC',NULL,NULL,NULL,NULL,NULL,'ORED-RAC','rac','rac','1'),(42,'PRCMO-PPU',NULL,NULL,NULL,NULL,NULL,'PRCMO-PPU','ppu','ppu','1'),(43,'PRCMO-PRCMO',NULL,NULL,NULL,NULL,NULL,'PRCMO-PRCMO','prcmo','prcmo','1'),(44,'PRCMO-EED',NULL,NULL,NULL,NULL,NULL,'PRCMO-EED','eed','eed','1'),(45,'PRCMO-WQWMD',NULL,NULL,NULL,NULL,NULL,'PRCMO-WQWMD','wqwmd','wqwmd','1'),(46,'PRCMO-PIAU',NULL,NULL,NULL,NULL,NULL,'PRCMO-PIAU','piau','piau','1'),(47,'PRCMO-AU',NULL,NULL,NULL,NULL,NULL,'PRCMO-AU','au','au','1'),(48,'PMD-PPS',NULL,NULL,NULL,NULL,NULL,'PMD-PPS','pps','pps','1'),(49,'PMD-MES',NULL,NULL,NULL,NULL,NULL,'PMD-MES','mes','mes','1'),(50,'PMD-RICTU',NULL,NULL,NULL,NULL,NULL,'PMD-RICTU','rictu','rictu','1'),(51,'PMD-OPMD',NULL,NULL,NULL,NULL,NULL,'PMD-OPMD','opmd','opmd','1'),(52,'SMD-LAMS',NULL,NULL,NULL,NULL,NULL,'SMD-LAMS','lams','lams','1'),(53,'SMD-SCS',NULL,NULL,NULL,NULL,NULL,'SMD-SCS','scs','scs','1'),(54,'SMD-LESS',NULL,NULL,NULL,NULL,NULL,'SMD-LESS','less','less','1'),(55,'SMD-ASCS',NULL,NULL,NULL,NULL,NULL,'SMD-ASCS','ascs','ascs','1'),(56,'SMD-OOSS',NULL,NULL,NULL,NULL,NULL,'SMD-OOSS','ooss','ooss','1'),(57,'SMD-SMD-REC',NULL,NULL,NULL,NULL,NULL,'SMD-SMD-REC','smd-rec','smd-rec','1'),(58,'SMD-OSMD',NULL,NULL,NULL,NULL,NULL,'SMD-OSMD','osmd','osmd','1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'consumables'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-02-04 12:22:38
