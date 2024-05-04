-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 04 2024 г., 14:26
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `web7-bd`
--

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int UNSIGNED NOT NULL,
  `catalog_id` int NOT NULL,
  `date` date NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `login` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `catalog_id`, `date`, `address`, `login`) VALUES
(33, 4, '2024-05-04', 'Чита', 'ilyavtln'),
(36, 3, '2024-05-04', 'ааыа', 'ilyavtln'),
(38, 5, '2024-05-04', 'Чита', 'ilyavtln');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `price` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `catalog`
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
-- Структура таблицы `promo`
--

CREATE TABLE `promo` (
  `id` int UNSIGNED NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `promo`
--

INSERT INTO `promo` (`id`, `title`, `description`, `date`, `image`) VALUES
(1, 'Акция Snickers: «Сникерсни, и ты снова – супер-ты»', 'Участвуйте в акции от Snickers. Купите шоколадные батончики Snickers с информацией об акции, регистрируйте коды и участвуйте в розыгрыше призов!', '2024-05-23', '../shared/images/sn1.png\"'),
(2, 'Акция Доширак: «Поймай двойную удачу!»', 'Наслаждайся вкусом любимой лапши и выигрывай ценные призы! Купи любой продукт, участвующий в акции: Доширак в лотке, Доширак пюре или Доширак Квисти, регистрируй промо-коды, получай гарантированные подарки и шанс выиграть один из ценных призов!', '2024-08-31', '../shared/images/d.png\"');

-- --------------------------------------------------------

--
-- Структура таблицы `promocodes`
--

CREATE TABLE `promocodes` (
  `id` int UNSIGNED NOT NULL,
  `type` text NOT NULL,
  `price` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `promocodes`
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
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(50) NOT NULL,
  `points` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `login`, `password`, `points`) VALUES
(1, 'Админ', 'Админ', 'admin', 'fdc0ae4052bc28b93aeefec22450665d', 1000),
(6, 'Елья', 'Ватлин', 'ilyavtln', 'c8d927166b53b8d0356293eec7a81600', 15000),
(7, 'маша', 'гудкова', 'gudok', '2e77c4c5676f726e9c04a427a293601c', 1000);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `promocodes`
--
ALTER TABLE `promocodes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `promo`
--
ALTER TABLE `promo`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `promocodes`
--
ALTER TABLE `promocodes`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
