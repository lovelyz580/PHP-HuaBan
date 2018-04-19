/*
 Navicat Premium Data Transfer

 Source Server         : root
 Source Server Type    : MySQL
 Source Server Version : 50553
 Source Host           : localhost:3306
 Source Schema         : huaban

 Target Server Type    : MySQL
 Target Server Version : 50553
 File Encoding         : 65001

 Date: 26/10/2017 10:00:09
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for classify
-- ----------------------------
DROP TABLE IF EXISTS `classify`;
CREATE TABLE `classify`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `image` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `brief` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 8 CHARACTER SET = utf8 COLLATE = utf8_general_ci COMMENT = '分类表（栏目表）' ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of classify
-- ----------------------------
INSERT INTO `classify` VALUES (1, '草莓', 'images/class/1.png', '草莓不好吃');
INSERT INTO `classify` VALUES (2, '派对装饰', 'images/class/2.png', '派对不能装饰');
INSERT INTO `classify` VALUES (3, '雪', 'images/class/3.png', '结婚不吃蛋糕');
INSERT INTO `classify` VALUES (4, '美食', 'images/class/4.png', 'lomo我不喜欢');
INSERT INTO `classify` VALUES (5, '书架', 'images/class/5.png', '日系好恶心');
INSERT INTO `classify` VALUES (6, '彩虹色', 'images/class/7.png', '牛奶奶牛');
INSERT INTO `classify` VALUES (7, '人体艺术', 'images/class/4.png', '。。。。。。。。。');

-- ----------------------------
-- Table structure for collection
-- ----------------------------
DROP TABLE IF EXISTS `collection`;
CREATE TABLE `collection`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) DEFAULT NULL,
  `iid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 82 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Fixed;

-- ----------------------------
-- Records of collection
-- ----------------------------
INSERT INTO `collection` VALUES (1, 2, 1);
INSERT INTO `collection` VALUES (4, 3, 1);
INSERT INTO `collection` VALUES (5, 6, 7);
INSERT INTO `collection` VALUES (6, 8, 1);
INSERT INTO `collection` VALUES (40, 18, 16);
INSERT INTO `collection` VALUES (31, 25, 1);
INSERT INTO `collection` VALUES (42, 18, 13);
INSERT INTO `collection` VALUES (15, 8, 36);
INSERT INTO `collection` VALUES (16, 8, 37);
INSERT INTO `collection` VALUES (17, 8, 34);
INSERT INTO `collection` VALUES (41, 18, 45);
INSERT INTO `collection` VALUES (19, 8, 27);
INSERT INTO `collection` VALUES (20, 8, 23);
INSERT INTO `collection` VALUES (37, 18, 40);
INSERT INTO `collection` VALUES (38, 18, 39);
INSERT INTO `collection` VALUES (43, 27, 40);
INSERT INTO `collection` VALUES (33, 25, 7);
INSERT INTO `collection` VALUES (29, 8, 2);
INSERT INTO `collection` VALUES (44, 27, 41);
INSERT INTO `collection` VALUES (65, 33, 1);
INSERT INTO `collection` VALUES (45, 27, 43);
INSERT INTO `collection` VALUES (46, 27, 21);
INSERT INTO `collection` VALUES (47, 27, 26);
INSERT INTO `collection` VALUES (54, 25, 45);
INSERT INTO `collection` VALUES (53, 25, 4);
INSERT INTO `collection` VALUES (55, 25, 33);
INSERT INTO `collection` VALUES (56, 25, 18);
INSERT INTO `collection` VALUES (57, 28, 3);
INSERT INTO `collection` VALUES (58, 25, 19);
INSERT INTO `collection` VALUES (59, 25, 21);
INSERT INTO `collection` VALUES (60, 28, 16);
INSERT INTO `collection` VALUES (61, 25, 44);
INSERT INTO `collection` VALUES (68, 37, 28);
INSERT INTO `collection` VALUES (63, 25, 42);
INSERT INTO `collection` VALUES (67, 37, 5);
INSERT INTO `collection` VALUES (79, 39, 2);
INSERT INTO `collection` VALUES (77, 3, 25);
INSERT INTO `collection` VALUES (74, 3, 40);
INSERT INTO `collection` VALUES (75, 3, 42);
INSERT INTO `collection` VALUES (78, 3, 18);
INSERT INTO `collection` VALUES (81, 1, 1);

-- ----------------------------
-- Table structure for comment
-- ----------------------------
DROP TABLE IF EXISTS `comment`;
CREATE TABLE `comment`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NOT NULL COMMENT '用户id',
  `iid` int(11) NOT NULL COMMENT '图片id',
  `conent` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '评论内容',
  `date` int(11) NOT NULL COMMENT '时间',
  `pid` int(11) NOT NULL COMMENT '副id',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 76 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of comment
-- ----------------------------
INSERT INTO `comment` VALUES (1, 1, 1, '123123123132', 1497863030, 0);
INSERT INTO `comment` VALUES (2, 1, 1, '12345678909832', 1497871820, 0);
INSERT INTO `comment` VALUES (3, 1, 1, '阿斯顿阿斯顿阿斯顿爱疯是斯蒂芬', 1497872070, 0);
INSERT INTO `comment` VALUES (4, 1, 1, '我是来评论的', 1497872135, 0);
INSERT INTO `comment` VALUES (5, 3, 1, '侯岢最帅了', 1497959569, 0);
INSERT INTO `comment` VALUES (6, 3, 6, 'asdasdasdasdasd', 1498006332, 0);
INSERT INTO `comment` VALUES (7, 3, 12, '幽灵图片吗', 1498102419, 0);
INSERT INTO `comment` VALUES (8, 3, 1, '手动添加~', 1498814892, 0);
INSERT INTO `comment` VALUES (9, 3, 1, '再来测试一下~', 1498814964, 0);
INSERT INTO `comment` VALUES (11, 8, 1, '打我打我的', 1498967784, 0);
INSERT INTO `comment` VALUES (12, 8, 26, '我爱你', 1498968192, 0);
INSERT INTO `comment` VALUES (13, 1, 35, '阿萨德阿萨德阿萨德阿萨德阿萨德', 1498985508, 0);
INSERT INTO `comment` VALUES (14, 1, 2, '啦啦啦', 1499129375, 0);
INSERT INTO `comment` VALUES (15, 1, 3, '', 1499132437, 0);
INSERT INTO `comment` VALUES (16, 1, 3, '', 1499132546, 0);
INSERT INTO `comment` VALUES (17, 1, 3, '阿萨德阿萨德', 1499132560, 0);
INSERT INTO `comment` VALUES (18, 1, 3, '阿萨德', 1499132605, 0);
INSERT INTO `comment` VALUES (19, 8, 20, '66666', 1499133134, 0);
INSERT INTO `comment` VALUES (20, 8, 20, '66666666666666666666666666666666666666666666666666', 1499133157, 0);
INSERT INTO `comment` VALUES (21, 8, 9, '66666666666666666666666666666666666666666666666666', 1499133287, 0);
INSERT INTO `comment` VALUES (22, 1, 9, '99999999999999999999999999999999999999999999999999', 1499133557, 0);
INSERT INTO `comment` VALUES (23, 8, 9, '1231231322323123111111111111111111111111111111111\r', 1499133568, 0);
INSERT INTO `comment` VALUES (24, 18, 1, '评论下子~', 1499160138, 0);
INSERT INTO `comment` VALUES (25, 18, 3, '测试', 1499215789, 0);
INSERT INTO `comment` VALUES (26, 8, 18, '了空降兵v刹', 1499217038, 0);
INSERT INTO `comment` VALUES (27, 8, 39, 'ajax 测试', 1499217953, 0);
INSERT INTO `comment` VALUES (28, 8, 39, '测试测试', 1499218056, 0);
INSERT INTO `comment` VALUES (29, 18, 1, '233333', 1499224551, 0);
INSERT INTO `comment` VALUES (30, 8, 18, '6666666666666', 1499240330, 0);
INSERT INTO `comment` VALUES (31, 8, 18, '666666666666', 1499240337, 0);
INSERT INTO `comment` VALUES (32, 8, 18, '66666666666666666', 1499240342, 0);
INSERT INTO `comment` VALUES (33, 8, 18, '6666666666666', 1499240350, 0);
INSERT INTO `comment` VALUES (34, 8, 9, '222222222222222222222222', 1499240560, 0);
INSERT INTO `comment` VALUES (35, 8, 9, '22222222222', 1499240565, 0);
INSERT INTO `comment` VALUES (36, 8, 2, '别吃错了', 1499301642, 0);
INSERT INTO `comment` VALUES (37, 8, 37, '1231215487745687456', 1499304026, 0);
INSERT INTO `comment` VALUES (38, 25, 7, '111111111111', 1499308843, 0);
INSERT INTO `comment` VALUES (39, 25, 7, '1111', 1499308862, 0);
INSERT INTO `comment` VALUES (40, 18, 39, '测试你妹啊', 1499309398, 0);
INSERT INTO `comment` VALUES (41, 18, 2, '12355655456', 1499310712, 0);
INSERT INTO `comment` VALUES (42, 27, 40, '火钳刘明', 1499313642, 0);
INSERT INTO `comment` VALUES (43, 27, 40, '漂亮妹子！！！', 1499313653, 0);
INSERT INTO `comment` VALUES (44, 18, 40, '发表评论', 1499321154, 0);
INSERT INTO `comment` VALUES (45, 18, 40, '侯岢怎么了？', 1499329199, 0);
INSERT INTO `comment` VALUES (58, 25, 18, '1111111111', 1499333126, 0);
INSERT INTO `comment` VALUES (60, 28, 16, '几点开始拉到就上课啦', 1499333352, 0);
INSERT INTO `comment` VALUES (62, 25, 1, '1111111111111', 1499334548, 0);
INSERT INTO `comment` VALUES (63, 37, 1, '图片已经带走', 1499415720, 0);
INSERT INTO `comment` VALUES (67, 39, 1, '222222222222', 1499818975, 0);

-- ----------------------------
-- Table structure for image
-- ----------------------------
DROP TABLE IF EXISTS `image`;
CREATE TABLE `image`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `brief` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '简介',
  `date` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `cid` int(11) DEFAULT NULL,
  `look` int(11) NOT NULL DEFAULT 0,
  `like` int(11) NOT NULL DEFAULT 0,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 48 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of image
-- ----------------------------
INSERT INTO `image` VALUES (1, 'images/cont/77.png', '123123', 1499235806, 1, 0, 200, 2, '笑靥如花的你');
INSERT INTO `image` VALUES (2, 'images/cont/zg.jpg', '看起来不错', 1499235006, 1, 0, 89, 3, '当下视觉||中餐摄影');
INSERT INTO `image` VALUES (3, 'images/cont/rixi.png', '一见钟情<br/>不是看了一眼<br/>就喜欢上了你<br/>而是在一眼之后<br/>就再也不曾忘记', 1499235206, 1, 0, 216, 1, '日系写真');
INSERT INTO `image` VALUES (4, 'images/cont/88.jpg', '', 1499235306, 1, 0, 300, 2, '猴哥MS原创&插画');
INSERT INTO `image` VALUES (5, 'images/cont/89.png', '', 1499235406, 1, 0, 96, 3, '《纪念碑谷》官方海报');
INSERT INTO `image` VALUES (6, 'images/cont/90.png', '', 1499235706, 1, 0, 62, 1, '排版精选');
INSERT INTO `image` VALUES (7, 'images/cont/234.png', '草莓不新鲜啊', 1499235906, 1, 1, 0, 0, '草莓');
INSERT INTO `image` VALUES (8, 'images/cont/245.png', '为什么喜欢草莓', 1498838400, 1, 1, 0, 0, '草莓1');
INSERT INTO `image` VALUES (9, 'images/cont/246.png', '喜欢草莓的原因', 1498752000, 1, 1, 0, 0, '草莓2');
INSERT INTO `image` VALUES (10, 'images/cont/247.png', '以前不爱吃草莓的我现在也爱上了吃', 1498838400, 1, 1, 0, 0, '草莓3');
INSERT INTO `image` VALUES (11, 'images/cont/248.png', '草莓也是一种营养佳品', 1499184000, 1, 1, 0, 0, '草莓4');
INSERT INTO `image` VALUES (12, 'images/cont/249.png', '草莓形似鸡心，但比鸡心大的多。', 1498752000, 1, 1, 0, 0, '草莓5');
INSERT INTO `image` VALUES (13, 'images/cont/250.png', '草莓的颜色更让我喜爱。', 1498320000, 1, 1, 0, 0, '草莓6');
INSERT INTO `image` VALUES (14, 'images/cont/251.png', '草莓像是精心挑选的，每个都差不多一样大小', 1499184000, 1, 1, 0, 0, '草莓7');
INSERT INTO `image` VALUES (15, 'images/cont/252.png', '印入眼帘的是一个个鲜红欲滴的草莓', 1499184000, 1, 1, 0, 0, '草莓8');
INSERT INTO `image` VALUES (16, 'images/cont/253.png', '草莓很难吃', 1498320000, 1, 1, 0, 0, '草莓9');
INSERT INTO `image` VALUES (17, 'images/cont/254.png', '蓝莓', 1499184000, 1, 1, 0, 0, '');
INSERT INTO `image` VALUES (18, 'images/cont/260.png', '书架', 1498752000, 1, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (19, 'images/cont/261.png', '书架', 1499184000, 1, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (20, 'images/cont/262.png', '', 1498838400, 1, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (21, 'images/cont/263.png', '', 1499184000, 3, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (22, 'images/cont/264.png', '', 1498320000, 3, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (23, 'images/cont/265.png', '', 1499184000, 1, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (24, 'images/cont/266.png', '', 1499184000, 4, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (25, 'images/cont/267.png', '', 1498838400, 8, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (26, 'images/cont/268.png', '', 1499184000, 8, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (27, 'images/cont/269.png', '', 1498838400, 1, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (28, 'images/cont/270.png', '', 1498838400, 1, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (29, 'images/cont/271.png', '', 1499184000, 8, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (30, 'images/cont/272.png', '我爱你', 1498752000, 8, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (31, 'images/cont/273.png', '我不爱你', 1499184000, 1, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (32, 'images/cont/274.png', '我不爱你', 1498665600, 3, 2, 0, 0, NULL);
INSERT INTO `image` VALUES (33, 'images/cont/280.png', '我不爱你', 1497888000, 3, 4, 0, 0, NULL);
INSERT INTO `image` VALUES (34, 'images/cont/281.png', '不好吃哦', 1498665600, 1, 4, 0, 0, NULL);
INSERT INTO `image` VALUES (35, 'images/cont/282.png', '好好吃哦', 1499184000, 8, 4, 0, 0, NULL);
INSERT INTO `image` VALUES (36, 'images/cont/283.png', '好好吃哦', 1498665600, 3, 4, 0, 0, NULL);
INSERT INTO `image` VALUES (37, 'images/cont/284.png', '啦啦啦啦', 1497888000, 8, 4, 0, 0, NULL);
INSERT INTO `image` VALUES (38, 'images/cont/290.png', '啦啦啦啦', 1498665600, 1, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (39, 'images/cont/291.png', '书架', 1499184000, 3, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (40, 'images/cont/292.png', '书架啦啦啦', 1498665600, 4, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (41, 'images/cont/293.png', '书架呦', 1497888000, 8, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (42, 'images/cont/294.png', '书架呦1111', 1498665600, 4, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (43, 'images/cont/294.png', '我爱你', 1497888000, 1, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (44, 'images/cont/294.png', '我爱你', 1498665600, 1, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (45, 'images/cont/245.png', '', 1498838400, 1, 1, 0, 0, NULL);
INSERT INTO `image` VALUES (46, 'images/cont/294.png', '书架呦1111', 1498665600, 1, 5, 0, 0, NULL);
INSERT INTO `image` VALUES (47, 'images/cont/272.png', '我爱你', 1498752000, 1, 2, 0, 0, NULL);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `H_portrait` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '头像',
  `sex` varchar(2) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `city` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '城市',
  `birthday` int(20) DEFAULT NULL COMMENT '生日',
  `brief` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '简介',
  `phone` varchar(11) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT '电话',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = MyISAM AUTO_INCREMENT = 43 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, '1', '1', './uploads/1508238327', '女', '河北', NULL, 'hdsajkdha', '2147483647');
INSERT INTO `user` VALUES (3, 'admin123', '123456', './uploads/20170711062118.jpg', '女', '保定', NULL, '魏政快点', '1388888777');
INSERT INTO `user` VALUES (4, 'lixiang', '123456', './uploads/111.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (18, 'houke', '123456', './uploads/20170705111227.jpg', '男', '北京', NULL, '', '0');
INSERT INTO `user` VALUES (17, 'weizheng', '199519', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (8, 'weizhengmmmp', '123456', './uploads/20170706054934.jpg', '男', '保定', NULL, 'mailege maipi', '2147483647');
INSERT INTO `user` VALUES (16, 'weizhang123', '123456', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (15, 'lixiang888', '123456', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (14, 'root', '123456', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (19, 'm4435566', '555r5555', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (20, 'hehehehe', '11', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (26, 'l233333333', 'weizheng199519', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (21, 'weizheng2222', 'm98545878', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (22, 'heheda23', 'm9825456', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (23, 'a111111', '88888888', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (24, 'm9825456', 'qq1197013843', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (25, 'q123456789', '', './uploads/20170706104702.jpg', '男', '', NULL, '', '0');
INSERT INTO `user` VALUES (27, 'w123456', 'weizheng199519', './uploads/kong.png', NULL, '', NULL, '我爱你老李想', NULL);
INSERT INTO `user` VALUES (28, 'm11111111', 'm11111111', './uploads/20170706045901.jpg', '男', '保定', NULL, '科技的夜空', '12548456184');
INSERT INTO `user` VALUES (29, 'q123456', 'weizheng199519', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (30, 'd123456', 'weizheng', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (31, 'm1234567', 'm1234567', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (32, 'a12345678', '11111111', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (33, 'a123123', 'mahaoran123', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (34, '123456789', '12345678', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (35, 'aa123456789', '11111111', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (36, 'lm123123', 'mahaoran123', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (37, 'mhr123123', 'mahaoran123', './uploads/20170707042324.jpg', NULL, '124', NULL, '12323', '11111111111');
INSERT INTO `user` VALUES (38, 'zhangsan1', '1234567899', './uploads/kong.png', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (39, 'zhangsan2', '12345678', './uploads/kong.png', '男', '', NULL, '', NULL);
INSERT INTO `user` VALUES (40, 'w3432', 's43543', '', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (41, 'qq123456', 'qwe654321', '', NULL, '', NULL, '', NULL);
INSERT INTO `user` VALUES (42, 'yyy9898977', 'uuui898989', '', NULL, '', NULL, '', NULL);

SET FOREIGN_KEY_CHECKS = 1;
