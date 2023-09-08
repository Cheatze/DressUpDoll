-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 09:39 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.4

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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `active`) VALUES
(3, 'Shoes', 1),
(4, 'Helmet', 1),
(5, 'Armor', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `path` varchar(140) NOT NULL,
  `alt` varchar(140) NOT NULL,
  `viewpoint` varchar(140) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `path`, `alt`, `viewpoint`, `active`) VALUES
(4, 'BronzeHelmet.png', 'A helmet made of bronze', 'front', 1),
(5, 'BronzeHelmetBack.png', 'A helmet made of bronze', 'back', 1),
(6, 'DiamondHelmet.png', 'a diamond helmet', 'front', 1),
(7, 'DiamondHelmetBack.png', 'a diamond helmet', 'back', 1),
(8, 'BronzeShoes.png', 'Shoes of bronze', 'front', 1),
(9, 'BronzeShoesBack.png', 'Shoes of bronze', 'back', 1),
(10, 'DiamondShoes.png', 'Shoes of diamond', 'front', 1),
(11, 'DiamondShoesBack.png', 'Shoes of diamond', 'back', 1),
(12, 'BronzeArmor.png', 'Armor of bronze', 'front', 1),
(13, 'BronzeArmorBack.png', 'Armor of bronze', 'back', 1),
(14, 'DiamondArmor.png', 'Armor made of diamonds', 'front', 1),
(15, 'DiamondArmorBack.png', 'Armor made of diamonds', 'back', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kleding`
--

CREATE TABLE `kleding` (
  `id` int(6) NOT NULL,
  `categorie` varchar(140) NOT NULL,
  `naam` varchar(140) NOT NULL,
  `plaatje` varchar(140) NOT NULL,
  `AltText` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kleding`
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(140) NOT NULL,
  `categories_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `categories_id`, `active`) VALUES
(5, 'Bronze Helmet', 4, 1),
(6, 'Diamond Helmet', 4, 1),
(7, 'Bronze Shoes', 3, 1),
(8, 'Diamond shoes', 3, 1),
(9, 'Bronze Armor', 5, 1),
(10, 'Diamond armor', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `products_id` int(11) NOT NULL,
  `images_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`products_id`, `images_id`) VALUES
(5, 4),
(5, 5),
(6, 6),
(6, 7),
(7, 8),
(7, 9),
(8, 10),
(8, 11),
(9, 12),
(9, 13),
(10, 14),
(10, 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kleding`
--
ALTER TABLE `kleding`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `kleding`
--
ALTER TABLE `kleding`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
