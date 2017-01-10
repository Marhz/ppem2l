-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 10 Janvier 2017 à 13:33
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `basic`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` int(11) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `rue` text,
  `numero` int(11) DEFAULT NULL,
  `code_postal` varchar(15) DEFAULT NULL,
  `u_id` int(11) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attribution_adresse`
--

CREATE TABLE `attribution_adresse` (
  `id_user` int(11) DEFAULT NULL,
  `id_adresse` int(11) DEFAULT NULL,
  `id_formation` int(11) DEFAULT NULL,
  `id_prestataire` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attribution_formation`
--

CREATE TABLE `attribution_formation` (
  `id_u` int(11) NOT NULL DEFAULT '0',
  `id_f` int(11) NOT NULL DEFAULT '0',
  `begin_at` date DEFAULT NULL,
  `end_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `attribution_formation`
--

INSERT INTO `attribution_formation` (`id_u`, `id_f`, `begin_at`, `end_at`) VALUES
(1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id_formation` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `duree` varchar(50) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `debut` datetime DEFAULT NULL,
  `nb_places` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `deteled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `titre`, `duree`, `cout`, `debut`, `nb_places`, `created_at`, `update_at`, `deteled_at`) VALUES
(1, 'Informatique', '30', 100, '2017-01-26 00:00:00', 2, '2017-01-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE `prestataires` (
  `id` int(11) NOT NULL,
  `raison_sociale` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE `type_formation` (
  `id_type` int(11) NOT NULL,
  `titre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `credit` int(11) DEFAULT NULL,
  `nbr_jour` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `login`, `password`, `credit`, `nbr_jour`) VALUES
(1, 'Limentour', 'Gaetan', 'gaetalim@gmail.com', 'gaetalim@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`),
  ADD KEY `u_id` (`u_id`),
  ADD KEY `f_id` (`f_id`),
  ADD KEY `p_id` (`p_id`);

--
-- Index pour la table `attribution_formation`
--
ALTER TABLE `attribution_formation`
  ADD PRIMARY KEY (`id_u`,`id_f`);

--
-- Index pour la table `formations`
--
ALTER TABLE `formations`
  ADD PRIMARY KEY (`id_formation`);

--
-- Index pour la table `prestataires`
--
ALTER TABLE `prestataires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `type_formation`
--
ALTER TABLE `type_formation`
  ADD PRIMARY KEY (`id_type`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresses`
--
ALTER TABLE `adresses`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT pour la table `prestataires`
--
ALTER TABLE `prestataires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_formation`
--
ALTER TABLE `type_formation`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD CONSTRAINT `adresses_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `adresses_ibfk_2` FOREIGN KEY (`f_id`) REFERENCES `formations` (`id_formation`),
  ADD CONSTRAINT `adresses_ibfk_3` FOREIGN KEY (`p_id`) REFERENCES `prestataires` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
