-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2021 at 12:42 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprog_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2020_11_28_090306_create_product_types_table', 1),
(4, '2020_11_28_100451_create_products_table', 1),
(5, '2020_12_09_155643_create_carts_table', 1),
(6, '2020_12_09_163808_create_transaction_headers_table', 1),
(7, '2020_12_09_163914_create_transaction_details_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_type_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `product_type_id`, `stock`, `price`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Hauga', 3, 13, 2299000, 'Upholsa light tered bed frame, Vissle Grey', 'product/bed frame/Hauga.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44'),
(2, 'Malm', 3, 9, 2799000, 'Bed frame, high, brown stained veneer/Luroy', 'product/bed frame/Malm.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44'),
(3, 'Slattum', 3, 19, 2999000, 'Upholstered bed frame, Knisa light grey', 'product/bed frame/Slattum.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44'),
(4, 'Hemnes', 3, 22, 3799000, 'Bed frame, black-brown/Lonset', 'product/bed frame/Hemnes.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(5, 'Leirvik', 3, 20, 3999000, 'Bed frame, white/Lonset', 'product/bed frame/Leirvik.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(6, 'Gersby', 2, 126, 599000, 'Bookcase, white', 'product/bookshelf/Gersby.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(7, 'Laiva', 2, 168, 399000, 'Bookcase, black-brown', 'product/bookshelf/Laiva.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(8, 'Lommarp', 2, 14, 2799000, 'Bookcase, light beige', 'product/bookshelf/Lommarp.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(9, 'Hemnes', 2, 5, 2999000, 'Bookcase, black-brown/light brown', 'product/bookshelf/Hemnes.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(10, 'Brusali', 2, 12, 1799000, 'Bookcase, white', 'product/bookshelf/Brusali.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(11, 'Hemlingby', 1, 16, 2995000, 'Two-seat sofa, Bomstad black', 'product/sofa/Hemlingby.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(12, 'Klippan', 1, 36, 2895000, '2-seat sofa, Vissle grey', 'product/sofa/Klippan.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(14, 'Kivik', 1, 6, 29990000, '4-seat sofa, with chaise longue/Grann/Bomstad black', 'product/sofa/Kivik.jpg', '2020-12-09 14:31:45', '2020-12-09 14:31:45'),
(15, 'Knoppar', 1, 17, 1995000, '2-seat sofa, Knisa light grey', 'product/Sofa/Knoppar.jpg', '2020-12-09 14:31:46', '2021-07-23 00:09:46'),
(16, 'Markus', 4, 52, 2999000, 'Office chair, Vissle dark grey', 'product/chair/Markus.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(17, 'Lidkullen', 4, 9, 1499000, 'Active sit/stand support, Gunnared beige', 'product/chair/Lidkullen.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(18, 'Flintan', 4, 60, 999000, 'Office chair, Vissle grey', 'product/chair/Flintan.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(19, 'Trollberget', 4, 9, 1999000, 'Active sit/stand support, Grann beige', 'product/chair/Trollberget.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(20, 'Alefjall', 4, 8, 4999000, 'Office chair, Grann golden-brown', 'product/chair/Alefjall.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(21, 'Micke', 5, 177, 1499000, 'Desk, white', 'product/desk/Micke.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(22, 'Brusali', 5, 4, 1499000, 'Corner desk , white', 'product/desk/Brusali.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(23, 'Fredde', 5, 40, 3499000, 'Desk, black', 'product/desk/Fredde.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(24, 'Lommarp', 5, 11, 2499000, 'Desk, light beige', 'product/desk/Lommarp.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46'),
(25, 'Ingatorp', 5, 6, 2499000, ' Desk, black', 'product/desk/Ingatorp.jpg', '2020-12-09 14:31:46', '2020-12-09 14:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `product_types`
--

CREATE TABLE `product_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_types`
--

INSERT INTO `product_types` (`id`, `name`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Sofa', 'product types/sofa.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44'),
(2, 'Bookshelf', 'product types/bookshelf.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44'),
(3, 'Bed Frame', 'product types/bed frame.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44'),
(4, 'Chair', 'product types/chair.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44'),
(5, 'Desk', 'product types/desk.jpg', '2020-12-09 14:31:44', '2020-12-09 14:31:44');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `transaction_header_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`id`, `product_id`, `transaction_header_id`, `quantity`) VALUES
(5, 6, 4, 3),
(6, 7, 4, 4),
(7, 8, 5, 5),
(8, 9, 5, 7),
(9, 10, 6, 5),
(10, 11, 7, 4),
(11, 12, 7, 2),
(12, 1, 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaction_headers`
--

CREATE TABLE `transaction_headers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaction_headers`
--

INSERT INTO `transaction_headers` (`id`, `user_id`, `grand_total`, `created_at`, `updated_at`) VALUES
(4, 2, 18993000, '2020-12-10 05:00:53', '2020-12-10 05:00:53'),
(5, 2, 32588000, '2020-12-10 05:01:30', '2020-12-10 05:01:30'),
(6, 2, 2995000, '2020-12-10 05:01:43', '2020-12-10 05:01:43'),
(7, 2, 43944000, '2021-07-23 00:08:13', '2021-07-23 00:08:13'),
(8, 2, 8997000, '2021-07-25 19:33:23', '2021-07-25 19:33:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'member',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `address`, `gender`, `date_of_birth`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@g.com', NULL, '$2y$10$D5iDYBjsSV7qOEFS.byyNepDB3I0q53FcblyF2.tiYU3I.TKrTIVS', 'Confidental', 'Male', '01/01/2000', 'admin', NULL, '2020-12-09 14:31:43', '2020-12-09 14:31:43'),
(2, 'Member No.1', 'member@g.com', NULL, '$2y$10$i7zeWs3yRN7HLcB5CJzFp.lSP6UUauLnFKNgw59hibs9xhjBSrVMi', 'Jln. Menuju Bulan', 'Male', '01/04/2001', 'member', NULL, '2020-12-09 14:31:43', '2021-07-23 00:08:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_product_type_id_foreign` (`product_type_id`);

--
-- Indexes for table `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_types_name_unique` (`name`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_product_id_foreign` (`product_id`),
  ADD KEY `transaction_details_transaction_header_id_foreign` (`transaction_header_id`);

--
-- Indexes for table `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_headers_user_id_foreign` (`user_id`);

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
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction_headers`
--
ALTER TABLE `transaction_headers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_product_type_id_foreign` FOREIGN KEY (`product_type_id`) REFERENCES `product_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_transaction_header_id_foreign` FOREIGN KEY (`transaction_header_id`) REFERENCES `transaction_headers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_headers`
--
ALTER TABLE `transaction_headers`
  ADD CONSTRAINT `transaction_headers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
