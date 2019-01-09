-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: ינואר 09, 2019 בזמן 08:15 AM
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
(6, 'Yoram', 'owner', '0526633996', 'yoram@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 'img/images (2).jpg'),
(14, 'Golan', 'manager', '052447788', 'golan@gmail.com', '2be9bd7a3434f7038ca27d1918de58bd', 'img/images (3).jpg'),
(19, 'Ronen', 'sales', '0548899663', 'ronen@gmail.com', 'fa246d0262c3925617b0c72bb20eeb1d', 'img/images (4).jpg'),
(22, 'Haim', 'manager', '0584455887', 'haim@gmail.com', 'ec5dfb96ddcc82988525f63f0b8a96b0', 'img/haim.jpg'),
(24, 'David', 'sales', '0524455886', 'david@gmail.com', '1c4067bbf833bd0869ff71d1fedbceeb', 'img/beni.png');

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
(1, 25),
(1, 31),
(2, 31),
(2, 49),
(2, 158),
(3, 31),
(3, 159),
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
(25, 'Yossi', '0522222211', 'test2@test2.com', 'img/yossi.jpg'),
(31, 'Hila', '0528888855', 'hila@gmail.com', 'img/noa.png'),
(49, 'Efrat', '0547788555', 'efrat@gmail.com', 'img/efrat.jpg'),
(87, 'Gad', '0548877556', 'gad@gmail.com', 'img/gad.jpg'),
(158, 'Tali', '0548877552', 'tali@gmail.com', 'img/sara.jpg'),
(159, 'Moshe', '0548855663', 'moshe@gmail.com', 'img/avi.png');

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
  MODIFY `student_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

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
