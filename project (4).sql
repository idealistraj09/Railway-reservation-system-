-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 24, 2022 at 08:26 AM
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
  `admin_id` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `PasswordT` varchar(20) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `Email` varchar(25) NOT NULL,
  `Gender` varchar(8) NOT NULL,
  `Mobile_No` varchar(10) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `City` varchar(30) NOT NULL,
  `State` varchar(30) NOT NULL,
  `Local_address` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `Email` (`Email`),
  UNIQUE KEY `Mobile_No` (`Mobile_No`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `PasswordT`, `First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`, `State`, `Local_address`) VALUES
('admin', 'admin', 'Maiores tenetur sit', 'Qui molestias ipsum ', 'wewugeke@mailinator.com', 'female', '2', '2018-08-08', 'Eum ut voluptas iste', 'Nisi sapiente conseq', 'Laborum Deserunt mo'),
('admin1', 'admin1', 'Vitae voluptatem as', 'Unde autem accusamus', 'kekoryk@mailinator.com', 'other', '5', '1971-07-21', 'Esse est ea ut labo', 'Eveniet voluptate e', 'Perspiciatis error '),
('admin2', 'admin2', 'Aut accusamus autem ', 'Non reprehenderit qu', 'vusamife@mailinator.com', 'male', '26', '1996-02-26', 'Ex et accusantium un', 'Quibusdam explicabo', 'In dolore in sed min');

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
('F', '13', 'TR', 'TC1', 'SC1'),
('F10', '220', 'TR5', 'TC1', 'SC1'),
('F11', '180', 'TR5', 'TC1', 'SC2'),
('F12', '399', 'TR6', 'TC1', 'SC1'),
('F13', '299', 'TR6', 'TC1', 'SC2'),
('F15', '88', 'TR', 'TC1', 'SC2'),
('F16', '678', 'TR8', 'TC1', 'SC1'),
('F17', '6786', 'TR8', 'TC1', 'SC2'),
('F18', '200', 'TR9', 'TC1', 'SC1'),
('F19', '150', 'TR9', 'TC1', 'SC2'),
('F20', '5555', 'TR10', 'TC1', 'SC1'),
('F21', '555', 'TR10', 'TC1', 'SC2'),
('F5', '20', 'TR2', 'TC1', 'SC2'),
('F8', '220', 'TR4', 'TC1', 'SC1'),
('F9', '180', 'TR4', 'TC1', 'SC2');

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
) ENGINE=InnoDB AUTO_INCREMENT=298 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`) VALUES
(295, 'Tarik Fitzgerald', 'Alfreda Yang', 'gibexuja@mailinator.com', 'male', '+1 (944) 844-3754', '2061-06-18', 'Molestiae perferendi'),
(296, 'Kimberley Wilcox', 'Macaulay Vinson', 'munupi@mailinator.com', 'female', '+1 (531) 853-1889', '2063-04-02', 'Assumenda error corr'),
(297, 'Jordan Hampton', 'Malik Howe', 'ganagu@mailinator.com', 'female', '+1 (256) 265-3368', '1996-08-28', 'Minim in minus ea qu');

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
  `user_id` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Seat_id`),
  KEY `Train_id` (`Train_id`),
  KEY `Seat_cat_id` (`Seat_cat_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `seat`
--

INSERT INTO `seat` (`Seat_id`, `Seat_no`, `Date`, `Seat_availability`, `passsenger_id`, `Seat_cat_id`, `Train_id`, `user_id`) VALUES
(1, '2', '2022-03-25', 'C', 'Tarik FitzgeraldAlfreda Yang', 'SC2', 'T2', 'raj1'),
(2, '2', '2022-03-25', 'C', 'Kimberley WilcoxMacaulay Vinson', 'SC2', 'T2', 'raj1'),
(3, '2', '2022-03-25', 'C', 'Jordan HamptonMalik Howe', 'SC2', 'T2', 'raj1');

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
-- Table structure for table `sequence`
--

DROP TABLE IF EXISTS `sequence`;
CREATE TABLE IF NOT EXISTS `sequence` (
  `id` int(11) NOT NULL,
  `fare` int(200) NOT NULL,
  `train` int(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sequence`
--

INSERT INTO `sequence` (`id`, `fare`, `train`) VALUES
(11, 22, 10);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `roll` int(10) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `name`) VALUES
(1, 'raj'),
(1, 'raj'),
(1, 'raj'),
(1, 'raj'),
(1, 'raj'),
(1, 'raj'),
(1, 'raj'),
(20, 'name'),
(75, ' manav'),
(5, 'name'),
(6, 'raj'),
(555, 'popat'),
(13, 'priyanshu'),
(53, 'ff');

-- --------------------------------------------------------

--
-- Table structure for table `tour`
--

DROP TABLE IF EXISTS `tour`;
CREATE TABLE IF NOT EXISTS `tour` (
  `Tour_id` char(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Source_station_id` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `Destination_station_id` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  PRIMARY KEY (`Tour_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tour`
--

INSERT INTO `tour` (`Tour_id`, `Source_station_id`, `Destination_station_id`) VALUES
('TR1', 'RAJKOT', 'ANAND'),
('TR10', 'BAKROL', 'VVN'),
('TR2', 'VVN', 'ANAND'),
('TR4', 'RAJKOT', 'VVN'),
('TR5', 'VVN', 'RAJKOT'),
('TR6', 'ANAND', 'VVN'),
('TR8', 'ANAND', 'RAJKOT'),
('TR9', 'BAKROL', 'RAJKOT');

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
('T', 'Noble Nelson', '2022-01-02', '12:16:00', '00:49:00', 'TR1', 'TC1'),
('T1', 'ANAND TOUR', '2022-03-25', '11:19:00', '00:20:00', 'TR4', 'TC2'),
('T2', 'RAJKOT TRAVEL', '2022-03-25', '11:21:00', '01:20:00', 'TR1', 'TC2'),
('T4', 'SOURASTRA MAIL', '2022-03-25', '13:22:00', '14:27:00', 'TR5', 'TC1'),
('T5', 'KRISHNA EXPRESS', '2022-03-25', '12:26:00', '12:24:00', 'TR6', 'TC1'),
('T7', 'Gage Rogers', '1990-08-17', '01:12:00', '09:44:00', 'TR2', 'TC2'),
('T8', 'VVN TOUR', '2022-03-25', '11:19:00', '00:19:00', 'TR2', 'TC1'),
('T9', 'a to raj', '1991-04-20', '09:51:00', '15:20:00', 'TR8', 'TC2');

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
('raj1', 'Raj@2004', 'RAJ', 'POPAT', 'IDEALISTRAJ09@GMAIL.COM', 'male', '9328537993', '2004-08-21', 'ANAND', 'GUJARAT', 'BAKROL SQUARE\r\nJALARAM LOHANA VIDHYARTHI BHAVAN ROOM NO 210');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fare`
--
ALTER TABLE `fare`
  ADD CONSTRAINT `fare_ibfk_1` FOREIGN KEY (`Train_cat_id`) REFERENCES `train_category` (`train_cat_id`),
  ADD CONSTRAINT `fare_ibfk_2` FOREIGN KEY (`Seat_cat_id`) REFERENCES `seat_category` (`seat_cat_id`);

--
-- Constraints for table `seat`
--
ALTER TABLE `seat`
  ADD CONSTRAINT `seat_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `train`
--
ALTER TABLE `train`
  ADD CONSTRAINT `train_ibfk_1` FOREIGN KEY (`Tour_id`) REFERENCES `tour` (`Tour_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `train_ibfk_2` FOREIGN KEY (`Train_cat_id`) REFERENCES `train_category` (`train_cat_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
