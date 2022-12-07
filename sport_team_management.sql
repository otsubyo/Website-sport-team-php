-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 07 déc. 2022 à 15:50
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `sport_management`
--

-- --------------------------------------------------------

--
-- Structure de la table `jouer`
--

DROP TABLE IF EXISTS `jouer`;
CREATE TABLE IF NOT EXISTS `jouer` (
  `date_match` date NOT NULL,
  `heure` time NOT NULL,
  `numero_licence` char(10) COLLATE utf8_bin NOT NULL,
  `statut` varchar(20) COLLATE utf8_bin NOT NULL,
  `commentaire` varchar(120) COLLATE utf8_bin NOT NULL,
  `note` int(5) NOT NULL,
  PRIMARY KEY (`date_match`,`heure`,`numero_licence`),
  KEY `heure` (`heure`),
  KEY `numero_licence` (`numero_licence`),
  KEY `date_match` (`date_match`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `jouer`
--

INSERT INTO `jouer` (`date_match`, `heure`, `numero_licence`, `statut`, `commentaire`, `note`) VALUES
('2022-11-16', '14:00:00', '5385679374', 'Actif', 'RAS', 3),
('2022-10-18', '10:00:00', '4778593573', 'Blesse', 'RAS', 1),
('2022-02-09', '21:00:00', '9353443354', 'Suspendu', 'RAS', 4),
('2021-12-23', '12:00:00', '9647835854', 'Absent', 'RAS', 5),
('2022-08-15', '13:00:00', '7887537564', 'Blesse', 'RAS', 1),
('2022-09-21', '16:00:00', '7937469953', 'Absent', 'RAS', 2),
('2021-11-17', '15:00:00', '3858977596', 'Suspendu', 'RAS', 2),
('2020-10-20', '20:00:00', '3767993987', 'Actif', 'RAS', 2),
('2022-07-12', '17:00:00', '8664836458', 'Actif', 'RAS', 3),
('2022-09-13', '11:00:00', '3649355783', 'Blesse', 'RAS', 5),
('2022-11-16', '14:00:00', '4778593573', 'Actif', 'RAS', 4),
('2022-11-16', '14:00:00', '9353443354', 'Suspendu', 'RAS', 1),
('2022-11-16', '14:00:00', '9647835854', 'Blesse', 'RAS', 3),
('2022-11-16', '14:00:00', '8664836458', 'Actif', 'RAS', 5),
('2022-10-18', '10:00:00', '9353443354', 'Actif', 'RAS', 3),
('2022-10-18', '10:00:00', '9647835854', 'Blesse', 'RAS', 2),
('2022-10-18', '10:00:00', '3858977596', 'Actif', 'RAS', 5),
('2022-10-18', '10:00:00', '3767993987', 'Suspendu', 'RAS', 4),
('2022-02-09', '21:00:00', '8664836458', 'Blesse', 'RAS', 5),
('2022-02-09', '21:00:00', '9647835854', 'Actif', 'RAS', 4),
('2022-02-09', '21:00:00', '3767993987', 'Actif', 'RAS', 3),
('2022-02-09', '21:00:00', '3858977596', 'Suspendu', 'RAS', 4),
('2021-12-23', '12:00:00', '8664836458', 'Suspendu', 'RAS', 1),
('2021-12-23', '12:00:00', '3649355783', 'Actif', 'RAS', 2),
('2021-12-23', '12:00:00', '4778593573', 'Blesse', 'RAS', 3),
('2021-12-23', '12:00:00', '9353443354', 'Actif', 'RAS', 4),
('2022-08-15', '13:00:00', '7937469953', 'Actif', 'RAS', 5),
('2022-08-15', '13:00:00', '3649355783', 'Blesse', 'RAS', 2),
('2022-08-15', '13:00:00', '4778593573', 'Actif', 'RAS', 3),
('2022-08-15', '13:00:00', '8664836458', 'Suspendu', 'RAS', 3),
('2022-09-21', '16:00:00', '9353443354', 'Actif', 'RAS', 5),
('2022-09-21', '16:00:00', '9647835854', 'Suspendu', 'RAS', 5),
('2022-09-21', '16:00:00', '3858977596', 'Actif', 'RAS', 2),
('2022-09-21', '16:00:00', '3767993987', 'Actif', 'RAS', 1),
('2021-11-17', '15:00:00', '3767993987', 'Suspendu', 'RAS', 4),
('2021-11-17', '15:00:00', '3649355783', 'Actif', 'RAS', 3),
('2021-11-17', '15:00:00', '9353443354', 'Blesse', 'RAS', 1),
('2021-11-17', '15:00:00', '9647835854', 'Actif', 'RAS', 2),
('2020-10-20', '20:00:00', '9353443354', 'Actif', 'RAS', 4),
('2020-10-20', '20:00:00', '9647835854', 'Suspendu', 'RAS', 1),
('2020-10-20', '20:00:00', '8664836458', 'Blesse', 'RAS', 3),
('2020-10-20', '20:00:00', '7937469953', 'Suspendu', 'RAS', 4),
('2022-07-12', '17:00:00', '3649355783', 'Actif', 'RAS', 4),
('2022-07-12', '17:00:00', '4778593573', 'Actif', 'RAS', 2),
('2022-07-12', '17:00:00', '7937469953', 'Actif', 'RAS', 4),
('2022-07-12', '17:00:00', '3858977596', 'Suspendu', 'RAS', 3),
('2022-09-13', '11:00:00', '8664836458', 'Suspendu', 'RAS', 2),
('2022-09-13', '11:00:00', '3767993987', 'Actif', 'RAS', 4),
('2022-09-13', '11:00:00', '9647835854', 'Blesse', 'RAS', 3),
('2022-09-13', '11:00:00', '4778593573', 'Actif', 'RAS', 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
