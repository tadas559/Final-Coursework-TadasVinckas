-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 2018 m. Rgs 09 d. 18:52
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
-- Sukurta duomenų struktūra lentelei `tokens`
--

CREATE TABLE `tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `tokens`
--

INSERT INTO `tokens` (`id`, `user_id`, `token`) VALUES
(1, 4, 'c1e7e48e4e2fdb9d52134e5faf7b9cca'),
(2, 4, '4f3b400625b869f5789435ac0ac848be'),
(3, 4, 'e7639285e48a1b49bfe0a29fdc0c6e93'),
(4, 2, 'e2c1eb4622f7019a243cd3946992b8e2'),
(5, 4, '21fbe2df9900b657146e9140920c18d0'),
(6, 4, '41c0f1dee062f9875856ffe323ee7336'),
(7, 4, 'a82b8ab3b93ca11940ba28a53a5d080e'),
(8, 4, '1e73f892390871e80d6f84df0dff5607'),
(9, 4, 'beb35a502acf6c6b2a265e4df32380e3'),
(10, 4, '216bce06885c1e970c1fe09af1777b8b'),
(11, 4, '3ea15d4aace6c0c0323048ea797227dd'),
(12, 4, '08665264085cb3ca60ba521605f1f660'),
(13, 4, 'a71c9edb6f847bcf27b73c753b413d38'),
(14, 4, '3bc36475974ac199e091a7c666820f34'),
(15, 4, 'c64beccec490a0aaa45b1281b235d43b'),
(16, 4, '4d9f12f2dc0a41b9781b71f11136ee5a'),
(17, 4, 'e36c11128dae49e0e6fe3ff29ad10ccb'),
(18, 2, '6e16259a851db1c5d672f2562225fee8'),
(19, 4, '93a3fb9a80195e0e27f93baf2f70ee1b'),
(20, 2, 'eec6cab0c459e0d5bfd0f511a5ac1e59'),
(21, 2, 'ba202a139bb63b5f4a86d3dbac98e4b8'),
(22, 2, 'c91f6b8df0dea0140464faed52552c02'),
(23, 12, '86ee4a4a71be2710cfd356cc1015a679'),
(24, 12, '2413a94fc46931351895937be2b66d30'),
(25, 12, '437d01327dd5314e9d5ef3c6a8fe51e8'),
(26, 12, '4cf341cc22ad6fbec558123e794266fe'),
(27, 12, '47b5b01b14b1ff932f27c701ac4a41d9'),
(28, 12, '2888bef77b6f839698c3e88c96798f05'),
(29, 12, '67e9ba4fb798fbc2772f85520caac6a7'),
(30, 12, '34ed9b1228ff6bd0ff8d68623ccf1011'),
(31, 12, 'eb064210b3bd3488773fbd2bcd07a08e'),
(32, 114, 'e7244afe6e15c4d7d15f15f605287524'),
(33, 114, '60516435db4a74058a94d2b49080068d'),
(34, 114, '6b3ec397fffa357d45a6434ae723bb20'),
(35, 114, '033882c63252423079493c57d1dab32c'),
(36, 114, '0942c881407034cc0f87e17f1756b8e4'),
(37, 114, '46d08cd11315b832d9bbc687ad730dc8'),
(38, 114, '21b12e6c8c06f296f1f2ffbd799e9d1c'),
(39, 114, 'e923f5f026e0975a2e239b7ca8644e1e'),
(40, 114, '0d67c465f76de7e137ed831b5420b363'),
(41, 123, 'e90e2be85e9af4f60cb626c8462ef948'),
(42, 124, '2764eb41e60a34e984d0c7c6f67373bf'),
(43, 114, 'f108ad482acbf4f0a4f79c801a613d6b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tokens`
--
ALTER TABLE `tokens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tokens`
--
ALTER TABLE `tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
