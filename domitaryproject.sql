-- MySQL dump 10.13  Distrib 5.5.41, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: domitaryproject
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `Customer_ID` int(11) NOT NULL,
  `Fname` varchar(20) NOT NULL,
  `Lname` varchar(20) NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `IDCard` varchar(13) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Room_Number` int(11) NOT NULL,
  `BirthDate` date NOT NULL,
  PRIMARY KEY (`Customer_ID`),
  KEY `Room_Number_idx` (`Room_Number`),
  CONSTRAINT `Room_Number` FOREIGN KEY (`Room_Number`) REFERENCES `room` (`Room_Number`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (123456789,'Robirt','Teror',0,'2147483647','142 pattaya chonburi',1001,'1987-05-15'),(125631225,'Pinmalai','Kitikon',0,'1259636582369','Donmeung bangkok',1002,'1958-05-08');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `Employee_ID` int(11) NOT NULL,
  `Fname` varchar(45) NOT NULL,
  `Lname` varchar(45) NOT NULL,
  `Address` varchar(45) NOT NULL,
  `Sex` tinyint(1) NOT NULL,
  `ID Card` varchar(13) NOT NULL,
  `BirthDate` date NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1111,'Somsak','Srisuk','458 srilom bakrak bangkok 10500',0,'1256325968795','1977-08-09');
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `fix`
--

DROP TABLE IF EXISTS `fix`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `fix` (
  `Fix_ID` int(11) NOT NULL,
  `Detail` varchar(45) NOT NULL,
  `Price` varchar(45) NOT NULL,
  `Room_Room_Number` int(11) NOT NULL,
  `Employee_Employee_ID` int(11) NOT NULL,
  PRIMARY KEY (`Fix_ID`),
  KEY `fk_FIX_Room1_idx` (`Room_Room_Number`),
  KEY `fk_FIX_Employee1_idx` (`Employee_Employee_ID`),
  CONSTRAINT `fk_FIX_Employee1` FOREIGN KEY (`Employee_Employee_ID`) REFERENCES `employee` (`Employee_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FIX_Room1` FOREIGN KEY (`Room_Room_Number`) REFERENCES `room` (`Room_Number`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `fix`
--

LOCK TABLES `fix` WRITE;
/*!40000 ALTER TABLE `fix` DISABLE KEYS */;
INSERT INTO `fix` VALUES (1256,'โซฟา','600',1001,1111);
/*!40000 ALTER TABLE `fix` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invoice` (
  `Invoice_id` int(11) NOT NULL,
  `Status` tinyint(1) NOT NULL,
  `Date_checkBill` date NOT NULL,
  `Price` int(11) NOT NULL,
  `Room_Room_Number` int(11) NOT NULL,
  `forfeit_money` int(11) NOT NULL,
  PRIMARY KEY (`Invoice_id`),
  KEY `fk_Invoice_Room1_idx` (`Room_Room_Number`),
  CONSTRAINT `fk_Invoice_Room1` FOREIGN KEY (`Room_Room_Number`) REFERENCES `room` (`Room_Number`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invoice`
--

LOCK TABLES `invoice` WRITE;
/*!40000 ALTER TABLE `invoice` DISABLE KEYS */;
INSERT INTO `invoice` VALUES (12563,0,'2014-04-14',500,1001,0);
/*!40000 ALTER TABLE `invoice` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publict_utility`
--

DROP TABLE IF EXISTS `publict_utility`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publict_utility` (
  `Publict_utilityID` int(11) NOT NULL,
  `Name` varchar(45) NOT NULL,
  `PricePerUnit` float NOT NULL,
  PRIMARY KEY (`Publict_utilityID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publict_utility`
--

LOCK TABLES `publict_utility` WRITE;
/*!40000 ALTER TABLE `publict_utility` DISABLE KEYS */;
INSERT INTO `publict_utility` VALUES (1,'ไฟฟ้า',7),(2,'น้ำประปา',23),(3,'อินเทอร์เน็ต',400);
/*!40000 ALTER TABLE `publict_utility` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `room`
--

DROP TABLE IF EXISTS `room`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `room` (
  `Room_Number` int(11) NOT NULL,
  `Status` varchar(10) NOT NULL,
  `Deposit` float NOT NULL,
  `Date_IN` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Date_Out` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `User` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Type` varchar(45) NOT NULL,
  `Price` float NOT NULL,
  PRIMARY KEY (`Room_Number`),
  UNIQUE KEY `Room_Number` (`Room_Number`),
  KEY `Room_Number_2` (`Room_Number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `room`
--

LOCK TABLES `room` WRITE;
/*!40000 ALTER TABLE `room` DISABLE KEYS */;
INSERT INTO `room` VALUES (88,'',88,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','8',0),(112,'11',11,'0000-00-00 00:00:00','0000-00-00 00:00:00','111','11','1',1),(121,'12',12,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','12',0),(123,'1',123,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','',0),(124,'45',546,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','45',0),(223,'NotEmpty',2,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','2',0),(896,'gh',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','gh',0),(999,'8988',989,'0000-00-00 00:00:00','0000-00-00 00:00:00','89','89','8989',877),(1001,'1',0,'2014-04-11 17:00:00','0000-00-00 00:00:00','1001','1001','daily',150),(1002,'0',0,'2014-04-10 17:00:00','2014-04-12 17:00:00','1002','1002','daily',150),(1003,'0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','1003','1003','daily',150),(2001,'0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','2001','2001','monthly',3500),(2002,'0',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','2002','2002','monthly',3500),(2004,'Empty',0,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','monthly',0),(7777,'777',777,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','777',0),(8566,'1',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','1',0),(8596,'',966,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','',0),(9999,'9999',9999,'0000-00-00 00:00:00','0000-00-00 00:00:00','999','999','999',999),(10001,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','',0),(12154,'4512',54512,'0000-00-00 00:00:00','0000-00-00 00:00:00','1212','1512','151',151),(89565,'',1,'0000-00-00 00:00:00','0000-00-00 00:00:00','','','ppo',0),(898898,'8',9898,'0000-00-00 00:00:00','0000-00-00 00:00:00','9','89','8',98);
/*!40000 ALTER TABLE `room` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `service`
--

DROP TABLE IF EXISTS `service`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `service` (
  `Room_Room_Number` int(11) NOT NULL,
  `Publict_utility_Publict_utilityID` int(11) NOT NULL,
  `Old_rec` int(11) NOT NULL,
  `New_rec` int(11) NOT NULL,
  PRIMARY KEY (`Room_Room_Number`,`Publict_utility_Publict_utilityID`),
  KEY `fk_Service_Room1_idx` (`Room_Room_Number`),
  KEY `fk_Service_Publict_utility1_idx` (`Publict_utility_Publict_utilityID`),
  CONSTRAINT `fk_Service_Publict_utility1` FOREIGN KEY (`Publict_utility_Publict_utilityID`) REFERENCES `publict_utility` (`Publict_utilityID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Service_Room1` FOREIGN KEY (`Room_Room_Number`) REFERENCES `room` (`Room_Number`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `service`
--

LOCK TABLES `service` WRITE;
/*!40000 ALTER TABLE `service` DISABLE KEYS */;
INSERT INTO `service` VALUES (1001,1,0,0),(1001,2,0,0),(1001,3,0,0),(1002,1,0,0),(1002,2,0,0),(1003,1,0,0),(1003,2,0,0);
/*!40000 ALTER TABLE `service` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `User` varchar(45) NOT NULL,
  `Password` varchar(60) NOT NULL,
  PRIMARY KEY (`User`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('admin','63a9f0ea7bb98050796b649e85481845');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_log`
--

DROP TABLE IF EXISTS `work_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_log` (
  `WorkDate` date NOT NULL,
  `EmployeeID` int(11) NOT NULL,
  `TimeIn` time DEFAULT NULL,
  `TiimeOut` time DEFAULT NULL,
  PRIMARY KEY (`WorkDate`,`EmployeeID`),
  KEY `employeeID_idx` (`EmployeeID`),
  CONSTRAINT `EmployeeID` FOREIGN KEY (`EmployeeID`) REFERENCES `employee` (`Employee_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_log`
--

LOCK TABLES `work_log` WRITE;
/*!40000 ALTER TABLE `work_log` DISABLE KEYS */;
INSERT INTO `work_log` VALUES ('2014-04-13',1111,'00:00:08',NULL);
/*!40000 ALTER TABLE `work_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-04-19 13:06:56
