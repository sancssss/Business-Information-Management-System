/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : yiidatabase

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-10-12 14:40:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yii_user`
-- ----------------------------
DROP TABLE IF EXISTS `yii_user`;
CREATE TABLE `yii_user` (
  `user_id` int(8) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_identityid` tinyint(1) NOT NULL,
  `user_authkey` text,
  `user_sex` varchar(10) DEFAULT NULL COMMENT '用户性别',
  `user_phone_number` varchar(20) DEFAULT NULL COMMENT '手机',
  `user_email` varchar(50) DEFAULT NULL COMMENT '邮箱',
  `user_comment` varchar(200) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `fk_identityid` (`user_identityid`),
  CONSTRAINT `fk_identityid` FOREIGN KEY (`user_identityid`) REFERENCES `yii_identity` (`identity_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10008 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of yii_user
-- ----------------------------
INSERT INTO `yii_user` VALUES ('10000', '企业一的用户', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'cTc4MPIhQKbX78dS9sHDDTA01g2L0m5B', null, null, null, null);
INSERT INTO `yii_user` VALUES ('10001', '管理员一的用户', 'c4ca4238a0b923820dcc509a6f75849b', '2', 'XwfnrowGyW_789tzWh9x2rIzIlzWqK9F', null, null, null, null);
INSERT INTO `yii_user` VALUES ('10002', '管理员一用户', 'c4ca4238a0b923820dcc509a6f75849b', '4', 'Hy_rhjDRggrMaSs7uplq9UNhtWGqvkwQ', null, null, null, null);
INSERT INTO `yii_user` VALUES ('10003', '企业110', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'LDEmzs44A9ceT_AWp7mkZ7wE7LHlXuxv', null, null, null, null);
INSERT INTO `yii_user` VALUES ('10004', 'qiyea', 'c4ca4238a0b923820dcc509a6f75849b', '1', '6MpVGh-n88VmPLlHWjlV7GIsWE9lZvaU', null, null, null, null);
INSERT INTO `yii_user` VALUES ('10005', '企业嘻嘻嘻', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'lrwKONjqPs6b1MVK-EdKIhQ2eul77ttl', null, null, null, null);
INSERT INTO `yii_user` VALUES ('10006', 'qiyeas', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0veYCBym_0Wl3IiPAGysBTOEBC1-xNl_', null, null, null, null);
INSERT INTO `yii_user` VALUES ('10007', 'qwqw', 'c4ca4238a0b923820dcc509a6f75849b', '3', 'eOIykvd9hmrcU865Lc8H0XqBfgdaP9rH', null, null, null, null);
