-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2023 at 10:04 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `farm`
--

-- --------------------------------------------------------

--
-- Table structure for table `device`
--

CREATE TABLE `device` (
  `device_id` int(11) NOT NULL,
  `subfarm_id` int(11) NOT NULL,
  `device_name` enum('den','bom nuoc','cam bien anh sang','cam bien nhiet do', 'do am','cam bien do am dat') DEFAULT NULL,
  `device_type` enum('input device','output device') DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `device`
--

INSERT INTO `device` (`device_id`, `subfarm_id`, `device_name`, `device_type`, `location`, `status`) VALUES
(1, 1, 'den', 'output device', '', '0'),
(2, 1, 'bom nuoc', 'output device', '', '0'),
(3, 1, 'cam bien anh sang', 'input device', '', '0'),
(4, 1, 'cam bien nhiet do', 'input device', '', '0'),
(5, 1, 'do am', 'input device', '', '0'),
(6, 1, 'cam bien do am dat', 'input device', '', '0');

-- --------------------------------------------------------

--
-- Table structure for table `farm`
--

CREATE TABLE `farm` (
  `farm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `farm_name` varchar(255) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farm`
--

INSERT INTO `farm` (`farm_id`, `user_id`, `farm_name`, `location`, `area`) VALUES
(1, 1, 'vuoncuadanh', 'gialai', '1km2');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `action_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `device_id` int(11) NOT NULL,
  `actor` enum('system','user','admin') DEFAULT 'system',
  `activity` enum('turn on','turn off') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `date_type` enum('everyday','once every 2 days','once every 3 days','once every 4 days','once every 5 days') DEFAULT 'everyday',
  `time_start` time NOT NULL,
  `time_end` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `device_id`, `date_type`, `time_start`, `time_end`) VALUES
(1, 1, 'everyday', '00:12:00', '00:16:00'),
(2, 2, 'once every 2 days', '13:15:00', '15:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `statistic`
--

CREATE TABLE `statistic` (
  `action_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `device_id` int(11) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subfarm`
--

CREATE TABLE `subfarm` (
  `subfarm_id` int(11) NOT NULL,
  `farm_id` int(11) NOT NULL,
  `subfarm_name` varchar(255) NOT NULL,
  `plant_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subfarm`
--

INSERT INTO `subfarm` (`subfarm_id`, `farm_id`, `subfarm_name`, `plant_name`) VALUES
(1, 1, 'Phân khu A', 'Cà phê'),
(2, 1, 'Phân khu B', 'Tiêu'),
(3, 1, 'Phân khu C', 'Điều');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `CCCD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `email`, `phone`, `address`, `CCCD`) VALUES
(1, 'danh', '1234567890danh', 'danh.tucongdanh@hcmut.edu.vn', '0123456789', 'gialai', '0123456789'),
(2, 'khai', '1234567890khai', 'khai@hcmut.edu.vn', '0123456788', 'gialai', '0123456788'),
(3, 'dat', '1234567890dat', 'dat@hcmut.edu.vn', '0123456787', 'gialai', '0123456787'),
(4, 'kien', '1234567890kien', 'kien@hcmut.edu.vn', '0123456786', 'gialai', '0123456786');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `device`
--
ALTER TABLE `device`
  ADD PRIMARY KEY (`device_id`),
  ADD KEY `device_ibfk_1` (`subfarm_id`);

--
-- Indexes for table `farm`
--
ALTER TABLE `farm`
  ADD PRIMARY KEY (`farm_id`),
  ADD KEY `farm_ibfk_1` (`user_id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`action_time`),
  ADD KEY `history_ibfk_1` (`device_id`);

--
-- Indexes for table `statistic`
--
ALTER TABLE `statistic`
  ADD PRIMARY KEY (`action_time`),
  ADD KEY `statistic_ibfk_1` (`device_id`);

--
-- Indexes for table `subfarm`
--
ALTER TABLE `subfarm`
  ADD PRIMARY KEY (`subfarm_id`),
  ADD KEY `subfarm_ibfk_1` (`farm_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `device`
--
ALTER TABLE `device`
  ADD CONSTRAINT `device_ibfk_1` FOREIGN KEY (`subfarm_id`) REFERENCES `subfarm` (`subfarm_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farm`
--
ALTER TABLE `farm`
  ADD CONSTRAINT `farm_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `statistic`
--
ALTER TABLE `statistic`
  ADD CONSTRAINT `statistic_ibfk_1` FOREIGN KEY (`device_id`) REFERENCES `device` (`device_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `subfarm`
--
ALTER TABLE `subfarm`
  ADD CONSTRAINT `subfarm_ibfk_1` FOREIGN KEY (`farm_id`) REFERENCES `farm` (`farm_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
