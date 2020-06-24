-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 24, 2020 at 03:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `boredb`
--
CREATE DATABASE IF NOT EXISTS `boredb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `boredb`;

-- --------------------------------------------------------

--
-- Table structure for table `carti`
--

DROP TABLE IF EXISTS `carti`;
CREATE TABLE `carti` (
  `bookID` int(11) NOT NULL,
  `titlu` varchar(60) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `gen` varchar(20) NOT NULL,
  `descriere` varchar(500) NOT NULL,
  `imagine` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `carti`
--

INSERT INTO `carti` (`bookID`, `titlu`, `autor`, `gen`, `descriere`, `imagine`) VALUES
(1, 'The Moonstone', 'Wilkie Collins', 'Mystery', ' The Moonstone (1868) by Wilkie Collins is a 19th-century British epistolary novel. It is generally considered to be the first detective novel, and it established many of the ground rules of the modern detective novel. \r\nThe story was originally serialised in Charles Dickens\'s magazine All the Year Round. \r\nThe Moonstone and The Woman in White are widely considered to be Collins\'s best novels, and Collins adapted The Moonstone for the stage in 1877, although the play was performed for only two m', 'Moonstone.jpg'),
(2, 'The Silent Patient', 'Alex Michaelides', 'Mystery', 'The Silent Patient was the #1 New York Times Bestseller of Hardcover Fiction in its first week and was the #2 most sold for 2019 on Amazon.com\'s list of Most Sold Books in fiction. \r\nThe Silent Patient also won the Goodreads Choice Award for Best Mystery & Thriller of 2019', 'Thesilentpatient.jpg'),
(3, 'Frankenstein', 'Mary Shelley', 'Science Fiction', 'Frankenstein; or, The Modern Prometheus is an 1818 novel written by English author Mary Shelley (1797–1851) that tells the story of Victor Frankenstein, a young scientist who creates a hideous sapient creature in an unorthodox scientific experiment. \r\nShelley started writing the story when she was 18, and the first edition was published anonymously in London on 1 January 1818, when she was 20. \r\nHer name first appeared in the second edition published in Paris in 1821.', 'Frankenstein.jpg'),
(4, 'Romeo and Juliet', 'William Shakespeare', 'Drama', 'Romeo and Juliet is a tragedy written by William Shakespeare early in his career about two young star-crossed lovers whose deaths ultimately reconcile their feuding families. \r\nIt was among Shakespeare\'s most popular plays during his lifetime and along with Hamlet, is one of his most frequently performed plays. \r\nToday, the title characters are regarded as archetypal young lovers.', 'Romeoandjuliet.jpg'),
(5, 'Around The World In Eighty Days', 'Jules Verne', 'Adventure', 'Around the World in Eighty Days (French: Le tour du monde en quatre-vingts jours) is an adventure novel by the French writer Jules Verne, first published in French in 1872. \r\nIn the story, Phileas Fogg of London and his newly employed French valet Passepartout attempt to circumnavigate the world in 80 days on a £20,000 wager (£2,242,900 in 2019) set by his friends at the Reform Club. \r\nIt is one of Verne\'s most acclaimed works.', 'Aroundtheworld.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `citesc`
--

DROP TABLE IF EXISTS `citesc`;
CREATE TABLE `citesc` (
  `citescID` int(20) NOT NULL,
  `userID` int(11) NOT NULL,
  `bookID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `citesc`
--

INSERT INTO `citesc` (`citescID`, `userID`, `bookID`) VALUES
(4, 1, 3),
(5, 1, 4),
(6, 1, 2),
(7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

DROP TABLE IF EXISTS `utilizatori`;
CREATE TABLE `utilizatori` (
  `userID` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telephone` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`userID`, `username`, `password`, `email`, `telephone`) VALUES
(1, 'bleojua', '11111111', 'adrian.bleoju@yahoo.com', '0788911112'),
(2, 'bleoju', '22222222', 'adriann.bleoju@yahoo.com', '0745629959');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carti`
--
ALTER TABLE `carti`
  ADD PRIMARY KEY (`bookID`),
  ADD UNIQUE KEY `bookID` (`bookID`) USING BTREE;

--
-- Indexes for table `citesc`
--
ALTER TABLE `citesc`
  ADD PRIMARY KEY (`citescID`),
  ADD KEY `ID` (`userID`) USING BTREE,
  ADD KEY `bookID` (`bookID`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `citesc`
--
ALTER TABLE `citesc`
  ADD CONSTRAINT `citesc_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `utilizatori` (`userID`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `citesc_ibfk_2` FOREIGN KEY (`bookID`) REFERENCES `carti` (`bookID`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;
