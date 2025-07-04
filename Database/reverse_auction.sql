-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 03:52 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

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

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`lg_id`, `lg_urid`, `lg_type`, `lg_uname`, `lg_password`, `lg_status`) VALUES
(13, 14, 'user', 'sreevidya@gmail.com', '12345', 'active'),
(14, 15, 'user', 'sweaba@gmail.com', '12345', 'active'),
(15, 16, 'user', 'aparna@gmail.com', '12345', 'active'),
(16, 17, 'user', 'melvin@gmail.com', '12345', 'active'),
(17, 18, 'user', 'helna@gmail.com', '12345', 'active'),
(18, 19, 'user', 'athulya@gmail.com', '12345', 'active'),
(19, 20, 'user', 'basil@gmail.com', '12345', 'active'),
(20, 21, 'user', 'deepak@gmail.com', '12345', 'active'),
(21, 22, 'user', 'manju@gmail.com', '12345', 'active'),
(22, 23, 'user', 'farhan@gmail.com', '12345', 'active'),
(23, 24, 'user', 'george@gmail.com', '12345', 'active'),
(24, 25, 'user', 'hari@gmail.com', '12345', 'active'),
(25, 26, 'user', 'zamam@gmail.com', '12345', 'active'),
(26, 27, 'user', 'yadhu@gmail.com', '12345', 'active'),
(27, 28, 'user', 'james@gmail.com', '12345', 'active'),
(28, 29, 'user', 'cindy@gmail.com', '12345', 'active'),
(29, 30, 'user', 'emilyn@gmail.com', '12345', 'active'),
(30, 31, 'user', 'irin@gmail.com', '12345', 'active'),
(31, 32, 'user', 'keerthi@gmail.com', '12345', 'active'),
(32, 33, 'user', 'leon@gmail.com', '12345', 'active'),
(33, 34, 'user', 'neena@gmail.com', '12345', 'active'),
(34, 35, 'user', 'oscar@gmail.com', '12345', 'active'),
(35, 36, 'user', 'phoenix@gmail.com', '12345', 'active'),
(36, 37, 'user', 'ruby@gmail.com', '12345', 'active'),
(37, 38, 'user', 'wasim@gmail.com', '12345', 'active'),
(38, 39, 'user', 'zoya@gmail.com', '12345', 'active');

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
(62, 21, 'OnePlus Y Series 80 cm (32 inches) HD Android TV ', 19999, 1000, '2022-04-21', '2022-05-10', '09:00:00', '23:15:00', 0, 0, 'new'),
(64, 25, 'Whirlpool 7 kg Fully-Automatic Washing Machine', 20200, 1100, '2022-04-16', '2022-04-19', '10:30:00', '23:00:00', 36, 7, 'shipped'),
(65, 26, 'Lenovo Tab K10 FHD 4 GB RAM (Abyss Blue)', 25000, 1250, '2022-05-10', '2022-05-25', '00:00:00', '21:00:00', 0, 0, 'new'),
(66, 32, 'Redmi Smart Band (Black Strap, Size : Regular)', 2099, 125, '2022-04-19', '2022-04-22', '07:30:00', '10:45:00', 26, 10, 'new'),
(67, 31, 'Prestige Hand Mixer PHM 2.0,300 W, Purple', 2675, 170, '2022-05-06', '2022-05-09', '18:15:00', '09:30:00', 0, 0, 'new'),
(68, 30, 'boAt Xtend Smartwatch with Alexa Built-in', 7500, 400, '2022-05-01', '2022-05-07', '17:30:00', '19:30:00', 0, 0, 'new'),
(69, 27, 'Realme 10000mAh Power Bank (Fast Charging, 30 W)', 1899, 95, '2022-05-07', '2022-05-09', '00:00:00', '23:45:00', 0, 0, 'new'),
(70, 28, 'SanDisk Ultra 32 GB MicroSDHC Memory Card', 1000, 45, '2022-04-25', '2022-04-28', '11:15:00', '00:00:00', 0, 0, 'new');

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
(24, 'Mobiles and Tabs', 'Mobiles'),
(25, 'Home Appliances', 'Washing Machine'),
(26, 'Mobiles and Tabs', 'Tabs'),
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

--
-- Dumping data for table `product_reversebidding`
--

INSERT INTO `product_reversebidding` (`rb_id`, `pd_id`, `ur_id`, `rb_bidamount`, `rb_bidcost`, `rb_biddate`, `rb_bidtime`, `rb_status`) VALUES
(43, 64, 19, 11, 1100, '2022-04-16', '21:24:07', 'LOST-NO-HOPE'),
(44, 64, 17, 25, 1100, '2022-04-16', '21:25:44', 'LOST-NO-HOPE'),
(45, 64, 36, 7, 1100, '2022-04-16', '21:46:32', 'WINNER'),
(46, 64, 14, 6, 1100, '2022-04-17', '11:43:42', 'LOST-NO-HOPE'),
(47, 64, 15, 11, 1100, '2022-04-17', '11:51:17', 'LOST-NO-HOPE'),
(48, 64, 15, 4, 1100, '2022-04-17', '11:51:41', 'LOST-NO-HOPE'),
(49, 64, 16, 4, 1100, '2022-04-17', '21:44:31', 'LOST-NO-HOPE'),
(50, 64, 21, 25, 1100, '2022-04-17', '21:47:00', 'LOST-NO-HOPE'),
(51, 64, 21, 5, 1100, '2022-04-17', '21:47:10', 'LOST-NO-HOPE'),
(52, 64, 24, 9, 1100, '2022-04-18', '11:15:03', 'LOST-NO-HOPE'),
(53, 64, 24, 11, 1100, '2022-04-18', '11:15:32', 'LOST-NO-HOPE'),
(54, 64, 22, 5, 1100, '2022-04-18', '11:17:10', 'LOST-NO-HOPE'),
(55, 64, 18, 8, 1100, '2022-04-18', '12:27:36', 'LOST-NO-HOPE'),
(56, 64, 20, 9, 1100, '2022-04-18', '12:28:19', 'LOST-NO-HOPE'),
(57, 64, 23, 10, 1100, '2022-04-18', '17:39:08', 'LOST-STILL-CHANCE'),
(58, 64, 25, 6, 1100, '2022-04-18', '17:39:50', 'LOST-NO-HOPE'),
(59, 64, 25, 8, 1100, '2022-04-18', '17:40:00', 'LOST-NO-HOPE'),
(60, 64, 19, 3, 1100, '2022-04-18', '20:13:23', 'LOST-NO-HOPE'),
(61, 64, 17, 1, 1100, '2022-04-18', '20:14:55', 'LOST-NO-HOPE'),
(62, 64, 18, 2, 1100, '2022-04-18', '20:15:16', 'LOST-NO-HOPE'),
(63, 64, 16, 12, 1100, '2022-04-18', '21:26:38', 'LOST-STILL-CHANCE'),
(64, 64, 20, 20, 1100, '2022-04-18', '21:27:14', 'LOST-STILL-CHANCE'),
(65, 64, 23, 1, 1100, '2022-04-19', '21:02:59', 'LOST-NO-HOPE'),
(66, 64, 36, 2, 1100, '2022-04-19', '21:03:51', 'LOST-NO-HOPE'),
(67, 64, 22, 3, 1100, '2022-04-19', '21:04:48', 'LOST-NO-HOPE'),
(68, 64, 14, 13, 1100, '2022-04-19', '21:06:50', 'LOST-STILL-CHANCE'),
(69, 66, 26, 9, 125, '2022-04-19', '21:08:40', 'LOST-NO-HOPE'),
(70, 66, 30, 4, 125, '2022-04-19', '21:09:45', 'LOST-NO-HOPE'),
(71, 64, 17, 15, 1100, '2022-04-19', '21:12:00', 'LOST-STILL-CHANCE'),
(72, 64, 24, 14, 1100, '2022-04-19', '21:13:37', 'LOST-STILL-CHANCE'),
(73, 64, 18, 17, 1100, '2022-04-19', '21:14:35', 'LOST-STILL-CHANCE'),
(74, 64, 25, 18, 1100, '2022-04-19', '21:15:39', 'LOST-STILL-CHANCE'),
(75, 66, 35, 9, 125, '2022-04-19', '21:28:04', 'LOST-NO-HOPE'),
(76, 66, 32, 5, 125, '2022-04-19', '21:29:05', 'LOST-NO-HOPE'),
(77, 66, 28, 12, 125, '2022-04-19', '21:30:10', 'LOST-STILL-CHANCE'),
(78, 66, 27, 1, 125, '2022-04-20', '12:38:23', 'LOST-NO-HOPE'),
(79, 66, 29, 1, 125, '2022-04-20', '12:39:06', 'LOST-NO-HOPE'),
(80, 66, 29, 6, 125, '2022-04-20', '12:39:49', 'LOST-NO-HOPE'),
(81, 66, 31, 8, 125, '2022-04-20', '12:50:10', 'LOST-NO-HOPE'),
(82, 66, 33, 2, 125, '2022-04-20', '12:50:49', 'LOST-NO-HOPE'),
(83, 66, 34, 4, 125, '2022-04-20', '12:53:43', 'LOST-NO-HOPE'),
(84, 66, 30, 9, 125, '2022-04-20', '15:22:20', 'LOST-NO-HOPE'),
(85, 66, 26, 10, 125, '2022-04-20', '15:22:47', 'WINNER'),
(86, 66, 27, 2, 125, '2022-04-20', '20:46:06', 'LOST-NO-HOPE'),
(87, 66, 28, 5, 125, '2022-04-20', '20:47:43', 'LOST-NO-HOPE'),
(88, 66, 19, 6, 125, '2022-04-20', '21:58:13', 'LOST-NO-HOPE'),
(89, 66, 23, 8, 125, '2022-04-20', '21:58:59', 'LOST-NO-HOPE'),
(90, 66, 31, 15, 125, '2022-04-20', '21:59:54', 'LOST-STILL-CHANCE'),
(91, 66, 16, 14, 125, '2022-04-20', '22:01:13', 'LOST-STILL-CHANCE'),
(92, 66, 30, 11, 125, '2022-04-20', '22:02:03', 'LOST-STILL-CHANCE');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `rw_id` int(11) NOT NULL,
  `rw_review` text DEFAULT NULL,
  `ur_id` int(11) NOT NULL,
  `pd_id` int(11) NOT NULL,
  `rw_date` date DEFAULT NULL,
  `rw_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`rw_id`, `rw_review`, `ur_id`, `pd_id`, `rw_date`, `rw_time`) VALUES
(5, 'Hello', 36, 64, '2022-04-16', '21:45:56'),
(6, 'Hi everyone', 27, 66, '2022-04-20', '12:38:09'),
(7, 'Hai', 31, 66, '2022-04-20', '12:56:47');

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
  `ur_password` varchar(50) DEFAULT NULL,
  `ur_shippingaddress` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ur_id`, `ur_name`, `ur_emailid`, `ur_mobile`, `ur_balance`, `ur_password`, `ur_shippingaddress`) VALUES
(14, 'Sreevidya', 'sreevidya@gmail.com', '9747057905', 3800, NULL, ''),
(15, 'Sweaba', 'sweaba@gmail.com', '9995885561', 900, NULL, ''),
(16, 'Aparna', 'aparna@gmail.com', '9995885562', 775, NULL, ''),
(17, 'Melvin', 'melvin@gmail.com', '9856874555', 900, NULL, ''),
(18, 'Helna', 'helna@gmail.com', '5644783399', 700, NULL, ''),
(19, 'Athulya', 'athulya@gmail.com', '9012569347', 3275, NULL, 'Geethalayam house,Changarakulam\r\nThrissur,Kerala - 670902'),
(20, 'Basil', 'basil@gmail.com', '7098235670', 300, NULL, ''),
(21, 'Deepak', 'deepak@gmail.com', '8076229015', 0, NULL, ''),
(22, 'Manju', 'manju@gmail.com', '9975498559', 1800, NULL, ''),
(23, 'Farhan', 'farhan@gmail.com', '7053198095', 1175, NULL, ''),
(24, 'George', 'george@gmail.com', '8034912674', 700, NULL, ''),
(25, 'Hari', 'hari@gmail.com', '9433018270', 1300, NULL, ''),
(26, 'Zamam', 'zamam@gmail.com', '8804592230', 250, NULL, ''),
(27, 'Yadhu', 'yadhu@gmail.com', '7790346792', 50, NULL, ''),
(28, 'James', 'james@gmail.com', '9540367140', 950, NULL, ''),
(29, 'Cindy', 'cindy@gmail.com', '8347519460', 0, NULL, ''),
(30, 'Emilyn', 'emilyn@gmail.com', '6235190872', 625, NULL, ''),
(31, 'Irin', 'irin@gmail.com', '7315302459', 50, NULL, ''),
(32, 'Keerthi', 'keerthi@gmail.com', '8138927650', 0, NULL, ''),
(33, 'Leon', 'leon@gmail.com', '8494573563', 295, NULL, ''),
(34, 'Neena', 'neena@gmail.com', '7506998217', 200, NULL, ''),
(35, 'Oscar', 'oscar@gmail.com', '9843209836', 275, NULL, ''),
(36, 'Phoenix', 'phoenix@gmail.com', '8218936932', 1800, NULL, 'House No.143 , Amala Nagar , Kochi'),
(37, 'Ruby', 'ruby@gmail.com', '7695432180', 2000, NULL, ''),
(38, 'Wasim', 'wasim@gmail.com', '8946271629', 1000, NULL, ''),
(39, 'Zoya', 'zoya@gmail.com', '7089327481', 2325, NULL, 'Hazar Manzil, Kalamassery, Ernakulam');

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
-- Dumping data for table `userwallet`
--

INSERT INTO `userwallet` (`uw_id`, `ur_id`, `uw_amount`, `uw_date`, `uw_status`, `uw_purpose`) VALUES
(29, 15, 100, '2022-02-24', 'deposit', 'recharge'),
(30, 19, 5000, '2022-02-26', 'deposit', 'recharge'),
(32, 17, 600, '2022-02-26', 'deposit', 'recharge'),
(37, 19, 300, '2022-02-28', 'deposit', 'recharge'),
(38, 19, 300, '2022-02-28', 'deposit', 'recharge'),
(39, 19, 1100, '2022-04-16', 'withdraw', 'bidding'),
(40, 17, 1000, '2022-04-16', 'deposit', 'recharge'),
(41, 17, 1100, '2022-04-16', 'withdraw', 'bidding'),
(42, 36, 4000, '2022-04-16', 'deposit', 'recharge'),
(43, 36, 1100, '2022-04-16', 'withdraw', 'bidding'),
(44, 14, 6000, '2022-04-17', 'deposit', 'recharge'),
(45, 14, 1100, '2022-04-17', 'withdraw', 'bidding'),
(46, 15, 3000, '2022-04-17', 'deposit', 'recharge'),
(47, 15, 1100, '2022-04-17', 'withdraw', 'bidding'),
(48, 15, 1100, '2022-04-17', 'withdraw', 'bidding'),
(49, 37, 2000, '2022-04-17', 'deposit', 'recharge'),
(50, 38, 1000, '2022-04-17', 'deposit', 'recharge'),
(51, 16, 1100, '2022-04-17', 'deposit', 'recharge'),
(52, 16, 1100, '2022-04-17', 'withdraw', 'bidding'),
(53, 21, 2200, '2022-04-17', 'deposit', 'recharge'),
(54, 21, 1100, '2022-04-17', 'withdraw', 'bidding'),
(55, 21, 1100, '2022-04-17', 'withdraw', 'bidding'),
(56, 24, 2000, '2022-04-18', 'deposit', 'recharge'),
(57, 24, 1100, '2022-04-18', 'withdraw', 'bidding'),
(58, 24, 2000, '2022-04-18', 'deposit', 'recharge'),
(59, 24, 1100, '2022-04-18', 'withdraw', 'bidding'),
(60, 22, 4000, '2022-04-18', 'deposit', 'recharge'),
(61, 22, 1100, '2022-04-18', 'withdraw', 'bidding'),
(62, 18, 2500, '2022-04-18', 'deposit', 'recharge'),
(63, 18, 1100, '2022-04-18', 'withdraw', 'bidding'),
(64, 20, 1500, '2022-04-18', 'deposit', 'recharge'),
(65, 20, 1100, '2022-04-18', 'withdraw', 'bidding'),
(66, 23, 1500, '2022-04-18', 'deposit', 'recharge'),
(67, 23, 1100, '2022-04-18', 'withdraw', 'bidding'),
(68, 25, 2500, '2022-04-18', 'deposit', 'recharge'),
(69, 25, 1100, '2022-04-18', 'withdraw', 'bidding'),
(70, 25, 1100, '2022-04-18', 'withdraw', 'bidding'),
(71, 19, 1100, '2022-04-18', 'withdraw', 'bidding'),
(72, 17, 600, '2022-04-18', 'deposit', 'recharge'),
(73, 17, 1100, '2022-04-18', 'withdraw', 'bidding'),
(74, 18, 1100, '2022-04-18', 'withdraw', 'bidding'),
(75, 16, 2000, '2022-04-18', 'deposit', 'recharge'),
(76, 16, 1100, '2022-04-18', 'withdraw', 'bidding'),
(77, 20, 1000, '2022-04-18', 'deposit', 'recharge'),
(78, 20, 1100, '2022-04-18', 'withdraw', 'bidding'),
(79, 23, 2000, '2022-04-19', 'deposit', 'recharge'),
(80, 23, 1100, '2022-04-19', 'withdraw', 'bidding'),
(81, 36, 1100, '2022-04-19', 'withdraw', 'bidding'),
(82, 22, 1100, '2022-04-19', 'withdraw', 'bidding'),
(83, 14, 1100, '2022-04-19', 'withdraw', 'bidding'),
(84, 26, 500, '2022-04-19', 'deposit', 'recharge'),
(85, 26, 125, '2022-04-19', 'withdraw', 'bidding'),
(86, 30, 1000, '2022-04-19', 'deposit', 'recharge'),
(87, 30, 125, '2022-04-19', 'withdraw', 'bidding'),
(88, 17, 2000, '2022-04-19', 'deposit', 'recharge'),
(89, 17, 1100, '2022-04-19', 'withdraw', 'bidding'),
(90, 24, 1100, '2022-04-19', 'withdraw', 'bidding'),
(91, 18, 1500, '2022-04-19', 'deposit', 'recharge'),
(92, 18, 1100, '2022-04-19', 'withdraw', 'bidding'),
(93, 25, 2100, '2022-04-19', 'deposit', 'recharge'),
(94, 25, 1100, '2022-04-19', 'withdraw', 'bidding'),
(95, 35, 400, '2022-04-19', 'deposit', 'recharge'),
(96, 35, 125, '2022-04-19', 'withdraw', 'bidding'),
(97, 32, 125, '2022-04-19', 'deposit', 'recharge'),
(98, 32, 125, '2022-04-19', 'withdraw', 'bidding'),
(99, 28, 1200, '2022-04-19', 'deposit', 'recharge'),
(100, 28, 125, '2022-04-19', 'withdraw', 'bidding'),
(101, 27, 300, '2022-04-20', 'deposit', 'recharge'),
(102, 27, 125, '2022-04-20', 'withdraw', 'bidding'),
(103, 29, 250, '2022-04-20', 'deposit', 'recharge'),
(104, 29, 125, '2022-04-20', 'withdraw', 'bidding'),
(105, 29, 125, '2022-04-20', 'withdraw', 'bidding'),
(106, 31, 100, '2022-04-20', 'deposit', 'recharge'),
(107, 31, 200, '2022-04-20', 'deposit', 'recharge'),
(108, 31, 125, '2022-04-20', 'withdraw', 'bidding'),
(109, 33, 420, '2022-04-20', 'deposit', 'recharge'),
(110, 33, 125, '2022-04-20', 'withdraw', 'bidding'),
(111, 34, 325, '2022-04-20', 'deposit', 'recharge'),
(112, 34, 125, '2022-04-20', 'withdraw', 'bidding'),
(113, 30, 125, '2022-04-20', 'withdraw', 'bidding'),
(114, 26, 125, '2022-04-20', 'withdraw', 'bidding'),
(115, 27, 125, '2022-04-20', 'withdraw', 'bidding'),
(116, 28, 125, '2022-04-20', 'withdraw', 'bidding'),
(117, 19, 125, '2022-04-20', 'withdraw', 'bidding'),
(118, 23, 125, '2022-04-20', 'withdraw', 'bidding'),
(119, 31, 125, '2022-04-20', 'withdraw', 'bidding'),
(120, 16, 125, '2022-04-20', 'withdraw', 'bidding'),
(121, 30, 125, '2022-04-20', 'withdraw', 'bidding');

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
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`rw_id`),
  ADD KEY `ur_id` (`ur_id`),
  ADD KEY `pd_id` (`pd_id`);

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
  MODIFY `lg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `pd_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `pc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `product_reversebidding`
--
ALTER TABLE `product_reversebidding`
  MODIFY `rb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `rw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `userwallet`
--
ALTER TABLE `userwallet`
  MODIFY `uw_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

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
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`ur_id`) REFERENCES `user` (`ur_id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`pd_id`) REFERENCES `product` (`pd_id`);

--
-- Constraints for table `userwallet`
--
ALTER TABLE `userwallet`
  ADD CONSTRAINT `userwallet_ibfk_1` FOREIGN KEY (`ur_id`) REFERENCES `user` (`ur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
