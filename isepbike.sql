-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : jeu. 22 juin 2023 à 16:39
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `isepbike`
--
CREATE DATABASE IF NOT EXISTS `isepbike` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `isepbike`;

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `idCapteur` int(11) NOT NULL,
  `TypeCapteur` varchar(20) NOT NULL,
  `NomCapteur` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `capteurs`
--

INSERT INTO `capteurs` (`idCapteur`, `TypeCapteur`, `NomCapteur`) VALUES
(3, 'Temperature', 'Capteur 1'),
(7, 'Son', 'Capteur 2'),
(9, 'ECG', 'Capteur 3');

-- --------------------------------------------------------

--
-- Structure de la table `faq`
--

CREATE TABLE `faq` (
  `idFaq` int(11) NOT NULL,
  `Question` text NOT NULL,
  `Reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `mesures`
--

CREATE TABLE `mesures` (
  `IdMesure` int(11) NOT NULL,
  `IdCapteur` int(11) NOT NULL COMMENT 'Foreign Key',
  `DateMesure` date NOT NULL,
  `HeureMesure` time NOT NULL,
  `ValeurMesure` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `mesures`
--

INSERT INTO `mesures` (`IdMesure`, `IdCapteur`, `DateMesure`, `HeureMesure`, `ValeurMesure`) VALUES
(1, 3, '2023-03-22', '00:00:00', 25.3);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `idUtilisateur` int(11) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0,
  `dateInscription` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`idUtilisateur`, `pseudo`, `email`, `password`, `isAdmin`, `dateInscription`) VALUES
(1, 'admin', 'ridegreencontact@gmail.com', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 1, '2022-12-12 20:22:19'),
(2, 'test', 'test1@gmail.com', '0b8d2889977f51b5d424f841904c17a87e3d5e70d99a3e63fecf52ba3e529904', 0, '2023-01-26 15:58:26');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`idCapteur`);

--
-- Index pour la table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`idFaq`);

--
-- Index pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD PRIMARY KEY (`IdMesure`),
  ADD KEY `IdCapteur` (`IdCapteur`);

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`idUtilisateur`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `idCapteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `faq`
--
ALTER TABLE `faq`
  MODIFY `idFaq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `mesures`
--
ALTER TABLE `mesures`
  MODIFY `IdMesure` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `mesures`
--
ALTER TABLE `mesures`
  ADD CONSTRAINT `mesures_ibfk_1` FOREIGN KEY (`IdCapteur`) REFERENCES `capteurs` (`idCapteur`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
