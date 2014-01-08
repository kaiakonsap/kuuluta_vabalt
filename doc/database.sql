-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Loomise aeg: Okt 31, 2013 kell 11:50 EL
-- Serveri versioon: 5.6.11
-- PHP versioon: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Andmebaas: `kuuluta`
--
CREATE DATABASE IF NOT EXISTS `kuuluta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `kuuluta`;

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `ad`
--

DROP TABLE IF EXISTS `ad`;
CREATE TABLE IF NOT EXISTS `ad` (
  `ad_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ad_title` varchar(50) NOT NULL,
  `ad_text` text NOT NULL,
  `ad_mail` varchar(50) DEFAULT NULL,
  `ad_phone` int(10) unsigned NOT NULL,
  `ad_category` int(10) unsigned NOT NULL,
  `ad_publisher_name` varchar(255) NOT NULL,
  `ad_price` int(10) unsigned NOT NULL,
  `ad_location` varchar(255) NOT NULL,
  `ad_image` varchar(255) DEFAULT NULL,
  `ad_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ad_id`),
  KEY `ad_category` (`ad_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=23 ;

--
-- Andmete tõmmistamine tabelile `ad`
--

INSERT INTO `ad` (`ad_id`, `ad_title`, `ad_text`, `ad_mail`, `ad_phone`, `ad_category`, `ad_publisher_name`, `ad_price`, `ad_location`, `ad_image`, `ad_time`, `deleted`) VALUES
(3, 'lololo', 'majake', 'mail@mail', 346, 1, 'nimi', 588, 'tartu', 'MAJA.blend', '2013-10-17 13:22:38', 0),
(21, 'title', 'gjhfjftfy', '', 4444, 5, 'Kia', 444, 'koht', NULL, '2013-10-29 09:11:15', 0),
(22, 'asdfasdf', 'asdff', 'asdf', 0, 3, 'asdf', 0, 'asdfa', NULL, '2013-10-31 09:59:55', 0);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `category_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(50) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Andmete tõmmistamine tabelile `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Sõidukid'),
(2, 'Kinnisvara'),
(3, 'Kodu'),
(4, 'Elektroonika'),
(5, 'Arvutid'),
(6, 'Telefonid'),
(7, 'Ehitus'),
(8, 'Sport'),
(9, 'Tutvus');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Andmete tõmmistamine tabelile `event`
--

INSERT INTO `event` (`event_id`, `name`) VALUES
(1, 'Lisas'),
(2, 'Muutis'),
(3, 'Kustutas');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `help`
--

CREATE TABLE IF NOT EXISTS `help` (
  `help_id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `help_q` varchar(100) CHARACTER SET latin1 NOT NULL,
  `help_a` varchar(255) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`help_id`),
  KEY `help_q` (`help_q`),
  KEY `help_q_2` (`help_q`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Andmete tõmmistamine tabelile `help`
--

INSERT INTO `help` (`help_id`, `help_q`, `help_a`) VALUES
(1, 'Esimene küsimus?', 'Esimese küsimuse vastus!'),
(2, 'Teine küsimus?', 'Teise küsimuse vastus!'),
(3, 'Kolmas küsimus?', 'Kolmanda küsimuse vastus!'),
(4, 'Neljas küsimus?', 'Neljanda küsimuse vastus!'),
(5, 'Viies küsimus?', 'Viienda küsimuse vastus!');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `help_new`
--

CREATE TABLE IF NOT EXISTS `help_new` (
  `help_new_id` int(11) NOT NULL AUTO_INCREMENT,
  `help_new_q` varchar(300) NOT NULL,
  PRIMARY KEY (`help_new_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='ajutine tabel?' AUTO_INCREMENT=5 ;

--
-- Andmete tõmmistamine tabelile `help_new`
--

INSERT INTO `help_new` (`help_new_id`, `help_new_q`) VALUES
(1, 'We know that Vol''jin is the new Warchief of the horde, but do we know who the new racial leader is going to be for the Orcs?'),
(2, 'Wouldn''t it just be simpler to close or destroy the Dark Portal? '),
(3, 'Do you think we will ever see further exploration of the elementals and their lords? '),
(4, 'Wouldn''t it just be simpler to close or destroy the Dark Portal? ');

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `ad_id` int(10) unsigned NOT NULL,
  `event_id` int(10) unsigned NOT NULL,
  KEY `event_id` (`event_id`),
  KEY `ad_id` (`ad_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `pricelist`
--

DROP TABLE IF EXISTS `pricelist`;
CREATE TABLE IF NOT EXISTS `pricelist` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `description` varchar(250) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Andmete tõmmistamine tabelile `pricelist`
--

INSERT INTO `pricelist` (`id`, `description`, `price`) VALUES
(1, 'Ilma pildita kuulutus', 600),
(2, 'Pildiga kuulutus', 800),
(3, 'Pildiga kuulutus esilehel', 1200),
(4, 'Kuulutuse esiletõstmine', 50);

-- --------------------------------------------------------

--
-- Tabeli struktuur tabelile `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `deleted` tinyint(3) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Andmete tõmmistamine tabelile `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `deleted`) VALUES
(1, 'demo', 'demo', 0);

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`ad_category`) REFERENCES `category` (`category_id`);

--
-- Piirangud tabelile `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `log_ibfk_1` FOREIGN KEY (`ad_id`) REFERENCES `ad` (`ad_id`),
  ADD CONSTRAINT `log_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`);
