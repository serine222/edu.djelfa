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


--
-- Table structure for table `Grades`
--

CREATE TABLE `Grades` (
  `Grade_id` INT(6) AUTO_INCREMENT PRIMARY KEY,
  `Grade_Notes` varchar(191) NOT NULL,
  `Grade_Name` varchar(191) NOT NULL
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--
CREATE TABLE `classrooms` (
  `Class_id` INT(6) AUTO_INCREMENT ,
  
    Name_Class VARCHAR(191) NOT NULL,
  `Grade_id` INT(6)  ,
      PRIMARY KEY (Class_id),
    
    --   CONSTRAINT FK_classroomsGrade FOREIGN KEY (Grade_id)
    -- REFERENCES Grades(Grade_id)
    FOREIGN KEY (Grade_id) REFERENCES Grades(Grade_id)

) ;

-- --------------------------------------------------------

-- Table structure for table `sections`
--
CREATE TABLE `sections` (
  `id_sections` INT(6) AUTO_INCREMENT PRIMARY KEY,
  `sections` varchar(191) NOT NULL,
  `Status` varchar(191) NOT NULL,
  `title` varchar(191) NOT NULL,
    `classroom_id` INT(6),
     FOREIGN KEY (classroom_id) REFERENCES classrooms(classroom_id),
  	`Grade_id` INT(6)  ,
    FOREIGN KEY (Grade_id) REFERENCES Grades(Grade_id)
   
    
  
    
    
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id_specialization` INT(6) AUTO_INCREMENT PRIMARY KEY,
  `Name_specialization` varchar(191) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id_teacher` INT(6) AUTO_INCREMENT PRIMARY KEY,
  `Email` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Name` varchar(20) NOT NULL,

  `id_specialization`  INT(6) ,
      FOREIGN KEY (id_specialization) REFERENCES specializations(id_specialization),
  `id_sections` INT(6) ,
    FOREIGN KEY (id_sections) REFERENCES sections(id_sections),
  `Address` varchar(191) NOT NULL,
  `Joining_Date` varchar(191) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



-- --------------------------------------------------------


--

-- Table structure for table `teacher_section`
--

CREATE TABLE `teacher_section` (
  `id_teacher_section` INT(6) AUTO_INCREMENT PRIMARY KEY,
  `id_teacher`  INT(6)  ,
    FOREIGN KEY (id_teacher) REFERENCES teachers(id_teacher),
 `id_sections` INT(6)  ,
    FOREIGN KEY (id_sections) REFERENCES sections(id_sections)
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `students`
--
CREATE TABLE students (
    id INT(6) AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(191) NOT NULL,
    email VARCHAR(191) NOT NULL,
    phone VARCHAR(191) NOT NULL,
    course VARCHAR(191) NOT NULL,
     `id_section` INT(6)  ,
   `id_sections` INT(6) ,
    FOREIGN KEY (id_sections) REFERENCES sections(id_sections),
     `classroom_id` INT(6),
     FOREIGN KEY (classroom_id) REFERENCES classrooms(classroom_id),
  	`Grade_id` INT(6)  ,
    FOREIGN KEY (Grade_id) REFERENCES Grades(Grade_id)
   
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE users (
  `id-user` INT(6) AUTO_INCREMENT PRIMARY KEY,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
-- --------------------------------------------------------

--
-- Table structure for table `online_classes`
--


CREATE TABLE `online_classes` (
  `id`INT(6) AUTO_INCREMENT PRIMARY KEY,

  `duration` varchar(50) NOT NULL,
  `user_id` int(10) NOT NULL,
  `meeting_id` varchar(1000) NOT NULL,
  
  `start_at` varchar(50) NOT NULL,
  `topic` int(10) NOT NULL,
  
  `password` varchar(1000) NOT NULL,
  `start_url` varchar(1000) NOT NULL,
  `join_url` varchar(1000) NOT NULL,
   `id_sections` INT(6) ,
    FOREIGN KEY (id_sections) REFERENCES sections(id_sections),
     `classroom_id` INT(6),
     FOREIGN KEY (classroom_id) REFERENCES classrooms(classroom_id),
  	`Grade_id` INT(6)  ,
    FOREIGN KEY (Grade_id) REFERENCES Grades(Grade_id)
   
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;






/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;