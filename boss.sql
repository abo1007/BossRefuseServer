/*
 Navicat Premium Data Transfer

 Source Server         : mysql1
 Source Server Type    : MariaDB
 Source Server Version : 100126
 Source Host           : localhost:3306
 Source Schema         : boss

 Target Server Type    : MariaDB
 Target Server Version : 100126
 File Encoding         : 65001

 Date: 14/06/2021 21:26:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for boss_cominfo
-- ----------------------------
DROP TABLE IF EXISTS `boss_cominfo`;
CREATE TABLE `boss_cominfo`  (
  `workComId` int(8) NOT NULL AUTO_INCREMENT,
  `workComName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComPerson` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComAllName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComScale` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComDate` date NOT NULL,
  `workComCate` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComTag` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComCity` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComArea` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComIntro` varchar(400) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComCap` float NOT NULL,
  PRIMARY KEY (`workComId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1414 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_cominfo
-- ----------------------------
INSERT INTO `boss_cominfo` VALUES (1408, '白嫖科技', '杰克马', '南京市白嫖科技发展有限公司', '10-19', '2010-01-01', '互联网', '朝八晚六，收费零食，自费团建', '南京市', '鼓楼区', '这个公司很懒，什么都没有留下', 1);
INSERT INTO `boss_cominfo` VALUES (1409, '巴里阿阿', '马不兴', '巴里阿阿(北京)有限公司', '500', '2002-01-01', '互联网/科技', '节假双休，下午茶，零食水果，弹性工作，员工餐', '北京市', '海淀区', '巴里阿阿集团的宗旨是让天下没有好做的生意', 10000);
INSERT INTO `boss_cominfo` VALUES (1410, '阿波科技', '阿波', '阿波科技（北京）有限公司', '500+', '2021-01-01', '互联网', '五险一金，十三薪，带薪年假', '北京市', '上地', '变化的世界，不变的我们', 1);
INSERT INTO `boss_cominfo` VALUES (1411, '阿波科技', '阿波', '阿波科技（北京）有限公司', '500+', '2021-01-01', '互联网', '五险一金，十三薪，带薪年假', '北京市', '上地', '变化的世界，不变的我们', 1);
INSERT INTO `boss_cominfo` VALUES (1412, '测试3', '测试', '测试数据', '0-9', '2021-03-24', '电子商务', '五险一金', '北京市', '测试', '测试111', 1);
INSERT INTO `boss_cominfo` VALUES (1413, '长城汽车', 'WJJ', '长城汽车中国有限公司', '500+', '2017-08-01', '汽车生产', '五险一金，员工体检，定期旅游', '北京市', '南边保定', '中国SUV领导者', 1000000);

-- ----------------------------
-- Table structure for boss_msg
-- ----------------------------
DROP TABLE IF EXISTS `boss_msg`;
CREATE TABLE `boss_msg`  (
  `msgId` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(8) NOT NULL,
  `workComId` int(8) NOT NULL,
  `msgTime` datetime(0) NOT NULL,
  `sendID` int(8) NOT NULL,
  `acceptID` int(8) NOT NULL,
  `msgContent` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workId` int(8) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`msgId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10009 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_msg
-- ----------------------------
INSERT INTO `boss_msg` VALUES (10001, 10001, 1408, '2021-04-01 18:00:00', 10001, 1408, '您好？没有经验可以去吗', 10001, 1);
INSERT INTO `boss_msg` VALUES (10002, 10001, 1408, '2021-04-01 18:01:00', 1408, 10001, '您好，我是AAA富士康直招 人事经理', 10001, 1);
INSERT INTO `boss_msg` VALUES (10003, 10001, 1408, '2021-04-01 18:07:00', 1408, 10001, '现在是招聘热季，我们这里试干一月不收任何费用', 10001, 1);
INSERT INTO `boss_msg` VALUES (10004, 10001, 1408, '2021-04-01 19:37:00', 10001, 1408, '？？？', 10001, 1);
INSERT INTO `boss_msg` VALUES (10005, 10001, 1408, '2021-04-19 20:26:20', 10001, 1408, '我给你一锤子？', 10001, 1);
INSERT INTO `boss_msg` VALUES (10006, 10001, 1408, '2021-04-20 20:47:04', 10001, 1408, '在吗？？？', 10001, 1);
INSERT INTO `boss_msg` VALUES (10007, 10001, 1408, '2021-04-20 20:47:20', 10001, 1408, '麻烦给下地址', 10001, 1);
INSERT INTO `boss_msg` VALUES (10008, 10001, 1408, '2021-04-20 21:21:59', 1408, 10001, '风里雨里，北二环等你', 10001, 1);

-- ----------------------------
-- Table structure for boss_offer
-- ----------------------------
DROP TABLE IF EXISTS `boss_offer`;
CREATE TABLE `boss_offer`  (
  `workOfferId` int(11) NOT NULL AUTO_INCREMENT,
  `workOfferType` int(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `workComId` int(11) NOT NULL,
  `candId` int(11) NOT NULL,
  `workId` int(11) NOT NULL,
  `editorId` int(11) NOT NULL,
  PRIMARY KEY (`workOfferId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10006 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_offer
-- ----------------------------
INSERT INTO `boss_offer` VALUES (10000, 1, 10001, 1408, 10000, 10001, 10000);
INSERT INTO `boss_offer` VALUES (10001, 2, 10001, 1408, 10000, 10002, 10000);
INSERT INTO `boss_offer` VALUES (10002, 4, 10001, 1408, 10000, 10002, 10000);
INSERT INTO `boss_offer` VALUES (10003, 3, 10001, 1408, 10000, 10006, 10000);
INSERT INTO `boss_offer` VALUES (10004, 4, 10001, 1408, 10000, 10004, 10000);
INSERT INTO `boss_offer` VALUES (10005, 1, 10001, 1408, 10001, 10003, 10000);

-- ----------------------------
-- Table structure for boss_resume
-- ----------------------------
DROP TABLE IF EXISTS `boss_resume`;
CREATE TABLE `boss_resume`  (
  `candId` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sex` int(1) NOT NULL,
  `age` int(3) NOT NULL,
  `edu` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `school` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workExper` int(5) NOT NULL,
  `projectExper` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `certificate` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `honor` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `expect` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `intro` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `userId` int(11) NOT NULL,
  `isShow` int(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`candId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10004 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_resume
-- ----------------------------
INSERT INTO `boss_resume` VALUES (10000, '杨波', 0, 24, '博士', '清华大学西伯利亚分校农学院', 10, '无', '无', '一带一路暨金砖国家技能发展与技术大赛之网站设计与开发大赛三等奖', '天津，前端工程师，4-6k', '我是开发者', 10001, 0);
INSERT INTO `boss_resume` VALUES (10001, '岳大颖', 1, 22, '大专', '五道口职业学院', 0, '无', '无', '无', '天津，UI设计师，4-6k', 'hello world', 10002, 0);
INSERT INTO `boss_resume` VALUES (10002, '摇摆羊', 0, 22, '初中及以下', '宋庄子中学', 0, '无', '无', '无', '沈阳，品牌公关，8-15k', '几天不见，怎么这么拉了？', 10004, 0);
INSERT INTO `boss_resume` VALUES (10003, '蔡大头', 0, 20, '高中/中专/职高', '廊坊九中', 0, '无', '无', '无', '南京，其他，15k以上', 'hello world', 10003, 0);

-- ----------------------------
-- Table structure for boss_user
-- ----------------------------
DROP TABLE IF EXISTS `boss_user`;
CREATE TABLE `boss_user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `sex` int(1) NOT NULL,
  `regtime` datetime(0) NOT NULL,
  `phonenum` varchar(12) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `nickname` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `isvip` int(1) NOT NULL DEFAULT 0,
  `isCom` int(1) NOT NULL DEFAULT 0,
  `api_token` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `spareId` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10007 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_user
-- ----------------------------
INSERT INTO `boss_user` VALUES (10000, 'yangbo', '0ef9daeb0937a0860b860c36cecf82b6', 0, '2000-10-07 00:00:00', '15128659469', '麦克不可', 1, 1, '7dvwPHRs4vq8w8t670KiVPwkrDD7BNPPmEaibfLDwAlQdJj3kQWzRV3KBpIE', 1408);
INSERT INTO `boss_user` VALUES (10001, 'abo1007', 'd20a1a6d16a1141d751c8fb7b3b4c3b1', 0, '2021-01-08 00:00:00', '15128659469', '来去之间', 1, 0, 'DeXjuGFFG94UYkCVYPS87lfLjoYdOuxT0CZrL7hibHACzCk8jI4durYrUS5p', NULL);
INSERT INTO `boss_user` VALUES (10002, 'yy1999', '351bb4ff533ae6e152d1db78550f8996', 1, '1999-12-25 00:00:00', '16666666666', '风渐渐', 0, 0, 'tbeoqUPAPwPT6VByD3SxNb8WK5v94euDlxWsewEwqSCdnD8JapspxFSyP0FZ', NULL);
INSERT INTO `boss_user` VALUES (10003, 'cai2002', 'e5bb37a5d9cf89ce660dad2f4bf836d7', 0, '2021-03-01 15:33:54', '15631650688', '蔡大头头', 0, 0, 'dS2EO1X8C4IF63ac6QRzBmAqQt4GrbAjgiG6e9wrn2j4SGn1gpiVRAqVEiYb', NULL);
INSERT INTO `boss_user` VALUES (10004, 'java666', '25d55ad283aa400af464c76d713c07ad', 0, '2021-03-06 21:10:01', '01012345678', 'Java天下第一', 0, 0, 'WXwG36Y8V3zEHfJitG6H9IvrdRKBbgD1TeTN1WfEv7meLOpkPJViqXb79ZL8', NULL);
INSERT INTO `boss_user` VALUES (10005, 'sudoroot', '0ef9daeb0937a0860b860c36cecf82b6', 0, '2021-03-10 21:09:33', '13833616001', '阿波科技', 0, 1, 'ogbUWM0CY1KSCe0sYNzdhAQW4B7C95EchSQdDT6LbLMocUiRIKm7oB1N44Gl', 1412);
INSERT INTO `boss_user` VALUES (10006, 'czzy2021', '5509a9195eb2a4ec407d1e2894cff729', 0, '2021-06-05 16:35:58', '15128659469', '农校老王', 0, 1, 'Yi5qp07pfmyTQmz6ywv1t2HPvZxUaz7tgrAGUbf1UJKoHXeZOxiZNJVoXw99', 1413);

-- ----------------------------
-- Table structure for boss_workcategory
-- ----------------------------
DROP TABLE IF EXISTS `boss_workcategory`;
CREATE TABLE `boss_workcategory`  (
  `workCateId` int(11) NOT NULL,
  `cateName` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `cate2Name` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`workCateId`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_workcategory
-- ----------------------------
INSERT INTO `boss_workcategory` VALUES (100, '技术', '技术');
INSERT INTO `boss_workcategory` VALUES (101, '技术', 'Java工程师');
INSERT INTO `boss_workcategory` VALUES (102, '技术', '前端工程师');
INSERT INTO `boss_workcategory` VALUES (103, '技术', 'PHP工程师');
INSERT INTO `boss_workcategory` VALUES (104, '技术', '算法工程师');
INSERT INTO `boss_workcategory` VALUES (105, '技术', '测试工程师');
INSERT INTO `boss_workcategory` VALUES (106, '技术', '全栈工程师');
INSERT INTO `boss_workcategory` VALUES (200, '产品', '产品');
INSERT INTO `boss_workcategory` VALUES (201, '产品', '产品经理');
INSERT INTO `boss_workcategory` VALUES (202, '产品', '游戏策划');
INSERT INTO `boss_workcategory` VALUES (203, '产品', '电商产品经理');
INSERT INTO `boss_workcategory` VALUES (204, '产品', '产品专员');
INSERT INTO `boss_workcategory` VALUES (205, '产品', '产品VP');
INSERT INTO `boss_workcategory` VALUES (300, '设计', '设计');
INSERT INTO `boss_workcategory` VALUES (301, '设计', 'UI设计师');
INSERT INTO `boss_workcategory` VALUES (302, '设计', '平面设计');
INSERT INTO `boss_workcategory` VALUES (303, '设计', '室内设计');
INSERT INTO `boss_workcategory` VALUES (304, '设计', '视觉设计');
INSERT INTO `boss_workcategory` VALUES (305, '设计', '工业设计');
INSERT INTO `boss_workcategory` VALUES (400, '运营', '运营');
INSERT INTO `boss_workcategory` VALUES (401, '运营', '电商运营');
INSERT INTO `boss_workcategory` VALUES (402, '运营', '新媒体运营');
INSERT INTO `boss_workcategory` VALUES (403, '运营', '客服专员');
INSERT INTO `boss_workcategory` VALUES (404, '运营', '网站编辑');
INSERT INTO `boss_workcategory` VALUES (405, '运营', '产品运营');
INSERT INTO `boss_workcategory` VALUES (500, '市场', '市场');
INSERT INTO `boss_workcategory` VALUES (501, '市场', '市场营销');
INSERT INTO `boss_workcategory` VALUES (502, '市场', '网络营销');
INSERT INTO `boss_workcategory` VALUES (503, '市场', '品牌公关');
INSERT INTO `boss_workcategory` VALUES (504, '市场', '广告策划');
INSERT INTO `boss_workcategory` VALUES (505, '市场', 'SEO/SEM');
INSERT INTO `boss_workcategory` VALUES (600, '其他', '其他');

-- ----------------------------
-- Table structure for boss_workface
-- ----------------------------
DROP TABLE IF EXISTS `boss_workface`;
CREATE TABLE `boss_workface`  (
  `workId` int(8) NOT NULL AUTO_INCREMENT,
  `workTitle` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workSalary` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workComId` int(8) NOT NULL,
  `workTag` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workPublisher` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `workCateId` int(3) NOT NULL,
  `workPublisherId` int(8) NOT NULL,
  `show` int(1) NOT NULL,
  PRIMARY KEY (`workId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10008 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_workface
-- ----------------------------
INSERT INTO `boss_workface` VALUES (10001, '全栈工程师', '1-2K', 1408, '硕士，3-5年，Vue，Java', '刘先生·人事', 106, 10000, 0);
INSERT INTO `boss_workface` VALUES (10002, '产品经理', '0.5-1.5K', 1408, '本科，1-3年，弹性工作，大牛云集', '刘先生·人事', 201, 10000, 0);
INSERT INTO `boss_workface` VALUES (10003, 'UI设计师', '6-10k', 1408, '本科，3年，Ps，Ai', '人事·老王', 301, 10000, 0);
INSERT INTO `boss_workface` VALUES (10004, 'Java架构师', '30-60k', 1408, '本科，5-10年，985/211，Java', '人事·老王', 101, 10000, 0);
INSERT INTO `boss_workface` VALUES (10005, '前端工程师', '6-8k', 1408, '硕士，5-10年，五险一金，996', '人事·老王', 102, 10000, 0);
INSERT INTO `boss_workface` VALUES (10006, '电商运营', '2-4k', 1408, '高中/中专/职高，1年以内，弹性工作', '人事·老王', 401, 10000, 0);
INSERT INTO `boss_workface` VALUES (10007, '流水线技工', '2-4k', 1413, '大专，应届生，五险一金，朝九晚五', '农校老王', 600, 10006, 1);

-- ----------------------------
-- Table structure for boss_workinfo
-- ----------------------------
DROP TABLE IF EXISTS `boss_workinfo`;
CREATE TABLE `boss_workinfo`  (
  `workId` int(11) NOT NULL AUTO_INCREMENT,
  `workIntro` varchar(900) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`workId`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10008 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_bin ROW_FORMAT = Compact;

-- ----------------------------
-- Records of boss_workinfo
-- ----------------------------
INSERT INTO `boss_workinfo` VALUES (10001, '岗位职责<br/> 1、负责子公司职场系统（HR系统、OA系统、财务系统等）的维护和新功能二次开发；<br/>2、负责HR系统和审核业务系统的打通，如打卡和工作量统计等；<br/>3、参与团队前端技术栈的建设和更新；<br/>岗位要求<br/>1、精通Javasript/HTML/CSS等前端开发技术，基础扎实；<br/>2、熟悉当下主流的前端框架(React/Vue/Angular等)，有React开发经验优先；<br/>3、两年及以上 Node.js 开发工作经验，熟悉 ES6, ES7 语法，有 Express 或 Koa 框架的使用经验；<br/> 4、熟悉Linux/Unix平台开发，至少熟悉一种脚本语言，具备优秀的代码习惯；<br/> 5、理解微服务架构，有分布式系统搭建与研发经验；<br/>6、熟悉Web应用系统开发，对HTTP、TCP/IP协议及web服务器等有所理解；拥有良好的安全意识，熟悉常见的网络安全攻防策略；<br/>7、有Nginx、Elasticsearch、Kafka等开源工具运维开发经验者优先；<br/>8、有 MySQL, Redis 或 MongoDB 等相关数据库使用经验；<br/>9、有主导开发过中型以上系统经验，有ci/cd等自动化部署经验者优先；<br/>10、良好的沟通表能力和团队合作精神，有责任心，抗压能力好；<br/>');
INSERT INTO `boss_workinfo` VALUES (10002, '团队介绍：<br/>承担“软件项目研发平台”产品及其他产品的设计和管理工作，功能为软件类项目的商务管理、开发自动化管理、devops等，目前主要服务客户属金融行业。<br/>岗位职责<br/>与用户沟通，分析用户需求<br/>产品设计，规划产品需求，产品原型设计，PRD文档撰写；<br/>产品设计方案对上级领导和用户领导的汇报，沟通，接受评审<br/>向开发人员传达产品设计方案，指导开发工作<br/>控制产品开发进度，验收开发成果，推进产品的最终交付<br/>工作期间会频繁到北京与用户和同事开会沟通，可视表现和个人意愿选择常驻北京工作<br/>职位要求：<br/>软件工程或相关专业全日制本科及以上学历<br/>具有管理系统或大数据系统设计经验者优先<br/>良好的工作态度和主动解决问题的意识，逻辑性强<br/>良好的表达能力和沟通习惯<br/>具备一定的用户体验设计和UI设计能力<br/>熟悉产品设计的流程和工具<br/>');
INSERT INTO `boss_workinfo` VALUES (10003, '我们的使命是让天下没有不勤劳的打工人');
INSERT INTO `boss_workinfo` VALUES (10004, '高薪急聘Java架构师，要求精通Java、JavaWeb、HTTP、Servlet、Spring、SpringMVC、SpringBoot、Mybatis、MySQL、Oracle、Redis、JQuery、Ajax、Vue，要求深入掌握JVM虚拟机原理，能够实现数据库重写调优，熟悉Linux环境开发，对Hibernate、Tomcat等工具有所涉猎');
INSERT INTO `boss_workinfo` VALUES (10005, '要求上知天文，下知地理');
INSERT INTO `boss_workinfo` VALUES (10006, '简单易做');
INSERT INTO `boss_workinfo` VALUES (10007, '汽车生产流水线工作，技术简单，工作轻松');

SET FOREIGN_KEY_CHECKS = 1;
