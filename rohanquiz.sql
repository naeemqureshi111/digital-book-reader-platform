-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 04, 2026 at 04:40 AM
-- Server version: 10.11.18-MariaDB-cll-lve
-- PHP Version: 8.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rohanquiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image_photo_url` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'admin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `image_photo_url`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(1, 'Mayank Jain', 'mayank@gmail.com', '$2y$12$J1AfZmHARc/.BmYZrkKdk.SBfClYz8UDUmVgDzNsL8Chnhse7CMF6', NULL, NULL, 'admin', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `name`, `classroom_id`, `subject_id`, `user_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Rational Numbers', 8, 3, NULL, 1, '2025-06-12 04:24:54', '2025-06-12 04:24:54'),
(2, 'Exponents and Powers', 8, 3, NULL, 1, '2025-06-12 04:25:09', '2025-06-12 04:25:09'),
(3, 'Squares and Square Roots', 8, 3, NULL, 1, '2025-06-12 04:25:19', '2025-06-12 04:25:19'),
(4, 'Cubes and Cube Roots', 8, 3, NULL, 1, '2025-06-12 04:25:32', '2025-06-12 04:25:32'),
(5, 'Playing with Numbers', 8, 3, NULL, 1, '2025-06-12 04:25:48', '2025-06-12 04:25:48'),
(6, 'Algebraic Expressions and Identities', 8, 3, NULL, 1, '2025-06-12 04:26:11', '2025-06-12 04:26:11'),
(7, 'Factorisation', 8, 3, NULL, 1, '2025-06-12 04:26:23', '2025-06-12 04:26:23'),
(8, 'Linear Equations in One Variable', 8, 3, NULL, 1, '2025-06-12 04:26:39', '2025-06-12 04:26:39'),
(9, 'Percentage and its Applications', 8, 3, NULL, 1, '2025-06-12 04:26:52', '2025-06-12 04:26:52'),
(10, 'Compound Interest', 8, 3, NULL, 1, '2025-06-12 04:27:02', '2025-06-12 04:27:02'),
(11, 'Direct and Inverse Variations', 8, 3, NULL, 1, '2025-06-16 14:47:09', '2025-06-16 14:47:09'),
(12, 'Understanding Quadrilaterals', 8, 3, NULL, 1, '2025-06-16 14:47:22', '2025-06-16 14:47:22'),
(13, 'Practical Geometry', 8, 3, NULL, 1, '2025-06-16 14:47:33', '2025-06-16 14:47:33'),
(14, 'Visualising Solid Shapes', 8, 3, NULL, 1, '2025-06-16 14:47:44', '2025-06-16 14:47:44'),
(15, 'Area of a Trapezium and a Polygon', 8, 3, NULL, 1, '2025-06-16 14:47:58', '2025-06-16 14:47:58'),
(16, 'Surface Area and Volume', 8, 3, NULL, 1, '2025-06-16 14:48:11', '2025-06-16 14:48:11'),
(17, 'Data Handling', 8, 3, NULL, 1, '2025-06-16 14:48:21', '2025-06-16 14:48:21'),
(18, 'Introduction to Graphs', 8, 3, NULL, 1, '2025-06-16 14:48:36', '2025-06-16 14:48:36'),
(19, 'Chapter-1', 3, 3, NULL, 1, '2025-06-26 16:23:18', '2025-06-26 16:23:18'),
(22, '.htaccess', 4, 3, NULL, 1, '2026-05-29 12:32:37', '2026-05-29 12:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Class-1', '2025-06-12 04:08:25', '2025-06-12 04:08:25'),
(2, 'Class-2', '2025-06-12 04:08:34', '2025-06-12 04:08:34'),
(3, 'Class-3', '2025-06-12 04:08:43', '2025-06-12 04:08:43'),
(4, 'Class-4', '2025-06-12 04:08:59', '2025-06-12 04:08:59'),
(5, 'Class-5', '2025-06-12 04:09:08', '2025-06-12 04:09:08'),
(6, 'Class-6', '2025-06-12 04:09:17', '2025-06-12 04:09:17'),
(7, 'Class-7', '2025-06-12 04:09:34', '2025-06-12 04:09:34'),
(8, 'Class-8', '2025-06-12 04:09:42', '2025-06-12 04:09:42'),
(9, 'Class-9', '2025-06-12 04:09:52', '2025-06-12 04:09:52'),
(10, 'Class-10', '2025-06-12 04:10:01', '2025-06-12 04:10:01'),
(11, 'Class-11', '2025-06-12 04:10:11', '2025-06-12 04:10:11'),
(12, 'Class-12', '2025-06-12 04:10:20', '2025-06-12 04:10:20');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE `instructions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `subject_id`, `class_id`, `content`, `created_at`, `updated_at`) VALUES
(2, 3, 8, 'is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting,', '2025-06-16 13:42:39', '2025-06-17 13:02:08'),
(3, 3, 3, 'Read each Mathematics question carefully before answering. \r\nChoose the correct option from the given answers. \r\nUse logical thinking and basic calculation skills to solve the problems. \r\nDo not rush — check your answer before moving to the next question.', '2025-06-17 12:49:29', '2026-05-26 12:38:31');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000001_create_cache_table', 1),
(2, '0001_01_01_000002_create_jobs_table', 1),
(3, '2025_06_02_092627_create_admins_table', 1),
(4, '2025_06_02_100927_create_classes_table', 1),
(5, '2025_06_03_050720_create_subjects_table', 1),
(6, '2025_06_03_050727_create_users_table', 1),
(7, '2025_06_03_063201_create_questions_table', 2),
(8, '2025_06_04_053738_create_password_resets_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question_text` varchar(255) NOT NULL,
  `option_a` varchar(255) NOT NULL,
  `option_b` varchar(255) NOT NULL,
  `option_c` varchar(255) NOT NULL,
  `option_d` varchar(255) NOT NULL,
  `correct_option` varchar(255) NOT NULL,
  `image_photo_url` varchar(255) DEFAULT NULL,
  `classroom_id` bigint(20) UNSIGNED NOT NULL,
  `chapter_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question_text`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `image_photo_url`, `classroom_id`, `chapter_id`, `subject_id`, `user_id`, `admin_id`, `created_at`, `updated_at`) VALUES
(1, 'Express 98 as a product of its primes', '22 × 7', '22 × 72', '2 × 7²', '23 × 7', 'C', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-16 18:18:25'),
(2, 'If α and β are the zeroes of f(x) = x² + x - 1, then the value of 1/α + 1/β is:', '-1', '-1/2', '1', '2', 'C', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(3, 'For what value of m the system of equations 2x + 3y = 7, 2mx + y = 28 has unique solution?', 'm ≠ 1/6', 'm ≠ 1/3', 'm ≠ 1/2', 'm ≠ 15', 'B', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(4, 'Area of the largest triangle inscribed in a semi-circle of radius r units is:', 'r² sq. units', '½ r² sq. units', '2r² sq. units', '√2 r² sq. units', 'A', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(5, 'If (p + q)th term of an A.P. is m and (p - q)th term is n, then pth term is:', 'mn', '√mn', '½ (m - n)', '½ (m + n)', 'D', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(6, 'In the figure, DE || BC. If AD = x, DB = (x - 2), AE = (x + 2), EC = (x - 1). What is the value of x?', '4', '8', '16', '32', 'A', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(7, 'The distance between the points (a cos θ + b sin θ, 0) and (0, a sin θ - b cos θ) is:', '√a² - b²', 'a² + b²', 'a² - b²', '√a² + b²', 'D', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(8, 'The value of cos²60° + 2tan45° − sin²30° is:', '√3', '3', '2', '0', 'C', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(9, 'Choose the correct reciprocal ratios.', 'tan θ, sec θ', 'cosec θ, sec θ', 'sec θ, sin θ', 'tan θ, cot θ', 'D', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(10, 'If the mean of frequency distribution is 7.5 and Σfi·xi = 120 + 3k, Σfi = 30, then k is equal to:', '30', '35', '40', '45\r\n', 'B', NULL, 8, 1, 3, NULL, 1, '2025-06-12 10:13:10', '2025-06-12 10:13:10'),
(13, '4^2', '16', '22', '2', '10', 'A', NULL, 8, 3, 3, 1, NULL, '2025-06-12 05:16:25', '2025-06-12 18:37:47'),
(18, 'If your clock jumps 5 minutes ahead every tick, what will it show after 6 ticks from 4:00?', '4:30', '4:25', '4:35', '5:00', 'A', 'uploads/questions/1779771040_6a1526a0c2f30.png', 3, 19, 3, NULL, 1, '2025-06-26 16:26:59', '2026-05-26 11:50:40'),
(19, 'If 🔴 = 5, 🔵 = 3 Pattern: 🔴 + 🔴 + 🔵 × 🔴 What is the value?', '10', '18', '25', '15', 'C', NULL, 3, 19, 3, NULL, 1, '2025-06-26 16:29:46', '2025-06-26 17:02:54'),
(20, 'Each laddoo needs 4 spoons. With 25 spoons, max laddoos = 25 ÷ 4 = 6 (with 1 spoon left over).', '5', '6', '7', '8', 'B', 'uploads/questions/1779771411_6a1528135755c.png', 3, 19, 3, NULL, 1, '2025-06-26 16:33:39', '2026-05-26 11:56:51'),
(21, 'A number is more than 40 but less than 60. Its ones digit is 2, and it’s a multiple of 3. What is the number?', '42', '52', '24', '28', 'A', NULL, 3, 19, 3, NULL, 1, '2025-06-26 16:34:34', '2025-06-26 16:34:34'),
(22, 'Each friend brings 1 more balloon than the last. First brings 2. How many will the 6th friend bring?\r\nEach friend brings 1 more balloon than the last. First brings 2. How many will the 6th friend bring?', '8', '6', '7', '10', 'C', 'uploads/questions/1779771561_6a1528a9103bb.png', 3, 19, 3, NULL, 1, '2025-06-26 16:35:16', '2026-05-26 11:59:21'),
(23, 'Rita saves ₹5 on Monday, ₹10 on Tuesday, ₹15 on Wednesday… What will she save on Sunday?', '₹30', '₹35', '₹40', '₹45', 'B', NULL, 3, 19, 3, NULL, 1, '2025-06-26 16:36:17', '2025-06-26 16:36:17'),
(24, 'A cube is dipped in red paint. How many faces will be coloured?', '6', '5', '1', '3', 'A', NULL, 3, 19, 3, NULL, 1, '2025-06-26 16:37:00', '2025-06-26 16:37:00'),
(25, 'If yesterday was Sunday, what day will it be after 4 days?If yesterday was Sunday, what day will it be after 4 days?If yesterday was Sunday, what day will it be after 4 days?', 'Friday Wednesday ure Wednesday Wednesday Wednesday', 'Friday Wednesday ure Wednesday Wednesday Wednesday', 'Saturday Wednesday ure Wednesday Wednesday Wednesday', 'Thursday Wednesday ure Wednesday Wednesday Wednesday', 'A', NULL, 3, 19, 3, NULL, 1, '2025-06-26 16:38:12', '2025-06-26 16:38:12'),
(26, 'You buy a pencil for ₹9, an eraser for ₹6, and a sharpener for ₹5. Which note can you give to get no change back?', '₹10', '₹20', '₹25', '₹50', 'B', NULL, 3, 19, 3, NULL, 1, '2025-06-26 16:39:25', '2025-06-26 16:39:25'),
(27, 'Find the odd number (skip count by 10).', '5', '15', '26', '35', 'C', NULL, 3, 19, 3, NULL, 1, '2025-06-26 16:40:55', '2026-05-26 11:41:55'),
(29, 'If your clock jumps 5 minutes ahead every tick, what will it show after 6 ticks from 4:00?', '5', '6', '7', '8', 'A', NULL, 4, 22, 3, NULL, 1, '2026-05-29 12:33:14', '2026-05-29 12:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Environmental Science', '2025-06-12 04:10:36', '2025-06-12 04:10:36'),
(2, 'English', '2025-06-12 04:10:52', '2025-06-12 04:10:52'),
(3, 'Mathematics', '2025-06-12 04:11:01', '2025-06-12 18:50:37'),
(4, 'Science', '2025-06-12 04:11:10', '2025-06-12 04:11:10'),
(5, 'Hindi', '2025-06-12 04:11:22', '2025-06-12 04:11:22'),
(6, 'History', '2025-06-17 11:34:46', '2025-06-17 11:34:46');

-- --------------------------------------------------------

--
-- Table structure for table `subject_links`
--

CREATE TABLE `subject_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `class_id` bigint(20) UNSIGNED NOT NULL,
  `random_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `subject_links`
--

INSERT INTO `subject_links` (`id`, `subject_id`, `class_id`, `random_code`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '92132', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(2, 1, 2, '52324', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(3, 1, 3, '26983', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(4, 1, 4, '25456', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(5, 1, 5, '94797', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(6, 1, 6, '37639', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(7, 1, 7, '43987', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(8, 1, 8, '68480', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(9, 1, 9, '26086', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(10, 1, 10, '92097', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(11, 1, 11, '89838', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(12, 1, 12, '84421', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(15, 2, 3, '92087', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(16, 2, 4, '36527', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(17, 2, 5, '92444', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(18, 2, 6, '78122', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(19, 2, 7, '32419', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(20, 2, 8, '10500', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(21, 2, 9, '73685', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(22, 2, 10, '27240', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(23, 2, 11, '98935', '2025-06-16 12:45:00', '2025-06-16 12:45:00'),
(24, 2, 12, '63305', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(25, 3, 1, '62809', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(26, 3, 2, '13623', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(27, 3, 3, '29804', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(28, 3, 4, '63194', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(29, 3, 5, '58882', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(30, 3, 6, '34154', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(31, 3, 7, '76845', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(32, 3, 8, '39076', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(33, 3, 9, '91066', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(34, 3, 10, '99913', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(35, 3, 11, '69453', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(36, 3, 12, '77490', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(37, 4, 1, '96913', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(38, 4, 2, '70938', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(39, 4, 3, '67322', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(40, 4, 4, '10461', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(41, 4, 5, '10366', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(42, 4, 6, '31352', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(43, 4, 7, '24339', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(44, 4, 8, '43329', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(45, 4, 9, '95628', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(46, 4, 10, '79150', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(47, 4, 11, '61760', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(48, 4, 12, '81631', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(49, 5, 1, '37896', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(50, 5, 2, '36336', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(51, 5, 3, '99955', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(52, 5, 4, '11449', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(53, 5, 5, '79354', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(54, 5, 6, '47002', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(55, 5, 7, '23949', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(56, 5, 8, '91875', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(57, 5, 9, '31568', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(58, 5, 10, '49938', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(59, 5, 11, '64268', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(60, 5, 12, '63411', '2025-06-16 12:45:01', '2025-06-16 12:45:01'),
(61, 6, 1, '81806', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(62, 6, 2, '86697', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(63, 6, 3, '92125', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(64, 6, 4, '55248', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(65, 6, 5, '54780', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(66, 6, 6, '25408', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(67, 6, 7, '82385', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(68, 6, 8, '66748', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(69, 6, 9, '91147', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(70, 6, 10, '68879', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(71, 6, 11, '55197', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(72, 6, 12, '36987', '2025-06-17 11:34:58', '2025-06-17 11:34:58'),
(85, 2, 1, '26931', '2026-05-29 13:03:50', '2026-05-29 13:03:50'),
(86, 2, 2, '66444', '2026-05-29 13:03:50', '2026-05-29 13:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL DEFAULT 'user',
  `subject_id` bigint(20) UNSIGNED NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `role`, `subject_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rohan', 'Jain', 'rohan@gmail.com', '$2y$12$8CH2cS6UCnlNYGuv8qu0TOjajTvgLYOfr1oM6/ygds901s/au/oym', '8756822036', 'user', 3, NULL, '2025-06-12 04:12:30', '2025-06-18 11:14:30'),
(2, 'Rohit', 'Kumar', 'rohit@gmail.com', '$2y$12$lT6Xzbhn1NClNXi1KTKrpuGdk4VES0YJMoMSU/lPLvQZIOtxfvpJ2', '9087654321', 'user', 2, NULL, '2025-06-12 04:13:26', '2025-06-12 04:13:26'),
(3, 'Naeem', 'Qureshi', 'naeemkuraishi350@gmail.com', '$2y$12$m2PWSiaVuAzAGFviz40o5OAW6M7WYhVQBCoe.XCJ2u9/t78cI7fxW', '8756822036', 'user', 4, NULL, '2025-06-12 04:13:53', '2026-05-26 12:28:58'),
(4, 'Ajay', 'Kumar', 'ajay@gmail.com', '$2y$12$Y4nqdMhlrkUB1vGKxxWo/uXvHnlh78uxx1VkGtR5nek0ANbDPYJim', '9087650987', 'user', 1, NULL, '2025-06-12 04:14:26', '2025-06-18 11:11:31'),
(5, 'Vijay', 'Kumar', 'vijay@gmail.com', '$2y$12$Rs38N3wN52J5Z/ypmL5Nhuf9c12HJ47zGszZ.yDu8yG1fmMsHjaia', '9087654300', 'user', 5, NULL, '2025-06-12 04:15:01', '2025-06-12 04:15:01');

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
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_chapters_classroom_id` (`classroom_id`),
  ADD KEY `fk_chapters_subject_id` (`subject_id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `instructions`
--
ALTER TABLE `instructions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_subject_class` (`subject_id`,`class_id`),
  ADD KEY `fk_instructions_class` (`class_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_classroom_id_foreign` (`classroom_id`),
  ADD KEY `questions_chapter_id_foreign` (`chapter_id`),
  ADD KEY `questions_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject_links`
--
ALTER TABLE `subject_links`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `random_code` (`random_code`),
  ADD UNIQUE KEY `unique_subject_class` (`subject_id`,`class_id`),
  ADD KEY `fk_subject_links_class` (`class_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_subject_id_foreign` (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `instructions`
--
ALTER TABLE `instructions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subject_links`
--
ALTER TABLE `subject_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `fk_chapters_classroom_id` FOREIGN KEY (`classroom_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_chapters_subject_id` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `instructions`
--
ALTER TABLE `instructions`
  ADD CONSTRAINT `fk_instructions_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_instructions_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_classroom_id_foreign` FOREIGN KEY (`classroom_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `questions_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subject_links`
--
ALTER TABLE `subject_links`
  ADD CONSTRAINT `fk_subject_links_class` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_subject_links_subject` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
