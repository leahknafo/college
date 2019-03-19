-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: מרץ 19, 2019 בזמן 08:39 PM
-- גרסת שרת: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- מבנה טבלה עבור טבלה `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(255) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `admin_role` varchar(7) NOT NULL,
  `admin_phone` varchar(10) NOT NULL,
  `admin_email` varchar(30) NOT NULL,
  `admin_password` varchar(500) NOT NULL,
  `admin_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_role`, `admin_phone`, `admin_email`, `admin_password`, `admin_image`) VALUES
(6, 'Yoram', 'owner', '0526633996', 'yoram@gmail.com', '2f7b52aacfbf6f44e13d27656ecb1f59', 'img/cc.jpg'),
(14, 'Golan', 'manager', '052447788', 'golan@gmail.com', '4e3da2ae832730d1abbf10611df36ea6', 'img/bb.jpg'),
(19, 'Ronen', 'sales', '0548899663', 'ronen@gmail.com', '2c8b6c4c8117fe557d6ff36cd80b132f', 'img/dd.jpg'),
(22, 'Haim', 'manager', '0584455887', 'haim@gmail.com', '7cd9d483df890d33287f8815fe5d4569', 'img/aa.jpg'),
(24, 'David', 'sales', '0524455886', 'david@gmail.com', '36e1d065d4531354267970688507d6cb', 'img/ff.jpg');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `course`
--

CREATE TABLE `course` (
  `course_id` int(255) NOT NULL,
  `course_name` varchar(20) NOT NULL,
  `course_desc` varchar(500) NOT NULL,
  `course_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_desc`, `course_image`) VALUES
(1, 'Full Stack', 'gggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'img/fullstacklogo.png'),
(2, 'JAVA', 'tttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttttt', 'img/Java-Logo.png'),
(3, 'QA', 'HHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHHH', 'img/qa.jpg'),
(14, 'Web Design', 'ggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', 'img/images.png'),
(18, 'Angular', 'vvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv', 'img/angular.png');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `course_student`
--

CREATE TABLE `course_student` (
  `course_id` int(255) NOT NULL,
  `student_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `course_student`
--

INSERT INTO `course_student` (`course_id`, `student_id`) VALUES
(1, 31),
(2, 31),
(2, 49),
(2, 158),
(2, 159),
(3, 31),
(3, 159),
(3, 160),
(14, 87),
(14, 159),
(18, 87);

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `student`
--

CREATE TABLE `student` (
  `student_id` int(255) NOT NULL,
  `student_name` varchar(20) NOT NULL,
  `student_phone` varchar(10) NOT NULL,
  `student_email` varchar(30) NOT NULL,
  `student_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `student`
--

INSERT INTO `student` (`student_id`, `student_name`, `student_phone`, `student_email`, `student_image`) VALUES
(31, 'Hila', '0528888855', 'hila@gmail.com', 'img/h.jpg'),
(49, 'Efrat', '0547788555', 'efrat@gmail.com', 'img/d.jpg'),
(87, 'Gad', '0548877556', 'gad@gmail.com', 'img/b.jpg'),
(158, 'Tali', '0548877552', 'tali@gmail.com', 'img/images.jpg'),
(159, 'Moshe', '0548855663', 'moshe@gmail.com', 'img/a.jpg'),
(160, 'Noa', '0542288996', 'k@w', 'img/f.jpg');

--
-- Indexes for dumped tables
--

--
-- אינדקסים לטבלה `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- אינדקסים לטבלה `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- אינדקסים לטבלה `course_student`
--
ALTER TABLE `course_student`
  ADD PRIMARY KEY (`course_id`,`student_id`),
  ADD KEY `course_student_ibfk_1` (`student_id`);

--
-- אינדקסים לטבלה `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- הגבלות לטבלאות שהוצאו
--

--
-- הגבלות לטבלה `course_student`
--
ALTER TABLE `course_student`
  ADD CONSTRAINT `course_student_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `course_student_ibfk_2` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
