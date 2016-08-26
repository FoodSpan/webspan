-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Aug 26, 2016 at 02:18 AM
-- Server version: 5.5.42
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webspan`
--
CREATE DATABASE IF NOT EXISTS `webspan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `webspan`;

-- --------------------------------------------------------

--
-- Table structure for table `panels`
--

CREATE TABLE `panels` (
  `uid` int(11) NOT NULL,
  `accountid` int(11) DEFAULT NULL,
  `version` text NOT NULL,
  `name` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `uid` int(11) NOT NULL,
  `pattern` int(11) NOT NULL,
  `controluid` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL,
  `last_activation_date` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `category` text NOT NULL,
  `raw_cooked` tinyint(1) DEFAULT NULL,
  `fridge_freezer` tinyint(1) DEFAULT '0',
  `ingredient` text NOT NULL,
  `expiry_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL,
  `salt` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `panels`
--
ALTER TABLE `panels`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`uid`),
  ADD KEY `controluid` (`controluid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=1;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
