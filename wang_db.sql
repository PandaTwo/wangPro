/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50533
Source Host           : localhost:3306
Source Database       : wang_db

Target Server Type    : MYSQL
Target Server Version : 50533
File Encoding         : 65001

Date: 2015-06-08 18:28:04
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for adminmenu
-- ----------------------------
DROP TABLE IF EXISTS `adminmenu`;
CREATE TABLE `adminmenu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(255) DEFAULT NULL COMMENT '菜单名称',
  `parentId` int(11) DEFAULT NULL COMMENT '父类id',
  `URL` varchar(255) NOT NULL,
  `sort` int(11) DEFAULT NULL COMMENT '排序',
  `isshow` bit(1) DEFAULT NULL COMMENT '是否显示',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adminmenu
-- ----------------------------
INSERT INTO `adminmenu` VALUES ('1', '会员管理', '0', '#', '1', '');
INSERT INTO `adminmenu` VALUES ('2', '带宽管理', '0', '#', '2', '');
INSERT INTO `adminmenu` VALUES ('3', '信息管理', '0', '#', '3', '');
INSERT INTO `adminmenu` VALUES ('6', '系统管理', '0', '#', '4', '');
INSERT INTO `adminmenu` VALUES ('7', '地址管理', '0', '#', '5', '');
INSERT INTO `adminmenu` VALUES ('8', '财务管理', '0', '#', '6', '');
INSERT INTO `adminmenu` VALUES ('9', '套餐设置', '2', '/packages/', '1', '');
INSERT INTO `adminmenu` VALUES ('10', '管理员设置', '6', '/adminuser/', '1', '');
INSERT INTO `adminmenu` VALUES ('11', '后台菜单设置', '6', '/adminmenu/', '2', '');
INSERT INTO `adminmenu` VALUES ('12', '机柜设置', '2', '/cabinets', '2', '');
INSERT INTO `adminmenu` VALUES ('13', '设备设置', '2', '/equipment', '3', '');
INSERT INTO `adminmenu` VALUES ('14', '系统设置', '6', '/systemsetting', '3', '');
INSERT INTO `adminmenu` VALUES ('15', '地址列表', '7', '/address', '1', '');
INSERT INTO `adminmenu` VALUES ('16', '收费记录', '8', '/payrecord', '1', '');
INSERT INTO `adminmenu` VALUES ('17', '公告管理', '3', '/news', '1', '');
INSERT INTO `adminmenu` VALUES ('18', '用户登记', '1', '/member/registraion', '3', '');
INSERT INTO `adminmenu` VALUES ('19', '登记列表', '1', '/member/registraionlist', '3', '');

-- ----------------------------
-- Table structure for adminuser
-- ----------------------------
DROP TABLE IF EXISTS `adminuser`;
CREATE TABLE `adminuser` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdOn` int(11) NOT NULL,
  `role` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of adminuser
-- ----------------------------
INSERT INTO `adminuser` VALUES ('1', 'admin', '123456', '232123123', '1');

-- ----------------------------
-- Table structure for cabinets
-- ----------------------------
DROP TABLE IF EXISTS `cabinets`;
CREATE TABLE `cabinets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cabinetsNumber` varchar(255) DEFAULT NULL COMMENT '机柜编号',
  `address` varchar(255) DEFAULT NULL COMMENT '机柜地址',
  `remark` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of cabinets
-- ----------------------------
INSERT INTO `cabinets` VALUES ('1', '2015-1234', '深圳市南山区高新科技园中区一路腾讯大厦', '0');

-- ----------------------------
-- Table structure for equipment
-- ----------------------------
DROP TABLE IF EXISTS `equipment`;
CREATE TABLE `equipment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `equipmentName` varchar(255) DEFAULT NULL COMMENT '设备名称',
  `company` varchar(255) DEFAULT NULL COMMENT '厂家',
  `price` decimal(10,0) DEFAULT NULL COMMENT '价格',
  `model` varchar(255) DEFAULT NULL COMMENT '型号',
  `status` bit(1) DEFAULT NULL COMMENT '状态',
  `updateName` varchar(255) DEFAULT NULL COMMENT '操作人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of equipment
-- ----------------------------
INSERT INTO `equipment` VALUES ('1', '设备', '我是厂家', '123', 'V2015-1', '', 'admin');
INSERT INTO `equipment` VALUES ('2', '设备2', '我是厂家2', '1522', 'V2015-1255', '', 'admin');

-- ----------------------------
-- Table structure for members
-- ----------------------------
DROP TABLE IF EXISTS `members`;
CREATE TABLE `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adsl_id` varchar(255) DEFAULT NULL COMMENT '账号id',
  `adsl_pwd` varchar(255) DEFAULT NULL COMMENT '密码',
  `serviceSatus` varchar(255) DEFAULT NULL COMMENT '服务状态',
  `packageid` int(11) DEFAULT NULL COMMENT '套餐id',
  `start_time` int(11) DEFAULT NULL COMMENT '开户日期',
  `up_time` int(11) DEFAULT NULL COMMENT '续费日期',
  `end_time` int(11) DEFAULT NULL COMMENT '到期时间',
  `add_time` int(11) DEFAULT NULL COMMENT '交费时间',
  `username` varchar(255) DEFAULT NULL COMMENT '姓名',
  `sex` varchar(255) DEFAULT NULL COMMENT '性别',
  `cardid` varchar(255) DEFAULT NULL COMMENT '身份证号码',
  `cardpic` varchar(255) DEFAULT NULL COMMENT '身份证图片正面',
  `cardpic1` varchar(255) DEFAULT NULL COMMENT '身份证照片反面',
  `phoneNumber` varchar(255) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(255) DEFAULT NULL COMMENT '邮箱',
  `address` varchar(255) DEFAULT NULL COMMENT '安装地址',
  `equipmentid` int(11) DEFAULT NULL COMMENT '设备id',
  `equipment_sn` varchar(255) DEFAULT NULL COMMENT '设备序列',
  `cabinetsid` int(11) DEFAULT NULL COMMENT '机柜id',
  `updateName` varchar(255) DEFAULT NULL COMMENT '操作人',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of members
-- ----------------------------
INSERT INTO `members` VALUES ('1', null, null, null, null, null, null, null, null, '陈光标', '男', '112312345345345345345', '', '', '132111112345', 'guanbiao@qq.com', '光标家里的地址', null, null, null, 'admin');
INSERT INTO `members` VALUES ('2', null, null, null, '7', null, null, null, null, 'test', '男', '112312345345345345345', '', '', '135190019001', '1234@qq.com', '地址很长长长长长长长！！！！', null, null, null, 'admin');
INSERT INTO `members` VALUES ('3', null, null, null, '8', null, null, null, null, '熊猫', '男', '112312345345345345345', '', '', '132111112345', 'guanbiao@qq.com', '深圳市南山区高新科技园中区一路腾讯大厦', null, null, null, 'admin');
INSERT INTO `members` VALUES ('4', null, null, null, '7', null, null, null, null, 'test', '男', '112312345345345345345', '2015-06-02140835.jpg', '2015-06-02140835.jpg', '132111112345', 'guanbiao@qq.com', '深圳市南山区高新科技园中区一路腾讯大厦', null, null, null, 'admin');
INSERT INTO `members` VALUES ('5', null, null, null, '7', null, null, null, null, 'admin', '男', '112312345345345345345', '2015-06-02140940.jpg', '2015-06-02140940.jpg', '132111112345', 'guanbiao@qq.com', '深圳市南山区高新科技园中区一路腾讯大厦', null, null, null, 'admin');
INSERT INTO `members` VALUES ('6', null, null, null, '7', null, null, null, null, '测试', '男', '112312345345345345345', '2015-06-02141329.jpg', '2015-06-02141329.jpg', '135190019001', 'guanbiao@qq.com', '深圳市南山区高新科技园中区一路腾讯大厦', null, null, null, 'admin');
INSERT INTO `members` VALUES ('7', null, null, null, '7', null, null, null, null, 'admin', '男', '112312345345345345345', '2015-06-02143102.jpg', '', '132111112345', 'guanbiao@qq.com', '深圳市南山区高新科技园中区一路腾讯大厦', null, null, null, 'admin');
INSERT INTO `members` VALUES ('8', null, null, null, '8', null, null, null, null, '林志玲', '女', '112312345345345345345', '2015-06-02174337-0.jpg', '2015-06-02174337-1.jpg', '132111112345', 'guanbiao@qq.com', '女神免费安装。', null, null, null, 'admin');

-- ----------------------------
-- Table structure for packages
-- ----------------------------
DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `PackagesName` varchar(255) DEFAULT NULL,
  `Speed` varchar(255) DEFAULT NULL,
  `Price` float(8,2) DEFAULT NULL,
  `times` varchar(255) DEFAULT NULL,
  `status` bit(1) DEFAULT NULL,
  `UpdateName` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of packages
-- ----------------------------
INSERT INTO `packages` VALUES ('7', '4M包年', '4M', '1300.00', '一年', '', 'admin');
INSERT INTO `packages` VALUES ('8', '8M包年', '8M', '999.00', '一年', '', 'admin');

-- ----------------------------
-- Table structure for setting
-- ----------------------------
DROP TABLE IF EXISTS `setting`;
CREATE TABLE `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `value` varchar(255) DEFAULT NULL,
  `group` varchar(255) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of setting
-- ----------------------------
INSERT INTO `setting` VALUES ('1', 'mailName', 'js.lalarola@gmail.com', '', '0');
