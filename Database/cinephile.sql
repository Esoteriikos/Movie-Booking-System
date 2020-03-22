-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2019 at 10:43 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cinephile`
--

-- --------------------------------------------------------

--
-- Table structure for table `cust`
--

CREATE TABLE `cust` (
  `cid` int(10) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(10) NOT NULL,
  `phone` int(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cust`
--

INSERT INTO `cust` (`cid`, `username`, `password`, `phone`, `email`, `active`) VALUES
(1, 'shubham', 'qwerty', 2147483647, 'shubham@amino.com', 0),
(4, 'Sai', 'saai', 2147483647, 'sai@benzene.com', 0),
(8, 'admin', 'admin', 0, 'a@a.c', 69),
(9, 'suresh', 'abcd', 98563214, 's@abc.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `mid` int(10) NOT NULL,
  `mcode` int(10) NOT NULL,
  `mname` varchar(64) NOT NULL,
  `mimage` varchar(24) NOT NULL,
  `rating` int(1) DEFAULT NULL,
  `genre` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`mid`, `mcode`, `mname`, `mimage`, `rating`, `genre`) VALUES
(21, 4096, 'Mumbai Pune Mumbai', '21.jpg', 5, 'Romantic, Family'),
(23, 8192, 'Iron man', '23.jpg', 5, 'Action'),
(24, 4090, 'Singham', '24.jpg', 3, 'Drama'),
(25, 989, 'iro', '25.jpg', 4, 'Action');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(10) NOT NULL,
  `cardno` int(16) NOT NULL,
  `cardname` varchar(64) NOT NULL,
  `cvv` int(3) NOT NULL,
  `mcode` int(10) NOT NULL,
  `vcode` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `cardno`, `cardname`, `cvv`, `mcode`, `vcode`) VALUES
(1, 2147483647, 'shubham chaudhari', 698, 1024, 4),
(19, 64151, 'superman', 541, 1024, 4);

-- --------------------------------------------------------

--
-- Table structure for table `venue`
--

CREATE TABLE `venue` (
  `vid` int(10) NOT NULL,
  `vname` varchar(64) NOT NULL,
  `location` varchar(32) NOT NULL,
  `mcode` int(10) NOT NULL,
  `date` varchar(32) NOT NULL,
  `timing` varchar(32) NOT NULL,
  `availtickets` int(8) NOT NULL,
  `price` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `venue`
--

INSERT INTO `venue` (`vid`, `vname`, `location`, `mcode`, `date`, `timing`, `availtickets`, `price`) VALUES
(4, 'Satya Cinema', 'Andheri', 1024, '12-10-2019', '09:30 AM', 12, 200),
(5, 'vishal Cinema', 'Thane', 4096, '20-10-2019', '03:30 PM', 30, 250);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cust`
--
ALTER TABLE `cust`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `EPRIMARY` (`email`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`mid`),
  ADD UNIQUE KEY `mcode` (`mcode`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `venue`
--
ALTER TABLE `venue`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cust`
--
ALTER TABLE `cust`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `mid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `venue`
--
ALTER TABLE `venue`
  MODIFY `vid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
