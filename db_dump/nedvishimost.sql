-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 03 2022 г., 00:21
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
-- База данных: `nedvishimost`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comforts`
--

CREATE TABLE `comforts` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `comforts`
--

INSERT INTO `comforts` (`id`, `name`, `icon`) VALUES
(1, 'Мебель', '3685627459f78c9a6e1676d88e3c9a87.png'),
(2, 'Телевизор', '505cb1da90a0d4d5597476761dbd7e7b.png'),
(3, 'Санузел', '3f7cff5d2f58223b5bde86b5cbdd3962.png'),
(4, 'Интернет', 'c8d31250f5f15dc242ac73fec5232ad9.png'),
(5, 'Холодильник', 'ba9d1ed0476ba34bee9fa55e8eb5fcc0.png'),
(6, 'Стиральная машина', '7ce0375045fa9f9e6525e9794f3d0b4c.png');

-- --------------------------------------------------------

--
-- Структура таблицы `metro`
--

CREATE TABLE `metro` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_icon` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `metro`
--

INSERT INTO `metro` (`id`, `name`, `id_icon`) VALUES
(3, 'Нарвская', 1),
(4, 'Балтийская', 1),
(5, 'Технологический институт 1', 1),
(6, 'Технологический институт 2', 2),
(7, 'Московская', 2),
(8, 'Нет метро', 6);

-- --------------------------------------------------------

--
-- Структура таблицы `metro_icons`
--

CREATE TABLE `metro_icons` (
  `id` int NOT NULL,
  `name_vetki` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `metro_icons`
--

INSERT INTO `metro_icons` (`id`, `name_vetki`, `icon`) VALUES
(1, 'Красная', 'm1.png'),
(2, 'Синяя', 'm1.png'),
(3, 'Зелёная', 'm3.png'),
(4, 'Жёлтая', 'm4.png'),
(5, 'Фиолетовая', 'm5.png'),
(6, 'Нет метро', '');

-- --------------------------------------------------------

--
-- Структура таблицы `nedvishimost`
--

CREATE TABLE `nedvishimost` (
  `id` int NOT NULL,
  `space` double NOT NULL,
  `id_type` int NOT NULL,
  `kolichestvo_komnat` int DEFAULT NULL,
  `nomer_etash` int DEFAULT NULL,
  `vsego_etash` int NOT NULL,
  `id_metro` int DEFAULT NULL,
  `photo1` varchar(255) NOT NULL,
  `photo2` varchar(255) DEFAULT NULL,
  `photo3` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `status_proverki` set('В процессе','Проверено модерацией','Отклонено') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL DEFAULT 'В процессе',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` text NOT NULL,
  `id_user` int NOT NULL,
  `type_sdachi` set('Длительно','Посуточно') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `nedvishimost`
--

INSERT INTO `nedvishimost` (`id`, `space`, `id_type`, `kolichestvo_komnat`, `nomer_etash`, `vsego_etash`, `id_metro`, `photo1`, `photo2`, `photo3`, `price`, `tel`, `status_proverki`, `created_at`, `address`, `id_user`, `type_sdachi`) VALUES
(21, 123, 2, 4, 6, 12, 3, '1c6dfc0bfb01115e1604c81dea6e8fb2.png', '0119541dece3cee794bc4b932f16cbf4.png', '265f2efc45ea193140f25704af20d1bd.png', '123000', '+7 (123) 123 12 31', 'Проверено модерацией', '2022-06-02 20:17:52', '123123123123213', 2, 'Длительно'),
(22, 131, 3, 4, NULL, 2, 5, '5e381aef9dc1ab3a1d0e90fc28606a2c.png', '9f412d0cd30c78f6c6d08809f1624917.png', 'cc499c7b73bbbc4c56fb587b19aaf2ae.png', '1231', '+7 (123) 123 12 31', 'Проверено модерацией', '2022-06-02 20:22:36', 'sdfgsdfgsdfg', 2, 'Длительно'),
(23, 123123, 1, 1, 3, 5, 4, 'c5ced0be99ccd1f8de8120f6584a49b9.png', 'b1e06a3987c418bbb6e8bae4de69853c.png', NULL, '2344', '+7 (123) 123 12 31', 'Проверено модерацией', '2022-06-02 20:27:43', '123123213', 1, 'Длительно');

-- --------------------------------------------------------

--
-- Структура таблицы `nedvishomost_comforts`
--

CREATE TABLE `nedvishomost_comforts` (
  `id` int NOT NULL,
  `id_nedvigimost` int NOT NULL,
  `id_comforts` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `nedvishomost_comforts`
--

INSERT INTO `nedvishomost_comforts` (`id`, `id_nedvigimost`, `id_comforts`) VALUES
(33, 21, 3),
(34, 21, 4),
(35, 21, 5),
(36, 22, 2),
(37, 22, 3),
(38, 22, 4),
(39, 22, 5),
(40, 23, 1),
(41, 23, 2),
(42, 23, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `type_nedvigimost`
--

CREATE TABLE `type_nedvigimost` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `type_nedvigimost`
--

INSERT INTO `type_nedvigimost` (`id`, `name`) VALUES
(1, 'Комната'),
(2, 'Квартира'),
(3, 'Дом');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `authKey` varchar(255) DEFAULT NULL,
  `accessToken` varchar(255) DEFAULT NULL,
  `admin` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `password`, `email`, `login`, `authKey`, `accessToken`, `admin`) VALUES
(1, 'Олежка', 'олегов', '$2y$13$FM24HZuf6TaJaM1NuCOBAeYQMdVmk2OtnNH5Sx5B5EIOFAiMkincC', 'oleg@oleg.ru', 'oleg', 'jBfnOb4cnDX5p2M08UKeZ0QLZvsW8AZJPvQW1rhAn931gP1wxLPmOAFyX8acodRJFdeUGDg54sZIVWE8uNnubXNnY5CD9j0yPXpglDeXlVNgUIq8vsafNS1D679Q6lad7CIShS_b_cXWhhU1DdfRs7eAND-xNeUryauIJkv2GqMSzug7QuYh75CDJrivNIytWhqgI-lA', NULL, 0),
(2, 'админ', 'админ', '$2y$13$yz5LvziS/Uy6arZv4GU7p.U0IhwKfij0tncaf9YpBffzm8YWknbpW', 'admin@admin.com', 'admin', 'PKNUdfIBeEDEegZISZbkyodvspnu8Taoxs__TicODtLTdk-w8W6MsJ1R2e7vLZpG3wf2tA2kqhUUIqlvcNRcWeHN1mmC1ub8Qo53lptuucGURG4VkBrrHIy9m959WN6MzdxfaQ0T6Xim0svaIVk6sSwMWFp_S4QutkIXWWcTNGCWxPdjQgwkQmcRSdzGk7AH24vS2ECv', NULL, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comforts`
--
ALTER TABLE `comforts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `metro`
--
ALTER TABLE `metro`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_icon` (`id_icon`);

--
-- Индексы таблицы `metro_icons`
--
ALTER TABLE `metro_icons`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `nedvishimost`
--
ALTER TABLE `nedvishimost`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_metro` (`id_metro`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_type` (`id_type`);

--
-- Индексы таблицы `nedvishomost_comforts`
--
ALTER TABLE `nedvishomost_comforts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nedvigimost` (`id_nedvigimost`),
  ADD KEY `id_comforts` (`id_comforts`);

--
-- Индексы таблицы `type_nedvigimost`
--
ALTER TABLE `type_nedvigimost`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comforts`
--
ALTER TABLE `comforts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `metro`
--
ALTER TABLE `metro`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `metro_icons`
--
ALTER TABLE `metro_icons`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `nedvishimost`
--
ALTER TABLE `nedvishimost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `nedvishomost_comforts`
--
ALTER TABLE `nedvishomost_comforts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблицы `type_nedvigimost`
--
ALTER TABLE `type_nedvigimost`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `metro`
--
ALTER TABLE `metro`
  ADD CONSTRAINT `metro_ibfk_1` FOREIGN KEY (`id_icon`) REFERENCES `metro_icons` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `nedvishimost`
--
ALTER TABLE `nedvishimost`
  ADD CONSTRAINT `nedvishimost_ibfk_2` FOREIGN KEY (`id_metro`) REFERENCES `metro` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nedvishimost_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nedvishimost_ibfk_4` FOREIGN KEY (`id_type`) REFERENCES `type_nedvigimost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `nedvishomost_comforts`
--
ALTER TABLE `nedvishomost_comforts`
  ADD CONSTRAINT `nedvishomost_comforts_ibfk_1` FOREIGN KEY (`id_nedvigimost`) REFERENCES `nedvishimost` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nedvishomost_comforts_ibfk_2` FOREIGN KEY (`id_comforts`) REFERENCES `comforts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
