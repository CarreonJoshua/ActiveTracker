-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2023 at 03:42 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project1`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

CREATE TABLE `activity` (
  `activityNum` int(10) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `instruction` text DEFAULT NULL,
  `totalscore` int(3) DEFAULT NULL,
  `date_given` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`activityNum`, `name`, `instruction`, `totalscore`, `date_given`) VALUES
(3001, 'Activity 1', 'Create an ERD Diagram', 50, '2023-05-28 06:41:24'),
(3002, 'Lab Act 1', 'Create a Tkinter with CRUD utilities', 100, '2023-05-28 06:45:48');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contactID` int(10) NOT NULL,
  `studID` int(10) DEFAULT NULL,
  `phoneNum` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contactID`, `studID`, `phoneNum`, `email`, `address`) VALUES
(1, 111, '09274769151', 'Carreon.joshuad@gmail.com', '10N Tower 3 Mesaverte Residences'),
(2, 112, '0922214333', 'Quilestino.Gerome@gmail.com', 'Somewhere CDO'),
(3, 113, '0927449928', 'Athenix0320@gmail.com', '10N Tower 3 Mesaverte Residences');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseID` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseID`, `name`, `description`) VALUES
(3101, 'IT', 'Section for Information Technology'),
(3102, 'ComSci', 'Section for Computer Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `sectionID` int(10) NOT NULL,
  `section_code` varchar(10) DEFAULT NULL,
  `courseid` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`sectionID`, `section_code`, `courseid`) VALUES
(3211, 'IT2R11', 3101),
(3212, 'IT2R12', 3101);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `statusID` tinyint(1) NOT NULL,
  `label` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`statusID`, `label`) VALUES
(0, 'On-Time Submission'),
(1, 'Late Submission');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `studID` int(10) NOT NULL,
  `firstName` varchar(25) DEFAULT NULL,
  `lastName` varchar(25) DEFAULT NULL,
  `section` int(10) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`studID`, `firstName`, `lastName`, `section`, `gender`) VALUES
(111, 'Joshua', 'Carreon', 3211, 'male'),
(112, 'Gerome', 'Quilestino', 3211, 'male'),
(113, 'Jethro', 'Norris', 3211, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submitID` int(10) NOT NULL,
  `studentID` int(10) DEFAULT NULL,
  `activityNum` int(10) DEFAULT NULL,
  `dateSubmitted` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) DEFAULT NULL,
  `score` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`submitID`, `studentID`, `activityNum`, `dateSubmitted`, `status`, `score`) VALUES
(12345, 112, 3001, '2023-05-28 07:35:47', 0, 45),
(12348, 111, 3001, '2023-05-28 07:39:17', 1, 40),
(12350, 113, 3002, '2023-05-28 07:36:11', 0, 78),
(12353, 111, 3002, '2023-05-28 07:39:08', 0, 97),
(12354, 112, 3002, '2023-05-28 08:44:04', 1, 79);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`activityNum`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contactID`),
  ADD KEY `studID` (`studID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseID`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`sectionID`),
  ADD KEY `courseid` (`courseid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`studID`),
  ADD KEY `section` (`section`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submitID`),
  ADD KEY `studentID` (`studentID`),
  ADD KEY `activityNum` (`activityNum`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity`
--
ALTER TABLE `activity`
  MODIFY `activityNum` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3003;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contactID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3103;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `sectionID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3213;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `studID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submitID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12355;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`studID`) REFERENCES `students` (`studID`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`courseid`) REFERENCES `course` (`courseID`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`section`) REFERENCES `section` (`sectionID`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `submission_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `students` (`studID`),
  ADD CONSTRAINT `submission_ibfk_2` FOREIGN KEY (`activityNum`) REFERENCES `activity` (`activityNum`),
  ADD CONSTRAINT `submission_ibfk_3` FOREIGN KEY (`status`) REFERENCES `status` (`statusID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
