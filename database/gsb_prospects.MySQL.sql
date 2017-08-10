-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 10 Août 2017 à 13:49
-- Version du serveur :  5.7.14
-- Version de PHP :  7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gsb_prospects`
--

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_Praticien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `etat`
--

CREATE TABLE `etat` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `interesser`
--

CREATE TABLE `interesser` (
  `id_Prestation` int(11) NOT NULL,
  `id_Client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `praticien`
--

CREATE TABLE `praticien` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL,
  `prenom` varchar(25) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `id_Ville` int(11) DEFAULT NULL,
  `id_Type_Praticien` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `praticien`
--

INSERT INTO `praticien` (`id`, `nom`, `prenom`, `adresse`, `id_Ville`, `id_Type_Praticien`) VALUES
(1, 'Notini', 'Alain', '114 r Authie', 1, 1),
(2, 'Gosselin', 'Albert', '13 r Devon', 2, 2),
(3, 'Delahaye', 'André', '36 av 6 Juin', 3, 5),
(4, 'Leroux', 'André', '47 av Robert Schuman', 4, 3),
(5, 'Desmoulins', 'Anne', '31 r St Jean', 5, 4),
(6, 'Mouel', 'Anne', '27 r Auvergne', 6, 1),
(7, 'Desgranges-Lentz', 'Antoine', '1 r Albert de Mun', 7, 2),
(8, 'Marcouiller', 'Arnaud', '31 r St Jean', 8, 5),
(9, 'Dupuy', 'Benoit', '9 r Demolombe', 9, 3),
(10, 'Lerat', 'Bernard', '31 r St Jean', 10, 4),
(11, 'Marçais-Lefebvre', 'Bertrand', '86Bis r Basse', 11, 1),
(12, 'Boscher', 'Bruno', '94 r Falaise', 12, 2),
(13, 'Morel', 'Catherine', '21 r Chateaubriand', 13, 5),
(14, 'Guivarch', 'Chantal', '4 av Gén Laperrine', 14, 3),
(15, 'Bessin-Grosdoit', 'Christophe', '92 r Falaise', 15, 4),
(16, 'Rossa', 'Claire', '14 av Thiès', 15, 1),
(17, 'Cauchy', 'Denis', '5 av Ste Thérèse', 16, 2),
(18, 'Gaffé', 'Dominique', '9 av 1ère Armée Française', 17, 5),
(19, 'Guenon', 'Dominique', '98 bd Mar Lyautey', 18, 3),
(20, 'Prévot', 'Dominique', '29 r Lucien Nelle', 19, 4),
(21, 'Houchard', 'Eliane', '9 r Demolombe', 20, 1),
(22, 'Desmons', 'Elisabeth', '51 r Bernières', 21, 2),
(23, 'Flament', 'Elisabeth', '11 r Pasteur', 17, 5),
(24, 'Goussard', 'Emmanuel', '9 r Demolombe', 2, 3),
(25, 'Desprez', 'Eric', '9 r Vaucelles', 22, 4),
(26, 'Coste', 'Evelyne', '29 r Lucien Nelle', 23, 1),
(27, 'Lefebvre', 'Frédéric', '2 pl Wurzburg', 24, 2),
(28, 'Lemée', 'Frédéric', '29 av 6 Juin', 25, 5),
(29, 'Martin', 'Frédéric', 'Bât A 90 r Bayeux', 26, 3),
(30, 'Marie', 'Frédérique', '172 r Caponière', 26, 4),
(31, 'Rosenstech', 'Geneviève', '27 r Auvergne', 13, 1),
(32, 'Pontavice', 'Ghislaine', '8 r Gaillon', 27, 2),
(33, 'Leveneur-Mosquet', 'Guillaume', '47 av Robert Schuman', 28, 5),
(34, 'Blanchais', 'Guy', '30 r Authie', 29, 3),
(35, 'Leveneur', 'Hugues', '7 pl St Gilles', 30, 4),
(36, 'Mosquet', 'Isabelle', '22 r Jules Verne', 31, 1),
(37, 'Giraudon', 'Jean-Christophe', '1 r Albert de Mun', 32, 2),
(38, 'Marie', 'Jean-Claude', '26 r Hérouville', 33, 5),
(39, 'Maury', 'Jean-François', '5 r Pierre Girard', 34, 3),
(40, 'Dennel', 'Jean-Louis', '7 pl St Gilles', 35, 4),
(41, 'Ain', 'Jean-Pierre', '4 résid Olympia', 36, 1),
(42, 'Chemery', 'Jean-Pierre', '51 pl Ancienne Boucherie', 37, 2),
(43, 'Comoz', 'Jean-Pierre', '35 r Auguste Lechesne', 38, 5),
(44, 'Desfaudais', 'Jean-Pierre', '7 pl St Gilles', 39, 3),
(45, 'Phan', 'JérÃ´me', '9 r Clos Caillet', 40, 4),
(46, 'Riou', 'Line', '43 bd Gén Vanier', 41, 1),
(47, 'Chubilleau', 'Louis', '46 r Eglise', 42, 2),
(48, 'Lebrun', 'Lucette', '178 r Auge', 43, 5),
(49, 'Goessens', 'Marc', '6 av 6 Juin', 44, 3),
(50, 'Laforge', 'Marc', '5 résid Prairie', 45, 4),
(51, 'Millereau', 'Marc', '36 av 6 Juin', 46, 1),
(52, 'Dauverne', 'Marie-Christine', '69 av Charlemagne', 47, 2),
(53, 'Vittorio', 'Myriam', '3 pl Champlain', 48, 5),
(54, 'Lapasset', 'Nhieu', '31 av 6 Juin', 49, 3),
(55, 'Plantet-Besnier', 'Nicole', '10 av 1ère Armée Française', 50, 4),
(56, 'Chubilleau', 'Pascal', '3 r Hastings', 51, 1),
(57, 'Robert', 'Pascal', '31 r St Jean', 52, 2),
(58, 'Jean', 'Pascale', '114 r Authie', 53, 5),
(59, 'Chanteloube', 'Patrice', '14 av Thiès', 54, 3),
(60, 'Lecuirot', 'Patrice', 'résid St Pères 55 r Pigacière', 43, 4),
(61, 'Gandon', 'Patrick', '47 av Robert Schuman', 55, 1),
(62, 'Mirouf', 'Patrick', '22 r Puits Picard', 56, 2),
(63, 'Boireaux', 'Philippe', '14 av Thiès', 57, 5),
(64, 'Cendrier', 'Philippe', '7 pl St Gilles', 58, 3),
(65, 'Duhamel', 'Philippe', '114 r Authie', 9, 4),
(66, 'Grigy', 'Philippe', '15 r Mélingue', 59, 1),
(67, 'Linard', 'Philippe', '1 r Albert de Mun', 60, 2),
(68, 'Lozier', 'Philippe', '8 r Gaillon', 61, 5),
(69, 'Dechâtre', 'Pierre', '63 av Thiès', 62, 3),
(70, 'Goessens', 'Pierre', '22 r Jean Romain', 63, 4),
(71, 'Leménager', 'Pierre', '39 av 6 Juin', 64, 1),
(72, 'Née', 'Pierre', '39 av 6 Juin', 65, 2),
(73, 'Guyot', 'Pierre-Laurent', '43 bd Gén Vanier', 66, 5),
(74, 'Chauchard', 'Roger', '9 r Vaucelles', 54, 3),
(75, 'Mabire', 'Roland', '11 r Boutiques', 11, 4),
(76, 'Leroy', 'Soazig', '45 r Boutiques', 67, 1),
(77, 'Guyot', 'Stéphane', '26 r Hérouville', 68, 2),
(78, 'Delposen', 'Sylvain', '39 av 6 Juin', 69, 5),
(79, 'Rault', 'Sylvie', '15 bd Richemond', 70, 3),
(80, 'Renouf', 'Sylvie', '98 bd Mar Lyautey', 71, 4),
(81, 'Alliet-Grach', 'Thierry', '14 av Thiès', 72, 1),
(82, 'Bayard', 'Thierry', '92 r Falaise', 73, 2),
(83, 'Gauchet', 'Thierry', '7 r Desmoueux', 74, 5),
(84, 'Bobichon', 'Tristan', '219 r Caponière', 75, 3),
(85, 'Duchemin-Laniel', 'Véronique', '130 r St Jean', 76, 4),
(86, 'Laurent', 'Younès', '34 r Demolombe', 77, 1);

-- --------------------------------------------------------

--
-- Structure de la table `prestation`
--

CREATE TABLE `prestation` (
  `id` int(11) NOT NULL,
  `nom` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prospect`
--

CREATE TABLE `prospect` (
  `id_Praticien` int(11) NOT NULL,
  `id_Etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `type_praticien`
--

CREATE TABLE `type_praticien` (
  `id` int(11) NOT NULL,
  `code` varchar(6) NOT NULL,
  `libelle` varchar(25) NOT NULL,
  `lieu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `type_praticien`
--

INSERT INTO `type_praticien` (`id`, `code`, `libelle`, `lieu`) VALUES
(1, 'MH', 'Médecin Hospitalier', 'Hopital ou Clinique'),
(2, 'MV', 'Médecine de Ville', 'Cabinet'),
(3, 'PH', 'Pharmacien Hospitalier', 'Hopital ou Clinique'),
(4, 'PO', 'Pharmacien Officine', 'Pharmacie'),
(5, 'PS', 'Personnel de santé', 'Centre Paramédical');

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE `ville` (
  `id` int(11) NOT NULL,
  `nom` varchar(45) NOT NULL,
  `code_postal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `ville`
--

INSERT INTO `ville` (`id`, `nom`, `code_postal`) VALUES
(1, 'LA ROCHE SUR YON', '85000'),
(2, 'BLOIS', '41000'),
(3, 'BESANCON', '25000'),
(4, 'BEAUVAIS', '60000'),
(5, 'NIMES', '30000'),
(6, 'AMIENS', '80000'),
(7, 'MORLAIX', '29000'),
(8, 'MULHOUSE', '68000'),
(9, 'MONTPELLIER', '34000'),
(10, 'LILLE', '59000'),
(11, 'STRASBOURG', '67000'),
(12, 'TROYES', '10000'),
(13, 'PARIS', '75000'),
(14, 'ORLEANS', '45000'),
(15, 'NICE', '6000'),
(16, 'NARBONNE', '11000'),
(17, 'RENNES', '35000'),
(18, 'NANTES', '44000'),
(19, 'LIMOGES', '87000'),
(20, 'ANGERS', '49100'),
(21, 'QUIMPER', '29000'),
(22, 'BORDEAUX', '33000'),
(23, 'TULLE', '19000'),
(24, 'VERDUN', '55000'),
(25, 'VANNES', '56000'),
(26, 'VESOUL', '70000'),
(27, 'POITIERS', '86000'),
(28, 'PAU', '64000'),
(29, 'SEDAN', '8000'),
(30, 'ARRAS', '62000'),
(31, 'ROUEN', '76000'),
(32, 'VIENNE', '38100'),
(33, 'LYON', '69000'),
(34, 'CHALON SUR SAONE', '71000'),
(35, 'CHARTRES', '28000'),
(36, 'LAON', '2000'),
(37, 'CAEN', '14000'),
(38, 'BOURGES', '18000'),
(39, 'BREST', '29000'),
(40, 'NIORT', '79000'),
(41, 'MARNE LA VALLEE', '77000'),
(42, 'SAINTES', '17000'),
(43, 'NANCY', '54000'),
(44, 'DOLE', '39000'),
(45, 'SAINT LO', '50000'),
(46, 'LA FERTE BERNARD', '72000'),
(47, 'DIJON', '21000'),
(48, 'BOISSY SAINT LEGER', '94000'),
(49, 'CHAUMONT', '52000'),
(50, 'CHATELLEREAULT', '86000'),
(51, 'AURRILLAC', '15000'),
(52, 'BOBIGNY', '93000'),
(53, 'SAUMUR', '49100'),
(54, 'MARSEILLE', '13000'),
(55, 'TOURS', '37000'),
(56, 'ANNECY', '74000'),
(57, 'CHALON EN CHAMPAGNE', '10000'),
(58, 'RODEZ', '12000'),
(59, 'CLISSON', '44000'),
(60, 'ALBI', '81000'),
(61, 'TOULOUSE', '31000'),
(62, 'MONTLUCON', '23000'),
(63, 'MONT DE MARSAN', '40000'),
(64, 'METZ', '57000'),
(65, 'MONTAUBAN', '82000'),
(66, 'MENDE', '48000'),
(67, 'ALENCON', '61000'),
(68, 'FIGEAC', '46000'),
(69, 'DREUX', '27000'),
(70, 'SOISSON', '2000'),
(71, 'EPINAL', '88000'),
(72, 'PRIVAS', '7000'),
(73, 'SAINT ETIENNE', '42000'),
(74, 'GRENOBLE', '38100'),
(75, 'FOIX', '9000'),
(76, 'LIBOURNE', '33000'),
(77, 'MAYENNE', '53000');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_Praticien`);

--
-- Index pour la table `etat`
--
ALTER TABLE `etat`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `interesser`
--
ALTER TABLE `interesser`
  ADD PRIMARY KEY (`id_Prestation`,`id_Client`),
  ADD KEY `id_Client` (`id_Client`);

--
-- Index pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Praticien_id_Ville` (`id_Ville`),
  ADD KEY `FK_Praticien_id_Type_Praticien` (`id_Type_Praticien`) USING BTREE;

--
-- Index pour la table `prestation`
--
ALTER TABLE `prestation`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD PRIMARY KEY (`id_Praticien`),
  ADD KEY `FK_Prospect_id_Etat` (`id_Etat`);

--
-- Index pour la table `type_praticien`
--
ALTER TABLE `type_praticien`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `ville`
--
ALTER TABLE `ville`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `etat`
--
ALTER TABLE `etat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `praticien`
--
ALTER TABLE `praticien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT pour la table `prestation`
--
ALTER TABLE `prestation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `type_praticien`
--
ALTER TABLE `type_praticien`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `ville`
--
ALTER TABLE `ville`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_Client_id_Praticien` FOREIGN KEY (`id_Praticien`) REFERENCES `praticien` (`id`);

--
-- Contraintes pour la table `interesser`
--
ALTER TABLE `interesser`
  ADD CONSTRAINT `FK_interesser_id_Prestation` FOREIGN KEY (`id_Prestation`) REFERENCES `prestation` (`id`),
  ADD CONSTRAINT `interesser_ibfk_1` FOREIGN KEY (`id_Client`) REFERENCES `client` (`id_Praticien`);

--
-- Contraintes pour la table `praticien`
--
ALTER TABLE `praticien`
  ADD CONSTRAINT `FK_Praticien_id_Type_Praticien` FOREIGN KEY (`id_Type_Praticien`) REFERENCES `type_praticien` (`id`),
  ADD CONSTRAINT `FK_Praticien_id_Ville` FOREIGN KEY (`id_Ville`) REFERENCES `ville` (`id`);

--
-- Contraintes pour la table `prospect`
--
ALTER TABLE `prospect`
  ADD CONSTRAINT `FK_Prospect_id_Etat` FOREIGN KEY (`id_Etat`) REFERENCES `etat` (`id`),
  ADD CONSTRAINT `FK_Prospect_id_Praticien` FOREIGN KEY (`id_Praticien`) REFERENCES `praticien` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
