-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2021 at 10:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `notemarketplace_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(191) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 'IT', 'Notes which is related to IT field', '2021-02-26 15:00:46', NULL, '2021-02-26 15:00:46', NULL, b'1'),
(2, 'Computer', 'Notes which is related to computer', '2021-02-26 15:01:27', NULL, '2021-02-26 15:01:27', NULL, b'1'),
(3, 'Science', 'Notes which is related to science and technology', '2021-02-26 15:02:02', NULL, '2021-02-26 15:02:02', NULL, b'1'),
(4, 'History', 'Notes which is related to History', '2021-02-26 15:02:34', NULL, '2021-02-26 15:02:34', NULL, b'1'),
(5, 'Account', 'Notes which is related to Accounting', '2021-02-26 15:02:58', NULL, '2021-02-26 15:02:58', NULL, b'1'),
(6, 'Mysteries Novels', '', '2021-03-26 14:40:40', NULL, '2021-03-26 14:40:40', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `configuration`
--

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL,
  `config_key` varchar(100) NOT NULL,
  `value` varchar(191) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country_code` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `country_code`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 'India', '91', '2021-03-02 00:07:35', NULL, '2021-03-02 00:07:35', NULL, b'1'),
(2, 'Australia', '61', '2021-03-02 00:09:04', NULL, '2021-03-02 00:09:04', NULL, b'1'),
(3, 'bangladesh', '880', '2021-03-02 00:09:34', NULL, '2021-03-02 00:09:34', NULL, b'1'),
(4, 'bhutan', '975', '2021-03-02 00:10:02', NULL, '2021-03-02 00:10:02', NULL, b'1'),
(5, 'canada', '1', '2021-03-02 00:10:30', NULL, '2021-03-02 00:10:30', NULL, b'1'),
(6, 'china', '86', '2021-03-02 00:10:58', NULL, '2021-03-02 00:10:58', NULL, b'1'),
(7, 'Egypt', '20', '2021-03-02 00:11:51', NULL, '2021-03-02 00:11:51', NULL, b'1'),
(8, 'germany', '49', '2021-03-02 00:12:10', NULL, '2021-03-02 00:12:10', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `download`
--

CREATE TABLE `download` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `seller` int(11) NOT NULL,
  `downloader` int(11) NOT NULL,
  `is_allowed_download` bit(1) NOT NULL,
  `attachment_path` varchar(255) DEFAULT NULL,
  `is_attachment_downloaded` bit(1) NOT NULL,
  `attachment_downloaded_date` datetime DEFAULT NULL,
  `ispaid` int(11) NOT NULL,
  `purchase_price` decimal(10,0) DEFAULT NULL,
  `note_title` varchar(100) NOT NULL,
  `note_catagory` varchar(100) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `download`
--

INSERT INTO `download` (`id`, `note_id`, `seller`, `downloader`, `is_allowed_download`, `attachment_path`, `is_attachment_downloaded`, `attachment_downloaded_date`, `ispaid`, `purchase_price`, `note_title`, `note_catagory`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 10, 4, 14, b'1', '../upload/member/4/10/attachments/15_1616753447.pdf', b'0', '2021-03-27 11:58:38', 1, '100', 'Magento', 'Computer', '2021-03-27 11:58:38', 14, '2021-03-27 11:58:38', 14),
(2, 10, 4, 14, b'1', '../upload/member/4/10/attachments/16_1616753447.pdf', b'0', '2021-03-27 11:58:38', 1, '100', 'Magento', 'Computer', '2021-03-27 11:58:38', 14, '2021-03-27 11:58:38', 14),
(3, 17, 15, 14, b'1', '../upload/member/15/17/attachments/25_1616762085.pdf', b'1', '2021-03-27 12:08:11', 0, '0', 'Machine Learning', 'IT', '2021-03-27 12:08:11', 14, '2021-03-27 12:08:11', 14),
(4, 17, 15, 14, b'1', '../upload/member/15/17/attachments/26_1616762086.pdf', b'1', '2021-03-27 12:08:11', 0, '0', 'Machine Learning', 'IT', '2021-03-27 12:08:11', 14, '2021-03-27 12:08:11', 14),
(5, 15, 15, 14, b'1', '../upload/member/15/15/attachments/23_1616761773.pdf', b'0', '2021-03-27 12:09:09', 1, '50', 'Hibernate', 'Computer', '2021-03-27 12:09:09', 14, '2021-03-27 12:09:09', 14),
(6, 12, 4, 14, b'1', '../upload/member/4/12/attachments/18_1616754080.pdf', b'1', '2021-03-27 12:10:31', 0, '0', 'Learn Hoe to make website with Wordpress', 'Science', '2021-03-27 12:10:31', 14, '2021-03-27 12:10:31', 14),
(7, 12, 4, 14, b'1', '../upload/member/4/12/attachments/19_1616754080.pdf', b'1', '2021-03-27 12:10:31', 0, '0', 'Learn Hoe to make website with Wordpress', 'Science', '2021-03-27 12:10:31', 14, '2021-03-27 12:10:31', 14),
(8, 1, 2, 14, b'0', '../upload/member/2/1/attachments/1_1616740850.pdf', b'0', '2021-03-27 12:11:22', 1, '100', 'Learn HTML from scratch', 'Computer', '2021-03-27 12:11:22', 14, '2021-03-27 12:11:22', 14),
(9, 2, 2, 14, b'1', '../upload/member/2/2/attachments/2_1616747760.pdf', b'1', '2021-03-27 12:12:18', 0, '0', 'Learn OOPS Concepts ', 'IT', '2021-03-27 12:12:18', 14, '2021-03-27 12:12:18', 14),
(10, 2, 2, 14, b'1', '../upload/member/2/2/attachments/3_1616747760.pdf', b'1', '2021-03-27 12:12:18', 0, '0', 'Learn OOPS Concepts ', 'IT', '2021-03-27 12:12:18', 14, '2021-03-27 12:12:18', 14),
(11, 7, 14, 2, b'1', '../upload/member/14/7/attachments/10_1616751366.pdf', b'1', '2021-03-27 12:18:29', 0, '0', 'SECRETS', 'Mysteries Novels', '2021-03-27 12:18:29', 2, '2021-03-27 12:18:29', 2),
(12, 7, 14, 2, b'1', '../upload/member/14/7/attachments/11_1616751366.pdf', b'1', '2021-03-27 12:18:29', 0, '0', 'SECRETS', 'Mysteries Novels', '2021-03-27 12:18:29', 2, '2021-03-27 12:18:29', 2),
(13, 5, 14, 2, b'1', '../upload/member/14/5/attachments/7_1616750361.pdf', b'0', '2021-03-27 12:19:11', 1, '30', 'River Of Souls ', 'Mysteries Novels', '2021-03-27 12:19:11', 2, '2021-03-27 12:19:11', 2),
(14, 5, 14, 2, b'1', '../upload/member/14/5/attachments/8_1616750361.pdf', b'0', '2021-03-27 12:19:11', 1, '30', 'River Of Souls ', 'Mysteries Novels', '2021-03-27 12:19:11', 2, '2021-03-27 12:19:11', 2),
(15, 11, 4, 2, b'1', '../upload/member/4/11/attachments/17_1616753825.pdf', b'0', '2021-03-27 12:19:33', 1, '79', 'Laravel', 'Computer', '2021-03-27 12:19:33', 2, '2021-03-27 12:19:33', 2),
(16, 13, 4, 2, b'1', '../upload/member/4/13/attachments/20_1616760748.pdf', b'1', '2021-03-27 12:19:53', 0, '0', 'Design website using Shopify', 'Science', '2021-03-27 12:19:53', 2, '2021-03-27 12:19:53', 2),
(17, 10, 4, 2, b'0', '../upload/member/4/10/attachments/15_1616753447.pdf', b'0', '2021-03-27 12:20:06', 1, '100', 'Magento', 'Computer', '2021-03-27 12:20:06', 2, '2021-03-27 12:20:06', 2),
(18, 10, 4, 2, b'0', '../upload/member/4/10/attachments/16_1616753447.pdf', b'0', '2021-03-27 12:20:06', 1, '100', 'Magento', 'Computer', '2021-03-27 12:20:06', 2, '2021-03-27 12:20:06', 2),
(19, 16, 15, 2, b'1', '../upload/member/15/16/attachments/24_1616761907.pdf', b'1', '2021-03-27 12:20:31', 0, '0', 'Artificial intelligence', 'Science', '2021-03-27 12:20:31', 2, '2021-03-27 12:20:31', 2),
(20, 14, 15, 2, b'0', '../upload/member/15/14/attachments/21_1616761602.pdf', b'0', '2021-03-27 12:20:40', 1, '90', 'Learn Java From scratch', 'Computer', '2021-03-27 12:20:40', 2, '2021-03-27 12:20:40', 2),
(21, 14, 15, 2, b'0', '../upload/member/15/14/attachments/22_1616761602.pdf', b'0', '2021-03-27 12:20:40', 1, '90', 'Learn Java From scratch', 'Computer', '2021-03-27 12:20:40', 2, '2021-03-27 12:20:40', 2),
(22, 10, 4, 15, b'1', '../upload/member/4/10/attachments/15_1616753447.pdf', b'0', '2021-03-27 12:23:48', 1, '100', 'Magento', 'Computer', '2021-03-27 12:23:48', 15, '2021-03-27 12:23:48', 15),
(23, 10, 4, 15, b'1', '../upload/member/4/10/attachments/16_1616753447.pdf', b'0', '2021-03-27 12:23:48', 1, '100', 'Magento', 'Computer', '2021-03-27 12:23:48', 15, '2021-03-27 12:23:48', 15),
(24, 12, 4, 15, b'1', '../upload/member/4/12/attachments/18_1616754080.pdf', b'1', '2021-03-27 12:24:07', 0, '0', 'Learn Hoe to make website with Wordpress', 'Science', '2021-03-27 12:24:07', 15, '2021-03-27 12:24:07', 15),
(25, 12, 4, 15, b'1', '../upload/member/4/12/attachments/19_1616754080.pdf', b'1', '2021-03-27 12:24:07', 0, '0', 'Learn Hoe to make website with Wordpress', 'Science', '2021-03-27 12:24:07', 15, '2021-03-27 12:24:07', 15),
(26, 6, 14, 15, b'0', '../upload/member/14/6/attachments/9_1616750563.pdf', b'0', '2021-03-27 12:24:32', 1, '60', 'The Keeper of Secreats', 'Mysteries Novels', '2021-03-27 12:24:32', 15, '2021-03-27 12:24:32', 15),
(27, 9, 14, 15, b'1', '../upload/member/14/9/attachments/14_1616752310.pdf', b'1', '2021-03-27 12:24:59', 0, '0', 'The Backwoods mist', 'Mysteries Novels', '2021-03-27 12:24:59', 15, '2021-03-27 12:24:59', 15),
(28, 1, 2, 15, b'0', '../upload/member/2/1/attachments/1_1616740850.pdf', b'0', '2021-03-27 12:25:17', 1, '100', 'Learn HTML from scratch', 'Computer', '2021-03-27 12:25:17', 15, '2021-03-27 12:25:17', 15),
(29, 2, 2, 15, b'1', '../upload/member/2/2/attachments/2_1616747760.pdf', b'1', '2021-03-27 12:25:34', 0, '0', 'Learn OOPS Concepts ', 'IT', '2021-03-27 12:25:34', 15, '2021-03-27 12:25:34', 15),
(30, 2, 2, 15, b'1', '../upload/member/2/2/attachments/3_1616747760.pdf', b'1', '2021-03-27 12:25:34', 0, '0', 'Learn OOPS Concepts ', 'IT', '2021-03-27 12:25:34', 15, '2021-03-27 12:25:34', 15),
(31, 5, 14, 4, b'0', '../upload/member/14/5/attachments/7_1616750361.pdf', b'0', '2021-03-27 13:04:51', 1, '30', 'River Of Souls ', 'Mysteries Novels', '2021-03-27 13:04:51', 4, '2021-03-27 13:04:51', 4),
(32, 5, 14, 4, b'0', '../upload/member/14/5/attachments/8_1616750361.pdf', b'0', '2021-03-27 13:04:51', 1, '30', 'River Of Souls ', 'Mysteries Novels', '2021-03-27 13:04:51', 4, '2021-03-27 13:04:51', 4),
(33, 7, 14, 4, b'1', '../upload/member/14/7/attachments/10_1616751366.pdf', b'1', '2021-03-27 13:05:05', 0, '0', 'SECRETS', 'Mysteries Novels', '2021-03-27 13:05:05', 4, '2021-03-27 13:05:05', 4),
(34, 7, 14, 4, b'1', '../upload/member/14/7/attachments/11_1616751366.pdf', b'1', '2021-03-27 13:05:05', 0, '0', 'SECRETS', 'Mysteries Novels', '2021-03-27 13:05:05', 4, '2021-03-27 13:05:05', 4),
(35, 3, 2, 4, b'1', '../upload/member/2/3/attachments/4_1616747986.pdf', b'1', '2021-03-27 13:06:08', 0, '0', 'Learn python from scratch', 'Computer', '2021-03-27 13:06:08', 4, '2021-03-27 13:06:08', 4),
(36, 4, 2, 4, b'1', '../upload/member/2/4/attachments/5_1616748697.pdf', b'1', '2021-03-27 13:06:54', 1, '50', 'ANSI C Programming', 'Computer', '2021-03-27 13:06:54', 4, '2021-03-27 13:06:54', 4),
(37, 4, 2, 4, b'1', '../upload/member/2/4/attachments/6_1616748697.pdf', b'1', '2021-03-27 13:06:54', 1, '50', 'ANSI C Programming', 'Computer', '2021-03-27 13:06:54', 4, '2021-03-27 13:06:54', 4),
(38, 19, 2, 14, b'1', '../upload/member/2/19/attachments/28_1616783566.pdf', b'1', '2021-03-27 13:20:16', 0, '0', 'statastics', 'Account', '2021-03-27 13:20:16', 14, '2021-03-27 13:20:16', 14),
(39, 19, 2, 14, b'1', '../upload/member/2/19/attachments/29_1616783566.pdf', b'1', '2021-03-27 13:20:16', 0, '0', 'statastics', 'Account', '2021-03-27 13:20:16', 14, '2021-03-27 13:20:16', 14),
(40, 17, 15, 3, b'1', '../upload/member/15/17/attachments/25_1616762085.pdf', b'1', '2021-03-27 13:29:22', 0, '0', 'Machine Learning', 'IT', '2021-03-27 13:29:22', 3, '2021-03-27 13:29:22', 3),
(41, 17, 15, 3, b'1', '../upload/member/15/17/attachments/26_1616762086.pdf', b'1', '2021-03-27 13:29:22', 0, '0', 'Machine Learning', 'IT', '2021-03-27 13:29:22', 3, '2021-03-27 13:29:22', 3),
(42, 19, 2, 3, b'1', '../upload/member/2/19/attachments/28_1616783566.pdf', b'1', '2021-03-27 13:29:30', 0, '0', 'statastics', 'Account', '2021-03-27 13:29:30', 3, '2021-03-27 13:29:30', 3),
(43, 19, 2, 3, b'1', '../upload/member/2/19/attachments/29_1616783566.pdf', b'1', '2021-03-27 13:29:30', 0, '0', 'statastics', 'Account', '2021-03-27 13:29:30', 3, '2021-03-27 13:29:30', 3),
(44, 7, 14, 3, b'1', '../upload/member/14/7/attachments/10_1616751366.pdf', b'1', '2021-03-27 13:29:58', 0, '0', 'SECRETS', 'Mysteries Novels', '2021-03-27 13:29:58', 3, '2021-03-27 13:29:58', 3),
(45, 7, 14, 3, b'1', '../upload/member/14/7/attachments/11_1616751366.pdf', b'1', '2021-03-27 13:29:58', 0, '0', 'SECRETS', 'Mysteries Novels', '2021-03-27 13:29:58', 3, '2021-03-27 13:29:58', 3),
(46, 13, 4, 3, b'1', '../upload/member/4/13/attachments/20_1616760748.pdf', b'1', '2021-03-27 13:30:09', 0, '0', 'Design website using Shopify', 'Science', '2021-03-27 13:30:09', 3, '2021-03-27 13:30:09', 3),
(47, 16, 15, 6, b'1', '../upload/member/15/16/attachments/24_1616761907.pdf', b'1', '2021-03-27 13:32:00', 0, '0', 'Artificial intelligence', 'Science', '2021-03-27 13:32:00', 6, '2021-03-27 13:32:00', 6),
(48, 13, 4, 6, b'1', '../upload/member/4/13/attachments/20_1616760748.pdf', b'1', '2021-03-27 13:32:12', 0, '0', 'Design website using Shopify', 'Science', '2021-03-27 13:32:12', 6, '2021-03-27 13:32:12', 6),
(49, 19, 2, 6, b'1', '../upload/member/2/19/attachments/28_1616783566.pdf', b'1', '2021-03-27 13:32:29', 0, '0', 'statastics', 'Account', '2021-03-27 13:32:29', 6, '2021-03-27 13:32:29', 6),
(50, 19, 2, 6, b'1', '../upload/member/2/19/attachments/29_1616783566.pdf', b'1', '2021-03-27 13:32:29', 0, '0', 'statastics', 'Account', '2021-03-27 13:32:29', 6, '2021-03-27 13:32:29', 6),
(51, 15, 15, 6, b'1', '../upload/member/15/15/attachments/23_1616761773.pdf', b'0', '2021-03-27 14:40:47', 1, '50', 'Hibernate', 'Computer', '2021-03-27 14:40:47', 6, '2021-03-27 14:40:47', 6),
(52, 17, 15, 6, b'1', '../upload/member/15/17/attachments/25_1616762085.pdf', b'1', '2021-03-27 14:47:33', 0, '0', 'Machine Learning', 'IT', '2021-03-27 14:47:33', 6, '2021-03-27 14:47:33', 6),
(53, 17, 15, 6, b'1', '../upload/member/15/17/attachments/26_1616762086.pdf', b'1', '2021-03-27 14:47:33', 0, '0', 'Machine Learning', 'IT', '2021-03-27 14:47:33', 6, '2021-03-27 14:47:33', 6),
(54, 14, 15, 6, b'0', '../upload/member/15/14/attachments/21_1616761602.pdf', b'0', '2021-03-27 14:49:15', 1, '90', 'Learn Java From scratch', 'Computer', '2021-03-27 14:49:15', 6, '2021-03-27 14:49:15', 6),
(55, 14, 15, 6, b'0', '../upload/member/15/14/attachments/22_1616761602.pdf', b'0', '2021-03-27 14:49:15', 1, '90', 'Learn Java From scratch', 'Computer', '2021-03-27 14:49:15', 6, '2021-03-27 14:49:15', 6),
(56, 6, 14, 6, b'1', '../upload/member/14/6/attachments/9_1616750563.pdf', b'0', '2021-03-27 14:51:12', 1, '60', 'The Keeper of Secreats', 'Mysteries Novels', '2021-03-27 14:51:12', 6, '2021-03-27 14:51:12', 6);

-- --------------------------------------------------------

--
-- Table structure for table `reference_data`
--

CREATE TABLE `reference_data` (
  `id` int(11) NOT NULL,
  `value` varchar(100) NOT NULL,
  `data_value` varchar(100) NOT NULL,
  `ref_catagory` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reference_data`
--

INSERT INTO `reference_data` (`id`, `value`, `data_value`, `ref_catagory`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 'Male', 'M', 'Gender', '2021-02-25 22:21:45', NULL, '2021-02-25 22:22:03', NULL, b'1'),
(2, 'Female', 'F', 'Gender', '2021-02-25 22:13:51', NULL, '2021-02-25 22:13:51', NULL, b'1'),
(3, 'Unknown', 'U', 'Gender', '2021-02-25 22:24:57', NULL, '2021-02-25 22:25:02', NULL, b'1'),
(4, 'Paid', 'P', 'Selling Mode', '2021-02-25 22:27:55', NULL, '2021-02-25 22:27:55', NULL, b'1'),
(5, 'Free', 'F', 'Selling Mode', '2021-02-25 22:28:44', NULL, '2021-02-25 22:28:44', NULL, b'1'),
(6, 'Draft', 'D', 'Note Status', '2021-02-25 22:30:06', NULL, '2021-02-25 22:30:06', NULL, b'1'),
(7, 'Submitted For Review', 'Submitted For Review', 'Note Status', '2021-02-25 22:31:44', NULL, '2021-02-25 22:31:44', NULL, b'1'),
(8, 'In Review', 'In Review', 'Note Status', '2021-02-25 22:32:48', NULL, '2021-02-25 22:32:48', NULL, b'1'),
(9, 'Published', 'Approved', 'Note Status', '2021-02-25 22:39:30', NULL, '2021-02-25 22:39:30', NULL, b'1'),
(10, 'Rejected', 'Rejected', 'Note Status', '2021-02-25 22:40:24', NULL, '2021-02-25 22:40:24', NULL, b'1'),
(11, 'Removed', 'Removed', 'Note Status', '2021-02-25 22:48:54', NULL, '2021-02-25 22:48:54', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `seller_note`
--

CREATE TABLE `seller_note` (
  `id` int(11) NOT NULL,
  `seller_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `action_by` int(11) DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `published_date` datetime DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `catagory` int(11) NOT NULL,
  `display_picture` varchar(500) DEFAULT NULL,
  `note_type` int(11) DEFAULT NULL,
  `number_of_pages` int(11) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `university` varchar(200) DEFAULT NULL,
  `country` int(11) DEFAULT NULL,
  `course` varchar(100) DEFAULT NULL,
  `course_code` varchar(100) DEFAULT NULL,
  `professor` varchar(100) DEFAULT NULL,
  `ispaid` int(11) NOT NULL,
  `selling_price` decimal(10,2) DEFAULT NULL,
  `notes_preview` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_note`
--

INSERT INTO `seller_note` (`id`, `seller_id`, `status`, `action_by`, `remarks`, `published_date`, `title`, `catagory`, `display_picture`, `note_type`, `number_of_pages`, `description`, `university`, `country`, `course`, `course_code`, `professor`, `ispaid`, `selling_price`, `notes_preview`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 2, 9, NULL, NULL, '2021-03-26 12:11:05', 'Learn HTML from scratch', 2, '../upload/member/2/1/DP_1616740850.png', 1, 100, 'lorem lpsum ', 'KSSBM', 2, 'HTML', '654535', 'Prof. N.c Patel', 4, '100.00', '../upload/member/2/1/preview_1616740850.pdf', '2021-03-26 12:10:50', 2, '2021-03-26 12:10:50', 2, b'1'),
(2, 2, 9, NULL, NULL, '2021-03-26 14:09:59', 'Learn OOPS Concepts ', 1, '../upload/member/2/2/DP_1616747760.png', 2, 100, 'lorem lpsum ', 'Universityof Melbourne', 2, 'C++', '32678482', 'Mark Jackson', 5, '0.00', '../upload/member/2/2/preview_1616747760.pdf', '2021-03-26 14:06:00', 2, '2021-03-26 14:06:00', 2, b'1'),
(3, 2, 9, NULL, NULL, '2021-03-26 14:10:06', 'Learn python from scratch', 2, '../upload/member/2/3/DP_1616747986.png', 1, 100, 'lorem lpsum', 'The Australian national university', 2, 'Python', '48998204', 'Aric hue', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-26 14:09:46', 2, '2021-03-26 14:09:46', 2, b'1'),
(4, 2, 9, NULL, NULL, '2021-03-26 14:21:52', 'ANSI C Programming', 2, '../upload/member/2/4/DP_1616748697.png', 2, 200, 'lorem lpsum', 'University of Toronto', 5, 'C Programming', '7329844', 'Prof. Herry ', 4, '50.00', '../upload/member/2/4/preview_1616748696.pdf', '2021-03-26 14:21:36', 2, '2021-03-26 14:21:36', 2, b'1'),
(5, 14, 9, NULL, NULL, '2021-03-26 14:52:53', 'River Of Souls ', 6, '../upload/member/14/5/DP_1616750361.jpg', 3, 50, 'lorem lpsum', '', 1, 'River of souls', '433534', '', 4, '30.00', '../upload/member/14/5/preview_1616750361.pdf', '2021-03-26 14:49:21', 14, '2021-03-26 14:49:21', 14, b'1'),
(6, 14, 9, NULL, NULL, '2021-03-26 14:53:00', 'The Keeper of Secreats', 6, '../upload/member/14/6/DP_1616750563.jpg', 3, 200, 'lorem lpsum', '', 2, '', '637583', '', 4, '60.00', '../upload/member/14/6/preview_1616750563.pdf', '2021-03-26 14:52:43', 14, '2021-03-26 14:52:43', 14, b'1'),
(7, 14, 9, NULL, NULL, '2021-03-26 15:08:17', 'SECRETS', 6, '../upload/member/14/7/DP_1616751366.jpg', 3, 300, 'lorem lpsum', '', 2, 'Secrets', '7328327', '', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-26 15:06:05', 14, '2021-03-26 15:06:05', 14, b'1'),
(8, 14, 10, NULL, NULL, NULL, 'SECRETS', 6, '../upload/member/14/8/DP_1616751367.jpg', 3, 300, 'lorem lpsum', '', 2, 'Secrets', '7328327', '', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-26 15:06:07', 14, '2021-03-26 15:06:07', 14, b'1'),
(9, 14, 9, NULL, NULL, '2021-03-26 15:21:58', 'The Backwoods mist', 6, '../upload/member/14/9/DP_1616752310.jpg', 3, 30, 'lorem lpsum', 'University of Toronto', 2, 'backwood mist', '874938430', 'J peeterson', 5, '0.00', '../upload/member/14/9/preview_1616752310.pdf', '2021-03-26 15:21:50', 14, '2021-03-26 15:21:50', 14, b'1'),
(10, 4, 9, NULL, NULL, '2021-03-26 15:43:59', 'Magento', 2, '../upload/member/4/10/DP_1616753447.png', 2, 400, 'lorem lpsum', 'IIT bombay', 1, 'PHP Framework (Magento)', '78877', 'Prof. V.C Bodiwala', 4, '100.00', '../upload/member/4/10/preview_1616753447.pdf', '2021-03-26 15:40:47', 4, '2021-03-26 15:40:47', 4, b'1'),
(11, 4, 9, NULL, NULL, '2021-03-26 15:47:13', 'Laravel', 2, '../upload/member/4/11/DP_1616753825.png', 2, 300, 'lorem lpsum', 'The Australian university', 2, 'PHP Framework (Laravel)', '45678', 'Prof. K.S. Patel', 4, '79.00', '../upload/member/default/default_preview.pdf', '2021-03-26 15:47:05', 4, '2021-03-26 15:47:05', 4, b'1'),
(12, 4, 9, NULL, NULL, '2021-03-26 15:51:29', 'Learn Hoe to make website with Wordpress', 3, '../upload/member/default/default_display.png', 2, 100, 'lorem lpsum', 'University of Toronto', 5, 'WordPress', '784832', 'B s Patel', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-26 15:51:20', 4, '2021-03-26 15:51:20', 4, b'1'),
(13, 4, 9, NULL, NULL, '2021-03-26 17:42:37', 'Design website using Shopify', 3, '../upload/member/4/13/DP_1616760748.png', 1, 100, 'lorem lpsum', 'Tsinghua University', 6, 'Shopify Framework', '728392', 'Angela hue', 5, '0.00', '../upload/member/4/13/preview_1616760748.pdf', '2021-03-26 17:42:28', 4, '2021-03-26 17:42:28', 4, b'1'),
(14, 15, 9, NULL, NULL, '2021-03-26 18:04:57', 'Learn Java From scratch', 2, '../upload/member/15/14/DP_1616761602.png', 2, 200, 'lorem lpsum', 'University of Toronto', 5, 'JAVA', '2734989', 'Prof. Angela hue', 4, '90.00', '../upload/member/15/14/preview_1616761602.pdf', '2021-03-26 17:56:42', 15, '2021-03-26 17:56:42', 15, b'1'),
(15, 15, 9, NULL, NULL, '2021-03-26 18:05:04', 'Hibernate', 2, '../upload/member/15/15/DP_1616761773.png', 1, 100, 'lorem lpsum', 'Shanghai University', 6, 'Hibernate', '634782', 'John Den', 4, '50.00', '../upload/member/default/default_preview.pdf', '2021-03-26 17:59:33', 15, '2021-03-26 17:59:33', 15, b'1'),
(16, 15, 9, NULL, NULL, '2021-03-26 18:05:11', 'Artificial intelligence', 3, '../upload/member/15/16/DP_1616761907.png', 1, 150, 'lorem lpsum', 'The Australian university', 2, 'AI', '56248727', 'John Den', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-26 18:01:47', 15, '2021-03-26 18:01:47', 15, b'1'),
(17, 15, 9, NULL, NULL, '2021-03-26 18:06:50', 'Machine Learning', 1, '../upload/member/15/17/DP_1616762085.png', 1, 400, 'lorem lpsum', 'The Australian national university', 2, 'ML', '456789', 'John Den', 5, '0.00', '../upload/member/15/17/preview_1616762085.pdf', '2021-03-26 18:04:45', 15, '2021-03-26 18:04:45', 15, b'1'),
(18, 15, 6, NULL, NULL, NULL, 'biology', 3, '../upload/member/default/default_display.png', 1, 100, 'lorem lpsum', 'LD Engineering', 3, '', '345345', '', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-26 19:20:27', 15, '2021-03-26 19:20:27', 15, b'1'),
(19, 2, 9, NULL, NULL, '2021-03-27 00:28:13', 'statastics', 5, '../upload/member/default/default_display.png', 2, 150, 'lorem lpsum', 'University of Toronto', 5, '', '326783', '', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-27 00:02:46', 2, '2021-03-27 00:02:46', 2, b'1'),
(20, 14, 10, NULL, NULL, NULL, 'physics', 3, '../upload/member/default/default_display.png', 1, 100, 'df', '', 5, '', '', '', 5, '0.00', '../upload/member/default/default_preview.pdf', '2021-03-27 13:54:05', 14, '2021-03-27 13:54:05', 14, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `seller_note_attachments`
--

CREATE TABLE `seller_note_attachments` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `file_name` varchar(100) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_note_attachments`
--

INSERT INTO `seller_note_attachments` (`id`, `note_id`, `file_name`, `file_path`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 1, '1_1616740850.pdf', '../upload/member/2/1/attachments/1_1616740850.pdf', '2021-03-26 12:10:50', 2, '2021-03-26 12:10:50', 2, b'1'),
(2, 2, '2_1616747760.pdf', '../upload/member/2/2/attachments/2_1616747760.pdf', '2021-03-26 14:06:00', 2, '2021-03-26 14:06:00', 2, b'1'),
(3, 2, '3_1616747760.pdf', '../upload/member/2/2/attachments/3_1616747760.pdf', '2021-03-26 14:06:00', 2, '2021-03-26 14:06:00', 2, b'1'),
(4, 3, '4_1616747986.pdf', '../upload/member/2/3/attachments/4_1616747986.pdf', '2021-03-26 14:09:46', 2, '2021-03-26 14:09:46', 2, b'1'),
(5, 4, '5_1616748697.pdf', '../upload/member/2/4/attachments/5_1616748697.pdf', '2021-03-26 14:21:37', 2, '2021-03-26 14:21:37', 2, b'1'),
(6, 4, '6_1616748697.pdf', '../upload/member/2/4/attachments/6_1616748697.pdf', '2021-03-26 14:21:37', 2, '2021-03-26 14:21:37', 2, b'1'),
(7, 5, '7_1616750361.pdf', '../upload/member/14/5/attachments/7_1616750361.pdf', '2021-03-26 14:49:21', 14, '2021-03-26 14:49:21', 14, b'1'),
(8, 5, '8_1616750361.pdf', '../upload/member/14/5/attachments/8_1616750361.pdf', '2021-03-26 14:49:21', 14, '2021-03-26 14:49:21', 14, b'1'),
(9, 6, '9_1616750563.pdf', '../upload/member/14/6/attachments/9_1616750563.pdf', '2021-03-26 14:52:43', 14, '2021-03-26 14:52:43', 14, b'1'),
(10, 7, '10_1616751366.pdf', '../upload/member/14/7/attachments/10_1616751366.pdf', '2021-03-26 15:06:06', 14, '2021-03-26 15:06:06', 14, b'1'),
(11, 7, '11_1616751366.pdf', '../upload/member/14/7/attachments/11_1616751366.pdf', '2021-03-26 15:06:06', 14, '2021-03-26 15:06:06', 14, b'1'),
(12, 8, '12_1616751367.pdf', '../upload/member/14/8/attachments/12_1616751367.pdf', '2021-03-26 15:06:07', 14, '2021-03-26 15:06:07', 14, b'1'),
(13, 8, '13_1616751367.pdf', '../upload/member/14/8/attachments/13_1616751367.pdf', '2021-03-26 15:06:07', 14, '2021-03-26 15:06:07', 14, b'1'),
(14, 9, '14_1616752310.pdf', '../upload/member/14/9/attachments/14_1616752310.pdf', '2021-03-26 15:21:50', 14, '2021-03-26 15:21:50', 14, b'1'),
(15, 10, '15_1616753447.pdf', '../upload/member/4/10/attachments/15_1616753447.pdf', '2021-03-26 15:40:47', 4, '2021-03-26 15:40:47', 4, b'1'),
(16, 10, '16_1616753447.pdf', '../upload/member/4/10/attachments/16_1616753447.pdf', '2021-03-26 15:40:47', 4, '2021-03-26 15:40:47', 4, b'1'),
(17, 11, '17_1616753825.pdf', '../upload/member/4/11/attachments/17_1616753825.pdf', '2021-03-26 15:47:05', 4, '2021-03-26 15:47:05', 4, b'1'),
(18, 12, '18_1616754080.pdf', '../upload/member/4/12/attachments/18_1616754080.pdf', '2021-03-26 15:51:20', 4, '2021-03-26 15:51:20', 4, b'1'),
(19, 12, '19_1616754080.pdf', '../upload/member/4/12/attachments/19_1616754080.pdf', '2021-03-26 15:51:20', 4, '2021-03-26 15:51:20', 4, b'1'),
(20, 13, '20_1616760748.pdf', '../upload/member/4/13/attachments/20_1616760748.pdf', '2021-03-26 17:42:28', 4, '2021-03-26 17:42:28', 4, b'1'),
(21, 14, '21_1616761602.pdf', '../upload/member/15/14/attachments/21_1616761602.pdf', '2021-03-26 17:56:42', 15, '2021-03-26 17:56:42', 15, b'1'),
(22, 14, '22_1616761602.pdf', '../upload/member/15/14/attachments/22_1616761602.pdf', '2021-03-26 17:56:42', 15, '2021-03-26 17:56:42', 15, b'1'),
(23, 15, '23_1616761773.pdf', '../upload/member/15/15/attachments/23_1616761773.pdf', '2021-03-26 17:59:33', 15, '2021-03-26 17:59:33', 15, b'1'),
(24, 16, '24_1616761907.pdf', '../upload/member/15/16/attachments/24_1616761907.pdf', '2021-03-26 18:01:47', 15, '2021-03-26 18:01:47', 15, b'1'),
(25, 17, '25_1616762085.pdf', '../upload/member/15/17/attachments/25_1616762085.pdf', '2021-03-26 18:04:45', 15, '2021-03-26 18:04:45', 15, b'1'),
(26, 17, '26_1616762086.pdf', '../upload/member/15/17/attachments/26_1616762086.pdf', '2021-03-26 18:04:45', 15, '2021-03-26 18:04:45', 15, b'1'),
(27, 18, '27_1616766628.pdf', '../upload/member/15/18/attachments/27_1616766628.pdf', '2021-03-26 19:20:27', 15, '2021-03-26 19:20:27', 15, b'1'),
(28, 19, '28_1616783566.pdf', '../upload/member/2/19/attachments/28_1616783566.pdf', '2021-03-27 00:02:46', 2, '2021-03-27 00:02:46', 2, b'1'),
(29, 19, '29_1616783566.pdf', '../upload/member/2/19/attachments/29_1616783566.pdf', '2021-03-27 00:02:46', 2, '2021-03-27 00:02:46', 2, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `seller_note_reported`
--

CREATE TABLE `seller_note_reported` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `reportedby_id` int(11) NOT NULL,
  `against_downloader_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_note_reported`
--

INSERT INTO `seller_note_reported` (`id`, `note_id`, `reportedby_id`, `against_downloader_id`, `remarks`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 1, 4, 2, 'lorem lpsum', '2021-03-27 04:00:36', 4, '2021-03-27 04:00:36', 4),
(2, 4, 4, 2, 'ghjnm', '2021-03-27 04:12:25', 4, '2021-03-27 04:12:25', 4),
(3, 4, 14, 2, 'm,', '2021-03-27 11:17:45', 14, '2021-03-27 11:17:45', 14),
(4, 1, 14, 2, 'nbmn', '2021-03-27 11:18:51', 14, '2021-03-27 11:18:51', 14),
(5, 10, 15, 4, 'lorem lpsum', '2021-03-27 13:10:50', 15, '2021-03-27 13:10:50', 15),
(6, 10, 14, 4, 'rffrf', '2021-03-27 13:21:32', 14, '2021-03-27 13:21:32', 14),
(7, 19, 3, 2, 'hjn', '2021-03-27 13:30:38', 3, '2021-03-27 13:30:38', 3);

-- --------------------------------------------------------

--
-- Table structure for table `seller_note_review`
--

CREATE TABLE `seller_note_review` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `reviewby_id` int(11) NOT NULL,
  `againstby_id` int(11) NOT NULL,
  `rating` decimal(10,1) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_note_review`
--

INSERT INTO `seller_note_review` (`id`, `note_id`, `reviewby_id`, `againstby_id`, `rating`, `comments`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 4, 4, 2, '3.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(2, 3, 4, 2, '2.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(3, 7, 4, 14, '4.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(4, 2, 15, 2, '4.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(5, 9, 15, 14, '4.8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(6, 12, 15, 4, '3.4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(7, 10, 15, 4, '1.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(8, 16, 2, 15, '3.4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(9, 13, 2, 4, '3.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(10, 11, 2, 4, '4.8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(11, 5, 2, 14, '4.6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(12, 7, 2, 14, '3.6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(13, 19, 14, 2, '4.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(14, 2, 14, 2, '3.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(15, 12, 14, 4, '3.8', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(16, 15, 14, 15, '2.6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(17, 17, 14, 15, '2.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(18, 13, 3, 4, '3.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(19, 7, 3, 14, '4.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(20, 17, 3, 15, '4.5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(21, 16, 6, 15, '4.3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(22, 13, 6, 4, '4.6', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(23, 19, 6, 2, '0.4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1'),
(24, 15, 6, 15, '4.5', 'lorem lpsum', '0000-00-00 00:00:00', 2147483647, '0000-00-00 00:00:00', 2147483647, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(191) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 'HandWritten Notes', 'Notes which is written by seller', '2021-02-26 14:36:11', NULL, '2021-02-26 14:36:11', NULL, b'1'),
(2, 'University Note', 'Notes which is depends on different university', '2021-02-26 14:39:14', NULL, '2021-02-26 14:39:14', NULL, b'1'),
(3, 'Self-wrie novel', 'Novel based on different criteria', '2021-02-26 14:40:21', NULL, '2021-02-26 14:40:21', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(24) NOT NULL,
  `is_emailverified` bit(1) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `role_id`, `first_name`, `last_name`, `email`, `password`, `is_emailverified`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 3, 'prakruti', 'Ukani', 'prakrutiukani@gmail.com', 'mDRpyDcM', b'0', NULL, NULL, NULL, NULL, b'1'),
(2, 1, 'utkarsh', 'patel', 'utkarshukani@gmail.com', 'nagS&23', b'1', NULL, NULL, NULL, NULL, b'1'),
(3, 1, 'pushti', 'mistry', 'pushti@gmail.com', 'A#8cnd7', b'1', NULL, NULL, NULL, NULL, b'1'),
(4, 1, 'prachi', 'sanghavi', 'prachi@gmail.com', 'ABcx@12', b'1', NULL, NULL, NULL, NULL, b'1'),
(5, 1, 'krina', 'patel', 'krina@gmail.com', 'EOzccUgU', b'0', NULL, NULL, NULL, NULL, b'1'),
(6, 1, 'krish', 'patel', 'krishgdf@gmail.com', 'abcA@12', b'1', NULL, NULL, NULL, NULL, b'1'),
(7, 1, 'krisha', 'patel', 'krisha@gmail.com', 'Agh@67j', b'0', NULL, NULL, NULL, NULL, b'1'),
(8, 1, 'deep', 'sanghavi', 'deep@gmail.com', 'Abc@123', b'1', NULL, NULL, NULL, NULL, b'1'),
(9, 1, 'hetvee', 'shah', 'hetvee@gmail.com', 'HSKrs2Hn', b'1', NULL, NULL, NULL, NULL, b'1'),
(14, 1, 'prakruti', 'patel', 'pgukani1010@gmail.com', 'Mczt45#', b'1', NULL, NULL, NULL, NULL, b'1'),
(15, 1, 'pratish', 'shah', 'pratishhh@gmail.com', 'GHt#125', b'1', '2021-03-11 21:37:50', NULL, '2021-03-11 21:37:50', NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `secondary_email` varchar(100) DEFAULT NULL,
  `country_code` int(11) NOT NULL,
  `phone_no` varchar(20) NOT NULL,
  `profile_picture` varchar(500) DEFAULT NULL,
  `address_line_1` varchar(100) NOT NULL,
  `address_line_2` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` int(11) NOT NULL,
  `university` varchar(100) DEFAULT NULL,
  `college` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `dob`, `gender`, `secondary_email`, `country_code`, `phone_no`, `profile_picture`, `address_line_1`, `address_line_2`, `city`, `state`, `zip_code`, `country`, `university`, `college`, `created_date`, `created_by`, `modified_date`, `modified_by`) VALUES
(1, 2, '2020-12-17 00:00:00', 1, NULL, 2, '1898050551', '../upload/member/2/DP_1616739762.png', '12, silver plaza', 'nicol', 'ahmedabad', 'Gujarat', '32323', 1, 'Gujarat University', 'KSSBM', '2021-03-26 11:52:42', 2, '2021-03-26 11:52:42', 2),
(2, 14, '1999-10-10 00:00:00', 2, NULL, 1, '1898050551', '../upload/member/14/DP_1616749154.png', '12,fjkefkl', 'nm,', 'ahmedabad', 'Gujarat', '', 1, 'Gujarat University', 'KSSBM', '2021-03-26 14:29:13', 14, '2021-03-26 14:29:13', 14),
(3, 4, '2021-03-20 00:00:00', 2, NULL, 1, '987654212', '../upload/member/default/default-user.png', 'dkjm,ds.', 'dsfdskm', 'ahmedabad', 'Gujarat', '32443', 1, 'Gujarat University', 'KSSBM', '2021-03-26 15:36:36', 4, '2021-03-26 15:36:36', 4),
(4, 15, '2021-03-04 00:00:00', 1, NULL, 1, '1234565432', '../upload/member/15/DP_1616761368.png', 'fghjk', 'hk cdfghk jhkj', 'mumbai', 'maharastra', '56800', 1, 'IIT bombay', 'IIT', '2021-03-26 17:52:48', 15, '2021-03-26 17:52:48', 15);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(191) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `name`, `description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `isactive`) VALUES
(1, 'member', NULL, NULL, NULL, NULL, NULL, b'1'),
(2, 'admin', NULL, NULL, NULL, NULL, NULL, b'1'),
(3, 'super admin', NULL, NULL, NULL, NULL, NULL, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configuration`
--
ALTER TABLE `configuration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id_fk` (`note_id`),
  ADD KEY `user_id_fk1` (`seller`),
  ADD KEY `user_id_fk2` (`downloader`),
  ADD KEY `reference_id_fk` (`ispaid`);

--
-- Indexes for table `reference_data`
--
ALTER TABLE `reference_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seller_note`
--
ALTER TABLE `seller_note`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`seller_id`),
  ADD KEY `reference_id_fk` (`status`),
  ADD KEY `catagory_id_fk` (`catagory`),
  ADD KEY `type_id_fk` (`note_type`),
  ADD KEY `country_id_fk` (`country`);

--
-- Indexes for table `seller_note_attachments`
--
ALTER TABLE `seller_note_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seller_note_attachments_ibfk_1` (`note_id`);

--
-- Indexes for table `seller_note_reported`
--
ALTER TABLE `seller_note_reported`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id_fk` (`note_id`),
  ADD KEY `user_id_fk` (`reportedby_id`),
  ADD KEY `download_id_fk` (`against_downloader_id`);

--
-- Indexes for table `seller_note_review`
--
ALTER TABLE `seller_note_review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `note_id_fk` (`note_id`),
  ADD KEY `user_id_fk` (`reviewby_id`),
  ADD KEY `download_id_fk` (`againstby_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id_fk` (`role_id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `ref_id_fk` (`gender`),
  ADD KEY `country_id_fk` (`country_code`),
  ADD KEY `country_id_fk2` (`country`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `configuration`
--
ALTER TABLE `configuration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `download`
--
ALTER TABLE `download`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_note`
--
ALTER TABLE `seller_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `seller_note_attachments`
--
ALTER TABLE `seller_note_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `seller_note_reported`
--
ALTER TABLE `seller_note_reported`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `seller_note_review`
--
ALTER TABLE `seller_note_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `download`
--
ALTER TABLE `download`
  ADD CONSTRAINT `download_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_note` (`id`),
  ADD CONSTRAINT `download_ibfk_2` FOREIGN KEY (`seller`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `download_ibfk_3` FOREIGN KEY (`downloader`) REFERENCES `user` (`id`);

--
-- Constraints for table `seller_note`
--
ALTER TABLE `seller_note`
  ADD CONSTRAINT `seller_note_ibfk_1` FOREIGN KEY (`seller_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `seller_note_ibfk_2` FOREIGN KEY (`status`) REFERENCES `reference_data` (`id`),
  ADD CONSTRAINT `seller_note_ibfk_3` FOREIGN KEY (`catagory`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `seller_note_ibfk_4` FOREIGN KEY (`note_type`) REFERENCES `type` (`id`),
  ADD CONSTRAINT `seller_note_ibfk_5` FOREIGN KEY (`country`) REFERENCES `country` (`id`);

--
-- Constraints for table `seller_note_attachments`
--
ALTER TABLE `seller_note_attachments`
  ADD CONSTRAINT `seller_note_attachments_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_note` (`id`);

--
-- Constraints for table `seller_note_reported`
--
ALTER TABLE `seller_note_reported`
  ADD CONSTRAINT `seller_note_reported_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_note` (`id`),
  ADD CONSTRAINT `seller_note_reported_ibfk_2` FOREIGN KEY (`reportedby_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `seller_note_reported_ibfk_3` FOREIGN KEY (`against_downloader_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `seller_note_review`
--
ALTER TABLE `seller_note_review`
  ADD CONSTRAINT `seller_note_review_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_note` (`id`),
  ADD CONSTRAINT `seller_note_review_ibfk_2` FOREIGN KEY (`reviewby_id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `user_role` (`id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`gender`) REFERENCES `reference_data` (`id`),
  ADD CONSTRAINT `user_profile_ibfk_3` FOREIGN KEY (`country_code`) REFERENCES `country` (`id`),
  ADD CONSTRAINT `user_profile_ibfk_4` FOREIGN KEY (`country`) REFERENCES `country` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
