CREATE DATABASE IF NOT EXISTS `laramax`;

USE `laramax`;

-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2020 at 06:36 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laramax`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'john@example.com', '$2y$12$hkOZYULXfsgeT0F0H6VP4eJ1HKxXBIVQ3HIJE2GoCNmv7fCd5cOYm', NULL, NULL, NULL),
(2, 'Me', 'admin@umn.ac.id', '$2y$12$hkOZYULXfsgeT0F0H6VP4eJ1HKxXBIVQ3HIJE2GoCNmv7fCd5cOYm', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` int(16) NOT NULL,
  `location` varchar(64) DEFAULT NULL,
  `country` varchar(64) DEFAULT NULL,
  `state` varchar(64) DEFAULT NULL,
  `province` varchar(64) DEFAULT NULL,
  `town` varchar(64) DEFAULT NULL,
  `zip_code` varchar(8) DEFAULT NULL,
  `address` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `location`, `country`, `state`, `province`, `town`, `zip_code`, `address`) VALUES
(1, 'Summarecon Mall Serpong', 'Indonesia', 'Banten', 'Tangerang', 'Gading Serpong', '15315', 'Scientia Boulevard'),
(2, 'AEON Mall', 'Indonesia', 'Banten', 'Tangerang', 'Gading Serpong', '15332', 'BSD Area'),
(3, 'Elite 51 Mall', 'United States', 'California', 'Palo Alto', 'Georgepool', '90182', 'The Nested River Street'),
(4, 'Family\'s Mart', 'United States', 'California', 'San Jose', 'San Fransisco', '87661', 'Rivera St. 09 Avenue');

-- --------------------------------------------------------

--
-- Table structure for table `casts`
--

CREATE TABLE `casts` (
  `id` int(16) NOT NULL,
  `name` varchar(256) NOT NULL,
  `birthplace` varchar(64) NOT NULL,
  `birthdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `casts`
--

INSERT INTO `casts` (`id`, `name`, `birthplace`, `birthdate`) VALUES
(1, 'Joseph Gordon-Levitt', 'Los Angeles, California, USA', '1981-02-17'),
(2, 'Leonardo DiCaprio', 'Hollywood, Los Angeles, California, USA', '1974-11-10');

-- --------------------------------------------------------

--
-- Table structure for table `cast_relation`
--

CREATE TABLE `cast_relation` (
  `id` int(16) NOT NULL,
  `cast` int(16) NOT NULL,
  `movie` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cast_relation`
--

INSERT INTO `cast_relation` (`id`, `cast`, `movie`) VALUES
(1, 1, 28),
(2, 2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(16) NOT NULL,
  `genre` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Thriller'),
(2, 'Action'),
(3, 'Crime'),
(4, 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `genre_relation`
--

CREATE TABLE `genre_relation` (
  `id` int(16) NOT NULL,
  `genre` int(16) NOT NULL,
  `movie` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genre_relation`
--

INSERT INTO `genre_relation` (`id`, `genre`, `movie`) VALUES
(1, 1, 28),
(2, 2, 28);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(16) NOT NULL,
  `title` varchar(256) NOT NULL,
  `director` varchar(256) NOT NULL,
  `avail` tinyint(1) NOT NULL,
  `released` date NOT NULL,
  `parental` varchar(8) NOT NULL,
  `synopsis` varchar(512) NOT NULL,
  `poster` varchar(512) NOT NULL,
  `trailer` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `director`, `avail`, `released`, `parental`, `synopsis`, `poster`, `trailer`) VALUES
(1, 'The Shawshank Redemption', 'Shaw and Shank', 1, '2008-08-15', '13', 'The slavery of people', 'ResidentEvil.jpg', 'https://www.youtube.com/embed/6hB3S9bIaco'),
(2, 'The Black Widow', 'Marvel', 2, '2025-04-12', '18', 'Stan Lee\'s Masterpiece', 'Blackhat.jpg', 'https://www.youtube.com/embed/ybji16u608U'),
(3, 'Ant Man', 'Marvel', 1, '2020-05-20', '10', 'Stan Lee', 'Deadpool.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(4, 'The Endgame', 'Stan Lee', 1, '2020-05-05', '10', 'Marvel Product', 'Avenger.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(5, 'Native Landmark', 'Russo Brothers', 1, '2020-05-10', '10', 'Awesome', '1589419924.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(6, 'The Framework', 'Tech Company', 2, '2024-12-31', '10', 'Chrome Cast', 'Ironman.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(7, 'Trello', 'Team Collaboration', 2, '2030-09-16', '0', 'The best product ever', '1589422112.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(8, 'Jackpot Brothers', 'Shane', 2, '2055-05-05', '10', 'Parental Guidance', '1589419973.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(9, 'The Corona Virus Lock Down', 'COVID-19', 1, '1984-05-19', '10', 'Mainland China', '1589382529.png', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(10, 'The Web', 'Jake Brown', 2, '2028-05-26', '18', 'The Premiere Prime Minister', 'JhonnyEnglish.jpg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(12, 'Indonesia Merdeka', 's', 2, '2020-05-15', '13', 'hey', '1589370305.png', 'https://www.youtube.com/embed/tgbNymZ7vqY'),
(13, 'Assassins Creed', 'Justin Kurzel', 2, '2077-12-12', '13', 'Callum Lynch explores the memories of his ancestor Aguilar de Nerha and gains the skills of a Master Assassin, before taking on the secret Templar society.', 'Assassinscreed.jpg', 'https://youtu.be/gfJVoF5ko1Y'),
(14, 'Rambo', 'Sylvester Stallone', 3, '0000-00-00', '18', 'In Thailand, John Rambo joins a group of mercenaries to venture into war-torn Burma, and rescue a group of Christian aid workers who were kidnapped by the ruthless local infantry unit.', 'Rambo.jpg', 'https://youtu.be/2CRjdwRYQbU'),
(15, 'Silenthill', 'Christophe Gans', 1, '2020-11-11', '18', 'A woman, Rose, goes in search for her adopted daughter within the confines of a strange, desolate town called Silent Hill.', 'Silenthill.jpg', 'https://youtu.be/WWMGZe6iucw'),
(16, 'Spiderman 1', 'Sam Raimi', 2, '0000-00-00', '13', 'When bitten by a genetically modified spider, a nerdy, shy, and awkward high school student gains spider-like abilities that he eventually must use to fight evil as a superhero after tragedy befalls his family.', 'Spiderman1.jpg', 'https://youtu.be/O7zvehDxttM'),
(17, 'Sipderman 2', 'Sam Raimi', 2, '0000-00-00', '13', 'Peter Parker is beset with troubles in his failing personal life as he battles a brilliant scientist named Doctor Otto Octavius.', 'Spiderman2.jpg', 'https://youtu.be/BWsLc3j1AWg'),
(18, 'Spiderman 3', 'Sam Raimi', 3, '0000-00-00', '13', 'A strange black entity from another world bonds with Peter Parker and causes inner turmoil as he contends with new villains, temptations, and revenge.', 'Spiderman3.jpg', 'https://youtu.be/MTIP-Ih_GR0'),
(19, 'Starwars 1', 'George Lucas', 4, '0000-00-00', '13', 'Two Jedi escape a hostile blockade to find allies and come across a young boy who may bring balance to the Force, but the long dormant Sith resurface to claim their old glory.', 'Starwars1.jpg', 'https://youtu.be/bD7bpG-zDJQ'),
(20, 'Starwars 2', 'George Lucas', 4, '0000-00-00', '13', 'Ten years after initially meeting, Anakin Skywalker shares a forbidden romance with Padmé Amidala, while Obi-Wan Kenobi investigates an assassination attempt on the senator and discovers a secret clone army crafted for the Jedi.', 'Starwars2.jpg', 'https://youtu.be/gYbW1F_c9eM'),
(21, 'Starwars 3', 'George Lucas', 1, '2020-12-28', '13', 'Three years into the Clone Wars, the Jedi rescue Palpatine from Count Dooku. As Obi-Wan pursues a new threat, Anakin acts as a double agent between the Jedi Council and Palpatine and is lured into a sinister plan to rule the galaxy.', 'Starwars3.jpg', 'https://youtu.be/Z36TDBKRwi8'),
(22, 'Starwars 4', 'George Lucas', 4, '0000-00-00', '13', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire\'s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth Vader.', 'Starwars4.jpg', 'https://youtu.be/vZ734NWnAHA'),
(23, 'Starwars 5', 'George Lucas', 4, '0000-00-00', '13', 'After the Rebels are brutally overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda, while his friends are pursued by Darth Vader and a bounty hunter named Boba Fett all over the galaxy.', 'Starwars5.jpg', 'https://youtu.be/ccDO6y2j9QQ'),
(24, 'Starwars 6', 'George Lucas', 4, '0000-00-00', '13', 'After a daring mission to rescue Han Solo from Jabba the Hutt, the Rebels dispatch to Endor to destroy the second Death Star. Meanwhile, Luke struggles to help Darth Vader back from the dark side without falling into the Emperor\'s trap.', 'Starwars6.jpg', 'https://youtu.be/ovKHcskFxb8'),
(25, 'Starwars 7', 'J. J. Abrams', 4, '0000-00-00', '13', 'Three decades after the Empire\'s defeat, a new threat arises in the militant First Order. Defected stormtrooper Finn and the scavenger Rey are caught up in the Resistance\'s search for the missing Luke Skywalker.', 'Starwars7.jpg', 'https://youtu.be/sGbxmsDFVnE'),
(26, 'Starwars 8', 'Rian Johnson', 4, '0000-00-00', '13', 'Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.', 'Starwars8.jpg', 'https://youtu.be/Q0CbN8sfihY'),
(27, 'Wolverine', 'James Mangold', 1, '2013-07-24', '13', 'Wolverine comes to Japan to meet an old friend whose life he saved years ago, and gets embroiled in a conspiracy involving yakuza and mutants.', '1589420051.jpeg', 'https://youtu.be/toLpchTUYk8'),
(28, 'Inception', 'Christopher Nolan', 1, '2010-07-16', '13', 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.', '1546728051.jpg', 'https://www.youtube.com/embed/Qwe6qXFTdgc');

-- --------------------------------------------------------

--
-- Table structure for table `paid_tickets`
--

CREATE TABLE `paid_tickets` (
  `id` int(16) NOT NULL,
  `ticket` int(16) NOT NULL,
  `payment` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `paid_tickets`
--

INSERT INTO `paid_tickets` (`id`, `ticket`, `payment`) VALUES
(1, 2, 2),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `playing_relation`
--

CREATE TABLE `playing_relation` (
  `id` int(16) NOT NULL,
  `studio` int(16) NOT NULL,
  `movie` int(16) NOT NULL,
  `showtime` int(16) NOT NULL,
  `branch` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playing_relation`
--

INSERT INTO `playing_relation` (`id`, `studio`, `movie`, `showtime`, `branch`) VALUES
(3, 1, 1, 1, 1),
(4, 2, 28, 3, 1),
(5, 2, 28, 4, 1),
(6, 2, 28, 1, 1),
(7, 2, 28, 2, 1),
(8, 3, 2, 3, 2),
(9, 1, 28, 3, 1),
(10, 2, 21, 2, 1),
(12, 2, 15, 2, 1),
(13, 2, 15, 2, 1),
(14, 2, 15, 2, 1),
(15, 2, 15, 2, 1),
(18, 1, 19, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(16) NOT NULL,
  `header` varchar(64) NOT NULL,
  `content` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `header`, `content`) VALUES
(1, 'The movie was slick', 'It\'s just Great! Must Watch!');

-- --------------------------------------------------------

--
-- Table structure for table `review_relation`
--

CREATE TABLE `review_relation` (
  `id` int(16) NOT NULL,
  `user` int(16) NOT NULL,
  `movie` int(16) NOT NULL,
  `review` int(16) NOT NULL,
  `rating` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review_relation`
--

INSERT INTO `review_relation` (`id`, `user`, `movie`, `review`, `rating`) VALUES
(1, 1, 28, 1, 10);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `showtimes`
--

CREATE TABLE `showtimes` (
  `id` int(16) NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `showtimes`
--

INSERT INTO `showtimes` (`id`, `time`) VALUES
(1, '10:40:00'),
(2, '12:30:00'),
(3, '16:30:00'),
(4, '15:20:00'),
(5, '18:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `studios`
--

CREATE TABLE `studios` (
  `id` int(16) NOT NULL,
  `name` varchar(30) NOT NULL,
  `class` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `studios`
--

INSERT INTO `studios` (`id`, `name`, `class`) VALUES
(1, 'Mars', 1),
(2, 'Saturn', 2),
(3, 'Earth', 2),
(4, 'Jupyter', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(16) NOT NULL,
  `row` varchar(4) NOT NULL,
  `seat` int(4) NOT NULL,
  `cost` int(16) NOT NULL,
  `playing` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `row`, `seat`, `cost`, `playing`) VALUES
(1, 'A', 1, 40000, 3),
(2, 'A', 2, 40000, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(16) NOT NULL,
  `total` int(16) NOT NULL,
  `method` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `total`, `method`, `time`, `user`) VALUES
(1, 40000, 'Gopay', '2020-05-13 13:28:14', 1),
(2, 40000, 'OVO', '2020-05-13 13:34:30', 2),
(3, 40000, 'OVO', '2020-05-20 14:58:30', 3),
(4, 40000, 'Gopay', '2020-05-20 15:37:56', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(16) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) DEFAULT NULL,
  `gender` varchar(8) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `email` varchar(128) NOT NULL,
  `birthdate` date NOT NULL,
  `photo` varchar(256) NOT NULL,
  `bio` varchar(512) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `remember_token` varchar(512) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `gender`, `phone`, `username`, `password`, `email`, `birthdate`, `photo`, `bio`, `created`, `updated`, `remember_token`) VALUES
(1, 'Darren', 'Grunt', 'Male', '08123456789', 'darren', '$2y$10$KcQjGGCADxFfH74uAthd2eRTLZCte2ov4eQVZ7LbMXeBVb2mhZQ8e', 'darren@mail.com', '1990-12-12', 'default.png', NULL, '2020-05-11 17:34:18', '2020-05-20 22:39:34', 'iXq5dqLfuC9tCerdH1RmWt1zcaGVYsoohzCqefQ0pY2ZyCIelWhFZEQNe0Gf'),
(2, 'Default', 'Default\r\n', 'Male', '08123456789', 'zerowu49', '$2y$10$NAMohNFouQwxs.tASrT4.u2X1svPd6S5LBxghbJlPTbFNvG23YH6u', 'admin@umn.ac.id', '2000-02-16', 'default.png', NULL, '2020-05-12 15:17:53', '2020-05-20 22:55:52', ''),
(3, 'John', 'Doe', 'Male', '08123456789', 'johndoe', '$2y$10$yFwRNKGCA9zQlJNUpDmUJ.r5MLmNiS99wnx3H82LdY8h01z3/yYXC', 'johndoe@mail.com', '2000-02-18', 'default.png', NULL, '2020-05-14 02:13:45', '2020-05-18 19:10:04', NULL),
(3213567, 'Royson', 'Roy', 'Male', '083478527348', 'ventrix', '$2y$10$QEWo5KXwJViF90rHryWUA.qbTgx./keaCC78/VJYCaEWEb.Oid9dS', 'royson@student.umn.ac.id', '2000-06-20', 'default.png', NULL, '2020-05-20 16:33:50', '2020-05-20 23:33:50', NULL),
(22538349, 'Flestnia', 'Nirvash', 'Male', '081234567892', 'testtest1', '$2y$10$K4dE4.ti1JDCceXjG4EfH.JopxmG1SW.oJRXLKJzTv9t6Tn9RkClG', 'FN@mail', '0001-11-11', 'default.png', NULL, '2020-05-20 13:33:54', '2020-05-20 20:33:54', NULL),
(47850843, 'Laramax', 'Clinton', 'Female', '08123456789', 'laramax', '$2y$10$Wbp29X8PfPMV8cCdGrEjNu6nPsBOWDpXKdvZ52xLg6Jurox6fjt3G', 'laramax@umn.ac.id', '2000-05-14', 'default.png', NULL, '2020-05-14 02:55:10', '2020-05-18 19:10:04', NULL),
(63154194, 'Chendra', 'Dewangga', 'Male', '08123456789', 'Nirvash', '$2y$10$GoqH2w37FdZH2He/YjfdVubg4sxd/aPd3vO/M4zSYxp1FAgzOnNvO', 'chendra.dewangga@gmail.com', '2000-09-12', 'default.png', NULL, '2020-05-18 12:31:39', '2020-05-18 19:31:39', NULL),
(66914536, 'Avenger', 'Simpson', 'Female', '08123456789', 'mantis', '$2y$10$KcQjGGCADxFfH74uAthd2eRTLZCte2ov4eQVZ7LbMXeBVb2mhZQ8e', 'avengers@mail.com', '1999-07-10', 'default.png', NULL, '2020-05-14 07:57:14', '2020-05-18 19:10:04', NULL),
(71735304, 'Nirvash', 'Nirvash', 'Male', '081234567891', 'Nirvash7777', '$2y$10$XomqMVkXLM1r7le4b/a3l.JRB4unCSh/Tl/st1OffCaNoGphe.4tq', 'Nirvash1@mail', '2000-11-11', 'default.png', NULL, '2020-05-20 13:08:16', '2020-05-20 20:08:16', NULL),
(98433622, 'Nirvash', 'Nirvash', 'Male', '081234567890', 'Nirvash777', '$2y$10$J42FI70/AjuDmjzC11HAXOrTw3TdER1ndTLT8qNnSXdGdJry8VJ5W', 'Nirvash@mail', '2000-12-12', 'default.png', NULL, '2020-05-18 12:34:45', '2020-05-18 19:34:45', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `casts`
--
ALTER TABLE `casts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cast_relation`
--
ALTER TABLE `cast_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cast` (`cast`),
  ADD KEY `movie` (`movie`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre_relation`
--
ALTER TABLE `genre_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`),
  ADD KEY `genre` (`genre`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paid_tickets`
--
ALTER TABLE `paid_tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment` (`payment`),
  ADD KEY `ticket` (`ticket`);

--
-- Indexes for table `playing_relation`
--
ALTER TABLE `playing_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`),
  ADD KEY `showtime` (`showtime`),
  ADD KEY `studio` (`studio`),
  ADD KEY `branch` (`branch`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review_relation`
--
ALTER TABLE `review_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `movie` (`movie`),
  ADD KEY `review` (`review`),
  ADD KEY `user` (`user`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD UNIQUE KEY `sessions_id_unique` (`id`);

--
-- Indexes for table `showtimes`
--
ALTER TABLE `showtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studios`
--
ALTER TABLE `studios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playing` (`playing`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_ibfk_1` (`user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47850844;

--
-- AUTO_INCREMENT for table `casts`
--
ALTER TABLE `casts`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cast_relation`
--
ALTER TABLE `cast_relation`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `genre_relation`
--
ALTER TABLE `genre_relation`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `paid_tickets`
--
ALTER TABLE `paid_tickets`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `playing_relation`
--
ALTER TABLE `playing_relation`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `review_relation`
--
ALTER TABLE `review_relation`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98433623;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast_relation`
--
ALTER TABLE `cast_relation`
  ADD CONSTRAINT `cast_relation_ibfk_1` FOREIGN KEY (`cast`) REFERENCES `casts` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cast_relation_ibfk_2` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `genre_relation`
--
ALTER TABLE `genre_relation`
  ADD CONSTRAINT `genre_relation_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_relation_ibfk_2` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `paid_tickets`
--
ALTER TABLE `paid_tickets`
  ADD CONSTRAINT `paid_tickets_ibfk_1` FOREIGN KEY (`payment`) REFERENCES `transaction` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `paid_tickets_ibfk_2` FOREIGN KEY (`ticket`) REFERENCES `tickets` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `playing_relation`
--
ALTER TABLE `playing_relation`
  ADD CONSTRAINT `playing_relation_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `playing_relation_ibfk_2` FOREIGN KEY (`showtime`) REFERENCES `showtimes` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `playing_relation_ibfk_3` FOREIGN KEY (`studio`) REFERENCES `studios` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `playing_relation_ibfk_4` FOREIGN KEY (`branch`) REFERENCES `branch` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `review_relation`
--
ALTER TABLE `review_relation`
  ADD CONSTRAINT `review_relation_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_relation_ibfk_2` FOREIGN KEY (`review`) REFERENCES `reviews` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `review_relation_ibfk_3` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`playing`) REFERENCES `playing_relation` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
