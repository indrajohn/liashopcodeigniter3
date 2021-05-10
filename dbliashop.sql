-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2021 at 07:42 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbliashop`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Woman'),
(2, 'Men'),
(3, 'Kids'),
(4, 'Accessories'),
(5, 'Cosmetic');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_checkout`
--

CREATE TABLE `tbl_checkout` (
  `checkout_id` int(11) NOT NULL,
  `cart_id` int(11) NOT NULL,
  `checkout_total` int(11) NOT NULL,
  `checkout_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_desc` text NOT NULL,
  `product_url` varchar(100) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_discount` int(11) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `product_desc`, `product_url`, `product_price`, `product_discount`, `product_stock`, `category_id`) VALUES
(1, 'Furry hooded parka2', '444', 'Furry_hooded_parka2.jpg', 2147483647, 22, 0, 2),
(2, 'Furry hooded parka1', 'desss', 'Furry_hooded_parka1.jpg', 240000, 1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relationship_category`
--

CREATE TABLE `tbl_relationship_category` (
  `relationship_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_relationship_category`
--

INSERT INTO `tbl_relationship_category` (`relationship_id`, `category_id`, `sub_category_id`) VALUES
(2, 88, 15),
(5, 87, 18),
(6, 1, 19),
(7, 1, 20),
(8, 1, 21),
(9, 1, 22),
(10, 1, 23),
(11, 1, 24),
(12, 2, 25),
(13, 2, 26),
(14, 2, 27),
(15, 2, 28),
(16, 2, 29),
(17, 2, 30),
(18, 2, 31),
(19, 3, 32),
(20, 3, 33),
(21, 3, 34),
(22, 3, 35),
(23, 3, 36),
(24, 3, 37),
(25, 4, 38),
(26, 4, 39),
(27, 5, 40),
(28, 5, 41);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_relationship_product`
--

CREATE TABLE `tbl_relationship_product` (
  `id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_relationship_product`
--

INSERT INTO `tbl_relationship_product` (`id`, `sub_category_id`, `product_id`) VALUES
(1, 41, 1),
(2, 19, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_category`
--

CREATE TABLE `tbl_sub_category` (
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sub_category`
--

INSERT INTO `tbl_sub_category` (`sub_category_id`, `name`) VALUES
(1, 'tess'),
(2, 'tess'),
(3, 'tess'),
(4, 'tess'),
(5, 'handuk'),
(6, 'tess'),
(7, 'tess'),
(8, 'haiudpdate'),
(9, 'handuk'),
(10, 'tess'),
(11, 'handuk'),
(12, 'tess'),
(13, 'tess'),
(18, 'handuk2'),
(19, 'Coats'),
(20, 'Jacket'),
(21, 'Dresses'),
(22, 'Shirts'),
(23, 'T-shirts'),
(24, 'Jeans'),
(25, 'Coats'),
(26, 'Jacket'),
(27, 'Dresses'),
(28, 'Shirts'),
(29, 'Shirts'),
(30, 'T-shirts'),
(31, 'Jeans'),
(32, 'Coats'),
(33, 'Jacket'),
(34, 'Dresses'),
(35, 'Shirts'),
(36, 'T-shirts'),
(37, 'Jeans'),
(38, 'Hat'),
(39, 'Glass'),
(40, 'Lipstic'),
(41, 'Hair Style');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `role` varchar(20) NOT NULL,
  `emailConfirmYn` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `first_name`, `last_name`, `email`, `phone`, `username`, `password`, `address`, `role`, `emailConfirmYn`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '082828', 'admin', 'admin', 'admin', 'admin', 'Y'),
(2, 'user', 'user', 'idbuatdijual0001@gmail.com', '082828', 'user', 'user', 'user', 'user', 'Y'),
(10, '', '', 'tes@gmail.com', '', 'tes', 'tes', '', 'user', 'N'),
(11, '', '', 'tes@gmail.com', '', 'tes', 'tes', '', 'user', 'N'),
(12, '', '', 'tes@gmail.com', '', 'tes', 'tes', '', 'user', 'N'),
(13, '', '', 'tes@gmail.com', '', 'tes', '62c0049936ecfd5b52303baaf2526276', '', 'user', 'N'),
(14, '', '', 'tes@gmail.com', '', 'tes', 'a', '', 'user', 'N'),
(15, '', '', 'tes@gmail.comte', '', 'ets', 'tes', '', 'user', 'N'),
(16, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(17, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(18, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(19, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(20, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(21, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(22, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(23, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(24, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(25, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(26, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(27, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(28, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(29, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(30, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(31, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N'),
(32, '', '', 'asd2@g', '', '1', 'asdasd', '', 'user', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  ADD PRIMARY KEY (`checkout_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_relationship_category`
--
ALTER TABLE `tbl_relationship_category`
  ADD PRIMARY KEY (`relationship_id`);

--
-- Indexes for table `tbl_relationship_product`
--
ALTER TABLE `tbl_relationship_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_checkout`
--
ALTER TABLE `tbl_checkout`
  MODIFY `checkout_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_relationship_category`
--
ALTER TABLE `tbl_relationship_category`
  MODIFY `relationship_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tbl_relationship_product`
--
ALTER TABLE `tbl_relationship_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_sub_category`
--
ALTER TABLE `tbl_sub_category`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
