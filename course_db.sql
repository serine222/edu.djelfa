-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 30, 2022 at 05:35 PM
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
-- Database: `course_db`
--



-- --------------------------------------------------------

--
-- Table structure for table `grades`
--
CREATE TABLE `classrooms` (

   Grade_id VARCHAR(191) NOT NULL,
    Name_Class VARCHAR(191) NOT NULL,
    Name_Class VARCHAR(191) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Table structure for table `students`
--
CREATE TABLE students (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(191) NOT NULL,
    email VARCHAR(191) NOT NULL,
    phone VARCHAR(191) NOT NULL,
    course VARCHAR(191) NOT NULL
)
-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` varchar(20) NOT NULL,
  `Notes` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `online_classes`
--

CREATE TABLE `online_classes` (
  `id` varchar(50) NOT NULL,
  `Grade_id` varchar(50) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `meeting_id` varchar(1000) NOT NULL,
   `Classroom_id` varchar(50) NOT NULL,
  `start_at` varchar(50) NOT NULL,
  `topic` int(10) NOT NULL,
  `section_id` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `start_url` varchar(1000) NOT NULL,
  `join_url` varchar(1000) NOT NULL,
  

  

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` varchar(20) NOT NULL,
  `sections` varchar(20) NOT NULL,
  `Status` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `Grade_id` varchar(1000) NOT NULL,
  `Class_id` varchar(100) NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,

  `Specialization_id` varchar(20) NOT NULL,
  `Gender_id` varchar(20) NOT NULL ,
  `Address` varchar(20) NOT NULL,
  `Joining_Date` varchar(20) NOT NULL,

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_section`
--

CREATE TABLE `teacher_section` (
  `id` varchar(20) NOT NULL,
  `teacher_id` varchar(20) NOT NULL,
  `section_id` varchar(100) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
