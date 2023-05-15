-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 11:25 AM
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
-- Table structure for table `kid_users`
--

CREATE TABLE IF NOT EXISTS `kid_users` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(50) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_address` varchar(150) NOT NULL,
  `user_password` varchar(25) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kid_users`
--

INSERT INTO `kid_users` (`id`, `user_type`, `user_name`, `user_email`, `user_address`, `user_password`) VALUES
(1, 'admin', 'Agata Galewska', 'agatagalewska@gmail.com', '-', 'admin123'),
(3, 'customer', 'Kamila Maciejczak', 'kamilamaciejczak@gmail.com', 'Halmyre Street, EH6 8QD', 'password1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
