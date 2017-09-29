-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  localhost:8889
-- Généré le :  Ven 29 Septembre 2017 à 14:11
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.1

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
  `titre` varchar(15) NOT NULL,
  `texte` text NOT NULL,
  `lieu` text NOT NULL,
  `reponse` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `ENIGME`
--

INSERT INTO `ENIGME` (`id`, `titre`, `texte`, `lieu`, `reponse`) VALUES
(3, 'Enigme n1', 'qu\'est ce qui est petit et marron?', 'a côte des toilettes', 'un marron');

-- --------------------------------------------------------

--
-- Structure de la table `enigme_membre`
--

CREATE TABLE `enigme_membre` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_enigme` int(11) NOT NULL,
  `Resolution` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `enigme_membre`
--

INSERT INTO `enigme_membre` (`id`, `id_user`, `id_enigme`, `Resolution`) VALUES
(2, 0, 0, 0),
(3, 0, 0, 0),
(4, 2, 3, 1),
(5, 2, 3, 1);

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
-- Index pour les tables exportées
--

--
-- Index pour la table `ENIGME`
--
ALTER TABLE `ENIGME`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `enigme_membre`
--
ALTER TABLE `enigme_membre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `ENIGME`
--
ALTER TABLE `ENIGME`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `enigme_membre`
--
ALTER TABLE `enigme_membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
