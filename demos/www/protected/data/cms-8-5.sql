/*
Navicat MySQL Data Transfer

Source Server         : cms
Source Server Version : 50611
Source Host           : localhost:3306
Source Database       : cms

Target Server Type    : MYSQL
Target Server Version : 50611
File Encoding         : 65001

Date: 2014-08-05 22:22:54
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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cms_finance
-- ----------------------------
INSERT INTO `cms_finance` VALUES ('1', 'cesd1', '水电费', '11', '2014-07-21', '2014-07-13 21:29:46', '6', '2');
INSERT INTO `cms_finance` VALUES ('2', 'ssdfsdf', '撒地方', '22', '2014-07-21', '2014-07-09 21:30:00', '4', '1');
INSERT INTO `cms_finance` VALUES ('4', '当日记录1', '11', '12.5', '2014-07-20', '2014-07-20 06:20:21', '2', '1');
INSERT INTO `cms_finance` VALUES ('5', '公交卡', '', '12', '2014-07-21', '2014-07-21 15:08:45', '3', '1');
INSERT INTO `cms_finance` VALUES ('6', '工资条', '11', '4400', '2014-07-21', '2014-07-21 15:12:01', '7', '2');
INSERT INTO `cms_finance` VALUES ('7', '公交卡', '', '100', '2014-08-05', '2014-08-05 15:11:05', '4', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cms_finance_type
-- ----------------------------
INSERT INTO `cms_finance_type` VALUES ('1', '娱乐', null, '2014-07-16 17:12:00', '1');
INSERT INTO `cms_finance_type` VALUES ('2', '看电影', '1', '2014-07-16 17:15:59', '1');
INSERT INTO `cms_finance_type` VALUES ('3', '饮食', null, '2014-07-16 17:17:00', '1');
INSERT INTO `cms_finance_type` VALUES ('4', '日常伙食', '3', '2014-07-16 17:17:17', '1');
INSERT INTO `cms_finance_type` VALUES ('5', '团购', '3', '2014-07-16 17:23:43', '2');
INSERT INTO `cms_finance_type` VALUES ('6', '游戏充值', '1', '2014-07-21 14:40:28', '0');
INSERT INTO `cms_finance_type` VALUES ('7', '工资', null, '2014-07-21 15:11:22', '2');

-- ----------------------------
-- Table structure for `cms_gallery_type`
-- ----------------------------
DROP TABLE IF EXISTS `cms_gallery_type`;
CREATE TABLE `cms_gallery_type` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orderNum` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cms_gallery_type
-- ----------------------------

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='左侧功能列表';

-- ----------------------------
-- Records of cms_sliderbar
-- ----------------------------
INSERT INTO `cms_sliderbar` VALUES ('20', '功能栏管理', 'asterisk', '1', '2', '2014-07-07 10:39:00', '2014-07-07 16:38:54', null, null);
INSERT INTO `cms_sliderbar` VALUES ('30', '功能列表', '', '0', '3', '2014-07-07 10:59:33', '0000-00-00 00:00:00', '/sliderbar/tableList', '20');
INSERT INTO `cms_sliderbar` VALUES ('32', '主页', 'home', '1', '1', '2014-07-07 16:40:21', '2014-07-10 16:58:29', '/site/home', null);
INSERT INTO `cms_sliderbar` VALUES ('33', '用户管理', 'user', '1', '3', '2014-07-10 14:41:56', '0000-00-00 00:00:00', '', null);
INSERT INTO `cms_sliderbar` VALUES ('34', '用户列表', '', '0', '1', '2014-07-10 14:59:38', '0000-00-00 00:00:00', '/user/tableList', '33');
INSERT INTO `cms_sliderbar` VALUES ('35', '财务管理', 'briefcase', '1', '4', '2014-07-14 14:38:55', '0000-00-00 00:00:00', '', null);
INSERT INTO `cms_sliderbar` VALUES ('36', '财务流水', '', '0', '1', '2014-07-14 14:40:01', '0000-00-00 00:00:00', '/finance/index', '35');
INSERT INTO `cms_sliderbar` VALUES ('37', '收支类型', '', '0', '2', '2014-07-16 16:47:56', '0000-00-00 00:00:00', '/finance/typeList', '35');
INSERT INTO `cms_sliderbar` VALUES ('39', '财务图表', '', '0', '3', '2014-07-21 15:46:11', '0000-00-00 00:00:00', '/finance/charts', '35');
INSERT INTO `cms_sliderbar` VALUES ('40', '婚庆管理', '', '1', '5', '2014-08-05 15:51:39', '0000-00-00 00:00:00', '', null);
INSERT INTO `cms_sliderbar` VALUES ('41', '图片管理', '', '0', '1', '2014-08-05 15:57:27', '0000-00-00 00:00:00', '/wedding/imageManager/index', '40');

-- ----------------------------
-- Table structure for `cms_user`
-- ----------------------------
DROP TABLE IF EXISTS `cms_user`;
CREATE TABLE `cms_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 NOT NULL,
  `realName` varchar(100) CHARACTER SET utf8 DEFAULT NULL,
  `createTime` datetime NOT NULL,
  `loginTime` datetime DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cms_user
-- ----------------------------
INSERT INTO `cms_user` VALUES ('1', 'max82645235', '$2a$13$lxHiSVdGgS3vsv1OouNxpuAJMXBPzkxguHsxO35vpSzc6PjsbbrJ.', '小猴子', '2014-07-09 16:00:02', null, '1');

-- ----------------------------
-- Table structure for `cms_wedding_image`
-- ----------------------------
DROP TABLE IF EXISTS `cms_wedding_image`;
CREATE TABLE `cms_wedding_image` (
  `id` int(11) NOT NULL,
  `src` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `picOrder` int(11) NOT NULL,
  `galleryType` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of cms_wedding_image
-- ----------------------------
