-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2017-01-29 06:49:29
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `device_repair`
--
CREATE DATABASE IF NOT EXISTS `device_repair` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `device_repair`;

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `uid` int(11) NOT NULL,
  `uUsername` varchar(30) NOT NULL,
  `uPassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `admin`
--

INSERT INTO `admin` (`uid`, `uUsername`, `uPassword`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918');

-- --------------------------------------------------------

--
-- 資料表結構 `device_category`
--

CREATE TABLE `device_category` (
  `id` int(11) NOT NULL,
  `dc_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `device_name`
--

CREATE TABLE `device_name` (
  `id` int(11) NOT NULL,
  `dn_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `device_repair`
--

CREATE TABLE `device_repair` (
  `id` int(11) NOT NULL,
  `device_category` int(11) NOT NULL,
  `device_name` int(11) NOT NULL,
  `fault_category` int(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `add_datetime` datetime NOT NULL,
  `remark` mediumtext NOT NULL,
  `is_status` int(11) NOT NULL,
  `description` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `fault_category`
--

CREATE TABLE `fault_category` (
  `id` int(11) NOT NULL,
  `fc_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 資料表結構 `repair_status`
--

CREATE TABLE `repair_status` (
  `id` int(11) NOT NULL,
  `StatusName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 資料表的匯出資料 `repair_status`
--

INSERT INTO `repair_status` (`id`, `StatusName`) VALUES
(1, '已通報');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`uid`);

--
-- 資料表索引 `device_category`
--
ALTER TABLE `device_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `device_name`
--
ALTER TABLE `device_name`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `device_repair`
--
ALTER TABLE `device_repair`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `fault_category`
--
ALTER TABLE `fault_category`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `repair_status`
--
ALTER TABLE `repair_status`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `admin`
--
ALTER TABLE `admin`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- 使用資料表 AUTO_INCREMENT `device_category`
--
ALTER TABLE `device_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `device_name`
--
ALTER TABLE `device_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `device_repair`
--
ALTER TABLE `device_repair`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `fault_category`
--
ALTER TABLE `fault_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- 使用資料表 AUTO_INCREMENT `repair_status`
--
ALTER TABLE `repair_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
