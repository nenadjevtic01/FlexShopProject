-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2022 at 11:53 PM
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
-- Database: `sajtbazapraktikumphp`
--

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `gender_id` int(11) NOT NULL,
  `sale` tinyint(1) NOT NULL,
  `newPrice` decimal(6,2) NOT NULL,
  `oldPrice` decimal(6,2) DEFAULT NULL,
  `inStock` tinyint(1) NOT NULL,
  `availableSizes` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `material` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `coo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `products_sizes` (`product_size_id`, `product_id`, `size_id`) VALUES
(1,1,3),
(2,1,5),
(3,4,1),
(4,4,3),
(5,4,4),
(6,4,5),
(7,5,1),
(8,5,3),
(9,5,4),
(10,5,5),
(11,6,2),
(12,6,3),
(13,6,5),
(14,8,1),
(15,8,3),
(16,8,5),
(17,9,2),
(18,9,4),
(19,10,2),
(20,10,3),
(21,10,4),
(22,10,5),
(23,11,2),
(24,11,3),
(25,11,4),
(26,12,2),
(27,12,3),
(28,14,2),
(29,14,3),
(30,14,5),
(31,15,2),
(32,15,3),
(33,15,5),
(34,16,2),
(35,17,2),
(36,17,4),
(37,18,2),
(38,18,3),
(39,18,4),
(40,19,1),
(41,19,3),
(42,19,4),
(43,20,1),
(44,20,3),
(45,21,1),
(46,21,2),
(47,21,3),
(48,21,4),
(49,23,2),
(50,23,3),
(51,23,4),
(52,24,3)
(53,24,4),
(54,25,2),
(55,25,3),
(56,26,1),
(57,26,3),
(58,27,3),
(59,27,4),
(60,27,5),
(61,28,2),
(62,28,4),
(63,28,5),
(64,29,4),
(65,29,5),
(66,31,2),
(67,31,3),
(68,31,4),
(69,32,1),
(79,32,3),
(80,33,1),
(81,33,3),
(82,34,1),
(83,34,2),
(84,34,3),
(85,34,5),
(86,35,2),
(87,35,3),
(88,35,5),
(89,36,3),
(90,36,5),
(91,37,3),
(92,37,4),
(93,37,5),
(94,39,1),
(95,39,2),
(96,39,3),
(97,40,1),
(98,40,2),
(99,40,3),
(100,40,4),
(101,41,1),
(102,41,2),
(103,41,3),
(104,41,4),
(105,42,1),
(106,42,2),
(107,42,4),
(108,43,1),
(109,43,2),
(110,43,5),
(111,44,1),
(112,44,2),
(113,44,3),
(114,44,5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `gender_id` (`gender_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`gender_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
