-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 déc. 2024 à 22:14
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
-- Base de données : `lynda`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE `categorie` (
  `idC` int(11) NOT NULL,
  `nomC` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categorie`
--

INSERT INTO `categorie` (`idC`, `nomC`) VALUES
(4, 'Bags'),
(9, 'Rings'),
(10, 'Clothes'),
(11, 'cuffs');

-- --------------------------------------------------------

--
-- Structure de la table `panier`
--

CREATE TABLE `panier` (
  `idPanier` int(11) NOT NULL,
  `idProduit` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `quantite` int(11) NOT NULL,
  `prix` int(11) NOT NULL,
  `prixTotal` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `panier`
--

INSERT INTO `panier` (`idPanier`, `idProduit`, `idUser`, `quantite`, `prix`, `prixTotal`, `created_at`) VALUES
(15, 13, 1, 1, 90, 90, '2024-12-09 10:30:53'),
(16, 14, 1, 3, 450, 1350, '2024-12-09 10:30:53'),
(17, 16, 1, 1, 60, 60, '2024-12-09 10:30:53'),
(18, 19, 1, 1, 56, 56, '2024-12-09 10:50:03');

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `nomProduit` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie` int(11) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `nomProduit`, `image`, `description`, `prix`, `categorie`, `dateCreation`) VALUES
(13, 'Manchette Adda', 'acc1.jpg', 'Cuufs', 90, 11, '2024-12-05 14:35:54'),
(14, 'Caftan', 'shop-5.jpg', 'Dress', 450, 10, '2024-12-05 15:18:17'),
(15, 'Bornous', 'shop-4.jpg', 'Winter Coat', 120, 10, '2024-12-05 15:18:41'),
(16, 'Khomsa Ring', 'bague2.PNG', 'Rings', 60, 9, '2024-12-05 15:20:01'),
(17, 'Chechia', 'shop-1.jpg', 'Headgear', 19, 10, '2024-12-05 15:21:12'),
(18, 'Blue Pom Koffa', 'koffa1.png', 'Koffa', 44, 4, '2024-12-05 15:22:26'),
(19, 'Manchette Illi', 'khlel.jpeg', 'Cuffs', 56, 11, '2024-12-05 15:45:41');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`idC`);

--
-- Index pour la table `panier`
--
ALTER TABLE `panier`
  ADD PRIMARY KEY (`idPanier`),
  ADD KEY `idProduit` (`idProduit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`),
  ADD KEY `categorie` (`categorie`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
  MODIFY `idC` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `panier`
--
ALTER TABLE `panier`
  MODIFY `idPanier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `panier`
--
ALTER TABLE `panier`
  ADD CONSTRAINT `produit` FOREIGN KEY (`idProduit`) REFERENCES `produit` (`idProduit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `categorie` FOREIGN KEY (`categorie`) REFERENCES `categorie` (`idC`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
