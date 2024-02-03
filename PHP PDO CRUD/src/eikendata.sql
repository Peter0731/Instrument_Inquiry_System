-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： localhost
-- 產生時間： 2024 年 02 月 03 日 15:19
-- 伺服器版本： 10.11.2-MariaDB
-- PHP 版本： 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `eikendata`
--

-- --------------------------------------------------------

--
-- 資料表結構 `eikentable`
--

CREATE TABLE `eikentable` (
  `Id` int(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `time` date DEFAULT NULL,
  `sn` varchar(100) NOT NULL,
  `remarks` varchar(500) DEFAULT NULL,
  `UserID` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 傾印資料表的資料 `eikentable`
--

INSERT INTO `eikentable` (`Id`, `name`, `ins`, `time`, `sn`, `remarks`, `UserID`) VALUES
(1, '長庚醫院高雄院區', 'PLEDIA', '2015-10-06', 'N00173', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(2, '聯合醫事檢驗所', 'PLEDIA', '2016-01-11', 'N00174', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(3, '南海醫事檢驗所', 'PLEDIA', '2015-12-14', 'N00178', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(4, '新隆醫事檢驗所', 'PLEDIA', '2018-12-14', 'N00179', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(5, '聯合醫院仁愛院區', 'PLEDIA', '2015-11-25', 'N00273', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(6, '衛生福利部台中醫院', 'PLEDIA', '2016-03-31', 'N00312', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(7, '杏仁診所', 'PLEDIA', '2019-06-04', 'N00313', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(8, '耕莘醫院新店院區', 'PLEDIA', '2016-09-02', 'N00318', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(9, '耕莘醫院永和院區', 'PLEDIA', '2016-09-22', 'N00321', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(10, '慈濟醫院台北院區', 'PLEDIA', '2017-08-16', 'N00375', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(11, '慈濟醫院大林院區', 'PLEDIA', '2017-08-28', 'N00576', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(12, '天主教聖功醫院', 'PLEDIA', '2018-04-24', 'N00655', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(13, '中一醫事檢驗所', 'PLEDIA', '2019-07-02', 'N00703', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(14, '立人醫事檢驗所', 'PLEDIA', '2018-09-27', 'N00733', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(15, '台大醫院台北總院', 'PLEDIA', '2019-04-12', 'N00875', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(16, '高雄市立小港醫院', 'PLEDIA', '2019-04-23', 'N00888', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(17, '阮綜合醫院', 'PLEDIA', '2019-04-24', 'N00889', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(18, '長庚醫院林口院區', 'PLEDIA', '2019-04-26', 'N00891', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(19, '義大醫院', 'PLEDIA', '2020-07-02', 'N01042', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(20, '亞東醫事檢驗所(中壢)', 'PLEDIA', '2020-10-29', 'N01041', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(21, '台中榮民總醫院', 'io', '2014-12-04', '10CE0101', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(22, '聯合醫事檢驗所(新竹)', 'io', '2014-09-23', '10CE0102', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(23, '聯興醫事檢驗所', 'io', '2018-08-21', '11CE0179', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(24, '新樓醫院', 'io', '2014-01-07', '11CE0193', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(25, '聯明醫事檢驗所', 'io', '2013-10-14', '11CE0194', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(26, '聯合醫事檢驗所', 'io', '2013-08-12', '11CE0195', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(27, '台北國泰醫院', 'io', '2013-03-25', '11CE0196', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(28, '長庚醫院桃園院區', 'io', '2013-08-06', '11CE0197', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(30, '中一醫事檢驗所(新竹)', 'io', '2019-10-03', '12CE0217', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(31, '中山醫學大學附設醫院', 'io', '2014-08-05', '12CE0218', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(32, '和泰醫事檢驗所', 'io', '2014-05-05', '12CE0219', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(33, '長庚醫院情人湖院區', 'io', '2014-11-06', '12CE0228', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(35, '高雄市立聯合醫院', 'io', '2015-10-27', '12CE0242', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(36, '國軍松山醫院(醫信)', 'io', '2015-09-17', '15CE0583', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(37, '高雄市立民生醫院', 'io', '2015-11-25', '15CE0619', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(38, '台大醫院北護分院', 'io', '2019-08-20', '15CE0620', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(39, '門諾醫院', 'io', '2020-02-18', '19CE1151', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(40, '長庚醫院雲林院區', 'io', '2020-04-17', '16CE0689', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(41, '台大醫院竹東分院', 'io', '2019-05-15', '16CE0690', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(42, '立人醫事檢驗所(邱內科)', 'io', '2016-06-01', '16CE0691', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(43, '屏東基督教醫院(廣林)', 'io', '2016-08-23', '16CE0700', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(44, '三軍總醫院(瀚揚)', 'io', '2016-11-28', '16CE0722', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(45, '慶昇醫院', 'io', '2017-03-13', '16CE0805', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(46, '慈濟醫院花蓮總院', 'io', '2017-08-23', '17CE0856', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(47, '慈濟醫院台中院區', 'io', '2017-08-28', '17CE0857', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(48, '國軍左營醫院(高雄瀚揚)', 'io', '2017-09-18', '17CE0860', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(49, '晨悅診所(鴻揚鈺)', 'io', '2019-01-24', '18CE1017', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(50, '台大醫院雲林分院', 'io', '2019-04-16', '18CE1029', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(51, '長庚醫院鳳山院區', 'io', '2019-04-23', '18CE1036', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(52, '台大醫院新竹分院', 'io', '2019-04-25', '18CE1039', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(53, '國軍桃園醫院(瀚揚)', 'io', '2019-09-18', '18CE1114', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(54, '聖馬爾定醫院', 'io', '2020-02-24', '19CE1147', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(55, '長庚醫院土城院區', 'io', '2020-03-10', '19CE1152', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(56, '桃園優品', 'io', '2020-05-14', '19CE1143', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(57, '日月光診所(達騰科技)', 'io', '2020-06-17', '18CE1063', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(58, '高雄優品(慈惠診所)', 'io', '2020-05-28', '19CE1159', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(59, '慶和醫事檢驗所', 'io', '2020-05-29', '19CE1160', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(60, '亞東醫事檢驗所(新莊)', 'io', '2020-03-31', '19CE1153', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(61, '國軍高雄總醫院(醫信)', 'io', '2020-07-09', '20CE1285', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(62, '長庚醫院台北院區', 'io', '2020-09-02', '19CE1166', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(63, '雨聲醫院(微創)', 'io', '2020-08-11', '19CE1215', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(64, '羅東博愛醫院', 'io', '2020-09-16', '19CE1230', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(65, '杏聯醫事檢驗所', 'DIANA', '2019-07-12', 'N00120', 'Washing Unit Tubing x7 (02/04/2021)', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(66, '亞東醫事檢驗所(中壢)', 'DIANA', '2014-03-26', 'N00132', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(67, '尚捷醫事檢驗所', 'DIANA', '2016-03-02', 'N00354', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(70, '童綜合醫院', 'DIANA', '2015-08-18', 'N00413', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(71, '健詮醫事檢驗所', 'DIANA', '2019-01-14', 'N00414', 'Washing Unit Tubing x7 (02/04/2021)', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(72, '台安醫院', 'DIANA', '2013-05-20', 'N00415', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(73, '登全醫事檢驗所', 'DIANA', '2016-03-02', 'N00425', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(74, '東林醫事檢驗所', 'DIANA', '2018-12-18', 'N00670', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(75, '長庚醫院嘉義院區', 'DIANA', '2016-09-07', 'N00737', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(76, '義大醫院', 'DIANA', '2014-05-23', 'N00874', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(77, '雙和醫院', 'DIANA', '2014-06-20', 'N00875', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(78, '新國泰醫事檢驗所', 'MICRO', '0000-00-00', '03CE042', '時間不詳', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(79, '陽明醫院', 'MICRO', '2013-03-11', '06CE278', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(80, '潮州醫事檢驗所', 'MICRO', '2016-05-09', '08CE364', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(81, '寶建醫院(佳泓)', 'MICRO', '2010-12-13', '10CE430', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(82, '晰霸醫事檢驗所', 'MICRO', '2011-08-09', '10CE453', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(83, '苗栗中油診所(瀚揚)', 'MICRO', '2012-02-07', '11CE479', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(84, '中山醫事檢驗所', 'MICRO', '2012-04-24', '11CE480', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(85, '忠華醫事檢驗所(台中)', 'MICRO', '2012-04-25', '11CE481', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(86, '中台醫事檢驗所', 'MICRO', '2013-08-26', '4601', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(87, '恩樺醫院', 'MICRO', '2016-03-14', '29804', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(88, '向陽醫事檢驗所', 'MICRO', '2016-01-21', '04TA010', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(89, '健詮醫事檢驗所', 'MICRO', '2009-02-02', '04TA008', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(90, '建佑醫院', 'MICRO', '2017-03-27', '08CH027', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(91, '台中仁愛醫院', 'MICRO', '2014-05-09', '08CH028', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(92, '宇辰診所', 'MICRO', '2018-10-16', '08CH029', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(93, '亞東醫事檢驗所(中壢)', 'MICRO', '2010-02-11', '08CH031', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(94, '展望醫事檢驗所', 'MICRO', '2010-02-23', '08CH032', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(95, '嘉義基督教醫院', 'MICRO', '2010-02-25', '08CH033', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(96, '衛生福利部台東醫院', 'MICRO', '2010-02-01', '08CH034', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(97, '大華醫事檢驗所', 'MICRO', '2010-04-06', '08CH036', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(98, '景美醫院', 'MICRO', '2010-03-06', '08CH038', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(99, '台東基督教醫院', 'MICRO', '2010-03-08', '08CH040', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(100, '劍橋醫事檢驗所(新竹)', 'MICRO', '2010-03-29', '08CH042', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(101, '汐止國泰醫院', 'MICRO', '2010-04-30', '08CH046', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(102, '好心肝診所', 'MICRO', '2014-04-15', '08CH048', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda'),
(103, '花蓮聯合檢驗所', 'MICRO', '2013-08-26', '08CH050', '', 'ad81fbbb-25c0-11ed-9ab6-4074e0b14fda');

-- --------------------------------------------------------

--
-- 資料表結構 `roles`
--

CREATE TABLE `roles` (
  `RoleID` int(3) NOT NULL,
  `RoleName` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 傾印資料表的資料 `roles`
--

INSERT INTO `roles` (`RoleID`, `RoleName`) VALUES
(1, 'Administrator'),
(2, 'User'),
(3, 'Viewer');

-- --------------------------------------------------------

--
-- 資料表結構 `users`
--

CREATE TABLE `users` (
  `UserID` varchar(50) NOT NULL,
  `Account` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 傾印資料表的資料 `users`
--

INSERT INTO `users` (`UserID`, `Account`, `Password`) VALUES
('571558a2-35b6-11ed-95ae-4074e0b14fda', 'spiritqueen', 'e10adc3949ba59abbe56e057f20f883e'),
('6adbd7d2-35b6-11ed-95ae-4074e0b14fda', 'Viewer', 'e10adc3949ba59abbe56e057f20f883e'),
('ad81fbbb-25c0-11ed-9ab6-4074e0b14fda', 'admin', '5f4dcc3b5aa765d61d8327deb882cf99');

-- --------------------------------------------------------

--
-- 資料表結構 `usersrole`
--

CREATE TABLE `usersrole` (
  `UserID` varchar(50) NOT NULL,
  `RoleID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- 傾印資料表的資料 `usersrole`
--

INSERT INTO `usersrole` (`UserID`, `RoleID`) VALUES
('571558a2-35b6-11ed-95ae-4074e0b14fda', 2),
('6adbd7d2-35b6-11ed-95ae-4074e0b14fda', 3),
('ad81fbbb-25c0-11ed-9ab6-4074e0b14fda', 1);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `eikentable`
--
ALTER TABLE `eikentable`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Test` (`UserID`);

--
-- 資料表索引 `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- 資料表索引 `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`);

--
-- 資料表索引 `usersrole`
--
ALTER TABLE `usersrole`
  ADD PRIMARY KEY (`UserID`,`RoleID`),
  ADD KEY `fk_RoleID` (`RoleID`),
  ADD KEY `fk_UserID` (`UserID`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `eikentable`
--
ALTER TABLE `eikentable`
  MODIFY `Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `roles`
--
ALTER TABLE `roles`
  MODIFY `RoleID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `eikentable`
--
ALTER TABLE `eikentable`
  ADD CONSTRAINT `Test` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- 資料表的限制式 `usersrole`
--
ALTER TABLE `usersrole`
  ADD CONSTRAINT `fk_RoleID` FOREIGN KEY (`RoleID`) REFERENCES `roles` (`RoleID`),
  ADD CONSTRAINT `fk_UserID` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
