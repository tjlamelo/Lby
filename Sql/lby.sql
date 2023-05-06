-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 03:26 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lby`
--

-- --------------------------------------------------------

--
-- Table structure for table `inscription`
--

CREATE TABLE IF NOT EXISTS `inscription` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nomparent` varchar(100) NOT NULL,
  `pseudo` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tel` int(10) NOT NULL,
  `password` text NOT NULL,
  `ip` varchar(20) NOT NULL,
  `token` text NOT NULL,
  `date_inscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `inscription`
--

INSERT INTO `inscription` (`id`, `nomparent`, `pseudo`, `email`, `tel`, `password`, `ip`, `token`, `date_inscription`) VALUES
(1, 'PAPA', 'TJ', 'tjlepro@gmail.com', 663477551, '$2y$12$ZQCkT7lgpGEZJAZD33Txxe0ijqh5BZi6znBJzOeS57AP66kI4XTCC', '::1', '1f372836871aa6f53a6bfeb85312fadef2b3121fa8176f8ea1da987df0597d049e84ba8d4b5fb71dc4cf66c914f29c999a448866c3fa51132f0956407241b95d', '2023-04-05 21:23:33'),
(2, 'tjbeats', 'lamelooo', 'email@gmail.com', 663477551, '$2y$12$th02c4cORbFE2RZ9WpTZme2.m3DhGhdEYqGEDH7vxay2jWgGO69jy', '::1', '2535e9716523ce72d702535b2738e84f4c677da68d6348a2505128e13fd3903b231301ef1c4cbc0e49f12e1a27663ae852fee17172a23abcd76880bd6fb322e9', '2023-04-06 00:03:58');

-- --------------------------------------------------------

--
-- Table structure for table `scolarisation`
--

CREATE TABLE IF NOT EXISTS `scolarisation` (
  `nom_` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
