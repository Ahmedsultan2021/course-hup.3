-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 10:46 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--
CREATE DATABASE IF NOT EXISTS `lms` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `lms`;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `code` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `creadit_hours` int(11) NOT NULL,
  `seats_no` int(11) NOT NULL,
  `professor_id` int(11) NOT NULL,
  `tuition` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`code`, `name`, `creadit_hours`, `seats_no`, `professor_id`, `tuition`) VALUES
(1000, 'PHP', 4, 50, 8, '8000.00'),
(1002, 'OOP', 5, 45, 8, '7000.00'),
(1003, 'TTT', 1, 1, 11, '1200.00'),
(1005, 'sss', 3, 3, 11, '3333.00');

-- --------------------------------------------------------

--
-- Table structure for table `course_students`
--

CREATE TABLE `course_students` (
  `reg_no` int(11) NOT NULL,
  `course_code` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `grade` decimal(5,2) DEFAULT NULL,
  `pay` bit(1) DEFAULT NULL,
  `pay_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course_students`
--

INSERT INTO `course_students` (`reg_no`, `course_code`, `student_id`, `created_at`, `grade`, `pay`, `pay_date`) VALUES
(1, 1000, 9, '2022-01-11 22:40:59', NULL, NULL, NULL),
(5, 1002, 12, '2022-01-11 22:50:06', NULL, NULL, NULL),
(7, 1000, 12, '2022-01-11 22:59:45', NULL, NULL, NULL),
(8, 1003, 9, '2022-01-11 23:01:02', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `students_attendances`
--

CREATE TABLE `students_attendances` (
  `id` int(11) NOT NULL,
  `reg_no` int(11) NOT NULL,
  `session_date` datetime DEFAULT NULL,
  `attended` bit(1) DEFAULT NULL COMMENT '0 == false\n1 == true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` enum('profosser','student','it') DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `created_by` int(11) DEFAULT NULL,
  `department_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `created_by`, `department_id`) VALUES
(7, 'admin', 'admin@coursehub.com', 'e10adc3949ba59abbe56e057f20f883e', 'it', '2022-01-09 23:12:41', NULL, NULL),
(8, 'doaa', 'doaa.abdelftah@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'profosser', '2022-01-11 21:09:30', 7, NULL),
(9, 'ahmed', 'ahmed@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'student', '2022-01-11 21:09:46', 7, NULL),
(11, 'Dina', 'dina@yahoo.com', 'e10adc3949ba59abbe56e057f20f883e', 'profosser', '2022-01-11 21:50:53', 7, NULL),
(12, 'Mohamed', 'moh@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'student', '2022-01-11 22:49:48', 7, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`code`),
  ADD KEY `fk_courses_profosser_id_idx` (`professor_id`);

--
-- Indexes for table `course_students`
--
ALTER TABLE `course_students`
  ADD PRIMARY KEY (`reg_no`),
  ADD KEY `fk_course_students_courses1_idx` (`course_code`),
  ADD KEY `fk_course_students_users1` (`student_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students_attendances`
--
ALTER TABLE `students_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_students_attendances_course_students1_idx` (`reg_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_created_by_users_idx` (`created_by`),
  ADD KEY `fk_users_departments1_idx` (`department_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1006;

--
-- AUTO_INCREMENT for table `course_students`
--
ALTER TABLE `course_students`
  MODIFY `reg_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `students_attendances`
--
ALTER TABLE `students_attendances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_courses_profosser_id` FOREIGN KEY (`professor_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course_students`
--
ALTER TABLE `course_students`
  ADD CONSTRAINT `fk_course_students_courses1` FOREIGN KEY (`course_code`) REFERENCES `courses` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_course_students_users1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `students_attendances`
--
ALTER TABLE `students_attendances`
  ADD CONSTRAINT `fk_students_attendances_course_students1` FOREIGN KEY (`reg_no`) REFERENCES `course_students` (`reg_no`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_created_by_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_departments1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
