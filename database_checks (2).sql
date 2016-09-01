-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 27, 2016 at 08:46 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database_checks`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountantcrons`
--

CREATE TABLE IF NOT EXISTS `accountantcrons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_time` varchar(150) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `accountantcrons`
--

INSERT INTO `accountantcrons` (`id`, `date_time`, `created_at`, `updated_at`) VALUES
(1, '2016/07/30 09:53', 1469242525, 1469242525),
(2, '2016/08/26 10:20', 1469244019, 1469244019),
(3, '2016/07/30 10:30', 1469244665, 1469244665),
(4, '2016/08/26 20:00', 1469449620, 1469449620),
(5, '2016/08/18 ', 1471877658, 1471877658),
(6, '2016/08/29 ', 1471878157, 1471878157),
(7, '08/30/2016 ', 1471937915, 1471937915),
(8, '08/29/2016 ', 1471955442, 1471955442);

-- --------------------------------------------------------

--
-- Table structure for table `basicprograms`
--

CREATE TABLE IF NOT EXISTS `basicprograms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_program_description` varchar(250) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `basicprograms`
--

INSERT INTO `basicprograms` (`id`, `basic_program_description`, `created_at`, `updated_at`) VALUES
(1, 'Fourth Year', 0, 0),
(2, 'Third Year', 0, 0),
(3, 'Second Year', 0, 0),
(4, 'First Year', 0, 0),
(5, 'Grade Six', 0, 0),
(6, 'Grade Five', 0, 0),
(7, 'Grade Four', 0, 0),
(8, 'Grade Three', 0, 0),
(9, 'Grade Two', 0, 0),
(10, 'Grade One', 0, 0),
(11, 'Kinder Two', 0, 0),
(12, 'Kinder One', 0, 0),
(13, 'Preschool', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `type` varchar(25) NOT NULL,
  `name` varchar(50) NOT NULL,
  `migration` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migration`
--

INSERT INTO `migration` (`type`, `name`, `migration`) VALUES
('app', 'default', '001_create_users');

-- --------------------------------------------------------

--
-- Table structure for table `progdeans`
--

CREATE TABLE IF NOT EXISTS `progdeans` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) NOT NULL,
  `dean_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `progdeans`
--

INSERT INTO `progdeans` (`id`, `program_id`, `dean_id`, `created_at`, `updated_at`) VALUES
(1, 1, 97, 1468465616, 1468465616);

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE IF NOT EXISTS `programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_description` varchar(50) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `program_description`, `created_at`, `updated_at`) VALUES
(1, 'BSIT', 0, 0),
(2, 'BSBA', 0, 0),
(3, 'BSCS', 0, 0),
(5, 'BSED', 1467257828, 1467257828),
(6, 'BSCrim', 1467258871, 1467258871),
(12, 'BSA', 1467264020, 1467264020),
(13, 'BSCE', 1467267909, 1467267909),
(14, 'BSW', 1467646825, 1467646825);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_description` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_description`) VALUES
(1, 'Dean'),
(2, 'Program Head'),
(3, 'Accountant'),
(4, 'Cashier'),
(5, 'Principal'),
(6, 'Admin'),
(7, 'VPAA'),
(8, 'Student'),
(9, 'Parent'),
(10, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `program` varchar(50) NOT NULL,
  `year` varchar(255) NOT NULL,
  `student_id` int(11) NOT NULL,
  `tuition_fee` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `other_fees` int(11) NOT NULL,
  `down_payment` int(11) NOT NULL,
  `breakdown` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `program`, `year`, `student_id`, `tuition_fee`, `misc`, `other_fees`, `down_payment`, `breakdown`, `balance`, `created_at`, `updated_at`) VALUES
(33, 'BSIT', 'II Year', 85, 9000, 7500, 300, 8633, 4200, 8167, 1467980543, 1472141364),
(34, 'BSIT', 'I Year', 87, 12000, 3000, 300, 15200, 3825, 100, 1467981284, 1469073651),
(35, 'First Year', 'I Year', 89, 12000, 8000, 0, 6777, 5000, 13223, 1468172217, 1469450762),
(37, 'BSIT', 'I Year', 98, 1233, 1231, 123, 123, 647, 2464, 1468474700, 1468475893),
(38, 'BSCS', 'II Year', 99, 7000, 6000, 300, 700, 3325, 12600, 1469008673, 1469008754),
(39, 'First Year', 'I Year', 100, 3000, 5000, 340, 230, 2085, 8110, 1469071444, 1469450705),
(40, 'BSBA', 'I Year', 101, 5000, 4000, 600, 4000, 2400, 5600, 1469338638, 1469339008),
(41, 'BSED', 'IV Year', 102, 4500, 3000, 400, 3000, 1975, 4900, 1469339628, 1469339670),
(43, 'BSIT', 'V Year', 104, 20, 10, 5, 8, 9, 27, 1469447964, 1470053516),
(44, 'Second Year', 'Second Year', 108, 30, 10, 10, 10, 13, 40, 1469598848, 1470229410),
(46, 'BSCE', 'I Year', 110, 0, 0, 0, 0, 0, 0, 1469989148, 1469989148),
(47, 'BSIT', 'I Year', 111, 0, 0, 0, 0, 0, 0, 1471439467, 1471439467),
(48, 'BSCrim', 'I Year', 112, 0, 0, 0, 0, 0, 0, 1471804406, 1471804406),
(49, 'BSA', 'I Year', 113, 0, 0, 0, 0, 0, 0, 1471804480, 1471804480),
(50, 'BSW', 'I Year', 114, 0, 0, 0, 0, 0, 0, 1471804557, 1471804557);

-- --------------------------------------------------------

--
-- Table structure for table `studhistories`
--

CREATE TABLE IF NOT EXISTS `studhistories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_description` varchar(150) NOT NULL,
  `studenthistory_id` int(11) NOT NULL,
  `tuition_fee` int(11) NOT NULL,
  `misc` int(11) NOT NULL,
  `other_fees` int(11) NOT NULL,
  `down_payment` int(11) NOT NULL,
  `payment` int(11) NOT NULL,
  `breakdown` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `date_time` varchar(255) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100 ;

--
-- Dumping data for table `studhistories`
--

INSERT INTO `studhistories` (`id`, `program_description`, `studenthistory_id`, `tuition_fee`, `misc`, `other_fees`, `down_payment`, `payment`, `breakdown`, `balance`, `date_time`, `created_at`, `updated_at`) VALUES
(14, 'BSIT', 34, 12000, 3000, 0, 15000, 0, 3750, 0, '2016-07-11 06:49:09', 1468234149, 1468234149),
(15, 'BSIT', 37, 1233, 1231, 0, 123, 0, 647, 2464, '2016-07-14 01:58:12', 1468475893, 1468475893),
(23, 'BSIT', 33, 9000, 7500, 300, 4100, 4100, 4200, 12700, '2016-07-17 11:29:00', 1468812540, 1468812540),
(24, 'BSIT', 33, 9000, 7500, 300, 400, 4500, 4200, 12300, '2016-07-17 11:31:07', 1468812667, 1468812667),
(25, 'BSCS', 38, 7000, 6000, 300, 700, 700, 3325, 12600, '2016-07-20 05:59:14', 1469008754, 1469008754),
(26, 'BSIT', 33, 9000, 7500, 300, 200, 4700, 4200, 12100, '2016-07-20 09:36:30', 1469064991, 1469064991),
(27, 'BSIT', 34, 12000, 3000, 300, 100, 15100, 3825, 200, '2016-07-20 09:54:06', 1469066046, 1469066046),
(28, 'First Year', 39, 3000, 5000, 340, 230, 230, 2085, 8110, '2016-07-20 11:27:45', 1469071665, 1469071665),
(29, 'BSIT', 34, 12000, 3000, 300, 100, 15200, 3825, 100, 'Thu 21 Jul 2016 12:00:51', 1469073651, 1469073651),
(30, 'BSBA', 40, 5000, 4000, 600, 4000, 4000, 2400, 5600, 'Sun 24 Jul 2016 01:43:28', 1469339009, 1469339009),
(31, 'BSED', 41, 4500, 3000, 400, 3000, 3000, 1975, 4900, 'Sun 24 Jul 2016 01:54:30', 1469339670, 1469339670),
(34, 'BSIT', 43, 20, 10, 5, 3, 3, 9, 32, 'Mon 25 Jul 2016 08:02:43', 1469448163, 1469448163),
(35, 'BSIT', 43, 20, 10, 5, 5, 8, 9, 27, 'Mon 01 Aug 2016 08:11:56', 1470053516, 1470053516),
(36, 'First Year', 39, 3000, 5000, 340, 0, 230, 2085, 8110, 'Mon 25 Jul 2016 08:45:05', 1469450705, 1469450705),
(37, 'First Year', 35, 12000, 8000, 0, 1777, 6777, 5000, 13223, 'Mon 25 Jul 2016 08:46:01', 1469450762, 1469450762),
(38, 'BSIT', 33, 9000, 7500, 300, 100, 5000, 4200, 11800, 'Sun 31 Jul 2016 06:45:49', 1469961950, 1469961950),
(39, 'BSIT', 33, 9000, 7500, 300, 10, 5010, 4200, 11790, 'Sun 31 Jul 2016 06:47:00', 1469962020, 1469962020),
(40, 'BSIT', 33, 9000, 7500, 300, 10, 5020, 4200, 11780, 'Sun 31 Jul 2016 07:08:01', 1469963282, 1469963282),
(41, 'BSIT', 33, 9000, 7500, 300, 10, 5030, 4200, 11770, 'Sun 31 Jul 2016 07:09:56', 1469963397, 1469963397),
(42, 'BSIT', 33, 9000, 7500, 300, 10, 5040, 4200, 11760, 'Sun 31 Jul 2016 07:11:55', 1469963515, 1469963515),
(43, 'BSIT', 33, 9000, 7500, 300, 10, 5050, 4200, 11750, 'Sun 31 Jul 2016 07:14:15', 1469963655, 1469963655),
(44, 'BSIT', 33, 9000, 7500, 300, 10, 5060, 4200, 11740, 'Sun 31 Jul 2016 09:27:03', 1469971623, 1469971623),
(45, 'BSIT', 33, 9000, 7500, 300, 10, 5070, 4200, 11730, 'Sun 31 Jul 2016 09:27:21', 1469971641, 1469971641),
(46, 'BSIT', 33, 9000, 7500, 300, 10, 5080, 4200, 11720, 'Sun 31 Jul 2016 09:27:58', 1469971678, 1469971678),
(47, 'BSIT', 33, 9000, 7500, 300, 10, 5090, 4200, 11710, 'Sun 31 Jul 2016 09:28:37', 1469971717, 1469971717),
(48, 'BSIT', 33, 9000, 7500, 300, 10, 5100, 4200, 11700, 'Sun 31 Jul 2016 09:28:52', 1469971733, 1469971733),
(49, 'BSIT', 33, 9000, 7500, 300, 10, 5110, 4200, 11690, 'Sun 31 Jul 2016 09:29:32', 1469971772, 1469971772),
(50, 'BSIT', 33, 9000, 7500, 300, 10, 5120, 4200, 11680, 'Sun 31 Jul 2016 09:29:43', 1469971783, 1469971783),
(51, 'BSIT', 33, 9000, 7500, 300, 10, 5130, 4200, 11670, 'Sun 31 Jul 2016 09:30:50', 1469971850, 1469971850),
(52, 'BSIT', 33, 9000, 7500, 300, 10, 5140, 4200, 11660, 'Sun 31 Jul 2016 09:31:10', 1469971870, 1469971870),
(53, 'BSIT', 33, 9000, 7500, 300, 10, 5150, 4200, 11650, 'Sun 31 Jul 2016 09:36:56', 1469972216, 1469972216),
(54, 'BSIT', 33, 9000, 7500, 300, 10, 5160, 4200, 11640, 'Sun 31 Jul 2016 09:37:09', 1469972229, 1469972229),
(55, 'BSIT', 33, 9000, 7500, 300, 10, 5170, 4200, 11630, 'Sun 31 Jul 2016 09:38:56', 1469972336, 1469972336),
(56, 'BSIT', 33, 9000, 7500, 300, 10, 5180, 4200, 11620, 'Sun 31 Jul 2016 09:39:05', 1469972345, 1469972345),
(57, 'BSIT', 33, 9000, 7500, 300, 10, 5190, 4200, 11610, 'Sun 31 Jul 2016 09:41:45', 1469972505, 1469972505),
(58, 'BSIT', 33, 9000, 7500, 300, 10, 5200, 4200, 11600, 'Sun 31 Jul 2016 09:41:57', 1469972517, 1469972517),
(59, 'BSIT', 33, 9000, 7500, 300, 10, 5210, 4200, 11590, 'Sun 31 Jul 2016 09:42:50', 1469972570, 1469972570),
(60, 'BSIT', 33, 9000, 7500, 300, 10, 5220, 4200, 11580, 'Sun 31 Jul 2016 09:43:21', 1469972601, 1469972601),
(61, 'BSIT', 33, 9000, 7500, 300, 10, 5230, 4200, 11570, 'Sun 31 Jul 2016 09:43:34', 1469972614, 1469972614),
(62, 'BSIT', 33, 9000, 7500, 300, 10, 5240, 4200, 11560, 'Sun 31 Jul 2016 09:43:46', 1469972626, 1469972626),
(63, 'BSIT', 33, 9000, 7500, 300, 10, 5250, 4200, 11550, 'Sun 31 Jul 2016 09:44:02', 1469972643, 1469972643),
(64, 'BSIT', 33, 9000, 7500, 300, 10, 5260, 4200, 11540, 'Sun 31 Jul 2016 09:44:10', 1469972650, 1469972650),
(65, 'BSIT', 33, 9000, 7500, 300, 10, 5270, 4200, 11530, 'Sun 31 Jul 2016 09:47:13', 1469972833, 1469972833),
(66, 'BSIT', 33, 9000, 7500, 300, 10, 5280, 4200, 11520, 'Sun 31 Jul 2016 10:00:40', 1469973641, 1469973641),
(67, 'BSIT', 33, 9000, 7500, 300, 10, 5290, 4200, 11510, 'Sun 31 Jul 2016 10:01:04', 1469973664, 1469973664),
(68, 'BSIT', 33, 9000, 7500, 300, 10, 5300, 4200, 11500, 'Sun 31 Jul 2016 10:01:37', 1469973697, 1469973697),
(69, 'BSIT', 33, 9000, 7500, 300, 10, 5310, 4200, 11490, 'Sun 31 Jul 2016 10:03:12', 1469973792, 1469973792),
(70, 'BSIT', 33, 9000, 7500, 300, 10, 5320, 4200, 11480, 'Sun 31 Jul 2016 10:05:54', 1469973954, 1469973954),
(71, 'BSIT', 33, 9000, 7500, 300, 10, 5330, 4200, 11470, 'Sun 31 Jul 2016 10:06:33', 1469973993, 1469973993),
(72, 'BSIT', 33, 9000, 7500, 300, 10, 5340, 4200, 11460, 'Sun 31 Jul 2016 10:07:05', 1469974025, 1469974025),
(73, 'BSIT', 33, 9000, 7500, 300, 10, 5350, 4200, 11450, 'Sun 31 Jul 2016 10:07:24', 1469974044, 1469974044),
(74, 'BSIT', 33, 9000, 7500, 300, 10, 5360, 4200, 11440, 'Sun 31 Jul 2016 10:07:32', 1469974052, 1469974052),
(75, 'BSIT', 33, 9000, 7500, 300, 10, 5370, 4200, 11430, 'Sun 31 Jul 2016 10:07:56', 1469974076, 1469974076),
(76, 'BSIT', 33, 9000, 7500, 300, 10, 5380, 4200, 11420, 'Sun 31 Jul 2016 10:08:15', 1469974095, 1469974095),
(77, 'BSIT', 33, 9000, 7500, 300, 10, 5390, 4200, 11410, 'Sun 31 Jul 2016 10:08:34', 1469974115, 1469974115),
(78, 'BSIT', 33, 9000, 7500, 300, 10, 5400, 4200, 11400, 'Sun 31 Jul 2016 10:16:17', 1469974578, 1469974578),
(79, 'BSIT', 33, 9000, 7500, 300, 10, 5410, 4200, 11390, 'Sun 31 Jul 2016 10:16:30', 1469974590, 1469974590),
(80, 'BSIT', 33, 9000, 7500, 300, 10, 5420, 4200, 11380, 'Sun 31 Jul 2016 10:16:33', 1469974593, 1469974593),
(81, 'BSIT', 33, 9000, 7500, 300, 10, 5430, 4200, 11370, 'Sun 31 Jul 2016 10:16:56', 1469974616, 1469974616),
(82, 'BSIT', 33, 9000, 7500, 300, 10, 5440, 4200, 11360, 'Sun 31 Jul 2016 10:17:42', 1469974662, 1469974662),
(83, 'BSIT', 33, 9000, 7500, 300, 10, 5450, 4200, 11350, 'Sun 31 Jul 2016 10:20:02', 1469974802, 1469974802),
(84, 'BSIT', 33, 9000, 7500, 300, 10, 5460, 4200, 11340, 'Sun 31 Jul 2016 10:21:36', 1469974896, 1469974896),
(85, 'BSIT', 33, 9000, 7500, 300, 10, 5470, 4200, 11330, 'Sun 31 Jul 2016 10:22:49', 1469974969, 1469974969),
(86, 'BSIT', 33, 9000, 7500, 300, 10, 5480, 4200, 11320, 'Sun 31 Jul 2016 12:48:30', 1469983711, 1469983711),
(87, 'BSIT', 33, 9000, 7500, 300, 100, 5580, 4200, 11220, 'Mon 01 Aug 2016 08:41:53', 1470055314, 1470055314),
(88, 'Second Year', 44, 30, 10, 10, 10, 10, 13, 40, 'Wed 03 Aug 2016 09:03:30', 1470229410, 1470229410),
(89, 'BSIT', 33, 9000, 7500, 300, 10, 5590, 4200, 11210, 'Thu 04 Aug 2016 08:41:22', 1470314483, 1470314483),
(90, 'BSIT', 33, 9000, 7500, 300, 0, 5590, 4200, 11210, 'Fri 19 Aug 2016 06:57:29', 1471604250, 1471604250),
(91, 'BSIT', 33, 9000, 7500, 300, 0, 5590, 4200, 11210, 'Fri 19 Aug 2016 07:01:56', 1471604516, 1471604516),
(92, 'BSIT', 33, 9000, 7500, 300, 10, 5600, 4200, 11200, 'Wed 24 Aug 2016 01:16:59', 1472015820, 1472015820),
(93, 'BSIT', 33, 9000, 7500, 300, 10, 5610, 4200, 11190, 'Wed 24 Aug 2016 01:19:10', 1472015950, 1472015950),
(94, 'BSIT', 33, 9000, 7500, 300, 0, 5610, 4200, 11190, 'Wed 24 Aug 2016 01:29:31', 1472016571, 1472016571),
(95, 'BSIT', 33, 9000, 7500, 300, 1000, 6610, 4200, 10190, 'Wed 24 Aug 2016 07:41:22', 1472038883, 1472038883),
(96, 'BSIT', 33, 9000, 7500, 300, 1790, 8400, 4200, 8400, 'Wed 24 Aug 2016 07:47:24', 1472039244, 1472039244),
(97, 'BSIT', 33, 9000, 7500, 300, 100, 8500, 4200, 8300, 'Wed 24 Aug 2016 07:53:27', 1472039607, 1472039607),
(98, 'BSIT', 33, 9000, 7500, 300, 10, 8510, 4200, 8290, 'Wed 24 Aug 2016 08:27:41', 1472041662, 1472041662),
(99, 'BSIT', 33, 9000, 7500, 300, 123, 8633, 4200, 8167, 'Thu 25 Aug 2016 12:09:24', 1472141364, 1472141364);

-- --------------------------------------------------------

--
-- Table structure for table `studparents`
--

CREATE TABLE IF NOT EXISTS `studparents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `studparents`
--

INSERT INTO `studparents` (`id`, `student_id`, `parent_id`, `created_at`, `updated_at`) VALUES
(3, 33, 86, 1467980732, 1467980732),
(4, 34, 88, 1467981350, 1467981350),
(5, 43, 105, 1469448036, 1469448036);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `mobile_number` bigint(22) NOT NULL,
  `group` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `last_login` varchar(255) NOT NULL,
  `login_hash` varchar(255) NOT NULL,
  `profile_fields` text NOT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=115 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `mobile_number`, `group`, `email`, `role`, `last_login`, `login_hash`, `profile_fields`, `created_at`, `updated_at`) VALUES
(1, 'Accountant', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Rogelio ', 'A', 'Ambrosio', 23478888, 100, 'edzel.abliter@jmc.edu.ph', 3, '1471881640', 'c1e43d9ec3cb47502114a10b6572d09853343afa', 'a:0:{}', 1466314505, 1470053745),
(7, 'Dean', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Exander', 'Tirao', 'Barrios', 324234, 100, 'exandertiraobarrios@gmail.com', 1, '1468465691', '06ed5a55e475ebc1eda764c6a02915be4a9e47e3', 'a:4:{s:9:"firstname";s:7:"Exander";s:10:"middlename";s:5:"Tirao";s:8:"lastname";s:7:"Barrios";s:8:"password";s:5:"admin";}', 1466316598, NULL),
(8, 'BSBA', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Leonora', 'Q', 'De Guzman', 5786132, 100, 'cands@yahoo.com', 1, '', '', 'a:4:{s:9:"firstname";s:6:"Nelior";s:10:"middlename";s:6:"Canads";s:8:"lastname";s:6:"Quezon";s:8:"password";s:5:"admin";}', 1466316694, 1466596784),
(15, 'BSPsych', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Janleiz', 'V', 'Dandan', 543, 100, 'abliternoah@yahoo.com', 1, '', '', 'a:4:{s:9:"firstname";s:5:"Lorna";s:10:"middlename";s:4:"Abia";s:8:"lastname";s:7:"Abliter";s:8:"password";s:5:"admin";}', 1466323580, 1466596932),
(85, 'Hanny', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Nandoy', 'Dalugdog', 'Bonafide', 639486872667, 1, 'Nandoy@yahoo.com', 8, '1472279192', '105e9d33a602e90d10a7d56fa9acfd2bdff8c138', '', 1467980543, 1467980543),
(86, 'Mommyta', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Joceline', 'Manayag', 'Umbayon', 9238134851, 1, 'Joceline@yahoo.com', 9, '1472033138', 'c643d1e40c73454403e9320caa931f0afe334e55', '', 1467980732, 1467980732),
(87, 'Bebang', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Beverly', 'Losoloso', 'Ablter', 9305529146, 1, 'beverly@yahoo.com', 8, '1472038413', '7d95456533bf330cf3841767627c87ba16a36160', '', 1467981284, 1467981284),
(88, 'Lourdes', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Lourdes', 'Suazo', 'Dili', 92384415444, 1, 'lourdes@yahoo.com', 9, '', '', '', 1467981350, 1467981350),
(89, 'Bohemian', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'dev', 'con', 'nnect', 9334153423, 1, 'bohemian@yahoo.com', 8, '1468174069', '77e27d014ce107c9b93b350b5f0c76a1041fdab6', '', 1468172217, 1468172216),
(90, 'exaaaa', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'asdf', 'asdf', 'asdf', 778444, 100, 'asdaf@yahoo.com', 1, '', '', '', 1468358839, 1470053918),
(91, 'Cashier', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Ruth', 'V', 'Baldo', 9123456789, 100, 'ruth.baldo@jmc.edu.ph', 4, '1471882895', 'bc1294420b18380d893ed9b706d200cee1065f31', '', 1468408598, 1468408598),
(92, 'VPAA', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Danilo', 'L', 'Mejica', 9104101911, 100, 'danilo.mejica@yahoo.com', 7, '1471883242', 'e25ce661c2022dcae76c7c80a923ca8d2e6786b4', '', 1468408842, 1468408842),
(93, 'Principal', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Nile', 'O', 'Tigres', 9234343122, 100, 'nile@yahoo.com', 5, '1471883057', 'ba38245764fa6150f7d40206c7c409114f652e57', '', 1468409101, 1468409101),
(94, 'Admin', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'admin', 'admin', 'admin', 9423423432, 100, 'admin.add@gmail.com', 6, '1472040133', '61cfa1178854ba0f7f30a082d1ebf843b73b2b24', '', 1468409219, 1468409219),
(95, 'Edzel Abliter', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Edzel', 'Abia', 'Abliter', 9283448154, 100, 'edzel.abliter@yahoo.com', 10, '1472263500', 'e9ff00277505478ec2a80c0e62b24f1c80dba262', '', NULL, NULL),
(97, 'Deaner', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'dinner', 'din', 'dine', 234324, 100, 'dine@yahoo.com', 1, '1471882510', '3194d315fc8277e85cae402ba09543a14ed859fa', '', 1468465615, 1468465615),
(98, 'Studentko', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'gura', 'bels', 'shungi', 923454313, 1, 'bels@yahoo.com', 8, '', '', '', 1468474700, 1468474700),
(99, 'Digong', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Rodrigo', 'Roa', 'Duterte', 928348154, 1, 'duterte@yahoo.com', 8, '', '', '', 1469008672, 1469008672),
(100, 'kim', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'lowie', 'abia', 'abliter', 92834832, 1, 'kim@yahoo.com', 8, '', '', '', 1469071443, 1469071443),
(101, '2016300048', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Julie Ann', 'S', 'Abule', 9283481231, 1, 'julie.ann@yahoo.com', 8, '', '', '', 1469338637, 1469338637),
(102, '2014300130', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Jamyca', 'L.', 'Zamora', 9486872667, 1, 'darl_abia@yahoo.com', 8, '', '', '', 1469339628, 1469339628),
(104, 'chin', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Sheera', 'Tinaan', 'Penaranda', 9123456789, 1, 'sheeramaepenaranda525@gmail.com', 8, '1469448363', 'ac05db846431aae35ff6a493fb120aca325e70c7', '', 1469447963, 1469447963),
(105, 'Beth', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'Elizabeth', 'Tinaan', 'Penaranda', 9123456789, 1, 'beth.tinaan@yahoo.com', 9, '1469448079', 'c3cbb97ca3c66fac3e34cff624ec97008c245ab5', '', 1469448035, 1469448035),
(106, 'hokage', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'breezy', 'galawan', 'pinak', 9234853243, 1, 'breezy@yahoo.com', 8, '', '', '', 1469598732, 1469598732),
(107, 'hokage', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'breezy', 'galawan', 'pinak', 9234853243, 1, 'breezy@yahoo.com', 8, '', '', '', 1469598798, 1469598798),
(108, 'pinak', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'pinaka', 'pinakas', 'pinakanga', 9234852532, 1, 'pinak@yahoo.com', 8, '', '', '', 1469598848, 1469598848),
(110, 'samp', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'sample', 'sampling', 'sampler', 639341534532, 1, 'sampler@yahoo.com', 8, '', '', '', 1469989148, 1469989148),
(111, 'hello', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'hi', 'qoe', 'ads', 639874312347, 1, 'hi@yahoo.com', 8, '', '', '', 1471439466, 1471439466),
(112, 'Soldier', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'sol', 'dier', 'boy', 639123123123, 1, 'soldier@yahoo.com', 8, '', '', '', 1471804406, 1471804406),
(113, 'Bus', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'iness', 'of', 'adm', 639234235123, 1, 'busi@yahoo.com', 8, '', '', '', 1471804480, 1471804480),
(114, 'chin', 'YWqmPGH+dOEvOh6pf83a62lzJ1QQLHRMPHhNIaohB3s=', 'nie', 'po', 'ako', 639213423423, 1, 'chin@yahoo.com', 8, '', '', '', 1471804557, 1471804557);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
