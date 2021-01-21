-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2021 at 09:26 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `le cas niche`
--

-- --------------------------------------------------------

--
-- Table structure for table `chien`
--

DROP TABLE IF EXISTS `chien`;
CREATE TABLE IF NOT EXISTS `chien` (
  `dog_id` decimal(6,0) NOT NULL,
  `dog_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `race` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `dog_date_buy` date NOT NULL,
  `dog_death` date DEFAULT NULL,
  `dog_born` date NOT NULL,
  `conc_ville` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `conc_date` date NOT NULL,
  `pro_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`dog_id`),
  KEY `conc_ville` (`conc_ville`,`conc_date`),
  KEY `pro_name` (`pro_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concours`
--

DROP TABLE IF EXISTS `concours`;
CREATE TABLE IF NOT EXISTS `concours` (
  `conc_ville` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `conc_date` date NOT NULL,
  `conc_type` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `conc_result` decimal(2,0) NOT NULL,
  PRIMARY KEY (`conc_ville`,`conc_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prop`
--

DROP TABLE IF EXISTS `prop`;
CREATE TABLE IF NOT EXISTS `prop` (
  `pro_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `pro_adress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pro_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
