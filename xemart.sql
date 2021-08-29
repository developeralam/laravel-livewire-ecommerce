-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 04:23 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xemart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(6, 'Quaerat.', 'quaerat', '2021-08-03 20:10:26', '2021-08-03 20:10:26'),
(7, 'Hic.', 'hic', '2021-08-03 20:10:26', '2021-08-03 20:10:26'),
(8, 'Et velit.', 'et-velit', '2021-08-03 20:10:26', '2021-08-03 20:10:26'),
(9, 'Aut.', 'aut', '2021-08-03 20:10:26', '2021-08-03 20:10:26'),
(10, 'Vero.', 'vero', '2021-08-03 20:10:26', '2021-08-03 20:10:26'),
(11, 'md alam', 'md-alam', '2021-08-03 23:53:58', '2021-08-03 23:53:58'),
(12, 'md alam', 'md-alam', '2021-08-03 23:54:00', '2021-08-03 23:54:00'),
(13, 'md alam', 'md-alam', '2021-08-03 23:54:11', '2021-08-03 23:54:11'),
(14, 'asd adfa', 'asd-adfa', '2021-08-03 23:57:21', '2021-08-03 23:57:21'),
(15, 'Benedict Dawson', 'benedict-dawson', '2021-08-04 00:25:52', '2021-08-04 00:25:52'),
(16, 'Stephanie Holman', 'stephanie-holman', '2021-08-04 00:31:23', '2021-08-04 00:31:23'),
(17, 'সদ আসদফ আদফাসদফ', 'sd-asdf-adfasdf', '2021-08-04 03:27:25', '2021-08-04 03:27:25'),
(18, 'Miranda Yates', 'miranda-yates', '2021-08-04 03:48:34', '2021-08-04 03:48:34'),
(19, 'Montana Huber', 'montana-huber', '2021-08-04 23:29:35', '2021-08-04 23:29:35'),
(20, 'Meredith Sloan', 'meredith-sloan', '2021-08-04 23:29:40', '2021-08-04 23:29:40'),
(21, 'Nita Estrada', 'nita-estrada', '2021-08-04 23:29:44', '2021-08-04 23:29:44'),
(22, 'Steven Peck', 'steven-peck', '2021-08-04 23:29:48', '2021-08-04 23:29:48'),
(23, 'Nelle Marshall', 'nelle-marshall', '2021-08-04 23:29:51', '2021-08-04 23:29:51'),
(24, 'Kasimir Harrison', 'kasimir-harrison', '2021-08-04 23:29:55', '2021-08-04 23:29:55'),
(25, 'Dahlia Rivers', 'dahlia-rivers', '2021-08-04 23:30:01', '2021-08-04 23:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('fixed','percent') COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `cart_value` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expiry_date` date NOT NULL DEFAULT curdate()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `value`, `cart_value`, `created_at`, `updated_at`, `expiry_date`) VALUES
(3, 'alam', 'percent', 32, 1000, '2021-08-10 21:01:35', '2021-08-10 23:38:23', '2021-08-12'),
(4, 'Sunt aut at fugiat ', 'fixed', 81, 65, '2021-08-11 23:34:48', '2021-08-11 23:35:21', '2021-08-30');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2021_08_03_031655_create_sessions_table', 1),
(7, '2014_10_12_000000_create_users_table', 2),
(8, '2021_08_04_015750_create_categories_table', 3),
(11, '2021_08_04_151514_create_products_table', 4),
(12, '2021_08_06_141831_create_seos_table', 5),
(13, '2021_08_06_141938_create_site_settings_table', 5),
(14, '2021_08_07_065511_create_sliders_table', 6),
(15, '2021_08_07_065612_create_services_table', 6),
(20, '2021_08_11_003216_create_coupons_table', 9),
(21, '2021_08_11_055735_create_shoppingcart_table', 10),
(22, '2021_08_12_051542_add_expiry_date_to_coupons_table', 10),
(26, '2021_08_10_152134_create_order_items_table', 11),
(28, '2021_08_10_152221_create_transactions_table', 11),
(29, '2021_08_10_152121_create_orders_table', 12),
(30, '2021_08_10_152202_create_shippings_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discount` int(11) NOT NULL DEFAULT 0,
  `subtotal` int(11) NOT NULL,
  `tax` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('ordered','delivered','cancled') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'ordered',
  `is_shipping_different` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `discount`, `subtotal`, `tax`, `total`, `name`, `mobile`, `email`, `address`, `city`, `village`, `country`, `note`, `zipcode`, `status`, `is_shipping_different`, `created_at`, `updated_at`) VALUES
(1, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-13 23:34:08', '2021-08-13 23:34:08'),
(2, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-13 23:47:06', '2021-08-13 23:47:06'),
(3, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-13 23:47:27', '2021-08-13 23:47:27'),
(4, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-13 23:47:51', '2021-08-13 23:47:51'),
(5, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-13 23:48:12', '2021-08-13 23:48:12'),
(6, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-14 00:26:01', '2021-08-14 00:26:01'),
(7, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-14 00:26:37', '2021-08-14 00:26:37'),
(8, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-14 00:28:57', '2021-08-14 00:28:57'),
(9, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-14 00:29:20', '2021-08-14 00:29:20'),
(10, 1, 0, 772, 0, 772, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Quo cumque reprehend', 'Facere nihil qui nul', 'Ipsa minus qui accu', 'Ut exercitation eos', 'Consequatur aliquip', 'ordered', 0, '2021-08-14 00:30:18', '2021-08-14 00:30:18'),
(11, 1, 0, 1386, 0, 1386, 'Xyla Dalton', '32342', 'user@gmail.com', 'Reprehenderit nulla', 'Quidem quia voluptat', 'Dolore possimus vol', 'Repellendus Ut ipsa', 'Magnam ipsum ut dol', '32423', 'ordered', 0, '2021-08-15 22:35:31', '2021-08-15 22:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 8, 5, 693, 1, '2021-08-13 23:48:13', '2021-08-13 23:48:13'),
(2, 9, 5, 79, 1, '2021-08-13 23:48:13', '2021-08-13 23:48:13'),
(3, 8, 6, 693, 1, '2021-08-14 00:26:01', '2021-08-14 00:26:01'),
(4, 9, 6, 79, 1, '2021-08-14 00:26:01', '2021-08-14 00:26:01'),
(5, 8, 7, 693, 1, '2021-08-14 00:26:37', '2021-08-14 00:26:37'),
(6, 9, 7, 79, 1, '2021-08-14 00:26:37', '2021-08-14 00:26:37'),
(7, 8, 8, 693, 1, '2021-08-14 00:28:57', '2021-08-14 00:28:57'),
(8, 9, 8, 79, 1, '2021-08-14 00:28:57', '2021-08-14 00:28:57'),
(9, 8, 9, 693, 1, '2021-08-14 00:29:20', '2021-08-14 00:29:20'),
(10, 9, 9, 79, 1, '2021-08-14 00:29:20', '2021-08-14 00:29:20'),
(11, 8, 10, 693, 1, '2021-08-14 00:30:18', '2021-08-14 00:30:18'),
(12, 9, 10, 79, 1, '2021-08-14 00:30:18', '2021-08-14 00:30:18'),
(13, 8, 11, 693, 2, '2021-08-15 22:35:31', '2021-08-15 22:35:31');

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` int(11) NOT NULL,
  `sale_price` int(11) DEFAULT NULL,
  `stock_status` enum('instock','outofstock') COLLATE utf8mb4_unicode_ci NOT NULL,
  `featured` tinyint(1) NOT NULL DEFAULT 0,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `short_description`, `description`, `regular_price`, `sale_price`, `stock_status`, `featured`, `image`, `images`, `cat_id`, `created_at`, `updated_at`) VALUES
(7, 'Rebekah Cummings', 'rebekah-cummings', 'Et sit est laudant', 'Est officia esse od', 605, 10, 'instock', 0, '1628244374.jpg', ',16282443740.jpg,16282443741.jpg', 6, '2021-08-06 04:06:14', '2021-08-06 04:06:14'),
(8, 'Iris Gill', 'iris-gill', 'Non voluptatem autem', 'In ut qui impedit l', 127, 693, 'outofstock', 0, '1628244381.jpg', ',16282443810.jpg,16282443811.jpg', 6, '2021-08-06 04:06:21', '2021-08-06 04:06:21'),
(9, 'Kelly Lowe', 'kelly-lowe', 'Ex consequatur nisi ', 'Nihil et dolore cons', 757, 79, 'outofstock', 1, '1628244385.jpg', ',16282443850.jpg,16282443851.jpg', 6, '2021-08-06 04:06:25', '2021-08-06 04:06:25'),
(10, 'Paul Harper', 'paul-harper', 'Odit beatae qui cons', 'Consectetur qui rep', 716, 698, 'instock', 0, '1628244391.jpg', ',16282443910.jpg,16282443911.jpg', 23, '2021-08-06 04:06:31', '2021-08-06 04:06:31'),
(11, 'Pamela Cook', 'pamela-cook', 'Laboris consequatur', 'Voluptatem accusanti', 783, 62, 'instock', 1, '1628244396.jpg', ',16282443960.jpg,16282443961.jpg', 9, '2021-08-06 04:06:36', '2021-08-06 04:06:36'),
(12, 'Teegan Morrison', 'teegan-morrison', 'Temporibus minim ut ', 'Adipisicing providen', 511, 137, 'outofstock', 0, '1628244400.jpg', ',16282444000.jpg,16282444001.jpg', 6, '2021-08-06 04:06:40', '2021-08-06 04:06:40'),
(13, 'Cody Gallagher', 'cody-gallagher', 'Velit architecto par', 'Non atque eveniet v', 892, 817, 'instock', 0, '1628244407.jpg', ',16282444070.jpg,16282444071.jpg', 6, '2021-08-06 04:06:47', '2021-08-06 04:06:47'),
(14, 'Colt Holder', 'colt-holder', 'Ea est velit totam ', 'Laborum voluptas qua', 659, 485, 'instock', 1, '1628244411.jpg', ',16282444110.jpg,16282444111.jpg', 6, '2021-08-06 04:06:51', '2021-08-06 04:06:51'),
(15, 's', 'test', 'Accusamus quo odio v', 'Delectus adipisicin', 580, 885, 'outofstock', 1, '1628511288.jpg', ',16284824580.png,16284824581.jpg,16284824582.png', 12, '2021-08-08 22:14:18', '2021-08-09 06:14:48');

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `image`, `alt`, `created_at`, `updated_at`) VALUES
(1, '1628480221.png', 'Diagnostic', '2021-08-08 20:38:24', '2021-08-08 21:37:01'),
(2, '1628476761.jpg', 'Assumenda id eum ess', '2021-08-08 20:39:21', '2021-08-08 20:39:21'),
(4, '1628511616.jpg', 'fsadfd', '2021-08-09 06:20:16', '2021-08-09 06:20:16');

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

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4kLaoeFiQxXX77ibH69XYDepiEI6Jewk3ANHpsdV', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoic3JFUG55cXo0UDg2WjhtUEF0bnJLd0ZoUVZzMXRaWkoxaDZRV2Y1MyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoxOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6IjE4ZDY5MzQ0ODNiOTk0ZmI5OTQzYjQzYjdkNzY0NmJmIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiMThkNjkzNDQ4M2I5OTRmYjk5NDNiNDNiN2Q3NjQ2YmYiO3M6MjoiaWQiO2k6ODtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo5OiJJcmlzIEdpbGwiO3M6NToicHJpY2UiO2Q6NjkzO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjA6e319czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aTowO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fX19fXM6ODoiY2hlY2tvdXQiO2E6Mzp7czo4OiJkaXNjb3VudCI7aTowO3M6ODoic3VidG90YWwiO3M6MzoiNjkzIjtzOjU6InRvdGFsIjtzOjM6IjY5MyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR0R1daalVSZVJUbWpJcjdmcHFIZHB1SHcuWjFpM29nS2JxVEcxWEZmWmxFWklUc3BUUXF4bSI7fQ==', 1629309080),
('51HE6FvzRgQ0O5DPNZpJmsHApI85zsoov20WQEZ8', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiSUpLZld1alRBTGZ0QTVjQUxlb1p2Z1NmTElMQ0pEalVIRmFGdWpMeSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR0R1daalVSZVJUbWpJcjdmcHFIZHB1SHcuWjFpM29nS2JxVEcxWEZmWmxFWklUc3BUUXF4bSI7czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjE6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiMThkNjkzNDQ4M2I5OTRmYjk5NDNiNDNiN2Q3NjQ2YmYiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjo5OntzOjU6InJvd0lkIjtzOjMyOiIxOGQ2OTM0NDgzYjk5NGZiOTk0M2I0M2I3ZDc2NDZiZiI7czoyOiJpZCI7aTo4O3M6MzoicXR5IjtpOjE7czo0OiJuYW1lIjtzOjk6IklyaXMgR2lsbCI7czo1OiJwcmljZSI7ZDo2OTM7czo3OiJvcHRpb25zIjtPOjM5OiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbU9wdGlvbnMiOjE6e3M6ODoiACoAaXRlbXMiO2E6MDp7fX1zOjQ5OiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AYXNzb2NpYXRlZE1vZGVsIjtzOjE4OiJBcHBcTW9kZWxzXFByb2R1Y3QiO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQB0YXhSYXRlIjtpOjA7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDt9fX19czo4OiJjaGVja291dCI7YTozOntzOjg6ImRpc2NvdW50IjtpOjA7czo4OiJzdWJ0b3RhbCI7czozOiI2OTMiO3M6NToidG90YWwiO3M6MzoiNjkzIjt9fQ==', 1629343324),
('8ugNglWFBcxIKaijaxChSBCYUCmZqw84GVlpqbyu', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoiNHZFbDl5VE9wbjh4dmZGRXNpRWtYQVlwcjM2TWFIZ01WSFhxVEZjSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NDoiY2FydCI7YToxOntzOjc6ImRlZmF1bHQiO086Mjk6IklsbHVtaW5hdGVcU3VwcG9ydFxDb2xsZWN0aW9uIjoxOntzOjg6IgAqAGl0ZW1zIjthOjE6e3M6MzI6IjE4ZDY5MzQ0ODNiOTk0ZmI5OTQzYjQzYjdkNzY0NmJmIjtPOjMyOiJHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbSI6OTp7czo1OiJyb3dJZCI7czozMjoiMThkNjkzNDQ4M2I5OTRmYjk5NDNiNDNiN2Q3NjQ2YmYiO3M6MjoiaWQiO2k6ODtzOjM6InF0eSI7aToxO3M6NDoibmFtZSI7czo5OiJJcmlzIEdpbGwiO3M6NToicHJpY2UiO2Q6NjkzO3M6Nzoib3B0aW9ucyI7TzozOToiR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW1PcHRpb25zIjoxOntzOjg6IgAqAGl0ZW1zIjthOjA6e319czo0OToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGFzc29jaWF0ZWRNb2RlbCI7czoxODoiQXBwXE1vZGVsc1xQcm9kdWN0IjtzOjQxOiIAR2xvdWRlbWFuc1xTaG9wcGluZ2NhcnRcQ2FydEl0ZW0AdGF4UmF0ZSI7aTowO3M6NDE6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBpc1NhdmVkIjtiOjA7fX19fXM6ODoiY2hlY2tvdXQiO2E6Mzp7czo4OiJkaXNjb3VudCI7aTowO3M6ODoic3VidG90YWwiO3M6MzoiNjkzIjtzOjU6InRvdGFsIjtzOjM6IjY5MyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCR0R1daalVSZVJUbWpJcjdmcHFIZHB1SHcuWjFpM29nS2JxVEcxWEZmWmxFWklUc3BUUXF4bSI7fQ==', 1629261947),
('9RKirROddAnEhVSq1BZXb5OMdCZCEPJ2DJnam7Db', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSXBUdUQwd1Z6dlpINnFyM0dyTEVidm52bkF2Ynp1cnhncEJnZ0N5ciI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jaGVja291dCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629342782),
('kSt9mAgqkwz2poJ76sUYOZkIhwKXFdQQakdXNFvd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2pyd1J1R0pDN25ObFprM0hTMm5tdUlJMTVVcXRjQ0dpZ1Jmd0FoayI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fX0=', 1629102208),
('LkiA3uWI9nWL8AfNMuf0XK3leUOGeMIDqOsUALHN', NULL, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiam8zNG9BTEhGSWc1Y0J0VzRFaWZSQWdjTzRHcE15ak9lZVNEbXhUaiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly9sb2NhbGhvc3QveGVtYXJ0L3B1YmxpYy9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629378573),
('Q8mHpM3iqhrfCgmkSlcyiYmX9mtkPfVYPOn0jnxA', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.131 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoib0ZnSWdtQUIxd1luSmE0UUxMbnJPSEQ4S3E0c0V1ak1qNW5QOFpnMCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9sb2dpbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1629089074),
('rYKjDWYXhpZofscFsO7XGZ9Bu5K4rN2tUbPQXmRd', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ3paYzBJb21CMlpCcEtiRzBodUYxWkw3VHRYeWpFOWxwZkt3YTJpWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1629380421);

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `village` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `order_id`, `name`, `mobile`, `email`, `address`, `village`, `district`, `country`, `zipcode`, `created_at`, `updated_at`) VALUES
(1, 8, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Facere nihil qui nul', 'Quo cumque reprehend', 'Ipsa minus qui accu', 'Consequatur aliquip', '2021-08-14 00:28:57', '2021-08-14 00:28:57'),
(2, 9, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Facere nihil qui nul', 'Quo cumque reprehend', 'Ipsa minus qui accu', 'Consequatur aliquip', '2021-08-14 00:29:20', '2021-08-14 00:29:20'),
(3, 10, 'Jerry Kim', '3454', 'user@gmail.com', 'Iure dolores mollit ', 'Facere nihil qui nul', 'Quo cumque reprehend', 'Ipsa minus qui accu', 'Consequatur aliquip', '2021-08-14 00:30:18', '2021-08-14 00:30:18'),
(4, 11, 'Xyla Dalton', '32342', 'user@gmail.com', 'Reprehenderit nulla', 'Dolore possimus vol', 'Quidem quia voluptat', 'Repellendus Ut ipsa', '32423', '2021-08-15 22:35:31', '2021-08-15 22:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `title`, `description`, `keywords`, `favicon`, `logo`, `phone`, `email`, `address`, `facebook`, `twitter`, `linkedin`, `instagram`, `created_at`, `updated_at`) VALUES
(3, 'Leather Shop BD', 'In publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available', 'Leather shoe, Leather belt, leather watch', 'favicon.png', 'logo.png', '01706668403', 'mail.alam.bd@gmail.com', '23now Word , Gazipur City Corporation', 'http://facebook.com/', 'http://twitter.com', 'http://linkedin.com', 'http://instagram.com', '2021-08-07 22:48:39', '2021-08-07 23:04:22');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `offers` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `category`, `name`, `offers`, `image`, `created_at`, `updated_at`) VALUES
(3, 'Lisandra Hurst', 'Ainsley Cardenas', 'Amet velit ut quia ', '1628415158.png', '2021-08-08 03:32:38', '2021-08-08 03:32:38'),
(4, 'Alan Schwartz', 'Fay Kelly', 'Quas adipisci fugiat', '1628415246.png', '2021-08-08 03:34:06', '2021-08-08 03:34:06'),
(6, 'Craig Parrish', 'Cleo Russo', 'Cillum sed incidunt', '1628418931.png', '2021-08-08 04:35:31', '2021-08-08 04:35:31');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `mode` enum('cod','card','paypal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('pending','approved','declimed','refered') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `order_id`, `mode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 9, 'cod', 'pending', '2021-08-14 00:29:20', '2021-08-14 00:29:20'),
(2, 1, 10, 'cod', 'pending', '2021-08-14 00:30:18', '2021-08-14 00:30:18'),
(3, 1, 11, 'cod', 'pending', '2021-08-15 22:35:31', '2021-08-15 22:35:31');

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
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `utype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USR' COMMENT 'AMD for Admin USR for User',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `current_team_id`, `profile_photo_path`, `utype`, `created_at`, `updated_at`) VALUES
(1, 'User', 'user@gmail.com', NULL, '$2y$10$tGWZjUReRTmjIr7fpqHdpuHw.Z1i3ogKbqTG1XFfZlEZITspTQqxm', NULL, NULL, NULL, 'USR', '2021-08-03 03:17:54', '2021-08-03 03:17:54'),
(2, 'Admin', 'admin@gmail.com', NULL, '$2y$10$LAr6qMz2.k.khbGjgo4GxuGCCOJ/eL7nnJJb9gXA2HS8gQv3SClP6', NULL, NULL, NULL, 'AMD', '2021-08-03 03:42:15', '2021-08-03 03:42:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

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
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_name_unique` (`name`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shippings_order_id_foreign` (`order_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `shippings`
--
ALTER TABLE `shippings`
  ADD CONSTRAINT `shippings_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
