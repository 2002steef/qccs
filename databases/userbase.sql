-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2022 at 09:25 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `userbase`
--

-- --------------------------------------------------------

--
-- Table structure for table `bedrijfmedewerkerlink`
--

CREATE TABLE `bedrijfmedewerkerlink` (
  `bedrijfID` int(20) NOT NULL,
  `userID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `bedrijven`
--

CREATE TABLE `bedrijven` (
  `bedrijfID` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `telefoon` int(15) NOT NULL,
  `straat` varchar(30) NOT NULL,
  `huisNummer` int(5) NOT NULL,
  `huisNummerToevoeging` varchar(4) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `plaats` varchar(30) NOT NULL,
  `website` varchar(100) NOT NULL,
  `profielFoto` varchar(70) NOT NULL,
  `voucherAantal` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `masseuses`
--

CREATE TABLE `masseuses` (
  `masseuseID` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `telefoon` int(15) NOT NULL,
  `straat` varchar(30) NOT NULL,
  `huisNummer` int(5) NOT NULL,
  `huisNummerToevoeging` varchar(4) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `plaats` varchar(30) NOT NULL,
  `website` varchar(100) NOT NULL,
  `profielFoto` varchar(70) NOT NULL,
  `vouchersVerzilverd` int(10) NOT NULL,
  `paragraafje` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medewerkers`
--

CREATE TABLE `medewerkers` (
  `userID` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `voornaam` varchar(20) NOT NULL,
  `tussenvoegsel` varchar(15) NOT NULL,
  `achternaam` varchar(25) NOT NULL,
  `telefoon` int(15) NOT NULL,
  `straat` varchar(30) NOT NULL,
  `huisNummer` int(5) NOT NULL,
  `huisNummerToevoeging` varchar(4) NOT NULL,
  `postcode` varchar(6) NOT NULL,
  `plaats` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medewerkers`
--

INSERT INTO `medewerkers` (`userID`, `userName`, `Password`, `email`, `voornaam`, `tussenvoegsel`, `achternaam`, `telefoon`, `straat`, `huisNummer`, `huisNummerToevoeging`, `postcode`, `plaats`) VALUES
(1, 'Owner', 'OwnerPass', 'owner@gmail.com', 'Owner', 'of', 'Business', 612345678, 'groenstraat', 139, '18', '5021LL', 'Tilburg');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `userID` int(20) NOT NULL,
  `voucher` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bedrijfmedewerkerlink`
--
ALTER TABLE `bedrijfmedewerkerlink`
  ADD PRIMARY KEY (`bedrijfID`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Indexes for table `bedrijven`
--
ALTER TABLE `bedrijven`
  ADD PRIMARY KEY (`bedrijfID`);

--
-- Indexes for table `masseuses`
--
ALTER TABLE `masseuses`
  ADD PRIMARY KEY (`masseuseID`);

--
-- Indexes for table `medewerkers`
--
ALTER TABLE `medewerkers`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bedrijven`
--
ALTER TABLE `bedrijven`
  MODIFY `bedrijfID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `masseuses`
--
ALTER TABLE `masseuses`
  MODIFY `masseuseID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `medewerkers`
--
ALTER TABLE `medewerkers`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bedrijfmedewerkerlink`
--
ALTER TABLE `bedrijfmedewerkerlink`
  ADD CONSTRAINT `bedrijfmedewerkerlink_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `medewerkers` (`userID`),
  ADD CONSTRAINT `bedrijfmedewerkerlink_ibfk_2` FOREIGN KEY (`bedrijfID`) REFERENCES `bedrijven` (`bedrijfID`);

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `medewerkers` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
