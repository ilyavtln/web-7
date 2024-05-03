-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: May 03, 2024 at 01:01 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web7-bd`
--

-- --------------------------------------------------------

--
-- Table structure for table `catalog`
--

CREATE TABLE `catalog` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `description`, `image`, `price`) VALUES
(1, 'МакБук про', 'классный компьютер', '../shared/images/4.png', 20000),
(3, 'Вижен про', 'Очки новой реальности', '../shared/images/3.png', 30000),
(4, 'Нинтендо', 'крутая приставка', '../shared/images/22.png', 10000),
(5, 'Эпл вотч', 'суперские часы', '../shared/images/7.png', 5000),
(6, 'АэрПодс макс', 'Для чистых битов', '../shared/images/8.png', 7000),
(7, 'Айфон 15', 'чтобы звонить', '../shared/images/6.png', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `promo`
--

CREATE TABLE `promo` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promo`
--

INSERT INTO `promo` (`id`, `title`, `description`, `date`, `image`) VALUES
(1, 'Акция Snickers: «Сникерсни, и ты снова – супер-ты»', 'Участвуйте в акции от Snickers. Купите шоколадные батончики Snickers с информацией об акции, регистрируйте коды и участвуйте в розыгрыше призов!', '2024-05-23', '../shared/images/sn1.png\"'),
(2, 'Акция Доширак: «Поймай двойную удачу!»', 'Наслаждайся вкусом любимой лапши и выигрывай ценные призы! Купи любой продукт, участвующий в акции: Доширак в лотке, Доширак пюре или Доширак Квисти, регистрируй промо-коды, получай гарантированные подарки и шанс выиграть один из ценных призов!', '2024-08-31', '../shared/images/d.png\"');

-- --------------------------------------------------------

--
-- Table structure for table `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `price` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `promocodes`
--

INSERT INTO `promocodes` (`id`, `type`, `price`) VALUES
(1, 'ea3747ds75', 1000),
(2, '1234567890', 2000),
(3, '0987654321', 3000),
(4, 'g56uy7890e', 500),
(5, 'ngmk00rr9k', 1500),
(6, 'nm7y6r3lk2', 2000),
(7, 'wq23b1n4r6', 3000);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `points` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `points`) VALUES
(1, 'Админ', 'Админ', 'admin', 'fdc0ae4052bc28b93aeefec22450665d', 1000),
(6, 'Елья', 'Ватлин', 'ilyavtln', 'c8d927166b53b8d0356293eec7a81600', 0),
(7, 'маша', 'гудкова', 'gudok', '2e77c4c5676f726e9c04a427a293601c', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `promocodes`
--
ALTER TABLE `promocodes`
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
-- AUTO_INCREMENT for table `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
