-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 06:00 PM
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
-- Database: `company_management_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Customer_Id` int(11) NOT NULL,
  `First_Name` varchar(120) DEFAULT NULL,
  `Last_Name` varchar(100) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Phone_Number` varchar(15) DEFAULT NULL,
  `Gender` varchar(76) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Customer_Id`, `First_Name`, `Last_Name`, `Email`, `Phone_Number`, `Gender`) VALUES
(1, 'mutesi', 'emme', 'emmemutsi@gmail.com', '078998999', 'Female'),
(2, 'rugema', 'phiona', 'phionabatamuriza25@gmail.com', '07806333307', 'Male'),
(5, 'rutambi', 'trand', 'sad@gmail.com', '07856777', 'Male'),
(6, 'emmyk', 'emme', 'emmki@gmail.com', '0723334443', 'Male'),
(7, 'batamuriza', 'phiona', 'phionabatamuriza25@gmail.com', '0780633330', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `Department_Id` int(11) NOT NULL,
  `Department_Name` varchar(76) DEFAULT NULL,
  `Department_Location` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`Department_Id`, `Department_Name`, `Department_Location`) VALUES
(1, 'Marketing', 'Kigali'),
(2, 'Finance', 'Kabare'),
(4, 'HR', 'HUYE'),
(5, 'Finance', 'Rulindo');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `Employee_Id` int(11) NOT NULL,
  `Department_Id` int(11) DEFAULT NULL,
  `First_Name` varchar(78) DEFAULT NULL,
  `Last_Name` varchar(98) DEFAULT NULL,
  `Email` varchar(70) DEFAULT NULL,
  `Position` varchar(50) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_Id`, `Department_Id`, `First_Name`, `Last_Name`, `Email`, `Position`, `Gender`) VALUES
(2, 2, 'fifi', 'angel', 'angelfif!@gmail.com', 'Accountant', 'Female'),
(3, 1, 'elia', 'mugwaneza', 'mugwelia@gmail.com', 'Security', 'Male'),
(6, 2, 'rukara', 'ganza', 'ganzar@gmail.com', 'CEO', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_Id` int(11) NOT NULL,
  `Product_Name` varchar(90) DEFAULT NULL,
  `Product_Price` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_Id`, `Product_Name`, `Product_Price`) VALUES
(1, 'computer', '50,000F'),
(4, 'Chapatti', '5445'),
(5, 'Laptops', '700000');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `Supplier_Id` int(11) NOT NULL,
  `Product_Id` int(11) DEFAULT NULL,
  `Supplier_Name` varchar(100) DEFAULT NULL,
  `Supplier_Phone` varchar(15) DEFAULT NULL,
  `Email` varchar(70) DEFAULT NULL,
  `Gender` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`Supplier_Id`, `Product_Id`, `Supplier_Name`, `Supplier_Phone`, `Email`, `Gender`) VALUES
(2, 1, 'eric', '0789899888', 'eric@gmail.com', 'Male'),
(3, 5, 'fghj', '0788888888', 'dfgh@gmail.com', 'Male'),
(6, 5, 'Goefrey', '07244555456', 'gfry@gmail.com', 'Male'),
(7, 4, 'benjamin pavard', '073222222244', 'pavbenjmn@gmail.com', 'Male'),
(8, 1, 'Angel', 'Uwera', 'anguwer@gmail.com', 'Female'),
(9, 5, 'techncompany ltd', '079886654321', 'comptechn@gmail.com', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'ggggg', 'dfggg', 'Phiona', 'dd@gmail.com', '34567', '$2y$10$MZ6WzkCiN2hsw/2jRemI8exkN/V7bz63Xb88e9RS2SjsJDz6bg.F2', '2024-04-23 12:01:30', '6', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Customer_Id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`Department_Id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`Employee_Id`),
  ADD KEY `Department_Id` (`Department_Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_Id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`Supplier_Id`),
  ADD KEY `Product_Id` (`Product_Id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `Customer_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `Department_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `Employee_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `Supplier_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`Department_Id`) REFERENCES `department` (`Department_Id`);

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`Product_Id`) REFERENCES `product` (`Product_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
