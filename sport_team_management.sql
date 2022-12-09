-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 09 déc. 2022 à 07:21
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

-- --------------------------------------------------------

--
-- Structure de la table `joueur`
--

DROP TABLE IF EXISTS `joueur`;
CREATE TABLE IF NOT EXISTS `joueur` (
  `numero_licence` char(10) COLLATE utf8_bin NOT NULL,
  `nom` varchar(20) COLLATE utf8_bin NOT NULL,
  `prenom` varchar(20) COLLATE utf8_bin NOT NULL,
  `photo` varchar(20) COLLATE utf8_bin NOT NULL COMMENT 'Lien vers la photo',
  `taille` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  `poste` char(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`numero_licence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`numero_licence`, `nom`, `prenom`, `photo`, `taille`, `poids`, `poste`) VALUES
('4778593573', 'Jezequel', 'Henri', '', 175, 65, 'Meneur'),
('7887537564', 'Mas-bouvry', 'Diego', '', 170, 58, 'Pivot'),
('7937469953', 'Bounoua', 'Yahya', '', 183, 110, 'Meneur'),
('5385679374', 'Bezier', 'Jason', '', 170, 80, 'Arrière'),
('9647835854', 'Barragan', 'Benjamin', '', 175, 62, 'Ailier'),
('9353443354', 'Anthony', 'Lozano', '', 177, 70, 'Ailier_Fort'),
('3858977596', 'Grosse', 'Baptiste', '', 178, 68, 'Meneur'),
('3767993987', 'Kaya', 'Baran', '', 190, 115, 'Arrière'),
('8664836458', 'Bentaila', 'Fabio', '', 180, 65, 'Ailier_Fort'),
('3649355783', 'Edellin', 'Louis', '', 180, 75, 'Pivot');

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

--
-- Déchargement des données de la table `partie`
--

INSERT INTO `partie` (`date_match`, `heure`, `nom_equipe_adverse`, `lieu_de_rencontre`, `resultat_match`) VALUES
('2022-11-16', '14:00:00', 'Detroit_Pistons', 'Toulouse', 'Victoire'),
('2022-10-18', '10:00:00', 'Indiana_Pacers', 'Paris', 'Defaite'),
('2022-09-13', '11:00:00', 'Miami_Heat', 'Miami', 'Victoire'),
('2022-09-21', '16:00:00', 'Milwaukee_Bucks', 'Ouangani', 'Defaite'),
('2022-08-15', '13:00:00', 'New_York_Knicks', 'Tokyo', 'Defaite'),
('2022-07-12', '17:00:00', 'Philadelphia_76ers', 'Berlin', 'Victoire'),
('2021-11-17', '15:00:00', 'Toronto_Raptors', 'Vancouver', 'Victoire'),
('2020-10-20', '20:00:00', 'Washington_Wizards', 'Kyoto', 'Defaite'),
('2021-12-23', '12:00:00', 'Dallas_Mavericks', 'Marseille', 'Victoire'),
('2022-02-09', '21:00:00', 'Houston_Rockets', 'Bordeaux', 'Defaite');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
