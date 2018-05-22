-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2018 at 07:50 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `AppointmentID` int(20) NOT NULL AUTO_INCREMENT,
  `supervisorID` int(20) NOT NULL,
  `studentID` int(20) NOT NULL,
  `Date` date NOT NULL,
  `Start Time` time NOT NULL,
  `End Time` time NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`AppointmentID`),
  KEY `supervisorID` (`supervisorID`),
  KEY `studentID` (`studentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `ID` int(20) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `role` enum('student','supervisor') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=140805055 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `password`, `role`) VALUES
(1, 'a', 'supervisor'),
(2, '1998', 'student'),
(3, '1999', 'supervisor'),
(4, 'terminal', 'supervisor'),
(111, '', 'student'),
(312, '123', 'student'),
(1111, '', 'student'),
(3232, '1', 'student'),
(12112, '123', 'student'),
(12345, 'bod', 'supervisor'),
(121123, '123', 'student'),
(123456, 'bod', 'supervisor'),
(323211, '22', 'student'),
(419419, 'gbera', 'supervisor'),
(1010101, 'teni', 'supervisor'),
(1234321, '', 'student'),
(1234567, '11', 'student'),
(11122233, '080', 'supervisor'),
(12112344, '123', 'student'),
(12345678, '121', 'student'),
(123432221, '', 'student'),
(140805004, '140805004', 'student'),
(140805005, '1998', 'student'),
(140805006, 'kaka', 'student'),
(140805054, '1234', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
CREATE TABLE IF NOT EXISTS `students` (
  `ID` int(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `level` varchar(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  KEY `stu_id` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`ID`, `firstname`, `middlename`, `lastname`, `img_path`, `department`, `institution`, `level`, `email`) VALUES
(12112, 'e', 'e', 'e', '12112.png', 'dg', 'e', 'e', 'k'),
(121123, 'e', 'e', 'e', '121123.png', 'dg', 'e', 'e', 'k'),
(12112344, 'e', 'e', 'e', '12112344.png', 'dg', 'e', 'e', 'k'),
(312, 'e', 'e', 'e', '312.png', 'dg', 'e', 'e', 'k'),
(3232, 'g', 'hb', 'j', '3232.png', 'n', 'jn', 'j', 'n'),
(323211, 'g', 'hb', 'j', '323211.png', 'n', 'jn', 'j', 'n'),
(140805005, 'Opemipo', 'Oreoluwa', 'Joda', '140805005.JPG', 'csc', 'Unilag', '400', 'o@g.c'),
(140805006, 'Opemipo', 'Oreoluwa', 'Joda', '140805006.JPG', 'csc', 'Unilag', '400', 'o@g.c'),
(1234567, 'g', 'jh', 'j', '1234567.jpg', 'f', 'vj', 'vj', 'jh'),
(12345678, 'g', 'jh', 'j', '12345678.png', 'f', 'vj', 'vj', 'jh'),
(140805054, 'Teniola', 'Faith', 'Sulaiman', '140805054.jpg', 'csc', 'Unilag', '400', 'sulaiman@gmail.com'),
(111, '', '', '', '111.', 's', '', '', ''),
(1111, '', '', '', '1111.', 's', '', '', ''),
(1234321, '', '', '', '1234321.', 's', '', '', ''),
(123432221, '', '', '', '123432221.', 's', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor available time`
--

DROP TABLE IF EXISTS `supervisor available time`;
CREATE TABLE IF NOT EXISTS `supervisor available time` (
  `supervisorID` int(20) NOT NULL,
  `Day` varchar(10) NOT NULL,
  `Start Time` time NOT NULL,
  `End Time` time NOT NULL,
  `maxStudent` int(11) NOT NULL,
  KEY `supervisorID` (`supervisorID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supervisors`
--

DROP TABLE IF EXISTS `supervisors`;
CREATE TABLE IF NOT EXISTS `supervisors` (
  `ID` int(20) NOT NULL,
  `title` varchar(20) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `middlename` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `institution` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`ID`, `title`, `firstname`, `middlename`, `lastname`, `institution`, `email`, `phone_number`) VALUES
(1, 'jb', 'ghkv', 'jh', 'ghv', 'jhv', 'h', 'hk'),
(3, 'Mr', 'Opemipo', 'Oreoluwa', 'Joda', '', '', ''),
(4, 'Master', 'Godwin', 'Udumo', 'Okoi', '', '', ''),
(12345, 'Evans', 'James', 'Abacha', 'Laps', 'Csc', 'isac@bod', '08097165334'),
(123456, 'Evans', 'James', 'Abacha', 'Laps', 'Csc', 'isac@bod', '08097165334'),
(419419, 'Pastor EP', 'George', 'Olamide', 'Legbegbe', 'University of Chicago', 'legbe@gbe.gbera', '01000098'),
(1010101, 'Damsel', 'Teni', 'Faith', 'Sulaiman', 'Unilag', 'teni.com', '0000'),
(11122233, 'Mrs', 'Timi', 'Mich', 'Fash', 'Unilag', 'timi@fisi.na', '080999999419');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `stu_id` FOREIGN KEY (`ID`) REFERENCES `login` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisors`
--
ALTER TABLE `supervisors`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`ID`) REFERENCES `login` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
