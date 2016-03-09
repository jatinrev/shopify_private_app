-- phpMyAdmin SQL Dump
-- version 4.4.15.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 17, 2016 at 04:30 AM
-- Server version: 5.5.47-37.7
-- PHP Version: 5.5.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopifyshipping`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appsettings`
--

CREATE TABLE IF NOT EXISTS `tbl_appsettings` (
  `id` int(11) NOT NULL,
  `api_key` varchar(300) DEFAULT NULL,
  `redirect_url` varchar(300) DEFAULT NULL,
  `permissions` text,
  `shared_secret` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_appsettings`
--

INSERT INTO `tbl_appsettings` (`id`, `api_key`, `redirect_url`, `permissions`, `shared_secret`) VALUES
(1, '9b55a2645089ac20e0848a43f220b0ba', 'https://awsship.devserver.co.in/getCredentials.php', '["read_products","write_products","read_customers","write_customers","read_orders","write_orders"]', '466ff41564e3e4957886b3211b3b1595');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_usersettings`
--

CREATE TABLE IF NOT EXISTS `tbl_usersettings` (
  `id` int(11) NOT NULL,
  `access_token` text NOT NULL,
  `store_name` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_usersettings`
--

INSERT INTO `tbl_usersettings` (`id`, `access_token`, `store_name`) VALUES
(2, '5a6276fcb7c033125d32454b34ff6f19', 'shipping-app.myshopify.com'),
(3, '3cca5217001d3c15c9773c84c6ff45ac', 'divineviewer.myshopify.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_appsettings`
--
ALTER TABLE `tbl_appsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_usersettings`
--
ALTER TABLE `tbl_usersettings`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_appsettings`
--
ALTER TABLE `tbl_appsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_usersettings`
--
ALTER TABLE `tbl_usersettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
