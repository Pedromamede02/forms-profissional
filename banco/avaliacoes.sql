-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2024 at 12:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projeto`
--

-- --------------------------------------------------------

--
-- Table structure for table `avaliacoes`
--

CREATE TABLE `avaliacoes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `avaliacao1` int(11) DEFAULT NULL CHECK (`avaliacao1` between 0 and 10),
  `avaliacao2` int(11) DEFAULT NULL CHECK (`avaliacao2` between 0 and 10),
  `avaliacao3` int(11) DEFAULT NULL CHECK (`avaliacao3` between 0 and 10),
  `avaliacao4` int(11) DEFAULT NULL CHECK (`avaliacao4` between 0 and 10),
  `avaliacao5` int(11) DEFAULT NULL CHECK (`avaliacao5` between 0 and 10),
  `avaliacao6` int(11) DEFAULT NULL CHECK (`avaliacao6` between 0 and 10),
  `avaliacao7` int(11) DEFAULT NULL CHECK (`avaliacao7` between 0 and 10),
  `avaliacao8` int(11) DEFAULT NULL CHECK (`avaliacao8` between 0 and 10),
  `data_submissao` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avaliacoes`
--

INSERT INTO `avaliacoes` (`id`, `id_usuario`, `avaliacao1`, `avaliacao2`, `avaliacao3`, `avaliacao4`, `avaliacao5`, `avaliacao6`, `avaliacao7`, `avaliacao8`, `data_submissao`) VALUES
(1, 1, 10, 0, 0, 0, 0, 0, 0, 0, '2024-02-01 23:29:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avaliacoes`
--
ALTER TABLE `avaliacoes`
  ADD CONSTRAINT `avaliacoes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `tbusu` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
