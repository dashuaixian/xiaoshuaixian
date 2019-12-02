-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2019-07-08 09:25:27
-- 服务器版本： 10.1.37-MariaDB
-- PHP 版本： 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `scores_database`
--
CREATE DATABASE IF NOT EXISTS `scores_database` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `scores_database`;

-- --------------------------------------------------------

--
-- 表的结构 `admin`
--

CREATE TABLE `admin` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'password');

-- --------------------------------------------------------

--
-- 表的结构 `scores`
--

CREATE TABLE `scores` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `student_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `YU` float DEFAULT NULL,
  `SHU` float DEFAULT NULL,
  `WAI` float DEFAULT NULL,
  `ZHENG` float DEFAULT NULL,
  `SHI` float DEFAULT NULL,
  `DI` float DEFAULT NULL,
  `WU` float DEFAULT NULL,
  `HUA` float DEFAULT NULL,
  `SHENG` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 转存表中的数据 `scores`
--

INSERT INTO `scores` (`id`, `name`, `student_id`, `YU`, `SHU`, `WAI`, `ZHENG`, `SHI`, `DI`, `WU`, `HUA`, `SHENG`) VALUES
(1, '张同学', '1001', 58.5, 63.5, 50, 51, 70, 54, 55, 73, 59),
(2, '高同学', '1002', 66, 86, 81.5, 60, 61, 70, 79, 84, 71),
(3, '刘同学', '1003', 90, 53.5, 63.5, 68, 72, 77, 97, 60, 98),
(4, '汪同学', '1004', 78, 84.5, 80, 80, 92.5, 79, 79.5, 87, 69),
(5, '吴同学', '1005', 60, 60, 76.5, 62, 66, 81, 68, 57, 83),
(6, '樊同学', '1006', 54, 60.5, 67.5, 59, 51, 82.5, 93.5, 62, 58),
(7, '严同学', '1007', 95, 95, 76.5, 88, 77, 88, 92, 88.5, 96),
(8, '宋同学', '1008', 78.5, 74.5, 81, 64.5, 83, 98.5, 84.5, 75, 87.5),
(9, '李同学', '1009', 94.5, 69, 92.5, 61, 66, 98, 53, 54.5, 95),
(10, '叶同学', '1010', 78, 82.5, 78.5, 55, 51.5, 80.5, 59, 54, 89.5),
(11, '谢同学', '1011', 56.5, 66.5, 74.5, 70.5, 69.5, 65.5, 72.5, 69.5, 76),
(12, '程同学', '1012', 79, 57.5, 93, 63, 88, 86, 76.5, 56.5, 92.5),
(13, '胡同学', '1013', 69, 72.5, 89, 72, 56.5, 68, 63.5, 88, 90),
(14, '杜同学', '1014', 43, 47, 56.5, 71, 68.5, 70, 61, 49.5, 48),
(15, '项同学', '1015', 94, 75.5, 96, 85.5, 83, 94, 87, 61, 88),
(16, '万同学', '1016', 78, 60, 86, 53, 79, 67, 59, 76.5, 92.5),
(17, '蔡同学', '1017', 63.5, 66.5, 83, 87, 71, 82, 82, 73, 86.5),
(18, '伍同学', '1018', 64, 61, 76, 78.5, 69, 60.5, 70, 61.5, 57),
(19, '徐同学', '1019', 97.5, 84.5, 90, 87, 64.5, 78, 74, 59, 95),
(20, '罗同学', '1020', 58.5, 95.5, 96.5, 62.5, 55, 76.5, 73.5, 98, 90.5),
(21, '金同学', '1021', 79.5, 69.5, 57, 58.5, 86.5, 53, 57, 98, 96),
(22, '陈同学', '1022', 68.5, 85, 78, 80.5, 63.5, 86, 81, 63, 61.5),
(23, '莫同学', '1023', 73, 61.5, 61, 74, 48.5, 48, 72.5, 56.5, 51),
(24, '王同学', '1024', 77, 67, 95, 80.5, 85, 75, 76, 69, 84),
(25, '贺同学', '1025', 97, 95, 64.5, 92, 74.5, 81, 97, 58.5, 83),
(26, '凌同学', '1026', 72, 72, 72, 71, 71, 71.5, 71, 65, 78),
(27, '古同学', '1027', 84.5, 68, 83, 76.5, 87, 92.5, 70, 75.5, 79.5),
(28, '倪同学', '1028', 88, 74, 67.5, 77.5, 62.5, 71, 72.5, 79.5, 79),
(29, '彭同学', '1029', 90.5, 76, 67, 52.5, 77.5, 65, 77, 66.5, 93),
(30, '董同学', '1030', 65.5, 68, 70, 75, 55.5, 73, 55, 51.5, 79),
(31, '范同学', '1031', 59, 73.5, 97.5, 72, 69, 81.5, 75.5, 57, 80.5),
(32, '梅同学', '1032', 93, 89.5, 58.5, 75, 69, 60, 52, 93.5, 53),
(33, '孟同学', '1033', 52, 66, 64, 62, 66, 66, 57, 60, 48),
(34, '葛同学', '1034', 61, 66.5, 86.5, 71.5, 59, 89, 90, 94.5, 68),
(35, '许同学', '1035', 92.5, 87.5, 92.5, 79, 91.5, 64, 92, 87.5, 61.5),
(36, '黄同学', '1036', 72, 75, 72, 79, 54, 51, 71, 54, 79),
(37, '鲁同学', '1037', 57, 66, 52.5, 79, 73, 93.5, 88, 55, 55),
(38, '赵同学', '1038', 73.5, 90.5, 79, 86, 90.5, 79, 90, 63.5, 96.5),
(39, '慈同学', '1039', 49, 57, 74.5, 64, 49.5, 68, 72.5, 66.5, 52),
(40, '何同学', '1040', 59, 58, 64.5, 56, 46, 68.5, 61.5, 58, 53);

--
-- 转储表的索引
--

--
-- 表的索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- 表的索引 `scores`
--
ALTER TABLE `scores`
  ADD PRIMARY KEY (`id`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `scores`
--
ALTER TABLE `scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
