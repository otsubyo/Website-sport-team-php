-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 20 nov. 2022 à 22:58
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
-- Base de données : `sport_team_management`
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
  `note` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`date_match`,`heure`,`numero_licence`),
  KEY `heure` (`heure`),
  KEY `numero_licence` (`numero_licence`),
  KEY `date_match` (`date_match`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `numero_licence` char(10) COLLATE utf8_bin NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `photo` varchar(120) COLLATE utf8_bin NOT NULL COMMENT 'Lien vers la photo',
  `taille` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `poste` char(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numero_licence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

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
  `resultat_match` varchar(20) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`date_match`,`heure`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
