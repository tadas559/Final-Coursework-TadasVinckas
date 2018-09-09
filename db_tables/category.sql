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
-- Sukurta duomenų struktūra lentelei `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `name` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `category`
--

INSERT INTO `category` (`id`, `image`, `content`, `date`, `name`, `map`, `title`, `link`) VALUES
(1, '', 'Vingis Park is the largest park in Vilnius. Located at a curve in the Neris River, it covers 162 hectares (400 acres).\r\n\r\nIt is used as a venue for various events, especially concerts and sports competitions.', '2018-08-21 11:44:48', 'location', 'pb=!1m14!1m12!1m3!1d18452.0506418055!2d25.22062737834687!3d54.68311704739711!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1slt!2slt!4v1534674806947', 'Location', 'info.php?name=location'),
(2, '', 'Ticket types available:\r\n• 3-Day ticket\r\n• 3-Day ticket with camping\r\n• 2-Day ticket\r\n• 1-Day ticket\r\n• VIP ticket\r\n• Group ticket\r\n• Youth ticket – discount is applied to 3-Day ticket, 3-Day ticket with camping*\r\n\r\n*Youth ticket can be purchased for visitors aged 11-16 (including).\r\n*Children up to 10 years (included) can enter festival for free.\r\n\r\n \r\n\r\nWe strongly advise not to buy tickets from other sellers and ticket touts, as they could be fake!', '2018-08-21 08:05:43', 'tickets', '', 'Tickets', 'http://www.tiketa.lt'),
(3, '', '', '2018-09-07 06:33:36', '', '', 'Agenda', 'index.php#agendaanc'),
(11, '', '', '2018-09-07 06:41:38', '', '', 'Line up', 'index.php#lineupanc'),
(15, 'tents.jpg', 'During the festival, the camping is free for the people who bought the tickets until there is enough free space, what means that the capacities are limited.', '2018-08-20 14:18:59', 'accommodation', '', 'Accommodation', 'info.php?name=accommodation'),
(16, 'rules.jpg', 'It is strictly forbidden to enter the festival area with: knives, sticks, pyrotechnics, firearms, glassware (glass bottles) etc.', '2018-08-28 07:10:07', 'rules', '', 'Festival rules', 'info.php?name=rules'),
(17, 'baloon.jpg', 'Every year alongside all the concerts we offer a variety of fun activities for kids and adults alike.\r\n\r\nYou can go to the Vingis park stage and enjoy music.\r\n\r\nIt will be the first time when we provide opportunity to fly with air baloons.', '2018-08-28 07:10:07', 'activities', '', 'Activities', 'info.php?name=activities'),
(18, '', '', '2018-08-29 09:05:52', '', '', 'Past events', 'gallery.php?years=2018'),
(19, '', '', '2018-08-29 09:06:14', '', '', 'Sponsors', 'index.php#sponsorsanc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
