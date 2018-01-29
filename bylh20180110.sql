/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bylh

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-10 12:41:53
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
INSERT INTO `bylh_admin` VALUES ('1', '1', 'admin', '$2y$10$Mk4BtG4FAbEdkDxwqFkEhOTLzMHLNzi/Cmg.hzhWR8INm8JWxBEgq', null, '2017-12-17 15:33:07', '2018-01-03 20:09:40', '2018-01-03 20:09:40');
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
INSERT INTO `bylh_adverts` VALUES ('2', '1', 'uhugh', 'ujjhuhjh', 'http://localhost/storage/adpic/2017-12-26-23-47-18-5a426f0623be4adpic.png', '0', '1', 'www,baidu.com', '2017-12-26 00:00:00', '2017-12-26 23:47:18', '2017-12-26 23:47:18');
INSERT INTO `bylh_adverts` VALUES ('3', '1', 'testad2', 'empty', 'http://localhost/storage/adpic/2017-12-26-23-52-19-5a4270336efeeadpic.png', '1', '3', 'www.baidu.com', '2017-12-27 00:00:00', '2017-12-26 23:52:19', '2017-12-26 23:52:19');

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
  `created_id` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_id` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_datetemp
-- ----------------------------
INSERT INTO `bylh_datetemp` VALUES ('1', '2', '7', '1', '200', '0', '2018-01-09 22:20:43', '2018-01-09 22:20:43');
INSERT INTO `bylh_datetemp` VALUES ('2', '3', '7', '1', '300', '0', '2018-01-09 22:21:18', '2018-01-09 22:21:18');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_demandreviews
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_demands`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_demands`;
CREATE TABLE `bylh_demands` (
  `id` int(10) unsigned NOT NULL,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `type` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '需求类型（012一般服务需求，金融需求，专业问答需求）',
  `state` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '需求状态（012正常，下架，违规）',
  `title` varchar(50) DEFAULT NULL COMMENT '需求标题',
  `city` varchar(50) DEFAULT NULL COMMENT '所需城市',
  `class1_id` int(11) NOT NULL COMMENT '服务范围',
  `class2_id` int(11) NOT NULL COMMENT '服务专业',
  `class3_id` int(11) NOT NULL COMMENT '服务细类',
  `picture` varchar(200) DEFAULT NULL COMMENT '描述照片（最多三张）',
  `describe` varchar(500) DEFAULT NULL COMMENT '需求描述',
  `price` double DEFAULT '-1' COMMENT '需求价格(-1表示面议)',
  `view_count` int(11) DEFAULT NULL COMMENT '浏览量',
  `is_urgency` int(3) DEFAULT '0' COMMENT '加急状态（0123）否、加急、顶、。。。',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_demands
-- ----------------------------
INSERT INTO `bylh_demands` VALUES ('1', '7', '0', '0', '高数求带', '成都', '1', '2', '3', 'demandspic/f8.jpg', '123</br>456', '100', null, '0', '2018-01-09 21:52:49', '2018-01-09 21:53:33');
INSERT INTO `bylh_demands` VALUES ('2', '7', '0', '0', '大物求飞', '成都', '2', '1', '4', null, '富士达防守打法的算法大沙发斯蒂芬三法师法师法师安达市发顺丰阿斯顿发生发顺丰大师傅阿萨德发大发三方sad发生的发生123', '-1', null, '1', '2018-01-09 22:45:15', '2018-01-09 22:48:33');

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
  `city` varchar(50) DEFAULT NULL COMMENT '服务城市',
  `class1_id` int(10) unsigned DEFAULT NULL COMMENT '服务范围',
  `class2_id` int(10) unsigned DEFAULT NULL COMMENT '服务专业',
  `class3_id` int(10) unsigned DEFAULT NULL COMMENT '服务项目',
  `picture` varchar(200) DEFAULT NULL COMMENT '服务描述图片url',
  `describe` varchar(500) DEFAULT NULL COMMENT '服务详情介绍',
  `price` double DEFAULT '-1' COMMENT '服务价格（-1为面议）',
  `home_page` varchar(200) DEFAULT NULL COMMENT '金融融资超级链接',
  `is_urgency` int(1) DEFAULT '0' COMMENT '是否紧急服务（0,1不是，是）',
  `view_count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_finlservices
-- ----------------------------
INSERT INTO `bylh_finlservices` VALUES ('1', '1', '1', '0', 'testservice2', '成都', '2', null, null, null, '发我二套房个人违反该防守打法是第三方发的发顺丰的地方大师傅阿凡达司法所打发斯蒂芬阿斯顿发送到发送到', '-1', null, '1', null, '2017-12-28 20:57:16', '2017-12-28 21:32:41');

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
  `city` varchar(50) DEFAULT NULL COMMENT '服务城市',
  `class1_id` int(11) DEFAULT NULL COMMENT '服务范围',
  `class2_id` int(11) DEFAULT NULL COMMENT '服务专业',
  `class3_id` int(11) DEFAULT NULL COMMENT '服务项目',
  `picture` varchar(200) DEFAULT NULL COMMENT '服务展示图片url',
  `describe` varchar(500) DEFAULT NULL COMMENT '服务详情描述',
  `price` double DEFAULT '-1' COMMENT '服务价格，负数表示面议',
  `home_page` varchar(200) DEFAULT NULL COMMENT '服务相关主页（实习课堂发布）',
  `experience` varchar(500) DEFAULT NULL COMMENT '服务经历(用@符号区分每个经历）',
  `is_urgency` int(1) DEFAULT '0' COMMENT '是否紧急服务（01不是，是）',
  `view_count` int(11) DEFAULT '0' COMMENT '浏览次数',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_genlservices
-- ----------------------------
INSERT INTO `bylh_genlservices` VALUES ('1', '0', '0', '0', '羽毛球陪练', '成都', '1', null, null, null, '防守打法的是发所发生地方', '-1', null, null, '1', '0', '2017-12-28 00:36:40', '2017-12-28 21:17:46');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_messages
-- ----------------------------
INSERT INTO `bylh_messages` VALUES ('1', '0', '1', '很抱歉！由于你的信息不符合要求您的企业信息审核未通过,尝试重新发布', '0', '0', '2017-12-17 21:08:31', '2017-12-17 21:08:31');
INSERT INTO `bylh_messages` VALUES ('2', '0', '2', '很抱歉！由于你的信息不符合要求您的企业信息审核未通过,尝试重新发布', '0', '0', '2017-12-17 21:10:21', '2017-12-17 21:10:21');
INSERT INTO `bylh_messages` VALUES ('3', '0', '2', '恭喜您！您的企业信息审核通过！', '0', '0', '2017-12-17 21:12:21', '2017-12-17 21:12:21');
INSERT INTO `bylh_messages` VALUES ('4', '0', '1', '恭喜您！您的企业信息审核通过！', '0', '0', '2017-12-17 21:14:14', '2017-12-17 21:14:14');
INSERT INTO `bylh_messages` VALUES ('5', '0', '1', '恭喜您！您的实习中介认证审核通过！', '0', '0', '2017-12-18 00:44:15', '2017-12-18 00:44:15');
INSERT INTO `bylh_messages` VALUES ('6', '0', '2', '恭喜您！您的实习中介认证审核通过！', '0', '0', '2017-12-18 00:44:26', '2017-12-18 00:44:26');
INSERT INTO `bylh_messages` VALUES ('7', '0', '2', '恭喜您！您的专业问答认证审核通过！', '0', '0', '2017-12-18 00:48:29', '2017-12-18 00:48:29');
INSERT INTO `bylh_messages` VALUES ('8', '0', '1', '恭喜您！您的专业问答认证审核通过！', '0', '0', '2017-12-18 00:48:36', '2017-12-18 00:48:36');
INSERT INTO `bylh_messages` VALUES ('9', '0', '2', '恭喜您！您的专业问答认证审核通过！', '0', '0', '2017-12-18 00:51:37', '2017-12-18 00:51:37');
INSERT INTO `bylh_messages` VALUES ('10', '0', '1', '恭喜您！您的专业问答认证审核通过！', '0', '0', '2017-12-18 00:52:16', '2017-12-18 00:52:16');

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
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_news
-- ----------------------------
INSERT INTO `bylh_news` VALUES ('1', 'new1', '0', '新华社', '导语：电子竞技产业作为国内增速最快的市场近年来吸引了众多资本涌入，根据相关数据显示电竞产业在今年有望达到700亿元产值。然而电子竞技之所以有如此之大的发展潜能，其中主要得益于女性玩家参与度的持续增长。随着电竞普及程度的不断增加，越来越多的女性参与到电子竞技的产业中，不仅是作为观众，同时还有电竞玩家、电竞选手、游戏设计师、俱乐部运营等等众多的角色。<br>然而电子竞技对待女性玩家的态度似乎并没有随着女性群体的增长而改变，相反纵观国内外电竞圈，女性电竞从业者目前仍处在一个较为尴尬的位置。恒一文化传播有限公司（以下简称恒一文化）作为电竞教育的核心企业，一直不断关注电竞产业内的不均衡发展现象；针对目前电竞行业所存在的“性别歧视”问题，恒一文化认为除了不断规范以外，电竞教育或许是解决问题的新途径。<br>从传统体育到电子竞技<br>纵观体育运动的发展，在竞技体育的发展初期，体育运动的文化形象一直传达着一种女性不属于运动的讯息，这种“性别歧视”让许多女性丧失了运动机会、资源、并带来报酬上的不平等。反观电子竞技的发展历程，女性玩家一直以来都占据着游戏玩家总人口的半壁江山，但她们在竞技类游戏中却只占据着很小一部分。而导致女性玩家在竞技游戏这个大市场中缺席的一个最重要的因素，则是在游戏中普遍存在的性别歧视。<br>在85%的玩家为男性玩家的大背景影响下，竞技游戏中一直不断上演网络辱骂、骚扰等恶劣事件，种种原因阻碍了许多女性投入到电竞游戏当中来。尽管如此，也有不少女性尝试加入职业电竞行业，但是结果往往不尽如人意。<br>[图片1]<br>女性电竞人坎坷追梦<br>大家熟知的《英雄联盟》解说小苍就曾组建过中国首支《英雄联盟》女子战队——英雄联盟adies，不幸的是由于缺乏比赛机会，这支战队在2013年4月宣布解散。对于女子电竞选手来说，很多人都被直接与作秀画上等号。尽管一些女性职业选手在技战水平和训练时长方面都不输男性选手，但相较于男性选手而言女选手的机会和收入都相对较少。<br>除此之外，当前电竞和直播行业呈现出快速崛起的趋势，但就目前的发展状况来看，绝大多数的观众对女主播的关注还是主要集中在外貌以及个人生活方面，他们看重的往往不是该女性玩家的真实技术，而仅仅是她的性别本身。<br>壁垒打破需教育引导<br>针对目前电竞行业存在的“性别歧视”，一些赛事也开始关注到这些问题。前段时间所举办的2017WESG新增设女子组比赛，旨在推动电竞运动中的男女平等；然而一些外媒却认为，将男女分开竞技并不是一个能解决在电竞游戏中女性玩家偏少的好方法，它只会加深那些潜在的问题。而经年累月下，当整个电竞游戏市场变动更加成熟、更为主流化之后，这一顽疾只会变得更加根深蒂固。<br>[图片2]<br>针对目前所存在的种种问题，恒一文化认为教育或许是打破这一壁垒的新途径。作为最早一批涉足电竞教育的企业，恒一团队一直在致力于推动电竞产业良性发展。一方面，教育的引导客观上会打破“男女差距”的认知；另一方面，电竞教育也为女性提供了更多的条件，无论是职业电竞选手还是有志于从事电竞行业的女性，电竞教育为她们拓宽了未来职业选择的方向。<br>结语：电子竞技是一种公平竞技运动。推动电竞运动中的男女平等，首先应鼓励更多的女性参与到电竞产业的各个环节中来。根据目前的发展态势，竞技类游戏的市场规模在2018年有望达到11亿美元，随着未来电竞产业的发展，女性的持续参与显得至关重要。如今，整个行业都逐渐开始支持和鼓励女从业者和女玩家们，恒一文化相信随着电竞教育的推动以及产业制度的不断完善，阻碍女性电竞人发展的“性别壁垒”终将会被打破。', 'http://eshunter.com/storage/newspic/1@2017-10-17-05-44-30-59e598bea31e1news1.png;2@2017-10-17-05-44-30-59e598bea43f3news2.png;', '公告', '0', '2017-12-26 20:51:37', '2018-01-02 22:50:26');
INSERT INTO `bylh_news` VALUES ('3', 'new3', '0', 'BBC', '发大幅度', null, '热点', '0', '2017-12-26 20:51:40', '2018-01-02 22:50:30');
INSERT INTO `bylh_news` VALUES ('4', 'testnews2', '1', '风华网', '发大发[图片1]<br>发士大夫撒发[图片2]', 'http://localhost/storage/newspic/1@2017-12-26-21-41-40-5a425194ef8efnews1.jpg;2@2017-12-26-21-41-41-5a42519501858news2.jpg;', '热点', '0', '2017-12-26 21:41:41', '2018-01-02 22:50:37');

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_orders
-- ----------------------------
INSERT INTO `bylh_orders` VALUES ('1', null, null, null, null, null, null, '0', null, null, '2017-12-07 18:57:58', '2017-12-07 18:57:58');

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
  `city` varchar(50) DEFAULT NULL COMMENT '服务城市',
  `class1_id` int(10) unsigned DEFAULT NULL COMMENT '服务范围',
  `class2_id` int(10) unsigned DEFAULT NULL COMMENT '服务专业',
  `class3_id` int(10) unsigned DEFAULT NULL COMMENT '服务项目',
  `picture` varchar(200) DEFAULT NULL COMMENT '服务展示图片url',
  `describe` varchar(500) DEFAULT NULL COMMENT '服务详情描述',
  `price` double DEFAULT '-1' COMMENT '服务价格，负数表示面议',
  `home_page` varchar(200) DEFAULT NULL COMMENT '服务相关主页（实习课堂发布）',
  `experience` varchar(500) DEFAULT NULL COMMENT '服务经历(用@符号区分每个经历）',
  `is_urgency` int(1) DEFAULT '0' COMMENT '是否紧急服务（01不是，是）',
  `view_count` int(11) DEFAULT '0' COMMENT '浏览次数',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_qaservices
-- ----------------------------
INSERT INTO `bylh_qaservices` VALUES ('1', '3', '2', '1', 'testservice3', '成都', '3', null, null, null, 'fadfafdasfasd更是梵蒂冈过水电费感受到过分公司大锅饭', '-1', null, null, '0', '0', '2017-12-28 21:34:48', '2017-12-28 21:36:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_region
-- ----------------------------
INSERT INTO `bylh_region` VALUES ('8', '北京', '0', '2017-10-15 13:12:51', '2017-10-15 13:12:51');
INSERT INTO `bylh_region` VALUES ('9', '上海', '0', '2017-10-15 13:13:01', '2017-10-15 13:13:01');
INSERT INTO `bylh_region` VALUES ('10', '广州', '0', '2017-10-15 13:13:07', '2017-10-15 13:13:07');
INSERT INTO `bylh_region` VALUES ('11', '深圳', '0', '2017-10-15 13:13:19', '2017-10-15 13:13:19');
INSERT INTO `bylh_region` VALUES ('12', '杭州', '0', '2017-10-15 13:13:55', '2017-10-15 13:13:55');
INSERT INTO `bylh_region` VALUES ('13', '成都', '0', '2017-10-15 13:14:12', '2017-10-15 13:14:12');
INSERT INTO `bylh_region` VALUES ('14', '重庆', '0', '2017-10-15 13:14:20', '2017-10-15 13:14:20');
INSERT INTO `bylh_region` VALUES ('15', '武汉', '0', '2017-10-15 13:14:35', '2017-10-15 13:14:35');
INSERT INTO `bylh_region` VALUES ('16', '西安', '0', '2017-10-15 13:14:44', '2017-10-15 13:14:44');
INSERT INTO `bylh_region` VALUES ('17', '宁波', '0', '2017-10-15 13:15:02', '2017-10-15 13:15:02');
INSERT INTO `bylh_region` VALUES ('18', '合肥', '0', '2017-10-15 13:15:47', '2017-10-15 13:15:47');
INSERT INTO `bylh_region` VALUES ('19', '天津', '0', '2017-10-20 04:46:35', '2017-10-20 04:46:35');
INSERT INTO `bylh_region` VALUES ('20', '常州', '0', '2017-10-23 22:50:33', '2017-10-23 22:50:33');
INSERT INTO `bylh_region` VALUES ('21', '厦门', '0', '2017-10-24 17:29:28', '2017-10-24 17:29:28');
INSERT INTO `bylh_region` VALUES ('22', '南京', '0', '2017-10-25 15:37:34', '2017-10-25 15:37:34');
INSERT INTO `bylh_region` VALUES ('23', '苏州', '0', '2017-10-26 11:32:56', '2017-10-26 11:32:56');
INSERT INTO `bylh_region` VALUES ('24', '扬州', '0', '2017-10-26 13:53:48', '2017-10-26 13:53:48');
INSERT INTO `bylh_region` VALUES ('25', '大连', '0', '2017-10-27 11:03:23', '2017-10-27 11:03:23');
INSERT INTO `bylh_region` VALUES ('26', '福州', '0', '2017-10-27 15:22:41', '2017-10-27 15:22:41');
INSERT INTO `bylh_region` VALUES ('27', '宿州', '0', '2017-11-02 17:00:29', '2017-11-02 17:00:29');
INSERT INTO `bylh_region` VALUES ('28', '兰州', '0', '2017-11-02 17:12:14', '2017-11-02 17:12:14');
INSERT INTO `bylh_region` VALUES ('29', '南昌', '0', '2017-11-03 10:00:53', '2017-11-03 10:00:53');
INSERT INTO `bylh_region` VALUES ('30', '晋城', '0', '2017-11-06 14:00:01', '2017-11-06 14:00:01');
INSERT INTO `bylh_region` VALUES ('31', '长沙', '0', '2017-11-06 16:43:51', '2017-11-06 16:43:51');
INSERT INTO `bylh_region` VALUES ('32', '连云港', '0', '2017-11-08 18:04:52', '2017-11-08 18:04:52');
INSERT INTO `bylh_region` VALUES ('33', '吉林', '0', '2017-11-10 12:27:15', '2017-11-10 12:27:15');
INSERT INTO `bylh_region` VALUES ('34', '新疆', '0', '2017-12-19 21:23:44', '2017-12-19 21:23:44');
INSERT INTO `bylh_region` VALUES ('35', '乌鲁木齐', '34', '2017-12-19 21:25:55', '2017-12-19 21:25:55');
INSERT INTO `bylh_region` VALUES ('36', 'vdfv', '9', '2017-12-28 21:39:29', '2017-12-28 21:39:29');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass1
-- ----------------------------
INSERT INTO `bylh_serviceclass1` VALUES ('1', 'type0', '0', '2017-11-14 21:04:15', '2017-11-14 21:04:54');
INSERT INTO `bylh_serviceclass1` VALUES ('2', 'type1', '1', '2017-11-14 21:04:16', '2017-11-14 21:04:46');
INSERT INTO `bylh_serviceclass1` VALUES ('3', 'type2', '2', '2017-11-14 21:04:17', '2017-11-14 21:04:56');
INSERT INTO `bylh_serviceclass1` VALUES ('4', 'type3', '0', '2017-11-14 21:04:19', '2018-01-02 22:46:53');
INSERT INTO `bylh_serviceclass1` VALUES ('5', 'type4', '2', '2017-11-14 21:04:29', '2018-01-02 22:46:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass2
-- ----------------------------
INSERT INTO `bylh_serviceclass2` VALUES ('1', '1', 'type11', '0', '2017-12-19 22:11:51', '2018-01-02 22:47:32');
INSERT INTO `bylh_serviceclass2` VALUES ('2', '2', 'type12', '0', '2017-12-19 22:11:59', '2018-01-02 22:47:36');
INSERT INTO `bylh_serviceclass2` VALUES ('3', '3', 'type13', '0', '2017-12-20 00:28:01', '2018-01-02 22:47:42');
INSERT INTO `bylh_serviceclass2` VALUES ('4', '0', 'type10', '0', '2017-12-19 22:11:37', '2018-01-02 22:47:30');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass3
-- ----------------------------
INSERT INTO `bylh_serviceclass3` VALUES ('1', '1', 'class3-2', null, '2018-01-02 22:43:15', '2018-01-02 22:48:00');
INSERT INTO `bylh_serviceclass3` VALUES ('2', '2', 'class3-3', null, '2018-01-02 22:43:16', '2018-01-02 22:48:01');
INSERT INTO `bylh_serviceclass3` VALUES ('3', '3', 'class3-4', null, '2018-01-02 22:43:17', '2018-01-02 22:48:02');
INSERT INTO `bylh_serviceclass3` VALUES ('4', '0', 'class3-1', null, '2018-01-02 22:43:13', '2018-01-02 22:47:58');

-- ----------------------------
-- Table structure for `bylh_serviceinfo`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceinfo`;
CREATE TABLE `bylh_serviceinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '用户id',
  `ename` varchar(200) DEFAULT NULL COMMENT '服务商名称',
  `elogo` varchar(200) DEFAULT NULL COMMENT '服务商logo',
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceinfo
-- ----------------------------
INSERT INTO `bylh_serviceinfo` VALUES ('1', '1', null, '', null, null, null, '2', '0', null, null, null, '2017-11-09 22:37:48', '2017-11-09 22:37:48');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_servicereviews
-- ----------------------------

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
INSERT INTO `bylh_tempemail` VALUES ('1', '1', '0', 'zk16fcpibo5ebo9mr092jstiz8dmrw1e', '2018-01-15 20:08:44');
INSERT INTO `bylh_tempemail` VALUES ('2', '5', '0', 'avc1uvw9mvcdij8xa7spmj4livw1mb8x', '2018-01-15 20:25:24');

-- ----------------------------
-- Table structure for `bylh_userinfo`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_userinfo`;
CREATE TABLE `bylh_userinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户信息id',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '关联用户id',
  `photo` varchar(200) DEFAULT NULL COMMENT '个人头像',
  `note` varchar(200) DEFAULT NULL COMMENT '个人签名',
  `birthday` varchar(50) DEFAULT NULL COMMENT '生日',
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
INSERT INTO `bylh_userinfo` VALUES ('1', '1', 'fdsfd', null, null, '0', '北京', '15370103305', '631642753@foxmail.com', '贾军', '510781199405278615', '1', '1', '1', 'fdsfs', '123', '123', '2017-11-13 21:55:28', '2017-12-18 00:52:16');
INSERT INTO `bylh_userinfo` VALUES ('2', '2', 'dfsf', null, null, '0', null, null, null, '君加', '510781199405278615', '1', '1', '1', 'fdsfds', '123', '123', '2017-12-17 19:28:37', '2017-12-18 00:51:37');
INSERT INTO `bylh_userinfo` VALUES ('3', '5', null, null, null, '0', null, null, null, null, null, '-1', '-1', '-1', null, null, null, '2018-01-08 20:25:24', '2018-01-08 20:25:24');

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
  `realname_verify` int(1) NOT NULL DEFAULT '0' COMMENT '实名制验证（0，1未验证，已验证）',
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
INSERT INTO `bylh_users` VALUES ('1', 'jkjun', '15370103305', '631642753@qq.com', '$2y$10$LssSRi.sbNA/tbPD0iOp5.WJKhO8HI33Y2oHRHxrZn8bX7with1aK', '1', '1', '1', '1', '1', '0', '0', null, '2017-11-04 22:55:20', '2018-01-09 13:37:28');
INSERT INTO `bylh_users` VALUES ('2', 'test', null, null, '$2y$10$Mk4BtG4FAbEdkDxwqFkEhOTLzMHLNzi/Cmg.hzhWR8INm8JWxBEgq', '1', '0', '0', '1', '1', '0', '0', null, '2017-12-18 00:51:02', '2017-12-18 00:51:15');
INSERT INTO `bylh_users` VALUES ('3', 'fdsfd', null, null, null, '1', '0', '0', '0', '0', '0', '0', null, '2017-12-27 20:12:04', '2017-12-27 20:12:04');
INSERT INTO `bylh_users` VALUES ('4', 'admin', null, null, '$2y$10$LssSRi.sbNA/tbPD0iOp5.WJKhO8HI33Y2oHRHxrZn8bX7with1aK', '0', '1', '1', '1', '1', '1', '0', null, '2017-12-17 20:13:46', '2018-01-09 13:21:38');
INSERT INTO `bylh_users` VALUES ('5', 'jkjun0527', null, 'jkjun0527@foxmail.com', '$2y$10$LssSRi.sbNA/tbPD0iOp5.WJKhO8HI33Y2oHRHxrZn8bX7with1aK', '1', '0', '1', '0', '0', '0', '0', 'cVRH4NOysFj5XvVWLUIhAg3EILbd4AFgyZer9Hf8MNt2PQOql2SjJBNbRRVJ', '2018-01-08 20:25:24', '2018-01-09 13:36:27');
INSERT INTO `bylh_users` VALUES ('7', '3643', '17302813643', null, '$2y$10$S4yTb420z0FsmX2uih29lurlAR8efaUcyOPkd4HmlOBXTzhO2pLMq', '1', '1', '0', '0', '0', '0', '0', 'mhAiCwplSMgR4K38O5kf8H4k2ek8BKUS9Nj4LuiEYhFPAOiv5nRdIcErUxe4', '2018-01-08 23:02:28', '2018-01-09 13:35:35');

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
