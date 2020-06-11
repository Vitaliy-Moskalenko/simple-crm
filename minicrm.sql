-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Июн 11 2020 г., 11:34
-- Версия сервера: 5.6.39-83.1
-- Версия PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `egoadmin_test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_name` varchar(256) NOT NULL,
  `c_email` varchar(256) NOT NULL,
  `c_phone` varchar(256) DEFAULT NULL,
  `c_address` varchar(256) DEFAULT NULL,
  `c_company` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_email` (`c_email`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_email`, `c_phone`, `c_address`, `c_company`) VALUES
(4, 'Петр Петров', 'test@test.ru', '+7 5555 55555', 'Деревня дедушки', 'Microsoft'),
(5, 'Вася Иванов', 'test@test2.ru', '5555555', 'Москва', '');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `o_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `o_customerid` int(10) UNSIGNED NOT NULL,
  `o_productid` int(10) UNSIGNED NOT NULL,
  `o_quantity` int(10) UNSIGNED NOT NULL,
  `o_total_price` decimal(10,2) NOT NULL,
  `o_date` date NOT NULL,
  `o_status` varchar(128) DEFAULT NULL,
  `o_note` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`o_id`),
  KEY `o_customerid` (`o_customerid`),
  KEY `o_productid` (`o_productid`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`o_id`, `o_customerid`, `o_productid`, `o_quantity`, `o_total_price`, `o_date`, `o_status`, `o_note`) VALUES
(5, 4, 1, 2, '10.00', '2020-06-11', '', ''),
(6, 5, 2, 5, '149.95', '2020-06-11', 'тест', '');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `p_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `p_nomenclature` varchar(128) NOT NULL,
  `p_name` varchar(256) NOT NULL,
  `p_price` decimal(10,2) DEFAULT '0.00',
  `p_description` varchar(256) DEFAULT NULL,
  `p_quantity` int(10) UNSIGNED DEFAULT '0',
  `p_image_link` varchar(256) DEFAULT NULL,
  `p_store` int(10) UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  UNIQUE KEY `p_nomenclature` (`p_nomenclature`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`p_id`, `p_nomenclature`, `p_name`, `p_price`, `p_description`, `p_quantity`, `p_image_link`, `p_store`) VALUES
(1, '444', 'Тестовый товар 1', '5.00', 'Тестовое описание', 3, NULL, 1),
(2, '565-888', 'Тестовый товар 2', '29.99', '', 10, NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
