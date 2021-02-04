-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 2021-02-04 07:30:56
-- 服务器版本： 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boss`
--

-- --------------------------------------------------------

--
-- 表的结构 `boss_cominfo`
--

CREATE TABLE `boss_cominfo` (
  `workComId` int(8) NOT NULL,
  `workComName` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `workComPerson` varchar(30) COLLATE utf8mb4_bin NOT NULL,
  `workComAllName` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `workComScale` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `workComDate` date NOT NULL,
  `workComCate` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `workComTag` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `workComCity` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `workComArea` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `workComIntro` varchar(400) COLLATE utf8mb4_bin NOT NULL,
  `workComCap` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `boss_cominfo`
--

INSERT INTO `boss_cominfo` (`workComId`, `workComName`, `workComPerson`, `workComAllName`, `workComScale`, `workComDate`, `workComCate`, `workComTag`, `workComCity`, `workComArea`, `workComIntro`, `workComCap`) VALUES
(1408, '白嫖科技', '杰克马', '南京市白嫖科技发展有限公司', '0-9', '2010-01-01', '互联网/科技', '朝八晚六，收费零食，自费团建', '南京市', '鼓楼区', '这个公司很懒，什么都没有留下', 1);

-- --------------------------------------------------------

--
-- 表的结构 `boss_offer`
--

CREATE TABLE `boss_offer` (
  `workOfferId` int(11) NOT NULL,
  `workOfferType` int(1) NOT NULL,
  `userId` int(11) NOT NULL,
  `workComId` int(11) NOT NULL,
  `candId` int(11) NOT NULL,
  `workId` int(11) NOT NULL,
  `editorId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `boss_offer`
--

INSERT INTO `boss_offer` (`workOfferId`, `workOfferType`, `userId`, `workComId`, `candId`, `workId`, `editorId`) VALUES
(10000, 3, 10001, 1408, 10000, 10001, 10000),
(10001, 2, 10001, 1408, 10000, 10002, 10000),
(10002, 4, 10001, 1408, 10000, 10002, 10000);

-- --------------------------------------------------------

--
-- 表的结构 `boss_resume`
--

CREATE TABLE `boss_resume` (
  `candId` int(10) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `sex` int(1) NOT NULL,
  `age` int(3) NOT NULL,
  `edu` varchar(20) COLLATE utf8mb4_bin NOT NULL,
  `school` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `workExper` int(5) NOT NULL,
  `projectExper` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `certificate` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `honor` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `expect` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `intro` varchar(300) COLLATE utf8mb4_bin NOT NULL,
  `userId` int(11) NOT NULL,
  `isShow` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `boss_resume`
--

INSERT INTO `boss_resume` (`candId`, `name`, `sex`, `age`, `edu`, `school`, `workExper`, `projectExper`, `certificate`, `honor`, `expect`, `intro`, `userId`, `isShow`) VALUES
(10000, '杨波', 0, 24, '博士', '清华大学西伯利亚分校农学院', 10, '无', '无', '一带一路暨金砖国家技能发展与技术大赛之网站设计与开发大赛三等奖', '天津，Java工程师，4-6k', '我是开发者', 10001, 0),
(10001, '岳大颖', 1, 22, '大专', '五道口职业学院', 0, '无', '无', '无', '天津，UI设计师，4-6k', 'hello world', 10002, 0),
(10002, '摇摆羊', 0, 22, '初中及以下', '宋庄子中学', 0, '无', '无', '无', '沈阳，品牌公关，8-15k', '几天不见，怎么这么拉了？', 10003, 0),
(10003, '蔡大头', 0, 20, '高中/中专/职高', '廊坊九中', 0, '无', '无', '无', '南京，其他，15k以上', 'hello world', 10004, 0);

-- --------------------------------------------------------

--
-- 表的结构 `boss_user`
--

CREATE TABLE `boss_user` (
  `id` int(11) NOT NULL,
  `username` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(150) COLLATE utf8mb4_bin NOT NULL,
  `sex` int(1) NOT NULL,
  `regtime` datetime NOT NULL,
  `phonenum` varchar(12) COLLATE utf8mb4_bin NOT NULL,
  `nickname` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `isvip` int(1) NOT NULL DEFAULT '0',
  `isCom` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `boss_user`
--

INSERT INTO `boss_user` (`id`, `username`, `password`, `sex`, `regtime`, `phonenum`, `nickname`, `isvip`, `isCom`) VALUES
(10000, 'yangbo', 'yangbo', 0, '2020-12-17 13:00:00', '15128659469', '麦克不可', 1, 1),
(10001, 'abo1007', 'abo1007', 0, '2021-01-08 00:00:00', '15128659469', '来去之间', 1, 0);

-- --------------------------------------------------------

--
-- 表的结构 `boss_workcategory`
--

CREATE TABLE `boss_workcategory` (
  `workCateId` int(11) NOT NULL,
  `cateName` varchar(25) COLLATE utf8mb4_bin NOT NULL,
  `cate2Name` varchar(25) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `boss_workcategory`
--

INSERT INTO `boss_workcategory` (`workCateId`, `cateName`, `cate2Name`) VALUES
(100, '技术', '技术'),
(101, '技术', 'Java工程师'),
(102, '技术', '前端工程师'),
(103, '技术', 'PHP工程师'),
(104, '技术', '算法工程师'),
(105, '技术', '测试工程师'),
(106, '技术', '全栈工程师'),
(200, '产品', '产品'),
(201, '产品', '产品经理'),
(202, '产品', '游戏策划'),
(203, '产品', '电商产品经理'),
(204, '产品', '产品专员'),
(205, '产品', '产品VP'),
(300, '设计', '设计'),
(301, '设计', 'UI设计师'),
(302, '设计', '平面设计'),
(303, '设计', '室内设计'),
(304, '设计', '视觉设计'),
(305, '设计', '工业设计'),
(400, '运营', '运营'),
(401, '运营', '电商运营'),
(402, '运营', '新媒体运营'),
(403, '运营', '客服专员'),
(404, '运营', '网站编辑'),
(405, '运营', '产品运营'),
(500, '市场', '市场'),
(501, '市场', '市场营销'),
(502, '市场', '网络营销'),
(503, '市场', '品牌公关'),
(504, '市场', '广告策划'),
(505, '市场', 'SEO/SEM'),
(600, '其他', '其他');

-- --------------------------------------------------------

--
-- 表的结构 `boss_workface`
--

CREATE TABLE `boss_workface` (
  `workId` int(8) NOT NULL,
  `workTitle` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `workSalary` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `workComId` int(8) NOT NULL,
  `workTag` varchar(200) COLLATE utf8mb4_bin NOT NULL,
  `workPublisher` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `workCateId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `boss_workface`
--

INSERT INTO `boss_workface` (`workId`, `workTitle`, `workSalary`, `workComId`, `workTag`, `workPublisher`, `workCateId`) VALUES
(10001, '全栈工程师', '1-2K', 1408, '3-5年，硕士研究生，Vue，Java', '刘先生·人事', 106),
(10002, '产品经理', '0.5-1.5K', 1408, '1-3年，本科', '刘先生·人事', 201),
(10003, 'UI设计师', '6-10k', 1408, '专科，3年，Ps，Ai', '人事·老王', 301),
(10004, 'Java架构师', '30-60k', 1408, '本科，5-10年，985/211，Java', '人事·老王', 101);

-- --------------------------------------------------------

--
-- 表的结构 `boss_workinfo`
--

CREATE TABLE `boss_workinfo` (
  `workId` int(11) NOT NULL,
  `workIntro` varchar(900) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- 转存表中的数据 `boss_workinfo`
--

INSERT INTO `boss_workinfo` (`workId`, `workIntro`) VALUES
(10003, '我们的使命是让天下没有不勤劳的打工人'),
(10004, '高薪急聘Java架构师，要求精通Java、JavaWeb、HTTP、Servlet、Spring、SpringMVC、SpringBoot、Mybatis、MySQL、Oracle、Redis、JQuery、Ajax、Vue，要求深入掌握JVM虚拟机原理，能够实现数据库重写调优，熟悉Linux环境开发，对Hibernate、Tomcat等工具有所涉猎');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `boss_cominfo`
--
ALTER TABLE `boss_cominfo`
  ADD PRIMARY KEY (`workComId`);

--
-- Indexes for table `boss_offer`
--
ALTER TABLE `boss_offer`
  ADD PRIMARY KEY (`workOfferId`);

--
-- Indexes for table `boss_resume`
--
ALTER TABLE `boss_resume`
  ADD PRIMARY KEY (`candId`);

--
-- Indexes for table `boss_user`
--
ALTER TABLE `boss_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boss_workcategory`
--
ALTER TABLE `boss_workcategory`
  ADD PRIMARY KEY (`workCateId`);

--
-- Indexes for table `boss_workface`
--
ALTER TABLE `boss_workface`
  ADD PRIMARY KEY (`workId`);

--
-- Indexes for table `boss_workinfo`
--
ALTER TABLE `boss_workinfo`
  ADD PRIMARY KEY (`workId`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `boss_cominfo`
--
ALTER TABLE `boss_cominfo`
  MODIFY `workComId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1409;

--
-- 使用表AUTO_INCREMENT `boss_offer`
--
ALTER TABLE `boss_offer`
  MODIFY `workOfferId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10003;

--
-- 使用表AUTO_INCREMENT `boss_resume`
--
ALTER TABLE `boss_resume`
  MODIFY `candId` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10004;

--
-- 使用表AUTO_INCREMENT `boss_user`
--
ALTER TABLE `boss_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10002;

--
-- 使用表AUTO_INCREMENT `boss_workface`
--
ALTER TABLE `boss_workface`
  MODIFY `workId` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;

--
-- 使用表AUTO_INCREMENT `boss_workinfo`
--
ALTER TABLE `boss_workinfo`
  MODIFY `workId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10005;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
