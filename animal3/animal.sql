-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Июн 06 2023 г., 08:34
-- Версия сервера: 10.4.24-MariaDB
-- Версия PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `animal`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animals`
--

CREATE TABLE `animals` (
  `id_animal` int(11) NOT NULL,
  `lenth` float DEFAULT NULL,
  `height` float DEFAULT NULL,
  `gender` int(1) DEFAULT NULL,
  `lifeStatus` int(1) DEFAULT NULL,
  `chipperId` int(11) DEFAULT NULL,
  `chippingLocationId` int(11) DEFAULT NULL,
  `chippingDateTime` datetime DEFAULT current_timestamp(),
  `deathDateTime` datetime DEFAULT NULL,
  `type_animal` int(11) DEFAULT NULL,
  `name_animal` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `animals`
--

INSERT INTO `animals` (`id_animal`, `lenth`, `height`, `gender`, `lifeStatus`, `chipperId`, `chippingLocationId`, `chippingDateTime`, `deathDateTime`, `type_animal`, `name_animal`) VALUES
(19, 180, 60, 0, 1, 1, NULL, '2023-06-06 11:09:34', NULL, 7, 'Георгий');

-- --------------------------------------------------------

--
-- Структура таблицы `location_animal`
--

CREATE TABLE `location_animal` (
  `id` int(11) NOT NULL,
  `id_animal` int(11) DEFAULT NULL,
  `visitedLocations` varchar(250) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `latitude` float DEFAULT NULL,
  `longitude` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `location_animal`
--

INSERT INTO `location_animal` (`id`, `id_animal`, `visitedLocations`, `start_date`, `end_date`, `latitude`, `longitude`) VALUES
(2, 17, NULL, '2023-06-06 10:58:37', NULL, 70, 60),
(3, 18, NULL, '2023-06-06 11:05:23', NULL, 60, 70),
(4, 19, NULL, '2023-06-06 11:09:34', NULL, 70, 70);

-- --------------------------------------------------------

--
-- Структура таблицы `types_animal`
--

CREATE TABLE `types_animal` (
  `typeId` int(11) NOT NULL,
  `typeName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `types_animal`
--

INSERT INTO `types_animal` (`typeId`, `typeName`) VALUES
(1, 'кошка'),
(2, 'собака'),
(3, 'белка'),
(4, 'медведь'),
(5, 'ёжик'),
(6, 'орел'),
(7, 'волк'),
(8, 'лиса'),
(9, 'кабан'),
(10, 'заяц'),
(11, 'попугай'),
(12, 'морская свинка'),
(20, 'шакал');

-- --------------------------------------------------------

--
-- Структура таблицы `_user`
--

CREATE TABLE `_user` (
  `ID` int(11) NOT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Surname` varchar(50) DEFAULT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Patronymic` varchar(50) DEFAULT NULL,
  `Birthday` date DEFAULT NULL,
  `About` text DEFAULT NULL,
  `User_name` varchar(50) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `_user`
--

INSERT INTO `_user` (`ID`, `Email`, `Surname`, `Name`, `Patronymic`, `Birthday`, `About`, `User_name`, `Pass`) VALUES
(1, 'st27i@list.ru', 'Николаев', 'Тимофей', 'Георгиевич', '2003-03-10', 'разработчик сайтов', 'Humble', '81dc9bdb52d04dc20036dbd8313ed055'),
(2, 'z_goldin@mail.ru', 'Гольдин', 'Георгрий', 'Михайлович', '2003-02-08', 'Программист и тьютор', 'Русский Таракаша', 'd93591bdf7860e1e4ee2fca799911215'),
(28, 'bulba@mail.ru', 'иван', 'дмытро', 'викторович', '2023-04-08', NULL, 'bulba', 'e10adc3949ba59abbe56e057f20f883e'),
(34, 'bububu@mail.tu', 'shdfghfdg', 'fghdfhgdfgh', 'fdghfdghfd', '2023-04-22', NULL, 'dfghdfgh', 'e10adc3949ba59abbe56e057f20f883e'),
(35, 'st28i@list.ru', 'shdfghfdg', 'fghdfhgdfgh', 'dfghdfghfdgh', '2023-04-03', NULL, 'fgjhfghdfgj', 'e10adc3949ba59abbe56e057f20f883e'),
(36, 'st29i@list.ru', 'shdfghfdg', 'fsghfgh', 'fdghfdghfd', '2023-04-16', NULL, 'fghfdghg', 'e10adc3949ba59abbe56e057f20f883e'),
(37, 'st30i@list.ru', 'wrtyuertu', 'ruerer', 'uertuetu', '2023-04-08', NULL, 'ertuerture', 'e10adc3949ba59abbe56e057f20f883e');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animals`
--
ALTER TABLE `animals`
  ADD PRIMARY KEY (`id_animal`),
  ADD KEY `chipperId` (`chipperId`),
  ADD KEY `type_animal` (`type_animal`);

--
-- Индексы таблицы `location_animal`
--
ALTER TABLE `location_animal`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `types_animal`
--
ALTER TABLE `types_animal`
  ADD PRIMARY KEY (`typeId`);

--
-- Индексы таблицы `_user`
--
ALTER TABLE `_user`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animals`
--
ALTER TABLE `animals`
  MODIFY `id_animal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `location_animal`
--
ALTER TABLE `location_animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `types_animal`
--
ALTER TABLE `types_animal`
  MODIFY `typeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT для таблицы `_user`
--
ALTER TABLE `_user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `animals`
--
ALTER TABLE `animals`
  ADD CONSTRAINT `animals_ibfk_1` FOREIGN KEY (`chipperId`) REFERENCES `_user` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `animals_ibfk_2` FOREIGN KEY (`type_animal`) REFERENCES `types_animal` (`typeId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
