-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2014 at 05:37 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restau`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `idMenu` int(11) NOT NULL AUTO_INCREMENT,
  `nomMenu` text NOT NULL,
  `idRestaurateur` int(11) NOT NULL,
  `idRestaurant` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`),
  KEY `idMenu` (`idMenu`),
  KEY `idRestaurateur` (`idRestaurateur`),
  KEY `idMenu_2` (`idMenu`),
  FULLTEXT KEY `nomMenu` (`nomMenu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `menu_plat`
--

CREATE TABLE IF NOT EXISTS `menu_plat` (
  `idMenu` int(11) NOT NULL,
  `idPlat` int(11) NOT NULL,
  PRIMARY KEY (`idMenu`,`idPlat`),
  KEY `idMenu` (`idMenu`),
  KEY `idMenu_2` (`idMenu`,`idPlat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plattab`
--

CREATE TABLE IF NOT EXISTS `plattab` (
  `idPlat` int(11) NOT NULL AUTO_INCREMENT,
  `nomPlat` text NOT NULL,
  `descriptionPlat` text NOT NULL,
  `prixPlat` int(11) NOT NULL,
  PRIMARY KEY (`idPlat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE IF NOT EXISTS `restaurant` (
  `idrestaurant` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `specialite` varchar(150) NOT NULL,
  `idproprietaire` int(11) NOT NULL,
  `idrestaurateur` int(11) NOT NULL,
  `adresse` text NOT NULL,
  PRIMARY KEY (`idrestaurant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`idrestaurant`, `nom`, `description`, `specialite`, `idproprietaire`, `idrestaurateur`, `adresse`) VALUES
(1, 'Restau Italien', 'Specialite italiennes', 'Pates', 2, 1, '29 A rue blulard'),
(2, 'Schartz', 'Smoked meat sandwich !', 'Viande fumee', 1, 1, 'St Laurant'),
(3, 'Odaki', 'Sushi sushi sushi !', '', 3, 2, 'Atwater street');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `mdp` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rang` int(11) NOT NULL DEFAULT '0',
  `telephone` int(11) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `datenaissance` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `email`, `id`, `rang`, `telephone`, `adresse`, `datenaissance`) VALUES
('hello', 'dodi', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'clt@myresto.ca', 0, 0, 51411111, 'test', '0000-00-00'),
('Alexis', 'Vuillaume', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'pop3@pop.com', 26, 3, 0, '', '0000-00-00'),
('Anass', 'Maai', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'anass@etsmtl.ca', 32, 3, 2147483647, 'papineau , montreal', '1982-08-05'),
('wwww', 'wwww', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'delivery@myresto.ca', 33, 1, 121112, 'wqwqwqee', '2014-07-09'),
('Rhon', 'B', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'restorateur@myresto.ca', 44, 0, 514, '1212 rodway', '0000-00-00'),
('reda', 'falconi', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'falconi@myresto.ca', 46, 0, 212, '12 12e av', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
