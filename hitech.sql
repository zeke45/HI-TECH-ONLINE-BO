-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Client :  localhost
-- Généré le :  Jeu 27 Août 2015 à 07:36
-- Version du serveur :  5.5.44-0ubuntu0.12.04.1
-- Version de PHP :  5.3.10-1ubuntu3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `hitech`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `nomCategorie` varchar(30) DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categories`
--

INSERT INTO `categories` (`id`, `nomCategorie`, `description`) VALUES
(1, 'Vêtements', 'produit textile.'),
(2, 'Informatique', 'produit informatique.');

-- --------------------------------------------------------

--
-- Structure de la table `droits`
--

CREATE TABLE IF NOT EXISTS `droits` (
  `iddroits` int(11) NOT NULL,
  `droit` varchar(50) DEFAULT NULL,
  `libelle` varchar(100) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenements`
--

CREATE TABLE IF NOT EXISTS `evenements` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) DEFAULT NULL,
  `dateDebut` datetime DEFAULT NULL,
  `dateFin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenements_clients`
--

CREATE TABLE IF NOT EXISTS `evenements_clients` (
  `client_id` int(11) NOT NULL,
  `evenements_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `evenements_produits`
--

CREATE TABLE IF NOT EXISTS `evenements_produits` (
  `produit_id` int(11) NOT NULL,
  `evenements_id` int(11) NOT NULL,
  `remise` float DEFAULT NULL,
  `quantité` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `lignesproduit`
--

CREATE TABLE IF NOT EXISTS `lignesproduit` (
  `quantite` int(11) DEFAULT NULL,
  `prix` float DEFAULT NULL,
  `panier_id` int(11) NOT NULL,
  `produit_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paniers`
--

CREATE TABLE IF NOT EXISTS `paniers` (
  `id` int(11) NOT NULL,
  `prixTotal` float DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `idSession` varchar(50) DEFAULT NULL,
  `client_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) NOT NULL,
  `codeProduitGenerique` varchar(30) DEFAULT NULL,
  `prixUnitaire` float DEFAULT NULL,
  `idProduitCategorie` int(11) NOT NULL,
  `stock` int(11) DEFAULT NULL,
  `image` blob NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id_role` int(11) NOT NULL,
  `libelle` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `roles`
--

INSERT INTO `roles` (`id_role`, `libelle`) VALUES
(1, 'administrateur'),
(2, 'client'),
(3, 'administrateur'),
(4, 'client');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_droits`
--

CREATE TABLE IF NOT EXISTS `role_has_droits` (
  `role_id_role` int(11) NOT NULL,
  `droits_iddroits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `souscategories`
--

CREATE TABLE IF NOT EXISTS `souscategories` (
  `id` int(11) NOT NULL,
  `nomCategorie` varchar(30) DEFAULT NULL,
  `description` varchar(60) DEFAULT NULL,
  `categorie_id` int(11) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `dateInscription` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `telephone` varchar(30) DEFAULT NULL,
  `pseudonyme` varchar(16) CHARACTER SET utf8 DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `adresse` varchar(50) DEFAULT NULL,
  `codePostal` varchar(10) DEFAULT NULL,
  `ville` varchar(25) DEFAULT NULL,
  `pays` varchar(25) DEFAULT NULL,
  `clientValide` tinyint(1) DEFAULT NULL,
  `newsletter` tinyint(1) DEFAULT NULL,
  `actif` tinyint(1) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur_has_role`
--

CREATE TABLE IF NOT EXISTS `utilisateur_has_role` (
  `utilisateur_id` int(11) NOT NULL,
  `role_id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `droits`
--
ALTER TABLE `droits`
  ADD PRIMARY KEY (`iddroits`);

--
-- Index pour la table `evenements`
--
ALTER TABLE `evenements`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `evenements_clients`
--
ALTER TABLE `evenements_clients`
  ADD PRIMARY KEY (`client_id`,`evenements_id`),
  ADD KEY `fk_client_has_evenements_evenements1_idx` (`evenements_id`),
  ADD KEY `fk_client_has_evenements_client1_idx` (`client_id`);

--
-- Index pour la table `evenements_produits`
--
ALTER TABLE `evenements_produits`
  ADD PRIMARY KEY (`produit_id`,`evenements_id`),
  ADD KEY `fk_Produit_has_evenements_evenements1_idx` (`evenements_id`),
  ADD KEY `fk_Produit_has_evenements_Produit1_idx` (`produit_id`);

--
-- Index pour la table `lignesproduit`
--
ALTER TABLE `lignesproduit`
  ADD PRIMARY KEY (`panier_id`,`produit_id`),
  ADD KEY `fk_ligneProduit_Panier1_idx` (`panier_id`),
  ADD KEY `fk_ligneProduit_Produit1_idx` (`produit_id`);

--
-- Index pour la table `paniers`
--
ALTER TABLE `paniers`
  ADD PRIMARY KEY (`id`,`client_id`),
  ADD KEY `fk_Panier_client1_idx` (`client_id`);

--
-- Index pour la table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idProduitCategorie` (`idProduitCategorie`);

--
-- Index pour la table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_role`);

--
-- Index pour la table `role_has_droits`
--
ALTER TABLE `role_has_droits`
  ADD PRIMARY KEY (`role_id_role`,`droits_iddroits`),
  ADD KEY `fk_role_has_droits_droits1_idx` (`droits_iddroits`),
  ADD KEY `fk_role_has_droits_role1_idx` (`role_id_role`);

--
-- Index pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_souscategories_categories1_idx` (`categorie_id`),
  ADD KEY `categories_id` (`categorie_id`),
  ADD KEY `categories_id_2` (`categorie_id`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `utilisateur_has_role`
--
ALTER TABLE `utilisateur_has_role`
  ADD PRIMARY KEY (`utilisateur_id`,`role_id_role`),
  ADD KEY `fk_utilisateur_has_role_role1_idx` (`role_id_role`),
  ADD KEY `fk_utilisateur_has_role_utilisateur1_idx` (`utilisateur_id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `droits`
--
ALTER TABLE `droits`
  MODIFY `iddroits` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `evenements`
--
ALTER TABLE `evenements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `paniers`
--
ALTER TABLE `paniers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `roles`
--
ALTER TABLE `roles`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT pour la table `souscategories`
--
ALTER TABLE `souscategories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `lignesproduit`
--
ALTER TABLE `lignesproduit`
  ADD CONSTRAINT `lignesproduit_ibfk_2` FOREIGN KEY (`produit_id`) REFERENCES `produits` (`id`),
  ADD CONSTRAINT `lignesproduit_ibfk_1` FOREIGN KEY (`panier_id`) REFERENCES `paniers` (`id`);

--
-- Contraintes pour la table `produits`
--
ALTER TABLE `produits`
  ADD CONSTRAINT `produits_ibfk_2` FOREIGN KEY (`idProduitCategorie`) REFERENCES `souscategories` (`id`),
  ADD CONSTRAINT `produits_ibfk_1` FOREIGN KEY (`idProduitCategorie`) REFERENCES `souscategories` (`id`);

--
-- Contraintes pour la table `souscategories`
--
ALTER TABLE `souscategories`
  ADD CONSTRAINT `souscategorie` FOREIGN KEY (`categorie_id`) REFERENCES `categories` (`id`);

--
-- Contraintes pour la table `utilisateur_has_role`
--
ALTER TABLE `utilisateur_has_role`
  ADD CONSTRAINT `fk_utilisateur_has_role_role1` FOREIGN KEY (`role_id_role`) REFERENCES `roles` (`id_role`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_has_role_utilisateur1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
