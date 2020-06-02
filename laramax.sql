-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 02, 2020 at 11:54 AM
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
(3, 'Supermal Karawachi', 'Indonesia', 'Indonesia', 'Indonesia', 'Indonesia', '28772', 'Indonesia'),
(4, 'Living World Alam Sutera', 'Indonesia', 'Jakarta Barat', 'Banten', 'Tangerang', '15334', 'Alam Sutera'),
(5, 'Grand Indonesia', 'Jakarta', 'Jakarta Utara', 'Sudirman', 'Palangka Raya', '15678', 'Grand Indonesia Jakarta'),
(6, 'Mal Bali Galeria', 'Indonesia', 'Kuta', 'Bali', 'Simpang Siur', '80361', 'Denpasar'),
(7, 'Beachwalk', 'Indonesia', 'Kuta Selatan', 'Bali', 'Jimbaran', '80362', 'Pantai Kuta');

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
(2, 'Leonardo DiCaprio', 'Hollywood, Los Angeles, California, USA', '1974-11-10'),
(3, 'Ewan McGregor', 'Perth Royal Infirmary, Perth, United Kingdom', '1971-03-31'),
(4, 'Liam Neeson', 'Ballymena, Co. Antrim, Northern Ireland, UK', '1952-06-07'),
(5, 'Tobey Maguire', 'Santa Monica', '1975-06-27'),
(6, 'Kristen Dunst', 'Point Pleasant, New Jersey, United States', '1982-04-30'),
(7, 'Hugh Jackman', 'Sydney, Australia', '1968-10-12'),
(8, 'Vin Diesel', 'Alameda County, California, Amerika', '1967-07-18'),
(9, 'Edward Snowden', 'Elizabeth City, North Carolina, United States', '1983-06-21'),
(10, 'Jodelle Ferland', 'Nanaimo, Canada', '1994-10-09'),
(11, 'Rowan Atkinson', 'Consett, United Kingdom', '1955-01-06'),
(12, 'Michael Fassbender', 'Heidelberg, Germany', '1977-04-02'),
(13, 'Ario Bayu', 'Jakarta, Indonesia', '1985-02-06'),
(15, 'Robert Downey, Jr.', 'Manhattan, New York, United States', '1965-04-04'),
(16, 'Ryan Reynolds', 'Vancouver, Canada', '1976-10-23'),
(17, 'Matt Damon', 'Cambridge, Massachusetts, United States', '1970-10-08'),
(18, 'Chris Hemsworth', 'Melbourne, Australia', '1983-08-11'),
(21, 'Scarlett Johansson', 'New York City', '1984-11-22'),
(22, 'Jamie Foxx', 'Terrell, Texas, USA', '1967-12-13'),
(23, 'Joaquin Phoenix', 'San Juan, Puerto Rico', '1974-10-28'),
(24, 'Daniel Craig', 'Chester, Cheshire, England, UK', '1968-03-02'),
(25, 'Chris Evans', 'Boston, Massachusetts, USA', '1981-06-13'),
(26, 'Morgan Freeman', 'Memphis, Tennessee, USA', '1937-06-01');

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
(2, 2, 28),
(3, 1, 3),
(4, 8, 5),
(5, 5, 16),
(6, 5, 17),
(7, 5, 18),
(8, 11, 10),
(9, 10, 15),
(10, 4, 19),
(11, 3, 20),
(12, 3, 19),
(13, 3, 21),
(14, 3, 22),
(15, 3, 23),
(16, 3, 24),
(17, 15, 4),
(18, 15, 6),
(19, 7, 27),
(20, 26, 1),
(21, 23, 7),
(22, 24, 30),
(23, 25, 30);

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
(4, 'Animation'),
(6, 'Fantasy'),
(7, 'History'),
(8, 'Horror'),
(9, 'Spy'),
(10, 'Political Thriller'),
(11, 'Drama');

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
(2, 2, 28),
(3, 4, 3),
(4, 1, 1),
(5, 2, 16),
(6, 2, 17),
(7, 2, 18),
(8, 2, 19),
(9, 2, 20),
(10, 2, 21),
(11, 2, 22),
(12, 2, 23),
(13, 2, 24),
(14, 2, 25),
(15, 2, 26),
(16, 7, 12),
(17, 8, 15),
(18, 1, 15),
(19, 2, 9),
(20, 2, 14),
(21, 2, 13),
(22, 9, 8),
(23, 10, 8),
(24, 2, 8),
(25, 6, 7),
(26, 2, 27),
(27, 2, 6),
(28, 2, 5),
(29, 2, 7),
(30, 2, 2),
(31, 2, 29);

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
  `duration` int(11) NOT NULL,
  `poster` varchar(512) NOT NULL,
  `trailer` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `title`, `director`, `avail`, `released`, `parental`, `synopsis`, `duration`, `poster`, `trailer`) VALUES
(1, 'The Shawshank Redemption', 'Frank Darabont', 1, '1994-10-14', '16', 'Framed in the 1940s for the double murder of his wife and her lover, upstanding banker Andy Dufresne begins a new life at the Shawshank prison, where he puts his accounting skills to work for an amoral warden. During his long stretch in prison, Dufresne comes to be admired by the other inmates -- including an older prisoner named Red -- for his integrity and unquenchable sense of hope.', 142, '1591071653.jpeg', 'https://www.youtube.com/embed/6hB3S9bIaco'),
(2, 'Black Hat', 'Marvel', 2, '2025-04-12', '18', 'Stan Lee\'s Masterpiece', 90, '1591075406.jpeg', 'https://www.youtube.com/embed/ybji16u608U'),
(3, 'Dead Pool', 'Marvel', 1, '2020-05-20', '10', 'Stan Lee', 110, '1591075436.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(4, 'The Endgame', 'Stan Lee', 1, '2020-05-05', '10', 'Marvel Product', 130, '1591075464.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(5, 'The Fate of the Furious', 'Russo Brothers', 1, '2020-05-10', '10', 'Awesome', 120, '1591075741.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(6, 'Iron Man', 'Tech Company', 2, '2024-12-31', '10', 'Chrome Cast', 110, '1591075777.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(7, 'Joker', 'Todd Phillips', 2, '2019-10-04', '16', 'During the 1980s, a failed stand-up comedian is driven insane and turns to a life of crime and chaos in Gotham City while becoming an infamous psychopathic crime figure.', 122, '1591074210.jpeg', 'https://www.youtube.com/embed/t433PEQGErc'),
(8, 'Snowden', 'Oliver Stone', 2, '2055-05-05', '10', 'The NSA\'s illegal surveillance techniques are leaked to the public by one of the agency\'s employees, Edward Snowden, in the form of thousands of classified documents distributed to the press.', 127, '1591075841.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(9, 'The Hunt', 'Craig Zobel', 1, '2020-03-13', '16', 'Twelve strangers wake up in a clearing. They don\'t know where they are—or how they got there. In the shadow of a dark internet conspiracy theory, ruthless elitists gather at a remote location to hunt humans for sport. But their master plan is about to be derailed when one of the hunted turns the tables on her pursuers.', 90, '1591075026.jpeg', 'https://www.youtube.com/embed/sowGYbxTPgU'),
(10, 'Jhonny English', 'Peter Howitt', 2, '2003-04-06', '10', 'A lowly pencil pusher working for MI7, Johnny English is suddenly promoted to super spy after Agent One is assassinated and every other agent is blown up at his funeral. When a billionaire entrepreneur sponsors the exhibition of the Crown Jewels—and the valuable gems disappear on the opening night and on English\'s watch—the newly-designated agent must jump into action to find the thief and recover the missing gems.', 88, '1591074417.jpeg', 'https://www.youtube.com/embed/TcMBFSGVi1c'),
(12, 'Soekarno', 'Hanung Bramantyo', 2, '2020-05-15', '0', 'This movie follows the life of Soekarno, the first president of the Republic of Indonesia, from his childhood until he managed to proclaimed Indonesian freedom with M. Hatta in 1945.', 130, '1591075303.jpeg', 'https://www.youtube.com/embed/UuhB8EZhPxg'),
(13, 'Assassin\'s Creed', 'Justin Kurzel', 2, '2077-12-12', '13', 'Callum Lynch explores the memories of his ancestor Aguilar de Nerha and gains the skills of a Master Assassin, before taking on the secret Templar society.', 150, '1591075359.jpeg', 'https://www.youtube.com/embed/4haJD6W136c'),
(14, 'Rambo', 'Sylvester Stallone', 2, '2020-07-25', '18', 'In Thailand, John Rambo joins a group of mercenaries to venture into war-torn Burma, and rescue a group of Christian aid workers who were kidnapped by the ruthless local infantry unit.', 130, '1591075921.jpeg', 'https://www.youtube.com/embed/2CRjdwRYQbU'),
(15, 'Silent Hill', 'Christophe Gans', 1, '2006-04-21', '18', 'In search for answers, a mother travels to the enigmatic town of Silent Hill when her daughter begins to suffer recurring nightmares related to the place. It doesn\'t take long for her to discover its home to beings as equally haunting as the town itself.', 125, '1591074654.jpeg', 'https://www.youtube.com/embed/WWMGZe6iucw'),
(16, 'Spiderman', 'Sam Raimi', 2, '2020-06-06', '13', 'When bitten by a genetically modified spider, a nerdy, shy, and awkward high school student gains spider-like abilities that he eventually must use to fight evil as a superhero after tragedy befalls his family.', 140, '1591075972.jpeg', 'https://www.youtube.com/embed/O7zvehDxttM'),
(17, 'Sipderman 2', 'Sam Raimi', 2, '2020-06-04', '13', 'Peter Parker is beset with troubles in his failing personal life as he battles a brilliant scientist named Doctor Otto Octavius.', 150, '1591076011.jpeg', 'https://www.youtube.com/embed/BWsLc3j1AWg'),
(18, 'Spiderman 3', 'Sam Raimi', 2, '2020-11-11', '13', 'A strange black entity from another world bonds with Peter Parker and causes inner turmoil as he contends with new villains, temptations, and revenge.', 170, 'Spiderman3.jpg', 'https://www.youtube.com/embed/MTIP-Ih_GR0'),
(19, 'Starwars', 'George Lucas', 2, '1999-05-19', '10', 'Anakin Skywalker, a young slave strong with the Force, is discovered on Tatooine. Meanwhile, the evil Sith have returned, enacting their plot for revenge against the Jedi.', 136, '1591074299.jpeg', 'https://www.youtube.com/embed/bD7bpG-zDJQ'),
(20, 'Starwars 2', 'George Lucas', 2, '2020-11-19', '13', 'Ten years after initially meeting, Anakin Skywalker shares a forbidden romance with Padmé Amidala, while Obi-Wan Kenobi investigates an assassination attempt on the senator and discovers a secret clone army crafted for the Jedi.', 157, 'Starwars2.jpg', 'https://www.youtube.com/embed/gYbW1F_c9eM'),
(21, 'Star Wars 3', 'George Lucas', 1, '2020-05-19', '13', 'Three years into the Clone Wars, the Jedi rescue Palpatine from Count Dooku. As Obi-Wan pursues a new threat, Anakin acts as a double agent between the Jedi Council and Palpatine and is lured into a sinister plan to rule the galaxy.', 140, '1591074779.jpeg', 'https://www.youtube.com/embed/Z36TDBKRwi8'),
(22, 'Starwars 4', 'George Lucas', 1, '2020-12-12', '13', 'Luke Skywalker joins forces with a Jedi Knight, a cocky pilot, a Wookiee and two droids to save the galaxy from the Empire\'s world-destroying battle station, while also attempting to rescue Princess Leia from the mysterious Darth Vader.', 133, '1590506955.jpeg', 'https://www.youtube.com/embed/vZ734NWnAHA'),
(23, 'Starwars 5', 'George Lucas', 2, '2020-11-27', '13', 'After the Rebels are brutally overpowered by the Empire on the ice planet Hoth, Luke Skywalker begins Jedi training with Yoda, while his friends are pursued by Darth Vader and a bounty hunter named Boba Fett all over the galaxy.', 145, 'Starwars5.jpg', 'https://www.youtube.com/embed/ccDO6y2j9QQ'),
(24, 'Starwars 6', 'George Lucas', 2, '2020-10-31', '13', 'After a daring mission to rescue Han Solo from Jabba the Hutt, the Rebels dispatch to Endor to destroy the second Death Star. Meanwhile, Luke struggles to help Darth Vader back from the dark side without falling into the Emperor\'s trap.', 152, 'Starwars6.jpg', 'https://www.youtube.com/embed/ovKHcskFxb8'),
(25, 'Starwars 7', 'J. J. Abrams', 1, '2020-06-25', '13', 'Three decades after the Empire\'s defeat, a new threat arises in the militant First Order. Defected stormtrooper Finn and the scavenger Rey are caught up in the Resistance\'s search for the missing Luke Skywalker.', 160, 'Starwars7.jpg', 'https://www.youtube.com/embed/sGbxmsDFVnE'),
(26, 'Starwars 8', 'Rian Johnson', 2, '2021-01-14', '13', 'Rey develops her newly discovered abilities with the guidance of Luke Skywalker, who is unsettled by the strength of her powers. Meanwhile, the Resistance prepares for battle with the First Order.', 162, 'Starwars8.jpg', 'https://www.youtube.com/embed/Q0CbN8sfihY'),
(27, 'The Wolverine', 'James Mangold', 1, '2013-07-25', '13', 'Wolverine comes to Japan to meet an old friend whose life he saved years ago, and gets embroiled in a conspiracy involving yakuza and mutants.', 126, '1591075117.jpeg', 'https://www.youtube.com/embed/toLpchTUYk8'),
(28, 'Inception', 'Christopher Nolan', 1, '2010-07-16', '13', 'Cobb, a skilled thief who commits corporate espionage by infiltrating the subconscious of his targets is offered a chance to regain his old life as payment for a task considered to be impossible: \"inception\", the implantation of another person\'s idea into a target\'s subconscious.', 148, '1591074854.jpeg', 'https://www.youtube.com/embed/Qwe6qXFTdgc'),
(29, 'Black Widow', 'Cate Shortland', 1, '2020-11-06', '18', 'A film about Natasha Romanoff in her quests between the films Civil War and Infinity War.', 125, '1591031142.jpeg', 'https://www.youtube.com/embed/ybji16u608U'),
(30, 'Knives Out', 'Rian Johnson', 2, '2019-11-27', '13', 'When renowned crime novelist Harlan Thrombey is found dead at his estate just after his 85th birthday, the inquisitive and debonair Detective Benoit Blanc is mysteriously enlisted to investigate. From Harlan\'s dysfunctional family to his devoted staff, Blanc sifts through a web of red herrings and self-serving lies to uncover the truth behind Harlan\'s untimely death.', 131, '1591033969.jpeg', 'https://www.youtube.com/embed/qGqiHJTsRkQ'),
(43, 'Soul', 'Pete Docter', 1, '2020-11-20', '0', 'Joe Gardner is a middle school teacher with a love for jazz music. After a successful gig at the Half Note Club, he suddenly gets into an accident that separates his soul from his body and is transported to the You Seminar, a center in which souls develop and gain passions before being transported to a newborn child. Joe must enlist help from the other souls-in-training, like 22, a soul who has spent eons in the You Seminar, in order to get back to Earth.', 126, '1591075239.jpeg', 'https://www.youtube.com/embed/4TojlZYqPUo');

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
(18, 1, 19, 2, 1),
(19, 4, 10, 3, 1),
(22, 3, 29, 8, 2),
(23, 1, 30, 5, 1),
(25, 4, 43, 1, 1),
(26, 4, 43, 1, 1),
(27, 3, 29, 8, 1),
(28, 2, 7, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(16) NOT NULL,
  `user` int(16) NOT NULL,
  `movie` int(16) NOT NULL,
  `rating` int(8) NOT NULL,
  `header` varchar(64) NOT NULL,
  `content` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user`, `movie`, `rating`, `header`, `content`) VALUES
(2, 27888256, 3, 7, 'Must Watch movie!', 'The movie was just great!'),
(3, 3213567, 27, 9, 'Test', 'ini hanya testing'),
(4, 123455678, 28, 6, 'Amazing!', 'You Must Watch this movie!'),
(5, 3213567, 12, 7, 'tesssss', 'hanya coba nonton aja'),
(6, 27888256, 28, 10, 'Test', 'Test'),
(7, 27888256, 1, 10, 'Eternal Hope', 'The Shawshank Redemption has great performances, extremely well written script and story all leading to a deeply emotional climax! One of the best dramas of all time!'),
(8, 3213567, 1, 10, 'Amazing', 'Words can not describe how good this movie is'),
(9, 27888256, 29, 4, 'Lame', 'Marvel'),
(10, 123455678, 29, 10, 'Marvelous!', 'Movie is beyond your expectation!');

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
(5, '18:30:00'),
(7, '14:45:00'),
(8, '19:30:00');

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
  `seat` varchar(8) NOT NULL,
  `cost` int(16) NOT NULL,
  `transaction` int(16) NOT NULL,
  `playing` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `seat`, `cost`, `transaction`, `playing`) VALUES
(1, 'B7', 50000, 24523681, 5),
(2, 'B14', 50000, 24523681, 5),
(3, 'B20', 50000, 24523681, 5),
(4, 'B25', 50000, 24523681, 5),
(5, 'A7', 75000, 15170636, 3),
(6, 'B45', 50000, 20322083, 4),
(7, 'B31', 50000, 71394410, 5),
(8, 'B32', 50000, 71394410, 5),
(9, 'B33', 50000, 71394410, 5),
(10, 'B46', 50000, 79241211, 4),
(11, 'B12', 75000, 5044181, 3),
(12, 'B13', 75000, 5044181, 3),
(13, 'B14', 75000, 5044181, 3),
(14, 'B18', 75000, 10113428, 3),
(15, 'B19', 75000, 10113428, 3),
(16, 'B20', 75000, 10113428, 3),
(17, 'B0', 50000, 40800421, 22),
(18, 'B1', 50000, 40800421, 22),
(19, 'B6', 50000, 40800421, 22),
(20, 'B7', 50000, 40800421, 22),
(21, 'B45', 50000, 31644801, 6),
(22, 'B12', 40000, 71394410, 27),
(47850846, 'B15', 1, 71394410, 25);

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(16) NOT NULL,
  `total` int(16) NOT NULL,
  `method` varchar(32) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `isPaid` tinyint(1) NOT NULL,
  `user` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`id`, `total`, `method`, `time`, `isPaid`, `user`) VALUES
(5044181, 225000, 'Debit Card', '2020-06-01 14:56:06', 0, 3213567),
(10113428, 225000, 'OVO', '2020-06-01 16:50:58', 0, 3213567),
(15170636, 75000, 'OVO', '2020-05-23 18:25:19', 0, 27888256),
(20322083, 50000, 'OVO', '2020-05-23 14:05:12', 1, 123455678),
(24523681, 200000, 'Gopay', '2020-05-31 18:01:33', 0, 3213567),
(31644801, 50000, 'Gopay', '2020-06-02 03:25:26', 0, 123455678),
(40800421, 200000, 'Debit Card', '2020-06-01 17:20:56', 0, 27888256),
(71394410, 150000, 'Debit Card', '2020-06-01 14:04:42', 0, 3213567),
(79241211, 50000, 'Credit Card', '2020-06-01 14:19:42', 0, 123455678),
(79241212, 40000, 'OVO', '2020-06-02 08:53:29', 0, 123455678);

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
(3213567, 'Royson', 'shieaet', 'Male', '083478527348', 'ventrix', '$2y$10$QEWo5KXwJViF90rHryWUA.qbTgx./keaCC78/VJYCaEWEb.Oid9dS', 'royson@student.umn.ac.id', '2000-06-20', 'default.png', 'im an f ing idiot', '2020-05-20 16:33:50', '2020-05-31 17:56:15', NULL),
(25281753, 'John', 'Doe', 'Male', '08123456777', 'johndoe', '$2y$10$ho3rCQH0rbQoFAB5jJfAgu0MOiaQq4QRcWIHDOHxTWtHBJsYfo8kq', 'john@example.com', '2015-02-02', 'default.png', NULL, '2020-06-02 06:03:39', '2020-06-02 13:03:39', NULL),
(27888256, 'Alfonso', 'Darren', 'Male', '08123456789', 'darren', '$2y$10$KcQjGGCADxFfH74uAthd2eRTLZCte2ov4eQVZ7LbMXeBVb2mhZQ8e', 'darren@mail.com', '1990-12-12', '27888256.png', 'I love to watch movies by marvel studios. Please let me know if there are new movies by marvel studios.', '2020-05-11 17:34:18', '2020-06-02 10:46:43', 'NJtGCfMHilJFWGTA89M3NApbXWMJJr0fBaxX5XHiCJEMfYln9MYlJ5uUURzI'),
(47850843, 'Laramax', 'Clinton', 'Female', '08123456789', 'laramax', '$2y$10$Wbp29X8PfPMV8cCdGrEjNu6nPsBOWDpXKdvZ52xLg6Jurox6fjt3G', 'laramax@umn.ac.id', '2000-05-14', 'default.png', NULL, '2020-05-14 02:55:10', '2020-05-18 19:10:04', NULL),
(63154194, 'Chendra', 'Dewangga', 'Male', '08123456789', 'Nirvash', '$2y$10$GoqH2w37FdZH2He/YjfdVubg4sxd/aPd3vO/M4zSYxp1FAgzOnNvO', 'chendra.dewangga@gmail.com', '2000-09-12', 'default.png', NULL, '2020-05-18 12:31:39', '2020-05-18 19:31:39', NULL),
(66914536, 'Avenger', 'Simpson', 'Female', '08123456789', 'mantis', '$2y$10$KcQjGGCADxFfH74uAthd2eRTLZCte2ov4eQVZ7LbMXeBVb2mhZQ8e', 'avengers@mail.com', '1999-07-10', 'default.png', NULL, '2020-05-14 07:57:14', '2020-05-18 19:10:04', NULL),
(71735304, 'Nirvash', 'Nirvash', 'Male', '081234567891', 'Nirvash7777', '$2y$10$XomqMVkXLM1r7le4b/a3l.JRB4unCSh/Tl/st1OffCaNoGphe.4tq', 'Nirvash1@mail', '2000-11-11', 'default.png', NULL, '2020-05-20 13:08:16', '2020-05-20 20:08:16', NULL),
(87426813, 'Flestnia', 'Nirvash123', 'Male', '08222222222', 'nirvash722', '$2y$10$u0sL428IuGzR/lCA6Qth8eTR4uYAWZOXjd4.nZH1dRdggLJ03H1di', 'Nirvash8@mail', '2000-11-08', 'default.png', NULL, '2020-05-26 15:05:48', '2020-05-26 22:05:48', NULL),
(98433622, 'Nirvash', 'Nirvash', 'Male', '081234567890', 'Nirvash777', '$2y$10$J42FI70/AjuDmjzC11HAXOrTw3TdER1ndTLT8qNnSXdGdJry8VJ5W', 'Nirvash@mail', '2000-12-12', 'default.png', NULL, '2020-05-18 12:34:45', '2020-05-18 19:34:45', NULL),
(123455678, 'Default', 'Default', 'Female', '08123456777', 'zerowu49', '$2y$10$NAMohNFouQwxs.tASrT4.u2X1svPd6S5LBxghbJlPTbFNvG23YH6u', 'admin@umn.ac.id', '2000-02-24', '123455678.jpeg', 'Hello I am Alive', '2020-05-05 15:17:53', '2020-06-02 12:29:35', '');

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
  ADD KEY `cast_relation_ibfk_1` (`cast`),
  ADD KEY `cast_relation_ibfk_2` (`movie`);

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
  ADD KEY `genre_relation_ibfk_1` (`movie`),
  ADD KEY `genre_relation_ibfk_2` (`genre`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playing_relation`
--
ALTER TABLE `playing_relation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `playing_relation_ibfk_1` (`movie`),
  ADD KEY `playing_relation_ibfk_2` (`showtime`),
  ADD KEY `playing_relation_ibfk_3` (`studio`),
  ADD KEY `playing_relation_ibfk_4` (`branch`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_ibfk_1` (`user`),
  ADD KEY `reviews_ibfk_2` (`movie`);

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
  ADD KEY `tickets_ibfk_1` (`playing`),
  ADD KEY `tickets_ibfk_2` (`transaction`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_ibfk_1` (`user`);

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
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `casts`
--
ALTER TABLE `casts`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `cast_relation`
--
ALTER TABLE `cast_relation`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `genre_relation`
--
ALTER TABLE `genre_relation`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `playing_relation`
--
ALTER TABLE `playing_relation`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `showtimes`
--
ALTER TABLE `showtimes`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `studios`
--
ALTER TABLE `studios`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47850847;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79241213;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123455680;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cast_relation`
--
ALTER TABLE `cast_relation`
  ADD CONSTRAINT `cast_relation_ibfk_1` FOREIGN KEY (`cast`) REFERENCES `casts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cast_relation_ibfk_2` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `genre_relation`
--
ALTER TABLE `genre_relation`
  ADD CONSTRAINT `genre_relation_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genre_relation_ibfk_2` FOREIGN KEY (`genre`) REFERENCES `genres` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `playing_relation`
--
ALTER TABLE `playing_relation`
  ADD CONSTRAINT `playing_relation_ibfk_1` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playing_relation_ibfk_2` FOREIGN KEY (`showtime`) REFERENCES `showtimes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playing_relation_ibfk_3` FOREIGN KEY (`studio`) REFERENCES `studios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `playing_relation_ibfk_4` FOREIGN KEY (`branch`) REFERENCES `branch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`movie`) REFERENCES `movies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`playing`) REFERENCES `playing_relation` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`transaction`) REFERENCES `transaction` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
