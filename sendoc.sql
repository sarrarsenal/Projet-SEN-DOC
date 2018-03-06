-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 26 Mai 2015 à 12:57
-- Version du serveur :  5.6.21
-- Version de PHP :  5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sendoc`
--

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `categorie` (
`CodeCategorie` int(2) NOT NULL,
  `NomCategorie` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `categorie`
--

INSERT INTO `categorie` (`CodeCategorie`, `NomCategorie`) VALUES
(1, 'Mathematique'),
(2, 'Informatique'),
(3, 'Medecine'),
(4, 'Histoire'),
(5, 'Geographie'),
(6, 'Physique'),
(7, 'Chimie'),
(8, 'Economie & Gestion'),
(9, 'Espagnol'),
(10, 'Anglais'),
(11, 'Allemand'),
(12, 'Russe'),
(13, 'Philosophie'),
(14, 'Genie Civil'),
(15, 'Science Juridique'),
(16, 'Genie Mecanique'),
(17, 'Genie Electric'),
(18, 'Arabe'),
(19, 'Droit'),
(22, 'Portuguais'),
(24, 'Francais'),
(25, 'Banque & Finance');

-- --------------------------------------------------------

--
-- Structure de la table `compteur`
--

CREATE TABLE IF NOT EXISTS `compteur` (
`c_id` mediumint(8) unsigned NOT NULL,
  `c_firstvisit` datetime NOT NULL,
  `c_lastvisit` datetime NOT NULL,
  `c_total` int(11) NOT NULL,
  `c_ip` varchar(40) NOT NULL,
  `c_host` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `compteur`
--

INSERT INTO `compteur` (`c_id`, `c_firstvisit`, `c_lastvisit`, `c_total`, `c_ip`, `c_host`) VALUES
(2, '2015-05-25 22:16:06', '2015-05-26 11:17:20', 0, '127.0.0.1', 'sarrarsenal');

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
`CodeInscription` int(11) NOT NULL,
  `NomEtudiant` varchar(50) NOT NULL,
  `PrenomEtudiant` varchar(50) NOT NULL,
  `EmailEtudiant` varchar(50) NOT NULL,
  `MotDePasseEtudiant` varchar(50) NOT NULL,
  `MotDePasseEtudiantConfirm` varchar(50) NOT NULL,
  `SexeEtudiant` varchar(7) NOT NULL,
  `CodeUniversite` int(2) NOT NULL,
  `DateInscription` date DEFAULT NULL,
  `NomUtilisateur` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `inscription`
--

INSERT INTO `inscription` (`CodeInscription`, `NomEtudiant`, `PrenomEtudiant`, `EmailEtudiant`, `MotDePasseEtudiant`, `MotDePasseEtudiantConfirm`, `SexeEtudiant`, `CodeUniversite`, `DateInscription`, `NomUtilisateur`) VALUES
(26, 'GAYE', 'LAMINE', 'LAMINE@YAHOO.FR', '73961cd10f76f35f39604fc014b640b9', '73961cd10f76f35f39604fc014b640b9', 'homme', 3, '2015-05-14', 'LAMINE'),
(27, 'DIOUF', 'SAMBA', 'SAMBA@YAHOO.FR', '4392c038f7dbb526d92fedb3e2e88ee4', '4392c038f7dbb526d92fedb3e2e88ee4', 'homme', 1, '2015-05-14', 'SAMBA'),
(28, 'DIOUF', 'SAMBA', 'SAMBA@YAHOO.FR', '4392c038f7dbb526d92fedb3e2e88ee4', '4392c038f7dbb526d92fedb3e2e88ee4', 'homme', 1, '2015-05-14', 'SAMBA'),
(29, 'DIOUF', 'SAMBA', 'SAMBA@YAHOO.FR', '4392c038f7dbb526d92fedb3e2e88ee4', '4392c038f7dbb526d92fedb3e2e88ee4', 'homme', 1, '2015-05-14', 'SAMBA'),
(30, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'homme', 0, '2015-05-14', ''),
(31, 'DIOP', 'LAMINE', 'DIOP@YAHOO.FR', '505bcf79114ee7cb506b740e3fd18e61', '505bcf79114ee7cb506b740e3fd18e61', 'homme', 2, '2015-05-14', 'DIOBA'),
(32, '', '', '', 'd41d8cd98f00b204e9800998ecf8427e', 'd41d8cd98f00b204e9800998ecf8427e', 'homme', 0, '2015-05-14', ''),
(33, 'DAFFE', 'DAOUDA', 'sarr.moha90@yahoo.fr', '4a9f5ddbbc884908333181c76142a0f9', 'eded41d62012144663561bdfb25c1028', 'homme', 0, '2015-05-14', 'SARRARSENAL'),
(34, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(35, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(36, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(37, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(38, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(39, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(40, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(41, 'DIOP', 'MOHAMED', 'sarr.moha90@yahoo.fr', 'f96b13515e73dccc72744a54dc20714f', '77ad9438c799acb57eee04a3a6794416', 'homme', 5, '2015-05-14', 'SARRARSENAL'),
(42, 'DAFFE', 'DAOUDA', 'sarr.moha90@yahoo.fr', '010e34fe6d5a21b00ef1fbc622a62550', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 6, '2015-05-14', 'FALLISME'),
(43, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(44, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(45, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(46, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(47, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(48, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(49, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(50, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(51, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(52, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(53, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(54, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(55, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(56, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(57, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(58, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(59, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(60, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(61, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(62, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(63, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(64, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(65, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(66, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(67, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(68, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(69, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'femme', 2, '2015-05-14', 'SARRARSENAL'),
(70, 'DIOP', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'cef468eeda569cc1b16b45fd53200b9c', 'fa02962f5fb9474dd13bba1c1908681d', 'homme', 2, '2015-05-14', 'SARRARSENAL'),
(71, 'DIOUF', 'MOHAMED', 'sarr.moha90@gmail.com', 'c12292d80c477ae3f0f77165dfc3dcbe', '73c0a55e6b10dfbb114bcf59c7bcefb5', 'homme', 4, '2015-05-14', 'SARRARSENAL'),
(72, 'DIOUF', 'MOHAMED', 'sarr.moha90@gmail.com', 'c12292d80c477ae3f0f77165dfc3dcbe', '73c0a55e6b10dfbb114bcf59c7bcefb5', 'homme', 4, '2015-05-14', 'SARRARSENAL'),
(73, 'DIOUF', 'MOHAMED', 'sarr.moha90@gmail.com', 'c12292d80c477ae3f0f77165dfc3dcbe', '73c0a55e6b10dfbb114bcf59c7bcefb5', 'homme', 4, '2015-05-14', 'SARRARSENAL'),
(74, 'DIOUF', 'MOHAMED', 'sarr.moha90@gmail.com', 'c12292d80c477ae3f0f77165dfc3dcbe', '73c0a55e6b10dfbb114bcf59c7bcefb5', 'homme', 4, '2015-05-14', 'SARRARSENAL'),
(75, 'LO', 'MOUSSA', 'LO@YAHOO.FR', '00ae633cf88a8b63224fd84e647108f9', '00ae633cf88a8b63224fd84e647108f9', 'homme', 2, '2015-05-14', 'LOWANE'),
(76, 'LO', 'MOUSSA', 'LO@YAHOO.FR', '00ae633cf88a8b63224fd84e647108f9', '00ae633cf88a8b63224fd84e647108f9', 'homme', 2, '2015-05-14', 'LOWANE'),
(77, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(78, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(79, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(80, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(81, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(82, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(83, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(84, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(85, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(86, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(87, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(88, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(89, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(90, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(91, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(92, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(93, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(94, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(95, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(96, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(97, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(98, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(99, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(100, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(101, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(102, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(103, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(104, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(105, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(106, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(107, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(108, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(109, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(110, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(111, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(112, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(113, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(114, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(115, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(116, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(117, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(118, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(119, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(120, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(121, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(122, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(123, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(124, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(125, 'SARR', 'LAMINE', 'sarr.moha90@gmail.com', '4ed4f1ba462548e540cd70c43c703d40', 'e4088d96dd4001bb5b54607af15a2de6', 'homme', 5, '2015-05-14', 'sarr'),
(126, 'DAFFE', 'LAMINE', 'sakds@live.fr', '6ba4d5c3d22848b06b36f28256728d7c', 'a4ebb21740f8da007db6ba4161b85d84', 'homme', 4, '2015-05-15', 'lamine'),
(127, 'sarr', 'MOHAMED', 'sarr.moha90@yahoo.fr', '4e6f5843f6598a1fb0a2c412fd5ac38f', 'a51d68b54cf2192a93960263486c0d83', 'homme', 5, '2015-05-15', 'SARRARSENAL'),
(128, 'fall', 'andou', 'andou@yahoo.fr', 'ea075271abe635fa9f3a9112cd921609', '207cdb34cf6143aef513c91d2ed934e7', 'homme', 1, '2015-05-15', 'sandou'),
(129, ',nsndk', 'k,sqlkd,sdjk', 'kzjaqkdjksq@dksjk.fr', 'f550f196d7ea8c6787e7dc7976a9526c', '817abde9047eeaf76c44eb1b018cf7a5', 'homme', 4, '2015-05-15', 'ksajqkdjzkqjdk'),
(130, 'gaye', 'amadou', 'gaye@yahoo.fr', '1cf0f481bfc3742215ef2f2f9fee2e36', '1cf0f481bfc3742215ef2f2f9fee2e36', 'homme', 2, '2015-05-15', 'gaye'),
(131, 'jsqjdksh', 'akshdjqdh', 'jsdjsd@jdsds.vr', 'bd8ef464aa581f7dbcedbdcd49aff19e', '4bd55862af695ce22283a98beab5b606', 'homme', 2, '2015-05-15', 'kjhaqdshd'),
(132, 'jsqjdksh', 'akshdjqdh', 'jsdjsd@jdsds.vr', 'bd8ef464aa581f7dbcedbdcd49aff19e', '4bd55862af695ce22283a98beab5b606', 'homme', 2, '2015-05-15', 'kjhaqdshd'),
(133, 'jsqjdksh', 'akshdjqdh', 'jsdjsd@jdsds.vr', 'bd8ef464aa581f7dbcedbdcd49aff19e', '4bd55862af695ce22283a98beab5b606', 'homme', 2, '2015-05-15', 'kjhaqdshd'),
(134, 'DIOP', 'DAOUDA', 'FALLMOHA@YAHOO.FR', 'b02cddb4b01283a74704b1488dbe9ba8', '9fda6198402e7132b30972abd639771b', 'homme', 1, '2015-05-15', 'SARRARSENAL'),
(135, 'kdsjkdjs', 'ksjkdjs', 'dkzqsjdkjs@yahoo.fr', 'd38b1ec5434e49d0d4398514914f549d', 'd730f2bf51d65e579875fb790086e054', 'homme', 1, '2015-05-15', 'dskkdsj'),
(136, 'djfds', 'dkjskjks', 'dlskjd@yahoo.fr', 'cc9ae7cf2cd69c112d7dcb717101fb86', '04cca5a4f7975d342d2b5be3decacabe', 'homme', 3, '2015-05-15', 'kdjsqdkjsk'),
(137, 'diop', 'moussa', 'diop@live.fr', '37af1914a777f6161166795396225177', '37af1914a777f6161166795396225177', 'homme', 2, '2015-05-15', 'moussa'),
(138, 'lo', 'abdou', 'abdou@yahoo.fr', 'e9c135d566c55ac85595b8b0d503b116', 'e9c135d566c55ac85595b8b0d503b116', 'homme', 5, '2015-05-15', 'loabdou'),
(139, 'ka', 'abdou', 'ka@yahoo.fr', 'e9c135d566c55ac85595b8b0d503b116', 'e9c135d566c55ac85595b8b0d503b116', 'homme', 5, '2015-05-15', 'ka'),
(140, 'sy', 'racine', 'racine@yahoo.fr', '1a3d9f2937440e67be3b0afd7c53f1eb', '1a3d9f2937440e67be3b0afd7c53f1eb', 'homme', 1, '2015-05-15', 'racine'),
(141, 'sene', 'mbissane', 'mbissane@yahoo.fr', 'e6137b13d5bd57399f1aca8646dc42b1', 'e6137b13d5bd57399f1aca8646dc42b1', 'homme', 2, '2015-05-15', 'mbissane'),
(142, 'jhsdjh', 'dzqsjdsj', 'kdsjkjdks@yahoo.fr', '8fa1a07adb79a606f6efcb3e38303351', '4d355367369dcbdf8a7576f27cfc0f5f', 'homme', 2, '2015-05-15', 'kdsjqdkskf'),
(143, 'diouf', 'pape', 'pape@yahoo.fr', 'a3c0f833831d2680572c89bec6305fc3', 'a3c0f833831d2680572c89bec6305fc3', 'homme', 3, '2015-05-15', 'diouf'),
(144, 'SALL', 'ADAMA', 'adosall@yahoo.fr', '035d9f2a99991e10957090c3568bed64', '035d9f2a99991e10957090c3568bed64', 'homme', 2, '2015-05-15', 'ADO'),
(145, 'DIOP', 'ABDOU', 'ABDOUDIOP@YAHOO.FR', '37af1914a777f6161166795396225177', '37af1914a777f6161166795396225177', 'homme', 2, '2015-05-15', 'DIOP'),
(146, ' DIOUF', 'KADER', 'KADER@YAHOO.FR', '8285f427494fcd331f05158d541e0185', '8285f427494fcd331f05158d541e0185', 'homme', 0, '2015-05-15', 'KADER'),
(147, ' Daillo', 'Laminr', 'lamine@yahoo.fr', '0a105960b5aef32bbf0f194417257a53', '0a105960b5aef32bbf0f194417257a53', 'homme', 0, '2015-05-25', 'lamine');

-- --------------------------------------------------------

--
-- Structure de la table `memoire`
--

CREATE TABLE IF NOT EXISTS `memoire` (
`CodeMemoire` int(11) NOT NULL,
  `CodeUniversite` int(2) NOT NULL,
  `TitreMemoire` varchar(50) NOT NULL,
  `NomAuteur` varchar(50) NOT NULL,
  `PrenomAuteur` varchar(50) NOT NULL,
  `EmailAuteur` varchar(50) NOT NULL,
  `NiveauAuteur` varchar(10) NOT NULL,
  `CodeCategorie` int(2) NOT NULL,
  `AnneeMemoire` year(4) NOT NULL,
  `DescriptionMemoire` text NOT NULL,
  `NomFichier` varchar(100) NOT NULL,
  `DateEnregistrement` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `memoire`
--

INSERT INTO `memoire` (`CodeMemoire`, `CodeUniversite`, `TitreMemoire`, `NomAuteur`, `PrenomAuteur`, `EmailAuteur`, `NiveauAuteur`, `CodeCategorie`, `AnneeMemoire`, `DescriptionMemoire`, `NomFichier`, `DateEnregistrement`) VALUES
(1, 3, 'Memoire', 'Sarr', 'Mohamed', 'sarr.moha90@yahoo.fr', 'licence3', 14, 2006, 'Memoire de Mohamed Sarr', 'a_priori.pdf', '2015-05-23'),
(3, 3, 'RAPPORT ', 'GAYE', 'BABACAR', 'baba@yahoo.fr', 'master2', 2, 2008, 'Rapport de Baba Gaye', 'guide_candidat.pdf', '2015-05-23'),
(4, 2, 'Memoire', 'Diop', 'Fatou', 'diop@yahoo.fr', 'master2', 1, 2006, 'Memoire de Fatou Diop', 'Chapitre5.pdf', '2015-05-23'),
(6, 4, 'Memoire', 'Sene', 'LAMINE', 'sene@live.fr', 'master1', 9, 2007, 'Memoire', 'DN.pdf', '2015-05-23'),
(8, 3, 'Memoire', 'Kane', 'samba', 'samba@yahoo.fr', 'master1', 9, 2006, 'Memoire de Samba', 'Chapitre5.pdf', '2015-05-23'),
(9, 2, 'Memoire', 'DAFFE', 'SAMBA', 'sarr.moha90@gmail.com', 'master2', 14, 2006, 'Memoire', 'schema_fonctionnel-2.pdf', '2015-05-23'),
(13, 5, 'RAPPORT ', 'sarr', 'LAMINE', 'LAMINE@YAHOO.FR', 'doctorat', 7, 2006, 'Memoire', 'AR6_3.pdf', '2015-05-23'),
(14, 5, 'Memoire', 'DIOP', 'ABDOU', 'sarr.moha90@gmail.com', 'master2', 9, 2007, 'Memoire', 'AR6_3.pdf', '2015-05-23'),
(15, 4, 'Memoire', 'DAFFE', 'SAMBA', 'samba_diouf@yahoo.fr', 'master2', 14, 1998, 'Memoire', 'impression.pdf', '2015-05-23'),
(16, 3, 'Memoire', 'DIOP', 'LAMINE', 'sarr.moha90@gmail.com', 'master2', 8, 2006, 'Memoire', '0000.pdf', '2015-05-23'),
(17, 4, 'RAPPORT ', 'sarr', 'DAOUDA', 'sarr.moha90@yahoo.fr', 'master1', 7, 2006, 'Memoire', 'deces-les-sommes-a-reclamer-a-l-employeur-5471-n77zs2.pdf', '2015-05-23'),
(18, 4, 'Memoire Gestion', 'Diallo', 'fanta', 'Fanta@yahoo.fr', 'master1', 8, 1995, 'Memoire fin Ã©tude de Fanta Diallo', 'Chap-1_Bloch.pdf', '2015-05-24'),
(19, 2, 'Rapport', 'Diop', 'ibrahima', 'Iboudiop@yahoo.fr', 'master2', 10, 2005, 'Rapport de Ibrahima Diop UCAD', 'cio_agenda_insights2015.pdf', '2015-05-25'),
(21, 4, 'RAPPORT ', 'Sow', 'Fatou', 'Sow@yahoo.fr', 'master2', 10, 2000, 'Memoire de Sow', 'Introduction-2bypage.pdf', '2015-05-25'),
(22, 1, 'Memoire', 'Diouf', 'Saliou', 'DioufSaliou@yahoo.fr', 'master1', 10, 1999, 'Memoire de Diouf', '4-JSF2-BackingBeans.pdf', '2015-05-25');

-- --------------------------------------------------------

--
-- Structure de la table `universite`
--

CREATE TABLE IF NOT EXISTS `universite` (
`CodeUniversite` int(2) NOT NULL,
  `NomUniversite` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Contenu de la table `universite`
--

INSERT INTO `universite` (`CodeUniversite`, `NomUniversite`) VALUES
(1, 'Universite Assane Seck de Ziguinchor(UZ)'),
(2, 'Universite Cheikh Anta Diop(UCAD)'),
(3, 'Universite Alioune Diop de Bambey(UADB)'),
(4, 'Universite Gaston Berger de Saint-Louis(UGB)'),
(5, 'Universite de Thies(UT)'),
(6, 'Universite Virtuelle(UVS)');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `categorie`
--
ALTER TABLE `categorie`
 ADD PRIMARY KEY (`CodeCategorie`), ADD KEY `CodeCategorie` (`CodeCategorie`), ADD KEY `CodeCategorie_2` (`CodeCategorie`);

--
-- Index pour la table `compteur`
--
ALTER TABLE `compteur`
 ADD PRIMARY KEY (`c_id`);

--
-- Index pour la table `inscription`
--
ALTER TABLE `inscription`
 ADD PRIMARY KEY (`CodeInscription`), ADD KEY `CodeUniversite` (`CodeUniversite`);

--
-- Index pour la table `memoire`
--
ALTER TABLE `memoire`
 ADD PRIMARY KEY (`CodeMemoire`), ADD KEY `CodeUniversite` (`CodeUniversite`,`CodeCategorie`), ADD KEY `CodeCategorie` (`CodeCategorie`);

--
-- Index pour la table `universite`
--
ALTER TABLE `universite`
 ADD PRIMARY KEY (`CodeUniversite`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `categorie`
--
ALTER TABLE `categorie`
MODIFY `CodeCategorie` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT pour la table `compteur`
--
ALTER TABLE `compteur`
MODIFY `c_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT pour la table `inscription`
--
ALTER TABLE `inscription`
MODIFY `CodeInscription` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=148;
--
-- AUTO_INCREMENT pour la table `memoire`
--
ALTER TABLE `memoire`
MODIFY `CodeMemoire` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT pour la table `universite`
--
ALTER TABLE `universite`
MODIFY `CodeUniversite` int(2) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
