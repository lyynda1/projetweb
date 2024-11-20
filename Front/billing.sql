-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 16 nov. 2024 à 19:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop`
--

-- --------------------------------------------------------

--
-- Structure de la table `billing`
--

CREATE TABLE `billing` (
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `town` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `postcode` varchar(255) DEFAULT NULL,
  `ordernotes` text DEFAULT NULL,
  `cardtype` varchar(20) DEFAULT NULL,
  `cardnumber` varchar(20) DEFAULT NULL,
  `cardexpircy` varchar(55) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `billing`
--

INSERT INTO `billing` (`firstname`, `lastname`, `email`, `phone`, `country`, `address`, `town`, `state`, `postcode`, `ordernotes`, `cardtype`, `cardnumber`, `cardexpircy`, `cvv`) VALUES
(NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `billing`
--
ALTER TABLE `billing`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
