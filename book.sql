/*
 Navicat Premium Data Transfer

 Source Server         : myspl
 Source Server Type    : MySQL
 Source Server Version : 50709
 Source Host           : localhost:3306
 Source Schema         : book

 Target Server Type    : MySQL
 Target Server Version : 50709
 File Encoding         : 65001

 Date: 30/06/2023 11:29:13
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for book
-- ----------------------------
DROP TABLE IF EXISTS `book`;
CREATE TABLE `book`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '书名',
  `author` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '作者',
  `type` int(11) NULL DEFAULT NULL COMMENT '图书类型',
  `count` int(11) NULL DEFAULT NULL COMMENT '图书库存数量',
  `price` float(10, 2) NULL DEFAULT NULL COMMENT '价格',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图片',
  `desc_info` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '图书简介',
  `sort` int(11) NULL DEFAULT NULL COMMENT '排序',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book
-- ----------------------------
INSERT INTO `book` VALUES (1, '巴芒演义', '作者2号', 1, 20, 68.80, 'http://www.test.com/images/book11.png', '巴芒演义：可复制的价值投资 一部关于价值投资从无到有的演化史', 100);
INSERT INTO `book` VALUES (2, '福尔摩斯探案集', '福尔摩斯', 1, 100, 20.00, 'http://www.test.com/images/book12.png', '福尔摩斯探案集【精装版】名家名译系列外国文学名著，印刷精美', 99);
INSERT INTO `book` VALUES (3, '销售是个技术活儿', '销售', 9, 60, 69.00, 'http://www.test.com/images/book13.png', '销售是个技术活儿。销售不仅是拼的硬技巧，更需要运用高情商。', 98);
INSERT INTO `book` VALUES (4, '像计算机科学家一样思考Python', 'python', 7, 100, 79.80, 'http://www.test.com/images/book14.png', '像计算机科学家一样思考Python 第2版(异步图书出品)', 1000);
INSERT INTO `book` VALUES (5, '沟通力就是执行力', '', 4, 80, 24.45, 'http://www.test.com/images/b1.png', '沟通力就是执行力：告诉你如何拆掉沟通壁垒，打造执行力高效的团队', 96);
INSERT INTO `book` VALUES (6, '漫画林汉达中国历史故事集', NULL, 8, 40, 222.00, 'http://www.test.com/images/b2.png', '漫画林汉达中国历史故事集（函套书共10册） [6-12岁]', 95);
INSERT INTO `book` VALUES (7, '新东方', NULL, 4, 80, 26.40, 'http://www.test.com/images/b3.png', '新东方 TOEFL Junior词汇精讲精练 词汇专项辅导书 边读文章边记单词', 94);
INSERT INTO `book` VALUES (8, '唤醒心中的巨人（经典版）', NULL, 2, 60, 45.80, 'http://www.test.com/images/b4.png', '唤醒心中的巨人（经典版）：改变5000万人的潜能开发书！', 93);
INSERT INTO `book` VALUES (9, '中层领导力', NULL, 5, 20, 28.80, 'http://www.test.com/images/b5.png', '中层领导力：团队建设篇\r\n要有更强的领导力，就要培养人来完全取代你', 92);
INSERT INTO `book` VALUES (10, '福中国历史文化名人传丛书', NULL, 3, 80, 20.00, 'http://www.test.com/images/b6.png', '福中国历史文化名人传丛书：忧乐天下——范仲淹传（精装）', 91);
INSERT INTO `book` VALUES (11, '无言的宇宙', NULL, 3, 20, 69.00, 'http://www.test.com/images/b7.png', '无言的宇宙：隐藏在24个数学公式背后的故事（精装珍藏版）', 90);
INSERT INTO `book` VALUES (12, '假如给我三天光明英文版书籍', NULL, 2, 100, 54.80, 'http://www.test.com/images/b8.png', '假如给我三天光明英文版书籍 英文原版小说 全英文版畅销小说读物阅读 ', 89);

-- ----------------------------
-- Table structure for book_type
-- ----------------------------
DROP TABLE IF EXISTS `book_type`;
CREATE TABLE `book_type`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of book_type
-- ----------------------------
INSERT INTO `book_type` VALUES (1, '平价书店');
INSERT INTO `book_type` VALUES (2, '文学小说');
INSERT INTO `book_type` VALUES (3, '人文社科');
INSERT INTO `book_type` VALUES (4, '教育培训');
INSERT INTO `book_type` VALUES (5, '成功励志');
INSERT INTO `book_type` VALUES (6, '英语考级');
INSERT INTO `book_type` VALUES (7, 'IT领域');
INSERT INTO `book_type` VALUES (8, '少儿图书');
INSERT INTO `book_type` VALUES (9, '投资理财');
INSERT INTO `book_type` VALUES (10, '学习用品');

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` int(11) NOT NULL COMMENT '购物车id',
  `uid` int(11) NULL DEFAULT NULL COMMENT '用户id',
  `oid` int(11) NULL DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of cart
-- ----------------------------

-- ----------------------------
-- Table structure for order_form
-- ----------------------------
DROP TABLE IF EXISTS `order_form`;
CREATE TABLE `order_form`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  `number` int(11) NOT NULL COMMENT '商品数量',
  `price` float NOT NULL COMMENT '商品价格',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '用户id',
  `alter_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品图片',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_form
-- ----------------------------
INSERT INTO `order_form` VALUES (6, '沟通力就是执行力', 2, 24.45, 4, '2023-06-17 20:25:48', 'http://www.test.com/images/b1.png');
INSERT INTO `order_form` VALUES (12, '福中国历史文化名人传丛书', 1, 20, 3, '2023-06-23 13:53:23', 'http://www.test.com/images/b6.png');
INSERT INTO `order_form` VALUES (13, '假如给我三天光明英文版书籍', 2, 54.8, 3, '2023-06-23 13:53:34', 'http://www.test.com/images/b8.png');
INSERT INTO `order_form` VALUES (14, '销售是个技术活儿', 1, 69, 5, '2023-06-23 19:03:58', 'http://www.test.com/images/book13.png');
INSERT INTO `order_form` VALUES (15, '福尔摩斯探案集', 1, 20, 7, '2023-06-28 12:24:18', 'http://www.test.com/images/book12.png');
INSERT INTO `order_form` VALUES (27, '巴芒演义', 1, 68.8, 9, '2023-06-28 13:26:09', 'http://www.test.com/images/book11.png');
INSERT INTO `order_form` VALUES (30, '唤醒心中的巨人（经典版）', 1, 45.8, 10, '2023-06-29 13:20:21', 'http://www.test.com/images/b4.png');
INSERT INTO `order_form` VALUES (32, '漫画林汉达中国历史故事集', 1, 222, 10, '2023-06-29 13:20:35', 'http://www.test.com/images/b2.png');
INSERT INTO `order_form` VALUES (39, '销售是个技术活儿', 1, 69, 2, '2023-06-29 15:53:59', 'http://www.test.com/images/book13.png');

-- ----------------------------
-- Table structure for order_formed
-- ----------------------------
DROP TABLE IF EXISTS `order_formed`;
CREATE TABLE `order_formed`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '商品名称',
  `number` int(11) NOT NULL COMMENT '商品数量',
  `price` float NOT NULL COMMENT '商品价格',
  `user_id` int(11) NULL DEFAULT NULL COMMENT '用户id',
  `alter_time` datetime(0) NULL DEFAULT NULL COMMENT '修改时间',
  `img` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '商品图片',
  `order_id` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '订单号',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 61 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of order_formed
-- ----------------------------
INSERT INTO `order_formed` VALUES (29, '福尔摩斯探案集', 1, 20, 3, '2023-06-22 16:14:17', 'http://www.test.com/images/book12.png', '202306221614172030');
INSERT INTO `order_formed` VALUES (31, '新东方', 1, 26.4, 3, '2023-06-22 16:37:23', 'http://www.test.com/images/b3.png', '202306221637238598');
INSERT INTO `order_formed` VALUES (32, '沟通力就是执行力', 3, 73.35, 3, '2023-06-22 16:39:46', 'http://www.test.com/images/b1.png', '202306221639469015');
INSERT INTO `order_formed` VALUES (33, '福尔摩斯探案集', 2, 40, 3, '2023-06-22 17:24:49', 'http://www.test.com/images/book12.png', '202306221724493592');
INSERT INTO `order_formed` VALUES (34, '假如给我三天光明英文版书籍', 3, 164.4, 2, '2023-06-23 13:43:39', 'http://www.test.com/images/b8.png', '202306231343394236');
INSERT INTO `order_formed` VALUES (35, '沟通力就是执行力', 2, 48.9, 2, '2023-06-23 13:43:39', 'http://www.test.com/images/b1.png', '202306231343393692');
INSERT INTO `order_formed` VALUES (36, '无言的宇宙', 1, 69, 2, '2023-06-23 13:43:39', 'http://www.test.com/images/b7.png', '202306231343393791');
INSERT INTO `order_formed` VALUES (37, '销售是个技术活儿', 1, 69, 6, '2023-06-23 19:19:54', 'http://www.test.com/images/book13.png', '202306231919545917');
INSERT INTO `order_formed` VALUES (38, '假如给我三天光明英文版书籍', 1, 54.8, 2, '2023-06-23 19:36:49', 'http://www.test.com/images/b8.png', '202306231936498624');
INSERT INTO `order_formed` VALUES (39, '漫画林汉达中国历史故事集', 3, 666, 3, '2023-06-23 19:40:27', 'http://www.test.com/images/b2.png', '202306231940276613');
INSERT INTO `order_formed` VALUES (40, '沟通力就是执行力', 1, 24.45, 2, '2023-06-25 13:44:02', 'http://www.test.com/images/b1.png', '202306251344022168');
INSERT INTO `order_formed` VALUES (41, '福尔摩斯探案集', 4, 80, 8, '2023-06-28 12:33:05', 'http://www.test.com/images/book12.png', '202306281233052852');
INSERT INTO `order_formed` VALUES (42, '新东方', 1, 26.4, 8, '2023-06-28 12:33:05', 'http://www.test.com/images/b3.png', '202306281233056626');
INSERT INTO `order_formed` VALUES (43, '漫画林汉达中国历史故事集', 1, 222, 8, '2023-06-28 12:33:58', 'http://www.test.com/images/b2.png', '202306281233587450');
INSERT INTO `order_formed` VALUES (44, '巴芒演义', 1, 68.8, 8, '2023-06-28 12:33:58', 'http://www.test.com/images/book11.png', '202306281233588502');
INSERT INTO `order_formed` VALUES (45, '唤醒心中的巨人（经典版）', 1, 45.8, 8, '2023-06-28 12:33:58', 'http://www.test.com/images/b4.png', '202306281233583939');
INSERT INTO `order_formed` VALUES (46, '巴芒演义', 1, 68.8, 9, '2023-06-28 13:25:05', 'http://www.test.com/images/book11.png', '202306281325057804');
INSERT INTO `order_formed` VALUES (47, '沟通力就是执行力', 1, 24.45, 9, '2023-06-28 13:25:05', 'http://www.test.com/images/b1.png', '202306281325053960');
INSERT INTO `order_formed` VALUES (48, '像计算机科学家一样思考Python', 3, 239.4, 9, '2023-06-28 13:25:42', 'http://www.test.com/images/book14.png', '202306281325422726');
INSERT INTO `order_formed` VALUES (49, '漫画林汉达中国历史故事集', 1, 222, 9, '2023-06-28 13:25:42', 'http://www.test.com/images/b2.png', '202306281325421042');
INSERT INTO `order_formed` VALUES (50, '漫画林汉达中国历史故事集', 2, 444, 2, '2023-06-28 16:17:44', 'http://www.test.com/images/b2.png', '202306281617446840');
INSERT INTO `order_formed` VALUES (51, '新东方', 2, 52.8, 2, '2023-06-28 16:17:44', 'http://www.test.com/images/b3.png', '202306281617445432');
INSERT INTO `order_formed` VALUES (52, '沟通力就是执行力', 2, 48.9, 2, '2023-06-28 16:17:56', 'http://www.test.com/images/b1.png', '202306281617562537');
INSERT INTO `order_formed` VALUES (53, '巴芒演义', 2, 137.6, 10, '2023-06-29 13:21:39', 'http://www.test.com/images/book11.png', '202306291321396899');
INSERT INTO `order_formed` VALUES (54, '福中国历史文化名人传丛书', 1, 20, 10, '2023-06-29 13:21:39', 'http://www.test.com/images/b6.png', '202306291321399612');
INSERT INTO `order_formed` VALUES (55, '像计算机科学家一样思考Python', 1, 79.8, 10, '2023-06-29 13:22:43', 'http://www.test.com/images/book14.png', '202306291322439667');
INSERT INTO `order_formed` VALUES (56, '唤醒心中的巨人（经典版）', 1, 45.8, 2, '2023-06-29 15:50:48', 'http://www.test.com/images/b4.png', '202306291550484790');
INSERT INTO `order_formed` VALUES (57, '福中国历史文化名人传丛书', 1, 20, 2, '2023-06-29 15:51:17', 'http://www.test.com/images/b6.png', '202306291551171415');
INSERT INTO `order_formed` VALUES (58, '沟通力就是执行力', 2, 48.9, 2, '2023-06-29 15:51:17', 'http://www.test.com/images/b1.png', '202306291551173891');
INSERT INTO `order_formed` VALUES (59, '无言的宇宙', 3, 207, 2, '2023-06-29 15:51:17', 'http://www.test.com/images/b7.png', '202306291551175239');
INSERT INTO `order_formed` VALUES (60, '巴芒演义', 1, 68.8, 2, '2023-06-29 15:51:18', 'http://www.test.com/images/book11.png', '202306291551187745');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `phone` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `password` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '密码',
  `admin` int(2) NOT NULL DEFAULT 0 COMMENT '是否为管理员',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'admin', '123456', 1);
INSERT INTO `user` VALUES (2, '19861400251', '123456', 0);
INSERT INTO `user` VALUES (3, '15615351057', '123456', 0);

-- ----------------------------
-- Table structure for user_info
-- ----------------------------
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE `user_info`  (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',
  `name` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '性名',
  `gender` enum('男','女','保密') CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT '男' COMMENT '性别',
  `age` int(11) NULL DEFAULT NULL COMMENT '年龄',
  `phone` char(11) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '手机号',
  `city` varchar(40) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '籍贯',
  `desc_info` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL COMMENT '个人介绍',
  `headPic` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '头像',
  `money` float(20, 0) UNSIGNED NULL DEFAULT 0 COMMENT '资产',
  `cart_id` int(11) NULL DEFAULT NULL COMMENT '购物车id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user_info
-- ----------------------------
INSERT INTO `user_info` VALUES (2, '小红', '男', 20, '19861400251', '青岛市 城阳区 惜福镇街道 铁骑山路79号青岛城市学院', '你好，我是小红。1222', 'http://www.test.com/images/headPic/1688025113.jpg', 0, NULL);
INSERT INTO `user_info` VALUES (3, '小明', '男', 20, '15615351057', '山东省 济南市 章丘区 双山街道 大学路2号山东财经大学明水校区', '我是小明，你好。', 'http://www.test.com/images/headPic/1687003935.png', 0, NULL);
INSERT INTO `user_info` VALUES (4, '小红二号', '女', 20, '12345678910', '山东省 济南市 长清区 崮云湖街道 海棠路800号山东劳动职业技术学院', '你好，我是小红二号。11', 'http://www.test.com/images/headPic/1687004728.jpg', 0, NULL);
INSERT INTO `user_info` VALUES (5, '李成龙', '男', 20, '111111111', '山东', '122233332', 'http://www.test.com/images/headPic/1687671966.jpg', 0, NULL);
INSERT INTO `user_info` VALUES (6, '李成龙', '男', 20, '11111112311', '山东', '1111', 'http://www.test.com/images/headPic/1687519546.jpg', 0, NULL);

SET FOREIGN_KEY_CHECKS = 1;
