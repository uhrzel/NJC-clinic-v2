-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 10:02 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `njc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$RB1iEUtmiJUdZ3ffB.njfe6pKJqRxcQb9QXy04h3ZCGK9Nz.YVUPG', '2024-04-01 04:20:00');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `middlename` varchar(255) DEFAULT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `registered` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `firstname`, `lastname`, `middlename`, `contactnumber`, `password`, `registered`) VALUES
(1, 'john', ' new', ' doe', '09123456789', '$2y$10$MYfhQQQbWoCLKLXtzOgTIOUUd.vezUHdZW354oT0ijjTcUJ/PhKvu', '2024-04-11 05:35:57');

-- --------------------------------------------------------

--
-- Table structure for table `dentist`
--

CREATE TABLE `dentist` (
  `dentist_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dentist`
--

INSERT INTO `dentist` (`dentist_id`, `username`, `password`) VALUES
(1, 'dentist', '$2y$10$55m19Rt2aDlg0jZav8Fyq.V0tsVi//X7G7jBOII1mSlCG0s.z2y.O');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `height` decimal(5,2) DEFAULT NULL,
  `weight` decimal(5,2) DEFAULT NULL,
  `contactnumber` varchar(15) DEFAULT NULL,
  `province` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `postalcode` varchar(10) DEFAULT NULL,
  `treatment` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `firstname`, `lastname`, `middlename`, `age`, `birth`, `gender`, `occupation`, `height`, `weight`, `contactnumber`, `province`, `city`, `postalcode`, `treatment`) VALUES
(1, 'john', 'doe', 'new', 12, '2024-04-26', 'Male', 'none', '171.00', '56.00', '09123456789', 'south cot', 'koronadal', '9506', NULL),
(2, 'sample1', 'sample2', 'sample3', 12123, '2024-04-25', 'Female', 'none', '12.00', '13.00', '09123874652', 'south cot', 'tupi', '9506', NULL),
(4, 'sample', 'sample', 'sample', 1, '2024-04-18', 'Female', 'none', '1.00', '1.00', '09123456543', 'south cot', 'koronadal', '9506', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `problems`
--

CREATE TABLE `problems` (
  `problem_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `other_problem` varchar(255) DEFAULT NULL,
  `date_added` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `problem` varchar(255) NOT NULL,
  `other_problem` varchar(255) NOT NULL,
  `payment` decimal(10,2) NOT NULL,
  `bill_generate` varchar(50) DEFAULT 'dentist pending',
  `prescripitions` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `patient_id`, `date`, `time`, `problem`, `other_problem`, `payment`, `bill_generate`, `prescripitions`, `created_at`, `updated_at`) VALUES
(15, 1, '2024-04-10', '11:00:00', 'Crowns', 'Crowns', '500.00', 'prescription unchecked', '', '2024-04-11 09:12:23', '2024-04-11 09:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `xray_table`
--

CREATE TABLE `xray_table` (
  `xray_id` int(11) NOT NULL,
  `patient_id` int(11) DEFAULT NULL,
  `xray_image` varchar(255) DEFAULT NULL,
  `date_uploaded` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `xray_table`
--

INSERT INTO `xray_table` (`xray_id`, `patient_id`, `xray_image`, `date_uploaded`) VALUES
(7, 4, 'uploads/dental-xray-2.jpg', '2024-04-12'),
(8, 4, 'uploads/dental-xray-2.jpg', '2024-04-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dentist`
--
ALTER TABLE `dentist`
  ADD PRIMARY KEY (`dentist_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `problems`
--
ALTER TABLE `problems`
  ADD PRIMARY KEY (`problem_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `xray_table`
--
ALTER TABLE `xray_table`
  ADD PRIMARY KEY (`xray_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dentist`
--
ALTER TABLE `dentist`
  MODIFY `dentist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `problems`
--
ALTER TABLE `problems`
  MODIFY `problem_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `xray_table`
--
ALTER TABLE `xray_table`
  MODIFY `xray_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
