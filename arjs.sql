-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le :  jeu. 19 oct. 2017 à 16:27
-- Version du serveur :  5.6.35
-- Version de PHP :  7.1.8

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
-- Déchargement des données de la table `ENIGME`
--

INSERT INTO `ENIGME` (`id`, `titre`, `texte`, `lieu`, `reponse`) VALUES
(3, 'Enigme 1', '', '1er étage section orange là où tu ne peux pas te rendre à la place de quelqu’un d’autre', 'Calculatrice'),
(4, 'Enigme 2', '', 'Rends-toi au rdc dans à l’entrée de la grotte des hommes en rouge', 'Moulin'),
(5, 'Enigme 3', '', 'Rends-toi au RDC à la source du nectar de tout bon travailleur', 'APERO'),
(6, 'Enigme 4', '', 'RDV devant le local arc-en-ciel', 'SANTE'),
(7, 'Enigme 5', '', 'Direction le 7ème ciel (enfin le 2ème) à l\'entrée de la grande machine de fer', 'Aujourd\'hui');

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
-- Déchargement des données de la table `enigme_membre`
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
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `email`, `motdepasse`, `admin`) VALUES
(1, 'solene', 'lll@hotmai', 'fr', 0);

--
-- Index pour les tables déchargées
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
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ENIGME`
--
ALTER TABLE `ENIGME`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `enigme_membre`
--
ALTER TABLE `enigme_membre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
