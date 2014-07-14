/*
Navicat MySQL Data Transfer

Source Server         : cms
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-07-14 22:45:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_finance`
-- ----------------------------
DROP TABLE IF EXISTS `cms_finance`;
CREATE TABLE `cms_finance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` float NOT NULL,
  `dayTime` date NOT NULL COMMENT '进出帐日期',
  `createTime` datetime NOT NULL,
  `type` int(11) NOT NULL COMMENT '财务类型',
  `payIncome` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cms_finance
-- ----------------------------
INSERT INTO `cms_finance` VALUES ('1', 'cesd1', '水电费', '11', '2014-07-13', '2014-07-13 21:29:46', '0', '1');
INSERT INTO `cms_finance` VALUES ('2', 'ssdfsdf', '撒地方', '22', '2014-07-08', '2014-07-09 21:30:00', '0', '1');
INSERT INTO `cms_finance` VALUES ('3', 'df', 'asdfasdf', '11', '0000-00-00', '0000-00-00 00:00:00', '0', '1');
