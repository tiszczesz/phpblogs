-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Lut 2015, 10:14
-- Wersja serwera: 5.6.20
-- Wersja PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `blogi4ti`
--
CREATE DATABASE IF NOT EXISTS `blogi4ti` DEFAULT CHARACTER SET utf8 COLLATE utf8_polish_ci;
USE `blogi4ti`;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `blogs`
--

DROP TABLE IF EXISTS `blogs`;
CREATE TABLE IF NOT EXISTS `blogs` (
`id` int(11) NOT NULL,
  `tresc` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `dat` datetime DEFAULT CURRENT_TIMESTAMP,
  `userID` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `blogs`
--

INSERT INTO `blogs` (`id`, `tresc`, `dat`, `userID`) VALUES
(1, 'Moja pierwsza informacja', '2015-01-22 00:00:00', 1),
(2, 'Inna informacja ...', '2015-01-12 00:00:00', 1),
(3, 'Tym razem coś ciekawego :P', '2014-12-24 00:00:00', 1),
(4, 'Najnowsza informacja o żółtkach', '2015-01-06 00:00:00', 2),
(5, 'Najnowsza treść z dnia 28.012014', '2015-01-28 14:41:12', 1),
(6, 'treść specjalnie dla Ojczyka', '2015-01-28 14:42:48', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(11) NOT NULL,
  `login` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `imie` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwisko` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=11 ;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `imie`, `nazwisko`) VALUES
(1, 'burak', 'Bartlomiej', 'Nowak'),
(2, 'lolouuu', 'Lesław', 'Możdżer'),
(3, 'alusia', 'Alicja', 'Bachleda-Curuś'),
(4, 'werty', 'Marzena', 'Grucha'),
(10, 'edc', 'edc', 'edc');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- AUTO_INCREMENT dla tabeli `blogs`
--
ALTER TABLE `blogs`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
