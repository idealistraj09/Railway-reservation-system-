-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 09, 2022 at 01:20 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PasswordT` varchar(20) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile_No` varchar(10) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `City` varchar(30) NOT NULL,
  `StateT` varchar(30) NOT NULL,
  `Local_address` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Mobile_No` (`Mobile_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `PasswordT`, `First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`, `StateT`, `Local_address`) VALUES
('admin', 'admin', 'admin', 'admin', 'admin@gmail.com', 'male', '9328537990', '2004-08-21', 'admin', 'admin', 'admin'),
('admin1', 'admin1', 'admin1', 'admin1', 'admin1@gmail.com', 'male', '9328537991', '2004-08-22', 'admin1', 'admin1', 'admin1'),
('admin2', 'admin2', 'admin2', 'admin2', 'admin2@gmail.com', 'male', '3333333333', '2004-02-20', 'admin2', 'admin', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `fare`
--

DROP TABLE IF EXISTS `fare`;
CREATE TABLE IF NOT EXISTS `fare` (
  `Fare_id` char(5) NOT NULL,
  `Fare` varchar(10) NOT NULL,
  `Tour_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Train_cat_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Seat_cat_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Fare_id`),
  KEY `Tour_id` (`Tour_id`,`Train_cat_id`,`Seat_cat_id`),
  KEY `Seat_cat_id` (`Seat_cat_id`),
  KEY `Train_cat_id` (`Train_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `fare`
--

INSERT INTO `fare` (`Fare_id`, `Fare`, `Tour_id`, `Train_cat_id`, `Seat_cat_id`) VALUES
('F01', '299', 'TR01', 'TC1', 'SC2'),
('F02', '259', 'TR06', 'TC2', 'SC1'),
('F03', '399', 'TR01', 'TC1', 'SC1'),
('F04', '199', 'TR06', 'TC2', 'SC2');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

DROP TABLE IF EXISTS `passenger`;
CREATE TABLE IF NOT EXISTS `passenger` (
  `passenger_id` int(11) NOT NULL AUTO_INCREMENT,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile_No` varchar(20) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `City` varchar(30) NOT NULL,
  PRIMARY KEY (`passenger_id`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Mobile_No` (`Mobile_No`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`) VALUES
(102, 'Hu Kramer', 'Cedric Chavez', 'carakicuci@mailinator.com', 'male', '+1 (578) 225-9919', '2001-06-07', 'Molestiae laborum mi'),
(103, 'Peter Velazquez', 'Lamar Farley', 'zuvubik@mailinator.com', 'male', '+1 (406) 351-1496', '1997-03-02', 'Dolorem Nam laudanti');

-- --------------------------------------------------------

--
-- Table structure for table `seat`
--

DROP TABLE IF EXISTS `seat`;
CREATE TABLE IF NOT EXISTS `seat` (
  `Seat_id` int(5) NOT NULL AUTO_INCREMENT,
  `Seat_no` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Seat_availability` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `passsenger_id` char(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Seat_cat_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `Train_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  PRIMARY KEY (`Seat_id`),
  KEY `Train_id` (`Train_id`),
  KEY `Seat_cat_id` (`Seat_cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`Seat_id`, `Seat_no`, `Date`, `Seat_availability`, `passsenger_id`, `Seat_cat_id`, `Train_id`) VALUES
(91, '2', '2022-02-28', 'C', 'Hu KramerCedric Chavez', 'SC1', 'T01'),
(92, '2', '2022-02-28', 'C', 'Peter VelazquezLamar Farley', 'SC1', 'T01'),
(93, '2', '2022-02-28', 'C', 'Hu KramerCedric Chavez', 'SC1', 'T01'),
(94, '2', '2022-02-28', 'C', 'Peter VelazquezLamar Farley', 'SC1', 'T01'),
(95, '2', '2022-02-28', 'C', 'Hu KramerCedric Chavez', 'SC1', 'T01'),
(96, '2', '2022-02-28', 'C', 'Peter VelazquezLamar Farley', 'SC1', 'T01'),
(97, '2', '2022-02-28', 'C', 'Hu KramerCedric Chavez', 'SC1', 'T01'),
(98, '2', '2022-02-28', 'C', 'Peter VelazquezLamar Farley', 'SC1', 'T01'),
(99, '2', '2022-02-28', 'C', 'Hu KramerCedric Chavez', 'SC1', 'T01'),
(100, '2', '2022-02-28', 'C', 'Peter VelazquezLamar Farley', 'SC1', 'T01');

-- --------------------------------------------------------

--
-- Table structure for table `seat_category`
--

DROP TABLE IF EXISTS `seat_category`;
CREATE TABLE IF NOT EXISTS `seat_category` (
  `seat_cat_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `seat_type` char(10) NOT NULL,
  PRIMARY KEY (`seat_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat_category`
--

INSERT INTO `seat_category` (`seat_cat_id`, `seat_type`) VALUES
('SC1', 'AC'),
('SC2', 'NON-AC');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

DROP TABLE IF EXISTS `tour`;
CREATE TABLE IF NOT EXISTS `tour` (
  `Tour_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Source_station_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Destination_station_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`Tour_id`, `Source_station_id`, `Destination_station_id`) VALUES
('TR01', 'ANAND', 'RAJKOT'),
('TR06', 'RAJKOT', 'ANAND');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

DROP TABLE IF EXISTS `train`;
CREATE TABLE IF NOT EXISTS `train` (
  `Train_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Train_name` char(20) NOT NULL,
  `Date` date NOT NULL,
  `Arrival_time` time NOT NULL,
  `Departure_time` time NOT NULL,
  `Tour_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Train_cat_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Train_id`),
  KEY `Tour_id` (`Tour_id`),
  KEY `Train_cat_id` (`Train_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`Train_id`, `Train_name`, `Date`, `Arrival_time`, `Departure_time`, `Tour_id`, `Train_cat_id`) VALUES
('T01', 'VIVEK EXPRESS', '2022-02-28', '11:15:00', '14:11:27', 'TR01', 'TC1'),
('T12', 'SAURASTRA EXPRESS', '2022-02-28', '00:00:00', '00:00:00', 'TR06', 'TC2');

-- --------------------------------------------------------

--
-- Table structure for table `train_category`
--

DROP TABLE IF EXISTS `train_category`;
CREATE TABLE IF NOT EXISTS `train_category` (
  `train_cat_id` char(5) COLLATE utf8mb4_bin NOT NULL,
  `train_type` char(10) COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`train_cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `train_category`
--

INSERT INTO `train_category` (`train_cat_id`, `train_type`) VALUES
('TC1', 'EXPRESS'),
('TC2', 'GENRAL');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PasswordT` varchar(20) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile_No` varchar(10) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `City` varchar(30) NOT NULL,
  `StateT` varchar(30) NOT NULL,
  `Local_address` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Mobile_No` (`Mobile_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `PasswordT`, `First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`, `StateT`, `Local_address`) VALUES
('RAJp', 'Pa$$w0rd!', 'Keith Delacruz', 'Seth Vance', 'idealistraj09@gmail.com', 'male', '0000000000', '2060-09-18', 'Mollitia cumque susc', 'Qui esse a eaque ve', 'Ducimus itaque cons'),
('Raj', 'popat', 'raj', 'popat', 'rajcoc99255@gmail.com', 'male', '9328537990', '2004-02-01', 'v.v nagar', 'gujarat', 'bakrol'),
('manav', 'rajpopat', 'Charles Terrell', 'Carla Horne', 'camebaxi@mailinator.com', 'male', '3696321456', '2054-06-03', 'Ex voluptates deseru', 'Est sapiente cumque ', 'Maiores omnis deleni'),
('mann', 'Pa$$w0rd!', 'Thaddeus Erickson', 'Catherine Moon', 'qahyfuba@mailinator.com', 'male', '3688786265', '1972-08-09', 'Rerum quo voluptates', 'Eligendi blanditiis ', 'Quaerat architecto a'),
('raj', 'Pa$$w0rd!', 'Isadora Davis', 'Jaquelyn Padilla', 'jinud@mailinator.com', 'male', '9328537991', '2021-07-26', 'Cupiditate accusanti', 'Sapiente cum ut nost', 'Maxime animi quia c'),
('raj1', 'Raj@2005', 'Yen Banks', 'Benedict Richmond', 'lori@mailinator.com', 'female', '3578963214', '2050-05-19', 'Minim et blanditiis ', 'Eum ut rem nobis et ', 'Proident rerum quia');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fare`
--
ALTER TABLE `fare`
  ADD CONSTRAINT `fare_ibfk_1` FOREIGN KEY (`Seat_cat_id`) REFERENCES `seat_category` (`seat_cat_id`),
  ADD CONSTRAINT `fare_ibfk_2` FOREIGN KEY (`Tour_id`) REFERENCES `tour` (`Tour_id`),
  ADD CONSTRAINT `fare_ibfk_3` FOREIGN KEY (`Train_cat_id`) REFERENCES `train_category` (`train_cat_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`Train_id`) REFERENCES `train` (`Train_id`),
  ADD CONSTRAINT `seat_ibfk_2` FOREIGN KEY (`Seat_cat_id`) REFERENCES `seat_category` (`seat_cat_id`);

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`Tour_id`) REFERENCES `tour` (`Tour_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
