-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 28, 2019 at 01:47 PM
-- Server version: 5.5.60-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `alycollege`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_profile`
--

CREATE TABLE IF NOT EXISTS `stud_profile` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(25) NOT NULL,
  `midlename` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `bloodgroup` text NOT NULL,
  `marital_status` varchar(10) NOT NULL,
  `fathername` varchar(10) NOT NULL,
  `mothername` varchar(10) NOT NULL,
  `religion` varchar(10) NOT NULL,
  `caste_category` varchar(20) NOT NULL,
  `namecast` varchar(20) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `locality` varchar(40) NOT NULL,
  `pincode` int(6) NOT NULL,
  `country` varchar(20) NOT NULL,
  `state` varchar(30) NOT NULL,
  `dist` varchar(10) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `mobile2` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `stud_profile`
--

INSERT INTO `stud_profile` (`id`, `firstname`, `midlename`, `lastname`, `dob`, `gender`, `bloodgroup`, `marital_status`, `fathername`, `mothername`, `religion`, `caste_category`, `namecast`, `address1`, `address2`, `landmark`, `locality`, `pincode`, `country`, `state`, `dist`, `mobile`, `mobile2`) VALUES
(3, 'Deepak', 'Kisan', 'Mahadik', '1997-12-03', 'Male', 'O+', 'Unmarried', 'Kisan', 'Rukmini', 'Hindu', 'OPEN', 'Others', 'Bapdev Nager,', 'Bapdev Nager,', 'Gaikwad Nursurry', 'Dehuroad', 412101, 'India', 'Maharashtra', 'Pune', '7798868349', 2147483647);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
