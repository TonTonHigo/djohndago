-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 19 juil. 2023 à 06:56
-- Version du serveur : 8.0.31
-- Version de PHP : 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `blog_jeux`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id_articles` int NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `titre` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  `date_publication` date NOT NULL,
  `categorie` int NOT NULL,
  `id_auteurs` int NOT NULL,
  PRIMARY KEY (`id_articles`),
  KEY `FK_articles_auteurs` (`id_auteurs`),
  KEY `FK_articles_tags` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `image`, `titre`, `contenu`, `date_publication`, `categorie`, `id_auteurs`) VALUES
(1, 'site_exemples/img/21-games-keyart-01-07jun23$en.webp', 'Double A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur ex facilisis est lacinia rutrum. Cras porttitor lorem ipsum, vitae condimentum sapien vestibulum in. Donec at suscipit felis. Pellentesque tristique urna bibendum nulla ultricies bibendum. Pellentesque pulvinar, ante ac elementum ultrices, mi neque vulputate lorem, non volutpat ipsum risus ac est. Pellentesque mattis, mauris nec mattis pharetra, massa nulla placerat arcu, ut faucibus tortor ex non felis. Nunc sed hendrerit sapien, non mattis quam. Phasellus sed lobortis nisi. Curabitur maximus tortor molestie, porta nisl sit amet, pulvinar quam. Ut odio purus, consectetur nec nisi sed, dapibus scelerisque metus. Fusce tincidunt augue consequat, euismod purus at, mollis risus. Phasellus ut cursus tellus. In vel venenatis erat.\r\n\r\nDonec tristique, dolor in vulputate dapibus, felis dolor dignissim turpis, non fermentum urna nibh nec augue. Integer vestibulum neque arcu, et tristique mauris placerat ac. Proin felis nisl, pellentesque sit amet eleifend a, porta quis ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec auctor eget metus nec eleifend. Suspendisse scelerisque congue pharetra. Aenean sed nisl vel quam tristique cursus et sit amet tortor. Morbi fermentum mattis diam, sit amet ornare turpis vestibulum quis. Cras vitae elit at lorem scelerisque tempor nec id augue. Nam tempor finibus elit eget pharetra. Nunc egestas nunc eget erat tristique scelerisque id non quam. Integer porttitor vulputate elit vitae iaculis.', '2023-07-19', 2, 1),
(2, 'site_exemples/img/decolastofusblackandwhite.jpg', 'The last of us 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur ex facilisis est lacinia rutrum. Cras porttitor lorem ipsum, vitae condimentum sapien vestibulum in. Donec at suscipit felis. Pellentesque tristique urna bibendum nulla ultricies bibendum. Pellentesque pulvinar, ante ac elementum ultrices, mi neque vulputate lorem, non volutpat ipsum risus ac est. Pellentesque mattis, mauris nec mattis pharetra, massa nulla placerat arcu, ut faucibus tortor ex non felis. Nunc sed hendrerit sapien, non mattis quam. Phasellus sed lobortis nisi. Curabitur maximus tortor molestie, porta nisl sit amet, pulvinar quam. Ut odio purus, consectetur nec nisi sed, dapibus scelerisque metus. Fusce tincidunt augue consequat, euismod purus at, mollis risus. Phasellus ut cursus tellus. In vel venenatis erat.\r\n\r\nDonec tristique, dolor in vulputate dapibus, felis dolor dignissim turpis, non fermentum urna nibh nec augue. Integer vestibulum neque arcu, et tristique mauris placerat ac. Proin felis nisl, pellentesque sit amet eleifend a, porta quis ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec auctor eget metus nec eleifend. Suspendisse scelerisque congue pharetra. Aenean sed nisl vel quam tristique cursus et sit amet tortor. Morbi fermentum mattis diam, sit amet ornare turpis vestibulum quis. Cras vitae elit at lorem scelerisque tempor nec id augue. Nam tempor finibus elit eget pharetra. Nunc egestas nunc eget erat tristique scelerisque id non quam. Integer porttitor vulputate elit vitae iaculis.', '2023-07-19', 2, 2),
(3, 'site_exemples/img/decor (30).jpg', 'Days Gone', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum efficitur ex facilisis est lacinia rutrum. Cras porttitor lorem ipsum, vitae condimentum sapien vestibulum in. Donec at suscipit felis. Pellentesque tristique urna bibendum nulla ultricies bibendum. Pellentesque pulvinar, ante ac elementum ultrices, mi neque vulputate lorem, non volutpat ipsum risus ac est. Pellentesque mattis, mauris nec mattis pharetra, massa nulla placerat arcu, ut faucibus tortor ex non felis. Nunc sed hendrerit sapien, non mattis quam. Phasellus sed lobortis nisi. Curabitur maximus tortor molestie, porta nisl sit amet, pulvinar quam. Ut odio purus, consectetur nec nisi sed, dapibus scelerisque metus. Fusce tincidunt augue consequat, euismod purus at, mollis risus. Phasellus ut cursus tellus. In vel venenatis erat.\r\n\r\nDonec tristique, dolor in vulputate dapibus, felis dolor dignissim turpis, non fermentum urna nibh nec augue. Integer vestibulum neque arcu, et tristique mauris placerat ac. Proin felis nisl, pellentesque sit amet eleifend a, porta quis ante. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec auctor eget metus nec eleifend. Suspendisse scelerisque congue pharetra. Aenean sed nisl vel quam tristique cursus et sit amet tortor. Morbi fermentum mattis diam, sit amet ornare turpis vestibulum quis. Cras vitae elit at lorem scelerisque tempor nec id augue. Nam tempor finibus elit eget pharetra. Nunc egestas nunc eget erat tristique scelerisque id non quam. Integer porttitor vulputate elit vitae iaculis.', '2023-07-19', 6, 3);

-- --------------------------------------------------------

--
-- Structure de la table `articles_tags`
--


CREATE TABLE IF NOT EXISTS `articles_tags` (
  `id_articles_tags` int NOT NULL AUTO_INCREMENT,
  `id_articles` int NOT NULL,
  `id_tags` int NOT NULL,
  PRIMARY KEY (`id_articles_tags`),
  KEY `FK_articles_tags_tags` (`id_tags`),
  KEY `FK_articles_tags_articles` (`id_articles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `auteurs`
--


CREATE TABLE IF NOT EXISTS `auteurs` (
  `id_auteurs` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `bio` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `id_roles` int NOT NULL,
  PRIMARY KEY (`id_auteurs`),
  KEY `FK_auteurs_roles` (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id_auteurs`, `nom`, `bio`, `email`, `mdp`, `id_roles`) VALUES
(1, 'DAIN', 'flemmard', 'hugoh420@outlook.fr', 'poulet', 2),
(2, 'LAFOSSE', 'obsédé', 'lafosse.damien@outlook.fr', 'tang', 2),
(3, 'NOSILE', 'le silencieux', 'johnnosilegloire@gmail.com', 'cabri', 2);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--


CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaires` int NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `date` date NOT NULL,
  `id_articles` int NOT NULL,
  PRIMARY KEY (`id_commentaires`),
  KEY `FK_commentaires_articles` (`id_articles`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--


CREATE TABLE IF NOT EXISTS `contacts` (
  `id_contacts` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `contenu` text NOT NULL,
  PRIMARY KEY (`id_contacts`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--


CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_roles`, `nom`) VALUES
(1, 'visiteur'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--


CREATE TABLE IF NOT EXISTS `tags` (
  `id_tags` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tags`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id_tags`, `nom`) VALUES
(1, 'FPS'),
(2, 'ACTU'),
(3, 'OPEN WORLD'),
(4, 'ARCADE'),
(5, 'COMBAT'),
(6, 'VIOLENCES');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `FK_articles_auteurs` FOREIGN KEY (`id_auteurs`) REFERENCES `auteurs` (`id_auteurs`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_articles_tags` FOREIGN KEY (`categorie`) REFERENCES `tags` (`id_tags`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `articles_tags`
--
ALTER TABLE `articles_tags`
  ADD CONSTRAINT `FK_articles_tags_articles` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id_articles`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_articles_tags_tags` FOREIGN KEY (`id_tags`) REFERENCES `tags` (`id_tags`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `auteurs`
--
ALTER TABLE `auteurs`
  ADD CONSTRAINT `FK_auteurs_roles` FOREIGN KEY (`id_roles`) REFERENCES `roles` (`id_roles`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `commentaires`
--
ALTER TABLE `commentaires`
  ADD CONSTRAINT `FK_commentaires_articles` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id_articles`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
