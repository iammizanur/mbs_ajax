-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2020 at 06:42 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `account_id` int(11) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `current_balance` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`account_id`, `account_no`, `customer_id`, `current_balance`) VALUES
(2, '100001', 2, 1240),
(3, '100002', 2, 156),
(5, '100003', 4, 506),
(6, '100004', 2, 60),
(7, '100005', 2, 19),
(8, '100006', 2, 0),
(9, '100007', 2, 0),
(10, '100008', 2, 0),
(11, '100009', 2, 0),
(12, '100010', 2, 0),
(13, '100011', 2, 0),
(14, '100012', 2, 0),
(15, '100013', 2, 0),
(16, '100014', 2, 0),
(18, '100015', 2, 0),
(19, '100016', 2, 0),
(20, '100017', 2, 0),
(21, '100018', 2, 0),
(22, '100019', 2, 0),
(23, '100020', 2, 0),
(24, '100021', 2, 0),
(25, '100022', 2, 0),
(26, '100023', 2, 0),
(27, '100024', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `first_name`, `last_name`, `email`, `password`) VALUES
(2, 'sazzadur', 'rahman', 'sam@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(3, 'a', 's', 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(4, 'alif', 'rk', 'alif@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Table structure for table `nomeinee`
--

CREATE TABLE `nomeinee` (
  `id` int(11) NOT NULL,
  `nomeinee_name` varchar(50) NOT NULL,
  `relation` varchar(20) NOT NULL,
  `nid` varchar(25) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nomeinee`
--

INSERT INTO `nomeinee` (`id`, `nomeinee_name`, `relation`, `nid`, `account_no`, `c_id`) VALUES
(2, 'alif', 'friend', '123456789', '100001', 2),
(5, 'tmi', 'b', '1', '100004', 2),
(11, 'ami', 'c', '1', '100015', 2);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_info`
--

CREATE TABLE `transfer_info` (
  `id` int(11) NOT NULL,
  `from_account_no` varchar(50) NOT NULL,
  `to_account_no` varchar(50) NOT NULL,
  `t_amount` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transfer_info`
--

INSERT INTO `transfer_info` (`id`, `from_account_no`, `to_account_no`, `t_amount`) VALUES
(1, '100001', '100002', 50),
(2, '100001', '100004', 40),
(3, '100002', '100001', 30);

-- --------------------------------------------------------

--
-- Table structure for table `transjection_info`
--

CREATE TABLE `transjection_info` (
  `transjection_id` int(11) NOT NULL,
  `account_no` varchar(50) NOT NULL,
  `amount` double NOT NULL,
  `status` varchar(11) NOT NULL,
  `transjection_date` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transjection_info`
--

INSERT INTO `transjection_info` (`transjection_id`, `account_no`, `amount`, `status`, `transjection_date`) VALUES
(1, '100003', 50, 'Deposit', '06-01-20'),
(2, '100003', 456, 'Deposit', '06-01-20'),
(3, '100001', 1000, 'Deposit', '06-01-20'),
(4, '100001', 50, 'Deposit', '07-01-20'),
(5, '100001', 50, 'Deposit', '07-01-20'),
(6, '100002', 40, 'Deposit', '07-01-20'),
(7, '100004', 12, 'Deposit', '07-01-20'),
(8, '100002', 300, 'Deposit', '07-01-20'),
(9, '100001', 200, 'Deposit', '07-01-20'),
(10, '100001', 43, 'Deposit', '07-01-20'),
(11, '100001', 20, 'Deposit', '07-01-20'),
(12, '100001', 60, 'Deposit', '07-01-20'),
(13, '100001', 100, 'Deposit', '07-01-20'),
(14, '100001', 100, 'Withdrow', '07-01-20'),
(15, '100002', 300, 'Withdrow', '07-01-20'),
(16, '100001', 100, 'OUT', '07-01-20'),
(17, '100002', 100, 'IN', '07-01-20'),
(18, '100002', 10, 'OUT', '07-01-20'),
(19, '100001', 10, 'IN', '07-01-20'),
(20, '100001', 12, 'OUT', '07-01-20'),
(21, '100004', 12, 'IN', '07-01-20'),
(22, '100001', 15, 'OUT', '07-01-20'),
(23, '100005', 15, 'IN', '07-01-20'),
(24, '100001', 6, 'OUT', '07-01-20'),
(25, '100002', 6, 'IN', '07-01-20'),
(26, '100004', 4, 'OUT', '09-01-20'),
(27, '100005', 4, 'IN', '09-01-20'),
(28, '100001', 50, 'OUT', '09-01-20'),
(29, '100002', 50, 'IN', '09-01-20'),
(30, '100001', 40, 'OUT', '09-01-20'),
(31, '100004', 40, 'IN', '09-01-20'),
(32, '100002', 30, 'OUT', '09-01-20'),
(33, '100001', 30, 'IN', '09-01-20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`account_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `nomeinee`
--
ALTER TABLE `nomeinee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transfer_info`
--
ALTER TABLE `transfer_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transjection_info`
--
ALTER TABLE `transjection_info`
  ADD PRIMARY KEY (`transjection_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nomeinee`
--
ALTER TABLE `nomeinee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `transfer_info`
--
ALTER TABLE `transfer_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transjection_info`
--
ALTER TABLE `transjection_info`
  MODIFY `transjection_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
