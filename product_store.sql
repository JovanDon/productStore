-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2018 at 10:41 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `product_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(14, '2014_10_12_000000_create_users_table', 1),
(15, '2014_10_12_100000_create_password_resets_table', 1),
(16, '2018_06_25_095641_create_pdts_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pdts`
--

CREATE TABLE `pdts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `cprice` int(11) NOT NULL,
  `sprice` int(11) NOT NULL,
  `amount_instock` int(11) DEFAULT NULL,
  `expdate` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `supplier_certificate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pdts`
--

INSERT INTO `pdts` (`id`, `name`, `qty`, `cprice`, `sprice`, `amount_instock`, `expdate`, `created_at`, `updated_at`, `user_id`, `supplier_certificate`) VALUES
(1, 'sweet', 12, 200, 300, 12, '2018-09-29', '2018-06-25 12:31:23', '2018-06-25 12:31:23', 1, 'supplier_certificate/nEPTUOV4d4oQSzrOj276t1Sj02UqpI4LtTXE9sSr.png'),
(2, 'sweet', 12, 200, 300, 12, '2018-09-29', '2018-06-25 12:35:01', '2018-06-25 12:35:01', 1, 'supplier_certificate/UvmxeYZp8R0SRc2oOBUkpDiZrGCizLA10hbqYNjE.png'),
(3, 'Red boot shoes', 20, 60000, 100000, 20, '2018-06-30', '2018-06-25 17:39:58', '2018-06-25 17:39:58', 1, 'supplier_certificate/JtOjiV2H6j1junM3asHnHLtN3IKl6rayPUqPUQYv.pdf'),
(4, 'white canvas shoes', 2, 40000, 50000, 2, '2018-09-29', '2018-06-25 17:42:13', '2018-06-25 17:42:13', 1, 'supplier_certificate/qAfBLBDKQHwH7nZhsMU4XsY48XLQRwL2WceMIB0A.pdf'),
(5, 'Black open male shoes', 6, 30000, 40000, 6, NULL, '2018-06-25 18:04:03', '2018-06-25 18:04:03', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '$2y$10$helBdiTeTb0APYiT0YNAJ.0QM21XIYfECexqbQR.BzVknpvo2eWBK', 'IeXjuFUqk2xqZAKQJZfcLXdGI7QhKu4Du1BETAo1Wonfz9dtX1oWLtLtpHQY', '2018-06-25 12:29:02', '2018-06-25 12:29:02'),
(2, 'admin@gmail.com', 'mutesasirajovan@gmail.com', '$2y$10$ADFmvvb/SJexQVVAxqCSnOrkHz63xAWWtP7CuPbm..Y.5728hKXMG', 'YdmvyYugvALbTnIttppi2mY0bjNci35sRIesnnjnTsYbee29w3z0OC9qtM40', '2018-06-25 17:48:47', '2018-06-25 17:48:47');

--
-- Indexes for dumped tables
--

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
-- Indexes for table `pdts`
--
ALTER TABLE `pdts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pdts_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pdts`
--
ALTER TABLE `pdts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pdts`
--
ALTER TABLE `pdts`
  ADD CONSTRAINT `pdts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
