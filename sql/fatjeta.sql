-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 09:34 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fatjeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_id` int(11) NOT NULL,
  `modified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `title`, `image`, `description`, `date`, `user_id`, `modified`) VALUES
(10, 'Test gent', '64764140-E099-494A-AAD3-A5EFD7EBA83E.JPG', 'test gent', '2020-07-12 18:28:26', 7, 1),
(11, 'My photo', 'IMG_8343.jpg', 'test', '2020-07-10 22:39:29', 3, 0),
(12, 'UpShift', 'IMG_8353.jpg', 'Test', '2020-07-11 00:12:33', 4, 0),
(17, 'UpShift', 'linux.jpg', 'Test', '2020-07-11 01:04:56', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `name`, `email`, `message`) VALUES
(1, 'Gex', 'gex@gex.com', 'Hello'),
(2, 'Shkumbin', 'shkumbin@hotmail.com', 'Tung tung'),
(10, 'Gent', 'gent@bitemybytes.com', 'Tuj testue!'),
(11, '', '', ''),
(12, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(16) NOT NULL,
  `last_name` varchar(16) NOT NULL,
  `role` int(1) NOT NULL,
  `salt` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `role`, `salt`) VALUES
(3, 'gent', '606aefa64f3f91985be0b152545939ff507a41536f2cac68abba95b48c736b0a', 'Gent', 'Nuka', 1, '#Un3j4mF4tj3t4#1232#50ftw4r3d3v3'),
(4, 'fatjeta', 'e2bc5efa7e0a9bab4aad3d6896bb2fac62ee1c99cee36e325a2499d60d62cfa1', 'Fatjeta', 'Xhuraj', 0, '#Un3j4mF4tj3t4#1232#50ftw4r3d3v3'),
(5, 'gex', '26905ab639c34224e5e211aaad14686961694e30eeea0ec347454fddcd1c8ac8', 'gex', 'gex', 2, '#Un3j4mF4tj3t4#1232#50ftw4r3d3v3'),
(6, 'gexnuka', '445cdf06d84bea28a5c9a71125e5f7e03554695ee10e16bd7f692a0bad271f6a', 'gex', 'nuka', 2, '#Un3j4mF4tj3t4#1232#50ftw4r3d3v3'),
(7, 'gentnuka', '00c595a25b8a1ae6086b3417f5ffd5bc4b44b7b43db1aa0d82ca74e80b2b0793', 'gent', 'nuka', 1, '#Un3j4mF4tj3t4#1232#50ftw4r3d3v3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
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
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `gallery`
--
ALTER TABLE `gallery`
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
