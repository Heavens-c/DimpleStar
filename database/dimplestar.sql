-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.11.0.7065
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for dimplestar
CREATE DATABASE IF NOT EXISTS `dimplestar` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `dimplestar`;

-- Dumping structure for table dimplestar.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `salt` varchar(10) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table dimplestar.members: ~1 rows (approximately)
INSERT INTO `members` (`id`, `fname`, `lname`, `email`, `salt`, `password`, `created_at`) VALUES
	(1, 'Test', 'User', 'test@example.com', 'xyz', '1ea0a08bc2780aa12e4df7bb6e423f9bb0082c116d64b7442652e31bbf1e2fec', '2025-09-04 17:25:00');

-- Dumping structure for table dimplestar.regs
CREATE TABLE IF NOT EXISTS `regs` (
  `ticket` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `bustype` varchar(255) DEFAULT NULL,
  `origin` varchar(255) DEFAULT NULL,
  `destination` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `seat_no` varchar(255) DEFAULT NULL,
  `timetodep` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ticket`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table dimplestar.regs: ~7 rows (approximately)
INSERT INTO `regs` (`ticket`, `name`, `address`, `mobile`, `email`, `bustype`, `origin`, `destination`, `price`, `seat_no`, `timetodep`) VALUES
	(1, 'A', 'B', '123465', 'C@D.COM', 'Ordinary', 'Espana', 'San Jose', '200', '7', '5:30am'),
	(2, 'A', 'B', '123465', 'C@D.COM', 'Ordinary', 'Espana', 'San Jose', '200', '8', '5:30am'),
	(3, 'A', 'B', '123465', 'C@D.COM', 'Ordinary', 'Espana', 'San Jose', '200', '9', '5:30am'),
	(4, 'A', 'B', '123465', 'C@D.COM', 'Ordinary', 'Espana', 'San Jose', '200', '10', '5:30am'),
	(5, 'A', 'B', '123465', 'C@D.COM', 'Ordinary', 'Espana', 'San Jose', '200', '11', '5:30am'),
	(6, 'A', 'B', '123465', 'C@D.COM', 'Ordinary', 'Espana', 'San Jose', '200', '12', '5:30am'),
	(7, 'A', 'B', '123465', 'C@D.COM', 'Ordinary', 'Espana', 'San Jose', '200', '13', '5:30am');

-- Dumping structure for table dimplestar.routes
CREATE TABLE IF NOT EXISTS `routes` (
  `busid` int(20) NOT NULL AUTO_INCREMENT,
  `origin` varchar(20) NOT NULL,
  `destination` varchar(20) NOT NULL,
  `time` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `bustype` varchar(20) NOT NULL,
  `smsstat` varchar(20) NOT NULL,
  PRIMARY KEY (`busid`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table dimplestar.routes: ~54 rows (approximately)
INSERT INTO `routes` (`busid`, `origin`, `destination`, `time`, `price`, `bustype`, `smsstat`) VALUES
	(1, 'Ali Mall Cubao', 'San Jose', '10am', '300', 'Air Conditioned', 'None'),
	(2, 'Ali Mall Cubao', 'San Jose', '9am', '300', 'Air Conditioned', 'None'),
	(3, 'Ali Mall Cubao', 'San Jose', '1pm', '300', 'Air Conditioned', 'none'),
	(4, 'Ali Mall Cubao', 'San Jose', '4pm', '300', 'Air Conditioned', 'none'),
	(5, 'Alabang', 'San Jose', '6am', '300', 'Air Conditioned', 'None'),
	(6, 'Alabang', 'San Jose', '7am', '300', 'Air Conditioned', 'None'),
	(7, 'Alabang', 'San Jose', '2pm', '300', 'Air Conditioned', 'none'),
	(8, 'Alabang', 'San Jose', '6pm', '300', 'Air Conditioned', 'none'),
	(9, 'Alabang', 'San Jose', '10pm', '300', 'Air Conditioned', 'none'),
	(10, 'Cabuyao ', 'San Jose', '8am', '300', 'Air Conditioned', 'None'),
	(11, 'Cabuyao ', 'San Jose', '9am', '300', 'Air Conditioned', 'None'),
	(12, 'Cabuyao ', 'San Jose', '4pm', '300', 'Air Conditioned', 'none'),
	(13, 'Cabuyao ', 'San Jose', '8pm', '300', 'Air Conditioned', 'none'),
	(14, 'Espana', 'San Jose', '4:30am', '300', 'Air Conditioned', 'None'),
	(15, 'Espana', 'San Jose', '5:30am', '300', 'Air Conditioned', 'None'),
	(16, 'Espana', 'San Jose', '12am', '300', 'Air Conditioned', 'none'),
	(17, 'Espana', 'San Jose', '4pm', '300', 'Air Conditioned', 'none'),
	(18, 'Espana', 'San Jose', '8pm', '300', 'Air Conditioned', 'none'),
	(19, 'San Lorenzo', 'San Jose', '3am', '300', 'Air Conditioned', 'None'),
	(20, 'San Lorenzo', 'San Jose', '4:30am', '200', 'Air Conditioned', 'None'),
	(21, 'San Lorenzo', 'San Jose', '11am', '300', 'Air Conditioned', 'none'),
	(22, 'San Lorenzo', 'San Jose', '3pm', '300', 'Air Conditioned', 'none'),
	(23, 'San Lorenzo', 'San Jose', '7pm', '300', 'Air Conditioned', 'none'),
	(24, 'Pasay', 'San Jose', '5am', '300', 'Air Conditioned', 'None'),
	(25, 'Pasay', 'San Jose', '6am', '300', 'Air Conditioned', 'none'),
	(26, 'Pasay', 'San Jose', '1pm', '300', 'Air Conditioned', 'none'),
	(27, 'Pasay', 'San Jose', '3pm', '300', 'Air Conditioned', 'none'),
	(28, 'Ali Mall Cubao', 'San Jose', '10am', '200', 'Ordinary', 'None'),
	(29, 'Ali Mall Cubao', 'San Jose', '9am', '200', 'Ordinary', 'None'),
	(30, 'Ali Mall Cubao', 'San Jose', '1pm', '200', 'Ordinary', 'none'),
	(31, 'Ali Mall Cubao', 'San Jose', '4pm', '200', 'Ordinary', 'none'),
	(32, 'Alabang', 'San Jose', '6am', '200', 'Ordinary', 'None'),
	(33, 'Alabang', 'San Jose', '7am', '200', 'Ordinary', 'None'),
	(34, 'Alabang', 'San Jose', '2pm', '200', 'Ordinary', 'none'),
	(35, 'Alabang', 'San Jose', '6pm', '200', 'Ordinary', 'none'),
	(36, 'Alabang', 'San Jose', '10pm', '200', 'Ordinary', 'none'),
	(37, 'Cabuyao ', 'San Jose', '8am', '200', 'Ordinary', 'None'),
	(38, 'Cabuyao ', 'San Jose', '9am', '200', 'Ordinary', 'None'),
	(39, 'Cabuyao ', 'San Jose', '4pm', '200', 'Ordinary', 'none'),
	(40, 'Cabuyao ', 'San Jose', '8pm', '200', 'Ordinary', 'none'),
	(41, 'Espana', 'San Jose', '4:30am', '200', 'Ordinary', 'None'),
	(42, 'Espana', 'San Jose', '5:30am', '200', 'Ordinary', 'None'),
	(43, 'Espana', 'San Jose', '12am', '200', 'Ordinary', 'none'),
	(44, 'Espana', 'San Jose', '4pm', '200', 'Ordinary', 'none'),
	(45, 'Espana', 'San Jose', '8pm', '200', 'Ordinary', 'none'),
	(46, 'San Lorenzo', 'San Jose', '3am', '200', 'Ordinary', 'None'),
	(47, 'San Lorenzo', 'San Jose', '4:30am', '200', 'Ordinary', 'None'),
	(48, 'San Lorenzo', 'San Jose', '11am', '200', 'Ordinary', 'none'),
	(49, 'San Lorenzo', 'San Jose', '3pm', '200', 'Ordinary', 'none'),
	(50, 'San Lorenzo', 'San Jose', '7pm', '200', 'Ordinary', 'none'),
	(51, 'Pasay', 'San Jose', '5am', '200', 'Ordinary', 'None'),
	(52, 'Pasay', 'San Jose', '6am', '200', 'Ordinary', 'none'),
	(53, 'Pasay', 'San Jose', '1pm', '200', 'Ordinary', 'none'),
	(54, 'Pasay', 'San Jose', '3pm', '200', 'Ordinary', 'none');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
