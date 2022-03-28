-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 04:36 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smart-restaurant-and-delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `ip_add` varchar(100) NOT NULL,
  `food_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `ip_add`, `food_id`, `quantity`, `price`) VALUES
(1, '::2', 3, 1, 360);

-- --------------------------------------------------------

--
-- Table structure for table `order_delivery`
--

CREATE TABLE `order_delivery` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_title` varchar(100) NOT NULL,
  `food_quantity` int(11) NOT NULL,
  `total_price` double NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_delivery`
--

INSERT INTO `order_delivery` (`order_id`, `user_id`, `address`, `food_id`, `food_title`, `food_quantity`, `total_price`, `order_time`, `order_status`) VALUES
(114, 45, 'bogura', 32, 'Thai Style Fried Chicken', 2, 800, '2022-03-24 00:26:41', 'ordered'),
(115, 45, 'bogura', 48, 'Special Fried Rice', 1, 320, '2022-03-24 00:26:42', 'ordered'),
(118, 45, 'dsjkhfgdfhd', 33, 'Gai Yang', 1, 450, '2022-03-28 19:01:14', 'delivered');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `table_no` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `food_title` varchar(100) NOT NULL,
  `food_quantity` int(11) NOT NULL,
  `total_price` int(11) NOT NULL,
  `order_time` datetime NOT NULL,
  `order_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant_info`
--

CREATE TABLE `restaurant_info` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `open_hours` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant_info`
--

INSERT INTO `restaurant_info` (`id`, `location`, `open_hours`, `email`, `contact`) VALUES
(2, 'Bogura, Bangladesh', '10.00AM - 9.00 PM', 'restaurant@gmail.com', '01800000000');

-- --------------------------------------------------------

--
-- Table structure for table `rt_image`
--

CREATE TABLE `rt_image` (
  `im_id` int(11) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rt_image`
--

INSERT INTO `rt_image` (`im_id`, `image_name`, `active`) VALUES
(19, 'Rt_img_721.jpg', 'Yes'),
(20, 'Rt_img_873.jpg', 'No'),
(21, 'Rt_img_511.jpg', 'No'),
(22, 'Rt_img_393.jpg', 'No'),
(23, 'Rt_img_294.jpg', 'No'),
(24, 'Rt_img_826.jpg', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `table_admin`
--

CREATE TABLE `table_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_admin`
--

INSERT INTO `table_admin` (`id`, `full_name`, `contact_number`, `email`, `username`, `password`, `role`) VALUES
(46, 'Administrator', '01400000000', 'admin@gmail.com', 'admin', 'admin', 1),
(66, 'Moon', '01700000000', 'moon@gmail.com', 'moon', 'moon', 2);

-- --------------------------------------------------------

--
-- Table structure for table `table_category`
--

CREATE TABLE `table_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_category`
--

INSERT INTO `table_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(1, 'Pizza', 'Food_Category_959.jpg', 'Yes', 'Yes'),
(2, 'Burger', 'Food_Category_902.jpg', 'No', 'Yes'),
(3, 'Nachos', 'Food_Category_659.jpg', 'No', 'No'),
(6, 'Rice', 'Food_Category_782.jpg', 'Yes', 'Yes'),
(13, 'Chicken', 'Food_Category_842.jpg', 'Yes', 'Yes'),
(14, 'Beef', 'Food_Category_61.jpg', 'Yes', 'Yes'),
(15, 'Soup', 'Food_Category_190.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `table_chef`
--

CREATE TABLE `table_chef` (
  `id` int(11) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_chef`
--

INSERT INTO `table_chef` (`id`, `full_name`, `image_name`, `contact_number`, `email`, `position`) VALUES
(1, 'Sarah Jhonson', 'Food_Category_217.jpg', '+455485', 'Sarah Jhonson', 'Cook'),
(9, 'Nayeem', 'chef_63.jpg', '01900000000', 'nayeem@gmail.com', 'Cook'),
(10, 'Tony', 'chef_280.jpg', '01500000000', 'tony@gmail.com', 'Cook');

-- --------------------------------------------------------

--
-- Table structure for table `table_food`
--

CREATE TABLE `table_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) NOT NULL,
  `special` varchar(10) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `table_food`
--

INSERT INTO `table_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `special`, `featured`, `active`) VALUES
(32, 'Thai Style Fried Chicken', '', '400', 'Food_Name_908.jpg', 13, 'No', 'Yes', 'Yes'),
(33, 'Gai Yang', 'Grilled Chicken', '450', 'Food-Name-8776.jpg', 13, 'No', 'Yes', 'Yes'),
(34, 'Chicken Basil Leaf', '', '400', 'Food-Name-8605.jpg', 13, 'Yes', 'Yes', 'Yes'),
(35, 'Chicken in Foil Paper', '', '450', 'Food_Name_806.jpg', 13, 'No', 'Yes', 'Yes'),
(36, 'Sliced Chicken with mushroom and ginger', '', '395', 'Food_Name_656.jpg', 13, 'No', 'Yes', 'Yes'),
(37, 'Sliced Chicken with Garlic Sauce', '', '390', 'Food_Name_772.jpg', 13, 'No', 'No', 'Yes'),
(38, 'Chicken with Cashewnut', '', '410', 'Food_Name_456.jpg', 13, 'Yes', 'Yes', 'Yes'),
(39, 'Sliced Chicken with capsicum', '', '380', 'Food_Name_201.jpg', 13, 'No', 'No', 'Yes'),
(40, 'Fried Spring Chicken', '12 pics', '410', 'Food_Name_831.jpg', 13, 'No', 'No', 'Yes'),
(41, 'Fried Boneless Chicken', '15 pics', '450', 'Food_Name_318.jpg', 13, 'No', 'No', 'Yes'),
(43, 'Dry Beef ', '', '410', 'Food_Name_926.jpg', 14, 'No', 'No', 'Yes'),
(44, 'Beef Chilli Paste', '', '430', 'Food_Name_845.jpg', 14, 'No', 'No', 'Yes'),
(45, 'Thai Soup', '', '325', 'Food_Name_576.jpg', 15, 'Yes', 'Yes', 'Yes'),
(46, 'Special Thai Soup', '', '350', 'Food-Name-5635.jpg', 15, 'No', 'Yes', 'Yes'),
(47, 'Beef Basil Leaf with Oyster Sauce', '', '450', 'Food_Name_274.webp', 14, 'Yes', 'Yes', 'Yes'),
(48, 'Special Fried Rice', '', '320', 'Food_Name_958.jpg', 6, 'Yes', 'Yes', 'Yes'),
(49, 'Fried Rice with Chiken', '', '290', 'Food_Name_233.jpg', 6, 'No', 'Yes', 'Yes'),
(50, 'Fried Rice with Beef', '', '350', 'Food_Name_268.jpg', 6, 'No', 'Yes', 'Yes'),
(51, 'Masala Fried Rice', '', '320', 'Food_Name_117.webp', 6, 'No', 'Yes', 'Yes'),
(52, 'Steam Rice', '', '90', 'Food_Name_601.jpg', 6, 'No', 'No', 'Yes'),
(53, 'Hot Chicken Pizza', '9\"', '270', 'Food_Name_415.jpg', 1, 'Yes', 'Yes', 'Yes'),
(54, 'Vegetable Pizza', '6\"', '170', 'Food_Name_240.jpg', 1, 'No', 'Yes', 'Yes'),
(55, 'BBQ Pizza', '12\"', '530', 'Food_Name_710.jpeg', 1, 'No', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `c_id` int(11) NOT NULL,
  `c_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_subject` varchar(200) NOT NULL,
  `c_message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`c_id`, `c_name`, `c_email`, `c_subject`, `c_message`) VALUES
(8, 'Sameer', 'sameer@gmail.com', 'Review', 'This cozy restaurant has left the best impressions! Hospitable hosts, delicious dishes, beautiful presentation and wonderful dessert. I recommend to everyone! I would like to come back here again and again.'),
(9, 'Kabir', 'kabir@gmail.com', 'Review', ' It’s a great experience. The ambiance is very welcoming and charming. Amazing food and service. Staff are extremely knowledgeable and make great recommendations.'),
(10, 'Shahzain', 'shahzain@gmail.com', 'Review', 'Excellent food. Menu is extensive and seasonal to a particularly high standard. Definitely fine dining. It can be expensive but worth it and they do different deals on different nights so it’s worth checking them out before you book. Highly recommended.'),
(11, 'Maaz', 'maaz@gmail.com', 'Review', 'We are so fortunate to have this place just a few minutes drive away from home. Food is stunning, both the tapas and downstairs restaurant. Love this place and will continue to visit.');

-- --------------------------------------------------------

--
-- Table structure for table `user_signup`
--

CREATE TABLE `user_signup` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_number` varchar(15) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_signup`
--

INSERT INTO `user_signup` (`user_id`, `full_name`, `email`, `contact_number`, `image_name`, `username`, `password`) VALUES
(45, 'kabir', 'kabir4@gmail.com', '01700000000', 'user_img_480.jpg', 'kabir', '123');

-- --------------------------------------------------------

--
-- Table structure for table `why_us`
--

CREATE TABLE `why_us` (
  `id` int(11) NOT NULL,
  `why_title` varchar(100) NOT NULL,
  `why_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `why_us`
--

INSERT INTO `why_us` (`id`, `why_title`, `why_description`) VALUES
(1, 'Location', 'This restaurant is on rooftop and beside the river. If you need refreshment and good food, you can visit us.'),
(2, 'Friendly environment', 'Our motto is to make the atmosphere friendly and as efficient as possible. The waiters are patiently and happily take your order and serve the meal in the estimated time. A nice and lovely environment forces you to come back for another date. '),
(3, 'Fresh food', 'Our food is made fresh every day with ingredients. We bring the best taste in our cooking to make your day happier and healthier. No matter which season is going on but giving you extraordinary is a part of our service.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `order_delivery`
--
ALTER TABLE `order_delivery`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rt_image`
--
ALTER TABLE `rt_image`
  ADD PRIMARY KEY (`im_id`);

--
-- Indexes for table `table_admin`
--
ALTER TABLE `table_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_category`
--
ALTER TABLE `table_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_chef`
--
ALTER TABLE `table_chef`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `table_food`
--
ALTER TABLE `table_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `user_signup`
--
ALTER TABLE `user_signup`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `order_delivery`
--
ALTER TABLE `order_delivery`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `restaurant_info`
--
ALTER TABLE `restaurant_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rt_image`
--
ALTER TABLE `rt_image`
  MODIFY `im_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `table_admin`
--
ALTER TABLE `table_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `table_category`
--
ALTER TABLE `table_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `table_chef`
--
ALTER TABLE `table_chef`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `table_food`
--
ALTER TABLE `table_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_signup`
--
ALTER TABLE `user_signup`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
