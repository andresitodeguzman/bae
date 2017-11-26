-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2017 at 03:24 AM
-- Server version: 5.6.13
-- PHP Version: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bae2`
--
CREATE DATABASE IF NOT EXISTS `bae2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `bae2`;

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `user_id` int(100) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`user_id`, `username`, `password`, `name`) VALUES
(4, 'juandelacruz', '$2y$10$uwbj9KwBxLADVn/j9NQQDO.P112Q32E3p/SBOJO7bu0iVdu2cVt/.', 'Juan dela Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_code` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `product_subtype_id` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `available_stocks` varchar(200) NOT NULL,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `product_id` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_code`, `name`, `description`, `product_subtype_id`, `price`, `available_stocks`) VALUES
(22, 'EF 50 (mf)', 'SQ.TUBE 1/2 X 1/2 (mf)', 'mf', '10', '224.26', '30'),
(23, 'ED 101 (mf)', 'Bottom rail (mf)', 'mf', '11', '1,862.01', '30'),
(24, 'EF 50 (A)', 'SQ.TUBE 1/2 X 1/2 (A)', 'A', '10', '231.21', '30'),
(25, 'EF 50(HA)', 'SQ.TUBE 1/2 X 1/2 (HA)', 'HA', '10', '276.26', '30'),
(26, 'EF 50(P.COAT)', 'SQ.TUBE 1/2 X 1/2 (P.COAT)', 'P.COAT', '10', '353.69', '40'),
(27, 'DL', 'as;jdas', 'kljfkf', '10', '029', '12'),
(28, '3234', '32432432', '32424', '11', '234', '23423'),
(29, '56546', '54646', '56465646', '10', '4654', '4656'),
(30, 'gfhfgfgh', 'fghfgghgf', 'ghghfgh', '11', '24234', '23232'),
(31, 'fhfghf', '34534df', 'fghfgghf', '10', '435345', '43535'),
(32, 'Cute naman', 'sdas', 'asda', '13', '21', '12'),
(33, 'eef', 'dsfsfds', 'dsfsdf', '12', '324', '23423'),
(34, 'asas', 'asdasd', 'sdassdas', '12', '121', '21323');

-- --------------------------------------------------------

--
-- Table structure for table `product_subtype`
--

CREATE TABLE IF NOT EXISTS `product_subtype` (
  `product_subtype_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `product_type_id` varchar(100) NOT NULL,
  PRIMARY KEY (`product_subtype_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `product_subtype`
--

INSERT INTO `product_subtype` (`product_subtype_id`, `name`, `description`, `product_type_id`) VALUES
(10, 'Store Front', '', '10'),
(11, 'Swing Door', '', '11'),
(12, 'Boom', '', '12'),
(13, 'HAHAHA', '', '12');

-- --------------------------------------------------------

--
-- Table structure for table `product_type`
--

CREATE TABLE IF NOT EXISTS `product_type` (
  `product_type_id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`product_type_id`),
  UNIQUE KEY `product_type_id` (`product_type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `product_type`
--

INSERT INTO `product_type` (`product_type_id`, `name`, `description`) VALUES
(10, 'Store Front', ''),
(11, 'Swing Door', ''),
(12, 'Ikatlong TYpe', '');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `supplier_id` int(100) NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(100) NOT NULL,
  `supplier_description` varchar(100) NOT NULL,
  `supplier_address` varchar(100) NOT NULL,
  `supplier_contact` varchar(100) NOT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_description`, `supplier_address`, `supplier_contact`) VALUES
(2, 'Juan dela Cruz', '', 'Dasmarinas City, Cavite', 'Juan dela Cruz');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
