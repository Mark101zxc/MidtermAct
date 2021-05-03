-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2021 at 04:02 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loginpage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('ADMIN', 'ADMIN123');

-- --------------------------------------------------------

--
-- Table structure for table `authe_code`
--

CREATE TABLE `authe_code` (
  `user_id` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `code` int(100) NOT NULL,
  `created` date NOT NULL,
  `expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authe_code`
--

INSERT INTO `authe_code` (`user_id`, `user_email`, `code`, `created`, `expiration`) VALUES
(1, 'MarkAntipala102@gmail.com', 0, '0000-00-00', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `expired` varchar(10) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `codes`
--

INSERT INTO `codes` (`id`, `code`, `user_email`, `created`, `expired`) VALUES
(1, 370506, 'Mark2', '2021-04-30 12:01:17', '12:06:17'),
(2, 928899, 'Mark7', '2021-04-30 12:04:35', '12:09:35'),
(3, 599415, 'Mark2', '2021-04-30 10:01:24', '10:06:24'),
(4, 790913, 'Mark2', '2021-04-30 10:04:33', '10:09:33'),
(5, 140515, 'Mark2', '2021-04-30 10:14:21', '10:19:21'),
(6, 401434, 'Mark2', '2021-04-30 10:20:23', '10:25:23'),
(7, 449459, 'Mark2', '2021-04-30 10:25:00', '10:30:00'),
(8, 440366, 'Mark2', '2021-04-30 10:26:32', '10:31:32'),
(9, 733491, 'Mark2', '2021-04-30 10:28:18', '10:33:18'),
(10, 527260, 'Mark2', '2021-04-30 10:29:31', '10:34:31'),
(11, 494161, 'Mark2', '2021-04-30 10:36:12', '10:41:12'),
(12, 312696, 'Mark2', '2021-04-30 10:37:28', '10:42:28'),
(13, 817656, 'Mark2', '2021-04-30 10:57:31', '11:02:31'),
(14, 259163, 'Mark2', '2021-04-30 10:59:46', '11:04:46'),
(15, 180655, 'Mark2', '2021-04-30 11:04:28', '11:09:28'),
(16, 323667, 'Mark2', '2021-04-30 11:44:09', '11:49:09'),
(17, 243923, 'Mark2', '2021-04-30 11:49:44', '11:54:44'),
(18, 565542, 'Mark2', '2021-04-30 11:55:38', '12:00:38'),
(19, 441933, 'Mark2', '2021-04-30 11:56:46', '12:01:46'),
(20, 873913, 'Mark2', '2021-04-30 11:57:51', '12:02:51'),
(21, 256493, 'Mark2', '2021-04-30 11:59:16', '12:04:16'),
(22, 482559, 'Mark2', '2021-05-01 12:01:02', '12:06:02'),
(23, 909939, 'Mark2', '2021-05-01 12:06:14', '12:11:14'),
(24, 957966, 'Mark2', '2021-05-01 12:07:01', '12:12:01'),
(25, 380247, 'Mark2', '2021-05-01 12:08:32', '12:13:32'),
(26, 661357, 'Mark7', '2021-05-01 10:07:57', '10:12:57'),
(27, 861603, 'Mark2', '2021-05-01 11:13:00', '11:18:00'),
(28, 329080, 'Mark7', '2021-05-01 11:17:18', '11:22:18'),
(29, 581075, 'Mark2', '2021-05-01 11:47:41', '11:52:41'),
(30, 376744, 'Mark2', '2021-05-01 11:48:28', '11:53:28'),
(31, 770135, 'Mark7', '2021-05-01 11:50:52', '11:55:52'),
(32, 261594, 'Mark1', '2021-05-01 09:43:00', '09:48:00'),
(33, 680906, 'Mark101', '2021-05-01 10:12:19', '10:17:19'),
(34, 302138, 'Mark101', '2021-05-01 10:24:23', '10:29:23'),
(35, 262129, 'Mark101', '2021-05-01 10:30:01', '10:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `rescode`
--

CREATE TABLE `rescode` (
  `id` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rescode`
--

INSERT INTO `rescode` (`id`, `code`, `email`) VALUES
(19, '1608d3f020c501', ''),
(20, '1608d3f164f727', ''),
(25, '1608d4591b6395', 'MarkAntipala101@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `usersreg`
--

CREATE TABLE `usersreg` (
  `user_id` int(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usersreg`
--

INSERT INTO `usersreg` (`user_id`, `username`, `email`, `password`) VALUES
(6, 'Mark2', 'Mark@gmail.com', 'Markjason22%'),
(7, 'Mark12', 'Mark@gmail.com', 'Bsit3brocks%'),
(12, 'Mark1', 'MarkAntipala101@gmail.com', 'Akosimark22%00'),
(14, 'Mark101', 'MarkAntipala103@gmail.com', 'Markjasonit3b22%');

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `activity_logs` varchar(100) NOT NULL,
  `date_logs` date NOT NULL,
  `time_logs` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`id`, `username`, `activity_logs`, `date_logs`, `time_logs`) VALUES
(23, 'Mark1', 'Just Logged in', '2021-05-01', '09:43:09'),
(24, 'Mark1', 'Just Log Out', '2021-05-01', '09:43:20'),
(25, 'Mark1', 'Reset Password', '2021-05-01', '09:46:53'),
(36, 'Mark101', 'Just Logged in', '2021-05-01', '10:25:02'),
(37, 'Mark101', 'Just Log Out', '2021-05-01', '10:25:50'),
(38, 'Mark101', 'Reset Password', '2021-05-01', '10:28:08'),
(39, 'Mark101', 'Just Logged in', '2021-05-01', '10:30:17'),
(40, 'Mark101', 'Just Log Out', '2021-05-01', '10:30:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authe_code`
--
ALTER TABLE `authe_code`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rescode`
--
ALTER TABLE `rescode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usersreg`
--
ALTER TABLE `usersreg`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authe_code`
--
ALTER TABLE `authe_code`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `rescode`
--
ALTER TABLE `rescode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `usersreg`
--
ALTER TABLE `usersreg`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
