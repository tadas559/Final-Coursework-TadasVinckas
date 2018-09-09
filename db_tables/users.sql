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
-- Sukurta duomenų struktūra lentelei `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `creation_date` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `access` int(1) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Sukurta duomenų kopija lentelei `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `creation_date`, `firstname`, `access`, `lastname`) VALUES
(12, 'tadas2@gmail.com', '$2y$10$T49PeMyhk631OTD3qmoE/Of4hyv/pk2fOuPIrBxZizNd8bxCAoQ/q', 0, 'tadas', 1, 'vinckas'),
(111, 'tadas2@gmail.comm', '$2y$10$e0jO8vIodyebZjBIQHUZnug/rkcEUrZfh5RqQjk5vMsvNsOkZBKti', 0, 'tadas', 0, 'vinckas'),
(112, 'mjaceris@yahoo.com', '$2y$10$zbUgRSR3mCJLsuflmPGVKugL907L3TSe/WG402WjgYoRBnadg2EBy', 0, 'Mindaugas', 1, 'jac'),
(113, 'egle.pur@gmail.com', '$2y$10$r.FcJ5JHxoihCEL9vjHADurZSSKHzP7V6/V.SjNzzWRqnPepC49T6', 0, 'EGLE', 1, 'Z.'),
(114, 'admin@gmail.com', '$2y$10$o5dQigEgVh.S3D0PTB0kTeoLx2t2Ap/h4u26rKTfPUmdBx.uRlafi', 0, 'admin', 0, 'admin'),
(118, 'egle.purr@gmail.com', '$2y$10$IPvbVTSraYTn14X90a4XLu1R9vjWF0Zb6JXUbqp9NU9y7sqRM6SSa', 0, 'eee', 0, 'eee'),
(120, 'egle.purr@gmail.comr', '$2y$10$pNvgoFYA6nMZlex0Tjh.me2xxy08SPR6mSNOKzm2KHl1nTxIiyZ2K', 0, 'EGLE', 0, 'eee'),
(121, 'my@email.com', '$2y$10$NxTQP0igpnEW1zKIvJBejeRtgcJAJcS.KTNYeFSphILzbOBFmwUQy', 0, 'name', 0, 'last name'),
(122, 'IREVON@', '$2y$10$O28k14rqSCVOAB4m2/Hcu.j3Mb/d1tHSfyuK4zX5ArkyS3e8D.zbe', 0, 'TSIFN', 0, 'ERRVIOREIO'),
(123, 'zartex007@gmail.com', '$2y$10$Rb3HjPz6UOrtZxWn5sngSuubKq.GC660tbdEt39y/mcFCo6mTjZ1i', 0, 'Vytautas', 0, 'Petronis'),
(124, 'ievaapetr@gmail.com', '$2y$10$xQdo3HFselMbWJXwIaUbduOHaXt/IfA6/I7GHKlN1RmVi0lmqZJmm', 0, 'Ieva', 0, 'P.'),
(125, 'tadas@fwe', '$2y$10$7d3mFcbwG/FQYO9kBypj9uwAtSelshxL/OPiNu6Gqr7c9bDA8sYJm', 0, 'iji', 0, 'jiji'),
(126, 'tadas5@gmail.com', '$2y$10$XnElSfEy2o9rwru06eHGQOpUZ2gzktImJLX7AeCzItap.srMy8ebC', 0, 'tadas', 0, 'vinckas');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `emailo` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
