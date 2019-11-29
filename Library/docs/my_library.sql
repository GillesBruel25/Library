-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 26 Septembre 2018 à 00:26
-- Version du serveur :  5.7.11
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `my_library`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mail` varchar(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`, `mail`) VALUES
(20180922, 'Gilles', '1234', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `livres`
--

CREATE TABLE `livres` (
  `code_bar` int(11) NOT NULL,
  `titre` varchar(60) NOT NULL,
  `auteur` varchar(50) NOT NULL,
  `edition` varchar(40) NOT NULL,
  `type` varchar(40) NOT NULL,
  `qtte` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `livres`
--

INSERT INTO `livres` (`code_bar`, `titre`, `auteur`, `edition`, `type`, `qtte`) VALUES
(20180923, 'aladin', 'disney bros', 'Disney', 'roman', 3),
(20180924, 'Robin des bois', 'disney bros', 'Disney', 'roman', 5),
(1235, 'azerty', 'Informac Lebron', 'intel', 'book', 42),
(1234, 'c++ hack\'s', 'Informac Lebron', 'Coders17', 'book', 12);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `livres`
--
ALTER TABLE `livres`
  ADD UNIQUE KEY `code_bar` (`code_bar`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
