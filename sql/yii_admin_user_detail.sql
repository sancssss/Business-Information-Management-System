/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : yiidatabase

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-10-12 14:40:33
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `yii_admin_user_detail`
-- ----------------------------
DROP TABLE IF EXISTS `yii_admin_user_detail`;
CREATE TABLE `yii_admin_user_detail` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(20) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `region_id` varchar(6) NOT NULL,
  `user_birthday` varchar(200) NOT NULL,
  `user_id_number` varchar(18) NOT NULL,
  `user_address` varchar(100) NOT NULL,
  `user_zip_code` varchar(10) DEFAULT NULL,
  `user_legal_person` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_admin_user_detail
-- ----------------------------
