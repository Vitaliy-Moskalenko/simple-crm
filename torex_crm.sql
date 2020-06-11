-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 10 2020 г., 14:38
-- Версия сервера: 5.7.23
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `torex_crm`
--

-- --------------------------------------------------------

--
-- Структура таблицы `customers`
--

DROP TABLE IF EXISTS `customers`;
CREATE TABLE IF NOT EXISTS `customers` (
  `c_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `c_name` varchar(256) NOT NULL,
  `c_email` varchar(256) NOT NULL,
  `c_phone` varchar(256) DEFAULT NULL,
  `c_address` varchar(256) DEFAULT NULL,
  `c_company` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`c_id`),
  UNIQUE KEY `c_email` (`c_email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customers`
--

INSERT INTO `customers` (`c_id`, `c_name`, `c_email`, `c_phone`, `c_address`, `c_company`) VALUES
(1, 'Ð’Ð°ÑÑ Ð˜Ð²Ð°Ð½Ð¾Ð²Ð¸Ñ‡ Ð˜Ð²Ð°Ð½Ð¾Ð²', 'test@test.ru', '+7 5555 55555', 'Ð”ÐµÑ€ÐµÐ²Ð½Ñ Ð´ÐµÐ´ÑƒÑˆÐºÐ¸', 'Microsoft'),
(2, 'ÐŸÐµÑ‚Ñ€ ÐŸÐµÑ‚Ñ€Ð¾Ð²Ð¸Ñ‡ ÐŸÐµÑ‚Ñ€Ð¾Ð²', 'test@test2.ru', '+7 656-566', 'ÐœÐ¾ÑÐºÐ²Ð°', 'ÐŸÐ»Ð¾Ñ…Ð°Ñ');

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

DROP TABLE IF EXISTS `orders`;
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
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`o_id`, `o_customerid`, `o_productid`, `o_quantity`, `o_total_price`, `o_date`, `o_status`, `o_note`) VALUES
(3, 2, 2, 10, '299.90', '2020-06-08', 'Ñ‚ÐµÑÑ‚', 'Ñ‚ÐµÑÑ‚'),
(2, 1, 2, 3, '89.97', '2020-06-08', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

DROP TABLE IF EXISTS `products`;
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`p_id`, `p_nomenclature`, `p_name`, `p_price`, `p_description`, `p_quantity`, `p_image_link`, `p_store`) VALUES
(1, '444', 'Ð¢Ð¾Ð²Ð°Ñ€ 1', '5.00', 'Ð¢ÐµÑÑ‚Ð¾Ð²Ð¾Ðµ Ð¾Ð¿Ð¸ÑÐ°Ð½Ð¸Ðµ', 3, NULL, 1),
(2, '59598', 'ÐÐ¾Ð²Ñ‹Ð¹ Ñ‚Ð¾Ð²Ð°Ñ€', '29.99', '', 50, NULL, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
