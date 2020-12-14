-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.14-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for practical
CREATE DATABASE IF NOT EXISTS `practical` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `practical`;

-- Dumping structure for table practical.level
CREATE TABLE IF NOT EXISTS `level` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `level` (`level`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table practical.level: ~4 rows (approximately)
/*!40000 ALTER TABLE `level` DISABLE KEYS */;
INSERT INTO `level` (`id`, `level`) VALUES
	(1, 100),
	(2, 200),
	(3, 300),
	(4, 400);
/*!40000 ALTER TABLE `level` ENABLE KEYS */;

-- Dumping structure for table practical.student
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matric_no` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `program` enum('ND','HND') NOT NULL,
  `entry_year` year(4) NOT NULL,
  `level` int(11) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `matric_no` (`matric_no`),
  KEY `FK_student_level` (`level`),
  KEY `FK_student_years` (`entry_year`),
  CONSTRAINT `FK_student_level` FOREIGN KEY (`level`) REFERENCES `level` (`level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table practical.student: ~1 rows (approximately)
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` (`id`, `matric_no`, `firstname`, `lastname`, `program`, `entry_year`, `level`, `date_created`) VALUES
	(10, 'F/HD/19/3210104', 'Arikeusola', 'Damilare', 'HND', '2019', 300, '2020-12-14 06:01:30'),
	(11, 'F/ND/20/3210103', 'joseph', 'momodu', 'ND', '2020', 100, '2020-12-14 06:40:09'),
	(12, 'F/ND/19/3210100', 'protocoll', 'asemmba', 'ND', '2019', 200, '2020-12-14 07:06:09'),
	(13, 'F/HD/16/3210003', 'raleey', 'kazeem', 'HND', '2016', 400, '2020-12-14 07:06:43');
/*!40000 ALTER TABLE `student` ENABLE KEYS */;

-- Dumping structure for table practical.years
CREATE TABLE IF NOT EXISTS `years` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `year` year(4) NOT NULL,
  `short_year` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `short_year` (`short_year`),
  UNIQUE KEY `year` (`year`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table practical.years: ~3 rows (approximately)
/*!40000 ALTER TABLE `years` DISABLE KEYS */;
INSERT INTO `years` (`id`, `year`, `short_year`) VALUES
	(1, '2018', 18),
	(2, '2019', 19),
	(3, '2020', 20);
/*!40000 ALTER TABLE `years` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
