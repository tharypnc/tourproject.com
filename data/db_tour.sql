/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50637
Source Host           : localhost:3306
Source Database       : db_tour

Target Server Type    : MYSQL
Target Server Version : 50637
File Encoding         : 65001

Date: 2019-02-20 17:51:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_languages
-- ----------------------------
DROP TABLE IF EXISTS `tbl_languages`;
CREATE TABLE `tbl_languages` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Lang_prefix` varchar(10) DEFAULT NULL,
  `Lang_fullname` varchar(50) DEFAULT NULL,
  `Lang_description` varchar(255) DEFAULT NULL,
  `Lang_status` bigint(20) DEFAULT NULL,
  `DateCreated` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_languages
-- ----------------------------

-- ----------------------------
-- Table structure for Users
-- ----------------------------
DROP TABLE IF EXISTS `Users`;
CREATE TABLE `Users` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TokenKey` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DateCreated` datetime NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of Users
-- ----------------------------
INSERT INTO `Users` VALUES ('1', null, 'admin', 'bonvoathit@gamil.com', '$2y$10$P30PbjwH2xXmIIGXXbx6CeL9ksAgNdHbI3iNpC9.iQ8NdfQ3dpJkq', '2016-07-18 14:15:22');
