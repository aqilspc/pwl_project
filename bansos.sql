-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2021 at 06:26 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bansos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bansos_banks`
--

CREATE TABLE `bansos_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_bank` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `an` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bansos_banks`
--

INSERT INTO `bansos_banks` (`id`, `name_bank`, `no_rek`, `an`, `created_at`, `updated_at`) VALUES
(1, 'BCA', '65463342234', 'budi', '2021-06-18 06:37:23', '2021-06-18 06:37:23');

-- --------------------------------------------------------

--
-- Table structure for table `bansos_categories`
--

CREATE TABLE `bansos_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bansos_categories`
--

INSERT INTO `bansos_categories` (`id`, `name_category`, `created_at`, `updated_at`) VALUES
(1, 'BansosKebakaranHutan', '2021-06-18 06:37:11', '2021-06-18 06:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `bansos_contributors`
--

CREATE TABLE `bansos_contributors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name_contributor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_contributor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_contributor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bansos_contributors`
--

INSERT INTO `bansos_contributors` (`id`, `user_id`, `name_contributor`, `phone_contributor`, `address_contributor`, `created_at`, `updated_at`) VALUES
(2, 2, 'boss', '0812737811', 'Pausruan', '2021-06-18 06:42:35', '2021-06-18 06:48:49');

-- --------------------------------------------------------

--
-- Table structure for table `bansos_donations`
--

CREATE TABLE `bansos_donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bansos_category_id` bigint(20) UNSIGNED NOT NULL,
  `bansos_receiver_id` bigint(20) UNSIGNED NOT NULL,
  `bansos_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name_donation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_donation` bigint(20) UNSIGNED NOT NULL,
  `date_donation` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bansos_donations`
--

INSERT INTO `bansos_donations` (`id`, `bansos_category_id`, `bansos_receiver_id`, `bansos_banner`, `name_donation`, `total_donation`, `date_donation`, `created_at`, `updated_at`) VALUES
(2, 1, 2, 'http://127.0.0.1:8000/admin/images/cars/1084308503-banner.jpeg', 'Sumbangan berupa Uang', 500000, '2021-06-22', '2021-06-18 06:42:05', '2021-06-18 06:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `bansos_items`
--

CREATE TABLE `bansos_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bansos_donation_id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `bansos_contributor_id` bigint(20) UNSIGNED NOT NULL,
  `total_item` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bansos_items`
--

INSERT INTO `bansos_items` (`id`, `bansos_donation_id`, `date`, `bansos_contributor_id`, `total_item`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-06-18', 2, 200000, '2021-06-18 06:51:08', '2021-06-18 06:51:08');

-- --------------------------------------------------------

--
-- Table structure for table `bansos_receivers`
--

CREATE TABLE `bansos_receivers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name_receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_receiver` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address_receiver` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bansos_receivers`
--

INSERT INTO `bansos_receivers` (`id`, `name_receiver`, `phone_receiver`, `address_receiver`, `created_at`, `updated_at`) VALUES
(2, 'Yayasan Husnul Khotimah', '08213712641', 'Sumatera', '2021-06-18 06:37:48', '2021-06-18 06:37:48');

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
(4, '2021_05_17_100105_create_receivers_table', 1),
(5, '2021_05_17_110102_create_contributors_table', 1),
(6, '2021_05_17_110103_create_bansos_categories_table', 1),
(7, '2021_05_17_110105_create_bansos_donation_table', 1),
(8, '2021_05_17_110106_create_bansos_items_table', 1),
(9, '2021_05_17_114751_create_bansos_banks_table', 1),
(10, '2021_05_24_192741_create_photos_table', 1);

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
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bansos_donation_id` bigint(20) UNSIGNED NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'izul', 'aku@gmail.com', NULL, '$2y$10$d2ZjCQ2Oi9Ze7gBPolyJuuYRedLcdpeRDeNeIDS9OUh/MWT3tqMk2', NULL, '2021-06-18 06:36:31', '2021-06-18 06:36:31'),
(2, 'donatur', 'boss', 'akuu123@gmail.com', NULL, '$2y$10$DDLYq5MzmMp6NYNFQ2RefO/j/bl1vOp1PAj581L4Xi/Ib9SPwjZ/m', NULL, '2021-06-18 06:42:35', '2021-06-18 06:42:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bansos_banks`
--
ALTER TABLE `bansos_banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bansos_categories`
--
ALTER TABLE `bansos_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bansos_contributors`
--
ALTER TABLE `bansos_contributors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bansos_contributors_user_id_foreign` (`user_id`);

--
-- Indexes for table `bansos_donations`
--
ALTER TABLE `bansos_donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bansos_items`
--
ALTER TABLE `bansos_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bansos_receivers`
--
ALTER TABLE `bansos_receivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bansos_banks`
--
ALTER TABLE `bansos_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bansos_categories`
--
ALTER TABLE `bansos_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bansos_contributors`
--
ALTER TABLE `bansos_contributors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bansos_donations`
--
ALTER TABLE `bansos_donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bansos_items`
--
ALTER TABLE `bansos_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bansos_receivers`
--
ALTER TABLE `bansos_receivers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bansos_contributors`
--
ALTER TABLE `bansos_contributors`
  ADD CONSTRAINT `bansos_contributors_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
