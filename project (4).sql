-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 17, 2022 at 07:59 AM
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
('F10', '220', 'TR5', 'TC1', 'SC1'),
('F11', '180', 'TR5', 'TC1', 'SC2'),
('F12', '399', 'TR6', 'TC1', 'SC1'),
('F13', '299', 'TR6', 'TC1', 'SC2'),
('F16', '678', 'TR8', 'TC1', 'SC1'),
('F17', '6786', 'TR8', 'TC1', 'SC2'),
('F18', '200', 'TR9', 'TC1', 'SC1'),
('F19', '150', 'TR9', 'TC1', 'SC2'),
('F20', '400', 'TR10', 'TC1', 'SC1'),
('F21', '555', 'TR10', 'TC1', 'SC2'),
('F24', '500', 'TR12', 'TC1', 'SC1'),
('F25', '300', 'TR12', 'TC1', 'SC2'),
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
) ENGINE=InnoDB AUTO_INCREMENT=425 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `First_Name`, `Last_Name`, `Email`, `Gender`, `Mobile_No`, `Date_of_birth`, `City`) VALUES
(310, '5', '4', 'gypubuly@mailinator.com', 'Other', '+1 (746) 683-4844', '1979-06-14', 'Deserunt odio debiti'),
(311, '5', '4', 'kewa@mailinator.com', 'Other', '+1 (112) 547-7772', '2002-12-27', 'Natus debitis vel no'),
(312, '4', '5', 'toko@mailinator.com', 'Other', '+1 (435) 374-3043', '2058-10-02', 'Optio Nam ab adipis'),
(313, 'Prescott Wolfe', 'Emma Mcpherson', 'davokax@mailinator.com', 'Other', '+1 (956) 707-4727', '2014-01-19', 'Omnis et mollitia au'),
(314, 'Petra Norton', 'Levi Holden', 'hyzo@mailinator.com', 'female', '+1 (534) 119-2485', '1994-06-06', 'Atque eum non provid'),
(315, 'Allistair Silva', 'Quin Michael', 'hozugyb@mailinator.com', 'Other', '+1 (955) 878-8288', '2008-01-09', 'Dolor neque eaque qu'),
(316, 'Vivien Graham', 'Ezekiel Reese', 'tacoce@mailinator.com', 'Other', '+1 (558) 693-8764', '1991-01-14', 'Ratione eum consequu'),
(317, 'Nicole Finch', 'Lucy Petty', 'wefufiz@mailinator.com', 'Other', '+1 (491) 837-7181', '2015-01-15', 'Labore est dolor li'),
(318, 'Orlando Sosa', 'Felix Terrell', 'raqew@mailinator.com', 'female', '+1 (201) 127-2208', '2066-04-27', 'Laborum Magnam enim'),
(319, 'Boris Stout', 'Daniel Spears', 'tyhog@mailinator.com', 'Other', '+1 (777) 259-2114', '1985-07-05', 'Dicta rerum aperiam '),
(320, 'Aline Rowe', 'Jolie Kaufman', 'votil@mailinator.com', 'Other', '+1 (282) 973-1271', '1976-03-15', 'Ullam quae do quis m'),
(321, '3', 'May Ballard', 'lireziref@mailinator.com', 'male', '+1 (102) 997-3262', '1983-03-27', 'Dolore error placeat'),
(322, '4', 'Quyn Norton', 'lehunyho@mailinator.com', 'Other', '+1 (728) 776-2951', '1996-02-05', 'Obcaecati atque repr'),
(323, '5', 'Caesar Gilmore', 'xakipyvu@mailinator.com', 'female', '+1 (267) 651-9948', '1985-03-03', 'Ab voluptatem dicta '),
(324, '4', 'Meghan Atkins', 'xolewowe@mailinator.com', 'female', '+1 (991) 572-7044', '1970-11-10', 'Ut enim totam fuga '),
(325, '5', 'Darius Hall', 'fojupufak@mailinator.com', 'female', '+1 (833) 179-3241', '2067-04-02', 'Cum totam aut magnam'),
(326, '6', 'Iona Parrish', 'bemutinyk@mailinator.com', 'female', '+1 (589) 695-1898', '1992-06-16', 'Ea ullam necessitati'),
(330, 'Erin Rocha', 'Robert Garrison', 'zyvejoci@mailinator.com', 'female', '+1 (718) 726-7484', '2019-12-16', 'Omnis enim eu irure '),
(331, 'Xavier Vargas', 'Brent Rivas', 'zahowa@mailinator.com', 'Other', '+1 (165) 119-1748', '1986-11-01', 'Aliquam ducimus obc'),
(332, 'Patience Burgess', 'Lois Kent', 'gicufyne@mailinator.com', 'male', '+1 (451) 189-9527', '1970-06-24', 'Consequat Vitae vel'),
(336, 'Porter Leon', 'Germane Pennington', 'sajerivi@mailinator.com', 'male', '+1 (283) 837-5282', '1970-07-25', 'Vel recusandae Quo '),
(339, 'Drake Lawson', 'Karly Ball', 'kusapoqyqy@mailinator.com', 'female', '+1 (433) 137-8337', '2021-06-05', 'Dolor rerum fugiat '),
(342, 'Zenaida Hoover', 'Zoe Rowe', 'lakyt@mailinator.com', 'male', '+1 (569) 965-8003', '2064-09-17', 'Vel optio sunt aut '),
(345, 'Nell Solomon', 'Zeph Day', 'wyxyko@mailinator.com', 'Other', '+1 (213) 657-2583', '1971-12-01', 'Itaque omnis libero '),
(351, 'Brody Hampton', 'Clark Weiss', 'qizov@mailinator.com', 'male', '+1 (517) 539-1538', '1989-03-08', 'Ut magna in porro et'),
(354, 'Basia Kramer', 'Cora Dale', 'husi@mailinator.com', 'female', '+1 (518) 705-3949', '1999-01-08', 'Illo fugiat quis dig'),
(357, 'Ainsley Puckett', 'Remedios House', 'loti@mailinator.com', 'female', '+1 (362) 564-8144', '2055-08-06', 'Vel explicabo Modi '),
(372, 'Ashely Aguirre', 'Howard Hines', 'vesino@mailinator.com', 'female', '+1 (791) 536-3517', '1970-12-18', 'Et enim amet omnis '),
(375, 'Brent Charles', 'Sopoline Harrison', 'jifuqac@mailinator.com', 'male', '+1 (347) 127-6205', '1989-12-02', 'Officia deserunt non'),
(378, 'Xyla Estes', 'Yoko Swanson', 'karotec@mailinator.com', 'male', '+1 (579) 839-3726', '2063-08-11', 'Minim laborum verita'),
(379, 'Dieter Sims', 'Mia Knox', 'zyreso@mailinator.com', 'Other', '+1 (338) 755-8709', '2067-09-09', 'At laboris odio enim'),
(381, 'Mona Workman', 'Cameran Yang', 'fytawami@mailinator.com', 'Other', '+1 (408) 851-7578', '1991-12-29', 'Ratione similique vo'),
(384, 'raj', 'popat', 'idealistraj09@gmail.com', 'male', '9328537990', '2007-10-10', 'BAKROL'),
(385, 'Leilani Fleming', 'Gregory Patterson', 'woge@mailinator.com', 'Other', '+1 (195) 356-5668', '2001-04-02', 'Harum aute aut non i'),
(386, 'Paula Patterson', 'Risa Fitzpatrick', 'lucypifu@mailinator.com', 'Other', '+1 (208) 385-7879', '2064-06-22', 'Deserunt dolorem min'),
(387, 'Julie Sharp', 'Xandra Potts', 'qalarafuc@mailinator.com', 'male', '+1 (486) 931-3062', '2068-06-17', 'Animi rerum tempor '),
(388, 'raj', 'Stephen Rowe', 'sezo@mailinator.com', 'male', '+1 (624) 128-6282', '2064-12-28', 'SINT PARIATUR QUI N'),
(389, 'vraj', 'Octavia Glover', 'nuqa@mailinator.com', 'female', '+1 (331) 428-3008', '2003-07-10', 'Culpa fugiat id pro'),
(390, 'Astra Joyner', 'Lesley Graham', 'logu@mailinator.com', 'male', '+1 (214) 112-8784', '2059-02-16', 'Adipisicing est asp'),
(391, 'MacKensie Gutierrez', 'David Sims', 'xozepo@mailinator.com', 'Other', '+1 (851) 739-3737', '2004-12-03', 'Excepteur dolorum qu'),
(392, 'Erasmus Parks', 'Rooney Banks', 'zizemonira@mailinator.com', 'Other', '+1 (416) 871-5909', '2063-08-26', 'Autem sint delectus'),
(393, 'Amal Miranda', 'Vernon Sullivan', 'cyhyco@mailinator.com', 'Other', '+1 (225) 265-1242', '1970-04-07', 'Consequatur veritati'),
(394, 'Margaret Nieves', 'Macey Valenzuela', 'moxajogaj@mailinator.com', 'Other', '+1 (986) 544-1484', '2019-09-18', 'Expedita necessitati'),
(395, 'Myles Lynch', 'Larissa Small', 'dajyvegipu@mailinator.com', 'female', '+1 (215) 235-4093', '1984-06-11', 'Temporibus dolor tem'),
(396, 'Macy Adkins', 'Christian Decker', 'turykonofa@mailinator.com', 'male', '+1 (347) 938-5068', '1973-12-24', 'Earum repellendus M'),
(397, 'Eagan Avery', 'Omar Kirk', 'pose@mailinator.com', 'female', '+1 (955) 226-3416', '2008-05-29', 'Eum ea facilis qui q'),
(398, 'Doris Mckenzie', 'Gareth Dillard', 'fybuhety@mailinator.com', 'female', '+1 (122) 358-2521', '1974-05-24', 'Eum id animi nisi '),
(405, 'Rafael Stephenson', 'Adrienne Vang', 'sevury@mailinator.com', 'Other', '+1 (619) 734-1784', '2052-12-22', 'Earum qui reiciendis'),
(407, 'Macaulay Shepard', 'Rafael Powers', 'hozov@mailinator.com', 'male', '+1 (704) 541-5251', '1979-08-30', 'Sunt id inventore a'),
(408, 'Ethan Meadows', 'Summer Delacruz', 'fokumyc@mailinator.com', 'female', '+1 (195) 257-4446', '2059-01-01', 'Earum occaecat labor'),
(412, 'Deborah Hartman', 'Olympia Meyer', 'qogezici@mailinator.com', 'female', '+1 (898) 741-3118', '2051-08-20', 'Magni perspiciatis '),
(413, 'Dorothy Charles', 'Fiona Haley', 'lodazy@mailinator.com', 'male', '+1 (897) 202-2557', '1982-01-22', 'Dolorum et et quis p'),
(414, 'Kasper Sparks', 'Linda Wolfe', 'lyfa@mailinator.com', 'male', '+1 (739) 927-2121', '2056-02-11', 'Nobis dolor officia '),
(415, 'Odessa Porter', 'Mia Middleton', 'bohirydoc@mailinator.com', 'female', '+1 (887) 428-4854', '2052-12-16', 'Rem est quisquam in '),
(419, 'Cain Pennington', 'Keaton Duke', 'xelebeg@mailinator.com', 'male', '+1 (787) 156-5532', '2065-09-15', 'Amet esse excepteu'),
(420, 'Alvin Cooke', 'Yen Mckay', 'taqyqyd@mailinator.com', 'male', '+1 (586) 683-4473', '1999-01-28', 'Inventore impedit a'),
(421, 'Nolan Flowers', 'Victoria Guerra', 'zejifux@mailinator.com', 'male', '+1 (386) 209-4393', '2062-09-29', 'Aut dolore atque ut '),
(422, 'Nehru Obrien', 'Macaulay Sloan', 'fumo@mailinator.com', 'Other', '+1 (259) 417-7662', '1994-03-01', 'Eos vel et quae pro'),
(423, 'Blaine Goodwin', 'Hakeem Christensen', 'niryrujana@mailinator.com', 'female', '+1 (549) 662-2667', '2005-05-19', 'Ea aute qui qui reru'),
(424, 'Merritt Randall', 'Sierra Golden', 'lahym@mailinator.com', 'Other', '+1 (407) 452-4394', '2000-05-09', 'Dolore veritatis con');

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
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=latin1;

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
(13, 26, 18);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `roll` int(50) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `name`) VALUES
(23, 'd'),
(1, 'raj'),
(3, 'jigar');

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
('TR10', 'BAKROL', 'VVN'),
('TR12', 'RAJKOT', 'ANAND'),
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
('T1', 'ANAND TOUR', '2022-04-02', '11:19:00', '00:20:00', 'TR4', 'TC2'),
('T11', 'rajdhani', '2022-04-02', '13:22:00', '12:00:00', 'TR12', 'TC2'),
('T12', 'okha express', '2022-04-02', '13:51:00', '17:52:00', 'TR4', 'TC2'),
('T13', 'shyam express', '2022-04-04', '21:43:00', '22:43:00', 'TR12', 'TC2'),
('T14', 'Paki Black', '2022-04-07', '20:00:00', '22:58:00', 'TR12', 'TC2'),
('T15', 'rajdhani', '2022-04-18', '11:28:00', '11:27:00', 'TR10', 'TC1'),
('T16', 'rajdhani', '2022-04-18', '11:29:00', '11:33:00', 'TR10', 'TC2'),
('T17', 'Paki Black', '2022-04-18', '15:25:00', '13:30:00', 'TR10', 'TC2'),
('T4', 'SOURASTRA MAIL', '2022-04-02', '13:22:00', '14:27:00', 'TR5', 'TC1'),
('T5', 'KRISHNA EXPRESS', '2022-04-02', '12:26:00', '12:24:00', 'TR6', 'TC1'),
('T7', 'Gage Rogers', '2022-04-02', '01:12:00', '09:44:00', 'TR2', 'TC2'),
('T8', 'VVN TOUR', '2022-04-02', '11:19:00', '00:19:00', 'TR2', 'TC1'),
('T9', 'a to raj', '2022-04-02', '09:51:00', '15:20:00', 'TR8', 'TC2');

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
('bekuquzasy', 'Pa$$w0rd!', 'Halee Fulton', 'Reese Lang', 'rajcoc93285@gmail.com', 'male', '7278278278', '1993-08-01', 'Voluptas velit cons', 'In voluptatem quo f', 'Mollitia in elit ar'),
('raj1', 'rajbhai1', 'RAJ', 'POPAT', 'IDEALISTRAJ09@GMAIL.COM', 'male', '9328537993', '2004-08-21', 'ANAND', 'GUJARAT', 'BAKROL SQUARE\r\nJALARAM LOHANA VIDHYARTHI BHAVAN ROOM NO 210'),
('rajpopat', 'Pa$$w0rd!', 'Reece Austin', 'Amela Warren', 'rajpopat2004@gmail.com', 'male', '5777777777', '2064-05-03', 'Et in est placeat s', 'Culpa vitae eum fac', 'Similique fugit tem');

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
