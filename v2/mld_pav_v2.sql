-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 13 déc. 2019 à 12:59
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mld_pav_v2`
--
CREATE DATABASE IF NOT EXISTS `mld_pav_v2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mld_pav_v2`;

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `login` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `agent`
--

DROP TABLE IF EXISTS `agent`;
CREATE TABLE IF NOT EXISTS `agent` (
  `password` varchar(40) NOT NULL,
  `login` varchar(30) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `pav`
--

DROP TABLE IF EXISTS `pav`;
CREATE TABLE IF NOT EXISTS `pav` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(11) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `code_postal` int(11) NOT NULL,
  `ville` varchar(30) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `releve`
--

DROP TABLE IF EXISTS `releve`;
CREATE TABLE IF NOT EXISTS `releve` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` char(1) NOT NULL,
  `date` date NOT NULL,
  `niveau` int(11) NOT NULL,
  `commentaire` varchar(250) NOT NULL,
  `id_tournee` int(11) NOT NULL,
  `id_pav` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_pav` (`id_pav`),
  KEY `id_tournee` (`id_tournee`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tournee`
--

DROP TABLE IF EXISTS `tournee`;
CREATE TABLE IF NOT EXISTS `tournee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `id_agent` int(11) NOT NULL,
  `id_releve` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_agent` (`id_agent`),
  KEY `id_releve` (`id_releve`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `releve`
--
ALTER TABLE `releve`
  ADD CONSTRAINT `id_pav` FOREIGN KEY (`id_pav`) REFERENCES `pav` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `id_tournee` FOREIGN KEY (`id_tournee`) REFERENCES `tournee` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Contraintes pour la table `tournee`
--
ALTER TABLE `tournee`
  ADD CONSTRAINT `id_agent` FOREIGN KEY (`id_agent`) REFERENCES `agent` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `id_releve` FOREIGN KEY (`id_releve`) REFERENCES `releve` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
