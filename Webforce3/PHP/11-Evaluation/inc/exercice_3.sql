-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 15 Juin 2017 à 16:24
-- Version du serveur :  10.1.13-MariaDB
-- Version de PHP :  5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_film` int(3) NOT NULL,
  `titre` varchar(20) NOT NULL,
  `acteurs` varchar(20) NOT NULL,
  `realisateur` varchar(20) NOT NULL,
  `producteur` varchar(20) NOT NULL,
  `annee_production` year(4) NOT NULL,
  `langue` varchar(20) NOT NULL,
  `categorie` enum('action','aventure','animation','thriller') NOT NULL,
  `synopsis` text NOT NULL,
  `video` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `movies`
--

INSERT INTO `movies` (`id_film`, `titre`, `acteurs`, `realisateur`, `producteur`, `annee_production`, `langue`, `categorie`, `synopsis`, `video`) VALUES
(1, 'Pirates des caraibes', 'Johnny Depp', 'Joachim Rønning', 'Espen Sandberg', 2017, 'français', 'action', 'Jack Sparow, recherche un trésor perdu !', 'http://www.allocine.'),
(2, 'Fast and furious', 'Vin Diesel', 'untel', 'untel', 2017, 'anglais', 'action', 'Course poursuite à en perdre haleine !', 'http://www.allocine.'),
(3, 'Intouchable', 'Omar Sy', 'Eric Todelano', 'Olivier Nakache', 2011, 'français', 'aventure', 'blabla', 'http://www.allocine.');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_film`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_film` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
