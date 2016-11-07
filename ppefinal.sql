-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 17 Octobre 2016 à 09:13
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `ppefinal`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE IF NOT EXISTS `adresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ville` varchar(255) DEFAULT NULL,
  `rue` text,
  `numero` int(11) DEFAULT NULL,
  `cp` varchar(15) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`),
  KEY `f_id` (`f_id`),
  KEY `p_id` (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `attribution_adresse`
--

CREATE TABLE IF NOT EXISTS `attribution_adresse` (
  `id_u` int(11) DEFAULT NULL,
  `id_a` int(11) DEFAULT NULL,
  `id_f` int(11) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attribution_formation`
--

CREATE TABLE IF NOT EXISTS `attribution_formation` (
  `id_u` int(11) NOT NULL DEFAULT '0',
  `id_f` int(11) NOT NULL DEFAULT '0',
  `begin_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL,
  PRIMARY KEY (`id_u`,`id_f`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attribution_type_formation`
--

CREATE TABLE IF NOT EXISTS `attribution_type_formation` (
  `id_t` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `id_f` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_t`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `duree` varchar(50) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `debut` datetime DEFAULT NULL,
  `nb_places` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `deteled_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE IF NOT EXISTS `prestataires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `raison_sociale` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE IF NOT EXISTS `type_formation` (
  `formation_id` int(11) NOT NULL AUTO_INCREMENT,
  `type` text,
  PRIMARY KEY (`formation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `nbr_jour` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `adresses_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `adresses_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `prestataires` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;