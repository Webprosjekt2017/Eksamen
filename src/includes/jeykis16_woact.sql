-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 02, 2017 at 12:23 PM
-- Server version: 5.6.35
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeykis16_woact`
--

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` int(11) NOT NULL,
  `title` tinytext NOT NULL,
  `description` text,
  `address` varchar(255) NOT NULL,
  `URL` varchar(255) DEFAULT NULL,
  `takeaway` tinyint(1) DEFAULT '0',
  `delivery` tinyint(1) DEFAULT '0',
  `show_title` tinyint(1) DEFAULT '1',
  `campus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `description`, `address`, `URL`, `takeaway`, `delivery`, `show_title`, `campus`) VALUES
(9, 'REMA 1000 Christian Krohgsgate', NULL, 'Chr. Krohgs gate 1-11', 'https://www.rema.no/butikker/Oslo/rema-1000-christian-krohgsgate/1499929', 0, 0, 1, 'fjerdingen');

-- --------------------------------------------------------

--
-- Table structure for table `location_images`
--

CREATE TABLE `location_images` (
  `id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `location_tags`
--

CREATE TABLE `location_tags` (
  `id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `tag` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_tags`
--

INSERT INTO `location_tags` (`id`, `loc_id`, `tag`) VALUES
(8, 9, 'Dagligvare');

-- --------------------------------------------------------

--
-- Table structure for table `opening_hours`
--

CREATE TABLE `opening_hours` (
  `id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `day` int(11) NOT NULL,
  `open` time NOT NULL,
  `close` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `opening_hours`
--

INSERT INTO `opening_hours` (`id`, `loc_id`, `day`, `open`, `close`) VALUES
(12, 9, 0, '07:00:00', '23:00:00'),
(13, 9, 1, '07:00:00', '23:00:00'),
(14, 9, 2, '07:00:00', '23:00:00'),
(15, 9, 3, '07:00:00', '23:00:00'),
(16, 9, 4, '07:00:00', '23:00:00'),
(17, 9, 5, '08:00:00', '22:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `phone_numbers`
--

CREATE TABLE `phone_numbers` (
  `id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `country_code` char(2) DEFAULT NULL,
  `number` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phone_numbers`
--

INSERT INTO `phone_numbers` (`id`, `loc_id`, `country_code`, `number`) VALUES
(4, 9, '47', '22172660');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `location_images`
--
ALTER TABLE `location_images`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `loc_id` (`loc_id`);

--
-- Indexes for table `location_tags`
--
ALTER TABLE `location_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `loc_id` (`loc_id`);

--
-- Indexes for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `loc_id` (`loc_id`);

--
-- Indexes for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `loc_id` (`loc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `location_images`
--
ALTER TABLE `location_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `location_tags`
--
ALTER TABLE `location_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `location_images`
--
ALTER TABLE `location_images`
  ADD CONSTRAINT `location_images_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `location_tags`
--
ALTER TABLE `location_tags`
  ADD CONSTRAINT `location_tags_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `opening_hours`
--
ALTER TABLE `opening_hours`
  ADD CONSTRAINT `opening_hours_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`id`);

--
-- Constraints for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  ADD CONSTRAINT `phone_numbers_ibfk_1` FOREIGN KEY (`loc_id`) REFERENCES `locations` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
