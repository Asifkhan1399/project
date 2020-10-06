-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2020 at 11:07 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

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
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_title` varchar(255) DEFAULT NULL,
  `short_code` varchar(255) DEFAULT NULL,
  `course_type` varchar(255) DEFAULT NULL,
  `credit` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_title`, `short_code`, `course_type`, `credit`) VALUES
(1, 'Software Engineering & Information System Design', 'SEISD', 'Theory', '4'),
(2, 'Structured Programming Laboratory', 'SPL', 'Lab', '2'),
(3, 'Data Structures', 'DS', 'Theory', '3'),
(5, 'Basic Economics', 'ECO', 'Theory', '3'),
(6, 'Basic Accounting', 'ACC', 'Theory', '3'),
(7, 'General English', 'ENG', 'Theory', '3'),
(8, 'Computational Methods for Engineering Problems', 'CMEP', 'Theory', '3'),
(9, 'Computational Methods for Engineering Problems Laboratory', 'CMEPL', 'Lab', '1'),
(10, 'Software Engineering & Information System Design Laboratory', 'SEISDL', 'Lab', '1.5'),
(11, 'Communication Engineering', 'CE', 'Theory', '3'),
(12, 'Communication Engineering Laboratory', 'CEL', 'Lab', '1.5'),
(13, 'Microprocessors & Microcontrollers', 'MM', 'Theory', '3'),
(14, 'Microprocessors & Microcontrollers Laboratory', 'MML', 'Lab', '1.5'),
(15, 'Organizational Behavior', 'OB', 'Theory', '3');

-- --------------------------------------------------------

--
-- Table structure for table `course_assign`
--

CREATE TABLE `course_assign` (
  `id` int(11) NOT NULL,
  `session_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_assign`
--

INSERT INTO `course_assign` (`id`, `session_id`, `course_id`, `teacher_id`, `section_id`) VALUES
(1, 3, 13, 20, 3),
(2, 1, 8, 2, 6),
(3, 1, 8, 2, 5),
(4, 1, 8, 2, 4),
(5, 3, 1, 29, 3),
(6, 3, 1, 29, 4),
(7, 3, 13, 20, 4),
(8, 3, 8, 2, 3),
(9, 3, 11, 26, 3),
(10, 3, 11, 26, 4),
(11, 3, 9, 27, 3),
(12, 3, 9, 27, 4),
(13, 3, 9, 27, 5),
(14, 3, 9, 27, 6),
(15, 3, 15, 28, 1),
(16, 3, 15, 28, 2),
(17, 3, 15, 28, 3),
(18, 3, 15, 28, 4),
(19, 3, 15, 28, 5),
(20, 3, 15, 28, 6),
(21, 3, 10, 29, 3),
(22, 3, 10, 29, 4);

-- --------------------------------------------------------

--
-- Table structure for table `distributions`
--

CREATE TABLE `distributions` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `catagory_value` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `status`) VALUES
(1, 'A1', 1),
(2, 'A2', 1),
(3, 'B1', 1),
(4, 'B2', 1),
(5, 'C1', 1),
(6, 'C2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `title`, `status`) VALUES
(1, 'Fall 2020', '1'),
(2, 'Summer 2020', '1'),
(3, 'Spring 2021', '1'),
(5, 'Winter 2020', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `roll` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `roll`) VALUES
(1, 'Anik Sen', 'anik@gmail.com', '202cb962ac59075b964b07152d234b70', 'admin', 0),
(2, 'Kollol', 'k@gmail.com', '202cb962ac59075b964b07152d234b70', 'teacher', 0),
(3, 'Dola', 'd@gmail.com', 'd9b1d7db4cd6e70935368a1efb10e377', 'student', 1465),
(20, 'Pavel', 'pavel@gmail.com', '202cb962ac59075b964b07152d234b70', 'teacher', 0),
(21, 'Fariha', 'f@gmail.com', '202cb962ac59075b964b07152d234b70', 'student', 1445),
(24, 'Swapnila', 'sw@gmail.com', '7363a0d0604902af7b70b271a0b96480', 'student', 1454),
(25, 'Asif', 'as@gmail.com', '202cb962ac59075b964b07152d234b70', 'student', 1449),
(26, 'Somen ', 'so@gmail.com', '202cb962ac59075b964b07152d234b70', 'teacher', 0),
(27, 'Puja', 'pu@gmail.com', '202cb962ac59075b964b07152d234b70', 'teacher', 0),
(28, 'Tasnim', 'ta@gmail.com', '202cb962ac59075b964b07152d234b70', 'teacher', 0),
(29, 'Anik', 'a@gmail.com', '202cb962ac59075b964b07152d234b70', 'teacher', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_assign`
--
ALTER TABLE `course_assign`
  ADD PRIMARY KEY (`id`),
  ADD KEY `session_id` (`session_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `section_id` (`section_id`);

--
-- Indexes for table `distributions`
--
ALTER TABLE `distributions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `session_id` (`session_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `course_assign`
--
ALTER TABLE `course_assign`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `distributions`
--
ALTER TABLE `distributions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_assign`
--
ALTER TABLE `course_assign`
  ADD CONSTRAINT `course_assign_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `course_assign_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `course_assign_ibfk_3` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `course_assign_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `distributions`
--
ALTER TABLE `distributions`
  ADD CONSTRAINT `distributions_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `courses` (`id`),
  ADD CONSTRAINT `distributions_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
