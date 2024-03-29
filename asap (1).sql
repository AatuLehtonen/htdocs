-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14.02.2024 klo 11:46
-- Palvelimen versio: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asap`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `käyttäjät`
--

CREATE TABLE `käyttäjät` (
  `Id` int(11) NOT NULL,
  `Nimi` text NOT NULL,
  `Käyttäjänimi` text DEFAULT NULL,
  `Puhelin` varchar(20) NOT NULL,
  `Sähköposti` text NOT NULL,
  `Rekisteröitynyt` datetime NOT NULL DEFAULT current_timestamp(),
  `Salt` char(32) NOT NULL,
  `Salasana` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `käyttäjät`
--

INSERT INTO `käyttäjät` (`Id`, `Nimi`, `Käyttäjänimi`, `Puhelin`, `Sähköposti`, `Rekisteröitynyt`, `Salt`, `Salasana`) VALUES
(2, 'Teemu', 'Osmoosi69', '0100100', 'temppa@fi', '2024-01-25 10:01:36', '', ''),
(3, 'Aatu', 'Timu', '42069', 'attu@fi', '2024-01-25 10:12:20', '', ''),
(4, '', '', '', '', '2024-02-12 13:44:10', 'cfe6c3a186de5505c750b8336d761d9e', '$2y$10$yyOutgZwGC07qCt9tmE/Wetpg.UP3owQ6aNmuC8nAT3yVNdmkvp9a'),
(5, '', 'mie', '0100100', 'minä@mail.fi', '2024-02-12 13:45:03', '80e9b2ec7989d6910c8a4698792754d3', '$2y$10$dWYCoqYQiN2purGNYND0P.gvjtgkXDHnDYG3rXLZTOhfiMTGncx0W');

-- --------------------------------------------------------

--
-- Rakenne taululle `viestit`
--

CREATE TABLE `viestit` (
  `Id` int(10) NOT NULL,
  `Viesti` text NOT NULL,
  `KId` int(11) NOT NULL,
  `VId` int(11) NOT NULL,
  `Aika` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `viestit`
--

INSERT INTO `viestit` (`Id`, `Viesti`, `KId`, `VId`, `Aika`) VALUES
(1, 'Moi vaan!', 2, 2, '2024-01-17 09:01:29'),
(2, 'No heipä hei!', 2, 3, '2024-01-17 09:01:29'),
(3, 'Moi!', 3, 3, '2024-01-17 09:12:54'),
(4, 'terve!', 2, 3, '2024-01-25 08:48:22'),
(5, 'test', 2, 3, '2024-01-25 09:12:21'),
(6, 'Jännää!', 2, 3, '2024-01-25 09:13:15'),
(7, 'Moro!', 2, 3, '2024-01-25 10:39:52'),
(8, 'Moi!', 2, 3, '2024-01-25 11:03:51'),
(9, 'homo', 2, 0, '2024-02-05 08:26:39'),
(10, '', 2, 0, '2024-02-05 08:26:46'),
(11, '', 2, 0, '2024-02-05 08:27:23'),
(12, '', 2, 0, '2024-02-05 09:00:13'),
(13, 'moi', 2, 0, '2024-02-05 09:00:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `käyttäjät`
--
ALTER TABLE `käyttäjät`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `viestit`
--
ALTER TABLE `viestit`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `käyttäjät`
--
ALTER TABLE `käyttäjät`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `viestit`
--
ALTER TABLE `viestit`
  MODIFY `Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
