-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2018 at 07:16 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `virokadb`
--

-- --------------------------------------------------------

--
-- Table structure for table `customertable`
--

CREATE TABLE `customertable` (
  `c_id` int(15) NOT NULL,
  `cname` text NOT NULL,
  `iseg` text NOT NULL,
  `route` varchar(30) NOT NULL,
  `ctype` varchar(20) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `date_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customertable`
--

INSERT INTO `customertable` (`c_id`, `cname`, `iseg`, `route`, `ctype`, `designation`, `email`, `mobile`, `address`, `date_registered`, `username`) VALUES
(41, 'hithu', 'Consultants', 'Route 3', 'New', 'student', 'gddh@gmail.com', 7686865678, 'hjj', '2018-04-04 09:55:26', 'sales executive'),
(42, 'abs', 'Financial Services', 'Route 1', 'New', '', 'dsf@gmail.com', 9787976789, 'uihyu', '2018-04-04 09:56:03', 'sales executive');

-- --------------------------------------------------------

--
-- Table structure for table `employeetable`
--

CREATE TABLE `employeetable` (
  `empid` int(20) NOT NULL,
  `empname` varchar(30) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `teamgroup` varchar(30) NOT NULL,
  `emptype` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `eusername` varchar(50) NOT NULL,
  `epassword` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeetable`
--

INSERT INTO `employeetable` (`empid`, `empname`, `designation`, `teamgroup`, `emptype`, `email`, `mobile`, `address`, `eusername`, `epassword`) VALUES
(53, 'accounts', '6', '', 'Experienced', 'yry@gmail.com', '8797789067', 'karkala', 'accounts', '123456'),
(52, 'technical', '5', '', 'Fresher', 'fdfd@gmail.com', '9898786959', 'shirva', 'technical', '123456'),
(51, 'manager brand', '4', '', 'Experienced', 'ddc@gmail.com', '7686868995', 'belmAN', 'manager brand', '123456'),
(50, 'brand manager', '4', '', 'Experienced', 'sgddha@gmail.com', '9899777789', 'Delhi', 'brand manager', '123456'),
(49, 'manager', '3', '', 'Fresher', 'hdfh@gmail.com', '7686995990', 'mumbai', 'manager', '123456'),
(47, 'sales executive', '2', '4', 'Experienced', 'fdf@gmail.com', '8970678986', 'Mangalore', 'sales executive', 'exeexe'),
(48, 'sales manager', '3', '', 'Fresher', 'gdgd@gmail.com', '7872899272', 'bangalore', 'sales manager', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `item_id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `item_no` varchar(30) NOT NULL,
  `item_name` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `Qty` int(10) NOT NULL,
  `Rate` int(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`item_id`, `supplier_id`, `item_no`, `item_name`, `model`, `Qty`, `Rate`) VALUES
(21, 17, '400', 'keyboard', 'Model 3', 20, 700),
(20, 16, '124', 'mouse', 'Model 2', 10, 570);

-- --------------------------------------------------------

--
-- Table structure for table `ordertable`
--

CREATE TABLE `ordertable` (
  `ORno` int(10) NOT NULL,
  `order_num` varchar(50) NOT NULL,
  `item_id` int(15) NOT NULL,
  `order_id` int(11) NOT NULL,
  `supplier` varchar(50) NOT NULL,
  `qty` int(15) NOT NULL,
  `price` bigint(25) NOT NULL,
  `Branch` varchar(30) NOT NULL,
  `team_id` int(15) NOT NULL,
  `SalesManager` varchar(30) NOT NULL,
  `BrandSpl` varchar(30) NOT NULL,
  `OrderType` varchar(30) NOT NULL,
  `CostPOno` varchar(50) NOT NULL,
  `CustPOdate` date NOT NULL,
  `ORNSubDate` date NOT NULL,
  `DeliveryCommitted` date NOT NULL,
  `OrderValue` float NOT NULL,
  `c_id` int(6) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertable`
--

INSERT INTO `ordertable` (`ORno`, `order_num`, `item_id`, `order_id`, `supplier`, `qty`, `price`, `Branch`, `team_id`, `SalesManager`, `BrandSpl`, `OrderType`, `CostPOno`, `CustPOdate`, `ORNSubDate`, `DeliveryCommitted`, `OrderValue`, `c_id`, `username`) VALUES
(98, 'ORNO-431', 20, 1, 'shashi', 10, 5700, 'SOFTWARE SERVICES', 4, 'sales manager', 'brand manager', 'APPLIANCES', '123', '2018-04-04', '2018-04-04', '2018-04-07', 5700, 41, 'sales executive'),
(99, 'ORNO-374', 21, 99, 'hithesh', 13, 9100, 'BANGALORE', 2, 'manager', 'manager brand', 'STORAGE', '123', '2018-04-04', '2018-04-04', '2018-04-12', 9100, 42, 'sales executive');

-- --------------------------------------------------------

--
-- Table structure for table `paymenttable`
--

CREATE TABLE `paymenttable` (
  `c_id` int(15) NOT NULL,
  `Advance` float NOT NULL,
  `PriortoDelivery` float NOT NULL,
  `ondelivery` float NOT NULL,
  `oninstallation` float NOT NULL,
  `Credit` float NOT NULL,
  `partshipment` varchar(30) NOT NULL,
  `partbilling` varchar(30) NOT NULL,
  `partship_reason` varchar(1000) NOT NULL,
  `partbill_reason` varchar(1000) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_id` int(15) NOT NULL,
  `status` int(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paymenttable`
--

INSERT INTO `paymenttable` (`c_id`, `Advance`, `PriortoDelivery`, `ondelivery`, `oninstallation`, `Credit`, `partshipment`, `partbilling`, `partship_reason`, `partbill_reason`, `payment_id`, `order_id`, `status`) VALUES
(42, 0, 0, 9100, 0, 0, '', '', '', '', 99, 99, 0),
(41, 500, 2000, 3000, 0, 0, '', '', '', '', 98, 98, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_reason`
--

CREATE TABLE `payment_reason` (
  `reason_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `partshipment` varchar(50) NOT NULL,
  `partbilling` varchar(50) NOT NULL,
  `partshipment_reason` varchar(5000) NOT NULL,
  `partbilling_reason` varchar(5000) NOT NULL,
  `username` varchar(50) NOT NULL,
  `user_role` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment_reason`
--

INSERT INTO `payment_reason` (`reason_id`, `order_id`, `partshipment`, `partbilling`, `partshipment_reason`, `partbilling_reason`, `username`, `user_role`, `status`) VALUES
(95, 99, 'Approve', 'Approve', '', '', 'accounts', 6, 0),
(94, 99, 'Approve', 'Approve', '', '', 'technical', 5, 0),
(93, 99, 'Approve', 'Approve', '', '', 'manager brand', 4, 0),
(92, 99, 'Approve', 'Approve', '', '', 'manager', 3, 0),
(90, 98, 'Approve', 'Approve', '', '', 'technical', 5, 0),
(91, 98, 'Approve', 'Approve', '', '', 'accounts', 6, 0),
(89, 98, 'Approve', 'Approve', '', '', 'brand manager', 4, 0),
(88, 98, 'Approve', 'Approve', '', '', 'sales manager', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `suppliertable`
--

CREATE TABLE `suppliertable` (
  `supplier_id` int(11) NOT NULL,
  `SupplierName` varchar(30) NOT NULL,
  `SupplierType` varchar(30) NOT NULL,
  `Designation` varchar(30) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(15) NOT NULL,
  `AltMobile` varchar(15) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `City` varchar(30) NOT NULL,
  `Pin` int(10) NOT NULL,
  `Fax` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliertable`
--

INSERT INTO `suppliertable` (`supplier_id`, `SupplierName`, `SupplierType`, `Designation`, `Email`, `Mobile`, `AltMobile`, `Phone`, `Address`, `City`, `Pin`, `Fax`) VALUES
(16, 'shashi', 'New', 'student', 'sha@gmail.com', '8687996996', '7869098678', '8976567896', 'udupi', 'katapadi', 787879, '8889797797'),
(17, 'hithesh', 'Existing', 'sales assistant', 'dww@gmail.com', '9876564321', '7585895950', '7869696098', 'mangalore', 'karkala', 685859, '979879770');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`team_id`, `team_name`) VALUES
(1, 'PSG'),
(2, 'ESG'),
(3, 'SSG'),
(4, 'CSG');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `utype` varchar(255) NOT NULL,
  `team_grp` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `contact_no`, `email`, `utype`, `team_grp`, `password`) VALUES
(1, 'admin', 'admin', '9611395260', 'test@gmail.com', '1', '', '123456'),
(91, 'technical', 'technical', '9898786959', 'fdfd@gmail.com', '5', '', '123456'),
(90, 'manager brand', 'manager brand', '7686868995', 'ddc@gmail.com', '4', '', '123456'),
(88, 'manager', 'manager', '7686995990', 'hdfh@gmail.com', '3', '', '123456'),
(89, 'brand manager', 'brand manager', '9899777789', 'sgddha@gmail.com', '4', '', '123456'),
(87, 'sales manager', 'sales manager', '7872899272', 'gdgd@gmail.com', '3', '', '123456'),
(86, 'sales executive', 'sales executive', '8970678986', 'fdf@gmail.com', '2', '4', 'exeexe'),
(92, 'accounts', 'accounts', '8797789067', 'yry@gmail.com', '6', '', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `role_id` int(11) NOT NULL,
  `user_role` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`role_id`, `user_role`) VALUES
(1, 'Admin'),
(2, 'Sales Executive'),
(3, 'Sales Manager'),
(4, 'Brand Specialist'),
(5, 'Technical Team'),
(6, 'Accounts');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customertable`
--
ALTER TABLE `customertable`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `employeetable`
--
ALTER TABLE `employeetable`
  ADD PRIMARY KEY (`empid`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `ordertable`
--
ALTER TABLE `ordertable`
  ADD PRIMARY KEY (`ORno`);

--
-- Indexes for table `paymenttable`
--
ALTER TABLE `paymenttable`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `payment_reason`
--
ALTER TABLE `payment_reason`
  ADD PRIMARY KEY (`reason_id`);

--
-- Indexes for table `suppliertable`
--
ALTER TABLE `suppliertable`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customertable`
--
ALTER TABLE `customertable`
  MODIFY `c_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `employeetable`
--
ALTER TABLE `employeetable`
  MODIFY `empid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `ordertable`
--
ALTER TABLE `ordertable`
  MODIFY `ORno` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `paymenttable`
--
ALTER TABLE `paymenttable`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `payment_reason`
--
ALTER TABLE `payment_reason`
  MODIFY `reason_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT for table `suppliertable`
--
ALTER TABLE `suppliertable`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
