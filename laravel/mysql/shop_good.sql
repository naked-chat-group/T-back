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
-- Table structure for shop_good
-- ----------------------------
DROP TABLE IF EXISTS `shop_good`;
CREATE TABLE `shop_good` (
  `goodsId` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goodsSn` varchar(20) NOT NULL COMMENT '商品编号',
  `productNo` varchar(20) NOT NULL COMMENT '商品货号',
  `goodsName` varchar(50) NOT NULL COMMENT '商品名称',
  `goodsDesc` text NOT NULL COMMENT '商品描述',
  `goodsImg` varchar(150) DEFAULT NULL COMMENT '商品图片',
  `marketPrice` varchar(11) NOT NULL DEFAULT '0.00' COMMENT '售价',
  `shopPrice` varchar(11) NOT NULL DEFAULT '0.00' COMMENT '划线价',
  `goodsStock` int(11) NOT NULL DEFAULT '0' COMMENT '商品库存',
  `isSale` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否上架：0:不上架 1:上架',
  `isBes` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否礼物：0:否 1:是',
  `goodsCatId` int(11) NOT NULL COMMENT '最后一级商品分类ID',
  `brandId` int(11) DEFAULT '0' COMMENT '品牌Id',
  `cangku` int(11) DEFAULT '0' COMMENT '仓库Id',
  `isSpec` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否有规格：0:没有 1:有',
  `saleNum` int(11) NOT NULL DEFAULT '0' COMMENT '总销售量',
  `saleTime` datetime DEFAULT NULL COMMENT '上架时间',
  `visitNum` int(11) DEFAULT '0' COMMENT '访问数',
  `appraiseNum` int(11) DEFAULT '0' COMMENT '评价数',
  PRIMARY KEY (`goodsId`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8;
