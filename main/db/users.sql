/*
Navicat MySQL Data Transfer

Source Server         : homestead
Source Server Version : 50538
Source Host           : localhost:33060
Source Database       : thumbsup

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-02-18 12:22:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL UNIQUE,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
