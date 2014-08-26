/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-08-26 14:07:21
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_collector_rules`
-- ----------------------------
DROP TABLE IF EXISTS `cms_collector_rules`;
CREATE TABLE `cms_collector_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_type` tinyint(4) NOT NULL,
  `rule_str` varchar(200) NOT NULL,
  `rule_status` tinyint(4) NOT NULL,
  `create_time` datetime NOT NULL,
  `collector_id` int(11) NOT NULL,
  `end_str` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_collector_rules
-- ----------------------------
INSERT INTO `cms_collector_rules` VALUES ('4', '1', '对!不!起', '2', '2014-08-26 03:29:29', '1', '456456');
INSERT INTO `cms_collector_rules` VALUES ('5', '2', '<a href=\"signup.php\">', '1', '2014-08-26 07:57:06', '2', null);
