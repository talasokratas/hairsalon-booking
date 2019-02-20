-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2019 at 01:34 AM
-- Server version: 10.3.12-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id8781752_hairsalon`
--

-- --------------------------------------------------------

--
-- Table structure for table `barbers`
--

CREATE TABLE `barbers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `barbers`
--

INSERT INTO `barbers` (`id`, `name`) VALUES
(1, 'Onutė Vasiliauskienė'),
(2, 'Tadas Berankis'),
(3, 'Eglė Dvikairytė'),
(4, 'Kristina Merkevičienė');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Visit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `Visit`) VALUES
(1, 'Evaldas Vaitonis', 2),
(2, 'Antanas Petraitis', 7),
(3, 'Viktoras Meškerikotis', 9),
(4, 'Stasys Germantas', 14),
(5, 'Zigmas Žuvis', 2),
(6, 'Saulė Kvederytė', 7),
(7, 'Julija Vasiliauskaitė', 11),
(8, 'Marius Smėlis', 9),
(9, 'Valdas Pavasaris', 9),
(10, 'Agnė Simutytė', 14),
(11, 'Valdas Venskūnas', 12),
(12, 'Kęstas Grušauskas', 24),
(13, 'Vidmantas Arbatinukas', 5),
(14, 'Antanas Karpis', 6),
(15, 'Paulius Simutis', 3),
(16, 'Janina Saulutė', 2),
(17, 'Vytenis Povilaitis', 1),
(18, 'Julius Miežinis', 5),
(19, 'Paulius Tikrasis', 10),
(20, 'Mykolas Starkus', 5),
(21, 'Vaida Kopūstaitė', 5),
(22, 'Vilius Edvinas', 9),
(23, 'Mindaugas Vasiliauskas', 9),
(24, 'Rasa Vilkienė', 4),
(25, 'Jonas Juozaitis', 3),
(26, 'Arvydas Mažonas', 4),
(27, 'Garnys Justas', 5),
(28, 'Smilga Smilga', 5),
(29, 'Artūras Vismantas', 7),
(30, 'Vaidas Veidelis', 9),
(31, 'Ignas Škėma', 3),
(32, 'Adriano Celentano', 2),
(33, 'Ugnė Jonaitė', 3),
(34, 'Mano Gimtadienis', 4),
(35, 'Evelina Protaitė', 5),
(36, 'Darius Dvimtrečias', 6),
(37, 'Kostas Katinas', 6),
(38, 'Geraldijas Lubinas', 6),
(39, 'Min Daugas', 5),
(40, 'Aistė Murzienė', 4),
(41, 'Rimas Domeika', 9),
(42, 'Vidmantas Butkus', 1),
(43, 'Emiteris Tranzistorius', 4),
(44, 'Nekrošius Nekrošius', 5),
(45, 'Edgaras Aukštaitis', 1),
(46, 'Tomas Tomazas', 5),
(47, 'Gražina Svidinskienė', 5),
(48, 'Indrė Stankevičiūtė', 5),
(49, 'Monika Tuminė', 9),
(50, 'Gintaras Kudirka', 7),
(51, 'Gintarė Kudirkienė', 11);

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `client_id` int(11) NOT NULL,
  `barber_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `completed` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `date`, `client_id`, `barber_id`, `created_at`, `completed`) VALUES
(1, '2019-02-23 10:30:00', 1, 1, '2019-02-20 00:37:11', 1),
(2, '2019-02-20 10:15:00', 1, 1, '2019-02-20 00:47:33', 1),
(3, '2019-02-20 10:00:00', 1, 3, '2019-02-20 00:49:23', 0),
(4, '2019-02-20 11:15:00', 2, 2, '2019-02-20 01:05:46', 0),
(5, '2019-02-20 11:15:00', 3, 3, '2019-02-20 01:06:08', 0),
(6, '2019-02-20 12:15:00', 4, 3, '2019-02-20 01:06:34', 0),
(7, '2019-02-20 19:30:00', 5, 3, '2019-02-20 01:07:00', 0),
(8, '2019-02-20 17:30:00', 6, 1, '2019-02-20 01:07:20', 0),
(9, '2019-02-20 09:30:00', 7, 1, '2019-02-20 01:07:38', 0),
(10, '2019-02-20 10:45:00', 8, 4, '2019-02-20 01:08:04', 0),
(11, '2019-02-20 11:45:00', 9, 1, '2019-02-20 01:08:22', 0),
(12, '2019-02-21 09:30:00', 10, 1, '2019-02-20 01:09:40', 0),
(13, '2019-02-25 10:00:00', 11, 2, '2019-02-20 01:10:21', 0),
(14, '2019-02-28 09:30:00', 12, 3, '2019-02-20 01:10:57', 0),
(15, '2019-02-27 10:15:00', 13, 1, '2019-02-20 01:11:28', 0),
(16, '2019-02-24 10:15:00', 14, 2, '2019-02-20 01:11:51', 0),
(17, '2019-02-27 09:15:00', 15, 2, '2019-02-20 01:12:17', 0),
(18, '2019-02-27 10:45:00', 16, 3, '2019-02-20 01:12:41', 0),
(19, '2019-02-28 11:15:00', 17, 2, '2019-02-20 01:13:08', 0),
(20, '2019-03-03 17:15:00', 18, 2, '2019-02-20 01:13:34', 0),
(21, '2019-02-28 10:15:00', 19, 1, '2019-02-20 01:14:04', 0),
(22, '2019-02-26 10:30:00', 20, 2, '2019-02-20 01:14:22', 0),
(23, '2019-02-22 10:45:00', 21, 2, '2019-02-20 01:14:47', 0),
(24, '2019-02-20 13:15:00', 22, 4, '2019-02-20 01:14:58', 0),
(25, '2019-02-21 11:00:00', 23, 3, '2019-02-20 01:15:23', 0),
(26, '2019-02-22 10:15:00', 24, 3, '2019-02-20 01:15:49', 0),
(27, '2019-02-26 10:00:00', 25, 1, '2019-02-20 01:16:18', 0),
(28, '2019-02-28 14:00:00', 26, 3, '2019-02-20 01:16:46', 0),
(29, '2019-02-25 15:00:00', 27, 1, '2019-02-20 01:17:10', 0),
(30, '2019-02-25 10:45:00', 28, 4, '2019-02-20 01:17:31', 0),
(31, '2019-03-04 09:45:00', 29, 2, '2019-02-20 01:18:08', 0),
(32, '2019-04-17 15:15:00', 30, 1, '2019-02-20 01:18:43', 0),
(33, '2019-03-22 10:30:00', 31, 2, '2019-02-20 01:19:16', 0),
(34, '2019-02-28 12:00:00', 32, 4, '2019-02-20 01:19:39', 0),
(35, '2019-03-01 15:45:00', 33, 2, '2019-02-20 01:20:22', 0),
(36, '2019-03-01 09:45:00', 34, 2, '2019-02-20 01:20:54', 0),
(37, '2019-03-05 09:45:00', 35, 2, '2019-02-20 01:21:16', 0),
(38, '2019-03-23 10:30:00', 36, 2, '2019-02-20 01:21:46', 0),
(39, '2019-03-20 10:00:00', 37, 2, '2019-02-20 01:22:42', 0),
(40, '2019-03-26 18:45:00', 38, 1, '2019-02-20 01:23:08', 0),
(41, '2019-02-27 18:45:00', 39, 3, '2019-02-20 01:23:34', 0),
(42, '2019-03-07 19:30:00', 40, 3, '2019-02-20 01:24:00', 0),
(43, '2019-05-25 19:15:00', 41, 3, '2019-02-20 01:24:26', 0),
(44, '2019-04-21 10:30:00', 42, 4, '2019-02-20 01:24:46', 0),
(45, '2019-02-28 17:30:00', 43, 1, '2019-02-20 01:25:11', 0),
(46, '2019-02-28 19:00:00', 44, 3, '2019-02-20 01:25:37', 0),
(47, '2019-02-28 18:45:00', 45, 1, '2019-02-20 01:26:04', 0),
(48, '2019-02-28 14:30:00', 46, 1, '2019-02-20 01:26:42', 0),
(49, '2019-02-28 17:00:00', 47, 4, '2019-02-20 01:27:22', 0),
(50, '2019-02-28 13:15:00', 48, 2, '2019-02-20 01:27:51', 0),
(51, '2019-02-28 16:45:00', 49, 3, '2019-02-20 01:28:28', 0),
(52, '2019-02-28 12:00:00', 50, 2, '2019-02-20 01:28:56', 0),
(53, '2019-02-28 14:00:00', 51, 2, '2019-02-20 01:29:19', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barbers`
--
ALTER TABLE `barbers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barbers`
--
ALTER TABLE `barbers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
