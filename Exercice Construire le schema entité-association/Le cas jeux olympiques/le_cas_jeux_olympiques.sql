-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 21, 2021 at 09:30 AM
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
-- Database: `le cas jeux olympiques`
--

-- --------------------------------------------------------

--
-- Table structure for table `admis`
--

DROP TABLE IF EXISTS `admis`;
CREATE TABLE IF NOT EXISTS `admis` (
  `conc_id` decimal(6,0) NOT NULL,
  `dossart_num` decimal(6,0) NOT NULL,
  PRIMARY KEY (`conc_id`,`dossart_num`),
  KEY `dossart_num` (`dossart_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

DROP TABLE IF EXISTS `admission`;
CREATE TABLE IF NOT EXISTS `admission` (
  `dossart_num` decimal(6,0) NOT NULL,
  PRIMARY KEY (`dossart_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classement`
--

DROP TABLE IF EXISTS `classement`;
CREATE TABLE IF NOT EXISTS `classement` (
  `epreuv_result` decimal(5,2) NOT NULL,
  PRIMARY KEY (`epreuv_result`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `conccurent`
--

DROP TABLE IF EXISTS `conccurent`;
CREATE TABLE IF NOT EXISTS `conccurent` (
  `conc_id` decimal(6,0) NOT NULL,
  `epreuv_result` decimal(5,2) NOT NULL,
  `pays_tag` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `numéro_secu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`conc_id`),
  UNIQUE KEY `numéro_secu` (`numéro_secu`),
  KEY `epreuv_result` (`epreuv_result`),
  KEY `pays_tag` (`pays_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `concour`
--

DROP TABLE IF EXISTS `concour`;
CREATE TABLE IF NOT EXISTS `concour` (
  `epreuv_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dossart_num` decimal(6,0) NOT NULL,
  PRIMARY KEY (`epreuv_type`,`dossart_num`),
  KEY `dossart_num` (`dossart_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `depend`
--

DROP TABLE IF EXISTS `depend`;
CREATE TABLE IF NOT EXISTS `depend` (
  `resp_num` decimal(6,0) NOT NULL,
  `mat_num` decimal(6,0) NOT NULL,
  PRIMARY KEY (`resp_num`,`mat_num`),
  KEY `mat_num` (`mat_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disci`
--

DROP TABLE IF EXISTS `disci`;
CREATE TABLE IF NOT EXISTS `disci` (
  `type_disci` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `resp_num` decimal(6,0) NOT NULL,
  PRIMARY KEY (`type_disci`),
  KEY `resp_num` (`resp_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `epreuve`
--

DROP TABLE IF EXISTS `epreuve`;
CREATE TABLE IF NOT EXISTS `epreuve` (
  `epreuv_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nbr_manche` decimal(2,0) NOT NULL,
  `eve_date` date NOT NULL,
  `sta_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `type_disci` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`epreuv_type`),
  KEY `eve_date` (`eve_date`),
  KEY `sta_name` (`sta_name`),
  KEY `type_disci` (`type_disci`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gagne`
--

DROP TABLE IF EXISTS `gagne`;
CREATE TABLE IF NOT EXISTS `gagne` (
  `conc_id` decimal(6,0) NOT NULL,
  `medal_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`conc_id`,`medal_type`),
  KEY `medal_type` (`medal_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

DROP TABLE IF EXISTS `job`;
CREATE TABLE IF NOT EXISTS `job` (
  `mat_num` decimal(6,0) NOT NULL,
  `role` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numéro_secu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`mat_num`),
  UNIQUE KEY `numéro_secu` (`numéro_secu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jour_epreuve`
--

DROP TABLE IF EXISTS `jour_epreuve`;
CREATE TABLE IF NOT EXISTS `jour_epreuve` (
  `eve_date` date NOT NULL,
  PRIMARY KEY (`eve_date`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `manche`
--

DROP TABLE IF EXISTS `manche`;
CREATE TABLE IF NOT EXISTS `manche` (
  `num_manche` decimal(6,0) NOT NULL,
  `epreuv_result` decimal(5,2) NOT NULL,
  `epreuv_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num_manche`),
  KEY `epreuv_result` (`epreuv_result`),
  KEY `epreuv_type` (`epreuv_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `medal`
--

DROP TABLE IF EXISTS `medal`;
CREATE TABLE IF NOT EXISTS `medal` (
  `medal_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`medal_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `participe`
--

DROP TABLE IF EXISTS `participe`;
CREATE TABLE IF NOT EXISTS `participe` (
  `type_disci` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mat_num` decimal(6,0) NOT NULL,
  PRIMARY KEY (`type_disci`,`mat_num`),
  KEY `mat_num` (`mat_num`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pays`
--

DROP TABLE IF EXISTS `pays`;
CREATE TABLE IF NOT EXISTS `pays` (
  `pays_tag` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`pays_tag`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resp_disci`
--

DROP TABLE IF EXISTS `resp_disci`;
CREATE TABLE IF NOT EXISTS `resp_disci` (
  `resp_num` decimal(6,0) NOT NULL,
  `num_id` decimal(6,0) NOT NULL,
  `numéro_secu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`resp_num`),
  UNIQUE KEY `numéro_secu` (`numéro_secu`),
  KEY `num_id` (`num_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resp_gene`
--

DROP TABLE IF EXISTS `resp_gene`;
CREATE TABLE IF NOT EXISTS `resp_gene` (
  `num_id` decimal(6,0) NOT NULL,
  `numéro_secu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`num_id`),
  UNIQUE KEY `numéro_secu` (`numéro_secu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE IF NOT EXISTS `role` (
  `numéro_secu` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `nom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `prenom` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `sexe` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `naissance` date NOT NULL,
  `adress` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`numéro_secu`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `station`
--

DROP TABLE IF EXISTS `station`;
CREATE TABLE IF NOT EXISTS `station` (
  `sta_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `altitude` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`sta_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
