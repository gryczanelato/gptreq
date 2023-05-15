-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 15, 2023 at 11:24 AM
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
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `product_type` varchar(25) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_subtitle` varchar(150) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `product_q` int(4) NOT NULL,
  `product_price` int(5) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_img_2` varchar(100) NOT NULL,
  `product_img_3` varchar(100) NOT NULL,
  `product_img_4` varchar(100) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_type`, `product_name`, `product_subtitle`, `product_desc`, `product_q`, `product_price`, `product_img`, `product_img_2`, `product_img_3`, `product_img_4`) VALUES
(1, 'swieca', 'Swieca sojowa', 'Hartowane szklo recyklingowane', 'Recznie wykonana swieca sojowa w recyklingowanym szkle. Stworzona w duchu less waste.', 19, 12, 'assets/img/candle2.jpeg', 'assets/img/candle1.jpeg', '', ''),
(3, 'olejek', 'Olejek eteryczny', 'Produkt organiczny', 'Wyjatkowa mieszanka zapachowa, ktora mozna zawiesic w samochodzie lub postawic w wyjatkowym miejscu.', 40, 10, 'assets/img/oil1.jpeg', 'assets/img/oil2.jpeg', 'assets/img/oil3.jpeg', ''),
(4, 'roler', 'Roler aromaterapeutyczny', 'Miks olejków stymuluj?cych czakry', 'Ten wyjatkowy miks olejkow moze wyjatkowo wplywac na czakry. Wystarczy naniesc niewielka ilosc na szyje i nadgarstki.', 48, 12, 'assets/img/roler1.jpeg', 'assets/img/roler2.jpeg', '', ''),
(7, 'masazer', 'Masazer drewniany', 'Drewniany masazer z drewna z odzysku', 'Wyjatkowy masazer recznie wykonany z drewna z odzysku. ', 50, 45, 'assets/img/massage1.jpeg', 'assets/img/massage2.jpeg', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
