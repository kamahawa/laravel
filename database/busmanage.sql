-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2016 at 08:30 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `busmanage`
--

-- --------------------------------------------------------

--
-- Table structure for table `act_confirmpickups`
--

CREATE TABLE IF NOT EXISTS `act_confirmpickups` (
  `ConfirmPickupID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `StudentID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `GroupID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PickUp` tinyint(1) NOT NULL,
  `TakeHome` tinyint(1) NOT NULL,
  `ConfirmPickupDate` datetime NOT NULL,
  `CreateUser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CreateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UpdateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ConfirmPickupID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `act_confirmpickups`
--

INSERT INTO `act_confirmpickups` (`ConfirmPickupID`, `StudentID`, `GroupID`, `PickUp`, `TakeHome`, `ConfirmPickupDate`, `CreateUser`, `CreateDate`, `UpdateDate`, `Delete`) VALUES
('201512040004', '201512040004', '0', 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, 0),
('201511300003', '201511300003', '2', 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, 0),
('201511300002', '201511300002', '0', 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, 0),
('201511300001', '201511300001', '3', 0, 0, '0000-00-00 00:00:00', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `act_routepoints`
--

CREATE TABLE IF NOT EXISTS `act_routepoints` (
  `PointID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `RouteID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `CreateUser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CreateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UpdateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PointID`,`RouteID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `act_routepoints`
--

INSERT INTO `act_routepoints` (`PointID`, `RouteID`, `CreateUser`, `CreateDate`, `UpdateDate`, `Delete`) VALUES
('2', '2', NULL, NULL, NULL, 0),
('1', '1', NULL, NULL, NULL, 0),
('0', '0', NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `act_students`
--

CREATE TABLE IF NOT EXISTS `act_students` (
  `StudentID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `StudentName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `StudentNameKana` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `GroupID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `RouteID` varchar(30) NOT NULL,
  `Address` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `EmailGuard` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PassWord` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Latitude` decimal(10,6) NOT NULL,
  `Longitude` decimal(10,6) NOT NULL,
  `ZoomLevel` int(11) NOT NULL,
  `CreateUser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CreateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UpdateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Status` tinyint(1) DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  `hide` tinyint(1) NOT NULL,
  PRIMARY KEY (`StudentID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `act_students`
--

INSERT INTO `act_students` (`StudentID`, `StudentName`, `StudentNameKana`, `GroupID`, `RouteID`, `Address`, `EmailGuard`, `PassWord`, `Latitude`, `Longitude`, `ZoomLevel`, `CreateUser`, `CreateDate`, `UpdateDate`, `Status`, `Delete`, `hide`) VALUES
('201511300003', 'quocthao', 'dfasfs', '2', '0', 'sadfasf', 'fdsafs@gmail.com', '3c518eeb674c71b30297f072fde7eba5', '10.568166', '105.564616', 0, NULL, NULL, NULL, NULL, 0, 0),
('201511300002', 'quangtrung', 'fdsafsaf', '0', '2', 'sdfa', 'fdsafs@gmail.com', '19b0daf21b03f1eca638a683aab20200', '10.899416', '105.984611', 0, NULL, NULL, NULL, NULL, 0, 0),
('201512040004', 'quangson', 'fdsaf', '0', '0', 'fsdaf', 'dsf', 'd9729feb74992cc3482b350163a1a010', '10.616486', '105.614615', 0, NULL, NULL, NULL, NULL, 0, 0),
('201511300001', 'tulinh', 'fdsaf', '3', '2', 'fdsfsa', 'dfsafs@gmail.com', '0544ed93c22d5e1c869010c4515a7401', '10.546115', '105.894648', 0, NULL, NULL, NULL, NULL, 0, 0),
('201512240005', 'a', 'a', '2', '0', 'a', 'a@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', '10.616486', '105.564616', 0, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `act_users`
--

CREATE TABLE IF NOT EXISTS `act_users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` varchar(50) NOT NULL,
  `UserCode` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `UserName` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `UserNameKana` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UserPhoneNumber` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UserEncryptedPassword` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `MobileEmail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UserPCMail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Administrator` int(11) DEFAULT NULL,
  `ManageId` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `act_users`
--

INSERT INTO `act_users` (`ID`, `UserID`, `UserCode`, `UserName`, `UserNameKana`, `UserPhoneNumber`, `UserEncryptedPassword`, `MobileEmail`, `UserPCMail`, `Administrator`, `ManageId`, `Deleted`) VALUES
(1, '201512040002', '201512040002', 'tulinh', 'kama', 'fdsafs', 'bfe35f7014265b6e9d3b4173d36b34a7', 'fdafda', 'fdsaf', 0, '1', 0),
(2, '201510070003', '201510070003', 'quocthao', 'fdsa', 'fsaf', '4b16ceb034590d9270d7ec501de4388c', 'fsdaf', 'fdsaf', 0, '0', 0),
(3, '201512040001', '201512040001', 'quangson', 'fsadf', '123123', 'fa9ec4cc5af5d27290c4560ab4e830e8', 'dsaf', 'sdf', 0, '0', 0),
(4, '201512040000', '201512040000', 'admin', 'dafs', 'fsaf', '21232f297a57a5a743894a0e4a801fc3', 'asdf', 'fdsaf', 0, '0', 0),
(5, '201512040003', '201512040003', 'test', 'fsda', '2132131', '098f6bcd4621d373cade4e832627b4f6', 'dsafas', 'fdsafs', 0, '1', 0),
(6, '201512210004', '201512210004', 'user', 'user', '09999999999', 'ee11cbb19052e40b07aac0ca060c23ee', 'user@gmail.com', 'user@gmail.com', 0, '2', 0),
(7, '201512210005', '201512210005', 'test1', 'test1', '123123123', '5a105e8b9d40e1329780d62ea2265d8a', 'test1@gmail.com', 'test1@gmail.com', 0, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `act_vehicles`
--

CREATE TABLE IF NOT EXISTS `act_vehicles` (
  `BusID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `BusName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `DriverID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `RouteID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `CreateUser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CreateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UpdateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  `Longitude` double DEFAULT NULL,
  `Latitude` double DEFAULT NULL,
  `Zoom` double DEFAULT NULL,
  PRIMARY KEY (`BusID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `act_vehicles`
--

INSERT INTO `act_vehicles` (`BusID`, `BusName`, `DriverID`, `RouteID`, `CreateUser`, `CreateDate`, `UpdateDate`, `Status`, `Delete`, `Longitude`, `Latitude`, `Zoom`) VALUES
('BS001', 'BUS01', '201512040001', '2', 'quangson', '2015/12/09-14:51:54', '2015/12/09-14:54:19', 'BS01', 0, 106.7056297, 10.7650078, 14),
('BS002', 'BUS02', '201512040002', '1', 'quangson', '2015/12/09-14:52:20', '0', 'BS02', 0, NULL, NULL, NULL),
('BS003', 'BUS03', '201512040003', '0', 'quangson', '2015/12/09-14:52:49', '2015/12/09-14:54:43', 'BS03', 0, 106.705657, 10.7649945, 14);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE IF NOT EXISTS `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_01_20_024050_create_student_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sys_groups`
--

CREATE TABLE IF NOT EXISTS `sys_groups` (
  `GroupID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `GroupName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `GroupNameKana` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `CreateUser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CreateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UpdateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`GroupID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_groups`
--

INSERT INTO `sys_groups` (`GroupID`, `GroupName`, `GroupNameKana`, `CreateUser`, `CreateDate`, `UpdateDate`, `Delete`) VALUES
('3', 'Thao group', 'asd', 'quangson', '2015/11/27-15:34:13', '0', 1),
('2', 'Trung group', 'asd', 'quangson', '2015/11/27-15:34:02', '0', 0),
('0', 'Son group', 'asdsdf', 'quangson', '2015/11/27-15:33:54', '0', 0),
('1', 'Linh group', 'asd', 'quangson', '2015/11/27-15:33:58', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_points`
--

CREATE TABLE IF NOT EXISTS `sys_points` (
  `PointID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PointName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PointNameKana` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `CreateUser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CreateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UpdateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`PointID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_points`
--

INSERT INTO `sys_points` (`PointID`, `PointName`, `PointNameKana`, `CreateUser`, `CreateDate`, `UpdateDate`, `Delete`) VALUES
('1', 'Linh point', 'dafsda', 'quangson', '2015/11/27-17:53:30', '0', 0),
('0', 'Son point', 'asdfasdf', 'quangson', '2015/11/27-17:53:25', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sys_routes`
--

CREATE TABLE IF NOT EXISTS `sys_routes` (
  `RouteID` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `RouteName` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `RouteNameKana` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `CreateUser` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `CreateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `UpdateDate` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Delete` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`RouteID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sys_routes`
--

INSERT INTO `sys_routes` (`RouteID`, `RouteName`, `RouteNameKana`, `CreateUser`, `CreateDate`, `UpdateDate`, `Delete`) VALUES
('2', 'Route03', 'asdf', 'quangson', '2015/11/30-14:05:21', '0', 0),
('1', 'Route02', 'asdfdasf', 'quangson', '2015/11/30-14:05:15', '0', 0),
('0', 'Route01', 'asdfasf', 'quangson', '2015/11/30-14:05:10', '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@gmail.com', '$2y$10$JPB0n.9rYFbJFGuexUy31OUqgprj4aaV9hFqJyzZRYlDx5Ql8nTgq', 'di4C8L9FFS5G0i0EiLnujrAzMWGapexBJkmQrb7aIxjCu6STWAyY1N67VS8W', '2016-01-28 03:25:49', '2016-01-27 21:30:59'),
(2, 'test', 'test1@gmail.com', '$2y$10$WNxnHFvZwBdBFtsT2GFR0.3ymPdwAqaWYosWWHNdb/xoWTTkDYPFK', 'ukNs4A8VQqADC2yk92P13U8ug0n6Bo8Cfi6EsQYaYlRJgh5zXcTGrFezZu0p', '2016-01-27 21:27:26', '2016-01-27 21:28:22');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
