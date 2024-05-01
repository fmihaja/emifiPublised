-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 01 mai 2024 à 21:42
-- Version du serveur :  10.4.13-MariaDB
-- Version de PHP : 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `emifi`
--

-- --------------------------------------------------------

--
-- Structure de la table `chansons`
--

CREATE TABLE `chansons` (
  `id_ch` int(100) NOT NULL,
  `titre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `chansons`
--

INSERT INTO `chansons` (`id_ch`, `titre`) VALUES
(68, '04- Chorale EMIFI EMIT Mikalo Fiderana  Talily Fanjaka 2019'),
(69, '08  - EMIFI  Ano hagnatognAzy'),
(70, '09 - EMIFI  Zagnahary SudEst Bawejy Sound tsapiky toliara FIDA CYRILLE RUDY DIDI'),
(71, 'Ho tia Anao - EMIFI');

-- --------------------------------------------------------

--
-- Structure de la table `reaction`
--

CREATE TABLE `reaction` (
  `id_user` int(100) NOT NULL,
  `id_chanson` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `reaction`
--

INSERT INTO `reaction` (`id_user`, `id_chanson`) VALUES
(112, 71),
(112, 69),
(113, 70);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id_users` int(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mdp` text NOT NULL,
  `nom` varchar(25) NOT NULL,
  `numero_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id_users`, `email`, `mdp`, `nom`, `numero_tel`) VALUES
(103, 'goku@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$TjdFbllUQ2pEa2Q0eUdIdg$inIuoAg+eHQ4ffcf3K9xA9rPBhlpX9PfziUtJTzn65g', '', ''),
(109, 'goku888@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$cnM4Qjd6cE9seFBVZU9vTQ$b+xgmbXP2Ork3Y8SHaG4YPB3fMR8OvpOOrWRwKGPa7w', 'dsfd', '5656565655'),
(110, 'lala@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$azZNRVVUVTdvaHFlMDdYYg$JkTpS6hYhKO3YHM+vxuZM+m+uEgHxtt1YxARWiz1xk8', 'rabenidriana', '0349888889'),
(112, 'goku88@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$L3diaS5FYzg0QzVHY2NYRw$HZVcjB26Mp6aneY34A4KkakDVlw1aFxIS9IBI9fxXLw', 'rabe', '0648555556'),
(113, 'goku899@gmail.com', '$argon2id$v=19$m=65536,t=4,p=1$ZFBwVVMuRUtIa3ZGTy43Lw$GB7JLdY/Ku5dgorLzmGv5FkC8KHry4nNsiGxVWlXyEE', 'ghfghfgh', '4455555555');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chansons`
--
ALTER TABLE `chansons`
  ADD PRIMARY KEY (`id_ch`);

--
-- Index pour la table `reaction`
--
ALTER TABLE `reaction`
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_chanson` (`id_chanson`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `numero` (`numero_tel`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chansons`
--
ALTER TABLE `chansons`
  MODIFY `id_ch` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id_users` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `reaction`
--
ALTER TABLE `reaction`
  ADD CONSTRAINT `reaction_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_users`),
  ADD CONSTRAINT `reaction_ibfk_2` FOREIGN KEY (`id_chanson`) REFERENCES `chansons` (`id_ch`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
