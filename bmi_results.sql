-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2025 at 01:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nutrimetric`
--

-- --------------------------------------------------------

--
-- Table structure for table `bmi_results`
--

CREATE TABLE `bmi_results` (
  `id` int(3) NOT NULL,
  `name` varchar(50) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `height` float NOT NULL,
  `weight` float NOT NULL,
  `bmi` float NOT NULL,
  `class` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bmi_results`
--

INSERT INTO `bmi_results` (`id`, `name`, `age`, `email`, `phone`, `height`, `weight`, `bmi`, `class`) VALUES
(1, 'a', 20, 'a@email.com', 0, 1.3, 45, 26.63, 'Overweight'),
(2, 'b', 21, 'b@email.com', 0, 1.7, 76, 26.3, 'Overweight'),
(3, 'c', 22, 'c@email.com', 0, 1.5, 48, 21.33, 'Normal'),
(4, 'd', 23, 'd@email.com', 0, 1.7, 68, 23.53, 'Normal'),
(5, 'e', 24, 'e@email.com', 0, 1.6, 56, 21.88, 'Normal'),
(6, 'f', 25, 'f@email.com', 0, 1.5, 52, 23.11, 'Normal'),
(7, 'g', 26, 'g@email.com', 0, 1.6, 50, 19.53, 'Normal'),
(10, 'h', 27, 'h@email.com', 0, 1.3, 53, 31.36, 'Overweight');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bmi_results`
--
ALTER TABLE `bmi_results`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bmi_results`
--
ALTER TABLE `bmi_results`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
