-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 11 dec 2023 om 11:33
-- Serverversie: 10.4.28-MariaDB
-- PHP-versie: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `creamybliss`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `small` varchar(60) NOT NULL DEFAULT '3,15',
  `medium` varchar(60) NOT NULL DEFAULT '3,75',
  `large` varchar(60) NOT NULL DEFAULT '4,15',
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `small`, `medium`, `large`, `description`, `image`) VALUES
(1, 'Banana', '3,15', '3,75', '4,15', 'A refreshing banana milkshake made with fresh bananas and a bunch of CreamyBliss cream.', 'banana_milkshake.jpg'),
(2, 'Banana Deluxe', '4,15', '4,75', '5,15', 'A luxurious milkshake filled with banana slices and our freshest milk.  ', 'bananenmilkshake.jpg'),
(3, 'BlackberryBlast', '3,15', '3,75', '4,15', 'Experience a blast with our blackberryBlast milkshake. Mdade with only the sweetest blackberries from Italy.', 'blackberryblast.jpg'),
(4, 'Chocolate', '2,65', '3,15', '3,65', 'A sweet creamy chocolate milkshake made cheaply by exploiting cocoa farmers.', 'chocolademilkshake.jpg'),
(5, 'Chocolate Deluxe', '4,15', '4,75', '5,15', 'The only milkshake we have that\'s made from fair trade™ cocoa and milk.', 'chocolatedeluxemilkshake.jpg'),
(6, 'Lotus™', '3,15', '3,75', '4,15', 'A milkshake from our collaboration with Lotus Biscoff™.', 'lotusmikshake.jpg'),
(7, 'Mermaid', '3,65', '4,25', '4,65', 'A high calorie milkshake with many fantastical flavours from the sea. ', 'mermaidmilkshake.jpg'),
(8, 'Oreo™', '3,15', '3,75', '4,15', 'A milkshake from our collaboration with Oreo™', 'oreomilkshake.jpg'),
(9, 'Pumpkin Spice', '3,15', '3,75', '4,15', 'From the recent trends with pumpkin spice we now have our very own pumpkin spice milkshake.', 'pumpkinmilkshake.jpg'),
(10, 'Strawberry', '3,15', '3,75', '4,15', 'A sweet strawberry milkshake.', 'strawberrymilkshake.jpg'),
(11, 'Unicorn', '3,15', '3,75', '4,15', 'Made with real unicorn horns. (disclaimer: no unicorns were hurt in this process).', 'unicornmilkshake.jpg');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `superuser` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `superuser`) VALUES
(1, 'admin', 'admin', 'null', 1),
(4, 'Brandon', 'steenwijk', 'brandonsymonowicz@gmail.com', 0),
(12, '', '', '', 0),
(13, 'Vidar', 'vidar', 'Vidar@gmail.com', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `winkelmand`
--

CREATE TABLE `winkelmand` (
  `username` varchar(256) NOT NULL,
  `id` tinyint(4) NOT NULL,
  `size` varchar(16) NOT NULL,
  `item_id` int(11) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `winkelmand`
--

INSERT INTO `winkelmand` (`username`, `id`, `size`, `item_id`, `amount`) VALUES
('admin', 1, 'L', 179, 12),
('brandon', 2, 'M', 180, 20),
('admin', 3, 'S', 181, 3),
('admin', 2, 'M', 182, 12);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexen voor tabel `winkelmand`
--
ALTER TABLE `winkelmand`
  ADD PRIMARY KEY (`item_id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `winkelmand`
--
ALTER TABLE `winkelmand`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=183;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
