/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-07-04 17:37:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_sliderbar`
-- ----------------------------
DROP TABLE IF EXISTS `cms_sliderbar`;
CREATE TABLE `cms_sliderbar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `icon` varchar(50) DEFAULT NULL,
  `top` tinyint(4) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '1',
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `url` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='左侧功能列表';

-- ----------------------------
-- Records of cms_sliderbar
-- ----------------------------
INSERT INTO `cms_sliderbar` VALUES ('1', '123123', null, '0', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');
