-- phpMyAdmin SQL Dump
-- version 4.7.2
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  ven. 29 sep. 2017 à 12:03
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Base de données :  `arjs`
--

-- --------------------------------------------------------

--
-- Structure de la table `ENIGME`
--

CREATE TABLE `ENIGME` (
  `id` int(11) NOT NULL,
  `texte` text NOT NULL,
  `lieu` text NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `ENIGME MEMBRE`
--

CREATE TABLE `ENIGME MEMBRE` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_Enigme` int(11) NOT NULL,
  `Résolution` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(10) NOT NULL,
  `email` varchar(10) NOT NULL,
  `motdepasse` varchar(10) NOT NULL,
  `admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ENIGME`
--
ALTER TABLE `ENIGME`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ENIGME MEMBRE`
--
ALTER TABLE `ENIGME MEMBRE`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user_user` (`id_user`),
  ADD KEY `id_enigme_enigme` (`id_Enigme`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ENIGME MEMBRE`
--
ALTER TABLE `ENIGME MEMBRE`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ENIGME MEMBRE`
--
ALTER TABLE `ENIGME MEMBRE`
  ADD CONSTRAINT `id_enigme_enigme` FOREIGN KEY (`id_Enigme`) REFERENCES `ENIGME` (`id`),
  ADD CONSTRAINT `id_user_user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
