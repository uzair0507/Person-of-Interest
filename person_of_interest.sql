-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2019 at 09:43 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `person_of_interest`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getcriminal` ()  SELECT crim_id, crim_name FROM criminal$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `getjudgement` (IN `cid` INT)  NO SQL
SELECT judgement_id, judge_id, crim_id, judgement FROM judgement WHERE cid = crim_id$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `cri_id` int(11) NOT NULL,
  `cri_name` varchar(20) NOT NULL,
  `cri_place` varchar(45) NOT NULL,
  `cri_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`cri_id`, `cri_name`, `cri_place`, `cri_date`) VALUES
(303, 'joker', 'gotham', '2019-05-05'),
(376, 'Rape', 'Delhi', '2019-10-04');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `crim_id` int(11) NOT NULL,
  `crim_name` varchar(20) NOT NULL,
  `crim_age` int(3) NOT NULL,
  `crim_addr` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`crim_id`, `crim_name`, `crim_age`, `crim_addr`) VALUES
(5, 'joker', 35, 'gotham'),
(6, 'XXXX', 25, 'Gurgaon');

-- --------------------------------------------------------

--
-- Table structure for table `fir1`
--

CREATE TABLE `fir1` (
  `fir_id` int(11) NOT NULL,
  `vic_id` int(11) NOT NULL,
  `cri_id` int(11) NOT NULL,
  `crim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir1`
--

INSERT INTO `fir1` (`fir_id`, `vic_id`, `cri_id`, `crim_id`) VALUES
(1, 2, 303, 5),
(13, 3, 376, 6);

-- --------------------------------------------------------

--
-- Table structure for table `judgement`
--

CREATE TABLE `judgement` (
  `judgement_id` int(20) NOT NULL,
  `judge_id` int(11) NOT NULL,
  `crim_id` int(11) NOT NULL,
  `judgement` varchar(20) NOT NULL,
  `judge_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `judgement`
--

INSERT INTO `judgement` (`judgement_id`, `judge_id`, `crim_id`, `judgement`, `judge_date`) VALUES
(3, 1666, 6, 'Death By Hanging', '2019-11-14');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `operation` varchar(15) NOT NULL,
  `patch` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `user_id`, `operation`, `patch`) VALUES
(1, 1705, 'Inserted', '2019-12-04 13:45:46'),
(2, 1506, 'Inserted', '2019-12-04 15:14:49'),
(3, 1906, 'Inserted', '2019-12-06 13:35:14'),
(4, 1705, 'Inserted', '2019-12-06 16:53:51'),
(5, 1666, 'Inserted', '2019-12-06 20:04:39'),
(6, 1666, 'Inserted', '2019-12-06 20:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `user_phone` bigint(15) NOT NULL,
  `user_type` varchar(20) NOT NULL,
  `user_passwd` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `user_phone`, `user_type`, `user_passwd`) VALUES
(1506, 'safi', 9900230481, 'Civilian', '2311'),
(1666, 'tasneem', 9448955609, 'Authorized Personnel', '2803'),
(1705, 'uzair', 9036860918, 'Authorized Personnel', '1133'),
(1906, 'manaswini', 9900662117, 'Authorized Personnel', '1122');

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `insertlog` AFTER INSERT ON `user` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.user_id, "Inserted", NOW())
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `updatelogs` AFTER UPDATE ON `user` FOR EACH ROW INSERT INTO logs VALUES(null, NEW.user_id, "Inserted", NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `victim`
--

CREATE TABLE `victim` (
  `vic_id` int(11) NOT NULL,
  `vic_name` varchar(20) NOT NULL,
  `vic_age` int(3) NOT NULL,
  `vic_addr` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `victim`
--

INSERT INTO `victim` (`vic_id`, `vic_name`, `vic_age`, `vic_addr`) VALUES
(1, 'xyz', 45, 'bangalore'),
(2, 'batman', 40, 'gotham'),
(3, 'Nirbhaya', 19, 'Delhi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`cri_id`,`cri_place`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`crim_id`);

--
-- Indexes for table `fir1`
--
ALTER TABLE `fir1`
  ADD PRIMARY KEY (`fir_id`),
  ADD KEY `fir1_ibfk_1` (`crim_id`),
  ADD KEY `fir1_ibfk_2` (`cri_id`),
  ADD KEY `fir1_ibfk_3` (`vic_id`);

--
-- Indexes for table `judgement`
--
ALTER TABLE `judgement`
  ADD PRIMARY KEY (`judgement_id`),
  ADD UNIQUE KEY `judge_id` (`judge_id`),
  ADD KEY `crim_id` (`crim_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_phone` (`user_phone`);

--
-- Indexes for table `victim`
--
ALTER TABLE `victim`
  ADD PRIMARY KEY (`vic_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fir1`
--
ALTER TABLE `fir1`
  ADD CONSTRAINT `fir1_ibfk_1` FOREIGN KEY (`crim_id`) REFERENCES `criminal` (`crim_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fir1_ibfk_2` FOREIGN KEY (`cri_id`) REFERENCES `crime` (`cri_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fir1_ibfk_3` FOREIGN KEY (`vic_id`) REFERENCES `victim` (`vic_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `judgement`
--
ALTER TABLE `judgement`
  ADD CONSTRAINT `judgement_ibfk_2` FOREIGN KEY (`crim_id`) REFERENCES `criminal` (`crim_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `judgement_ibfk_3` FOREIGN KEY (`judge_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
