-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 09:42 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hor`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `username` varchar(24) NOT NULL,
  `password` varchar(24) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `name`, `username`, `password`) VALUES
(1, 'Administrator', 'Admin', 'admin'),
(2, 'Oishi Salowa', 'Oishi', 'oishi'),
(3, 'Punno', 'punno', 'punno'),
(5, 'test', 'testing', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `guest`
--

CREATE TABLE `guest` (
  `guest_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `address` varchar(50) NOT NULL,
  `contactno` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `guest`
--

INSERT INTO `guest` (`guest_id`, `firstname`, `middlename`, `lastname`, `address`, `contactno`) VALUES
(1, 'jainna ', 'janina', 'janina', 'Azampur', '01316179030a'),
(2, 'MD. ZAHIDUL', 'Zahidul', 'ISLAM', '7136 S. YALE AVE., SUITE 100', 'aaaaaaaaa'),
(3, 'Md.', 'Zahidul', 'Islam', 'Azampur', '01316179030'),
(4, 'test', 'test', 'test', 'test', 'test'),
(5, 'test', 'test', 'test', 'test', 'test'),
(6, 'MD. ZAHIDUL', '', 'ISLAM', '7136 S. YALE AVE., SUITE 100', 'test'),
(7, 't', 't', 't', 't', 't'),
(8, 'final', 'final', 'final', 'final', 'final'),
(9, 'final', 'final', 'final', 'final', 'final'),
(10, 'fi', 'fi', 'fi', 'fi', 'fi'),
(11, 'Khadiza', '', 'Punno', 'Dhaka', '123456789'),
(12, 'Shurma', 'Zahidul', 'Islam', 'State1717, State1716', 'egfrg'),
(13, 'Shurma', 'Zahidul', 'Islam', 'State1717, State1716', 'egfrg'),
(14, 'Md.', 'Zahidul', 'Islam', 'State1717, State1716', 'egfrg'),
(15, 'trtr', 'rt', 'trt', 'rt', 'trt'),
(16, 'se', 'se', 'se', 'se', 'se'),
(17, 'MD. ZAHIDUL', '', 'ISLAM', '7136 S. YALE AVE., SUITE 100', 'dvfrevgrbgr'),
(18, 'dee', 'dee', 'dee', 'dee', 'dee'),
(19, 'MD. ZAHIDUL', 'Zahidul', 'ISLAM', '7136 S. YALE AVE., SUITE 100', '01878658595'),
(20, 'Khadiza', 'begum', 'Lucky', 'Dhaka', '01878658595'),
(21, 'Abul', 'Khayer', 'Dheutin', 'Dhaka', '01878658595');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_id` int(11) NOT NULL,
  `room_name` varchar(255) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `price` varchar(11) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_name`, `room_type`, `price`, `photo`) VALUES
(1, '', 'Standard', '2000', '1.jpg'),
(2, '', 'Superior', '2400', '3.jpg'),
(3, '', 'Super Deluxe', '2800', '4.jpg'),
(4, '', 'Jr. Suite', '3800', '5.jpg'),
(5, '', 'Executive Suite', '4000', '6.jpg'),
(7, '', 'Standard', '6000', 'istockphoto-1415886887-612x612.jpg'),
(8, 'TEst Room Name', 'Super Deluxe', '15', 'room1.jpg'),
(9, 'test', 'Superior', '50', 'room2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transaction_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_no` int(5) NOT NULL,
  `extra_bed` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `days` int(2) NOT NULL,
  `checkin` date NOT NULL,
  `checkin_time` time NOT NULL,
  `checkout` date NOT NULL,
  `checkout_time` time NOT NULL,
  `bill` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transaction_id`, `guest_id`, `room_id`, `room_no`, `extra_bed`, `status`, `days`, `checkin`, `checkin_time`, `checkout`, `checkout_time`, `bill`) VALUES
(1, 1, 2, 20, 1, 'Check Out', 2, '2025-02-15', '02:02:53', '2025-02-13', '02:03:47', '5600'),
(3, 3, 6, 12, 0, 'Check Out', 1, '2025-02-23', '04:08:10', '2025-02-12', '04:28:49', '5200'),
(6, 6, 4, 7, 0, 'Check Out', 1, '2025-02-12', '04:27:16', '2025-02-12', '04:29:00', '3800'),
(7, 7, 1, 13, 0, 'Check Out', 3, '2025-02-15', '04:19:26', '2025-02-14', '04:28:54', '6000'),
(10, 10, 5, 5, 1, 'Check Out', 5, '2025-02-13', '04:38:45', '2025-02-16', '04:38:53', '20800'),
(11, 11, 6, 19, 0, 'Check Out', 2, '2025-03-01', '02:49:35', '2025-02-14', '02:50:13', '10400'),
(12, 12, 6, 43, 0, 'Check In', 1, '2025-02-15', '07:46:21', '2025-02-14', '00:00:00', '5200'),
(13, 13, 6, 0, 0, 'Pending', 0, '2025-02-14', '00:00:00', '0000-00-00', '00:00:00', ''),
(14, 14, 8, 7, 0, 'Check In', 1, '2025-02-14', '08:29:35', '2025-02-15', '00:00:00', '15'),
(15, 15, 7, 2, 0, 'Check In', 2, '2025-02-15', '21:00:58', '2025-02-16', '00:00:00', '12000'),
(16, 16, 9, 50, 0, 'Check Out', 1, '2025-02-15', '08:39:01', '2025-02-15', '21:24:03', '50'),
(17, 17, 1, 0, 0, 'Pending', 0, '2025-02-26', '00:00:00', '0000-00-00', '00:00:00', ''),
(18, 18, 4, 0, 0, 'Pending', 0, '2025-02-15', '00:00:00', '0000-00-00', '00:00:00', ''),
(19, 19, 5, 0, 0, 'Pending', 0, '2025-03-24', '00:00:00', '0000-00-00', '00:00:00', ''),
(20, 20, 4, 50, 0, 'Check In', 4, '2025-04-18', '06:21:39', '2025-04-20', '00:00:00', '15200'),
(21, 21, 4, 0, 0, 'Pending', 0, '2025-04-26', '00:00:00', '0000-00-00', '00:00:00', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `guest`
--
ALTER TABLE `guest`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transaction_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `guest`
--
ALTER TABLE `guest`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
