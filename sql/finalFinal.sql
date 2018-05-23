-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 23, 2018 at 03:20 PM
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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`AppointmentID`, `supervisorID`, `studentID`, `Date`, `Start Time`, `End Time`, `message`) VALUES
(7, 419419, 140805060, '2018-05-07', '04:00:00', '08:00:00', 'wow');

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
) ENGINE=InnoDB AUTO_INCREMENT=190706555 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `password`, `role`) VALUES
(419419, '86c878398b37c65ec0d21f2c803d25d4', 'supervisor'),
(140805006, '86c878398b37c65ec0d21f2c803d25d4', 'student'),
(140805014, '86c878398b37c65ec0d21f2c803d25d4', 'student'),
(140805060, '86c878398b37c65ec0d21f2c803d25d4', 'student');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
CREATE TABLE IF NOT EXISTS `notifications` (
  `MessageID` int(10) NOT NULL,
  `userID` int(20) NOT NULL,
  `Notice` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`MessageID`, `userID`, `Notice`) VALUES
(4, 140805054, 'This is shit'),
(3, 435768696, 'YOur appointment scheduling was successful');

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
(140805060, 'Timi', 'Mike', 'Fash', '140805060.jpg', 'computer sciences', 'Unilag', '400', 'phillzmike@gmail.com'),
(140805014, 'Peace', 'Ekundayo', 'Bakare', '140805014.jpg', 'Computer sciences', 'Unilag', '400', 'peace@gmail.com');

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

--
-- Dumping data for table `supervisor available time`
--

INSERT INTO `supervisor available time` (`supervisorID`, `Day`, `Start Time`, `End Time`, `maxStudent`) VALUES
(419419, 'Monday', '02:00:00', '04:00:00', 3),
(419419, 'Monday', '17:00:00', '18:00:00', 4),
(419419, 'Wednesday', '13:00:00', '14:00:00', 3),
(419419, 'Wednesday', '16:00:00', '17:00:00', 5),
(419419, 'Wednesday', '18:00:00', '20:00:00', 7);

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
(419419, 'Miss', 'Seyi', 'Juliana', 'Awotunde', 'Unilag', 'seyi@gmail.com', '08097655685');

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
