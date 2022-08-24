-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2022 at 07:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User_id` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Contact_No` char(10) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Al1` varchar(30) DEFAULT NULL,
  `City` varchar(30) DEFAULT NULL,
  `Pincode` varchar(6) NOT NULL,
  `Shop_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`User_id`, `Password`, `Name`, `Contact_No`, `Email`, `Al1`, `City`, `Pincode`, `Shop_name`) VALUES
('abdul123', 'A05092001', 'Abdul kadir', '8770298893', 'Abdul12@gmail.com', 'bina', 'Indore', '452014', 'Abdul mobile Repairng'),
('fjfgvjh', '654676', 'jghj', '47676874', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Chhatarpur', '471311', NULL),
('gopal05', 'g05092001', 'Gopal Asati', '7582969596', 'gopalasati@gmail.com', 'word 07 house no.124', 'indore', '452014', 'Krishna Shree Service centre'),
('Hariom@123', 'H05092001', 'Hariom Asati', '8770298893', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Indore', '452014', 'Harry Mobile Repairing'),
('haseeb12', 'H05092001', 'Sheikh Haseeb', '0877029889', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Indore', '452014', 'Haseeb mobile Reparing'),
('priyanshu12', 'P05092001', 'Priyanshu Gupta', '0877029889', 'Asatihariom95@gmail.', 'word 07 house no.124', 'indore', '471311', 'Shree mobile shop');

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `Invoice_no` int(10) NOT NULL,
  `Repair_charge` int(11) DEFAULT NULL,
  `Dil_charge` int(11) DEFAULT NULL,
  `Discount` int(11) DEFAULT NULL,
  `Tax` int(11) DEFAULT NULL,
  `Total` int(11) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `User_id` varchar(20) DEFAULT NULL,
  `Date2` date NOT NULL DEFAULT current_timestamp(),
  `Imei` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`Invoice_no`, `Repair_charge`, `Dil_charge`, `Discount`, `Tax`, `Total`, `Username`, `User_id`, `Date2`, `Imei`) VALUES
(1, 500, 40, 5, 9, 560, 'Abdulq123', 'Priyanshu12', '0000-00-00', NULL),
(2, 400, 0, 3, 3, 400, 'sandesh123', 'Priyanshu12', '2021-01-06', NULL),
(3, 1000, 0, 4, 3, 990, 'Pari123', 'Priyanshu12', '2021-01-08', NULL),
(4, 2000, 0, 4, 5, 2020, 'yash123', 'Priyanshu12', '2021-01-08', NULL),
(5, 3000, 0, 0, 10, 3300, 'haseeb123', 'Priyanshu12', '2021-01-13', NULL),
(6, 3000, 40, 0, 5, 3190, 'Anuj123', 'Priyanshu12', '2021-01-16', '77652345'),
(7, 2000, 100, 0, 4, 2180, 'Anuj123', 'Priyanshu12', '2021-01-16', '86716803462'),
(8, 4000, 0, 2, 2, 4000, 'Anuj123', 'Priyanshu12', '2021-01-22', '77652345'),
(9, 3000, 0, 5, 5, 3000, 'ruchit123', 'priyanshu12', '2021-02-07', '564987'),
(10, 3000, 0, 0, 10, 3300, 'ruchit123', 'priyanshu12', '2021-02-12', '98975787'),
(13, 3000, 0, 0, 15, 3450, 's123', 'Priyanshu12', '2021-02-13', '454544'),
(14, 1000, 100, 0, 20, 1300, 's123', 'Priyanshu12', '2021-02-13', '66779988'),
(15, 2000, 0, 3, 4, 2020, 'anuj@55', 'Priyanshu12', '2021-02-13', '55667788'),
(16, 2000, 0, 5, 2, 1940, 'anuj@55', 'Hariom@123', '2021-08-29', '898989'),
(17, 2000, 0, 5, 3, 1960, 'Abdul12', 'Gopal05', '2022-08-24', '78987689');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `C_fn` varchar(20) NOT NULL,
  `C_ln` varchar(20) DEFAULT NULL,
  `C_no` varchar(10) DEFAULT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Ali` varchar(30) DEFAULT NULL,
  `City` varchar(20) DEFAULT NULL,
  `Pincode` varchar(6) NOT NULL,
  `User_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`Username`, `Password`, `C_fn`, `C_ln`, `C_no`, `Email`, `Ali`, `City`, `Pincode`, `User_id`) VALUES
('A123456', '123456', 'Abhishekh ', 'prajapati', '0877029889', 'abghsnfdngb@gmail.co', 'word 07 house no.124', 'Bada Malhera', '471311', NULL),
('Abdul12', 'a05092001', 'Abdul ', 'qadir', '8770298893', 'abdul05@gmail.com', 'word 07 house no.124', 'Indore', '471311', 'gopal05'),
('Abdulq123', 'fjgbmj', 'Abdul', 'kadir', '8770298893', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Indore', '452014', 'priyanshu12'),
('Ankit123', 'A05092001', 'Ankit', 'Alok', '0877029889', 'Asatihariom95@gmail.', 'word 07 house no.124', 'indore', '471311', 'haseeb12'),
('anuj123', 'a123', 'Anuj', 'parkhi', '7766644489', 'anujparkhi12@gmail.c', 'khajarana', 'Indore', '452014', 'haseeb12'),
('anuj@55', 'a123', 'Anuj ', 'parkhi', '7566813945', 'anujparkhi12@gmail.c', 'word 07 house no.124', 'Indore', '452014', 'Hariom@123'),
('deepika12', 'D05092001', 'Deepika', 'Morya', '6765456787', 'deepika12@gmail.com', 'word no.07 house 124', 'indore', '452014', 'priyanshu12'),
('gaurav123', 'g123', 'gaurav', 'bhaiya', '623998489', 'gauravbhaiya@gmail.c', '475 Vishnupuri nx', 'Indore', '452014', 'Hariom@123'),
('Harry', 'H05092001', 'Abdul', 'kadir', '8770298893', 'abdulkdir@gmail.com', 'word 07 house no.124', 'Chhatarpur', '471311', 'fjfgvjh'),
('haseeb123', 'H0905', 'Haseeb', 'usmani', '7415340484', 'haseeb123@gmail.com', 'khajrana', 'indore', '452014', 'priyanshu12'),
('Mokshada', '12345', 'Yash ', 'purohit', '73646346', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Bada Malhera', '471311', NULL),
('pari123', '12345', 'Paridhi', 'parshai', '0877029889', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Indore', '471311', 'priyanshu12'),
('Paridhi', 'mjkmhk', 'Hariom', 'Asati', '0877029889', 'Asatihariom95@gmail.', 'jhukh,ik', 'Bada Malhera', '471311', NULL),
('Ravi@123', 'H05092001', 'Ravi ', 'Asati', '7566813945', 'raviasati@Gmail.com', 'word 07 house no.124', 'Bada Malhera', '471311', NULL),
('Rinkesh', 'hjgugugu', 'Hariom', 'Asati', '0877029889', 'Asatihariom95@gmail.', 'jhukh,ik', 'Bada Malhera', '471311', NULL),
('rinkesh123', 'H05092001', 'rinkesh', 'Asati', '7582969596', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Bada Malhera', '471311', NULL),
('ruchit123', 'r123', 'Ruchit', 'gule', '7788986578', 'ruchitgule12@gmail.c', 'word no.07 house 124', 'indore', '452014', 'priyanshu12'),
('s123', 's05092001', 'Sanket', 'Asati', '9977900582', 'Asatihariom95@gmail.', 'word 07 house no.124', 'Indore', '471311', 'priyanshu12'),
('sandesh123', '12345', 'sanedseh', 'yadav', '7697807800', 'sandesh19yada@gmail.', 'cw-233,sukhaliya', 'indore', '452010', 'priyanshu12'),
('shivanshi', 's123', 'Shivanshi ', 'tiwari', '374673687', 'shivnshi132@gmail.co', 'word 07 house no.124', 'indore', '452014', 'Hariom@123'),
('yash123', 'y05092001', 'Yash', 'Purohit', '6265809345', 'yashpurohit12@gmail.', 'word 8 house 123', 'Indore', '452014', 'priyanshu12');

-- --------------------------------------------------------

--
-- Table structure for table `d_boys`
--

CREATE TABLE `d_boys` (
  `D_id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `Contact_no` varchar(10) DEFAULT NULL,
  `email` varchar(30) NOT NULL,
  `jobs` int(11) DEFAULT NULL,
  `User_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `d_boys`
--

INSERT INTO `d_boys` (`D_id`, `Name`, `Contact_no`, `email`, `jobs`, `User_id`) VALUES
(6, 'Hariom asati', '0877029889', 'Asatihariom95@gmail.com', -1, 'Hariom@123'),
(7, 'ravi asati', '7566813945', 'raviasati@gmail.com', 5, 'Priyanshu12'),
(9, 'yash purohit ', '9890324576', 'yashpurohit12@gmail.com', -2, 'Priyanshu12'),
(11, 'harry', '7582969596', 'rink123@gmail.com', 0, 'Priyanshu12'),
(13, 'Yash purohit', '6265879890', 'yash12@gmail.com', -1, 'Priyanshu12'),
(18, 'Harry', '8770298893', 'asatihariom@gmail.com', 0, 'Priyanshu12');

-- --------------------------------------------------------

--
-- Table structure for table `mobile`
--

CREATE TABLE `mobile` (
  `Imei` varchar(30) NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Model` varchar(20) DEFAULT NULL,
  `Status` varchar(40) DEFAULT NULL,
  `Username` varchar(20) DEFAULT NULL,
  `pickup` tinyint(1) NOT NULL,
  `delivery` tinyint(1) NOT NULL,
  `dod` date DEFAULT NULL,
  `dop` date DEFAULT NULL,
  `D_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mobile`
--

INSERT INTO `mobile` (`Imei`, `Brand`, `Model`, `Status`, `Username`, `pickup`, `delivery`, `dod`, `dop`, `D_id`) VALUES
('123', 'Realme', 'dx18009', 'Reject', 'sandesh123', 0, 0, NULL, NULL, NULL),
('123489077', 'Sansung', 'm31s', 'Assigned to', 'deepika12', 1, 1, NULL, '2021-02-13', 11),
('1237', 'Realme', 'dx18009', 'Delivard', 'sandesh123', 0, 0, NULL, '2021-01-06', NULL),
('26549875', 'samsung', 'm3', 'Reject', 'ruchit123', 0, 0, NULL, NULL, NULL),
('454544', 'Realme', '5pro', 'Delivard', 's123', 0, 0, NULL, '2021-02-13', NULL),
('55667788', 'Sansung', 'm31s', 'Repaired', 'anuj@55', 0, 0, NULL, '2021-02-13', NULL),
('564987', 'samsung', 'm3', 'Repaired', 'ruchit123', 0, 0, NULL, '2021-02-07', NULL),
('66779988', 'Sansung', 'm31s', 'Delivard', 's123', 1, 1, NULL, '2021-02-13', 13),
('75767878', 'samsung', 'm31s', NULL, 'anuj123', 0, 0, NULL, NULL, NULL),
('7680989', 'REALME', '5PRO', '', 'sandesh123', 0, 0, NULL, NULL, NULL),
('77652345', 'Realme', 'J5', 'Delivard', 'Anuj123', 0, 0, NULL, '2021-01-23', NULL),
('789065', 'samsung', 'A9', '', 'ruchit123', 0, 0, NULL, NULL, NULL),
('78987689', 'Realme', '5pro', 'Checkout', 'Abdul12', 0, 0, NULL, '2022-08-24', NULL),
('85190376', 'Lenevo', 'a8', 'Delivard', 'deepika12', 1, 1, NULL, '2021-02-13', 6),
('86716803462', 'honor', '9lite', 'Delivard', 'Anuj123', 1, 1, NULL, '2021-01-16', 9),
('878', 'Sansung', 'm4556', NULL, 'Ankit123', 0, 0, NULL, NULL, NULL),
('87856764', 'oppo', 'A9', '', 'ruchit123', 0, 0, NULL, NULL, NULL),
('898989', 'Realme', '5pro', 'Checkout', 'anuj@55', 0, 0, NULL, '2021-08-29', NULL),
('98975787', 'REALME', 'A9', '', 'ruchit123', 0, 0, NULL, '2021-02-12', NULL),
('j123', 'Sansung', 'redmi9', 'Delivard', 'yash123', 0, 0, NULL, '2021-01-08', NULL),
('j70', 'Realme', 'J5', 'Delivard', 'Pari123', 0, 0, NULL, '2020-12-29', NULL),
('j78', 'Sansung', 'm31', NULL, 'Harry', 0, 0, NULL, NULL, NULL),
('j789', 'honor', '9lite', 'Delivard', 'haseeb123', 0, 0, NULL, '2021-01-13', NULL),
('j8907', 'Sansung', 'j40', 'Delivard', 'Abdulq123', 1, 1, '2021-01-10', '2021-01-09', 7),
('j90', 'Sansung', 'm31s', 'Delivard', 'Pari123', 0, 0, NULL, '2021-01-08', NULL),
('j9087', 'Realme', '5pro', NULL, 'Harry', 0, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mpr`
--

CREATE TABLE `mpr` (
  `Imei` varchar(30) DEFAULT NULL,
  `P_id` int(11) DEFAULT NULL,
  `Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mpr`
--

INSERT INTO `mpr` (`Imei`, `P_id`, `Date`) VALUES
('j70', 38, '2020-12-29'),
('j8907', 39, '2020-12-31'),
('123', 40, '2021-01-06'),
('1237', 41, '2021-01-06'),
('j90', 42, '2021-01-08'),
('j123', 43, '2021-01-08'),
('j789', 44, '2021-01-13'),
('86716803462', 45, '2021-01-16'),
('77652345', 46, '2021-01-16'),
('j9087', 47, '2021-01-19'),
('j78', 48, '2021-01-19'),
('77652345', 49, '2021-01-22'),
('77652345', 50, '2021-01-22'),
('77652345', 51, '2021-01-22'),
('77652345', 52, '2021-01-22'),
('77652345', 53, '2021-01-22'),
('26549875', 54, '2021-02-07'),
('564987', 55, '2021-02-07'),
('87856764', 56, '2021-02-12'),
('98975787', 57, '2021-02-12'),
('98975787', 58, '2021-02-12'),
('98975787', 59, '2021-02-12'),
('789065', 60, '2021-02-13'),
('789065', 61, '2021-02-13'),
('7680989', 62, '2021-02-13'),
('7680989', 63, '2021-02-13'),
('85190376', 64, '2021-02-13'),
('123489077', 65, '2021-02-13'),
('454544', 66, '2021-02-13'),
('66779988', 67, '2021-02-13'),
('55667788', 68, '2021-02-13'),
('878', 69, '2021-03-15'),
('77652345', 69, '2021-03-17'),
('898989', 70, '2021-08-29'),
('75767878', 71, '2021-08-29'),
('78987689', 72, '2022-08-24');

-- --------------------------------------------------------

--
-- Table structure for table `problem`
--

CREATE TABLE `problem` (
  `P_id` int(11) NOT NULL,
  `p_no` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problem`
--

INSERT INTO `problem` (`P_id`, `p_no`) VALUES
(37, 1),
(38, 1),
(44, 1),
(45, 1),
(51, 1),
(52, 1),
(57, 1),
(60, 1),
(42, 2),
(46, 2),
(47, 2),
(53, 2),
(55, 2),
(58, 2),
(59, 2),
(61, 2),
(62, 2),
(68, 2),
(72, 2),
(39, 3),
(48, 3),
(49, 3),
(50, 3),
(54, 3),
(56, 3),
(63, 3),
(64, 3),
(67, 3),
(69, 3),
(70, 3),
(71, 3),
(40, 4),
(41, 4),
(43, 4),
(66, 4),
(65, 6);

-- --------------------------------------------------------

--
-- Table structure for table `problemlist`
--

CREATE TABLE `problemlist` (
  `p_no` int(11) NOT NULL,
  `p_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `problemlist`
--

INSERT INTO `problemlist` (`p_no`, `p_name`) VALUES
(1, 'FOLDER ISSUE'),
(2, 'BAATERY PROBLEM'),
(3, 'Display'),
(4, 'Toch problem'),
(6, 'Chargeining pin'),
(7, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `repaireman`
--

CREATE TABLE `repaireman` (
  `R_id` int(11) NOT NULL,
  `Name` varchar(20) DEFAULT NULL,
  `C_no` varchar(10) DEFAULT NULL,
  `Address` varchar(30) NOT NULL,
  `City` varchar(15) DEFAULT NULL,
  `DOJ` date NOT NULL DEFAULT current_timestamp(),
  `jobs` int(11) DEFAULT NULL,
  `Imei` varchar(30) DEFAULT NULL,
  `User_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `repaireman`
--

INSERT INTO `repaireman` (`R_id`, `Name`, `C_no`, `Address`, `City`, `DOJ`, `jobs`, `Imei`, `User_id`) VALUES
(36, 'Priynshu gupta', '722656775', 'word no.7', 'Chhatarpur', '2020-12-28', NULL, '898989', 'Hariom@123'),
(37, 'Yash purohit', '6265809345', 'word no.7', 'Ratlam', '2020-12-29', -2, 'j70', 'Hariom@123'),
(38, 'deepak jain', '6357464687', 'wojdj', 'Chhatarpur', '2020-12-31', 2, 'j123', 'Priyanshu12'),
(39, 'Gopal Gupta', '7228022855', 'vishnupuri', 'Indore', '2020-12-31', 2, '66779988', 'Priyanshu12'),
(40, 'Abdul Kadir', '0877029889', 'word no.7', 'Bada Malhera', '2021-01-13', 3, '55667788', 'Priyanshu12'),
(41, 'Aditi sharma', '7582969596', 'word no.07,indore', NULL, '0000-00-00', 0, '78987689', 'Gopal05'),
(42, 'Aditi sharma', '7582969596', 'word no.07,indore', '', '0000-00-00', 0, NULL, 'Gopal05'),
(43, 'Aditi sharma', '07582 9695', 'word no.07,indore', 'Chhatarpur', '0000-00-00', 0, NULL, 'Gopal05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`Invoice_no`),
  ADD KEY `Username` (`Username`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`Username`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `d_boys`
--
ALTER TABLE `d_boys`
  ADD PRIMARY KEY (`D_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `mobile`
--
ALTER TABLE `mobile`
  ADD PRIMARY KEY (`Imei`),
  ADD KEY `Username` (`Username`),
  ADD KEY `D_id` (`D_id`);

--
-- Indexes for table `mpr`
--
ALTER TABLE `mpr`
  ADD KEY `Imei` (`Imei`),
  ADD KEY `P_id` (`P_id`);

--
-- Indexes for table `problem`
--
ALTER TABLE `problem`
  ADD PRIMARY KEY (`P_id`),
  ADD KEY `p_no` (`p_no`);

--
-- Indexes for table `problemlist`
--
ALTER TABLE `problemlist`
  ADD PRIMARY KEY (`p_no`);

--
-- Indexes for table `repaireman`
--
ALTER TABLE `repaireman`
  ADD PRIMARY KEY (`R_id`),
  ADD KEY `Imei` (`Imei`),
  ADD KEY `User_id` (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `Invoice_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `d_boys`
--
ALTER TABLE `d_boys`
  MODIFY `D_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `problem`
--
ALTER TABLE `problem`
  MODIFY `P_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `problemlist`
--
ALTER TABLE `problemlist`
  MODIFY `p_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `repaireman`
--
ALTER TABLE `repaireman`
  MODIFY `R_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bill`
--
ALTER TABLE `bill`
  ADD CONSTRAINT `bill_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`),
  ADD CONSTRAINT `bill_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `admin` (`User_id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `customer_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `admin` (`User_id`);

--
-- Constraints for table `d_boys`
--
ALTER TABLE `d_boys`
  ADD CONSTRAINT `d_boys_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `admin` (`User_id`);

--
-- Constraints for table `mobile`
--
ALTER TABLE `mobile`
  ADD CONSTRAINT `mobile_ibfk_1` FOREIGN KEY (`Username`) REFERENCES `customer` (`Username`),
  ADD CONSTRAINT `mobile_ibfk_2` FOREIGN KEY (`D_id`) REFERENCES `d_boys` (`D_id`);

--
-- Constraints for table `mpr`
--
ALTER TABLE `mpr`
  ADD CONSTRAINT `mpr_ibfk_1` FOREIGN KEY (`Imei`) REFERENCES `mobile` (`Imei`),
  ADD CONSTRAINT `mpr_ibfk_2` FOREIGN KEY (`P_id`) REFERENCES `problem` (`P_id`);

--
-- Constraints for table `problem`
--
ALTER TABLE `problem`
  ADD CONSTRAINT `problem_ibfk_1` FOREIGN KEY (`p_no`) REFERENCES `problemlist` (`p_no`);

--
-- Constraints for table `repaireman`
--
ALTER TABLE `repaireman`
  ADD CONSTRAINT `repaireman_ibfk_1` FOREIGN KEY (`Imei`) REFERENCES `mobile` (`Imei`),
  ADD CONSTRAINT `repaireman_ibfk_2` FOREIGN KEY (`User_id`) REFERENCES `admin` (`User_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
