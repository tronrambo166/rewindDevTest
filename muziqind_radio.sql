-- phpMyAdmin SQL Dump
-- version 4.9.11
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 25, 2023 at 05:03 AM
-- Server version: 5.7.23-23
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `muziqind_radio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `created_at`, `updated_at`, `name`) VALUES
(1, 'steveRewind@gmail.com', '$2y$10$Ug36LcBzrLNp..8AV5AxAei406b04khmAu6EZf7XYDmWN8neuJH7a', NULL, NULL, NULL),
(4, 'yunyminaya@gmail.com', '$2y$10$gYuR5T579kZv19lS9F2yre5Y6hQNl9vmHBMZJwnwFRpDcu1rGJyg2', '2022-02-13 05:05:06', '2022-02-13 05:05:06', 'Jason');

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE `albums` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `album_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `composer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `song_art` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `artist_id`, `album_id`, `title`, `album_title`, `album_description`, `composer`, `publisher`, `song_art`, `image`, `created_at`, `updated_at`) VALUES
(4, 4, '53445646546cs', 'vvvvvv and vvvvvvvv', 'Demo album', NULL, NULL, NULL, NULL, 'default.jpg', NULL, NULL),
(11, 4, '6283cd9729350', '01. maahi.mp3', 'The Trio', 'dfd dfdf dfdfd', 'rrrrr', 'rrrrrrr', 'rrrrrrr', 'default.jpg', NULL, NULL),
(12, 4, '6283cd9729350', 'boney m. - rasputin (sopot festival 1979) (vod).mp3', 'The Trio', 'dfd dfdf dfdfd', 'rrrrr', 'rrrrrrr', 'rrrrrrr', 'default.jpg', NULL, NULL),
(13, 4, '6283cd9729350', 'bulleya-(pagalworldsongs.co.in).mp3', 'The Trio', 'dfd dfdf dfdfd', 'rrrrr', 'rrrrrrr', 'rrrrrrr', 'default.jpg', NULL, NULL),
(14, 4, '6283d5d77792d', 'phir-mohabbat-(pagalworldsongs.co.in).mp3', 'Greatest Hits', 'dfd dfdf dfdfd', NULL, NULL, NULL, '1733093886490934.jpg', NULL, NULL),
(15, 4, '6283d5d77792d', 'quizas enrique iglesias youre mp3 free download.mp3', 'Greatest Hits', 'dfd dfdf dfdfd', NULL, NULL, NULL, '1733093886490934.jpg', NULL, NULL),
(16, 4, '6283d5d77792d', 'rascal_flatts_-_what_hurts_the_most.mp3', 'Greatest Hits', 'dfd dfdf dfdfd', NULL, NULL, NULL, '1733093886490934.jpg', NULL, NULL),
(17, 4, '6283db2c89095', 'coldplay - adventure of a lifetime (official video)_hd.mp3', 'ColdPlay', 'ColdPlay', 'ColdPlay', 'ColdPlay', 'ColdPlay', '1733095317868702.jpg', NULL, NULL),
(18, 4, '6283db2c89095', 'coldplay - everglow (live at belasco theater).mp3', 'ColdPlay', 'ColdPlay', 'ColdPlay', 'ColdPlay', 'ColdPlay', '1733095317868702.jpg', NULL, NULL),
(19, 4, '6283db2c89095', 'coldplay - fix you.mp3', 'ColdPlay', 'ColdPlay', 'ColdPlay', 'ColdPlay', 'ColdPlay', '1733095317868702.jpg', NULL, NULL),
(20, 3, '628f6f21490d0', '01. maahi.mp3', 'Demo album', 'Demo album', 'Demo album', 'Demo album', NULL, '1733890948763874.png', NULL, NULL),
(21, 3, '628f6f21490d0', '26-heart-attack.mp3', 'Demo album', 'Demo album', 'Demo album', 'Demo album', NULL, '1733890948763874.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audiences`
--

CREATE TABLE `audiences` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `business_name` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(10000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audiences`
--

INSERT INTO `audiences` (`id`, `user_id`, `business_name`, `city`, `country`, `age`, `created_at`, `updated_at`) VALUES
(1, 4, 'Ozuna', 'Dhaka, Dhaka Division, Bangladesh;Khualna, Khulna Division, Bangladesh;Barisal, Barisal Divaision, Bangladesh;Rajashahi, Rajshahi Division, Bangladesh;Delhi, India;Sylhet, Sylhet Divaision, Bangladesh;Nawabganj, Rajshahi Division, Bangladesh;Chittagong, Chittagong Division, Bangladesh;Bogura, Rajshahi Division, Bangladesh;Thakurgaon, Rangpur Division, Bangladesh;Maulvi Bazar, Sylhet Division, Bangladesh;Tongi, Dhaka Division, Bangladesh;Aparecida de Goiânia, GO, Brazil;Dhakairhati, Dhaka Division, Bangladesh;Rangpur, Rangpur Division, Bangladesh;Gazipur, Dhaka Division, Bangladesh;Sunamganj, Sylhet Division, Bangladesh;Ho Chi Minh City, Vietnam;Karachi, Sindh, Pakistan;Jessore, Khulna Division, Bangladesh;Lahore, Punjab, Pakistan;Hanoi, Vietnam;Port Said, Port Said Governorate, Egypt;Feni, Chittagong Division, Bangladesh;Rangpur, Khulna Division, Bangladesh;Tangail, Dhaka Division, Bangladesh;Narayanganj, Dhaka Division, Bangladesh;Cairo, qCairo Governorate, Egypt;Lima, qPeru;Cox\'s qBazar, qChittagong Division, qBangladesh;qJhenida, Khulna Division, qBangladesh;', 'BD,IN,EG,PK,MA,VN,BR,PH,ID,CO,TN,ES,PE,RO,TR,LK,US,MX,DZ,AE,NG,JO,GR,MY,TH,CZ,DE,UA,IQ,AL,PL,', 'M.25-34,M.18-24,F.25-34,F.18-24,M.35-44,', '2022-12-24 09:37:54', '2022-12-24 09:37:54'),
(2, 16, 'Bad Bunny', 'Dhaka, Dhaka Division, Bangladesh;Khualna, Khulna Division, Bangladesh;Barisal, Barisal Divaision, qBangladesh;Rajashahi, Rajshahi Division, Bangladesh;Delhi, India;Sylhet, Sylhet qDivaision, Bangladesh;Nawabganj, Rajshahi Division, Bangladesh;Chittagong, Chittagong Division, qBangladesh;Bogura, Rajshahi Division, Bangladesh;Thqakurgaon, Rangpur Division, Bangladesh;Maulvi Bazar, Sylhet Division, Bangladesh;Tonqgi, Dhaka Diqvision, Bangqladesh;Aparecida de Goiânia, GO, Brazil;Dhakairhati, Dhaka Division, Bangqladesh;Rangpur, Rangpur Division, Bangladesh;Gazipur, Dhaka Division, Bangqladesh;Sunamganj, Sylhet Division, Bangladesh;Ho Chi Minh City, Vietnam;Karachi, Sindh, Pakiqstan;Jessore, Khulna Division, Bangladesh;Lahore, Punjab, Pakistan;Hanoqi, Vietnam;Port Said, Port Said Governorate, Egypt;Feni, Chittagong Division, Bangladesh;Rangpur, Khulna Division, Bangladesh;Tangaiql, Dhaka Division, Bangladesh;Narayanganj, Dhaka Division, Bangladesh;Cairo, Cairo Governorate, Egypt;Lima, Peru;Cox\'s Bazar, Chittagong Divisionq, Bangladesh;Jhenida, Khulna Division, Bangladesh;', 'BD,IN,EG,PK,MA,VN,BR,PH,ID,CO,TN,ES,PE,RO,TR,LK,US,MX,DE,AA,NA,JA,GA,MA,TH,CZ,DE,UA,IQ,AL,PL,', 'M.35-34,M.18-24,F.25-34,F.8-24,M.35-44,', '2022-12-24 13:17:53', '2022-12-24 13:17:53'),
(3, 41, 'Becky G', 'Khulna, Dhaka Division, Bangladesh;Khulna, Khulna Division, Bangladesh;Barisals, Barisal Division, Bangladesh;Rajshahi, Rajshahis Division, Bangladesh;Delhi, Indias;Sylhet, Sylhet Division, Bangladesh;Nawabganjs, Rajshahis Division, Bangladesh;Chittagong, Chittagong Division, Bangladesh;Bogura, Rajshahi Division, Bangladesh;Thakurgaon, Rangpur Division, Bangladesh;Maulvi Bazar, Sylhet Division, Bangladesh;Tongi, Dhaka Division, Bangladesh;Aparecida de Goiânia, GO, Brazil;Dhakairhati, Dhaka Division, Bangladesh;Rangpur, Rangpur Division, Bangladesh;Gazipur, Dhaka Division, Bangladesh;Sunamganj, Sylhet Division, Bangladesh;Ho Chi Minh City, Vietnam;Karachi, Sindh, Pakistan;Jessore, Khulna Division, Bangladesh;Lahore, Punjab, Pakistan;Hanoi, Vietnam;Port Said, Port Said Governorate, Egypt;Feni, Chittagong Division, Bangladesh;Rangpur, Khulna Division, Bangladesh;Tangail, Dhaka Division, Bangladesh;Narayanganj, Dhaka Division, Bangladesh;Cairo, Cairo Governorate, Egypt;Lima, Peru;Cox\'s Bazar, Chittagong Division, Bangladesh;Jhenida, Khulna Division, Bangladesh;', 'BDs,INs,EG,PK,MA,VN,BR,PH,ID,CO,TN,ES,PE,RO,TR,LK,USs,MsX,DZs,AsEs,NGs,JOs,GR,MY,TH,CZ,DE,UA,IQ,ALs,PLs,', 'M.25-34s,M.18-24,F.25-34,F.18-24,M.35-44,', '2022-12-24 09:37:54', '2022-12-24 09:37:54'),
(5, 40, 'Arc', 'Khaulna, Dhakaa Division, Bangladesh;Khulna, Khulna Divisioan, Bangladesh;Barisals, Barisal Division, Bangladaesh;Raajshahi, Rajshahis Division, Banglaadesh;Daelhi, Indias;Sylhet, Sylhet Division, Bangladesh;Nawaabganjs, Raajshahis Diavision, Bangladesh;Chittagong, Chittagong Division, Bangladesh;Boguara, Rajshahi Division, Bangladesh;Thakurgaon, Rangpur Division, Bangladesh;Maulvi Bazar, Sylhet Division, Bangladesh;Tongi, Dhaka Division, Bangladesh;Aparecida de Goiânia, GO, Brazil;Dhakairhati, Dhaka Division, Bangladesh;Rangpur, Rangpur Division, Bangladesh;Gazipur, Dhaka Division, Bangladesh;Sunamganj, Sylhet Division, Bangladesh;Ho Chi Minh City, Vietnam;Karachi, Sindh, Pakistan;Jessore, Khulna Division, Bangladesh;Lahore, Punjab, Pakistan;Hanoi, Vietnam;Port Said, Port Said Governorate, Egypt;Feni, Chittagong Division, Bangladesh;Rangpur, Khulna Division, Bangladesh;Tangail, Dhaka Division, Bangladesh;Narayanganj, Dhaka Division, Bangladesh;Cairo, Cairo Governorate, Egypt;Lima, Peru;Cox\'s Bazar, Chittagong Division, Bangladesh;Jhenida, Khulna Division, Bangladesh;', 'BaDs,INs,EG,PK,aMA,VN,BR,PH,aaID,CaO,TN,ES,PE,RaO,TR,LaK,UaS,MaXa,DaZ,AEs,NGs,aJOs,GR,MaY,THa,CZ,DaE,UaA,IaQ,AaLs,PLs,', 'M.25a-34s,M.18a-24,F.25-a34,F.a18-24,M.35-44,', '2022-12-24 09:37:54', '2022-12-24 09:37:54'),
(6, 19, 'Adele', 'Dhaka, Dhaka Division, Bangladesh;Khulna, Khulna Division, Banglaadesh;Barisal, Barisal Division, Bangaladesh;Rajsahahi, Raajshahi Division, Banglaadesh;Delhia, Indaia;Sylheta, Sylheta Division, Banglaadesh;aNawabganj, Rajshahi Division, Bangladesh;Chittagong, Chittagong Division, Bangladesh;Bogura, Rajshahi Division, Bangladesh;Thakurgaon, Rangpur Division, Bangladesh;Maulvi Bazar, Sylhet Division, Bangladesh;Tongi, Dhaka Division, Bangladesh;Aparecida de Goiânia, GO, Brazil;Dhakairhati, Dhaka Division, Bangladesh;Rangpur, Rangpur Division, Bangladesh;Gazipur, Dhakaa Division, Bangladesh;Sunamganj, Sylhet Division, Bangladesh;Ho Chi Minah City, Vietnam;Karachi, Sindh, Pakistaan;Jessore, Khulna Division, Bangladaesh;Lahore, Punjab, Pakistan;Hanoi, Vietnam;Poart Said, Port Said Governorate, Egypt;Feni, Chittagong Division, Bangladesh;Rangpur, Khulna Division, Bangladesh;Tangail, Dhaka Division, Bangladesh;Narayanganj, Dhaka Division, Bangladesh;Cairo, Cairo Governorate, Egypt;Lima, Peru;Cox\'s Bazar, Chittagong Division, Bangladesh;Jhenida, Khulna Division, Bangladesh;', 'BD,IN,EG,PK,MAa,VNa,BR,PHa,IDa,CO,TN,ES,PE,RO,TR,LK,US,MX,DE,AA,NA,JA,GaAa,MA,TH,CaZ,aDE,UaA,IQa,AaL,PL,', 'M.35-34,M.18-24a,aF.25-34a,F.8-a24a,M.35-44,', '2022-12-24 13:17:53', '2022-12-24 13:17:53'),
(7, 18, 'Nyashinski', 'Dhaka, Dhaka Division, Bangladesh;Khulna, Khulna Division, Bangladesh;Barisal, Barisal Division, Bangladesh;Rajshahi, Rajshahi Division, Bangladesh;Sylhet, Sylhet Division, Bangladesh;Nawabganj, Rajshahi Division, Bangladesh;Delhi, India;Chittagong, Chittagong Division, Bangladesh;Bogura, Rajshahi Division, Bangladesh;Maulvi Bazar, Sylhet Division, Bangladesh;Tongi, Dhaka Division, Bangladesh;Thakurgaon, Rangpur Division, Bangladesh;Aparecida de Goiânia, GO, Brazil;Lahore, Punjab, Pakistan;Karachi, Sindh, Pakistan;Ho Chi Minh City, Vietnam;Dhakairhati, Dhaka Division, Bangladesh;Jessore, Khulna Division, Bangladesh;Rangpur, Rangpur Division, Bangladesh;Sunamganj, Sylhet Division, Bangladesh;Port Said, Port Said Governorate, Egypt;Cairo, Cairo Governorate, Egypt;Tangail, Dhaka Division, Bangladesh;Feni, Chittagong Division, Bangladesh;Hanoi, Vietnam;Gazipur, Dhaka Division, Bangladesh;Cox\'s Bazar, Chittagong Division, Bangladesh;Bheramara, Khulna Division, Bangladesh;Bogotá, Distrito Especial, Colombia;Narayanganj, Dhaka Division, Bangladesh;Lima, Peru;', 'BD,IN,EG,PK,MA,VN,BR,PH,ID,CO,TN,ES,PE,RO,TR,LK,US,MX,DZ,AE,NG,JO,GR,MY,TH,CZ,DE,UA,IQ,AL,PL,', 'M.25-34,M.18-24,F.25-34,F.18-24,M.35-44,', '2023-01-26 23:22:58', '2023-01-26 23:22:58');

-- --------------------------------------------------------

--
-- Table structure for table `combined10s`
--

CREATE TABLE `combined10s` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mark` int(11) NOT NULL,
  `platform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `evt_id` bigint(20) NOT NULL,
  `artist_id` int(10) DEFAULT NULL,
  `evt_start` datetime NOT NULL,
  `evt_end` datetime NOT NULL,
  `evt_text` text NOT NULL,
  `evt_color` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`evt_id`, `artist_id`, `evt_start`, `evt_end`, `evt_text`, `evt_color`) VALUES
(0, 18, '2023-02-03 00:00:00', '2023-02-03 00:00:00', 'Big bash', '#e4edff'),
(11, 4, '2022-04-06 00:00:00', '2022-04-06 00:00:00', 'Heavy Event', '#0f4bc2'),
(12, 6, '2022-05-22 00:00:00', '2022-05-22 00:00:00', 'Parc de princes', '#e4edff'),
(13, 6, '2022-04-01 00:00:00', '2022-04-01 00:00:00', 'zxa', '#e4edff'),
(21, 4, '2022-04-07 00:00:00', '2022-04-07 00:00:00', 'hello', '#e4edff'),
(27, 6, '2022-04-03 00:00:00', '2022-04-03 00:00:00', 'hh', '#e4edff'),
(28, 4, '2022-03-02 00:00:00', '2022-03-02 00:00:00', 'hello event', '#ffe5fe'),
(29, 9, '2022-04-06 00:00:00', '2022-04-06 00:00:00', 'Busy', '#e4edff'),
(30, 9, '2022-04-12 00:00:00', '2022-04-12 00:00:00', 'Free', '#e4edff'),
(31, 6, '2022-05-05 00:00:00', '2022-05-05 00:00:00', 'Istanbul 17', '#e4edff');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instagrams`
--

CREATE TABLE `instagrams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `impressions` int(10) DEFAULT NULL,
  `reach` int(10) DEFAULT NULL,
  `profile` int(10) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `instagrams`
--

INSERT INTO `instagrams` (`id`, `date`, `impressions`, `reach`, `profile`, `created_at`, `updated_at`) VALUES
(1, '07-08-2022', 166, 155, 122, NULL, NULL),
(2, '07-08-2022', 266, 155, 122, NULL, NULL),
(3, '24-08-2022', 66, 155, 122, NULL, NULL),
(4, '31-08-2022', 366, 155, 122, NULL, NULL),
(5, '31-08-2022', 466, 155, 122, NULL, NULL),
(6, '07-08-2022', 166, 155, 122, NULL, NULL),
(7, '08-08-2022', 166, 155, 122, NULL, NULL),
(8, '07-08-2022', 166, 155, 122, NULL, NULL),
(9, '15-08-2022', 166, 155, 122, NULL, NULL),
(10, '07-08-2022', 166, 155, 122, NULL, NULL),
(11, '07-08-2022', 166, 155, 122, NULL, NULL),
(12, '07-08-2022', 166, 155, 122, NULL, NULL),
(13, '07-08-2022', 166, 155, 122, NULL, NULL),
(14, '07-08-2022', 166, 155, 122, NULL, NULL),
(15, '07-08-2022', 166, 155, 122, NULL, NULL),
(16, '07-08-2022', 166, 155, 122, NULL, NULL),
(17, '07-08-2022', 166, 155, 122, NULL, NULL),
(18, '07-08-2022', 166, 155, 122, NULL, NULL),
(19, '07-08-2022', 166, 155, 122, NULL, NULL),
(20, '07-08-2022', 166, 155, 122, NULL, NULL),
(21, '07-08-2022', 166, 155, 122, NULL, NULL),
(22, '07-08-2022', 166, 155, 122, NULL, NULL),
(23, '07-08-2022', 166, 155, 122, NULL, NULL),
(24, '07-08-2022', 166, 155, 122, NULL, NULL),
(25, '07-08-2022', 166, 155, 122, NULL, NULL),
(26, '07-08-2022', 166, 155, 122, NULL, NULL),
(27, '07-08-2022', 166, 155, 122, NULL, NULL),
(28, '07-08-2022', 166, 155, 122, NULL, NULL),
(29, '07-08-2022', 166, 155, 122, NULL, NULL),
(30, '07-08-2022', 166, 155, 122, NULL, NULL),
(31, '07-08-2022', 166, 155, 122, NULL, NULL),
(32, '07-08-2022', 166, 155, 122, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `last_day_songs`
--

CREATE TABLE `last_day_songs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `artist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `song` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `last_day_songs`
--

INSERT INTO `last_day_songs` (`id`, `position`, `artist`, `song`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'Little Party', 'Breaking News', '7 mins', NULL, NULL),
(2, 2, 'Willy Paul', 'Atoti Jaber', '3 mins', NULL, NULL),
(3, 3, 'Fathermoh', 'Kaskie Vibaya', '2 mins', NULL, NULL),
(4, 4, 'Mejja', 'Usiniharibie Mood', '5 mins', NULL, NULL),
(5, 5, 'Scro and the Funky Flos', 'Casino Biscuits', '6 mins', NULL, NULL),
(6, 6, 'Otile Brown', 'Woman (feat. Harmonize)', '5 mins', NULL, NULL),
(7, 7, 'Bensoul', 'Thick Thighs', '3 mins', NULL, NULL),
(8, 8, 'UB40', 'Moonlight Lover', '4 mins', NULL, NULL),
(9, 9, 'Spyro', 'Who Is Your Guy?', '3 mins', NULL, NULL),
(10, 10, 'Miso Soup Band', 'Real Fejka', '3 mins', NULL, NULL),
(11, 11, 'Rayvanny', 'Number One', '3 mins', NULL, NULL),
(12, 12, 'Diamond Platnumz', 'Zuwena', '4 mins', NULL, NULL),
(13, 13, 'Jay Melody', 'Sawa', '0 mins', NULL, NULL),
(14, 14, 'Nyashinski', 'Hapo Tu (feat. Chris Kaiga)', '0 mins', NULL, NULL),
(15, 15, 'Bob Marley & The Wailers', 'Iron Lion Zion - 7\" Mix', '9 mins', NULL, NULL),
(16, 16, 'Otile Brown', 'Such Kinda Love', '2 mins', NULL, NULL),
(17, 17, 'Nikita Kering\'', 'Ex', '3 mins', NULL, NULL),
(18, 18, 'Fireboy DML', 'Peru', '4 mins', NULL, NULL),
(19, 19, 'Boutross', 'Angela', '4 mins', NULL, NULL),
(20, 20, 'Nyashinski', 'Malaika', '3 mins', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `live_songs`
--

CREATE TABLE `live_songs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `position` int(11) DEFAULT NULL,
  `artist` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `song` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `live_songs`
--

INSERT INTO `live_songs` (`id`, `position`, `artist`, `song`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, 'Little Party', 'Breaking News', '7 mins', NULL, NULL),
(2, 2, 'Willy Paul', 'Atoti Jaber', '3 mins', NULL, NULL),
(3, 3, 'Mejja', 'Usiniharibie Mood', '5 mins', NULL, NULL),
(4, 4, 'Fathermoh', 'Kaskie Vibaya', '2 mins', NULL, NULL),
(5, 5, 'Scro and the Funky Flos', 'Casino Biscuits', '2 mins', NULL, NULL),
(6, 6, 'Bensoul', 'Thick Thighs', '3 mins', NULL, NULL),
(7, 7, 'Otile Brown', 'Woman (feat. Harmonize)', '5 mins', NULL, NULL),
(8, 8, 'Diamond Platnumz', 'Zuwena', '4 mins', NULL, NULL),
(9, 9, 'UB40', 'Moonlight Lover', '4 mins', NULL, NULL),
(10, 10, 'Rayvanny', 'Number One', '3 mins', NULL, NULL),
(11, 11, 'Fireboy DML', 'Peru', '4 mins', NULL, NULL),
(12, 12, 'Spyro', 'Who Is Your Guy?', '3 mins', NULL, NULL),
(13, 13, 'Miso Soup Band', 'Real Fejka', '3 mins', NULL, NULL),
(14, 14, 'Nyashinski', 'Hapo Tu (feat. Chris Kaiga)', '0 mins', NULL, NULL),
(15, 15, 'Bob Marley & The Wailers', 'Iron Lion Zion - 7\" Mix', '9 mins', NULL, NULL),
(16, 16, 'Otile Brown', 'Such Kinda Love', '2 mins', NULL, NULL),
(17, 17, 'Jay Melody', 'Sawa', '0 mins', NULL, NULL),
(18, 18, 'Nikita Kering\'', 'Ex', '3 mins', NULL, NULL),
(19, 19, 'Zuchu', 'Utaniua', '4 mins', NULL, NULL),
(20, 20, 'Masauti', 'Case', '3 mins', NULL, NULL);

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
(5, '2022_03_21_150523_create_songs_table', 1),
(6, '2022_04_17_174437_create_visitors_table', 2),
(7, '2022_04_22_104612_create_live_songs_table', 3),
(8, '2022_05_13_160409_create_mymusics_table', 4),
(9, '2022_09_23_165142_create_streamings_table', 5),
(10, '2022_09_27_074006_create_combined10s_table', 6),
(11, '2022_11_11_120253_create_instagrams_table', 6),
(12, '2022_12_24_140732_create_audiences_table', 7);

-- --------------------------------------------------------

--
-- Table structure for table `mymusics`
--

CREATE TABLE `mymusics` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `artist_id` int(11) DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `album_description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `composer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `song_art` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'default.jpg',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_album` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `song` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mymusics`
--

INSERT INTO `mymusics` (`id`, `artist_id`, `title`, `album`, `album title`, `description`, `album_description`, `composer`, `publisher`, `song_art`, `image`, `is_album`, `created_at`, `updated_at`, `song`) VALUES
(4, 4, 'vvvvvv and vvvvvvvv', 'vvvvvv vvvvvvvvvv', NULL, 'dfd ddd', NULL, NULL, NULL, 'default.jpg	', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\phpB1B2.tmp'),
(5, 4, 'z you lie', 'z & x', NULL, 'ddd dfdf', NULL, NULL, NULL, 'default.jpg	', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\php1242.tmp'),
(6, 4, 'aaaaaaa', 'assss', NULL, 'sssssssssd', NULL, NULL, NULL, 'default.jpg	', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\phpBFED.tmp'),
(7, 4, 'Yellow', 'Yellow', NULL, NULL, NULL, NULL, NULL, 'default.jpg	', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\php9C7B.tmp'),
(8, 4, 'z', 'z', NULL, NULL, NULL, NULL, NULL, 'default.jpg	', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\phpB29.tmp'),
(9, 4, 'Who am I', 'New', NULL, 'dddddddddd', NULL, 'dffsdfsdg dsgfd', 'dsfdsf', 'default.jpg	', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\php1AAB.tmp'),
(10, 4, 'Last Christmas', 'Last Christmas', NULL, 'Last Christmas', NULL, 'Last Christmas', 'Last Christmas', 'default.jpg	', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\phpF3A9.tmp'),
(13, 4, 'Dreaming', 'Dreaming', NULL, 'Dreaming', NULL, 'Dreaming', 'Dreaming', 'Dreaming.jpg', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\phpF5EC.tmp'),
(14, 4, 'Maahi', 'Maahi', NULL, 'Maahi', NULL, 'Maahi', 'Maahi', 'Maahi.jpg', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\php5719.tmp'),
(15, 3, 'Bulleya', 'Bulleya', NULL, 'Bulleya', NULL, 'Bulleya', 'Bulleya', 'Bulleya.jpg', NULL, NULL, NULL, NULL, 'C:\\xampp\\tmp\\php48E6.tmp');

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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `played` int(11) NOT NULL,
  `ranking` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `streamings`
--

CREATE TABLE `streamings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `youtube_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spotify_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spotify_uuid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deezer_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boomplay_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdundo_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `youtube_regid` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spotify_regid` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apple_regid` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deezer_regid` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `boomplay_regid` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mdundo_regid` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `streamings`
--

INSERT INTO `streamings` (`id`, `user_id`, `youtube_id`, `youtube_uuid`, `spotify_id`, `spotify_uuid`, `deezer_id`, `apple_id`, `boomplay_id`, `mdundo_id`, `created_at`, `updated_at`, `youtube_regid`, `spotify_regid`, `apple_regid`, `deezer_regid`, `boomplay_regid`, `mdundo_regid`) VALUES
(1, 4, 'UCxnUFZ_e7aJFw3Tm8mA7pvQ', 'ca22091a-3c00-11e9-974f-549f35141000', '0TnOYISbd1XYRBk9myaseg', '11e81bcc-9c1c-ce38-b96b-a0369fe50396', '11431670', '1095580786', '70177', '37921', NULL, '2022-10-01 09:45:30', NULL, NULL, NULL, NULL, NULL, NULL),
(2, 18, 'UCxnUFZ_e7aJFw3Tm8mA7pvQ', 'ca22091a-3c00-11e9-974f-549f35141000', '0TnOYISbd1XYRBk9myaseg', '11e81bcc-9c1c-ce38-b96b-a0369fe50396', '11431670', '1095580786', '70177', '37921', NULL, '2022-10-01 09:45:30', NULL, NULL, NULL, NULL, NULL, NULL),
(3, 19, 'UCxnUFZ_e7aJFw3Tm8mA7pvQ', 'ca22091a-3c00-11e9-974f-549f35141000', '0TnOYISbd1XYRBk9myaseg', '11e81bcc-9c1c-ce38-b96b-a0369fe50396', '11431670', '1095580786', '70177', '37921', NULL, '2022-10-01 09:45:30', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage_name` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `art_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(1000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user.png',
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business` int(10) DEFAULT NULL,
  `approved` int(10) NOT NULL DEFAULT '0',
  `insta_pageid_of_fb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `stage_name`, `art_id`, `email`, `email_verified_at`, `password`, `bio`, `country`, `city`, `image`, `phone`, `business`, `approved`, `insta_pageid_of_fb`, `twitter_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Otile', 'Brown', 'Otile Brown', 'abcd1234', 'sohaankane@gmail.com', NULL, '$2y$10$Bf8j7Pzi09KUz1gIl5D9Rutzubnudv2GzqM/vKBFGmJAHhxuPX6A6', 'sdsds', 'us', 'Dhaka', '1731551238915372.jpg', '0006556565', NULL, 1, '200952529947077', '1616803039956045824', NULL, '2022-03-25 05:27:45', '2023-01-21 22:55:30'),
(7, 'Enrique', 'Enrique', 'enrique', 'Enrique', 'sohaankanesss@gmail.com', NULL, 'aaaaaaaa', 'sdsds', 'us', 'Dhaka', '1736347821001027.jpg', '0006556565', NULL, 0, NULL, NULL, NULL, '2022-04-18 10:23:38', '2022-07-05 05:37:16'),
(8, 'Will', 'Will', 'Benjamin bb', 'weww22', 'eradmin@agramonia.com', NULL, 'aaaaaaaa', 'sdsds', 'us', 'Dhaka', '1731551238915372.jpg', '0006556565', NULL, 1, NULL, NULL, NULL, '2022-04-20 12:26:40', '2022-04-20 12:26:40'),
(9, 'Karimhyuygu', 'Karimhyuygu', 'Benjamin cd', 'yteuryew34', 'eeradmin@agramonia.com', NULL, 'aaaaaaaa', 'sdsds', 'us', 'Dhaka', '1736347821001027.jpg', '0006556565', NULL, 1, NULL, NULL, NULL, '2022-04-20 12:34:48', '2022-04-20 12:34:48'),
(10, 'Will', 'Will', 'dfdfdfd', 'dfdfd', 'tottenhdfddfam266@gmail.com', NULL, 'aaaaaaaa', 'sdsds', 'us', 'Dhaka', '1732267611036531.jpg', '0006556565', NULL, 0, NULL, NULL, NULL, '2022-04-30 10:25:23', '2022-07-05 05:39:06'),
(11, 'Will', 'Will', 'BenjaminE', 'Will62ac6046ab8b0', 'admins@agramonia.com', NULL, 'aaaaaaaa', 'sdsds', 'us', 'Dhaka', '1736347821001027.jpg', '0006556565', NULL, 1, NULL, NULL, NULL, '2022-06-17 05:06:46', '2022-06-17 05:06:46'),
(12, 'abc', 'abc', 'BenjaminQ', 'abc62b32c6446eee', 'admin5@gmail.com', NULL, 'aaaaaaaa', 'sdsds', 'us', 'Dhaka', '1732267611036531.jpg', '0006556565', NULL, 1, NULL, NULL, NULL, '2022-06-22 08:51:16', '2022-06-22 08:51:16'),
(14, 'adam', 'adam', 'aaaa', 'adam62d3a8f8aebd3', 'admin6@agramonia.com', NULL, '$2y$10$Bf8j7Pzi09KUz1gIl5D9Rutzubnudv2GzqM/vKBFGmJAHhxuPX6A6', 'ddd', 'df', 'Dhaka', '1738579623731590.jpg', '0006556565', NULL, 1, NULL, NULL, NULL, '2022-07-17 00:15:21', '2022-07-17 00:15:21'),
(15, NULL, NULL, 'Coke', NULL, 'coke@gmail.com', NULL, NULL, NULL, NULL, NULL, '1753122056762464.jpg', '87100605445', NULL, 1, NULL, NULL, NULL, '2022-12-24 12:44:39', '2022-12-24 12:44:39'),
(16, NULL, NULL, 'Koke', NULL, 'sohaankoke@gmail.com', NULL, '$2y$10$yw53p6nRW/vpluFy8aURVOvedus6QLO7hWJqzWueRJ1yeRZefDd.6', NULL, NULL, NULL, '1753123010334367.jpg', '87100605445', 1, 1, NULL, NULL, NULL, '2022-12-24 12:59:48', '2022-12-24 12:59:48'),
(18, 'Nya', 'Shinski', 'Nyashinski', 'Nya63d26bd09b651', 'tottenham266@gmail.com', NULL, '$2y$10$VVX.QyL8gOhiTje0wdGgve3GzxQPJ2iGMGba2OW54YqXsq2FVrJ/u', 'I\'m free!', 'Kenya', 'Mombasa', '1756089350013450.png', '+254-5430505', NULL, 1, '200952529947077', '1587075783545217025', NULL, '2023-01-26 18:02:24', '2023-01-26 23:26:20'),
(19, 'Ayra', 'Starr', 'Ayra Starr', 'Ayra63d26bd09b651', 'ayrastarr266@gmail.com', NULL, '$2y$10$VVX.QyL8gOhiTje0wdGgve3GzxQPJ2iGMGba2OW54YqXsq2FVrJ/u', 'I\'m free!', 'Kenya', 'Mombasa', '1756832260695943.jpg', '+254-5430505', NULL, 1, '200952529947077', '1587075783545217025', NULL, '2023-01-26 18:02:24', '2023-02-03 23:36:45'),
(20, NULL, NULL, NULL, '63e1c0151d9df', 'eY6F_generic_8dd1d3f4_muziqyrewind.com@data-backup-store.com', NULL, NULL, NULL, NULL, NULL, 'user.png', NULL, NULL, 0, NULL, NULL, NULL, '2023-02-07 09:05:57', '2023-02-07 09:05:57'),
(21, NULL, NULL, '<div style=\"background-color:#4169E1;margin:auto;max-width:400px;border-radius:10px;font-family:tahoma,geneva,sans-serif;font-size:20px;color:white;text-align:center;padding:20px\"><h1>🌍 Hello World!</h1></div>*hs=0f35cc79f9ab2bac40778a5e255638b9*<div style=\"display:none\">', NULL, 'yaahab@any.pink', NULL, '$2y$10$7j3DaWLd/5.4hTZ8Hy062uFQI4d2B0WuJ.RilfjTbsLPywQlOSfHm', NULL, NULL, NULL, '1769331843159895.php', 'y5eyq5', 1, 1, NULL, NULL, NULL, '2023-06-21 21:52:16', '2023-06-21 21:52:16');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'Jason', 'admin@gmail.com', '$2y$10$gBDI55dWGSTElMgHKi3Q5.3dCykX4FRGT8ysZd5xUEOol9AV2sr7m', '2022-04-17 12:28:51', '2022-04-17 12:28:51'),
(2, 'Jason', 'adminss22@gmail.com', '$2y$10$gBDI55dWGSTElMgHKi3Q5.3dCykX4FRGT8ysZd5xUEOol9AV2sr7m', '2022-04-17 12:28:51', '2022-04-17 12:28:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audiences`
--
ALTER TABLE `audiences`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `combined10s`
--
ALTER TABLE `combined10s`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`evt_id`),
  ADD KEY `evt_start` (`evt_start`),
  ADD KEY `evt_end` (`evt_end`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instagrams`
--
ALTER TABLE `instagrams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `last_day_songs`
--
ALTER TABLE `last_day_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `live_songs`
--
ALTER TABLE `live_songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mymusics`
--
ALTER TABLE `mymusics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `streamings`
--
ALTER TABLE `streamings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audiences`
--
ALTER TABLE `audiences`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `instagrams`
--
ALTER TABLE `instagrams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `last_day_songs`
--
ALTER TABLE `last_day_songs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `live_songs`
--
ALTER TABLE `live_songs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `mymusics`
--
ALTER TABLE `mymusics`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `streamings`
--
ALTER TABLE `streamings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
