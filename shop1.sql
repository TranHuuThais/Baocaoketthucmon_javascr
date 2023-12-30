-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2023 at 07:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop1`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `image` varchar(2048) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`) VALUES
(27, 'tt', '11111');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  `users_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `status`, `users_id`) VALUES
(2, 'KM1123hh', 'cvcvcvc', 0),
(3, 'KM1123hh', 'cvcvcvc', 3),
(4, 'KM1123hh', 'cvcvcvc', 3),
(5, 'KM1123hh', 'cvcvcvc', 3),
(6, 'KM1123hh', 'cvcvcvc', 3),
(7, 'KM1123hh', 'cvcvcvc', 3),
(8, 'mg223', 'gghhhff', 0),
(9, 'mg223cccc', 'gghhhff', 0),
(10, 'mg223cccccc', 'gghhhff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `quantily` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `products_id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `quantily`, `price`, `products_id`, `orders_id`) VALUES
(0, 999, 999, 999, 99),
(2, 3, 1111111, 2, 5),
(3, 3, 1111111, 2, 5),
(4, 3, 1111111, 2, 5),
(5, 3, 1111111, 2, 5),
(6, 3, 1111111, 2, 5),
(7, 3, 1111111, 2, 5),
(8, 3, 1111111, 2, 5),
(9, 3, 1111111, 2, 5),
(10, 3, 1111111, 2, 5),
(11, 3, 1111111, 2, 5),
(12, 3, 1111111, 6, 1),
(13, 0, 1, 4444, 2),
(14, 99, 1, 4444, 2),
(15, 99, 1, 4444, 2),
(16, 99, 2, 4444, 2),
(17, 100, 100, 100, 100),
(18, 99, 100, 100, 100),
(19, 0, 1001, 1001, 1001),
(20, 999, 999, 999, 99),
(21, 999, 999, 999, 99);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `description` varchar(222) DEFAULT NULL,
  `image` varchar(2048) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `view` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `image`, `price`, `quantity`, `view`, `create_at`, `category_id`) VALUES
(33, 'Honey Chicken Rice', 'Cơm, gà mật ong, cà chua, salad,', './public/image/com4.png', '45.000', 1, 40, '2023-12-03 09:05:15', 5),
(35, 'THE MEAT PIZZA', 'Có lớp thịt xông khói APPLEWOOD và nấu phô mai MOZZARELLA', './public/image/Pizza_co.webp', '150.000', 1, 80, '2023-12-03 09:25:31', 1),
(36, 'Soy Bean Family', '6 cái', './public/image/ga1.png', '221.000', 1, 90, '2023-12-03 09:32:55', 3),
(37, 'LChicken Burger', 'gà, salad, cà chua, sốt mayonnaise', './public/image/bg1.png', '75.000', 1, 80, '2023-12-03 09:25:31', 2),
(38, 'Double Double Burger', 'thịt, phô mai, salad, cà chua', './public/image/bg2.png', '85.000', 1, 80, '2023-12-03 09:25:31', 2),
(39, 'Beef Spaghetti', 'mỳ ý, bò', './public/image/mi1.png', '45.000', 1, 40, '2023-12-03 09:52:57', 5),
(40, 'Spaghetti', 'mỳ ý, thịt bầm', './public/image/mi2.png', '40.000', 1, 80, '2023-12-03 09:52:57', 5),
(45, 'pizaaaaa', 'thơm ngon', '123', '100000', 1, 100, '2023-12-28 06:44:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(104, 'admin123', 'admin123@gmail.com', '123', 'admin'),
(105, 't', 'TrungNguyen15989@gmail.com', '123', 'quản ký'),
(106, 'Trương Văn Triều ', 'amid@gmail.com', '123', '123'),
(107, 'trung', 'nguyendinhtrung@gmail.com', '123', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
