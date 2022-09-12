-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 17 juin 2022 à 12:48
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `petites_annonces`
--

-- --------------------------------------------------------

--
-- Structure de la table `annonces`
--

DROP TABLE IF EXISTS `annonces`;
CREATE TABLE IF NOT EXISTS `annonces` (
  `id_annonce` int(11) NOT NULL AUTO_INCREMENT,
  `nom_annonce` varchar(255) NOT NULL,
  `description_annonce` varchar(255) NOT NULL,
  `prix_annonce` float NOT NULL,
  `photo_annonce` varchar(255) NOT NULL,
  `date_depot` date NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `region_id` int(11) NOT NULL,
  PRIMARY KEY (`id_annonce`),
  KEY `categorie_id` (`categorie_id`),
  KEY `utilisateur_id` (`utilisateur_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `annonces`
--

INSERT INTO `annonces` (`id_annonce`, `nom_annonce`, `description_annonce`, `prix_annonce`, `photo_annonce`, `date_depot`, `categorie_id`, `utilisateur_id`, `region_id`) VALUES
(1, 'vélo', 'velo bleu decathlon\r\npour fille', 100, 'image/velo2.png', '2022-05-30', 2, 1, 7),
(2, 'maison a vendre', 'superbe maison à vendre à Meylan le Haut\r\n9 pièce avec piscine', 1000000, 'image/maison1.png', '2022-05-30', 1, 2, 1),
(3, 'appartement a vendre', 'appartement neuf à vendre à grenoble\r\nt 4 de 100 m2,\r\nquartier Saint Laurent\r\n', 350000, 'image/appartement2.png', '2022-05-30', 1, 1, 2);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `type_categorie` varchar(255) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_categorie`, `type_categorie`) VALUES
(1, 'immobilier'),
(2, 'loisir');

-- --------------------------------------------------------

--
-- Structure de la table `regions`
--

DROP TABLE IF EXISTS `regions`;
CREATE TABLE IF NOT EXISTS `regions` (
  `id_regions` int(11) NOT NULL AUTO_INCREMENT,
  `nom_region` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id_regions`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `regions`
--

INSERT INTO `regions` (`id_regions`, `nom_region`, `slug`) VALUES
(1, 'auvergnes-rhônes-alpes', 'auvergnesrhonesalpes'),
(2, 'provences-alpes-cote-d\'azur', 'provencesalpescotesdazur'),
(3, 'bourgogne', 'bourgogne'),
(4, 'basse-normandie', 'bassenormandie'),
(5, 'haute-normandie', 'hautenormandie'),
(6, 'champagne-adrenne', 'champagneardenne'),
(7, 'pays-de-la-loire', 'paysdelaloire');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id_utilisateur` int(255) NOT NULL AUTO_INCREMENT,
  `email_utilisateur` varchar(255) NOT NULL,
  `password_utilisateur` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id_utilisateur`, `email_utilisateur`, `password_utilisateur`, `role`) VALUES
(1, 'marine.calandri@gmail.com', 'marine', 'utilisateur'),
(2, 'florent.calandri@yahoo.fr', 'florent', 'administrateur'),
(3, 'test@test.fr', '$2y$10$BD5TyNms6jol148UneKoneILw5eLHY9YhR1cog348QS77oUyo1y1e', 'utilisateur'),
(4, 'marine38@gmail.com', '$2y$10$6niuBKACiMmognuEIJFglO381vsNbg5L1oG6d2fmXb9BmZoXw06CS', 'utilisateur'),
(5, '', '$2y$10$XOgcl3TATdPjuDZVX2QTo.JDnAjyfZkOPLRukZD6nyViDCEJO4GGe', 'utilisateur'),
(6, 'bob@gmail.com', '$2y$10$135oOzDxJQl9QKXeIRUi4eUCAABACiyHHsd1jHB0VxvA2ddr1A3F6', 'utilisateur'),
(7, 'marinella@gmail.com', '$2y$10$NmYkaUss1NP81nxttnwdpOcvQgQefD11pHYjcHcIgdXVb4L.NIpn.', 'utilisateur');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `annonces`
--
ALTER TABLE `annonces`
  ADD CONSTRAINT `annonces_ibfk_1` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id_regions`),
  ADD CONSTRAINT `annonces_ibfk_2` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id_categorie`),
  ADD CONSTRAINT `annonces_ibfk_3` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id_utilisateur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
