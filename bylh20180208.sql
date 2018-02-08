/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bylh

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-02-08 16:25:44
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bylh_admin`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_admin`;
CREATE TABLE `bylh_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role` int(11) DEFAULT NULL COMMENT '角色（1: 超级管理员; 0:普通管理员）',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_admin
-- ----------------------------
INSERT INTO `bylh_admin` VALUES ('1', '1', 'admin', '$2y$10$Mk4BtG4FAbEdkDxwqFkEhOTLzMHLNzi/Cmg.hzhWR8INm8JWxBEgq', null, '2017-12-17 15:33:07', '2018-02-07 20:22:37', '2018-02-07 20:22:37');
INSERT INTO `bylh_admin` VALUES ('3', null, 'jkjun', '$2y$10$ZJgCpSCmx2gzQcXaTB34Ue.OiwttCMvaYGeKP9CDxTnwsuuvULJqW', null, '2017-12-17 16:01:08', '2017-12-28 21:38:55', '2017-12-28 21:38:55');

-- ----------------------------
-- Table structure for `bylh_adverts`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_adverts`;
CREATE TABLE `bylh_adverts` (
  `adid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '广告id',
  `uid` int(10) unsigned NOT NULL COMMENT '发布管理员id',
  `title` varchar(50) NOT NULL,
  `content` varchar(300) NOT NULL,
  `picture` varchar(300) DEFAULT NULL,
  `type` varchar(10) NOT NULL DEFAULT '0' COMMENT '0：大图广告1：小图广告2：文字广告',
  `location` varchar(5) NOT NULL DEFAULT '0' COMMENT '广告位置序号',
  `homepage` varchar(100) DEFAULT NULL COMMENT '公司主页',
  `validity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '广告有效期截止时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_adverts
-- ----------------------------
INSERT INTO `bylh_adverts` VALUES ('1', '1', '', '1111', 'fgsdfds', '1', '1', null, '0000-00-00 00:00:00', '2017-12-20 23:37:18', '2018-01-10 12:47:53');
INSERT INTO `bylh_adverts` VALUES ('2', '1', 'uhugh', 'ujjhuhjh', 'http://localhost/images/ad4.jpg', '0', '1', 'www,baidu.com', '2017-12-26 00:00:00', '2017-12-26 23:47:18', '2018-02-03 17:11:50');
INSERT INTO `bylh_adverts` VALUES ('3', '1', 'testad2', 'empty', 'http://localhost/images/ad5.jpg', '0', '3', 'www.baidu.com', '2017-12-27 00:00:00', '2017-12-26 23:52:19', '2018-02-03 17:11:46');

-- ----------------------------
-- Table structure for `bylh_datetemp`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_datetemp`;
CREATE TABLE `bylh_datetemp` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录服务者预约需求的临时表',
  `sid` int(10) unsigned DEFAULT NULL COMMENT '服务用户id',
  `did` int(10) unsigned DEFAULT NULL COMMENT '需求用户id',
  `demand_id` int(10) NOT NULL COMMENT '需求id',
  `price` double DEFAULT '-1' COMMENT '预约价格、服务用户报价，-1表示面议',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '状态（01，正常，删除）',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_datetemp
-- ----------------------------
INSERT INTO `bylh_datetemp` VALUES ('1', '2', '1', '1', '200', '1', '2018-01-09 22:20:43', '2018-02-07 23:11:14');
INSERT INTO `bylh_datetemp` VALUES ('2', '3', '1', '1', '300', '1', '2018-01-09 22:21:18', '2018-02-07 23:11:14');
INSERT INTO `bylh_datetemp` VALUES ('3', '1', '1', '2', '234.12', '0', '2018-02-07 19:42:28', '2018-02-07 19:42:28');

-- ----------------------------
-- Table structure for `bylh_demandreviews`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_demandreviews`;
CREATE TABLE `bylh_demandreviews` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `did` int(10) unsigned DEFAULT NULL COMMENT '需求id',
  `comments` longtext COMMENT '对需求的留言或回答',
  `state` int(11) DEFAULT '0' COMMENT '留言状态（012，正常，删除，违规）',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_demandreviews
-- ----------------------------
INSERT INTO `bylh_demandreviews` VALUES ('1', '5', '1', '哎哟！不错哟', '0', '2018-01-29 16:03:40', '2018-01-29 16:46:02');
INSERT INTO `bylh_demandreviews` VALUES ('2', '1', '2', 'testreviews', '0', '2018-01-29 17:32:59', '2018-01-29 17:32:59');
INSERT INTO `bylh_demandreviews` VALUES ('3', '1', '1', '奥奥奥    是打发斯蒂芬', '0', '2018-01-29 17:35:18', '2018-01-29 17:35:18');
INSERT INTO `bylh_demandreviews` VALUES ('4', '1', '3', 'fdsf', '0', '2018-01-30 21:59:02', '2018-01-30 21:59:02');

-- ----------------------------
-- Table structure for `bylh_demands`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_demands`;
CREATE TABLE `bylh_demands` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '需求类型（012一般服务需求，金融需求，专业问答需求）',
  `state` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '需求状态（012正常，下架，违规）',
  `title` varchar(50) DEFAULT NULL COMMENT '需求标题',
  `city` int(11) DEFAULT NULL COMMENT '所需城市',
  `class1_id` int(11) DEFAULT NULL COMMENT '服务范围',
  `class2_id` int(11) DEFAULT NULL COMMENT '服务专业',
  `class3_id` int(11) DEFAULT NULL COMMENT '服务细类',
  `picture` varchar(200) DEFAULT NULL COMMENT '描述照片（最多三张）',
  `describe` varchar(500) DEFAULT NULL COMMENT '需求描述',
  `price` double DEFAULT '-1' COMMENT '需求价格(-1表示面议)',
  `view_count` int(11) DEFAULT '1' COMMENT '浏览量',
  `is_urgency` int(3) DEFAULT '0' COMMENT '加急状态（0123）否、加急、顶、。。。',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_demands
-- ----------------------------
INSERT INTO `bylh_demands` VALUES ('1', '1', '0', '0', '高数求带', '0', '1', '2', '3', 'http://localhost/storage/demandspic/1@2018-01-22-20-53-44-5a65ded809946demands1.jpg;1@2018-01-22-20-53-44-5a65ded809946demands1.jpg;2@2018-01-22-20-53-44-5a65ded80c43fdemands2.jpg;', '123</br>456', '-1', '74', '0', '2018-01-09 21:52:49', '2018-01-29 17:35:57');
INSERT INTO `bylh_demands` VALUES ('2', '1', '0', '0', '大物求飞', '0', '2', '1', '4', 'http://localhost/storage/demandspic/2@2018-01-22-20-53-44-5a65ded80c43fdemands2.jpg;', '富士达防守打法的算法大沙发斯蒂芬三法师法师法师安达市发顺丰阿斯顿发生发顺丰大师傅阿萨德发大发三方sad发生的发生123', '-1', '18', '1', '2018-01-09 22:45:15', '2018-02-07 19:42:29');
INSERT INTO `bylh_demands` VALUES ('3', '1', '0', '0', '求带羽毛球', '13', null, null, null, 'http://localhost/storage/demandspic/1@2018-01-22-20-53-44-5a65ded809946demands1.jpg;2@2018-01-22-20-53-44-5a65ded80c43fdemands2.jpg;', '1、需求描述1</br>2、需求描述2', '500', '36', '0', '2018-01-22 20:53:44', '2018-02-07 14:15:06');
INSERT INTO `bylh_demands` VALUES ('4', '1', '1', '0', 'fsdfs', '10', null, null, null, 'http://localhost/storage/demandspic/1@2018-02-01-20-39-54-5a730a9a89095demands1.jpg;2@2018-02-01-20-39-54-5a730a9a9aa2cdemands2.jpg;3@2018-02-01-20-39-54-5a730a9a9b630demands3.jpg;', '1、需求描述1</br>2、需求描述2</br>3、需求描述3', '200', '25', '0', '2018-02-01 20:39:54', '2018-02-07 22:13:56');

-- ----------------------------
-- Table structure for `bylh_finlservices`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_finlservices`;
CREATE TABLE `bylh_finlservices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '发布用户id',
  `type` int(1) DEFAULT NULL COMMENT '服务类型（012一般服务，实习课堂，专业问答）',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '服务状态（012，正常，下架，违规）',
  `title` varchar(50) DEFAULT NULL COMMENT '服务标题',
  `city` int(11) DEFAULT NULL COMMENT '服务城市',
  `class1_id` int(11) DEFAULT '-1' COMMENT '服务范围',
  `class2_id` int(11) DEFAULT '-1' COMMENT '服务专业',
  `class3_id` int(11) DEFAULT '-1' COMMENT '服务项目',
  `picture` varchar(200) DEFAULT NULL COMMENT '服务描述图片url',
  `describe` varchar(500) DEFAULT NULL COMMENT '服务详情介绍',
  `price` double DEFAULT '-1' COMMENT '服务价格（-1为面议）',
  `price_type` int(11) DEFAULT '-1' COMMENT '单次价格种类：-1-无单位0-每八小时1-每天2-每次3-每套',
  `home_page` varchar(200) DEFAULT NULL COMMENT '金融融资超级链接',
  `is_urgency` int(1) DEFAULT '0' COMMENT '是否紧急服务（0,1不是，是）',
  `view_count` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_finlservices
-- ----------------------------
INSERT INTO `bylh_finlservices` VALUES ('1', '1', '1', '0', 'testservice2', '51', '2', null, null, null, '发我二套房个人违反该防守打法是第三方发的发顺丰的地方大师傅阿凡达司法所打发斯蒂芬阿斯顿发送到发送到', '200', '1', null, '1', '3', '2017-12-28 20:57:16', '2018-02-07 21:47:28');
INSERT INTO `bylh_finlservices` VALUES ('2', '1', '1', '0', 'testservice3', '50', '2', '2', '2', null, 'fadfadafgfafsdgfdgdafwgfda', '200', '1', null, '0', '1', '2018-02-01 15:32:53', '2018-02-07 21:47:31');
INSERT INTO `bylh_finlservices` VALUES ('3', '1', '1', '0', '实习中介服务', '53', '10', '10', '-1', 'http://localhost/storage/finlservicespic/1@2018-02-01-22-23-40-5a7322ec247d3finlservice1.jpg;2@2018-02-01-22-23-40-5a7322ec26624finlservice2.jpg;3@2018-02-01-22-23-40-5a7322ec28ffafinlservice3.jpg;', '1、实习中介服务描述1</br>2、实习中介服务描述2</br>3、实习中介服务描述3', '200', '2', 'www.baidu.com', '0', '2', '2018-02-01 22:23:40', '2018-02-07 21:04:49');

-- ----------------------------
-- Table structure for `bylh_genlservices`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_genlservices`;
CREATE TABLE `bylh_genlservices` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '一般服务项目id',
  `uid` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '服务类型（012一般服务，实习课堂，专业问答）',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '服务状态（012正常，下架，违规）',
  `title` varchar(50) DEFAULT NULL COMMENT '服务标题',
  `city` int(11) DEFAULT NULL COMMENT '服务城市',
  `class1_id` int(11) DEFAULT '-1' COMMENT '服务范围',
  `class2_id` int(11) DEFAULT '-1' COMMENT '服务专业',
  `class3_id` int(11) DEFAULT '-1' COMMENT '服务项目',
  `picture` varchar(200) DEFAULT NULL COMMENT '服务展示图片url',
  `describe` varchar(500) DEFAULT NULL COMMENT '服务详情描述',
  `price` double DEFAULT '-1' COMMENT '服务价格，负数表示面议',
  `price_type` int(11) DEFAULT '-1' COMMENT '单次价格种类：-1-无单位0-每八小时1-每天2-每次3-每套',
  `home_page` varchar(200) DEFAULT NULL COMMENT '服务相关主页（实习课堂发布）',
  `experience` varchar(500) DEFAULT NULL COMMENT '服务经历(用@符号区分每个经历）',
  `is_urgency` int(1) DEFAULT '0' COMMENT '是否紧急服务（01不是，是）',
  `view_count` int(11) DEFAULT '0' COMMENT '浏览次数',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_genlservices
-- ----------------------------
INSERT INTO `bylh_genlservices` VALUES ('1', '3', '0', '0', '羽毛球陪练', '0', '1', null, null, null, '防守打法的是发所发生地方', '200', '0', null, null, '1', '43', '2017-12-28 00:36:40', '2018-02-07 14:47:46');
INSERT INTO `bylh_genlservices` VALUES ('2', '1', '0', '0', '专业，国家队教练羽毛球陪练，陪练专业，专业陪练', '53', null, null, null, 'http://localhost/storage/genlservicespic/1@2018-01-18-22-43-26-5a60b28e54b72genlservice1.jpg;', 'sfdfdsfs', '200', '0', 'sfdfds', null, '0', '31', '2018-01-18 22:43:26', '2018-02-07 19:14:36');
INSERT INTO `bylh_genlservices` VALUES ('3', '1', '0', '0', 'fsdfsd', '11', null, null, null, 'http://localhost/storage/genlservicespic/1@2018-01-30-20-58-48-5a706c0893143genlservice1.jpg;2@2018-01-30-20-58-48-5a706c08a50cdgenlservice2.jpg;3@2018-01-30-20-58-48-5a706c08a5e2bgenlservice3.jpg;', 'fdsfdsfds', '200', '0', 'sdfds', null, '0', '0', '2018-01-30 20:58:48', '2018-02-07 11:37:12');
INSERT INTO `bylh_genlservices` VALUES ('4', '1', '0', '0', '标题', '11', '6', '6', '6', 'http://localhost/storage/genlservicespic/1@2018-02-01-21-15-34-5a7312f66e046genlservice1.jpg;2@2018-02-01-21-15-34-5a7312f66fa9fgenlservice2.jpg;3@2018-02-01-21-15-34-5a7312f6702cdgenlservice3.jpg;', '1、服务描述1</br>2、服务描述2</br>3、服务描述3', '200', '0', 'fdsfds', null, '0', '4', '2018-02-01 21:15:34', '2018-02-07 21:02:56');

-- ----------------------------
-- Table structure for `bylh_messages`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_messages`;
CREATE TABLE `bylh_messages` (
  `mid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from_id` int(10) unsigned NOT NULL,
  `to_id` int(10) unsigned NOT NULL,
  `content` varchar(500) NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT '0' COMMENT '是否已读（0，1未读，已读）',
  `is_delete` int(1) NOT NULL DEFAULT '0' COMMENT '是否删除（0，1未删除，删除）',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`mid`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_messages
-- ----------------------------
INSERT INTO `bylh_messages` VALUES ('1', '0', '1', '很抱歉！由于你的信息不符合要求您的企业信息审核未通过,尝试重新发布', '1', '0', '2017-12-17 21:08:31', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('2', '0', '2', '很抱歉！由于你的信息不符合要求您的企业信息审核未通过,尝试重新发布', '0', '0', '2017-12-17 21:10:21', '2017-12-17 21:10:21');
INSERT INTO `bylh_messages` VALUES ('3', '0', '2', '恭喜您！您的企业信息审核通过！', '0', '0', '2017-12-17 21:12:21', '2017-12-17 21:12:21');
INSERT INTO `bylh_messages` VALUES ('4', '2', '1', '恭喜您！您的企业信息审核通过！', '1', '0', '2017-12-17 21:14:14', '2018-02-07 13:30:04');
INSERT INTO `bylh_messages` VALUES ('5', '0', '1', '恭喜您！您的实习中介认证审核通过！', '1', '0', '2017-12-18 00:44:15', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('6', '0', '2', '恭喜您！您的实习中介认证审核通过！', '0', '0', '2017-12-18 00:44:26', '2017-12-18 00:44:26');
INSERT INTO `bylh_messages` VALUES ('7', '0', '2', '恭喜您！您的专业问答认证审核通过！', '0', '0', '2017-12-18 00:48:29', '2017-12-18 00:48:29');
INSERT INTO `bylh_messages` VALUES ('8', '0', '1', '恭喜您！您的专业问答认证审核通过！', '1', '0', '2017-12-18 00:48:36', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('9', '0', '2', '恭喜您！您的专业问答认证审核通过！', '0', '0', '2017-12-18 00:51:37', '2017-12-18 00:51:37');
INSERT INTO `bylh_messages` VALUES ('10', '0', '1', '恭喜您！您的专业问答认证审核通过！', '1', '0', '2017-12-18 00:52:16', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('11', '0', '1', '恭喜您！您的实名认证审核通过！', '1', '0', '2018-01-16 19:16:34', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('12', '0', '1', '很抱歉！由于你的信息不符合要求您的实名认证审核未通过,尝试重新发布', '1', '0', '2018-01-16 19:19:19', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('13', '0', '1', '恭喜您！您的实名认证审核通过！', '1', '0', '2018-01-16 19:20:15', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('14', '0', '1', '恭喜您！您的实名认证审核通过！', '1', '0', '2018-01-16 19:21:17', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('15', '0', '1', '恭喜您！您的实名认证审核通过！', '1', '0', '2018-01-16 19:21:56', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('16', '0', '1', '恭喜您！您的实名认证审核通过！', '1', '0', '2018-01-16 19:29:02', '2018-02-07 13:30:15');
INSERT INTO `bylh_messages` VALUES ('17', '0', '1', '恭喜您！您的实名认证审核通过！', '1', '0', '2018-01-17 11:09:40', '2018-02-07 13:30:16');
INSERT INTO `bylh_messages` VALUES ('18', '1', '0', '收到收到', '1', '0', '2018-01-29 10:04:58', '2018-02-07 13:30:16');
INSERT INTO `bylh_messages` VALUES ('19', '5', '1', '很高兴认识你', '1', '0', '2018-01-29 10:07:30', '2018-02-07 13:29:37');
INSERT INTO `bylh_messages` VALUES ('20', '1', '1', '我回答了你的需求，请尽快查看！', '1', '0', '2018-01-29 17:32:59', '2018-02-07 14:21:28');
INSERT INTO `bylh_messages` VALUES ('21', '1', '1', '我回答了你的需求，请尽快查看！', '1', '0', '2018-01-29 17:35:18', '2018-02-07 14:21:28');
INSERT INTO `bylh_messages` VALUES ('22', '1', '1', '我回答了你的需求，请尽快查看！', '1', '0', '2018-01-30 21:59:02', '2018-02-07 14:21:28');
INSERT INTO `bylh_messages` VALUES ('23', '1', '1', '您好！我向你的问答服务专业问答提了一个问题，希望得到你的解答。', '1', '0', '2018-01-31 12:58:19', '2018-02-07 14:21:28');
INSERT INTO `bylh_messages` VALUES ('24', '5', '1', '您好！我向你的问答服务专业问答提了一个问题，希望得到你的解答。', '1', '0', '2018-01-31 13:43:03', '2018-02-07 13:29:37');
INSERT INTO `bylh_messages` VALUES ('25', '1', '5', '您好！我已问答你的问题法撒旦法第三，请到服务详情页面查看。', '1', '0', '2018-01-31 13:51:07', '2018-02-07 13:29:37');
INSERT INTO `bylh_messages` VALUES ('26', '1', '5', '您好！我已问答你的问题我还有一个问题！，请到服务详情页面查看。', '1', '0', '2018-01-31 13:58:33', '2018-02-07 13:29:37');
INSERT INTO `bylh_messages` VALUES ('27', '1', '3', '有人购买了您的服务，请尽快收款并处理订单', '1', '0', '2018-01-31 16:50:10', '2018-02-07 13:30:11');
INSERT INTO `bylh_messages` VALUES ('28', '1', '3', '我已收到你的付款，请尽快与我联系！', '1', '0', '2018-01-31 17:07:23', '2018-02-07 13:30:11');
INSERT INTO `bylh_messages` VALUES ('29', '1', '3', '对不起！我暂时未收到你的转款！请再次确认或尝试！', '1', '0', '2018-01-31 17:18:35', '2018-02-07 13:30:11');
INSERT INTO `bylh_messages` VALUES ('30', '1', '3', '对不起！我暂时未收到你的转款！请再次确认或尝试！', '1', '0', '2018-01-31 17:18:57', '2018-02-07 13:30:11');
INSERT INTO `bylh_messages` VALUES ('31', '1', '3', '对不起！我暂时未收到你的转款！请再次确认或尝试！', '1', '0', '2018-01-31 17:19:47', '2018-02-07 13:30:11');
INSERT INTO `bylh_messages` VALUES ('32', '1', '1', 'testmessage', '1', '0', '2018-02-07 14:15:29', '2018-02-07 14:21:28');
INSERT INTO `bylh_messages` VALUES ('33', '1', '1', 'fsdfsf', '1', '0', '2018-02-07 14:21:18', '2018-02-07 14:21:28');
INSERT INTO `bylh_messages` VALUES ('34', '5', '1', '有人购买了您的服务，请尽快收款并处理订单', '0', '0', '2018-02-07 19:14:34', '2018-02-07 19:14:34');
INSERT INTO `bylh_messages` VALUES ('35', '5', '1', '您好！我向你的问答服务专业问答2提了一个问题，希望得到你的解答。', '0', '0', '2018-02-07 19:21:26', '2018-02-07 19:21:26');
INSERT INTO `bylh_messages` VALUES ('36', '5', '1', '有人购买了您的服务，请尽快收款并处理订单', '0', '0', '2018-02-07 19:21:31', '2018-02-07 19:21:31');
INSERT INTO `bylh_messages` VALUES ('37', '5', '1', '发水电费是否', '0', '0', '2018-02-07 19:23:15', '2018-02-07 19:23:15');
INSERT INTO `bylh_messages` VALUES ('38', '0', '5', '恭喜您！您的实名认证审核通过！', '0', '0', '2018-02-07 20:24:44', '2018-02-07 20:24:44');
INSERT INTO `bylh_messages` VALUES ('39', '1', '1', '你好！很想认识你！', '0', '0', '2018-02-07 21:54:47', '2018-02-07 21:54:47');
INSERT INTO `bylh_messages` VALUES ('40', '1', '2', '感谢您的预约！非常抱歉，我已选择了其他服务商为我服务，再次感谢！', '0', '0', '2018-02-07 23:11:14', '2018-02-07 23:11:14');
INSERT INTO `bylh_messages` VALUES ('41', '1', '3', '感谢您的预约！我已向您的账户支付了费用，请尽快查收，并开始服务，谢谢！', '0', '0', '2018-02-07 23:11:14', '2018-02-07 23:11:14');

-- ----------------------------
-- Table structure for `bylh_news`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_news`;
CREATE TABLE `bylh_news` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `uid` int(10) unsigned NOT NULL COMMENT '作者id',
  `quote` varchar(200) DEFAULT NULL,
  `content` longtext NOT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `type` int(11) DEFAULT '1' COMMENT '新闻类型',
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_news
-- ----------------------------
INSERT INTO `bylh_news` VALUES ('1', 'new1', '0', '新华社', '导语：电子竞技产业作为国内增速最快的市场近年来吸引了众多资本涌入，根据相关数据显示电竞产业在今年有望达到700亿元产值。然而电子竞技之所以有如此之大的发展潜能，其中主要得益于女性玩家参与度的持续增长。随着电竞普及程度的不断增加，越来越多的女性参与到电子竞技的产业中，不仅是作为观众，同时还有电竞玩家、电竞选手、游戏设计师、俱乐部运营等等众多的角色。<br>然而电子竞技对待女性玩家的态度似乎并没有随着女性群体的增长而改变，相反纵观国内外电竞圈，女性电竞从业者目前仍处在一个较为尴尬的位置。恒一文化传播有限公司（以下简称恒一文化）作为电竞教育的核心企业，一直不断关注电竞产业内的不均衡发展现象；针对目前电竞行业所存在的“性别歧视”问题，恒一文化认为除了不断规范以外，电竞教育或许是解决问题的新途径。<br>从传统体育到电子竞技<br>纵观体育运动的发展，在竞技体育的发展初期，体育运动的文化形象一直传达着一种女性不属于运动的讯息，这种“性别歧视”让许多女性丧失了运动机会、资源、并带来报酬上的不平等。反观电子竞技的发展历程，女性玩家一直以来都占据着游戏玩家总人口的半壁江山，但她们在竞技类游戏中却只占据着很小一部分。而导致女性玩家在竞技游戏这个大市场中缺席的一个最重要的因素，则是在游戏中普遍存在的性别歧视。<br>在85%的玩家为男性玩家的大背景影响下，竞技游戏中一直不断上演网络辱骂、骚扰等恶劣事件，种种原因阻碍了许多女性投入到电竞游戏当中来。尽管如此，也有不少女性尝试加入职业电竞行业，但是结果往往不尽如人意。<br>[图片1]<br>女性电竞人坎坷追梦<br>大家熟知的《英雄联盟》解说小苍就曾组建过中国首支《英雄联盟》女子战队——英雄联盟adies，不幸的是由于缺乏比赛机会，这支战队在2013年4月宣布解散。对于女子电竞选手来说，很多人都被直接与作秀画上等号。尽管一些女性职业选手在技战水平和训练时长方面都不输男性选手，但相较于男性选手而言女选手的机会和收入都相对较少。<br>除此之外，当前电竞和直播行业呈现出快速崛起的趋势，但就目前的发展状况来看，绝大多数的观众对女主播的关注还是主要集中在外貌以及个人生活方面，他们看重的往往不是该女性玩家的真实技术，而仅仅是她的性别本身。<br>壁垒打破需教育引导<br>针对目前电竞行业存在的“性别歧视”，一些赛事也开始关注到这些问题。前段时间所举办的2017WESG新增设女子组比赛，旨在推动电竞运动中的男女平等；然而一些外媒却认为，将男女分开竞技并不是一个能解决在电竞游戏中女性玩家偏少的好方法，它只会加深那些潜在的问题。而经年累月下，当整个电竞游戏市场变动更加成熟、更为主流化之后，这一顽疾只会变得更加根深蒂固。<br>[图片2]<br>针对目前所存在的种种问题，恒一文化认为教育或许是打破这一壁垒的新途径。作为最早一批涉足电竞教育的企业，恒一团队一直在致力于推动电竞产业良性发展。一方面，教育的引导客观上会打破“男女差距”的认知；另一方面，电竞教育也为女性提供了更多的条件，无论是职业电竞选手还是有志于从事电竞行业的女性，电竞教育为她们拓宽了未来职业选择的方向。<br>结语：电子竞技是一种公平竞技运动。推动电竞运动中的男女平等，首先应鼓励更多的女性参与到电竞产业的各个环节中来。根据目前的发展态势，竞技类游戏的市场规模在2018年有望达到11亿美元，随着未来电竞产业的发展，女性的持续参与显得至关重要。如今，整个行业都逐渐开始支持和鼓励女从业者和女玩家们，恒一文化相信随着电竞教育的推动以及产业制度的不断完善，阻碍女性电竞人发展的“性别壁垒”终将会被打破。', 'http://eshunter.com/storage/newspic/1@2017-10-17-05-44-30-59e598bea31e1news1.png;2@2017-10-17-05-44-30-59e598bea43f3news2.png;', '公告', '1', '24', '2017-12-26 20:51:37', '2018-02-03 15:21:50');
INSERT INTO `bylh_news` VALUES ('3', 'new3', '0', 'BBC', '导语：电子竞技产业作为国内增速最快的市场近年来吸引了众多资本涌入，根据相关数据显示电竞产业在今年有望达到700亿元产值。然而电子竞技之所以有如此之大的发展潜能，其中主要得益于女性玩家参与度的持续增长。随着电竞普及程度的不断增加，越来越多的女性参与到电子竞技的产业中，不仅是作为观众，同时还有电竞玩家、电竞选手、游戏设计师、俱乐部运营等等众多的角色。<br>然而电子竞技对待女性玩家的态度似乎并没有随着女性群体的增长而改变，相反纵观国内外电竞圈，女性电竞从业者目前仍处在一个较为尴尬的位置。恒一文化传播有限公司（以下简称恒一文化）作为电竞教育的核心企业，一直不断关注电竞产业内的不均衡发展现象；针对目前电竞行业所存在的“性别歧视”问题，恒一文化认为除了不断规范以外，电竞教育或许是解决问题的新途径。<br>从传统体育到电子竞技<br>纵观体育运动的发展，在竞技体育的发展初期，体育运动的文化形象一直传达着一种女性不属于运动的讯息，这种“性别歧视”让许多女性丧失了运动机会、资源、并带来报酬上的不平等。反观电子竞技的发展历程，女性玩家一直以来都占据着游戏玩家总人口的半壁江山，但她们在竞技类游戏中却只占据着很小一部分。而导致女性玩家在竞技游戏这个大市场中缺席的一个最重要的因素，则是在游戏中普遍存在的性别歧视。<br>在85%的玩家为男性玩家的大背景影响下，竞技游戏中一直不断上演网络辱骂、骚扰等恶劣事件，种种原因阻碍了许多女性投入到电竞游戏当中来。尽管如此，也有不少女性尝试加入职业电竞行业，但是结果往往不尽如人意。<br>[图片1]<br>女性电竞人坎坷追梦<br>大家熟知的《英雄联盟》解说小苍就曾组建过中国首支《英雄联盟》女子战队——英雄联盟adies，不幸的是由于缺乏比赛机会，这支战队在2013年4月宣布解散。对于女子电竞选手来说，很多人都被直接与作秀画上等号。尽管一些女性职业选手在技战水平和训练时长方面都不输男性选手，但相较于男性选手而言女选手的机会和收入都相对较少。<br>除此之外，当前电竞和直播行业呈现出快速崛起的趋势，但就目前的发展状况来看，绝大多数的观众对女主播的关注还是主要集中在外貌以及个人生活方面，他们看重的往往不是该女性玩家的真实技术，而仅仅是她的性别本身。<br>壁垒打破需教育引导<br>针对目前电竞行业存在的“性别歧视”，一些赛事也开始关注到这些问题。前段时间所举办的2017WESG新增设女子组比赛，旨在推动电竞运动中的男女平等；然而一些外媒却认为，将男女分开竞技并不是一个能解决在电竞游戏中女性玩家偏少的好方法，它只会加深那些潜在的问题。而经年累月下，当整个电竞游戏市场变动更加成熟、更为主流化之后，这一顽疾只会变得更加根深蒂固。<br>[图片2]<br>针对目前所存在的种种问题，恒一文化认为教育或许是打破这一壁垒的新途径。作为最早一批涉足电竞教育的企业，恒一团队一直在致力于推动电竞产业良性发展。一方面，教育的引导客观上会打破“男女差距”的认知；另一方面，电竞教育也为女性提供了更多的条件，无论是职业电竞选手还是有志于从事电竞行业的女性，电竞教育为她们拓宽了未来职业选择的方向。<br>结语：电子竞技是一种公平竞技运动。推动电竞运动中的男女平等，首先应鼓励更多的女性参与到电竞产业的各个环节中来。根据目前的发展态势，竞技类游戏的市场规模在2018年有望达到11亿美元，随着未来电竞产业的发展，女性的持续参与显得至关重要。如今，整个行业都逐渐开始支持和鼓励女从业者和女玩家们，恒一文化相信随着电竞教育的推动以及产业制度的不断完善，阻碍女性电竞人发展的“性别壁垒”终将会被打破。', null, '热点', '1', '30', '2017-12-28 20:51:40', '2018-02-03 15:22:09');
INSERT INTO `bylh_news` VALUES ('4', 'testnews2', '1', '风华网', '发大发[图片1]<br>发士大夫撒发[图片2]', 'http://localhost/storage/newspic/1@2017-12-26-21-41-40-5a425194ef8efnews1.jpg;2@2017-12-26-21-41-41-5a42519501858news2.jpg;', '热点', '3', '7', '2018-01-12 21:41:41', '2018-02-03 15:20:43');
INSERT INTO `bylh_news` VALUES ('5', 'U23国足出局！日专家点评：中国实力差不该质疑裁判', '1', '凤凰网', '最近一段时间，U23国足在亚洲杯小组赛的最后一场比赛由于受到伊朗裁判法哈尼的双标判罚引起了国内媒体和球迷集体不满，本来从整场比赛的过程来看，我们向亚足联和裁判法哈尼表达不满是非常合理的，可是同样属于东亚成员国的日本却有不同的看法<br><br>据日本媒体报道，在U23国足1比2输给卡塔尔之后，针对国足在场上的不冷静表现，日本资深足球记者柴崎雄在个人社交平台也给出了非常犀利的点评，他这样刊文写到：“从赛场上的表现来看，卡塔尔队的实力确实在中国队之上，这里主要体现在球员个人竞技素养上，有些球员控球能力太差，脚下技术跟卡塔尔球员比差距太大”<br>[图片1]<br>而对本场比赛裁判的判罚，这样说到：“这一场比赛的裁判确实有点抢戏，但中国球员不应该选择去质疑裁判，这样会影响自己在场上的发挥，如果一直这样质疑下去大家心里想的已不再是如何踢好比赛，而是如何“回击”裁判的吹罚。”<br><br>从日本记者柴崎雄的点评很明显可以看出，他是从反思的角度去进行点评，客观来说他讲的似乎有一些道理，但他所讲的卡塔尔比国足的实力强一些，是值得商榷的，从中卡战前40分钟来看，国足在场上的局面明显胜过卡塔尔，若不是伊朗裁判法哈尼从中作梗，国足根本不会出局<br>[图片2]<br>所以对于U23国足出局，伊朗裁判法哈尼的双标判罚起到了决定性的作用，目前我们不清楚伊朗裁判法哈尼为什么这么做，但我们必须要作出对应的申诉，只要这样才可以杜绝他们变本加厉的针对中国足球', 'http://localhost/storage/newspic/1@2018-01-19-14-34-23-5a61916f66be2news1.jpeg;2@2018-01-19-14-34-23-5a61916f83335news2.jpeg;', null, '4', '3', '2018-01-19 14:34:23', '2018-02-03 15:20:45');
INSERT INTO `bylh_news` VALUES ('6', 'testnews-type3', '1', '新华社', '发大发发大师傅阿范德萨发', null, null, '3', '1', '2018-02-03 15:28:21', '2018-02-03 15:28:34');

-- ----------------------------
-- Table structure for `bylh_notices`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_notices`;
CREATE TABLE `bylh_notices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL COMMENT '发布者id',
  `content` varchar(500) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_notices
-- ----------------------------
INSERT INTO `bylh_notices` VALUES ('1', '0', '不亦乐乎上线啦！', '2018-02-02 09:52:21', '2018-02-02 10:13:34');
INSERT INTO `bylh_notices` VALUES ('2', '0', '通过实名认证即可进行一般服务发布哟！增加长度增加长度增加长度', '2018-02-02 09:52:22', '2018-02-02 10:33:42');
INSERT INTO `bylh_notices` VALUES ('3', '0', '不亦乐乎又上线啦！<br>速速围观', '2018-02-02 10:16:33', '2018-02-06 13:53:50');
INSERT INTO `bylh_notices` VALUES ('4', '0', 'test公告', '2018-02-02 10:21:45', '2018-02-06 13:53:50');
INSERT INTO `bylh_notices` VALUES ('5', '0', 'test公告', '2018-02-06 13:53:31', '2018-02-06 13:54:01');
INSERT INTO `bylh_notices` VALUES ('6', '0', 'test公告', '2018-02-06 13:53:32', '2018-02-06 13:54:01');
INSERT INTO `bylh_notices` VALUES ('7', '0', 'test公告', '2018-02-06 13:53:33', '2018-02-06 13:54:02');
INSERT INTO `bylh_notices` VALUES ('8', '0', 'test公告', '2018-02-06 13:53:33', '2018-02-06 13:54:04');
INSERT INTO `bylh_notices` VALUES ('9', '0', 'test公告', '2018-02-06 13:53:34', '2018-02-06 13:54:03');
INSERT INTO `bylh_notices` VALUES ('10', '0', 'test公告', '2018-02-06 13:53:35', '2018-02-06 13:54:04');
INSERT INTO `bylh_notices` VALUES ('11', '0', 'test公告', '2018-02-06 13:53:36', '2018-02-06 13:54:05');
INSERT INTO `bylh_notices` VALUES ('12', '0', 'test公告', '2018-02-06 13:53:37', '2018-02-06 13:54:06');
INSERT INTO `bylh_notices` VALUES ('13', '0', 'test公告', '2018-02-06 13:53:38', '2018-02-06 13:54:06');
INSERT INTO `bylh_notices` VALUES ('14', '0', 'test公告', '2018-02-06 13:53:39', '2018-02-06 13:54:07');
INSERT INTO `bylh_notices` VALUES ('15', '0', 'test公告', '2018-02-06 13:53:43', '2018-02-06 13:54:08');

-- ----------------------------
-- Table structure for `bylh_orders`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_orders`;
CREATE TABLE `bylh_orders` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '订单id',
  `s_uid` int(10) unsigned DEFAULT NULL COMMENT '服务用户id',
  `d_uid` int(10) unsigned DEFAULT NULL COMMENT '需求用户id',
  `create_uid` int(10) unsigned DEFAULT NULL COMMENT '订单创建者id，反应出是预约需求还是购买服务',
  `type` int(1) DEFAULT NULL COMMENT '服务或需求类型（012，一般服务，实习课堂，专业问答）',
  `service_id` int(10) unsigned DEFAULT NULL COMMENT '服务id',
  `demand_id` int(10) unsigned DEFAULT NULL COMMENT '需求id',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '订单状态（-1,0,1,2,3交易失败，待支付，待收款，支付完成待评价，交易成功）',
  `price` double DEFAULT NULL COMMENT '服务价格',
  `vaildity` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '未支付订单只保存一天时间',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_orders
-- ----------------------------
INSERT INTO `bylh_orders` VALUES ('4', '1', '3', '3', '0', '2', null, '3', '100', null, '2017-12-07 18:57:58', '2018-02-01 15:53:30');
INSERT INTO `bylh_orders` VALUES ('5', '3', '1', '1', '0', '2', null, '3', '200', '2018-01-17 11:44:49', '2018-01-17 11:44:49', '2018-02-01 15:51:51');
INSERT INTO `bylh_orders` VALUES ('6', '3', '1', '1', '0', null, '1', '3', '500.5', '2018-01-17 14:13:39', '2018-01-17 14:13:39', '2018-01-31 17:58:07');
INSERT INTO `bylh_orders` VALUES ('7', '1', '5', '5', '0', '2', null, '1', '200', '2018-02-14 19:14:34', '2018-02-07 19:14:34', '2018-02-07 19:14:34');
INSERT INTO `bylh_orders` VALUES ('8', '1', '5', '5', '2', '1', null, '1', '-1', '2018-02-14 19:21:31', '2018-02-07 19:21:31', '2018-02-07 19:21:31');
INSERT INTO `bylh_orders` VALUES ('11', '3', '1', '3', '0', null, '1', '1', '300', '2018-02-14 23:11:14', '2018-02-07 23:11:14', '2018-02-07 23:11:14');

-- ----------------------------
-- Table structure for `bylh_qarecord`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_qarecord`;
CREATE TABLE `bylh_qarecord` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '提问-回答列表',
  `service_id` int(10) unsigned DEFAULT NULL COMMENT '提问专业问答服务id',
  `questioner` int(10) unsigned DEFAULT NULL COMMENT '提问用户id',
  `respondent` int(10) unsigned DEFAULT NULL COMMENT '回答用户id',
  `question` varchar(1000) DEFAULT NULL COMMENT '问题',
  `answer` varchar(1000) DEFAULT NULL COMMENT '答案',
  `status` int(11) DEFAULT '0' COMMENT '答案状态值：0待回答1回答待查看2已查看',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_qarecord
-- ----------------------------
INSERT INTO `bylh_qarecord` VALUES ('1', '2', '5', '1', '你好呀', '我很好', '2', '2018-01-31 10:02:35', '2018-01-31 13:47:07');
INSERT INTO `bylh_qarecord` VALUES ('2', '2', '5', '1', '我还有一个问题！', '什么问题呢？多喝温水', '2', '2018-01-31 10:19:22', '2018-02-02 11:00:17');
INSERT INTO `bylh_qarecord` VALUES ('3', '2', '5', '1', '还在吗？', null, '2', '2018-01-31 10:19:34', '2018-01-31 13:47:02');
INSERT INTO `bylh_qarecord` VALUES ('5', '2', '5', '1', '\"123\"', null, '2', '2018-01-31 12:58:18', '2018-02-02 12:01:28');
INSERT INTO `bylh_qarecord` VALUES ('6', '2', '5', '1', '法撒旦法第三', '你这个问题，也不用太担心，慢慢就会好的，注意多休息不好熬夜。', '2', '2018-01-31 13:43:03', '2018-02-02 11:00:17');
INSERT INTO `bylh_qarecord` VALUES ('7', '2', '6', '1', '发胜多负少的', null, '0', '2018-02-02 11:20:19', '2018-02-02 11:20:36');
INSERT INTO `bylh_qarecord` VALUES ('8', '2', '6', '1', '收费的水电费', null, '0', '2018-02-02 11:20:21', '2018-02-02 11:20:38');
INSERT INTO `bylh_qarecord` VALUES ('9', '1', '5', '1', '你好！我想请问一个问题，不知道你能否解答一下！', null, '0', '2018-02-07 19:21:25', '2018-02-07 19:21:25');

-- ----------------------------
-- Table structure for `bylh_qaservices`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_qaservices`;
CREATE TABLE `bylh_qaservices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '一般服务项目id',
  `uid` int(10) unsigned NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '服务类型（012一般服务，实习课堂，专业问答）',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '服务状态（012正常，下架，违规）',
  `title` varchar(50) DEFAULT NULL COMMENT '服务标题',
  `city` int(11) DEFAULT NULL COMMENT '服务城市',
  `class1_id` int(11) DEFAULT '-1' COMMENT '服务范围',
  `class2_id` int(11) DEFAULT '-1' COMMENT '服务专业',
  `class3_id` int(11) DEFAULT '-1' COMMENT '服务项目',
  `picture` varchar(200) DEFAULT NULL COMMENT '服务展示图片url',
  `describe` varchar(500) DEFAULT NULL COMMENT '服务详情描述',
  `price` double DEFAULT '-1' COMMENT '服务价格，负数表示面议',
  `price_type` int(11) DEFAULT '-1' COMMENT '单次价格种类：-1-无单位0-每八小时1-每天2-每次3-每套',
  `home_page` varchar(200) DEFAULT NULL COMMENT '服务相关主页（实习课堂发布）',
  `experience` varchar(500) DEFAULT NULL COMMENT '服务经历(用@符号区分每个经历）',
  `is_urgency` int(1) DEFAULT '0' COMMENT '是否紧急服务（01不是，是）',
  `view_count` int(11) DEFAULT '0' COMMENT '浏览次数',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_qaservices
-- ----------------------------
INSERT INTO `bylh_qaservices` VALUES ('1', '1', '2', '0', '专业问答2', '0', '3', '2', '1', null, 'fadfafdasfasd更是梵蒂冈过水电费感受到过分公司大锅饭', '-1', '0', null, null, '0', '9', '2017-12-28 21:34:48', '2018-02-07 20:58:22');
INSERT INTO `bylh_qaservices` VALUES ('2', '1', '2', '0', '专业问答', '53', '2', '3', '1', 'http://localhost/storage/qaservicespic/1@2018-01-30-21-35-22-5a70749a453d9qaservice1.jpg;2@2018-01-30-21-35-22-5a70749a46f69qaservice2.jpg;3@2018-01-30-21-35-22-5a70749a47739qaservice3.jpg;', '专业从事计算机基础知识问答服务，一般包括：</br>1、计算机网络相关知识</br>2、计算机编程语言相关问题</br>3、网站建设相关问题', '-1', '0', null, null, '0', '46', '2018-01-30 21:35:22', '2018-02-02 12:01:28');

-- ----------------------------
-- Table structure for `bylh_region`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_region`;
CREATE TABLE `bylh_region` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '地区名（省／市／区县）',
  `parent_id` int(10) NOT NULL DEFAULT '0' COMMENT '上级地区的id\n\n例如：\n“中国”的id为1；那么“四川省”的parent_id就等于1；\n“四川省”的id为10；那么“成都市”的parent_id就等于10；\n“中国”的parent_id就等于0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_region
-- ----------------------------
INSERT INTO `bylh_region` VALUES ('8', '北京', '0', '2017-11-27 21:52:12', '2017-12-18 10:11:45');
INSERT INTO `bylh_region` VALUES ('9', '上海', '0', '2017-11-28 21:52:18', '2017-12-18 10:11:52');
INSERT INTO `bylh_region` VALUES ('10', '广州', '38', '2017-12-15 21:52:23', '2017-12-16 23:33:30');
INSERT INTO `bylh_region` VALUES ('11', '深圳', '38', '2017-12-15 21:52:29', '2017-12-16 23:33:38');
INSERT INTO `bylh_region` VALUES ('12', '杭州', '39', '2017-12-15 21:52:35', '2017-12-16 23:34:06');
INSERT INTO `bylh_region` VALUES ('13', '成都', '40', '2017-12-15 21:52:41', '2017-12-16 23:34:26');
INSERT INTO `bylh_region` VALUES ('14', '重庆', '0', '2017-11-29 21:52:46', '2017-12-18 10:12:03');
INSERT INTO `bylh_region` VALUES ('15', '武汉', '41', '2017-12-15 21:52:52', '2017-12-16 23:34:48');
INSERT INTO `bylh_region` VALUES ('16', '西安', '42', '2017-12-15 21:53:01', '2017-12-16 23:35:19');
INSERT INTO `bylh_region` VALUES ('17', '宁波', '39', '2017-12-15 21:53:07', '2017-12-16 23:35:26');
INSERT INTO `bylh_region` VALUES ('19', '天津', '0', '2017-11-30 21:53:15', '2017-12-18 10:12:11');
INSERT INTO `bylh_region` VALUES ('20', '常州', '43', '2017-12-15 21:53:22', '2017-12-16 23:35:41');
INSERT INTO `bylh_region` VALUES ('21', '厦门', '44', '2017-12-15 21:53:27', '2017-12-16 23:36:17');
INSERT INTO `bylh_region` VALUES ('22', '南京', '43', '2017-12-15 21:53:31', '2017-12-16 23:36:22');
INSERT INTO `bylh_region` VALUES ('23', '苏州', '43', '2017-12-15 21:53:38', '2017-12-16 23:36:25');
INSERT INTO `bylh_region` VALUES ('24', '扬州', '43', '2017-12-15 21:53:46', '2017-12-16 23:36:37');
INSERT INTO `bylh_region` VALUES ('25', '大连', '45', '2017-12-15 21:53:53', '2017-12-16 23:37:15');
INSERT INTO `bylh_region` VALUES ('26', '福州', '44', '2017-12-15 21:53:59', '2017-12-16 23:37:40');
INSERT INTO `bylh_region` VALUES ('27', '宿州', '43', '2017-12-15 21:54:05', '2017-12-16 23:37:45');
INSERT INTO `bylh_region` VALUES ('28', '兰州', '46', '2017-12-15 21:54:11', '2017-12-16 23:37:59');
INSERT INTO `bylh_region` VALUES ('29', '南昌', '47', '2017-12-15 21:54:24', '2017-12-16 23:38:16');
INSERT INTO `bylh_region` VALUES ('30', '晋城', '48', '2017-12-15 21:54:42', '2017-12-16 23:38:55');
INSERT INTO `bylh_region` VALUES ('31', '长沙', '49', '2017-12-15 21:55:10', '2017-12-16 23:39:08');
INSERT INTO `bylh_region` VALUES ('32', '连云港', '43', '2017-12-15 21:55:21', '2017-12-16 23:39:16');
INSERT INTO `bylh_region` VALUES ('33', '吉林', '0', '2017-12-15 21:55:29', '2017-12-15 21:55:29');
INSERT INTO `bylh_region` VALUES ('34', '芜湖', '50', '2017-12-15 21:55:38', '2017-12-16 23:39:58');
INSERT INTO `bylh_region` VALUES ('35', '郑州', '51', '2017-12-15 21:55:45', '2017-12-16 23:40:10');
INSERT INTO `bylh_region` VALUES ('36', '汕头', '38', '2017-12-15 21:55:53', '2017-12-16 23:40:22');
INSERT INTO `bylh_region` VALUES ('37', '石家庄', '52', '2017-12-15 21:55:59', '2017-12-16 23:40:36');
INSERT INTO `bylh_region` VALUES ('38', '广东', '0', '2017-12-01 23:33:26', '2017-12-18 10:12:17');
INSERT INTO `bylh_region` VALUES ('39', '浙江', '0', '2017-12-02 23:33:54', '2017-12-18 10:12:26');
INSERT INTO `bylh_region` VALUES ('40', '四川', '0', '2017-12-04 23:34:22', '2017-12-18 10:12:42');
INSERT INTO `bylh_region` VALUES ('41', '湖北', '0', '2017-12-06 23:34:44', '2017-12-18 10:13:04');
INSERT INTO `bylh_region` VALUES ('42', '陕西', '0', '2017-12-13 23:35:16', '2017-12-18 10:14:24');
INSERT INTO `bylh_region` VALUES ('43', '江苏', '0', '2017-12-03 23:35:38', '2017-12-18 10:12:35');
INSERT INTO `bylh_region` VALUES ('44', '福建', '0', '2017-12-07 23:36:13', '2017-12-18 10:13:16');
INSERT INTO `bylh_region` VALUES ('45', '辽宁', '0', '2017-12-16 23:37:08', '2017-12-16 23:37:08');
INSERT INTO `bylh_region` VALUES ('46', '甘肃', '0', '2017-12-15 23:37:54', '2017-12-18 10:14:46');
INSERT INTO `bylh_region` VALUES ('47', '江西', '0', '2017-12-11 23:38:12', '2017-12-18 10:13:58');
INSERT INTO `bylh_region` VALUES ('48', '山西', '0', '2017-12-12 23:38:52', '2017-12-18 10:14:05');
INSERT INTO `bylh_region` VALUES ('49', '湖南', '0', '2017-12-05 23:39:03', '2017-12-18 10:12:57');
INSERT INTO `bylh_region` VALUES ('50', '安徽', '0', '2017-12-08 23:39:55', '2017-12-18 10:13:22');
INSERT INTO `bylh_region` VALUES ('51', '河南', '0', '2017-12-09 23:40:06', '2017-12-18 10:13:42');
INSERT INTO `bylh_region` VALUES ('52', '河北', '0', '2017-12-10 23:40:33', '2017-12-18 10:13:50');
INSERT INTO `bylh_region` VALUES ('53', '吉林', '33', '2017-12-18 09:30:31', '2018-01-18 16:16:25');
INSERT INTO `bylh_region` VALUES ('54', '安庆', '50', '2017-12-19 10:00:37', '2018-01-18 16:16:27');
INSERT INTO `bylh_region` VALUES ('55', '新疆', '0', '2017-12-29 16:09:00', '2018-01-18 16:16:28');
INSERT INTO `bylh_region` VALUES ('56', '乌鲁木齐', '55', '2017-12-29 16:09:13', '2018-01-18 16:17:16');
INSERT INTO `bylh_region` VALUES ('57', '广西', '0', '2018-01-03 09:36:40', '2018-01-18 16:16:31');
INSERT INTO `bylh_region` VALUES ('58', '南宁', '57', '2018-01-03 09:37:07', '2018-01-18 16:17:20');
INSERT INTO `bylh_region` VALUES ('59', '佛山', '38', '2018-01-04 11:35:24', '2018-01-18 16:16:35');
INSERT INTO `bylh_region` VALUES ('60', '沈阳', '45', '2018-01-04 11:36:08', '2018-01-18 16:16:37');

-- ----------------------------
-- Table structure for `bylh_sensitive`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_sensitive`;
CREATE TABLE `bylh_sensitive` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keyword` varchar(50) DEFAULT NULL COMMENT '敏感词',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_sensitive
-- ----------------------------
INSERT INTO `bylh_sensitive` VALUES ('1', '傻逼');
INSERT INTO `bylh_sensitive` VALUES ('2', '傻叉');
INSERT INTO `bylh_sensitive` VALUES ('3', 'fuck');
INSERT INTO `bylh_sensitive` VALUES ('4', 'bitch');
INSERT INTO `bylh_sensitive` VALUES ('5', '解决');
INSERT INTO `bylh_sensitive` VALUES ('7', '屠夫');

-- ----------------------------
-- Table structure for `bylh_serviceclass1`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceclass1`;
CREATE TABLE `bylh_serviceclass1` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '服务范围分类',
  `name` varchar(50) DEFAULT NULL,
  `type` int(1) DEFAULT '0' COMMENT '服务类别（012，一般服务，实习课堂，专业问答）',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass1
-- ----------------------------
INSERT INTO `bylh_serviceclass1` VALUES ('1', '体育指导', '0', '2017-11-14 21:04:15', '2018-01-30 14:21:34');
INSERT INTO `bylh_serviceclass1` VALUES ('2', '艺术教习', '0', '2017-11-14 21:04:16', '2018-02-01 20:53:29');
INSERT INTO `bylh_serviceclass1` VALUES ('3', '家教辅导', '0', '2017-11-14 21:04:17', '2018-02-01 20:53:31');
INSERT INTO `bylh_serviceclass1` VALUES ('4', '科技助手', '0', '2017-11-14 21:04:19', '2018-01-30 14:23:11');
INSERT INTO `bylh_serviceclass1` VALUES ('5', '健康咨询', '0', '2017-11-14 21:04:29', '2018-02-01 20:53:33');
INSERT INTO `bylh_serviceclass1` VALUES ('6', '财经助理', '0', '2018-01-30 14:23:33', '2018-01-30 14:23:43');
INSERT INTO `bylh_serviceclass1` VALUES ('7', '文化指导', '0', '2018-01-30 14:23:39', '2018-01-30 14:23:46');
INSERT INTO `bylh_serviceclass1` VALUES ('8', '兴趣指导', '0', '2018-01-30 14:23:52', '2018-01-30 14:23:52');
INSERT INTO `bylh_serviceclass1` VALUES ('9', '事务助理', '1', '2018-01-30 14:23:58', '2018-02-01 20:53:47');
INSERT INTO `bylh_serviceclass1` VALUES ('10', '实习中介', '1', '2018-01-30 14:24:02', '2018-02-01 20:53:35');
INSERT INTO `bylh_serviceclass1` VALUES ('11', '专业问答', '2', '2018-01-30 14:24:06', '2018-02-01 20:53:38');

-- ----------------------------
-- Table structure for `bylh_serviceclass2`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceclass2`;
CREATE TABLE `bylh_serviceclass2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class1_id` int(10) unsigned DEFAULT NULL COMMENT '从属class1id',
  `name` varchar(50) DEFAULT NULL COMMENT 'c服务专业分类名',
  `type` int(1) DEFAULT '0' COMMENT '服务类别（012，一般服务，实习课堂，专业问答）',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass2
-- ----------------------------
INSERT INTO `bylh_serviceclass2` VALUES ('1', '1', '足球', '0', '2017-12-19 22:11:51', '2018-02-01 20:54:20');
INSERT INTO `bylh_serviceclass2` VALUES ('2', '2', '绘画', '0', '2017-12-19 22:11:59', '2018-02-01 20:55:38');
INSERT INTO `bylh_serviceclass2` VALUES ('3', '3', '高数', '0', '2017-12-20 00:28:01', '2018-02-01 20:55:39');
INSERT INTO `bylh_serviceclass2` VALUES ('4', '4', '助教', '0', '2017-12-19 22:11:37', '2018-02-01 20:54:55');
INSERT INTO `bylh_serviceclass2` VALUES ('5', '5', '家庭医生', '0', '2018-02-01 20:54:06', '2018-02-01 20:55:05');
INSERT INTO `bylh_serviceclass2` VALUES ('6', '6', '投资咨询', '0', '2018-02-01 20:54:06', '2018-02-01 20:55:24');
INSERT INTO `bylh_serviceclass2` VALUES ('7', '7', '排舞', '0', '2018-02-01 20:54:07', '2018-02-01 20:55:35');
INSERT INTO `bylh_serviceclass2` VALUES ('8', '8', '围棋', '0', '2018-02-01 20:54:09', '2018-02-01 20:56:05');
INSERT INTO `bylh_serviceclass2` VALUES ('9', '9', '秘书', '1', '2018-02-01 20:56:17', '2018-02-01 20:56:31');
INSERT INTO `bylh_serviceclass2` VALUES ('10', '10', '医院实习', '1', '2018-02-01 20:56:18', '2018-02-01 20:56:49');
INSERT INTO `bylh_serviceclass2` VALUES ('11', '11', '健康问答', '2', '2018-02-01 20:56:22', '2018-02-01 20:57:04');

-- ----------------------------
-- Table structure for `bylh_serviceclass3`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceclass3`;
CREATE TABLE `bylh_serviceclass3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class2_id` int(10) unsigned DEFAULT NULL COMMENT '从属class2id',
  `name` varchar(50) DEFAULT NULL COMMENT 'c服务专业分类名',
  `type` int(1) DEFAULT NULL COMMENT '服务类别（012，一般服务，实习课堂，专业问答）',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass3
-- ----------------------------
INSERT INTO `bylh_serviceclass3` VALUES ('1', '1', 'class3-1', '0', '2018-01-02 22:43:15', '2018-02-01 20:58:12');
INSERT INTO `bylh_serviceclass3` VALUES ('2', '2', 'class3-2', '0', '2018-01-02 22:43:16', '2018-02-01 20:58:13');
INSERT INTO `bylh_serviceclass3` VALUES ('3', '3', 'class3-3', '0', '2018-01-02 22:43:17', '2018-02-01 20:58:13');
INSERT INTO `bylh_serviceclass3` VALUES ('4', '4', 'class3-4', '0', '2018-01-02 22:43:13', '2018-02-01 20:58:14');
INSERT INTO `bylh_serviceclass3` VALUES ('5', '5', 'class3-5', '0', '2018-02-01 20:57:32', '2018-02-01 20:58:15');
INSERT INTO `bylh_serviceclass3` VALUES ('6', '6', 'class3-6', '0', '2018-02-01 20:57:32', '2018-02-01 20:58:15');
INSERT INTO `bylh_serviceclass3` VALUES ('7', '7', 'class3-7', '0', '2018-02-01 20:57:33', '2018-02-01 20:58:16');
INSERT INTO `bylh_serviceclass3` VALUES ('8', '8', 'class3-8', '0', '2018-02-01 20:57:34', '2018-02-01 20:58:17');
INSERT INTO `bylh_serviceclass3` VALUES ('9', '9', 'class3-9', '1', '2018-02-01 20:57:34', '2018-02-01 20:58:18');
INSERT INTO `bylh_serviceclass3` VALUES ('10', '10', 'class3-10', '1', '2018-02-01 20:57:36', '2018-02-01 20:58:18');
INSERT INTO `bylh_serviceclass3` VALUES ('11', '11', 'class3-11', '2', '2018-02-01 20:57:37', '2018-02-01 20:58:20');

-- ----------------------------
-- Table structure for `bylh_serviceinfo`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceinfo`;
CREATE TABLE `bylh_serviceinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `ename` varchar(200) DEFAULT NULL COMMENT '服务商名称',
  `elogo` varchar(200) DEFAULT NULL COMMENT '服务商logo',
  `brief` varchar(500) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `current_edu` varchar(200) DEFAULT NULL COMMENT '当前就读学历',
  `graduate_edu` varchar(200) DEFAULT NULL COMMENT '毕业学历',
  `is_offline` int(1) DEFAULT '2' COMMENT '支持线下服务（0,1,2线下支持，线上支持，线上线下都支持）',
  `has_video` int(1) DEFAULT '0' COMMENT '是否有视有频教程（0,1没有，有）',
  `pay_way` int(1) DEFAULT NULL COMMENT '支付方式（0,1微信，支付宝）',
  `pay_code` varchar(200) DEFAULT NULL COMMENT '支付二维码',
  `is_urgency` int(1) DEFAULT '0' COMMENT '是否紧急服务（0,1不是，是）--用于企业推广',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceinfo
-- ----------------------------
INSERT INTO `bylh_serviceinfo` VALUES ('3', '1', '实习中介', 'http://localhost/storage/profiles/2018-01-20-16-15-22-5a62fa9a51f9eelogo.jpg', '1、dfs</br>2、fsdfds', '北京', '四川大学@0', '北京大学@1', '2', '1', '0', 'http://localhost/storage/paycode/2018-01-20-16-57-20-5a630470db04cpaycode.jpg', '1', '2018-01-16 19:20:15', '2018-02-07 20:10:29');
INSERT INTO `bylh_serviceinfo` VALUES ('4', '2', 'jkjun', 'http://localhost/storage/profiles/2018-01-20-16-15-22-5a62fa9a51f9eelogo.jpg', null, null, null, '北京大学@1', '2', '0', '0', 'http://localhost/storage/paycode/2018-01-20-16-57-20-5a630470db04cpaycode.jpg', '1', '2018-01-20 15:34:09', '2018-02-07 22:02:06');
INSERT INTO `bylh_serviceinfo` VALUES ('5', '3', '网安所2', 'http://localhost/storage/profiles/2018-01-20-16-15-22-5a62fa9a51f9eelogo.jpg', '1、dfs</br>2、fsdfds', '成都', null, '北京大学@1', '2', '0', '1', 'http://localhost/storage/profiles/2018-01-20-16-15-22-5a62fa9a51f9eelogo.jpg', '1', '2018-01-21 19:15:08', '2018-02-07 22:40:38');
INSERT INTO `bylh_serviceinfo` VALUES ('6', '5', '专业问答', null, null, null, null, '北京大学@1', '2', '0', null, null, '0', '2018-02-07 20:24:44', '2018-02-07 22:02:05');

-- ----------------------------
-- Table structure for `bylh_servicereviews`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_servicereviews`;
CREATE TABLE `bylh_servicereviews` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `sid` int(10) unsigned DEFAULT NULL COMMENT '服务id',
  `type` int(1) DEFAULT '0' COMMENT '服务类型（012一般服务，实习课堂，专业问答）',
  `comments` longtext COMMENT '对服务进行评价（订单结束时）',
  `state` int(1) DEFAULT '0' COMMENT '评价状态（0,1,2正常，删除，违规）',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`rid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_servicereviews
-- ----------------------------
INSERT INTO `bylh_servicereviews` VALUES ('1', '2', '1', '0', '小伙子很不错', '0', '2018-01-30 16:25:49', '2018-01-30 16:42:04');
INSERT INTO `bylh_servicereviews` VALUES ('2', '5', '1', '0', '服务非常好！很到位', '0', '2018-01-30 16:26:49', '2018-01-30 16:42:06');
INSERT INTO `bylh_servicereviews` VALUES ('3', '1', '1', '0', '小伙子服务非常好！解答了我的疑惑。谢谢', '0', '2018-01-31 17:58:06', '2018-01-31 18:00:43');
INSERT INTO `bylh_servicereviews` VALUES ('4', '1', '1', '0', '做的非常好！山东卫视多所', '0', '2018-02-01 13:25:22', '2018-02-01 13:25:22');

-- ----------------------------
-- Table structure for `bylh_tempemail`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_tempemail`;
CREATE TABLE `bylh_tempemail` (
  `tmid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL,
  `type` int(1) DEFAULT '0' COMMENT '验证码类型，0：注册验证 1：忘记密码验证',
  `code` varchar(32) DEFAULT NULL COMMENT '邮箱验证码（随机）',
  `deadline` datetime DEFAULT NULL COMMENT '过期时间',
  PRIMARY KEY (`tmid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_tempemail
-- ----------------------------
INSERT INTO `bylh_tempemail` VALUES ('1', '1', '0', 'duj0di', '2018-01-25 13:52:06');
INSERT INTO `bylh_tempemail` VALUES ('2', '5', '0', '1efchy', '2018-01-25 13:01:40');

-- ----------------------------
-- Table structure for `bylh_userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_userinfo`;
CREATE TABLE `bylh_userinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户信息id',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '关联用户id',
  `photo` varchar(200) DEFAULT NULL COMMENT '个人头像',
  `note` varchar(200) DEFAULT NULL COMMENT '个人签名',
  `birthday` datetime DEFAULT NULL COMMENT '生日',
  `sex` int(1) DEFAULT '0' COMMENT '性别01（男女）',
  `city` varchar(50) DEFAULT NULL COMMENT '所在城市',
  `tel` varchar(20) DEFAULT NULL,
  `mail` varchar(300) DEFAULT NULL,
  `real_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `id_card` varchar(30) DEFAULT NULL COMMENT '身份证号',
  `realname_statue` int(1) DEFAULT '-1' COMMENT '审核状态\n-1:待提交资料，0: 待审核，\n1: 审核通过，\n2: 审核拒绝',
  `finance_statue` int(1) DEFAULT '-1' COMMENT '审核状态\n-1:待提交资料，0: 待审核，\n1: 审核通过，\n2: 审核拒绝',
  `majors_statue` int(1) DEFAULT '-1' COMMENT '审核状态\n-1:待提交资料，0: 待审核，\n1: 审核通过，\n2: 审核拒绝',
  `idcard_photo` varchar(200) DEFAULT NULL COMMENT '手持身份证照片',
  `finance_photo` varchar(200) DEFAULT NULL COMMENT '金融机构认证照片',
  `majors_photo` varchar(200) DEFAULT NULL COMMENT '专业技能认证照片',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_userinfo
-- ----------------------------
INSERT INTO `bylh_userinfo` VALUES ('1', '1', 'http://localhost/storage/profiles/2018-01-16-22-19-24-5a5e09ec4c89aphoto.jpg', 'this is note', '2000-05-11 00:00:00', '0', '北京', '15370103305', '631642753@qq.com', '贾军', '510781199405278615', '1', '0', '-1', 'fdsfs', 'http://localhost/storage/authentication/2018-02-07-20-10-29-5a7aecb58aa4efinance_photo.jpg+@+http://localhost/storage/authentication/2018-02-07-20-10-29-5a7aecb56fe3cfinance_photo.jpg', '123', '2017-11-13 21:55:28', '2018-02-07 20:10:29');
INSERT INTO `bylh_userinfo` VALUES ('2', '2', 'http://localhost/storage/profiles/2018-01-16-22-19-24-5a5e09ec4c89aphoto.jpg', null, null, '0', null, null, null, '君加', '510781199405278615', '1', '1', '1', 'fdsfds', 'http://localhost/storage/authentication/2018-02-07-20-38-48-5a7af3580108emajors_photo.jpg', '123', '2017-12-17 19:28:37', '2018-02-07 20:49:46');
INSERT INTO `bylh_userinfo` VALUES ('3', '5', 'http://localhost/storage/profiles/2018-01-16-22-19-24-5a5e09ec4c89aphoto.jpg', null, null, '0', null, '17302813643', 'zhuanyewend@qq.com', '马泽辉', '510781199405278615', '1', '-1', '0', 'http://localhost/storage/authentication/2018-02-07-20-20-05-5a7aeef5d03a7idcard1_photo.jpg+@+http://localhost/storage/authentication/2018-02-07-20-20-05-5a7aeef5d03adidcard2_photo.jpg', '', 'http://localhost/storage/authentication/2018-02-07-20-38-48-5a7af3580108emajors_photo.jpg', '2018-01-08 20:25:24', '2018-02-07 20:40:19');

-- ----------------------------
-- Table structure for `bylh_users`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_users`;
CREATE TABLE `bylh_users` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(20) DEFAULT NULL,
  `tel` varchar(15) DEFAULT NULL,
  `mail` varchar(150) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `type` int(1) NOT NULL DEFAULT '1' COMMENT '用户类型（0,1,2，管理员、普通用户，服务用户）',
  `tel_verify` int(1) NOT NULL DEFAULT '0' COMMENT '电话验证（0，1未验证，已验证）',
  `email_verify` int(1) NOT NULL DEFAULT '0' COMMENT '邮箱验证（0，1未验证，已验证）',
  `realname_verify` int(1) NOT NULL DEFAULT '0' COMMENT '实名制验证（-1，0，1，未提交，已提交未验证，已验证）',
  `finance_verify` int(1) NOT NULL DEFAULT '0' COMMENT '金融机构验证（0，1未验证，已验证）',
  `majors_verify` int(1) NOT NULL DEFAULT '0' COMMENT '专业验证（0，1未验证，已验证）',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '账户状态（0,1正常，禁用）',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_users
-- ----------------------------
INSERT INTO `bylh_users` VALUES ('0', 'admin', null, null, null, '0', '0', '0', '0', '0', '0', '0', null, '2018-01-29 10:18:47', '2018-01-29 10:18:51');
INSERT INTO `bylh_users` VALUES ('1', 'jkjun', '17302813643', 'jkjun0527@foxmail.com', '$2y$10$J7w8c8JqMCeH8N8ZBaouluoTDjhJAkO0h1QNwiDWiQf96/4ai02T2', '2', '1', '1', '1', '0', '0', '0', 'Z3pHz6gbIEJrnQ4Xyt9tvg5gs5OS6LUW86cn07Hbdhf47pysB8TDgqYoklDW', '2017-11-04 22:55:20', '2018-02-07 20:12:57');
INSERT INTO `bylh_users` VALUES ('2', 'test', null, null, '$2y$10$Mk4BtG4FAbEdkDxwqFkEhOTLzMHLNzi/Cmg.hzhWR8INm8JWxBEgq', '1', '0', '0', '1', '1', '0', '0', null, '2017-12-18 00:51:02', '2017-12-18 00:51:15');
INSERT INTO `bylh_users` VALUES ('3', 'testorder', null, null, null, '2', '0', '0', '0', '0', '0', '0', null, '2017-12-27 20:12:04', '2018-02-07 22:00:28');
INSERT INTO `bylh_users` VALUES ('4', 'admin', null, null, '$2y$10$LssSRi.sbNA/tbPD0iOp5.WJKhO8HI33Y2oHRHxrZn8bX7with1aK', '0', '1', '1', '1', '1', '1', '0', null, '2017-12-17 20:13:46', '2018-01-09 13:21:38');
INSERT INTO `bylh_users` VALUES ('5', 'jkjun0528', null, 'jkjun0528@foxmail.com', '$2y$10$LssSRi.sbNA/tbPD0iOp5.WJKhO8HI33Y2oHRHxrZn8bX7with1aK', '2', '0', '1', '1', '0', '0', '0', 'Yu198itOoOHineSx3Eop2r80vgnmK9MiuiZT8tsyvl3A7yJNFdzZPBG9hBkS', '2018-01-08 20:25:24', '2018-02-07 21:13:53');
INSERT INTO `bylh_users` VALUES ('7', '3645', '17302813645', null, '$2y$10$S4yTb420z0FsmX2uih29lurlAR8efaUcyOPkd4HmlOBXTzhO2pLMq', '1', '1', '0', '0', '0', '0', '0', 'mhAiCwplSMgR4K38O5kf8H4k2ek8BKUS9Nj4LuiEYhFPAOiv5nRdIcErUxe4', '2018-01-08 23:02:28', '2018-01-18 13:45:55');

-- ----------------------------
-- Table structure for `bylh_webinfo`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_webinfo`;
CREATE TABLE `bylh_webinfo` (
  `wid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aid` int(10) unsigned NOT NULL COMMENT '管理员id',
  `tel` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `class` varchar(100) NOT NULL COMMENT '网站信息名称\n用来描述改信息是什么，例如：网站简介（web_desc），网站的官微(weibo_234)',
  `content` varchar(1000) NOT NULL COMMENT '网站信息内容',
  `work_time` varchar(500) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`wid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_webinfo
-- ----------------------------
INSERT INTO `bylh_webinfo` VALUES ('1', '1', '15370103305', 'jkjun0527@foxmail.com', 'fsdfasdfdfasdfadsaf', '12344', 'fadfsafdsafasdfadsafd', null, '2017-08-20 12:35:34', '2017-12-17 15:48:03');
