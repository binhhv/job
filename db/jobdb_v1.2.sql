-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 18, 2015 at 10:05 AM
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
  `account_updated_at` datetime NOT NULL,
  `account_created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=53 ;

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
(52, 'dd', 'binhhv@live.com', 'd2', 'd', 0, 0, '2015-08-16 17:00:00');

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
  `docon_updated_at` datetime NOT NULL,
  `doccv_is_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`doccv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `docon_updated_at` datetime NOT NULL,
  `docon_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`docon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `employer_is_delete` tinyint(1) NOT NULL,
  `employer_updated_at` datetime NOT NULL,
  `employer_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`employer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `jcform_updated_at` datetime NOT NULL,
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
  `fjob_updated_at` datetime NOT NULL,
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
  `ljob_updated_at` datetime NOT NULL,
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
  `pconfig_updated_at` datetime NOT NULL,
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
  `pconfigd_updated_at` datetime NOT NULL,
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
  `province_updated_at` datetime NOT NULL,
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
  `rec_updated_at` datetime NOT NULL,
  `rec_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`rec_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

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
  `region_updated_at` datetime NOT NULL,
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
  `role_updated_at` datetime NOT NULL,
  `role_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_is_delete`, `role_updated_at`, `role_created_at`) VALUES
(1, 'admin', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00'),
(2, 'employer_admin', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00'),
(3, 'employer_user', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00'),
(4, 'user', 0, '0000-00-00 00:00:00', '2015-08-16 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `welfare`
--

CREATE TABLE IF NOT EXISTS `welfare` (
  `welfare_id` int(11) NOT NULL AUTO_INCREMENT,
  `welfare_title` text COLLATE utf8_unicode_ci NOT NULL,
  `welfare_icon` text COLLATE utf8_unicode_ci NOT NULL,
  `welfare_is_delete` tinyint(1) NOT NULL,
  `welfare_updated_at` datetime NOT NULL,
  `welfare_created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`welfare_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
