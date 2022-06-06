-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 06, 2022 at 03:48 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mhazarat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `recycle` int(11) DEFAULT NULL COMMENT '0=not delete\r\n1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `department_name`, `recycle`) VALUES
(1, 'کارگێڕی بانکەکان', 0),
(2, 'کارگێڕی کار', 0),
(3, 'ژمێریاری', 0),
(4, 'سیستەمەکانى کارپێکردن و کۆنترۆڵکردنى نەوت', 0),
(5, 'پەیوەندییەگشتییەکان و بەبازارکردن', 0),
(6, 'تەکنۆلۆجیای زانیاری', 0),
(7, 'تەکنۆلۆجیای زانیاری / ئێواران', 0),
(8, 'کارگێڕی کار/ئێواران', 0),
(9, 'abc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_daily_info`
--

CREATE TABLE `tb_daily_info` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `stage` int(11) DEFAULT NULL,
  `week` varchar(255) DEFAULT NULL,
  `num_week` int(11) DEFAULT NULL,
  `day` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `lesson_name` varchar(255) DEFAULT NULL,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `note` text DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_daily_info`
--

INSERT INTO `tb_daily_info` (`id`, `teacher_id`, `fullname`, `department`, `stage`, `week`, `num_week`, `day`, `date`, `lesson_name`, `start_time`, `end_time`, `note`, `year`) VALUES
(1774, 5, 'زانا عثمان حمد', 'کارگێڕی کار', 1, 'Fri', 21, '27', '2022-05-27', 'Database Concepts', '01:00:00', '03:00:00', '', 2022),
(1775, 5, 'زانا عثمان حمد', 'کارگێڕی کار', 1, 'Fri', 21, '27', '2022-05-27', 'Database Concepts', '01:00:00', '02:00:00', '', 2022),
(1776, 5, 'زانا عثمان حمد', 'کارگێڕی کار', 1, 'Fri', 21, '27', '2022-05-27', 'Database Concepts', '01:00:00', '07:00:00', '', 2022);

-- --------------------------------------------------------

--
-- Table structure for table `tb_days`
--

CREATE TABLE `tb_days` (
  `id` int(11) NOT NULL,
  `day` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_days`
--

INSERT INTO `tb_days` (`id`, `day`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(8, 8),
(9, 9),
(10, 10),
(11, 11),
(12, 12),
(13, 13),
(14, 14),
(15, 15),
(16, 16),
(17, 17),
(18, 18),
(19, 19),
(20, 20),
(21, 21),
(22, 22),
(23, 23),
(24, 24),
(25, 25),
(26, 26),
(27, 27),
(28, 28),
(29, 29),
(30, 31);

-- --------------------------------------------------------

--
-- Table structure for table `tb_departments`
--

CREATE TABLE `tb_departments` (
  `id` int(11) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `recycle` int(11) DEFAULT NULL COMMENT '0=not delete\r\n1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_departments`
--

INSERT INTO `tb_departments` (`id`, `department_name`, `recycle`) VALUES
(1, 'کارگێڕی بانکەکان', 0),
(2, 'کارگێڕی کار', 0),
(3, 'ژمێریاری', 0),
(4, 'سیستەمەکانى کارپێکردن و کۆنترۆڵکردنى نەوت', 0),
(5, 'پەیوەندییەگشتییەکان و بەبازارکردن', 0),
(6, 'تەکنۆلۆجیای زانیاری', 0),
(7, 'تەکنۆلۆجیای زانیاری / ئێواران', 0),
(8, 'کارگێڕی کار/ئێواران', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_lessons`
--

CREATE TABLE `tb_lessons` (
  `id` int(11) NOT NULL,
  `lesson` varchar(255) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `recycle` int(10) UNSIGNED DEFAULT NULL COMMENT '0 = not delete\r\n1= deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lessons`
--

INSERT INTO `tb_lessons` (`id`, `lesson`, `department_id`, `recycle`) VALUES
(2, 'IT', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sign`
--

CREATE TABLE `tb_sign` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_sign`
--

INSERT INTO `tb_sign` (`id`, `fullname`, `role`) VALUES
(1, '\r\nفرمان حسین احمد', 'بڕیاردەری بەش'),
(2, '\r\nهێمن ابراهیم قادر', 'سەرؤکی بەش'),
(3, 'بێشوار عباس عمر', 'دارای'),
(4, 'محمد محمود عبدالله', 'زانستی'),
(5, 'حسن حمد حسن', 'وردبینی'),
(6, 'پ.ى.د.کاوە عبدالرضا محمد', 'ڕاگر');

-- --------------------------------------------------------

--
-- Table structure for table `tb_teachers`
--

CREATE TABLE `tb_teachers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `certificate` varchar(255) NOT NULL,
  `nickname` varchar(255) NOT NULL,
  `a_houer_on_week` varchar(255) NOT NULL,
  `research` int(11) NOT NULL,
  `one_houer_money` varchar(255) NOT NULL,
  `contract` int(11) NOT NULL COMMENT '0=yes\r\n1=no',
  `one_day_money` varchar(255) NOT NULL,
  `recycle` int(11) NOT NULL COMMENT '0=delete\r\n0=not delete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_teachers`
--

INSERT INTO `tb_teachers` (`id`, `fullname`, `certificate`, `nickname`, `a_houer_on_week`, `research`, `one_houer_money`, `contract`, `one_day_money`, `recycle`) VALUES
(1, 'فرمان حسین احمد', 'بکالۆریۆس', '', '12', 0, '2500', 0, '0', 1),
(2, 'زانا عثمان حمد', '0', '', '12', 0, '3500', 0, '0', 1),
(3, 'rebinrafiqsalih', '0', 'rebin', '11', 12, '3500', 1, '0', 1),
(4, 'فرمان حسین احمد', '0', '', '10', 0, '3500', 0, '170000', 0),
(5, 'زانا عثمان حمد', '0', '', '10', 4, '3000', 0, '100000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_times`
--

CREATE TABLE `tb_times` (
  `id` int(11) NOT NULL,
  `times` time DEFAULT NULL,
  `time_type` varchar(10) DEFAULT NULL,
  `recycle` int(11) DEFAULT NULL COMMENT '0=not delete\r\n1=deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_times`
--

INSERT INTO `tb_times` (`id`, `times`, `time_type`, `recycle`) VALUES
(8, '08:30:00', 'AM', NULL),
(9, '09:00:00', 'AM', NULL),
(10, '09:30:00', 'AM', NULL),
(11, '10:00:00', 'PM', NULL),
(12, '10:30:00', 'PM', NULL),
(13, '11:00:00', 'PM', NULL),
(14, '11:30:00', 'PM', NULL),
(15, '12:00:00', 'PM', NULL),
(16, '12:30:00', 'PM', NULL),
(17, '01:00:00', 'PM', NULL),
(18, '01:30:00', 'PM', NULL),
(19, '02:00:00', 'PM', NULL),
(20, '02:30:00', 'PM', NULL),
(21, '03:00:00', 'PM', NULL),
(22, '03:30:00', 'PM', NULL),
(23, '04:00:00', 'PM', NULL),
(24, '04:30:00', 'PM', NULL),
(25, '05:00:00', 'PM', NULL),
(26, '05:30:00', 'PM', NULL),
(27, '06:00:00', 'PM', NULL),
(28, '06:30:00', 'PM', NULL),
(29, '07:00:00', 'PM', NULL),
(31, '07:30:00', 'PM', NULL),
(32, '01:55:12', 'AM', 0),
(33, '06:00:12', 'AM', 0),
(34, '05:05:00', 'PM', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `bio` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `recycle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `bio`, `user_image`, `recycle`) VALUES
(30, 'rebinrafiq', 'ali@gmail.com', '123', 'ڕێبین', 'ڕفیق', 'سڵاو من ناوم ڕێبینە', 'user.png', 1),
(31, 'rebinrafiq', 'rebinrafiq@gmail.com', '123', 'Rebin', 'Rafiq', '', '', 0),
(32, 'ahmadmhamad', 'ahmadmhamad@gmail.com', '123', 'ahmad', 'mhamad', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_years`
--

CREATE TABLE `tb_years` (
  `id` int(11) NOT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_years`
--

INSERT INTO `tb_years` (`id`, `year`) VALUES
(1, 2016),
(2, 2017),
(3, 2018),
(4, 2019),
(5, 2020),
(6, 2021),
(7, 2022),
(8, 2023);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_daily_info`
--
ALTER TABLE `tb_daily_info`
  ADD PRIMARY KEY (`id`,`teacher_id`) USING BTREE,
  ADD KEY `a to b` (`teacher_id`);

--
-- Indexes for table `tb_days`
--
ALTER TABLE `tb_days`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_departments`
--
ALTER TABLE `tb_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_lessons`
--
ALTER TABLE `tb_lessons`
  ADD PRIMARY KEY (`id`),
  ADD KEY `department&lesson` (`department_id`);

--
-- Indexes for table `tb_sign`
--
ALTER TABLE `tb_sign`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_teachers`
--
ALTER TABLE `tb_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_times`
--
ALTER TABLE `tb_times`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_years`
--
ALTER TABLE `tb_years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_daily_info`
--
ALTER TABLE `tb_daily_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1777;

--
-- AUTO_INCREMENT for table `tb_days`
--
ALTER TABLE `tb_days`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tb_departments`
--
ALTER TABLE `tb_departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_lessons`
--
ALTER TABLE `tb_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_sign`
--
ALTER TABLE `tb_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_teachers`
--
ALTER TABLE `tb_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_times`
--
ALTER TABLE `tb_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tb_years`
--
ALTER TABLE `tb_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_lessons`
--
ALTER TABLE `tb_lessons`
  ADD CONSTRAINT `department&lesson` FOREIGN KEY (`department_id`) REFERENCES `tb_departments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
