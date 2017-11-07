/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : bylh

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-11-07 23:24:34
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `bylh_admin`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_admin`;
CREATE TABLE `bylh_admin` (
  `aid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `type` int(11) DEFAULT NULL COMMENT '管理员类型',
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(60) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_admin
-- ----------------------------

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
  `validity` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '广告有效期截止时间',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`adid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_adverts
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_datetemp`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_datetemp`;
CREATE TABLE `bylh_datetemp` (
  `tid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '记录服务者预约需求的临时表',
  `sid` int(10) unsigned DEFAULT NULL COMMENT '服务用户id',
  `did` int(10) unsigned DEFAULT NULL COMMENT '需求用户id',
  `demand_id` int(10) NOT NULL COMMENT '需求id',
  `price` double DEFAULT NULL COMMENT '预约价格',
  `state` int(1) NOT NULL DEFAULT '0' COMMENT '状态（01，正常，删除）',
  `created_id` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_id` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_datetemp
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_demandreviews`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_demandreviews`;
CREATE TABLE `bylh_demandreviews` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '评论id',
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `did` int(10) unsigned DEFAULT NULL COMMENT '需求id',
  `comments` varchar(200) DEFAULT NULL COMMENT '对需求的留言或回答',
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
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_demands
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_finlservices`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_finlservices`;
CREATE TABLE `bylh_finlservices` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned NOT NULL COMMENT '发布用户id',
  `type` int(1) DEFAULT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_finlservices
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_genlservices
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_messages
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_news`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_news`;
CREATE TABLE `bylh_news` (
  `nid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `subtitle` varchar(100) DEFAULT NULL,
  `uid` int(10) unsigned NOT NULL COMMENT '作者id',
  `quote` varchar(200) DEFAULT NULL,
  `content` longtext NOT NULL,
  `picture` varchar(1000) DEFAULT NULL,
  `tag` varchar(100) DEFAULT NULL,
  `view_count` int(11) NOT NULL DEFAULT '0' COMMENT '浏览量',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nid`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_news
-- ----------------------------

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
  `vaildity` timestamp NULL DEFAULT NULL COMMENT '未支付订单只保存一天时间',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_orders
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_qaservices
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_sensitive`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_sensitive`;
CREATE TABLE `bylh_sensitive` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `keywords` varchar(50) DEFAULT NULL COMMENT '敏感词',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_sensitive
-- ----------------------------

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass1
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_serviceclass2`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceclass2`;
CREATE TABLE `bylh_serviceclass2` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class1_id` int(10) unsigned DEFAULT NULL COMMENT '从属class1id',
  `name` varchar(50) DEFAULT NULL COMMENT 'c服务专业分类名',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass2
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_serviceclass3`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceclass3`;
CREATE TABLE `bylh_serviceclass3` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `class2_id` int(10) unsigned DEFAULT NULL COMMENT '从属class2id',
  `name` varchar(50) DEFAULT NULL COMMENT 'c服务专业分类名',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceclass3
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_serviceinfo`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_serviceinfo`;
CREATE TABLE `bylh_serviceinfo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `city` varchar(50) DEFAULT NULL,
  `current_edu` varchar(200) DEFAULT NULL COMMENT '当前就读学历',
  `graduate_edu` varchar(200) DEFAULT NULL COMMENT '毕业学历',
  `is_offline` int(1) DEFAULT '2' COMMENT '支持线下服务（0,1,2线下支持，线上支持，线上线下都支持）',
  `has_video` int(1) DEFAULT '0' COMMENT '是否有视有频教程（0,1没有，有）',
  `pay_code` varchar(200) DEFAULT NULL COMMENT '支付二维码',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_serviceinfo
-- ----------------------------

-- ----------------------------
-- Table structure for `bylh_servicereviews`
-- ----------------------------
DROP TABLE IF EXISTS `bylh_servicereviews`;
CREATE TABLE `bylh_servicereviews` (
  `rid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `uid` int(10) unsigned DEFAULT NULL COMMENT '用户id',
  `sid` int(10) unsigned DEFAULT NULL COMMENT '服务id',
  `comments` varchar(200) DEFAULT NULL COMMENT '对服务进行评价（订单结束时）',
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_tempemail
-- ----------------------------

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
  `real_name` varchar(50) DEFAULT NULL COMMENT '真实姓名',
  `id_card` varchar(30) DEFAULT NULL COMMENT '身份证号',
  `idcard_photo` varchar(200) DEFAULT NULL COMMENT '手持身份证照片',
  `finance_photo` varchar(200) DEFAULT NULL COMMENT '金融机构认证照片',
  `majors_photo` varchar(200) DEFAULT NULL COMMENT '专业技能认证照片',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_userinfo
-- ----------------------------

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
  `type` int(1) NOT NULL DEFAULT '0' COMMENT '用户类型（0,1，普通用户，服务用户）',
  `tel_verify` int(1) NOT NULL DEFAULT '0' COMMENT '电话验证（0，1未验证，已验证）',
  `email_verify` int(1) NOT NULL DEFAULT '0' COMMENT '邮箱验证（0，1未验证，已验证）',
  `realname_verify` int(1) NOT NULL DEFAULT '0' COMMENT '实名制验证（0，1未验证，已验证）',
  `finance_verify` int(1) NOT NULL DEFAULT '0' COMMENT '金融机构验证（0，1未验证，已验证）',
  `majors_verify` int(1) NOT NULL DEFAULT '0' COMMENT '专业验证（0，1未验证，已验证）',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '账户状态（0,1正常，禁用）',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '更新时间',
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bylh_users
-- ----------------------------
INSERT INTO `bylh_users` VALUES ('1', 'jkjun', '15370103305', '631642753@qq.com', '123456', '0', '1', '0', '0', '0', '0', '0', '2017-11-04 22:55:20', '2017-11-04 22:55:20');

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
INSERT INTO `bylh_webinfo` VALUES ('1', '1', '021-63339866', 'kefu@eshunter.com', '上海市黄浦区会稽路8号金天地国际大厦708室', '12344', '做专业的电子竞技职业招聘网站', null, '2017-08-20 12:35:34', '2017-10-15 15:46:14');
