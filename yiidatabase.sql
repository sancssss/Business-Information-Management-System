/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50540
Source Host           : localhost:3306
Source Database       : yiidatabase

Target Server Type    : MYSQL
Target Server Version : 50540
File Encoding         : 65001

Date: 2016-10-17 15:06:20
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `administrative_region`
-- ----------------------------
DROP TABLE IF EXISTS `administrative_region`;
CREATE TABLE `administrative_region` (
  `id` int(11) NOT NULL COMMENT '行政区编号',
  `region_id` int(6) NOT NULL COMMENT '行政代码',
  `region_name` tinytext NOT NULL COMMENT '行政单位名',
  `region_pinyin` tinytext NOT NULL COMMENT '行政单位拼音',
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of administrative_region
-- ----------------------------
INSERT INTO `administrative_region` VALUES ('907', '320000', '江苏省', 'JiangSuSheng');
INSERT INTO `administrative_region` VALUES ('908', '320100', '南京市', 'NanJingShi');
INSERT INTO `administrative_region` VALUES ('909', '320101', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('910', '320102', '玄武区', 'XuanWuQu');
INSERT INTO `administrative_region` VALUES ('911', '320103', '白下区', 'BaiXiaQu');
INSERT INTO `administrative_region` VALUES ('912', '320104', '秦淮区', 'QinHuaiQu');
INSERT INTO `administrative_region` VALUES ('913', '320105', '建邺区', 'JianYeQu');
INSERT INTO `administrative_region` VALUES ('914', '320106', '鼓楼区', 'GuLouQu');
INSERT INTO `administrative_region` VALUES ('915', '320107', '下关区', 'XiaGuanQu');
INSERT INTO `administrative_region` VALUES ('916', '320111', '浦口区', 'PuKouQu');
INSERT INTO `administrative_region` VALUES ('917', '320113', '栖霞区', 'QiXiaQu');
INSERT INTO `administrative_region` VALUES ('918', '320114', '雨花台区', 'YuHuaTaiQu');
INSERT INTO `administrative_region` VALUES ('919', '320115', '江宁区', 'JiangNingQu');
INSERT INTO `administrative_region` VALUES ('920', '320116', '六合区', 'LiuHeQu');
INSERT INTO `administrative_region` VALUES ('921', '320124', '溧水县', 'LiShuiXian');
INSERT INTO `administrative_region` VALUES ('922', '320125', '高淳县', 'GaoChunXian');
INSERT INTO `administrative_region` VALUES ('923', '320200', '无锡市', 'WuXiShi');
INSERT INTO `administrative_region` VALUES ('924', '320201', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('925', '320202', '崇安区', 'ChongAnQu');
INSERT INTO `administrative_region` VALUES ('926', '320203', '南长区', 'NanChangQu');
INSERT INTO `administrative_region` VALUES ('927', '320204', '北塘区', 'BeiTangQu');
INSERT INTO `administrative_region` VALUES ('928', '320205', '锡山区', 'XiShanQu');
INSERT INTO `administrative_region` VALUES ('929', '320206', '惠山区', 'HuiShanQu');
INSERT INTO `administrative_region` VALUES ('930', '320211', '滨湖区', 'BinHuQu');
INSERT INTO `administrative_region` VALUES ('931', '320281', '江阴市', 'JiangYinShi');
INSERT INTO `administrative_region` VALUES ('932', '320282', '宜兴市', 'YiXingShi');
INSERT INTO `administrative_region` VALUES ('933', '320300', '徐州市', 'XuZhouShi');
INSERT INTO `administrative_region` VALUES ('934', '320301', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('935', '320302', '鼓楼区', 'GuLouQu');
INSERT INTO `administrative_region` VALUES ('936', '320303', '云龙区', 'YunLongQu');
INSERT INTO `administrative_region` VALUES ('937', '320304', '九里区', 'JiuLiQu');
INSERT INTO `administrative_region` VALUES ('938', '320305', '贾汪区', 'JiaWangQu');
INSERT INTO `administrative_region` VALUES ('939', '320311', '泉山区', 'QuanShanQu');
INSERT INTO `administrative_region` VALUES ('940', '320321', '丰县', 'FengXian');
INSERT INTO `administrative_region` VALUES ('941', '320322', '沛县', 'PeiXian');
INSERT INTO `administrative_region` VALUES ('942', '320323', '铜山县', 'TongShanXian');
INSERT INTO `administrative_region` VALUES ('943', '320324', '睢宁县', 'HuiNingXian');
INSERT INTO `administrative_region` VALUES ('944', '320381', '新沂市', 'XinYiShi');
INSERT INTO `administrative_region` VALUES ('945', '320382', '邳州市', 'PiZhouShi');
INSERT INTO `administrative_region` VALUES ('946', '320400', '常州市', 'ChangZhouShi');
INSERT INTO `administrative_region` VALUES ('947', '320401', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('948', '320402', '天宁区', 'TianNingQu');
INSERT INTO `administrative_region` VALUES ('949', '320404', '钟楼区', 'ZhongLouQu');
INSERT INTO `administrative_region` VALUES ('950', '320405', '戚墅堰区', 'QiShuYanQu');
INSERT INTO `administrative_region` VALUES ('951', '320411', '新北区', 'XinBeiQu');
INSERT INTO `administrative_region` VALUES ('952', '320412', '武进区', 'WuJinQu');
INSERT INTO `administrative_region` VALUES ('953', '320481', '溧阳市', 'LiYangShi');
INSERT INTO `administrative_region` VALUES ('954', '320482', '金坛市', 'JinTanShi');
INSERT INTO `administrative_region` VALUES ('955', '320500', '苏州市', 'SuZhouShi');
INSERT INTO `administrative_region` VALUES ('956', '320501', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('957', '320502', '沧浪区', 'CangLangQu');
INSERT INTO `administrative_region` VALUES ('958', '320503', '平江区', 'PingJiangQu');
INSERT INTO `administrative_region` VALUES ('959', '320504', '金阊区', 'JinChangQu');
INSERT INTO `administrative_region` VALUES ('960', '320505', '虎丘区', 'HuQiuQu');
INSERT INTO `administrative_region` VALUES ('961', '320506', '吴中区', 'WuZhongQu');
INSERT INTO `administrative_region` VALUES ('962', '320507', '相城区', 'XiangChengQu');
INSERT INTO `administrative_region` VALUES ('963', '320581', '常熟市', 'ChangShuShi');
INSERT INTO `administrative_region` VALUES ('964', '320582', '张家港市', 'ZhangJiaGangShi');
INSERT INTO `administrative_region` VALUES ('965', '320583', '昆山市', 'KunShanShi');
INSERT INTO `administrative_region` VALUES ('966', '320584', '吴江市', 'WuJiangShi');
INSERT INTO `administrative_region` VALUES ('967', '320585', '太仓市', 'TaiCangShi');
INSERT INTO `administrative_region` VALUES ('968', '320600', '南通市', 'NanTongShi');
INSERT INTO `administrative_region` VALUES ('969', '320601', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('970', '320602', '崇川区', 'ChongChuanQu');
INSERT INTO `administrative_region` VALUES ('971', '320611', '港闸区', 'GangZhaQu');
INSERT INTO `administrative_region` VALUES ('972', '320621', '海安县', 'HaiAnXian');
INSERT INTO `administrative_region` VALUES ('973', '320623', '如东县', 'RuDongXian');
INSERT INTO `administrative_region` VALUES ('974', '320681', '启东市', 'QiDongShi');
INSERT INTO `administrative_region` VALUES ('975', '320682', '如皋市', 'RuGaoShi');
INSERT INTO `administrative_region` VALUES ('976', '320683', '通州市', 'TongZhouShi');
INSERT INTO `administrative_region` VALUES ('977', '320684', '海门市', 'HaiMenShi');
INSERT INTO `administrative_region` VALUES ('978', '320700', '连云港市', 'LianYunGangShi');
INSERT INTO `administrative_region` VALUES ('979', '320701', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('980', '320703', '连云区', 'LianYunQu');
INSERT INTO `administrative_region` VALUES ('981', '320705', '新浦区', 'XinPuQu');
INSERT INTO `administrative_region` VALUES ('982', '320706', '海州区', 'HaiZhouQu');
INSERT INTO `administrative_region` VALUES ('983', '320721', '赣榆县', 'GanYuXian');
INSERT INTO `administrative_region` VALUES ('984', '320722', '东海县', 'DongHaiXian');
INSERT INTO `administrative_region` VALUES ('985', '320723', '灌云县', 'GuanYunXian');
INSERT INTO `administrative_region` VALUES ('986', '320724', '灌南县', 'GuanNanXian');
INSERT INTO `administrative_region` VALUES ('987', '320800', '淮安市', 'HuaiAnShi');
INSERT INTO `administrative_region` VALUES ('988', '320801', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('989', '320802', '清河区', 'QingHeQu');
INSERT INTO `administrative_region` VALUES ('990', '320803', '楚州区', 'ChuZhouQu');
INSERT INTO `administrative_region` VALUES ('991', '320804', '淮阴区', 'HuaiYinQu');
INSERT INTO `administrative_region` VALUES ('992', '320811', '清浦区', 'QingPuQu');
INSERT INTO `administrative_region` VALUES ('993', '320826', '涟水县', 'LianShuiXian');
INSERT INTO `administrative_region` VALUES ('994', '320829', '洪泽县', 'HongZeXian');
INSERT INTO `administrative_region` VALUES ('995', '320830', '盱眙县', 'XuYiXian');
INSERT INTO `administrative_region` VALUES ('996', '320831', '金湖县', 'JinHuXian');
INSERT INTO `administrative_region` VALUES ('997', '320900', '盐城市', 'YanChengShi');
INSERT INTO `administrative_region` VALUES ('998', '320901', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('999', '320902', '亭湖区', 'TingHuQu');
INSERT INTO `administrative_region` VALUES ('1000', '320903', '盐都区', 'YanDuQu');
INSERT INTO `administrative_region` VALUES ('1001', '320921', '响水县', 'XiangShuiXian');
INSERT INTO `administrative_region` VALUES ('1002', '320922', '滨海县', 'BinHaiXian');
INSERT INTO `administrative_region` VALUES ('1003', '320923', '阜宁县', 'FuNingXian');
INSERT INTO `administrative_region` VALUES ('1004', '320924', '射阳县', 'SheYangXian');
INSERT INTO `administrative_region` VALUES ('1005', '320925', '建湖县', 'JianHuXian');
INSERT INTO `administrative_region` VALUES ('1006', '320981', '东台市', 'DongTaiShi');
INSERT INTO `administrative_region` VALUES ('1007', '320982', '大丰市', 'DaFengShi');
INSERT INTO `administrative_region` VALUES ('1008', '321000', '扬州市', 'YangZhouShi');
INSERT INTO `administrative_region` VALUES ('1009', '321001', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('1010', '321002', '广陵区', 'GuangLingQu');
INSERT INTO `administrative_region` VALUES ('1011', '321003', '邗江区', 'HanJiangQu');
INSERT INTO `administrative_region` VALUES ('1012', '321011', '维扬区', 'WeiYangQu');
INSERT INTO `administrative_region` VALUES ('1013', '321023', '宝应县', 'BaoYingXian');
INSERT INTO `administrative_region` VALUES ('1014', '321081', '仪征市', 'YiZhengShi');
INSERT INTO `administrative_region` VALUES ('1015', '321084', '高邮市', 'GaoYouShi');
INSERT INTO `administrative_region` VALUES ('1016', '321088', '江都市', 'JiangDuShi');
INSERT INTO `administrative_region` VALUES ('1017', '321100', '镇江市', 'ZhenJiangShi');
INSERT INTO `administrative_region` VALUES ('1018', '321101', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('1019', '321102', '京口区', 'JingKouQu');
INSERT INTO `administrative_region` VALUES ('1020', '321111', '润州区', 'RunZhouQu');
INSERT INTO `administrative_region` VALUES ('1021', '321112', '丹徒区', 'DanTuQu');
INSERT INTO `administrative_region` VALUES ('1022', '321181', '丹阳市', 'DanYangShi');
INSERT INTO `administrative_region` VALUES ('1023', '321182', '扬中市', 'YangZhongShi');
INSERT INTO `administrative_region` VALUES ('1024', '321183', '句容市', 'JuRongShi');
INSERT INTO `administrative_region` VALUES ('1025', '321200', '泰州市', 'TaiZhouShi');
INSERT INTO `administrative_region` VALUES ('1026', '321201', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('1027', '321202', '海陵区', 'HaiLingQu');
INSERT INTO `administrative_region` VALUES ('1028', '321203', '高港区', 'GaoGangQu');
INSERT INTO `administrative_region` VALUES ('1029', '321281', '兴化市', 'XingHuaShi');
INSERT INTO `administrative_region` VALUES ('1030', '321282', '靖江市', 'JingJiangShi');
INSERT INTO `administrative_region` VALUES ('1031', '321283', '泰兴市', 'TaiXingShi');
INSERT INTO `administrative_region` VALUES ('1032', '321284', '姜堰市', 'JiangYanShi');
INSERT INTO `administrative_region` VALUES ('1033', '321300', '宿迁市', 'SuQianShi');
INSERT INTO `administrative_region` VALUES ('1034', '321301', '市辖区', 'ShiXiaQu');
INSERT INTO `administrative_region` VALUES ('1035', '321302', '宿城区', 'SuChengQu');
INSERT INTO `administrative_region` VALUES ('1036', '321311', '宿豫区', 'SuYuQu');
INSERT INTO `administrative_region` VALUES ('1037', '321322', '沭阳县', 'ShuYangXian');
INSERT INTO `administrative_region` VALUES ('1038', '321323', '泗阳县', 'SiYangXian');
INSERT INTO `administrative_region` VALUES ('1039', '321324', '泗洪县', 'SiHongXian');
INSERT INTO `administrative_region` VALUES ('1040', '321400', '农场', 'NongChang');
INSERT INTO `administrative_region` VALUES ('1041', '321401', '黄海与新洋农场', 'HuangHaiYuXinYangNongChang');
INSERT INTO `administrative_region` VALUES ('1042', '321402', '东辛中心农场', 'DongXinZhongXinNongChang');
INSERT INTO `administrative_region` VALUES ('1043', '321403', '淮海中心农场', 'HuaiHaiZhongXinNongChang');
INSERT INTO `administrative_region` VALUES ('3864', '321004', '开发区', 'KaiFaQu');
INSERT INTO `administrative_region` VALUES ('3874', '321113', '新区', 'XinQu');

-- ----------------------------
-- Table structure for `auth_assignment`
-- ----------------------------
DROP TABLE IF EXISTS `auth_assignment`;
CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) NOT NULL,
  `user_id` int(8) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`item_name`,`user_id`),
  KEY `fk_auth_userid` (`user_id`),
  CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_auth_userid` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_assignment
-- ----------------------------
INSERT INTO `auth_assignment` VALUES ('checked_user', '10000', '1475214704');
INSERT INTO `auth_assignment` VALUES ('checked_user', '10003', '1475998009');
INSERT INTO `auth_assignment` VALUES ('checked_user', '10004', '1475999691');
INSERT INTO `auth_assignment` VALUES ('checked_user', '10005', '1475999569');
INSERT INTO `auth_assignment` VALUES ('checked_user', '10006', '1475999569');
INSERT INTO `auth_assignment` VALUES ('manager_user', '10001', '1475214704');
INSERT INTO `auth_assignment` VALUES ('nochecked_manager_user', '10002', '1475214704');
INSERT INTO `auth_assignment` VALUES ('nochecked_user', '10000', '1475214223');
INSERT INTO `auth_assignment` VALUES ('nochecked_user', '10007', '1476079581');

-- ----------------------------
-- Table structure for `auth_item`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item`;
CREATE TABLE `auth_item` (
  `name` varchar(64) NOT NULL,
  `type` int(11) NOT NULL,
  `description` text,
  `rule_name` varchar(64) DEFAULT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`),
  KEY `rule_name` (`rule_name`),
  KEY `type` (`type`),
  CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item
-- ----------------------------
INSERT INTO `auth_item` VALUES ('admin_user', '0', null, null, null, '1475117253', '1475117253');
INSERT INTO `auth_item` VALUES ('checked_user', '0', null, null, null, '1475117252', '1475117252');
INSERT INTO `auth_item` VALUES ('city_admin', '5', null, null, null, '1476433265', '1476433265');
INSERT INTO `auth_item` VALUES ('company', '1', null, null, null, '1476433264', '1476433264');
INSERT INTO `auth_item` VALUES ('county_admin', '3', null, null, null, '1476433265', '1476433265');
INSERT INTO `auth_item` VALUES ('manager_user', '0', null, null, null, '1475117253', '1475117253');
INSERT INTO `auth_item` VALUES ('nochecked_manager_user', '0', null, null, null, '1475213392', '1475213392');
INSERT INTO `auth_item` VALUES ('nochecked_user', '0', null, null, null, '1475117253', '1475117253');
INSERT INTO `auth_item` VALUES ('notcheck_city_admin', '6', null, null, null, '1476433265', '1476433265');
INSERT INTO `auth_item` VALUES ('notcheck_company', '2', null, null, null, '1476433265', '1476433265');
INSERT INTO `auth_item` VALUES ('notcheck_county_admin', '4', null, null, null, '1476433265', '1476433265');
INSERT INTO `auth_item` VALUES ('notcheck_province_admin', '8', null, null, null, '1476433265', '1476433265');
INSERT INTO `auth_item` VALUES ('province_admin', '7', null, null, null, '1476433265', '1476433265');
INSERT INTO `auth_item` VALUES ('system_admin', '9', null, null, null, '1476433265', '1476433265');

-- ----------------------------
-- Table structure for `auth_item_child`
-- ----------------------------
DROP TABLE IF EXISTS `auth_item_child`;
CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_item_child
-- ----------------------------
INSERT INTO `auth_item_child` VALUES ('admin_user', 'checked_user');
INSERT INTO `auth_item_child` VALUES ('province_admin', 'city_admin');
INSERT INTO `auth_item_child` VALUES ('province_admin', 'company');
INSERT INTO `auth_item_child` VALUES ('province_admin', 'county_admin');
INSERT INTO `auth_item_child` VALUES ('admin_user', 'manager_user');
INSERT INTO `auth_item_child` VALUES ('admin_user', 'nochecked_manager_user');
INSERT INTO `auth_item_child` VALUES ('system_admin', 'province_admin');

-- ----------------------------
-- Table structure for `auth_rule`
-- ----------------------------
DROP TABLE IF EXISTS `auth_rule`;
CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth_rule
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_admin_user_details`
-- ----------------------------
DROP TABLE IF EXISTS `yii_admin_user_details`;
CREATE TABLE `yii_admin_user_details` (
  `user_id` int(20) NOT NULL,
  `user_nickname` varchar(20) NOT NULL COMMENT '用户姓名',
  `user_sex` varchar(10) NOT NULL COMMENT '用户性别',
  `user_phone_number` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `user_email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `user_birthday` varchar(200) NOT NULL COMMENT '用户生日',
  `user_id_number` varchar(18) NOT NULL COMMENT '身份证号',
  `user_address` varchar(100) NOT NULL COMMENT '单位地址',
  `user_zip_code` varchar(10) DEFAULT NULL COMMENT '单位邮编',
  `user_legal_person` varchar(20) DEFAULT NULL COMMENT '单位法人',
  `user_comment` varchar(200) DEFAULT NULL COMMENT '备注信息',
  `user_type` varchar(20) NOT NULL COMMENT '用户类型',
  `region_id` int(6) NOT NULL COMMENT '行政代码',
  PRIMARY KEY (`user_id`),
  KEY `fk_admin_region` (`region_id`),
  CONSTRAINT `fk_admin_region` FOREIGN KEY (`region_id`) REFERENCES `administrative_region` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_admin_userid` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_admin_user_details
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_company`
-- ----------------------------
DROP TABLE IF EXISTS `yii_company`;
CREATE TABLE `yii_company` (
  `company_id` int(20) NOT NULL COMMENT '企业编号',
  `user_id` int(20) NOT NULL COMMENT '用户编号',
  `company_name` varchar(50) NOT NULL COMMENT '企业名称',
  `company_credit_code` varchar(20) DEFAULT NULL COMMENT '社会信用代码',
  `company_charater` varchar(20) DEFAULT NULL COMMENT '注册性质',
  `company_registered_capital` varchar(20) DEFAULT NULL COMMENT '注册资本',
  `company_established_time` varchar(20) DEFAULT NULL COMMENT '成立时间',
  `company_region_id` int(6) DEFAULT NULL COMMENT '行政代码',
  `company_re_province` varchar(20) DEFAULT NULL COMMENT '注册省市',
  `company_reg_city` varchar(20) DEFAULT NULL COMMENT '注册地市',
  `company_reg_county` varchar(20) DEFAULT NULL COMMENT '注册县市',
  `company_reg_address` varchar(50) DEFAULT NULL COMMENT '注册地址',
  `company_reg_longitude` decimal(10,0) DEFAULT NULL COMMENT '注册经度',
  `company_reg_latitude` decimal(10,0) DEFAULT NULL COMMENT '注册纬度',
  `company_prod_province` varchar(20) DEFAULT NULL COMMENT '生产省市',
  `company_prod_city` varchar(20) DEFAULT NULL COMMENT '生产地市',
  `company_prod_county` varchar(20) DEFAULT NULL COMMENT '生产县市',
  `company_prod_address` varchar(50) DEFAULT NULL COMMENT '生产地址',
  `company_prod_longitude` decimal(10,0) DEFAULT NULL COMMENT '生产经度',
  `company_prod_latitude` decimal(10,0) DEFAULT NULL COMMENT '生产纬度',
  `company_doctor_num` int(11) DEFAULT NULL COMMENT '博士学历人数',
  `company_master_num` int(11) DEFAULT NULL COMMENT '硕士学历人数',
  `company_bachelor_num` int(11) DEFAULT NULL COMMENT '本科学历人数',
  `company_juniorcollege_num` int(11) DEFAULT NULL COMMENT '大专学历人数',
  `company_staff_num` int(11) DEFAULT NULL COMMENT '职工学历人数',
  `verified` tinyint(4) DEFAULT NULL COMMENT '审核状态',
  `company_comment` varchar(200) DEFAULT NULL COMMENT '备注信息',
  PRIMARY KEY (`company_id`),
  KEY `user_id` (`user_id`),
  KEY `yii_company_ibfk_1` (`company_region_id`),
  CONSTRAINT `yii_company_ibfk_1` FOREIGN KEY (`company_region_id`) REFERENCES `yii_company_user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_company_ibfk_2` FOREIGN KEY (`company_region_id`) REFERENCES `administrative_region` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_company
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_company_manager`
-- ----------------------------
DROP TABLE IF EXISTS `yii_company_manager`;
CREATE TABLE `yii_company_manager` (
  `company_id` int(20) NOT NULL COMMENT '企业编号',
  `manager_type` varchar(20) DEFAULT NULL COMMENT '负责人类型',
  `manager_sex` tinyint(1) DEFAULT NULL COMMENT '负责人性别',
  `manager_idnumber` int(18) DEFAULT NULL COMMENT '身份证号码',
  `manager_mobilephone` int(18) DEFAULT NULL COMMENT '联系手机',
  `manager_telephone` int(18) DEFAULT NULL COMMENT '联系电话',
  `manager_fax` int(18) DEFAULT NULL COMMENT '联系传真',
  `manager_email` varchar(20) DEFAULT NULL COMMENT '联系邮箱',
  `manager_address` varchar(50) DEFAULT NULL COMMENT '联系地址',
  `manager_zip_code` varchar(10) DEFAULT NULL COMMENT '联系邮编',
  `manager_comment` varchar(200) DEFAULT NULL COMMENT '备注信息',
  PRIMARY KEY (`company_id`),
  CONSTRAINT `yii_company_manager_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `yii_company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_company_manager
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_company_user_details`
-- ----------------------------
DROP TABLE IF EXISTS `yii_company_user_details`;
CREATE TABLE `yii_company_user_details` (
  `user_id` int(20) NOT NULL,
  `user_nickname` varchar(20) NOT NULL COMMENT '用户姓名',
  `user_sex` varchar(10) DEFAULT NULL COMMENT '用户性别',
  `user_phone_number` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `user_email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `user_comment` varchar(200) DEFAULT NULL COMMENT '备注信息',
  PRIMARY KEY (`user_id`),
  CONSTRAINT `fk_enterprise_userid` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_company_user_details
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_file`
-- ----------------------------
DROP TABLE IF EXISTS `yii_file`;
CREATE TABLE `yii_file` (
  `file_id` int(11) NOT NULL DEFAULT '0',
  `file_name` varchar(50) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `file_path` varchar(50) DEFAULT NULL,
  `file_comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_file
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_identity`
-- ----------------------------
DROP TABLE IF EXISTS `yii_identity`;
CREATE TABLE `yii_identity` (
  `identity_id` tinyint(1) NOT NULL,
  `identity_name` tinytext NOT NULL,
  PRIMARY KEY (`identity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of yii_identity
-- ----------------------------
INSERT INTO `yii_identity` VALUES ('1', '企业单位');
INSERT INTO `yii_identity` VALUES ('2', '未审核企业单位');
INSERT INTO `yii_identity` VALUES ('3', '县级管理员');
INSERT INTO `yii_identity` VALUES ('4', '未审核县级管理员');
INSERT INTO `yii_identity` VALUES ('5', '市级管理员');
INSERT INTO `yii_identity` VALUES ('6', '未审核市级管理员');
INSERT INTO `yii_identity` VALUES ('7', '省级管理员');
INSERT INTO `yii_identity` VALUES ('8', '未审核省级管理员');
INSERT INTO `yii_identity` VALUES ('9', '系统管理员');

-- ----------------------------
-- Table structure for `yii_image_file`
-- ----------------------------
DROP TABLE IF EXISTS `yii_image_file`;
CREATE TABLE `yii_image_file` (
  `company_id` int(12) NOT NULL,
  `image_type` varchar(20) DEFAULT NULL,
  `display_order` tinyint(1) DEFAULT NULL,
  `file_id` int(11) NOT NULL,
  `image_comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`company_id`),
  KEY `file_id` (`file_id`),
  CONSTRAINT `yii_image_file_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `yii_company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_image_file_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `yii_file` (`file_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_image_file
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_message_verification`
-- ----------------------------
DROP TABLE IF EXISTS `yii_message_verification`;
CREATE TABLE `yii_message_verification` (
  `id` int(11) NOT NULL COMMENT '内部编号',
  `user_id` int(20) NOT NULL COMMENT '用户编号',
  `verification_id` varchar(50) NOT NULL COMMENT '验证账号',
  `verification_type` varchar(10) NOT NULL COMMENT '验证类型',
  `verification_code` varchar(10) NOT NULL COMMENT '验证编码',
  `verification_time` int(12) NOT NULL,
  `verification_comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_message_verification
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_user`
-- ----------------------------
DROP TABLE IF EXISTS `yii_user`;
CREATE TABLE `yii_user` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(32) NOT NULL,
  `user_identityid` tinyint(1) NOT NULL,
  `user_authkey` text,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_name` (`user_name`),
  KEY `fk_identityid` (`user_identityid`),
  CONSTRAINT `fk_identityid` FOREIGN KEY (`user_identityid`) REFERENCES `yii_identity` (`identity_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10008 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of yii_user
-- ----------------------------
INSERT INTO `yii_user` VALUES ('10000', '企业一的用户', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'cTc4MPIhQKbX78dS9sHDDTA01g2L0m5B');
INSERT INTO `yii_user` VALUES ('10001', '管理员一的用户', 'c4ca4238a0b923820dcc509a6f75849b', '2', 'XwfnrowGyW_789tzWh9x2rIzIlzWqK9F');
INSERT INTO `yii_user` VALUES ('10002', '管理员一用户', 'c4ca4238a0b923820dcc509a6f75849b', '4', 'Hy_rhjDRggrMaSs7uplq9UNhtWGqvkwQ');
INSERT INTO `yii_user` VALUES ('10003', '企业110', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'LDEmzs44A9ceT_AWp7mkZ7wE7LHlXuxv');
INSERT INTO `yii_user` VALUES ('10004', 'qiyea', 'c4ca4238a0b923820dcc509a6f75849b', '1', '6MpVGh-n88VmPLlHWjlV7GIsWE9lZvaU');
INSERT INTO `yii_user` VALUES ('10005', '企业嘻嘻嘻', 'c4ca4238a0b923820dcc509a6f75849b', '1', 'lrwKONjqPs6b1MVK-EdKIhQ2eul77ttl');
INSERT INTO `yii_user` VALUES ('10006', 'qiyeas', 'c4ca4238a0b923820dcc509a6f75849b', '1', '0veYCBym_0Wl3IiPAGysBTOEBC1-xNl_');
INSERT INTO `yii_user` VALUES ('10007', 'qwqw', 'c4ca4238a0b923820dcc509a6f75849b', '3', 'eOIykvd9hmrcU865Lc8H0XqBfgdaP9rH');

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

-- ----------------------------
-- Table structure for `yii_user2_details`
-- ----------------------------
DROP TABLE IF EXISTS `yii_user2_details`;
CREATE TABLE `yii_user2_details` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `userid` int(8) NOT NULL,
  `some_info` text,
  PRIMARY KEY (`id`),
  KEY `fk_userid1` (`userid`),
  CONSTRAINT `fk_userid1` FOREIGN KEY (`userid`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=gbk;

-- ----------------------------
-- Records of yii_user2_details
-- ----------------------------
INSERT INTO `yii_user2_details` VALUES ('1', '10001', '管理员一的用户');
INSERT INTO `yii_user2_details` VALUES ('2', '10002', '管理员一的用户');

-- ----------------------------
-- Table structure for `yii_verified_company`
-- ----------------------------
DROP TABLE IF EXISTS `yii_verified_company`;
CREATE TABLE `yii_verified_company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(20) NOT NULL,
  `verified_user_id` int(20) NOT NULL,
  `verified_status` int(11) NOT NULL,
  `verified_time` int(12) DEFAULT NULL,
  `verified_information` varchar(200) DEFAULT NULL,
  `verified_comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `company_id` (`company_id`),
  KEY `verified_user_id` (`verified_user_id`),
  CONSTRAINT `yii_verified_company_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `yii_company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_verified_company_ibfk_2` FOREIGN KEY (`verified_user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_verified_company
-- ----------------------------

-- ----------------------------
-- Table structure for `yii_verified_manager`
-- ----------------------------
DROP TABLE IF EXISTS `yii_verified_manager`;
CREATE TABLE `yii_verified_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_user_id` int(20) NOT NULL,
  `verified_user_id` int(20) NOT NULL,
  `verified_status` int(11) NOT NULL,
  `verified_information` varchar(200) DEFAULT NULL,
  `verified_comment` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `admin_user_id` (`admin_user_id`),
  KEY `verified_user_id` (`verified_user_id`),
  CONSTRAINT `yii_verified_manager_ibfk_1` FOREIGN KEY (`admin_user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_verified_manager_ibfk_2` FOREIGN KEY (`verified_user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of yii_verified_manager
-- ----------------------------
