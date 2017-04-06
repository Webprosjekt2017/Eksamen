/*SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+01:00";
*/

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


/*Create the database if it doesn't exist, and use it*/
/*CREATE DATABASE IF NOT EXISTS `woact_explore`;
USE `woact_explore`;
*/

/*Create the DB User*/
/*CREATE USER IF NOT EXISTS 'explorer'@'localhost' IDENTIFIED BY 'password';
GRANT ALL ON `woact_explore`.* TO 'explorer'@'localhost';
FLUSH PRIVILEGES;
*/

CREATE TABLE IF NOT EXISTS `locations` (
  `id` INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `title` TINYTEXT NOT NULL,
  `description` TEXT,
  `URL` VARCHAR(255),
  `address` VARCHAR(255),
  `takeaway` BOOL DEFAULT 0,
  `delivery` BOOL DEFAULT 0,
  `show_title` BOOL DEFAULT 1,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;


CREATE TABLE IF NOT EXISTS `opening_hours` (
  `id` INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `loc_id` INT(11) NOT NULL,
  `day` INT NOT NULL,
  `open` TIME NOT NULL,
  `close` TIME NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`loc_id`) REFERENCES locations(`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `location_tags` (
  `id` INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `loc_id` INT(11) NOT NULL,
  `tag` TINYTEXT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`loc_id`) REFERENCES locations(`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `location_images` (
  `id` INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `loc_id` INT(11) NOT NULL,
  `path` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`loc_id`) REFERENCES locations(`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

CREATE TABLE IF NOT EXISTS `phone_numbers` (
  `id` INT(11) NOT NULL AUTO_INCREMENT UNIQUE,
  `loc_id` INT(11) NOT NULL,
  `country_code` CHAR(2),
  `number` VARCHAR(8),
  PRIMARY KEY (`id`),
  FOREIGN KEY (`loc_id`) REFERENCES locations(`id`)
) DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;
