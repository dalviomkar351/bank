-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2023 at 06:24 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_login`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `withdraw` int(100) NOT NULL,
  `deposit` int(100) NOT NULL,
  `currentbalance` int(100) NOT NULL,
  `previousamount` int(100) NOT NULL,
  `insert_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `userid`, `username`, `withdraw`, `deposit`, `currentbalance`, `previousamount`, `insert_time`) VALUES
(1, 12, 'omkarnew', 500, 0, 99500, 100000, '2023-06-15 15:03:24'),
(2, 12, 'omkarnew', 500, 0, 99500, 100000, '2023-06-15 15:04:25'),
(3, 12, 'omkarnew', 0, 50000, 150000, 100000, '2023-06-15 15:04:54'),
(4, 12, 'omkarnew', 500, 0, 99500, 100000, '2023-06-15 15:06:39'),
(5, 12, 'omkarnew', 500, 0, 99500, 100000, '2023-06-15 15:07:31'),
(6, 12, 'omkarnew', 5000, 0, 95000, 100000, '2023-06-15 15:09:59'),
(7, 12, 'omkarnew', 0, 500, 95500, 95000, '2023-06-15 15:10:08'),
(8, 12, 'omkarnew', 500, 0, 95000, 95500, '2023-06-15 15:10:30'),
(9, 12, 'omkarnew', 5000, 0, 90000, 95000, '2023-06-15 15:10:44'),
(10, 12, 'omkarnew', 0, 10000, 100000, 90000, '2023-06-15 15:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `usertype` varchar(255) NOT NULL,
  `amount` int(100) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `usertype`, `amount`, `status`) VALUES
(1, 'Sanjeev', 'sanjeev@gmail.com', '12345', 'bank', 0, '1'),
(2, 'Rahul', 'rahul@gamail.com', '12345', 'bank', 0, '1'),
(3, 'Alok Kumar Singh', 'alok@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'bank', 0, '1'),
(4, 'Rajeev', 'rajeev@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', 'bank', 0, '1'),
(5, 'omkar@gmail.com', 'omkar@gmail.com', 'c6ee2d8010446d2625e6f2a062d3ccb5b97f5899', 'bank', 0, '1'),
(6, 'omkar@gmail.com', 'omkar@gmail.com', 'c6ee2d8010446d2625e6f2a062d3ccb5b97f5899', 'bank', 0, '1'),
(7, 'omkar@gmail.com', 'omkar@gmail.com', 'c6ee2d8010446d2625e6f2a062d3ccb5b97f5899', 'bank', 0, '1'),
(8, 'omkar@gmail.com', 'omkar@gmail.com', 'c6ee2d8010446d2625e6f2a062d3ccb5b97f5899', 'bank', 0, '1'),
(9, 'omkar1234@gmail.com', 'omkartrial@gmail.com', 'c6ee2d8010446d2625e6f2a062d3ccb5b97f5899', 'customer', 1000000, '1'),
(10, 'omkard123', 'omkar1234@gmail.com', '97fdaacebb1159e6ac660b519880c6e034474ff3', 'bank', 0, '1'),
(11, 'omkar12345', 'omkar12345@gmail.com', '97fdaacebb1159e6ac660b519880c6e034474ff3', 'bank', 0, '1'),
(12, 'omkarnew', 'omkarnew@gmail.com', '9a8039e081d320d7abc33077f3c1f1fab22a9dbc', 'customer', 100000, '1'),
(13, 'omkarbank', 'omkarbank@gmail.com', 'a7c6d790f4e255a67e86e2f0b9e246036ccee235', 'bank', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
