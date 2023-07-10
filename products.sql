-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 11:47 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravelbaza`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `gender_id` bigint(20) UNSIGNED NOT NULL,
  `sale` tinyint(1) NOT NULL,
  `inStock` tinyint(1) NOT NULL,
  `material` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `category_id`, `brand_id`, `gender_id`, `sale`, `inStock`, `material`, `coo`, `created_at`, `updated_at`) VALUES
(1, 'Oversize sweatshirt', 3, 1, 2, 0, 1, 'Cotton', 'Germany', NULL, NULL),
(2, 'Hoodie', 3, 1, 2, 1, 1, 'Cotton', 'Germany', NULL, NULL),
(3, 'Sweatshirt with shoulder detail', 3, 2, 2, 0, 0, 'Cotton', 'Italy', NULL, NULL),
(4, 'Oversize sweatshirt', 3, 2, 2, 0, 1, 'Cotton', 'Italy', NULL, NULL),
(5, 'Hoodie', 3, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(6, 'Hoodie', 3, 3, 1, 1, 1, 'Cotton', 'UK', NULL, NULL),
(7, 'Hoodie', 3, 3, 1, 0, 0, 'Cotton', 'UK', NULL, NULL),
(8, 'Hoodie', 3, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(9, 'Wrapped midi dress', 5, 1, 2, 0, 1, 'Cotton', 'Germany', NULL, NULL),
(10, 'Swinging mini dress', 5, 2, 2, 0, 1, 'Cotton', 'Italy', NULL, NULL),
(11, 'Knit mini dress', 5, 1, 2, 1, 1, 'Cotton', 'Germany', NULL, NULL),
(12, 'Mini party dress', 5, 2, 2, 0, 1, 'Cotton', 'Italy', NULL, NULL),
(13, 'Women mini skirt', 6, 2, 2, 0, 0, 'Cotton', 'Italy', NULL, NULL),
(14, 'Skater skirt', 6, 2, 2, 1, 1, 'Cotton', 'Italy', NULL, NULL),
(15, 'Women mini skirt', 6, 1, 2, 0, 1, 'Cotton', 'Germany', NULL, NULL),
(16, 'Women mini skirt', 6, 1, 2, 0, 1, 'Cotton ', 'Germany', NULL, NULL),
(17, 'Sweatshorts', 7, 4, 1, 1, 1, 'Cotton', 'Poland', NULL, NULL),
(18, 'Sweatshorts', 7, 4, 1, 0, 1, 'Cotton', 'Poland', NULL, NULL),
(19, 'Basketball shorts', 7, 4, 1, 1, 1, 'Cotton', 'Poland', NULL, NULL),
(20, 'Shorts', 7, 1, 2, 0, 1, 'Cotton', 'Germany', NULL, NULL),
(21, 'Highwaist Shorts', 7, 1, 2, 1, 1, 'Cotton', 'Germany', NULL, NULL),
(22, 'Shorts', 7, 1, 2, 0, 0, 'Cotton', 'Germany', NULL, NULL),
(23, 'Mom Fit Jeans', 2, 2, 2, 0, 1, 'Cotton', 'Italy', NULL, NULL),
(24, 'Mom Fit Jeans', 2, 1, 2, 1, 1, 'Cotton', 'Germany', NULL, NULL),
(25, 'Mom Fit Jeans', 2, 1, 2, 1, 1, 'Cotton', 'Germany', NULL, NULL),
(26, 'Mom Fit Jeans', 2, 2, 2, 0, 1, 'Cotton', 'Italy', NULL, NULL),
(27, 'Stone Washed Relaxed Denim', 2, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(28, 'Tapered Denim mit destroys', 2, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(29, 'Washed Slim Fit Denim', 2, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(30, 'Basic Slim Fit Denim', 2, 3, 1, 0, 0, 'Cotton', 'UK', NULL, NULL),
(31, 'Jacket with applications', 4, 1, 2, 0, 1, 'Cotton', 'Germany', NULL, NULL),
(32, 'Bomber jacket', 4, 2, 2, 1, 1, 'Cotton', 'Italy', NULL, NULL),
(33, 'Coat with hood', 4, 1, 2, 0, 1, 'Cotton', 'Germany', NULL, NULL),
(34, 'Quilted jacket with hood', 4, 4, 2, 0, 1, 'Cotton', 'Italy', NULL, NULL),
(35, 'Jacket with material mix', 4, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(36, 'Jacket with stand-up collar', 4, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(37, 'Parka', 4, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(38, 'Jacket with hood', 4, 3, 1, 0, 0, 'Cotton', 'UK', NULL, NULL),
(39, 'T-Shirt with print', 1, 2, 2, 0, 1, 'Cotton', 'Italy', NULL, NULL),
(40, 'T-Shirt with print', 1, 2, 2, 1, 1, 'Cotton', 'Italy', NULL, NULL),
(41, 'T-Shirt with print', 1, 1, 2, 0, 1, 'Cotton', 'Germany', NULL, NULL),
(42, 'T-shirt with round neck', 1, 4, 1, 0, 1, 'Cotton', 'Poland', NULL, NULL),
(43, 'T-shirt with layering', 1, 4, 1, 0, 1, 'Cotton', 'Poland', NULL, NULL),
(44, 'T-shirt with round neck', 1, 3, 1, 0, 1, 'Cotton', 'UK', NULL, NULL),
(45, 'T-shirt with round neck', 1, 3, 1, 0, 0, 'Cotton', 'Germany', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
