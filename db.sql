-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 25, 2017 at 12:22 PM
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
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `firstname` text NOT NULL,
  `email` text NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `firstname`, `email`, `subject`, `message`) VALUES
(1, 'name', 'email', 'subject', 'message'),
(2, 'asdg', 'asdlkgj', '1230597', 'askldjgalsg'),
(3, 'name', 'emagm', '1023975', 'alsjkdgajsdg'),
(4, 'test', 'test@gmail.com', 'test', 'test');

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
  `campus` text NOT NULL,
  `distance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `description`, `address`, `URL`, `takeaway`, `delivery`, `show_title`, `campus`, `distance`) VALUES
(9, 'REMA 1000', 'Har alt man skulle trenge av dagligvare produkter, og ligger under 5 minutter fra fjerdingen campus.', 'Christian Krohgs gate 1', 'https://www.rema.no/butikker/Oslo/rema-1000-christian-krohgsgate/1499929', 0, 0, 0, 'fjerdingen', 4),
(10, 'Sea Sushi Bar AS', 'Sea Sushi holder til i Brugata 3 i Oslo, de leverer sushi av høy kvalitet og hos dem er kvaliteten av produktet i fokus.', 'Brugata 3A', 'http://seasushibar.no', 0, 0, 0, 'fjerdingen', 6),
(11, 'Grytelokket', 'Grytelokket i Storgata lager smakefulle hamburgere og kebaber.', 'Storgata 45', 'http://grytelokket.no', 1, 1, 0, 'fjerdingen', 4),
(12, 'Marmaris Pizza & Grill', 'Marmais server god shawarma, kebab og pizza. Man kan både spise innendørs eller ta med seg maten.', 'Storgata 45A', NULL, 1, 0, 0, 'fjerdingen', 4),
(13, 'Coop Prix', 'Coop Prix er dagligvarekjeden med de gode dealene. Coop Prix hjelper deg med rask og enkel handel, og gir deg middagstipsene som gjør hverdagen enklere.', 'Hausmanns gate 19', 'https://coop.no/butikker/prix/hausmannsgate/', 0, 0, 0, 'fjerdingen', 5),
(14, 'Sifa Restaurant', 'Server god mat og de kan levere om man skulle ønske det.', 'Motzfeldts gate 7', '', 0, 1, 0, 'fjerdingen', 6),
(15, 'Kebabish Original', 'Kebabish Original inviterer deg til å komme og nyte deres mat med et utvalg av smaker fra hele Middelhavet, Sentral-Asia og det indiske subkontinentet, i et komfortabelt, moderne miljø – perfekt for enhver anledning.', 'Breigata 12', 'http://kebabishoriginal.no', 1, 0, 0, 'fjerdingen', 5),
(16, 'Gaasa As', 'Nye mikrobrygg på fat og flasker hver uke, de har god vin til snille priser.', 'Storgata 36 B', 'http://gaasa.no', 0, 0, 0, 'fjerdingen', 5),
(17, 'Crowbar & Bryggeri', 'Crowbar & Bryggeri serverer både god mat og drikke.', 'Torggata 32', 'http://crowbryggeri.com', 0, 0, 0, 'fjerdingen', 7),
(18, 'Starbucks', 'Starbucks på Torggata lever kaffe på klassisk Starbucks vis.', 'Torggata 17B', 'http://starbucks.no', 0, 0, 0, 'fjerdingen', 8),
(19, 'SYNG', 'SYNG er en hyggelig bar som også leier ut karaokerom, der gamle og nye venner kan ha sangfester og synge hverandre glade.', 'Nedre gate 7', 'http://syng.no', 0, 0, 0, 'brenneriveien', 2),
(20, 'Bislett Kebab House', 'Bislett Kebab House er kjent for god mat, rask service, heftige porsjoner og – ikke minst – lave priser.', 'Thorvald Meyers gate 83', 'http://bislettkebabhouse.no', 0, 0, 0, 'brenneriveien', 7),
(21, 'Vegan Loving Hut Oslo', 'Vegan Loving Hut Oslo server vegansk mat, her kan du blant annet få servert burger, pizza, kebab, nuddelsupper.', 'Fredensborgveien 29', 'http://veganlovinghut.no', 0, 0, 0, 'brenneriveien', 6),
(22, 'NAM KANG', 'Restaurant Nam Kang byr på øst-asiatisk mat av høy kvalitet fra Kina, Korea og Japan.', 'Fredensborgveien 24B', 'http://namkang.no', 0, 0, 0, 'brenneriveien', 6),
(23, 'Funky Fresh Foods', 'Funky Fresh Foods er et vegansk og raw konsept som lager mat med spennende smaker og sprakende farger. ', 'Hausmanns gate 16', 'http://funkyfreshfoods.no', 0, 0, 0, 'brenneriveien', 4),
(24, 'Kiwi', 'Hos Kiwi kan du kjøpe sunt, raskt og billig.', 'Møllergata 56-58', 'http://kiwi.no', 0, 0, 0, 'brenneriveien', 3),
(25, 'Mitsu Kafe & Sushi', 'Serverer enkel, men god japansk inspirert sushi.', 'Møllergata 42', 'http://mitsukafe.no', 0, 0, 0, 'brenneriveien', 4),
(27, 'Arno Ristorante', 'Ved Arno har de en lidenskap for å lage god italiensk mat som bruschetta, pizza og kaker.', 'Fredensborgveien 30B', 'http://arnoristorante.no', 0, 0, 0, 'brenneriveien', 6),
(28, 'Gourmet Pizza & Grill', 'Gourmet Pizza & Grill tilbyr et stort utvalg av retter og her kan du få pizza, burgere og kebab', 'Rosteds gate 5', 'http://gourmetpizzaoggrill-oslo.com', 1, 0, 0, 'brenneriveien', 3),
(29, 'Tim Wendelboe', 'Tim Wendelboe streber etter å levere den beste kaffen i verden. Kvalitet, innovasjon og kunnskap er i fokus.', 'Grüners gate 1', 'http://timwendelboe.no', 0, 0, 0, 'vulkan', 5),
(31, 'Døgnvill Burger', 'Lokalet er designet som en moderne amerikansk diner med elementer fra industri. Her vil du servert kvalitets burgere.', 'Vulkan 12', 'http://dognvillburger.no', 0, 0, 0, 'vulkan', 2),
(32, 'REMA 1000', 'Ligger rett ved campus Vulkan, 50 meter unna!', 'Maridalsveien 15', 'http://rema.no', 0, 0, 0, 'vulkan', 1),
(33, 'Kaffebrenneriet', 'Kom innom Kaffebrenneriet for kaffeopplevelser laget med lidenskap, kunnskap og kvalitet! De tilbyr også kaffe i løsvekt og fristende bakervarer fra vårt eget bakeri.', 'Thorvald Meyers gate 55', 'http://kaffebrenneriet.no', 0, 0, 0, 'vulkan', 7),
(34, 'Mamo Sushi', 'Har en klassisk og enkel meny, maten er god og man kan forvente seg en god mat opplevelse.', 'Helgesens gate 16B', '', 1, 0, 0, 'vulkan', 7),
(35, 'Mathallen', 'Mathallen har sitt forbilde i de europeiske mathallene. Her finner du spesialbutikker, kafeer og spisesteder.', 'Vulkan 5', 'http://mathallenoslo.no', 0, 0, 0, 'vulkan', 1),
(36, 'Hitchhiker', 'Hitchhiker er en restaurant inspirert av alle gatehjørner verden over. Deres streetfood-inspirerte meny vil gi deg en spennende matopplevelse.', 'Vulkan 5A', 'http://hitchhiker.no', 0, 0, 0, 'vulkan', 1),
(37, 'Cafe-Bar Memphis', 'Serverer god mat, har bra atmosfære og hyggelige ansatte.', 'Thorvald Meyers gate 63', 'http://memphis.no', 0, 0, 0, 'vulkan', 9),
(39, 'Food Express', 'Matbutikken med kortet distanse fra campus fjerdingen.', 'Chr Kroghs Gate 36', '', 0, 0, 0, 'fjerdingen', 1),
(40, 'KIWI', 'Hos Kiwi kan du kjøpe sunt, raskt og billig.', 'Markveien 35B', 'http://kiwi.no', 0, 0, 0, 'vulkan', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `location_images`
--

CREATE TABLE `location_images` (
  `id` int(11) NOT NULL,
  `loc_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `location_images`
--

INSERT INTO `location_images` (`id`, `loc_id`, `path`) VALUES
(5, 14, 'Fjerdingen-imgs/F_SifaRestaurant.jpg'),
(6, 15, 'Fjerdingen-imgs/F_Kebabish.jpg'),
(7, 16, 'Fjerdingen-imgs/F_Gaasa.jpg'),
(8, 17, 'Fjerdingen-imgs/F_Crowbar.jpg'),
(9, 18, 'Fjerdingen-imgs/F_Starbucks.JPG'),
(10, 19, 'Brenneriveien-imgs/B_SYNG.jpg'),
(11, 20, 'Brenneriveien-imgs/B_BislettKebabHouse.jpg'),
(12, 21, 'Brenneriveien-imgs/B_VeganLovingHut.jpg'),
(13, 22, 'Brenneriveien-imgs/B_NamKang.jpg'),
(14, 23, 'Brenneriveien-imgs/B_FunkyFreshFoods.jpg'),
(15, 24, 'Brenneriveien-imgs/B_Kiwi.jpg'),
(16, 25, 'Brenneriveien-imgs/B_MitsuKafe.jpg'),
(18, 27, 'Brenneriveien-imgs/B_arno.jpg'),
(19, 28, 'Brenneriveien-imgs/B_GourmePizza.jpg'),
(20, 29, 'Vulkan-imgs/V_TimWendelboe.jpg'),
(22, 31, 'Vulkan-imgs/V_Døgnvill.JPG'),
(23, 32, 'Vulkan-imgs/V_Rema1000.jpg'),
(24, 33, 'Vulkan-imgs/V_Kaffebrenneriet.JPG'),
(25, 34, 'Vulkan-imgs/V_MamoSushi.jpg'),
(26, 35, 'Vulkan-imgs/V_Mathallen.JPG'),
(27, 36, 'Vulkan-imgs/V_MathallenInne.jpg'),
(28, 37, 'Vulkan-imgs/V_memphis.JPG'),
(30, 39, 'Fjerdingen-imgs/F_FoodExpress.jpg'),
(31, 40, 'Vulkan-imgs/V_Kiwi.JPG'),
(32, 9, 'Fjerdingen-imgs/F_Rema1000.JPG'),
(33, 10, 'Fjerdingen-imgs/F_SeaSushi.jpg'),
(34, 11, 'Fjerdingen-imgs/F_Grytelokket.jpg'),
(35, 12, 'Fjerdingen-imgs/F_MarmarisPizza.jpg'),
(36, 13, 'Fjerdingen-imgs/F_CoopPrix.jpg');

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
(8, 9, 'Dagligvare'),
(9, 10, 'Restaurant'),
(10, 11, 'Fastfood'),
(11, 12, 'Fastfood'),
(12, 12, 'Restaurant'),
(13, 11, 'Restaurant'),
(15, 13, 'Dagligvare'),
(16, 14, 'Restaurant'),
(17, 15, 'Restaurant'),
(18, 15, 'Tyrkisk'),
(19, 16, 'Bar'),
(20, 16, 'Mikrobrygg'),
(21, 17, 'Bar'),
(22, 18, 'Kaffebar'),
(23, 19, 'Bar'),
(24, 20, 'Restaurant'),
(25, 21, 'Restaurant'),
(26, 21, 'Vegansk'),
(27, 22, 'Restaurant'),
(28, 22, 'Sushi'),
(29, 23, 'Restaurant'),
(30, 24, 'Dagligvare'),
(31, 25, 'Restaurant'),
(32, 25, 'Sushi'),
(34, 27, 'Italiensk'),
(35, 27, 'Restaurant'),
(36, 28, 'Pizza'),
(37, 28, 'Restaurant'),
(38, 29, 'Kaffebar'),
(39, 29, ''),
(41, 31, 'Fastfood'),
(42, 31, 'Restaurant'),
(43, 32, 'Dagligvare'),
(44, 33, 'Kaffebar'),
(45, 34, 'Sushi'),
(46, 34, 'Restaurant'),
(47, 35, 'Food Court'),
(48, 36, 'Restaurant'),
(49, 37, 'Kaffebar'),
(51, 20, 'Fastfood'),
(52, 23, 'Vegansk'),
(53, 39, 'Dagligvare'),
(54, 18, ''),
(55, 40, 'Dagligvare');

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
(17, 9, 5, '08:00:00', '22:00:00'),
(18, 10, 0, '11:00:00', '22:00:00'),
(19, 10, 1, '11:00:00', '22:00:00'),
(20, 10, 2, '11:00:00', '22:00:00'),
(21, 10, 3, '11:00:00', '22:00:00'),
(22, 10, 4, '11:00:00', '22:00:00'),
(23, 10, 5, '11:00:00', '22:00:00'),
(24, 10, 6, '13:00:00', '22:00:00'),
(25, 11, 0, '11:00:00', '03:30:00'),
(26, 11, 1, '11:00:00', '03:30:00'),
(27, 11, 2, '11:00:00', '03:30:00'),
(28, 11, 3, '11:00:00', '03:30:00'),
(29, 11, 4, '11:00:00', '03:30:00'),
(30, 11, 5, '11:00:00', '03:30:00'),
(31, 11, 6, '12:00:00', '03:30:00'),
(32, 12, 0, '10:00:00', '05:00:00'),
(33, 12, 1, '10:00:00', '05:00:00'),
(34, 12, 2, '10:00:00', '05:00:00'),
(35, 12, 3, '10:00:00', '05:00:00'),
(36, 12, 4, '10:00:00', '05:00:00'),
(37, 12, 5, '10:00:00', '06:00:00'),
(38, 12, 6, '10:00:00', '06:00:00'),
(39, 13, 0, '06:00:00', '00:00:00'),
(40, 13, 1, '06:00:00', '00:00:00'),
(41, 13, 2, '06:00:00', '00:00:00'),
(42, 13, 3, '06:00:00', '00:00:00'),
(43, 13, 4, '06:00:00', '00:00:00'),
(44, 13, 5, '08:00:00', '00:00:00'),
(45, 14, 0, '08:00:00', '23:00:00'),
(46, 14, 1, '08:00:00', '23:00:00'),
(47, 14, 2, '08:00:00', '23:00:00'),
(48, 14, 3, '08:00:00', '23:00:00'),
(49, 14, 4, '08:00:00', '23:00:00'),
(50, 14, 5, '08:00:00', '23:00:00'),
(51, 15, 0, '13:00:00', '23:00:00'),
(52, 15, 1, '13:00:00', '23:00:00'),
(53, 15, 2, '13:00:00', '23:00:00'),
(54, 15, 3, '13:00:00', '23:00:00'),
(55, 15, 4, '13:00:00', '00:00:00'),
(56, 15, 5, '13:00:00', '00:00:00'),
(57, 15, 6, '13:00:00', '00:00:00'),
(58, 16, 0, '16:00:00', '23:00:00'),
(59, 16, 1, '16:00:00', '23:00:00'),
(60, 16, 2, '16:00:00', '01:00:00'),
(61, 16, 3, '16:00:00', '01:00:00'),
(62, 16, 4, '16:00:00', '03:00:00'),
(63, 16, 5, '16:00:00', '03:00:00'),
(64, 16, 6, '16:00:00', '23:00:00'),
(65, 17, 0, '15:00:00', '03:00:00'),
(66, 17, 1, '15:00:00', '03:00:00'),
(67, 17, 2, '15:00:00', '03:00:00'),
(68, 17, 3, '15:00:00', '03:00:00'),
(69, 17, 4, '15:00:00', '03:00:00'),
(70, 17, 5, '13:00:00', '03:00:00'),
(71, 17, 6, '15:00:00', '03:00:00'),
(72, 18, 0, '07:00:00', '20:00:00'),
(73, 18, 1, '07:00:00', '20:00:00'),
(74, 18, 2, '07:00:00', '20:00:00'),
(75, 18, 3, '07:00:00', '20:00:00'),
(76, 18, 4, '07:00:00', '20:00:00'),
(77, 18, 5, '09:00:00', '20:00:00'),
(78, 18, 6, '10:00:00', '19:00:00'),
(86, 20, 0, '10:00:00', '03:30:00'),
(87, 20, 1, '10:00:00', '03:30:00'),
(88, 20, 2, '10:00:00', '03:30:00'),
(89, 20, 3, '10:00:00', '03:30:00'),
(90, 20, 4, '10:00:00', '03:30:00'),
(91, 20, 5, '10:00:00', '03:30:00'),
(92, 20, 6, '10:00:00', '00:00:00'),
(93, 19, 0, '14:00:00', '01:00:00'),
(94, 19, 1, '14:00:00', '01:00:00'),
(95, 19, 2, '14:00:00', '01:00:00'),
(96, 19, 3, '14:00:00', '01:00:00'),
(97, 19, 4, '14:00:00', '03:30:00'),
(98, 19, 5, '12:00:00', '03:30:00'),
(99, 19, 6, '12:00:00', '01:00:00'),
(100, 21, 0, '12:00:00', '20:00:00'),
(101, 21, 1, '12:00:00', '20:00:00'),
(102, 21, 2, '12:00:00', '20:00:00'),
(103, 21, 3, '12:00:00', '20:00:00'),
(104, 21, 4, '12:00:00', '20:00:00'),
(105, 21, 5, '12:00:00', '20:00:00'),
(106, 21, 6, '13:00:00', '20:00:00'),
(107, 22, 0, '11:00:00', '22:00:00'),
(108, 22, 1, '11:00:00', '22:00:00'),
(109, 22, 2, '11:00:00', '22:00:00'),
(110, 22, 3, '11:00:00', '22:00:00'),
(111, 22, 4, '11:00:00', '22:00:00'),
(112, 22, 5, '11:00:00', '22:00:00'),
(113, 22, 6, '11:00:00', '22:00:00'),
(114, 23, 0, '11:00:00', '20:00:00'),
(115, 23, 1, '11:00:00', '20:00:00'),
(116, 23, 2, '11:00:00', '22:00:00'),
(117, 23, 3, '11:00:00', '22:00:00'),
(118, 23, 4, '11:00:00', '22:00:00'),
(119, 23, 5, '12:00:00', '22:00:00'),
(120, 23, 6, '12:00:00', '20:00:00'),
(121, 24, 0, '07:00:00', '23:00:00'),
(122, 24, 1, '07:00:00', '23:00:00'),
(123, 24, 2, '07:00:00', '23:00:00'),
(124, 24, 3, '07:00:00', '23:00:00'),
(125, 24, 4, '07:00:00', '23:00:00'),
(126, 24, 5, '07:00:00', '23:00:00'),
(127, 25, 0, '10:00:00', '21:00:00'),
(128, 25, 1, '10:00:00', '21:00:00'),
(129, 25, 2, '10:00:00', '21:00:00'),
(130, 25, 3, '10:00:00', '21:00:00'),
(131, 25, 4, '10:00:00', '21:00:00'),
(132, 25, 5, '12:00:00', '21:00:00'),
(140, 27, 0, '00:00:00', '00:00:00'),
(141, 27, 1, '16:00:00', '23:00:00'),
(142, 27, 2, '16:00:00', '23:00:00'),
(143, 27, 3, '16:00:00', '23:00:00'),
(144, 27, 4, '16:00:00', '23:00:00'),
(145, 27, 5, '16:00:00', '23:00:00'),
(146, 27, 6, '00:00:00', '00:00:00'),
(147, 28, 0, '15:00:00', '23:00:00'),
(148, 28, 1, '15:00:00', '23:00:00'),
(149, 28, 2, '15:00:00', '23:00:00'),
(150, 28, 3, '15:00:00', '23:00:00'),
(151, 28, 4, '15:00:00', '23:00:00'),
(152, 28, 5, '15:00:00', '23:00:00'),
(153, 28, 6, '15:00:00', '23:00:00'),
(154, 29, 0, '08:30:00', '18:00:00'),
(155, 29, 1, '08:30:00', '18:00:00'),
(156, 29, 2, '08:30:00', '18:00:00'),
(157, 29, 3, '08:30:00', '18:00:00'),
(158, 29, 4, '08:30:00', '18:00:00'),
(159, 29, 5, '11:00:00', '17:00:00'),
(160, 29, 6, '11:00:00', '17:00:00'),
(168, 31, 0, '12:00:00', '23:00:00'),
(169, 31, 1, '12:00:00', '23:00:00'),
(170, 31, 2, '12:00:00', '23:00:00'),
(171, 31, 3, '12:00:00', '00:00:00'),
(172, 31, 4, '12:00:00', '23:00:00'),
(173, 31, 5, '12:00:00', '23:00:00'),
(174, 31, 6, '12:00:00', '23:00:00'),
(175, 32, 0, '07:00:00', '23:00:00'),
(176, 32, 1, '07:00:00', '23:00:00'),
(177, 32, 2, '07:00:00', '23:00:00'),
(178, 32, 3, '07:00:00', '23:00:00'),
(179, 32, 4, '07:00:00', '23:00:00'),
(180, 32, 5, '08:00:00', '21:00:00'),
(181, 32, 6, '00:00:00', '00:00:00'),
(182, 33, 0, '07:00:00', '19:00:00'),
(183, 33, 1, '07:00:00', '19:00:00'),
(184, 33, 2, '07:00:00', '19:00:00'),
(185, 33, 3, '07:00:00', '19:00:00'),
(186, 33, 4, '07:00:00', '19:00:00'),
(187, 33, 5, '08:00:00', '18:00:00'),
(188, 33, 6, '09:00:00', '18:00:00'),
(189, 34, 0, '15:00:00', '22:00:00'),
(190, 34, 1, '15:00:00', '22:00:00'),
(191, 34, 2, '15:00:00', '22:00:00'),
(192, 34, 3, '15:00:00', '22:00:00'),
(193, 34, 4, '15:00:00', '23:00:00'),
(194, 34, 5, '15:00:00', '23:00:00'),
(195, 34, 6, '15:00:00', '22:00:00'),
(196, 35, 0, '00:00:00', '00:00:00'),
(197, 35, 1, '08:00:00', '01:00:00'),
(198, 35, 2, '08:00:00', '01:00:00'),
(199, 35, 3, '08:00:00', '01:00:00'),
(200, 35, 4, '08:00:00', '03:00:00'),
(201, 35, 5, '09:30:00', '03:00:00'),
(202, 35, 6, '09:30:00', '01:00:00'),
(203, 36, 0, '00:00:00', '00:00:00'),
(204, 36, 1, '11:00:00', '01:00:00'),
(205, 36, 2, '11:00:00', '01:00:00'),
(206, 36, 3, '11:00:00', '01:00:00'),
(207, 36, 4, '11:00:00', '01:00:00'),
(208, 36, 5, '11:00:00', '01:00:00'),
(209, 36, 6, '12:00:00', '18:00:00'),
(210, 37, 0, '11:00:00', '03:00:00'),
(211, 37, 1, '11:00:00', '03:00:00'),
(212, 37, 2, '11:00:00', '03:00:00'),
(213, 37, 3, '11:00:00', '03:00:00'),
(214, 37, 4, '11:00:00', '03:00:00'),
(215, 37, 5, '11:00:00', '03:00:00'),
(216, 37, 6, '12:00:00', '03:00:00'),
(224, 39, 0, '09:00:00', '23:00:00'),
(225, 39, 1, '09:00:00', '23:00:00'),
(226, 39, 2, '09:00:00', '23:00:00'),
(227, 39, 3, '09:00:00', '23:00:00'),
(228, 39, 4, '09:00:00', '23:00:00'),
(229, 39, 5, '09:00:00', '23:00:00'),
(230, 39, 6, '09:00:00', '23:00:00'),
(231, 40, 0, '07:00:00', '23:00:00'),
(232, 40, 1, '07:00:00', '23:00:00'),
(233, 40, 2, '07:00:00', '23:00:00'),
(234, 40, 3, '07:00:00', '23:00:00'),
(235, 40, 4, '07:00:00', '23:00:00'),
(236, 40, 5, '07:00:00', '23:00:00'),
(237, 40, 6, '00:00:00', '00:00:00');

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
(4, 9, '47', '22172660'),
(5, 10, '47', '22170705'),
(6, 11, '47', '22114739'),
(7, 12, '47', '22364910'),
(8, 13, '47', '22115633'),
(9, 14, '47', '22051717'),
(10, 15, '47', '22174646'),
(11, 16, '47', '45416469'),
(12, 17, '47', ''),
(13, 18, '47', '40638839'),
(14, 19, '47', '41525050'),
(15, 20, '47', '22468044'),
(16, 21, '47', '22202040'),
(17, 22, '47', '22201940'),
(18, 23, '47', '45915779'),
(19, 24, '47', '22360137'),
(20, 25, '47', ''),
(22, 27, '47', ''),
(23, 28, '47', '22362800'),
(24, 29, '47', '40004062'),
(26, 31, '47', '21385010'),
(27, 32, '47', '22608908'),
(28, 33, '47', '95262683'),
(29, 34, '47', '22371038'),
(30, 35, '47', '40001209'),
(31, 36, '47', '95451466'),
(32, 37, '47', '22041275'),
(34, 39, '47', ''),
(35, 40, '47', '22376180');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `location_images`
--
ALTER TABLE `location_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `location_tags`
--
ALTER TABLE `location_tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `opening_hours`
--
ALTER TABLE `opening_hours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;
--
-- AUTO_INCREMENT for table `phone_numbers`
--
ALTER TABLE `phone_numbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
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
