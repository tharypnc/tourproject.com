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

/*Table structure for table `tbl_languages` */

DROP TABLE IF EXISTS `tbl_languages`;

CREATE TABLE `tbl_languages` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lang_prefix` varchar(10) DEFAULT NULL,
  `Lang_fullname` varchar(50) DEFAULT NULL,
  `Lang_description` varchar(255) DEFAULT NULL,
  `Lang_img` varchar(255) DEFAULT NULL,
  `Lang_status` bigint(20) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbl_languages` */

insert  into `tbl_languages`(`Id`,`Lang_prefix`,`Lang_fullname`,`Lang_description`,`Lang_img`,`Lang_status`,`DateCreated`) values (1,'Ch','Chines','This is Chines Language',NULL,1,'2019-03-14 16:14:09'),(2,'En','English ','This is English Language',NULL,1,'2019-03-14 16:18:46'),(3,'FR','France','This is France Language',NULL,1,'2019-03-16 15:56:59');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TokenKey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Status` tinyint(4) DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateCreated` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`Id`,`TokenKey`,`Name`,`Email`,`Status`,`Password`,`DateCreated`) values (1,NULL,'admin','bonvoathit@gamil.com',1,'$2y$10$P30PbjwH2xXmIIGXXbx6CeL9ksAgNdHbI3iNpC9.iQ8NdfQ3dpJkq','2016-07-18 14:15:22'),(2,NULL,'thary','thary.sat@gmail.com',1,'$2y$10$Pa5M0j0lEEJhyAanHBTkdOgN/uzpIsALfLdXZTKEwoAUm0BgXGXhu','2019-03-15 07:28:46'),(3,NULL,'sok_pisey','sok.pisey@gmail.com',1,'$2y$10$M.EMVBaN0wzNcg7Jb6.5dOejDqA1aRUDuv0XW8vW0zPwWq9fW1QB6','2019-03-16 06:19:12'),(4,NULL,'sopheak','sopheak.sat@gmail.com',1,'$2y$10$JhBwEtwGVR00wyzQzdKWtOi8ksmGaNZGi2M.e6i7bpb/PV07Eu3W2','2019-03-16 10:52:45');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
