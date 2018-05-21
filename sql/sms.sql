-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 17, 2018 at 03:04 PM
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
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('student','supervisor') NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `username`, `password`, `role`) VALUES
(2, 'Opemipo', '1998', 'student'),
(3, 'Joda', '1999', 'supervisor');

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
  KEY `stu_id` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisors`
--

INSERT INTO `supervisors` (`ID`, `title`, `firstname`, `middlename`, `lastname`) VALUES
(3, 'Mr', 'Opemipo', 'Oreoluwa', 'Joda');

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
