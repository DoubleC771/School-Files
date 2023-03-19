-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Mar 19, 2023 at 09:21 AM
=======
-- Generation Time: Mar 18, 2023 at 06:14 PM
>>>>>>> d02a8db0e63c5a3e5d4c4d7a6ea2ee6fc3211cb9
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `logintest`
--

-- --------------------------------------------------------

--
-- Table structure for table `bikeorder`
--

CREATE TABLE `bikeorder` (
  `OrderID` int(11) NOT NULL,
  `BikeName` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Price` decimal(10,0) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Stocks` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bikeorder`
--

INSERT INTO `bikeorder` (`OrderID`, `BikeName`, `Quantity`, `Image`, `Price`, `Description`, `Stocks`) VALUES
(0, 'XMX 4000', 0, 'Bike4.JPG', '500', 'idk wat to do', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `OrderID` int(255) NOT NULL,
  `BikeName` varchar(255) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL,
  `Quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logintable`
--

CREATE TABLE `logintable` (
  `CustomerID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`CustomerID`, `OrderID`, `firstname`, `lastname`, `address`, `city`, `username`, `password`) VALUES
(1, 0, 'Edzie', 'Navarra', '1243', 'Bacolod City', 'deeznuts', 'deeznuts'),
(3, 0, 'Danrev', 'Villarosa', '1234', 'Bacolod City', 'ilikeu', 'ilikeu'),
(4, 0, 'Danrev', 'Villarosa', '1234', 'Bacolod City', 'ilikeu', 'ilikeu'),
(5, 0, 'Heinrich', 'Imperial', '1234', 'Bacolod', 'mamamia', 'mamamia'),
(6, 0, 'Heinrich', 'Imperial', '1234', 'Bacolod', 'mamamia', 'mamamia'),
(7, 0, 'Peter', 'Griffin', '1243', 'Bacolod', 'mamacook', 'mamacook'),
(8, 0, 'Peter', 'Griffin', '1243', 'Bacolod', 'mamacook', 'mamacook'),
(9, 0, 'dan', 'vil', 'villa angela', 'Bacolod City', 'drev', '1234'),
(10, 0, 'dan', 'vil', 'villa angela', 'Bacolod City', 'drev', '1234'),
(11, 0, 'dan', 'vil', 'villa angela', 'Bacolod City', 'drev', '1234'),
(12, 0, 'dan', 'vil', 'villa angela', 'Bacolod City', 'drev', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logintable`
--
ALTER TABLE `logintable`
  ADD PRIMARY KEY (`CustomerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logintable`
--
ALTER TABLE `logintable`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
