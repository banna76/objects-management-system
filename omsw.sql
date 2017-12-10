-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 10:20 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `omsw`
--

-- --------------------------------------------------------

--
-- Table structure for table `objects`
--

CREATE TABLE `objects` (
  `id` smallint(6) NOT NULL,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_bin NOT NULL,
  `type` varchar(100) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `objects`
--

INSERT INTO `objects` (`id`, `name`, `description`, `type`) VALUES
(1, 'User 1', 'A user is a person who uses a computer or network service. Users generally use a system or a software product without the technical expertise required to fully understand it...', 'user'),
(2, 'User 2', 'A user is a person who uses a computer or network service. Users generally use a system or a software product without the technical expertise required to fully understand it...', 'user'),
(3, 'PC', 'A gadget is a small tool such as a machine that has a particular function, but is often thought of as a novelty. Gadgets are sometimes referred to as gizmos...', 'device'),
(4, 'PC 2', 'A gadget is a small tool such as a machine that has a particular function, but is often thought of as a novelty. Gadgets are sometimes referred to as gizmos...', 'device'),
(5, 'Tablet', 'A gadget is a small tool such as a machine that has a particular function, but is often thought of as a novelty. Gadgets are sometimes referred to as gizmos...', 'device'),
(6, 'Server 1', 'a system that responds to requests across a computer network to provide...', 'server'),
(7, 'Server 2', 'a system that responds to requests across a computer network to provide...', 'server'),
(8, 'Service 1', 'In computing, a server is a computer program or a device that provides functionality for other programs or devices, called clients.... ', 'service'),
(9, 'Website', 'In computing, a server is a computer program or a device that provides functionality for other programs or devices, called clients... ', 'service'),
(10, 'x', 'x', 'x');

-- --------------------------------------------------------

--
-- Table structure for table `relations`
--

CREATE TABLE `relations` (
  `id` smallint(6) NOT NULL,
  `id_1` smallint(6) NOT NULL,
  `id_2` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `relations`
--

INSERT INTO `relations` (`id`, `id_1`, `id_2`) VALUES
(1, 1, 3),
(2, 3, 6),
(3, 3, 7),
(4, 5, 6),
(5, 5, 7),
(7, 6, 8),
(8, 2, 4),
(9, 4, 7),
(10, 4, 6),
(12, 7, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `objects`
--
ALTER TABLE `objects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `relations`
--
ALTER TABLE `relations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `objects`
--
ALTER TABLE `objects`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `relations`
--
ALTER TABLE `relations`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
