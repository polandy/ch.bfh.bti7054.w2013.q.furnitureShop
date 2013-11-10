-- phpMyAdmin SQL Dump
-- version 3.5.8.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 10. Nov 2013 um 15:59
-- Server Version: 5.5.34-0ubuntu0.13.04.1
-- PHP-Version: 5.4.9-4ubuntu2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `db_furnitureshop`
--
CREATE DATABASE `db_furnitureshop` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_furnitureshop`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `name_de` varchar(40) NOT NULL,
  `name_en` varchar(40) NOT NULL,
  `isOpen` tinyint(1) NOT NULL,
  `orderDate` datetime DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK6DD211EC2895620` (`roleId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `feature`
--

CREATE TABLE IF NOT EXISTS `feature` (
  `id` int(11) NOT NULL,
  `name_de` varchar(40) NOT NULL,
  `name_en` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `furniture`
--

CREATE TABLE IF NOT EXISTS `furniture` (
  `id` int(11) NOT NULL,
  `basicPrice` int(11) NOT NULL,
  `description_de` longtext,
  `description_en` longtext,
  `name_de` varchar(40) NOT NULL,
  `name_en` varchar(40) NOT NULL,
  `categoryId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK54D977D2F7229FDB` (`categoryId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `furniturefeature`
--

CREATE TABLE IF NOT EXISTS `furniturefeature` (
  `id` int(11) NOT NULL,
  `extraPrice` int(11) NOT NULL,
  `value_de` varchar(256) NOT NULL,
  `value_en` varchar(256) NOT NULL,
  `featureId` int(11) DEFAULT NULL,
  `furnitureId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK40748AC4328C30BB` (`furnitureId`),
  KEY `FK40748AC4CCAA4C3` (`featureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_furniture`
--

CREATE TABLE IF NOT EXISTS `order_furniture` (
  `orderId` int(11) NOT NULL,
  `furnitureId` int(11) NOT NULL,
  KEY `FKCDB06801328C30BB` (`furnitureId`),
  KEY `FKCDB06801F447A673` (`orderId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `order_furniturefeature`
--

CREATE TABLE IF NOT EXISTS `order_furniturefeature` (
  `orderId` int(11) NOT NULL,
  `furnitureFeatureId` int(11) NOT NULL,
  KEY `FK7746D7B5F447A673` (`orderId`),
  KEY `FK7746D7B5DD9D3DC7` (`furnitureFeatureId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `role`
--

CREATE TABLE IF NOT EXISTS `role` (
  `id` int(11) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `birthday` datetime DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastLogin` datetime DEFAULT NULL,
  `lastName` varchar(50) NOT NULL,
  `male` tinyint(1) NOT NULL,
  `newsletterEnabled` tinyint(1) NOT NULL,
  `password` varchar(255) NOT NULL,
  `username` varchar(40) DEFAULT NULL,
  `roleId` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`,`username`),
  KEY `FK285FEBC287EACB` (`roleId`),
  KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `order_furniture`
--
ALTER TABLE `order_furniture`
  ADD CONSTRAINT `FKCDB06801F447A673` FOREIGN KEY (`orderId`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `FKCDB06801328C30BB` FOREIGN KEY (`furnitureId`) REFERENCES `furniture` (`id`);

--
-- Constraints der Tabelle `order_furniturefeature`
--
ALTER TABLE `order_furniturefeature`
  ADD CONSTRAINT `FK7746D7B5DD9D3DC7` FOREIGN KEY (`furnitureFeatureId`) REFERENCES `furniturefeature` (`id`),
  ADD CONSTRAINT `FK7746D7B5F447A673` FOREIGN KEY (`orderId`) REFERENCES `category` (`id`);

--
-- Constraints der Tabelle `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK285FEBC287EACB` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;