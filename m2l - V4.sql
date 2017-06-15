-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 13 Mars 2017 à 15:53
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `m2l`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_a` int(11) NOT NULL,
  `rue` varchar(25) DEFAULT NULL,
  `commune` varchar(25) DEFAULT NULL,
  `code_postale` varchar(25) DEFAULT NULL,
  `numero` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adresse`
--

INSERT INTO `adresse` (`id_a`, `rue`, `commune`, `code_postale`, `numero`) VALUES
(1, 'test', 'test', '75000', 1),
(2, 'test', 'testOh', '75342', 18),
(3, 'test', 'Testeur', '75000', 11),
(4, 'test', 'Testeur', '75000', 11),
(5, 'test', 'Testeur', '75000', 11),
(6, 'test', 'Testeur', '75000', 11),
(7, 'test', 'Testeur', '75000', 11),
(8, 'test', 'Testeur', '75000', 11),
(9, 'test', 'Testeur', '75000', 11),
(10, 'test', 'Testeur', '75000', 11),
(11, 'test', 'Testeur', '75000', 11),
(12, 'test', 'Testeur', '75000', 11),
(13, 'test', 'Testeur', '75000', 11),
(14, 'test', 'Testeur', '75000', 11),
(15, 'test', 'Testeur', '75000', 11),
(16, 'test', 'Testeur', '75000', 11),
(17, 'test', 'Testeur', '75000', 11),
(18, 'test', 'Testeur', '75000', 11),
(19, 'test', 'Testeur', '75000', 11),
(20, 'test', 'Testeur', '75000', 11),
(21, 'test', 'Testeur', '75000', 11),
(22, 'test', 'Testeur', '75000', 11),
(23, 'Presta1', 'Presta1', '75000', 11),
(24, 'Presta2', 'Presta2', '75000', 11),
(25, 'presta3', 'presta3', '56789', 43),
(26, 'presta4', 'presta4', '45678', 543),
(27, 'ESport', 'ESport', '75004', 20),
(28, 'AllSport', 'AllSport', '75006', 22),
(29, 'rue', 'ville', '75000', 5),
(30, 'rue', 'paris', '75000', 10),
(31, 'rue', 'ville', '90', 2),
(32, 'rue', 'ville', '75000', 2),
(33, '', '', '', 2);

-- --------------------------------------------------------

--
-- Structure de la table `formation`
--

CREATE TABLE `formation` (
  `id_f` int(11) NOT NULL,
  `libelle` varchar(25) DEFAULT NULL,
  `contenu` varchar(255) DEFAULT NULL,
  `date_d` date NOT NULL,
  `date_f` date NOT NULL,
  `NbJour` int(2) DEFAULT NULL,
  `credits` int(3) DEFAULT NULL,
  `id_p` int(11) DEFAULT NULL,
  `id_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `formation`
--

INSERT INTO `formation` (`id_f`, `libelle`, `contenu`, `date_d`, `date_f`, `NbJour`, `credits`, `id_p`, `id_a`) VALUES
(1, 'test1', 'blablabla', '2017-03-16', '2017-03-18', 2, 10, 1, 1),
(2, 'test2', 'blablabla', '2017-04-06', '2017-04-08', 2, 10, 2, 2),
(3, 'test3', 'blablabla', '2017-04-24', '2017-04-26', 2, 10, 3, 3),
(4, 'test4', 'blablabla', '2017-04-27', '2017-05-02', 2, 10, 4, 4),
(5, 'test5', 'blablabla', '2017-05-25', '2017-05-31', 2, 10, 5, 5),
(6, 'ESport', 'ESport', '2017-04-07', '2017-04-11', 14, 70, 2, 27),
(7, 'AllSport', 'AllSport', '2017-03-16', '2017-03-21', 5, 25, 2, 28),
(8, 'Super', 'Super', '2017-03-11', '2017-03-13', 2, 10, 3, 29),
(9, 'tennis', 'initiation', '2017-04-14', '2017-04-16', 2, 10, 2, 30),
(10, 'testsport', 'test', '2017-03-14', '2017-03-17', 3, 15, 3, 32);

-- --------------------------------------------------------

--
-- Structure de la table `prestataire`
--

CREATE TABLE `prestataire` (
  `id_p` int(11) NOT NULL,
  `raison_s` varchar(25) DEFAULT NULL,
  `id_a` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `prestataire`
--

INSERT INTO `prestataire` (`id_p`, `raison_s`, `id_a`) VALUES
(1, 'Presta1', 23),
(2, 'Presta2', 24),
(3, 'presta3', 25),
(4, 'presta4', 26),
(5, 'presta5', 26);

-- --------------------------------------------------------

--
-- Structure de la table `salarie`
--

CREATE TABLE `salarie` (
  `id_s` int(11) NOT NULL,
  `nom` varchar(25) DEFAULT NULL,
  `prenom` varchar(25) DEFAULT NULL,
  `mail` varchar(25) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `NbJour` int(11) DEFAULT NULL,
  `credits` int(4) DEFAULT NULL,
  `level` int(1) NOT NULL,
  `id_a` int(11) DEFAULT NULL,
  `id_s_1` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `salarie`
--

INSERT INTO `salarie` (`id_s`, `nom`, `prenom`, `mail`, `password`, `NbJour`, `credits`, `level`, `id_a`, `id_s_1`) VALUES
(1, 'admin', 'admin', 'admin@admin.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 999, 1, NULL, NULL),
(2, 'chef', 'chef', 'chef@chef.fr', 'd5f2e5c77054c44c2c72a1b017deca06fc637c99', 1, 300, 2, NULL, NULL),
(3, 'user', 'user', 'user@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 10, 40, 3, 3, 2),
(4, 'admin', 'admin', 'admin2@admin.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL, 1, NULL, NULL),
(5, 'admin', 'admin', 'admin3@admin.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL, 1, NULL, NULL),
(6, 'chef', 'chef', 'chef2@chef.fr', 'd5f2e5c77054c44c2c72a1b017deca06fc637c99', 1, NULL, 2, NULL, NULL),
(7, 'user', 'user', 'user2@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(8, 'user', 'user', 'user3@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(9, 'user', 'user', 'user4@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(10, 'user', 'user', 'user5@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(11, 'user', 'user', 'user6@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(12, 'user', 'user', 'user7@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(13, 'user', 'user', 'user8@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(14, 'user', 'user', 'user9@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(15, 'user', 'user', 'user10@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(16, 'admin', 'admin', 'admin4@admin.fr', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, NULL, 1, NULL, NULL),
(17, 'chef', 'chef', 'chef3@chef.fr', 'd5f2e5c77054c44c2c72a1b017deca06fc637c99', 1, NULL, 2, NULL, NULL),
(18, 'chef', 'chef', 'chef4@chef.fr', 'd5f2e5c77054c44c2c72a1b017deca06fc637c99', 1, NULL, 2, NULL, NULL),
(19, 'chef', 'chef', 'chef5@chef.fr', 'd5f2e5c77054c44c2c72a1b017deca06fc637c99', 1, NULL, 2, NULL, NULL),
(20, 'chef', 'chef', 'chef6@chef.fr', 'd5f2e5c77054c44c2c72a1b017deca06fc637c99', 1, NULL, 2, NULL, NULL),
(21, 'user', 'user', 'user11@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(22, 'user', 'user', 'user12@user.fr', '12dea96fec20593566ab75692c9949596833adc9', 1, NULL, 3, NULL, NULL),
(23, 'Evano', 'Thomas', 'test@gmail.com', '5f50a84c1fa3bcff146405017f36aec1a10a9e38', 15, 60, 3, 33, 1);

-- --------------------------------------------------------

--
-- Structure de la table `situer`
--

CREATE TABLE `situer` (
  `id_f` int(11) NOT NULL,
  `id_a` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `situer`
--

INSERT INTO `situer` (`id_f`, `id_a`) VALUES
(6, 27),
(7, 28),
(8, 29),
(9, 30),
(10, 32);

-- --------------------------------------------------------

--
-- Structure de la table `suivre`
--

CREATE TABLE `suivre` (
  `etat` varchar(25) DEFAULT NULL,
  `id_s` int(11) NOT NULL,
  `id_f` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `suivre`
--

INSERT INTO `suivre` (`etat`, `id_s`, `id_f`) VALUES
('En attente', 3, 1),
('Validé', 3, 3),
('Validé', 3, 9),
('Validé', 7, 3);

-- --------------------------------------------------------

--
-- Structure de la table `type_formation`
--

CREATE TABLE `type_formation` (
  `id_t` int(11) NOT NULL,
  `nom_type` varchar(25) DEFAULT NULL,
  `id_f` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `type_formation`
--

INSERT INTO `type_formation` (`id_t`, `nom_type`, `id_f`) VALUES
(1, 'Alternance', 6),
(2, 'Initiale', 7),
(3, 'Initiale', 8),
(4, 'Alternance', 9),
(5, 'Initiale', 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_a`);

--
-- Index pour la table `formation`
--
ALTER TABLE `formation`
  ADD PRIMARY KEY (`id_f`),
  ADD KEY `FK_formation_id_p` (`id_p`),
  ADD KEY `FK_formation_id_a` (`id_a`);

--
-- Index pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD PRIMARY KEY (`id_p`),
  ADD KEY `FK_prestataire_id_a` (`id_a`);

--
-- Index pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD PRIMARY KEY (`id_s`),
  ADD KEY `FK_salarie_id_a` (`id_a`),
  ADD KEY `FK_salarie_id_s_1` (`id_s_1`);

--
-- Index pour la table `situer`
--
ALTER TABLE `situer`
  ADD PRIMARY KEY (`id_f`,`id_a`),
  ADD KEY `FK_situer_id_a` (`id_a`);

--
-- Index pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD PRIMARY KEY (`id_s`,`id_f`),
  ADD KEY `FK_suivre_id_f` (`id_f`);

--
-- Index pour la table `type_formation`
--
ALTER TABLE `type_formation`
  ADD PRIMARY KEY (`id_t`),
  ADD KEY `FK_type_formation_id_f` (`id_f`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_a` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT pour la table `formation`
--
ALTER TABLE `formation`
  MODIFY `id_f` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `prestataire`
--
ALTER TABLE `prestataire`
  MODIFY `id_p` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `salarie`
--
ALTER TABLE `salarie`
  MODIFY `id_s` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT pour la table `type_formation`
--
ALTER TABLE `type_formation`
  MODIFY `id_t` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `formation`
--
ALTER TABLE `formation`
  ADD CONSTRAINT `FK_formation_id_a` FOREIGN KEY (`id_a`) REFERENCES `adresse` (`id_a`),
  ADD CONSTRAINT `FK_formation_id_p` FOREIGN KEY (`id_p`) REFERENCES `prestataire` (`id_p`);

--
-- Contraintes pour la table `prestataire`
--
ALTER TABLE `prestataire`
  ADD CONSTRAINT `FK_prestataire_id_a` FOREIGN KEY (`id_a`) REFERENCES `adresse` (`id_a`);

--
-- Contraintes pour la table `salarie`
--
ALTER TABLE `salarie`
  ADD CONSTRAINT `FK_salarie_id_a` FOREIGN KEY (`id_a`) REFERENCES `adresse` (`id_a`),
  ADD CONSTRAINT `FK_salarie_id_s_1` FOREIGN KEY (`id_s_1`) REFERENCES `salarie` (`id_s`);

--
-- Contraintes pour la table `situer`
--
ALTER TABLE `situer`
  ADD CONSTRAINT `FK_situer_id_a` FOREIGN KEY (`id_a`) REFERENCES `adresse` (`id_a`),
  ADD CONSTRAINT `FK_situer_id_f` FOREIGN KEY (`id_f`) REFERENCES `formation` (`id_f`);

--
-- Contraintes pour la table `suivre`
--
ALTER TABLE `suivre`
  ADD CONSTRAINT `FK_suivre_id_f` FOREIGN KEY (`id_f`) REFERENCES `formation` (`id_f`),
  ADD CONSTRAINT `FK_suivre_id_s` FOREIGN KEY (`id_s`) REFERENCES `salarie` (`id_s`);

--
-- Contraintes pour la table `type_formation`
--
ALTER TABLE `type_formation`
  ADD CONSTRAINT `FK_type_formation_id_f` FOREIGN KEY (`id_f`) REFERENCES `formation` (`id_f`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
