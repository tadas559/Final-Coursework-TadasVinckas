-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018 m. Rgs 09 d. 18:51
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6847947_vilniusdata`
--

-- --------------------------------------------------------

--
-- Sukurta duomenų struktūra lentelei `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `years` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `gallery`
--

INSERT INTO `gallery` (`id`, `years`, `image`, `date`) VALUES
(1, '2018', 'f1.jpg', '2018-08-22 12:42:43'),
(2, '2018', 'f2.jpg', '2018-08-23 07:34:37'),
(3, '2018', 'f3.jpg', '2018-08-23 07:34:58'),
(4, '2018', 'f4.jpg', '2018-08-23 07:34:58'),
(5, '2018', 'f5.jpg', '2018-08-23 07:35:18'),
(6, '2018', 'f6.jpg', '2018-08-23 07:35:18'),
(7, '2018', 'f7.jpg', '2018-08-23 07:35:32'),
(8, '2018', 'f8.jpg', '2018-08-23 07:35:32'),
(9, '2018', 'f9.jpg', '2018-08-23 07:35:55'),
(10, '2018', 'f10.jpg', '2018-08-23 07:35:55'),
(11, '2018', 'f11.jpg', '2018-08-23 07:36:11'),
(12, '2018', 'f12.jpg', '2018-08-23 07:36:11'),
(21, '2017', 'f20.jpg', '2018-09-08 20:24:41'),
(22, '2016', 'f21.jpg', '2018-09-08 20:25:00'),
(23, '2016', 'f22.jpg', '2018-09-08 20:25:00'),
(24, '2017', 'f23.jpg', '2018-09-08 20:25:28'),
(25, '2017', 'f24.jpg', '2018-09-08 20:25:28'),
(26, '2017', 'f25.jpg', '2018-09-08 20:26:11'),
(27, '2017', 'f26.jpg', '2018-09-08 20:26:11'),
(28, '2017', 'f27.jpg', '2018-09-08 20:27:45'),
(29, '2017', 'f28.jpg', '2018-09-08 20:27:45'),
(30, '2017', 'f37.jpg', '2018-09-08 20:28:04'),
(31, '2016', 'f29.jpg', '2018-09-08 20:28:04'),
(32, '2016', 'f30.jpg', '2018-09-08 20:29:04'),
(33, '2016', 'f31.jpg', '2018-09-08 20:29:04'),
(34, '2016', 'f33.jpg', '2018-09-08 20:29:16'),
(35, '2016', 'f32.jpg', '2018-09-08 20:29:16'),
(36, '2017', 'f34.jpg', '2018-09-08 20:29:33'),
(37, '2017', 'f35.jpg', '2018-09-08 20:29:33'),
(38, '2016', 'f1.jpg', '2018-09-09 09:12:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
