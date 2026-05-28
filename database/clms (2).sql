-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 06:16 PM
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
-- Database: `clms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `sl.no` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`sl.no`, `email`, `password`) VALUES
(1, 'ankushstar121@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(7) NOT NULL,
  `d_id` int(7) NOT NULL,
  `p_id` int(7) NOT NULL,
  `app_date` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `d_id`, `p_id`, `app_date`, `status`) VALUES
(1, 9, 7, '2024-05-12', 'completed'),
(2, 9, 4, '2024-05-15', 'completed'),
(3, 9, 7, '2024-06-02', 'completed'),
(4, 9, 7, '2024-06-15', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(10) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `d_email` varchar(255) NOT NULL,
  `d_password` varchar(255) NOT NULL,
  `d_desg` varchar(255) NOT NULL,
  `d_dept` varchar(255) NOT NULL,
  `d_specialist` varchar(255) NOT NULL,
  `d_education` varchar(255) NOT NULL,
  `d_exp` varchar(255) NOT NULL,
  `d_workingdays` varchar(255) NOT NULL,
  `d_phone` varchar(255) NOT NULL,
  `d_addrr` varchar(255) NOT NULL,
  `d_fees` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `d_name`, `d_email`, `d_password`, `d_desg`, `d_dept`, `d_specialist`, `d_education`, `d_exp`, `d_workingdays`, `d_phone`, `d_addrr`, `d_fees`) VALUES
(9, 'Ankush Sharma', 'sharma121@gmail.com', 'Ankush121', 'PHD', 'cardio', 'cardio', 'phd', '10+', 'saturday', '9064704451', 'Asansol', '1000');

-- --------------------------------------------------------

--
-- Table structure for table `drugs`
--

CREATE TABLE `drugs` (
  `id` int(7) NOT NULL,
  `trade_name` varchar(255) NOT NULL,
  `generic_name` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drugs`
--

INSERT INTO `drugs` (`id`, `trade_name`, `generic_name`, `note`) VALUES
(1, 'Amlodepine', 'Amlo', 'For High Blood Pressure.');

-- --------------------------------------------------------

--
-- Table structure for table `mlt`
--

CREATE TABLE `mlt` (
  `id` int(7) NOT NULL,
  `mlt_name` varchar(255) NOT NULL,
  `mlt_email` varchar(255) NOT NULL,
  `mlt_password` varchar(255) NOT NULL,
  `mlt_dept` varchar(255) NOT NULL,
  `mlt_education` varchar(255) NOT NULL,
  `mlt_exp` varchar(255) NOT NULL,
  `mlt_phone` varchar(255) NOT NULL,
  `mlt_addrr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlt`
--

INSERT INTO `mlt` (`id`, `mlt_name`, `mlt_email`, `mlt_password`, `mlt_dept`, `mlt_education`, `mlt_exp`, `mlt_phone`, `mlt_addrr`) VALUES
(1, 'Aman', 'aman@gmail.com', 'Aman121', 'Urine', 'Radiologist', '5+', '9932676543', 'Damodar');

-- --------------------------------------------------------

--
-- Table structure for table `mlt_appointment`
--

CREATE TABLE `mlt_appointment` (
  `id` int(7) NOT NULL,
  `test_id` int(7) NOT NULL,
  `p_id` int(7) NOT NULL,
  `app_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlt_appointment`
--

INSERT INTO `mlt_appointment` (`id`, `test_id`, `p_id`, `app_date`) VALUES
(1, 1, 7, '2024-05-12');

-- --------------------------------------------------------

--
-- Table structure for table `mlt_schedule`
--

CREATE TABLE `mlt_schedule` (
  `id` int(7) NOT NULL,
  `test_id` int(7) NOT NULL,
  `day` varchar(255) NOT NULL,
  `timings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mlt_schedule`
--

INSERT INTO `mlt_schedule` (`id`, `test_id`, `day`, `timings`) VALUES
(1, 1, 'TUE', '06:00 AM - 08:00 PM'),
(2, 1, 'WED', '06:00 AM - 08:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(7) NOT NULL,
  `p_name` varchar(100) NOT NULL,
  `p_email` varchar(100) NOT NULL,
  `p_phone` varchar(100) NOT NULL,
  `p_gender` varchar(255) NOT NULL,
  `p_bloodgroup` varchar(255) NOT NULL,
  `p_dob` varchar(255) NOT NULL,
  `p_age` varchar(255) NOT NULL,
  `p_rname` varchar(255) NOT NULL,
  `p_rphone` varchar(255) NOT NULL,
  `p_state` varchar(255) NOT NULL,
  `p_district` varchar(255) NOT NULL,
  `p_addrr` varchar(255) NOT NULL,
  `p_descp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `p_name`, `p_email`, `p_phone`, `p_gender`, `p_bloodgroup`, `p_dob`, `p_age`, `p_rname`, `p_rphone`, `p_state`, `p_district`, `p_addrr`, `p_descp`) VALUES
(1, 'Hello', 'gogogo@gmail.com', '', '', '', '', '', '', '', '', '', '', ''),
(3, 'hello3', 'g2@gmail.com', '8877', '', '', '', '', '', '', '', '', '', ''),
(4, 'test1', 'gg2@gmail.com', '3344', '', '', '', '', '', '', '', '', '', ''),
(5, 'test3', 'hel@gmail.com', '887788777', '', '', '', '', '', '', '', '', '', ''),
(6, 'test4', 'hh@gmail.com', '99886688', '', '', '', '', '', '', '', '', '', ''),
(7, 'Ankush sharma', 'ankush121@gmail.com', '9064704451', 'male', 'B+', '03/11/2002', '21', 'Rahul Shaw', '99032646578', 'wb', 'Paschim Bardhanman', 'Dhrup Dangal', 'Viral Fever');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(7) NOT NULL,
  `p_id` int(7) NOT NULL,
  `p_date` date NOT NULL,
  `description` varchar(255) NOT NULL,
  `m1` varchar(255) NOT NULL,
  `m2` varchar(255) NOT NULL,
  `t1` varchar(255) NOT NULL,
  `t2` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `p_id`, `p_date`, `description`, `m1`, `m2`, `t1`, `t2`) VALUES
(1, 7, '2024-05-08', 'Fever 100', 'Paracetamol', '', 'Blood test', ''),
(2, 0, '2024-05-15', 'dtgrgeg', 'azitromycin', '', 'urinalysis', ''),
(3, 0, '2024-05-15', 'cough', 'azitromycin', '', 'urinalysis', ''),
(4, 4, '2024-05-15', 'cough cold fever', 'azitromycin', '', 'urinalysis', ''),
(5, 4, '2024-05-15', 'cough cold fever', 'azitromycin', '', 'urinalysis, sugartest', '');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `day` varchar(255) NOT NULL,
  `timings` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `d_id`, `d_name`, `day`, `timings`) VALUES
(6, 9, 'Ankush Sharma', 'SUN', '05:00 AM - 05:00 PM'),
(7, 9, 'Ankush Sharma', 'SAT', '05:00 AM - 05:00 PM'),
(13, 9, 'Ankush Sharma', 'WED', '05:00 AM - 05:00 PM'),
(14, 9, 'Ankush Sharma', 'FRI', '05:00 AM - 05:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(7) NOT NULL,
  `mlt_id` int(11) NOT NULL,
  `test_name` varchar(255) NOT NULL,
  `test_descp` varchar(255) NOT NULL,
  `test_fees` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `mlt_id`, `test_name`, `test_descp`, `test_fees`) VALUES
(1, 1, 'Urinalysis', 'for urine.', '1000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`sl.no`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drugs`
--
ALTER TABLE `drugs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlt`
--
ALTER TABLE `mlt`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlt_appointment`
--
ALTER TABLE `mlt_appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mlt_schedule`
--
ALTER TABLE `mlt_schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `sl.no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `drugs`
--
ALTER TABLE `drugs`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `mlt`
--
ALTER TABLE `mlt`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mlt_appointment`
--
ALTER TABLE `mlt_appointment`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mlt_schedule`
--
ALTER TABLE `mlt_schedule`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
