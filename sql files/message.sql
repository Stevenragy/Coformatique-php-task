-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 10:14 PM
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
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `createdOn` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `message`, `createdOn`) VALUES
(7, 25, ' And it is', '2019-11-30 18:15:39'),
(9, 25, 'how are you', '2019-11-30 12:36:04'),
(10, 29, 'heyyyyyyyyyyyyyyyyy', '2019-11-30 12:38:01'),
(11, 29, 'okkkkkkkkkkkkkkkkkkkkkkk', '2019-11-30 15:24:49'),
(12, 29, 'okkkkkkkkkkkkkkkkkkkkkkk', '2019-11-30 15:26:01'),
(13, 25, 'How are you', '2019-11-30 15:36:26'),
(14, 25, 'Are you ok\r\n', '2019-11-30 15:36:41'),
(15, 25, 'Are you ok\r\n', '2019-11-30 15:44:54'),
(16, 25, 'Are you ok\r\n', '2019-11-30 15:45:45'),
(17, 25, 'Are you ok\r\n', '2019-11-30 15:49:49'),
(20, 25, 'Some Quotes. You can fool all the people some of the time, and some of the people all the time, but you cannot fool all the people all the time. Some people want it to happen, some wish it would happen, others make it happen. Do the right thing.', '2019-11-30 16:19:20'),
(22, 25, 'it is very hard', '2019-11-30 19:45:17'),
(25, 25, ' Have a nice week', '2019-11-30 21:02:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
