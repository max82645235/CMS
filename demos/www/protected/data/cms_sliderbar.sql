/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-07-07 18:36:22
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
  `top` tinyint(4) NOT NULL,
  `sort` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `url` varchar(100) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COMMENT='左侧功能列表';

-- ----------------------------
-- Records of cms_sliderbar
-- ----------------------------
INSERT INTO `cms_sliderbar` VALUES ('20', '功能栏管理', 'asterisk', '1', '1', '2014-07-07 10:39:00', '0000-00-00 00:00:00', null, null);
INSERT INTO `cms_sliderbar` VALUES ('21', '功能列表', '', '0', '1', '2014-07-07 10:48:39', '0000-00-00 00:00:00', '/sliderbar/firstMenu', '20');
INSERT INTO `cms_sliderbar` VALUES ('26', ' 挂件管理', 'asterisk', '1', '2', '2014-07-07 10:55:20', '0000-00-00 00:00:00', null, null);
INSERT INTO `cms_sliderbar` VALUES ('27', ' 挂件1', '', '0', '1', '2014-07-07 10:56:06', '0000-00-00 00:00:00', '/gj/gj1', '26');
INSERT INTO `cms_sliderbar` VALUES ('28', '挂件2', '', '0', '2', '2014-07-07 10:56:24', '0000-00-00 00:00:00', '/gj/gj2', '26');
INSERT INTO `cms_sliderbar` VALUES ('29', '挂件3', '', '0', '3', '2014-07-07 10:56:42', '0000-00-00 00:00:00', '/gj/gj3', '26');
INSERT INTO `cms_sliderbar` VALUES ('30', '功能列表', '', '0', '3', '2014-07-07 10:59:33', '0000-00-00 00:00:00', '/sliderbar/tableList', '20');
