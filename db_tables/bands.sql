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
-- Sukurta duomenų struktūra lentelei `bands`
--

CREATE TABLE `bands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `spotify` varchar(255) NOT NULL,
  `allinfo` text NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `day` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `bands`
--

INSERT INTO `bands` (`id`, `name`, `info`, `youtube`, `spotify`, `allinfo`, `image1`, `image2`, `day`) VALUES
(1, 'Arctic Monkeys', '11 AM', 'bpOSxM0rNPM', 'album/78bpIziExqiI9qztvNFlQu', 'In response to overwhelming fan demand, Arctic Monkeys announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band1.png', 'b1.png', 1),
(2, 'Placebo', '2 PM', 'x5GuBa4Bbnw', 'album/42LvsxgKnHYVu7PQRXmURw', 'In response to overwhelming fan demand, Placebo announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band2.jpg', 'b2.png', 1),
(3, 'The Rasmus', '11 AM', '_ao2u7F_Qzg', 'album/1J9W7Fkg34vdOVa8gR7dx7', 'In response to overwhelming fan demand, The Rasmus announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band3.png', 'b3.png', 2),
(4, 'Jack White', '1 PM', 'qI-95cTMeLM', 'album/75224XX4gZg2PjWeXzRjsa', 'In response to overwhelming fan demand, Jack White announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band4.jpg', 'b4.png', 2),
(5, 'Colours Of Bubbles', '3 PM', 'rSmHQI6tubg', 'album/41KpOym5qNvAXEQLv5YEJK', 'In response to overwhelming fan demand, Colours Of Bubbles announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band5.png', 'b5.png', 2),
(6, 'Sinickis', '4 PM', 'UMmQKNQVx4g', 'album/6TYWiEgBFP1GJghLrCLu9G', 'In response to overwhelming fan demand, Sinickis announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band7.jpg', 'b7.png', 2),
(7, 'Freaks On Floor', '3 PM', 'NOE2P_OToNQ', 'album/1RP9jBbn5hTAmxBlmjyNru', 'In response to overwhelming fan demand, Freaks On Floor announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band7.png', 'freaks.png', 1),
(8, 'Solo Ansamblis', '4 PM', 'hJMMKxnYwio', 'album/3PhSMFCWdVF5SfMx46oW63', ' In response to overwhelming fan demand, Solo Ansamblis announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band8.png', 'b8.png', 1),
(9, 'Deeper Upper', '8 PM', '2_qL_K524-c', 'album/1dIpTuQT266PA2CK8Hipqg', 'In response to overwhelming fan demand, Deeper Upper announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'b9.png', 'band9.png', 2),
(10, 'Garbanotas Bosistas', '11 PM', '_kJZZvWMz64', 'album/2VBV17Cd0Im61KcJxQxb4M', 'In response to overwhelming fan demand, Garbanotas Bosistas announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band10.png', 'b10.png', 2),
(11, 'Andrius Mamontovas', '5 PM', 'OeSok4Gzrcw', 'album/0RlE4rIDnQTQDJY8jRp5W5', ' In response to overwhelming fan demand, Andrius Mamontovas announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band11.png', 'b11.png', 1),
(12, 'BA.', '8 PM', 'A8g0Ss62QN4', 'album/3dAcxay2a8IOpTKl49pZ5u', ' In response to overwhelming fan demand, BA. announced that they will return for a final, exclusive run of shows, including a stop in Vilnius!', 'band12.png', 'b12.png', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bands`
--
ALTER TABLE `bands`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bands`
--
ALTER TABLE `bands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
