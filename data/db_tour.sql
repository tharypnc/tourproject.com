/*
SQLyog Ultimate v11.33 (64 bit)
MySQL - 10.1.38-MariaDB : Database - db_tour
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`db_tour` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `db_tour`;

/*Table structure for table `tbl_countries` */

DROP TABLE IF EXISTS `tbl_countries`;

CREATE TABLE `tbl_countries` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Country_Name` varchar(255) DEFAULT NULL,
  `Photo` varchar(255) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_countries` */

insert  into `tbl_countries`(`Id`,`Country_Name`,`Photo`,`Status`,`DateCreated`) values (1,'Japen','images.png',1,'2019-04-07 11:30:25'),(2,'France','2176510.png',1,'2019-05-02 15:23:10'),(3,'Vietnam','images (1).png',1,'2019-05-09 12:57:34'),(4,'USA','DKkGrFDW0AACjNB.jpg',1,'2019-05-09 12:57:46');

/*Table structure for table `tbl_customers` */

DROP TABLE IF EXISTS `tbl_customers`;

CREATE TABLE `tbl_customers` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(150) DEFAULT NULL,
  `Phone` varchar(100) DEFAULT NULL,
  `Password` varchar(150) DEFAULT NULL,
  `Verify` tinyint(4) DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `Created_Date` datetime DEFAULT NULL,
  `LastUpdated` datetime DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_customers` */

insert  into `tbl_customers`(`Id`,`Name`,`Email`,`Phone`,`Password`,`Verify`,`Status`,`Created_Date`,`LastUpdated`) values (1,'Jonh','jonh.son@gmail.com','0966402003',NULL,1,1,'2019-04-10 10:27:45','2019-05-12 08:57:50'),(2,'Khan','khan.jack@gmail.com','081856604',NULL,0,1,'2019-04-09 10:28:09','2019-05-12 08:58:05'),(3,'Viyo','viyo.san@gmail.com','012929929',NULL,0,1,'2019-05-12 15:59:45',NULL);

/*Table structure for table `tbl_languages` */

DROP TABLE IF EXISTS `tbl_languages`;

CREATE TABLE `tbl_languages` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lang_prefix` varchar(10) DEFAULT NULL,
  `Lang_fullname` varchar(50) DEFAULT NULL,
  `Lang_description` varchar(255) DEFAULT NULL,
  `Lang_status` bigint(20) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_languages` */

insert  into `tbl_languages`(`Id`,`Lang_prefix`,`Lang_fullname`,`Lang_description`,`Lang_status`,`DateCreated`) values (2,'En','English ','This is English Language',1,'2019-03-14 16:18:46'),(3,'FR','France','This is France Languages',1,'2019-04-05 15:36:33'),(4,'JP','Japan','This is Japan Language',1,'2019-04-07 11:30:18'),(5,'Th','Thailand','This is Thailand Language',1,'2019-05-06 15:49:34'),(6,'GM','Japans','This is Japan Language',1,'2019-05-09 12:58:14');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TokenKey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `isAdmin` tinyint(4) DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateCreated` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`Id`,`TokenKey`,`Name`,`Email`,`Status`,`isAdmin`,`Password`,`DateCreated`) values (1,NULL,'admin','bonvoathit@gamil.com',1,1,'$2y$10$P30PbjwH2xXmIIGXXbx6CeL9ksAgNdHbI3iNpC9.iQ8NdfQ3dpJkq','2019-04-07 15:16:25'),(2,NULL,'thary','thary.sat@gmail.com',1,0,'$2y$10$Pa5M0j0lEEJhyAanHBTkdOgN/uzpIsALfLdXZTKEwoAUm0BgXGXhu','2019-03-30 04:17:57'),(3,NULL,'sok_pisey','sok.pisey@gmail.com',1,0,'$2y$10$eez/XYwlAZ74fApZLumTDu3DgjbR4Hg.ZJeOsCTLAiPQFoi6Pw2PK','2019-04-07 15:16:41'),(4,NULL,'sopheak','sopheak.sat@gmail.com',0,0,'$2y$10$JhBwEtwGVR00wyzQzdKWtOi8ksmGaNZGi2M.e6i7bpb/PV07Eu3W2','2019-05-09 13:01:33'),(5,NULL,'sokasok','soka.sok@gmail.com',0,0,'$2y$10$k3/v9FUBb9Gdt./oujTMdughVGzKF8npXKHEXJdM3mxHkZwQenqzy','2019-04-07 15:41:12');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
