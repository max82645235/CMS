/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50532
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50532
File Encoding         : 65001

Date: 2014-08-11 15:24:13
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `cms_wedding_guest`
-- ----------------------------
DROP TABLE IF EXISTS `cms_wedding_guest`;
CREATE TABLE `cms_wedding_guest` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `wedding_status` tinyint(4) NOT NULL COMMENT '参加婚庆状态',
  `salt_key` varchar(100) NOT NULL,
  `create_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `qq` int(15) NOT NULL,
  `send_status` tinyint(4) NOT NULL DEFAULT '0',
  `tel` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cms_wedding_guest
-- ----------------------------
INSERT INTO `cms_wedding_guest` VALUES ('3', '张婷婷', '1', '$2a$13$YQwvXZMlipG8c/Yr/Uj8sOWELShdtQwqXn3elucY9gXFBxbIKeDTa', '2014-08-11 07:28:52', null, '827920887', '0', null);
