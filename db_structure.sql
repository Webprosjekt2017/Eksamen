SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


/*Create the database if it doesn't exist, and use it*/
CREATE DATABASE IF NOT EXISTS `woact_explore`;
USE `woact_explore`;

/*Create the DB User*/
CREATE USER IF NOT EXISTS 'explorer'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON `woact_explore`.* TO 'explorer'@'localhost';
FLUSH PRIVILEGES;

/* Dummy Table */
CREATE TABLE IF NOT EXISTS `accounts` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`username` text NOT NULL,
	`password` text NOT NULL,
	`registerdate` datetime DEFAULT NULL,
	`ip` text,
	`admin` float DEFAULT '0',
	`email` text,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `locations` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`location_name` text NOT NULL,
	PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `favorite_locations` (
	`id` int NOT NULL AUTO_INCREMENT,
	`account_id` int NOT NULL,
	`location_id` int NOT NULL,
	PRIMARY KEY (`id`),
	FOREIGN KEY (`account_id`) REFERENCES accounts(`id`),
	FOREIGN KEY (`location_id`) REFERENCES locations(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
