-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2021 at 01:18 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mhazarat`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_lessons`
--

CREATE TABLE `tb_lessons` (
  `id` int(11) NOT NULL,
  `lesson` varchar(255) DEFAULT NULL,
  `recycle` int(10) UNSIGNED DEFAULT NULL COMMENT '0 = not delete\r\n1= deleted'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_lessons`
--

INSERT INTO `tb_lessons` (`id`, `lesson`, `recycle`) VALUES
(3, 'Mobile Application', 0),
(4, 'Database Concepts', 0),
(5, 'Computer Network', 0),
(6, 'Inofrmation Security', 0),
(7, 'Visual Programing', 0),
(8, 'Computer', 0),
(9, 'قانون الخدمة المدنية', 0),
(10, 'Operating System Concepts', 0),
(11, 'Academic Debate', 0),
(12, 'Principle of Programing', 0),
(13, 'Internet Technology', 0),
(14, 'Information technology fundamental', 0),
(15, 'English Language', 0),
(16, 'Calculus', 0),
(17, 'Computer Organization & Logic Design', 0),
(19, 'IT', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sign`
--

CREATE TABLE `tb_sign` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
(1, 'فرمان حسین احمد', 'بکالۆریۆس', '', '12', 0, '2500', 0, '0', 0),
(2, 'زانا عثمان حمد', '2', '', '11', 0, '3500', 0, '0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_times`
--

CREATE TABLE `tb_times` (
  `id` int(11) NOT NULL,
  `times` time DEFAULT NULL,
  `time_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_times`
--

INSERT INTO `tb_times` (`id`, `times`, `time_type`) VALUES
(5, '08:30:00', 'AM'),
(6, '09:00:00', 'AM'),
(7, '09:30:00', 'AM'),
(8, '10:00:00', 'AM'),
(9, '10:30:00', 'AM'),
(10, '11:00:00', 'AM'),
(11, '11:30:00', 'PM'),
(12, '12:00:00', 'PM'),
(13, '12:30:00', 'PM'),
(14, '01:00:00', 'PM'),
(15, '01:30:00', 'PM'),
(16, '02:00:00', 'PM'),
(17, '02:30:00', 'PM'),
(18, '03:00:00', 'PM'),
(19, '03:30:00', 'PM'),
(20, '04:00:00', 'PM'),
(21, '04:30:00', 'PM'),
(22, '05:00:00', 'PM'),
(23, '05:30:00', 'PM'),
(24, '06:00:00', 'PM'),
(25, '06:30:00', 'PM'),
(26, '07:00:00', 'PM'),
(27, '07:30:00', 'PM'),
(28, '08:00:00', 'PM'),
(29, '08:30:00', 'PM'),
(31, NULL, NULL);

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
  `user_image` varchar(255) NOT NULL,
  `recycle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `username`, `email`, `password`, `first_name`, `last_name`, `user_image`, `recycle`) VALUES
(30, 'rebinrafiq', 'ali@gmail.com', '123', 'ali', 'mhamad', 'image-1.jpg', 1),
(31, 'rebinrafiq', 'rebinrafiq@gmail.com', '123', 'Rebin', 'Rafiq', '', 0),
(32, 'ahmadmhamad', 'ahmadmhamad@gmail.com', '123', 'ahmad', 'mhamad', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_lessons`
--
ALTER TABLE `tb_lessons`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_lessons`
--
ALTER TABLE `tb_lessons`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_sign`
--
ALTER TABLE `tb_sign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_teachers`
--
ALTER TABLE `tb_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_times`
--
ALTER TABLE `tb_times`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
