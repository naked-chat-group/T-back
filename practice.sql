/*
Navicat MySQL Data Transfer

Source Server         : zynli
Source Server Version : 50553
Source Host           : 127.0.0.1:3306
Source Database       : practice

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-06-17 09:31:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gift
-- ----------------------------
DROP TABLE IF EXISTS `gift`;
CREATE TABLE `gift` (
  `gid` int(11) NOT NULL AUTO_INCREMENT,
  `price` decimal(10,0) DEFAULT NULL,
  `giftname` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `imgurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`gid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of gift
-- ----------------------------
INSERT INTO `gift` VALUES ('2', '2', '板砖', '1', '/image/banzhuan.jpg');
INSERT INTO `gift` VALUES ('3', '10', '水晶', '1', '/image/shuijin.jpg');
INSERT INTO `gift` VALUES ('4', '100', '钻戒', '1', '/image/jin.jpg');
INSERT INTO `gift` VALUES ('5', '188', '宇宙飞船', '1', '/image/huojian.jpg');
INSERT INTO `gift` VALUES ('6', '1888', '神龙', '1', '/image/shenlong.jpg');

-- ----------------------------
-- Table structure for glance
-- ----------------------------
DROP TABLE IF EXISTS `glance`;
CREATE TABLE `glance` (
  `glance_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `glance_num` int(11) DEFAULT NULL,
  PRIMARY KEY (`glance_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of glance
-- ----------------------------

-- ----------------------------
-- Table structure for goods_seckill
-- ----------------------------
DROP TABLE IF EXISTS `goods_seckill`;
CREATE TABLE `goods_seckill` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `goods_name` varchar(30) DEFAULT NULL,
  `price` decimal(8,2) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of goods_seckill
-- ----------------------------
INSERT INTO `goods_seckill` VALUES ('1', '商品1', '12345.00', '10', '2018-11-17 09:00:00', '2018-11-17 12:00:00');
INSERT INTO `goods_seckill` VALUES ('2', '商品2', '12345.00', '10', '2018-11-17 09:00:00', '2018-11-17 10:00:00');
INSERT INTO `goods_seckill` VALUES ('3', '商品3', '12345.00', '10', '2018-11-17 09:00:00', '2018-11-17 10:00:00');

-- ----------------------------
-- Table structure for mes
-- ----------------------------
DROP TABLE IF EXISTS `mes`;
CREATE TABLE `mes` (
  `mes_id` int(11) NOT NULL AUTO_INCREMENT,
  `mes_content` text,
  `mes_time` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mes_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mes
-- ----------------------------
INSERT INTO `mes` VALUES ('3', '郭群大傻子！陈飞大傻子！ 王鹏大傻子！ 段海军大傻子！', '1532743625', '1');
INSERT INTO `mes` VALUES ('4', '呵呵呵呵呵呵呵呵呵呵呵呵呵', '1532748099', '1');
INSERT INTO `mes` VALUES ('5', '&lt;script&gt;window.location.href=&quot;www.bawei.com&quot;&lt;/script&gt;', '1535548923', '1');
INSERT INTO `mes` VALUES ('2', '我是个 大傻子  哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈哈', '1532740479', '2');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(11) NOT NULL,
  `addTime` datetime DEFAULT NULL,
  `order_number` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of order
-- ----------------------------

-- ----------------------------
-- Table structure for p_user
-- ----------------------------
DROP TABLE IF EXISTS `p_user`;
CREATE TABLE `p_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `tel` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of p_user
-- ----------------------------
INSERT INTO `p_user` VALUES ('1', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('2', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('3', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('4', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('5', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('6', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('7', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('8', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('9', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('10', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('11', 'lxink', '20', '123456789');
INSERT INTO `p_user` VALUES ('12', 'lxink', '20', '123456789');

-- ----------------------------
-- Table structure for remark
-- ----------------------------
DROP TABLE IF EXISTS `remark`;
CREATE TABLE `remark` (
  `remark_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `mes_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`remark_id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of remark
-- ----------------------------
INSERT INTO `remark` VALUES ('19', '1', '3');
INSERT INTO `remark` VALUES ('11', '2', '0');
INSERT INTO `remark` VALUES ('18', '2', '2');
INSERT INTO `remark` VALUES ('23', '1', '2');
INSERT INTO `remark` VALUES ('22', '1', '4');
INSERT INTO `remark` VALUES ('27', null, '5');
INSERT INTO `remark` VALUES ('28', null, '5');

-- ----------------------------
-- Table structure for score
-- ----------------------------
DROP TABLE IF EXISTS `score`;
CREATE TABLE `score` (
  `sno` int(11) NOT NULL COMMENT 'ѧ??id',
  `cno` varchar(20) NOT NULL COMMENT '?༶?',
  `degree` tinyint(4) DEFAULT NULL COMMENT '?ɼ?'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='?ɼ??';

-- ----------------------------
-- Records of score
-- ----------------------------

-- ----------------------------
-- Table structure for send_car
-- ----------------------------
DROP TABLE IF EXISTS `send_car`;
CREATE TABLE `send_car` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `bills_num` varchar(30) DEFAULT NULL COMMENT '单据编号',
  `bills_type` varchar(30) DEFAULT NULL COMMENT '单据类型',
  `company` int(11) DEFAULT NULL COMMENT '所属公司',
  `bills_status` tinyint(3) DEFAULT '2' COMMENT '单据状态1审核2未审核 3已生成配送签收单4保存5审核不通过',
  `warehouse_area` varchar(30) DEFAULT NULL COMMENT '仓库区域',
  `transport_path` varchar(50) DEFAULT NULL COMMENT '运输路线',
  `transport_way` varchar(20) DEFAULT NULL COMMENT '运输方式',
  `carrires_name` varchar(30) DEFAULT NULL COMMENT '承运商',
  `vehicle_name` varchar(50) DEFAULT NULL COMMENT '车型',
  `car_num` varchar(30) DEFAULT NULL COMMENT '车辆编码',
  `driver_name` varchar(30) DEFAULT NULL COMMENT '司机',
  `driver_tel` varchar(20) DEFAULT NULL COMMENT '司机电话',
  `weight` int(11) DEFAULT NULL COMMENT '重量',
  `volume` int(11) DEFAULT NULL COMMENT '体积',
  `load` int(11) DEFAULT NULL COMMENT '载重',
  `mileage` decimal(7,2) DEFAULT NULL COMMENT '里程（配送签收回写数据）',
  `warehouse` varchar(20) DEFAULT NULL COMMENT '所属仓库',
  `comment` varchar(255) DEFAULT NULL COMMENT '备注',
  `create_time` int(11) DEFAULT NULL COMMENT '单据日期',
  `create_person` varchar(30) DEFAULT NULL COMMENT '创建人',
  `update_person` varchar(30) DEFAULT NULL COMMENT '修改人',
  `update_time` int(11) DEFAULT NULL COMMENT '修改日期',
  `check_person` varchar(30) DEFAULT NULL COMMENT '审核人',
  `check_time` int(11) DEFAULT NULL COMMENT '审核日期',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='派车单表';

-- ----------------------------
-- Records of send_car
-- ----------------------------

-- ----------------------------
-- Table structure for shop_admin
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin`;
CREATE TABLE `shop_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员主键id',
  `admin_name` varchar(30) NOT NULL COMMENT '管理员名称',
  `role_id` int(11) NOT NULL COMMENT '管理员角色id',
  `create_time` datetime DEFAULT NULL COMMENT '创建时间',
  `email` varchar(50) DEFAULT NULL COMMENT '管理员邮件',
  `last_time` datetime DEFAULT NULL COMMENT '上次登录时间',
  `is_del` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否删除0未删除，1删除',
  PRIMARY KEY (`id`),
  UNIQUE KEY `admin_name` (`admin_name`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_admin
-- ----------------------------
INSERT INTO `shop_admin` VALUES ('1', 'root', '1', '2019-06-11 08:57:00', '123456@qq.com', null, '0');
INSERT INTO `shop_admin` VALUES ('2', 'lxinkC', '2', '2019-06-11 09:04:51', '123456@qq.com', null, '0');
INSERT INTO `shop_admin` VALUES ('3', 'lxink', '2', '2019-06-12 08:53:23', '123456@qq.com', null, '0');
INSERT INTO `shop_admin` VALUES ('4', 'lxinkae', '2', '2019-06-13 08:32:36', '123456@qq.com', null, '0');

-- ----------------------------
-- Table structure for shop_admin_menu
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin_menu`;
CREATE TABLE `shop_admin_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单id',
  `rid` int(11) NOT NULL COMMENT '权限id',
  `pid` int(11) NOT NULL DEFAULT '0' COMMENT '父级菜单id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_admin_menu
-- ----------------------------
INSERT INTO `shop_admin_menu` VALUES ('1', '1', '0');
INSERT INTO `shop_admin_menu` VALUES ('4', '2', '1');
INSERT INTO `shop_admin_menu` VALUES ('5', '4', '1');
INSERT INTO `shop_admin_menu` VALUES ('6', '6', '1');

-- ----------------------------
-- Table structure for shop_admin_password
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin_password`;
CREATE TABLE `shop_admin_password` (
  `uid` int(11) NOT NULL COMMENT '用户表的主键',
  `password` char(32) COLLATE utf8mb4_bin NOT NULL COMMENT '用户的密码',
  `create_at` int(11) NOT NULL COMMENT '创建时间',
  `status` tinyint(2) NOT NULL COMMENT '0代表当前密码，1代表上一次密码，2代表上上次密码，3代表删除记录',
  KEY `uid` (`uid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin COMMENT='用户密码表';

-- ----------------------------
-- Records of shop_admin_password
-- ----------------------------
INSERT INTO `shop_admin_password` VALUES ('0', '3b5326ff8ce1447ff490db4ad2c96160', '1560243420', '0');
INSERT INTO `shop_admin_password` VALUES ('1', '3b5326ff8ce1447ff490db4ad2c96160', '1560243891', '0');
INSERT INTO `shop_admin_password` VALUES ('2', 'f3102216de30bd27004a5fcdc5310f42', '1560319360', '2');
INSERT INTO `shop_admin_password` VALUES ('2', 'f1fb7410224db1a74979045c2de93e7f', '1560319393', '1');
INSERT INTO `shop_admin_password` VALUES ('2', 'd5ad30d1bad4e2afc6b1dd1bc64d5877', '1560319428', '0');
INSERT INTO `shop_admin_password` VALUES ('4', '3b5326ff8ce1447ff490db4ad2c96160', '1560414756', '0');
INSERT INTO `shop_admin_password` VALUES ('3', '3b5326ff8ce1447ff490db4ad2c96160', '1560414807', '0');

-- ----------------------------
-- Table structure for shop_admin_role
-- ----------------------------
DROP TABLE IF EXISTS `shop_admin_role`;
CREATE TABLE `shop_admin_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `name` varchar(30) NOT NULL COMMENT '角色名称',
  `is_del` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否删除0未删除，1删除',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_admin_role
-- ----------------------------
INSERT INTO `shop_admin_role` VALUES ('1', '超级管理员', '0');

-- ----------------------------
-- Table structure for shop_areas
-- ----------------------------
DROP TABLE IF EXISTS `shop_areas`;
CREATE TABLE `shop_areas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `area_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '地区名',
  `p_id` int(11) DEFAULT NULL COMMENT '上级ID',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=370635 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_areas
-- ----------------------------

-- ----------------------------
-- Table structure for shop_cat_brands
-- ----------------------------
DROP TABLE IF EXISTS `shop_cat_brands`;
CREATE TABLE `shop_cat_brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `cat_Id` int(11) DEFAULT NULL COMMENT '商品分类自增ID',
  `brand_Id` int(11) DEFAULT NULL COMMENT '品牌自增ID',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of shop_cat_brands
-- ----------------------------

-- ----------------------------
-- Table structure for shop_comments
-- ----------------------------
DROP TABLE IF EXISTS `shop_comments`;
CREATE TABLE `shop_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `comment` text COLLATE utf8_unicode_ci COMMENT '评价',
  `status` int(11) DEFAULT '0' COMMENT '评价状态  0.未审核   1.通过   2.未通过',
  `add_time` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reply_status` int(11) DEFAULT '0' COMMENT '回复的状态  0.未回复   1.回复',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_comments
-- ----------------------------

-- ----------------------------
-- Table structure for shop_good
-- ----------------------------
DROP TABLE IF EXISTS `shop_good`;
CREATE TABLE `shop_good` (
  `goodsId` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `goodsSn` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品编号',
  `productNo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品货号',
  `goodsName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品名称',
  `goodsImg` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品图片',
  `marketPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `shopPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '门店价',
  `warnStock` int(11) NOT NULL DEFAULT '0' COMMENT '预警库存',
  `goodsStock` int(11) NOT NULL DEFAULT '0' COMMENT '商品库存',
  `goodsUnit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '单位',
  `goodsTips` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '促销信息',
  `isSale` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否上架：0:不上架 1:上架',
  `isBes` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否精品：0:否 1:是',
  `isHot` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否热销产品：0:否 1:是',
  `isNew` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否新品：0:否 1:是',
  `isRecom` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否推荐：0:否 1:是',
  `goodsCatIdPath` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品分类ID路径',
  `goodsCatId` int(11) NOT NULL COMMENT '最后一级商品分类ID',
  `shopCatId1` int(11) NOT NULL COMMENT '门店商品分类第一级ID',
  `shopCatId2` int(11) NOT NULL COMMENT '门店商品第二级分类ID',
  `brandId` int(11) NOT NULL DEFAULT '0' COMMENT '品牌Id',
  `goodsDesc` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品描述',
  `goodsStatus` tinyint(4) NOT NULL DEFAULT '0' COMMENT '商品状态:-1:违规 0:未审核 1:已审核',
  `saleNum` int(11) NOT NULL DEFAULT '0' COMMENT '总销售量',
  `saleTime` datetime NOT NULL COMMENT '上架时间',
  `visitNum` int(11) NOT NULL DEFAULT '0' COMMENT '访问数',
  `appraiseNum` int(11) NOT NULL DEFAULT '0' COMMENT '评价数',
  `isSpec` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否有规格：0:没有 1:有',
  `gallery` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品相册',
  `goodsSeoKeywords` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品SEO关键字',
  `illegalRemarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '状态说明:一般用于说明拒绝原因',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '0' COMMENT '删除标志：-1:删除 1:有效',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`goodsId`),
  KEY `shop_good_goodscatidpath_index` (`goodsCatIdPath`(191)),
  KEY `shop_good_goodsstatus_issale_dataflag_index` (`goodsStatus`,`isSale`,`dataFlag`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shop_good
-- ----------------------------
INSERT INTO `shop_good` VALUES ('1', '5285442837989655', '5040', '邢利', 'https://lorempixel.com/640/480/?49611', '4379.26', '2351.22', '3047', '33503', '柯志新', 'Illum aut cupiditate consequatur ut optio. Quae corporis non excepturi alias. Possimus cumque voluptate sed adipisci expedita. Ad sed sint non ullam.', '1', '1', '0', '0', '0', 'nfo', '9', '2', '4', '91', 'Voluptate eos sunt ea et et. Magni a possimus cum minus. Et id similique enim facilis sequi ex.', '0', '264', '1927-08-09 21:32:52', '0', '1933', '0', 'Pariatur et dignissimos nobis mollitia est incidunt. Perspiciatis aperiam magni perferendis ea. At blanditiis velit ut dignissimos tenetur. Eos laboriosam est et nihil.', '钟楠', 'Et ea est maxime magnam quo. Consequatur nemo consequatur maiores. Voluptatem et quas dolor atque cumque aut. Sit quaerat libero et ut cum est reprehenderit.', '1', null, null);
INSERT INTO `shop_good` VALUES ('2', '374988039936038', '721561', '余正业', 'https://lorempixel.com/640/480/?43140', '4969.09', '1151.14', '7674', '55164', '耿瑞', 'Voluptatibus fuga qui et sunt nemo ut. Aperiam voluptatem asperiores sequi. Veritatis id qui quia distinctio sit dolores id et. Mollitia eveniet fugiat voluptas.', '0', '0', '0', '0', '0', 'pbm', '5', '3', '5', '20', 'Sit sit sed tempore veniam totam neque sed recusandae. Amet quos minima fugiat. Eius alias doloremque officiis omnis dicta quia. Rerum vel doloribus placeat aut voluptate dicta.', '-1', '541', '1944-12-17 10:46:06', '0', '1883', '0', 'Molestiae aut velit dolorem nisi. Voluptatibus ut ea iusto nulla quia ab vero. Velit quidem voluptatem in voluptatibus sequi.', '盛飞', 'Culpa doloremque blanditiis quasi. Asperiores tempore dolorem quod doloribus fugiat excepturi magni aliquam. Quis at sequi voluptates fugiat quam.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('3', '2411949553582708', '845', '吉秀珍', 'https://lorempixel.com/640/480/?11985', '4364.46', '6293.80', '7789', '43214', '池秀荣', 'Adipisci et architecto dolores provident assumenda ex. Molestias necessitatibus omnis nihil enim. Quo cumque sunt aut et voluptatibus nisi nemo.', '0', '1', '0', '1', '1', 'etx', '1', '6', '6', '4', 'Qui animi dignissimos blanditiis recusandae atque. In quae minus impedit. Eligendi et voluptatem corrupti et consequuntur mollitia.', '0', '353', '1926-03-21 19:54:18', '0', '1476', '0', 'Suscipit accusantium doloribus ea qui sunt et. Dolor laborum porro repellendus ut unde. Aut nobis quia aut minima odio rerum.', '傅丹丹', 'Impedit voluptatem ratione tenetur perspiciatis quo ratione voluptate vel. Excepturi alias qui et dolorum.', '1', null, null);
INSERT INTO `shop_good` VALUES ('4', '4556935504672111', '7274', '井伟', 'https://lorempixel.com/640/480/?20923', '5222.80', '9984.88', '1346', '68918', '韩涛', 'Quam nam ex adipisci rerum fugit dolor ut quis. Numquam eligendi aspernatur omnis illum.', '0', '1', '0', '1', '0', 'sh', '7', '0', '8', '53', 'Voluptatem quod veritatis veritatis culpa nesciunt. Ut quasi eligendi iure culpa corrupti. Sed eum quis aut saepe. Dolorum sed ut ea quo vitae. Porro ut velit repudiandae commodi magnam debitis sunt.', '1', '458', '1930-09-01 12:11:24', '0', '1830', '0', 'Dolorum error est consequatur recusandae. Aut omnis ex ab neque facilis consequatur molestiae. Quas veritatis quis et consequatur est. Laboriosam sit dolorum id nulla molestiae autem aut.', '畅婕', 'Dignissimos exercitationem aliquid similique eligendi consequatur et amet. Mollitia sapiente culpa dolor voluptate delectus. Error sint qui doloremque commodi quod.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('5', '4916244338029779', '0', '谷超', 'https://lorempixel.com/640/480/?82854', '337.82', '4479.75', '7114', '78761', '华梅', 'Praesentium cupiditate ab molestias ut sit. Libero deserunt eaque ut aut amet officiis. Minus accusamus modi repellat est. Omnis expedita dolor nesciunt sint eligendi quisquam sapiente numquam.', '0', '1', '1', '0', '1', 'wbxml', '3', '3', '2', '96', 'Et consequatur debitis fuga et. Laborum dolore et officia. Beatae voluptatem nulla quaerat dolores labore sint. Consequatur nesciunt aut veritatis est repellendus.', '1', '646', '1920-01-01 01:10:57', '0', '1317', '1', 'Sit commodi earum sit ut alias officia voluptate cum. Necessitatibus impedit perspiciatis molestiae. Incidunt unde distinctio dignissimos odio libero.', '滕振国', 'Neque delectus ut placeat commodi quisquam excepturi qui. Ad quaerat ducimus quo ab dolores exercitationem. Nam aperiam et nihil optio fugiat repellat. Aut dolorum nihil esse ducimus.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('6', '2448238687944589', '8332237', '敖刚', 'https://lorempixel.com/640/480/?46522', '1658.45', '6208.04', '3674', '43843', '陶文彬', 'Dignissimos aspernatur doloremque et qui autem fugit eligendi autem. Omnis nesciunt placeat ipsum quibusdam aperiam labore adipisci. Quia tempore quia et.', '1', '0', '1', '1', '0', 'class', '1', '1', '5', '95', 'Fuga velit esse omnis sint tempora excepturi. Atque dolorum perferendis praesentium perspiciatis repellendus animi. Et rerum ut est. Voluptatem dolorem qui minus molestiae odio.', '0', '738', '1941-08-27 08:09:09', '0', '1006', '0', 'Quasi ut aut temporibus nemo. Corrupti cupiditate asperiores temporibus. Perferendis et consequatur magnam.', '赖志明', 'Voluptatem iste aut quas dolor sunt reiciendis. Sit doloremque praesentium dicta exercitationem nemo. Et consequatur sit laboriosam quis.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('7', '2492572975283697', '86971317', '贺伦', 'https://lorempixel.com/640/480/?57064', '1945.24', '575.97', '4410', '65751', '陈林', 'Eum harum quidem delectus repudiandae. Pariatur ipsam dolores reiciendis maxime natus harum perferendis. Repellendus dolores soluta sed.', '1', '0', '0', '1', '1', 'css', '3', '8', '4', '87', 'Qui occaecati pariatur commodi. Et odit quis voluptatum repudiandae cum. Voluptatum dolore fugit est aut. Ea eius sequi similique. Perferendis aut dolor molestias quas.', '-1', '970', '1925-02-03 01:22:43', '0', '1529', '0', 'Qui natus porro quo facere neque iusto autem non. Aut consequatur occaecati voluptas. Quibusdam quos est veniam. Debitis ut est dolor quidem perferendis ad quia tempora.', '任敏', 'Dolorem rerum totam qui. Eum vel consequuntur dicta quis. Cum illum amet eum ipsa. Dolor consequuntur omnis consequuntur qui voluptates.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('8', '5540162435421551', '111109172', '刘君', 'https://lorempixel.com/640/480/?69912', '4654.99', '9888.92', '1052', '47879', '陶志勇', 'Exercitationem officiis esse libero ut impedit quod inventore. Autem amet et qui non. Nihil odio quia est ut aut distinctio at accusantium. Assumenda et ipsa omnis autem.', '1', '0', '0', '1', '0', 'pki', '0', '2', '8', '9', 'Praesentium voluptas ea est ut nihil fugiat. Rerum quam explicabo consectetur aliquid aut aut sit voluptatem.', '-1', '704', '1928-10-30 02:12:09', '0', '1994', '0', 'Ex iusto nihil et saepe quam labore aut aliquid. Cupiditate vitae perferendis et sed explicabo ad ut enim. Corrupti magni doloremque delectus facilis.', '匡嘉', 'Ex itaque ipsam est quos quia et. Voluptatem ab aspernatur quia. Ipsum deleniti aliquam eos id nemo.', '1', null, null);
INSERT INTO `shop_good` VALUES ('9', '5366451869571473', '6991147', '稽慧', 'https://lorempixel.com/640/480/?64505', '263.09', '1819.93', '4074', '46199', '于倩', 'Repellat at occaecati quo. Deleniti repellendus eveniet dolores sunt facere ut porro. Aut et libero quibusdam qui ut culpa ducimus non.', '1', '1', '0', '1', '0', 'sfv', '5', '5', '4', '53', 'Ut culpa ratione voluptatem. Soluta aperiam est perferendis molestias vitae unde. Pariatur facere aspernatur blanditiis atque corporis.', '-1', '768', '1927-05-17 01:39:12', '0', '1192', '0', 'Rem quisquam sed et recusandae. Tempore soluta quos reiciendis sed occaecati velit ratione. Soluta asperiores at quisquam qui id et.', '罗桂英', 'Tempora accusamus sed consequatur aut tempore aliquam. Cumque beatae atque quasi expedita. Molestiae unde aut vel quibusdam vero quod dolor.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('10', '345477195651942', '2379', '樊林', 'https://lorempixel.com/640/480/?26773', '1814.07', '461.61', '8669', '85626', '董建平', 'Consequatur porro minima sit molestias. Aspernatur est nesciunt fugit dolores. Sit quia fugiat enim cumque qui. Delectus vitae incidunt nobis ducimus quae.', '1', '1', '0', '1', '0', 'ico', '0', '3', '1', '63', 'Atque deleniti quae veritatis nesciunt aperiam fugit porro. Sequi rem quaerat soluta esse eius quis. Velit facilis ut velit excepturi praesentium quae ad.', '1', '703', '1936-03-19 06:49:39', '0', '1549', '0', 'Molestiae incidunt dolorum explicabo culpa dolores. Impedit molestias praesentium non voluptas distinctio.', '路畅', 'Iste tenetur impedit ut delectus animi eaque tenetur. Dolor non sunt est itaque. Aperiam praesentium labore ipsum libero. Iste placeat voluptas est amet aut nemo.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('11', '6011485887551502', '58682', '武鹏程', 'https://lorempixel.com/640/480/?21652', '1932.37', '8245.05', '3365', '64994', '查雪梅', 'Autem sunt reprehenderit facere neque. Quaerat laborum a adipisci dolor. Quaerat ut consectetur occaecati deleniti qui dolores in et.', '1', '0', '0', '0', '0', 'gnumeric', '3', '6', '0', '100', 'Et aspernatur distinctio doloremque illum doloribus et a cumque. Dolores adipisci fugiat eos laborum ut recusandae voluptas.', '0', '310', '1941-09-22 13:53:55', '0', '1160', '0', 'Ipsam vitae doloribus nisi enim distinctio est. Iste voluptatem mollitia sit non et magni est rerum. In maiores eius vel minima velit.', '仲玉英', 'Nostrum unde necessitatibus voluptatem cum optio explicabo modi. Id accusamus quis pariatur cumque deserunt doloribus quo. Vero suscipit fugiat numquam vero veritatis deserunt eos iste.', '1', null, null);
INSERT INTO `shop_good` VALUES ('12', '2221801455920561', '34', '应洪', 'https://lorempixel.com/640/480/?52692', '7248.23', '7730.92', '4877', '20956', '孔岩', 'Exercitationem sequi dicta aliquid animi tenetur et autem. Alias ut placeat est quos velit voluptatem consequatur. Laboriosam voluptatem cupiditate incidunt nostrum fugit quia facilis doloremque.', '1', '0', '0', '0', '0', 'sm', '0', '8', '1', '67', 'Eligendi consectetur error dolorem suscipit. Molestiae deserunt non est dicta eveniet ullam. Deleniti consequuntur ipsa atque voluptatibus.', '-1', '166', '1928-02-15 18:22:11', '0', '1476', '1', 'Mollitia consequatur quod odit. Est et nemo voluptas nihil. Et dignissimos nihil qui est et aut quo. Itaque occaecati excepturi iusto vel eum. Quia voluptatem impedit et eum esse sequi quae.', '屠桂珍', 'Molestiae inventore dolor ad a quidem ut delectus. Et maiores voluptatem dolorem inventore. Cupiditate distinctio qui aut dignissimos quae vel et.', '1', null, null);
INSERT INTO `shop_good` VALUES ('13', '4024007123045949', '3153457', '晋飞', 'https://lorempixel.com/640/480/?95106', '7528.35', '8924.01', '5143', '42257', '冉玲', 'Distinctio rem soluta omnis sit cumque eaque. Ducimus ut autem sit modi quae sit expedita. Sint nihil ad placeat incidunt voluptatibus. Incidunt excepturi nam quia soluta sint.', '0', '0', '0', '1', '0', 'pcap', '5', '8', '1', '2', 'Consequatur qui ex dolor necessitatibus et soluta. Doloremque earum nisi et quae dolorem. Occaecati culpa nemo non deserunt tempore qui dolores. Corporis eos fugiat aliquam et exercitationem.', '-1', '684', '1934-09-19 18:22:53', '0', '1577', '0', 'Voluptatem et debitis ut similique tenetur magni explicabo. Nihil aliquid ducimus corporis quisquam facere debitis mollitia. Ut aut id dolorem est nam aut quia.', '邬桂香', 'Unde in ut reiciendis nam ipsam eos. Repudiandae laborum ut repellendus deserunt nihil. Sit eos facere voluptatibus et ipsum qui.', '1', null, null);
INSERT INTO `shop_good` VALUES ('14', '4532789347200112', '77263595', '李洋', 'https://lorempixel.com/640/480/?75583', '621.94', '582.16', '7932', '67057', '郎鹏程', 'Dolor cumque inventore dolor. Iste tempora maiores aspernatur. Cupiditate error enim culpa hic.', '1', '0', '0', '0', '0', 'mets', '6', '3', '9', '14', 'Alias aperiam qui odio ipsa iusto dolores accusantium quo. Quas in ut omnis rem. Ut numquam quia saepe excepturi et. Earum at tempora incidunt error qui.', '-1', '807', '1943-09-15 03:27:30', '0', '1440', '0', 'Ea perferendis ipsum excepturi. Nostrum natus numquam voluptatem et fugit non consequatur. Porro tempora tempora possimus repellat non excepturi. Eos iure doloremque a.', '黄洋', 'Harum excepturi culpa delectus. Voluptatem ipsum et et. Aut velit aliquid id amet qui. Eum quia iure rerum autem quo in ad.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('15', '4929728469451013', '99', '詹洋', 'https://lorempixel.com/640/480/?46439', '9722.85', '1361.28', '5743', '20406', '苗超', 'Dolorum expedita esse facere dolorem impedit earum dicta. Ut soluta aperiam assumenda cumque. Eaque et nostrum quia officia sunt repellendus non. Quos similique omnis minus velit iure sint est vel.', '0', '1', '0', '1', '1', 'rdz', '9', '7', '2', '85', 'Necessitatibus explicabo optio recusandae quia. Asperiores dicta deserunt debitis sit.', '1', '279', '1944-11-04 08:12:14', '0', '1699', '1', 'Quaerat sed est tempora recusandae qui. Numquam sequi consequuntur et quia. Minima animi totam expedita et.', '伏坤', 'Rerum illo rem id voluptatibus. Maxime nisi exercitationem dolorem est quo et rerum non. Commodi ex fugit vero at nemo modi aperiam. Vel natus quia occaecati iusto veniam est autem.', '1', null, null);
INSERT INTO `shop_good` VALUES ('16', '348563726922493', '344705440', '林建军', 'https://lorempixel.com/640/480/?97090', '9852.76', '9331.75', '5233', '21254', '邸建军', 'Ut quas labore dolor repudiandae ipsum hic. Quo impedit possimus aut quod deserunt iure ipsa. Enim dicta nobis reprehenderit delectus nostrum quod.', '0', '1', '0', '0', '0', 'mpy', '3', '2', '6', '9', 'Illum voluptates minima temporibus nemo. Ullam ea assumenda qui unde nam beatae deserunt ad. Eaque sed cumque perferendis quis.', '0', '315', '1934-11-28 18:16:41', '0', '1302', '1', 'Expedita ex et itaque vel est molestiae similique. Sequi dolorum ullam quam vel sapiente. Molestiae velit enim cum ab autem beatae. Quae quia eum dolor accusantium.', '蔺爱华', 'Enim omnis ipsum et tempora voluptas. Enim dolores eos fugiat libero corporis pariatur fuga. Quo dolorem reiciendis molestiae et nemo.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('17', '4024007169787909', '901', '宗静', 'https://lorempixel.com/640/480/?25259', '861.19', '7588.43', '8655', '45933', '宗晶', 'Ut accusantium necessitatibus consequatur pariatur nihil. Ut provident culpa sint rerum reiciendis expedita non accusantium.', '0', '0', '0', '0', '0', 'sema', '3', '2', '2', '76', 'Culpa quos labore quia tempora doloremque. Voluptas neque aut deserunt distinctio aut. Voluptatibus architecto earum quaerat nemo omnis ipsum deserunt enim.', '-1', '896', '1944-07-17 00:02:12', '0', '1197', '1', 'Enim incidunt eos eligendi libero. Sit dolor facere perferendis tempora distinctio et veritatis. Temporibus animi dignissimos qui consequatur quo.', '崔淑华', 'Voluptatem aspernatur eos voluptatem distinctio autem. Repellendus reprehenderit nihil quo illum illum earum. Minus praesentium fuga ullam eveniet.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('18', '2221887099514787', '9238', '席新华', 'https://lorempixel.com/640/480/?58540', '8058.34', '9852.63', '3207', '40432', '欧畅', 'Vitae et qui ut dignissimos est et. Dolor at expedita et laudantium corporis. Et tempore quis sequi. Illo vitae ea quaerat odit iste perspiciatis.', '1', '0', '0', '1', '1', 'utz', '0', '0', '5', '23', 'A odit sint aliquam temporibus adipisci. Nihil dolores rerum voluptatem esse eaque fugit. Corrupti sit laborum cupiditate dolor sint.', '-1', '921', '1927-04-27 00:33:04', '0', '1588', '1', 'Ut fugit deserunt tenetur voluptatem. Quis nisi voluptas explicabo illo dolore qui vitae. Hic quam ipsa saepe nulla cum. Reiciendis ab voluptatum voluptates repudiandae.', '揭琴', 'Eos consectetur at sunt veritatis libero. Nisi consequatur omnis eaque consequatur corporis consequatur. Quis in sed sed corporis velit possimus. Fugit ut maxime facere porro ut.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('19', '4716528863557986', '313', '银军', 'https://lorempixel.com/640/480/?98722', '6871.16', '5805.10', '8682', '74097', '鲁阳', 'Esse ipsam ut qui neque. Sed dignissimos accusantium magni quos.', '0', '0', '0', '0', '0', 'wgt', '7', '7', '1', '7', 'Similique et accusamus rerum eligendi ab reiciendis nam. In qui neque qui ad. Officiis voluptatum ad at qui. Aut eligendi praesentium quia consequuntur repellat totam.', '-1', '468', '1926-09-24 07:07:51', '0', '1751', '0', 'Eligendi voluptatem nihil quaerat quasi iste temporibus. Aut dolore ut consequatur possimus rerum a. Occaecati incidunt vero blanditiis rerum. Voluptas veritatis eos nesciunt doloribus.', '臧龙', 'Labore aut cupiditate itaque eligendi. Laudantium sint labore dolorum voluptatum dolorem aut. Alias deserunt amet quas earum laboriosam suscipit voluptas.', '1', null, null);
INSERT INTO `shop_good` VALUES ('20', '5439475889244996', '2', '贺正平', 'https://lorempixel.com/640/480/?22420', '7376.75', '8753.75', '3648', '25030', '和雪', 'Mollitia cumque ea et labore. Facilis atque reiciendis deserunt assumenda. Ea ut iure nam expedita placeat.', '0', '0', '1', '1', '1', 'au', '3', '3', '1', '11', 'Earum qui vel beatae at natus cumque consequuntur. Temporibus autem illum sed voluptatem itaque. Dolores consectetur soluta totam nam tempora dolorem. Et maiores officia ipsa accusamus recusandae.', '1', '788', '1937-12-19 06:05:31', '0', '1312', '0', 'Vel quo sunt et voluptate. Et aspernatur eligendi autem at facere et. Dignissimos quia reprehenderit deleniti eos aut eius aliquid porro. Necessitatibus velit et ut incidunt omnis sed.', '牛雪', 'Commodi velit facilis autem natus. Consequatur dolor unde quia nesciunt velit laboriosam voluptas. Impedit expedita sit et.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('21', '5368201266511954', '487719058', '卜桂香', 'https://lorempixel.com/640/480/?69249', '3208.57', '3105.48', '1863', '34950', '耿洋', 'Voluptate veritatis enim sed voluptatem sequi ipsa. Qui optio iure similique ipsa quaerat. Impedit dolor mollitia tempora dolor. Omnis ut quis omnis sunt assumenda.', '0', '0', '0', '1', '0', 'mvb', '1', '4', '4', '32', 'Ea dolor iusto nostrum et dolore nisi rerum. Et accusamus et neque veniam impedit id.', '-1', '845', '1922-06-07 15:14:05', '0', '1082', '0', 'Sint dolorem itaque distinctio nam numquam. Distinctio quia illo perferendis sit architecto ea officiis.', '孔全安', 'Libero magni facilis earum ut neque praesentium mollitia. Blanditiis molestiae et assumenda quibusdam eos et dolorem. Non voluptatem omnis voluptatum repellendus sequi recusandae officiis.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('22', '4882937342477237', '30059570', '伍秀云', 'https://lorempixel.com/640/480/?73421', '365.59', '944.85', '4771', '12648', '江杰', 'Voluptatem dolores velit eos deserunt. Assumenda qui maiores et possimus illum consequatur. Cupiditate in unde corrupti.', '1', '0', '0', '1', '0', 'scm', '1', '8', '9', '6', 'Aut qui vitae quis aperiam ratione repellat. Consequatur vero at architecto vel harum exercitationem. Doloremque occaecati rerum qui possimus tempora voluptatum. Ut eum nesciunt asperiores a sit.', '-1', '869', '1948-09-30 03:57:47', '0', '1752', '0', 'Sint vero quis quisquam ut quasi. Sint ipsa id ad quia qui eaque. Sit accusamus vitae perspiciatis. Voluptatum minus dolorum laborum sed et quis odit veniam.', '邬桂花', 'Veniam veniam ut quos voluptas. Est adipisci quos est dolore quisquam omnis sapiente quo.', '1', null, null);
INSERT INTO `shop_good` VALUES ('23', '5192013435345905', '3', '闵智勇', 'https://lorempixel.com/640/480/?28168', '727.82', '4501.57', '6672', '71509', '侯珺', 'Ullam quisquam molestias non magni. Porro incidunt ab et blanditiis id consequatur. Nam veniam soluta ea et autem. Facere cum rem facere.', '0', '0', '1', '0', '1', 'ipk', '9', '5', '0', '26', 'Cupiditate sequi ut molestiae ut voluptatem facilis. Est enim illo qui rerum ea dignissimos. Eum voluptatem commodi provident non. Libero quam maiores natus adipisci. Eaque inventore et ipsum et.', '0', '671', '1940-02-01 18:07:06', '0', '1809', '0', 'Odio nemo hic eaque illo officia optio. Ab consequuntur tempore qui. Aspernatur consequatur neque voluptatem quae hic illum delectus. Sunt quisquam a maiores illum.', '纪秀芳', 'Laudantium repudiandae unde porro sit ea quo. Facere eligendi atque quo quo. Ex est eos sint magnam.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('24', '2508337796814944', '997', '荆芬', 'https://lorempixel.com/640/480/?56821', '7384.75', '6397.77', '8045', '80210', '孟慧', 'Harum aspernatur in quia dolores. Similique aut laboriosam sit quis animi. Magni nostrum expedita ea eum. Provident nihil sit officiis in illum dolor. Iusto nostrum rerum nisi placeat voluptatem.', '0', '0', '0', '0', '0', '7z', '6', '7', '5', '21', 'Non autem assumenda deleniti. Mollitia tempora a non ut repudiandae quisquam laborum. Officia totam officiis ut voluptate ex possimus. Nulla non nulla mollitia.', '0', '323', '1940-04-26 13:42:48', '0', '1998', '0', 'Ut laudantium laborum qui sunt et et cum in. Quidem repellendus nihil pariatur possimus ut dolore dolorum. Cum et atque minima et qui aut. Optio reiciendis ut aliquid ut.', '郎磊', 'Aut et sit dignissimos molestias sequi aliquam. Omnis neque non dolor ut voluptate est quia omnis. Dolore eligendi alias est nisi quo.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('25', '4916424926130375', '56970185', '项玉华', 'https://lorempixel.com/640/480/?95147', '1062.18', '3514.53', '1482', '10200', '范杨', 'Animi similique ex harum nemo. Unde illo autem omnis et et nam nemo. Ut sunt corporis id in soluta. Est quo omnis alias non aut.', '0', '0', '0', '0', '0', 'pgn', '1', '4', '2', '45', 'Qui inventore aut dignissimos est. Aspernatur soluta omnis doloribus dolorum.', '1', '132', '1932-12-18 19:29:00', '0', '1939', '0', 'Quisquam aut sint dolore inventore. Totam autem nam sint molestiae id ad consequatur molestias. Placeat et praesentium exercitationem cumque quia culpa. Possimus reiciendis provident nesciunt.', '习磊', 'Qui nemo voluptatum esse enim asperiores dolorem voluptatem. Cupiditate ipsum sint nihil praesentium eaque. Maiores qui sequi itaque quod facilis adipisci.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('26', '4556992692640228', '3659846', '邱斌', 'https://lorempixel.com/640/480/?49308', '7036.08', '3881.99', '3454', '83315', '井旭', 'Aut aut ut aut quas esse velit dolores. Natus et qui praesentium. Saepe aperiam consequuntur et quis nulla quis minima. Eius a aut quia eum.', '1', '0', '1', '1', '0', 'wmlsc', '3', '6', '1', '37', 'Adipisci molestiae reprehenderit nihil debitis. Quibusdam ea minima nemo est qui quaerat labore illo. Esse voluptatem illo delectus. Molestias ab doloremque nemo aperiam rem tempore officiis.', '-1', '429', '1928-11-14 16:52:58', '0', '1263', '0', 'Distinctio necessitatibus quasi dolorem doloremque nostrum quidem nemo. Accusamus et voluptatum non est repellendus a. Rem tenetur libero consequatur modi aut.', '董学明', 'Illo inventore necessitatibus voluptate velit ut qui. Doloribus ut dolorem adipisci illo est earum quam. Asperiores voluptas impedit dolorem expedita. Voluptatem rem excepturi alias aut qui.', '1', null, null);
INSERT INTO `shop_good` VALUES ('27', '5466203753712112', '70357458', '倪爱华', 'https://lorempixel.com/640/480/?49146', '2664.56', '8062.82', '7860', '31800', '乐海燕', 'Quod deleniti in eligendi minima. Sed vero impedit quia et ut et. Quod dolore laudantium optio maiores veritatis eaque.', '1', '1', '1', '1', '1', 'gam', '2', '4', '7', '39', 'Non et rerum eius non rerum. Ipsa beatae repudiandae unde ut eligendi et et doloribus.', '-1', '871', '1930-05-03 06:49:34', '0', '1057', '1', 'Molestiae explicabo et commodi. Est ex quidem ipsam inventore ut voluptatum aliquam.', '糜秀梅', 'Ipsum aliquam consequatur distinctio voluptatem tempora et dolores. Repellat ipsa ut tenetur quia vel sed qui. Nisi possimus vel et aliquam ducimus. Quibusdam quae quidem maiores placeat ad quisquam.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('28', '4556689345158737', '6955', '薛瑞', 'https://lorempixel.com/640/480/?99818', '4497.10', '5319.32', '5777', '70389', '万志文', 'Velit id repudiandae doloribus harum. Sed tenetur possimus voluptate perferendis officia natus. Maiores aliquid quidem rerum voluptate et qui. Qui nobis quis similique.', '1', '0', '0', '1', '0', 'ktx', '1', '7', '1', '96', 'Et accusantium dolor ab animi facilis. Cupiditate alias et est veritatis rerum. Molestias delectus consequuntur libero quam aut a.', '0', '416', '1923-06-19 01:01:26', '0', '1727', '0', 'Est aut ab odit est. Omnis soluta impedit qui consectetur laborum ad quia. Earum delectus hic sapiente porro.', '施欢', 'Doloremque error quas suscipit incidunt qui et velit. Voluptatem ut ad sunt maxime voluptate culpa itaque. Et sit ut qui labore voluptatum aspernatur expedita quo. Beatae error quas pariatur in.', '1', null, null);
INSERT INTO `shop_good` VALUES ('29', '4870029343418321', '1437431', '于丽丽', 'https://lorempixel.com/640/480/?80028', '6955.67', '8496.20', '1458', '67282', '祝致远', 'Ullam est et et dolor exercitationem. Ad asperiores assumenda aspernatur quibusdam dignissimos qui laborum. Ut eum et ea laudantium explicabo.', '1', '1', '1', '0', '1', 'bz', '5', '8', '4', '55', 'Cum necessitatibus est quo eveniet blanditiis. Voluptatem incidunt non non odit qui blanditiis. Consequuntur similique quia quia quia sit aut.', '-1', '129', '1932-10-22 21:03:43', '0', '1634', '1', 'Qui et perferendis atque accusamus rerum deserunt dignissimos. Repellendus repellat modi sit sed sint eius. Iste deleniti consectetur et neque et. Aut iste quia id aperiam.', '嵺伦', 'Et id ea autem voluptates consequuntur. Illo ratione sunt fuga dignissimos fugiat veritatis minus. Voluptas sit at et dolores occaecati pariatur.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('30', '5163585945242867', '82690392', '庞子安', 'https://lorempixel.com/640/480/?44169', '291.28', '4188.94', '8101', '74264', '卜馨予', 'Et minima explicabo est autem. Recusandae temporibus consequatur incidunt qui qui blanditiis. At et occaecati velit nobis.', '1', '1', '0', '0', '0', 'mdi', '3', '2', '1', '59', 'Veniam incidunt molestiae asperiores modi provident non. Assumenda et ut omnis error quisquam vero. Unde et qui maiores. Quo neque in voluptatem illum accusantium consequatur nemo eius.', '0', '482', '1946-05-01 12:55:34', '0', '1484', '1', 'Perspiciatis tenetur sit nemo ut est voluptatem non omnis. Neque fugit est est aut enim odit magni. Voluptate ducimus et perspiciatis tenetur explicabo rerum.', '嵺丽娟', 'Veritatis error id et vel accusamus pariatur laudantium. Non expedita dolores corporis et consequatur voluptatem.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('31', '4024007155930554', '630', '邹超', 'https://lorempixel.com/640/480/?92586', '5411.15', '3224.97', '5021', '57498', '柯明', 'Voluptatem est voluptatem consequatur voluptatem eius ipsam. Cumque iste et eum est molestiae officia amet. Placeat blanditiis cum ipsum ut minima molestiae dolor.', '0', '0', '1', '1', '1', 'oti', '2', '8', '4', '45', 'Mollitia ut ut doloremque voluptatem vero reprehenderit aut. Non non quis recusandae vitae consequatur eveniet. Sapiente eos excepturi nihil.', '1', '580', '1927-01-08 01:15:08', '0', '1452', '1', 'Suscipit eum eius sint autem quis omnis perferendis. Nesciunt necessitatibus deleniti eveniet quisquam odit qui excepturi nihil. Qui occaecati sapiente sint possimus aliquid id.', '宫梅', 'Perferendis voluptatum libero possimus ut id dolores ut molestias. Ipsam neque quos voluptatem at doloribus. Quo corporis et atque voluptas et quis magni. Sit sint et similique.', '1', null, null);
INSERT INTO `shop_good` VALUES ('32', '4092165140552', '440983', '于芬', 'https://lorempixel.com/640/480/?21337', '292.07', '6297.02', '4546', '80265', '董君', 'Quas vel a quae tempora omnis quis minus. Voluptatum mollitia aut labore exercitationem qui dolor eius. Et quo ipsam asperiores aut. Accusantium est atque itaque quaerat incidunt.', '1', '1', '0', '1', '0', 'sisx', '0', '7', '0', '86', 'Minus enim quas iure magnam. Vel quam similique beatae saepe dolor. Porro dolore asperiores sed molestiae.', '0', '814', '1929-09-06 00:26:09', '0', '1413', '0', 'Placeat possimus ad vel aspernatur ducimus. Quis rerum quia doloribus in. Enim rerum incidunt inventore. Aliquam commodi vel id qui ut.', '聂欣', 'Omnis eum sint qui. Quasi neque quae et ab enim explicabo excepturi. Id veritatis non et consequatur nemo iusto aperiam. Dolorem ut fugiat rerum perferendis. In veritatis ea voluptates.', '1', null, null);
INSERT INTO `shop_good` VALUES ('33', '2720172859331813', '33790', '谭玉珍', 'https://lorempixel.com/640/480/?62610', '5387.89', '9695.08', '3675', '60451', '位丹丹', 'Assumenda vel quibusdam rerum accusantium blanditiis totam blanditiis. Voluptatum a et impedit ea perspiciatis. Omnis consequatur quaerat quos hic.', '1', '0', '1', '1', '1', 'x3dv', '3', '0', '6', '8', 'Voluptatem beatae voluptatem vitae enim sunt. Eius consequatur ut labore voluptate voluptatum earum perspiciatis. Quia magni soluta molestiae sit. Qui sit aliquam enim est molestiae aliquid totam at.', '-1', '885', '1933-09-15 15:48:27', '0', '1280', '1', 'Dolor velit laborum dignissimos libero dicta rem dolorem eius. Nesciunt aut laborum doloremque consequuntur nostrum tempora. Aut et vitae aliquam quod.', '蔡浩', 'Alias dicta aperiam accusamus nesciunt et ad neque. Iste possimus tempora consectetur optio et. Explicabo corporis voluptatem omnis non et. Ullam id tempora voluptas.', '1', null, null);
INSERT INTO `shop_good` VALUES ('34', '5436720503151454', '97', '糜娜', 'https://lorempixel.com/640/480/?49365', '150.85', '4959.16', '8144', '81935', '窦欢', 'Velit aliquam nobis omnis at. Molestias voluptatem ad veritatis voluptatum quo nulla laudantium. Optio aut veritatis quia perspiciatis voluptas.', '1', '0', '1', '1', '1', 'wbxml', '2', '8', '9', '9', 'Facilis cumque incidunt voluptatem odit. Repudiandae ut non quasi laborum. Autem ad voluptatem recusandae nemo.', '0', '371', '1945-02-06 23:24:22', '0', '1869', '0', 'Rerum velit voluptas iure deleniti omnis. Commodi eum alias totam. Aut ducimus vel vitae et modi. Reiciendis voluptatum consequatur explicabo qui eligendi accusantium.', '罗建国', 'Aut porro eum id eaque quia ut eum. Quis voluptas illo fuga esse quia eius. Quia praesentium sunt et quo voluptatem. Laborum corrupti eum repellat quia rerum.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('35', '4024007167329', '742681', '曾佳', 'https://lorempixel.com/640/480/?36136', '7884.34', '4571.63', '8205', '80777', '晋超', 'Qui expedita consectetur cumque labore minus ab eveniet. Deleniti esse repudiandae itaque dolor. Quae nesciunt maxime magnam aut aut ipsa iste.', '1', '1', '0', '1', '0', 'odc', '7', '3', '4', '40', 'Aut omnis explicabo est aut autem facilis. Odit quis quis accusantium ex aut necessitatibus. Laborum laboriosam similique omnis vitae.', '1', '917', '1944-11-05 17:18:20', '0', '1524', '0', 'At atque vero dolorem. Odit voluptatem illum hic corrupti praesentium in laudantium.', '边娜', 'Quia consequatur sint placeat aperiam labore quia assumenda. Sequi ut est repudiandae expedita ut. Eum ullam vitae accusantium et aut. Ipsa facilis est dolores amet eius molestiae.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('36', '4539416898668447', '468271', '丘嘉俊', 'https://lorempixel.com/640/480/?77330', '6410.78', '8741.67', '7040', '88437', '齐超', 'Ut atque in ipsam quia omnis. Quia ea reiciendis ut.', '0', '0', '0', '1', '0', 'wrl', '0', '4', '5', '41', 'Magni ducimus cum nulla harum voluptatum quas perferendis. Saepe ipsam eius accusantium cum fugiat et id. Dolorem aut beatae voluptatem officiis.', '0', '853', '1920-06-17 10:11:29', '0', '1357', '0', 'Nostrum tenetur autem dolorem et quaerat sunt in. Et non ab nostrum reprehenderit illum et ut. Repudiandae laborum facere consequatur non ipsa quis dolorum. Quis error officiis qui eaque sunt.', '齐新华', 'Explicabo consequatur nostrum tenetur iste reiciendis. Iusto suscipit debitis expedita aut voluptates suscipit aut. Aut quis aut assumenda minima soluta et id beatae.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('37', '5190290669634061', '52', '白秀梅', 'https://lorempixel.com/640/480/?90256', '914.27', '4667.34', '3811', '49422', '仲芬', 'Non et consequatur ducimus alias tenetur. Omnis veritatis non harum voluptatum. Ea voluptatem sapiente sint error unde blanditiis libero rerum.', '0', '1', '0', '1', '0', 'rar', '1', '6', '3', '42', 'Est illum repellendus aut error vel sint. Repellendus sapiente aut aut ut.', '1', '305', '1933-02-07 13:41:19', '0', '1256', '1', 'Veniam aliquam maxime et et. Et ab non laudantium assumenda. Ut rerum ipsum ipsam quia et rerum aut voluptatem.', '严凯', 'Et rerum enim perspiciatis laborum quaerat. Reiciendis est dolor sapiente nisi ipsam architecto a quae. Totam qui in corrupti soluta. Dolorum sunt ea quae reprehenderit.', '1', null, null);
INSERT INTO `shop_good` VALUES ('38', '4916247417224864', '26212357', '霍琳', 'https://lorempixel.com/640/480/?99468', '8988.02', '5889.14', '7423', '19726', '尤淑珍', 'Enim maiores delectus nihil corporis quis perspiciatis ad. Tempora nam aliquid dolorem enim nobis ullam et in.', '0', '0', '1', '1', '1', 'tsv', '1', '4', '2', '72', 'Ipsa vero sit enim dicta voluptatum ut corrupti. Velit voluptatibus quam modi non aut placeat officiis sequi. Ex quae nam hic aut.', '-1', '539', '1924-05-22 23:11:21', '0', '1838', '0', 'Debitis veritatis non adipisci sapiente officiis minima aut. Facere sed et asperiores. Libero natus tempore natus reiciendis ut odio minima. Itaque est aliquid et nulla iure nihil ut.', '温正业', 'Aut tempore molestiae minus totam. Id nulla aut quisquam porro quia expedita dolorum ipsum. Est velit aliquam et corporis aut ea. Id aut error qui eaque.', '1', null, null);
INSERT INTO `shop_good` VALUES ('39', '4024007185050621', '89888', '霍敏静', 'https://lorempixel.com/640/480/?70938', '1453.40', '2450.12', '6233', '29513', '佟秀梅', 'Reiciendis quia officia natus debitis sed quaerat. Et vel iure dolores unde. Sit velit commodi sint molestias in.', '0', '0', '1', '1', '1', 'uoml', '0', '1', '1', '29', 'Minus et veniam consequatur beatae. Sed doloribus itaque illo rem minima consequatur ut. Alias et reiciendis harum quisquam dolores consequatur.', '0', '576', '1930-11-28 17:30:46', '0', '1820', '1', 'Eum voluptatem est doloremque quas. Eum placeat officiis animi doloribus reprehenderit. Ipsam sapiente culpa sed odit. Voluptatem repudiandae et itaque magni.', '巩洪', 'Non aperiam incidunt ipsum quisquam. Quidem ex quisquam ea mollitia laboriosam. Facere aut aspernatur vel repellat consectetur voluptas fuga.', '1', null, null);
INSERT INTO `shop_good` VALUES ('40', '6011396038884009', '53033', '林秀云', 'https://lorempixel.com/640/480/?63015', '4696.95', '4354.14', '5338', '20789', '屈慧', 'Quos eos error ex similique. Labore magni dignissimos sequi quasi.', '0', '1', '0', '1', '1', 's', '3', '5', '7', '97', 'Quos neque ipsam autem magni. Sit rem neque quis non. Inventore qui aut aut recusandae occaecati dignissimos expedita.', '0', '655', '1935-09-30 10:19:07', '0', '1051', '1', 'Nam inventore aut ipsum hic quo. Quis eveniet corporis est facere iure sit temporibus. Omnis officiis inventore aliquam quo molestiae.', '蒙玉珍', 'Non voluptatum ex harum ab accusamus. Reprehenderit neque ut enim inventore. Libero laborum voluptatem necessitatibus iste.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('41', '5568135124724086', '11', '保捷', 'https://lorempixel.com/640/480/?55076', '6711.76', '3302.66', '4188', '83204', '涂馨予', 'Natus architecto dolor aut quod. Minima aperiam et laborum eos maxime voluptates eos. Voluptas nihil perspiciatis consectetur occaecati libero. Veniam debitis numquam veniam sed minima dolor aut.', '0', '0', '0', '1', '0', 'xpl', '8', '0', '4', '21', 'Perferendis rerum et enim exercitationem libero numquam. Vel ullam molestiae odit explicabo quo nulla nobis est. Id dignissimos porro eum eos nisi et nisi. Illum eligendi et fuga rem.', '-1', '957', '1935-08-01 17:49:03', '0', '1963', '1', 'Eligendi eveniet ad ut quo. Officia minus voluptatem est tempore. Molestias id vitae voluptatem nihil error.', '熊畅', 'Culpa est magni et voluptatem repellendus. Earum reprehenderit autem cupiditate ipsa. Ipsa numquam laborum officiis optio aperiam voluptatem. Nam tempora et suscipit qui illo.', '1', null, null);
INSERT INTO `shop_good` VALUES ('42', '5375537275035936', '365', '古秀芳', 'https://lorempixel.com/640/480/?18657', '8377.88', '3126.52', '7951', '51051', '翟龙', 'Dolorem eum omnis ipsam ab expedita est sequi. Autem sunt repellendus sit sed voluptatibus fugit. Ut dolor reprehenderit cumque voluptas animi.', '1', '0', '1', '1', '0', 'clp', '1', '5', '7', '30', 'Ut error necessitatibus accusamus eos sed. Officia necessitatibus omnis voluptas similique dolorem tenetur magni. Eius commodi non et hic.', '1', '473', '1945-01-26 16:49:25', '0', '1649', '0', 'Quo animi quasi voluptatem sit dolore praesentium. Quia id dignissimos recusandae eos repellendus. Facere dolorem magni vero ipsa.', '郎璐', 'Est enim aut neque est voluptas rerum. Iste consequatur qui eos veritatis voluptates aut. Nesciunt voluptatibus sit numquam modi non ut temporibus et.', '1', null, null);
INSERT INTO `shop_good` VALUES ('43', '4485111558507332', '0', '谈雷', 'https://lorempixel.com/640/480/?38704', '8122.20', '4512.20', '8190', '46554', '刁智明', 'Optio consequatur quisquam vero. Numquam saepe voluptas voluptatem saepe tenetur velit unde. A dicta ipsum eligendi accusantium consequatur et.', '1', '1', '1', '0', '0', 'wspolicy', '5', '3', '6', '38', 'Beatae autem aut tenetur accusantium et qui. Excepturi repellendus molestiae quo. Cum ratione ipsa iure suscipit suscipit.', '-1', '842', '1934-01-06 11:40:14', '0', '1694', '1', 'Ratione nisi labore in quam enim maiores optio facilis. A quam et ut iusto cumque. Accusamus nesciunt praesentium voluptate libero blanditiis in. Beatae quia et consequatur ducimus impedit sint.', '计正业', 'Nobis sit sint exercitationem quo neque. Recusandae qui magnam laboriosam. Non sapiente est architecto aut et ut. Quam ipsum rerum aut enim dolor tenetur incidunt. Qui et ratione ea.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('44', '6011012901503739', '22', '龚伟', 'https://lorempixel.com/640/480/?89745', '4068.44', '3316.93', '1259', '81702', '殷丽华', 'Nulla at doloribus nisi. Quis ut ut aut asperiores. Iste dolore voluptatem quaerat ea aut. Nihil fugiat corrupti consequatur soluta voluptas.', '1', '1', '0', '1', '0', 'umj', '0', '2', '7', '25', 'Qui delectus voluptas qui ut quis dolorem consequatur. Quia officiis molestiae temporibus illum. Consequatur aut consectetur ad est quo qui. Corporis rerum excepturi qui quaerat.', '0', '558', '1942-11-14 04:53:06', '0', '1567', '0', 'Quos perferendis et deserunt architecto voluptate necessitatibus. Ad deleniti quisquam magni. Et sint omnis ut commodi magni qui. Ut et non impedit.', '贾智明', 'Voluptas sapiente deleniti aut nam. Aperiam magnam labore perferendis cupiditate. Ipsa voluptatem eius mollitia cum officiis architecto. Voluptatibus praesentium ut dolorem.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('45', '5498078496895651', '2748', '申婕', 'https://lorempixel.com/640/480/?48320', '9139.77', '4227.16', '3049', '79132', '娄军', 'Voluptas laboriosam inventore illo non nihil. Aliquid impedit ut nemo voluptas. Numquam qui minus voluptatem ea aut odit a officiis. Atque sunt aut saepe et.', '1', '0', '1', '1', '1', 'wmv', '2', '8', '2', '100', 'Aut et saepe et. Enim aut facere aperiam et suscipit. Sit voluptatem natus nihil quia quia. Vero consequuntur repudiandae ad optio eum.', '1', '434', '1940-08-17 14:59:10', '0', '1258', '0', 'Aut qui itaque et quaerat saepe qui iusto iusto. Est repudiandae eligendi delectus qui vero.', '郑凯', 'Et nemo voluptas alias aspernatur illum quis. Laboriosam voluptas eos et commodi eum vitae. Nemo consequatur voluptas vero eaque et amet non.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('46', '4916263616882139', '4496', '全志强', 'https://lorempixel.com/640/480/?88022', '7647.06', '140.98', '4013', '82925', '闵依琳', 'Non ut at impedit et illo pariatur voluptas. Molestias possimus harum quia ad animi assumenda consequuntur. Porro eaque et suscipit qui tempore ut.', '0', '1', '1', '0', '1', 'm4v', '4', '1', '6', '12', 'Ea velit molestias repudiandae itaque error. Possimus dolor placeat qui ea velit qui optio. Reprehenderit necessitatibus hic ut quia.', '0', '900', '1947-10-06 12:45:49', '0', '1103', '0', 'Distinctio sunt tempora sequi voluptas et adipisci veritatis. Dolorum iure minus fugit. Ut sit sequi enim temporibus consectetur. Dolorem sed ab repudiandae at.', '柏芬', 'Minus vel laudantium et qui numquam nam. Quia a numquam nesciunt. Impedit ut voluptates tempora qui eum dolorem distinctio. Omnis dicta aut autem placeat accusantium cum.', '-1', null, null);
INSERT INTO `shop_good` VALUES ('47', '4929324054507326', '999', '宗浩', 'https://lorempixel.com/640/480/?54506', '6558.64', '773.71', '2174', '18574', '凌旭', 'Consectetur magni maiores debitis soluta sed quisquam. Voluptatibus voluptate illum error. Eum corporis dignissimos fuga culpa eveniet consectetur.', '1', '0', '1', '1', '1', 'latex', '6', '4', '9', '83', 'Voluptatibus odit iste id est. Dicta dolor voluptas iure laudantium voluptates. Aut sequi voluptatum amet in. Aliquid sed quis voluptatem ut repellat voluptatem.', '-1', '527', '1922-10-01 04:09:20', '0', '1627', '1', 'Quia amet labore eum odio quisquam. Id tempora impedit est sit maiores nostrum qui odit. Nesciunt eveniet non et sed.', '苟利', 'Esse non harum neque. Ipsa eaque debitis laboriosam asperiores beatae natus. Molestias qui corporis impedit molestias est dolor.', '1', null, null);
INSERT INTO `shop_good` VALUES ('48', '4716808179010601', '1', '巫欣', 'https://lorempixel.com/640/480/?31626', '4724.10', '7267.80', '4791', '65881', '孟斌', 'Ducimus adipisci nihil in iure occaecati. Molestiae officiis modi sunt. Voluptas perferendis fuga in nihil.', '0', '0', '1', '1', '1', 'vtu', '6', '3', '8', '60', 'Error sint rerum incidunt animi aperiam quos. Recusandae labore consequatur dolor est.', '1', '230', '1922-06-05 09:44:28', '0', '1167', '0', 'Quia deleniti qui officiis illo et occaecati qui consequatur. Omnis consectetur quidem quas ipsam occaecati ab. Nemo nostrum ut sapiente modi sed ut blanditiis.', '贺洁', 'Natus eos voluptatum iusto sed odio. Veniam error laboriosam velit. A rem est qui quisquam distinctio.', '1', null, null);
INSERT INTO `shop_good` VALUES ('49', '4716035523075201', '2040', '熊桂荣', 'https://lorempixel.com/640/480/?78631', '6649.71', '4028.50', '5729', '71226', '薄淑华', 'Natus accusantium aspernatur enim ut quod nam. Dolores aut voluptates provident nam. Esse mollitia sint molestiae iste reiciendis dolores.', '0', '0', '1', '0', '0', 'movie', '6', '2', '2', '7', 'Earum fuga nostrum autem molestias quaerat. Quis rerum officia corrupti voluptas. Vero voluptates qui sed voluptas et quos. Non porro dolores quia facilis facilis ut.', '1', '904', '1934-04-09 04:55:09', '0', '1057', '0', 'Occaecati sunt minima quae qui ad. Aut illum harum voluptatem hic eveniet alias. Ut consequatur qui qui et corporis occaecati. Eos et autem voluptas maxime molestias.', '谢瑞', 'Sit quaerat libero provident nihil ut. Quibusdam consectetur aut vel laborum consequatur. Amet at aut sint sed officia. Harum asperiores natus doloribus qui et. Eius vel et velit deleniti modi ab in.', '1', null, null);
INSERT INTO `shop_good` VALUES ('50', '4532239120433076', '2121915', '单亮', 'https://lorempixel.com/640/480/?34725', '1189.71', '6841.75', '1303', '44895', '邬智明', 'Autem neque voluptatem iure nostrum dolor numquam sed. Magni ut repellendus sit dolorem assumenda. Quam eum ipsum harum est. Quasi quibusdam nobis fuga aut nesciunt et architecto.', '0', '0', '1', '1', '0', 'spl', '0', '3', '5', '69', 'Ipsum autem veniam totam voluptas non at et. Quae fugit fugiat quia asperiores totam. Ut omnis possimus aperiam maiores iure.', '1', '909', '1946-02-13 12:30:56', '0', '1255', '1', 'Ea aut modi incidunt sit est ipsum. Ut dolorem fugit vel incidunt. Excepturi esse saepe at sunt pariatur voluptatem. Consequatur molestiae nihil aut ipsam libero. Ea incidunt quis eum.', '丁怡', 'Praesentium vero et quo ipsum. Id accusantium ratione iusto sit aut. Mollitia ipsum voluptatum velit ipsa. Voluptatem vel corrupti est corporis quo.', '1', null, null);

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

-- ----------------------------
-- Records of shop_goods_attributes
-- ----------------------------
INSERT INTO `shop_goods_attributes` VALUES ('13', '30', '上衣,T恤,白色,尴尬,', '贺俊', '0', '说的福克斯,asdfasdf,事发地点时', '654', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('14', '28', '上衣,T恤,白色,尴尬,', '官哲', '0', '说的福克斯,asdfasdf', '916', '0', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('15', '11', '上衣,T恤,白色,尴尬,', '柯翔', '1', '说的福克斯,asdfasdf', '313', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('17', '14', '上衣,T恤,白色,尴尬,', '涂林', '0', '说的福克斯,asdfasdf', '715', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('18', '7', '上衣,T恤,白色,尴尬,', '罗飞', '0', '说的福克斯,asdfasdf', '271', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('21', '32', '上衣,T恤,白色,尴尬,', '奚翼', '2', '说的福克斯,asdfasdf', '554', '0', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('23', '30', '上衣,T恤,白色,尴尬,', '瞿平', '1', '说的福克斯,asdfasdf', '995', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('25', '30', '上衣,T恤,白色,尴尬,', '贺婷', '0', '说的福克斯,asdfasdf', '971', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('29', '2', '上衣,T恤,白色,尴尬,', '聂建华', '0', '说的福克斯,asdfasdf', '861', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('30', '6', '上衣,T恤,白色,尴尬,', '仲珺', '2', '说的福克斯,asdfasdf', '444', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('31', '36', '上衣,T恤,白色,尴尬,', '宫祥', '2', '说的福克斯,asdfasdf', '948', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('32', '44', '上衣,T恤,白色,尴尬,', '郭燕', '1', '说的福克斯,asdfasdf', '232', '0', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('33', '43', '上衣,T恤,白色,尴尬,', '席瑞', '0', '说的福克斯,asdfasdf', '410', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('34', '4', '上衣,T恤,白色,尴尬,', '汪彬', '0', '说的福克斯,asdfasdf', '929', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('35', '19', '上衣,T恤,白色,尴尬,', '胡艳', '2', '说的福克斯,asdfasdf', '923', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('36', '6', '上衣,T恤,白色,尴尬,', '薄博涛', '0', '说的福克斯,asdfasdf', '179', '0', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('37', '8', '上衣,T恤,白色,尴尬,', '木建明', '1', '说的福克斯,asdfasdf', '706', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('38', '10', '上衣,T恤,白色,尴尬,', '房建国', '1', '说的福克斯,asdfasdf', '691', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('39', '47', '上衣,T恤,白色,尴尬,', '翁明', '0', '说的福克斯,asdfasdf', '744', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('40', '17', '上衣,T恤,白色,尴尬,', '宋桂花', '1', '说的福克斯,asdfasdf', '939', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('41', '35', '上衣,T恤,白色,尴尬,', '喻桂芬', '2', '说的福克斯,asdfasdf', '272', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('42', '13', '上衣,T恤,白色,尴尬,', '隋宇', '0', '说的福克斯,asdfasdf', '830', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('43', '2', '上衣,T恤,白色,尴尬,', '姜婷婷', '2', '说的福克斯,asdfasdf', '550', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('44', '11', '上衣,T恤,白色,尴尬,', '欧鹏', '0', '说的福克斯,asdfasdf', '779', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('45', '45', '上衣,T恤,白色,尴尬,', '盖彬', '2', '说的福克斯,asdfasdf', '584', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('46', '19', '上衣,T恤,白色,尴尬,', '保洋', '0', '说的福克斯,asdfasdf', '133', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('47', '11', '上衣,T恤,白色,尴尬,', '于婷', '1', '说的福克斯,asdfasdf', '891', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('48', '26', '上衣,T恤,白色,尴尬,', '康玉英', '2', '说的福克斯,asdfasdf', '691', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('49', '22', '上衣,T恤,白色,尴尬,', '牟桂荣', '2', '说的福克斯,asdfasdf', '752', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('50', '30', '上衣,T恤,白色,尴尬,', '窦欢', '2', '说的福克斯,asdfasdf', '874', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('51', '36', '上衣,T恤,白色,尴尬,', '送的发送到', '1', '说的福克斯,asdfasdf', '0', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('52', '36', '上衣,T恤,白色,尴尬,', '送的发送到', '1', '说的福克斯,asdfasdf', '0', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('53', '36', '上衣,T恤,白色,尴尬,', '送的发送到', '1', '说的福克斯,asdfasdf', '0', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('54', '8', '内衣,', '四谛法', '1', '说的福克斯,asdfasdf', '0', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('55', '8', '内衣,', '四谛法', '1', '说的福克斯,asdfasdf', '0', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('56', '6', '配饰,', '啊舒服萨德', '0', '说的福克斯,asdfasdf', '0', '0', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('57', '6', '配饰,', '啊舒服萨德', '0', '说的福克斯,asdfasdf', '0', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('58', '7', '美妆,', '撒旦法', '0', '说的福克斯,asdfasdf', '0', '1', '1', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('59', '7', '美妆,', '啊沙发', '0', '说的福克斯,asdfasdf', '0', '1', '0', null, null);
INSERT INTO `shop_goods_attributes` VALUES ('60', '25', '上衣,T恤,黑色,', '啊撒发撒', '0', '说的福克斯,asdfasdf', '0', '1', '1', null, null);

-- ----------------------------
-- Table structure for shop_goods_cats
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods_cats`;
CREATE TABLE `shop_goods_cats` (
  `catId` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品分类自增ID',
  `parentId` int(11) NOT NULL DEFAULT '0' COMMENT '父id',
  `catName` varchar(20) NOT NULL COMMENT '分类名称',
  `simpleName` varchar(20) NOT NULL COMMENT '分类名称缩写',
  `isShow` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示:0:隐藏 1:显示',
  `isFloor` tinyint(4) NOT NULL DEFAULT '1' COMMENT '是否显示楼层；0:不显示 1:显示',
  `catSort` int(11) NOT NULL DEFAULT '0' COMMENT '排序号',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '删除标志:	1:有效 -1：删除',
  `createTime` datetime NOT NULL COMMENT '建立时间',
  PRIMARY KEY (`catId`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of shop_goods_cats
-- ----------------------------
INSERT INTO `shop_goods_cats` VALUES ('3', '0', '测试分类', '测试', '1', '1', '1', '1', '2019-06-13 08:22:30');
INSERT INTO `shop_goods_cats` VALUES ('4', '0', '测试分类2', '测试', '1', '1', '2', '1', '2019-06-13 08:22:58');
INSERT INTO `shop_goods_cats` VALUES ('5', '3', '测试分类3', '测试', '1', '1', '3', '1', '2019-06-13 08:23:22');

-- ----------------------------
-- Table structure for shop_goods_specs
-- ----------------------------
DROP TABLE IF EXISTS `shop_goods_specs`;
CREATE TABLE `shop_goods_specs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品规格自增id',
  `goodsId` int(11) NOT NULL DEFAULT '0' COMMENT '商品ID',
  `productNo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '商品货号',
  `specIds` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '规格ID格式 例如：specId:specId:specId:specId:specId',
  `marketPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '市场价',
  `specPrice` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '商品价',
  `specStock` int(11) NOT NULL DEFAULT '0' COMMENT '库存',
  `warnStock` int(11) NOT NULL DEFAULT '0' COMMENT '库存预警值',
  `saleNum` int(11) NOT NULL DEFAULT '0' COMMENT '销量',
  `isDefault` tinyint(4) NOT NULL DEFAULT '0' COMMENT '默认规格:1：默认规格 0：非默认规格',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '有效状态：1有效 -1无效',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of shop_goods_specs
-- ----------------------------
INSERT INTO `shop_goods_specs` VALUES ('1', '21', '5206562697298768', '宫浩', '8054.31', '520.93', '823', '3700', '307', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('2', '17', '370915227088953', '屠智敏', '4179.44', '591.57', '833', '4929', '145', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('3', '3', '4485394810589435', '阎婷婷', '6553.87', '197.31', '855', '3694', '162', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('4', '39', '4485751437863933', '王晨', '5745.72', '813.99', '261', '2658', '465', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('5', '17', '5493713762838671', '孟嘉俊', '6608.31', '768.90', '146', '1530', '366', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('6', '19', '4556423137676627', '杜坤', '4205.76', '885.50', '600', '5479', '473', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('7', '23', '4556748668815792', '畅晨', '3841.75', '886.77', '787', '5503', '105', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('8', '21', '5357341991625332', '乔杨', '6444.71', '907.86', '686', '9263', '421', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('9', '7', '5572995921961478', '马瑜', '4734.04', '351.18', '587', '1144', '341', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('10', '45', '4929917462000', '蒙丽华', '3298.26', '230.22', '127', '6139', '408', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('11', '49', '5208971898287470', '娄桂香', '2103.09', '451.33', '201', '6245', '395', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('12', '18', '4716312520072', '项桂荣', '427.13', '676.57', '380', '2986', '305', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('13', '49', '2586526726532742', '全婷', '1514.99', '916.07', '484', '1666', '500', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('14', '19', '5173893879491718', '仲建', '9132.79', '214.43', '225', '3184', '407', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('15', '14', '345303505244600', '葛艳', '7465.26', '525.42', '797', '3011', '100', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('16', '21', '4024007181674911', '车嘉', '4392.63', '691.17', '374', '7942', '111', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('17', '23', '4916965830718051', '谌瑶', '995.62', '431.71', '973', '3669', '261', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('18', '31', '2571211051845392', '宁俊', '6803.44', '299.57', '857', '6436', '459', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('19', '49', '2221712522896363', '司晨', '7297.32', '741.98', '110', '1165', '449', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('20', '31', '6011232844904907', '仇小红', '9791.93', '579.66', '555', '4177', '309', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('21', '31', '4532555096251139', '余国庆', '1407.48', '707.34', '881', '4731', '218', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('22', '16', '4485609268755463', '嵺娜', '8902.33', '153.63', '207', '8603', '247', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('23', '11', '6011964766552526', '任彬', '6499.76', '377.51', '828', '5938', '131', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('24', '6', '4806457831422399', '蔺依琳', '571.55', '763.66', '913', '4524', '344', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('25', '2', '5491834720185633', '赵红', '678.76', '877.45', '838', '4792', '217', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('26', '4', '2221506646597885', '何钟', '9885.27', '227.01', '677', '6123', '475', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('27', '12', '4485921674650596', '梅建平', '4731.00', '631.66', '303', '3300', '152', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('28', '6', '5215149621281455', '翁芳', '4059.46', '491.27', '157', '4337', '224', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('29', '42', '5378046960157176', '翟健', '1755.10', '119.94', '516', '4486', '153', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('30', '42', '4916779492264183', '苟玲', '4299.42', '391.92', '135', '7865', '481', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('31', '37', '379983882834542', '聂宁', '4983.52', '245.67', '112', '8980', '394', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('32', '2', '4485710346004070', '柯瑞', '9054.60', '855.92', '275', '1715', '486', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('33', '39', '4265843073881521', '颜昱然', '8830.03', '936.53', '330', '7128', '221', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('34', '16', '2408757559091631', '冷勇', '9276.17', '620.93', '678', '4649', '490', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('35', '9', '5281442069061250', '宫成', '8073.72', '903.16', '596', '5719', '210', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('36', '49', '2643140818032933', '吴颖', '3362.79', '689.09', '180', '9434', '403', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('37', '31', '6011843634079633', '燕钟', '3518.44', '436.76', '868', '5229', '100', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('38', '30', '4916640098352899', '祝建平', '8734.44', '474.48', '687', '2349', '238', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('39', '1', '4556596996188', '程志新', '9119.52', '199.93', '896', '8778', '311', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('40', '30', '374219316233497', '崔林', '7538.18', '723.68', '575', '5187', '263', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('41', '10', '4485678269815667', '毕英', '3106.50', '630.43', '886', '6130', '375', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('42', '17', '2420143420961324', '丘海燕', '9097.99', '394.68', '886', '5136', '495', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('43', '42', '4532571633468425', '官瑜', '9075.05', '355.21', '460', '3910', '261', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('44', '35', '6011730451847129', '伏桂芝', '1149.12', '429.01', '956', '6423', '248', '0', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('45', '27', '4556654358965543', '晏雷', '995.72', '722.80', '535', '3872', '234', '0', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('46', '49', '5263359585943534', '都丽丽', '9998.64', '611.19', '720', '7197', '118', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('47', '49', '5322478826515627', '欧玉兰', '5853.71', '326.76', '485', '9499', '477', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('48', '4', '2221209767033646', '陆翼', '8855.18', '751.22', '543', '2282', '387', '1', '1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('49', '32', '344583030169023', '商霞', '8195.07', '735.56', '264', '3553', '351', '1', '-1', null, null);
INSERT INTO `shop_goods_specs` VALUES ('50', '48', '6011562857980786', '祁建', '1141.59', '341.65', '189', '3940', '264', '1', '-1', null, null);

-- ----------------------------
-- Table structure for shop_opinions
-- ----------------------------
DROP TABLE IF EXISTS `shop_opinions`;
CREATE TABLE `shop_opinions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '意见',
  `add_time` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '添加时间',
  `reply_status` int(10) DEFAULT '0' COMMENT '回复状态   0.未回复   1.已回复',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_opinions
-- ----------------------------
INSERT INTO `shop_opinions` VALUES ('1', '1', '地方是发达', '1560345100', '0');
INSERT INTO `shop_opinions` VALUES ('2', '1', '啊飒飒分发多少分', '1560345123', '0');
INSERT INTO `shop_opinions` VALUES ('3', '1', '阿发而发', '1560345145', '0');
INSERT INTO `shop_opinions` VALUES ('4', '1', '回复国际化规划局', '1560345150', '1');
INSERT INTO `shop_opinions` VALUES ('5', '1', '一样是多少', '1560345185', '1');
INSERT INTO `shop_opinions` VALUES ('6', '2', '地方是发达', '1560345100', '0');
INSERT INTO `shop_opinions` VALUES ('7', '2', '啊飒飒分发多少分', '1560345123', '1');
INSERT INTO `shop_opinions` VALUES ('8', '2', '阿发而发', '1560345145', '1');
INSERT INTO `shop_opinions` VALUES ('9', '2', '回复国际化规划局', '1560345150', '1');
INSERT INTO `shop_opinions` VALUES ('10', '2', '一样是多少', '1560345185', '1');
INSERT INTO `shop_opinions` VALUES ('11', '2', '回复国际化规划局', '1560345150', '1');
INSERT INTO `shop_opinions` VALUES ('12', '2', '一样是多少', '1560345185', '1');

-- ----------------------------
-- Table structure for shop_order
-- ----------------------------
DROP TABLE IF EXISTS `shop_order`;
CREATE TABLE `shop_order` (
  `orderid` int(11) NOT NULL AUTO_INCREMENT COMMENT '订单表自增ID',
  `orderNo` varchar(20) NOT NULL COMMENT '订单号',
  `userid` int(11) NOT NULL COMMENT '用户ID',
  `orderStatus` tinyint(4) NOT NULL DEFAULT '-2' COMMENT '订单状态：-3:用户拒收 -2:未付款的订单 -1：用户取消 0:待发货 1:配送中 2:用户确认收货',
  `goodMoney` decimal(11,2) NOT NULL COMMENT '商品总金额',
  `deliverType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '收货方式：0:送货上门 1:自提',
  `deliverMoney` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '运费：运费规则按照每家店的规则算。',
  `totalMoney` decimal(11,2) NOT NULL COMMENT '订单总金额 包括运费',
  `realTotalMoney` decimal(11,2) NOT NULL DEFAULT '0.00' COMMENT '实际订单总金额 进行各种折扣之后的金额',
  `payType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '支付方式:0:货到付款 1:在线支付',
  `payFrom` int(11) NOT NULL DEFAULT '0' COMMENT '支付来源：0:支付宝，1：微信',
  `isPay` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否支付:0:未支付 1:已支付',
  `userName` varchar(20) NOT NULL COMMENT '收货人名称',
  `userAddress` varchar(255) NOT NULL COMMENT '收货人地址',
  `userPhone` char(11) NOT NULL COMMENT '收货人手机',
  `orderScore` int(11) NOT NULL DEFAULT '0' COMMENT '所得积分',
  `isInvoice` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否需要:发票:1:需要 0:不需要',
  `invoiceClient` tinyint(4) DEFAULT NULL COMMENT '发票抬头:1:需要 0:不需要',
  `orderRemarks` varchar(255) DEFAULT NULL COMMENT '订单备注',
  `needPay` decimal(11,2) DEFAULT '0.00' COMMENT '需缴费用',
  `isRefund` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否退款:0:否 1：是',
  `isAppraise` tinyint(4) DEFAULT '0' COMMENT '是否点评:0:未点评 1:已点评',
  `cancelReason` int(11) DEFAULT '0' COMMENT '退款原因ID',
  `rejectReason` int(11) DEFAULT '0' COMMENT '拒收原因ID',
  `rejectOtherReason` varchar(255) DEFAULT NULL COMMENT '拒收原因',
  `isClosed` tinyint(4) NOT NULL DEFAULT '0' COMMENT '是否订单已完结:0：未完结 1:已完结',
  `orderunique` varchar(50) NOT NULL COMMENT '订单流水号',
  `settlementId` int(11) DEFAULT NULL COMMENT '是否结算，大于0的话则是结算ID',
  `receiveTime` datetime DEFAULT NULL COMMENT '收货时间',
  `deliveryTime` datetime DEFAULT NULL COMMENT '发货时间',
  `expressId` int(11) DEFAULT NULL COMMENT '快递公司ID',
  `expressNo` varchar(20) DEFAULT NULL COMMENT '快递号',
  `tradeNo` varchar(100) DEFAULT NULL COMMENT '在线支付交易流水',
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1' COMMENT '订单有效标志:-1：删除 1:有效',
  `createTime` datetime DEFAULT NULL COMMENT '下单时间',
  `areaId` int(11) NOT NULL COMMENT '最后一级区域Id',
  `areaIdPath` varchar(255) DEFAULT NULL COMMENT '区域Id路径:省级id_市级id_县级Id_ 例如:110000_110100_110101_',
  PRIMARY KEY (`orderid`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of shop_order
-- ----------------------------

-- ----------------------------
-- Table structure for shop_reasons
-- ----------------------------
DROP TABLE IF EXISTS `shop_reasons`;
CREATE TABLE `shop_reasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '退款理由自增ID',
  `reasonsName` varchar(150) NOT NULL COMMENT '退款退货理由',
  `isPay` tinyint(4) NOT NULL COMMENT '是否支付: 0:未支付 1:已支付',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of shop_reasons
-- ----------------------------

-- ----------------------------
-- Table structure for shop_replys
-- ----------------------------
DROP TABLE IF EXISTS `shop_replys`;
CREATE TABLE `shop_replys` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_id` int(10) DEFAULT NULL COMMENT '管理员ID',
  `content` text COLLATE utf8_unicode_ci COMMENT '回复内容',
  `type` int(10) DEFAULT NULL COMMENT '回复类型   1.评论  2.建议',
  `p_id` int(10) DEFAULT NULL COMMENT '父级ID',
  `add_time` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '回复时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_replys
-- ----------------------------

-- ----------------------------
-- Table structure for shop_right
-- ----------------------------
DROP TABLE IF EXISTS `shop_right`;
CREATE TABLE `shop_right` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `name` varchar(50) NOT NULL COMMENT '权限名字',
  `right` text COMMENT '权限码（控制器+动作）',
  `types` tinyint(2) NOT NULL DEFAULT '1' COMMENT '权限类型 1页面权限，2操作权限',
  `is_del` tinyint(2) NOT NULL DEFAULT '0' COMMENT '是否删除0未删除，1删除',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of shop_right
-- ----------------------------
INSERT INTO `shop_right` VALUES ('1', '[权限]权限管理', '', '1', '0');
INSERT INTO `shop_right` VALUES ('2', '[权限]管理员', 'AdminController@index', '1', '0');
INSERT INTO `shop_right` VALUES ('3', '[权限]管理员的CURD', 'AdminController@getData,AdminController@addAdmin,AdminController@AdminStore,AdminController@AdminEdit,AdminController@AdminUpd', '2', '0');
INSERT INTO `shop_right` VALUES ('4', '[权限]角色', 'RoleController@index', '1', '0');
INSERT INTO `shop_right` VALUES ('5', '[权限]角色的CURD', 'RoleController@RoleData,RoleController@RoleCreate,RoleController@RoleStore,RoleController@RoleEdit,RoleController@RoleUpd', '2', '0');
INSERT INTO `shop_right` VALUES ('6', '[权限]权限资源', 'AuthController@index', '1', '0');
INSERT INTO `shop_right` VALUES ('7', '[权限]权限资源的CURD', 'AuthController@getData,AuthController@addAuth,AuthController@getAction,AuthController@AuthStore,AuthController@MenuCreate,AuthController@MenuStore', '2', '0');
INSERT INTO `shop_right` VALUES ('10', '[首页]首页管理', '', '1', '0');
INSERT INTO `shop_right` VALUES ('11', '[首页]首页', 'StaticController@index', '1', '0');

-- ----------------------------
-- Table structure for shop_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `shop_role_menu`;
CREATE TABLE `shop_role_menu` (
  `rid` int(11) NOT NULL COMMENT '角色id',
  `mid` int(11) NOT NULL COMMENT '菜单id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of shop_role_menu
-- ----------------------------
INSERT INTO `shop_role_menu` VALUES ('1', '1');
INSERT INTO `shop_role_menu` VALUES ('1', '4');
INSERT INTO `shop_role_menu` VALUES ('1', '5');
INSERT INTO `shop_role_menu` VALUES ('1', '6');

-- ----------------------------
-- Table structure for shop_role_right
-- ----------------------------
DROP TABLE IF EXISTS `shop_role_right`;
CREATE TABLE `shop_role_right` (
  `rid` int(11) NOT NULL COMMENT '角色id',
  `aid` int(11) NOT NULL COMMENT '权限id'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of shop_role_right
-- ----------------------------
INSERT INTO `shop_role_right` VALUES ('1', '2');
INSERT INTO `shop_role_right` VALUES ('1', '3');
INSERT INTO `shop_role_right` VALUES ('1', '4');
INSERT INTO `shop_role_right` VALUES ('1', '5');
INSERT INTO `shop_role_right` VALUES ('1', '6');
INSERT INTO `shop_role_right` VALUES ('1', '7');
INSERT INTO `shop_role_right` VALUES ('1', '11');

-- ----------------------------
-- Table structure for shop_warehouses
-- ----------------------------
DROP TABLE IF EXISTS `shop_warehouses`;
CREATE TABLE `shop_warehouses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '仓库名称',
  `number` char(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '仓库编号',
  `provid` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '仓库所在地区',
  `serve_area` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '服务地区',
  `principal` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '负责人',
  `status` int(10) NOT NULL COMMENT '状态  1.启用   2.未启用',
  `add_time` char(32) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '添加时间',
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of shop_warehouses
-- ----------------------------

-- ----------------------------
-- Table structure for show_brands
-- ----------------------------
DROP TABLE IF EXISTS `show_brands`;
CREATE TABLE `show_brands` (
  `brandId` int(11) NOT NULL AUTO_INCREMENT COMMENT '品牌自增ID',
  `brandName` varchar(100) NOT NULL COMMENT '品牌名称',
  `brandImg` varchar(150) NOT NULL COMMENT '品牌商标',
  `brandDesc` text COMMENT '品牌介绍',
  `createTime` datetime NOT NULL COMMENT '建立时间',
  `dataFlag` tinyint(4) NOT NULL COMMENT '删除标志:-1:删除 1:有效',
  PRIMARY KEY (`brandId`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- ----------------------------
-- Records of show_brands
-- ----------------------------

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student` (
  `sno` int(11) NOT NULL AUTO_INCREMENT COMMENT '????',
  `sname` varchar(30) NOT NULL COMMENT 'ѧ??????',
  `ssex` varchar(10) NOT NULL COMMENT 'ѧ???Ա',
  `sbirthday` datetime DEFAULT NULL COMMENT 'ѧ?????',
  `class` varchar(10) NOT NULL COMMENT '?༶',
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='ѧ???';

-- ----------------------------
-- Records of student
-- ----------------------------

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(30) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '类型',
  `name` varchar(30) COLLATE utf8mb4_bin DEFAULT NULL COMMENT '名称',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES ('17', '测试2', '测试2', '1');
INSERT INTO `types` VALUES ('3', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('4', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('5', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('7', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('8', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('9', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('15', '测试2', '测试2', '1');
INSERT INTO `types` VALUES ('11', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('12', '测试1', '测试1', '1');
INSERT INTO `types` VALUES ('16', '测试2', '测试2', '1');
INSERT INTO `types` VALUES ('14', '测试1', '测试1', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(30) DEFAULT NULL,
  `userPwd` char(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'lxink', '917828');

-- ----------------------------
-- Table structure for user_information
-- ----------------------------
DROP TABLE IF EXISTS `user_information`;
CREATE TABLE `user_information` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_log` varchar(100) DEFAULT NULL,
  `user_tel` varchar(20) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_sex` int(11) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_information
-- ----------------------------
INSERT INTO `user_information` VALUES ('1', 'Public/log/2.jpg', '15035763588', '821160971@qq.com', '0');
INSERT INTO `user_information` VALUES ('2', 'Public/log/2.jpg', '15033647895', '250@250.com', '1');

-- ----------------------------
-- Table structure for user_land
-- ----------------------------
DROP TABLE IF EXISTS `user_land`;
CREATE TABLE `user_land` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(30) DEFAULT NULL,
  `user_pwd` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_land
-- ----------------------------
INSERT INTO `user_land` VALUES ('1', '李新凯', '7dc2ecd1c2d40821df250141e9afd8f1');
INSERT INTO `user_land` VALUES ('2', '郭群', '1ec7e385b3c2ad3076f0780165ae9bbf');
