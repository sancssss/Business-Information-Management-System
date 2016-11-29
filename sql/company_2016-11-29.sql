# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.16)
# Database: company
# Generation Time: 2016-11-29 11:04:58 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table administrative_region
# ------------------------------------------------------------

DROP TABLE IF EXISTS `administrative_region`;

CREATE TABLE `administrative_region` (
  `id` int(11) NOT NULL COMMENT '行政区编号',
  `region_id` int(6) NOT NULL COMMENT '行政代码',
  `region_name` tinytext NOT NULL COMMENT '行政单位名',
  `region_pinyin` tinytext NOT NULL COMMENT '行政单位拼音',
  PRIMARY KEY (`id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `administrative_region` WRITE;
/*!40000 ALTER TABLE `administrative_region` DISABLE KEYS */;

INSERT INTO `administrative_region` (`id`, `region_id`, `region_name`, `region_pinyin`)
VALUES
	(907,320000,'江苏省','JiangSuSheng'),
	(908,320100,'南京市','NanJingShi'),
	(909,320101,'市辖区','ShiXiaQu'),
	(910,320102,'玄武区','XuanWuQu'),
	(911,320103,'白下区','BaiXiaQu'),
	(912,320104,'秦淮区','QinHuaiQu'),
	(913,320105,'建邺区','JianYeQu'),
	(914,320106,'鼓楼区','GuLouQu'),
	(915,320107,'下关区','XiaGuanQu'),
	(916,320111,'浦口区','PuKouQu'),
	(917,320113,'栖霞区','QiXiaQu'),
	(918,320114,'雨花台区','YuHuaTaiQu'),
	(919,320115,'江宁区','JiangNingQu'),
	(920,320116,'六合区','LiuHeQu'),
	(921,320124,'溧水县','LiShuiXian'),
	(922,320125,'高淳县','GaoChunXian'),
	(923,320200,'无锡市','WuXiShi'),
	(924,320201,'市辖区','ShiXiaQu'),
	(925,320202,'崇安区','ChongAnQu'),
	(926,320203,'南长区','NanChangQu'),
	(927,320204,'北塘区','BeiTangQu'),
	(928,320205,'锡山区','XiShanQu'),
	(929,320206,'惠山区','HuiShanQu'),
	(930,320211,'滨湖区','BinHuQu'),
	(931,320281,'江阴市','JiangYinShi'),
	(932,320282,'宜兴市','YiXingShi'),
	(933,320300,'徐州市','XuZhouShi'),
	(934,320301,'市辖区','ShiXiaQu'),
	(935,320302,'鼓楼区','GuLouQu'),
	(936,320303,'云龙区','YunLongQu'),
	(937,320304,'九里区','JiuLiQu'),
	(938,320305,'贾汪区','JiaWangQu'),
	(939,320311,'泉山区','QuanShanQu'),
	(940,320321,'丰县','FengXian'),
	(941,320322,'沛县','PeiXian'),
	(942,320323,'铜山县','TongShanXian'),
	(943,320324,'睢宁县','HuiNingXian'),
	(944,320381,'新沂市','XinYiShi'),
	(945,320382,'邳州市','PiZhouShi'),
	(946,320400,'常州市','ChangZhouShi'),
	(947,320401,'市辖区','ShiXiaQu'),
	(948,320402,'天宁区','TianNingQu'),
	(949,320404,'钟楼区','ZhongLouQu'),
	(950,320405,'戚墅堰区','QiShuYanQu'),
	(951,320411,'新北区','XinBeiQu'),
	(952,320412,'武进区','WuJinQu'),
	(953,320481,'溧阳市','LiYangShi'),
	(954,320482,'金坛市','JinTanShi'),
	(955,320500,'苏州市','SuZhouShi'),
	(956,320501,'市辖区','ShiXiaQu'),
	(957,320502,'沧浪区','CangLangQu'),
	(958,320503,'平江区','PingJiangQu'),
	(959,320504,'金阊区','JinChangQu'),
	(960,320505,'虎丘区','HuQiuQu'),
	(961,320506,'吴中区','WuZhongQu'),
	(962,320507,'相城区','XiangChengQu'),
	(963,320581,'常熟市','ChangShuShi'),
	(964,320582,'张家港市','ZhangJiaGangShi'),
	(965,320583,'昆山市','KunShanShi'),
	(966,320584,'吴江市','WuJiangShi'),
	(967,320585,'太仓市','TaiCangShi'),
	(968,320600,'南通市','NanTongShi'),
	(969,320601,'市辖区','ShiXiaQu'),
	(970,320602,'崇川区','ChongChuanQu'),
	(971,320611,'港闸区','GangZhaQu'),
	(972,320621,'海安县','HaiAnXian'),
	(973,320623,'如东县','RuDongXian'),
	(974,320681,'启东市','QiDongShi'),
	(975,320682,'如皋市','RuGaoShi'),
	(976,320683,'通州市','TongZhouShi'),
	(977,320684,'海门市','HaiMenShi'),
	(978,320700,'连云港市','LianYunGangShi'),
	(979,320701,'市辖区','ShiXiaQu'),
	(980,320703,'连云区','LianYunQu'),
	(981,320705,'新浦区','XinPuQu'),
	(982,320706,'海州区','HaiZhouQu'),
	(983,320721,'赣榆县','GanYuXian'),
	(984,320722,'东海县','DongHaiXian'),
	(985,320723,'灌云县','GuanYunXian'),
	(986,320724,'灌南县','GuanNanXian'),
	(987,320800,'淮安市','HuaiAnShi'),
	(988,320801,'市辖区','ShiXiaQu'),
	(989,320802,'清河区','QingHeQu'),
	(990,320803,'楚州区','ChuZhouQu'),
	(991,320804,'淮阴区','HuaiYinQu'),
	(992,320811,'清浦区','QingPuQu'),
	(993,320826,'涟水县','LianShuiXian'),
	(994,320829,'洪泽县','HongZeXian'),
	(995,320830,'盱眙县','XuYiXian'),
	(996,320831,'金湖县','JinHuXian'),
	(997,320900,'盐城市','YanChengShi'),
	(998,320901,'市辖区','ShiXiaQu'),
	(999,320902,'亭湖区','TingHuQu'),
	(1000,320903,'盐都区','YanDuQu'),
	(1001,320921,'响水县','XiangShuiXian'),
	(1002,320922,'滨海县','BinHaiXian'),
	(1003,320923,'阜宁县','FuNingXian'),
	(1004,320924,'射阳县','SheYangXian'),
	(1005,320925,'建湖县','JianHuXian'),
	(1006,320981,'东台市','DongTaiShi'),
	(1007,320982,'大丰市','DaFengShi'),
	(1008,321000,'扬州市','YangZhouShi'),
	(1009,321001,'市辖区','ShiXiaQu'),
	(1010,321002,'广陵区','GuangLingQu'),
	(1011,321003,'邗江区','HanJiangQu'),
	(1012,321011,'维扬区','WeiYangQu'),
	(1013,321023,'宝应县','BaoYingXian'),
	(1014,321081,'仪征市','YiZhengShi'),
	(1015,321084,'高邮市','GaoYouShi'),
	(1016,321088,'江都市','JiangDuShi'),
	(1017,321100,'镇江市','ZhenJiangShi'),
	(1018,321101,'市辖区','ShiXiaQu'),
	(1019,321102,'京口区','JingKouQu'),
	(1020,321111,'润州区','RunZhouQu'),
	(1021,321112,'丹徒区','DanTuQu'),
	(1022,321181,'丹阳市','DanYangShi'),
	(1023,321182,'扬中市','YangZhongShi'),
	(1024,321183,'句容市','JuRongShi'),
	(1025,321200,'泰州市','TaiZhouShi'),
	(1026,321201,'市辖区','ShiXiaQu'),
	(1027,321202,'海陵区','HaiLingQu'),
	(1028,321203,'高港区','GaoGangQu'),
	(1029,321281,'兴化市','XingHuaShi'),
	(1030,321282,'靖江市','JingJiangShi'),
	(1031,321283,'泰兴市','TaiXingShi'),
	(1032,321284,'姜堰市','JiangYanShi'),
	(1033,321300,'宿迁市','SuQianShi'),
	(1034,321301,'市辖区','ShiXiaQu'),
	(1035,321302,'宿城区','SuChengQu'),
	(1036,321311,'宿豫区','SuYuQu'),
	(1037,321322,'沭阳县','ShuYangXian'),
	(1038,321323,'泗阳县','SiYangXian'),
	(1039,321324,'泗洪县','SiHongXian'),
	(1040,321400,'农场','NongChang'),
	(1041,321401,'黄海与新洋农场','HuangHaiYuXinYangNongChang'),
	(1042,321402,'东辛中心农场','DongXinZhongXinNongChang'),
	(1043,321403,'淮海中心农场','HuaiHaiZhongXinNongChang'),
	(3864,321004,'开发区','KaiFaQu'),
	(3874,321113,'新区','XinQu');

/*!40000 ALTER TABLE `administrative_region` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_assignment
# ------------------------------------------------------------

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

LOCK TABLES `auth_assignment` WRITE;
/*!40000 ALTER TABLE `auth_assignment` DISABLE KEYS */;

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`)
VALUES
	('city_admin',10029,1480053379),
	('city_admin',10033,1480043561),
	('company',10028,1479803540),
	('company',10031,1479803392),
	('company',10035,1480041191),
	('county_admin',10032,1480043324),
	('notcheck_city_admin',10027,1477031553),
	('notcheck_company',10023,1477013521),
	('notcheck_company',10030,1478842266),
	('province_admin',10034,1479797598),
	('system_admin',1000,1480053379);

/*!40000 ALTER TABLE `auth_assignment` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item
# ------------------------------------------------------------

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

LOCK TABLES `auth_item` WRITE;
/*!40000 ALTER TABLE `auth_item` DISABLE KEYS */;

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`)
VALUES
	('city_admin',1,NULL,NULL,NULL,1476433265,1476433265),
	('company',1,NULL,NULL,NULL,1476433264,1476433264),
	('county_admin',1,NULL,NULL,NULL,1476433265,1476433265),
	('notcheck_city_admin',1,NULL,NULL,NULL,1476433265,1476433265),
	('notcheck_company',1,NULL,NULL,NULL,1476433265,1476433265),
	('notcheck_county_admin',1,NULL,NULL,NULL,1476433265,1476433265),
	('notcheck_province_admin',1,NULL,NULL,NULL,1476433265,1476433265),
	('province_admin',1,NULL,NULL,NULL,1476433265,1476433265),
	('system_admin',1,NULL,NULL,NULL,1476433265,1476433265);

/*!40000 ALTER TABLE `auth_item` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_item_child
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_item_child`;

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) NOT NULL,
  `child` varchar(64) NOT NULL,
  PRIMARY KEY (`parent`,`child`),
  KEY `child` (`child`),
  CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `auth_item_child` WRITE;
/*!40000 ALTER TABLE `auth_item_child` DISABLE KEYS */;

INSERT INTO `auth_item_child` (`parent`, `child`)
VALUES
	('province_admin','city_admin'),
	('province_admin','company'),
	('province_admin','county_admin'),
	('system_admin','province_admin');

/*!40000 ALTER TABLE `auth_item_child` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table auth_rule
# ------------------------------------------------------------

DROP TABLE IF EXISTS `auth_rule`;

CREATE TABLE `auth_rule` (
  `name` varchar(64) NOT NULL,
  `data` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table yii_admin_user_details
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_admin_user_details`;

CREATE TABLE `yii_admin_user_details` (
  `user_id` int(20) NOT NULL,
  `user_nickname` varchar(20) NOT NULL COMMENT '用户姓名',
  `user_sex` tinytext NOT NULL COMMENT '用户性别',
  `user_phone_number` varchar(20) DEFAULT NULL COMMENT '手机号码',
  `user_email` varchar(50) DEFAULT NULL COMMENT '用户邮箱',
  `user_birthday` varchar(50) NOT NULL COMMENT '用户生日',
  `user_id_number` varchar(18) NOT NULL COMMENT '身份证号',
  `user_address` text NOT NULL COMMENT '单位地址',
  `user_zip_code` int(11) DEFAULT NULL COMMENT '单位邮编',
  `user_legal_person` varchar(20) DEFAULT NULL COMMENT '单位法人',
  `user_comment` varchar(200) DEFAULT NULL COMMENT '备注信息',
  `user_type` varchar(20) NOT NULL COMMENT '用户类型',
  `region_id` int(6) NOT NULL COMMENT '行政代码',
  PRIMARY KEY (`user_id`),
  KEY `fk_admin_region` (`region_id`),
  CONSTRAINT `fk_admin_region` FOREIGN KEY (`region_id`) REFERENCES `administrative_region` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_admin_userid` FOREIGN KEY (`user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_admin_user_details` WRITE;
/*!40000 ALTER TABLE `yii_admin_user_details` DISABLE KEYS */;

INSERT INTO `yii_admin_user_details` (`user_id`, `user_nickname`, `user_sex`, `user_phone_number`, `user_email`, `user_birthday`, `user_id_number`, `user_address`, `user_zip_code`, `user_legal_person`, `user_comment`, `user_type`, `region_id`)
VALUES
	(10027,'sanca','男','13885857805','131310@gamil.com','11nian','121212','wewqeqwe',121321,'dqwdq','11111111111cc','ddsa',320000),
	(10032,'pengs','男','1825712361','8188@qq.com','13123','123123','123123',123123,'sanc','as','assas',320100),
	(10033,'sancsss','男','1912893','1112','1211','121312','123123',123123,'123123','123123','12312',320412),
	(10034,'padmin','男','12121231','asdasd','aasdsd','11213123','12312213',2123112323,'123123','123123','123',320206);

/*!40000 ALTER TABLE `yii_admin_user_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_company
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_company`;

CREATE TABLE `yii_company` (
  `company_id` int(20) NOT NULL AUTO_INCREMENT COMMENT '企业编号',
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
  `verified` tinyint(4) NOT NULL DEFAULT '0' COMMENT '审核状态',
  `company_comment` varchar(200) DEFAULT NULL COMMENT '备注信息',
  PRIMARY KEY (`company_id`),
  KEY `yii_company_ibfk_1` (`company_region_id`),
  KEY `yii_company_ibfk_3` (`user_id`),
  CONSTRAINT `yii_company_ibfk_2` FOREIGN KEY (`company_region_id`) REFERENCES `administrative_region` (`region_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_company_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `yii_company_user_details` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_company` WRITE;
/*!40000 ALTER TABLE `yii_company` DISABLE KEYS */;

INSERT INTO `yii_company` (`company_id`, `user_id`, `company_name`, `company_credit_code`, `company_charater`, `company_registered_capital`, `company_established_time`, `company_region_id`, `company_re_province`, `company_reg_city`, `company_reg_county`, `company_reg_address`, `company_reg_longitude`, `company_reg_latitude`, `company_prod_province`, `company_prod_city`, `company_prod_county`, `company_prod_address`, `company_prod_longitude`, `company_prod_latitude`, `company_doctor_num`, `company_master_num`, `company_bachelor_num`, `company_juniorcollege_num`, `company_staff_num`, `verified`, `company_comment`)
VALUES
	(1,10028,'google','12112121','person','10000000000','11111',320115,'','','','',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,''),
	(2,10031,'sanc','11111','11111111','11111','11',320102,'1111','1111','1111','1111',1111,NULL,'1111','1111','1111','1111',111,111,111,1111,111,111,11,1,'111'),
	(3,10035,'hiqiye','1231','2312','12312','1231',320103,'','','','',NULL,NULL,'','','','',NULL,NULL,NULL,NULL,NULL,NULL,NULL,1,'');

/*!40000 ALTER TABLE `yii_company` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_company_manager
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_company_manager`;

CREATE TABLE `yii_company_manager` (
  `company_id` int(20) NOT NULL COMMENT '企业编号',
  `manager_type_id` int(1) NOT NULL COMMENT '负责人类型',
  `manager_sex` varchar(1) DEFAULT NULL COMMENT '负责人性别',
  `manager_idnumber` varchar(50) DEFAULT NULL COMMENT '身份证号码',
  `manager_mobilephone` int(18) DEFAULT NULL COMMENT '联系手机',
  `manager_telephone` int(18) DEFAULT NULL COMMENT '联系电话',
  `manager_fax` int(18) DEFAULT NULL COMMENT '联系传真',
  `manager_email` varchar(20) DEFAULT NULL COMMENT '联系邮箱',
  `manager_address` varchar(50) DEFAULT NULL COMMENT '联系地址',
  `manager_zip_code` varchar(10) DEFAULT NULL COMMENT '联系邮编',
  `manager_comment` varchar(200) DEFAULT NULL COMMENT '备注信息',
  `manager_name` varchar(20) DEFAULT NULL COMMENT '姓名',
  PRIMARY KEY (`company_id`,`manager_type_id`),
  KEY `manager_type_id` (`manager_type_id`),
  CONSTRAINT `yii_company_manager_ibfk_2` FOREIGN KEY (`manager_type_id`) REFERENCES `yii_manager_type` (`type_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_company_manager` WRITE;
/*!40000 ALTER TABLE `yii_company_manager` DISABLE KEYS */;

INSERT INTO `yii_company_manager` (`company_id`, `manager_type_id`, `manager_sex`, `manager_idnumber`, `manager_mobilephone`, `manager_telephone`, `manager_fax`, `manager_email`, `manager_address`, `manager_zip_code`, `manager_comment`, `manager_name`)
VALUES
	(1,1,'女','522222222222222222',1388888,1213812389,123821312,'iii@qq.com','addr','523000','jskadna','莉莉'),
	(1,2,'男','1231231231',1231231,12312,12312,'123123','12312','12312','21312','pqwdasdkl'),
	(2,1,'男','1278391723123',12121221,121231,1212312,'123123','123123','1231231','1231','负责人1'),
	(2,2,'男','123123',123123,123123,123123,'12312','123123','123123','1231231212','卡萨诺的啦');

/*!40000 ALTER TABLE `yii_company_manager` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_company_user_details
# ------------------------------------------------------------

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

LOCK TABLES `yii_company_user_details` WRITE;
/*!40000 ALTER TABLE `yii_company_user_details` DISABLE KEYS */;

INSERT INTO `yii_company_user_details` (`user_id`, `user_nickname`, `user_sex`, `user_phone_number`, `user_email`, `user_comment`)
VALUES
	(10020,'sanc','男','13880867705','123456',''),
	(10023,'sanc','男','13585567605','123456',''),
	(10028,'pengliangyu','男','13227276565','171727127@qq.com','nihao world'),
	(10030,'peng','男','13122222','128139@qq.com','jkasdajs'),
	(10031,'彭良宇','男','13276060396','nnns@gmail.com','asdasd'),
	(10035,'test1','男','1213','19219@qq.com','sad');

/*!40000 ALTER TABLE `yii_company_user_details` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_file
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_file`;

CREATE TABLE `yii_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(50) DEFAULT NULL,
  `file_extension` varchar(10) DEFAULT NULL,
  `file_path` varchar(50) DEFAULT NULL,
  `file_comment` varchar(200) DEFAULT NULL,
  `file_time` int(11) unsigned DEFAULT NULL,
  `file_hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_file` WRITE;
/*!40000 ALTER TABLE `yii_file` DISABLE KEYS */;

INSERT INTO `yii_file` (`file_id`, `file_name`, `file_extension`, `file_path`, `file_comment`, `file_time`, `file_hash`)
VALUES
	(25,'屏幕快照 2016-11-29 16.35.55','png',NULL,NULL,1480408595,'vOkJQ2nKAemeL-ViySg7nyTbsTMp978d'),
	(27,'屏幕快照 2016-11-29 16.35.55','png',NULL,NULL,1480416868,'b1Xv47v9CvRABSLmKSgXNBPB7PqgwHxj');

/*!40000 ALTER TABLE `yii_file` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_identity
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_identity`;

CREATE TABLE `yii_identity` (
  `identity_id` tinyint(1) NOT NULL,
  `identity_name` tinytext NOT NULL,
  PRIMARY KEY (`identity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

LOCK TABLES `yii_identity` WRITE;
/*!40000 ALTER TABLE `yii_identity` DISABLE KEYS */;

INSERT INTO `yii_identity` (`identity_id`, `identity_name`)
VALUES
	(1,'企业单位'),
	(2,'未审核企业单位'),
	(3,'县级管理员'),
	(4,'未审核县级管理员'),
	(5,'市级管理员'),
	(6,'未审核市级管理员'),
	(7,'省级管理员'),
	(8,'未审核省级管理员'),
	(9,'系统管理员');

/*!40000 ALTER TABLE `yii_identity` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_image_file
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_image_file`;

CREATE TABLE `yii_image_file` (
  `company_id` int(12) NOT NULL,
  `image_typeid` int(11) unsigned NOT NULL,
  `display_order` tinyint(1) DEFAULT NULL,
  `file_id` int(11) NOT NULL,
  `image_comment` varchar(200) DEFAULT NULL,
  KEY `file_id` (`file_id`),
  CONSTRAINT `yii_image_file_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `yii_file` (`file_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_image_file` WRITE;
/*!40000 ALTER TABLE `yii_image_file` DISABLE KEYS */;

INSERT INTO `yii_image_file` (`company_id`, `image_typeid`, `display_order`, `file_id`, `image_comment`)
VALUES
	(2,1,NULL,25,NULL),
	(2,1,NULL,27,NULL);

/*!40000 ALTER TABLE `yii_image_file` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_image_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_image_type`;

CREATE TABLE `yii_image_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(50) NOT NULL DEFAULT '' COMMENT '类型',
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_image_type` WRITE;
/*!40000 ALTER TABLE `yii_image_type` DISABLE KEYS */;

INSERT INTO `yii_image_type` (`type_id`, `type_name`)
VALUES
	(1,'证书图片一'),
	(2,'证书图片二'),
	(3,'证书图片三'),
	(4,'证书图片四');

/*!40000 ALTER TABLE `yii_image_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_manager_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_manager_type`;

CREATE TABLE `yii_manager_type` (
  `type_id` int(1) NOT NULL,
  `type_name` tinytext NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_manager_type` WRITE;
/*!40000 ALTER TABLE `yii_manager_type` DISABLE KEYS */;

INSERT INTO `yii_manager_type` (`type_id`, `type_name`)
VALUES
	(1,'法人'),
	(2,'经理');

/*!40000 ALTER TABLE `yii_manager_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_message_verification
# ------------------------------------------------------------

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



# Dump of table yii_user
# ------------------------------------------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=gbk;

LOCK TABLES `yii_user` WRITE;
/*!40000 ALTER TABLE `yii_user` DISABLE KEYS */;

INSERT INTO `yii_user` (`user_id`, `user_name`, `user_password`, `user_identityid`, `user_authkey`)
VALUES
	(1000,'admin','c4ca4238a0b923820dcc509a6f75849b',9,NULL),
	(10000,'企业一的用户','c4ca4238a0b923820dcc509a6f75849b',1,'cTc4MPIhQKbX78dS9sHDDTA01g2L0m5B'),
	(10001,'管理员一的用户','c4ca4238a0b923820dcc509a6f75849b',2,'XwfnrowGyW_789tzWh9x2rIzIlzWqK9F'),
	(10002,'管理员一用户','c4ca4238a0b923820dcc509a6f75849b',3,'Hy_rhjDRggrMaSs7uplq9UNhtWGqvkwQ'),
	(10003,'企业110','c4ca4238a0b923820dcc509a6f75849b',1,'LDEmzs44A9ceT_AWp7mkZ7wE7LHlXuxv'),
	(10004,'qiyea','c4ca4238a0b923820dcc509a6f75849b',1,'6MpVGh-n88VmPLlHWjlV7GIsWE9lZvaU'),
	(10005,'企业嘻嘻嘻','c4ca4238a0b923820dcc509a6f75849b',1,'lrwKONjqPs6b1MVK-EdKIhQ2eul77ttl'),
	(10006,'qiyeas','c4ca4238a0b923820dcc509a6f75849b',1,'0veYCBym_0Wl3IiPAGysBTOEBC1-xNl_'),
	(10007,'qwqw','c4ca4238a0b923820dcc509a6f75849b',3,'eOIykvd9hmrcU865Lc8H0XqBfgdaP9rH'),
	(10019,'11111','c4ca4238a0b923820dcc509a6f75849b',1,'XjlwW6SCv9i4gH6IfKGPFrKqXz4hZbzh'),
	(10020,'test1','c4ca4238a0b923820dcc509a6f75849b',2,'ubttzne-MyqcGxG3FEBWs3dWR5j2j2I8'),
	(10023,'11111111','c4ca4238a0b923820dcc509a6f75849b',2,'Y_VN2i40sEA0kiY0wQsym2pLgDoc6jeM'),
	(10027,'admin1','c4ca4238a0b923820dcc509a6f75849b',6,'G1q5fAGtzKV-XR69sYjQ6vKW_s_ckj8Z'),
	(10028,'sancssss','c4ca4238a0b923820dcc509a6f75849b',1,'lU9ud33fYDSyAmH3BgNQ6icdgT7NQT3c'),
	(10029,'141304120','c4ca4238a0b923820dcc509a6f75849b',5,'hHqz6X9SCgSYclNV4Cv8b5S8QD7cyZTN'),
	(10030,'sancsssss','c4ca4238a0b923820dcc509a6f75849b',2,'M80LG0tKJsQZ_gbrCXweJo8FS3CY9byH'),
	(10031,'sanc','c4ca4238a0b923820dcc509a6f75849b',2,'jJkoSYqN_G7KZHRxdX2unpeO1pYhVOd8'),
	(10032,'tcounty','c4ca4238a0b923820dcc509a6f75849b',3,'XjSk17wu9DCAbgCLqHfhnDP8tO-ZOD7H'),
	(10033,'tcity','c4ca4238a0b923820dcc509a6f75849b',5,'d0GEAjVMxOXo9Fn8e7yjJc4OIX5fW_20'),
	(10034,'padmin','c4ca4238a0b923820dcc509a6f75849b',7,'oqvPATNQrtjYAy30cD-Bv_U3JrfwUvwf'),
	(10035,'test2','c4ca4238a0b923820dcc509a6f75849b',1,'rhD59jGc9AkvirWQewZbI73Fw93AxeOV');

/*!40000 ALTER TABLE `yii_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_verified_company
# ------------------------------------------------------------

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
  CONSTRAINT `yii_verified_company_ibfk_2` FOREIGN KEY (`verified_user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_verified_company_ibfk_3` FOREIGN KEY (`company_id`) REFERENCES `yii_company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_verified_company` WRITE;
/*!40000 ALTER TABLE `yii_verified_company` DISABLE KEYS */;

INSERT INTO `yii_verified_company` (`id`, `company_id`, `verified_user_id`, `verified_status`, `verified_time`, `verified_information`, `verified_comment`)
VALUES
	(1,1,10034,1,1479803540,NULL,NULL),
	(2,3,10034,1,1480041191,NULL,NULL);

/*!40000 ALTER TABLE `yii_verified_company` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table yii_verified_manager
# ------------------------------------------------------------

DROP TABLE IF EXISTS `yii_verified_manager`;

CREATE TABLE `yii_verified_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `admin_user_id` int(20) NOT NULL COMMENT '用户id',
  `verified_user_id` int(20) NOT NULL COMMENT '审核者',
  `verified_status` int(11) NOT NULL COMMENT '审核状态',
  `verified_time` int(11) NOT NULL COMMENT '审核时间',
  `verified_information` varchar(200) DEFAULT NULL COMMENT '审核信息',
  `verified_comment` varchar(200) DEFAULT NULL COMMENT '审核备注',
  PRIMARY KEY (`id`),
  KEY `admin_user_id` (`admin_user_id`),
  KEY `verified_user_id` (`verified_user_id`),
  CONSTRAINT `yii_verified_manager_ibfk_1` FOREIGN KEY (`admin_user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `yii_verified_manager_ibfk_2` FOREIGN KEY (`verified_user_id`) REFERENCES `yii_user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `yii_verified_manager` WRITE;
/*!40000 ALTER TABLE `yii_verified_manager` DISABLE KEYS */;

INSERT INTO `yii_verified_manager` (`id`, `admin_user_id`, `verified_user_id`, `verified_status`, `verified_time`, `verified_information`, `verified_comment`)
VALUES
	(1,10032,10034,1,1480043324,NULL,NULL),
	(2,10033,10034,1,1480043561,NULL,NULL);

/*!40000 ALTER TABLE `yii_verified_manager` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
