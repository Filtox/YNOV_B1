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


-- Listage de la structure de la base pour sitecvphp
CREATE DATABASE IF NOT EXISTS `sitecvphp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `sitecvphp`;

-- Listage de la structure de la table sitecvphp. experiences
CREATE TABLE IF NOT EXISTS `experiences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poste` varchar(100) NOT NULL,
  `entreprise` varchar(100) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  `annee` varchar(100) NOT NULL,
  `mois` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.experiences : ~11 rows (environ)
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` (`id`, `poste`, `entreprise`, `lieu`, `annee`, `mois`, `description`) VALUES
	(2, 'Sapeur pompier de Paris', 'BSPP', 'Paris', '2019', '-', 'Meilleur mÃ©tier du monde'),
	(3, 'TrÃ©sorier Adjoint', 'French Col', 'Occitanie', '2019', '-', 'Association Ã©vÃ©nementiel'),
	(4, 'Agent de fabrication', 'Mathou CrÃ©ations', 'Rodez', '2018', 'Juillet', 'Job Ã©tÃ©'),
	(5, 'Pose isolation', 'Belet Isolations', 'OIemps', '2018', 'Juillet', ''),
	(8, 'Secouriste', 'Protection civile', 'Aveyron', '2018', 'FÃ©vrier', 'Secouriste de niveau PSE2'),
	(9, 'Dessinateur 3D', 'Bosch', 'Rodez', '2017', 'Mai - Juin', 'Stage de BTS'),
	(10, 'Vendeur et mise en rayon', 'Brico DÃ©pot', 'Onet-le-chateau', '2017', 'Juillet - Aout', 'Job Ã©tÃ©'),
	(11, 'Mise en rayon', 'Leclerc', 'Onet-le-chateau', '2016', 'Aout', 'Job Ã©tÃ©'),
	(12, 'Montage de mobilier', 'LDS crÃ¨che', 'Sainte Radegonde', '2015', 'Aout', 'Job Ã©tÃ©'),
	(13, 'Maraicher', 'Ferme Agen', 'Agen Aveyron', '2014', 'Juillet - Aout', 'Job Ã©tÃ©'),
	(14, 'Garagiste', 'Poujouly', 'SÃ©vÃ©rac-le-Chateau', '2013', 'FÃ©vrier', 'Stage de troisiÃ¨me');
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. formations
CREATE TABLE IF NOT EXISTS `formations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diplome` varchar(100) NOT NULL,
  `option` varchar(100) NOT NULL,
  `annee` varchar(100) NOT NULL,
  `etablissement` varchar(100) NOT NULL,
  `lieu` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.formations : ~2 rows (environ)
/*!40000 ALTER TABLE `formations` DISABLE KEYS */;
INSERT INTO `formations` (`id`, `diplome`, `option`, `annee`, `etablissement`, `lieu`) VALUES
	(4, 'BTS', 'CPI', '2018', 'Alexis Monteil', ''),
	(6, 'Niveau Licence Pro', 'SBP - GCPSH', '2019', 'Champollion', 'Rodez'),
	(7, 'BAC', 'STI2D - SIN', '2016', 'Monteil', 'Rodez');
/*!40000 ALTER TABLE `formations` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. loisirs
CREATE TABLE IF NOT EXISTS `loisirs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loisirs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.loisirs : ~3 rows (environ)
/*!40000 ALTER TABLE `loisirs` DISABLE KEYS */;
INSERT INTO `loisirs` (`id`, `loisirs`) VALUES
	(1, 'Airsoft'),
	(2, 'Football'),
	(3, 'Airsoft');
/*!40000 ALTER TABLE `loisirs` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. presentation
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `age` varchar(100) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `permis` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.presentation : ~1 rows (environ)
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` (`id`, `firstname`, `lastname`, `age`, `adresse`, `ville`, `mail`, `phone`, `permis`) VALUES
	(6, 'Pierre', 'Da Silva', '21', '1 place citoyenne sorgue', 'Agen Aveyron', 'pierredasilva19@gmail.com', '0651997980', 'B');
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'pierre', 'pi'),
	(2, 'p', 'p');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
