-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2021 at 07:39 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `akada_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_logins`
--

CREATE TABLE `admin_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_super` tinyint(1) NOT NULL DEFAULT 0,
  `is_dev` tinyint(1) NOT NULL DEFAULT 0,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin_logins`
--

INSERT INTO `admin_logins` (`id`, `username`, `password`, `is_super`, `is_dev`, `employee_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 1, 1, NULL, NULL, NULL, NULL, NULL),
(2, 'uchegeorge98', '$2y$10$XbfNgyncgejrj2sPy6LK9eOWzrTxyGcB5k9DESKOIUDs6nbLI65Q2', 0, 0, 3, NULL, NULL, '2021-10-14 17:23:51', '2021-10-14 17:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `applicants`
--

CREATE TABLE `applicants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `applicant_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `applicant_status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applicants`
--

INSERT INTO `applicants` (`id`, `registration_number`, `full_name`, `email`, `date_of_birth`, `gender`, `year_id`, `classroom_id`, `applicant_score`, `applicant_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '76616896ca4a45b', 'Prof. Willy Cruickshank II', 'ypadberg@example.com', '21/05/1982', 'male', 1, 1, '90', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(2, '806616896ca4a672', 'Mr. Cletus Kassulke', 'anya.keebler@example.net', '11/05/2011', 'male', 1, 1, '94', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(3, '78616896ca4a78d', 'Aiyana Heller', 'rey83@example.com', '09/06/1999', 'female', 1, 1, '88', 1, NULL, '2021-10-14 19:44:58', '2021-10-14 19:45:21'),
(4, '132616896ca4a88f', 'Estevan Kunde', 'eloise07@example.net', '13/10/1974', 'male', 1, 1, '68', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(5, '366616896ca4a982', 'Kira Collier III', 'cory08@example.com', '12/09/1997', 'female', 1, 1, '98', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(6, '613616896ca4aa74', 'Zola Borer', 'zelma.rice@example.com', '20/10/2008', 'female', 1, 1, '66', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(7, '83616896ca4ab5f', 'Lolita Rutherford', 'vanessa58@example.com', '20/08/1977', 'female', 1, 1, '45', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(8, '131616896ca4ac4b', 'Dr. Devyn Roberts DVM', 'guadalupe29@example.com', '06/11/1974', 'male', 1, 1, '100', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(9, '324616896ca4ad30', 'Thea Pouros', 'deangelo.balistreri@example.com', '07/06/1998', 'female', 1, 1, '64', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(10, '55616896ca4ae1e', 'Rosemarie Casper', 'agustin.koss@example.com', '24/01/2019', 'female', 1, 1, '84', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(11, '376616896ca4af0c', 'Carleton Brekke IV', 'melisa63@example.org', '16/12/2018', 'male', 1, 1, '64', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(12, '52616896ca4b017', 'Dr. Telly Lakin', 'ebrakus@example.org', '22/11/1999', 'female', 1, 1, '45', 0, NULL, '2021-10-14 19:44:58', '2021-10-14 19:44:58'),
(13, '329616896ca4b0ee', 'Dahlia Brekke', 'raleigh.brekke@example.com', '23/12/2012', 'female', 1, 1, '91', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(14, '685616896ca4b1dc', 'Maiya Von', 'jeanette.halvorson@example.com', '01/05/1970', 'female', 1, 1, '55', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(15, '519616896ca4b398', 'Nigel Hills', 'ngutmann@example.org', '17/04/1978', 'male', 1, 1, '41', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(16, '778616896ca4b4d2', 'Bernhard Kertzmann', 'bweimann@example.org', '03/09/1994', 'male', 1, 1, '78', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(17, '733616896ca4b5e5', 'Dr. Willy Lowe DVM', 'chelsey37@example.com', '28/09/1976', 'male', 1, 1, '41', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(18, '253616896ca4b6e9', 'Loraine Yost', 'julianne.smitham@example.org', '24/09/1975', 'female', 1, 1, '42', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(19, '915616896ca4b801', 'Afton Hintz', 'jovanny45@example.net', '14/10/2013', 'male', 1, 1, '42', 2, NULL, '2021-10-14 19:44:59', '2021-10-14 19:45:21'),
(20, '741616896ca4b94a', 'Julian Casper', 'keebler.lafayette@example.org', '05/03/2013', 'male', 1, 1, '54', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(21, '236616896ca4ba36', 'Alfredo Rempel', 'clemmie90@example.net', '21/03/1991', 'male', 1, 1, '94', 1, NULL, '2021-10-14 19:44:59', '2021-10-14 19:45:22'),
(22, '105616896ca4badd', 'Rosa Satterfield', 'kshlerin.bo@example.net', '02/05/2008', 'female', 1, 1, '72', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(23, '24616896ca4bb71', 'Ottilie Abernathy', 'earnest.schmidt@example.org', '11/07/1976', 'female', 1, 1, '59', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(24, '479616896ca4bbfe', 'Gudrun Brakus', 'tlemke@example.org', '26/11/2014', 'female', 1, 1, '51', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(25, '442616896ca4bc86', 'Floy Satterfield I', 'casey70@example.org', '25/08/2018', 'male', 1, 1, '70', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(26, '572616896ca4bd15', 'Dr. Aisha Williamson', 'hoeger.charity@example.org', '20/08/1996', 'female', 1, 1, '74', 0, NULL, '2021-10-14 19:44:59', '2021-10-14 19:44:59'),
(27, '64616896ca4bda6', 'Prof. Kristina Gusikowski IV', 'matt.wuckert@example.org', '09/06/1979', 'female', 1, 1, '53', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(28, '134616896ca4be41', 'Prof. Hipolito Hane DVM', 'brenda.kihn@example.org', '10/10/1971', 'male', 1, 1, '77', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(29, '69616896ca4becc', 'Miss Bettye Daniel DVM', 'hoeger.berniece@example.com', '17/05/2002', 'female', 1, 1, '92', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(30, '269616896ca4bf54', 'Willard Hickle', 'floy70@example.com', '08/07/2001', 'male', 1, 1, '48', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(31, '890616896ca4bfde', 'Abigail Mante', 'kaylie.jakubowski@example.org', '21/12/1981', 'female', 1, 1, '41', 2, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:19'),
(32, '443616896ca4c069', 'Mr. Bertrand Herzog', 'norene.hilpert@example.net', '26/01/2016', 'male', 1, 1, '50', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(33, '50616896ca4c0f4', 'Dr. Cleveland Heaney', 'shanie80@example.org', '29/03/2009', 'male', 1, 1, '44', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(34, '730616896ca4c17f', 'Randall Muller Jr.', 'weber.gaetano@example.org', '26/11/2019', 'male', 1, 1, '85', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(35, '657616896ca4c268', 'Bernie Johnston', 'heidi.emmerich@example.net', '12/05/1995', 'male', 1, 1, '70', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(36, '44616896ca4c2f8', 'Dr. Edmond Streich DDS', 'abigail16@example.org', '17/08/1994', 'male', 1, 1, '95', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(37, '315616896ca4c37f', 'Pinkie Marks', 'adelia.feest@example.com', '30/03/2015', 'female', 1, 1, '90', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(38, '322616896ca4c40d', 'Blanche Schmitt', 'germaine.miller@example.net', '10/04/2006', 'female', 1, 1, '68', 0, NULL, '2021-10-14 19:45:00', '2021-10-14 19:45:00'),
(39, '274616896ca4c497', 'Giovani Zulauf PhD', 'bwyman@example.net', '31/10/2001', 'male', 1, 1, '89', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(40, '593616896ca4c517', 'Miss Yvette Murray', 'yost.mandy@example.org', '13/09/2003', 'female', 1, 1, '46', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(41, '192616896ca4c5bf', 'Barney Mohr', 'gutkowski.dan@example.org', '02/04/2019', 'male', 1, 1, '72', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(42, '136616896ca4c65e', 'Werner Quitzon', 'retta.bogisich@example.net', '23/02/1987', 'male', 1, 1, '42', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(43, '262616896ca4c6e8', 'Monte Heaney', 'zemlak.jada@example.org', '08/02/1976', 'male', 1, 1, '40', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(44, '15616896ca4c776', 'Ms. Darby Greenholt DVM', 'liliana.conroy@example.net', '30/05/2001', 'female', 1, 1, '99', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(45, '184616896ca4c7fd', 'Danika Reinger', 'oswaldo79@example.net', '31/03/1987', 'female', 1, 1, '73', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(46, '237616896ca4c889', 'Dr. Cielo Bartell MD', 'susan.hahn@example.net', '21/03/1990', 'male', 1, 1, '96', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(47, '965616896ca4c914', 'Prof. Wayne Wolff I', 'gpfeffer@example.org', '14/03/2015', 'male', 1, 1, '63', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(48, '947616896ca4c999', 'Emmet Larson', 'grimes.reuben@example.org', '06/11/2007', 'male', 1, 1, '67', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(49, '776616896ca4ca24', 'Dr. Candace Ziemann', 'shane.rutherford@example.net', '07/10/1999', 'female', 1, 1, '87', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(50, '539616896ca4caae', 'Berenice Schinner IV', 'davis.alfonzo@example.org', '05/12/2010', 'female', 1, 1, '44', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(51, '861616896ca4cb36', 'Isabella Goodwin', 'clehner@example.net', '04/01/2001', 'female', 1, 1, '68', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(52, '129616896ca4cbb3', 'Roel Heaney', 'salma45@example.org', '06/07/2002', 'male', 1, 1, '59', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(53, '587616896ca4cc3c', 'Prof. Sven Larkin', 'arianna.abbott@example.com', '24/01/2000', 'male', 1, 1, '56', 0, NULL, '2021-10-14 19:45:01', '2021-10-14 19:45:01'),
(54, '347616896ca4ccc4', 'Hazel Blick', 'alia11@example.com', '06/04/2018', 'male', 1, 1, '63', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(55, '420616896ca4cd50', 'Frida Sauer Sr.', 'name.murphy@example.org', '12/09/1977', 'female', 1, 1, '90', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(56, '60616896ca4cdd7', 'Noelia Zieme', 'corene.white@example.org', '24/08/2019', 'female', 1, 1, '41', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(57, '781616896ca4cf19', 'Grover Johnston', 'ana02@example.org', '17/04/2021', 'male', 1, 1, '82', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(58, '486616896ca4cfa4', 'Cornell Frami', 'cartwright.jonatan@example.net', '07/04/2008', 'male', 1, 1, '58', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(59, '797616896ca4d02b', 'Charity Willms', 'batz.alexandria@example.com', '17/10/1977', 'female', 1, 1, '86', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(60, '166616896ca4d0b4', 'Dr. Edd Schneider', 'xhalvorson@example.net', '01/10/1999', 'male', 1, 1, '59', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(61, '777616896ca4d132', 'Dewayne Leffler', 'fbosco@example.com', '04/07/1988', 'male', 1, 1, '62', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(62, '928616896ca4d1e9', 'Dr. Myrl Hettinger', 'ettie.turner@example.com', '12/01/1970', 'male', 1, 1, '63', 0, NULL, '2021-10-14 19:45:02', '2021-10-14 19:45:02'),
(63, '419616896ca4d277', 'Dr. Frieda Kerluke', 'hhammes@example.net', '22/03/1981', 'female', 1, 1, '79', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(64, '53616896ca4d2f5', 'Scarlett Mante', 'leo.fisher@example.com', '13/02/2013', 'female', 1, 1, '88', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(65, '691616896ca4d37c', 'Lorine Bogisich', 'ida99@example.com', '24/11/1974', 'female', 1, 1, '41', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(66, '30616896ca4d409', 'Ms. Corine Adams V', 'geo.jacobson@example.com', '29/08/1999', 'female', 1, 1, '46', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(67, '993616896ca4d52a', 'Johann Keeling', 'znicolas@example.net', '28/05/1993', 'male', 1, 1, '79', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(68, '349616896ca4d5ad', 'Adrien McDermott', 'tlittel@example.org', '24/08/2002', 'male', 1, 1, '94', 1, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:21'),
(69, '610616896ca4d67a', 'Johnpaul Schultz', 'maryjane.boyer@example.net', '27/05/1997', 'male', 1, 1, '74', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(70, '544616896ca4d7d4', 'Tommie Satterfield', 'maudie.boehm@example.net', '24/11/1990', 'male', 1, 1, '59', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(71, '328616896ca4d8b9', 'Mrs. Eleanore Howell', 'veda17@example.net', '04/07/2017', 'female', 1, 1, '91', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(72, '44616896ca4d992', 'Bryon Steuber', 'mekhi59@example.net', '12/12/1986', 'male', 1, 1, '55', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(73, '420616896ca4da2a', 'Rosalia Howell', 'qgrant@example.org', '03/11/1997', 'female', 1, 1, '46', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(74, '908616896ca4dad4', 'Keven Swift', 'agreenholt@example.net', '05/01/2010', 'male', 1, 1, '55', 0, NULL, '2021-10-14 19:45:03', '2021-10-14 19:45:03'),
(75, '186616896ca4db6f', 'Prof. Don Rolfson V', 'cpacocha@example.org', '13/11/1984', 'male', 1, 1, '94', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(76, '766616896ca4dbf3', 'Arturo Schultz', 'tremblay.kamren@example.net', '08/02/1976', 'male', 1, 1, '95', 1, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:24'),
(77, '493616896ca4dc7c', 'Mallory Wyman', 'kspinka@example.org', '23/01/2004', 'male', 1, 1, '68', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(78, '238616896ca4dd00', 'Polly Stroman', 'asia84@example.org', '26/11/2019', 'female', 1, 1, '70', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(79, '147616896ca4dd8a', 'Katrine Monahan', 'amiya56@example.net', '02/07/1990', 'female', 1, 1, '95', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(80, '947616896ca4de12', 'Elyssa Cormier', 'antwan24@example.org', '20/02/2000', 'female', 1, 1, '70', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(81, '605616896ca4de9d', 'Prof. Fabiola Pacocha', 'sauer.ulices@example.org', '19/12/1982', 'female', 1, 1, '84', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(82, '23616896ca4df23', 'Watson Cassin', 'allison.klocko@example.org', '03/06/1981', 'male', 1, 1, '76', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(83, '822616896ca4dfac', 'Dereck Schumm Sr.', 'fborer@example.net', '21/10/1974', 'male', 1, 1, '89', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(84, '612616896ca4e028', 'Daniela Gutkowski', 'rlueilwitz@example.org', '24/04/2008', 'female', 1, 1, '48', 0, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:04'),
(85, '174616896ca4e10c', 'Andrew Nolan', 'isaias.rohan@example.com', '01/01/1998', 'male', 1, 1, '74', 1, NULL, '2021-10-14 19:45:04', '2021-10-14 19:45:23'),
(86, '15616896ca4e196', 'Prof. Adrian Smitham', 'schowalter.haven@example.com', '08/02/1995', 'male', 1, 1, '98', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(87, '412616896ca4e221', 'Fernando Mitchell DDS', 'margaretta.ratke@example.org', '29/12/1971', 'male', 1, 1, '63', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(88, '480616896ca4e2a6', 'Shaun Jakubowski', 'vladimir95@example.com', '29/08/1996', 'male', 1, 1, '63', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(89, '824616896ca4e32c', 'Darby Dietrich', 'wisoky.birdie@example.net', '05/08/2015', 'female', 1, 1, '69', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(90, '318616896ca4e3b3', 'Evans DuBuque', 'jones.barbara@example.net', '27/12/1976', 'male', 1, 1, '53', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(91, '866616896ca4e43f', 'Miss Marielle Langworth V', 'hyatt.stacy@example.org', '27/10/1976', 'female', 1, 1, '95', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(92, '541616896ca4e4c9', 'Katelyn Dicki', 'candace47@example.com', '20/11/1977', 'female', 1, 1, '96', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(93, '99616896ca4e552', 'Ms. Hassie Durgan', 'ybernhard@example.com', '23/04/1995', 'female', 1, 1, '57', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(94, '808616896ca4e5d3', 'Enrico Hagenes V', 'sdurgan@example.org', '15/11/1976', 'male', 1, 1, '58', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(95, '790616896ca4e652', 'Bernardo Pouros II', 'metz.al@example.com', '14/02/1992', 'male', 1, 1, '71', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(96, '812616896ca4e6da', 'Golden Lynch III', 'humberto16@example.net', '30/08/2001', 'male', 1, 1, '50', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(97, '588616896ca4e761', 'Ismael Ritchie', 'candelario08@example.org', '12/08/2012', 'male', 1, 1, '77', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(98, '700616896ca4e7ec', 'Silas Abernathy DDS', 'sullrich@example.org', '17/12/1970', 'male', 1, 1, '67', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(99, '630616896ca4e869', 'Jacky Bednar', 'aauer@example.net', '04/10/2008', 'female', 1, 1, '52', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(100, '709616896ca4e8e8', 'Halle Stoltenberg', 'barton.lila@example.com', '13/05/1994', 'male', 1, 1, '74', 0, NULL, '2021-10-14 19:45:05', '2021-10-14 19:45:05'),
(101, '469616896ca4e96e', 'Kris Collins', 'gislason.paxton@example.com', '14/07/1970', 'male', 1, 1, '67', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(102, '793616896ca4e9f9', 'Mrs. Ocie Schuppe V', 'abdul.sanford@example.net', '10/08/1990', 'female', 1, 1, '58', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(103, '1616896ca4ea80', 'Jessyca Jast', 'amayer@example.net', '29/06/1978', 'female', 1, 1, '40', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(104, '448616896ca4eaff', 'Dr. Johathan Boyer DDS', 'yoshiko.kihn@example.com', '23/10/1982', 'male', 1, 1, '43', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(105, '232616896ca4eb84', 'Verlie Feest', 'medhurst.tabitha@example.net', '23/03/2003', 'female', 1, 1, '62', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(106, '398616896ca4ec0a', 'Lynn Williamson', 'hardy37@example.org', '20/01/2021', 'female', 1, 1, '59', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(107, '9616896ca4ed90', 'Jena Sawayn', 'sawayn.mathilde@example.com', '13/09/2018', 'female', 1, 1, '45', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(108, '483616896ca4eeb8', 'Hal Anderson', 'kuvalis.ava@example.org', '09/01/1976', 'male', 1, 1, '75', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(109, '480616896ca4efcd', 'Freeman Gerhold', 'haag.antonia@example.com', '24/03/2002', 'male', 1, 1, '79', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(110, '341616896ca4f0e2', 'Lyda Lind', 'hills.earline@example.org', '03/06/2007', 'female', 1, 1, '68', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(111, '742616896ca4f1f1', 'Helen Kub', 'ohara.frida@example.com', '09/11/2003', 'female', 1, 1, '63', 0, NULL, '2021-10-14 19:45:06', '2021-10-14 19:45:06'),
(112, '647616896ca4f4a2', 'Bertha Wolff', 'carson92@example.com', '05/11/1989', 'male', 1, 1, '54', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(113, '479616896ca4f611', 'Miles Dare', 'sofia.hamill@example.net', '13/05/2003', 'male', 1, 1, '51', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(114, '499616896ca4f6fe', 'Haylie Legros MD', 'shields.alverta@example.com', '04/02/1978', 'female', 1, 1, '74', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(115, '701616896ca4f7d4', 'Kari Daugherty', 'bkunde@example.com', '31/12/1974', 'female', 1, 1, '82', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(116, '411616896ca4f8a2', 'Dr. Meghan Goodwin IV', 'pat79@example.com', '25/06/1976', 'female', 1, 1, '94', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(117, '151616896ca4f9c0', 'Alysson Fay', 'amanda07@example.net', '06/12/2018', 'female', 1, 1, '68', 1, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:23'),
(118, '763616896ca4fae0', 'Dortha Abshire', 'becker.lavon@example.org', '19/12/1971', 'female', 1, 1, '80', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(119, '478616896ca4fbcf', 'Elza Fadel', 'francis.rowe@example.net', '22/11/1980', 'female', 1, 1, '81', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(120, '118616896ca4fcbc', 'Devan Hammes', 'herman.nellie@example.com', '06/08/1995', 'male', 1, 1, '77', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(121, '870616896ca4fdb2', 'Miss Calista Friesen II', 'mernser@example.com', '13/04/2012', 'female', 1, 1, '88', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(122, '828616896ca4fe67', 'Wilhelmine Schneider', 'rau.marion@example.org', '24/04/2006', 'female', 1, 1, '97', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(123, '213616896ca4fefe', 'Ms. Margarette Homenick Jr.', 'kfisher@example.com', '27/10/1987', 'female', 1, 1, '78', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(124, '412616896ca4ff83', 'Ericka Ratke', 'ena.marvin@example.org', '28/01/1977', 'female', 1, 1, '85', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(125, '347616896ca50016', 'Augusta Beer', 'ubogan@example.net', '28/05/1978', 'female', 1, 1, '49', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(126, '791616896ca50097', 'Gilberto Bechtelar', 'rkris@example.net', '18/05/1998', 'male', 1, 1, '53', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(127, '216616896ca50115', 'Cortney Sipes', 'jermain.rath@example.org', '08/08/1988', 'female', 1, 1, '93', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(128, '129616896ca5019d', 'Delfina Nikolaus', 'rnolan@example.com', '18/01/2007', 'female', 1, 1, '69', 0, NULL, '2021-10-14 19:45:07', '2021-10-14 19:45:07'),
(129, '564616896ca5021e', 'Marquise D\'Amore V', 'schultz.destinee@example.com', '05/04/2014', 'female', 1, 1, '40', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(130, '534616896ca502ab', 'Mrs. Nicole Braun I', 'judy.mayert@example.org', '30/11/2012', 'female', 1, 1, '80', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(131, '718616896ca50332', 'Barry Ryan', 'rahul76@example.org', '29/10/2000', 'male', 1, 1, '85', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(132, '191616896ca503e2', 'Emilie Hintz', 'bernier.thad@example.net', '17/05/2020', 'female', 1, 1, '67', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(133, '970616896ca50482', 'Mrs. Stephania Nienow I', 'srosenbaum@example.net', '04/09/2019', 'female', 1, 1, '77', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(134, '718616896ca504ff', 'Josie Boyer', 'bogisich.carlie@example.org', '27/09/1988', 'female', 1, 1, '89', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(135, '449616896ca50586', 'Joelle Schiller', 'sebert@example.com', '07/01/1978', 'female', 1, 1, '54', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(136, '482616896ca50602', 'Chyna Grady', 'britney57@example.org', '21/01/2002', 'female', 1, 1, '99', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(137, '85616896ca5068e', 'Dr. Rachelle Kulas V', 'tledner@example.org', '01/10/2006', 'female', 1, 1, '40', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(138, '767616896ca5070e', 'Prof. Camilla Quitzon I', 'bella.beier@example.com', '28/08/1971', 'female', 1, 1, '99', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(139, '71616896ca507a3', 'Carlie Cremin', 'deshawn.ryan@example.com', '08/09/1980', 'female', 1, 1, '88', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(140, '211616896ca50863', 'Braeden Wisoky', 'dion.harvey@example.com', '04/01/2011', 'male', 1, 1, '72', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(141, '845616896ca5091c', 'Gaylord Pollich', 'lloyd48@example.org', '28/11/1991', 'male', 1, 1, '79', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(142, '544616896ca50a08', 'Stanley Walsh', 'breana.konopelski@example.net', '30/06/1971', 'male', 1, 1, '58', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(143, '275616896ca50ad0', 'Abigail Thiel', 'mohammad.frami@example.com', '14/07/1983', 'female', 1, 1, '65', 1, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:20'),
(144, '243616896ca50ba6', 'Dr. Sonny Hackett Jr.', 'okuneva.mandy@example.org', '13/06/1993', 'male', 1, 1, '41', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(145, '228616896ca50c71', 'Mrs. Tierra Thiel', 'kiehn.jakob@example.org', '24/03/2008', 'female', 1, 1, '42', 0, NULL, '2021-10-14 19:45:08', '2021-10-14 19:45:08'),
(146, '304616896ca50d38', 'Alva Veum', 'daniel.lorine@example.net', '02/04/1977', 'female', 1, 1, '98', 1, NULL, '2021-10-14 19:45:09', '2021-10-14 19:45:22'),
(147, '150616896ca50dff', 'Nettie Hartmann', 'kkessler@example.com', '28/11/2005', 'female', 1, 1, '40', 0, NULL, '2021-10-14 19:45:09', '2021-10-14 19:45:09'),
(148, '617616896ca50ebf', 'Mr. Freddie Hill PhD', 'conor35@example.net', '16/06/1992', 'male', 1, 1, '100', 0, NULL, '2021-10-14 19:45:09', '2021-10-14 19:45:09'),
(149, '178616896ca50f8f', 'Johnathan Bergstrom III', 'eduardo.casper@example.org', '23/07/2020', 'male', 1, 1, '63', 0, NULL, '2021-10-14 19:45:09', '2021-10-14 19:45:09'),
(150, '88616896ca51081', 'Dr. Tre Yost V', 'vsipes@example.net', '23/08/1970', 'male', 1, 1, '62', 0, NULL, '2021-10-14 19:45:09', '2021-10-14 19:45:09');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classroom_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classroom_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `classroom_title`, `sub_title`, `classroom_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Js1', NULL, 'js1', NULL, '2021-10-14 16:29:52', '2021-10-14 16:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `classroom_fees`
--

CREATE TABLE `classroom_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `classroom_subjects`
--

CREATE TABLE `classroom_subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classroom_subjects`
--

INSERT INTO `classroom_subjects` (`id`, `subject_id`, `classroom_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, '2021-10-14 16:29:52', '2021-10-14 16:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `full_name`, `email`, `role_id`, `classroom_id`, `subject_id`, `employee_image`, `employee_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@d.k', 1, NULL, NULL, NULL, 'dg', NULL, NULL, NULL),
(2, 'Uche George Ogbechie', 'ucheofunne.o@gmail.com', 2, 1, 1, NULL, 'uchegeorgeogbechie23', NULL, '2021-10-14 17:17:17', '2021-10-14 17:17:17'),
(3, 'Uche George', 'ucheofunne.o@gmail.comjhgu', 1, NULL, NULL, NULL, 'uchegeorge98', NULL, '2021-10-14 17:23:51', '2021-10-14 17:23:51');

-- --------------------------------------------------------

--
-- Table structure for table `exam_scores`
--

CREATE TABLE `exam_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ex_score` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_scores`
--

INSERT INTO `exam_scores` (`id`, `subject_id`, `result_id`, `ex_score`, `deleted_at`, `created_at`, `updated_at`) VALUES
(9, 1, 1, 40, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37'),
(10, 1, 2, 25, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37'),
(11, 1, 3, 3, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37'),
(12, 1, 4, 24, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37'),
(13, 1, 5, 40, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37'),
(14, 1, 6, 12, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37'),
(15, 1, 7, 20, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37'),
(16, 1, 8, 24, NULL, '2021-10-15 07:06:37', '2021-10-15 07:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `first_assessment_scores`
--

CREATE TABLE `first_assessment_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `fa_score` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `first_assessment_scores`
--

INSERT INTO `first_assessment_scores` (`id`, `subject_id`, `result_id`, `fa_score`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 8, NULL, '2021-10-15 07:02:55', '2021-10-15 07:02:55'),
(2, 1, 2, 54, NULL, '2021-10-15 07:02:55', '2021-10-15 07:02:55'),
(3, 1, 3, 200, NULL, '2021-10-15 07:02:55', '2021-10-15 07:02:55'),
(4, 1, 4, 1, NULL, '2021-10-15 07:02:55', '2021-10-15 07:02:55'),
(5, 1, 5, 200, NULL, '2021-10-15 07:02:56', '2021-10-15 07:02:56'),
(6, 1, 6, 54, NULL, '2021-10-15 07:02:56', '2021-10-15 07:02:56'),
(7, 1, 7, 8, NULL, '2021-10-15 07:02:56', '2021-10-15 07:02:56'),
(8, 1, 8, 54, NULL, '2021-10-15 07:02:56', '2021-10-15 07:02:56');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_10_14_055828_create_years_table', 1),
(6, '2021_10_14_060216_create_classrooms_table', 1),
(7, '2021_10_14_060521_create_classroom_fees_table', 1),
(8, '2021_10_14_060723_create_subjects_table', 1),
(9, '2021_10_14_060935_create_roles_table', 1),
(10, '2021_10_14_061003_create_employees_table', 1),
(11, '2021_10_14_061442_create_admin_logins_table', 1),
(12, '2021_10_14_061651_create_teacher_logins_table', 1),
(13, '2021_10_14_061803_create_teacher_classroom_rels_table', 1),
(14, '2021_10_14_061827_create_teacher_subject_rels_table', 1),
(15, '2021_10_14_062334_create_applicants_table', 1),
(16, '2021_10_14_063228_create_students_table', 1),
(17, '2021_10_14_063501_create_student_logins_table', 1),
(18, '2021_10_14_064102_create_wallets_table', 1),
(19, '2021_10_14_064508_create_student_attendances_table', 1),
(20, '2021_10_14_064728_create_results_table', 1),
(21, '2021_10_14_065157_create_result_details_table', 1),
(22, '2021_10_14_065200_create_payments_table', 1),
(23, '2021_10_14_103708_create_classroom_subjects_table', 1),
(24, '2021_10_15_073258_create_first_assessment_scores_table', 2),
(25, '2021_10_15_073725_create_second_assessment_scores_table', 2),
(26, '2021_10_15_073752_create_exam_scores_table', 2),
(28, '2021_10_15_121536_create_result_logs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `payment_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `classroom_id`, `year_id`, `payment_status`, `payment_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 0, 'AKA/2021/2022275616896ca50ad0', NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(2, 2, 1, 1, 0, 'AKA/2021/2022349616896ca4d5ad', NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(3, 3, 1, 1, 0, 'AKA/2021/202278616896ca4a78d', NULL, '2021-10-14 19:45:21', '2021-10-14 19:45:21'),
(4, 4, 1, 1, 0, 'AKA/2021/2022236616896ca4ba36', NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(5, 5, 1, 1, 0, 'AKA/2021/2022304616896ca50d38', NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(6, 6, 1, 1, 0, 'AKA/2021/2022151616896ca4f9c0', NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(7, 7, 1, 1, 0, 'AKA/2021/2022174616896ca4e10c', NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(8, 8, 1, 1, 0, 'AKA/2021/2022766616896ca4dbf3', NULL, '2021-10-14 19:45:24', '2021-10-14 19:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `grand_score` double(8,2) DEFAULT NULL,
  `average_score` double(8,2) DEFAULT NULL,
  `session_average` double(8,2) DEFAULT NULL,
  `result_status` int(11) NOT NULL DEFAULT 0,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attendance_per_cent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `result_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `classroom_id`, `year_id`, `grand_score`, `average_score`, `session_average`, `result_status`, `grade`, `comment`, `attendance_per_cent`, `result_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'nnn', NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(2, 2, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'nmm', NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(3, 3, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'AKA/2021/202278616896ca4a78d', NULL, '2021-10-14 19:45:21', '2021-10-14 19:45:21'),
(4, 4, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'AKA/2021/2022236616896ca4ba36', NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(5, 5, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'AKA/2021/2022304616896ca50d38', NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(6, 6, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'AKA/2021/2022151616896ca4f9c0', NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(7, 7, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'AKA/2021/2022174616896ca4e10c', NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(8, 8, 1, 1, NULL, NULL, NULL, 0, NULL, NULL, NULL, 'AKA/2021/2022766616896ca4dbf3', NULL, '2021-10-14 19:45:24', '2021-10-14 19:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `result_details`
--

CREATE TABLE `result_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ca_1` int(11) DEFAULT NULL,
  `ca_2` double(8,2) DEFAULT NULL,
  `ca_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `exam_score` int(11) DEFAULT NULL,
  `total_score` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_details`
--

INSERT INTO `result_details` (`id`, `subject_id`, `result_id`, `ca_1`, `ca_2`, `ca_3`, `exam_score`, `total_score`, `deleted_at`, `created_at`, `updated_at`) VALUES
(41, 1, 1, 8, 12.00, NULL, 40, 60, NULL, '2021-10-15 11:28:51', '2021-10-15 11:28:51'),
(42, 1, 2, 54, 25.00, NULL, 25, 104, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52'),
(43, 1, 3, 200, 30.00, NULL, 3, 233, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52'),
(44, 1, 4, 1, 14.00, NULL, 24, 39, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52'),
(45, 1, 5, 200, 25.00, NULL, 40, 265, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52'),
(46, 1, 6, 54, 20.00, NULL, 12, 86, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52'),
(47, 1, 7, 8, 25.00, NULL, 20, 53, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52'),
(48, 1, 8, 54, 30.00, NULL, 24, 108, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `result_logs`
--

CREATE TABLE `result_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `log_status` int(11) NOT NULL DEFAULT 0,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `result_logs`
--

INSERT INTO `result_logs` (`id`, `employee_id`, `subject_id`, `classroom_id`, `year_id`, `log_status`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 1, NULL, '2021-10-15 11:28:52', '2021-10-15 11:28:52');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL, NULL),
(2, 'teacher', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `second_assessment_scores`
--

CREATE TABLE `second_assessment_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `result_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sa_score` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `second_assessment_scores`
--

INSERT INTO `second_assessment_scores` (`id`, `subject_id`, `result_id`, `sa_score`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 12, NULL, '2021-10-15 07:05:12', '2021-10-15 07:05:12'),
(2, 1, 2, 25, NULL, '2021-10-15 07:05:12', '2021-10-15 07:05:12'),
(3, 1, 3, 30, NULL, '2021-10-15 07:05:12', '2021-10-15 07:05:12'),
(4, 1, 4, 14, NULL, '2021-10-15 07:05:13', '2021-10-15 07:05:13'),
(5, 1, 5, 25, NULL, '2021-10-15 07:05:13', '2021-10-15 07:05:13'),
(6, 1, 6, 20, NULL, '2021-10-15 07:05:13', '2021-10-15 07:05:13'),
(7, 1, 7, 25, NULL, '2021-10-15 07:05:13', '2021-10-15 07:05:13'),
(8, 1, 8, 30, NULL, '2021-10-15 07:05:13', '2021-10-15 07:05:13');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `registration_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `registration_number`, `full_name`, `date_of_birth`, `gender`, `classroom_id`, `student_image`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'AKA/2021/2022275616896ca50ad0', 'Abigail Thiel', '14/07/1983', 'female', 1, NULL, NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(2, 'AKA/2021/2022349616896ca4d5ad', 'Adrien McDermott', '24/08/2002', 'male', 1, NULL, NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(3, 'AKA/2021/202278616896ca4a78d', 'Aiyana Heller', '09/06/1999', 'female', 1, NULL, NULL, '2021-10-14 19:45:21', '2021-10-14 19:45:21'),
(4, 'AKA/2021/2022236616896ca4ba36', 'Alfredo Rempel', '21/03/1991', 'male', 1, NULL, NULL, '2021-10-14 19:45:21', '2021-10-14 19:45:21'),
(5, 'AKA/2021/2022304616896ca50d38', 'Alva Veum', '02/04/1977', 'female', 1, NULL, NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(6, 'AKA/2021/2022151616896ca4f9c0', 'Alysson Fay', '06/12/2018', 'female', 1, NULL, NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(7, 'AKA/2021/2022174616896ca4e10c', 'Andrew Nolan', '01/01/1998', 'male', 1, NULL, NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(8, 'AKA/2021/2022766616896ca4dbf3', 'Arturo Schultz', '08/02/1976', 'male', 1, NULL, NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendances`
--

CREATE TABLE `student_attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `year_id` bigint(20) UNSIGNED DEFAULT NULL,
  `attendance_status` tinyint(1) NOT NULL DEFAULT 0,
  `attendance_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_attendances`
--

INSERT INTO `student_attendances` (`id`, `student_id`, `classroom_id`, `year_id`, `attendance_status`, `attendance_date`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13'),
(2, 2, 1, 1, 0, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13'),
(3, 3, 1, 1, 1, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13'),
(4, 4, 1, 1, 0, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13'),
(5, 5, 1, 1, 1, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13'),
(6, 6, 1, 1, 0, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13'),
(7, 7, 1, 1, 1, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13'),
(8, 8, 1, 1, 0, '15-10-2021', NULL, '2021-10-15 04:55:13', '2021-10-15 04:55:13');

-- --------------------------------------------------------

--
-- Table structure for table `student_logins`
--

CREATE TABLE `student_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_logins`
--

INSERT INTO `student_logins` (`id`, `username`, `email`, `password`, `student_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'abigailthiel67', 'mohammad.frami@example.com', '$2y$10$JdPeDUiFkE.ByQ0F8u/QbeQzgQalzbDYSxOHmA5byNlwLFQulSRbW', 1, NULL, NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(3, 'adrienmcdermott86', 'tlittel@example.org', '$2y$10$xLprtxNHGTm0w6jjSAXrSOeph7cMq/TGwp2cQiO5MfNyv.h7fPNRS', 2, NULL, NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(4, 'aiyanaheller55', 'rey83@example.com', '$2y$10$jDRY1Bdhv1051jz/dIxBTuLwrH1iZY77MVYE9dfHXynUjwBcEDytm', 3, NULL, NULL, '2021-10-14 19:45:21', '2021-10-14 19:45:21'),
(5, 'alfredorempel29', 'clemmie90@example.net', '$2y$10$FBxCjTAm9DtxbKLmLawizu8h5LvPEiWu2gek/9nxjFFN03nwdX/Ky', 4, NULL, NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(6, 'alvaveum58', 'daniel.lorine@example.net', '$2y$10$d92CNc.uH4wmOGxYg/JZvuuYoZ/pYGVb58Zws2Fv8B.C6tpTb4lDa', 5, NULL, NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(7, 'alyssonfay47', 'amanda07@example.net', '$2y$10$NiW4PFlES38Iq68Ii96msuDXdB9Jx7ykCQDlcZ6atGAKJ20avzMbG', 6, NULL, NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(8, 'andrewnolan60', 'isaias.rohan@example.com', '$2y$10$OYFfSE.S4tvYxhR7IVjOGeiddvANEyQ3lm4DMXX1Zt4.fyWaP8TFO', 7, NULL, NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(9, 'arturoschultz77', 'tremblay.kamren@example.net', '$2y$10$ETOczjU5xVdOjRQ4NvECSukWQJiB47hcQSIJ0SgOaC7AeE0BNLMa.', 8, NULL, NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_title`, `sub_title`, `subject_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Mahs', 'saad', 'mahs', NULL, '2021-10-14 16:29:30', '2021-10-14 16:29:30');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_classroom_rels`
--

CREATE TABLE `teacher_classroom_rels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_logins`
--

CREATE TABLE `teacher_logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teacher_logins`
--

INSERT INTO `teacher_logins` (`id`, `username`, `password`, `employee_id`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'uchegeorgeogbechie23', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 2, NULL, NULL, '2021-10-14 17:17:17', '2021-10-14 17:17:17');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject_rels`
--

CREATE TABLE `teacher_subject_rels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `account_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `student_id`, `account_balance`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 1, 'AKA/2021/2022275616896ca50ad0', NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(3, 2, 'AKA/2021/2022349616896ca4d5ad', NULL, '2021-10-14 19:45:20', '2021-10-14 19:45:20'),
(4, 3, 'AKA/2021/202278616896ca4a78d', NULL, '2021-10-14 19:45:21', '2021-10-14 19:45:21'),
(5, 4, 'AKA/2021/2022236616896ca4ba36', NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(6, 5, 'AKA/2021/2022304616896ca50d38', NULL, '2021-10-14 19:45:22', '2021-10-14 19:45:22'),
(7, 6, 'AKA/2021/2022151616896ca4f9c0', NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(8, 7, 'AKA/2021/2022174616896ca4e10c', NULL, '2021-10-14 19:45:23', '2021-10-14 19:45:23'),
(9, 8, 'AKA/2021/2022766616896ca4dbf3', NULL, '2021-10-14 19:45:24', '2021-10-14 19:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `years`
--

CREATE TABLE `years` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `term` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year_status` int(11) NOT NULL DEFAULT 0,
  `result_status` int(11) NOT NULL DEFAULT 0,
  `days_per_session` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admission_score` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `year_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `years`
--

INSERT INTO `years` (`id`, `session`, `term`, `year_status`, `result_status`, `days_per_session`, `admission_score`, `year_slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '2021/2022', '1', 0, 0, '70', '45', 'kugiugugu', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_logins_username_unique` (`username`),
  ADD KEY `admin_logins_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `applicants`
--
ALTER TABLE `applicants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `applicants_registration_number_unique` (`registration_number`),
  ADD UNIQUE KEY `applicants_email_unique` (`email`),
  ADD KEY `applicants_year_id_foreign` (`year_id`),
  ADD KEY `applicants_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classroom_fees`
--
ALTER TABLE `classroom_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classroom_fees_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `classroom_subjects`
--
ALTER TABLE `classroom_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classroom_subjects_subject_id_foreign` (`subject_id`),
  ADD KEY `classroom_subjects_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_email_unique` (`email`),
  ADD KEY `employees_role_id_foreign` (`role_id`),
  ADD KEY `employees_classroom_id_foreign` (`classroom_id`),
  ADD KEY `employees_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `exam_scores`
--
ALTER TABLE `exam_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exam_scores_subject_id_foreign` (`subject_id`),
  ADD KEY `exam_scores_result_id_foreign` (`result_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `first_assessment_scores`
--
ALTER TABLE `first_assessment_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `first_assessment_scores_subject_id_foreign` (`subject_id`),
  ADD KEY `first_assessment_scores_result_id_foreign` (`result_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_id_foreign` (`student_id`),
  ADD KEY `payments_classroom_id_foreign` (`classroom_id`),
  ADD KEY `payments_year_id_foreign` (`year_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `results_student_id_foreign` (`student_id`),
  ADD KEY `results_classroom_id_foreign` (`classroom_id`),
  ADD KEY `results_year_id_foreign` (`year_id`);

--
-- Indexes for table `result_details`
--
ALTER TABLE `result_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_details_subject_id_foreign` (`subject_id`),
  ADD KEY `result_details_result_id_foreign` (`result_id`);

--
-- Indexes for table `result_logs`
--
ALTER TABLE `result_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `result_logs_employee_id_foreign` (`employee_id`),
  ADD KEY `result_logs_subject_id_foreign` (`subject_id`),
  ADD KEY `result_logs_classroom_id_foreign` (`classroom_id`),
  ADD KEY `result_logs_year_id_foreign` (`year_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `second_assessment_scores`
--
ALTER TABLE `second_assessment_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `second_assessment_scores_subject_id_foreign` (`subject_id`),
  ADD KEY `second_assessment_scores_result_id_foreign` (`result_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_registration_number_unique` (`registration_number`),
  ADD KEY `students_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_attendances_student_id_foreign` (`student_id`),
  ADD KEY `student_attendances_classroom_id_foreign` (`classroom_id`),
  ADD KEY `student_attendances_year_id_foreign` (`year_id`);

--
-- Indexes for table `student_logins`
--
ALTER TABLE `student_logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `student_logins_username_unique` (`username`),
  ADD UNIQUE KEY `student_logins_email_unique` (`email`),
  ADD KEY `student_logins_student_id_foreign` (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_classroom_rels`
--
ALTER TABLE `teacher_classroom_rels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_classroom_rels_employee_id_foreign` (`employee_id`),
  ADD KEY `teacher_classroom_rels_classroom_id_foreign` (`classroom_id`);

--
-- Indexes for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teacher_logins_username_unique` (`username`),
  ADD KEY `teacher_logins_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `teacher_subject_rels`
--
ALTER TABLE `teacher_subject_rels`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_subject_rels_employee_id_foreign` (`employee_id`),
  ADD KEY `teacher_subject_rels_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallets_student_id_foreign` (`student_id`);

--
-- Indexes for table `years`
--
ALTER TABLE `years`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_logins`
--
ALTER TABLE `admin_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `applicants`
--
ALTER TABLE `applicants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `classroom_fees`
--
ALTER TABLE `classroom_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classroom_subjects`
--
ALTER TABLE `classroom_subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `exam_scores`
--
ALTER TABLE `exam_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `first_assessment_scores`
--
ALTER TABLE `first_assessment_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `result_details`
--
ALTER TABLE `result_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `result_logs`
--
ALTER TABLE `result_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `second_assessment_scores`
--
ALTER TABLE `second_assessment_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_attendances`
--
ALTER TABLE `student_attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `student_logins`
--
ALTER TABLE `student_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_classroom_rels`
--
ALTER TABLE `teacher_classroom_rels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teacher_subject_rels`
--
ALTER TABLE `teacher_subject_rels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `years`
--
ALTER TABLE `years`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_logins`
--
ALTER TABLE `admin_logins`
  ADD CONSTRAINT `admin_logins_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `applicants`
--
ALTER TABLE `applicants`
  ADD CONSTRAINT `applicants_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `applicants_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `classroom_fees`
--
ALTER TABLE `classroom_fees`
  ADD CONSTRAINT `classroom_fees_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`);

--
-- Constraints for table `classroom_subjects`
--
ALTER TABLE `classroom_subjects`
  ADD CONSTRAINT `classroom_subjects_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `classroom_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `employees_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `employees_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `exam_scores`
--
ALTER TABLE `exam_scores`
  ADD CONSTRAINT `exam_scores_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`),
  ADD CONSTRAINT `exam_scores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `first_assessment_scores`
--
ALTER TABLE `first_assessment_scores`
  ADD CONSTRAINT `first_assessment_scores_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`),
  ADD CONSTRAINT `first_assessment_scores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `payments_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `results_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `results_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `result_details`
--
ALTER TABLE `result_details`
  ADD CONSTRAINT `result_details_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`),
  ADD CONSTRAINT `result_details_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `result_logs`
--
ALTER TABLE `result_logs`
  ADD CONSTRAINT `result_logs_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `result_logs_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `result_logs_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `result_logs_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `second_assessment_scores`
--
ALTER TABLE `second_assessment_scores`
  ADD CONSTRAINT `second_assessment_scores_result_id_foreign` FOREIGN KEY (`result_id`) REFERENCES `results` (`id`),
  ADD CONSTRAINT `second_assessment_scores_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`);

--
-- Constraints for table `student_attendances`
--
ALTER TABLE `student_attendances`
  ADD CONSTRAINT `student_attendances_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `student_attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`),
  ADD CONSTRAINT `student_attendances_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`);

--
-- Constraints for table `student_logins`
--
ALTER TABLE `student_logins`
  ADD CONSTRAINT `student_logins_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);

--
-- Constraints for table `teacher_classroom_rels`
--
ALTER TABLE `teacher_classroom_rels`
  ADD CONSTRAINT `teacher_classroom_rels_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classrooms` (`id`),
  ADD CONSTRAINT `teacher_classroom_rels_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `teacher_logins`
--
ALTER TABLE `teacher_logins`
  ADD CONSTRAINT `teacher_logins_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`);

--
-- Constraints for table `teacher_subject_rels`
--
ALTER TABLE `teacher_subject_rels`
  ADD CONSTRAINT `teacher_subject_rels_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `teacher_subject_rels_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `wallets_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
