-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 11:17 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `idAdmin` int(11) NOT NULL,
  `nomAdmin` varchar(500) NOT NULL,
  `matriculeAdmin` varchar(100) NOT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`idAdmin`, `nomAdmin`, `matriculeAdmin`, `Utilisateur_idUtilisateur`) VALUES
(1, 'admin', '12ml120', 4);

-- --------------------------------------------------------

--
-- Table structure for table `agentmin`
--

CREATE TABLE `agentmin` (
  `idAgentMin` int(11) NOT NULL,
  `matriculeAgentMin` varchar(100) NOT NULL,
  `fonctionAgentMin` varchar(100) NOT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agentmin`
--

INSERT INTO `agentmin` (`idAgentMin`, `matriculeAgentMin`, `fonctionAgentMin`, `Utilisateur_idUtilisateur`) VALUES
(1, '15kn102', 'directeur', 3),
(2, '17vdn145', 'cadre', 8);

-- --------------------------------------------------------

--
-- Table structure for table `agentsecas`
--

CREATE TABLE `agentsecas` (
  `idAgentSECAS` int(11) NOT NULL,
  `matriculeAgentSECAS` varchar(500) NOT NULL,
  `provinceAgentSECAS` varchar(500) NOT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agentsecas`
--

INSERT INTO `agentsecas` (`idAgentSECAS`, `matriculeAgentSECAS`, `provinceAgentSECAS`, `Utilisateur_idUtilisateur`) VALUES
(1, '16kk106', 'haut-katanga', 1),
(2, '16kl120', 'bas-uele', 6),
(3, '17kmj120', 'sankuru', 7);

-- --------------------------------------------------------

--
-- Table structure for table `attestation`
--

CREATE TABLE `attestation` (
  `idAttestation` int(11) NOT NULL,
  `Notaire_idNotaire` int(11) NOT NULL,
  `RenteSurvie_idRenteSurvie` int(11) NOT NULL,
  `etat` int(11) NOT NULL,
  `dateValidation` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attestation`
--

INSERT INTO `attestation` (`idAttestation`, `Notaire_idNotaire`, `RenteSurvie_idRenteSurvie`, `etat`, `dateValidation`) VALUES
(1, 1, 1, 1, '18-07-2021');

-- --------------------------------------------------------

--
-- Table structure for table `budjet`
--

CREATE TABLE `budjet` (
  `idBudjet` int(11) NOT NULL,
  `montant` double NOT NULL,
  `Rapport_idRapport` int(11) NOT NULL,
  `annee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `budjet`
--

INSERT INTO `budjet` (`idBudjet`, `montant`, `Rapport_idRapport`, `annee`) VALUES
(1, 40000, 1, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `idDocument` int(11) NOT NULL,
  `titreDocument` varchar(800) NOT NULL,
  `dateDocument` varchar(20) NOT NULL,
  `typeDocument` varchar(50) NOT NULL,
  `descDocument` varchar(800) NOT NULL,
  `AgentSECAS_idAgentSECAS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membre`
--

CREATE TABLE `membre` (
  `idMembre` int(11) NOT NULL,
  `nomMembre` varchar(200) NOT NULL,
  `dateNMembre` varchar(20) NOT NULL,
  `parente` varchar(20) NOT NULL,
  `Militaire_idMilitaire` int(11) NOT NULL,
  `etat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `membre`
--

INSERT INTO `membre` (`idMembre`, `nomMembre`, `dateNMembre`, `parente`, `Militaire_idMilitaire`, `etat`) VALUES
(1, 'jack boeur', '2021-07-07', 'enfant', 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `militaire`
--

CREATE TABLE `militaire` (
  `idMilitaire` int(11) NOT NULL,
  `NomMilitaire` varchar(200) NOT NULL,
  `Matricule` varchar(20) NOT NULL,
  `dateNaiss` varchar(100) NOT NULL,
  `villeResidance` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `militaire`
--

INSERT INTO `militaire` (`idMilitaire`, `NomMilitaire`, `Matricule`, `dateNaiss`, `villeResidance`) VALUES
(4, 'john Doe', '15kl102', '2001-07-12', 'lubumbashi');

-- --------------------------------------------------------

--
-- Table structure for table `notaire`
--

CREATE TABLE `notaire` (
  `idNotaire` int(11) NOT NULL,
  `matriculeNotaire` varchar(100) NOT NULL,
  `provinceNotaire` varchar(200) NOT NULL,
  `Utilisateur_idUtilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notaire`
--

INSERT INTO `notaire` (`idNotaire`, `matriculeNotaire`, `provinceNotaire`, `Utilisateur_idUtilisateur`) VALUES
(1, '15kd102', 'haut-katanga', 2);

-- --------------------------------------------------------

--
-- Table structure for table `rapport`
--

CREATE TABLE `rapport` (
  `idRapport` int(11) NOT NULL,
  `periode` varchar(20) NOT NULL,
  `destinataire` varchar(50) NOT NULL,
  `AgentMin_idAgentMin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rapport`
--

INSERT INTO `rapport` (`idRapport`, `periode`, `destinataire`, `AgentMin_idAgentMin`) VALUES
(1, '2021', 'SECAS', 1),
(2, '2021', 'SECAS', 1);

-- --------------------------------------------------------

--
-- Table structure for table `rentesurvie`
--

CREATE TABLE `rentesurvie` (
  `idRenteSurvie` int(11) NOT NULL,
  `date` varchar(20) NOT NULL,
  `liquidateur` varchar(100) NOT NULL,
  `Militaire_idMilitaire` int(11) NOT NULL,
  `AgentSECAS_idAgentSECAS` int(11) NOT NULL,
  `etatRente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rentesurvie`
--

INSERT INTO `rentesurvie` (`idRenteSurvie`, `date`, `liquidateur`, `Militaire_idMilitaire`, `AgentSECAS_idAgentSECAS`, `etatRente`) VALUES
(1, '2021-07-18', '1', 4, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `idUtilisateur` int(11) NOT NULL,
  `nomUtilisateur` varchar(300) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `typeUser` varchar(100) NOT NULL,
  `login` varchar(20) NOT NULL,
  `pwd` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`idUtilisateur`, `nomUtilisateur`, `phone`, `typeUser`, `login`, `pwd`) VALUES
(1, 'daniel', '+243974070832', 'Agent', 'daniel', 'daniel'),
(2, 'dingo', '+243843121054', 'Notaire', 'dingo', 'dingo'),
(3, 'alberto', '+243978186502', 'Min', 'alberta', 'alberto'),
(4, 'admin', '+2222222222', 'Admin', 'admin', 'admin'),
(6, 'princo', '+248562322222', 'Agent', '16kl124', 'princo@16kl120'),
(7, 'jesse kamba', '+243958526332', 'Notaire', '17kmj120', 'jesse kamba@17kmj120'),
(8, 'valence mukoj', '+243958526001', 'Min', '17vdn145', 'valence mukoj@17vdn1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idAdmin`);

--
-- Indexes for table `agentmin`
--
ALTER TABLE `agentmin`
  ADD PRIMARY KEY (`idAgentMin`);

--
-- Indexes for table `agentsecas`
--
ALTER TABLE `agentsecas`
  ADD PRIMARY KEY (`idAgentSECAS`);

--
-- Indexes for table `attestation`
--
ALTER TABLE `attestation`
  ADD PRIMARY KEY (`idAttestation`);

--
-- Indexes for table `budjet`
--
ALTER TABLE `budjet`
  ADD PRIMARY KEY (`idBudjet`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`idDocument`);

--
-- Indexes for table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`idMembre`);

--
-- Indexes for table `militaire`
--
ALTER TABLE `militaire`
  ADD PRIMARY KEY (`idMilitaire`);

--
-- Indexes for table `notaire`
--
ALTER TABLE `notaire`
  ADD PRIMARY KEY (`idNotaire`);

--
-- Indexes for table `rapport`
--
ALTER TABLE `rapport`
  ADD PRIMARY KEY (`idRapport`);

--
-- Indexes for table `rentesurvie`
--
ALTER TABLE `rentesurvie`
  ADD PRIMARY KEY (`idRenteSurvie`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`idUtilisateur`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agentmin`
--
ALTER TABLE `agentmin`
  MODIFY `idAgentMin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `agentsecas`
--
ALTER TABLE `agentsecas`
  MODIFY `idAgentSECAS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `attestation`
--
ALTER TABLE `attestation`
  MODIFY `idAttestation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `budjet`
--
ALTER TABLE `budjet`
  MODIFY `idBudjet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `idDocument` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `membre`
--
ALTER TABLE `membre`
  MODIFY `idMembre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `militaire`
--
ALTER TABLE `militaire`
  MODIFY `idMilitaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `notaire`
--
ALTER TABLE `notaire`
  MODIFY `idNotaire` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rapport`
--
ALTER TABLE `rapport`
  MODIFY `idRapport` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rentesurvie`
--
ALTER TABLE `rentesurvie`
  MODIFY `idRenteSurvie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `idUtilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
