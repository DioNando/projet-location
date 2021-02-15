-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 15 fév. 2021 à 06:51
-- Version du serveur :  8.0.21
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
  `ID_Locataire` int NOT NULL AUTO_INCREMENT,
  `Locataire` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `Adresse` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`ID_Locataire`,`Locataire`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `table_locataire`
--

INSERT INTO `table_locataire` (`ID_Locataire`, `Locataire`, `Nom`, `Adresse`) VALUES
(1, 'Client', 'Rem', 'Lot 202'),
(2, 'Locataire', 'Ui', 'Bis 03'),
(3, 'Pro', 'Max', '801 Street'),
(4, 'Pro', 'Sanji', 'View 12'),
(5, 'Client', 'Leo', 'Lot X'),
(6, 'Locataire', 'Zen', 'Parc 2'),
(7, 'Pro', 'Octane', 'First St'),
(8, 'Client', 'Aristote', 'Grec 25'),
(9, 'Locataire', 'DaVinci', 'Mamatwo'),
(10, 'Client', 'Jinx', 'Lol 99'),
(11, 'Client', 'Homer', 'Stream 001'),
(12, 'Pro', 'Ken', 'Niggaaa');

-- --------------------------------------------------------

--
-- Structure de la table `table_louer`
--

DROP TABLE IF EXISTS `table_louer`;
CREATE TABLE IF NOT EXISTS `table_louer` (
  `ID_Louer` int NOT NULL AUTO_INCREMENT,
  `LocataireLouer` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ID_Locataire` int NOT NULL,
  `VoitureLouer` varchar(255) NOT NULL,
  `ID_Voiture` int NOT NULL,
  `NbJour` int NOT NULL,
  `Date_Location` date NOT NULL,
  PRIMARY KEY (`ID_Louer`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `table_louer`
--

INSERT INTO `table_louer` (`ID_Louer`, `LocataireLouer`, `ID_Locataire`, `VoitureLouer`, `ID_Voiture`, `NbJour`, `Date_Location`) VALUES
(1, 'Client', 2, 'Pro', 12, 12, '2019-09-15');

-- --------------------------------------------------------

--
-- Structure de la table `table_voiture`
--

DROP TABLE IF EXISTS `table_voiture`;
CREATE TABLE IF NOT EXISTS `table_voiture` (
  `ID_Voiture` int NOT NULL AUTO_INCREMENT,
  `Voiture` varchar(255) NOT NULL,
  `Designation` varchar(255) NOT NULL,
  `Loyer` int NOT NULL,
  PRIMARY KEY (`ID_Voiture`,`Voiture`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `table_voiture`
--

INSERT INTO `table_voiture` (`ID_Voiture`, `Voiture`, `Designation`, `Loyer`) VALUES
(1, 'Voiture', 'Tesla', 3000),
(2, 'Auto', 'Citroen', 1200),
(3, 'Moto', 'Jeep', 900),
(4, 'Voiture', 'Fiat Panda', 750),
(5, 'Moto', 'Volkswagen', 1500),
(6, 'Auto', 'Audi', 2400),
(7, 'Auto', 'Ferrari', 7100),
(8, 'Moto', 'Honda', 1500),
(9, 'Voiture', 'Aston Martin', 2700),
(10, 'Moto', 'Nissan', 1450),
(11, 'Voiture', 'Mercedes', 2000),
(12, 'Auto', 'Karenjy', 100),
(13, 'Voiture', 'Lamborghini', 7000),
(14, 'Moto', 'Suzuki', 600),
(15, 'Auto', 'Ford', 1950);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
