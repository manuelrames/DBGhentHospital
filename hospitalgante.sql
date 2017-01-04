-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.6.21 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando estructura de base de datos para hospitalgante
CREATE DATABASE IF NOT EXISTS `hospitalgante` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `hospitalgante`;


-- Volcando estructura para tabla hospitalgante.diagnosis
CREATE TABLE IF NOT EXISTS `diagnosis` (
  `Tumor_Stage` int(15) DEFAULT NULL,
  `Tumor_Size` float DEFAULT NULL,
  `Metric_Units` varchar(20) NOT NULL DEFAULT 'cm',
  `Lymph_Nodes` varchar(20) DEFAULT NULL,
  `Distant_Metastases` varchar(20) DEFAULT NULL,
  `Chemotherapy` date DEFAULT NULL,
  `Visit_Date` date NOT NULL,
  `Patient_ID` int(15) NOT NULL,
  PRIMARY KEY (`Visit_Date`,`Patient_ID`),
  KEY `FK_diagnosis_visit_2` (`Patient_ID`),
  CONSTRAINT `FK_diagnosis_visit` FOREIGN KEY (`Visit_Date`) REFERENCES `visit` (`Visit_Date`),
  CONSTRAINT `FK_diagnosis_visit_2` FOREIGN KEY (`Patient_ID`) REFERENCES `visit` (`Patient_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Disease found and its clinical characteristics and therapy';

-- Volcando datos para la tabla hospitalgante.diagnosis: ~29 rows (aproximadamente)
/*!40000 ALTER TABLE `diagnosis` DISABLE KEYS */;
INSERT INTO `diagnosis` (`Tumor_Stage`, `Tumor_Size`, `Metric_Units`, `Lymph_Nodes`, `Distant_Metastases`, `Chemotherapy`, `Visit_Date`, `Patient_ID`) VALUES
	(23351008, 0.7, 'cm', '406091001', '308930008', NULL, '1993-02-02', 3543545),
	(23351008, 0.7, 'cm', '406091001', '308930008', NULL, '1993-05-07', 3543545),
	(67673008, 7.7, 'cm', '406091001', '308930008', NULL, '1993-06-01', 4241247),
	(23351008, 0.8, 'cm', '406091001', '308930008', '1993-05-20', '1993-06-07', 3543545),
	(23351008, 0.7, 'cm', '406091001', '308930008', NULL, '1993-07-02', 3543545),
	(67673008, 1, 'cm', '370020007', '30893008', '1995-01-31', '1995-02-02', 8513952),
	(67673008, 0.9, 'cm', '370020007', '30893008', NULL, '1995-03-10', 8513952),
	(58790005, 1.2, 'cm', '406091001', '30893008', NULL, '1995-03-15', 6542188),
	(58790005, 1.2, 'cm', '406091001', '30893008', '1995-06-10', '1995-06-10', 6542188),
	(58790005, 1.1, 'cm', '406091001', '30893008', NULL, '1995-07-13', 6542188),
	(58790005, 1.3, 'cm', '406091001', '30893008', NULL, '1995-08-12', 6542188),
	(67673008, 1.2, 'cm', '370020007', '30893008', NULL, '1995-09-21', 8513952),
	(67673008, 1.2, 'cm', '370020007', '30893008', NULL, '1995-12-25', 8513952),
	(23351008, 0.1, 'cm', '406091001', '30893008', NULL, '1996-01-31', 6655525),
	(67673008, 7.5, 'cm', '370020007', '30893008', '1997-01-31', '1996-04-01', 6545545),
	(67673008, 6, 'cm', '370020007', '30893008', NULL, '1996-05-03', 6545545),
	(23351008, 0.1, 'cm', '406091001', '30893008', '1996-02-27', '1996-05-04', 6655525),
	(23351008, 0.1, 'cm', '406091001', '30893008', NULL, '1996-06-03', 6655525),
	(67673008, 6, 'cm', '370020007', '30893008', '1996-06-08', '1996-06-18', 6545545),
	(23351008, 0.1, 'cm', '406091001', '30893008', '1996-06-29', '1996-07-01', 6655525),
	(67673008, 7.5, 'cm', '370020007', '30893008', NULL, '1996-12-15', 6545545),
	(58790005, 1.2, 'cm', '406091001', '30893008', NULL, '1999-01-02', 6545822),
	(58790005, 1.2, 'cm', '406091001', '30893008', '1999-02-22', '1999-04-10', 6545822),
	(58790005, 1.1, 'cm', '406091001', '30893008', NULL, '2001-05-01', 9483215),
	(58790005, 1.1, 'cm', '406091001', '30893008', NULL, '2001-09-01', 9483215),
	(58790005, 1.2, 'cm', '406091001', '30893008', '2011-09-25', '2001-10-04', 9483215),
	(58790005, 1, 'cm', '406091001', '30893008', NULL, '2004-04-12', 5464544),
	(58790005, 1, 'cm', '406091001', '30893008', NULL, '2004-07-10', 5464544),
	(58790005, 1, 'cm', '406091001', '30893008', NULL, '2004-08-15', 5464544),
	(23351008, 2, 'cm', '406091001', '30893008', NULL, '2005-04-30', 1215884),
	(23351008, 2, 'cm', '406091001', '30893008', NULL, '2005-08-02', 1215884),
	(23351008, 2, 'cm', '406091001', '30893008', NULL, '2005-09-12', 1215884),
	(23351008, 2.1, 'cm', '406091001', '30893008', NULL, '2005-10-21', 1215884);
/*!40000 ALTER TABLE `diagnosis` ENABLE KEYS */;


-- Volcando estructura para tabla hospitalgante.patient
CREATE TABLE IF NOT EXISTS `patient` (
  `Name` varchar(50) NOT NULL,
  `Gender` varchar(20) DEFAULT 'female',
  `Patient_ID` int(15) NOT NULL,
  `Birth_Date` date DEFAULT NULL,
  `Menopausal_Status` varchar(50) DEFAULT NULL,
  `Institution_ID` int(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`Patient_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Data concerning the patient itself.';

-- Volcando datos para la tabla hospitalgante.patient: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `patient` DISABLE KEYS */;
INSERT INTO `patient` (`Name`, `Gender`, `Patient_ID`, `Birth_Date`, `Menopausal_Status`, `Institution_ID`) VALUES
	('Heidi Brush', 'female', 1215884, '1969-09-07', '161541000119104', 1),
	('Jane Doe', 'female', 3543545, '1966-08-07', '76498008', 1),
	('Roberta Rodriguez', 'female', 4241247, '1955-12-01', '161541000119104', 1),
	('Sara Ferry', 'female', 5464544, '1946-01-10', '76498008', 1),
	('Magdalena Firsch', 'female', 6542188, '1936-11-19', '76498008', 1),
	('Emma Smith', 'female', 6545545, '1953-04-19', '161541000119104', 1),
	('Clair Johnson', 'female', 6545822, '1954-06-04', '161541000119104', 1),
	('Anna Smith', 'female', 6655525, '1971-08-11', '22636003', 1),
	('Lesley Winter', 'female', 8513952, '1918-06-30', '76498008', 1),
	('Brithney Axe', 'female', 9483215, '1939-02-20', '76498008', 1);
/*!40000 ALTER TABLE `patient` ENABLE KEYS */;


-- Volcando estructura para tabla hospitalgante.study
CREATE TABLE IF NOT EXISTS `study` (
  `Histopathology` varchar(50) DEFAULT NULL,
  `HER2` varchar(50) DEFAULT NULL,
  `ER` varchar(50) DEFAULT NULL,
  `Patient_ID` int(15) NOT NULL,
  PRIMARY KEY (`Patient_ID`),
  CONSTRAINT `FK_study_patient` FOREIGN KEY (`Patient_ID`) REFERENCES `patient` (`Patient_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Type of clinical study performed on the patient';

-- Volcando datos para la tabla hospitalgante.study: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `study` DISABLE KEYS */;
INSERT INTO `study` (`Histopathology`, `HER2`, `ER`, `Patient_ID`) VALUES
	('408643008', '431396003', '441117001', 1215884),
	('408643008', '431396003', '441117001', 3543545),
	('408643008', '431396003', '441117001', 4241247),
	('77284006', '427685000', '416053008', 5464544),
	('77284006', '427685000', '416053008', 6542188),
	('408643008', '427685000', '416053008', 6545545),
	('86616005', '431396003', '416053008', 6545822),
	('408643008', '427685000', '416053008', 6655525),
	('408643008', '431396003', '441117001', 8513952),
	('77284006', '431396003', '416053008', 9483215);
/*!40000 ALTER TABLE `study` ENABLE KEYS */;


-- Volcando estructura para tabla hospitalgante.visit
CREATE TABLE IF NOT EXISTS `visit` (
  `Visit_Number` int(15) DEFAULT NULL,
  `Visit_Date` date NOT NULL,
  `Patient_ID` int(15) NOT NULL,
  `Practicioner_ID` int(15) DEFAULT NULL,
  PRIMARY KEY (`Visit_Date`,`Patient_ID`),
  KEY `FK_visit_patient` (`Patient_ID`),
  CONSTRAINT `FK_visit_patient` FOREIGN KEY (`Patient_ID`) REFERENCES `patient` (`Patient_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains several visits of patients';

-- Volcando datos para la tabla hospitalgante.visit: ~33 rows (aproximadamente)
/*!40000 ALTER TABLE `visit` DISABLE KEYS */;
INSERT INTO `visit` (`Visit_Number`, `Visit_Date`, `Patient_ID`, `Practicioner_ID`) VALUES
	(1, '1993-02-02', 3543545, 2),
	(2, '1993-05-07', 3543545, 2),
	(1, '1993-06-01', 4241247, 2),
	(3, '1993-06-07', 3543545, 2),
	(4, '1993-07-02', 3543545, 2),
	(3, '1995-02-02', 8513952, 2),
	(4, '1995-03-10', 8513952, 2),
	(1, '1995-03-15', 6542188, 1),
	(2, '1995-06-10', 6542188, 2),
	(3, '1995-07-13', 6542188, 2),
	(4, '1995-08-12', 6542188, 2),
	(1, '1995-09-21', 8513952, 2),
	(2, '1995-12-25', 8513952, 2),
	(1, '1996-01-31', 6655525, 1),
	(2, '1996-04-01', 6545545, 1),
	(3, '1996-05-03', 6545545, 1),
	(2, '1996-05-04', 6655525, 1),
	(3, '1996-06-03', 6655525, 1),
	(4, '1996-06-18', 6545545, 1),
	(4, '1996-07-01', 6655525, 1),
	(1, '1996-12-15', 6545545, 2),
	(1, '1999-01-02', 6545822, 2),
	(2, '1999-04-10', 6545822, 1),
	(1, '2001-05-01', 9483215, 2),
	(2, '2001-09-01', 9483215, 2),
	(3, '2001-10-04', 9483215, 1),
	(1, '2004-04-12', 5464544, 1),
	(2, '2004-07-10', 5464544, 1),
	(3, '2004-08-15', 5464544, 1),
	(1, '2005-04-30', 1215884, 2),
	(2, '2005-08-02', 1215884, 2),
	(3, '2005-09-12', 1215884, 2),
	(4, '2005-10-21', 1215884, 2);
/*!40000 ALTER TABLE `visit` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
