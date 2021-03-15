-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 15, 2021 at 11:07 AM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dish_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `dish_id`, `qty`) VALUES
(18, 1, 14, 7),
(20, 3, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `num` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `veg` tinyint(1) NOT NULL,
  `nonveg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `num`, `email`, `password`, `address`, `city`, `veg`, `nonveg`) VALUES
(1, 'Tabish', '9759915575', 'tabish@gmail.com', '1234', 'Topia Sarai', 'Saharanpur', 1, 1),
(2, 'Mohd Shahrukh', '9758304881', 'mohdshahrukh216@gmail.com', '123456', 'Raj Colony', 'Saharanpur', 1, 1),
(3, 'Tabish Tanseef', '9105099314', 'tabishtanseef@gmail.com', '123456', 'Topia Sarai, Neem Tala Chowk', 'Saharanpur', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` varchar(20) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `name`, `category`, `price`, `qty`, `tagline`, `description`, `image`, `restaurant_id`, `restaurant_name`) VALUES
(1, 'Rabdi Masala', 'veg', '150', 10, 'Rabdi Aesi Jo Maza Aa Jaye', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '15.jpg', 2, 'Tabish Tanseef'),
(2, 'Chholey Chawal', 'veg', '200', 10, 'Bahut Hi Swadisht ', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '40040-3.jpg', 6, 'Food @ Finger'),
(3, 'Butter Chicken', 'nonveg', '500', 10, 'Lajawab Dish', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '83390-6.jpg', 6, 'Food @ Finger'),
(4, 'Broccoli salad', 'veg', '150', 10, 'Sweet Salad', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '40931-1.jpg', 7, 'Tonkotsu'),
(5, 'Kadai Chicken', 'nonveg', '600', 10, 'Masaledar Chicken', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '47037-2.jpg', 7, 'Tonkotsu'),
(6, 'Paneer Chholey With Rice', 'veg', '250', 10, 'Chatpate Paneer Chholey', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '24757-7.jpg', 11, ' Japanese Restaurant'),
(7, 'Chicken Masala Rice', 'nonveg', '450', 10, 'Chicken Masala Saharanpuri', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '35603-4.jpg', 11, ' Japanese Restaurant'),
(8, 'Chicken Lemon Masala', 'nonveg', '450', 10, 'Chicken Masala Saharanpuri', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '98878-7.jpg', 11, ' Japanese Restaurant'),
(9, 'Mix Veg', 'veg', '150', 10, 'Swadisht Dish', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '25855-6.jpg', 8, 'Punjabi Hut'),
(10, 'Rajma Chawal', 'veg', '200', 10, 'Delhi ki Mashhoor Rajma', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '81794-3.jpg', 8, 'Punjabi Hut'),
(11, 'Chicken Curry', 'nonveg', '450', 10, 'ChatPata Chicken', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '12977-1.jpg', 9, 'India Curry House'),
(12, 'Chilly Chicken', 'nonveg', '450', 10, 'Chicken Chilly ', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '94339-3.jpg', 9, 'India Curry House'),
(13, 'Mater Paneer Chawal', 'veg', '300', 10, 'Maharaja Special', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '98601-4.jpg', 10, 'The Maharajas'),
(14, 'Special Tomato Salad', 'veg', '100', 0, 'Special Salad', 'What is Lorem Ipsum Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s when an unknown printer took a galley of type and scrambled it to make a type specimen book it has?', '97206-9.jpg', 10, 'The Maharajas'),
(15, 'Solid Salad', 'veg', '150', 0, 'Solid Salad Taste Like Fresh Air', 'An amazing salad you are going to love a lot.', '12317-solid_salad.jpg', 12, 'Punjab Di Shaan');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dishes` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `day` varchar(10) NOT NULL,
  `time` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `dishes`, `qty`, `date`, `day`, `time`) VALUES
(33, '73100931', 2, '14', '7', '2021-03-15', 'Monday', '02:33:40'),
(34, '30160603', 3, '15', '2', '2021-03-15', 'Monday', '03:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `num` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `veg` tinyint(1) NOT NULL,
  `nonveg` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `name`, `num`, `email`, `password`, `address`, `city`, `image`, `veg`, `nonveg`) VALUES
(2, 'Tikhi Mirch', '7417416414', 'tabishtanseef@gmail.com', '1234', 'Topia Sarai', 'Saharanpur', '45367-4.jpg', 1, 1),
(6, 'Food @ Finger', '9760526368', 'foodfinger@gmail.com', '1234', 'Delhi Road', 'Saharanpur', '93841-6.jpg', 1, 1),
(7, 'Tonkotsu', '9758405011', 'tonkotsu@gmail.com', '1234', 'Court Road saharanpur', 'Saharanpur', '99967-1.jpg', 1, 1),
(8, 'Punjabi Hut', '9758304850', 'punjabihut@gmail.com', '1234', 'Ambala Road ', 'Saharanpur', '91319-3.jpg', 1, 0),
(9, 'India Curry House', '9927554466', 'indiacurry@gmail.com', '1234', 'Pul Kambohan', 'Saharanpur', '1952-2.jpg', 0, 1),
(10, 'The Maharajas', '9758305152', 'themaharajas@gmail.com', '1234', 'Behat Road', 'Saharanpur', '71329-5.jpg', 1, 0),
(11, ' Japanese Restaurant', '9758303881', 'japanese@gmail.com', '1234', 'Clock Tower', 'Saharanpur', '45367-4.jpg', 1, 1),
(12, 'Punjab Di Shaan', '7417416414', 'rajrao901@gmail.com', '123456', 'Link Road Near MP House', 'Chandigarh', '70650-punjab_di_shan.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
