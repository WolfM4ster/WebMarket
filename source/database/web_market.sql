-- phpMyAdmin SQL Dump
-- version 4.5.4.1
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Mer 04 Janvier 2017 à 22:41
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `web_market`
--
CREATE DATABASE IF NOT EXISTS `web_market` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `web_market`;

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `id_client` int(4) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `mdp` text NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `email` varchar(20) NOT NULL,
  `adresse` text NOT NULL,
  `tel` varchar(10) NOT NULL,
  PRIMARY KEY (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `mdp`, `admin`, `email`, `adresse`, `tel`) VALUES
(9, 'admin', 'tata', 'admin06', 1, 'sdsd@toto', '280 Avenue de la Bermone  Montfleuri - Bât K', '0651046689'),
(11, 'dupont', 'michel', 'test', 0, 'kyo.alone@gmail.com', '3 avenue des bleuet06000 Nice', '06060606');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

DROP TABLE IF EXISTS `facture`;
CREATE TABLE IF NOT EXISTS `facture` (
  `id_facture` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) NOT NULL,
  `date_creation` int(20) NOT NULL,
  `total_ht` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_ttc` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_facture`),
  KEY `fk_Facturation_Client_idx` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

DROP TABLE IF EXISTS `fournisseur`;
CREATE TABLE IF NOT EXISTS `fournisseur` (
  `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_fournisseur`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `gestion_stock`
--

DROP TABLE IF EXISTS `gestion_stock`;
CREATE TABLE IF NOT EXISTS `gestion_stock` (
  `id_fournisseur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_fournisseur`,`id_produit`),
  KEY `fk_GestionStock_Fournisseur1_idx` (`id_fournisseur`),
  KEY `fk_GestionStock_Produit1_idx` (`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_facture`
--

DROP TABLE IF EXISTS `ligne_facture`;
CREATE TABLE IF NOT EXISTS `ligne_facture` (
  `id_facture` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `prix_unitaire` decimal(10,2) NOT NULL DEFAULT '0.00',
  `quantite` int(11) DEFAULT NULL,
  `prix_ht` decimal(10,2) DEFAULT NULL,
  `prix_ttc` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_facture`,`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

DROP TABLE IF EXISTS `panier`;
CREATE TABLE IF NOT EXISTS `panier` (
  `id_client` int(10) UNSIGNED NOT NULL,
  `id_produit` int(10) UNSIGNED NOT NULL,
  `quantite_panier` int(10) UNSIGNED NOT NULL,
  PRIMARY KEY (`id_client`,`id_produit`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id_produit` int(15) NOT NULL AUTO_INCREMENT,
  `titre` varchar(200) NOT NULL,
  `type` varchar(30) NOT NULL,
  `marque` varchar(30) NOT NULL,
  `image` text NOT NULL,
  `description` text NOT NULL,
  `quantite_stock` int(10) UNSIGNED NOT NULL,
  `prix_public` decimal(10,2) NOT NULL,
  `prix_achat` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id_produit`),
  KEY `Type_Produit` (`type`),
  KEY `Marque_Produit` (`marque`),
  KEY `Stock_Produit` (`quantite_stock`),
  KEY `Prix_Produit` (`prix_public`),
  KEY `titre` (`titre`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `titre`, `type`, `marque`, `image`, `description`, `quantite_stock`, `prix_public`, `prix_achat`) VALUES
(1, 'ipod nano', 'MP3 Player', 'apple', 'images/mobiles/nokia/1110i.jpg', '', 6, '58.00', '0.00'),
(2, 'Asus F3T', 'Ordinateur', 'asus', 'images/CDs/ulm/dance2008.jpg', '', 12, '599.00', '0.00'),
(3, 'ipod nano NT', 'MP3 Player', 'apple', 'images/mobiles/nokia/1110i.jpg', '', 14, '65.00', '0.00'),
(4, 'ipod nano ZT', 'MP3 Player', 'apple', 'images/mobiles/nokia/1110i.jpg', '', 15, '210.00', '0.00'),
(5, 'ipod nano NZ', 'MP3 Player', 'apple', 'images/mobiles/nokia/1110i.jpg', '', 4, '156.00', '0.00'),
(6, 'ipod nano NX', 'MP3 Player', 'apple', 'images/mobiles/nokia/1110i.jpg', '', 14, '310.00', '0.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
