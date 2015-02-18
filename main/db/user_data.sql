/*
Navicat MySQL Data Transfer

Source Server         : homestead
Source Server Version : 50538
Source Host           : localhost:33060
Source Database       : thumbsup

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-02-18 14:32:22
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user_data
-- ----------------------------
DROP TABLE IF EXISTS `user_data`;
CREATE TABLE `user_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `article_id` int(11) NOT NULL,
  `user_registration_data` varchar(255) NOT NULL,
  `hide` tinyint(1) DEFAULT '0',
  `readit` tinyint(1) DEFAULT '0',
  `favorite` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `article_id` (`article_id`),
  CONSTRAINT `article_id` FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user_data
-- ----------------------------
