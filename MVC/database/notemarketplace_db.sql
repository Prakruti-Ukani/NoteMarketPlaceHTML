-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 05:00 PM
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
(5, 'Account', 'Notes which is related to Accounting', '2021-02-26 15:02:58', NULL, '2021-02-26 15:02:58', NULL, b'1');

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
(1, 1, 1, 2, b'1', '../upload/member/1/2/2_232333.jpg', b'0', '2021-03-04 11:19:26', 4, '1900', 'HTML', 'IT', '2021-03-04 11:19:26', NULL, '2021-03-04 11:19:26', NULL),
(2, 1, 1, 2, b'1', '../upload/member/1/2/2_232333.jpg', b'0', '2021-03-04 11:19:37', 4, '1900', 'C language', 'Computer', '2021-03-04 11:19:37', NULL, '2021-03-04 11:19:37', NULL),
(3, 1, 1, 2, b'1', '../upload/member/1/2/2_232333.jpg', b'0', '2021-03-04 11:19:44', 4, '1900', 'biology', 'science', '2021-03-04 11:19:44', NULL, '2021-03-04 11:19:44', NULL),
(4, 1, 1, 2, b'1', '../upload/member/1/2/2_232333.jpg', b'0', '2021-03-04 11:19:50', 4, '1900', 'history', 'History', '2021-03-04 11:19:50', NULL, '2021-03-04 11:19:50', NULL),
(5, 1, 1, 2, b'1', '../upload/member/1/2/2_232333.jpg', b'0', '2021-03-04 11:19:56', 4, '1900', 'fundamental of accounting', 'Account', '2021-03-04 11:19:56', NULL, '2021-03-04 11:19:56', NULL);

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
  `selling_price` decimal(10,3) DEFAULT NULL,
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
(1, 14, 6, NULL, NULL, NULL, 'Java', 2, '../upload/member/14/1/DP_1614958139.png', 1, 1000, 'lorem lpsum dummy text', 'KSSBM', 1, 'Advance java', '63743488', 'Prof. N.c Patel', 5, '1000.000', '../upload/member/14/1/preview_1614958139.png', '2021-03-05 20:58:59', 14, '2021-03-05 20:58:59', 14, b'1'),
(2, 14, 6, NULL, NULL, NULL, 'HTML', 1, '../upload/member/14/2/DP_1614958229.png', 2, 100, 'lorem lpsum dummy text', 'LD Engineering', 3, 'Learn Html from scratch', '63743488', 'Prof. N.c Patel', 5, '1000.000', '../upload/member/14/2/preview_1614958229.png', '2021-03-05 21:00:29', 14, '2021-03-05 21:00:29', 14, b'1'),
(3, 14, 6, NULL, NULL, NULL, 'CSS', 1, '../upload/member/14/3/DP_1614958352.png', 2, 100, 'lorem lpsum dummy text', 'LD Engineering', 3, 'Learn  cascading style sheet', '63743488', 'Prof. N.c Patel', 5, '1200.000', '../upload/member/14/3/preview_1614958352.png', '2021-03-05 21:02:32', 14, '2021-03-05 21:02:32', 14, b'1'),
(4, 14, 9, NULL, NULL, '2021-03-05 21:11:06', 'python', 1, '../upload/member/14/4/DP_1614958411.png', 2, 100, 'lorem lpsum dummy text', 'LD Engineering', 3, 'Learn  python with AI/ML', '63743488', 'Prof. N.c Patel', 5, '1200.000', '../upload/member/14/4/preview_1614958411.png', '2021-03-05 21:03:31', 14, '2021-03-05 21:03:31', 14, b'1'),
(5, 14, 9, NULL, NULL, '2021-03-05 21:10:55', 'Artificial intelligence', 1, '../upload/member/14/5/DP_1614958450.png', 2, 100, 'lorem lpsum dummy text', 'LD Engineering', 3, 'AI/ML', '63743488', 'Prof. V.C Bodiwala', 5, '1200.000', '../upload/member/14/5/preview_1614958450.png', '2021-03-05 21:04:09', 14, '2021-03-05 21:04:09', 14, b'1'),
(6, 14, 9, NULL, NULL, '2021-03-05 21:10:45', 'Biology', 3, '../upload/member/14/6/DP_1614958522.png', 3, 100, 'lorem lpsum dummy text', 'UC Davis institute', 6, 'Biology', '6374677', 'Prof. V.C Bodiwala', 5, '1200.000', '../upload/member/14/6/preview_1614958522.png', '2021-03-05 21:05:22', 14, '2021-03-05 21:05:22', 14, b'1'),
(7, 14, 6, NULL, NULL, NULL, 'Accounting', 5, '../upload/member/14/7/DP_1614958638.png', 2, 100, 'lorem lpsum', 'IIM', 1, 'Accounting', '637483', 'B s PAtel', 4, '0.000', '../upload/member/14/7/preview_1614958637.png', '2021-03-05 21:07:17', 14, '2021-03-05 21:07:17', 14, b'1'),
(8, 14, 6, NULL, NULL, NULL, 'Accounting', 5, '../upload/member/14/8/DP_1614958644.png', 2, 100, 'lorem lpsum', 'IIM', 1, 'Accounting', '637483', 'B s PAtel', 4, '0.000', '../upload/member/14/8/preview_1614958643.png', '2021-03-05 21:07:23', 14, '2021-03-05 21:07:23', 14, b'1'),
(9, 14, 6, NULL, NULL, NULL, 'Physics', 3, '../upload/member/14/9/DP_1614958671.png', 2, 100, 'lorem lpsum', 'IIM', 1, 'Physics', '637483', 'B s PAtel', 4, '0.000', '../upload/member/14/9/preview_1614958671.png', '2021-03-05 21:07:51', 14, '2021-03-05 21:07:51', 14, b'1'),
(10, 14, 6, NULL, NULL, NULL, 'Physics', 3, '../upload/member/14/10/DP_1614958742.png', 2, 100, 'lorem lpsum', 'IIM', 1, 'History ', '637483', 'B s PAtel', 4, '0.000', '../upload/member/14/10/preview_1614958742.png', '2021-03-05 21:09:02', 14, '2021-03-05 21:09:02', 14, b'1'),
(11, 14, 9, NULL, NULL, '2021-03-05 21:10:32', 'Geometry', 3, '../upload/member/14/11/DP_1614958785.png', 2, 100, 'lorem lpsum', 'IIM', 1, 'geometry', '637483', 'B s PAtel', 5, '1300.000', '../upload/member/14/11/preview_1614958784.png', '2021-03-05 21:09:44', 14, '2021-03-05 21:09:44', 14, b'1');

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
(1, 1, '1_1614958139.pdf', '../upload/member/14/1/attachments/1_1614958139.pdf', '2021-03-05 20:58:59', 14, '2021-03-05 20:58:59', 14, b'1'),
(2, 1, '2_1614958139.pdf', '../upload/member/14/1/attachments/2_1614958139.pdf', '2021-03-05 20:58:59', 14, '2021-03-05 20:58:59', 14, b'1'),
(3, 2, '3_1614958229.pdf', '../upload/member/14/2/attachments/3_1614958229.pdf', '2021-03-05 21:00:29', 14, '2021-03-05 21:00:29', 14, b'1'),
(4, 2, '4_1614958229.pdf', '../upload/member/14/2/attachments/4_1614958229.pdf', '2021-03-05 21:00:29', 14, '2021-03-05 21:00:29', 14, b'1'),
(5, 3, '5_1614958353.pdf', '../upload/member/14/3/attachments/5_1614958353.pdf', '2021-03-05 21:02:33', 14, '2021-03-05 21:02:33', 14, b'1'),
(6, 3, '6_1614958353.pdf', '../upload/member/14/3/attachments/6_1614958353.pdf', '2021-03-05 21:02:33', 14, '2021-03-05 21:02:33', 14, b'1'),
(7, 4, '7_1614958411.pdf', '../upload/member/14/4/attachments/7_1614958411.pdf', '2021-03-05 21:03:31', 14, '2021-03-05 21:03:31', 14, b'1'),
(8, 4, '8_1614958412.pdf', '../upload/member/14/4/attachments/8_1614958412.pdf', '2021-03-05 21:03:31', 14, '2021-03-05 21:03:31', 14, b'1'),
(9, 5, '9_1614958450.pdf', '../upload/member/14/5/attachments/9_1614958450.pdf', '2021-03-05 21:04:10', 14, '2021-03-05 21:04:10', 14, b'1'),
(10, 5, '10_1614958450.pdf', '../upload/member/14/5/attachments/10_1614958450.pdf', '2021-03-05 21:04:10', 14, '2021-03-05 21:04:10', 14, b'1'),
(11, 6, '11_1614958523.pdf', '../upload/member/14/6/attachments/11_1614958523.pdf', '2021-03-05 21:05:22', 14, '2021-03-05 21:05:22', 14, b'1'),
(12, 6, '12_1614958523.pdf', '../upload/member/14/6/attachments/12_1614958523.pdf', '2021-03-05 21:05:23', 14, '2021-03-05 21:05:23', 14, b'1'),
(13, 7, '13_1614958638.pdf', '../upload/member/14/7/attachments/13_1614958638.pdf', '2021-03-05 21:07:18', 14, '2021-03-05 21:07:18', 14, b'1'),
(14, 7, '14_1614958638.pdf', '../upload/member/14/7/attachments/14_1614958638.pdf', '2021-03-05 21:07:18', 14, '2021-03-05 21:07:18', 14, b'1'),
(15, 8, '15_1614958644.pdf', '../upload/member/14/8/attachments/15_1614958644.pdf', '2021-03-05 21:07:24', 14, '2021-03-05 21:07:24', 14, b'1'),
(16, 8, '16_1614958644.pdf', '../upload/member/14/8/attachments/16_1614958644.pdf', '2021-03-05 21:07:24', 14, '2021-03-05 21:07:24', 14, b'1'),
(17, 9, '17_1614958672.pdf', '../upload/member/14/9/attachments/17_1614958672.pdf', '2021-03-05 21:07:52', 14, '2021-03-05 21:07:52', 14, b'1'),
(18, 9, '18_1614958672.pdf', '../upload/member/14/9/attachments/18_1614958672.pdf', '2021-03-05 21:07:52', 14, '2021-03-05 21:07:52', 14, b'1'),
(19, 10, '19_1614958742.pdf', '../upload/member/14/10/attachments/19_1614958742.pdf', '2021-03-05 21:09:02', 14, '2021-03-05 21:09:02', 14, b'1'),
(20, 10, '20_1614958742.pdf', '../upload/member/14/10/attachments/20_1614958742.pdf', '2021-03-05 21:09:02', 14, '2021-03-05 21:09:02', 14, b'1'),
(21, 11, '21_1614958785.pdf', '../upload/member/14/11/attachments/21_1614958785.pdf', '2021-03-05 21:09:45', 14, '2021-03-05 21:09:45', 14, b'1'),
(22, 11, '22_1614958785.pdf', '../upload/member/14/11/attachments/22_1614958785.pdf', '2021-03-05 21:09:45', 14, '2021-03-05 21:09:45', 14, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `seller_note_reported`
--

CREATE TABLE `seller_note_reported` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `reportedby_id` int(11) NOT NULL,
  `against_download_id` int(11) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `seller_note_review`
--

CREATE TABLE `seller_note_review` (
  `id` int(11) NOT NULL,
  `note_id` int(11) NOT NULL,
  `reviewby_id` int(11) NOT NULL,
  `againstby_id` int(11) NOT NULL,
  `rating` decimal(10,0) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `created_date` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `modified_date` datetime DEFAULT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `isactive` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 3, 'prakruti', 'Ukani', 'prakrutiukani@gmail.com', '1234@Aa', b'0', NULL, NULL, NULL, NULL, b'1'),
(2, 1, 'utkarsh', 'patel', 'utkarshukani@gmail.com', '111A@jj', b'1', NULL, NULL, NULL, NULL, b'1'),
(3, 1, 'pushti', 'ukani', 'xyz@gmail.com', 'A#8cnd7', b'1', NULL, NULL, NULL, NULL, b'1'),
(4, 1, 'prachi', 'sanghavi', 'hj@gmail.com', 'GjhhggG', b'0', NULL, NULL, NULL, NULL, b'1'),
(5, 1, 'krina', 'patel', 'yhuj@gmail.com', 'EOzccUgU', b'1', NULL, NULL, NULL, NULL, b'1'),
(6, 1, 'krish', 'patel', 'abca@gmail.com', 'abcA@12', b'0', NULL, NULL, NULL, NULL, b'1'),
(7, 1, 'krisha', 'patel', 'globallohanayuva@gmail.com', 'Agh@67j', b'0', NULL, NULL, NULL, NULL, b'1'),
(8, 1, 'deep', 'sanghavi', 'sss@gmail.com', 'Abc@123', b'0', NULL, NULL, NULL, NULL, b'1'),
(9, 1, 'hetvee', 'shah', 'pgukani10@gmail.com', 'HSKrs2Hn', b'1', NULL, NULL, NULL, NULL, b'1'),
(14, 1, 'Rishi', 'shah', 'pgukani1010@gmail.com', 'F7fTZb2u', b'1', NULL, NULL, NULL, NULL, b'1');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dob` datetime DEFAULT NULL,
  `gender` int(11) DEFAULT NULL,
  `secondary_email` varchar(100) NOT NULL,
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
  ADD KEY `download_id_fk` (`against_download_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `reference_data`
--
ALTER TABLE `reference_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_note`
--
ALTER TABLE `seller_note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `seller_note_attachments`
--
ALTER TABLE `seller_note_attachments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `seller_note_reported`
--
ALTER TABLE `seller_note_reported`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seller_note_review`
--
ALTER TABLE `seller_note_review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `download_ibfk_3` FOREIGN KEY (`downloader`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `download_ibfk_4` FOREIGN KEY (`ispaid`) REFERENCES `reference_data` (`id`);

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
  ADD CONSTRAINT `seller_note_reported_ibfk_2` FOREIGN KEY (`reportedby_id`) REFERENCES `download` (`id`),
  ADD CONSTRAINT `seller_note_reported_ibfk_3` FOREIGN KEY (`against_download_id`) REFERENCES `download` (`id`);

--
-- Constraints for table `seller_note_review`
--
ALTER TABLE `seller_note_review`
  ADD CONSTRAINT `seller_note_review_ibfk_1` FOREIGN KEY (`note_id`) REFERENCES `seller_note` (`id`),
  ADD CONSTRAINT `seller_note_review_ibfk_2` FOREIGN KEY (`reviewby_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `seller_note_review_ibfk_3` FOREIGN KEY (`againstby_id`) REFERENCES `download` (`id`);

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
