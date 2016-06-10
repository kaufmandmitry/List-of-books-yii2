-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Июн 10 2016 г., 15:09
-- Версия сервера: 5.5.49-0ubuntu0.14.04.1
-- Версия PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `library`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Authors`
--

CREATE TABLE IF NOT EXISTS `Authors` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `AuthName` (`Name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Дамп данных таблицы `Authors`
--

INSERT INTO `Authors` (`Id`, `Name`) VALUES
(24, 'Александр Дюма'),
(26, 'Беляев'),
(33, 'Даниель Дефо'),
(23, 'Жюль Верн'),
(28, 'Зорич'),
(34, 'Иванов'),
(31, 'Коши'),
(29, 'Кудрявцев'),
(35, 'Петров'),
(25, 'Пушкин'),
(36, 'Сидоров'),
(30, 'Фихтенгольц');

-- --------------------------------------------------------

--
-- Структура таблицы `Books`
--

CREATE TABLE IF NOT EXISTS `Books` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) NOT NULL,
  `Description` text,
  PRIMARY KEY (`Id`),
  UNIQUE KEY `Title` (`Title`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=70 ;

--
-- Дамп данных таблицы `Books`
--

INSERT INTO `Books` (`Id`, `Title`, `Description`) VALUES
(41, '20 000 лье под водой', 'Невероятные приключения на подводной лодке'),
(42, 'Путешествие к центру земли', 'Путешествие в подземный мир'),
(43, 'Вокруг света за 80 дней', ''),
(44, 'Таинственный остров', ''),
(45, '5 недель на воздушном шаре', ''),
(46, 'Дети капитана Гранта', ''),
(47, 'Три мушкетера', ''),
(48, 'Граф Монте-Кристо', ''),
(49, 'Двадцать лет спустя', ''),
(50, 'Евгений Онегин', ''),
(51, 'Капитанская дочка', ''),
(52, 'Пиковая дама', ''),
(53, 'Дубровский', ''),
(54, 'Медный всадник', ''),
(55, 'Руслан и Людмила', ''),
(56, 'Сказка о царе Салтане', ''),
(57, 'Сказка о рыбаке и золотой рыбке', ''),
(58, 'Человек-амфибия', ''),
(59, 'Голова профессора Доуэля', ''),
(60, 'Продавец воздуха', ''),
(64, 'Математический анализ', ''),
(65, 'Дифферинциальные уравнения', ''),
(67, 'Матан', ''),
(68, 'Робинзон Крузо', ''),
(69, 'Ботанический атлас', '');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1464894565),
('m160602_182823_CreateAuthorsTable', 1464898275),
('m160602_182840_CreateBooksTable', 1464898275),
('m160602_182853_CreateListTable', 1464898276),
('m160603_105840_AddDescriptionInBooks', 1464951789),
('m160606_150458_DropAndRenameInAuthors', 1465225905),
('m160606_193447_RelationList', 1465241829);

-- --------------------------------------------------------

--
-- Структура таблицы `RelationList`
--

CREATE TABLE IF NOT EXISTS `RelationList` (
  `IdRow` int(11) NOT NULL AUTO_INCREMENT,
  `IdBook` int(11) DEFAULT NULL,
  `IdAuthor` int(11) DEFAULT NULL,
  PRIMARY KEY (`IdRow`),
  KEY `IdBook` (`IdBook`),
  KEY `IdAuthor` (`IdAuthor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=82 ;

--
-- Дамп данных таблицы `RelationList`
--

INSERT INTO `RelationList` (`IdRow`, `IdBook`, `IdAuthor`) VALUES
(47, 41, 23),
(48, 42, 23),
(49, 43, 23),
(50, 44, 23),
(51, 45, 23),
(52, 46, 23),
(53, 47, 24),
(54, 48, 24),
(55, 49, 24),
(56, 50, 25),
(57, 51, 25),
(58, 52, 25),
(59, 53, 25),
(60, 54, 25),
(61, 55, 25),
(62, 56, 25),
(63, 57, 25),
(64, 58, 26),
(65, 59, 26),
(66, 60, 26),
(70, 64, 28),
(71, 64, 29),
(72, 64, 30),
(73, 65, 31),
(75, 64, 30),
(77, 67, 30),
(78, 68, 33),
(79, 69, 34),
(80, 69, 35),
(81, 69, 36);

-- --------------------------------------------------------

--
-- Структура таблицы `temp`
--

CREATE TABLE IF NOT EXISTS `temp` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Author` varchar(255) NOT NULL,
  `Book` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `RelationList`
--
ALTER TABLE `RelationList`
  ADD CONSTRAINT `IdAuthor` FOREIGN KEY (`IdAuthor`) REFERENCES `Authors` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `IdBook` FOREIGN KEY (`IdBook`) REFERENCES `Books` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
