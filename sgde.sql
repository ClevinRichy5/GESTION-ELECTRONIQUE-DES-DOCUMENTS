-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 22 nov. 2024 à 18:32
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
-- Base de données : `sgde`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`email`, `password`) VALUES
('Monsieurrichy@gmail.com', '1234kakeu@');

-- --------------------------------------------------------

--
-- Structure de la table `document`
--

DROP TABLE IF EXISTS `document`;
CREATE TABLE IF NOT EXISTS `document` (
  `id_document` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(255) COLLATE utf8_bin NOT NULL,
  `date` timestamp NOT NULL,
  `auteur` varchar(255) COLLATE utf8_bin NOT NULL,
  `fichier` varchar(255) COLLATE utf8_bin NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id_document`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `document`
--

INSERT INTO `document` (`id_document`, `titre`, `description`, `date`, `auteur`, `fichier`, `id_service`) VALUES
(4, 'achat des machines', 'documents d\'achat', '2024-07-24 13:23:26', 'Karelle', '66a10e5e2ccda_Ios.docx', 1),
(9, 'achat', 'achat des machines dans le service informatique', '2024-10-29 18:18:30', 'Monsieur richy', '672135060fab7_EEDO3791.JPG', 3),
(8, 'production', 'production de laid', '2024-08-24 07:57:30', 'Monsieur richy', '66c9a07a5e38e_CV RICHY.docx', 3);

-- --------------------------------------------------------

--
-- Structure de la table `service`
--

DROP TABLE IF EXISTS `service`;
CREATE TABLE IF NOT EXISTS `service` (
  `id_service` int(11) NOT NULL AUTO_INCREMENT,
  `nom_service` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `service`
--

INSERT INTO `service` (`id_service`, `nom_service`) VALUES
(1, 'informatique'),
(2, 'maintenance'),
(3, 'comptabilite'),
(4, 'ressource_humaine'),
(5, 'laboratoire'),
(6, 'transport'),
(7, 'tresorerie'),
(8, 'caisse'),
(9, 'secretariat'),
(10, 'controle_gestion'),
(11, 'achat');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(50) COLLATE utf8_bin NOT NULL,
  `id_service` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_service_fk` (`id_service`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `email`, `password`, `id_service`) VALUES
(22, 'cabrel', 'cabrel@gmail.com', '1234cabrel', 3),
(21, 'Monsieur Richy', 'clevin@gmail.com', '1234', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
