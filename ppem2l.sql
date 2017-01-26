-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 26 Janvier 2017 à 11:29
-- Version du serveur :  5.7.17-0ubuntu0.16.04.1
-- Version de PHP :  7.0.13-0ubuntu0.16.04.1

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
  `id` int(11) NOT NULL,
  `ville` varchar(255) DEFAULT NULL,
  `voirie` text,
  `nom_voirie` varchar(255) NOT NULL,
  `numero` int(11) DEFAULT NULL,
  `code_postal` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `adresses`
--

INSERT INTO `adresses` (`id`, `ville`, `voirie`, `nom_voirie`, `numero`, `code_postal`) VALUES
(1, 'paris', 'rue', 'piou', 36, '75001'),
(2, 'lyon', 'boulevard', 'miam', 36, '75001'),
(3, 'lens', 'avenue', 'huhu', 36, '75001'),
(4, 'le havre', 'boulevard', 'bloup', 30, '34567');

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
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(2, 2, 0),
(2, 3, 0),
(2, 4, 0),
(3, 2, 0),
(3, 4, 1);

-- --------------------------------------------------------

--
-- Structure de la table `formations`
--

CREATE TABLE `formations` (
  `id` int(11) NOT NULL,
  `titre` varchar(255) DEFAULT NULL,
  `description` text NOT NULL,
  `duree` varchar(50) DEFAULT NULL,
  `cout` int(11) DEFAULT NULL,
  `debut` datetime DEFAULT NULL,
  `nb_places` int(11) DEFAULT NULL,
  `type_id` int(11) DEFAULT NULL,
  `adresse_id` int(11) NOT NULL,
  `prestataire_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deteled_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `formations`
--

INSERT INTO `formations` (`id`, `titre`, `description`, `duree`, `cout`, `debut`, `nb_places`, `type_id`, `adresse_id`, `prestataire_id`, `created_at`, `updated_at`, `deteled_at`) VALUES
(1, 'Informatique', '', '30', 100, '2017-01-26 00:00:00', 2, 1, 3, 0, '2017-01-03 00:00:00', NULL, NULL),
(2, 'sql', '', '10', 100, '2017-01-31 00:00:00', 2, 3, 1, 0, '2017-01-03 00:00:00', NULL, NULL),
(3, 'js', '', '10', 100, '2017-01-31 00:00:00', 2, 1, 2, 0, '2017-01-03 00:00:00', NULL, NULL),
(4, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 400, '2017-01-27 00:00:00', 15, 2, 1, 3, '2017-01-26 10:44:15', '2017-01-26 10:44:15', NULL),
(5, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 400, '2017-01-27 00:00:00', 15, 2, 1, 3, '2017-01-26 11:04:14', '2017-01-26 11:04:14', NULL),
(6, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 400, '2017-01-27 00:00:00', 15, 2, 1, 3, '2017-01-26 11:06:08', '2017-01-26 11:06:08', NULL),
(7, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 400, '2017-01-27 00:00:00', 15, 2, 1, 3, '2017-01-26 11:08:41', '2017-01-26 11:08:41', NULL),
(8, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 400, '2017-01-27 00:00:00', 15, 2, 1, 3, '2017-01-26 11:09:19', '2017-01-26 11:09:19', NULL),
(9, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 400, '2017-01-27 00:00:00', 15, 2, 1, 3, '2017-01-26 11:14:49', '2017-01-26 11:14:49', NULL),
(10, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 400, '2017-01-27 00:00:00', 15, 2, 1, 3, '2017-01-26 11:15:04', '2017-01-26 11:15:04', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE `prestataires` (
  `id` int(11) NOT NULL,
  `raison_sociale` varchar(255) DEFAULT NULL,
  `adresse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `prestataires`
--

INSERT INTO `prestataires` (`id`, `raison_sociale`, `adresse_id`) VALUES
(1, 'panda corps', 1),
(2, 'L\'empire impérial SA', 2),
(3, 'Jacquie et Michelle SA', 3),
(10, 'ta maman', 1),
(11, 'ta maman', 1),
(12, 'ta maman', 1),
(13, 'ta maman', 1),
(14, 'pew corp', 4);

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

CREATE TABLE `types` (
  `id` int(11) NOT NULL,
  `titre` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `types`
--

INSERT INTO `types` (`id`, `titre`) VALUES
(1, 'Informatique'),
(2, 'Methodologie'),
(3, 'Gestion de données');

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
  `adresse_id` int(11) NOT NULL,
  `chef_id` int(11) NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `login`, `password`, `credit`, `nbr_jour`, `adresse_id`, `chef_id`, `level`) VALUES
(1, 'Limentour', 'Gaetan', 'gaetalim@gmail.com', 'gaetalim@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0, 0, 0, 0),
(2, 'de rémusat', 'georges', 'gderemusat@gmail.com', 'gderemusat@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0, 0, 0, 2),
(3, 'eploye', 'numero1', 'numero1@mail.com', 'numero1@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0, 0, 2, 0),
(4, 'eploye', 'numero2', 'numero3@mail.com', 'numero3@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0, 0, 2, 0),
(5, 'eploye', 'numero3', 'numero3@mail.com', 'numero3@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 0, 0, 0, 2, 0);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresses`
--
ALTER TABLE `adresses`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prestataires`
--
ALTER TABLE `prestataires`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `prestataires`
--
ALTER TABLE `prestataires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attribution_formations`
--
ALTER TABLE `attribution_formations`
  ADD CONSTRAINT `attribution_formations_ibfk_1` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `attribution_formations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
