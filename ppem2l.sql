-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Mar 24 Janvier 2017 à 13:03
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ppem2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresses`
--

CREATE TABLE `adresses` (
  `id_adresse` int(11) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `voirie` text,
  `nom_voirie` varchar(255) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `code_postal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresses`
--

INSERT INTO `adresses` (`id_adresse`, `ville`, `voirie`, `nom_voirie`, `numero`, `code_postal`) VALUES
(1, 'paris', 'rue', 'piou', 36, '75001'),
(2, 'lyon', 'boulevard', 'miam', 36, '75001'),
(3, 'lens', 'avenue', 'huhu', 36, '75001');

-- --------------------------------------------------------

--
-- Structure de la table `attribution_formations`
--

CREATE TABLE `attribution_formations` (
  `formation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `valide` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `attribution_formations`
--

INSERT INTO `attribution_formations` (`formation_id`, `user_id`, `valide`) VALUES
(1, 1, 1),
(1, 2, 2),
(2, 2, 0),
(3, 2, 1);

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
  `type_id` int(11) DEFAULT NULL,
  `adresse_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `deteled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id_formation`, `titre`, `duree`, `cout`, `debut`, `nb_places`, `type_id`, `adresse_id`, `created_at`, `update_at`, `deteled_at`) VALUES
(1, 'Informatique', '30', 100, '2017-01-26 00:00:00', 2, 1, 0, '2017-01-03 00:00:00', NULL, NULL),
(2, 'sql', '10', 100, '2017-01-31 00:00:00', 2, 3, 0, '2017-01-03 00:00:00', NULL, NULL),
(3, 'js', '10', 100, '2017-01-31 00:00:00', 2, 1, 0, '2017-01-03 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE `prestataires` (
  `id` int(11) NOT NULL,
  `raison_sociale` varchar(255) DEFAULT NULL,
  `adresse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE `type_formation` (
  `id_type` int(11) NOT NULL,
  `type_titre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_formation`
--

INSERT INTO `type_formation` (`id_type`, `type_titre`) VALUES
(1, 'Informatique'),
(2, 'Methodologie'),
(3, 'Gestion de donn?es');

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
  `nbr_jour` int(11) DEFAULT NULL,
  `adresse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `login`, `password`, `credit`, `nbr_jour`, `adresse_id`) VALUES
(1, 'Limentour', 'Gaetan', 'gaetalim@gmail.com', 'gaetalim@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0, 0),
(2, 'de r?musat', 'georges', 'gderemusat@gmail.com', 'gderemusat@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id_adresse`);

--
-- Index pour la table `attribution_formations`
--
ALTER TABLE `attribution_formations`
  ADD PRIMARY KEY (`formation_id`,`user_id`),
  ADD KEY `id_u` (`user_id`);

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
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id_formation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `prestataires`
--
ALTER TABLE `prestataires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_formation`
--
ALTER TABLE `type_formation`
  MODIFY `id_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attribution_formations`
--
ALTER TABLE `attribution_formations`
  ADD CONSTRAINT `attribution_formations_ibfk_1` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id_formation`),
  ADD CONSTRAINT `attribution_formations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
