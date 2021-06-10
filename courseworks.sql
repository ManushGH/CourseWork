-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2021 at 01:27 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `courseworks`
--

-- --------------------------------------------------------

--
-- Table structure for table `coursedetails`
--

CREATE TABLE `coursedetails` (
  `CRN` int(11) NOT NULL,
  `courseID` int(11) DEFAULT NULL,
  `availableSeats` int(11) DEFAULT NULL,
  `courseTime` varchar(255) DEFAULT NULL,
  `courseDay` varchar(255) DEFAULT NULL,
  `courseDate` varchar(255) DEFAULT NULL,
  `courseInstructor` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coursedetails`
--

INSERT INTO `coursedetails` (`CRN`, `courseID`, `availableSeats`, `courseTime`, `courseDay`, `courseDate`, `courseInstructor`) VALUES
(1001, 2, 1, '11:00am to 11:50am', 'MWF', ' 01/15 to 05/10', 'Stella'),
(1002, 2, 20, '8:00am to 8:50am', 'MWF', '01/15 to 05/10', 'Bob'),
(1003, 1, 20, '8:00am to 8:50am', 'MWF', '07/14 to 12/10', 'Bob'),
(1004, 1, 20, '3:00pm to 3:50pm', 'MWF', '07/14 to 12/10', 'Stella'),
(1005, 6, 20, '3:00pm to 3:50pm', 'MWF', '07/14 to 12/10', 'Stella'),
(1006, 3, 20, '2:00pm to 3:50pm', 'MWF', '07/14 to 12/10', 'Sachin Meena'),
(1007, 1, 20, '4:00pm to 5:50pm', 'MWF', '07/14 to 12/10', 'John Jackson'),
(1008, 7, 20, '4:00pm to 3:50pm', 'MWF', '07/14 to 12/10', 'Jonny Jack'),
(1009, 8, 20, '1:00pm to 2:50pm', 'MWF', '07/14 to 12/10', 'Jack Anon'),
(1010, 9, 20, '3:00pm to 2:50pm', 'MWF', '07/14 to 12/10', 'Time Traveler xD'),
(1011, 12, 1, '11:00am to 11:50am', 'MF', ' 01/15 to 05/10', 'Stella Mia'),
(1012, 10, 1, '9:00am to 11:50am', 'MF', ' 01/15 to 05/10', 'Brainy Brain'),
(1013, 11, 1, '9:00am to 11:50am', 'MT', ' 01/15 to 05/10', 'Sylas Demacia'),
(1014, 13, 1, '9:00pm to 11:50pm', 'MTW', ' 01/15 to 05/10', 'Ekko Piltover');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `courseID` int(11) NOT NULL,
  `subjectID` int(11) DEFAULT NULL,
  `courseName` varchar(255) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `courseHours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`courseID`, `subjectID`, `courseName`, `semester`, `courseHours`) VALUES
(1, 1, 'ENGL 1101 - English Composition I', 'Fall 2021', 3),
(2, 1, 'ENGL 1102 - English Composition II', 'Spring 2022', 3),
(3, 5, 'CSCI 4300 - Web Programming', 'Fall 2021', 4),
(4, 5, 'CSCI 1302 - Software Development', 'Fall 2021', 4),
(5, 5, 'CSCI 2720 - Data Structures', 'Fall 2021', 4),
(6, 1, 'ENGL 1102 - English Composition II', 'Fall 2021', 3),
(7, 2, 'MATH 2021', 'Fall 2021', 4),
(8, 3, 'CHEM 2021', 'Fall 2021', 4),
(9, 4, 'PHYS 2021', 'Fall 2021', 4),
(10, 2, 'MATH 2022', 'Spring 2022', 4),
(11, 4, 'PHYS 2022', 'Spring 2022', 4),
(12, 5, 'CSCI 2022', 'Spring 2022', 4),
(13, 3, 'CHEM 2022', 'Spring 2022', 4);

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

CREATE TABLE `enrollments` (
  `enrollmentID` int(11) NOT NULL,
  `CRN` int(11) DEFAULT NULL,
  `studentID` int(11) DEFAULT NULL,
  `semester` varchar(255) DEFAULT NULL,
  `enrolledHours` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`enrollmentID`, `CRN`, `studentID`, `semester`, `enrolledHours`) VALUES
(1, 1003, 36, 'Fall 2021', 3),
(2, 1003, 7, 'Fall 2021', 3),
(3, 1006, 36, 'Fall 2021', 4);

-- --------------------------------------------------------

--
-- Table structure for table `shoppingcart`
--

CREATE TABLE `shoppingcart` (
  `item` int(11) NOT NULL,
  `studentID` int(11) DEFAULT NULL,
  `CRN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoppingcart`
--

INSERT INTO `shoppingcart` (`item`, `studentID`, `CRN`) VALUES
(54, 38, 1003);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studentID` int(11) NOT NULL,
  `studentName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `loginPass` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studentID`, `studentName`, `email`, `loginPass`) VALUES
(7, 'a', 'a', 'a'),
(8, 'b', 'b', 'b'),
(36, 'Some One', 'some@email.com', 'some'),
(37, 'c', 'c', 'c'),
(38, 'Bob John', 'bob@email.com', 'okay');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subjectID` int(11) NOT NULL,
  `subjectName` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subjectID`, `subjectName`) VALUES
(1, 'English'),
(2, 'Math'),
(3, 'Chemistry'),
(4, 'Physics'),
(5, 'Computer Science');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD PRIMARY KEY (`CRN`),
  ADD KEY `courseID` (`courseID`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`courseID`),
  ADD KEY `subjectID` (`subjectID`);

--
-- Indexes for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD PRIMARY KEY (`enrollmentID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `CRN` (`CRN`);

--
-- Indexes for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  ADD PRIMARY KEY (`item`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studentID`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subjectID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coursedetails`
--
ALTER TABLE `coursedetails`
  MODIFY `CRN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1015;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `courseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `enrollments`
--
ALTER TABLE `enrollments`
  MODIFY `enrollmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `shoppingcart`
--
ALTER TABLE `shoppingcart`
  MODIFY `item` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `coursedetails`
--
ALTER TABLE `coursedetails`
  ADD CONSTRAINT `coursedetails_ibfk_1` FOREIGN KEY (`courseID`) REFERENCES `courses` (`courseID`);

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `courses_ibfk_1` FOREIGN KEY (`subjectID`) REFERENCES `subjects` (`subjectID`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `enrollments_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studentID`),
  ADD CONSTRAINT `enrollments_ibfk_2` FOREIGN KEY (`CRN`) REFERENCES `coursedetails` (`CRN`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
