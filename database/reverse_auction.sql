-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 18, 2022 at 06:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reverse_auction`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ad_id` int(11) NOT NULL,
  `ad_username` varchar(50) DEFAULT NULL,
  `ad_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ad_id`, `ad_username`, `ad_password`) VALUES
(1, 'admin@rua.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `lg_id` int(11) NOT NULL,
  `lg_urid` int(11) DEFAULT NULL,
  `lg_type` varchar(20) DEFAULT NULL,
  `lg_uname` varchar(100) DEFAULT NULL,
  `lg_password` varchar(100) DEFAULT NULL,
  `lg_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pd_id` int(11) NOT NULL,
  `pc_id` int(11) DEFAULT NULL,
  `pd_name` varchar(50) DEFAULT NULL,
  `pd_amount` int(11) DEFAULT NULL,
  `pd_bidamount` int(11) DEFAULT NULL,
  `pd_startdate` date DEFAULT NULL,
  `pd_enddate` date DEFAULT NULL,
  `pd_startingtime` time DEFAULT NULL,
  `pd_endingtime` time DEFAULT NULL,
  `pd_uniquebidderid` int(11) DEFAULT NULL,
  `pd_uniquebidamount` int(11) DEFAULT NULL,
  `pd_status` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pd_id`, `pc_id`, `pd_name`, `pd_amount`, `pd_bidamount`, `pd_startdate`, `pd_enddate`, `pd_startingtime`, `pd_endingtime`, `pd_uniquebidderid`, `pd_uniquebidamount`, `pd_status`) VALUES
(48, 21, 'OnePlus Y Series 80 cm (32 inches) HD Ready LED Sm', 19999, 75, '2022-03-01', '2022-03-31', '10:00:00', '13:00:00', 0, 0, 'new'),
(49, 24, 'Samsung Galaxy A12 (Black, 128 GB) (6 GB RAM)', 17999, 60, '2022-01-18', '2022-01-23', '12:00:00', '16:00:00', 0, 0, 'new'),
(50, 25, 'Whirlpool 7 kg 5 Star Fully-Automatic Top Loading ', 20200, 100, '2022-01-28', '2022-02-07', '22:00:00', '12:30:00', 0, 0, 'new'),
(51, 31, 'Prestige Hand Mixer PHM 2.0,300 W, Purple', 2675, 25, '2022-01-20', '2022-02-14', '23:00:00', '17:45:00', 0, 0, 'new'),
(52, 30, 'boAt Xtend Smartwatch with Alexa Built-in', 5999, 40, '2022-01-30', '2022-01-20', '09:15:00', '20:30:00', 0, 0, 'new'),
(53, 32, 'Redmi Smart Band (Black Strap, Size : Regular)', 2099, 20, '2022-02-01', '2022-02-26', '08:45:00', '18:15:00', 0, 0, 'new'),
(54, 27, 'Realme 10000 mAh Power Bank (Fast Charging, 30 W) ', 1899, 15, '2022-01-19', '2022-01-21', '07:00:00', '23:30:00', 0, 0, 'new'),
(55, 28, 'SanDisk Ultra 32 GB MicroSDHC Class 10 98 MB/s ', 1000, 15, '2022-01-21', '2022-02-11', '11:45:00', '22:15:00', 0, 0, 'new'),
(56, 26, 'Lenovo Tab K10 FHD 3 GB RAM (Abyss Blue)', 25000, 120, '2022-02-25', '2022-03-20', '00:00:00', '10:30:00', 0, 0, 'new'),
(57, 29, 'LG WW174NPC 8 L RO + UV + MB Water Purifier ', 29499, 125, '2022-02-16', '2022-03-10', '13:30:00', '13:30:00', 0, 0, 'new');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `pc_id` int(11) NOT NULL,
  `pc_name` varchar(50) NOT NULL,
  `psc_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`pc_id`, `pc_name`, `psc_name`) VALUES
(21, 'Home Appliances', 'Television'),
(24, 'Mobiles&Tabs', 'Mobiles'),
(25, 'Home Appliances', 'Washing Machine'),
(26, 'Mobiles&Tabs', 'Tabs'),
(27, 'Mobile Accessories', 'Power Bank'),
(28, 'Mobile Accessories', 'Memory Cards'),
(29, 'Kitchen Accessories', 'Water Purifiers'),
(30, 'Lifestyle Products', 'Smart Watches'),
(31, 'Kitchen Accessories', 'Hand Blenders'),
(32, 'Lifestyle Products', 'Fitness Bands');

-- --------------------------------------------------------

--
-- Table structure for table `product_reversebidding`
--

CREATE TABLE `product_reversebidding` (
  `rb_id` int(11) NOT NULL,
  `pd_id` int(11) DEFAULT NULL,
  `ur_id` int(11) DEFAULT NULL,
  `rb_bidamount` int(11) DEFAULT NULL,
  `rb_bidcost` int(11) DEFAULT NULL,
  `rb_biddate` date DEFAULT NULL,
  `rb_bidtime` time DEFAULT NULL,
  `rb_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ur_id` int(11) NOT NULL,
  `ur_name` varchar(50) DEFAULT NULL,
  `ur_emailid` varchar(100) DEFAULT NULL,
  `ur_mobile` varchar(50) DEFAULT NULL,
  `ur_balance` int(11) DEFAULT NULL,
  `ur_password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userwallet`
--

CREATE TABLE `userwallet` (
  `uw_id` int(11) NOT NULL,
  `ur_id` int(11) DEFAULT NULL,
  `uw_amount` int(11) DEFAULT NULL,
  `uw_date` date DEFAULT NULL,
  `uw_status` varchar(50) DEFAULT NULL,
  `uw_purpose` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`lg_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pd_id`),
  ADD KEY `pc_id` (`pc_id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`pc_id`);

--
-- Indexes for table `product_reversebidding`
--
ALTER TABLE `product_reversebidding`
  ADD PRIMARY KEY (`rb_id`),
  ADD KEY `pd_id` (`pd_id`),
  ADD KEY `ur_id` (`ur_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ur_id`);

--
-- Indexes for table `userwallet`
--
ALTER TABLE `userwallet`
  ADD PRIMARY KEY (`uw_id`),
  ADD KEY `ur_id` (`ur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `product_reversebidding`
--
ALTER TABLE `product_reversebidding`
  MODIFY `rb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `userwallet`
--
ALTER TABLE `userwallet`
  MODIFY `uw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`pc_id`) REFERENCES `product_category` (`pc_id`);

--
-- Constraints for table `product_reversebidding`
--
ALTER TABLE `product_reversebidding`
  ADD CONSTRAINT `product_reversebidding_ibfk_1` FOREIGN KEY (`pd_id`) REFERENCES `product` (`pd_id`),
  ADD CONSTRAINT `product_reversebidding_ibfk_2` FOREIGN KEY (`ur_id`) REFERENCES `user` (`ur_id`);

--
-- Constraints for table `userwallet`
--
ALTER TABLE `userwallet`
  ADD CONSTRAINT `userwallet_ibfk_1` FOREIGN KEY (`ur_id`) REFERENCES `user` (`ur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
