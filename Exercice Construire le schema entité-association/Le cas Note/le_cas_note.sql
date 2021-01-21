-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2021 at 09:19 AM
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
-- Database: `le cas note`
--

-- --------------------------------------------------------

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
CREATE TABLE IF NOT EXISTS `classe` (
  `class_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `num_salle` decimal(2,0) NOT NULL,
  PRIMARY KEY (`class_name`),
  UNIQUE KEY `num_salle` (`num_salle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `note` decimal(2,2) NOT NULL,
  `class_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nom`,`prenom`),
  KEY `note` (`note`),
  KEY `class_name` (`class_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `note`
--

DROP TABLE IF EXISTS `note`;
CREATE TABLE IF NOT EXISTS `note` (
  `note` decimal(2,2) NOT NULL,
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`note`),
  KEY `nom` (`nom`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `possede`
--

DROP TABLE IF EXISTS `possede`;
CREATE TABLE IF NOT EXISTS `possede` (
  `subject_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `class_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `nbr_heure` decimal(2,0) NOT NULL,
  PRIMARY KEY (`subject_name`,`class_name`),
  KEY `class_name` (`class_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prof`
--

DROP TABLE IF EXISTS `prof`;
CREATE TABLE IF NOT EXISTS `prof` (
  `nom` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `subject_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`nom`),
  KEY `subject_name` (`subject_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salle`
--

DROP TABLE IF EXISTS `salle`;
CREATE TABLE IF NOT EXISTS `salle` (
  `num_salle` decimal(2,0) NOT NULL,
  PRIMARY KEY (`num_salle`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

DROP TABLE IF EXISTS `subject`;
CREATE TABLE IF NOT EXISTS `subject` (
  `subject_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`subject_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
