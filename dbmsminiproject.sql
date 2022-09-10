-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2022 at 05:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmsminiproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `card`
--

CREATE TABLE `card` (
  `id` int(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `quantity` int(10) NOT NULL,
  `srate` int(10) NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cash` varchar(20) NOT NULL,
  `simage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `carousel`
--

CREATE TABLE `carousel` (
  `id` int(11) NOT NULL,
  `cimage` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carousel`
--

INSERT INTO `carousel` (`id`, `cimage`) VALUES
(8, '1.jpeg'),
(9, '2.jpeg'),
(10, '3.jpeg'),
(19, '4.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `id` int(255) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `pnumber` int(10) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `paddress` varchar(60) NOT NULL,
  `waddress` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerdetails`
--

INSERT INTO `customerdetails` (`id`, `fname`, `pnumber`, `mail`, `paddress`, `waddress`) VALUES
(26, 'karan', 1234567890, 'karan@gmail.com', '#82/1 3rd cross irwin road', '');

-- --------------------------------------------------------

--
-- Table structure for table `customerid`
--

CREATE TABLE `customerid` (
  `id` int(255) NOT NULL,
  `fname` varchar(30) DEFAULT NULL,
  `mail` varchar(30) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerid`
--

INSERT INTO `customerid` (`id`, `fname`, `mail`, `password`) VALUES
(42, 'karan', 'karan@gmail.com', '$2y$12$jaeIsmrQs34y7IB8YKpA0.jFFXD9I3f2Jw1gYp1eFmIT.LAcs/tfi');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(255) NOT NULL,
  `mail` varchar(20) NOT NULL,
  `fname` varchar(40) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `response` varchar(50) NOT NULL,
  `star` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(255) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `fname`, `lname`, `mail`, `password`) VALUES
(1, 'Varunsimha', 'M P', 'varunsimha@gmail.com', '$2y$12$CABMo8ND0vk.wHcEnVeWd.SNuHV2BKwOd5yf7tYQPsjv7CoUbM3MC');

-- --------------------------------------------------------

--
-- Table structure for table `purchasehistory`
--

CREATE TABLE `purchasehistory` (
  `pid` int(255) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `simage` varchar(255) NOT NULL,
  `quantity` int(100) NOT NULL,
  `srate` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cash` varchar(20) NOT NULL,
  `dateandtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `id` int(255) NOT NULL,
  `stype` varchar(100) NOT NULL,
  `sname` varchar(100) DEFAULT NULL,
  `simage` varchar(255) DEFAULT NULL,
  `srate` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`id`, `stype`, `sname`, `simage`, `srate`) VALUES
(6, 'Personal Care', 'Villain Snake', '4b.jpeg', 600),
(8, 'Snacks and Beverages', 'TATA Tea', '3a.jpeg', 100),
(9, 'Snacks and Beverages', 'Sunfeast Nice', '3b.jpeg', 20),
(10, 'Snacks and Beverages', 'Parle G', '3c.jpeg', 10),
(11, 'Cooking Essential', 'Toor Dal', '2a.jpeg', 400),
(12, 'Cooking Essential', 'Nandini Paneer', '2b.jpeg', 250),
(13, 'Cooking Essential', 'Soft &amp; Creamy Paneer', '2c.jpeg', 300),
(14, 'Household Care', 'Harpic', '1a.jpeg', 60),
(15, 'Household Care', 'Presto', '1b.jpeg', 70),
(16, 'Household Care', 'Amber Gold', '1c.jpeg', 30),
(18, 'Personal Care', 'Fogg Scent', '4a.jpeg', 500),
(31, 'Personal Care', 'Dove', '4c.jpeg', 198);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`id`,`mail`);

--
-- Indexes for table `carousel`
--
ALTER TABLE `carousel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerid`
--
ALTER TABLE `customerid`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  ADD PRIMARY KEY (`pid`,`mail`) USING BTREE;

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`,`stype`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card`
--
ALTER TABLE `card`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `carousel`
--
ALTER TABLE `carousel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `customerid`
--
ALTER TABLE `customerid`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchasehistory`
--
ALTER TABLE `purchasehistory`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
