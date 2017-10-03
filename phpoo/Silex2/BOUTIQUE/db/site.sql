-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 24 Juillet 2017 à 15:08
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `site`
--

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(3) NOT NULL,
  `id_membre` int(3) NOT NULL,
  `montant` int(3) NOT NULL,
  `date_enregistrement` datetime NOT NULL,
  `etat` enum('en cours de traitement','envoyé','livré') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id_commande`, `id_membre`, `montant`, `date_enregistrement`, `etat`) VALUES
(1, 3, 59, '2017-06-12 14:33:34', 'en cours de traitement'),
(2, 3, 138, '2017-06-12 14:59:42', 'en cours de traitement'),
(3, 3, 295, '2017-06-12 15:18:30', 'en cours de traitement'),
(4, 3, 395, '2017-06-12 15:38:16', 'en cours de traitement'),
(5, 3, 49, '2017-06-12 15:43:45', 'en cours de traitement'),
(6, 3, 531, '2017-06-12 15:57:26', 'en cours de traitement'),
(7, 3, 207, '2017-06-12 16:24:54', 'en cours de traitement'),
(8, 3, 0, '2017-06-12 16:24:57', 'en cours de traitement');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id_commentaire` int(11) NOT NULL,
  `auteur` varchar(100) NOT NULL,
  `contenu` text NOT NULL,
  `id_produit` int(11) NOT NULL,
  `date_enregistrement` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commentaire`
--

INSERT INTO `commentaire` (`id_commentaire`, `auteur`, `contenu`, `id_produit`, `date_enregistrement`) VALUES
(1, 'Yakine', 'Super je l''ai achté et j''en suis très content !', 5, '2017-07-24 06:24:35'),
(2, 'Karim', 'Bon produit. je conseille !! ', 5, '2017-07-23 12:42:23');

-- --------------------------------------------------------

--
-- Structure de la table `details_commande`
--

CREATE TABLE `details_commande` (
  `id_details_commande` int(3) NOT NULL,
  `id_commande` int(3) NOT NULL,
  `id_produit` int(3) NOT NULL,
  `quantite` int(3) NOT NULL,
  `prix` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `details_commande`
--

INSERT INTO `details_commande` (`id_details_commande`, `id_commande`, `id_produit`, `quantite`, `prix`) VALUES
(1, 2, 8, 1, 59),
(2, 2, 10, 1, 79),
(3, 3, 8, 5, 59),
(4, 4, 10, 5, 79),
(5, 5, 6, 1, 49),
(6, 6, 8, 9, 59),
(7, 7, 8, 2, 59),
(8, 7, 9, 1, 89);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `id_membre` int(3) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `civilite` enum('m','f') NOT NULL,
  `ville` varchar(20) NOT NULL,
  `code_postal` int(5) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `statut` int(1) NOT NULL,
  `role` varchar(20) NOT NULL,
  `salt` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `membre`
--

INSERT INTO `membre` (`id_membre`, `username`, `password`, `nom`, `prenom`, `email`, `civilite`, `ville`, `code_postal`, `adresse`, `statut`, `role`, `salt`) VALUES
(2, 'membre', '$2y$13$F9v8pl5u5WMrCorP9MLyJeyIsOLj.0/xqKd/hqa5440kyeB7FQ8te', 'Membre', 'membre', 'membre@monsite.com', 'f', 'Pantin', 93250, '142 avenue Jean Jaures', 0, 'ROLE_USER', 'YcM=A$nsYzkyeDVjEUa7W9K'),
(3, 'admin', '$2y$13$F9v8pl5u5WMrCorP9MLyJeyIsOLj.0/xqKd/hqa5440kyeB7FQ8te', 'Doe', 'John', 'jdoe@mail.fr', 'm', 'paris', 75000, 'rue du pont', 1, 'ROLE_ADMIN', 'YcM=A$nsYzkyeDVjEUa7W9K');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(3) NOT NULL,
  `reference` varchar(20) NOT NULL,
  `categorie` varchar(20) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `couleur` varchar(20) NOT NULL,
  `taille` varchar(5) NOT NULL,
  `public` enum('m','f','mixte') NOT NULL,
  `photo` varchar(250) NOT NULL,
  `prix` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `produit`
--

INSERT INTO `produit` (`id_produit`, `reference`, `categorie`, `titre`, `description`, `couleur`, `taille`, `public`, `photo`, `prix`, `stock`) VALUES
(5, 'pantalon1', 'pantalon', 'pantalon blanc', ' Lorem ipsum dolor sit amet ', 'blanc', 'S', 'mixte', 'pantalon1_pantalon2.jpg', 50, 0),
(6, 'pantalon2', 'pantalon', 'pantalon noir', '    Lorem ipsum dolor sit amet  ', 'noir', 'S', 'f', 'pantalon2_pantalon1.jpg', 49, 49),
(7, 'pull1', 'pull', 'pull blanc', 'Lorem ipsum dolor sit amet', 'blanc', 'S', 'f', 'pull1_pull1.jpg', 59, 100),
(8, 'pull2', 'pull', 'pull gris', 'Lorem ipsum dolor sit amet', 'gris', 'L', 'm', 'pull2_pull2.jpg', 59, 34),
(9, 'robe1', 'robe', 'robe rouge', ' Lorem ipsum dolor sit amet ', 'rouge', 'S', 'f', 'robe1_robe2.jpg', 89, 49),
(10, 'robe2', 'robe', 'robe noire', 'Lorem ipsum dolor sit amet  ', 'noir', 'M', 'f', 'robe2_robe1.jpg', 79, 45),
(11, 'dfsdf', 'robe', 'super robe verte', 'Robe verte pour l''été', 'vert', '34', 'f', '10d2106b1666e636b581c236612ce3aa.jpg', 150, 30);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD UNIQUE KEY `montant` (`montant`),
  ADD KEY `id_membre` (`id_membre`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id_commentaire`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Index pour la table `details_commande`
--
ALTER TABLE `details_commande`
  ADD PRIMARY KEY (`id_details_commande`);

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`id_membre`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `reference` (`reference`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id_commentaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `details_commande`
--
ALTER TABLE `details_commande`
  MODIFY `id_details_commande` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `id_membre` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
