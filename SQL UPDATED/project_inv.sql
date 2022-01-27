-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2021 at 06:42 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_inv`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `bid` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`bid`, `brand_name`, `status`) VALUES
(10, 'Teslr', '1'),
(11, 'Jeep', '1'),
(12, 'Mazda', '1'),
(13, 'Adidas', '1'),
(14, 'Nike', '1'),
(15, 'New Balance', '1'),
(16, 'Adobe', '1'),
(17, 'Microsoft', '1'),
(18, 'Apple', '1'),
(19, 'HP', '1'),
(20, 'Dell', '1'),
(21, 'Asus', '1'),
(27, 'Test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `parent_cat` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `parent_cat`, `category_name`, `status`) VALUES
(11, 0, 'car', '1'),
(12, 11, 'suv', '1'),
(13, 11, 'convertible', '1'),
(14, 11, 'minivan', '1'),
(15, 0, 'Shoe', '1'),
(16, 15, 'Sneakers', '1'),
(17, 15, 'Boot', '1'),
(18, 15, 'Sandal', '1'),
(19, 0, 'Computer', '1'),
(20, 19, 'PC', '1'),
(21, 19, 'Laptop', '1'),
(22, 19, 'Tablet', '1'),
(23, 0, 'Software', '1'),
(24, 23, 'Excell', '1'),
(25, 23, 'Photoshop', '1'),
(26, 23, 'IOS', '1'),
(30, 0, 'Test', '1');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_no` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `order_date` date NOT NULL,
  `sub_total` double NOT NULL,
  `gst` double NOT NULL,
  `discount` double NOT NULL,
  `net_total` double NOT NULL,
  `paid` double NOT NULL,
  `due` double NOT NULL,
  `payment_type` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_no`, `customer_name`, `order_date`, `sub_total`, `gst`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES
(56, 'Desmond', '0000-00-00', 1530, 275.4, 0, 1805.4, 1785.4, 1805.4, 'Cheque'),
(57, 'Desmond', '0000-00-00', 2850, 513, 0, 3363, 3363, 0, 'Cheque'),
(58, 'Des', '0000-00-00', 5000, 900, 0, 5900, 900, 5000, 'Cash'),
(59, 'Desmond', '0000-00-00', 5000, 900, 0, 5900, 500, 5400, 'Cash'),
(60, 'Desmond', '0000-00-00', 12250, 2205, 0, 14455, 12250, 2205, 'Cheque');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` int(11) NOT NULL,
  `invoice_no` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `invoice_no`, `product_name`, `price`, `qty`) VALUES
(62, 56, 'Foot Wear', 50, 1),
(63, 56, 'WorkStation', 1000, 1),
(64, 56, 'Smardav', 80, 6),
(65, 57, 'Graphics', 400, 2),
(66, 57, 'Foot Wear', 50, 3),
(67, 57, 'Smardav', 80, 20),
(68, 57, 'Illustrator', 300, 1),
(69, 58, 'Van', 5000, 1),
(70, 59, 'Van', 5000, 1),
(71, 60, 'Graphics', 400, 1),
(72, 60, 'WorkStation', 1000, 10),
(73, 60, 'Foot Wear', 50, 5),
(74, 60, 'Smardav', 80, 20);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `pid` int(11) NOT NULL,
  `cid` int(11) NOT NULL,
  `bid` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` double NOT NULL,
  `product_stock` int(11) NOT NULL,
  `added_date` date NOT NULL,
  `p_status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`pid`, `cid`, `bid`, `product_name`, `product_price`, `product_stock`, `added_date`, `p_status`) VALUES
(15, 24, 17, 'Excel1', 200, 100, '2021-10-25', '1'),
(16, 25, 16, 'Graphics', 400, 97, '2021-10-25', '1'),
(17, 20, 20, 'WorkStation', 1000, 89, '2021-10-25', '1'),
(18, 16, 14, 'Foot Wear', 50, 91, '2021-10-25', '1'),
(19, 23, 18, 'Smardav', 80, 54, '2021-10-25', '1'),
(20, 14, 11, 'Van', 5000, 98, '2021-10-25', '1'),
(21, 11, 12, 'Runx', 6000, 100, '2021-10-25', '1'),
(22, 23, 16, 'Illustrator', 300, 99, '2021-10-25', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `usertype` enum('Admin','Customer') NOT NULL,
  `register_date` date NOT NULL,
  `last_login` datetime NOT NULL,
  `notes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `usertype`, `register_date`, `last_login`, `notes`) VALUES
(25, 'Edmond', 'goddyedmond@gmail.com', '$2y$08$OoeHldcoLL1L0ZoiK9dFkusSZ3J6tY2fgD3Wfro8Hey7V1yb6n0HC', 'Admin', '2021-10-26', '2021-10-26 04:10:23', ''),
(26, 'Desmond', 'goddydesmond@gmail.com', '$2y$08$yEBRlSggBXAdX4bdgWKnGu5H7vT4UxpBpqQpYzacjhPvgmFIU8x0u', 'Customer', '2021-10-26', '2021-10-26 05:10:21', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `category_name` (`category_name`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_no`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_no` (`invoice_no`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `product_name` (`product_name`),
  ADD KEY `cid` (`cid`),
  ADD KEY `bid` (`bid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD CONSTRAINT `invoice_details_ibfk_1` FOREIGN KEY (`invoice_no`) REFERENCES `invoice` (`invoice_no`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`cid`) REFERENCES `categories` (`cid`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`bid`) REFERENCES `brands` (`bid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
