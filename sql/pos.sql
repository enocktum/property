-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2022 at 01:34 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyerbids`
--

CREATE TABLE `buyerbids` (
  `incre` int(11) NOT NULL,
  `propertyincre` int(11) NOT NULL,
  `buyerincre` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buyerbids`
--

INSERT INTO `buyerbids` (`incre`, `propertyincre`, `buyerincre`, `status`) VALUES
(1, 1, 2, 0),
(2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id`, `name`) VALUES
(1, 'Mombasa'),
(2, 'Kwale'),
(3, 'Kilifi'),
(4, 'Tana River'),
(5, 'Lamu'),
(6, 'Taita-Taveta'),
(7, 'Garissa'),
(8, 'Wajir'),
(9, 'Mandera'),
(10, 'Marsabit'),
(11, 'Isiolo'),
(12, 'Meru'),
(13, 'Tharaka-Nithi'),
(14, 'Embu'),
(15, 'Kitui'),
(16, 'Machakos'),
(17, 'Makueni'),
(18, 'Nyandarua'),
(19, 'Nyeri'),
(20, 'Kirinyaga'),
(21, 'Murang\'a'),
(22, 'Kiambu'),
(23, 'Turkana'),
(24, 'West Pokot'),
(25, 'Samburu'),
(26, 'Trans-Nzoia'),
(27, 'Uasin Gishu'),
(28, 'Elgeyo-Marakwet'),
(29, 'Nandi'),
(30, 'Baringo'),
(31, 'Laikipia'),
(32, 'Nakuru'),
(33, 'Narok'),
(34, 'Kajiado'),
(35, 'Kericho'),
(36, 'Bomet'),
(37, 'Kakamega'),
(38, '	Vihiga'),
(39, 'Bungoma'),
(40, 'Busia'),
(41, 'Siaya'),
(42, 'Kisumu'),
(43, 'Homa Bay'),
(44, 'Migori'),
(45, 'Kisii'),
(46, 'Nyamira'),
(47, 'Nairobi');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `incre` int(11) NOT NULL,
  `system_users_incre` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `landsize` varchar(100) NOT NULL,
  `constructionyear` varchar(5) NOT NULL,
  `numberofrooms` varchar(10) NOT NULL,
  `parkingspace` varchar(10) NOT NULL,
  `description` text NOT NULL,
  `subcountyid` int(11) NOT NULL,
  `estate` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `sitevisit` varchar(25) NOT NULL,
  `servicefee` int(11) NOT NULL,
  `need_tips` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `sponsored` tinyint(1) NOT NULL,
  `image` varchar(200) NOT NULL,
  `map_link` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`incre`, `system_users_incre`, `name`, `landsize`, `constructionyear`, `numberofrooms`, `parkingspace`, `description`, `subcountyid`, `estate`, `price`, `sitevisit`, `servicefee`, `need_tips`, `approved`, `sponsored`, `image`, `map_link`) VALUES
(1, 1, 'Blue Castle', '1', '2015', '20', '10', 'Spacious and big rooms with a master bedroom', 6, 'tapas sielo', 3000000, '2022-09-17T10:00', 5000, 1, 1, 0, 'uploads/1/tapas sielo/2022_09_12_09_28_29/firstimage.jpg', ''),
(2, 1, 'Fantasy Deluxxe', '1/8', '2015', '20', '13', 'Property with an ample parking lot', 321, 'Uthiru', 3400000, '2022-10-01T10:30', 5000, 1, 1, 0, 'uploads/1/Uthiru/2022_09_12_09_30_12/firstimage.jpg', ''),
(3, 1, 'Poa Place Resort', '10', '2006', '30', '10', 'There is a museum in the property for added beauty', 316, 'kibera', 4300000, '2022-09-20T10:00', 5000, 1, 1, 0, 'uploads/1/kibera/2022_09_12_09_34_04/firstimage.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_image`
--

CREATE TABLE `property_image` (
  `incre` int(11) NOT NULL,
  `system_users_incre` int(11) NOT NULL,
  `property_incre` int(11) NOT NULL,
  `imageone` varchar(200) NOT NULL,
  `imagetwo` varchar(200) NOT NULL,
  `imagethree` varchar(200) NOT NULL,
  `imagefour` varchar(200) NOT NULL,
  `imagefive` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `site_details`
--

CREATE TABLE `site_details` (
  `incre` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `vision` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_details`
--

INSERT INTO `site_details` (`incre`, `name`, `vision`) VALUES
(1, 'RealtBox', 'The leading property management system around');

-- --------------------------------------------------------

--
-- Table structure for table `sub_county`
--

CREATE TABLE `sub_county` (
  `id` int(11) NOT NULL,
  `countyid` int(11) NOT NULL,
  `countyname` varchar(30) DEFAULT NULL,
  `subcounty` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_county`
--

INSERT INTO `sub_county` (`id`, `countyid`, `countyname`, `subcounty`) VALUES
(1, 1, 'Mombasa ', 'CHANGAMWE \r'),
(2, 1, 'Mombasa ', 'JOMVU \r'),
(3, 1, 'Mombasa ', 'KISAUNI \r'),
(4, 1, 'Mombasa ', 'LIKONI \r'),
(5, 1, 'Mombasa ', 'MVITA (MOMBASA) \r'),
(6, 1, 'Mombasa ', 'NYALI \r'),
(7, 2, 'Kwale ', 'KINANGO \r'),
(8, 2, 'Kwale ', 'KWALE \r'),
(9, 2, 'Kwale ', 'LUNGA LUNGA \r'),
(10, 2, 'Kwale ', 'MSAMBWENI \r'),
(11, 3, 'Kilifi ', 'BAHARI (KILIFI) \r'),
(12, 3, 'Kilifi ', 'GANZE \r'),
(13, 3, 'Kilifi ', 'KALOLENI \r'),
(14, 3, 'Kilifi ', 'KILIFI SOUTH \r'),
(15, 3, 'Kilifi ', 'MAGARINI \r'),
(16, 3, 'Kilifi ', 'MALINDI \r'),
(17, 3, 'Kilifi ', 'RABAI \r'),
(18, 4, 'Tana River ', 'BURA (TANA NORTH) \r'),
(19, 4, 'Tana River ', 'TANA DELTA \r'),
(20, 4, 'Tana River ', 'TANA RIVER \r'),
(21, 5, 'Lamu ', 'LAMU EAST \r'),
(22, 5, 'Lamu ', 'LAMU WEST \r'),
(23, 6, 'Taita Taveta ', 'MWATATE \r'),
(24, 6, 'Taita Taveta ', 'TAVETA \r'),
(25, 6, 'Taita Taveta ', 'VOI \r'),
(26, 6, 'Taita Taveta ', 'WUNDANYI (TAITA) \r'),
(27, 7, 'Garissa ', 'BALAMBALA \r'),
(28, 7, 'Garissa ', 'DADAAB \r'),
(29, 7, 'Garissa ', 'FAFI \r'),
(30, 7, 'Garissa ', 'GARISSA \r'),
(31, 7, 'Garissa ', 'HULUGHO \r'),
(32, 7, 'Garissa ', 'IJARA \r'),
(33, 7, 'Garissa ', 'LAGDERA \r'),
(34, 8, 'Wajir ', 'BUNA \r'),
(35, 8, 'Wajir ', 'ELDAS \r'),
(36, 8, 'Wajir ', 'HABASWEIN \r'),
(37, 8, 'Wajir ', 'TARBAJ \r'),
(38, 8, 'Wajir ', 'WAJIR EAST \r'),
(39, 8, 'Wajir ', 'WAJIR NORTH \r'),
(40, 8, 'Wajir ', 'WAJIR SOUTH \r'),
(41, 8, 'Wajir ', 'WAJIR WEST \r'),
(42, 9, 'Mandera ', 'BANISA \r'),
(43, 9, 'Mandera ', 'LAFEY \r'),
(44, 9, 'Mandera ', 'MANDERA CENTRAL \r'),
(45, 9, 'Mandera ', 'MANDERA EAST \r'),
(46, 9, 'Mandera ', 'MANDERA NORTH \r'),
(47, 9, 'Mandera ', 'MANDERA WEST \r'),
(48, 10, 'Marsabit ', 'CHALBI \r'),
(49, 10, 'Marsabit ', 'HORR NORTH \r'),
(50, 10, 'Marsabit ', 'LOIYANGALANI \r'),
(51, 10, 'Marsabit ', 'MARSABIT \r'),
(52, 10, 'Marsabit ', 'MARSABIT SOUTH (LAISAMIS) \r'),
(53, 10, 'Marsabit ', 'MOYALE \r'),
(54, 10, 'Marsabit ', 'SOLOLO \r'),
(55, 11, 'Isiolo ', 'GARBATULA \r'),
(56, 11, 'Isiolo ', 'ISIOLO \r'),
(57, 11, 'Isiolo ', 'MERTI \r'),
(58, 12, 'Meru ', 'BUURI \r'),
(59, 12, 'Meru ', 'IGEMBE CENTRAL \r'),
(60, 12, 'Meru ', 'IGEMBE NORTH \r'),
(61, 12, 'Meru ', 'IGEMBE SOUTH \r'),
(62, 12, 'Meru ', 'IMENTI NORTH \r'),
(63, 12, 'Meru ', 'IMENTI SOUTH \r'),
(64, 12, 'Meru ', 'MERU CENTRAL \r'),
(65, 12, 'Meru ', 'TIGANIA CENTRAL \r'),
(66, 12, 'Meru ', 'TIGANIA EAST \r'),
(67, 12, 'Meru ', 'TIGANIA WEST \r'),
(68, 13, 'Tharaka-Nithi ', 'MAARA \r'),
(69, 13, 'Tharaka-Nithi ', 'MERU SOUTH \r'),
(70, 13, 'Tharaka-Nithi ', 'THARAKA NORTH \r'),
(71, 13, 'Tharaka-Nithi ', 'THARAKA SOUTH \r'),
(72, 14, 'Embu ', 'EMBU EAST \r'),
(73, 14, 'Embu ', 'EMBU NORTH \r'),
(74, 14, 'Embu ', 'EMBU WEST \r'),
(75, 14, 'Embu ', 'MBEERE NORTH \r'),
(76, 14, 'Embu ', 'MBEERE SOUTH \r'),
(77, 15, 'Kitui ', 'IKUTHA \r'),
(78, 15, 'Kitui ', 'KATULANI \r'),
(79, 15, 'Kitui ', 'KISASI \r'),
(80, 15, 'Kitui ', 'KITUI CENTRAL \r'),
(81, 15, 'Kitui ', 'KITUI WEST \r'),
(82, 15, 'Kitui ', 'KYUSO \r'),
(83, 15, 'Kitui ', 'LOWER YATTA \r'),
(84, 15, 'Kitui ', 'MATINYANI \r'),
(85, 15, 'Kitui ', 'MUMONI \r'),
(86, 15, 'Kitui ', 'MUTITO \r'),
(87, 15, 'Kitui ', 'MUTOMO \r'),
(88, 15, 'Kitui ', 'MWINGI CENTRAL \r'),
(89, 15, 'Kitui ', 'MWINGI EAST \r'),
(90, 15, 'Kitui ', 'MWINGI WEST /MIGWANI \r'),
(91, 15, 'Kitui ', 'NZAMBANI \r'),
(92, 15, 'Kitui ', 'TSEIKURU \r'),
(93, 16, 'Machakos ', 'ATHI RIVER \r'),
(94, 16, 'Machakos ', 'KANGUNDO \r'),
(95, 16, 'Machakos ', 'KATHIANI \r'),
(96, 16, 'Machakos ', 'MACHAKOS \r'),
(97, 16, 'Machakos ', 'MASINGA \r'),
(98, 16, 'Machakos ', 'MATUNGULU \r'),
(99, 16, 'Machakos ', 'MWALA \r'),
(100, 16, 'Machakos ', 'YATTA \r'),
(101, 17, 'Makueni ', 'KATHONZWENI \r'),
(102, 17, 'Makueni ', 'KIBWEZI \r'),
(103, 17, 'Makueni ', 'KILUNGU \r'),
(104, 17, 'Makueni ', 'MAKINDU \r'),
(105, 17, 'Makueni ', 'MAKUENI \r'),
(106, 17, 'Makueni ', 'MBOONI EAST \r'),
(107, 17, 'Makueni ', 'MBOONI WEST \r'),
(108, 17, 'Makueni ', 'MUKAA \r'),
(109, 17, 'Makueni ', 'NZAUI \r'),
(110, 18, 'Nyandarua ', 'KINANGOP \r'),
(111, 18, 'Nyandarua ', 'KIPIPIRI \r'),
(112, 18, 'Nyandarua ', 'MIRANGINE \r'),
(113, 18, 'Nyandarua ', 'NYANDARUA CENTRAL \r'),
(114, 18, 'Nyandarua ', 'NYANDARUA NORTH \r'),
(115, 18, 'Nyandarua ', 'NYANDARUA SOUTH \r'),
(116, 18, 'Nyandarua ', 'NYANDARUA WEST \r'),
(117, 19, 'Nyeri ', 'KIENI EAST \r'),
(118, 19, 'Nyeri ', 'KIENI WEST \r'),
(119, 19, 'Nyeri ', 'MATHIRA EAST \r'),
(120, 19, 'Nyeri ', 'MATHIRA WEST \r'),
(121, 19, 'Nyeri ', 'MUKURWE-INI \r'),
(122, 19, 'Nyeri ', 'NYERI CENTRAL \r'),
(123, 19, 'Nyeri ', 'NYERI SOUTH \r'),
(124, 19, 'Nyeri ', 'TETU \r'),
(125, 20, 'Kirinyaga ', 'KIRINYAGA CENTRAL \r'),
(126, 20, 'Kirinyaga ', 'KIRINYAGA EAST \r'),
(127, 20, 'Kirinyaga ', 'KIRINYAGA WEST \r'),
(128, 20, 'Kirinyaga ', 'MWEA EAST \r'),
(129, 20, 'Kirinyaga ', 'MWEA WEST \r'),
(130, 21, 'Murang\'a ', 'GATANGA \r'),
(131, 21, 'Murang\'a ', 'KAHURO \r'),
(132, 21, 'Murang\'a ', 'KANDARA \r'),
(133, 21, 'Murang\'a ', 'KANGEMA \r'),
(134, 21, 'Murang\'a ', 'KIGUMO \r'),
(135, 21, 'Murang\'a ', 'MATHIOYA \r'),
(136, 21, 'Murang\'a ', 'MURANG\'A EAST \r'),
(137, 21, 'Murang\'a ', 'MURANG\'A SOUTH \r'),
(138, 22, 'Kiambu ', 'GATUNDU NORTH \r'),
(139, 22, 'Kiambu ', 'GATUNDU SOUTH \r'),
(140, 22, 'Kiambu ', 'GITHUNGURI \r'),
(141, 22, 'Kiambu ', 'JUJA \r'),
(142, 22, 'Kiambu ', 'KABETE \r'),
(143, 22, 'Kiambu ', 'KIAMBAA \r'),
(144, 22, 'Kiambu ', 'KIAMBU \r'),
(145, 22, 'Kiambu ', 'KIKUYU \r'),
(146, 22, 'Kiambu ', 'LARI \r'),
(147, 22, 'Kiambu ', 'LIMURU \r'),
(148, 22, 'Kiambu ', 'RUIRU \r'),
(149, 22, 'Kiambu ', 'THIKA EAST \r'),
(150, 22, 'Kiambu ', 'THIKA WEST \r'),
(151, 23, 'Turkana ', 'KIBISH \r'),
(152, 23, 'Turkana ', 'LOIMA \r'),
(153, 23, 'Turkana ', 'TURKANA CENTRAL \r'),
(154, 23, 'Turkana ', 'TURKANA EAST \r'),
(155, 23, 'Turkana ', 'TURKANA NORTH \r'),
(156, 23, 'Turkana ', 'TURKANA SOUTH \r'),
(157, 23, 'Turkana ', 'TURKANA WEST \r'),
(158, 24, 'West Pokot ', 'KIPKOMO \r'),
(159, 24, 'West Pokot ', 'POKOT CENTRAL \r'),
(160, 24, 'West Pokot ', 'POKOT NORTH \r'),
(161, 24, 'West Pokot ', 'POKOT SOUTH \r'),
(162, 24, 'West Pokot ', 'WEST POKOT \r'),
(163, 25, 'Samburu ', 'SAMBURU CENTRAL \r'),
(164, 25, 'Samburu ', 'SAMBURU EAST \r'),
(165, 25, 'Samburu ', 'SAMBURU NORTH \r'),
(166, 26, 'Trans Nzoia ', 'ENDEBES \r'),
(167, 26, 'Trans Nzoia ', 'KIMININI \r'),
(168, 26, 'Trans Nzoia ', 'KWANZA \r'),
(169, 26, 'Trans Nzoia ', 'TRANS NZOIA EAST \r'),
(170, 26, 'Trans Nzoia ', 'TRANS NZOIA WEST \r'),
(171, 27, 'Uasin Gishu ', 'ELDORET EAST \r'),
(172, 27, 'Uasin Gishu ', 'ELDORET WEST \r'),
(173, 27, 'Uasin Gishu ', 'KESSES \r'),
(174, 27, 'Uasin Gishu ', 'MOIBEN \r'),
(175, 27, 'Uasin Gishu ', 'SOY \r'),
(176, 27, 'Uasin Gishu ', 'WARENG \r'),
(177, 28, 'Elgeyo Marakwet ', 'KEIYO \r'),
(178, 28, 'Elgeyo Marakwet ', 'KEIYO SOUTH \r'),
(179, 28, 'Elgeyo Marakwet ', 'MARAKWET EAST \r'),
(180, 28, 'Elgeyo Marakwet ', 'MARAKWET WEST \r'),
(181, 29, 'Nandi ', 'CHESUMEI \r'),
(182, 29, 'Nandi ', 'NANDI CENTRAL \r'),
(183, 29, 'Nandi ', 'NANDI EAST \r'),
(184, 29, 'Nandi ', 'NANDI NORTH \r'),
(185, 29, 'Nandi ', 'NANDI SOUTH \r'),
(186, 29, 'Nandi ', 'TINDERET \r'),
(187, 30, 'Baringo ', 'BARINGO CENTRAL \r'),
(188, 30, 'Baringo ', 'BARINGO NORTH \r'),
(189, 30, 'Baringo ', 'EAST POKOT \r'),
(190, 30, 'Baringo ', 'KOIBATEK \r'),
(191, 30, 'Baringo ', 'MARIGAT \r'),
(192, 30, 'Baringo ', 'MOGOTIO \r'),
(193, 31, 'Laikipia ', 'LAIKIPIA CENTRAL \r'),
(194, 31, 'Laikipia ', 'LAIKIPIA EAST \r'),
(195, 31, 'Laikipia ', 'LAIKIPIA NORTH \r'),
(196, 31, 'Laikipia ', 'LAIKIPIA WEST \r'),
(197, 31, 'Laikipia ', 'NYAHURURU \r'),
(198, 32, 'Nakuru ', 'GILGIL \r'),
(199, 32, 'Nakuru ', 'KURESOI \r'),
(200, 32, 'Nakuru ', 'KURESOI NORTH \r'),
(201, 32, 'Nakuru ', 'MOLO \r'),
(202, 32, 'Nakuru ', 'NAIVASHA \r'),
(203, 32, 'Nakuru ', 'NAKURU EAST \r'),
(204, 32, 'Nakuru ', 'NAKURU NORTH \r'),
(205, 32, 'Nakuru ', 'NAKURU WEST \r'),
(206, 32, 'Nakuru ', 'NJORO \r'),
(207, 32, 'Nakuru ', 'RONGAI \r'),
(208, 32, 'Nakuru ', 'SUBUKIA \r'),
(209, 33, 'Narok ', 'NAROK EAST \r'),
(210, 33, 'Narok ', 'NAROK NORTH \r'),
(211, 33, 'Narok ', 'NAROK SOUTH \r'),
(212, 33, 'Narok ', 'NAROK WEST \r'),
(213, 33, 'Narok ', 'TRANS MARA EAST \r'),
(214, 33, 'Narok ', 'TRANS MARA WEST \r'),
(215, 34, 'Kajiado ', 'ISINYA \r'),
(216, 34, 'Kajiado ', 'KAJIADO CENTRAL \r'),
(217, 34, 'Kajiado ', 'KAJIADO NORTH \r'),
(218, 34, 'Kajiado ', 'KAJIADO WEST \r'),
(219, 34, 'Kajiado ', 'LOITOKITOK \r'),
(220, 34, 'Kajiado ', 'MASHUURU \r'),
(221, 35, 'Kericho ', 'BELGUT \r'),
(222, 35, 'Kericho ', 'BURETI \r'),
(223, 35, 'Kericho ', 'KERICHO \r'),
(224, 35, 'Kericho ', 'KIPKELION \r'),
(225, 35, 'Kericho ', 'LONDIANI \r'),
(226, 35, 'Kericho ', 'SIGOWEI / SOIN \r'),
(227, 36, 'Bomet ', 'BOMET \r'),
(228, 36, 'Bomet ', 'BOMET EAST \r'),
(229, 36, 'Bomet ', 'CHEPALUNGU \r'),
(230, 36, 'Bomet ', 'KONOIN \r'),
(231, 36, 'Bomet ', 'SOTIK \r'),
(232, 37, 'Kakamega ', 'BUTERE \r'),
(233, 37, 'Kakamega ', 'KAKAMEGA CENTRAL \r'),
(234, 37, 'Kakamega ', 'KAKAMEGA EAST \r'),
(235, 37, 'Kakamega ', 'KAKAMEGA NORTH \r'),
(236, 37, 'Kakamega ', 'KAKAMEGA SOUTH \r'),
(237, 37, 'Kakamega ', 'KHWISERO \r'),
(238, 37, 'Kakamega ', 'LIKUYANI \r'),
(239, 37, 'Kakamega ', 'LUGARI \r'),
(240, 37, 'Kakamega ', 'MATETE \r'),
(241, 37, 'Kakamega ', 'MATUNGU \r'),
(242, 37, 'Kakamega ', 'MUMIAS \r'),
(243, 37, 'Kakamega ', 'MUMIAS EAST \r'),
(244, 37, 'Kakamega ', 'NAVAKHOLO \r'),
(245, 38, 'Vihiga ', 'EMUHAYA \r'),
(246, 38, 'Vihiga ', 'HAMISI \r'),
(247, 38, 'Vihiga ', 'LUANDA \r'),
(248, 38, 'Vihiga ', 'SABATIA \r'),
(249, 38, 'Vihiga ', 'VIHIGA \r'),
(250, 39, 'Bungoma ', 'BUMULA \r'),
(251, 39, 'Bungoma ', 'BUNGOMA CENTRAL \r'),
(252, 39, 'Bungoma ', 'BUNGOMA EAST \r'),
(253, 39, 'Bungoma ', 'BUNGOMA NORTH \r'),
(254, 39, 'Bungoma ', 'BUNGOMA SOUTH \r'),
(255, 39, 'Bungoma ', 'BUNGOMA WEST \r'),
(256, 39, 'Bungoma ', 'CHEPTAIS \r'),
(257, 39, 'Bungoma ', 'KIMILILI \r'),
(258, 39, 'Bungoma ', 'MT ELGON \r'),
(259, 39, 'Bungoma ', 'WEBUYE WEST \r'),
(260, 40, 'Busia ', 'BUNYALA \r'),
(261, 40, 'Busia ', 'BUSIA \r'),
(262, 40, 'Busia ', 'BUTULA \r'),
(263, 40, 'Busia ', 'NAMBALE \r'),
(264, 40, 'Busia ', 'SAMIA \r'),
(265, 40, 'Busia ', 'TESO NORTH \r'),
(266, 40, 'Busia ', 'TESO SOUTH \r'),
(267, 41, 'Siaya ', 'BONDO \r'),
(268, 41, 'Siaya ', 'GEM \r'),
(269, 41, 'Siaya ', 'RARIEDA \r'),
(270, 41, 'Siaya ', 'SIAYA \r'),
(271, 41, 'Siaya ', 'UGENYA \r'),
(272, 41, 'Siaya ', 'UGUNJA \r'),
(273, 42, 'Kisumu ', 'KISUMU CENTRAL \r'),
(274, 42, 'Kisumu ', 'KISUMU EAST \r'),
(275, 42, 'Kisumu ', 'KISUMU WEST \r'),
(276, 42, 'Kisumu ', 'MUHORONI \r'),
(277, 42, 'Kisumu ', 'NYAKACH \r'),
(278, 42, 'Kisumu ', 'NYANDO \r'),
(279, 42, 'Kisumu ', 'SEME \r'),
(280, 43, 'Homa Bay ', 'HOMA BAY \r'),
(281, 43, 'Homa Bay ', 'MBITA \r'),
(282, 43, 'Homa Bay ', 'NDHIWA \r'),
(283, 43, 'Homa Bay ', 'RACHUONYO EAST \r'),
(284, 43, 'Homa Bay ', 'RACHUONYO NORTH \r'),
(285, 43, 'Homa Bay ', 'RACHUONYO SOUTH \r'),
(286, 43, 'Homa Bay ', 'RANGWE \r'),
(287, 43, 'Homa Bay ', 'SUBA \r'),
(288, 44, 'Migori ', 'AWENDO \r'),
(289, 44, 'Migori ', 'KURIA EAST \r'),
(290, 44, 'Migori ', 'KURIA WEST \r'),
(291, 44, 'Migori ', 'MIGORI \r'),
(292, 44, 'Migori ', 'NYATIKE \r'),
(293, 44, 'Migori ', 'RONGO \r'),
(294, 44, 'Migori ', 'SUNA WEST \r'),
(295, 44, 'Migori ', 'URIRI \r'),
(296, 45, 'Kisii ', 'GUCHA \r'),
(297, 45, 'Kisii ', 'GUCHA SOUTH \r'),
(298, 45, 'Kisii ', 'KENYENYA \r'),
(299, 45, 'Kisii ', 'KISII CENTRAL \r'),
(300, 45, 'Kisii ', 'KISII SOUTH \r'),
(301, 45, 'Kisii ', 'KITUTU CENTRAL \r'),
(302, 45, 'Kisii ', 'MARANI \r'),
(303, 45, 'Kisii ', 'MASABA SOUTH \r'),
(304, 45, 'Kisii ', 'NYAMACHE \r'),
(305, 45, 'Kisii ', 'SAMETA \r'),
(306, 46, 'Nyamira ', 'BORABU \r'),
(307, 46, 'Nyamira ', 'MANGA \r'),
(308, 46, 'Nyamira ', 'MASABA NORTH \r'),
(309, 46, 'Nyamira ', 'NYAMIRA NORTH \r'),
(310, 46, 'Nyamira ', 'NYAMIRA SOUTH \r'),
(311, 47, 'Nairobi ', 'DAGORETTI \r'),
(312, 47, 'Nairobi ', 'EMBAKASI \r'),
(313, 47, 'Nairobi ', 'KAMUKUNJI \r'),
(314, 47, 'Nairobi ', 'KASARANI \r'),
(315, 47, 'Nairobi ', 'KIBRA \r'),
(316, 47, 'Nairobi ', 'LANGATA \r'),
(317, 47, 'Nairobi ', 'MAKADARA \r'),
(318, 47, 'Nairobi ', 'MATHARE \r'),
(319, 47, 'Nairobi ', 'NJIRU \r'),
(320, 47, 'Nairobi ', 'STAREHE \r'),
(321, 47, 'Nairobi ', 'WESTLANDS \r');

-- --------------------------------------------------------

--
-- Table structure for table `system_users`
--

CREATE TABLE `system_users` (
  `incre` int(11) NOT NULL,
  `first_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `last_name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phonenumber` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(150) CHARACTER SET utf8 NOT NULL,
  `user_type` varchar(200) CHARACTER SET utf8 NOT NULL,
  `new_user` tinyint(1) NOT NULL,
  `approved` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `system_users`
--

INSERT INTO `system_users` (`incre`, `first_name`, `last_name`, `email`, `phonenumber`, `password`, `user_type`, `new_user`, `approved`) VALUES
(1, 'enock', 'tum', 'tum@realtbox.com', '0702000775', 'enock', 'propertyseller', 1, 1),
(2, 'noah', 'tum', 'noah@realtbox.com', '0722000000', 'noah', 'propertybuyer', 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyerbids`
--
ALTER TABLE `buyerbids`
  ADD PRIMARY KEY (`incre`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`incre`);

--
-- Indexes for table `property_image`
--
ALTER TABLE `property_image`
  ADD PRIMARY KEY (`incre`);

--
-- Indexes for table `site_details`
--
ALTER TABLE `site_details`
  ADD PRIMARY KEY (`incre`);

--
-- Indexes for table `sub_county`
--
ALTER TABLE `sub_county`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`incre`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buyerbids`
--
ALTER TABLE `buyerbids`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_image`
--
ALTER TABLE `property_image`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_details`
--
ALTER TABLE `site_details`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_county`
--
ALTER TABLE `sub_county`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=322;

--
-- AUTO_INCREMENT for table `system_users`
--
ALTER TABLE `system_users`
  MODIFY `incre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
