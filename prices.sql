-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 11:50 PM
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
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `price_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `oldPrice` decimal(8,2) DEFAULT NULL,
  `newPrice` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`price_id`, `product_id`, `oldPrice`, `newPrice`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '12.00', NULL, NULL),
(2, 2, '10.00', '7.00', NULL, NULL),
(3, 3, NULL, '7.00', NULL, NULL),
(4, 4, '15.00', '10.00', NULL, NULL),
(5, 5, NULL, '15.00', NULL, NULL),
(6, 6, '15.00', '12.00', NULL, NULL),
(7, 7, NULL, '9.00', NULL, NULL),
(8, 8, NULL, '15.00', NULL, NULL),
(9, 9, NULL, '20.00', NULL, NULL),
(10, 10, '25.00', '20.00', NULL, NULL),
(11, 11, '20.00', '18.00', NULL, NULL),
(12, 12, NULL, '30.00', NULL, NULL),
(13, 13, '35.00', '30.00', NULL, NULL),
(14, 14, '40.00', '30.00', NULL, NULL),
(15, 15, NULL, '28.00', NULL, NULL),
(16, 16, '25.00', '23.00', NULL, NULL),
(17, 17, NULL, '10.00', NULL, NULL),
(18, 18, NULL, '12.00', NULL, NULL),
(19, 19, '25.00', '12.00', NULL, NULL),
(20, 20, NULL, '15.00', NULL, NULL),
(21, 21, '15.00', '9.00', NULL, NULL),
(22, 22, NULL, '10.00', NULL, NULL),
(23, 23, NULL, '20.00', NULL, NULL),
(24, 24, '20.00', '18.00', NULL, NULL),
(25, 25, NULL, '25.00', NULL, NULL),
(26, 26, NULL, '15.00', NULL, NULL),
(27, 27, NULL, '20.00', NULL, NULL),
(28, 28, NULL, '22.00', NULL, NULL),
(29, 29, NULL, '28.00', NULL, NULL),
(30, 30, NULL, '28.00', NULL, NULL),
(31, 31, NULL, '50.00', NULL, NULL),
(32, 32, NULL, '35.00', NULL, NULL),
(33, 33, '60.00', '45.00', NULL, NULL),
(34, 34, NULL, '55.00', NULL, NULL),
(35, 35, NULL, '45.00', NULL, NULL),
(36, 36, '55.00', '40.00', NULL, NULL),
(37, 37, NULL, '70.00', NULL, NULL),
(38, 38, NULL, '35.00', NULL, NULL),
(39, 39, NULL, '10.00', NULL, NULL),
(40, 40, '10.00', '8.00', NULL, NULL),
(41, 41, NULL, '8.00', NULL, NULL),
(42, 42, NULL, '15.00', NULL, NULL),
(43, 43, '13.00', '10.00', NULL, NULL),
(44, 44, NULL, '9.00', NULL, NULL),
(45, 45, '25.00', '20.00', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`price_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `price_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
