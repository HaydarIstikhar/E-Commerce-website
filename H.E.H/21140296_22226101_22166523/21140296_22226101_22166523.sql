-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2024 at 05:39 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `21140296_22226101_22166523`
--

-- --------------------------------------------------------

--
-- Table structure for table `orderid`
--

CREATE TABLE `orderid` (
  `orderid` int(255) NOT NULL,
  `userid` int(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productprice` int(255) NOT NULL,
  `productquantity` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productid` int(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `productprice` int(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productid`, `productname`, `productprice`, `image`) VALUES
(1, 'Playstation 5', 399, 'Playstation5.jpg'),
(2, 'iPhone 15', 1049, 'Iphone15.jpg'),
(3, 'Xbox Series S', 299, 'XboxSeriesS.jpg'),
(4, 'Samsung S23 Ultra', 1199, 'S23.jpg'),
(5, 'Macbook Pro', 899, 'macbook.jpg'),
(6, 'Nintendo Switch', 249, 'NintendoSwitch.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `userlogin`
--

CREATE TABLE `userlogin` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `userlogin`
--

INSERT INTO `userlogin` (`userid`, `username`, `useremail`, `password_hash`) VALUES
(1, 'John Doe', 'example@gmail.com', '$2y$10$wtt4wdSzhWhEBrOJ3CPxhOpzl6gTJ0ez/IziLmdWQ5uqY2r3CamUy'),
(2, 'John Smith', 'example2@gmail.com', '$2y$10$w8hgcni2Y8L88ZQHZqrjIO5hfkrrWnGM6iDFXaNyhJfqRl0gnSl7i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orderid`
--
ALTER TABLE `orderid`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `userlogin`
--
ALTER TABLE `userlogin`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `useremail` (`useremail`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orderid`
--
ALTER TABLE `orderid`
  MODIFY `orderid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userlogin`
--
ALTER TABLE `userlogin`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
