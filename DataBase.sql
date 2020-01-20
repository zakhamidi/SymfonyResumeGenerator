-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  lun. 20 jan. 2020 à 06:30
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `symfcv`
--

-- --------------------------------------------------------

--
-- Structure de la table `the_repos`
--

DROP TABLE IF EXISTS `the_repos`;
CREATE TABLE IF NOT EXISTS `the_repos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `reponame` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_9C6C6F39A76ED395` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `the_repos`
--

INSERT INTO `the_repos` (`id`, `user_id`, `reponame`, `link`, `description`) VALUES
(1, 1, 'Symfony resume', 'https://symfony.com/index.php/what-is-symfony', 'Framework that is goiung to make your programming easier '),
(2, 1, 'facebox', 'http://defunkt.io/facebox/', 'This repository has 1969 stars and 422 forks. If you would like more information about this repository and my contributed code, please visit the repo on GitHub.');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `the_repos`
--
ALTER TABLE `the_repos`
  ADD CONSTRAINT `FK_9C6C6F39A76ED395` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
