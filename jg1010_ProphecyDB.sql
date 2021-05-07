-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2021 at 04:15 PM
-- Server version: 5.7.34
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jg1010_ProphecyDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Login_Table`
--

CREATE TABLE `Login_Table` (
  `UserID` int(10) NOT NULL,
  `Username` varchar(64) NOT NULL,
  `Password` varchar(64) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Login_Table`
--

INSERT INTO `Login_Table` (`UserID`, `Username`, `Password`) VALUES
(31, 'jg1010', '$2y$10$9dWB/ZwaeExLkO25O67O4ehp5PijY//VQw1NMcnFh8q.BCnNm6RKS'),
(32, 'paul', '$2y$10$I6Y9Cow/I3re6fuFI/4czeNL4YN9ugNvAIRlh5p18A8miP4a8oZ7K'),
(33, '', '$2y$10$uwXdLrvg6NDEvJ0hMuObEOgTtOrG73IMdEgwyBEGreydeR3qdP0T2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Login_Table`
--
ALTER TABLE `Login_Table`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Login_Table`
--
ALTER TABLE `Login_Table`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
