-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 14 Juin 2017 à 12:46
-- Version du serveur :  5.7.18-0ubuntu0.16.04.1
-- Version de PHP :  7.0.18-0ubuntu0.16.04.1

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
(1, 'paris', 'rue', 'des martyrs', 36, '75009'),
(2, 'paris', 'boulevard', 'victor hugo', 36, '75008'),
(3, 'paris', 'rue', 'ballu', 36, '75009'),
(4, 'le havre', 'rue', 'magellan', 30, '34567'),
(5, 'Strasbourg', 'rue', 'déserte', 15, '67000'),
(7, 'Strasbourg', 'avenue', 'des vosges', 20, '67000'),
(8, 'Strasbourg', 'rue', 'de la grange', 16, '67000'),
(14, 'Strasbourg', 'rue', 'de la monnaie', 30, '67000');

-- --------------------------------------------------------

--
-- Structure de la table `attribution_formations`
--

CREATE TABLE `attribution_formations` (
  `formation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `valide` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `attribution_formations`
--

INSERT INTO `attribution_formations` (`formation_id`, `user_id`, `valide`) VALUES
(2, 2, 0),
(2, 3, 9),
(2, 4, 0),
(2, 5, 0),
(3, 2, 1),
(4, 3, 2),
(4, 4, 1),
(4, 5, 2),
(11, 2, 1),
(12, 2, 1),
(13, 2, 1);

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `content` text,
  `user_id` int(11) DEFAULT NULL,
  `formation_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `content`, `user_id`, `formation_id`, `created_at`, `updated_at`) VALUES
(2, 'Bonne formation 10/10', 4, 1, '2017-03-02 11:54:21', '2017-06-07 08:31:10'),
(34, 'yolo\n', 2, 13, '2017-03-02 14:58:19', '2017-03-02 14:58:19'),
(79, 'greger', 2, 3, '2017-04-12 09:26:03', '2017-04-12 09:26:03'),
(80, 'L\'empire approuve!', 3, 1, '2017-05-28 11:44:31', '2017-06-07 08:31:20');

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
  `image` varchar(255) DEFAULT NULL,
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

INSERT INTO `formations` (`id`, `titre`, `description`, `duree`, `cout`, `debut`, `image`, `nb_places`, `type_id`, `adresse_id`, `prestataire_id`, `created_at`, `updated_at`, `deteled_at`) VALUES
(1, 'Football', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam a massa congue, consequat leo et, efficitur tortor. Aenean vitae tellus dui. Pellentesque blandit tellus non eros tincidunt, sit amet finibus justo tincidunt. In aliquet vestibulum nisl, at iaculis odio ultricies nec. Aenean iaculis molestie cursus. Etiam accumsan consectetur nibh, sit amet consequat diam porta ut. Praesent sit amet nibh vel enim tristique elementum eget vitae est. Proin at ullamcorper nunc, sed elementum nulla. Etiam pulvinar bibendum dui, a consectetur orci convallis eget. Nulla egestas mauris ut scelerisque eleifend. Nam ultricies mattis nulla vitae laoreet. Nunc velit ex, rhoncus quis nibh ac, mollis scelerisque tellus. Pellentesque in mollis nunc. Suspendisse feugiat enim in nisl cursus tincidunt ut vel erat. Nulla auctor sem felis, nec fringilla ipsum placerat eget. Proin molestie nibh vitae diam vehicula, a eleifend risus mattis.', '2', 700, '2017-07-29 00:00:00', 'image/bBuSD4JYa0PRucpBTRraY0jKuC1ATZj3hvT2lqbla7Xuw55Bn9N40uD62Rvv.jpg', 6, 1, 3, 2, '2017-01-03 00:00:00', '2017-06-14 11:57:53', NULL),
(2, 'Escalade', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '3', 900, '2017-08-05 00:00:00', 'image/L2DcHIoZOQr1XrbnrLkScX96fWl7PvslhBG5xVc4bnCpEqPU21ogFis02RVE.jpg', 8, 3, 1, 1, '2017-01-03 00:00:00', '2017-05-26 22:02:13', NULL),
(3, 'Boxe anglaise', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '4', 1000, '2017-10-07 00:00:00', 'image/AYovB5jtauw6z3lh5juA0xA5dpxuxgiXMhpOsnFsY7oI0ACCK2fIgFEZCVIo.jpg', 12, 2, 8, 16, '2017-01-03 00:00:00', '2017-05-26 21:47:11', NULL),
(4, 'initiation au curling', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempora inventore labore iste numquam, voluptatem iure fugiat, magnam corporis temporibus, rerum commodi ad minus accusamus, quos facilis at. Maxime nisi, facilis!\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Quas ipsum quaerat modi sit nostrum fugiat eum obcaecati totam voluptatum natus ab, aliquam, dolorum voluptate placeat repellendus accusamus. Beatae, recusandae, impedit?\r\n', '5', 800, '2017-09-29 00:00:00', 'image/gkGm65zyi0VuIrNtfz7gYjUfu1esVNeeuJxrScoMd60W9HNfJVZdr8nqNZcF.png', 15, 1, 4, 14, '2017-01-26 10:44:15', '2017-05-26 21:42:03', NULL),
(11, 'Water-polo', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer auctor efficitur quam quis feugiat. Duis fermentum et est nec molestie. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec eleifend nisl non leo rhoncus condimentum. Nam facilisis augue nisl, aliquam sollicitudin diam mollis quis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla, orci ac efficitur commodo, dui justo egestas mauris, in ultrices diam risus et odio. Fusce imperdiet mattis enim, sed hendrerit nulla iaculis lobortis. Proin sit amet odio arcu. Phasellus dignissim gravida ultricies. Vivamus tincidunt metus id diam mattis, at varius ipsum euismod.\r\n\r\nIn aliquam quam tempor magna lacinia, sit amet tempus nibh fermentum. Nullam vulputate eu massa ut varius. Nam sapien metus, ornare ut condimentum interdum, convallis ut orci. Pellentesque risus metus, semper ut dignissim elementum, egestas in enim. Sed laoreet velit nec mauris viverra ullamcorper. Suspendisse eleifend eu nisl at consectetur. Mauris ut leo elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris ut porta ipsum. Proin eros dui, consequat eu luctus nec, sodales eget tellus.', '3', 800, '2017-07-08 00:00:00', 'image/9MKJ46j792tmblRDDESbTYSMweRRigSi7mV2jt0h65Oxfe80YPh9y0Ln3s3z.jpg', 8, 6, 1, 1, '2017-02-24 17:30:42', '2017-05-26 21:25:05', NULL),
(12, 'Wing Chun', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '4', 700, '2017-07-21 00:00:00', 'image/7BIohZJiCZeFmIgMHgISysXWQBdb0aoBNH6yiFd3thIvVCuEaGtu0N0AGrBT.jpg', 10, 2, 7, 16, '2017-02-28 14:24:54', '2017-05-26 22:05:03', NULL),
(13, 'Echecs', 'ergreg regre', '5', 1000, '2017-08-12 00:00:00', 'image/1hAuvAZdrUiQMODbbN1NdCW3Bn8x65aVqZ3O1xW511YSAi9B61GpGbrEBeVW.jpg', 12, 3, 2, 10, '2017-02-28 15:06:32', '2017-05-26 21:37:51', NULL),
(14, 'Marathon', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '1', 500, '2017-10-03 00:00:00', 'image/kbHbtzZJvQnQIhxI5qWD7sBzqfd9HOF66mwzwCLLcom4bGZmNs5VvMNI7zID.jpg', 35, 5, 5, 10, '2017-02-28 15:08:39', '2017-05-26 21:53:57', NULL),
(15, 'Handball', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '2', 600, '2017-07-19 00:00:00', 'image/25SomI5VSzrN6BsOKwVQ07pg9iY1fOPuTsgBMqSwsGqiRxJqJRXUA5XArjlk.jpg', 10, 1, 3, 2, '2017-02-28 16:10:40', '2017-05-26 21:32:54', NULL),
(16, 'Football en salle', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '3', 1000, '2017-08-10 00:00:00', 'image/Vg4VpsudMMYDQ0OThaK48P9URa2hkszyn52Oi8X1LkRlieCveTkzrjIUkACO.jpg', 16, 1, 4, 16, '2017-05-28 04:38:56', '2017-06-14 12:04:23', NULL),
(17, 'Volleyball', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in tellus interdum eros vulputate placerat sed non enim. Pellentesque eget justo porttitor urna dictum fermentum sit amet sed mauris. Praesent molestie vestibulum erat ac rhoncus. Aenean nunc risus, accumsan nec ipsum et, convallis sollicitudin dui. Proin dictum quam a semper malesuada. Etiam porta sit amet risus quis porta. Nulla facilisi. Cras at interdum ante. Ut gravida pharetra ligula vitae malesuada.', '3', 800, '2017-08-19 00:00:00', 'image/DBFzWUQ1YxMfDdYMhkikXbmNH1x6loY46o6JHUOq1kvTT3gMsxz6MxXndixY.jpg', 8, 1, 1, 10, '2017-06-14 12:07:40', '2017-06-14 12:07:40', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `prestataires`
--

CREATE TABLE `prestataires` (
  `id` int(11) NOT NULL,
  `raison_sociale` varchar(255) NOT NULL,
  `adresse_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `prestataires`
--

INSERT INTO `prestataires` (`id`, `raison_sociale`, `adresse_id`) VALUES
(1, 'panda corps', 1),
(2, 'L empire imperial SA', 2),
(10, 'Decathlon', 1),
(14, 'Go Sport', 4),
(16, 'Région Lorraine', 14);

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
(1, 'En équipe'),
(2, 'Sport de combat'),
(3, 'Solo'),
(4, 'Tournoi'),
(5, 'Athlétisme'),
(6, 'Aquatique');

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
  `credit` int(11) DEFAULT '5000',
  `nbr_jour` int(11) DEFAULT '15',
  `adresse_id` int(11) DEFAULT NULL,
  `chef_id` int(11) DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `token` varchar(60) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'image/avatar_default.png',
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `email`, `login`, `password`, `credit`, `nbr_jour`, `adresse_id`, `chef_id`, `level`, `token`, `avatar`, `deleted_at`) VALUES
(1, 'Limentour', 'Gaetan', 'gaetalim@gmail.com', 'gaetalim@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4100, 15, 0, 2, 0, '', 'image/avatar_default.png', NULL),
(2, 'admin', 'admin', 'admin@mail.com', 'admin@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4300, 15, 0, NULL, 2, 'ccf0fe9e1b5338e00982d9457c1f4069986e2edf', 'image/KPAC0766b22IyhE0a0B8t684rjm6uppVLQPOIUY6nbRTF5xFCpS0uPXp0yy6.png', NULL),
(3, 'Darth', 'Vader', 'vader@deathstar.com', 'vader@deathstar.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4000, 15, 0, NULL, 1, '', 'image/AMLiVjAsUZSuM1VhfzsPvdNNUskORk34aDzB3EaA4SUFRm3JxtjLjyOVkNxX.jpg', NULL),
(4, 'exemple', 'user', 'user@mail.com', 'user@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 5000, 15, 0, 3, 0, '', 'image/avatar_default.png', NULL),
(5, 'exemple', 'chef', 'chef@mail.com', 'chef@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4000, 15, 0, NULL, 1, '', 'image/avatar_default.png', NULL),
(6, 'windu', 'mace', 'mace-windu@jedimail.com', 'mace-windu@jedimail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 5000, 20, NULL, 5, 0, '', 'image/avatar_default.png', NULL),
(7, 'bridou', 'justin', 'justinbridou@sauciflard.com', 'justinbridou@sauciflard.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 5000, 15, NULL, 5, 0, '', 'image/kf7UGaPYdlnIWgZKbUfIJdiM6Ii2shvEEw9uwPDU1ztSjYmGeUdMMmEJ0QPe.jpg', NULL),
(10, 'nouvel', 'user', 'nouveluser@mail.com', 'nouveluser@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 4200, 10, NULL, 2, 0, NULL, 'image/avatar_default.png', NULL),
(33, 'Gates', 'Bill', 'billou@microsoft.com', 'billou@microsoft.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 5000, 15, NULL, 5, 0, NULL, 'image/avatar_default.png', NULL),
(35, 'corleone', 'vito', 'vitocorleone@mail.com', 'vitocorleone@mail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 5000, 15, NULL, NULL, 1, NULL, 'image/avatar_default.png', NULL),
(36, 'erso', 'jyn', 'jyn-erso@rebelz.com', 'jyn-erso@rebelz.com', '568ce9a95c053aad95413ff53c8e080d6bc2b038', 5000, 15, NULL, NULL, 0, NULL, 'image/avatar_default.png', NULL),
(37, 'hamilton', 'margaret', 'margaret-hamilton@nasa.com', 'margaret-hamilton@nasa.com', '197c1f6b04d58b5445935b59395cb38555ee99f7', 5000, 15, NULL, NULL, 0, NULL, 'image/avatar_default.png', NULL);

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
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `formation_id` (`formation_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;
--
-- AUTO_INCREMENT pour la table `formations`
--
ALTER TABLE `formations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT pour la table `prestataires`
--
ALTER TABLE `prestataires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `attribution_formations`
--
ALTER TABLE `attribution_formations`
  ADD CONSTRAINT `attribution_formations_ibfk_1` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`),
  ADD CONSTRAINT `attribution_formations_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`formation_id`) REFERENCES `formations` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
