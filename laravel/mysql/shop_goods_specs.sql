/*
Navicat MySQL Data Transfer

Source Server         : 1608
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : lav

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-29 08:49:17
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for shop_goods_specs
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods_specs`;
CREATE TABLE `shop_goods_specs` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品规格自增id',
  `goodsId` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `goodsName` varchar(50) NOT NULL COMMENT '商品名称',
  `marketPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `specPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '商品价',
  `specImg` varchar(100) DEFAULT NULL COMMENT '商品图片',
  `specStock` int(11) NOT NULL DEFAULT '0' COMMENT '库存',
  `warnStock` varchar(50) NOT NULL DEFAULT '0' COMMENT '库存预警值',
  `saleNum` int(11) DEFAULT '0' COMMENT '销量',
  `dataFlag` tinyint(4) DEFAULT '1' COMMENT '有效状态:1:有效 -1:无效',
  `warnStockval` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
