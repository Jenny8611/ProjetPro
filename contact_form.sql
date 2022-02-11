-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 22 déc. 2021 à 14:27
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `contact_form`
--

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `subject` varchar(200) CHARACTER SET utf8 NOT NULL,
  `message` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`name`, `email`, `subject`, `message`) VALUES
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'demande de test', 'message de test'),
('allegra', 'jetedonnedesailes@hotmail.com', 'test message', 'message test'),
('efrgthzju', 'jetedonnedesailes@hotmail.com', 'TESTING', 'oijhubn'),
('ALLEGRA', 'jetedonnedesailes@hotmail.com', 'TEEEEST', 'ENCORE DU TEST'),
('efgthzgtf', 'jetedonnedesailes@hotmail.com', 'dfdsa', 'dfgvb'),
('tzthtg', 'jetedonnedesailes@hotmail.com', 'kjhbn', 'ijkbh'),
('tzthtg', 'jetedonnedesailes@hotmail.com', 'kjhbn', 'ijkbh'),
('efrgtfh', 'jetedonnedesailes@hotmail.com', '2e3rt', 'w2ert'),
('wergtfh', 'jetedonnedesailes@hotmail.com', 'qswdefrgtwerfgtf', 'wedfrg'),
('wergt', 'jetedonnedesailes@hotmail.com', 'kljhb', 'lkjbhn'),
('wdefrgthz', 'jetedonnedesailes@hotmail.com', 'kjhbcv', 'edfgth'),
('wdefrgter', 'jetedonnedesailes@hotmail.com', 'asdfg', 'hgtrfe'),
('wegtr', 'jetedonnedesailes@hotmail.com', 'poiuzgh', 'pljh'),
('wedfrgt', 'jetedonnedesailes@hotmail.com', 'lkjhb', 'kljbh'),
('TA FEMME', 'allegradavide@hotmail.com', 'L\'AMOUR', 'JE T\'AIME TOUJOURS AUSSI FORT'),
('TA FEMME', 'allegradavide@hotmail.com', 'MOI AIME TOI', 'Toi aime moi ??');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
