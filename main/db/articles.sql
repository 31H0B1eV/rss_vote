/*
Navicat MySQL Data Transfer

Source Server         : homestead
Source Server Version : 50538
Source Host           : localhost:33060
Source Database       : votes

Target Server Type    : MYSQL
Target Server Version : 50538
File Encoding         : 65001

Date: 2015-02-18 11:24:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for articles
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `pubDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of articles
-- ----------------------------
