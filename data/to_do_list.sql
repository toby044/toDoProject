-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 23. 02 2022 kl. 20:18:34
-- Serverversion: 10.4.22-MariaDB
-- PHP-version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `to_do_list`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `todos`
--

CREATE TABLE `todos` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `descript` text NOT NULL,
  `date_time` datetime NOT NULL DEFAULT current_timestamp(),
  `checked` tinyint(1) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `todos`
--

INSERT INTO `todos` (`id`, `title`, `descript`, `date_time`, `checked`, `user_id`) VALUES
(2, 'Tag et bad', 'Husk sæbe !', '2022-02-23 20:17:06', 0, 7),
(3, 'Spis morgenmad', 'Havregryn med marmelade', '2022-02-23 20:17:20', 1, 7),
(4, 'Børste tænder', 'Morgen OG aften', '2022-02-23 20:17:35', 1, 7),
(5, 'Spis kage ', 'Banankage, hjemmelavet', '2022-02-23 20:18:01', 0, 7);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$sNTXw3U49uAfvmT3qJJs6OQkYl.AkN4wHI8XPhKC7H4m5rAGd9fSG', 'admin'),
(2, 'user', '$2y$10$80LOzcI/PDOn916Yzj4MDekLMOz09YaM0e4sTFcaBV084eN56JsZK', 'user'),
(7, 'Mikkel', '$2y$10$DqGBPk2VGaa8Q7uc/Godq.X8Dil3OegQp3FHv.v6gAaKRientWoUy', 'user');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `todos_ibfk_1` (`user_id`);

--
-- Indeks for tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `todos`
--
ALTER TABLE `todos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Begrænsninger for dumpede tabeller
--

--
-- Begrænsninger for tabel `todos`
--
ALTER TABLE `todos`
  ADD CONSTRAINT `todos_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
