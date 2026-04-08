-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2026 at 11:16 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gulzaman`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_category`
--

CREATE TABLE `add_category` (
  `category_id` int(50) NOT NULL,
  `category_name` varchar(200) DEFAULT NULL,
  `category_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_category`
--

INSERT INTO `add_category` (`category_id`, `category_name`, `category_image`) VALUES
(1, 'watch', 'watch.jpg'),
(7, 'mens', 'mens.jfif'),
(13, 'women bag', 'bag.jfif'),
(16, 'women', 'women1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `add_product`
--

CREATE TABLE `add_product` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(50) DEFAULT NULL,
  `p_description` varchar(50) DEFAULT NULL,
  `p_price` int(11) DEFAULT NULL,
  `p_qnty` int(11) DEFAULT NULL,
  `p_status` varchar(50) DEFAULT 'in stock',
  `p_image` text DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_product`
--

INSERT INTO `add_product` (`p_id`, `p_name`, `p_description`, `p_price`, `p_qnty`, `p_status`, `p_image`, `category_id`) VALUES
(8, 'tee shirt', 'c blue women shirt', 500, 1, 'in stock', 'women1.webp', 16),
(9, 'tee shirt', '', 400, 1, 'in stock', 'women.webp', 16),
(10, 'tee shirt', '', 550, 1, 'in stock', 'women2.jfif', 16),
(11, 'tee shirt', '', 600, 1, 'in stock', 'mens.jfif', 7),
(12, 'tee shirt', '', 700, 1, 'in stock', 'mens1.jfif', 7),
(13, 'tee shirt', '', 500, 1, 'in stock', 'mens2.jfif', 7),
(14, 'watch', '', 2000, 1, 'in stock', 'watch.jpg', 1),
(15, 'watch', '', 3000, 1, 'in stock', 'watch1.jfif', 1),
(16, 'watch', '', 5000, 1, 'in stock', 'watch2.jfif', 1),
(17, 'bag', '', 3000, 1, 'in stock', 'bag.jfif', 13),
(18, 'bag', '', 4500, 1, 'in stock', 'bags1.jfif', 13),
(19, 'bag', '', 3456, 1, 'in stock', 'bags2.jfif', 13);

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

CREATE TABLE `add_to_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `pro_id` int(11) DEFAULT NULL,
  `pro_price` int(11) DEFAULT NULL,
  `pro_qnty` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `Name` varchar(50) DEFAULT NULL,
  `Email` varchar(50) DEFAULT NULL,
  `Password` varchar(50) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `Name`, `Email`, `Password`, `Address`, `role`) VALUES
(12, 'admin', 'admin@gmail.com', '', 'karachi', 'admin'),
(15, 'bin', 'bin@gmail.com', 'bin123', 'karachi', 'student'),
(16, 'talha', 'talha@gmail.com', 'talha123', 'karachi', 'student'),
(17, 'binish', 'binish@gmail.com', 'binish123', 'karachi', 'admin'),
(18, 'admin', 'admin1@gmail.com', 'admin1234', 'karachi', 'admin'),
(19, 'ali', 'ali@gmail.com', 'ali123', 'mirpurkhas', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_category`
--
ALTER TABLE `add_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `add_product`
--
ALTER TABLE `add_product`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
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
-- AUTO_INCREMENT for table `add_category`
--
ALTER TABLE `add_category`
  MODIFY `category_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `add_product`
--
ALTER TABLE `add_product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_product`
--
ALTER TABLE `add_product`
  ADD CONSTRAINT `add_product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `add_category` (`category_id`);

--
-- Constraints for table `add_to_cart`
--
ALTER TABLE `add_to_cart`
  ADD CONSTRAINT `add_to_cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `add_to_cart_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `add_product` (`p_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
