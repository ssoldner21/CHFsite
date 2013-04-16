-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 11, 2013 at 06:38 AM
-- Server version: 5.5.24-log
-- PHP Version: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `chf`
--

-- --------------------------------------------------------

--
-- Table structure for table `record`
--

CREATE TABLE IF NOT EXISTS `record` (
  `record_id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL COMMENT 'foreign key',
  `heart_rate` int(3) NOT NULL,
  `s_blood_pressure` int(3) NOT NULL,
  `d_blood_pressure` int(3) NOT NULL,
  `weight` int(3) NOT NULL,
  `time_entered` int(10) NOT NULL,
  PRIMARY KEY (`record_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Dumping data for table `record`
--

INSERT INTO `record` (`record_id`, `user_id`, `heart_rate`, `s_blood_pressure`, `d_blood_pressure`, `weight`, `time_entered`) VALUES
(40, 31, 77, 77, 77, 150, 130203),
(42, 31, 77, 77, 77, 151, 130204),
(43, 31, 77, 77, 77, 150, 130205),
(44, 31, 78, 78, 78, 151, 130206),
(46, 31, 78, 78, 78, 151, 130207),
(48, 31, 78, 78, 78, 151, 130208),
(59, 31, 78, 78, 78, 151, 130209),
(71, 31, 100, 110, 100, 155, 130210);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(10) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email_address` varchar(75) NOT NULL,
  `password` varchar(128) NOT NULL,
  `time_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `active` binary(1) NOT NULL DEFAULT '0',
  `activationcode` varchar(128) NOT NULL,
  `resetpasswordcode` varchar(128) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email_address`, `password`, `time_registered`, `active`, `activationcode`, `resetpasswordcode`) VALUES
(1, 'User', 'Useruser', 'user1@user.com', 'f7ce80c45d242369e815ea77f12d786f23f18b66', '2013-01-21 23:12:33', '1', '', ''),
(25, 'Sean', 'Soldner', 'sms632@gmail.com', 'f7ce80c45d242369e815ea77f12d786f23f18b66', '2013-01-23 20:34:14', '1', 'dfcee3e3f6ac86974240a55fda54c2f7', ''),
(31, 'Sean', 'Admin', 'hht@hht.com', 'hhthht', '2013-02-10 20:05:26', '', '', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `record`
--
ALTER TABLE `record`
  ADD CONSTRAINT `record_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
