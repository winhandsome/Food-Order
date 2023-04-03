-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 11:23 PM
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
-- Database: `food-order`
--
CREATE DATABASE IF NOT EXISTS `food-order` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `food-order`;
-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(1, 'Khoa', 'khoa', 'e8ed38edd226e6d0bb0f65e07d8f3f55'),
(2, 'Trong', 'trong', 'c6330ca473aab1aa19daf6d1b4994839'),
(3, 'Thang', 'thang', '6e0c130ca8cf53a2473bd88044b83da9'),
(4, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(5, 'Fried Chicken', 'Food_Category_friedchicken.jpeg', 'Yes', 'Yes'),
(6, 'Pizza', 'Food_Category_pizza.jpg', 'Yes', 'Yes'),
(7, 'Burger', 'Food_Category_burger.jpg', 'Yes', 'Yes'),
(8, 'Ice Cream', 'Food_Category_icecream.jpg', 'Yes', 'Yes'),
(9, 'Drink', 'Food_Category_drink.jpg', 'Yes', 'Yes'),
(10, 'Spaghetti', 'Food_Category_946.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(3, 'Cheesy Korean Fried Chicken', 'We found the only way to improve Korean Fried Chicken... cover it in melted cheese!', '9.00', 'food1_friedchicken.jpg', 5, 'Yes', 'Yes'),
(4, 'Spicy Fried Chicken', 'The best Korean Fried Chicken - crispy coated buttermilk fried chicken smothered in a spicy Korean-inspired gochujang sauce.', '8.00', 'food2_friedchicken.jpg', 5, 'Yes', 'Yes'),
(5, 'Smoky BBQ Pizza', 'Best Firewood Pizza in Town.', '6.00', 'Food-Name-8298.jpg', 6, 'No', 'Yes'),
(6, 'Pizza Seafood', 'A delicious easy pizza that every seafood lover will love.', '12.00', 'food2_pizza.jpg', 6, 'Yes', 'Yes'),
(7, 'Best Burger', 'Burger with Ham, Pineapple and lots of Cheese.', '4.00', 'Food-Name-6340.jpg', 7, 'Yes', 'Yes'),
(8, 'Burger Cheese', 'It is a fast-food classic but not all cheeseburgers are created equal.', '9.00', 'food_burger.jpg', 7, 'Yes', 'Yes'),
(9, 'Chocolate Ice Cream', 'Rich, ultra-creamy, and chocolatey, this is the best homemade chocolate ice cream recipe ever!', '5.00', 'food1_icecream.jpg', 8, 'Yes', 'Yes'),
(10, 'Angostura Colada', 'Angostura bitters have a starring role in this spiced Pina Colada riff from former Fort Defiance ...', '12.00', 'food1_drink.jpg', 9, 'Yes', 'Yes'),
(11, 'Spaghetti', 'lorem ipsum', '10.00', 'Food-Name-3025.jpg', 10, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(5, 'Pizza Seafood', '12.00', 2, '24.00', '2022-12-09 11:16:52', 'On Delivery', 'trong', '03456454', 'trong@gmail.com', 'abc d2 kh2'),
(6, 'Pizza Seafood', '12.00', 2, '24.00', '2022-12-09 11:18:17', 'Delivered', 'Khoa', '123456789', 'khoa@gmail.com', '123 abc d1234'),
(7, 'Spicy Fried Chicken', '8.00', 2, '16.00', '2022-12-09 11:19:18', 'Ordered', 'Thang', '0987654321', 'thang@gmail.com', 'asdf ggg32 LAd'),
(8, 'Chocolate Ice Cream', '5.00', 6, '30.00', '2022-12-09 11:20:21', 'On Delivery', 'admin', '0123456888', 'admin@gmail.com', '123 ght 66e af');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
