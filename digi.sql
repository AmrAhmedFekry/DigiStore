-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 11, 2016 at 08:34 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digi`
--

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maincats`
--

CREATE TABLE `maincats` (
  `id` int(10) UNSIGNED NOT NULL,
  `maincat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `maincats`
--

INSERT INTO `maincats` (`id`, `maincat_name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', NULL, NULL),
(2, 'Clothing & wears', NULL, NULL),
(3, 'Accessories & Extras', NULL, NULL),
(4, 'furniture', NULL, NULL),
(6, 'sssssssss', '2016-12-08 11:40:50', '2016-12-08 11:40:50');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `email`, `name`, `message`, `created_at`, `updated_at`) VALUES
(1, 'amrahmedfekry@outlook.com', 'Amr Fekry', 'i''m here', '2016-09-22 12:52:30', '2016-09-22 10:34:14'),
(4, 'talaat@outlook.com', 'Mohamed Talaat', 'i''m here', '2016-09-22 10:57:56', '2016-09-22 10:57:56'),
(9, 'muhamed_homos@outlook.com', 'Homos', 'i''m homos', '2016-09-22 13:08:38', '2016-09-22 13:08:38'),
(10, 'mohamedfekry@outlook.com', 'mohamed Fekry', 'aasaca', '2016-09-22 13:10:48', '2016-09-22 13:10:48'),
(26, 'amrahmedfekry@outlook.com', 'amr fekry', 'asasa', '2016-09-30 10:44:26', '2016-09-30 10:44:26'),
(29, 'amrahmedfekry@outlook.com', 'amr fekry', 'iasa', '2016-09-30 10:48:48', '2016-09-30 10:48:48'),
(30, 'amrahmedfekry@outlook.com', 'amr fekry', 'aasa', '2016-09-30 10:51:18', '2016-09-30 10:51:18'),
(31, 'admin_amr@digi.com', 'amr fekry', 'aasascascasa', '2016-09-30 11:02:07', '2016-09-30 11:02:07'),
(32, 'amrahmedfekry@outlook.com', 'amr fekry', 'AASA', '2016-09-30 12:13:39', '2016-09-30 12:13:39');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2016_08_30_210945_maincat', 2),
('2016_08_30_214022_maincats', 3),
('2016_09_10_200704_subcats', 4),
('2016_09_10_213337_products', 5),
('2016_09_22_102837_messages', 6),
('2016_09_30_125927_create_jobs_table', 7),
('2016_11_25_213918_maincat', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_maincat_id` int(11) NOT NULL,
  `product_subcat_id` int(11) NOT NULL,
  `product_details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maincat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `product_image`, `product_maincat_id`, `product_subcat_id`, `product_details`, `maincat_name`, `subcat_name`, `created_at`, `updated_at`) VALUES
(5, 'Huawei P9 Plus - 5.5" - 64GB Dual SIM Mobile Phone - Haze Gold', 7495, '1474034076.jpg', 1, 1, '5.5‎"‎ Super AMOLED Capacitive Touch Screen\r\n64 GB Storage‎,‎ MicroSD up to 128 GB\r\nDual 12 MP Back Camera‎,‎ 8 MP Front Camera\r\nOcta Core CPU‎:‎ 2.5 GHz & 1.8 GHz‎,‎ 4 GB RAM\r\nAndroid OS‎,‎ v6.0 ‎(‎Marshmallow‎)‎\r\nLi‎-ion 3400 mAh Battery‎,‎ Dual SIM\r\n', 'Electronics', 'Mobile', '2016-11-25 21:51:05', '2016-09-16 11:54:36'),
(6, 'LG K10 - 5.3" - 4G Dual SIM Mobile Phone - Indigo', 2269, '1474034323.jpg', 1, 1, '5.3‎"‎ IPS LCD Capacitive Touch Screen\r\n16 GB Internal Storage‎,‎ MicroSD up to 32 GB\r\n13 MP Back Camera‎,‎ 5 MP Front Camera\r\nOcta‎-core 1.14 GHz CPU‎,‎ 2 GB RAM\r\nAndroid OS‎,‎ v6.0 ‎(‎Marshmallow‎)‎\r\n', 'Electronics', 'Mobile', '2016-11-25 21:51:13', '2016-09-16 11:58:43'),
(8, 'Apple iPad Air 2 - 16GB - Wi-Fi + Cellular - Space Gray', 7200, '1474035523.jpg', 1, 3, '9.7" LED-backlit IPS LCD Capacitive Touch Screen\r\n16 GB Storage\r\nCamera: 8 Megapixels Back, 1.2 Megapixels Front\r\nTriple-core 1.5 GHz CPU, 2 GB RAM\r\niOS 8.1\r\nConnectivity: Wi-Fi, 4G (Nano SIM)\r\n', 'Electronics', 'Tablets', '2016-11-25 21:51:15', '2016-09-16 12:18:43'),
(10, 'Casio AE-1000W-1AVDF Resin Watch - Black', 388, '1474055396.jpg', 3, 10, 'Resin Glass / Spherical Glass\r\n100-meter water resistance\r\nCase / bezel material: Resin\r\nResin Band\r\nLED light\r\n1/100-second stopwatch', 'Accessories & Extras', 'Men''s Accessaries', '2016-11-25 21:53:45', '2016-09-16 17:49:56'),
(12, 'Ravin Bundle of 3 V-Neck T-Shirts - Grey, White & Black', 129, '1474452819.jpg', 2, 6, 'Cotton material\r\nV-neck\r\nShort sleeves\r\nSlip on', 'Clothing&wears', 'Men''s Clothing', '2016-11-25 21:52:00', '2016-09-21 08:13:39'),
(13, 'SARY Book Laptop - Intel Atom - 2GB RAM - 32GB eMMC - 14" HD - Intel GPU - Windows 10 - White', 2444, '1475777615.jpg', 1, 2, 'Intel Atom x5-Z8300, 1.44 GHz CPU\r\n2 GB RAM, 32 GB eMMC\r\n14" HD LED-backlit Screen\r\nIntel HD Graphics GPU\r\nBluetooth v4.0, Wi-Fi 802.11 b/g/n', 'Electronics', 'Computers', '2016-11-25 21:52:07', '2016-10-06 16:13:35');

-- --------------------------------------------------------

--
-- Table structure for table `subcats`
--

CREATE TABLE `subcats` (
  `id` int(10) UNSIGNED NOT NULL,
  `maincat_id` int(11) NOT NULL,
  `maincat_name` text COLLATE utf8_unicode_ci NOT NULL,
  `subcat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subcats`
--

INSERT INTO `subcats` (`id`, `maincat_id`, `maincat_name`, `subcat_name`, `created_at`, `updated_at`) VALUES
(1, 1, 'Electronics', 'Mobile', '2016-09-10 18:46:50', '2016-09-10 18:46:50'),
(2, 1, 'Electronics', 'Computers', '2016-09-10 18:47:41', '2016-09-10 18:47:41'),
(3, 1, 'Electronics', 'Tablets', '2016-09-10 18:47:54', '2016-09-10 18:47:54'),
(4, 1, 'Electronics', 'Games & Entertainment', '2016-09-10 18:48:07', '2016-09-10 18:48:07'),
(6, 2, 'Clothing&wears', 'Men''s Clothing', '2016-09-10 18:48:42', '2016-09-10 18:48:42'),
(7, 2, 'Clothing&wears', 'Women''s Clothing', '2016-09-10 18:48:55', '2016-09-10 18:48:55'),
(8, 2, 'Clothing&wears', 'Kid''s Wear', '2016-09-10 18:49:14', '2016-09-10 18:49:14'),
(9, 3, 'Accessories & Extras', 'Mobile Accessaries', '2016-09-10 18:49:28', '2016-09-10 18:49:28'),
(10, 3, 'Accessories & Extras', 'Men''s Accessaries', '2016-09-10 18:49:40', '2016-09-10 18:49:40'),
(11, 3, 'Accessories & Extras', 'Women''s Accessaries', '2016-09-10 18:49:53', '2016-09-10 18:49:53'),
(13, 4, 'furniture', 'Home furniture', '2016-09-10 19:16:12', '2016-12-07 10:13:54'),
(14, 6, 'sssssssss', 'bbbbbbrdxeex', '2016-12-08 11:41:08', '2016-12-08 11:41:08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_manger` int(255) DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_manger`, `remember_token`, `created_at`, `updated_at`) VALUES
(33, 'Amr Ahmed Fekry', 'amr@digiadmin.com', '$2y$10$vXfjL6qdBzL/EpoxvbSz5.Ze8kX7.bRZuRjaP8DsgKaaXmAIauVcq', 1, 'Fs9yhTwZpYIfjf1KKIjLTCHJjjHx0GJFY9u5oK5lqH6CPv20WHWfeB2j76KQ', '2016-10-18 18:02:07', '2016-10-18 18:29:55'),
(36, 'Homosaaaaaa', 'homos@digistore.com', '778842521522', 0, '4jdv1NT2glep4rU7rCtp13S0vSfxoUu5765pcFK9TpgF2J3VYM4t9VVxFvlK', '2016-10-18 18:27:20', '2016-12-08 11:39:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_reserved_at_index` (`queue`,`reserved_at`);

--
-- Indexes for table `maincats`
--
ALTER TABLE `maincats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcats`
--
ALTER TABLE `subcats`
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
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `maincats`
--
ALTER TABLE `maincats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `subcats`
--
ALTER TABLE `subcats`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
