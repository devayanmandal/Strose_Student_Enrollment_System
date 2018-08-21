-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2016 at 12:43 AM
-- Server version: 5.7.9
-- PHP Version: 5.6.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mandal`
--
CREATE DATABASE IF NOT EXISTS `mandal` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `mandal`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `ADMINID` int(11) NOT NULL AUTO_INCREMENT,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT NULL,
  `FIRSTNAME` varchar(40) DEFAULT NULL,
  `LASTNAME` varchar(40) DEFAULT NULL,
  `ADDRESS` varchar(40) DEFAULT NULL,
  `CITY` varchar(40) DEFAULT NULL,
  `ST` varchar(2) DEFAULT NULL,
  `ZIPCODE` varchar(5) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`ADMINID`)
) ENGINE=InnoDB AUTO_INCREMENT=3335 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`ADMINID`, `PASSWORD`, `ROLE`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CITY`, `ST`, `ZIPCODE`, `PHONE`, `EMAIL`) VALUES
(3111, 'padmin1', 'Admin', 'David', 'Pearce', '561 College St.', 'Albany', 'NY', '12203', '(518)123-4567', 'pearced@strose.edu'),
(3222, 'padmin2', 'Admin', 'James', 'Oliver', '892 Central Ave.', 'Albany', 'NY', '12201', '(518)790-0981', 'oliverj@strose.edu'),
(3333, 'padmin3', 'Admin', 'AdminFN', 'AdminLN', '1 Admin St', 'Albany', 'NY', '12203', '(518)000-0000', 'admin@admin.com'),
(3334, 'padmin4', 'Admin', 'AdminFN4', 'AdminLN4', '4 Admin St', 'Albany', 'NY', '12203', '(518)222-2222', 'admin4@admin.com');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

DROP TABLE IF EXISTS `classes`;
CREATE TABLE IF NOT EXISTS `classes` (
  `CLASSID` int(11) NOT NULL AUTO_INCREMENT,
  `CLASSCODE` varchar(20) DEFAULT NULL,
  `CLASSNAME` varchar(40) DEFAULT NULL,
  `SEC` int(11) DEFAULT NULL,
  `ENROLLMENT` int(11) DEFAULT NULL,
  `MAXENROLLMENT` int(11) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `LOCATION` varchar(40) DEFAULT NULL,
  `DAYS` varchar(20) DEFAULT NULL,
  `STARTTIME` varchar(20) DEFAULT NULL,
  `ENDTIME` varchar(20) DEFAULT NULL,
  `FACULTYID` int(11) DEFAULT NULL,
  `DESCR` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`CLASSID`),
  KEY `fk1` (`FACULTYID`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`CLASSID`, `CLASSCODE`, `CLASSNAME`, `SEC`, `ENROLLMENT`, `MAXENROLLMENT`, `STATUS`, `LOCATION`, `DAYS`, `STARTTIME`, `ENDTIME`, `FACULTYID`, `DESCR`) VALUES
(100, 'ART 101', 'Drawing 1', 1, 1, 40, 'Open', 'Albertus Hall 114', 'M, W, F', '8:15 AM', '10:15 AM', 2111, 'Introductory drawing course.'),
(101, 'ART 102', 'Sculpture', 2, 2, 40, 'Open', 'Albertus Hall 116', 'Tu, Th', '3:00 PM', '5:00 PM', 2111, 'Introductory sculpture course.'),
(102, 'ART 308', 'Intaglio', 1, 3, 20, 'Open', 'Albertus Hall 205', 'M, W, F', '10:00 AM', '12:00 PM', 2222, 'Introductory Intaglio course.'),
(103, 'ART 358', 'Advanced Studio', 2, 2, 20, 'Open', 'Albertus Hall 208', 'M, Th', '4:00 PM', '6:00 PM', 2222, 'This course encourages and directs the student to begin creating work that is both personal and informed. As the first in the advanced series, the focus is on providing the student with a process to move from classroom assignments to independent work.'),
(104, 'ART 390', 'Advanced Relief Printmaking', 1, 3, 20, 'Open', 'Albertus Hall 114', 'Tu', '4:00 PM', '6:30 PM', 2333, 'Intermediate level course for printmaking.'),
(105, 'ART 450', 'Gallery Management', 2, 2, 20, 'Open', 'Albertus Hall 120', 'W', '7:00 PM', '8:30 PM', 2333, 'Course open only to seniors.');

-- --------------------------------------------------------

--
-- Table structure for table `enrollments`
--

DROP TABLE IF EXISTS `enrollments`;
CREATE TABLE IF NOT EXISTS `enrollments` (
  `ENROLLMENTID` int(11) NOT NULL AUTO_INCREMENT,
  `STUDENTID` int(11) NOT NULL DEFAULT '0',
  `CLASSID` int(11) NOT NULL DEFAULT '0',
  `FACULTYID` int(11) DEFAULT NULL,
  `CLASSCODE` varchar(20) DEFAULT NULL,
  `SEC` int(11) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`ENROLLMENTID`,`STUDENTID`,`CLASSID`),
  KEY `fk2` (`STUDENTID`),
  KEY `fk3` (`CLASSID`),
  KEY `fk4` (`FACULTYID`)
) ENGINE=InnoDB AUTO_INCREMENT=10016 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `enrollments`
--

INSERT INTO `enrollments` (`ENROLLMENTID`, `STUDENTID`, `CLASSID`, `FACULTYID`, `CLASSCODE`, `SEC`, `STATUS`) VALUES
(10000, 1111, 100, 2111, 'ART 101', 1, 'Dropped'),
(10001, 1111, 102, 2222, 'ART 308', 1, 'Enrolled'),
(10002, 1111, 104, 2333, 'ART 390', 1, 'Enrolled'),
(10003, 1222, 101, 2111, 'ART 102', 2, 'Enrolled'),
(10004, 1222, 103, 2222, 'ART 358', 2, 'Enrolled'),
(10005, 1222, 105, 2333, 'ART 450', 2, 'Enrolled'),
(10006, 1333, 100, 2111, 'ART 101', 1, 'Enrolled'),
(10007, 1333, 103, 2222, 'ART 358', 2, 'Enrolled'),
(10008, 1333, 104, 2333, 'ART 390', 1, 'Enrolled'),
(10009, 1444, 100, 2111, 'ART 101', 1, 'Enrolled'),
(10010, 1444, 102, 2222, 'ART 308', 1, 'Enrolled'),
(10011, 1444, 105, 2333, 'ART 450', 2, 'Enrolled'),
(10012, 1555, 101, 2111, 'ART 102', 2, 'Enrolled'),
(10013, 1555, 102, 2222, 'ART 308', 1, 'Enrolled'),
(10014, 1555, 104, 2333, 'ART 390', 1, 'Enrolled'),
(10015, 1111, 100, 2111, 'ART 101', 1, 'Dropped');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

DROP TABLE IF EXISTS `faculty`;
CREATE TABLE IF NOT EXISTS `faculty` (
  `FACULTYID` int(11) NOT NULL AUTO_INCREMENT,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT NULL,
  `FIRSTNAME` varchar(40) DEFAULT NULL,
  `LASTNAME` varchar(40) DEFAULT NULL,
  `ADDRESS` varchar(40) DEFAULT NULL,
  `CITY` varchar(40) DEFAULT NULL,
  `ST` varchar(2) DEFAULT NULL,
  `ZIPCODE` varchar(5) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  `BIO` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`FACULTYID`)
) ENGINE=InnoDB AUTO_INCREMENT=2445 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FACULTYID`, `PASSWORD`, `ROLE`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CITY`, `ST`, `ZIPCODE`, `PHONE`, `EMAIL`, `BIO`) VALUES
(2111, 'pfaculty1', 'Faculty', 'Jonas', 'DeJonge', '908 Eighth Ave.', 'Albany', 'NY', '12203', '(518)896-0943', 'dejongej@strose.edu', 'Ph.D in Design Analysys from Design Institute (2004)\n\nMS in Design and Aesthetics from St. Mary University (2001)\n\nBS in Graphics Design from St. Mary University (1997)\n\nInterests: Drawing, painting, sculpting.'),
(2222, 'pfaculty2', 'Faculty', 'Sam', 'Wallas', '965 Western Ave.', 'Albany', 'NY', '12208', '(518)670-1094', 'wallass@strose.edu', 'Ph.D Architectural Design from The University of Indiana (2002)\n\nMS in Art Aesthetics from Florida State University (1997)\n\nBA in Fine Art from Florida State University (1993)\n\nInterests: sculpting, photography, running.'),
(2333, 'pfaculty3', 'Faculty', 'Marielos', 'Martinez', '192 Washington Ave.', 'Albany', 'NY', '12208', '(518)083-1954', 'martinezm@strose.edu', 'Ph.D in Design Analysis from New York School of Design (1990)\n\nMS in Applied Design from University of New York (1985)\n\nBS in Fine Art from University of New York (1980)\n\nInterests: Gardening, sculpting, designing furniture.'),
(2444, 'pfaculty4', 'Faculty', 'FacultyFN', 'FacultyLN', '1 Faculty St', 'Albany', 'NY', '12203', '(518)111-1111', 'faculty@faculty.com', 'Faculty Description');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `STUDENTID` int(11) NOT NULL AUTO_INCREMENT,
  `PASSWORD` varchar(40) DEFAULT NULL,
  `ROLE` varchar(20) DEFAULT NULL,
  `FIRSTNAME` varchar(40) DEFAULT NULL,
  `LASTNAME` varchar(40) DEFAULT NULL,
  `ADDRESS` varchar(40) DEFAULT NULL,
  `CITY` varchar(40) DEFAULT NULL,
  `ST` varchar(2) DEFAULT NULL,
  `ZIPCODE` varchar(5) DEFAULT NULL,
  `PHONE` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`STUDENTID`)
) ENGINE=InnoDB AUTO_INCREMENT=1778 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`STUDENTID`, `PASSWORD`, `ROLE`, `FIRSTNAME`, `LASTNAME`, `ADDRESS`, `CITY`, `ST`, `ZIPCODE`, `PHONE`, `EMAIL`) VALUES
(1111, 'pstudent1', 'Student', 'Jake', 'Long', '1 Ninth St.', 'Albany', 'NY', '12203', '(517)907-0962', 'longj11@strose.edu'),
(1222, 'pstudent2', 'Student', 'Chris', 'Short', '8 Fourth St.', 'Albany', 'NY', '12201', '(518)209-2903', 'shortc12@strose.edu'),
(1333, 'pstudent3', 'Student', 'Maddy', 'Evans', '300 Third Ave.', 'Troy', 'NY', '12202', '(518)903-8721', 'evansm13@strose.edu'),
(1444, 'pstudent4', 'Student', 'Damien', 'Drexel', '400 Fourth St.', 'Altamont', 'NY', '12204', '(518)897-0932', 'drexeld04@strose.edu'),
(1555, 'pstudent5', 'Student', 'Emily', 'Everton', '500 Fifth St.', 'Ravena', 'NY', '12205', '(518)897-0908', 'evertone05@strose.edu'),
(1666, 'pstudent6', 'Student', 'Jonas', 'Longfellow', '900 7th Ave', 'Albany', 'NY', '12203', '(518)093-2498', 'longfellowj90@gmail.com'),
(1777, 'pstudent7', 'Student', 'StudentFN', 'StudentLN', '1 Student St', 'Albany', 'NY', '12203', '(518)333-3333', 'student@student.com');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `fk1` FOREIGN KEY (`FACULTYID`) REFERENCES `faculty` (`FACULTYID`);

--
-- Constraints for table `enrollments`
--
ALTER TABLE `enrollments`
  ADD CONSTRAINT `fk2` FOREIGN KEY (`STUDENTID`) REFERENCES `student` (`STUDENTID`),
  ADD CONSTRAINT `fk3` FOREIGN KEY (`CLASSID`) REFERENCES `classes` (`CLASSID`),
  ADD CONSTRAINT `fk4` FOREIGN KEY (`FACULTYID`) REFERENCES `faculty` (`FACULTYID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
