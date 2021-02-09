-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 07 fév. 2021 à 16:36
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd_location`
--

-- --------------------------------------------------------

--
-- Structure de la table `table_locataire`
--

DROP TABLE IF EXISTS `table_locataire`;
CREATE TABLE IF NOT EXISTS `table_locataire` (
  `ID_Locataire` int(11) NOT NULL AUTO_INCREMENT,
  `Locataire` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `Adresse` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_Locataire`,`Locataire`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `table_locataire`
--

INSERT INTO `table_locataire` (`ID_Locataire`, `Locataire`, `Nom`, `Adresse`) VALUES
(1, 'loc', 'Will', 'Lot 2'),
(2, 'loc', 'Jane', 'Lot 456'),
(3, 'loc', 'Yui', 'Chi12'),
(4, 'loc', 'Tom', 'Bis 9'),
(5, 'loc', 'Ali', 'Street 5'),
(8, 'loc', 'Bob', 'Avenue 18'),
(9, 'loc', 'Elen', '74 Avenue'),
(10, 'loc', 'fbffbn', 'rrrbrbr'),
(12, 'client', 'Tamo', 'C16'),
(13, 'client', 'Bob', 'dlkcd');

-- --------------------------------------------------------

--
-- Structure de la table `table_louer`
--

DROP TABLE IF EXISTS `table_louer`;
CREATE TABLE IF NOT EXISTS `table_louer` (
  `ID_Locataire` int(11) NOT NULL,
  `ID_Voiture` int(11) NOT NULL,
  `NbJour` int(11) NOT NULL,
  `Date_Location` date NOT NULL,
  PRIMARY KEY (`ID_Locataire`,`ID_Voiture`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `table_louer`
--

INSERT INTO `table_louer` (`ID_Locataire`, `ID_Voiture`, `NbJour`, `Date_Location`) VALUES
(1, 2, 15, '2021-01-12'),
(3, 5, 7, '2020-12-24'),
(4, 4, 5, '2012-02-15'),
(9, 6, 21, '2020-12-04'),
(11, 4, 7, '2021-01-14'),
(12, 7, 4, '2021-01-26');

-- --------------------------------------------------------

--
-- Structure de la table `table_voiture`
--

DROP TABLE IF EXISTS `table_voiture`;
CREATE TABLE IF NOT EXISTS `table_voiture` (
  `ID_Voiture` int(11) NOT NULL AUTO_INCREMENT,
  `Voiture` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Loyer` int(11) NOT NULL,
  PRIMARY KEY (`ID_Voiture`,`Voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `table_voiture`
--

INSERT INTO `table_voiture` (`ID_Voiture`, `Voiture`, `Designation`, `Loyer`) VALUES
(1, 'voit', 'Tesla serie Y', 3100),
(2, 'voit', 'Audi A8', 2700),
(3, 'voit', 'Ford Raptor', 1500),
(4, 'voit', 'BMW X5', 1750),
(5, 'voit', 'Citroen DS4', 1000),
(6, 'car', 'Fiat Panda', 300);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
