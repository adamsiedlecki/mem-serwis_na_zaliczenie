-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 13 Maj 2020, 09:51
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `mem-serwis-db`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `memes`
--

CREATE TABLE `memes` (
  `id` int(11) NOT NULL,
  `filename` text COLLATE utf8_polish_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `memes`
--

INSERT INTO `memes` (`id`, `filename`, `user_id`, `date`) VALUES
(14, 'integer.png', 1, '2020-05-06 00:30:00'),
(15, 'array.png', 1, '2020-05-06 00:00:00'),
(16, '4364d1a9f0cf5842f07ad1893ecba974.png', 1, '2020-05-06 00:50:00'),
(17, 'fajny-ten-mem_2018-09-13_21-01-44.jpg', 1, '2020-05-06 00:00:00'),
(18, '15855128536066.jpg', 2, '2020-05-06 00:20:00'),
(19, 'meme_4W22ima2qe9RE4fI0ljlH8UBS.jpeg', 5, '2020-05-06 00:10:00'),
(20, '444a932095_zdales_cisco.jpg', 1, '2020-05-12 20:47:38'),
(21, 'comment_2S44zrJEbGFKN6PWvCsnNn9OXYPzHrvJ.jpg', 6, '2020-05-13 09:48:12');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `password` text COLLATE utf8_polish_ci NOT NULL,
  `role` text COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'admin', '$2y$10$EKluXH2zmTyGTt0.WgYJGuewvVQhdwko5PNkzDSZ.7VdN1ZYhfP9e', 'admin'),
(3, 'n', '$2y$10$SQgkNsUDP891W2MtpZnZqO9fakO8q4.kivHTFB3AJZTswTpSm5eYy', 'user'),
(5, 'adam', '$2y$10$RGWITQOY7vKs3DXi8fUNCOi5mKwuLgCu94LuWNyfNzOSWFswduU1a', 'user'),
(6, 'jan', '$2y$10$lJNm0qHxTSuEVXpkKjZwo.a0g.ANczx2FHtYX6B88XeXN5qMK.1vi', 'user');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `memes`
--
ALTER TABLE `memes`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `memes`
--
ALTER TABLE `memes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
