-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 08:21 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `carti`
--

CREATE TABLE `carti` (
  `ID` int(11) NOT NULL,
  `titlu` varchar(30) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `descriere` varchar(100) NOT NULL,
  `imagine` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carti`
--

INSERT INTO `carti` (`ID`, `titlu`, `autor`, `descriere`, `imagine`) VALUES
(1, 'The Moonstone', 'Wilkie Collins', 'O carte exceptionala. atat.', 'Moonstone.jpg'),
(2, 'The Moonstone2', 'Wilkie Collins', 'descriere2', 'Moonstone.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `ID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`ID`, `username`, `password`, `email`, `telephone`) VALUES
(1, 'bleojua', 'muieeeeeeeepsd  ', 'adrian.bleoju@yahoo.com', '  07456299');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carti`
--
ALTER TABLE `carti`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
