-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2015 at 03:50 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `jobdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `account_id` int(11) NOT NULL AUTO_INCREMENT,
  `account_email` text COLLATE utf8_unicode_ci NOT NULL,
  `account_password` text COLLATE utf8_unicode_ci NOT NULL,
  `account_first_name` text COLLATE utf8_unicode_ci,
  `account_last_name` text COLLATE utf8_unicode_ci,
  `account_is_get_news` tinyint(1) NOT NULL,
  `account_map_role` int(11) NOT NULL,
  `account_is_delete` tinyint(1) NOT NULL,
  `account_is_disabled` tinyint(1) NOT NULL,
  `account_update_at` datetime NOT NULL,
  `account_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=93 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_email`, `account_password`, `account_first_name`, `account_last_name`, `account_is_get_news`, `account_map_role`, `account_is_delete`, `account_is_disabled`, `account_update_at`, `account_created_at`) VALUES
(1, 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Admin', 'Admin', 0, 1, 0, 0, '2015-08-19 00:00:00', '2015-08-18 17:14:44'),
(2, 'jobseeker@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'binhhv', '12312312', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:19:14'),
(3, 'jobseeker1@gmail.com', 'a745715b2ade66190a65e1710b7830c7', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(4, 'jobseeker2@gmail.com', 'a745715b2ade66190a65e1710b7830c7', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(5, 'jobseeker3@gmail.com', 'a745715b2ade66190a65e1710b7830c7', 'Binh', 'HV', 0, 4, 0, 1, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(6, 'jobseeker4@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(7, 'jobseeker5@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(8, 'jobseeker6@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(9, 'jobseeker7@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(10, 'jobseeker8@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(11, 'jobseeker9@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(12, 'jobseeker10@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Binh', 'HV', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(13, 'teojobseeker11@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'Ti', 'clash', 0, 4, 0, 0, '2015-08-19 00:00:00', '2015-08-19 04:50:57'),
(14, 'd', '8277e0910d750195b448797616e091ad', 'd', 'd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(15, 'ga@gmail.com', 'a745715b2ade66190a65e1710b7830c7', 'binh', 'binh', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(16, 'te', '569ef72642be0fadd711d6a468d68ee1', 'te', 'te', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(17, 'ddd@gmail.comdd', '2fab4064ea4dd866f9ffe0d8302404e8', 'dd', 'd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(18, 'te', '569ef72642be0fadd711d6a468d68ee1', 'te', 'te', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(19, 'ddádasd', '8277e0910d750195b448797616e091ad', 'đ', 'dd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(20, 'ddđ', '8277e0910d750195b448797616e091ad', 'd', 'd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(21, 'dđ', '1aabac6d068eef6a7bad3fdf50a05cc8', 'dd', 'd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(22, 'dđ', 'b5407dfd5a7d4cae26780b947dbeea92', 'đ', 'dd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(23, 'dấdasd', '523af537946b79c4f8369ed39ba78605', 'ádasdasd', 'ad', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(24, 'dddddddddddđ', 'b5407dfd5a7d4cae26780b947dbeea92', 'đ', 'dd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(25, 'đâ', 'ec32620eb35230a3d620b3af5e523b0b', 'sdasda', 'sdasd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(26, 'đâsdádasd', '8898c2fbb18cf8419e8ef3bd141b8aff', 'áda', 'sdasd', 0, 4, 0, 0, '2015-08-20 10:08:00', '2015-08-20 03:08:00'),
(27, 'binh', '0cc175b9c0f1b6a831c399e269772661', 'a', 'a', 0, 4, 0, 0, '2015-08-20 11:08:00', '2015-08-20 04:08:00'),
(28, 'eoteoteote', 'c43c23445c6b2e7248558a79457879b4', 'teoteot', 'teotete', 0, 4, 0, 0, '2015-08-20 11:08:00', '2015-08-20 04:08:00'),
(29, 'binhteo@gmail.com', '8bc5f33900a297aaff746ec84e4800f8', 'binh', 'teo', 0, 4, 0, 0, '2015-08-20 19:08:00', '2015-08-20 12:08:00'),
(30, 'asdasdasd@gmail.com', '57e4e8bdb577a38c8bd2d690cece51ed', 'adasd', 'addd', 0, 4, 0, 0, '2015-08-21 03:08:00', '2015-08-20 20:08:00'),
(31, 'teoti@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'teo', 'ti', 0, 4, 0, 0, '2015-08-21 04:08:00', '2015-08-20 21:08:00'),
(32, 'ti@gmail.com', 'a1b805084bbc53958b7ae0d8197a90ff', 'ti', 'ti', 0, 4, 0, 0, '2015-08-21 04:08:00', '2015-08-20 21:08:00'),
(33, 'ti1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'binh', 'binh', 0, 4, 0, 0, '2015-08-21 04:08:00', '2015-08-20 21:08:00'),
(34, 'teo1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'teo', 'teo', 0, 4, 0, 0, '2015-08-21 04:08:00', '2015-08-20 21:08:00'),
(35, 'gagaga@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '123123', '123123', 0, 4, 0, 0, '2015-08-21 04:08:00', '2015-08-20 21:08:00'),
(36, 'ab1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'binh', 'binh', 0, 4, 0, 0, '2015-08-21 04:08:00', '2015-08-20 21:08:00'),
(37, 'ga2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'teo teo', 'to', 0, 4, 0, 0, '2015-08-21 04:08:00', '2015-08-20 21:08:00'),
(38, 'tisida@gmail.com', 'ae3d13aae2c146d3651386db5abc0175', 'binhh', 'bibbb', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(39, 'sida@gmail.com', '98f4c06ce8d7a20f1a39a268ee51faff', 'sida', 'sida', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(40, 'ga3@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '12312', '3123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(41, 'de@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123', '123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(42, 'sida@gai.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123', '123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(43, 'h11@gmail.com', '08413b9c876b4976053e6c3300708141', 'binh', 'hoang', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(44, 'teoti@gmai.com', '8a4458a6b405df26c9a0f3887906610f', 'áda', 'sdasdasd', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(45, 'dasasdasd@ga.ca', 'f5bb0c8de146c67b44babbf4e6584cc0', '12312', '3123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(46, 'dasdasdasd@gmail.c', '4297f44b13955235245b2497399d7a93', '123', '123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(47, 'ddddd2@ga.a', 'f5bb0c8de146c67b44babbf4e6584cc0', '123', '123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(48, 'ddddda@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123', '123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(49, 'ddddd@gmail.com', '4297f44b13955235245b2497399d7a93', '123123', '123123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(50, 'dddd1111@gmail.c', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123', '123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(51, 'dadasdasd@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '12312', '3123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(52, 'dasdasdsd@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123', '123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(53, '1111@gmail.com', '101193d7181cc88340ae5b2b17bba8a1', '123123', '123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(54, '3@gmail.com', '8d4646eb2d7067126eb08adb0672f7bb', '12312', '3123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(55, 'dasdasdasd@gmail.c1', 'dcb82435c8525869fd04b7214118c3d2', '123', '12', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(56, 'daadasdasd@gmail.com', '4297f44b13955235245b2497399d7a93', '3123123', '312', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(57, 'dasdasdasd@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123', '123123', 0, 4, 0, 0, '2015-08-21 05:08:00', '2015-08-20 22:08:00'),
(58, 'k1@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123', '123123', 0, 4, 0, 0, '2015-08-21 06:08:00', '2015-08-20 23:08:00'),
(59, 'eq@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123', '123123', 0, 4, 0, 0, '2015-08-21 06:08:00', '2015-08-20 23:08:00'),
(60, 'kkk@gmail.com', '101193d7181cc88340ae5b2b17bba8a1', '123123', '123123123', 0, 4, 0, 0, '2015-08-21 06:08:00', '2015-08-20 23:08:00'),
(61, 'ddd1@gmail.com', '4297f44b13955235245b2497399d7a93', '12312', '3123123', 0, 4, 0, 0, '2015-08-21 07:08:00', '2015-08-21 00:08:00'),
(62, '5a@gmail.com', 'a87ddd71d9eef30b4136635e8b4310dd', '12312312', '123123', 0, 4, 0, 0, '2015-08-21 07:08:00', '2015-08-21 00:08:00'),
(63, 'ddddddd@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '1231', '23123123', 0, 4, 0, 0, '2015-08-21 07:08:00', '2015-08-21 00:08:00'),
(64, 'llasdaksd@gmail.com', '220466675e31b9d20c051d5e57974150', '123123', '123123', 0, 4, 0, 0, '2015-08-21 07:08:00', '2015-08-21 00:08:00'),
(65, 'gga@gmail.com', '4297f44b13955235245b2497399d7a93', '1231', '23123', 0, 4, 0, 0, '2015-08-21 07:08:00', '2015-08-21 00:08:00'),
(66, 'ready@gmail.com', '220466675e31b9d20c051d5e57974150', '2312312', '3123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(67, 'teoteo@gmail.com', '3ec59a046bf5353eae4a0ca6b1bf7989', 'teoteot', 'teotetet', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(68, 'jhjhj@mail.com', '4297f44b13955235245b2497399d7a93', '1231', '23123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(69, 'kfkfk@gmail.com', 'ab84804819501bf9a45706483321ad65', '1231', '23123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(70, 'dasdasd@gai.com', '9e5317e838cb5bd8e98a013fffc2b30e', '1231', '23123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(71, 'kkaskdkasd@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123123', '123123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(72, 'adasdasdasd1111@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '123123', '123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(73, 'asdiasdasddddddd11111@gmail.com', '101193d7181cc88340ae5b2b17bba8a1', '123123', '123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(74, '74@gmail.com', '498608403e2b2fa4344297082aa62dbf', '12312', '3123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(75, '76@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '12312', '3123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(76, 'ffasdads@gmail.com', 'cd947f19f0c166397a81ea2fe3f3eebf', 'asdas', 'dasdasd', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(77, '84848@gmail.com', '6bc9bf69eb693c93e6c31806d5471571', 'sida', 'sida', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(78, 'dasdasdasdasd111@gmail.com', '4297f44b13955235245b2497399d7a93', '123', '123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(79, 'bi@gmail.com', '93cff98a10126d606af3531935e5aab8', 'vvvvv', 'dasdas', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(80, 't111i@gmail.com', '3199403f75dfa044da345342207b5c7b', 'tititit', 'titit', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(81, 'bi23@gmail.com', '4b67b753a8e7bc07fe306ea24a0a3803', '123123', '13', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(82, 'congasida@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '13123', '1233123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(83, 'moto@gmal.com', 'ae3d13aae2c146d3651386db5abc0175', 'moto', 'môtt', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(84, 'moto1@gmail.com', '2477170743de110f8e1991602a3b9d88', '123123', '123123', 0, 4, 0, 0, '2015-08-21 08:08:00', '2015-08-21 01:08:00'),
(85, 'sidakeo@gmail.com', '08413b9c876b4976053e6c3300708141', 'binh', 'binh', 0, 4, 0, 0, '2015-08-21 09:08:00', '2015-08-21 02:08:00'),
(86, 'sidakeo2@gmail.com', 'ae3d13aae2c146d3651386db5abc0175', 'binh', 'binh', 0, 4, 0, 0, '2015-08-21 09:08:00', '2015-08-21 02:08:00'),
(87, 'sidab@gmail.com', 'ae3d13aae2c146d3651386db5abc0175', 'binh', 'binh', 0, 4, 0, 0, '2015-08-21 09:08:00', '2015-08-21 02:08:00'),
(88, 'sidateo@gmail.com', '9ea449b299786ac7a23e8aa89fedeb07', 'sida', 'teo', 0, 4, 0, 0, '2015-08-21 09:08:00', '2015-08-21 02:08:00'),
(89, 'gaktehta@gmail.com', '45d228e98fac625cfa15583b341bf472', '123123', '123123', 0, 4, 0, 0, '2015-08-21 09:08:00', '2015-08-21 02:08:00'),
(90, 'sidakeo1@gmail.com', 'e8cf231b5fb50f47d070e49c6d43eab9', 'sídasd', 'sidasdasd', 0, 4, 0, 0, '2015-08-21 09:08:00', '2015-08-21 02:08:00'),
(91, 'user@admin.com', '08413b9c876b4976053e6c3300708141', 'user', 'user', 0, 5, 0, 0, '2015-08-21 00:00:00', '2015-08-18 10:04:20'),
(92, 'user1@gmail.com', '08413b9c876b4976053e6c3300708141', 'user1', 'user1', 0, 5, 0, 0, '0000-00-00 00:00:00', '2015-08-21 13:38:40');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `cont_id` int(11) NOT NULL AUTO_INCREMENT,
  `cont_name` text COLLATE utf8_unicode_ci NOT NULL,
  `cont_email` text COLLATE utf8_unicode_ci NOT NULL,
  `cont_subject` text COLLATE utf8_unicode_ci NOT NULL,
  `cont_message` text COLLATE utf8_unicode_ci NOT NULL,
  `cont_is_view` tinyint(1) NOT NULL DEFAULT '0',
  `cont_is_delete` tinyint(1) DEFAULT '0',
  `cont_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cont_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=55 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`cont_id`, `cont_name`, `cont_email`, `cont_subject`, `cont_message`, `cont_is_view`, `cont_is_delete`, `cont_created_at`) VALUES
(1, 'a', 'b', 'c', 'd', 0, 0, '2015-08-15 17:00:00'),
(2, 'BINHHV GROUP COMPANY', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(3, 'BINHHV GROUP COMPANY', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(4, 'b', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(5, 'n', 'n@gmail.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(6, 'b', 'binhhv.admin.university@gmail.com', 'binh', 'b', 0, 0, '2015-08-15 17:00:00'),
(7, 'dsdasd', 'binhhv@live.com', 'dd', 'dd', 0, 0, '2015-08-15 17:00:00'),
(8, 'bbbbb', 'binhhv.coordinator@gmail.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(9, 'dad', 'binhhv.admin.university@gmail.com', 'd', 'd', 0, 0, '2015-08-15 17:00:00'),
(10, 'dd', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(11, 'dd', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(12, 'd', 'binhhv@live.com', 'd', 'd', 0, 0, '2015-08-15 17:00:00'),
(13, 'dd', 'binhhv@live.com', 'd', 'd', 0, 0, '2015-08-15 17:00:00'),
(14, 'd1', 'binhhv@live.com', 'd1', 'd1', 0, 0, '2015-08-15 17:00:00'),
(15, 'd2', 'binhhv@live.com', 'd2', 'd2', 0, 0, '2015-08-15 17:00:00'),
(16, 'b1', 'binhhv.admin.university@gmail.com', 'b1', 'b1', 0, 0, '2015-08-15 17:00:00'),
(17, 'b2', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(18, 'd2222', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(19, 'binh', 'binhhv@live.com', '1', '1', 0, 0, '2015-08-15 17:00:00'),
(20, '1', 'binhhv@live.com', '1', '1', 0, 0, '2015-08-15 17:00:00'),
(21, 'dddd', 'binhhv@live.com', 'bbbbbbb', 'bbbbbbbbbbbbbbbbbbbbb', 0, 0, '2015-08-15 17:00:00'),
(22, 'bbbbbbbbbbbbb11', 'binhhv.student@gmail.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(23, 'B5', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-15 17:00:00'),
(24, 'b7', 'hvbinh1990@gmail.com', '1', '1', 0, 0, '2015-08-15 17:00:00'),
(25, 'binh contact', 'binhhv@live.com', 'binh contact', 'binh', 0, 0, '2015-08-16 17:00:00'),
(26, 'BINHHV GROUP COMPANY', 'binhhv@live.com', 'b1', 'b22', 0, 0, '2015-08-16 17:00:00'),
(27, 'BINHHV GROUP COMPANY1', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-16 17:00:00'),
(28, 't', 'binhhv@live.com', 't', 't', 0, 0, '2015-08-16 17:00:00'),
(29, 'BINHHV GROUP COMPANY222', 'binhhv@live.com', '1', '1', 0, 0, '2015-08-16 17:00:00'),
(30, 'bbbbbbbbbbbbbbbb', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-16 17:00:00'),
(31, 't', 'tech3info@gmail.com', 't', 't', 0, 0, '2015-08-16 17:00:00'),
(32, 'tt', 'binhhv@live.com', 't', 't', 0, 0, '2015-08-16 17:00:00'),
(33, 't', 'tech3in@live.com', 't', 't', 0, 0, '2015-08-16 17:00:00'),
(34, 'd2', 'binhhv.admin.university@gmail.com', 'd2d', 'd', 0, 0, '2015-08-16 17:00:00'),
(35, 'BINHHV GROUP COMPANY', 'binhhv@live.com', 'dddd', 'đ', 0, 0, '2015-08-16 17:00:00'),
(36, 'd', 'binhhv@live.com', 'd', 'd', 0, 0, '2015-08-16 17:00:00'),
(37, 'b', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-16 17:00:00'),
(38, 'đâsđá', 'binhhv@live.com', 'dđ', 'dđ', 0, 0, '2015-08-16 17:00:00'),
(39, 'dđdđ', 'binhhv@live.com', 't', 't', 0, 0, '2015-08-16 17:00:00'),
(40, 'ttt', 'tech3in@live.com', 't', 't', 0, 0, '2015-08-16 17:00:00'),
(41, 'ddd', 'binhhv@live.com', 'd', 'd', 0, 0, '2015-08-16 17:00:00'),
(42, 'f', 'binhhv.admin.university@gmail.com', 'd', 'd', 0, 0, '2015-08-16 17:00:00'),
(43, 'đ', 'binhhv@live.com', 'ddd', 'dd', 0, 0, '2015-08-16 17:00:00'),
(44, 'ddd', 'binhhv@live.com', 'd', 'd', 0, 0, '2015-08-16 17:00:00'),
(45, 't', 'binhhv@live.com', 'd', 'd', 0, 0, '2015-08-16 17:00:00'),
(46, 'ddd', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-16 17:00:00'),
(47, 'ddd', 'binhhv@live.com', 'b', 'b', 0, 0, '2015-08-16 17:00:00'),
(48, 'dddd', 'binhhv@live.com', 'd2d', 'd', 0, 0, '2015-08-16 17:00:00'),
(49, 'ddd', 'binhhv@live.com', 'd', 'd', 0, 0, '2015-08-16 17:00:00'),
(50, 'ddd', 'binhhv.admin.university@gmail.com', 'd', 'd', 0, 0, '2015-08-16 17:00:00'),
(51, 'ddd', 'binhhv@live.com', 'dddd', 'd', 0, 0, '2015-08-16 17:00:00'),
(52, 'dd', 'binhhv@live.com', 'd2', 'd', 0, 0, '2015-08-16 17:00:00'),
(53, 'bbbbbbbbbbbbbbbb', 'binhhv@live.com', 'bbb', 'bbb', 0, 0, '2015-08-17 17:00:00'),
(54, 'dasd', 'dasdas@gmail.com', 'asd', 'asdasd', 0, 0, '2015-08-20 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `country_name` text COLLATE utf8_unicode_ci NOT NULL,
  `country_is_delete` tinyint(1) NOT NULL,
  `country_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `document_cv`
--

CREATE TABLE IF NOT EXISTS `document_cv` (
  `doccv_id` int(11) NOT NULL AUTO_INCREMENT,
  `doccv_map_user` int(11) NOT NULL,
  `doccv_file_tmp` text COLLATE utf8_unicode_ci NOT NULL,
  `doccv_file_name` text COLLATE utf8_unicode_ci NOT NULL,
  `doccv_is_delete` tinyint(1) NOT NULL,
  `doccv_update_at` datetime NOT NULL,
  `doccv_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`doccv_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `document_cv`
--

INSERT INTO `document_cv` (`doccv_id`, `doccv_map_user`, `doccv_file_tmp`, `doccv_file_name`, `doccv_is_delete`, `doccv_update_at`, `doccv_created_at`) VALUES
(1, 2, 'sdadad%sdasd.doc', 'cvbinh.doc', 0, '2015-08-20 00:00:00', '2015-08-20 02:28:43'),
(2, 2, 'sdadad%sdasdddassssd.doc', 'cvbinh1.doc', 0, '2015-08-20 00:00:00', '2015-08-20 02:28:55');

-- --------------------------------------------------------

--
-- Table structure for table `document_online`
--

CREATE TABLE IF NOT EXISTS `document_online` (
  `docon_id` int(11) NOT NULL AUTO_INCREMENT,
  `docon_map_user` int(11) NOT NULL,
  `docon_birthday` datetime NOT NULL,
  `docon_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_career` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_degree` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_education` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_address` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_experience` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_skill` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_healthy` int(11) NOT NULL,
  `docon_reason_apply` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_salary` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_advance` text COLLATE utf8_unicode_ci NOT NULL,
  `docon_is_delete` tinyint(1) NOT NULL,
  `docon_update_at` datetime NOT NULL,
  `docon_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`docon_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `document_online`
--

INSERT INTO `document_online` (`docon_id`, `docon_map_user`, `docon_birthday`, `docon_phone`, `docon_career`, `docon_degree`, `docon_education`, `docon_address`, `docon_experience`, `docon_skill`, `docon_healthy`, `docon_reason_apply`, `docon_salary`, `docon_advance`, `docon_is_delete`, `docon_update_at`, `docon_created_at`) VALUES
(1, 2, '2015-08-20 00:00:00', '01696958419', 'IT', 'bachelor', 'hcmus', 'ho chi minh', '2 năm kinh nghiệm.', 'php,html', 0, 'muốn được phát triển bản thân.', '20000$', '', 0, '2015-08-20 00:00:00', '2015-08-20 03:03:30');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE IF NOT EXISTS `employer` (
  `employer_id` int(11) NOT NULL AUTO_INCREMENT,
  `employer_map_account` int(11) NOT NULL,
  `employer_name` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_address` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_map_province` int(11) NOT NULL,
  `employer_size` int(11) NOT NULL,
  `employer_about` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_fax` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_website` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_name` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_email` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_contact_mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_logo` text COLLATE utf8_unicode_ci NOT NULL,
  `employer_logo_tmp` int(11) NOT NULL,
  `employer_is_delete` tinyint(1) NOT NULL,
  `employer_update_at` datetime NOT NULL,
  `employer_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `employer_map_account`, `employer_name`, `employer_address`, `employer_phone`, `employer_map_province`, `employer_size`, `employer_about`, `employer_fax`, `employer_website`, `employer_contact_name`, `employer_contact_email`, `employer_contact_phone`, `employer_contact_mobile`, `employer_logo`, `employer_logo_tmp`, `employer_is_delete`, `employer_update_at`, `employer_created_at`) VALUES
(1, 1, 'binhhv group', 'ho chi minh', '01696958419', 0, 50, 'it company.', '01696958419', 'binhhv.com', 'binh hoang van', 'binhhv@live.com', '01696958419', '01696958419', '', 0, 0, '2015-08-20 00:00:00', '2015-08-20 04:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `employer_map_account`
--

CREATE TABLE IF NOT EXISTS `employer_map_account` (
  `emac_id` int(11) NOT NULL AUTO_INCREMENT,
  `emac_map_account` int(11) NOT NULL,
  `emac_map_employer` int(11) NOT NULL,
  `emac_is_delete` tinyint(1) NOT NULL,
  `emac_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`emac_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_contact_form`
--

CREATE TABLE IF NOT EXISTS `job_contact_form` (
  `jcform_id` int(11) NOT NULL AUTO_INCREMENT,
  `jcform_type` text COLLATE utf8_unicode_ci NOT NULL,
  `jcform_is_delete` tinyint(1) NOT NULL,
  `jcform_update_at` datetime NOT NULL,
  `jcform_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`jcform_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_form`
--

CREATE TABLE IF NOT EXISTS `job_form` (
  `fjob_id` int(11) NOT NULL AUTO_INCREMENT,
  `fjob_type` text COLLATE utf8_unicode_ci NOT NULL,
  `fjob_is_delete` tinyint(1) NOT NULL,
  `fjob_update_at` datetime NOT NULL,
  `fjob_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`fjob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `job_level`
--

CREATE TABLE IF NOT EXISTS `job_level` (
  `ljob_id` int(11) NOT NULL AUTO_INCREMENT,
  `ljob_level` text COLLATE utf8_unicode_ci NOT NULL,
  `ljob_is_delete` tinyint(1) NOT NULL,
  `ljob_update_at` datetime NOT NULL,
  `ljob_create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ljob_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_config`
--

CREATE TABLE IF NOT EXISTS `page_config` (
  `pconfig_id` int(11) NOT NULL AUTO_INCREMENT,
  `pconfig_attribute` text COLLATE utf8_unicode_ci NOT NULL,
  `pconfig_is_disabled` tinyint(1) NOT NULL,
  `pconfig_is_delete` tinyint(1) NOT NULL,
  `pconfig_update_at` datetime NOT NULL,
  `pconfig_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`pconfig_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `page_config_data`
--

CREATE TABLE IF NOT EXISTS `page_config_data` (
  `pconfigd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pconfigd_map_pconfig` int(11) NOT NULL,
  `pconfigd_data` text COLLATE utf8_unicode_ci NOT NULL,
  `pconfigd_is_disabled` tinyint(1) NOT NULL,
  `pconfigd_is_delete` tinyint(1) NOT NULL,
  `pconfigd_update_at` datetime NOT NULL,
  `pconfigd_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`pconfigd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE IF NOT EXISTS `province` (
  `province_id` int(11) NOT NULL AUTO_INCREMENT,
  `province_name` text COLLATE utf8_unicode_ci NOT NULL,
  `province_map_region` int(11) NOT NULL,
  `province_is_delete` tinyint(1) NOT NULL,
  `province_update_at` datetime NOT NULL,
  `province_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`province_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `recruitment`
--

CREATE TABLE IF NOT EXISTS `recruitment` (
  `rec_id` int(11) NOT NULL AUTO_INCREMENT,
  `rec_title` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_salary` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_job_content` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_job_time` datetime NOT NULL,
  `rec_job_regimen` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_job_require` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_job_priority` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_job_map_form` int(11) NOT NULL,
  `rec_job_map_level` int(11) NOT NULL,
  `rec_job_map_country` int(11) NOT NULL,
  `rec_contact_name` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_contact_email` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_contact_address` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_contact_phone` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_contact_mobile` text COLLATE utf8_unicode_ci NOT NULL,
  `rec_contact_form` int(11) NOT NULL,
  `rec_map_employer` int(11) NOT NULL,
  `rec_map_user_employer` int(11) NOT NULL,
  `rec_is_approve` tinyint(1) NOT NULL,
  `rec_is_delete` tinyint(1) NOT NULL,
  `rec_is_disabled` tinyint(1) NOT NULL,
  `rec_update_at` datetime NOT NULL,
  `rec_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `recruitment`
--

INSERT INTO `recruitment` (`rec_id`, `rec_title`, `rec_salary`, `rec_job_content`, `rec_job_time`, `rec_job_regimen`, `rec_job_require`, `rec_job_priority`, `rec_job_map_form`, `rec_job_map_level`, `rec_job_map_country`, `rec_contact_name`, `rec_contact_email`, `rec_contact_address`, `rec_contact_phone`, `rec_contact_mobile`, `rec_contact_form`, `rec_map_employer`, `rec_map_user_employer`, `rec_is_approve`, `rec_is_delete`, `rec_is_disabled`, `rec_update_at`, `rec_created_at`) VALUES
(1, 'web developer', '500$', 'web php and design html', '2015-08-29 00:00:00', 'di du lich', 'php  > 5.\r\nframework codeigniter.', 'uu tien biet android.', 0, 0, 0, 'binhhv', 'binhhv@live.com', 'ho chi minh', '01696958419', '01696958419', 0, 1, 1, 1, 0, 0, '2015-08-20 00:00:00', '2015-08-20 04:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_apply`
--

CREATE TABLE IF NOT EXISTS `recruitment_apply` (
  `recapp_id` int(11) NOT NULL AUTO_INCREMENT,
  `recapp_map_recruitment` int(11) NOT NULL,
  `recapp_map_user` int(11) NOT NULL,
  `recapp_doc_type` int(11) NOT NULL,
  `recapp_map_doc` int(11) NOT NULL,
  `recapp_is_delete` tinyint(1) NOT NULL,
  `recapp_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`recapp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `recruitment_apply`
--

INSERT INTO `recruitment_apply` (`recapp_id`, `recapp_map_recruitment`, `recapp_map_user`, `recapp_doc_type`, `recapp_map_doc`, `recapp_is_delete`, `recapp_created_at`) VALUES
(1, 1, 2, 1, 1, 0, '2015-08-20 04:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `recruitment_approve`
--

CREATE TABLE IF NOT EXISTS `recruitment_approve` (
  `recapp_id` int(11) NOT NULL AUTO_INCREMENT,
  `recapp_map_account` int(11) NOT NULL,
  `recapp_map_recruitment` int(11) NOT NULL,
  `recapp_is_delete` tinyint(1) NOT NULL,
  `recapp_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`recapp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rec_map_province`
--

CREATE TABLE IF NOT EXISTS `rec_map_province` (
  `recmp_id` int(11) NOT NULL AUTO_INCREMENT,
  `recmp_map_rec` int(11) NOT NULL,
  `recmp_map_province` int(11) NOT NULL,
  `recmp_is_delete` tinyint(1) NOT NULL,
  `recmp_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`recmp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rec_map_welfare`
--

CREATE TABLE IF NOT EXISTS `rec_map_welfare` (
  `recmj_id` int(11) NOT NULL AUTO_INCREMENT,
  `recmj_map_rec` int(11) NOT NULL,
  `recmj_map_welfare` int(11) NOT NULL,
  `recmj_is_delete` tinyint(1) NOT NULL,
  `recmj_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`recmj_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE IF NOT EXISTS `region` (
  `region_id` int(11) NOT NULL AUTO_INCREMENT,
  `region_name` text COLLATE utf8_unicode_ci NOT NULL,
  `region_map_country` int(11) NOT NULL,
  `region_is_delete` tinyint(1) NOT NULL,
  `region_update_at` datetime NOT NULL,
  `region_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` text COLLATE utf8_unicode_ci NOT NULL,
  `role_is_delete` tinyint(1) NOT NULL,
  `role_update_at` datetime NOT NULL,
  `role_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_is_delete`, `role_update_at`, `role_created_at`) VALUES
(1, 'admin', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00'),
(2, 'employer_admin', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00'),
(3, 'employer_user', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00'),
(4, 'jobseeker', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00'),
(5, 'admin_user', 0, '2015-08-21 00:00:00', '2015-08-21 09:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE IF NOT EXISTS `welfare` (
  `welfare_id` int(11) NOT NULL AUTO_INCREMENT,
  `welfare_title` text COLLATE utf8_unicode_ci NOT NULL,
  `welfare_icon` text COLLATE utf8_unicode_ci NOT NULL,
  `welfare_is_delete` tinyint(1) NOT NULL,
  `welfare_update_at` datetime NOT NULL,
  `welfare_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`welfare_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
