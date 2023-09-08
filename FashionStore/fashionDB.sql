-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 08 sep 2023 om 13:00
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fashion`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`) VALUES
(3, 'Shoes', 1),
(4, 'Helmet', 1),
(5, 'Armor', 1),
(6, 'Broek', 1),
(7, 'Jurkje', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(140) NOT NULL,
  `alt` varchar(140) NOT NULL,
  `viewpoint` varchar(140) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `images`
--

INSERT INTO `images` (`id`, `path`, `alt`, `viewpoint`, `active`) VALUES
(16, 'DiamondHelmet.png', 'a diamond helmet', 'front', 1),
(17, 'DiamondHelmetBack.png', 'a diamond helmet', 'back', 1),
(18, 'DiamondHelmetLeft.png', 'a diamond helmet', 'left', 1),
(19, 'DiamondHelmetRight.png', 'a diamond helmet', 'right', 1),
(20, 'DiamondShoes.png', 'A pair of diamond shoes', 'front', 1),
(21, 'DiamondShoesBack.png', 'A pair of diamond shoes', 'back', 1),
(22, 'DiamondShoesLeft.png', 'A pair of diamond shoes', 'left', 1),
(23, 'DiamondShoesRight.png', 'A pair of diamond shoes', 'right', 1),
(24, 'DiamondArmor.png', 'A suit of diamond armor', 'front', 1),
(25, 'DiamondArmorBack.png', 'A suit of diamond armor', 'back', 1),
(26, 'DiamondArmorLeft.png', 'A suit of diamond armor', 'left', 1),
(27, 'DiamondArmorRight.png', 'A suit of diamond armor', 'right', 1),
(28, 'BronzeHelmet.png', 'A helmet made of bronze', 'front', 1),
(29, 'BronzeHelmetBack.png', 'A helmet made of bronze', 'back', 1),
(30, 'BronzeHelmetLeft.png', 'A helmet made of bronze', 'left', 1),
(31, 'BronzeHelmetRight.png', 'A helmet made of bronze', 'right', 1),
(32, 'BronzeShoes.png', 'A pair of bronze shoes', 'front', 1),
(33, 'BronzeShoesBack.png', 'A pair of bronze shoes', 'back', 1),
(34, 'BronzeShoesLeft.png', 'A pair of bronze shoes', 'left', 1),
(35, 'BronzeShoesRight.png', 'A pair of bronze shoes', 'right', 1),
(36, 'BronzeArmor.png', 'Armor of bronze', 'front', 1),
(37, 'BronzeArmorBack.png', 'Armor of bronze', 'back', 1),
(38, 'BronzeArmorLeft.png', 'Armor of bronze', 'left', 1),
(39, 'BronzeArmorRight.png', 'Armor of bronze', 'right', 1),
(40, 'Web Marivy zwart voorkant.png', 'Een zwarte broek', 'front', 1),
(41, 'Web Marivy zwart achterkant.png', 'Een zwarte broek', 'back', 1),
(42, 'Web Marivy zwart linkerkant.png', 'Een zwarte broek', 'left', 1),
(43, 'Web Marivy zwart rechterkant.png', 'Een zwarte broek', 'right', 1),
(44, 'Web Navy jurkje voorkant.png', 'Een zwart jurkje met drie verticale witte strepen op de achterkant', 'front', 1),
(45, 'Web Navy jurkje achterkant.png', 'Een zwart jurkje met drie verticale witte strepen op de achterkant', 'back', 1),
(46, 'Web Navy jurkje linkerkant.png', 'Een zwart jurkje met drie verticale witte strepen op de achterkant', 'left', 1),
(47, 'Web Navy jurkje rechterkant.png', 'Een zwart jurkje met drie verticale witte strepen op de achterkant', 'right', 1),
(48, 'Web Norfy coated zwart voorkant.png', 'Een zwarte broek', 'front', 1),
(49, 'Web Norfy coated zwart achterkant.png', 'Een zwarte broek', 'back', 1),
(50, 'Web Norfy coated zwart linkerkant.png', 'Een zwarte broek', 'left', 1),
(51, 'Web Norfy coated zwart rechterkant.png', 'Een zwarte broek', 'right', 1),
(52, 'Web Norfy jog denim light blue voorkant.png', 'Een licht blauwe spijkerbroek', 'front', 1),
(53, 'Web Norfy jog denim light blue achterkant.png', 'Een licht blauwe spijkerbroek', 'back', 1),
(54, 'Web Norfy jog denim light blue linkerkant.png', 'Een licht blauwe spijkerbroek', 'left', 1),
(55, 'Web Norfy jog denim light blue rechterkant.png', 'Een licht blauwe spijkerbroek', 'right', 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kleding`
--

CREATE TABLE `kleding` (
  `id` int(6) NOT NULL,
  `categorie` varchar(140) NOT NULL,
  `naam` varchar(140) NOT NULL,
  `plaatje` varchar(140) NOT NULL,
  `AltText` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `kleding`
--

INSERT INTO `kleding` (`id`, `categorie`, `naam`, `plaatje`, `AltText`) VALUES
(2, 'Helmet', 'Diamond Helmet', 'DiamondHelmet.png', 'a diamond helmet'),
(3, 'Shoes', 'Diamond shoes', 'DiamondShoes.png', 'Two diamond shoes'),
(4, 'Armor', 'Diamond armor', 'DiamondArmor.png', 'A suit of diamond armor'),
(5, 'Helmet', 'Golden helmet', 'GoldHelmet.png', 'A golden helmet'),
(6, 'Shoes', 'Golden Shoes', 'GoldenShoes.png', 'A pair of golden shoes'),
(7, 'Armor', 'Golden Armor', 'GoldenArmor.png', 'A suit of golden armor'),
(8, 'Helmet', 'Silver Helmet', 'SilverHelmet.png', 'A silver helmet'),
(9, 'Shoes', 'Silver Shoes', 'SilverShoes.png', 'Shoes made from silver'),
(10, 'Armor', 'Silver Armor', 'SilverArmor.png', 'Silver plate armor'),
(11, 'Helmet', 'Bronze Helmet', 'BronzeHelmet.png', 'A bronze helmet');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `products`
--

INSERT INTO `products` (`id`, `name`, `categories_id`, `active`) VALUES
(11, 'Diamond Helmet', 4, 1),
(12, 'Diamond shoes', 3, 1),
(13, 'Diamond armor', 5, 1),
(14, 'Bronze Helmet', 4, 1),
(15, 'Bronze Shoes', 3, 1),
(16, 'Bronze Armor', 5, 1),
(17, 'Web Marivy zwart', 6, 1),
(18, 'Web Navy jurkje', 7, 1),
(19, 'Web Norfy coated zwart', 6, 1),
(20, 'Web Norfy jog denim light blue', 6, 1);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `product_images`
--

CREATE TABLE `product_images` (
  `products_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `product_images`
--

INSERT INTO `product_images` (`products_id`, `images_id`) VALUES
(11, 16),
(11, 17),
(11, 18),
(11, 19),
(12, 20),
(12, 21),
(12, 22),
(12, 23),
(13, 24),
(13, 25),
(13, 26),
(13, 27),
(14, 28),
(14, 29),
(14, 30),
(14, 31),
(15, 32),
(15, 33),
(15, 34),
(15, 35),
(16, 36),
(16, 37),
(16, 38),
(16, 39),
(17, 40),
(17, 41),
(17, 42),
(17, 43),
(18, 44),
(18, 45),
(18, 46),
(18, 47),
(19, 48),
(19, 49),
(19, 50),
(19, 51),
(20, 52),
(20, 53),
(20, 54),
(20, 55);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `kleding`
--
ALTER TABLE `kleding`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT voor een tabel `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT voor een tabel `kleding`
--
ALTER TABLE `kleding`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT voor een tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
