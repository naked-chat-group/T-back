/*
Navicat MySQL Data Transfer

Source Server         : 1608
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : lav

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-29 08:49:46
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shop_goods_attributes
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods_attributes`;
CREATE TABLE `shop_goods_attributes` (
  `attrId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性自增ID',
  `goodsCatId` int(11) NOT NULL DEFAULT '0' COMMENT '最后一级商品分类ID',
  `goodsCatPath` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品分类路径',
  `attrName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '属性名称',
  `attrType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '属性类型:0:输入框 1:多选项 2:下拉框',
  `attrVal` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '属性值',
  `attrSort` int(11) NOT NULL DEFAULT '0' COMMENT '排序号',
  `isShow` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否显示:1:显示 0:不显示',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '有效状态:1:有效 -1:无效',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`attrId`)
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
