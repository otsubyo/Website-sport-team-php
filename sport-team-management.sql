-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 06 jan. 2023 à 07:33
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
  `poste` char(50) CHARACTER SET utf8 NOT NULL,
  `statut` varchar(15) COLLATE utf8_bin NOT NULL DEFAULT 'Actif',
  PRIMARY KEY (`numero_licence`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `joueur`
--

INSERT INTO `joueur` (`numero_licence`, `nom`, `prenom`, `photo`, `taille`, `poids`, `poste`, `statut`) VALUES
('4778593573', 'Jezequel', 'Henri', '', 175, 65, 'Meneur', 'Actif'),
('7887537564', 'Mas-bouvry', 'Diego', '', 170, 58, 'Pivot', 'Actif'),
('7937469953', 'Bounoua', 'Yahya', '', 183, 110, 'Meneur', 'Actif'),
('5385679374', 'Bezier', 'Jason', '', 170, 80, 'Arriere', 'Actif'),
('9647835854', 'Barragan', 'Benjamin', '', 175, 62, 'Ailier', 'Actif'),
('9353443354', 'Anthony', 'Lozano', '', 177, 70, 'Ailier_Fort', 'Actif'),
('3858977596', 'Grosse', 'Baptiste', '', 178, 68, 'Meneur', 'Actif'),
('3767993987', 'Kaya', 'Baran', '', 190, 115, 'Arriere', 'Actif'),
('8664836458', 'Bentaila', 'Fabio', '', 180, 65, 'Ailier_Fort', 'Actif'),
('3649355783', 'Edellin', 'Louis', '', 180, 75, 'Pivot', 'Actif'),
('3344757469', 'Schmidt', 'Mike', '', 175, 75, 'Meneur', 'Blesse'),
('4474389577', 'Pellefigue', 'Theo', '', 178, 76, 'Ailier_Fort', 'Blesse'),
('7898338779', 'Soury', 'Clement', '', 170, 58, 'Pivot', 'Blesse'),
('6839535844', 'Denice', 'Brice', '', 180, 78, 'Ailier', 'Actif'),
('8764889988', 'Jean', 'Dubois', '', 190, 85, 'Arriere', 'Actif');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
