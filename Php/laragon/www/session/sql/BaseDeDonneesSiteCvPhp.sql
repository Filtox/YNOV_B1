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
  `poste` text,
  `entreprise` text,
  `lieu` text,
  `annee` year(4) DEFAULT NULL,
  `mois` text,
  `description` text,
  `occupe_actuellement` set('Oui','Non') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.experiences : ~10 rows (environ)
/*!40000 ALTER TABLE `experiences` DISABLE KEYS */;
INSERT INTO `experiences` (`id`, `poste`, `entreprise`, `lieu`, `annee`, `mois`, `description`, `occupe_actuellement`) VALUES
	(1cv, 'Sapeur Pompier', 'BSPP', 'Paris', '2019', NULL, 'Arret pour causes de blessures', 'Non'),
	(2, 'Secrétaire Adjoint', 'FrenchCol', 'Rodez', '2019', NULL, 'Poste occupé actuellement', 'Oui'),
	(3, 'Poseur', 'Belet Isolation', 'Rodez', '2018', 'Juillet', 'Job d\'été', 'Non'),
	(4, 'Technicien d\'usinage', 'Mathou', 'Onet-le-Chateau', '2018', 'Juillet', 'Job d\'été', 'Non'),
	(5, 'Equipier secouriste', 'Protection Civile', 'Aveyron', '2018', 'Février', 'Poste occupé actuellement', 'Oui'),
	(6, 'Vendeur', 'Brico Dépot', 'Onet-le-Chateau', '2017', 'Juillet - Aout', 'Job d\'été', 'Non'),
	(7, 'Projeteur - Dessinateur 3D', 'Bosch', 'Rodez', '2017', 'Mai - Juin', 'Stage de BTS', 'Non'),
	(8, 'Mise en rayon', 'Leclerc', 'Onet-le-Chateau', '2016', 'Aout', 'Job d\'été', 'Non'),
	(9, 'Montage de mobilier', 'LDS Crèche', 'Sainte-Radegonde', '2015', 'Aout', 'Job d\'été', 'Non'),
	(10, 'Maraicher', 'Gaec la ferme d\'Agen', 'Agen d\'Aveyron', '2014', 'Aout', 'Job d\'été', 'Non');
/*!40000 ALTER TABLE `experiences` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. formation
CREATE TABLE IF NOT EXISTS `formation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `diplome` text,
  `option` text,
  `annee` year(4) DEFAULT NULL,
  `etablissement` text,
  `lieu` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.formation : ~4 rows (environ)
/*!40000 ALTER TABLE `formation` DISABLE KEYS */;
INSERT INTO `formation` (`id`, `diplome`, `option`, `annee`, `etablissement`, `lieu`) VALUES
	(1, 'Licence Professionelle', 'GCPSH', '2019', 'Champollion', 'Rodez'),
	(2, 'BTS', 'CPI', '2018', 'Alexis Monteil', 'Rodez'),
	(3, 'BAC', 'STI2D', '2016', 'Alexis Monteil', 'Rodez'),
	(4, 'Diplome Secourisme', 'PSE2', '2018', 'Protection civile', 'Rodez');
/*!40000 ALTER TABLE `formation` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. loisirs
CREATE TABLE IF NOT EXISTS `loisirs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loisirs` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.loisirs : ~1 rows (environ)
/*!40000 ALTER TABLE `loisirs` DISABLE KEYS */;
INSERT INTO `loisirs` (`id`, `loisirs`) VALUES
	(1, 'Airsoft');
/*!40000 ALTER TABLE `loisirs` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. presentation
CREATE TABLE IF NOT EXISTS `presentation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `prenom` text,
  `nom` text,
  `age` tinyint(4) DEFAULT NULL,
  `adresse` text,
  `ville` text,
  `mail` text,
  `telephone` bigint(20) DEFAULT NULL,
  `permis` set('B','A','A2') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.presentation : ~1 rows (environ)
/*!40000 ALTER TABLE `presentation` DISABLE KEYS */;
INSERT INTO `presentation` (`id`, `prenom`, `nom`, `age`, `adresse`, `ville`, `mail`, `telephone`, `permis`) VALUES
	(1, 'Pierre', 'Da Silva', 21, '1 place citoyenne sorgue', 'Agen d\'Aveyron', 'pierredasilva19@gmail.com', 33651997980, 'B');
/*!40000 ALTER TABLE `presentation` ENABLE KEYS */;

-- Listage de la structure de la table sitecvphp. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` text,
  `password` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table sitecvphp.users : ~1 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `login`, `password`) VALUES
	(1, 'pierre', 'pi');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
