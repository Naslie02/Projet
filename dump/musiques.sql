-- phpMyAdmin SQL Dump
-- version 5.0.4deb2
-- https://www.phpmyadmin.net/
--
-- Hôte : mysql.info.unicaen.fr:3306
-- Généré le : mer. 10 nov. 2021 à 15:45
-- Version du serveur :  10.5.11-MariaDB-1
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `21903086_dev`
--

-- --------------------------------------------------------

--
-- Structure de la table `musiques`
--

CREATE TABLE `musiques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `dateSortie` date DEFAULT NULL,
  `jaquette` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `lien` varchar(255) DEFAULT NULL,
  `genre` varchar(255) DEFAULT NULL,
  `proprietaire` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `musiques`
--

INSERT INTO `musiques` (`id`, `titre`, `auteur`, `dateSortie`, `jaquette`, `label`, `lien`, `genre`, `proprietaire`) VALUES
(1, 'Homiris', 'WX', '2021-09-26', 'homiris.jpg', NULL, 'soundcloud.com/wx_psy/homiris', 'Trance progressive', NULL),
(2, 'Deep', 'WX', '2020-09-20', 'deep.jpg', NULL, 'soundcloud.com/wx_psy/deep', 'Psytrance progressive', NULL),
(3, 'La Résistance de l\'Amour', 'Armin Van Buuren vs Shapov', '2019-04-16', 'resistance-amour.jpg', 'Armada Music', 'youtube.com/watch?v=4AiyOHT-n6g', 'Trance', NULL),
(4, 'Character', 'Kore-G', '2021-03-05', 'character.jpg', 'Alien Records', 'soundcloud.com/kore-g/character', 'Psytrance progressive', NULL),
(5, 'Singularity', 'Sebastian Brandt & Peter Steele', '2021-06-21', 'singularity.jpg', 'Research & Development', 'soundcloud.com/sebastianbrandt/sebastian-brandt-peter-steele-singularity', 'Trance', NULL),
(6, 'People Can Fly', 'Astral Projection', '1996-04-29', 'people-can-fly.jpg', 'Trust In Trance', 'soundcloud.com/sapira777/astral-projection-people-can-fly', 'Goa', NULL),
(7, 'Brown Skin Girl', 'Blue Ivy, SAINt JHN, Beyoncé, WizKid', '2019-07-19', 'brown-skin-girl.jpg', 'Parkwood Entertainment', 'youtube.com/watch?v=RXrhqhW2kiU', 'Trap', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `musiques`
--
ALTER TABLE `musiques`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `musiques`
--
ALTER TABLE `musiques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
