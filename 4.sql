-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2020 at 04:06 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coursedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id_a` int(11) NOT NULL,
  `name_a` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `author`
--

INSERT INTO `author` (`id_a`, `name_a`) VALUES
(1, 'Altair'),
(2, 'Vega'),
(3, 'Deneb'),
(7, 'Tiyas');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `id_cn` int(11) NOT NULL,
  `name_cn` varchar(50) NOT NULL,
  `video_link` varchar(500) NOT NULL,
  `type` varchar(50) NOT NULL,
  `id_c` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id_cn`, `name_cn`, `video_link`, `type`, `id_c`) VALUES
(1, 'Intro PHP', 'php.mp4', 'Lesson', 1),
(2, 'Intro Python', 'python.mp4', 'Introduction', 2),
(3, 'Intro SQL', 'sql.mp4', 'Learning', 3),
(4, 'Intro HTML', 'php.mp4', 'Lesson', 5);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id_c` int(11) NOT NULL,
  `name_c` varchar(50) NOT NULL,
  `thumbnail` varchar(100) NOT NULL,
  `id_a` int(11) NOT NULL,
  `duration` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id_c`, `name_c`, `thumbnail`, `id_a`, `duration`, `description`) VALUES
(1, 'PHP Fundamental', 'php.jpg', 1, '04:00', 'Pelajaran tentang dasar-dasar PHP'),
(2, 'Python is Easy', 'python.jpg', 2, '05:00', 'Cara mudah belajar Python'),
(3, 'SQL Query', 'sql.jpg', 3, '03:00', 'Query umum pada SQL, MySQL, dll.'),
(5, 'HTML', 'html.jpg', 7, '12:48', 'Belajar Dasar HTML');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id_a`);

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id_cn`),
  ADD KEY `id_c` (`id_c`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id_c`),
  ADD KEY `Id_a` (`id_a`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `id_cn` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id_c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
