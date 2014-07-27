-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2014 at 10:46 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `restau`
--
CREATE DATABASE IF NOT EXISTS `restau` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `restau`;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE IF NOT EXISTS `commande` (
  `id_cmd` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `cmd_status` int(1) NOT NULL COMMENT '1:created',
  PRIMARY KEY (`id_cmd`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `commande`
--

INSERT INTO `commande` (`id_cmd`, `date`, `cmd_status`) VALUES
(1, '2014-07-24 10:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `commande_items`
--

CREATE TABLE IF NOT EXISTS `commande_items` (
  `id_cmd` int(11) NOT NULL,
  `idPlat` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id_cmd`,`idPlat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande_items`
--

INSERT INTO `commande_items` (`id_cmd`, `idPlat`, `quantity`) VALUES
(1, 1, 1),
(1, 2, 3);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `nomMenu`, `idRestaurateur`, `idRestaurant`) VALUES
(1, 'Sushi Plus delivry', 44, 3);

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
  `fr_description` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `en_description` text NOT NULL,
  `specialite` varchar(150) NOT NULL,
  `idrestaurateur` int(11) NOT NULL,
  `adresse` text NOT NULL,
  `telephone` int(10) NOT NULL,
  PRIMARY KEY (`idrestaurant`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`idrestaurant`, `nom`, `fr_description`, `en_description`, `specialite`, `idrestaurateur`, `adresse`, `telephone`) VALUES
(1, 'Restau Italien', 'Specialite italiennes', 'Italian spiciality, for all the familly', 'Pates', 44, '29 A rue blulard', 0),
(2, 'Schartz', 'Meilleur viand fummer dans la ville', 'Smoked meat sandwich !', 'Viande fumee', 44, 'St Laurant', 0),
(3, 'Odaki', 'Sushi sushi sushi !', 'suchi Top op', '', 44, 'Atwater street', 0),
(4, 'bimbino', 'erqwret', 'yqeryetetrrrrrrrrrrrrr', 'tttttttt', 44, 'yteertyerty', 12457896);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `email`, `id`, `rang`, `telephone`, `adresse`, `datenaissance`) VALUES
('Alexis', 'Vuillaume', '4df3c3f68fcc83b27e9d42c90431a72499f17875c81a599b566c9889b9696703', 'pop3@pop.com', 26, 3, 0, '', '0000-00-00'),
('Anass', 'Maai', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'entrepreneur@myresto.ca', 32, 3, 2147483647, 'papineau , montreal', '1982-08-05'),
('wwww', 'wwww', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'delivery@myresto.ca', 33, 1, 121112, 'wqwqwqee', '2014-07-09'),
('Rhon', 'B', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'restorateur@myresto.ca', 44, 2, 514483647, '1212 rodway N', '2014-07-02'),
('reda', 'falconi', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'falconi@myresto.ca', 46, 2, 212, '12 12e av', '0000-00-00'),
('dery', 'jacque', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'clt2@myresto.ca', 51, 0, 2147483647, '1000 av cres montreal Nord', '2014-07-09'),
('jo', 'wabaki', '9f86d081884c7d659a2feaa0c55ad015a3bf4f1b2b0b822cd15d6c15b0f00a08', 'clt@myresto.ca', 52, 0, 2147483647, '1001 av cres montreal Nord', '1982-07-03');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
