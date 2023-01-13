-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 11 jan. 2023 à 13:57
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
-- Base de données : `sport-team-management`
--

-- --------------------------------------------------------

--
-- Structure de la table `partie`
--

DROP TABLE IF EXISTS `partie`;
CREATE TABLE IF NOT EXISTS `partie` (
  `date_match` date NOT NULL,
  `heure` time NOT NULL,
  `nom_equipe_adverse` varchar(80) COLLATE utf8_bin NOT NULL,
  `lieu_de_rencontre` varchar(50) COLLATE utf8_bin NOT NULL,
  `resultat_match` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`date_match`,`heure`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`date_match`, `heure`, `nom_equipe_adverse`, `lieu_de_rencontre`, `resultat_match`) VALUES
('2022-11-16', '14:00:00', 'Detroit Pistons', 'Toulouse', 'Victoire'),
('2022-10-18', '10:00:00', 'Indiana Pacers', 'Paris', 'Defaite'),
('2022-09-13', '11:00:00', 'Miami Heat', 'Miami', 'Victoire'),
('2022-09-21', '16:00:00', 'Milwaukee Bucks', 'Ouangani', 'Defaite'),
('2022-08-15', '13:00:00', 'New York Knicks', 'Tokyo', 'Defaite'),
('2022-07-12', '17:00:00', 'Philadelphia 76ers', 'Berlin', 'Victoire'),
('2021-11-17', '15:00:00', 'Toronto Raptors', 'Vancouver', 'Victoire'),
('2020-10-20', '20:00:00', 'Washington Wizards', 'Kyoto', 'Defaite'),
('2021-12-23', '12:00:00', 'Dallas Mavericks', 'Marseille', 'Victoire'),
('2022-02-09', '21:00:00', 'Houston Rockets', 'Bordeaux', 'Defaite');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
