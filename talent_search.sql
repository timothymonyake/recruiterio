-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 13, 2019 at 05:29 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talent_search`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `occupation` varchar(100) NOT NULL,
  `s_range` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `resume` varchar(100) NOT NULL,
  `submitted_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `edited` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `firstname`, `lastname`, `gender`, `dob`, `email`, `occupation`, `s_range`, `pic`, `resume`, `submitted_on`, `edited`) VALUES
(9, 'Dona', 'monyake', 'Female', '1998-02-03', 'timothymonyake@gmail.com', 'Programmer', '100-10000354', '21093046535d51d6e32169b.jpg', '17927834895d51d6e321ac6.pdf', '2019-08-12 21:15:15', '2019-08-12 21:15:15'),
(11, 'gf', 'fdgdf', 'Male', '3334-03-04', 's@hal.co', 'Doctor', '100-10000354', '15822945635d51d7986abef.jpg', '15733820545d51d7986ad7d.pdf', '2019-08-12 21:18:16', '2019-08-12 21:18:16'),
(12, 'Timothy', 'Monyake', 'Male', '6765-09-09', 'segolamemonyake@gmail.com', 'Programmer', '100-10000354', '8164486185d52b8c2651cc.jpg', '5346038785d52b8c265639.pdf', '2019-08-13 13:19:07', '2019-08-13 13:19:07'),
(14, 'kago', 'Monyake', 'Female', '3211-02-02', 'bofelotsiang@gmail.com', 'Programmer', '100-10000354', '4727204655d52b9aa95168.jpg', '13151747365d52b9aa964b1.pdf', '2019-08-13 13:22:54', '2019-08-13 13:22:54');

-- --------------------------------------------------------

--
-- Table structure for table `occupation`
--

CREATE TABLE `occupation` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occupation`
--

INSERT INTO `occupation` (`id`, `title`, `description`) VALUES
(7, 'Programmer', 'codes\r\n                                                                        '),
(8, 'Doctor', 'Heals patients \r\n                                     '),
(9, 'Soccer Player', 'Playes footbal \r\n                                     '),
(10, 'Teacher', 'sings                      ');

-- --------------------------------------------------------

--
-- Table structure for table `salary_range`
--

CREATE TABLE `salary_range` (
  `id` int(11) NOT NULL,
  `s_range` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_range`
--

INSERT INTO `salary_range` (`id`, `s_range`) VALUES
(5, '1000-2500'),
(6, '4500-20000');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin@recruiterio.com', 'admin@recruiterio.com', '2d77113a8625065a5e838262b7fbc4f0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `occupation`
--
ALTER TABLE `occupation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_range`
--
ALTER TABLE `salary_range`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `occupation`
--
ALTER TABLE `occupation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `salary_range`
--
ALTER TABLE `salary_range`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
