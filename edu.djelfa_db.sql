
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


-- Database: `edu.djelfa`
--

--
CREATE TABLE `classrooms` (
  `classroom_id`INT(6) AUTO_INCREMENT ,
    PRIMARY KEY (classroom_id),
    Name_Class VARCHAR(191) NOT NULL


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
  `classroom_id` INT(6) ,
    FOREIGN KEY (classroom_id) REFERENCES classrooms(classroom_id),
  `Address` varchar(191) NOT NULL,
  `Joining_Date` varchar(191) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;




-- --------------------------------------------------------


--

-- Table structure for table `teacher_classroom`
--

CREATE TABLE `teacher_classroom` (
  `id_teacher_classroom` INT(6) AUTO_INCREMENT PRIMARY KEY,
  `id_teacher`  INT(6)  ,
    FOREIGN KEY (id_teacher) REFERENCES teachers(id_teacher),
 `id_classrooms` INT(6)  ,
    FOREIGN KEY (id_classrooms) REFERENCES classrooms(classroom_id)
  
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
   
   
  
     `classroom_id` INT(6),
     FOREIGN KEY (classroom_id) REFERENCES classrooms(classroom_id)
  	
   
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
 `meeting_id` varchar(1000) NOT NULL,
`topic` int(10) NOT NULL,
  `start_time` varchar(50) NOT NULL,
`duration` varchar(50) NOT NULL,
`password` varchar(1000) NOT NULL,
`start_url` varchar(1000) NOT NULL,
`join_url` varchar(1000) NOT NULL,

  
     `classroom_id` INT(6),
     FOREIGN KEY (classroom_id) REFERENCES classrooms(classroom_id),
  
    `id_teacher` INT(6)  ,
    FOREIGN KEY (id_teacher) REFERENCES teachers(id_teacher)
   
)  ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



INSERT INTO specializations
VALUES ('1','ادب');

INSERT INTO specializations
VALUES ('3','علوم');

INSERT INTO specializations
VALUES ('4','رياضيات');

INSERT INTO specializations
VALUES ('5','اعلام الي');

INSERT INTO specializations
VALUES ('6','شريعة');

INSERT INTO specializations
VALUES ('7','فيزياء');


INSERT INTO classrooms
VALUES ('1','الاولى ابتدائي');

INSERT INTO classrooms
VALUES ('2','الثانية ابتدائي');

INSERT INTO classrooms
VALUES ('3','الثالثة ابتدائي');

INSERT INTO classrooms
VALUES ('4','الرابعة ابتدائي');

INSERT INTO classrooms
VALUES ('5','الخامسة ابتدائي');

INSERT INTO classrooms
VALUES ('6','الاولى متوسط ');

INSERT INTO classrooms
VALUES ('7','الثانية متوسط');

INSERT INTO classrooms
VALUES ('8','الثالثة متوسط');

INSERT INTO classrooms
VALUES ('9','الرابعة متوسط');

INSERT INTO classrooms
VALUES ('10',' الاولى ثانوي');

INSERT INTO classrooms
VALUES ('11',' الثانية  ثانوي');

INSERT INTO classrooms
VALUES ('12',' الثالثة ثانوي');
