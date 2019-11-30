-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 10:13 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `coform`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL COMMENT 'auto increment',
  `full_name` varchar(250) NOT NULL,
  `username` varchar(60) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` char(60) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `gender`, `mobile`, `email`, `password`, `created_at`, `updated_at`) VALUES
(25, 'Steven Ragy', 'steven93', 'female', 1006172314, 'steeven.ok@yahoo.com', '$2y$10$ODoUDYnTrgM5etijE92S..1zvGfo297jcjLs0In04oHIlsqiDCtt2', '2019-11-29 11:23:00', '2019-11-29 03:23:00'),
(26, 'Ragy', 'ragy', 'male', 1006172319, 'Ragy@gmail.com', '$2y$10$i2bX5CzzYpGmF/BovlZbgOTYFLTv0SNYmaukKcCu23QnyVFOJ05Ku', '2019-11-30 07:38:55', '2019-11-29 23:38:55'),
(29, 'ahmed', 'ahmed', 'male', 1006172396, 'ahmed@yahoo.com', '$2y$10$4guGFoUhbxo5/hobeNMhX.Y3K.9Ivn.foHnW2udM5.WEI9c4O6ZZm', '2019-11-30 08:14:42', '2019-11-30 00:14:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile` (`mobile`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT COMMENT 'auto increment', AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
