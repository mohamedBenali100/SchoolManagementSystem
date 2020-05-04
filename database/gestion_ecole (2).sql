-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 20 déc. 2018 à 18:34
-- Version du serveur :  10.1.32-MariaDB
-- Version de PHP :  7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `gestion_ecole`
--

-- --------------------------------------------------------

--
-- Structure de la table `absence`
--

CREATE TABLE `absence` (
  `Id_absence` int(50) NOT NULL,
  `Date` varchar(50) NOT NULL,
  `Nb_heur` float NOT NULL,
  `Justification` varchar(50) NOT NULL,
  `Id_etudiant` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `absence`
--

INSERT INTO `absence` (`Id_absence`, `Date`, `Nb_heur`, `Justification`, `Id_etudiant`) VALUES
(1, '19/12/2018', 2, 'malade', 'F131356487'),
(2, '20/12/2018', 6, 'zwina', 'HH1234986');

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `Username` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`Username`, `Password`) VALUES
('ybenali', '123456789');

-- --------------------------------------------------------

--
-- Structure de la table `emploi2`
--

CREATE TABLE `emploi2` (
  `Id_emploi` int(11) NOT NULL,
  `image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `emploi2`
--

INSERT INTO `emploi2` (`Id_emploi`, `image`) VALUES
(0, 'image/81218.jpg'),
(1, 'image/127.0.01.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `ensegner`
--

CREATE TABLE `ensegner` (
  `Id_prof` varchar(50) NOT NULL,
  `Id_matiere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ensegner`
--

INSERT INTO `ensegner` (`Id_prof`, `Id_matiere`) VALUES
('1', '1'),
('1', '2'),
('1', '55'),
('55', '5');

-- --------------------------------------------------------

--
-- Structure de la table `ensegner2`
--

CREATE TABLE `ensegner2` (
  `Id_matier` varchar(50) NOT NULL,
  `id_prof` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `ensegner2`
--

INSERT INTO `ensegner2` (`Id_matier`, `id_prof`) VALUES
('5', '55'),
('1', '1'),
('12345', '1');

-- --------------------------------------------------------

--
-- Structure de la table `etudiant`
--

CREATE TABLE `etudiant` (
  `Id_etudiant` varchar(50) NOT NULL,
  `CIN` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Num_tele` varchar(50) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Id_niveau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etudiant`
--

INSERT INTO `etudiant` (`Id_etudiant`, `CIN`, `Nom`, `Prenom`, `Adresse`, `Num_tele`, `Sex`, `Email`, `Id_niveau`) VALUES
('F131356487', 'Q338107', 'BENALI', 'YASSIR', '24 ELMASSIR KHOURIBGUA', '0654634109', 'homme', 'benali.yassire@gmail.com', '2'),
('HH1234986', 'HH21459', 'benhmid', 'shaimae', 'safi', '0606060606', 'femme', 'shaimaebenhmid@gmail.com', '2'),
('k125478963', 'HH118531', 'kalkhi', 'salma', 'safi', '0616569874', 'femme', 'salma.kalkhi@gmail.com', '2');

-- --------------------------------------------------------

--
-- Structure de la table `filiere`
--

CREATE TABLE `filiere` (
  `Id_filiere` varchar(50) NOT NULL,
  `Nomfiliere` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `filiere`
--

INSERT INTO `filiere` (`Id_filiere`, `Nomfiliere`) VALUES
('0', ''),
('1', 'GI'),
('2', 'Technique instrumental et management de qualite'),
('5', 'TIMQ');

-- --------------------------------------------------------

--
-- Structure de la table `matiere`
--

CREATE TABLE `matiere` (
  `Id_matiere` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `matiere`
--

INSERT INTO `matiere` (`Id_matiere`, `Nom`) VALUES
('1', 'CRYPTOLOGI'),
('100', 'walo'),
('1222', '111'),
('12345', 'java'),
('2', 'SE'),
('5', 'WEB'),
('55', 'Reseau'),
('8', 'Cravins');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE `niveau` (
  `Id_niveau` varchar(50) NOT NULL,
  `Nomniveau` varchar(50) NOT NULL,
  `Id_filiere` varchar(50) NOT NULL,
  `Id_emploi2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`Id_niveau`, `Nomniveau`, `Id_filiere`, `Id_emploi2`) VALUES
('1', '1 annee GI', '1', 0),
('2', '2eme annee', '1', 1);

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

CREATE TABLE `professeur` (
  `Id_prof` varchar(50) NOT NULL,
  `Nom` varchar(50) NOT NULL,
  `Prenom` varchar(50) NOT NULL,
  `Specialite` varchar(50) NOT NULL,
  `CIN` varchar(50) NOT NULL,
  `Adresse` varchar(100) NOT NULL,
  `Num_tele` varchar(50) NOT NULL,
  `Sex` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`Id_prof`, `Nom`, `Prenom`, `Specialite`, `CIN`, `Adresse`, `Num_tele`, `Sex`, `Email`) VALUES
('1', 'Mohamed', 'hatimi', 'CRYPTOLOGIE', 'HA218783', '935 PANORAMA DR', '0619883436', 'homme', 'anne_tida@hotmail.com'),
('55', 'BAKKAS', 'JAMAL', 'WEB', 'Q338108', 'safi', '06666666666', 'homme', 'Jamal.bakkas@gmail.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `absence`
--
ALTER TABLE `absence`
  ADD PRIMARY KEY (`Id_absence`),
  ADD KEY `Id_etudiant` (`Id_etudiant`);

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`Username`,`Password`);

--
-- Index pour la table `emploi2`
--
ALTER TABLE `emploi2`
  ADD PRIMARY KEY (`Id_emploi`);

--
-- Index pour la table `ensegner`
--
ALTER TABLE `ensegner`
  ADD KEY `Id_matiere` (`Id_matiere`),
  ADD KEY `Id_prof` (`Id_prof`,`Id_matiere`) USING BTREE;

--
-- Index pour la table `ensegner2`
--
ALTER TABLE `ensegner2`
  ADD KEY `Id_matier` (`Id_matier`),
  ADD KEY `id_prof` (`id_prof`);

--
-- Index pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD PRIMARY KEY (`Id_etudiant`),
  ADD KEY `Id_niveau` (`Id_niveau`);

--
-- Index pour la table `filiere`
--
ALTER TABLE `filiere`
  ADD PRIMARY KEY (`Id_filiere`);

--
-- Index pour la table `matiere`
--
ALTER TABLE `matiere`
  ADD PRIMARY KEY (`Id_matiere`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD PRIMARY KEY (`Id_niveau`),
  ADD KEY `Id_filiere` (`Id_filiere`),
  ADD KEY `Id_emploi2` (`Id_emploi2`);

--
-- Index pour la table `professeur`
--
ALTER TABLE `professeur`
  ADD PRIMARY KEY (`Id_prof`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `absence`
--
ALTER TABLE `absence`
  MODIFY `Id_absence` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `absence`
--
ALTER TABLE `absence`
  ADD CONSTRAINT `absence_ibfk_1` FOREIGN KEY (`Id_etudiant`) REFERENCES `etudiant` (`Id_etudiant`);

--
-- Contraintes pour la table `ensegner`
--
ALTER TABLE `ensegner`
  ADD CONSTRAINT `ensegner_ibfk_1` FOREIGN KEY (`Id_matiere`) REFERENCES `matiere` (`Id_matiere`),
  ADD CONSTRAINT `ensegner_ibfk_2` FOREIGN KEY (`Id_prof`) REFERENCES `professeur` (`Id_prof`);

--
-- Contraintes pour la table `ensegner2`
--
ALTER TABLE `ensegner2`
  ADD CONSTRAINT `ensegner2_ibfk_1` FOREIGN KEY (`Id_matier`) REFERENCES `matiere` (`Id_matiere`),
  ADD CONSTRAINT `ensegner2_ibfk_2` FOREIGN KEY (`id_prof`) REFERENCES `professeur` (`Id_prof`);

--
-- Contraintes pour la table `etudiant`
--
ALTER TABLE `etudiant`
  ADD CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`Id_niveau`) REFERENCES `niveau` (`Id_niveau`);

--
-- Contraintes pour la table `niveau`
--
ALTER TABLE `niveau`
  ADD CONSTRAINT `niveau_ibfk_2` FOREIGN KEY (`Id_filiere`) REFERENCES `filiere` (`Id_filiere`),
  ADD CONSTRAINT `niveau_ibfk_3` FOREIGN KEY (`Id_emploi2`) REFERENCES `emploi2` (`Id_emploi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
