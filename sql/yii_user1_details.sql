/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : yiidatabase

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-10-12 14:39:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yii_user1_details`
-- ----------------------------
DROP TABLE IF EXISTS `yii_user1_details`;
CREATE TABLE `yii_user1_details` (
  `user_id` int(8) NOT NULL,
  `some_info` text,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_userid` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of yii_user1_details
-- ----------------------------
INSERT INTO `yii_user1_details` VALUES ('10000', '企业一的用户e');
INSERT INTO `yii_user1_details` VALUES ('10003', 'knknknknk');
INSERT INTO `yii_user1_details` VALUES ('10004', '11111');
INSERT INTO `yii_user1_details` VALUES ('10005', '11111');
INSERT INTO `yii_user1_details` VALUES ('10006', '11111111');
INSERT INTO `yii_user1_details` VALUES ('10007', '1');
