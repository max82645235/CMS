/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-08-21 17:35:12
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_collector`
-- ----------------------------
DROP TABLE IF EXISTS `cms_collector`;
CREATE TABLE `cms_collector` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `keywords` varchar(1000) NOT NULL,
  `title` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0：新建  1：开放 2：关闭  3：未知 ',
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_collector
-- ----------------------------
