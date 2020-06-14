-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 14, 2020 at 03:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alin-jocuri`
--

-- --------------------------------------------------------

--
-- Table structure for table `developer`
--

CREATE TABLE `developer` (
  `developer_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `HQ` varchar(50) NOT NULL,
  `founded` date NOT NULL,
  `management_id` int(11) DEFAULT NULL,
  `platform_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `developer`
--

INSERT INTO `developer` (`developer_id`, `name`, `HQ`, `founded`, `management_id`, `platform_id`) VALUES
(1, 'CD Projekt Red', 'Warsaw , Poland', '1994-05-08', 1, 1),
(2, 'Infinity Ward', 'Woodland Hills, California , United States', '2002-05-18', 2, NULL),
(3, 'FromSoftware', 'Tokyo , Japan', '1989-11-01', 14, NULL),
(4, 'Valve Corporation', 'Bellevue, Washington , US', '1996-08-24', 3, 2),
(5, 'Rockstar Studios', 'New York City , US', '1998-12-15', 5, 6),
(6, 'Rockstar North', 'Edinburgh , Scotland', '1987-02-07', 6, NULL),
(7, 'Riot Games', 'Los Angeles , US', '2006-09-05', 7, NULL),
(8, 'PUBG Corporation', 'Madison, Wisconsin', '2015-01-27', 15, NULL),
(9, 'Blizzard Entertainment', 'Irvine, California , U.S', '1991-02-14', 16, 3),
(10, 'id Software', 'Richardson, Texas , U.S.', '1991-02-01', 9, NULL),
(11, 'Bethesda Game Studios', 'Rockville, Maryland , U.S', '2001-07-20', 17, NULL),
(12, 'Ubisoft Quebec', 'Quebec City , Canada', '2005-06-27', 10, 5),
(13, 'Respawn Entertainment', 'Sherman Oaks, California , U.S.', '2010-04-12', 2, NULL),
(14, 'Electronic Arts', 'Redwood City, California , US', '1982-05-27', 12, 4),
(15, 'Kojima Productions', 'Japan', '2005-04-01', 18, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `digital_platform`
--

CREATE TABLE `digital_platform` (
  `platform_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `release_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `digital_platform`
--

INSERT INTO `digital_platform` (`platform_id`, `name`, `release_date`) VALUES
(1, 'GOG.com', '2008-06-20'),
(2, 'Steam', '2003-09-12'),
(3, 'Battle.net', '1996-12-31'),
(4, 'Origin', '2011-06-03'),
(5, 'Uplay', '2012-07-03'),
(6, 'Rockstar Games Social Club', '2008-04-17');

-- --------------------------------------------------------

--
-- Table structure for table `film_adaptation`
--

CREATE TABLE `film_adaptation` (
  `adaptation_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `created_by` varchar(30) NOT NULL,
  `network` varchar(30) NOT NULL,
  `release_date` date NOT NULL,
  `game_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film_adaptation`
--

INSERT INTO `film_adaptation` (`adaptation_id`, `name`, `created_by`, `network`, `release_date`, `game_id`) VALUES
(1, 'The Witcher', 'Lauren Schmidt Hissrich', 'Netflix', '2019-12-20', 1),
(2, 'Assassin\'s Creed', 'Justin Kurzel', 'Cinema', '2006-12-13', 12);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `developer_id` int(11) DEFAULT NULL,
  `publisher_id` int(11) DEFAULT NULL,
  `genre` varchar(50) NOT NULL,
  `modes` varchar(30) NOT NULL,
  `release_date` date NOT NULL,
  `imagePath` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `title`, `developer_id`, `publisher_id`, `genre`, `modes`, `release_date`, `imagePath`) VALUES
(1, 'The Witcher 3 Wild Hunt', 1, 1, 'Action role-playing', 'Single-player', '2015-05-19', 'uploads/the witcher 3 wild hunt.jpg'),
(2, 'Call of Duty Modern Warfare', 2, 2, 'First-person shooter', 'Single-player, multiplayer', '2019-10-25', 'uploads/call of duty modern warfare.jpg'),
(3, 'Sekiro Shadows Die Twice', 3, 2, 'Action-adventure', 'Single-player', '2019-03-22', 'uploads/sekiro shadows die twice.jpg'),
(4, 'Red Dead Redemption 2', 5, 3, 'Action-adventure', 'Single-player, multiplayer', '2019-11-05', 'uploads/red dead redemption 2.jpg'),
(5, 'Grand Theft Auto V', 6, 3, 'Action-adventure', 'Single-player, multiplayer', '2013-09-13', 'uploads/grand theft auto v.jpg'),
(6, 'League of Legends', 7, 4, 'MOBA', 'Multiplayer', '2007-10-27', 'uploads/league of legends.jpg'),
(7, 'PlayerUnknown\'s Battlegrounds', 8, 5, 'Battle royale', 'Multiplayer', '2017-12-20', 'uploads/playerunknown\'s battlegrounds.jpg'),
(8, 'Overwatch', 9, 6, 'First-person shooter', 'Multiplayer', '2016-05-24', 'uploads/overwatch.jpg'),
(9, 'Cyberpunk 2077', 1, 1, 'Role-playing', 'Single-player, multiplayer', '2020-09-17', 'uploads/cyberpunk 2077.jpg'),
(10, 'Doom Eternal', 10, 7, 'First-person shooter', 'Single-player, multiplayer', '2020-03-20', 'uploads/doom eternal.jpg'),
(11, 'The Elder Scrolls V Skyrim', 11, 7, 'Action role-playing', 'Single-player', '2011-11-11', 'uploads/the elder scrolls v skyrim.jpg'),
(12, 'Assassin\'s Creed Odyssey', 12, 8, 'Action role-playing, stealth', 'Single-player', '2018-10-05', 'uploads/assassin\'s creed odyssey.jpg'),
(15, 'Apex Legends', 13, 9, 'Battle royale, first-person shooter', 'Multiplayer', '2019-02-04', 'uploads/apex legends.jpg'),
(16, 'Valorant', 7, 4, 'First-person shooter', 'Multiplayer', '2020-06-02', 'uploads/valorant.jpg'),
(17, 'Death Stranding', 15, 10, 'Action', 'Single-player', '2020-07-14', 'uploads/death stranding.jpg'),
(19, 'Counter-Strike Global Offensive', 4, 11, 'First-person shooter', 'Multiplayer', '2012-08-21', 'uploads/counter-strike global offensive.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `game_platform`
--

CREATE TABLE `game_platform` (
  `gplatform_id` int(11) NOT NULL,
  `game_id` int(11) DEFAULT NULL,
  `platform_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game_platform`
--

INSERT INTO `game_platform` (`gplatform_id`, `game_id`, `platform_id`) VALUES
(1, 9, 1),
(2, 9, 2),
(3, 15, 4),
(4, 12, 2),
(5, 12, 5),
(6, 2, 3),
(22, 6, NULL),
(23, 10, 2),
(24, 5, 6),
(25, 8, 3),
(26, 7, 2),
(27, 11, 2),
(28, 4, 2),
(29, 16, NULL),
(30, 1, 1),
(31, 1, 2),
(32, 3, 2),
(34, 4, 6),
(35, 17, 2),
(36, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `management_dev`
--

CREATE TABLE `management_dev` (
  `management_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `position` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management_dev`
--

INSERT INTO `management_dev` (`management_id`, `name`, `position`, `nationality`) VALUES
(1, 'Adam Kiciński', 'CEO', 'Polish'),
(2, 'Vince Zampella', 'CEO', 'American'),
(3, 'Gabe Newell', 'President', 'American'),
(5, 'Sam Houser', 'President', 'British'),
(6, 'David Jones', 'Co-founder', 'Scottish '),
(7, 'Nicolo Laurent', 'CEO', 'French'),
(9, 'Robert Duffy', 'CTO', 'American'),
(10, 'Andrée Cossette', 'Managing Director', 'French'),
(12, 'Andrew Wilson', 'CEO', 'Australian-American'),
(14, 'Hidetaka Miyazaki', 'President', 'Japanese'),
(15, 'Hyo-Seob Kim', 'CEO', 'Korean'),
(16, 'Michael Morhaime', 'President', 'American'),
(17, 'Todd Howard', 'Executive Producer', 'American'),
(18, 'Hideo Kojima', 'Director', 'Japanese');

-- --------------------------------------------------------

--
-- Table structure for table `management_pub`
--

CREATE TABLE `management_pub` (
  `management_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `position` varchar(50) NOT NULL,
  `nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `management_pub`
--

INSERT INTO `management_pub` (`management_id`, `name`, `position`, `nationality`) VALUES
(1, 'Adam Kiciński', 'CEO', 'Polish'),
(3, 'Sam Houser', 'President', 'American'),
(4, 'Nicolo Laurent', 'CEO', 'French'),
(7, 'Yves Guillemot', 'CEO', 'French'),
(8, 'Andrew Wilson', 'CEO', 'American'),
(9, 'Rob Kostich', 'President', 'American'),
(10, 'Hyo-Seob Kim', 'CEO', 'Korean'),
(11, 'Michael Morhaime', 'President', 'American'),
(12, 'Christopher Weaver', 'Founder', 'American'),
(13, 'Neil Ralley', 'President', 'American'),
(14, 'Gabe Newell', 'President', 'American');

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `publisher_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `HQ` varchar(50) NOT NULL,
  `founded` date NOT NULL,
  `management_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`publisher_id`, `name`, `HQ`, `founded`, `management_id`) VALUES
(1, 'CD Projekt', 'Warsaw , Poland', '1994-05-08', 1),
(2, 'Activision', 'Santa Monica, California , US', '1970-10-01', 9),
(3, 'Rockstar Games', 'New York City , US', '1998-12-15', 3),
(4, 'Riot Games', 'Los Angeles , US', '2006-09-05', 4),
(5, 'PUBG Corporation', 'Madison, Wisconsin', '2015-01-27', 10),
(6, 'Blizzard Entertainment', 'Irvine, California , U.S', '1991-02-14', 11),
(7, 'Bethesda Softworks', 'Rockville, Maryland , U.S.', '1986-06-28', 12),
(8, 'Ubisoft', 'Montreuil , France', '1986-03-28', 7),
(9, 'Electronic Arts', 'Redwood City, California , US', '1982-05-27', 8),
(10, '505 Games', 'Milan, Italy', '2006-03-10', 13),
(11, 'Valve Corporation', 'Bellevue, Washington, US', '1996-08-24', 14);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `developer`
--
ALTER TABLE `developer`
  ADD PRIMARY KEY (`developer_id`),
  ADD KEY `developer_ibfk_1` (`platform_id`),
  ADD KEY `management_id` (`management_id`);

--
-- Indexes for table `digital_platform`
--
ALTER TABLE `digital_platform`
  ADD PRIMARY KEY (`platform_id`);

--
-- Indexes for table `film_adaptation`
--
ALTER TABLE `film_adaptation`
  ADD PRIMARY KEY (`adaptation_id`),
  ADD KEY `film_adaptation_ibfk_1` (`game_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `game_ibfk_1` (`developer_id`),
  ADD KEY `game_ibfk_2` (`publisher_id`);

--
-- Indexes for table `game_platform`
--
ALTER TABLE `game_platform`
  ADD PRIMARY KEY (`gplatform_id`),
  ADD KEY `game_platform_ibfk_1` (`game_id`),
  ADD KEY `game_platform_ibfk_2` (`platform_id`);

--
-- Indexes for table `management_dev`
--
ALTER TABLE `management_dev`
  ADD PRIMARY KEY (`management_id`);

--
-- Indexes for table `management_pub`
--
ALTER TABLE `management_pub`
  ADD PRIMARY KEY (`management_id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`publisher_id`),
  ADD KEY `management_id` (`management_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `developer`
--
ALTER TABLE `developer`
  MODIFY `developer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `digital_platform`
--
ALTER TABLE `digital_platform`
  MODIFY `platform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `film_adaptation`
--
ALTER TABLE `film_adaptation`
  MODIFY `adaptation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `game_platform`
--
ALTER TABLE `game_platform`
  MODIFY `gplatform_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `management_dev`
--
ALTER TABLE `management_dev`
  MODIFY `management_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `management_pub`
--
ALTER TABLE `management_pub`
  MODIFY `management_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `publisher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `developer`
--
ALTER TABLE `developer`
  ADD CONSTRAINT `developer_ibfk_1` FOREIGN KEY (`platform_id`) REFERENCES `digital_platform` (`platform_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `developer_ibfk_2` FOREIGN KEY (`management_id`) REFERENCES `management_dev` (`management_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `film_adaptation`
--
ALTER TABLE `film_adaptation`
  ADD CONSTRAINT `film_adaptation_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`developer_id`) REFERENCES `developer` (`developer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_ibfk_2` FOREIGN KEY (`publisher_id`) REFERENCES `publisher` (`publisher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `game_platform`
--
ALTER TABLE `game_platform`
  ADD CONSTRAINT `game_platform_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `game_platform_ibfk_2` FOREIGN KEY (`platform_id`) REFERENCES `digital_platform` (`platform_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `publisher`
--
ALTER TABLE `publisher`
  ADD CONSTRAINT `publisher_ibfk_1` FOREIGN KEY (`management_id`) REFERENCES `management_pub` (`management_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
