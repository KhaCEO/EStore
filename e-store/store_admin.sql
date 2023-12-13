-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 24, 2023 at 03:35 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_img` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_img`, `date`) VALUES
(2, 'Samsung', '1689688624.jpg', '2023-07-18 14:08:14'),
(3, 'Nike', '1689689437.webp', '2023-07-18 14:10:37');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cus_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_qty` int(255) NOT NULL,
  `product_color` varchar(20) DEFAULT NULL,
  `product_size` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `cus_id`, `product_id`, `product_qty`, `product_color`, `product_size`, `date`) VALUES
(6, 3, 50, 1, NULL, NULL, '2023-08-06 09:16:15'),
(7, 3, 54, 1, NULL, NULL, '2023-08-06 09:24:42'),
(8, 3, 81, 1, 'Red', 'L', '2023-08-09 15:34:13');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_Name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_Name`, `date`) VALUES
(1, 'Electronic', '2023-07-09 07:11:01'),
(2, 'Grocery', '2023-07-09 07:11:01'),
(3, 'Beverage', '2023-07-09 16:03:55'),
(4, 'Baby & Mother', '2023-07-09 16:04:24'),
(5, 'Cosmetic', '2023-07-15 10:51:00');

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) DEFAULT NULL,
  `products_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`id`, `color_name`, `products_id`, `date`) VALUES
(1, 'Red', 50, '2023-07-26 17:05:08'),
(2, 'Blue', 50, '2023-07-26 17:05:08'),
(3, 'Blue', 51, '2023-07-28 15:53:19'),
(4, 'Yellow', 51, '2023-07-28 15:53:19'),
(5, 'Green', 51, '2023-07-28 15:53:19'),
(6, 'Red', 52, '2023-07-28 15:59:01'),
(7, 'Black', 52, '2023-07-28 15:59:01'),
(8, 'Black', 53, '2023-07-28 16:01:54'),
(9, 'White', 53, '2023-07-28 16:01:54'),
(10, 'Red', 55, '2023-07-28 16:03:59'),
(11, 'Light', 55, '2023-07-28 16:03:59'),
(12, 'White', 56, '2023-07-28 16:07:18'),
(13, 'Brown', 56, '2023-07-28 16:07:18'),
(14, 'Black', 57, '2023-07-28 16:10:02'),
(15, 'White', 57, '2023-07-28 16:10:02'),
(16, 'Black', 58, '2023-07-28 16:14:24'),
(17, 'White', 58, '2023-07-28 16:14:24'),
(18, 'Black', 59, '2023-07-28 16:14:56'),
(19, 'White', 59, '2023-07-28 16:14:56'),
(20, 'Red', 60, '2023-07-28 16:15:24'),
(21, 'Blue', 60, '2023-07-28 16:15:24'),
(22, 'Red', 61, '2023-07-28 16:16:33'),
(23, 'Blue', 61, '2023-07-28 16:16:33'),
(24, 'Red', 62, '2023-07-28 16:18:02'),
(25, 'Black', 62, '2023-07-28 16:18:02'),
(26, 'Black', 63, '2023-07-28 16:22:07'),
(27, 'White', 63, '2023-07-28 16:22:07'),
(28, 'Red', 64, '2023-07-28 16:24:13'),
(29, 'Balck', 64, '2023-07-28 16:24:13'),
(30, 'Red', 65, '2023-07-28 16:26:41'),
(31, 'White', 65, '2023-07-28 16:26:41'),
(32, 'Red', 66, '2023-07-28 16:27:33'),
(33, 'Red', 67, '2023-07-28 16:31:02'),
(34, 'Red', 69, '2023-07-28 16:42:43'),
(35, 'Red', 70, '2023-07-28 16:42:56'),
(36, 'Red', 71, '2023-07-28 16:43:40'),
(37, 'Red', 72, '2023-07-28 16:50:19'),
(38, 'Red', 73, '2023-07-28 16:51:33'),
(39, 'Red', 74, '2023-07-28 16:52:54'),
(40, 'Red', 75, '2023-07-28 16:54:59'),
(41, 'Red', 76, '2023-07-28 16:56:13'),
(42, 'Red', 77, '2023-07-28 17:10:07'),
(43, 'Red', 78, '2023-07-28 17:14:24'),
(44, 'Red', 79, '2023-07-28 17:17:27'),
(45, 'Red', 80, '2023-07-28 17:20:21'),
(46, 'Red', 81, '2023-07-28 17:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cus_name` varchar(255) NOT NULL,
  `cus_username` varchar(255) NOT NULL,
  `cus_pass` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `cus_name`, `cus_username`, `cus_pass`, `date`) VALUES
(1, 'Kha', 'khagg', '87965886d62e4580143ff8a3f1494262', '2023-07-29 17:04:48'),
(2, 'Kha Coding', 'Kha Coding', '50a986aafd41407f776b2ea0f9536734', '2023-07-29 17:16:38'),
(3, 'GG', 'gg', 'c3b2218fae1d1728164e1fbac8fa5cc9', '2023-08-06 09:01:41');

-- --------------------------------------------------------

--
-- Table structure for table `detailimg`
--

CREATE TABLE `detailimg` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `products_id` bigint(20) UNSIGNED NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detailimg`
--

INSERT INTO `detailimg` (`id`, `image`, `products_id`, `date`) VALUES
(1, '123.jpg', 50, '2023-07-27 14:28:18'),
(2, '1234.jpg', 50, '2023-07-27 14:28:18'),
(3, '1690559599.avif', 51, '2023-07-28 15:53:19'),
(4, '1690559599.avif', 51, '2023-07-28 15:53:19'),
(5, '1690559942.webp', 52, '2023-07-28 15:59:02'),
(6, '1690560114.webp', 53, '2023-07-28 16:01:54'),
(7, '1690560197.webp', 54, '2023-07-28 16:03:17'),
(8, '1690560197.avif', 54, '2023-07-28 16:03:17'),
(9, '1690560197.avif', 54, '2023-07-28 16:03:17'),
(10, '1690560239.webp', 55, '2023-07-28 16:03:59'),
(11, '1690560239.avif', 55, '2023-07-28 16:03:59'),
(12, '1690560239.avif', 55, '2023-07-28 16:03:59'),
(13, '1690560438.webp', 56, '2023-07-28 16:07:18'),
(14, '1690560438.jpg', 56, '2023-07-28 16:07:18'),
(15, '1690560602.webp', 57, '2023-07-28 16:10:02'),
(16, '1690560602.avif', 57, '2023-07-28 16:10:02'),
(17, '1690560602.jpg', 57, '2023-07-28 16:10:02'),
(18, '1690560864.webp', 58, '2023-07-28 16:14:24'),
(19, '1690560896.webp', 59, '2023-07-28 16:14:56'),
(20, '1690560896.avif', 59, '2023-07-28 16:14:56'),
(21, '1690560896.jpg', 59, '2023-07-28 16:14:56'),
(22, '1690560924.webp', 60, '2023-07-28 16:15:24'),
(23, '1690560925.jpg', 60, '2023-07-28 16:15:25'),
(24, '1690560993.webp', 61, '2023-07-28 16:16:33'),
(25, '1690560993.jpg', 61, '2023-07-28 16:16:33'),
(26, '1690561082.avif', 62, '2023-07-28 16:18:02'),
(27, '1690561082.avif', 62, '2023-07-28 16:18:02'),
(28, '1690561328.avif', 63, '2023-07-28 16:22:08'),
(29, '1690561328.avif', 63, '2023-07-28 16:22:08'),
(30, '1690561454.avif', 64, '2023-07-28 16:24:14'),
(31, '1690561454.avif', 64, '2023-07-28 16:24:14'),
(32, '1690561601.avif', 65, '2023-07-28 16:26:41'),
(33, '1690561601.avif', 65, '2023-07-28 16:26:41'),
(34, '1690561653.avif', 66, '2023-07-28 16:27:33'),
(35, '1690561653.avif', 66, '2023-07-28 16:27:33'),
(36, '1690561862.webp', 67, '2023-07-28 16:31:02'),
(37, '1690562544.webp', 68, '2023-07-28 16:42:24'),
(38, '1690562563.webp', 69, '2023-07-28 16:42:43'),
(39, '1690562576.', 70, '2023-07-28 16:42:56'),
(40, '0005877_100-cotton-tee-shirt_1024.webp', 71, '2023-07-28 16:43:40'),
(41, '1690563299.avif', 75, '2023-07-28 16:54:59'),
(42, '1690563299.avif', 75, '2023-07-28 16:54:59'),
(43, '1690563373.avif', 76, '2023-07-28 16:56:13'),
(44, '1690563373.avif', 76, '2023-07-28 16:56:13'),
(45, '1690564207.avif', 77, '2023-07-28 17:10:07'),
(46, '1690564207.avif', 77, '2023-07-28 17:10:07'),
(47, 'avif', 78, '2023-07-28 17:14:24'),
(48, 'avif', 78, '2023-07-28 17:14:24'),
(49, 'avif', 79, '2023-07-28 17:17:27'),
(50, 'avif', 79, '2023-07-28 17:17:27'),
(51, 'avif', 80, '2023-07-28 17:20:21'),
(52, 'avif', 80, '2023-07-28 17:20:21'),
(53, 'kha1.avif', 81, '2023-07-28 17:21:41'),
(54, 'kha2.avif', 81, '2023-07-28 17:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` int(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` varchar(255) NOT NULL,
  `total_price` varchar(20) NOT NULL,
  `status` int(20) DEFAULT 10,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `user_id`, `phone`, `address`, `total_price`, `status`, `created_at`, `update_at`) VALUES
(1, 5671, 1, '0979515836', 'United Kingdom, Tokyo, PP, Street 168, #10E0', '757', 25, '2023-08-21 12:17:46', '2023-08-21 12:46:28'),
(2, 6193, 1, '0979515836', 'United Kingdom, London, PP, Street 168, #10E0', '2', 0, '2023-08-21 11:59:51', '2023-08-20 12:47:24'),
(3, 1134, 1, '0979515836', 'United States, London, PP, Street 168, #10E0', '10', 20, '2023-08-21 12:00:22', '2023-08-21 12:24:45'),
(4, 3619, 1, '0979515836', 'United States, London, PP, Street 168, #10E0', '2200', 25, '2023-08-17 14:42:07', '2023-08-21 12:45:58');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `product_qty` int(10) DEFAULT NULL,
  `price` varchar(20) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `product_qty`, `price`, `date`) VALUES
(1, 1, 35, 2, '1', '2023-08-15 12:20:28'),
(2, 1, 50, 2, '105', '2023-08-15 12:20:28'),
(3, 1, 53, 3, '105', '2023-08-15 12:20:29'),
(4, 1, 57, 2, '105', '2023-08-15 12:20:29'),
(5, 1, 36, 2, '10', '2023-08-15 12:20:29'),
(6, 2, 35, 2, '1', '2023-08-17 13:56:40'),
(7, 3, 36, 1, '10', '2023-08-17 14:23:19'),
(8, 4, 37, 1, '2199', '2023-08-17 14:42:07'),
(9, 4, 35, 1, '1', '2023-08-17 14:42:08');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `product_Img` varchar(255) DEFAULT NULL,
  `productDetail` varchar(255) DEFAULT NULL,
  `category_ID` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `product_Price` varchar(20) NOT NULL,
  `product_Stock` int(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_Name`, `product_Img`, `productDetail`, `category_ID`, `brand_id`, `product_Price`, `product_Stock`, `date`) VALUES
(35, 'Cambodia Water 500ml', '1688918740.jpg', NULL, 3, 3, '1', 20, '2023-07-25 16:48:20'),
(36, 'Vital Premium Water', '1689417413.png', NULL, 2, 2, '10', 10, '2023-07-25 15:25:49'),
(37, 'iPhone 14 Pro Max 512GB', '1689418143.webp', NULL, 1, 3, '2199', 10, '2023-07-23 14:18:27'),
(50, 'iPhone 21 ProMax', '1690391108.jpg', 'Discover the innovative world of Apple and shop everything iPhone, iPad, Apple Watch, Mac, and Apple TV, plus explore accessories, entertainment', 1, NULL, '105', 10, '2023-07-27 14:31:53'),
(51, 'Men Shirt ', '1690559599.webp', 'Men Shirt for every one', 4, 2, '12', 999, '2023-07-28 15:53:19'),
(52, 'Shirt Baby Men', '1690559941.avif', 'Shirt Baby Men', 1, 3, '2000', 5000, '2023-07-28 15:59:01'),
(53, 'Clothes Baby', '1690560114.avif', 'Clothes Baby', 2, 3, '105', 10, '2023-07-28 16:01:54'),
(54, 'Clothes Baby', '1690560196.avif', 'Clothes Baby', 2, 3, '105', 10, '2023-07-28 16:03:16'),
(55, 'Clothes Baby', '1690560239.webp', 'Clothes Baby', 2, 3, '105', 10, '2023-07-28 16:03:59'),
(56, 'Vaselin Men', '1690560438.webp', 'Vaselin Men', 2, 2, '10', 20, '2023-07-28 16:07:18'),
(57, 'iPhone 20 ProMax', '1690560602.avif', 'iPhone 20 ProMax', 1, 2, '105', 200, '2023-07-28 16:10:02'),
(58, 'iPhone 20 ProMax', '1690560864.avif', 'iPhone 20 ProMax', 1, 2, '105', 200, '2023-07-28 16:14:24'),
(59, 'iPhone 20 ProMax', '1690560896.avif', 'iPhone 20 ProMax', 1, 2, '105', 200, '2023-07-28 16:14:56'),
(60, 'iPhone 20 ProMax', '1690560924.avif', 'iPhone 20 ProMax', 3, 3, '105', 200, '2023-07-28 16:15:24'),
(61, 'iPhone 20 ProMax', '1690560993.avif', 'iPhone 20 ProMax', 3, 3, '105', 200, '2023-07-28 16:16:33'),
(62, 'iPhone 20 ProMax', '1690561082.jpg', 'iPhone 20 ProMax', 3, 3, '2000', 50, '2023-07-28 16:18:02'),
(63, 'iPhone 1 ProMax', '1690561327.webp', 'iPhone 1 ProMax', 2, 3, '105', 50, '2023-07-28 16:22:07'),
(64, 'Vaselin Men', '1690561453.webp', 'Vaselin Men', 4, 2, '10', 20, '2023-07-28 16:24:13'),
(65, 'Vital Premium Water', '1690561601.jpg', 'Vital Premium Water', 2, 2, '105', 20, '2023-07-28 16:26:41'),
(66, 'iPhone 20 ProMax', '1690561653.webp', 'iPhone 20 ProMax', 3, 3, '105', 20, '2023-07-28 16:27:33'),
(67, 'Vaselin Men', '1690561862.webp', 'img', 1, 3, '10', 20, '2023-07-28 16:31:02'),
(68, 'Vaselin Men', '1690562544.jpg', 'Vaselin Men', 1, 3, '10', 20, '2023-07-28 16:42:24'),
(69, 'Vaselin Men', '1690562563.jpg', 'Vaselin Men', 1, 3, '10', 20, '2023-07-28 16:42:43'),
(70, 'Vaselin Men', '1690562576.jpg', 'Vaselin Men', 1, 3, '10', 20, '2023-07-28 16:42:56'),
(71, 'Vaselin Men', '1690562620.jpg', 'Vaselin Men', 1, 3, '10', 20, '2023-07-28 16:43:40'),
(72, 'Vaselin Men', '1690563019.jpg', 'Vaselin Men', 1, 3, '10', 20, '2023-07-28 16:50:19'),
(73, 'Vital Premium Water', '1690563093.webp', 'Vital Premium Water', 2, 2, '105', 50, '2023-07-28 16:51:33'),
(74, 'iPhone 20 ProMax', '1690563174.webp', 'iPhone 20 ProMax', 1, 2, '2000', 20, '2023-07-28 16:52:54'),
(75, 'Vaselin Men', '1690563299.webp', 'Vaselin Men', 2, 3, '2000', 50, '2023-07-28 16:54:59'),
(76, 'iPhone 20 ProMax', '1690563373.webp', 'iPhone 20 ProMax', 2, 2, '2000', 50, '2023-07-28 16:56:13'),
(77, 'iPhone 20 ProMax', '1690564207.webp', 'iPhone 20 ProMax', 3, 2, '2000', 200, '2023-07-28 17:10:07'),
(78, 'Clothes Baby', '1690564464.jpg', 'Clothes Baby', 5, 3, '10', 5465, '2023-07-28 17:14:24'),
(79, 'iPhone 12 ProMax', '1690564647.webp', 'iPhone 12 ProMax', 1, 2, '10', 200, '2023-07-28 17:17:27'),
(80, 'iPhone 20 ProMax', '1690564821.webp', 'iPhone 20 ProMax', 3, 3, '2000', 50, '2023-07-28 17:20:21'),
(81, 'iPhone 12 ProMax', '1690564901.webp', 'iPhone 12 ProMax', 2, 3, '105', 50, '2023-07-28 17:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `size_name` varchar(5) DEFAULT NULL,
  `products_id` bigint(20) UNSIGNED DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`id`, `size_name`, `products_id`, `date`) VALUES
(1, 'L', 50, '2023-07-26 17:05:08'),
(2, 'XL', 50, '2023-07-26 17:05:08'),
(3, 'XXL', 50, '2023-07-26 17:05:08'),
(4, 'S', 51, '2023-07-28 15:53:19'),
(5, 'M', 51, '2023-07-28 15:53:19'),
(6, 'L', 51, '2023-07-28 15:53:19'),
(7, 'XL', 52, '2023-07-28 15:59:01'),
(8, 'XXXL', 52, '2023-07-28 15:59:01'),
(9, 'L', 53, '2023-07-28 16:01:54'),
(10, 'XL', 53, '2023-07-28 16:01:54'),
(11, 'L', 54, '2023-07-28 16:03:17'),
(12, 'XL', 54, '2023-07-28 16:03:17'),
(13, 'M', 55, '2023-07-28 16:03:59'),
(14, 'L', 55, '2023-07-28 16:03:59'),
(15, 'XL', 55, '2023-07-28 16:03:59'),
(16, 'S', 56, '2023-07-28 16:07:18'),
(17, 'L', 56, '2023-07-28 16:07:18'),
(18, 'XL', 56, '2023-07-28 16:07:18'),
(19, 'S', 57, '2023-07-28 16:10:02'),
(20, 'M', 57, '2023-07-28 16:10:02'),
(21, 'S', 58, '2023-07-28 16:14:24'),
(22, 'M', 58, '2023-07-28 16:14:24'),
(23, 'S', 59, '2023-07-28 16:14:56'),
(24, 'M', 59, '2023-07-28 16:14:56'),
(25, 'S', 60, '2023-07-28 16:15:24'),
(26, 'L', 60, '2023-07-28 16:15:24'),
(27, 'S', 61, '2023-07-28 16:16:33'),
(28, 'L', 61, '2023-07-28 16:16:33'),
(29, 'S', 62, '2023-07-28 16:18:02'),
(30, 'L', 62, '2023-07-28 16:18:02'),
(31, 'S', 63, '2023-07-28 16:22:07'),
(32, 'M', 63, '2023-07-28 16:22:07'),
(33, 'L', 64, '2023-07-28 16:24:13'),
(34, 'XXL', 64, '2023-07-28 16:24:13'),
(35, 'L', 65, '2023-07-28 16:26:41'),
(36, 'XL', 65, '2023-07-28 16:26:41'),
(37, 'S', 66, '2023-07-28 16:27:33'),
(38, 'M', 66, '2023-07-28 16:27:33'),
(39, 'S', 67, '2023-07-28 16:31:02'),
(40, 'M', 67, '2023-07-28 16:31:02'),
(41, 'S', 68, '2023-07-28 16:42:24'),
(42, 'M', 68, '2023-07-28 16:42:24'),
(43, 'S', 69, '2023-07-28 16:42:43'),
(44, 'M', 69, '2023-07-28 16:42:43'),
(45, 'S', 70, '2023-07-28 16:42:56'),
(46, 'M', 70, '2023-07-28 16:42:56'),
(47, 'S', 71, '2023-07-28 16:43:40'),
(48, 'M', 71, '2023-07-28 16:43:40'),
(49, 'S', 72, '2023-07-28 16:50:19'),
(50, 'M', 72, '2023-07-28 16:50:19'),
(51, 'S', 73, '2023-07-28 16:51:33'),
(52, 'M', 73, '2023-07-28 16:51:33'),
(53, 'S', 74, '2023-07-28 16:52:54'),
(54, 'L', 74, '2023-07-28 16:52:54'),
(55, 'S', 75, '2023-07-28 16:54:59'),
(56, 'M', 75, '2023-07-28 16:54:59'),
(57, 'S', 76, '2023-07-28 16:56:13'),
(58, 'M', 76, '2023-07-28 16:56:13'),
(59, 'S', 77, '2023-07-28 17:10:07'),
(60, 'M', 77, '2023-07-28 17:10:07'),
(61, 'M', 78, '2023-07-28 17:14:24'),
(62, 'XL', 78, '2023-07-28 17:14:24'),
(63, 'L', 79, '2023-07-28 17:17:27'),
(64, 'XXL', 79, '2023-07-28 17:17:27'),
(65, 'S', 80, '2023-07-28 17:20:21'),
(66, 'M', 80, '2023-07-28 17:20:21'),
(67, 'S', 81, '2023-07-28 17:21:41'),
(68, 'L', 81, '2023-07-28 17:21:41');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) NOT NULL,
  `slider_tilte` varchar(50) NOT NULL,
  `slider_detail` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_img`, `slider_tilte`, `slider_detail`, `date`) VALUES
(1, '1689442692.jpg', 'New Arrivals 50% Off', 'Glittering Landscape of Star Birth', '2023-07-15 17:38:12'),
(2, '1689482104.jpg', 'New Arrivals Vegetable 10% Off', 'Vegetables are parts .', '2023-07-16 04:38:00'),
(3, '1689482500.jpg', 'Discount 50% Off', 'Beverage for your Babe', '2023-07-16 04:41:40'),
(4, '1689482543.jpg', 'New Arrivals in Planet 10% Off', 'This is you and me ', '2023-07-16 04:42:23'),
(5, '1689483365.jpg', 'New Arrivals Baby 50% Off', 'Dismount Products  Baby 50% Off', '2023-07-16 04:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `date`) VALUES
(1, 'Admin', 'admin@gmail.com', 'f07f6c983d715f4155ab0e9ce5cc4805', 'admin', '2023-07-08 08:32:14'),
(2, 'User', 'user@gmail.com', '3b94536a7f7986a24aa98d325ad19d9e', 'user', '2023-07-08 08:32:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `cus_id` (`cus_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detailimg`
--
ALTER TABLE `detailimg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_ID` (`category_ID`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `detailimg`
--
ALTER TABLE `detailimg`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`cus_id`) REFERENCES `customer` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `detailimg`
--
ALTER TABLE `detailimg`
  ADD CONSTRAINT `detailimg_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `customer` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_ID`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
