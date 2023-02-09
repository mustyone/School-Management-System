-- mysqldump-php https://github.com/ifsnop/mysqldump-php
--
-- Host: localhost	Database: resultportal
-- ------------------------------------------------------
-- Server version 	10.6.10-MariaDB-1+b1
-- Date: Thu, 08 Dec 2022 11:43:27 +0100

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
-- Table structure for table `backups`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `backups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` varchar(22) NOT NULL,
  `filepath` text DEFAULT NULL,
  `tag` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `backups`
--

LOCK TABLES `backups` WRITE;
/*!40000 ALTER TABLE `backups` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `backups` VALUES (3,'2022-12-07 16:14:18','DB_Backup_2022_12_07_041418.sql','Database Backup');
/*!40000 ALTER TABLE `backups` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `backups` with 1 row(s)
--

--
-- Table structure for table `grades`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `grade_id` int(11) NOT NULL AUTO_INCREMENT,
  `grade_section_id` int(11) NOT NULL,
  `grade_char` varchar(3) NOT NULL,
  `grade_min_score` int(11) NOT NULL,
  `grade_max_score` int(11) NOT NULL,
  `grade_remark` text NOT NULL,
  PRIMARY KEY (`grade_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `grades` VALUES (1,1,'A',80,100,'Excellent'),(2,1,'B',60,79,'Good'),(3,1,'C',50,59,'Average'),(4,1,'D',40,49,'Poor'),(5,1,'E',30,39,'Very poor'),(6,1,'F',0,29,'Fail'),(7,2,'F',0,29,'Fail'),(8,6,'A',0,20,'Exemplenary'),(9,8,'F',0,20,'Unsatisfactory'),(10,2,'E',30,35,'Pass'),(11,2,'D',36,40,'Good');
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `grades` with 11 row(s)
--

--
-- Table structure for table `sections`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sections` (
  `section_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` text NOT NULL,
  `section_shot_code` text NOT NULL,
  PRIMARY KEY (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sections`
--

LOCK TABLES `sections` WRITE;
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sections` VALUES (1,'Senior Secondary','SS'),(2,'Junior Secondary','JS'),(6,'PRIMARY','BASIC'),(7,'KINDERGATEN','KG'),(8,'Creche','CRE'),(9,'PRIMARY','BASIC');
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sections` with 6 row(s)
--

--
-- Table structure for table `houses`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `houses` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `houses`
--

LOCK TABLES `houses` WRITE;
/*!40000 ALTER TABLE `houses` DISABLE KEYS */;
SET autocommit=0;
/*!40000 ALTER TABLE `houses` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `houses` with 0 row(s)
--

--
-- Table structure for table `sessions`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sessions` (
  `session_id` int(11) NOT NULL AUTO_INCREMENT,
  `session_name` varchar(100) NOT NULL,
  `session_status` enum('active','inactive') NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  PRIMARY KEY (`session_id`),
  UNIQUE KEY `session_name` (`session_name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `sessions` VALUES (1,'2020/2020','inactive','2022-11-26','2022-11-26'),(2,'2021/2022','inactive','2022-11-15','2022-11-25'),(3,'2022/2023','active','2022-11-24','2022-11-24'),(8,'2023/2024','inactive','2022-11-29','2022-11-26'),(11,'2024/2025','inactive','2022-11-25','2022-12-09'),(12,'2025/2026','inactive','2022-11-30','2023-03-24');
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `sessions` with 6 row(s)
--

--
-- Table structure for table `admin_staffs`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_staffs` (
  `staff_id` varchar(20) NOT NULL,
  `staff_name` text NOT NULL,
  `staff_role` enum('principal','eo','vp') NOT NULL,
  `staff_login_password` varchar(255) NOT NULL,
  `staff_login_status` enum('active','block') NOT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_staffs`
--

LOCK TABLES `admin_staffs` WRITE;
/*!40000 ALTER TABLE `admin_staffs` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `admin_staffs` VALUES ('1','john','eo','$argon2i$v=19$m=65536,t=4,p=1$OXJ0ZTV2NUM5a2doeGs5bg$+RM42BJR7gAIzhMtrloItlEaHDZ93ygq1lIYJy+4CfQ','active'),('2','abu','principal','$argon2i$v=19$m=65536,t=4,p=1$OXJ0ZTV2NUM5a2doeGs5bg$+RM42BJR7gAIzhMtrloItlEaHDZ93ygq1lIYJy+4CfQ','active');
/*!40000 ALTER TABLE `admin_staffs` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `admin_staffs` with 2 row(s)
--

--
-- Table structure for table `comments`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `min_score` int(11) NOT NULL,
  `max_score` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `comments` VALUES (1,'A very poor result try harder next term',0,50,1,'teacher'),(2,'This is a poor result, put more effort next term and concentrate on your studies',0,50,1,'principal'),(3,'Average result, try harder next term',51,70,1,'teacher'),(4,'Average result, try harder next session',51,70,1,'principal'),(7,'iohlhl jl h',71,80,1,'teacher');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `comments` with 5 row(s)
--

--
-- Table structure for table `teachers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teachers` (
  `teacher_id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_fullname` text NOT NULL,
  `teacher_username` varchar(100) NOT NULL,
  `teacher_title` tinytext NOT NULL,
  `teacher_login_username` varchar(20) NOT NULL,
  `teacher_login_password` varchar(255) NOT NULL,
  `teacher_login_status` enum('active','block') NOT NULL,
  `teacher_class_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`teacher_id`),
  UNIQUE KEY `teacher_login_username` (`teacher_login_username`),
  UNIQUE KEY `teacher_username` (`teacher_username`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teachers`
--

LOCK TABLES `teachers` WRITE;
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `teachers` VALUES (1,'Bulus Kagali','001','Mr','09132457643','$2y$10$EqibL14hK7N4s0gotKoSl.Jp3UwJ.N8azeokWUNkoq3zFq3R6NUBi','active',0),(2,'kasimu','002','Mr','0803432445','$2y$10$Bg81c1KN.LveuFDN22acIu3JtgOQTISPgTKe9J0p8VqV6tHmutIRu','active',2),(4,'Samuel James','003','Mr','08135548935','$argon2i$v=19$m=65536,t=4,p=1$OXJ0ZTV2NUM5a2doeGs5bg$+RM42BJR7gAIzhMtrloItlEaHDZ93ygq1lIYJy+4CfQ','active',1),(5,'Asmau','004','Mr','90909090909','$2y$10$rx/O6KW4k8EGF62slOeNFuHOjPmpcrKOd7knN4rIOwkd8wYGPEyni','active',4),(6,'loky','005','Mr','90234354320','$2y$10$KX5eIEs17P4LjJt1uV3fLe7n2FF037ENPsoc8SC.YRKvlxyAJIUbC','active',7),(7,'yusuf','006','Mr','67564586544','$2y$10$DRfIWfy/ZPmZuwBJUqaAk.XBDENu9w/uATAsaMSkjBwwygStwFwWK','active',0),(8,'muhammad muhammad muhammad','007','Mr','12345678912','$2y$10$TEvCm3G3y6osoerNR6HNlOkgMUqlTw2EM4CzKUHY7e6/tVlWrQU0S','active',0),(11,'Paul M Kansime','008','Mr','08135548934','$2y$10$8KauufI7TA1Ih6y8MzBhquaIECq4.XJxyL6TcUiX2P/DDCqfPVKkC','active',0);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `teachers` with 8 row(s)
--

--
-- Table structure for table `students`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `student_id` varchar(50) NOT NULL,
  `student_first_name` text NOT NULL,
  `student_middle_name` text NOT NULL,
  `student_last_name` text NOT NULL,
  `student_class_id` int(11) NOT NULL,
  `student_status` enum('left','graduated','active') NOT NULL DEFAULT 'active',
  `gender` varchar(100) DEFAULT NULL,
  `date_of_birth` varchar(100) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `photo` text NOT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `students` VALUES ('001','Abu','Sani','Muhammad',1,'active','male','2022-11-29',0,''),('0013','Muhammad','Buhari','Daura',3,'active','','',0,''),('002','John','Kabiru','Eze',1,'active','male','2022-11-30',0,''),('003','Aba','Baba','Janlingo',1,'active','','',0,''),('004','Aminu','Baba','Kasali',1,'active','','',0,''),('005','salomi','Bella','Adam',1,'active','','',0,''),('006','Fatima','Kware','Kware',1,'active','','',0,''),('007','Musa','Sani','Suleman',1,'active','','',0,''),('008','Gazali','Baba','Haruna',1,'active','','',0,''),('009','Lawali','Baba','Jamilu',1,'active','','',0,''),('010','Jamal','','Mukthar',1,'active','','',0,''),('011','Muhammad','Buhari','Daura',1,'active','','',0,''),('012','Jamilu','JamJam','J',2,'active','','',0,''),('014','Jamilu','JamJam','Daura',4,'active','','',0,''),('015','haruna','muhammad','lawal',7,'active','','',0,''),('016','hamidu','muhammad','sualiman',3,'active','','',0,''),('017','Kola','J','Martin',1,'active','','',0,''),('019','Kamilu','','Vener',1,'active','male','2022-11-29',0,''),('020','Jamiu','S','Ahmad',1,'active','Male','05/11/2022',0,''),('021','Aliamin','Wasiu','Hamma',1,'active','Male','',0,''),('022','Havard','M','Jane',1,'active','','02/10/2001',0,'');
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `students` with 21 row(s)
--

--
-- Table structure for table `class_teachers`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `class_teachers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `class_teachers`
--

LOCK TABLES `class_teachers` WRITE;
/*!40000 ALTER TABLE `class_teachers` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `class_teachers` VALUES (1,1,1,3),(2,2,2,3),(3,11,5,3),(4,8,8,3);
/*!40000 ALTER TABLE `class_teachers` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `class_teachers` with 4 row(s)
--

--
-- Table structure for table `registered_students`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registered_students` (
  `reg_student_id` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `reg_session_id` int(11) NOT NULL,
  `reg_term` text NOT NULL,
  `reg_id` varchar(11) NOT NULL,
  PRIMARY KEY (`reg_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registered_students`
--

LOCK TABLES `registered_students` WRITE;
/*!40000 ALTER TABLE `registered_students` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `registered_students` VALUES ('001',1,3,'1','00131'),('001',1,3,'2','00132'),('001',1,3,'3','00133'),('0013',3,3,'1','001331'),('001',1,8,'1','00181'),('002',1,3,'1','00231'),('002',1,3,'3','00233'),('003',1,3,'1','00331'),('003',1,3,'3','00333'),('004',1,3,'1','00431'),('004',1,3,'3','00433'),('005',1,3,'1','00531'),('005',1,3,'3','00533'),('006',1,3,'1','00631'),('006',1,3,'3','00633'),('007',1,3,'1','00731'),('007',1,3,'3','00733'),('008',1,3,'1','00831'),('008',1,3,'3','00833'),('009',1,3,'1','00931'),('009',1,3,'3','00933'),('010',1,3,'1','01031'),('010',1,3,'3','01033'),('011',1,3,'1','01131'),('011',1,3,'3','01133'),('012',2,3,'1','01231'),('014',4,3,'1','01431'),('016',3,3,'1','01631'),('017',1,3,'1','01731'),('017',1,3,'3','01733'),('019',1,3,'1','01931'),('019',1,3,'3','01933'),('020',1,3,'3','02033'),('021',1,3,'3','02133'),('022',1,3,'3','02233');
/*!40000 ALTER TABLE `registered_students` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `registered_students` with 35 row(s)
--

--
-- Table structure for table `results`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `results` (
  `result_group_id` varchar(300) NOT NULL,
  `result_student_id` varchar(50) NOT NULL,
  `result_session_id` int(11) NOT NULL,
  `result_term` text NOT NULL,
  `result_subject_id` int(11) NOT NULL,
  `result_class_id` int(11) NOT NULL,
  `result_test` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `result_total_score` int(11) NOT NULL,
  `result_id` int(11) NOT NULL AUTO_INCREMENT,
  `result_grade` varchar(3) NOT NULL,
  `result_remark` text NOT NULL,
  PRIMARY KEY (`result_id`),
  UNIQUE KEY `result_group_id` (`result_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `results`
--

LOCK TABLES `results` WRITE;
/*!40000 ALTER TABLE `results` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `results` VALUES ('001/3/1/1/1','001',3,'1',1,1,'[\"5:10\",\"2:5\",\"3:45\"]',60,1,'B','Good'),('002/3/1/1/1','002',3,'1',1,1,'[\"5:5\",\"2:5\",\"3:40\"]',50,2,'C','Average'),('003/3/1/1/1','003',3,'1',1,1,'[\"5:10\",\"2:12\",\"3:55\"]',77,3,'B','Good'),('004/3/1/1/1','004',3,'1',1,1,'[\"5:10\",\"2:10\",\"3:50\"]',70,4,'B','Good'),('005/3/1/1/1','005',3,'1',1,1,'[\"5:5\",\"2:7\",\"3:20\"]',32,5,'E','Very poor'),('006/3/1/1/1','006',3,'1',1,1,'[\"5:12\",\"2:12\",\"3:50\"]',74,6,'B','Good'),('007/3/1/1/1','007',3,'1',1,1,'[\"5:4\",\"2:5\",\"3:55\"]',64,7,'B','Good'),('008/3/1/1/1','008',3,'1',1,1,'[\"5:8\",\"2:5\",\"3:40\"]',53,8,'C','Average'),('009/3/1/1/1','009',3,'1',1,1,'[\"5:6\",\"2:6\",\"3:60\"]',72,9,'B','Good'),('010/3/1/1/1','010',3,'1',1,1,'[\"5:5\",\"2:2\",\"3:50\"]',57,10,'C','Average'),('011/3/1/1/1','011',3,'1',1,1,'[\"5:5\",\"2:8\",\"3:50\"]',63,11,'B','Good'),('001/3/1/1/2','001',3,'1',2,1,'[\"5:2\",\"2:10\",\"3:25\"]',37,12,'E','Very poor'),('002/3/1/1/2','002',3,'1',2,1,'[\"5:11\",\"2:12\",\"3:13\"]',36,13,'E','Very poor'),('003/3/1/1/2','003',3,'1',2,1,'[\"5:15\",\"2:11\",\"3:35\"]',61,14,'B','Good'),('004/3/1/1/2','004',3,'1',2,1,'[\"5:10\",\"2:15\",\"3:41\"]',66,15,'B','Good'),('005/3/1/1/2','005',3,'1',2,1,'[\"5:14\",\"2:15\",\"3:30\"]',59,16,'C','Average'),('006/3/1/1/2','006',3,'1',2,1,'[\"5:15\",\"2:15\",\"3:30\"]',60,17,'B','Good'),('007/3/1/1/2','007',3,'1',2,1,'[\"5:11\",\"2:20\",\"3:30\"]',61,18,'B','Good'),('008/3/1/1/2','008',3,'1',2,1,'[\"5:11\",\"2:10\",\"3:30\"]',51,19,'C','Average'),('009/3/1/1/2','009',3,'1',2,1,'[\"5:12\",\"2:12\",\"3:30\"]',54,20,'C','Average'),('010/3/1/1/2','010',3,'1',2,1,'[\"5:11\",\"2:11\",\"3:35\"]',57,21,'C','Average'),('011/3/1/1/2','011',3,'1',2,1,'[\"5:1\",\"2:15\",\"3:20\"]',36,22,'E','Very poor'),('017/3/1/1/1','017',3,'1',1,1,'[\"5:12\",\"2:12\",\"3:35\"]',59,34,'C','Average'),('001/3/1/1/3','001',3,'1',3,1,'[\"5:15\",\"2:20\",\"3:25\"]',60,35,'B','Good'),('002/3/1/1/3','002',3,'1',3,1,'[\"5:10\",\"2:15\",\"3:41\"]',66,36,'B','Good'),('003/3/1/1/3','003',3,'1',3,1,'[\"5:18\",\"2:20\",\"3:55\"]',93,37,'A','Excellent'),('004/3/1/1/3','004',3,'1',3,1,'[\"5:11\",\"2:12\",\"3:35\"]',58,38,'C','Average'),('005/3/1/1/3','005',3,'1',3,1,'[\"5:14\",\"2:15\",\"3:36\"]',65,39,'B','Good'),('006/3/1/1/3','006',3,'1',3,1,'[\"5:18\",\"2:19\",\"3:22\"]',59,40,'C','Average'),('007/3/1/1/3','007',3,'1',3,1,'[\"5:8\",\"2:9\",\"3:15\"]',32,41,'E','Very poor'),('008/3/1/1/3','008',3,'1',3,1,'[\"5:12\",\"2:13\",\"3:35\"]',60,42,'B','Good'),('009/3/1/1/3','009',3,'1',3,1,'[\"5:15\",\"2:16\",\"3:17\"]',48,43,'D','Poor'),('010/3/1/1/3','010',3,'1',3,1,'[\"5:18\",\"2:1\",\"3:25\"]',44,44,'D','Poor'),('011/3/1/1/3','011',3,'1',3,1,'[\"5:12\",\"2:13\",\"3:33\"]',58,45,'C','Average'),('017/3/1/1/3','017',3,'1',3,1,'[\"5:15\",\"2:12\",\"3:28\"]',55,46,'C','Average'),('001/3/2/1/1','001',3,'2',1,1,'[\"5:15\",\"2:17\",\"3:18\"]',50,61,'C','Average'),('002/3/2/1/1','002',3,'2',1,1,'[\"5:13\",\"2:2\",\"3:35\"]',50,62,'C','Average'),('003/3/2/1/1','003',3,'2',1,1,'[\"5:15\",\"2:13\",\"3:41\"]',69,63,'B','Good'),('004/3/2/1/1','004',3,'2',1,1,'[\"5:15\",\"2:20\",\"3:25\"]',60,64,'B','Good'),('005/3/2/1/1','005',3,'2',1,1,'[\"5:13\",\"2:15\",\"3:10\"]',38,65,'E','Very poor'),('006/3/2/1/1','006',3,'2',1,1,'[\"5:15\",\"2:15\",\"3:15\"]',45,66,'D','Poor'),('007/3/2/1/1','007',3,'2',1,1,'[\"5:18\",\"2:10\",\"3:35\"]',63,67,'B','Good'),('008/3/2/1/1','008',3,'2',1,1,'[\"5:17\",\"2:16\",\"3:20\"]',53,68,'C','Average'),('009/3/2/1/1','009',3,'2',1,1,'[\"5:18\",\"2:19\",\"3:30\"]',67,69,'B','Good'),('010/3/2/1/1','010',3,'2',1,1,'[\"5:11\",\"2:15\",\"3:45\"]',71,70,'B','Good'),('011/3/2/1/1','011',3,'2',1,1,'[\"5:16\",\"2:12\",\"3:33\"]',61,71,'B','Good'),('017/3/2/1/1','017',3,'2',1,1,'[\"5:12\",\"2:13\",\"3:40\"]',65,72,'B','Good'),('019/3/2/1/1','019',3,'2',1,1,'[\"5:15\",\"2:16\",\"3:18\"]',49,73,'D','Poor'),('017/3/1/1/2','017',3,'1',2,1,'[\"5:12\",\"2:12\",\"3:35\"]',59,75,'C','Average');
/*!40000 ALTER TABLE `results` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `results` with 49 row(s)
--

--
-- Table structure for table `settings`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `settings` (
  `setting_name` varchar(200) NOT NULL,
  `setting_value` text NOT NULL,
  PRIMARY KEY (`setting_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `settings` VALUES ('active_term','1'),('result_footer','Please acknowledge or make a comment about this result by sending a message to 09030897166 or send us an email at ecwassmc@gmail.com'),('school_address','12, Bello way, Sokoto South, Sokoto, Nigeria'),('school_closing_date','Jan 12, 2022'),('school_motto','In God We Trust'),('school_name','ECWA SAMUEL MATANKARI MEMORIAL COLLEGE'),('school_resumption_date','Sept 12, 2022'),('school_telephone','08022211115');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `settings` with 8 row(s)
--

--
-- Table structure for table `subjects`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_name` text NOT NULL,
  `subject_section_id` int(11) NOT NULL,
  `subject_branch` text DEFAULT NULL,
  `subject_code` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `subjects` VALUES (1,'Mathematics',1,'','SS_MAT'),(2,'Physics',1,'','SS_PHY'),(3,'Chemistry',1,'','SS_CHE'),(4,'Mathematics',2,'','JS_MAT'),(5,'English',1,'','SS_ENG'),(6,'English',2,'','JS_ENG'),(8,'BIOLOGY',1,'','SS_BIO'),(9,'COMMERCE',1,'','SS_COM');
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `subjects` with 8 row(s)
--

--
-- Table structure for table `tests`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tests` (
  `test_id` int(11) NOT NULL AUTO_INCREMENT,
  `test_name` text NOT NULL,
  `test_score` int(11) NOT NULL,
  `test_lock` varchar(100) NOT NULL,
  `test_section_id` int(11) NOT NULL,
  `test_order` int(11) NOT NULL,
  `test_session_id` int(11) NOT NULL,
  `test_term` int(11) NOT NULL,
  PRIMARY KEY (`test_id`),
  UNIQUE KEY `test_lock` (`test_lock`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tests`
--

LOCK TABLES `tests` WRITE;
/*!40000 ALTER TABLE `tests` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `tests` VALUES (2,'Second CA',20,'SecondCA/1/3/1',1,2,3,1),(3,'Exam',60,'Exam/1/3/1',1,3,3,1),(4,'First CA',20,'FirstCA/2/3/1',2,1,3,1),(5,'First CA',20,'FirstCA/1/3/1',1,1,3,1),(7,'SecondCA',20,'SecondCA/2/3/1',2,2,3,1),(8,'Exam',60,'Exam/2/3/1',2,3,3,1),(9,'First CA',5,'firstca/6/3/1',6,1,3,1);
/*!40000 ALTER TABLE `tests` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `tests` with 7 row(s)
--

--
-- Table structure for table `promotion_lists`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotion_lists` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `from_session_id` int(11) NOT NULL,
  `to_session_id` int(11) NOT NULL,
  `from_class_id` int(11) NOT NULL,
  `to_class_id` int(11) NOT NULL,
  `session_average` decimal(10,0) NOT NULL,
  `passing_average` decimal(10,0) NOT NULL,
  `promotion_status` enum('promoted','repeat','demoted') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotion_lists`
--

LOCK TABLES `promotion_lists` WRITE;
/*!40000 ALTER TABLE `promotion_lists` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `promotion_lists` VALUES (1,1,3,8,1,2,102,100,'promoted'),(2,2,3,8,1,2,101,100,'promoted'),(3,3,3,8,1,2,146,100,'promoted'),(4,4,3,8,1,2,125,100,'promoted'),(5,5,3,8,1,2,90,100,'repeat'),(6,6,3,8,1,2,109,100,'promoted'),(7,7,3,8,1,2,115,100,'promoted'),(8,8,3,8,1,2,108,100,'promoted'),(9,9,3,8,1,2,125,100,'promoted'),(10,10,3,8,1,2,124,100,'promoted'),(11,11,3,8,1,2,113,100,'promoted'),(12,17,3,8,1,2,123,100,'promoted'),(13,19,3,8,1,2,49,100,'repeat'),(14,20,3,8,1,2,0,100,'repeat'),(15,21,3,8,1,2,0,100,'repeat'),(16,22,3,8,1,2,0,100,'repeat');
/*!40000 ALTER TABLE `promotion_lists` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `promotion_lists` with 16 row(s)
--

--
-- Table structure for table `classes`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classes` (
  `class_id` int(11) NOT NULL AUTO_INCREMENT,
  `class_numeric_name` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `branch` text NOT NULL,
  `class_alternative_name` varchar(255) NOT NULL,
  `passing_average` decimal(10,0) NOT NULL,
  PRIMARY KEY (`class_id`),
  UNIQUE KEY `class_alternative_name` (`class_alternative_name`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classes`
--

LOCK TABLES `classes` WRITE;
/*!40000 ALTER TABLE `classes` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `classes` VALUES (1,1,1,'A','SS1A',100),(2,2,1,'A','SS2A',100),(3,1,2,'A','JS1A',100),(4,2,2,'A','JS2A',100),(5,3,1,'A','SS3A',200),(6,3,2,'A','JS3A',200),(7,1,9,'A','PRIMARY1A',100),(8,1,1,'B','SS1B',100),(19,3,6,'','BASIC3',100);
/*!40000 ALTER TABLE `classes` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `classes` with 9 row(s)
--

--
-- Table structure for table `teacher_subjects`
--

/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `teacher_subjects` (
  `teacher_subject_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) NOT NULL,
  `teacher_id` varchar(50) NOT NULL,
  `class_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `term_id` int(11) NOT NULL,
  PRIMARY KEY (`teacher_subject_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `teacher_subjects`
--

LOCK TABLES `teacher_subjects` WRITE;
/*!40000 ALTER TABLE `teacher_subjects` DISABLE KEYS */;
SET autocommit=0;
INSERT INTO `teacher_subjects` VALUES (1,1,'1',1,3,1),(2,2,'2',1,3,1),(3,3,'1',1,3,1),(4,5,'4',1,3,1),(5,8,'1',1,3,1),(6,9,'8',1,3,1),(7,1,'2',2,3,1),(8,2,'5',2,3,1),(9,3,'7',2,3,1),(10,5,'8',2,3,1),(11,8,'11',2,3,1),(12,9,'1',2,3,1),(13,1,'5',5,3,1),(14,2,'7',5,3,1),(15,3,'8',5,3,1),(16,5,'4',5,3,1),(17,8,'11',5,3,1),(18,9,'1',5,3,1),(19,1,'11',8,3,1),(20,2,'1',8,3,1),(21,3,'5',8,3,1),(22,5,'11',8,3,1),(23,8,'11',8,3,1),(24,9,'11',8,3,1);
/*!40000 ALTER TABLE `teacher_subjects` ENABLE KEYS */;
UNLOCK TABLES;
COMMIT;

-- Dumped table `teacher_subjects` with 24 row(s)
--

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on: Thu, 08 Dec 2022 11:43:27 +0100
