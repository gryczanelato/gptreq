-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 11:39 AM
-- Server version: 5.5.29
-- PHP Version: 5.3.10-1ubuntu3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `HNCWEBMR19`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(100) NOT NULL,
  `course_level` varchar(100) NOT NULL,
  `course_desc` varchar(500) NOT NULL,
  `course_date` date NOT NULL,
  `course_price` int(5) NOT NULL,
  `course_img` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `course_level`, `course_desc`, `course_date`, `course_price`, `course_img`) VALUES
(1, 'Poziom podstawowy', 'podstawowy', 'Kurs dla osob poczatkujacych, ktore dopiero rozpoczynaja swoja przgode z joga kundalini. ', '2023-07-01', 18, '/assets/img/yoga3.jpeg'),
(2, 'Poziom sredni', 'sredni', 'Zajecia na poziomie srednim dla osób, które pragna osiagnc kolejny stopien wtajemniczenia.', '2023-06-08', 15, '/assets/img/yoga2.jpeg'),
(3, 'Poziom zaawansowany', 'zaawansowany', 'Zajecia dla osób, które praktyke chca wykonywac wspólnie, by wzmocnic efekty.', '2023-06-14', 17, '/assets/img/yoga1.jpeg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
