-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 14, 2022 at 11:23 AM
-- Server version: 10.3.34-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test_relatiebeheer`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments_business`
--

CREATE TABLE `comments_business` (
  `id` int(11) NOT NULL,
  `subject` varchar(245) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `archived_at` datetime DEFAULT NULL,
  `text` varchar(255) NOT NULL,
  `customer_of` int(11) DEFAULT NULL,
  `keuze` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments_business`
--

INSERT INTO `comments_business` (`id`, `subject`, `created_by`, `created_at`, `archived_at`, `text`, `customer_of`, `keuze`) VALUES
(7, 'Databasedinbgre', 28, '0000-00-00 00:00:00', NULL, 'tssdgfjjjjjjj', 12, NULL),
(8, 'Database', 28, '0000-00-00 00:00:00', NULL, 'ertrytaeryshthgbgxgfhdfffffff', 12, NULL),
(24, 'Database', 28, '2022-02-14 03:02:51', NULL, '   jhfgdsdddsdddddd', 6, NULL),
(52, 'TEST', 140, '2022-02-15 12:52:56', NULL, 'r', 1, NULL),
(62, 'Nieuw Abonnement', 22, '2022-02-16 12:53:49', NULL, ' Jerry aan het testen gelukt', 1, NULL),
(73, 'Database', 28, '2022-02-22 09:10:18', NULL, ' Met de database hebben wel allerij soorten kip afgesproken waardoor je meer kip kan krijgen binnen het bedrijf en waardoor je dus ook koel lijkt\r\n Met de database hebben wel allerij soorten kip afgesproken waardoor je meer kip kan krijgen binnen het bedr', 3, 'Intern'),
(76, 'test', 28, '2022-02-23 03:40:48', NULL, ' eee4', 2, 'Intern'),
(78, 'tester', 28, '2022-02-24 07:08:54', NULL, 'Met de database hebben wel allerij soorten kip afgesproken waardoor je meer kip kan krijgen binnen het bedrijf en waardoor je dus ook koel lijkt Met de database hebben wel allerij soorten kip afgesproken waardoor je meer kip kan krijgen binnen het bedr', 3, 'Extern'),
(79, 'Test', 110, '2022-03-08 02:34:50', NULL, ' Test test dfgfsgdfg', 1, 'Extern');

-- --------------------------------------------------------

--
-- Table structure for table `comments_individual`
--

CREATE TABLE `comments_individual` (
  `id` int(11) NOT NULL,
  `subject` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `archived_at` datetime DEFAULT NULL,
  `text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `customers_business`
--

CREATE TABLE `customers_business` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name_prefix` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` int(11) NOT NULL,
  `housenumberAddition` char(1) DEFAULT NULL,
  `postalcode` char(7) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `business` varchar(255) NOT NULL,
  `customer_of` int(11) NOT NULL,
  `archived_at` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Actief',
  `notes` varchar(600) DEFAULT NULL,
  `notes_date` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_business`
--

INSERT INTO `customers_business` (`id`, `first_name`, `last_name_prefix`, `last_name`, `birthday`, `street`, `housenumber`, `housenumberAddition`, `postalcode`, `phoneNumber`, `email`, `business`, `customer_of`, `archived_at`, `status`, `notes`, `notes_date`, `password`) VALUES
(5993, 'Joshua', '', 'Monn', '0000-00-00', 'Mahlerstraat', 1899, NULL, '5011MJ', '0636433088', 'test@test.nl', 'Test', 1, '2021-11-25 09:09:16', 'Inactief', 'lol', NULL, NULL),
(5994, 'Cathrine', '', 'Bruijn', '0000-00-00', 'Mahlerstraat', 188, NULL, '5017HE', '636433088', 'teusbrom@gmail.com', '', 2, '2021-11-25 09:09:16', 'Actief', NULL, NULL, NULL),
(5995, 'Pieter', '', 'Post', '0000-00-00', 'Testlaan', 123, NULL, '5033EE', '01312356789', 'pieter@gmail.com', '', 1, '2021-11-25 09:09:16', 'Inactief', 'hghg\r\ne\r\nf\r\nee\r\ne\r\ne\r\ne\r\ne', NULL, NULL),
(5996, 'Harold', '', 'Zandene', '0000-00-00', 'Mahlerstraat', 188, NULL, '5011MJ', '636433088', 'hoer@gmail.com', 'KIP BV', 3, '2021-11-25 09:09:16', 'Actief', '', NULL, NULL),
(5997, 'Hendrick', 'Van', 'Lamar', '0000-00-00', 'Mahlerstraat', 188, '2', '5011MJ', '636433088', 'teusbrom@gmail.com', 'Lamar Productions', 1, '2021-11-25 09:09:16', 'Actief', NULL, NULL, NULL),
(5998, 'e', 'van', 'Test', '0000-00-00', 'Mahlerstraat', 133, NULL, '5033EE', '636433078', 'kira.123@gmail.com', '', 2, '2021-11-25 09:09:16', 'Actief', 'test\r\ntest\r\ntest\r\n', NULL, NULL),
(5999, 'Anise', 'van', 'Rana', '0000-00-00', 'Mahlerstraat', 188, NULL, '5011MJ', '636433178', 'email@gmail.com', 'Test', 3, '2021-11-25 09:09:16', 'Inactief', '', NULL, NULL),
(6000, 'Cleo', 'Van', 'Keesters', '0000-00-00', 'Kleostraat', 188, 'G', '5033 O', '645205021', 'CleoKe@gmail.com', 'Investor Group Strategist', 2, NULL, '', NULL, NULL, NULL),
(6001, 'Henriëtta', '', 'Keukens', '0000-00-00', 'Kleostraat', 122, 'A', '5011 M', '615151514', 'marl-an@live.nl', 'Investor Group Strategist', 1, NULL, 'Actief', NULL, NULL, NULL),
(6002, 'Josh', '', 'Hanzen', '0000-00-00', 'Oerlesestraat', 15, '', '5036 a', '134566622', 'JoshHan@gmail.com', 'Joshua BV', 6, NULL, '', NULL, NULL, NULL),
(6003, 'Teusje', '', 'Brom', '0000-00-00', 'Berkenrodelaan', 109, NULL, '5043WH', '0650449531', 'typeeen@gmail.com', 'KipmanBV', 4, NULL, 'Actief', 'hh', NULL, NULL),
(6004, 'Qwertyui', 'wertyui', 'Wertyui', '0000-00-00', 'qwery', 52, NULL, '8525ll', '8520', 'wertyu@wertyu.nl', 'Qwertyu', 6, NULL, 'Actief', NULL, NULL, NULL),
(6005, 'Wertyu', 'qwertyu', 'Wety', '0000-00-00', 'qwertyu', 7896, NULL, '8966pp', 'qwertyu', 'wertyu@qw.nl', 'Qwertyu', 6, NULL, 'Actief', NULL, NULL, NULL),
(6006, 'qwertyu', 'wertyui', 'wertui', '0000-00-00', 'wertyui', 0, NULL, 'ertyuio', 'wertyuio', 'rtuio@sdf.nl', 'ertyuiop', 6, NULL, 'Actief', NULL, NULL, NULL),
(6007, 'qwertyu', 'qwertyu', 'qwertyu', '0000-00-00', 'qwertyu', 852, NULL, 'wertyui', '874512', 'qwertyui@wertyui.nl', 'wertyui', 6, NULL, 'Actief', NULL, NULL, NULL),
(6008, 'qwertyu', 'qwertyu', 'qwertyu', '0000-00-00', 'qwertyu', 852, NULL, 'wertyui', '874512', 'qwertyui@wertyui.nl', 'wertyui', 6, NULL, 'Actief', NULL, NULL, NULL),
(6009, 'James', '', 'Mans', '0000-00-00', 'Mahlerstraat', 190, '', '5011MJ', '0636433088', 'JMEngineering@gmail.com', 'JM Engineering', 0, NULL, 'Actief', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers_individual`
--

CREATE TABLE `customers_individual` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name_prefix` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date NOT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` int(11) NOT NULL,
  `housenumberAddition` char(1) DEFAULT NULL,
  `postalcode` char(7) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `customer_of` int(11) NOT NULL,
  `archived_at` datetime DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Actief',
  `notes` varchar(600) DEFAULT NULL,
  `notes_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_individual`
--

INSERT INTO `customers_individual` (`id`, `first_name`, `last_name_prefix`, `last_name`, `birthday`, `street`, `housenumber`, `housenumberAddition`, `postalcode`, `phoneNumber`, `email`, `customer_of`, `archived_at`, `status`, `notes`, `notes_date`) VALUES
(994, 'Hendricke', '', 'Allerhande', '0000-00-00', 'Mahlerstraat', 188, NULL, '5011MJ', '631433088', 'Allerhande@gmail.com', 2, '2021-11-25 09:09:16', 'Inactief', NULL, NULL),
(995, 'Teus', '', 'Meerden', '0000-00-00', 'Beethovenlaan', 1887, NULL, '5011MJ', '631433098', 'bas@adel.com', 3, '2021-11-25 09:09:16', 'Inactief', '', NULL),
(996, 'Teste', '', 'Chen', '0000-00-00', 'Strauslaan', 1833, NULL, '5012 ba', '06123456781', 'PeterMail@gmail.com', 1, '2021-11-25 09:09:16', 'Actief', 'test21', NULL),
(998, 'Alans', '', 'Kennis', '0000-00-00', 'Beethovenlaan', 188, NULL, '5011EE', '631438098', 'Alans@gmail.com', 1, '2021-11-25 09:09:16', 'Actief', 'TESTe', NULL),
(999, 'Test', 'test', 'Test', '0000-00-00', 'Test', 12, NULL, '5011MJ', '631403058', 'marl-an@live.nl', 3, '2021-11-25 09:09:16', 'Inactief', NULL, NULL),
(1000, 'Jerry', '', 'Bergraaf', '0000-00-00', 'Groenstraat', 139, NULL, '5021LL', '651176273', 'expert@work.nl', 1, NULL, 'Actief', '', NULL),
(1001, 'At', '', 'Bergen', '0000-00-00', 'Testlaan', 139, NULL, '5021TT', '2147483647', 'ad@bergen.nl', 1, NULL, 'Inactief', NULL, NULL),
(1002, 'Leondro', 'Abel', 'Jansen', '0000-00-00', 'Grevelingen', 23, NULL, '5011EE', '2147483647', 'LeoBelJa@gmail.com', 2, NULL, '0', NULL, NULL),
(1003, 'Lenny', '', 'Kokmans', '0000-00-00', 'Lenzztraat', 789, 'g', '5011 K', '645869566', 'Lenny@gmail.com', 2, NULL, '0', NULL, NULL),
(1004, 'Ken', '', 'Kennen', '0000-00-00', 'Testlaan', 0, NULL, '5033EE', '2147483647', 'Kenyken@gmail.com', 2, NULL, '1', NULL, NULL),
(1053, 'Teus', '', 'Brom', '0000-00-00', 'Berkenrodelaan', 109, '', '5043WH', '0650449531', 'teusbrom@gmail.com', 1, NULL, 'Actief', NULL, NULL),
(1054, 'Wertyu', 'qwer', 'Qwertyu', '0000-00-00', 'Groenstraat', 139, '', '5021LL', '031245896', 'qwertyuu@oertyui.nl', 1, NULL, 'Actief', NULL, NULL),
(1055, 'Fff', '', 'F', '0000-00-00', 'Postbus', 2, '', '5485KP', '03454444', 'qwertyu@wert.nl', 1, NULL, 'Actief', NULL, NULL),
(1056, 'qwrty', 'wert', 'ert', '0000-00-00', 'sdfg', 41, NULL, '4151hj', '8520', 'werty@QWERTYU.nl', 2, NULL, 'Actief', NULL, NULL),
(1057, 'qwertyu', 'wertyu', 'wertyu', '0000-00-00', 'wertyu', 852, NULL, '7411kl', '8520', 'wertyui@wertyu.nl', 13, NULL, 'Actief', NULL, NULL),
(1058, 'qwertyui', 'wertyuio', 'wertyuiop', '0000-00-00', 'qwertyui', 78963, NULL, '7485lo', '7418520', 'qwertyuiop@rtyuio.nl', 6, NULL, 'Actief', NULL, NULL),
(1059, 'qwertyui', 'wertyui', 'wertyui', '0000-00-00', 'qwertyu', 852, NULL, '7415kl', '8520', 'wertyuio@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1060, 'qwerty', 'wertyu', 'wertyu', '0000-00-00', 'qwerty', 78963, NULL, '8524jj', '78620', 'wertyui@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1061, 'wdfghjk', 'sdfghjk', 'sdfghjk', '0000-00-00', 'asdfghjk', 0, NULL, 'dfghjkl', 'ghjkl', 'sDFGHjk@sdfghj.nl', 6, NULL, 'Actief', NULL, NULL),
(1062, 'qwertyu', 'wertu', 'wetui', '0000-00-00', 'wertyuio', 0, NULL, 'ertyiop', 'wertyu', 'wertyuio@wertyuio.nl', 6, NULL, 'Actief', NULL, NULL),
(1063, 'qwerty', 'wertyu', 'werty', '0000-00-00', 'qwertyu', 0, NULL, 'weryi', '88520', 'wertyui@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1064, 'qwerty', 'wertyu', 'werty', '0000-00-00', 'qwertyu', 0, NULL, 'weryi', '88520', 'wertyui@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1065, 'wertyu', 'qwerty', 'qwerty', '0000-00-00', 'iuytrewq', 521, NULL, '8451hj', '852063', 'qwertyu@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1066, 'qwert', 'qwert', 'qwrty', '0000-00-00', 'qwerty', 0, NULL, 'qwery', 'qwrt', 'qwery@qwerty.nl', 6, NULL, 'Actief', NULL, NULL),
(1067, 'qwertyu', 'weryu', 'qwrtyui', '0000-00-00', 'qwertyuii', 8520, NULL, 'sdfgh85', '85200852', 'qwetyui@3fjhgf.nl', 6, NULL, 'Actief', NULL, NULL),
(1068, 'qwerty', 'qwertyu', 'qwertyui', '0000-00-00', 'sdfghjkl;', 852, NULL, 'ghjk85', '8520', 'wertyui@wertyu.nl', 6, NULL, 'Actief', NULL, NULL),
(1069, 'qwertyu', 'qwertyu', 'wertyu', '0000-00-00', 'sdfghjk', 8520, NULL, 'fghjk52', '8520', 'wertyui@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1070, 'qwerty', 'wertyui', 'wertyui', '0000-00-00', 'dfghj', 8520, NULL, 'vvcx41', '741', 'wertyui@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1071, 'qwerty', 'werty', 'qwerty', '0000-00-00', 'dfghjk', 852, NULL, 'ghjk85', '8520', 'qwerty@qwert.nl', 6, NULL, 'Actief', NULL, NULL),
(1072, 'qwert', 'qwerty', 'qwertyu', '0000-00-00', 'sdfghjl', 520, NULL, 'hjkl85', '520258', 'qwertyu@wertyui.nl', 6, NULL, 'Actief', NULL, NULL),
(1073, 'Kevin', '', 'Oosborn', '0000-00-00', 'Mahlerstraat', 188, NULL, '5011MJ', '0636433088', 'josh4@hotmail.com', 0, NULL, 'Actief', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `factuur`
--

CREATE TABLE `factuur` (
  `id` int(11) NOT NULL,
  `header` varchar(200) DEFAULT NULL,
  `footer` varchar(200) DEFAULT NULL,
  `member_of` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `factuur`
--

INSERT INTO `factuur` (`id`, `header`, `footer`, `member_of`) VALUES
(0, 'qccs', 'qccs', 1),
(16, 'hffhfhfhfh', 'fhfhfhfhfh', 2),
(17, 'fgdfgfddfg', 'dfgdfgdfgdfgdfgdfg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `organisation`
--

CREATE TABLE `organisation` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` varchar(20) NOT NULL,
  `housenumberAddition` varchar(1) NOT NULL,
  `postalcode` varchar(7) NOT NULL,
  `website` varchar(255) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `kvk_nummer` int(8) NOT NULL,
  `btw_nummer` varchar(12) NOT NULL,
  `iban_nummer` varchar(18) NOT NULL,
  `status` varchar(45) NOT NULL DEFAULT 'Actief',
  `notes` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `organisation`
--

INSERT INTO `organisation` (`id`, `name`, `logo`, `street`, `housenumber`, `housenumberAddition`, `postalcode`, `website`, `phoneNumber`, `email`, `kvk_nummer`, `btw_nummer`, `iban_nummer`, `status`, `notes`) VALUES
(1, 'Teus', NULL, 'Berkenrodelaan', '109', '', '5043WH', '', '0650449531', 'teusbrom@gmail.com', 0, '0', '0', 'Actief', ''),
(2, 'Expert @ work', NULL, 'Huisnummer ontbreekt.', '1391', '', '5011LL', '', '013 580 01 55', 'Expert@work.nl', 0, '2', '0', '', ''),
(3, 'Alberto Heijnen', NULL, 'Wagnerplein', '3', '', '5011 KC', 'AH.NL', '0616364488', 'AH@info.nl', 4254661, '716162', '0', 'Actief', ''),
(6, 'Dayal', NULL, 'Zuidplein', '777', '', '7852lo', '', '8520741', 'Dayal@Layad.com', 82888, '91919259', '0', '', ''),
(7, 'kip', NULL, 'rr', '10', 'A', '5021LE', 'teuskip.nl', '0650449531', 'teusbrom2@gmail.com', 0, '', '', '', ''),
(8, 'nielsco', NULL, 'Nielsstraat', '21', '', '2525NE', '', '0612345678', 'niels@niels.co.uk', 0, '59', '1819', '', ''),
(11, 'qwert.', NULL, 'qwertyuio', '796', '', '7485dg', 'wertyui.nl', '78459621', 'wertyu@sdf.nl', 0, '', '', '', ''),
(12, 'WH Personeelsdiensten B.V.', NULL, 'Mathildastraat ', '65', '', '5056MG', 'www.whpersoneelsdiensten.nl', '0681131235', 'aygun@whpersoneelsdiensten.nl', 0, '', '', '', ''),
(13, 'Koning Toto', NULL, 'Onjuiste postcode.', '233', 'c', '5056MG', 'toto.nl', '0633229988', 'totos@qccs.nl', 0, '0', '0', '', ''),
(14, 'EAW', NULL, 'Onjuiste postcode.', '13918', 'B', '5021LL', 'www.eaw.nl', '0135800186', 'jsboga@gmail.com', 0, '0', '0', 'Actief', ''),
(15, 'Stevenson Inc', NULL, 'Stevenstraat', '22', '2', '5021TE', 'www.stevensoninc.nl', '0612345678', 'stevensoninc@stevensonic.nl', 0, '', '', 'Actief', '');

-- --------------------------------------------------------

--
-- Table structure for table `personnel`
--

CREATE TABLE `personnel` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name_prefix` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) NOT NULL,
  `birthday` date DEFAULT NULL,
  `street` varchar(255) NOT NULL,
  `housenumber` int(11) NOT NULL,
  `housenumberAddition` char(1) DEFAULT NULL,
  `postalcode` varchar(7) NOT NULL,
  `phoneNumber` varchar(11) NOT NULL,
  `member_of` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `archived_at` datetime DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `authentication_level` varchar(20) NOT NULL DEFAULT 'Actief',
  `notes` varchar(600) DEFAULT NULL,
  `notes_date` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personnel`
--

INSERT INTO `personnel` (`id`, `first_name`, `last_name_prefix`, `last_name`, `birthday`, `street`, `housenumber`, `housenumberAddition`, `postalcode`, `phoneNumber`, `member_of`, `user_id`, `archived_at`, `email`, `authentication_level`, `notes`, `notes_date`) VALUES
(1, 'Test', 'van', 'Test', '2001-04-29', 'Test', 123, NULL, '5022EE', '01312345678', 1, 1, '2021-11-29 12:15:49', 'eemail@gmail.com', 'Bedrijfsleider', '', NULL),
(2, 'Dayal', '', 'Manbodh', '0000-00-00', 'Baanlaan', 1734, NULL, '5021LL', '06364330', 1, 2, '2021-11-29 12:15:49', 'kip@gmail.com', 'Bedrijfsleider', NULL, NULL),
(3, 'Teus', '', 'Broms', '0000-00-00', 'Groenstraat', 1393, NULL, '5021LL', '636433087', 2, 3, '2021-11-29 12:24:11', 'teus.brom@ictmbo.nl', 'Werknemer', '', NULL),
(4, 'Senne', '', 'Adams', '0000-00-00', 'Groenstraat', 139, NULL, '5021LL', '636433089', 2, 4, '2021-11-29 12:24:11', 'Senne.adams@ictmbo.nl', 'Bedrijfsleider', 'ee', NULL),
(5, 'Kevin', '', 'Gates', '0000-00-00', 'Beethovenlaan', 12, NULL, '5021aa', '2147483647', 3, NULL, NULL, 'Gates@gmail.com', 'Werknemer', NULL, NULL),
(6, 'Kipper', 'de', 'ManKip', '0000-00-00', 'Chickenstreet', 23, NULL, '4613KF', '616777421', 3, NULL, NULL, 'teus@kip.nl', 'Werknemer', '', NULL),
(27, 'Teus', '', 'Brom', '2001-04-29', 'Boerhaavestraat', 10, NULL, '5017HE', '650449531', 1, NULL, NULL, 'teus.brom@ictmbo.nl', 'Werknemer', NULL, NULL),
(28, 'Josh', '', 'Rielen', '2001-04-29', 'Chickenstreet', 12, NULL, '5011ME', '2147483647', 3, NULL, NULL, 'bas@adel.com', 'Werknemer', NULL, NULL),
(29, 'Josh1', '', 'Riel', '2001-04-29', 'Chickenstreet', 778, NULL, '5011 M', '2147483647', 3, NULL, NULL, 'bas@adellensen.com', 'Werknemer', NULL, NULL),
(32, 'Josh', '', 'Chote', '2001-04-29', 'Beethovenlaan', 12, NULL, '5011MJ', '0636455822', 2, NULL, NULL, 'test@gmail.com', 'Werknemer', NULL, NULL),
(33, 'Teus', 'de', 'Brom', NULL, 'Kip', 10, NULL, '5017HE', '650449531', 1, NULL, NULL, 'teusbrom1@gmail.com', 'Werknemer', '', NULL),
(34, 'Johannes', '', 'Scheel', NULL, 'Schelestraat', 12, NULL, '5033EE', '06123456789', 2, NULL, NULL, 'Markschel@gmail.com', 'Bedrijfsleider', '', NULL),
(35, 'Pieter', '', 'Postman', NULL, 'Boerhaavestraat', 200, NULL, '5056MG', '611225655', 1, NULL, NULL, 'postbus155@qccs.nl', 'Werknemer', NULL, NULL),
(36, 'Joshua', '', 'Monsanto', NULL, 'Mahlerstraat', 22, NULL, '5011MJ', '636433088', 2, NULL, NULL, 'Josh.2904@hotmail.com', 'Werknemer', NULL, NULL),
(37, 'Marlène', '', 'Monsanto', NULL, 'Mahlerstraat', 88, NULL, '5011 M', '636433077', 3, NULL, NULL, 'marl-an@live.nl', 'Werknemer', NULL, NULL),
(38, 'Bassie', '', 'Adel', NULL, 'Testlaan', 0, NULL, '5011ee', '0612345678', 1, NULL, NULL, 'bas@adellen.com', 'Werknemer', NULL, NULL),
(39, 'John', '', 'Chote', NULL, '', 15, NULL, '5011MJ', '616777426', 1, NULL, NULL, 'Josh.2904@hotmail.com', 'Bedrijfsleider', NULL, NULL),
(40, 'Jerry', '', 'Berggraaf', NULL, 'Groenstraat', 139, NULL, '5021 L', '612315614', 1, NULL, NULL, 'Jerryqccs@qccs.nl', 'Bedrijfsleider', NULL, NULL),
(41, 'Niels', '', 'Co', NULL, 'Nieco', 12, NULL, '5021 B', '636433077', 8, NULL, NULL, 'Nielsco@gmail.com', '0', NULL, NULL),
(42, '', NULL, '', NULL, '', 0, NULL, '', '', 0, NULL, '2022-01-04 10:32:01', '', 'Actief', NULL, NULL),
(43, '', NULL, '', NULL, '', 0, NULL, '', '', 1, NULL, '2022-01-04 10:32:01', '', 'Actief', NULL, NULL),
(44, '', NULL, '', NULL, '', 0, NULL, '', '', 0, NULL, '2022-01-04 10:32:59', '', 'Actief', NULL, NULL),
(45, '', NULL, '', NULL, '', 0, NULL, '', '', 1, NULL, '2022-01-04 10:32:59', '', 'Actief', NULL, NULL),
(46, '', NULL, '', NULL, '', 0, NULL, '', '', 0, NULL, '2022-01-04 10:33:08', '', 'Actief', NULL, NULL),
(47, '', NULL, '', NULL, '', 0, NULL, '', '', 1, NULL, '2022-01-04 10:33:08', '', 'Actief', NULL, NULL),
(48, '', NULL, '', NULL, '', 0, NULL, '', '', 0, NULL, '2022-01-04 10:33:16', '', 'Actief', NULL, NULL),
(49, '', NULL, '', NULL, '', 0, NULL, '', '', 1, NULL, '2022-01-04 10:33:16', '', 'Actief', NULL, NULL),
(50, '', NULL, '', NULL, '', 0, NULL, '', '', 0, NULL, '2022-01-04 10:33:22', '', 'Actief', NULL, NULL),
(51, '', NULL, '', NULL, '', 0, NULL, '', '', 1, NULL, '2022-01-04 10:33:22', '', 'Actief', NULL, NULL),
(52, '', NULL, '', NULL, '', 0, NULL, '', '', 0, NULL, '2022-01-04 10:33:28', '', 'Actief', NULL, NULL),
(53, '', NULL, '', NULL, '', 0, NULL, '', '', 1, NULL, '2022-01-04 10:33:28', '', 'Actief', NULL, NULL),
(54, 'Teusjeee', '', 'Brom', NULL, 'Boerhaavestraat', 10, NULL, '5017HE', '650449531', 1, NULL, NULL, 'teusbrom@gmail.com', 'Bedrijfsleider', NULL, NULL),
(55, 'Bassie', '', 'Basster', NULL, 'Chickenstreet', 122, NULL, '5012 LK', '631488522', 1, NULL, NULL, 'spamvak@hotmail.com', 'Bedrijfsleider', NULL, NULL),
(56, 'Teus', 'van', 'Brom', NULL, 'Berkenrodelaan', 109, NULL, '5043WH', '650449531', 1, NULL, NULL, 'teusbromm@gmail.com', 'Bedrijfsleider', NULL, NULL),
(57, 'Justin', '', 'Westerduin', NULL, 'DePloegschaar', 90, NULL, '5056MG', '633229988', 1, NULL, NULL, 'westerduin.jwjob@gmail.com', '0', NULL, NULL),
(58, 'Mitchel', '', 'Qccs', NULL, 'Berkenrodelaan', 109, NULL, '5043WH', '650449531', 1, NULL, NULL, 'webdesign@qccs.nl', '0', NULL, NULL),
(59, 'Teusco', '', 'Asdasdasd', NULL, 'Berkenrodelaan', 109, NULL, '5043WH', '650449531', 4, NULL, NULL, 'asdassadsad@gmail.com', 'Werknemer', '', NULL),
(60, 'Tesdsd', '', 'Werwerwer', NULL, 'Berkenrodelaan', 109, NULL, '5043WH', '650449531', 4, NULL, NULL, 'teusbrom3333@gmail.com', 'Bedrijfsleider', '', NULL),
(61, 'Teus', '', 'Brom', NULL, 'Boerhaavestraat', 40, NULL, '5017HE', '650449531', 4, NULL, NULL, 'teusbr3333eeeeom@gmail.com', 'Werknemer', '', NULL),
(62, 'D', '', 'Brom', NULL, 'Boerhaavestraat', 40, NULL, '5017HE', '650449531', 4, NULL, NULL, 'teusbrowwmeeeee@gmail.com', 'Werknemer', NULL, NULL),
(63, 'Steef', 'Van', 'Stevenson', NULL, 'Groenstraat', 139, NULL, '5021LL', '612345678', 15, NULL, NULL, 'stevensoninc@stevensonic.nl', 'Bedrijfsleider', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `token`
--

CREATE TABLE `token` (
  `idtoken` int(11) NOT NULL,
  `token` varchar(455) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `token`
--

INSERT INTO `token` (`idtoken`, `token`) VALUES
(5, '6311062abc8a114abce1b43eb7a1bab8b8715ff0e35895c06b4df36dfe35e8e039a8820305b3ac7d2e83b7e0c443a63df6bd'),
(6, 'a468783a8e1e575f20f425f09842b06188d8c45c797fbc2fd6690c46e8d8f6fff8b298d1cb5cd38c283b57d98544d5e2f10c'),
(7, '44fc200e334727adef3701b6d68f0de6d8d6b96deb29eec640fb29836888d4c8a584583a54c43a2f4b2212d1712516aee095'),
(8, '2832b8db9463457fcad5501d48d1eaab82e2477a02b7848fa7977d6a7d2095412465ed3518cc51c2848e45df330841201777'),
(9, 'fac8418a971a1e711b9e684f966f5dddb2bf94e4fba4f6b34a5d8de7331635513623903b7e5552b0252b378da0eb082a3394'),
(10, '1f34dbb0481a0ff6f3940238ff1c81ba0e83c7d7d02935f868a8d672e12a8cf4980e738ce5c65bc5707c35e7067dfc3ad8c3'),
(11, '3cae31e665ac376e781249279672b77b55e01fd77740c14fcdd5543c1a7e4b5562823ef3cf3e15b37e075bad0f6ff2ea9282'),
(12, '1978783a9bab46d6b5424bf82c87b6375f6e62c0f4d730327fd320dce8cdf8304cc13e90874913587981d332478f1a362a34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `reset_token` varchar(255) DEFAULT NULL,
  `reset_token_expirationdate` datetime DEFAULT NULL,
  `googlecode` varchar(255) NOT NULL,
  `authentication_level` varchar(20) NOT NULL,
  `archived_at` datetime DEFAULT NULL,
  `image_url` varchar(255) NOT NULL DEFAULT 'standaard.png',
  `member_of` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `password`, `created_at`, `reset_token`, `reset_token_expirationdate`, `googlecode`, `authentication_level`, `archived_at`, `image_url`, `member_of`) VALUES
(1, 'Dayal', 'Dayal', 'Dayal@gmail.com', 'Dayal', '2021-11-25 10:03:22', '', '2021-11-25 10:03:22', '', 'Admin', '2021-11-25 10:03:22', 'IMG-61b8a4e0af0ae1.36657951.jpg', 0),
(5, 'Senne', 'Senne', 'Senne.adams@ictmbo.nl', 'Senne', '2021-11-29 12:15:11', '', '2021-11-29 12:15:11', '', 'Admin', '2021-11-29 12:15:11', '', 0),
(22, 'Jerry', 'Jerry', 'jerryadmin@qccs.nl', 'jerry', '2021-12-01 15:34:31', '', '2021-12-01 15:34:31', '', 'Admin', '2021-12-01 15:34:31', 'IMG-61c2e6910e63f2.98914310.png', 0),
(31, 'Marco Ketelaars', 'Marco Ketelaars', 'marco.ketelaars94@gmail.com', '', '0000-00-00 00:00:00', NULL, NULL, '', 'Admin', NULL, '', 0),
(58, 'JerryQCCS', 'Jerry', 'JerryQCCS@gmail.com', 'jerry', '2021-12-20 15:15:36', NULL, '2021-12-20 15:15:36', '', 'Werknemer', '2021-12-20 15:15:36', '', 1),
(68, 'Dayal2', 'Dayal2', 'kip@gmail.com', '', '0000-00-00 00:00:00', '54244a275d58ff7541c7ef0adbc61b974ba4e9680b28eb686e0eb7f55902a8704b7536769b2f69e70608f3dda50d1c3e3e1f', NULL, '', '', NULL, '', 0),
(102, 'Pieter', 'Pieter', 'postbus155@qccs.nl', '', '0000-00-00 00:00:00', 'ad7e38820716fc0463ddcdefd44af50cb1109aec0c6785091678f43efcdbb14685e66525f5f9d6c32da476b4edb5c49b1c8c', NULL, '', '', NULL, '', 0),
(105, 'Jerry', 'Jerry', 'jerryleider@qccs.nl', 'jerry', '0000-00-00 00:00:00', '', NULL, '', 'Bedrijfsleider', NULL, 'IMG-6216084c9d46c2.76011505.png', 1),
(110, 'Josh', 'Joshua', 'joshuastageqccs@gmail.com', 'Joshua', '0000-00-00 00:00:00', '6f130c1149398173b3a7f75781905c8c47f29733be6ef37bf01ecefd7121b09958d59bc6da1048a3abc83817db2bce0ff2a2', NULL, '', '', NULL, 'IMG-61e7fac94bbd88.19732307.png', 0),
(111, 'Jerry', 'Jerry', 'jerrywerknemer@qccs.nl', 'jerry', '0000-00-00 00:00:00', NULL, NULL, '', 'Werknemer', NULL, '', 1),
(114, 'Test', 'Test', 'email@gmail.com', '', '0000-00-00 00:00:00', '78d64a766eb7f69fab3495b329aced721fb57416c8f94aff492c82622f2327b06b2edac81b41318699412003f46a1065098b', NULL, '', '', NULL, '', 0),
(115, 'Teus', 'Teus', 'teusbrom1@gmail.com', '', '0000-00-00 00:00:00', '9957d519ffd9676768e86cf6b904adc8bf98d58d779e51471d6121b3353d8b874411b6e2b625a3636dcd1c33b4ed50d614fc', NULL, '', '', NULL, '', 0),
(120, 'Teus', 'Teus', 'teus.brom@ictmbo.nl', 'Kipman12345!', '0000-00-00 00:00:00', '', NULL, '', '', NULL, '', 0),
(133, 'Bassie', 'Bassie', 'bas@adellen.com', '', '0000-00-00 00:00:00', 'd59bf54f9f88c183157465538ea9564fc39a2a74b501c7c8b600120ff7f8c3246fd37146a51bbf66abd50f5f08ed9953b672', NULL, '', '', NULL, '', 0),
(136, 'Justin', 'Justin', 'westerduin.jwjob@gmail.com', 'Test1(', '0000-00-00 00:00:00', '', NULL, '', '', NULL, 'standaard.png', 0),
(138, 'Johannes', 'Johannes', 'Markschel@gmail.com', '', '0000-00-00 00:00:00', 'c36c9bfe956034c56850f07a583fffbb4758cfe005791c345289491b05815f31b333615a92febe8db0e0a16a5079c5507fc4', NULL, '', '', NULL, 'standaard.png', 0),
(139, 'Bassie', 'Bassie', 'spamvak@hotmail.com', 'Joshua', '0000-00-00 00:00:00', '', NULL, '', '', NULL, 'standaard.png', 0),
(140, 'Mitchell', 'Mitchell', 'webdesign@qccs.nl', 'Welkom#123', '0000-00-00 00:00:00', '', NULL, '', 'Admin', NULL, 'IMG-620ba2afd76004.75339970.jpg', 0),
(1053, 'Teus', 'Teus', 'teusbrom@gmail.com', '', '0000-00-00 00:00:00', '203b1445ea5c1560146f951a50fbb985a07cb3f54fbd83a20458ba0554cce015e399b92d605514ccebe2a8648d83d7a1feac', NULL, '', 'user', NULL, 'standaard.png', 1),
(1054, 'Wertyu', 'Wertyu', 'qwertyuu@oertyui.nl', '', '0000-00-00 00:00:00', '9fb319981c91331bd15f10502fe9feff777285452142998c0e88700938338278ddf7d2fbc7e17ef9500999ad7285f26ba454', NULL, '', 'user', NULL, 'standaard.png', 1),
(1055, 'Fff', 'Fff', 'qwertyu@wert.nl', '', '0000-00-00 00:00:00', 'db101acb57c4139f097f2283287e75399b892be61b6aa9b0efa80299739a7d8cb2b3cc40204fee50c851a953a96267c926c7', NULL, '', 'user', NULL, 'standaard.png', 1),
(1056, 'Steef', 'Steef', 'stevensoninc@stevensonic.nl', '', '0000-00-00 00:00:00', '4ac10afce43eea55f51c1a78d32c1ac5dac24e3a57cfa87130280c25cafc65e3ec42797d817282328fa4587205c74e678fce', NULL, '', '', NULL, 'standaard.png', 0),
(1073, 'Kevin', 'Kevin', 'josh4@hotmail.com', '', '0000-00-00 00:00:00', '4bf4e6aea84a2e9eb79ce914bfb0a44180260e57afebabdfad5265b0d0415d8511dd1a74e8f74b257ee5a7677eabaab1cf90', NULL, '', 'user', NULL, 'standaard.png', 0),
(1074, 'Josh', 'Josh', 'joshua11jaar@gmail.com', '', '0000-00-00 00:00:00', NULL, NULL, '', '', NULL, 'standaard.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments_business`
--
ALTER TABLE `comments_business`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `comments_individual`
--
ALTER TABLE `comments_individual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `customers_business`
--
ALTER TABLE `customers_business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_individual`
--
ALTER TABLE `customers_individual`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factuur`
--
ALTER TABLE `factuur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organisation`
--
ALTER TABLE `organisation`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `personnel`
--
ALTER TABLE `personnel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `token`
--
ALTER TABLE `token`
  ADD PRIMARY KEY (`idtoken`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments_business`
--
ALTER TABLE `comments_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `comments_individual`
--
ALTER TABLE `comments_individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers_business`
--
ALTER TABLE `customers_business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6010;

--
-- AUTO_INCREMENT for table `customers_individual`
--
ALTER TABLE `customers_individual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1074;

--
-- AUTO_INCREMENT for table `factuur`
--
ALTER TABLE `factuur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `organisation`
--
ALTER TABLE `organisation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `personnel`
--
ALTER TABLE `personnel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `token`
--
ALTER TABLE `token`
  MODIFY `idtoken` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1075;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments_individual`
--
ALTER TABLE `comments_individual`
  ADD CONSTRAINT `comments_individual_ibfk_1` FOREIGN KEY (`subject`) REFERENCES `customers_individual` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
