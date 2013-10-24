-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Loomise aeg: Okt 24, 2013 kell 10:03 AM
-- Serveri versioon: 5.5.32
-- PHP versioon: 5.4.19

SET FOREIGN_KEY_CHECKS=0;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Andmebaas: `kuuluta`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Andmete tõmmistamine tabelile `ad`
--

INSERT INTO `ad` (`ad_id`, `ad_title`, `ad_text`, `ad_mail`, `ad_phone`, `ad_category`, `ad_publisher_name`, `ad_price`, `ad_location`, `ad_image`, `ad_time`, `deleted`) VALUES
(3, 'lololo', 'majake', 'mail@mail', 346, 1, 'nimi', 588, 'tartu', 'MAJA.blend', '2013-10-17 13:22:38', 0),
(4, 'tyktrtyk', '455', '57rl47tf', 56866, 6, 'xdktg', 75745, 'kturk', '/kuuluta_vabalt/assets/images/untitled.jpg', '2013-10-17 13:26:40', 0),
(5, 'cfd', 'rrrf', 'trtf', 0, 3, 'ttyg', 0, 'cf', '/kuuluta_vabalt/assets/images/untitled.jpg', '2013-10-17 13:50:06', 0);

--
-- Tõmmistatud tabelite piirangud
--

--
-- Piirangud tabelile `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`ad_category`) REFERENCES `category` (`category_id`);
SET FOREIGN_KEY_CHECKS=1;
