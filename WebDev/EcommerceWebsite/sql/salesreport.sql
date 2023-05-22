-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 07:35 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

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
-- Table structure for table `salesreport`
--

CREATE TABLE `salesreport` (
  `SalesID` int(11) NOT NULL,
  `BikeName` varchar(50) NOT NULL,
  `Price` longtext NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `salesreport`
--

INSERT INTO `salesreport` (`SalesID`, `BikeName`, `Price`, `Quantity`, `Image`, `date`, `time`) VALUES
(4, 'Canyon Torque CF 8', ' 243360', 1000, 'bike6.png', 'Tue May 23 2023', '1:16:15'),
(5, 'Canyon Torque CF 8', ' 243360', 500, 'bike6.png', 'Tue May 23 2023', '1:17:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `salesreport`
--
ALTER TABLE `salesreport`
  ADD PRIMARY KEY (`SalesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `salesreport`
--
ALTER TABLE `salesreport`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
