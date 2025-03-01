-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220510.314f251104
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2025 at 07:50 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db-project`
--

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `obj_id` int(10) NOT NULL,
  `obj_name` varchar(50) NOT NULL,
  `obj_price` int(10) NOT NULL,
  `obj_date` date NOT NULL,
  `own_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`obj_id`, `obj_name`, `obj_price`, `obj_date`, `own_id`) VALUES
(1, 'li', 5000, '2025-02-13', 3),
(4, 'l', 20, '2025-03-05', 1),
(5, 'o', 205, '2025-03-11', 2),
(6, 'oi', 2051, '2025-03-24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `own_id` int(10) NOT NULL,
  `own_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`own_id`, `own_name`) VALUES
(1, 'สาขาชีววิทยา'),
(2, 'สาขาเคมีวิทยา'),
(3, 'สาขาคอมพิวเตอร์'),
(4, 'สาขาคณิตศาสตร์');

-- --------------------------------------------------------

--
-- Table structure for table `telephone`
--

CREATE TABLE `telephone` (
  `phone_id` int(10) NOT NULL,
  `phone_name` varchar(50) NOT NULL,
  `phone_contract` varchar(12) NOT NULL,
  `own_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `telephone`
--

INSERT INTO `telephone` (`phone_id`, `phone_name`, `phone_contract`, `own_id`) VALUES
(8, 'hohi', '7777777777', 1),
(9, 'jiodjoa', '7779999999', 1),
(13, 'asd', '5555555555', 3),
(14, 'asd', '5555555555', 3),
(15, 'asd', '5555555555', 3),
(20, 'd', '4566666666', 2),
(21, 'asddd', '1235468784', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`obj_id`),
  ADD KEY `obj_owner_id` (`own_id`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`own_id`);

--
-- Indexes for table `telephone`
--
ALTER TABLE `telephone`
  ADD PRIMARY KEY (`phone_id`),
  ADD KEY `owner_id` (`own_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `obj_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `own_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `telephone`
--
ALTER TABLE `telephone`
  MODIFY `phone_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `objects`
--
ALTER TABLE `objects`
  ADD CONSTRAINT `obj_owner_id` FOREIGN KEY (`own_id`) REFERENCES `owner` (`own_id`);

--
-- Constraints for table `telephone`
--
ALTER TABLE `telephone`
  ADD CONSTRAINT `owner_id` FOREIGN KEY (`own_id`) REFERENCES `owner` (`own_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



