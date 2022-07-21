-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Ápr 23. 09:56
-- Kiszolgáló verziója: 10.4.22-MariaDB
-- PHP verzió: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Adatbázis: `nagyadamworks`
--
CREATE DATABASE IF NOT EXISTS `nagyadamworks` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `nagyadamworks`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `characters`
--

DROP TABLE IF EXISTS `characters`;
CREATE TABLE IF NOT EXISTS `characters` (
  `character_id` int(11) NOT NULL AUTO_INCREMENT,
  `character_name` varchar(12) NOT NULL DEFAULT '',
  PRIMARY KEY (`character_id`,`character_name`)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `characters_connection`
--

DROP TABLE IF EXISTS `characters_connection`;
CREATE TABLE IF NOT EXISTS `characters_connection` (
  `character_id` int(11) NOT NULL AUTO_INCREMENT,
  `chara_page_id` int(11) NOT NULL,
  `chara_position_id` int(11) NOT NULL,
  PRIMARY KEY (`character_id`,`chara_page_id`,`chara_position_id`),
  KEY `chara_position_id` (`chara_position_id`),
  KEY `chara_page_id` (`chara_page_id`)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `characters_page`
--

DROP TABLE IF EXISTS `characters_page`;
CREATE TABLE IF NOT EXISTS `characters_page` (
  `chara_page_id` int(11) NOT NULL AUTO_INCREMENT,
  `chara_name` varchar(12) NOT NULL DEFAULT '',
  `chara_level` int(60) NOT NULL,
  `chara_exp_point` int(255) NOT NULL,
  `chara_strength` int(99) NOT NULL,
  `chara_dexterity` int(99) NOT NULL,
  `chara_intelligence` int(99) NOT NULL,
  `chara_vitality` int(99) NOT NULL,
  PRIMARY KEY (`chara_page_id`)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `characters_posit`
--

DROP TABLE IF EXISTS `characters_posit`;
CREATE TABLE IF NOT EXISTS `characters_posit` (
  `chara_position_id` int(11) NOT NULL AUTO_INCREMENT,
  `chara_zone` varchar(12) NOT NULL,
  `chara_x_coordin` int(99) NOT NULL,
  `chara_y_coordin` int(99) NOT NULL,
  PRIMARY KEY (`chara_position_id`)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `connection`
--

DROP TABLE IF EXISTS `connection`;
CREATE TABLE IF NOT EXISTS `connection` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `character_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`character_id`),
  KEY `character_id` (`character_id`)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `game_message`
--

DROP TABLE IF EXISTS `game_message`;
CREATE TABLE IF NOT EXISTS `game_message` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `messages` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `messages` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID`)
);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(12) NOT NULL DEFAULT '',
  `full_name` varchar(30) NOT NULL DEFAULT '',
  `email` varchar(30) NOT NULL DEFAULT '',
  `password` varchar(250) NOT NULL DEFAULT '',
  `entry_time` date DEFAULT NULL,
  `levels` int(10) UNSIGNED ZEROFILL NOT NULL DEFAULT 0000000000,
  PRIMARY KEY (`user_id`,`user_name`)
);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `characters_connection`
--
ALTER TABLE `characters_connection`
  ADD CONSTRAINT `characters_connection_ibfk_1` FOREIGN KEY (`character_id`) REFERENCES `characters` (`character_id`),
  ADD CONSTRAINT `characters_connection_ibfk_2` FOREIGN KEY (`chara_position_id`) REFERENCES `characters_posit` (`chara_position_id`),
  ADD CONSTRAINT `characters_connection_ibfk_3` FOREIGN KEY (`chara_page_id`) REFERENCES `characters_page` (`chara_page_id`);

--
-- Megkötések a táblához `connection`
--
ALTER TABLE `connection`
  ADD CONSTRAINT `connection_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `connection_ibfk_2` FOREIGN KEY (`character_id`) REFERENCES `characters` (`character_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
