-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2025 at 07:26 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`) VALUES
(1, 'Operating System'),
(2, 'Computer Graphics'),
(3, 'Web Technology'),
(4, 'Artificial Intelligence'),
(5, 'English'),
(6, 'Math'),
(7, 'Chemistry'),
(8, 'Object Oriented Programming 1'),
(9, 'Data Structure'),
(10, 'Accounting');

-- --------------------------------------------------------

--
-- Table structure for table `facultys`
--

CREATE TABLE `facultys` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `faculty` varchar(50) NOT NULL,
  `department` varchar(50) NOT NULL,
  `specialization` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `roomNo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facultys`
--

INSERT INTO `facultys` (`id`, `name`, `faculty`, `department`, `specialization`, `email`, `roomNo`) VALUES
(1, 'Chaity', 'FST', 'Computer Science', 'Operating System, Computer Networks', 'chaity@gmail.com', 'DN0505'),
(2, 'Firoz Mridha', 'FST', 'Computer Science', 'Artificial Intelligence', 'mridha@gmail.com', 'DN0607'),
(3, 'Nazia', 'FST', 'Computer Science', 'Artificial Intelligence', 'nazia@gmail.com', 'DS204'),
(4, 'Shaila', 'FASS', 'English', 'Literature', 'shaila@gmail.com', '4104'),
(5, 'Munjarin', 'FASS', 'English', 'Literature', 'munjarin@gmail.com', '4109'),
(6, 'Partha Proshad', 'FBA', 'BBA', 'Accounting', 'partha@gmail.com', '4207');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(100) NOT NULL,
  `name` varchar(50) NOT NULL,
  `coursename` varchar(50) NOT NULL,
  `studentCount` int(50) NOT NULL,
  `registeredStudent` int(100) NOT NULL,
  `duration` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `name`, `coursename`, `studentCount`, `registeredStudent`, `duration`) VALUES
(1, 'B1', 'Computer Networks ', 40, 0, 'Sun 02:00 - Sun 03:30, Tue 02:00 - Tue 03:30'),
(2, 'B2', 'Computer Networks ', 40, 0, 'Mon 02:00 - Mon 03:30, Wed 02:00 - Wed 03:30'),
(3, 'A1', 'Web Technology', 40, 0, 'Sun 02:00 - Sun 03:30, Tue 02:00 - Tue 03:30'),
(4, 'A2', 'Web Technology', 40, 0, 'Sun 02:00 - Sun 03:30, Tue 02:00 - Tue 03:30'),
(5, 'L1', 'Data Structure', 40, 0, 'Sun 02:00 - Sun 03:30, Tue 02:00 - Tue 03:30'),
(6, 'L3', 'Data Structure', 40, 0, 'Sun 02:00 - Sun 03:30, Tue 02:00 - Tue 03:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(32) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(32) NOT NULL,
  `address` varchar(200) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `gender`, `dob`, `phone`, `email`, `address`, `username`, `password`) VALUES
(16, 'Kamrunnahar Sayma', 'female', '2025-01-02', '01722500388', 'kamrunnaharsayma51@gmail.com', 'Dhaka', 'Sayma', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `facultys`
--
ALTER TABLE `facultys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `facultys`
--
ALTER TABLE `facultys`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
