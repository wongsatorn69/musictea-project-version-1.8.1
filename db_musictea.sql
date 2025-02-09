-- phpMyAdmin SQL Dump
-- version 5.3.0-dev+20220510.314f251104
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2025 at 08:37 AM
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
-- Database: `db_musictea`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `booking_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `booking_name` varchar(100) NOT NULL,
  `booking_people` int(2) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_time` time NOT NULL,
  `booking_time_out` time NOT NULL,
  `booking_phone` varchar(10) NOT NULL,
  `booking_staff` varchar(100) NOT NULL,
  `dateCreate` datetime NOT NULL,
  `booking_status` int(1) NOT NULL COMMENT '0 = ยังไม่มารับโต๊ะ , 1 = มารับโต๊ะแล้ว , 2 = เช็คบิลเรียบร้อย',
  `booking_bill` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`booking_id`, `table_id`, `booking_name`, `booking_people`, `booking_date`, `booking_time`, `booking_time_out`, `booking_phone`, `booking_staff`, `dateCreate`, `booking_status`, `booking_bill`) VALUES
(19, 8, 'เบ้ด', 4, '2024-11-30', '22:53:00', '22:53:00', '0918613980', '1234', '2024-11-30 20:53:50', 2, 55),
(24, 7, 'da', 5, '2025-02-08', '04:44:00', '04:44:00', '8888888888', '1234', '2025-02-08 23:37:05', 2, 44),
(25, 13, 'lll', 5, '2025-02-09', '04:44:00', '04:44:00', '8888888888', '1234', '2025-02-09 13:53:27', 2, 555),
(26, 17, '555ok', 1, '2025-02-09', '04:04:00', '04:04:00', '7777777777', '1234', '2025-02-09 13:57:49', 2, 33),
(27, 12, 'ghg', 4, '2025-02-09', '05:08:00', '05:08:00', '7999999999', '1234', '2025-02-09 13:58:43', 2, 888);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_table`
--

CREATE TABLE `tbl_table` (
  `id` int(11) NOT NULL,
  `table_name` varchar(50) NOT NULL,
  `table_status` int(1) NOT NULL COMMENT '0 =ว่าง , 1 = จอง , 2 = ยืนยันแล้ว',
  `table_type` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_table`
--

INSERT INTO `tbl_table` (`id`, `table_name`, `table_status`, `table_type`) VALUES
(1, '01', 0, 'A'),
(2, '02', 0, 'A'),
(3, '03', 0, 'A'),
(4, '04', 0, 'A'),
(5, '05', 0, 'A'),
(6, '06', 0, 'A'),
(7, '07', 0, 'A'),
(8, '08', 0, 'A'),
(9, '09', 0, 'A'),
(10, '10', 0, 'A'),
(11, '01', 0, 'B'),
(12, '02', 0, 'B'),
(13, '03', 0, 'B'),
(14, '04', 0, 'B'),
(15, '05', 0, 'B'),
(16, '06', 0, 'B'),
(17, '07', 0, 'B'),
(18, '08', 0, 'B'),
(19, '09', 0, 'B'),
(20, '10', 0, 'B');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_status` int(1) NOT NULL COMMENT '0 = แอดมิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_username`, `user_password`, `user_status`) VALUES
(1, '1234', '1234', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `table_id` (`table_id`);

--
-- Indexes for table `tbl_table`
--
ALTER TABLE `tbl_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tbl_table`
--
ALTER TABLE `tbl_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `table_id` FOREIGN KEY (`table_id`) REFERENCES `tbl_table` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;



