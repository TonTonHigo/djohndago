-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 27 juil. 2023 à 11:23
-- Version du serveur : 8.0.31
-- Version de PHP : 8.1.13

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

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id_articles` int NOT NULL AUTO_INCREMENT,
  `image` varchar(100) NOT NULL,
  `titre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `contenu` text NOT NULL,
  `date_publication` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `categorie` int NOT NULL,
  `id_auteurs` int NOT NULL,
  PRIMARY KEY (`id_articles`),
  KEY `FK_articles_auteurs` (`id_auteurs`),
  KEY `FK_articles_tags` (`categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_articles`, `image`, `titre`, `contenu`, `date_publication`, `categorie`, `id_auteurs`) VALUES
(8, 'site_exemples/img/21-games-keyart-01-07jun23$en.webp', 'LES DOUBLE A', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dignissim ligula at justo faucibus, ut tincidunt leo iaculis. Donec eu rhoncus nulla. Nunc feugiat eget dui a interdum. Phasellus sollicitudin nibh ex, eu egestas metus hendrerit eu. Nunc ornare viverra lorem, scelerisque blandit risus sollicitudin quis. Integer semper sollicitudin mi, vitae accumsan ante ultricies et. Sed eu justo et tellus tincidunt tincidunt. Mauris quis hendrerit tellus.\r\n\r\nEtiam risus mauris, aliquam a libero vel, semper efficitur leo. Suspendisse ac condimentum nisi, dapibus tincidunt massa. Donec turpis ante, aliquam et magna id, pulvinar aliquam ligula. Quisque vitae ligula dapibus, cursus nunc sed, sodales nisl. Sed blandit sodales mauris, in blandit metus feugiat id. Mauris eget laoreet quam, semper tincidunt risus. Etiam diam metus, aliquet vitae faucibus vitae, dapibus sit amet justo. Donec molestie tincidunt tincidunt. Sed a cursus ex. Integer sodales massa orci, sed commodo mi eleifend non. Morbi maximus consequat justo sit amet euismod. Aliquam sollicitudin tellus elit, id molestie leo eleifend eu. Integer eu bibendum dui. Vivamus quam lorem, posuere in mattis id, ultrices eu ipsum. Aliquam est lacus, pulvinar eget placerat nec, egestas non elit.', '2023-07-24 20:00:00', 2, 9),
(9, 'site_exemples/img/51210247455_44ba05ebec_k.webp', 'After the fall', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque dignissim ligula at justo faucibus, ut tincidunt leo iaculis. Donec eu rhoncus nulla. Nunc feugiat eget dui a interdum. Phasellus sollicitudin nibh ex, eu egestas metus hendrerit eu. Nunc ornare viverra lorem, scelerisque blandit risus sollicitudin quis. Integer semper sollicitudin mi, vitae accumsan ante ultricies et. Sed eu justo et tellus tincidunt tincidunt. Mauris quis hendrerit tellus.\r\n\r\nEtiam risus mauris, aliquam a libero vel, semper efficitur leo. Suspendisse ac condimentum nisi, dapibus tincidunt massa. Donec turpis ante, aliquam et magna id, pulvinar aliquam ligula. Quisque vitae ligula dapibus, cursus nunc sed, sodales nisl. Sed blandit sodales mauris, in blandit metus feugiat id. Mauris eget laoreet quam, semper tincidunt risus. Etiam diam metus, aliquet vitae faucibus vitae, dapibus sit amet justo. Donec molestie tincidunt tincidunt. Sed a cursus ex. Integer sodales massa orci, sed commodo mi eleifend non. Morbi maximus consequat justo sit amet euismod. Aliquam sollicitudin tellus elit, id molestie leo eleifend eu. Integer eu bibendum dui. Vivamus quam lorem, posuere in mattis id, ultrices eu ipsum. Aliquam est lacus, pulvinar eget placerat nec, egestas non elit.', '2023-07-24 20:00:00', 6, 9),
(10, 'site_exemples/img/battlefield-2042-logo.webp', 'LE PIRE BATTLEFIELD', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vehicula dignissim odio. Mauris eu mollis mauris, eget feugiat nisl. Sed lorem metus, fringilla eget mattis eget, semper vitae arcu. Maecenas vulputate sem enim, sed mattis odio sagittis vitae. Integer aliquet in augue quis volutpat. Praesent tincidunt ex id ultrices semper. Vestibulum et dui semper, ultrices sapien in, tempor est. Praesent pharetra bibendum eros ut aliquam. Nam ac eleifend nisl. Suspendisse tortor massa, imperdiet sit amet nisl ut, feugiat congue diam. Nullam id orci velit. Vivamus vel tristique felis. Sed cursus quis sapien euismod tempus. Proin rutrum eros dignissim ipsum eleifend, in cursus dui ullamcorper.\r\n\r\nAliquam erat volutpat. Nunc condimentum mattis massa, iaculis venenatis lacus tempor sit amet. Integer id eros consectetur, gravida turpis vel, viverra ipsum. Nam nec commodo nunc. Sed condimentum turpis nec nisl molestie fringilla. Phasellus blandit aliquam semper. Etiam scelerisque nunc et efficitur vestibulum. Vestibulum id justo cursus, dapibus dolor eu, consequat diam. Proin ullamcorper sem vel suscipit dictum. Sed eget ullamcorper risus, vel pulvinar nisl.', '2023-07-26 20:00:00', 1, 9),
(11, 'site_exemples/img/bm.jpg', 'Le meilleur jeu de course', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel ex nec sapien dignissim malesuada nec a mi. Morbi fermentum facilisis rutrum. Praesent condimentum, diam vitae tempor pretium, velit lacus condimentum nulla, vitae iaculis mauris odio at nulla. Donec varius augue in porttitor pellentesque. Nulla consectetur sit amet leo vitae pretium. Nullam posuere turpis ut ultrices egestas. Aliquam quis diam efficitur, tincidunt mi in, feugiat neque. Nullam ut tellus efficitur, vestibulum ex eget, viverra metus. Morbi suscipit quam vitae tortor consectetur eleifend. Duis porta scelerisque leo sit amet pellentesque. Donec fringilla, diam vitae malesuada aliquet, sapien augue fringilla libero, non condimentum nunc nulla ut nibh. Curabitur placerat enim at lectus semper, pharetra pretium nisl fringilla. Phasellus ut massa nec ipsum dapibus pulvinar. Etiam aliquet urna id nulla sagittis euismod. Sed fringilla libero sit amet gravida laoreet. Nunc at maximus enim.\r\n\r\nFusce laoreet lorem eget risus aliquet, efficitur convallis purus feugiat. Nunc condimentum, orci sed imperdiet pellentesque, nulla metus porta sem, at congue justo quam quis odio. Nunc facilisis lectus orci, nec pretium dui porta in. Pellentesque scelerisque vehicula neque, id dapibus justo sollicitudin bibendum. Quisque gravida elit at interdum interdum. Donec egestas condimentum blandit. Integer nec finibus eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam ultrices vitae arcu eget tempus. Sed scelerisque elit ac pharetra sodales. Vestibulum porta viverra nulla sed luctus.', '2023-07-26 20:00:00', 7, 9),
(12, 'site_exemples/img/call-of-duty-warzone-photo-1381831.webp', 'Warzone: Une maj de trop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris vel ex nec sapien dignissim malesuada nec a mi. Morbi fermentum facilisis rutrum. Praesent condimentum, diam vitae tempor pretium, velit lacus condimentum nulla, vitae iaculis mauris odio at nulla. Donec varius augue in porttitor pellentesque. Nulla consectetur sit amet leo vitae pretium. Nullam posuere turpis ut ultrices egestas. Aliquam quis diam efficitur, tincidunt mi in, feugiat neque. Nullam ut tellus efficitur, vestibulum ex eget, viverra metus. Morbi suscipit quam vitae tortor consectetur eleifend. Duis porta scelerisque leo sit amet pellentesque. Donec fringilla, diam vitae malesuada aliquet, sapien augue fringilla libero, non condimentum nunc nulla ut nibh. Curabitur placerat enim at lectus semper, pharetra pretium nisl fringilla. Phasellus ut massa nec ipsum dapibus pulvinar. Etiam aliquet urna id nulla sagittis euismod. Sed fringilla libero sit amet gravida laoreet. Nunc at maximus enim.\r\n\r\nFusce laoreet lorem eget risus aliquet, efficitur convallis purus feugiat. Nunc condimentum, orci sed imperdiet pellentesque, nulla metus porta sem, at congue justo quam quis odio. Nunc facilisis lectus orci, nec pretium dui porta in. Pellentesque scelerisque vehicula neque, id dapibus justo sollicitudin bibendum. Quisque gravida elit at interdum interdum. Donec egestas condimentum blandit. Integer nec finibus eros. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam ultrices vitae arcu eget tempus. Sed scelerisque elit ac pharetra sodales. Vestibulum porta viverra nulla sed luctus.', '2023-07-26 20:00:00', 1, 9),
(13, 'site_exemples/img/daysgone.jpg', 'L\'open world de trop', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam luctus condimentum lorem, in ultrices ligula luctus ac. Pellentesque auctor ex at convallis bibendum. Nulla pellentesque non nibh quis dictum. Mauris dapibus lacinia ligula. Quisque sed venenatis nibh. Nulla lobortis dolor sit amet viverra feugiat. Nulla id elit nec elit hendrerit vestibulum. Nullam consequat felis at tincidunt ullamcorper. Maecenas a eros et nibh dignissim commodo eu sit amet felis. Donec nulla erat, consequat ut turpis eget, eleifend placerat lacus. Ut ut enim vehicula, lobortis nulla vehicula, imperdiet lectus.\r\n\r\nQuisque mattis id nisi nec commodo. Vivamus rhoncus nisi in augue elementum, id molestie enim facilisis. Etiam non feugiat turpis. Curabitur ut tristique urna. Aliquam eget magna efficitur enim pharetra egestas. Vivamus consectetur scelerisque ligula sed lacinia. Quisque mollis bibendum augue, sit amet maximus lacus vehicula ut. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Vivamus nec leo efficitur, molestie nibh non, viverra purus. Sed tristique, felis non volutpat volutpat, lorem orci facilisis nunc, sed facilisis urna nibh a mauris.', '2023-07-27 04:53:45', 3, 9),
(14, 'site_exemples/img/fps game image.jpg', 'Les meilleurs FPS de l\'année', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam sed volutpat eros, non varius sapien. Pellentesque dignissim eget justo ut ultricies. Aenean scelerisque vulputate libero, nec egestas metus mollis at. Nulla interdum turpis sit amet aliquet imperdiet. Duis vel velit vitae sem feugiat condimentum. Interdum et malesuada fames ac ante ipsum primis in faucibus. In enim libero, mollis vitae arcu eu, dignissim sagittis ante. Donec convallis ex vel diam luctus euismod. In at dictum mauris. Maecenas volutpat maximus congue. Sed quis nisi pulvinar, sollicitudin felis vitae, convallis urna. Aenean vestibulum erat nec risus semper, condimentum elementum orci dictum. Proin ornare urna augue, et ullamcorper libero cursus vitae. Duis eu egestas mauris, eget tristique mi. Vestibulum orci dui, venenatis ut porta tempor, pretium ac lectus.\r\n\r\nProin porta interdum orci, in venenatis turpis. Vestibulum blandit condimentum arcu sed eleifend. Nam congue magna ut nisl accumsan rutrum. Nulla libero massa, dignissim ac ultrices sit amet, interdum quis augue. Integer imperdiet fermentum laoreet. Etiam finibus ut justo ac lacinia. Cras tincidunt suscipit massa ac lobortis. Suspendisse in lacus nisl. Ut metus tortor, facilisis quis hendrerit id, venenatis venenatis nulla. Suspendisse et metus a nulla imperdiet pharetra.', '2023-07-27 05:13:18', 1, 9),
(15, 'site_exemples/img/decorpackman.jpg', 'L\'arcade à l\'ancienne', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla rhoncus scelerisque sapien, a iaculis justo faucibus non. Curabitur dignissim volutpat tincidunt. Sed id tellus et lorem bibendum faucibus at volutpat ante. Sed condimentum dui quam, sit amet lobortis lacus ultrices non. Integer arcu odio, viverra ac rutrum id, ultricies a sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis maximus turpis lorem, ac rhoncus justo placerat non.\r\n\r\nSuspendisse lorem elit, fringilla id libero in, vehicula mollis odio. Pellentesque vitae justo posuere, fermentum erat in, porta justo. Ut malesuada vulputate nibh, vitae accumsan odio sodales ut. Aliquam interdum euismod felis, eu scelerisque est tincidunt non. Suspendisse potenti. Ut at enim tristique, rhoncus dolor mattis, bibendum sem. Maecenas interdum risus at magna dignissim, sit amet sodales eros dictum. Fusce ut tempor est. Integer ultrices odio a nulla fermentum, sit amet mollis urna pellentesque. Nunc in augue non massa cursus iaculis at in odio.', '2023-07-27 05:18:14', 4, 9),
(17, 'site_exemples/img/decor (19).jpg', 'La difficulté dans les jeux', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque volutpat consectetur dapibus. Ut ut purus porta, sagittis massa ac, sollicitudin magna. Quisque vitae leo et ipsum consequat aliquam. Maecenas pulvinar maximus hendrerit. Praesent congue tempor urna, vel posuere orci hendrerit ac. Integer lacus dui, luctus eu odio eget, consectetur rhoncus purus. Aliquam sit amet justo id nisl bibendum porttitor at in dolor. In dapibus justo eget gravida pulvinar.\r\n\r\nNunc tincidunt neque eget eros mattis, in laoreet turpis sodales. Curabitur ornare augue eget elit bibendum, vitae tempor justo viverra. Quisque magna mauris, suscipit et iaculis in, placerat vitae nisi. Praesent ultrices ligula vitae vulputate interdum. Sed semper, leo eget porta dictum, odio nulla efficitur libero, eget faucibus ligula nisi ac mi. Nulla at efficitur leo. Nunc lacinia, nulla eget congue blandit, diam ante aliquam justo, convallis blandit orci sapien nec est. Aenean eget dui ex. Praesent elementum metus vel lacinia placerat. Phasellus enim justo, ultricies at tempor eget, imperdiet quis purus. Interdum et malesuada fames ac ante ipsum primis in faucibus. Nullam velit purus, tempor ac ornare nec, convallis id nulla. Quisque pulvinar aliquet est, vel imperdiet enim aliquet id. Maecenas sit amet ipsum vulputate, bibendum orci et, vulputate lorem. Nam pharetra sed odio at imperdiet.', '2023-07-27 05:20:35', 6, 9);

-- --------------------------------------------------------

--
-- Structure de la table `articles_tags`
--

DROP TABLE IF EXISTS `articles_tags`;
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

DROP TABLE IF EXISTS `auteurs`;
CREATE TABLE IF NOT EXISTS `auteurs` (
  `id_auteurs` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `bio` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(30) NOT NULL,
  `mdp` varchar(100) NOT NULL,
  `id_roles` int NOT NULL,
  PRIMARY KEY (`id_auteurs`),
  KEY `FK_auteurs_roles` (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `auteurs`
--

INSERT INTO `auteurs` (`id_auteurs`, `nom`, `bio`, `email`, `mdp`, `id_roles`) VALUES
(7, 'zaza', '', 'zaza@gmail.com', '$2y$10$n26IRXjI5n.ypiF9ekeRKuJY/UQxZnhmBRFGNCsMCxtxXH0Ld61ay', 3),
(8, 'merci', '', 'cool@gmail.com', '$2y$10$zo/kJBJa1zlgOFxItjPQxOmgd1csg4lrc//y4gKmEspOU2f9xRTay', 3),
(9, 'dain', '', 'tontonhigo@gmail.com', '$2y$10$vbGyMbfTBV5cJl227mP83.O0X45911l02f03cozuFfhpt2d1CSLe6', 2),
(10, 'john', '', 'johnnosilegloire@gmail.com', '$2y$10$bhItMKbL0vPTynxYc4qp0ODRlvNbs/9cgrtfEm3fRU5WLgmI60xF6', 2),
(11, 'golum', '', 'gol@gmail.com', '$2y$10$KL4AnVc0du7lE0C02.Hzue68T9tqp1FfbJZ98mfh.puWbFjbCiopm', 3);

-- --------------------------------------------------------

--
-- Structure de la table `commentaires`
--

DROP TABLE IF EXISTS `commentaires`;
CREATE TABLE IF NOT EXISTS `commentaires` (
  `id_commentaires` int NOT NULL AUTO_INCREMENT,
  `contenu` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_articles` int NOT NULL,
  `id_auteurs` int NOT NULL,
  PRIMARY KEY (`id_commentaires`),
  KEY `FK_commentaires_articles` (`id_articles`),
  KEY `FK_commentaires_auteurs` (`id_auteurs`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `commentaires`
--

INSERT INTO `commentaires` (`id_commentaires`, `contenu`, `date`, `id_articles`, `id_auteurs`) VALUES
(12, 'shesh c\'est zaza', '2023-07-26 05:42:26', 8, 7),
(13, 'mon précieux!!!', '2023-07-26 05:43:31', 8, 11),
(14, 'lol le jeu i existe meme pas', '2023-07-26 05:56:33', 9, 11),
(15, 'test commentaire', '2023-07-26 06:19:50', 9, 9),
(16, 'chiot', '2023-07-26 06:35:48', 9, 7);

-- --------------------------------------------------------

--
-- Structure de la table `contacts`
--

DROP TABLE IF EXISTS `contacts`;
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

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_roles` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_roles`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id_roles`, `nom`) VALUES
(1, 'visiteur'),
(2, 'admin'),
(3, 'abonné');

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id_tags` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tags`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `tags`
--

INSERT INTO `tags` (`id_tags`, `nom`) VALUES
(1, 'FPS'),
(2, 'ACTU'),
(3, 'OPEN WORLD'),
(4, 'ARCADE'),
(5, 'COMBAT'),
(6, 'VIOLENCES'),
(7, 'COURSES');

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
  ADD CONSTRAINT `FK_commentaires_articles` FOREIGN KEY (`id_articles`) REFERENCES `articles` (`id_articles`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_commentaires_auteurs` FOREIGN KEY (`id_auteurs`) REFERENCES `auteurs` (`id_auteurs`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
