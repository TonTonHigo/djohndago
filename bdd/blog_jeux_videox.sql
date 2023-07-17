CREATE DATABASE blog_jeux;
USE blog_jeux;

CREATE TABLE `Articles` (
	`id_articles` INT NOT NULL AUTO_INCREMENT,
	`titre` varchar(30) NOT NULL,
	`contenu` TEXT(1000) NOT NULL,
	`date_publication` DATE NOT NULL,
	`categorie` varchar(20) NOT NULL,
	`id_auteurs` INT NOT NULL,
	PRIMARY KEY (`id_articles`)
);

CREATE TABLE `Auteurs` (
	`id_auteurs` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(20) NOT NULL,
	`bio` TEXT(1000) NOT NULL,
	`email` varchar(30) NOT NULL,
	`mdp` varchar(100) NOT NULL,
	`id_roles` INT NOT NULL,
	PRIMARY KEY (`id_auteurs`)
);

CREATE TABLE `Commentaires` (
	`id_commentaires` INT NOT NULL AUTO_INCREMENT,
	`contenu` TEXT NOT NULL,
	`date` DATE NOT NULL,
	`id_articles` INT NOT NULL,
	PRIMARY KEY (`id_commentaires`)
);

CREATE TABLE `Tags` (
	`id_tags` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(20) NOT NULL,
	PRIMARY KEY (`id_tags`)
);

CREATE TABLE `Articles_tags` (
	`id_articles_tags` INT NOT NULL AUTO_INCREMENT,
	`id_articles` INT NOT NULL,
	`id_tags` INT NOT NULL,
	PRIMARY KEY (`id_articles_tags`)
);

CREATE TABLE `Roles` (
	`id_roles` INT NOT NULL AUTO_INCREMENT,
	`nom` varchar(20) NOT NULL,
	PRIMARY KEY (`id_roles`)
);

ALTER TABLE `Articles` ADD CONSTRAINT `Articles_fk0` FOREIGN KEY (`id_auteurs`) REFERENCES `Auteurs`(`id_auteurs`);

ALTER TABLE `Auteurs` ADD CONSTRAINT `Auteurs_fk0` FOREIGN KEY (`id_roles`) REFERENCES `Roles`(`id_roles`);

ALTER TABLE `Commentaires` ADD CONSTRAINT `Commentaires_fk0` FOREIGN KEY (`id_articles`) REFERENCES `Articles`(`id_articles`);

ALTER TABLE `Articles_tags` ADD CONSTRAINT `Articles_tags_fk0` FOREIGN KEY (`id_articles`) REFERENCES `Articles`(`id_articles`);

ALTER TABLE `Articles_tags` ADD CONSTRAINT `Articles_tags_fk1` FOREIGN KEY (`id_tags`) REFERENCES `Tags`(`id_tags`);







