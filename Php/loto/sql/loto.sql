-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour loto
CREATE DATABASE IF NOT EXISTS `loto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `loto`;

-- Listage de la structure de la table loto. equipe
CREATE TABLE IF NOT EXISTS `equipe` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Listage des données de la table loto.equipe : ~15 rows (environ)
/*!40000 ALTER TABLE `equipe` DISABLE KEYS */;
INSERT INTO `equipe` (`id`, `nom`) VALUES
	(1, 'Toulouse'),
	(2, 'Clermont'),
	(4, 'Agen'),
	(5, 'Castres'),
	(6, 'Lyon'),
	(7, 'Bordeaux'),
	(8, 'Racing 92'),
	(9, 'Toulon'),
	(10, 'La Rochelle'),
	(11, 'Montpellier'),
	(12, 'Bayonne'),
	(13, 'Brive'),
	(14, 'Pau'),
	(15, 'Stade FranÃ§ais'),
	(16, 'Rodez');
/*!40000 ALTER TABLE `equipe` ENABLE KEYS */;

-- Listage de la structure de la table loto. matchs
CREATE TABLE IF NOT EXISTS `matchs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `eq1` int(11) DEFAULT NULL,
  `eq2` int(11) DEFAULT NULL,
  `dateMatch` date DEFAULT NULL,
  `resultat` char(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eq1` (`eq1`),
  KEY `eq2` (`eq2`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- Listage des données de la table loto.matchs : ~9 rows (environ)
/*!40000 ALTER TABLE `matchs` DISABLE KEYS */;
INSERT INTO `matchs` (`id`, `eq1`, `eq2`, `dateMatch`, `resultat`) VALUES
	(2, 1, 2, '2019-05-25', '1'),
	(3, 3, 3, '2020-05-30', '1'),
	(4, 3, 1, '2020-05-12', '1'),
	(10, 1, 2, '2020-03-04', '1'),
	(11, 1, 2, '2020-03-01', 'N'),
	(12, 1, 6, '2020-03-03', 'N'),
	(16, 1, 7, '2024-10-17', 'N'),
	(17, 1, 2, '2020-03-29', 'RÃ©sultat Ã  venir'),
	(18, 16, 4, '2020-03-06', '1');
/*!40000 ALTER TABLE `matchs` ENABLE KEYS */;

-- Listage de la structure de la table loto. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table loto.users : ~1 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'p', 'p');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
