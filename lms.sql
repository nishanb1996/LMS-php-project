-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2022 at 08:36 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` text DEFAULT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 0 for inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'pratik1', 'apksos@gmail.com', 'pratik', 1, '2022-05-28 05:49:47', '2022-05-28 06:08:13');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` text NOT NULL,
  `isbn` text DEFAULT NULL,
  `actual_qty` int(11) NOT NULL,
  `current_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `isbn`, `actual_qty`, `current_qty`, `created_at`, `updated_at`) VALUES
(1, 'C lang', '65464684', 50, 45, '2022-06-01 06:04:14', '2022-06-07 06:30:39'),
(2, 'C++', '46846846', 20, 19, '2022-06-02 05:29:32', '2022-06-07 05:57:54'),
(3, 'Data Structure', '65464684', 56, 56, '2022-06-02 05:56:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_issue`
--

CREATE TABLE `book_issue` (
  `id` int(11) NOT NULL,
  `books_id` int(11) NOT NULL,
  `students_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `is_return` int(11) NOT NULL DEFAULT 0 COMMENT '0 for issue, 1 for return',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_issue`
--

INSERT INTO `book_issue` (`id`, `books_id`, `students_id`, `issue_date`, `return_date`, `is_return`, `created_at`, `updated_at`) VALUES
(12, 1, 5, '2022-06-07', '2022-06-30', 1, '2022-06-07 05:54:48', '2022-06-07 05:55:14'),
(13, 1, 5, '2022-06-07', '2022-06-15', 1, '2022-06-07 05:55:27', '2022-06-07 06:30:14'),
(14, 2, 5, '2022-06-07', '2022-06-23', 0, '2022-06-07 05:57:54', NULL),
(15, 1, 6, '2022-06-07', '1970-01-01', 1, '2022-06-07 06:17:34', '2022-06-07 06:19:22'),
(16, 1, 7, '2022-06-07', '2022-06-16', 0, '2022-06-07 06:17:49', NULL),
(17, 1, 5, '2022-06-07', '2022-06-23', 1, '2022-06-07 06:30:39', '2022-06-07 06:30:52');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `student_name` text NOT NULL,
  `mobile_no` bigint(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1 for active, 0 for inactive',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `mobile_no`, `status`, `created_at`, `updated_at`) VALUES
(5, 'Rashmi Bansode', 8956656429, 1, '2022-06-04 05:39:07', NULL),
(6, 'Pratik', 8956656429, 1, '2022-06-07 05:33:46', NULL),
(7, 'Vina', 8888888888, 1, '2022-06-07 05:33:54', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_issue_ibfk_1` (`books_id`),
  ADD KEY `students_id` (`students_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `book_issue`
--
ALTER TABLE `book_issue`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_issue`
--
ALTER TABLE `book_issue`
  ADD CONSTRAINT `book_issue_ibfk_1` FOREIGN KEY (`books_id`) REFERENCES `books` (`id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `book_issue_ibfk_2` FOREIGN KEY (`students_id`) REFERENCES `students` (`id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
