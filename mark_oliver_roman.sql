-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2023 at 11:35 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mark_oliver_roman`
--

-- --------------------------------------------------------

--
-- Table structure for table `access_levels`
--

DROP TABLE IF EXISTS `access_levels`;
CREATE TABLE IF NOT EXISTS `access_levels` (
  `id` int NOT NULL AUTO_INCREMENT,
  `description` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `access_levels`
--

INSERT INTO `access_levels` (`id`, `description`) VALUES
(1, 'SUPER USER'),
(2, 'Employee'),
(3, 'New');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `id` int NOT NULL AUTO_INCREMENT,
  `access_level_id` int NOT NULL DEFAULT '2',
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `age` int DEFAULT NULL,
  `birth_date` datetime DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `date_created` datetime DEFAULT CURRENT_TIMESTAMP,
  `job_title` varchar(45) DEFAULT NULL,
  `date_modified` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_employees_access_levels_idx` (`access_level_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `access_level_id`, `firstname`, `lastname`, `age`, `birth_date`, `email`, `password`, `date_created`, `job_title`, `date_modified`) VALUES
(1, 1, 'mark oliver', 'roman', 30, '0000-00-00 00:00:00', 'markoliver01728@gmail.com', '123456789', '2023-06-08 00:00:00', 'Admin', '2023-06-08 00:00:00'),
(21, 2, 'Neo ', 'Amper', 8, '2023-04-28 00:00:00', 'neo@email.com', '123456789', '2023-06-08 18:48:11', 'PLayer', '2023-06-08 18:48:11'),
(23, 1, 'Vanessa', 'Amper', 31, '1993-06-08 00:00:00', 'vanessa@email.co', '123456789', '2023-06-08 18:57:55', 'Developer', '2023-06-08 18:57:55');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `fk_employees_access_levels` FOREIGN KEY (`access_level_id`) REFERENCES `access_levels` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
