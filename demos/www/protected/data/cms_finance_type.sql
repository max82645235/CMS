/*
Navicat MySQL Data Transfer

Source Server         : cms
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-07-16 23:37:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_finance_type`
-- ----------------------------
DROP TABLE IF EXISTS `cms_finance_type`;
CREATE TABLE `cms_finance_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fid` int(11) DEFAULT NULL,
  `createTime` datetime NOT NULL,
  `payIncome` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cms_finance_type
-- ----------------------------
INSERT INTO `cms_finance_type` VALUES ('1', '娱乐', null, '2014-07-16 17:12:00', '0');
INSERT INTO `cms_finance_type` VALUES ('2', '看电影', '1', '2014-07-16 17:15:59', '0');
INSERT INTO `cms_finance_type` VALUES ('3', '饮食', null, '2014-07-16 17:17:00', '0');
INSERT INTO `cms_finance_type` VALUES ('4', '日常伙食', '3', '2014-07-16 17:17:17', '0');
INSERT INTO `cms_finance_type` VALUES ('5', '团购', '3', '2014-07-16 17:23:43', '0');
