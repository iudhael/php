-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 09 juil. 2022 à 13:19
-- Version du serveur :  10.4.19-MariaDB
-- Version de PHP : 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `pagination`
--

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id_ville` int(11) NOT NULL,
  `nom_ville` varchar(255) CHARACTER SET utf8 NOT NULL,
  `img_ville` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `ville`
--

INSERT INTO `ville` (`id_ville`, `nom_ville`, `img_ville`) VALUES
(1, 'cotonou', '../static/images/img_ville_et_site/cotonou.jpg'),
(2, 'porto-Novo', '../static/images/img_ville_et_site/porto_novo.jpg'),
(3, 'abomey', '../static/images/img_ville_et_site/abomey.jpg'),
(4, 'abomey-calavi', '../static/images/img_ville_et_site/abomey_calavi.jpg'),
(5, 'ouidah', '../static/images/img_ville_et_site/ouidah.jpg'),
(6, 'bohicon', '../static/images/img_ville_et_site/bohicon.jpg'),
(7, 'bonou', '../static/images/img_ville_et_site/bonou.jpg'),
(8, 'nikki', '../static/images/img_ville_et_site/nikki.png'),
(9, 'savalou', '../static/images/img_ville_et_site/savalou.jpg'),
(10, 'allada', '../static/images/img_ville_et_site/allada.jpg'),
(11, 'parakou', '../static/images/img_ville_et_site/parakou.jpg'),
(12, 'toffo', '../static/images/img_ville_et_site/toffo.jpeg'),
(13, 'zogbodomey', '../static/images/img_ville_et_site/zogbodomey.jpg'),
(14, 'kandi', '../static/images/img_ville_et_site/kandi.jpg'),
(15, 'dogbo', '../static/images/img_ville_et_site/dogbo.jpg'),
(16, 'ganvié', '../static/images/img_ville_et_site/village_ganvie.jpg'),
(17, 'nord-ouest', '../static/images/img_ville_et_site/nord_benin.jpg'),
(20, 'hu', '../static/images/img_ville_et_site.png'),
(21, 'se', '../static/images/img_ville_et_site/se.png'),
(24, 'v1', '../static/images/img_ville_et_site/v1.png'),
(25, 'v4', '../static/images/img_ville_et_site/v2.png');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id_ville`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id_ville` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
