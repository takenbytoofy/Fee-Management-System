-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 07:44 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ku_fms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `Adm_ID` varchar(64) NOT NULL,
  `adm_uname` varchar(255) NOT NULL,
  `adm_pswd` varchar(255) NOT NULL,
  `adm_last_login` datetime DEFAULT NULL,
  `adm_change_token` int(255) DEFAULT NULL,
  `token_expire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`Adm_ID`, `adm_uname`, `adm_pswd`, `adm_last_login`, `adm_change_token`, `token_expire`) VALUES
('adm_001', 'one@dmin', 'admin@123', '2024-05-15 07:26:58', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fee_receipts`
--

CREATE TABLE `fee_receipts` (
  `receipt_id` bigint(20) NOT NULL,
  `Std_ID` varchar(64) NOT NULL,
  `Prgm_ID` varchar(16) NOT NULL,
  `Enr_year` year(4) NOT NULL,
  `Bill_ID` float NOT NULL,
  `pmt_date` date NOT NULL,
  `receipt_img` longblob NOT NULL,
  `receipt_status` enum('Verified','Unverified','Declined') NOT NULL,
  `remarks` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fee_structure`
--

CREATE TABLE `fee_structure` (
  `Prgm_ID` varchar(16) NOT NULL,
  `Enr_year` year(4) NOT NULL,
  `admission_fee` double NOT NULL,
  `inst_1` double DEFAULT NULL,
  `inst_2` double DEFAULT NULL,
  `inst_3` double DEFAULT NULL,
  `inst_4` double DEFAULT NULL,
  `inst_5` double DEFAULT NULL,
  `inst_6` double DEFAULT NULL,
  `inst_7` double DEFAULT NULL,
  `inst_8` double DEFAULT NULL,
  `inst_9` double DEFAULT NULL,
  `inst_10` double DEFAULT NULL,
  `inst_11` double DEFAULT NULL,
  `inst_12` double DEFAULT NULL,
  `inst_13` double DEFAULT NULL,
  `inst_14` double DEFAULT NULL,
  `inst_15` double DEFAULT NULL,
  `inst_16` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `Prgm_ID` varchar(16) NOT NULL,
  `Prgm_Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`Prgm_ID`, `Prgm_Name`) VALUES
('BBIS', 'Bachelor of Business Information Systems');

-- --------------------------------------------------------

--
-- Table structure for table `program_bill`
--

CREATE TABLE `program_bill` (
  `Bill_ID` float NOT NULL,
  `Prgm_ID` varchar(16) NOT NULL,
  `Enr_year` year(4) NOT NULL,
  `installment` varchar(16) NOT NULL,
  `create_date` date NOT NULL,
  `due_date` date NOT NULL,
  `bill_status` enum('AC','IAC') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `Std_ID` varchar(64) NOT NULL,
  `Prgm_ID` varchar(16) NOT NULL,
  `Enr_year` year(4) NOT NULL,
  `Std_fname` varchar(256) NOT NULL,
  `Std_lname` varchar(256) NOT NULL,
  `Std_gender` enum('Male','Female','Others') NOT NULL,
  `Std_dob` date NOT NULL,
  `Std_email` varchar(255) NOT NULL,
  `Std_phone` varchar(16) NOT NULL,
  `Std_city` varchar(255) NOT NULL,
  `Std_sch_status` enum('Non','Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_bill`
--

CREATE TABLE `student_bill` (
  `Std_ID` varchar(64) NOT NULL,
  `Prgm_ID` varchar(16) NOT NULL,
  `Enr_year` year(4) NOT NULL,
  `Bill_ID` float NOT NULL,
  `Bill_Status` enum('Unpaid','Paid') NOT NULL DEFAULT 'Unpaid'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `Std_ID` varchar(64) NOT NULL,
  `std_uname` varchar(255) NOT NULL,
  `std_pswd` varchar(255) NOT NULL DEFAULT 'student@123',
  `std_last_login` datetime DEFAULT NULL,
  `change_token` int(255) DEFAULT NULL,
  `token_expire` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD UNIQUE KEY `Adm_ID` (`Adm_ID`),
  ADD UNIQUE KEY `adm_change_token` (`adm_change_token`);

--
-- Indexes for table `fee_receipts`
--
ALTER TABLE `fee_receipts`
  ADD PRIMARY KEY (`receipt_id`),
  ADD KEY `Std_ID` (`Std_ID`,`Prgm_ID`,`Enr_year`,`Bill_ID`);

--
-- Indexes for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD KEY `Prgm_ID` (`Prgm_ID`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`Prgm_ID`);

--
-- Indexes for table `program_bill`
--
ALTER TABLE `program_bill`
  ADD PRIMARY KEY (`Bill_ID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`Std_ID`,`Prgm_ID`,`Enr_year`),
  ADD UNIQUE KEY `Std_ID` (`Std_ID`),
  ADD KEY `Prgm_ID` (`Prgm_ID`);

--
-- Indexes for table `student_bill`
--
ALTER TABLE `student_bill`
  ADD PRIMARY KEY (`Std_ID`,`Prgm_ID`,`Enr_year`,`Bill_ID`),
  ADD KEY `Bill_ID` (`Bill_ID`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD UNIQUE KEY `std_uname` (`std_uname`),
  ADD KEY `Std_ID` (`Std_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fee_receipts`
--
ALTER TABLE `fee_receipts`
  MODIFY `receipt_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `program_bill`
--
ALTER TABLE `program_bill`
  MODIFY `Bill_ID` float NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fee_receipts`
--
ALTER TABLE `fee_receipts`
  ADD CONSTRAINT `fee_receipts_ibfk_1` FOREIGN KEY (`Std_ID`,`Prgm_ID`,`Enr_year`) REFERENCES `student` (`Std_ID`, `Prgm_ID`, `Enr_year`),
  ADD CONSTRAINT `fee_receipts_ibfk_2` FOREIGN KEY (`Std_ID`,`Prgm_ID`,`Enr_year`,`Bill_ID`) REFERENCES `student_bill` (`Std_ID`, `Prgm_ID`, `Enr_year`, `Bill_ID`);

--
-- Constraints for table `fee_structure`
--
ALTER TABLE `fee_structure`
  ADD CONSTRAINT `fee_structure_ibfk_1` FOREIGN KEY (`Prgm_ID`) REFERENCES `program` (`Prgm_ID`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`Prgm_ID`) REFERENCES `program` (`Prgm_ID`);

--
-- Constraints for table `student_bill`
--
ALTER TABLE `student_bill`
  ADD CONSTRAINT `student_bill_ibfk_1` FOREIGN KEY (`Std_ID`,`Prgm_ID`,`Enr_year`) REFERENCES `student` (`Std_ID`, `Prgm_ID`, `Enr_year`),
  ADD CONSTRAINT `student_bill_ibfk_2` FOREIGN KEY (`Bill_ID`) REFERENCES `program_bill` (`Bill_ID`),
  ADD CONSTRAINT `student_bill_ibfk_3` FOREIGN KEY (`Std_ID`,`Prgm_ID`,`Enr_year`) REFERENCES `student` (`Std_ID`, `Prgm_ID`, `Enr_year`);

--
-- Constraints for table `student_login`
--
ALTER TABLE `student_login`
  ADD CONSTRAINT `student_login_ibfk_1` FOREIGN KEY (`Std_ID`) REFERENCES `student` (`Std_ID`),
  ADD CONSTRAINT `student_login_ibfk_2` FOREIGN KEY (`Std_ID`) REFERENCES `student` (`Std_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
