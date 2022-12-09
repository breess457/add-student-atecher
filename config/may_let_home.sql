-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 28, 2021 at 03:39 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `may_let_home`
--

-- --------------------------------------------------------

--
-- Table structure for table `remamber`
--

CREATE TABLE `remamber` (
  `member_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `passwd` varchar(120) NOT NULL,
  `profile_img` varchar(300) NOT NULL,
  `status` varchar(30) NOT NULL,
  `department_teacher` varchar(120) NOT NULL,
  `position` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `remamber`
--

INSERT INTO `remamber` (`member_id`, `user_name`, `email`, `passwd`, `profile_img`, `status`, `department_teacher`, `position`) VALUES
(2, 'master thezero', 'admin@gmail.com', '123admin', 'images.jpg', 'admin', 'it', 'teacher server'),
(4, 'imron saleh', 'imron@gmail.com', '123imron', 'img_6073439f80d45.jpg', 'teacher', 'computerbusiness', 'Assistant teacher'),
(5, 'kawisra Ktt', 'ktt121@gmail.com', '121ktt', 'img_6073440842be1.jpg', 'teacher', 'computerbusiness', 'Class Teacher'),
(6, 'steepjobs master', 'mister@gmail.com', '123mister', 'img_60743ebf94850.jpg', 'teacher', 'Electronic', 'teacher server');

-- --------------------------------------------------------

--
-- Table structure for table `student_history`
--

CREATE TABLE `student_history` (
  `std_id` int(11) NOT NULL,
  `fullname_std` varchar(200) NOT NULL,
  `nick_name` varchar(100) NOT NULL,
  `code_std` varchar(20) NOT NULL,
  `year_of_study` int(11) NOT NULL,
  `department` varchar(100) NOT NULL,
  `class_level` varchar(50) NOT NULL,
  `address` varchar(250) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `img_std` varchar(200) NOT NULL,
  `fater_name` varchar(120) NOT NULL,
  `mater_name` varchar(120) NOT NULL,
  `img_home` varchar(200) NOT NULL,
  `id_teacher` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student_history`
--

INSERT INTO `student_history` (`std_id`, `fullname_std`, `nick_name`, `code_std`, `year_of_study`, `department`, `class_level`, `address`, `phone`, `img_std`, `fater_name`, `mater_name`, `img_home`, `id_teacher`) VALUES
(8, 'เลโอลีโอ พาราดีไนซ์', 'laylio', '6139802341', 2561, 'accounting', 'ปวส:2', 'salmp family sentauria nortkolto NGL 44004', '0853742202', 'img_607184bcc0628.jpg', 'set Myfater', 'get Mommoter', 'img_6074a4ac1aeff.jpg', 2),
(9, 'rorono R solo', 'solo', '6139020044', 2562, 'computerbusiness', '2', 'jimoski amengakure isblue 45004', '0840762293', 'img_607186735e530.jpg', 'vadoejimonji', 'sangdaikitesuet', 'img_607186735eb8e.jpg', 5),
(10, 'hisoka morrow', 'hisoka', '6139020045', 2561, 'Electric', 'ปวส:2', 'Heavens Arena YorkChin City CaCin 49004', '0840952293', 'img_6074a4e9d91b8.jfif', ' banjikam', 'linnet ordeble', 'img_6072bbc977d54.png', 4),
(11, 'killermaji komaji', 'kmaji', '6209103321', 2562, 'computerbusiness', 'ปวส:1', 'Heavens Arena YorkChin City CaCin 49004', '0940952205', 'img_6072bd56c6cc3.png', 'fater thread', 'Pantana moter', 'img_6072bd56c74da.jpg', 5),
(12, 'Neon Nostrad', 'neon', '6139910034', 2562, 'Electric', 'ปวส:2', '56/3 nostralfamily citystar yorkchin city cacin 34012', '0850951302', 'img_607497fa33951.png', 'boss nostrad', 'mama nostrad', 'img_607497fa36337.png', 2),
(13, 'bisket kurker', 'bisket', '6120901102', 2562, 'computerbusiness', 'ปวส:2', 'amingsa shabody park newyork afrika 45300', '0850951302', 'img_6075f98a583b6.png', 'resuer', 'palm moter', 'img_6075f98a5ce38.png', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `remamber`
--
ALTER TABLE `remamber`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `student_history`
--
ALTER TABLE `student_history`
  ADD PRIMARY KEY (`std_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `remamber`
--
ALTER TABLE `remamber`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_history`
--
ALTER TABLE `student_history`
  MODIFY `std_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
