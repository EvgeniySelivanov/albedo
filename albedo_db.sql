-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 09 2022 г., 13:51
-- Версия сервера: 8.0.24
-- Версия PHP: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `albedo_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int UNSIGNED NOT NULL,
  `countryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `countryName`) VALUES
(1, 'Country1'),
(2, 'Country2'),
(3, 'Country3'),
(4, 'Country4');

-- --------------------------------------------------------

--
-- Структура таблицы `participants`
--

CREATE TABLE `participants` (
  `id` int UNSIGNED NOT NULL,
  `fname` varchar(64) NOT NULL,
  `lname` varchar(64) NOT NULL,
  `birhtday` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `country` varchar(64) NOT NULL,
  `phone` varchar(64) NOT NULL,
  `reportSubject` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `company` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `position` varchar(64) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `about` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `filename` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `participants`
--

INSERT INTO `participants` (`id`, `fname`, `lname`, `birhtday`, `country`, `phone`, `reportSubject`, `email`, `company`, `position`, `about`, `filename`) VALUES
(8, 'Peter', 'Petrov', '2022-06-01', '1', '0665769654', 'Акулы', 'peter@gmail.com', 'Peter', 'Системный администратор', 'dfafdfdsfsdfsdfsdffs\r\n                ', '165477100881_paporotnik_rastenie_listya_108470_1920x1080.jpg'),
(9, '2121', '212121', '2022-05-30', '1', '0665769654', '1212', '2121212@gfdfg.com', 'Дом2', 'geographic', '\r\n                gs', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `participants`
--
ALTER TABLE `participants`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `participants`
--
ALTER TABLE `participants`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
