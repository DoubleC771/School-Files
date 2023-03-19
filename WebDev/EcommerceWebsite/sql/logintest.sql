-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 07:30 PM
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
(1, '2023 Canyon Aeroad CF SLX 7 Disc Etap', 0, 'Bike1.JPG', '262505', 'Experience the incredible speed of a road race bike with world-class aerodynamics. With a newly developed, super-clean aero frame and integrated cockpit, this bike saves watts every time you turn the crank, so you can go faster and attack the field even h', 30),
(3, '2023 Canyon LUX World Cup CF 7', 0, 'bikeshop2.png', ' 305000', 'Instant acceleration, high top speed, precise handling: the Lux World Cup 7 comes into its own on techy climbs and is lightning fast when you’re sprinting to the line. Ready to race? Then you just might have found your perfect bike.', 25),
(4, '2023 Canyon Exceed CF 7', 0, 'Bike3.JPG', ' 136695', 'It’s even quicker than it looks! The fast and strong Exceed CF 7, with its light frame and unbeatable component spec, is a thoroughbred carbon race hardtail and expects to be ridden like one.', 50),
(5, 'Factor O2 Carbon Road Frameset', 0, 'bikeshop3.png', '147690', 'Lightweight all-round racing bike', 49),
(6, 'S-Works SL7 frameset', 0, 'bikeshop4.png', '345000', 'Why should you be forced to choose between aerodynamics and weight, between ride quality and speed? It is simple, you should not. Enter the new Tarmac climb on the lightest bike the UCI allows, then descend on the fastest. ', 12),
(7, 'Canyon Torque CF 8', 0, 'bike6.png', ' 243360', 'Bike park laps or enduro trails? 29 or 27.5 inch wheels? With the brand-new Torque CF 8, get the best of all worlds thanks to mullet wheel sizing and a progressive, highly-adjustable geometry.', 34);

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
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `UserType` int(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logintable`
--

INSERT INTO `logintable` (`CustomerID`, `firstname`, `lastname`, `address`, `city`, `username`, `password`, `UserType`, `Image`) VALUES
(2, 'dan', 'vil', 'villa angela', 'Bacolod City', 'drev', '1234', 1, ''),
(5, 'Edzie Mari', 'Navarra', 'Blk3', 'Bacolod', 'deez', 'deez', 0, '');

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
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `logintable`
--
ALTER TABLE `logintable`
  ADD PRIMARY KEY (`CustomerID`);

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
  MODIFY `OrderID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `logintable`
--
ALTER TABLE `logintable`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
