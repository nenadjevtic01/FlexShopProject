-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 12:19 AM
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
-- Table structure for table `products_sizes`
--

CREATE TABLE `products_sizes` (
  `product_size_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `size_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_sizes`
--

INSERT INTO `products_sizes` (`product_size_id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, NULL, NULL),
(2, 1, 5, NULL, NULL),
(3, 4, 1, NULL, NULL),
(4, 4, 3, NULL, NULL),
(5, 4, 4, NULL, NULL),
(6, 4, 5, NULL, NULL),
(7, 5, 1, NULL, NULL),
(8, 5, 3, NULL, NULL),
(9, 5, 4, NULL, NULL),
(10, 5, 5, NULL, NULL),
(11, 6, 2, NULL, NULL),
(12, 6, 3, NULL, NULL),
(13, 6, 5, NULL, NULL),
(14, 8, 1, NULL, NULL),
(15, 8, 3, NULL, NULL),
(16, 8, 5, NULL, NULL),
(17, 9, 2, NULL, NULL),
(18, 9, 4, NULL, NULL),
(19, 10, 2, NULL, NULL),
(20, 10, 3, NULL, NULL),
(21, 10, 4, NULL, NULL),
(22, 10, 5, NULL, NULL),
(23, 11, 2, NULL, NULL),
(24, 11, 3, NULL, NULL),
(25, 11, 4, NULL, NULL),
(26, 12, 2, NULL, NULL),
(27, 12, 3, NULL, NULL),
(28, 14, 2, NULL, NULL),
(29, 14, 3, NULL, NULL),
(30, 14, 5, NULL, NULL),
(31, 15, 2, NULL, NULL),
(32, 15, 3, NULL, NULL),
(33, 15, 5, NULL, NULL),
(34, 16, 2, NULL, NULL),
(35, 17, 2, NULL, NULL),
(36, 17, 4, NULL, NULL),
(37, 18, 2, NULL, NULL),
(38, 18, 3, NULL, NULL),
(39, 18, 4, NULL, NULL),
(40, 19, 1, NULL, NULL),
(41, 19, 3, NULL, NULL),
(42, 19, 4, NULL, NULL),
(43, 20, 1, NULL, NULL),
(44, 20, 3, NULL, NULL),
(45, 21, 1, NULL, NULL),
(46, 21, 2, NULL, NULL),
(47, 21, 3, NULL, NULL),
(48, 21, 4, NULL, NULL),
(49, 23, 2, NULL, NULL),
(50, 23, 3, NULL, NULL),
(51, 23, 4, NULL, NULL),
(52, 24, 3, NULL, NULL),
(53, 24, 4, NULL, NULL),
(54, 25, 2, NULL, NULL),
(55, 25, 3, NULL, NULL),
(56, 26, 1, NULL, NULL),
(57, 26, 3, NULL, NULL),
(58, 27, 3, NULL, NULL),
(59, 27, 4, NULL, NULL),
(60, 27, 5, NULL, NULL),
(61, 28, 2, NULL, NULL),
(62, 28, 4, NULL, NULL),
(63, 28, 5, NULL, NULL),
(64, 29, 4, NULL, NULL),
(65, 29, 5, NULL, NULL),
(66, 31, 2, NULL, NULL),
(67, 31, 3, NULL, NULL),
(68, 31, 4, NULL, NULL),
(69, 32, 1, NULL, NULL),
(79, 32, 3, NULL, NULL),
(80, 33, 1, NULL, NULL),
(81, 33, 3, NULL, NULL),
(82, 34, 1, NULL, NULL),
(83, 34, 2, NULL, NULL),
(84, 34, 3, NULL, NULL),
(85, 34, 5, NULL, NULL),
(86, 35, 2, NULL, NULL),
(87, 35, 3, NULL, NULL),
(88, 35, 5, NULL, NULL),
(89, 36, 3, NULL, NULL),
(90, 36, 5, NULL, NULL),
(91, 37, 3, NULL, NULL),
(92, 37, 4, NULL, NULL),
(93, 37, 5, NULL, NULL),
(94, 39, 1, NULL, NULL),
(95, 39, 2, NULL, NULL),
(96, 39, 3, NULL, NULL),
(97, 40, 1, NULL, NULL),
(98, 40, 2, NULL, NULL),
(99, 40, 3, NULL, NULL),
(100, 40, 4, NULL, NULL),
(101, 41, 1, NULL, NULL),
(102, 41, 2, NULL, NULL),
(103, 41, 3, NULL, NULL),
(104, 41, 4, NULL, NULL),
(105, 42, 1, NULL, NULL),
(106, 42, 2, NULL, NULL),
(107, 42, 4, NULL, NULL),
(108, 43, 1, NULL, NULL),
(109, 43, 2, NULL, NULL),
(110, 43, 5, NULL, NULL),
(111, 44, 1, NULL, NULL),
(112, 44, 2, NULL, NULL),
(113, 44, 3, NULL, NULL),
(114, 44, 5, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products_sizes`
--
ALTER TABLE `products_sizes`
  ADD PRIMARY KEY (`product_size_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products_sizes`
--
ALTER TABLE `products_sizes`
  MODIFY `product_size_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
