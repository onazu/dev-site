-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql
-- Généré le : dim. 09 jan. 2022 à 15:40
-- Version du serveur : 5.7.24
-- Version de PHP : 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `mydb`
--

-- --------------------------------------------------------

--
-- Structure de la table `machine`
--

CREATE TABLE `machine` (
  `user_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ip` varchar(50) NOT NULL DEFAULT '0.0.0.0',
  `serie` varchar(50) NOT NULL DEFAULT 'EL56SKHDF',
  `os` varchar(50) NOT NULL DEFAULT 'Debian 11',
  `nommachine` varchar(50) NOT NULL DEFAULT 'EL56SKHDF-NM',
  `bureau` varchar(50) NOT NULL DEFAULT 'A definir B',
  `emplacement` varchar(50) NOT NULL DEFAULT 'A definir E',
  `prise` varchar(50) NOT NULL DEFAULT 'A definir P',
  `maj` tinyint(1) NOT NULL DEFAULT '0',
  `log` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `machine`
--

INSERT INTO `machine` (`user_name`, `password`, `ip`, `serie`, `os`, `nommachine`, `bureau`, `emplacement`, `prise`, `maj`, `log`) VALUES
('test', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0.0.0.0', 'EL56SKHDF', 'Debian 11', 'EL56SKHDF-NM', 'bureau2', 'bat1-emplacement1', 'M22-333', 0, 1),
('testb1', 'aaa', '0.0.0.0', 'EL56SKHDF', 'Debian 11', 'EL56SKHDF-NM', 'bureau1', 'A definir E', 'A definir P', 0, 0),
('testb2', '', '0.0.0.0', 'EL56SKHDF', 'Debian 11', 'EL56SKHDF-NM', 'bureau2', 'A definir E', 'A definir P', 0, 0),
('testb3', '', '0.0.0.0', 'EL56SKHDF', 'Debian 11', 'EL56SKHDF-NM', 'bureau3', 'A definir E', 'A definir P', 0, 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `machine`
--
ALTER TABLE `machine`
  ADD PRIMARY KEY (`user_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
