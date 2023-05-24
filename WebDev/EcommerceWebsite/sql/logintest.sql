-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2023 at 01:05 PM
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
-- Table structure for table `bikeorder`
--

CREATE TABLE `bikeorder` (
  `OrderID` int(11) NOT NULL,
  `BikeName` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Image` varchar(50) NOT NULL,
  `Price` longtext NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Stocks` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bikeorder`
--

INSERT INTO `bikeorder` (`OrderID`, `BikeName`, `Quantity`, `Image`, `Price`, `Description`, `Stocks`) VALUES
(1, '2023 Canyon Aeroad CF SLX 7 Disc Etap', 0, 'Bike1.JPG', '262505', 'Experience the incredible speed of a road race bike with world-class aerodynamics. With a newly developed, super-clean aero frame and integrated cockpit, this bike saves watts every time you turn the crank, so you can go faster and attack the field even h', 0),
(3, '2023 Canyon LUX World Cup CF 7', 0, 'bikeshop2.png', ' 305000', 'Instant acceleration, high top speed, precise handling: the Lux World Cup 7 comes into its own on techy climbs and is lightning fast when you’re sprinting to the line. Ready to race? Then you just might have found your perfect bike.', 40),
(4, '2023 Canyon Exceed CF 7', 0, 'Bike3.JPG', ' 136695', 'It’s even quicker than it looks! The fast and strong Exceed CF 7, with its light frame and unbeatable component spec, is a thoroughbred carbon race hardtail and expects to be ridden like one.', 25),
(5, 'Factor O2 Carbon Road Frameset', 0, 'bikeshop3.png', '147690', 'Lightweight all-round racing bike', 50),
(6, 'S-Works SL7 frameset', 0, 'bikeshop4.png', '345000', 'Why should you be forced to choose between aerodynamics and weight, between ride quality and speed? It is simple, you should not. Enter the new Tarmac climb on the lightest bike the UCI allows, then descend on the fastest. ', 50),
(7, 'Canyon Torque CF 8', 0, 'bike6.png', ' 243360', 'Bike park laps or enduro trails? 29 or 27.5 inch wheels? With the brand-new Torque CF 8, get the best of all worlds thanks to mullet wheel sizing and a progressive, highly-adjustable geometry.', 50);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `CartID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
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
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `UserType` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`CustomerID`, `firstname`, `lastname`, `address`, `city`, `username`, `password`, `UserType`, `Image`) VALUES
(3, 'deez', 'nutty', 'idk which', 'city', 'deez', '$2y$10$awVaHFXB/HWgmyaT.LlVyu4j2Yx7R9BNmjIEKMtrFx/QhWJLammX6', 1, ''),
(5, 'mama', 'mama', 'adress', 'city', 'mama', '$2y$10$7YmkDkmNqczME.Ab6OVB9eacARDD6erG62k0woelzdCMezSgppxo6', 1, ''),
(7, 'yikes', 'yikes', 'yikes', 'yikes', 'yikes', '$2y$10$yg4SdEnBMaoYO3rDv6pNYOCPcqdyTUffMdgKdZ5SjYolsnWgF0Flm', 0, ''),
(8, 'yikes', 'yikes', 'yikes', 'yikes', 'yikes', '$2y$10$yg4SdEnBMaoYO3rDv6pNYOCPcqdyTUffMdgKdZ5SjYolsnWgF0Flm', 0, '');

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
(5, 'Canyon Torque CF 8', ' 243360', 500, 'bike6.png', 'Tue May 23 2023', '1:17:32'),
(6, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 30, 'Bike1.JPG', 'Wed May 24 2023', '18:19:36'),
(7, '2023 Canyon Exceed CF 7', ' 136695', 1, 'Bike3.JPG', 'CurrentTime', 'CurrentDate'),
(8, '2023 Canyon Exceed CF 7', ' 136695', 1, 'Bike3.JPG', 'CurrentTime', 'CurrentDate'),
(9, '2023 Canyon Exceed CF 7', ' 136695', 1, 'Bike3.JPG', 'CurrentTime', 'CurrentDate'),
(10, '2023 Canyon Exceed CF 7', ' 136695', 1, 'Bike3.JPG', 'CurrentTime', 'CurrentDate'),
(11, '2023 Canyon Exceed CF 7', ' 136695', 1, 'Bike3.JPG', 'CurrentTime', 'CurrentDate'),
(12, '2023 Canyon Exceed CF 7', ' 136695', 1, 'Bike3.JPG', 'CurrentTime', 'CurrentDate'),
(13, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 50, 'Bike1.JPG', 'Wed May 24 2023', '18:32:39'),
(14, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 1, 'Bike1.JPG', 'Wed May 24 2023', '18:34:46'),
(15, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 1, 'Bike1.JPG', 'Wed May 24 2023', '18:41:46'),
(16, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 49, 'Bike1.JPG', 'Wed May 24 2023', '18:42:11'),
(17, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 1, 'Bike1.JPG', 'Wed May 24 2023', '18:44:36'),
(18, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 50, 'Bike1.JPG', 'Wed May 24 2023', '18:49:7'),
(19, '2023 Canyon Aeroad CF SLX 7 Disc Etap', '262505', 50, 'Bike1.JPG', 'Wed May 24 2023', '18:52:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bikeorder`
--
ALTER TABLE `bikeorder`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`CartID`);

--
-- Indexes for table `logintable`
--
ALTER TABLE `logintable`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `salesreport`
--
ALTER TABLE `salesreport`
  ADD PRIMARY KEY (`SalesID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bikeorder`
--
ALTER TABLE `bikeorder`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `CartID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logintable`
--
ALTER TABLE `logintable`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `salesreport`
--
ALTER TABLE `salesreport`
  MODIFY `SalesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
