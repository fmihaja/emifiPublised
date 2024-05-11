-- MariaDB dump 10.19  Distrib 10.11.4-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: emifi
-- ------------------------------------------------------
-- Server version	10.11.4-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `chansons`
--

DROP TABLE IF EXISTS `chansons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chansons` (
  `id_ch` int(100) NOT NULL AUTO_INCREMENT,
  `titre` text NOT NULL,
  PRIMARY KEY (`id_ch`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chansons`
--

LOCK TABLES `chansons` WRITE;
/*!40000 ALTER TABLE `chansons` DISABLE KEYS */;
INSERT INTO `chansons` VALUES
(68,'04- Chorale EMIFI EMIT Mikalo Fiderana  Talily Fanjaka 2019'),
(69,'08  - EMIFI  Ano hagnatognAzy'),
(70,'09 - EMIFI  Zagnahary SudEst Bawejy Sound tsapiky toliara FIDA CYRILLE RUDY DIDI'),
(71,'Ho tia Anao - EMIFI');
/*!40000 ALTER TABLE `chansons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reaction`
--

DROP TABLE IF EXISTS `reaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reaction` (
  `id_user` int(100) NOT NULL,
  `id_chanson` int(100) NOT NULL,
  KEY `id_user` (`id_user`),
  KEY `id_chanson` (`id_chanson`),
  CONSTRAINT `reaction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_users`),
  CONSTRAINT `reaction_ibfk_2` FOREIGN KEY (`id_chanson`) REFERENCES `chansons` (`id_ch`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reaction`
--

LOCK TABLES `reaction` WRITE;
/*!40000 ALTER TABLE `reaction` DISABLE KEYS */;
INSERT INTO `reaction` VALUES
(133,70),
(133,71),
(148,71),
(171,69),
(180,70);
/*!40000 ALTER TABLE `reaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_users` int(100) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `mdp` text NOT NULL,
  `nom` varchar(25) NOT NULL,
  `numero_tel` varchar(10) NOT NULL,
  PRIMARY KEY (`id_users`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `numero` (`numero_tel`)
) ENGINE=InnoDB AUTO_INCREMENT=182 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES
(129,'goku569@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Z2lJYUVHMUZnTklUenZRSQ$SaLgUxsRkH4CEbnmcMxt0+dv0eBaXJ5Y9ES+UMJOmgk','Rakoto','0345294025'),
(130,'goku568@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$SHJIOHZIQVNpUlM1aXpFMA$5N28IDeKZJylCjVgJZwZMYv8Tda8zn/IJuS5KDC/V6I','lava','0333333333'),
(131,'lava@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$WGxha1pIRzl0NGdWV3VPZg$cRUz44vRWHYVfHovozd1u/2xwQ94K0MtvbCgmLA6W7U','sdfdf','4599999999'),
(132,'vegeta@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$cldBeWpIU3paRmZ1NlRocw$5p4SyMPdSJUls7tz3adV7oTH3fwiwpGhhb5S4DcxfVU','sdfdfdsf','5988888888'),
(133,'goku@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Ti5saHpROWJlR2pUS25lSw$Skz/7EPZiW0IfPCVfkOrXP7K/pqOJFcX/Ly0KK+JD1c','rakoto','5659999999'),
(134,'admin@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$cDZSUEFJVHkubzYwbUYuSQ$zLC/mfTSVR+/K0RNXjNcBF9u8SEJNGRMCw0grVCCQfk','admin','0326895522'),
(136,'goku5988@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$YjJZYjZDNjRUWjhLbzVzOA$F82YZR7XpmdQcbBdKHcMtIqixhQmjgU4lxkxHaTG01w','kjhjkh','5658999888'),
(137,'goku8999@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$dmpKdEY1ekVraUE1b2NieA$CLGDVTT/nFVcrkb/9jpm/cvzm4/HcFKK1QHTjKdkiRA','vegeta','8999999999'),
(139,'ku@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$OEpKUFg0eE5mTTBROHNWQQ$mlOAeLrNU0XobAHOYYc6ZgP19UM6hf8xEu7IaB3wziM','skldjfldksfj','2300000000'),
(140,'aaa@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Y0pqMmU4SGtIcGJwNVVNdg$aHi6xWtwz5/OZxidJFKVC0cFHRobFLHKg+nAq0P/0Rw','aaa','0000000000'),
(141,'goku102@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$M3UxWE9sMmZsQ0tsQk9VRQ$oHMRjYhdHC0gkKnsU3D4ojhqDU0P+B2q78Cu/aOb7iA','dsfdsqf','5689999999'),
(142,'mihaja@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$LmFpc1JiNFlIMURCajNUMQ$gi4tRCbu46Ft8q5QDWZ5YWvkQx2R6MIrZ5cbXxBJvQg','admin','9888888888'),
(143,'gogeta@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$cUF3RHV4QWdKTzc5U3h1WA$Z2EAG/tt+iDEysC+OV/Ho5SAxmoTo5bhF856hx8x47w','Rabe','5689999922'),
(144,'f@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$SDJ3eXJsLm5EVzlWQ0FsWQ$vBfZesRXD+uf6sqsIYe8KtKZdxNtR3eIHR3FuSpBM+E','rakoto','0648955555'),
(145,'fmihaja047@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$eWRUQlAvUTJuWEg2SVJ2WA$zBssrs3M1VWe36S6U48J/tF3YPqzEHFfy/PKBJj7/EA','razily','0342689956'),
(148,'rabe02@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$Um1nTno3QXRaQ3g3Um5TNg$Qj7wAjImNOgT7KFZY+5TdIX1M9EDIbLFXEZ/KMNqdcc','rabe','0326555555'),
(149,'dsk@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$UVdCdjY3d215NmFMWlNzVQ$UEdqo90rrTLP1gN/G9E3Lp4WFUbPAeHuvykFoy1V8lI','admin','8953333333'),
(169,'rabe@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$NFo3UmVLUUtybUhwdHV0WQ$cKqhoTC7hqab78pvh2g4AIG3OnCyg5H8nO7aWwu3JIA','rabenidriana','0000000003'),
(170,'gokuaccueil@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$eXVDdzZEQjJWdG9nTWZrQg$ZMCowV/WT/n17I176EG4uTyMv1GS/Bq8xMpQif9wdF0','rabe','1568999999'),
(171,'rush@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$R2ZQd1pha2MxbHNCdEdtZg$iEeJOH/iVhzIsi7ad3zPeg4wcT0+I2sgxUIDnIGCiOA','admin','1235698744'),
(172,'goku77@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$TFVBTm9xREQ4WXEwUVRZYQ$3Ymkt84Y6R43Yc++xf+wHOhoPt5ExSJw+YYIrXCugm8','lala','1234567987'),
(174,'admin@jde.com','$argon2id$v=19$m=65536,t=4,p=1$MGhtaTVGZ3hpV003TWxCYw$g5X2wqlAkENj/fPEMGQZk1FPd75JkadOB7sFocY6Tjs','admin','1234595322'),
(175,'goku23555@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$WjBjbktKRTRSNGsyNFNYVQ$vDU5H3Clx8M9PcZ+/P6NFSr0Iuu/jkltS4t6ZamAezc','dfff','0645899999'),
(178,'goku598@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$dlZUQjBJUHJyVmR5VktwSQ$B+0J0Q/DhDyi+wwR3peAEP95FbnbAAU1RlccAbmjNTQ','rabe','7888888888'),
(179,'gokulalo@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$OUpTU2N5ZGhyMWpCV0o5SQ$BKZY0d9U7v1TPeukjOcabps6ANUhTBcibSYM0B2P7i8','lalo','5659999998'),
(180,'adminEmifi@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$aXBuM0FjMzZLZ2ZLejJDQg$+GKaqJSQil3cZ1Qw3bqrJaqHQVa8BI5+LFbzA2pOEO8','admin','1234556888'),
(181,'goku4567@gmail.com','$argon2id$v=19$m=65536,t=4,p=1$R2ZlNHlwZ3VLNno4SzIxdQ$Lqsp6I0XaT/qUVdhNivMvcqC/pedjRyeyigvEgQMSU8','rabe','2033135555');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-05-10 20:31:29
