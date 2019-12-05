-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: agredo
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cart` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `id_product` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cart`
--

LOCK TABLES `cart` WRITE;
/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `city` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `post_code` varchar(45) DEFAULT NULL,
  `id_country` int(11) NOT NULL DEFAULT '33',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=256 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `city`
--

LOCK TABLES `city` WRITE;
/*!40000 ALTER TABLE `city` DISABLE KEYS */;
INSERT INTO `city` VALUES (1,'София','1000',33),(2,'Пловдив','4000',33),(3,'Варна','9000',33),(4,'Бургас','8000',33),(5,'Русе','7000',33),(6,'Стара Загора','6000',33),(7,'Плевен','5800',33),(8,'Добрич','9300',33),(9,'Сливен','8800',33),(10,'Шумен','9700',33),(11,'Перник','2300',33),(12,'Ямбол','8600',33),(13,'Хасково','6300',33),(14,'Пазарджик','4400',33),(15,'Благоевград','2700',33),(16,'Велико Търново','5000',33),(17,'Враца','3000',33),(18,'Габрово','5300',33),(19,'Видин','3700',33),(20,'Асеновград','4230',33),(21,'Казанлък','6100',33),(22,'Кюстендил','2500',33),(23,'Кърджали','6600',33),(24,'Монтана','3400',33),(25,'Димитровград','6400',33),(26,'Търговище','7700',33),(27,'Силистра','7500',33),(28,'Ловеч','5500',33),(29,'Дупница','2600',33),(30,'Разград','7200',33),(31,'Свищов','5250',33),(32,'Горна Оряховица','5100',33),(33,'Смолян','4700',33),(34,'Петрич','2850',33),(35,'Сандански','2800',33),(36,'Самоков','2000',33),(37,'Севлиево','5400',33),(38,'Лом','3600',33),(39,'Велинград','4600',33),(40,'Карлово','4300',33),(41,'Нова Загора','8900',33),(42,'Троян','5600',33),(43,'Айтос','8500',33),(44,'Ботевград','2140',33),(45,'Пещера','4550',33),(46,'Гоце Делчев','2900',33),(47,'Харманли','6450',33),(48,'Карнобат','8400',33),(49,'Свиленград','6500',33),(50,'Панагюрище','4500',33),(51,'Чирпан','6200',33),(52,'Попово','7800',33),(53,'Раковски','4150',33),(54,'Радомир','2400',33),(55,'Червен бряг','5980',33),(56,'Първомай','4270',33),(57,'Берковица','3500',33),(58,'Козлодуй','3320',33),(59,'Поморие','8200',33),(60,'Нови пазар','9900',33),(61,'Нови Искър','1000',33),(62,'Раднево','6260',33),(63,'Провадия','9200',33),(64,'Ихтиман','2050',33),(65,'Несебър','8230',33),(66,'Бяла Слатина','3000',33),(67,'Разлог','2760',33),(68,'Балчик','9600',33),(69,'Стамболийски','4210',33),(70,'Каварна','9650',33),(71,'Костинброд','2230',33),(72,'Павликени','5200',33),(73,'Мездра','3100',33),(74,'Кнежа','5835',33),(75,'Етрополе','2180',33),(76,'Левски','5900',33),(77,'Банкя','1320',33),(78,'Елхово','8700',33),(79,'Тетевен','5700',33),(80,'Трявна','5350',33),(81,'Луковит','5770',33),(82,'Тутракан','7600',33),(83,'Сопот','4330',33),(84,'Исперих','7400',33),(85,'Бяла','7100',33),(86,'Девня','9160',33),(87,'Средец','8300',33),(88,'Омуртаг','7900',33),(89,'Велики Преслав','9850',33),(90,'Гълъбово','6280',33),(91,'Лясковец','5140',33),(92,'Белене','5930',33),(93,'Кричим','4220',33),(94,'Септември','4490',33),(95,'Ракитово','4640',33),(96,'Момчилград','6800',33),(97,'Банско','2770',33),(98,'Дряново','5370',33),(99,'Белослав','9178',33),(100,'Кубрат','7300',33),(101,'Своге','2260',33),(102,'Аксаково','9154',33),(103,'Любимец','6550',33),(104,'Пирдоп','2070',33),(105,'Хисаря','4180',33),(106,'Златоград','4980',33),(107,'Сливница','2200',33),(108,'Симитли','2730',33),(109,'Симеоновград','6490',33),(110,'Долни чифлик','9120',33),(111,'Генерал Тошево','9500',33),(112,'Елин Пелин','2100',33),(113,'Дулово','7650',33),(114,'Костенец','2030',33),(115,'Девин','4800',33),(116,'Тервел','9450',33),(117,'Мадан','4900',33),(118,'Вършец','3540',33),(119,'Бобов дол','2670',33),(120,'Стралджа','8680',33),(121,'Царево','8260',33),(122,'Котел','8970',33),(123,'Твърдица','8890',33),(124,'Елена','5070',33),(125,'Куклен','4101',33),(126,'Съединение','4190',33),(127,'Оряхово','3300',33),(128,'Тополовград','6560',33),(129,'Якоруда','2790',33),(130,'Созопол','8130',33),(131,'Белоградчик','3900',33),(132,'Чепеларе','4850',33),(133,'Стражица','5150',33),(134,'Камено','8120',33),(135,'Перущица',' 4225',33),(136,'Божурище','2227',33),(137,'Златица','2080',33),(138,'Суворово','9170',33),(139,'Крумовград','6900',33),(140,'Дългопол','9250',33),(141,'Ветово','7080',33),(142,'Долна баня','2040',33),(143,'Полски Тръмбеш','5180',33),(144,'Койнаре','5986',33),(145,'Долни Дъбник','5870',33),(146,'Тръстеник','5857',33),(147,'Неделино','4990',33),(148,'Славяново','5840',33),(149,'Правец','2161',33),(150,'Годеч','2240',33),(151,'Брацигово','4579',33),(152,'Стрелча','4530',33),(153,'Две могили','7150',33),(154,'Костандово','4644',33),(155,'Игнатиево','9143',33),(156,'Свети Влас','8256',33),(157,'Смядово','9820',33),(158,'Брезник','2360',33),(159,'Сапарева баня','2650',33),(160,'Дебелец','5030',33),(161,'Никопол','5940',33),(162,'Белово','4470',33),(163,'Ардино','6750',33),(164,'Цар Калоян','7280',33),(165,'Ивайловград','6570',33),(166,'Шивачево','8895',33),(167,'Рудозем','4960',33),(168,'Вълчедръм','3650',33),(169,'Летница','5570',33),(170,'Мартен','7058',33),(171,'Искър','5972',33),(172,'Приморско','8180',33),(173,'Глоджево','7040',33),(174,'Кресна','2840',33),(175,'Върбица','9870',33),(176,'Сърница','4633',33),(177,'Шабла','9680',33),(178,'Гулянци','5960',33),(179,'Долна Митрополия','5855',33),(180,'Батак','4580',33),(181,'Мъглиж','6180',33),(182,'Мизия','3330',33),(183,'Кула','3800',33),(184,'Баня - Община Карлово','4360',33),(185,'Криводол','3060',33),(186,'Завет','7330',33),(187,'Сливо поле','7060',33),(188,'Каспичан','9930',33),(189,'Драгоман','2210',33),(190,'Ветрен','4480',33),(191,'Сунгурларе','8470',33),(192,'Белица','2780',33),(193,'Роман','3130',33),(194,'Джебел','6850',33),(195,'Калофер','4370',33),(196,'Априлци','5641',33),(197,'Николаево','6190',33),(198,'Гурково','6199',33),(199,'Бухово','1830',33),(200,'Павел баня','6155',33),(201,'Долна Оряховица','5130',33),(202,'Опака','7840',33),(203,'Каблешково','8210',33),(204,'Рила','2630',33),(205,'Ябланица','5750',33),(206,'Хаджидимово','2933',33),(207,'Угърчин','5580',33),(208,'Златарица','5090',33),(209,'Добринище','2777',33),(210,'Бяла черква','5220',33),(211,'Дунавци','3740',33),(212,'Брегово','3790',33),(213,'Трън','2460',33),(214,'Лъки','4241',33),(215,'Малко Търново','8162',33),(216,'Копривщица','2077',33),(217,'Садово','4122',33),(218,'Доспат','4831',33),(219,'Борово','7174',33),(220,'Кочериново','2640',33),(221,'Обзор','8250',33),(222,'Килифарево','5050',33),(223,'Лозница','7290',33),(224,'Бяла','9101',33),(225,'Батановци','2340',33),(226,'Черноморец','8142',33),(227,'Пордим','5898',33),(228,'Ахелой','8217',33),(229,'Сухиндол','5240',33),(230,'Българово','8110',33),(231,'Чипровци','3460',33),(232,'Главиница','7630',33),(233,'Брезово','4160',33),(234,'Кермен','8870',33),(235,'Меричлери','6430',33),(236,'Плачковци','5360',33),(237,'Земен','2440',33),(238,'Каолиново','9960',33),(239,'Алфатар','7570',33),(240,'Момин проход','2035',33),(241,'Бойчиновци','3430',33),(242,'Грамада','3830',33),(243,'Сеново','7038',33),(244,'Антоново','7970',33),(245,'Ахтопол','8280',33),(246,'Шипка','6150',33),(247,'Бобошево','2660',33),(248,'Болярово','8720',33),(249,'Брусарци','3680',33),(250,'Димово','3750',33),(251,'Клисура','4341',33),(252,'Китен','8183',33),(253,'Плиска','9920',33),(254,'Маджарово','6480',33),(255,'Мелник','2820',33);
/*!40000 ALTER TABLE `city` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `id_city` int(11) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `EIK` varchar(10) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company`
--

LOCK TABLES `company` WRITE;
/*!40000 ALTER TABLE `company` DISABLE KEYS */;
INSERT INTO `company` VALUES (1,'Фирма 1',1,33,NULL,'Свищов','123456789','359 88765432','2016-09-30 22:29:21',NULL),(2,'Фирма 2',31,33,NULL,'Българско Сливово','321321123','0895 554433','2016-09-30 22:29:21','2016-10-01 06:56:16');
/*!40000 ALTER TABLE `company` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `country`
--

DROP TABLE IF EXISTS `country`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `country` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=MyISAM AUTO_INCREMENT=246 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `country`
--

LOCK TABLES `country` WRITE;
/*!40000 ALTER TABLE `country` DISABLE KEYS */;
INSERT INTO `country` VALUES (1,'AF','Afghanistan'),(2,'AL','Albania'),(3,'DZ','Algeria'),(4,'DS','American Samoa'),(5,'AD','Andorra'),(6,'AO','Angola'),(7,'AI','Anguilla'),(8,'AQ','Antarctica'),(9,'AG','Antigua and Barbuda'),(10,'AR','Argentina'),(11,'AM','Armenia'),(12,'AW','Aruba'),(13,'AU','Australia'),(14,'AT','Austria'),(15,'AZ','Azerbaijan'),(16,'BS','Bahamas'),(17,'BH','Bahrain'),(18,'BD','Bangladesh'),(19,'BB','Barbados'),(20,'BY','Belarus'),(21,'BE','Belgium'),(22,'BZ','Belize'),(23,'BJ','Benin'),(24,'BM','Bermuda'),(25,'BT','Bhutan'),(26,'BO','Bolivia'),(27,'BA','Bosnia and Herzegovina'),(28,'BW','Botswana'),(29,'BV','Bouvet Island'),(30,'BR','Brazil'),(31,'IO','British Indian Ocean Territory'),(32,'BN','Brunei Darussalam'),(33,'BG','Bulgaria'),(34,'BF','Burkina Faso'),(35,'BI','Burundi'),(36,'KH','Cambodia'),(37,'CM','Cameroon'),(38,'CA','Canada'),(39,'CV','Cape Verde'),(40,'KY','Cayman Islands'),(41,'CF','Central African Republic'),(42,'TD','Chad'),(43,'CL','Chile'),(44,'CN','China'),(45,'CX','Christmas Island'),(46,'CC','Cocos (Keeling) Islands'),(47,'CO','Colombia'),(48,'KM','Comoros'),(49,'CG','Congo'),(50,'CK','Cook Islands'),(51,'CR','Costa Rica'),(52,'HR','Croatia (Hrvatska)'),(53,'CU','Cuba'),(54,'CY','Cyprus'),(55,'CZ','Czech Republic'),(56,'DK','Denmark'),(57,'DJ','Djibouti'),(58,'DM','Dominica'),(59,'DO','Dominican Republic'),(60,'TP','East Timor'),(61,'EC','Ecuador'),(62,'EG','Egypt'),(63,'SV','El Salvador'),(64,'GQ','Equatorial Guinea'),(65,'ER','Eritrea'),(66,'EE','Estonia'),(67,'ET','Ethiopia'),(68,'FK','Falkland Islands (Malvinas)'),(69,'FO','Faroe Islands'),(70,'FJ','Fiji'),(71,'FI','Finland'),(72,'FR','France'),(73,'FX','France, Metropolitan'),(74,'GF','French Guiana'),(75,'PF','French Polynesia'),(76,'TF','French Southern Territories'),(77,'GA','Gabon'),(78,'GM','Gambia'),(79,'GE','Georgia'),(80,'DE','Germany'),(81,'GH','Ghana'),(82,'GI','Gibraltar'),(83,'GK','Guernsey'),(84,'GR','Greece'),(85,'GL','Greenland'),(86,'GD','Grenada'),(87,'GP','Guadeloupe'),(88,'GU','Guam'),(89,'GT','Guatemala'),(90,'GN','Guinea'),(91,'GW','Guinea-Bissau'),(92,'GY','Guyana'),(93,'HT','Haiti'),(94,'HM','Heard and Mc Donald Islands'),(95,'HN','Honduras'),(96,'HK','Hong Kong'),(97,'HU','Hungary'),(98,'IS','Iceland'),(99,'IN','India'),(100,'IM','Isle of Man'),(101,'ID','Indonesia'),(102,'IR','Iran (Islamic Republic of)'),(103,'IQ','Iraq'),(104,'IE','Ireland'),(105,'IL','Israel'),(106,'IT','Italy'),(107,'CI','Ivory Coast'),(108,'JE','Jersey'),(109,'JM','Jamaica'),(110,'JP','Japan'),(111,'JO','Jordan'),(112,'KZ','Kazakhstan'),(113,'KE','Kenya'),(114,'KI','Kiribati'),(115,'KP','Korea, Democratic People\'s Republic of'),(116,'KR','Korea, Republic of'),(117,'XK','Kosovo'),(118,'KW','Kuwait'),(119,'KG','Kyrgyzstan'),(120,'LA','Lao People\'s Democratic Republic'),(121,'LV','Latvia'),(122,'LB','Lebanon'),(123,'LS','Lesotho'),(124,'LR','Liberia'),(125,'LY','Libyan Arab Jamahiriya'),(126,'LI','Liechtenstein'),(127,'LT','Lithuania'),(128,'LU','Luxembourg'),(129,'MO','Macau'),(130,'MK','Macedonia'),(131,'MG','Madagascar'),(132,'MW','Malawi'),(133,'MY','Malaysia'),(134,'MV','Maldives'),(135,'ML','Mali'),(136,'MT','Malta'),(137,'MH','Marshall Islands'),(138,'MQ','Martinique'),(139,'MR','Mauritania'),(140,'MU','Mauritius'),(141,'TY','Mayotte'),(142,'MX','Mexico'),(143,'FM','Micronesia, Federated States of'),(144,'MD','Moldova, Republic of'),(145,'MC','Monaco'),(146,'MN','Mongolia'),(147,'ME','Montenegro'),(148,'MS','Montserrat'),(149,'MA','Morocco'),(150,'MZ','Mozambique'),(151,'MM','Myanmar'),(152,'NA','Namibia'),(153,'NR','Nauru'),(154,'NP','Nepal'),(155,'NL','Netherlands'),(156,'AN','Netherlands Antilles'),(157,'NC','New Caledonia'),(158,'NZ','New Zealand'),(159,'NI','Nicaragua'),(160,'NE','Niger'),(161,'NG','Nigeria'),(162,'NU','Niue'),(163,'NF','Norfolk Island'),(164,'MP','Northern Mariana Islands'),(165,'NO','Norway'),(166,'OM','Oman'),(167,'PK','Pakistan'),(168,'PW','Palau'),(169,'PS','Palestine'),(170,'PA','Panama'),(171,'PG','Papua New Guinea'),(172,'PY','Paraguay'),(173,'PE','Peru'),(174,'PH','Philippines'),(175,'PN','Pitcairn'),(176,'PL','Poland'),(177,'PT','Portugal'),(178,'PR','Puerto Rico'),(179,'QA','Qatar'),(180,'RE','Reunion'),(181,'RO','Romania'),(182,'RU','Russian Federation'),(183,'RW','Rwanda'),(184,'KN','Saint Kitts and Nevis'),(185,'LC','Saint Lucia'),(186,'VC','Saint Vincent and the Grenadines'),(187,'WS','Samoa'),(188,'SM','San Marino'),(189,'ST','Sao Tome and Principe'),(190,'SA','Saudi Arabia'),(191,'SN','Senegal'),(192,'RS','Serbia'),(193,'SC','Seychelles'),(194,'SL','Sierra Leone'),(195,'SG','Singapore'),(196,'SK','Slovakia'),(197,'SI','Slovenia'),(198,'SB','Solomon Islands'),(199,'SO','Somalia'),(200,'ZA','South Africa'),(201,'GS','South Georgia South Sandwich Islands'),(202,'ES','Spain'),(203,'LK','Sri Lanka'),(204,'SH','St. Helena'),(205,'PM','St. Pierre and Miquelon'),(206,'SD','Sudan'),(207,'SR','Suriname'),(208,'SJ','Svalbard and Jan Mayen Islands'),(209,'SZ','Swaziland'),(210,'SE','Sweden'),(211,'CH','Switzerland'),(212,'SY','Syrian Arab Republic'),(213,'TW','Taiwan'),(214,'TJ','Tajikistan'),(215,'TZ','Tanzania, United Republic of'),(216,'TH','Thailand'),(217,'TG','Togo'),(218,'TK','Tokelau'),(219,'TO','Tonga'),(220,'TT','Trinidad and Tobago'),(221,'TN','Tunisia'),(222,'TR','Turkey'),(223,'TM','Turkmenistan'),(224,'TC','Turks and Caicos Islands'),(225,'TV','Tuvalu'),(226,'UG','Uganda'),(227,'UA','Ukraine'),(228,'AE','United Arab Emirates'),(229,'GB','United Kingdom'),(230,'US','United States'),(231,'UM','United States minor outlying islands'),(232,'UY','Uruguay'),(233,'UZ','Uzbekistan'),(234,'VU','Vanuatu'),(235,'VA','Vatican City State'),(236,'VE','Venezuela'),(237,'VN','Vietnam'),(238,'VG','Virgin Islands (British)'),(239,'VI','Virgin Islands (U.S.)'),(240,'WF','Wallis and Futuna Islands'),(241,'EH','Western Sahara'),(242,'YE','Yemen'),(243,'ZR','Zaire'),(244,'ZM','Zambia'),(245,'ZW','Zimbabwe');
/*!40000 ALTER TABLE `country` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `person`
--

DROP TABLE IF EXISTS `person`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `person` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_company` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `id_position` int(11) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `person`
--

LOCK TABLES `person` WRITE;
/*!40000 ALTER TABLE `person` DISABLE KEYS */;
INSERT INTO `person` VALUES (1,1,'Иван Иванов',1,'0897848484','ivan@ivan.bg','2016-10-01 13:32:40',NULL);
/*!40000 ALTER TABLE `person` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'Управител'),(2,'Собственик'),(3,'МОЛ'),(4,'Друго');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_groups`
--

DROP TABLE IF EXISTS `product_groups`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `product_groups` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_groups`
--

LOCK TABLES `product_groups` WRITE;
/*!40000 ALTER TABLE `product_groups` DISABLE KEYS */;
INSERT INTO `product_groups` VALUES (1,'Семена','2016-10-01 13:32:50',NULL),(2,'Торове','2016-10-01 13:32:50',NULL),(3,'Препарати','2016-10-01 13:32:50',NULL),(4,'Нова група тест','2016-10-01 13:32:50','2016-10-01 10:33:24');
/*!40000 ALTER TABLE `product_groups` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_product_groups` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Пшеница','2016-10-01 13:32:59',NULL),(2,1,'Царевица','2016-10-01 13:32:59',NULL),(3,1,'Слънчоглед','2016-10-01 13:32:59',NULL),(4,2,'Амониева силитра','2016-10-01 13:32:59',NULL),(5,2,'На бат Миро тора','2016-10-01 13:32:59',NULL),(6,3,'Препарат за пръскане','2016-10-01 13:32:59',NULL),(7,3,'Син камък','2016-10-01 13:32:59',NULL),(8,1,'Ечемик','2016-10-01 13:58:37','2016-10-01 10:59:18');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rows`
--

DROP TABLE IF EXISTS `rows`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rows` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_title` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `price` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rows`
--

LOCK TABLES `rows` WRITE;
/*!40000 ALTER TABLE `rows` DISABLE KEYS */;
INSERT INTO `rows` VALUES (1,2,3,3,NULL),(2,2,2,2,NULL),(3,2,2,2,NULL),(4,2,2,2,NULL),(5,2,2,2,NULL),(6,2,2,2,NULL),(7,2,2,2,NULL),(8,2,3,3,NULL),(9,3,1,1,NULL),(10,3,1,1,NULL),(11,4,2,2,NULL),(12,5,1,1,NULL),(13,5,2,2,NULL);
/*!40000 ALTER TABLE `rows` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `title`
--

DROP TABLE IF EXISTS `title`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `title` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `date` datetime DEFAULT NULL,
  `id_company` int(11) DEFAULT NULL,
  `docnum` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `title`
--

LOCK TABLES `title` WRITE;
/*!40000 ALTER TABLE `title` DISABLE KEYS */;
INSERT INTO `title` VALUES (1,'2016-09-30 00:00:00',1,1,1,NULL,'2016-10-01 12:07:51',1),(2,'2016-09-30 00:00:00',1,2,1,NULL,NULL,1),(3,'2016-09-30 00:00:00',2,3,1,NULL,'2016-10-01 12:01:02',1),(4,'2016-10-01 00:00:00',1,4,1,NULL,'2016-10-01 12:01:01',1),(5,'2016-10-01 00:00:00',1,5,1,NULL,'2016-10-01 12:05:43',1);
/*!40000 ALTER TABLE `title` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `remember_token` varchar(255) DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'miroslav','$2y$10$LJLhFugq6UMpJQR8keo.g.0VPPeuioIGI41gk7RxDjpHwICO0XNxS','miro@abv.bg',NULL,1,'2016-09-27 00:00:00','2016-09-27 00:00:00');
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

-- Dump completed on 2016-10-01 20:41:16
