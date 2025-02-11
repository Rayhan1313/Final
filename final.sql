-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2025 at 02:03 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `category_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_image`) VALUES
(1, 'BiriYanisss', 'Beef_Biryani.jpg'),
(2, 'Pizza', 'Regular_Pizza update.jpg'),
(3, 'pasta', 'Regular_pasta.jpg'),
(4, 'Burgers', 'Chicken_burger.jpg'),
(76, 'Momos', 'Regular_momos.jpg'),
(149, 'hii5', 'j.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `city_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `city_name`) VALUES
(1, 'Stamford University'),
(2, 'Khilgaon '),
(3, 'Shahjahanpur '),
(4, 'Mouchak '),
(5, 'Siddheswari '),
(6, 'Malibagh '),
(7, 'Moghbazar '),
(8, 'Baily Road '),
(9, 'Shantinagar '),
(10, 'Rampura '),
(11, 'Kakrail'),
(12, 'Poribagh '),
(13, 'Rajarbagh '),
(15, 'Doctor Goli'),
(16, 'Malibagh Chowdhury Para '),
(18, 'Khilgaon Tal Tola'),
(19, 'Dhaka City'),
(21, 'Mirpur-10');

-- --------------------------------------------------------

--
-- Table structure for table `confirm_order`
--

CREATE TABLE `confirm_order` (
  `confirm_order_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL,
  `order_code` varchar(255) NOT NULL,
  `total_money` int(200) NOT NULL,
  `order_status` varchar(20) NOT NULL,
  `delivery_man_id` varchar(13) NOT NULL,
  `order_processed_by` int(255) NOT NULL,
  `order_date` date DEFAULT NULL,
  `order_time` varchar(255) DEFAULT NULL,
  `delivered_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `confirm_order`
--

INSERT INTO `confirm_order` (`confirm_order_id`, `user_id`, `order_code`, `total_money`, `order_status`, `delivery_man_id`, `order_processed_by`, `order_date`, `order_time`, `delivered_time`) VALUES
(366, 63, 'af0ffd0e', 330, 'delivered', '32', 28, '2022-08-29', '03:53:29 pm', ''),
(368, 39, '8439e5be', 210, 'delivered', '43', 28, '2022-08-30', '04:50:51 am', ''),
(369, 39, '9239579e', 120, 'delivered', '45', 35, '2022-08-30', '05:06:40 am', ''),
(370, 44, 'c48fba14', 120, 'delivered', '45', 35, '2022-08-30', '07:08:17 am', '07:10:26 am'),
(371, 40, 'ce7b18cc', 500, 'delivered', '32', 35, '2022-08-30', '12:16:25 pm', '12:56:10 pm'),
(372, 63, '64cc38fe', 330, 'delivered', '43', 35, '2022-08-31', '05:22:09 am', '05:25:47 am'),
(373, 64, '336d5796', 100, 'delivered', '45', 28, '2022-08-31', '02:40:55 pm', '02:44:54 pm'),
(374, 39, '65b118f0', 170, 'delivered', '45', 35, '2022-09-02', '09:31:59 pm', '09:34:02 pm'),
(375, 44, '04c6de78', 200, 'delivered', '32', 35, '2022-09-04', '12:05:05 am', '12:08:06 am'),
(376, 44, 'e81ad8ea', 510, 'delivered', '43', 62, '2022-09-06', '05:57:59 am', '06:02:23 am'),
(377, 44, '86a93179', 220, 'delivered', '45', 28, '2022-09-06', '06:00:56 am', '03:23:47 pm'),
(378, 66, '75e2669a', 300, 'delivered', '43', 31, '2022-09-07', '04:38:12 pm', '08:38:57 pm'),
(379, 44, '79c8a60f', 660, 'delivered', '43', 31, '2022-09-08', '01:02:20 pm', '08:38:59 pm'),
(380, 44, '081a2f0e', 430, 'delivered', '45', 28, '2022-09-17', '05:43:33 am', '05:45:13 am'),
(382, 44, 'a44025d4', 185, 'delivered', '45', 62, '2022-09-25', '02:30:58 pm', '02:38:18 pm'),
(383, 44, '5e2fe5f1', 1160, 'delivered', '45', 62, '2022-09-28', '09:36:49 pm', '09:47:44 pm'),
(384, 44, 'ea1cc990', 610, 'delivered', '45', 35, '2022-09-29', '10:51:33 am', '10:56:58 am'),
(385, 39, 'f9579e03', 0, 'sent', 'null', 0, '2022-10-24', '02:13:22 pm', ''),
(386, 73, 'ceff5860', 350, 'placed_successfully', '43', 0, '2023-02-03', '09:35:16 pm', '');

-- --------------------------------------------------------

--
-- Table structure for table `order_list`
--

CREATE TABLE `order_list` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_item_id` int(10) NOT NULL,
  `ordered_item_name` varchar(20) NOT NULL,
  `ordered_item_price` int(11) NOT NULL,
  `quantity` int(20) NOT NULL,
  `total_price` int(255) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` varchar(11) NOT NULL,
  `order_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_list`
--

INSERT INTO `order_list` (`order_id`, `user_id`, `order_item_id`, `ordered_item_name`, `ordered_item_price`, `quantity`, `total_price`, `order_date`, `order_status`, `order_code`) VALUES
(930, 63, 2, 'Chicken Pizza', 310, 1, 310, '0000-00-00', 'delivered', 'af0ffd0e'),
(936, 39, 7, 'Regular Burger', 90, 1, 90, '0000-00-00', 'delivered', '8439e5be'),
(937, 39, 173, 'Chicken Momos', 100, 1, 100, '0000-00-00', 'delivered', '8439e5be'),
(938, 39, 179, 'Beef Burger', 100, 1, 100, '0000-00-00', 'delivered', '9239579e'),
(939, 44, 179, 'Beef Burger', 100, 1, 100, '0000-00-00', 'delivered', 'c48fba14'),
(940, 40, 185, 'Combo Pack 1', 120, 1, 120, '0000-00-00', 'delivered', 'ce7b18cc'),
(941, 40, 185, 'Combo Pack 1', 120, 3, 360, '0000-00-00', 'delivered', 'ce7b18cc'),
(942, 63, 2, 'Chicken Pizza', 310, 1, 310, '0000-00-00', 'delivered', '64cc38fe'),
(944, 64, 180, 'Chicken Burger', 80, 1, 80, '0000-00-00', 'delivered', '336d5796'),
(945, 39, 134, 'Beef Biriyani', 150, 1, 150, '0000-00-00', 'delivered', '65b118f0'),
(946, 44, 173, 'Chicken Momos', 100, 1, 100, '0000-00-00', 'delivered', '04c6de78'),
(947, 44, 143, 'Momos regular ', 80, 1, 80, '0000-00-00', 'delivered', '04c6de78'),
(948, 44, 7, 'Regular Burger', 90, 1, 90, '0000-00-00', 'delivered', 'e81ad8ea'),
(949, 44, 7, 'Regular Burger', 90, 1, 90, '0000-00-00', 'delivered', 'e81ad8ea'),
(950, 44, 7, 'Regular Burger', 90, 1, 90, '0000-00-00', 'delivered', 'e81ad8ea'),
(951, 44, 7, 'Regular Burger', 90, 1, 90, '0000-00-00', 'delivered', 'e81ad8ea'),
(952, 44, 161, 'Beef Pasta', 130, 1, 130, '0000-00-00', 'delivered', 'e81ad8ea'),
(953, 44, 173, 'Chicken Momos', 100, 1, 100, '0000-00-00', 'delivered', '86a93179'),
(954, 44, 174, 'Mango Momos', 100, 1, 100, '0000-00-00', 'delivered', '86a93179'),
(956, 66, 173, 'Chicken Momos', 100, 1, 100, '0000-00-00', 'delivered', '75e2669a'),
(957, 66, 6, 'Chicken Pasta', 180, 1, 180, '0000-00-00', 'delivered', '75e2669a'),
(958, 66, 173, 'Chicken Momos', 100, 1, 100, '0000-00-00', 'pending', ''),
(959, 66, 174, 'Mango Momos', 100, 1, 100, '0000-00-00', 'pending', ''),
(960, 66, 163, 'Beef Pizza', 350, 1, 350, '0000-00-00', 'pending', ''),
(961, 66, 5, 'Regular Pasta', 150, 1, 150, '0000-00-00', 'pending', ''),
(962, 44, 2, 'Chicken Pizza', 310, 1, 310, '0000-00-00', 'delivered', '79c8a60f'),
(963, 44, 134, 'Beef Biriyani', 150, 1, 150, '0000-00-00', 'delivered', '79c8a60f'),
(964, 44, 173, 'Chicken Momos', 100, 1, 100, '0000-00-00', 'delivered', '79c8a60f'),
(965, 44, 180, 'Chicken Burger', 80, 1, 80, '0000-00-00', 'delivered', '79c8a60f'),
(966, 39, 2, 'Chicken Pizza', 310, 1, 310, '0000-00-00', 'Received', 'f9579e03'),
(967, 44, 2, 'Chicken Pizza', 310, 1, 310, '0000-00-00', 'delivered', '081a2f0e'),
(968, 44, 179, 'Beef Burger', 100, 1, 100, '0000-00-00', 'delivered', '081a2f0e'),
(969, 68, 17, 'Hydrabaadi Mutton Bi', 220, 1, 220, '0000-00-00', 'delivered', '367e0f94'),
(970, 44, 34, 'Vermicelli Pasta', 165, 1, 165, '0000-00-00', 'delivered', 'a44025d4'),
(974, 44, 185, 'Combo Pack 1', 120, 2, 240, '0000-00-00', 'delivered', '5e2fe5f1'),
(975, 44, 186, 'Combo Pack 2', 120, 1, 120, '0000-00-00', 'delivered', '5e2fe5f1'),
(976, 44, 187, 'Combo Pack 3', 180, 1, 180, '0000-00-00', 'delivered', '5e2fe5f1'),
(977, 44, 188, 'Combo Pack 4', 300, 2, 600, '0000-00-00', 'delivered', '5e2fe5f1'),
(980, 44, 1, 'Regular Pizza', 220, 2, 440, '0000-00-00', 'delivered', 'ea1cc990'),
(981, 44, 5, 'Regular Pasta', 150, 1, 150, '0000-00-00', 'delivered', 'ea1cc990'),
(982, 44, 188, 'Combo Pack 4', 300, 2, 600, '0000-00-00', 'pending', ''),
(983, 69, 6, 'Chicken Pasta', 180, 1, 180, '0000-00-00', 'pending', ''),
(984, 69, 5, 'Regular Pasta', 150, 1, 150, '0000-00-00', 'pending', ''),
(985, 39, 17, 'Hydrabaadi Mutton Bi', 220, 1, 220, '0000-00-00', 'Received', 'f9579e03'),
(986, 39, 179, 'Beef Burger', 100, 1, 100, '0000-00-00', 'pending', ''),
(987, 39, 180, 'Chicken Burger', 80, 1, 80, '0000-00-00', 'pending', ''),
(989, 73, 180, 'Chicken Burger', 80, 1, 80, '0000-00-00', 'placed_succ', 'ceff5860'),
(990, 73, 174, 'Mango Momos', 100, 1, 100, '0000-00-00', 'placed_succ', 'ceff5860'),
(991, 73, 134, 'Beef Biriyani', 150, 1, 150, '0000-00-00', 'placed_succ', 'ceff5860'),
(993, 39, 163, 'Beef Pizza', 350, 1, 350, '0000-00-00', 'pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `item_id` int(11) NOT NULL,
  `item_category_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_image` text DEFAULT NULL,
  `item_description` text NOT NULL,
  `item_price` int(11) NOT NULL,
  `status` varchar(32) DEFAULT NULL,
  `item_tags` varchar(30) NOT NULL,
  `item_created_date` date NOT NULL,
  `item_creator` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`item_id`, `item_category_id`, `item_name`, `item_image`, `item_description`, `item_price`, `status`, `item_tags`, `item_created_date`, `item_creator`) VALUES
(1, 2, 'Regular Pizza', 'Regular_Pizza update.jpg', 'It\'s Regular Pizza.\r\nSize:10\'', 220, 'Available', 'Regular Pizza', '2022-07-22', 'Tisha'),
(2, 2, 'Chicken Pizza', 'update chickem pizza.jpg', 'It\'s Chicken Pizza . Size-7\" ', 310, 'Unavailable', 'Chicken Pizza', '2022-07-22', 'Rayhan'),
(5, 3, 'Regular Pasta', 'Regular_pasta.jpg', 'It\'s Regular Pasta.\r\n', 150, 'Unavailable', 'Regular Pasta', '2022-07-22', 'Tisha'),
(6, 3, 'Chicken Pasta', 'update chicken pasta.jpg', 'Its Chicken Pasta', 180, 'Available', 'Chicken Pasta', '2022-07-23', 'Tisha'),
(7, 4, 'Regular Burger', 'Regular_burger.jpg', 'It\'s Regular Burger', 90, 'Available', 'Regular Burger', '2022-07-23', 'Tisha'),
(17, 1, 'Hydrabaadi Mutton Biriyani', 'Hydrabaadi_mutton_biriyani.JPG', 'It\'s Hydrabaadi Mutton Biriyani.', 220, 'Available', 'Hydrabaadi Mutton Biriyani', '2022-07-01', 'Tisha'),
(34, 3, 'Vermicelli Pasta', 'Vermicelli Pasta (2).jpg', 'It\'s Vermicelli Pasta.', 165, 'Available', 'Vermicelli Pasta', '2022-07-23', 'rayhan'),
(35, 3, 'Rigatoni Pasta', 'Riga.jpg', 'It\'s Rigatoni Pasta.', 180, 'Available', 'Rigatoni Pasta', '2022-07-23', 'Rayhan'),
(134, 1, 'Beef Biriyani', 'Beef_Biryani.jpg', 'It is Beef Biriyani .(Full)', 150, 'Available', 'Beef Biriyani', '2022-07-22', 'Tisha'),
(143, 76, 'Momos regular ', 'Regular_momos.jpg', 'It\'s  Momos Regular', 80, 'Unavailable', 'Momos Regular', '2022-07-22', 'Tisha'),
(148, 1, 'Chicken Biriyani', 'Chicken_biryani.jpg', 'It is Chicken Biriyani. (Full)', 130, 'Available', 'Chicken_biryani', '2022-07-22', 'Tisha'),
(157, 1, 'Hyderabadi Chicken Biriyani', 'Hyderabadi_chicken_biryani.jpg', 'It is Hyderabadi Chicken Biriyani. (Full)', 180, 'Available', 'Hyderabadi Chicken Biriyani', '2022-07-22', 'Tisha'),
(161, 3, 'Beef Pasta', 'beef pasta.jpg', 'It  is Beef Pasta', 130, 'Available', 'Beef Pasta', '2022-07-22', 'Tisha'),
(162, 3, 'Rotini Pasta', 'Rotini Pasta.jpg', 'It is Rotini Pasta', 140, 'Available', 'Rotini Pasta', '2022-07-22', 'Tisha'),
(163, 2, 'Beef Pizza', 'OIP.jpg', 'It is Beef Pizza. Size 9 inch.', 350, 'Available', 'Beef Pizza', '2022-07-22', 'Tisha'),
(164, 2, 'Vegetarian Pizza', 'vegetarian-pizza.jpg', 'It is  Vegetarian Pizza. Size 9 inch', 300, 'Available', 'Vegetarian Pizza', '2022-07-22', 'Tisha'),
(165, 2, 'Meat-Ball Pizza', 'Meatball-pizza.jpg', 'It is Vegetarian Pizza. Size 9 inch.', 360, 'Available', 'Vegetarian Pizza', '2022-07-22', 'Tisha'),
(166, 2, 'Marinara Pizza', 'Marinara-Pizza.jpg', 'It is Marinara Pizza. Size 9 inch.', 300, 'Available', 'Marinara Pizza', '2022-07-22', 'Tisha'),
(168, 2, 'Greek Style Pizza', 'Greek-style-pizza.jpg', 'It is Greek Style Pizza. Size 9 inch.', 390, 'Available', 'Greek Style Pizza', '2022-07-22', 'Tisha'),
(169, 2, 'Chicken-Alfredo-Pizza', 'Chicken-Alfredo-Pizza.jpg', 'It is Chicken-Alfredo-Pizza. Size 9 inch.', 400, 'Available', 'Chicken-Alfredo-Pizza', '2022-07-22', 'Tisha'),
(170, 2, 'Bacon-sausage-and-eggs-pizza', 'Bacon-sausage-and-eggs-pizza.jpg', 'It is Bacon-sausage-and-eggs-pizza. Size 9 inch.', 350, 'Available', 'Bacon-sausage-and-eggs-pizza', '2022-07-22', 'Tisha'),
(171, 1, 'Hydrabaadi Beef Biriyani', 'Hydrabaadi_beef_biriyani.png', 'It is Hydrabaadi Beef Biriyani. (Full)', 210, 'Available', 'Hydrabaadi Beef Biriyani', '2022-07-22', 'Tisha'),
(172, 1, 'Mutton Biriyani', 'Mutton_biriyani.jpg', 'It is Mutton Biriyani .(Full)', 220, 'Available', 'Mutton Biriyani', '2022-07-22', 'Tisha'),
(173, 76, 'Chicken Momos', 'Chicken_momos.jpg', 'It is Chicken Momos. 5 pieces.', 100, 'Unavailable', 'Chicken Momos', '2022-07-22', 'Tisha'),
(174, 76, 'Mango Momos', 'Mango_momos.jpg', 'It is Mango Momos. 5 Pieces', 100, 'Available', 'Mango Momos', '2022-07-22', 'Tisha'),
(176, 76, 'Fried Chicken Momos', 'fried.jpg', 'It is Fried Chicken Momos. 5 pieces', 120, 'Available', 'Fried Chicken Momos', '2022-07-23', 'Tisha'),
(177, 76, 'Steamed Vegetable and Paneer Momos', 'Steamed_vegetable_and_paneer_momos.jpg', 'It is Steamed Vegetable and Paneer Momos . 6 pieces', 110, 'Available', 'Steamed Vegetable and Paneer M', '2023-07-22', 'Tisha'),
(178, 76, 'Vegetable Momos', 'Vegetable_momos.jpg', 'It is Vegetable Momos. 5 pieces', 60, 'Available', 'Vegetable Momos', '2023-07-22', 'Tisha'),
(179, 4, 'Beef Burger', 'Beef_burger.jpg', 'It is Beef Burger.', 100, 'Available', 'Beef Burger', '2023-07-22', 'Tisha'),
(180, 4, 'Chicken Burger', 'Chicken_burger.jpg', 'It is Chicken Burger.', 80, 'Available', 'Beef Burger', '2022-07-23', 'Tisha'),
(181, 4, 'Mushroom Burger', 'Mushroom_burger.jpg', 'It is Mushroom Burger.', 110, 'Available', 'Mushroom Burger', '2023-07-22', 'Tisha'),
(182, 4, 'Salmon Burger', 'Salmon Burger.jpg', 'It is Salmon Burger.', 120, 'Available', 'Salmon Burger', '2023-07-22', 'Tisha'),
(183, 4, 'Tuna Burger', 'Tuna_Burger.jpg', 'It is Tuna Burger', 130, 'Available', 'Tuna Burger', '2023-07-22', 'Tisha'),
(185, 149, 'Combo Pack 1', 'update chicken pasta.jpg', 'Two chicken pasta. save 90* taka .Offer available till 29  september..', 120, 'Available', 'combo ', '2027-08-22', 'Rayhan'),
(186, 149, 'Combo Pack 2', 'Chicken_burger.jpg', 'Two chicken burger save 60* taka .Offer available till 29  september. ** ', 120, 'Available', 'combo ', '2022-08-28', 'Rayhan'),
(187, 149, 'Combo Pack 3', 'Beef_Biryani.jpg', 'Two Beef Biriyaani ,save 90* taka .Offer available till 29  september. ** ', 180, 'Available', 'combo ', '2027-08-22', 'Rayhan'),
(188, 149, 'Combo Pack 4', 'vegetarian-pizza.jpg', 'Two Chicken Pizza ,save 130* taka .Offer available till 29  september. ** ', 300, 'Available', 'combo ', '2022-08-28', 'Rayhan'),
(189, 149, 'Combo Pack 5', 'Regular_pasta.jpg', 'Two Chicken pasta .Save 40* taka .Available till 29 September **', 150, 'Available', 'Combo ', '2028-08-22', 'Tisha'),
(190, 149, 'Combo Pack 6', 'Chicken_momos.jpg', 'Chicken Momos  X 2 .Save 40* taka. Offer  available  till 29 September **', 130, 'Available', 'Combo 6', '2028-08-22', 'Tisha');

-- --------------------------------------------------------

--
-- Table structure for table `schedule_time`
--

CREATE TABLE `schedule_time` (
  `ID` int(11) NOT NULL,
  `Day` varchar(40) NOT NULL,
  `Open` varchar(40) NOT NULL,
  `Close` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule_time`
--

INSERT INTO `schedule_time` (`ID`, `Day`, `Open`, `Close`) VALUES
(1, 'Saturday', '01:00:00 AM', '22:00:00 PM'),
(2, 'Sunday', '10:00:00 AM', '22:00:00 PM'),
(3, 'Monday', '10:00:00 AM', '22:00:00 PM'),
(4, 'Tuesday', '10:00:00 AM', '22:00:00 PM'),
(5, 'Wednesday', '10:00:00 AM', '22:00:00 PM'),
(6, 'Thursday', '10:00:00 AM', '22:00:00 PM'),
(7, 'Friday', '10:00:00 AM', '22:00:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `mobile_number` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `house_no` int(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_role` varchar(20) NOT NULL,
  `pass_proteect` varchar(255) NOT NULL DEFAULT '$2y$10$iusesomecrazystrings22',
  `token` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `mobile_number`, `email`, `user_image`, `house_no`, `street`, `city`, `password`, `user_role`, `pass_proteect`, `token`, `status`) VALUES
(28, 'Rayhan', 'Himel', 'Rayhan', 1778700365, 'rayhanhimel007@gmail.com', 'rayhan.jpg', 163, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'admin', '$2y$10$iusesomecrazystrings22', '44bbfa3e', 'verified'),
(29, 'MD ', 'Khan', 'khan', 1724117757, 'blank@gmail.com', 'Riga.jpg', 163, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'delivery_man', '$2y$10$iusesomecrazystrings22', 'd70c048f', 'verified'),
(31, 'Tisha', 'Islam', 'Tisha Islam', 1724117757, 'tis@gmail.com', 'tis.jpg', 161, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'moderator', '$2y$10$iusesomecrazystrings22', 'e9c89746', 'verified'),
(32, 'Joy', 'Bangla', 'Joy Bangla', 1689471687, '01689471687@gmail.com', 'update chicken pasta.jpg', 2, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'moderator', '$2y$10$iusesomecrazystrings22', 'd86a5da0', 'verified'),
(35, 'Tasha ', 'Islam', 'Tasha', 1724117757, 'tasha@gmail.com', 'tis.jpg', 12, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$12$2Io8FF2IiT43x4hQcQF3EOgOve8/EQNxGOtlNefS6tstJmDQf9R9O', 'moderator', '$2y$10$iusesomecrazystrings22', 'db92e803', 'verified'),
(39, 'ওবাইদুল ', 'কাদের', 'ওবাইদুল কাদের', 1778700365, '1@gmail.com', 'kader vai.jpg', 1, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'customer', '$2y$10$iusesomecrazystrings22', '52ecfcac', 'verified'),
(40, 'Disha', 'Islam', 'Disha', 2147483647, 'disha@gmail.com', 'Riga.jpg', 123, 'gghfgf', 'natore', '$2y$12$RGwsdL3VQs5ise4ACL8wR.rtUUYBVO3Zq2oed8Sxj6GnCQQeQRNdG', 'customer', '$2y$10$iusesomecrazystrings22', '68b0948e', 'verified'),
(41, 'misha', 'Islam', 'misha', 2147483647, 'misha@gmail.com', 'ghum.PNG', 567, 'jhghjg', 'natore', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'customer', '$2y$10$iusesomecrazystrings22', 'd6455855', 'verified'),
(43, 'Rayhan', 'Himel', 'হরিপদ সরকার', 1778700365, 'og@gmail.com', 'Vermicelli Pasta (2).jpg', 5, ',mnjk', 'vgv', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'delivery_man', '$2y$10$iusesomecrazystrings22', 'e4009559', 'verified'),
(44, 'Shamim', 'Usman', 'শামীম উসমান', 1998900365, '2@gmail.com', 'shamim_usman.jpg', 30, 'Mogbazar', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'customer', '$2y$10$iusesomecrazystrings22', '', 'verified'),
(45, 'ডিপজল', 'ভিলেন', 'ডিপজল', 1558900365, '3@gmail.com', 'dipjol.jpg', 33, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'delivery_man', '$2y$10$iusesomecrazystrings22', '', 'verified'),
(53, 'Subroto', 'Sarker', 'Subroto', 1339659875, 'cse0667795@gmail.com', 'subroto.jpg', 163, 'Malibagh Bazar road', 'Dhaka', '$2y$12$4UhVOEl90eQT8Azv4wdwMuGPI2Oz/5mmLuqkVf5fKUeDaIha1Ugfe', 'moderator', '$2y$10$iusesomecrazystrings22', 'f38498ed', 'verified'),
(56, 'Rayhan', 'Himel', 'Rayhan Himel', 1778700365, 'vodai778@gmail.com', 'rayhan.jpg', 163, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$12$SPm9gh3dXPCQAzp1MrFraOCRKmBMcxHAkoLU6Kau.WndMzXHFfE4i', 'moderator', '$2y$10$iusesomecrazystrings22', 'faacf359', 'verified'),
(59, '', '', '', 1778700365, 'vhg@gmail.com', '', 10, '', '', '', '', '$2y$10$iusesomecrazystrings22', '', ''),
(62, 'Tisha', 'Islam', 'tishar', 1724117757, 'tishaislam01@gmail.com', 'tis.jpg', 456, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'admin', '$2y$10$iusesomecrazystrings22', 'e68085c067', 'verified'),
(63, 'Sir', 'Tanveer', 'Tanveer Sir', 1779700365, 'tanveer.ahmed.094419@gmail.com', 'Tanveer Sir.PNG', 1, 'Malibagh Bazar Road,Dhaka-1217', 'Dhaka', '$2y$12$.Kcf8kJMkkKxJ0ppp4u6/erDWBB7SuXuv9d/UlmbuXkDDOpzGxp1K', 'admin', '$2y$10$iusesomecrazystrings22', 'eb2d0ed999', 'verified'),
(65, 'khkjn', 'nkjnknk', 'njknkjjnk', 1778700365, '0251810005101125@stamford.university', '', 2, 'MalibBazar Road', 'Dhaka', '$2y$12$xUB0HdJf/MMxCYIIDfA9tOyCsXqxrkOhPvIB9DTaZqP3TV5zbOqLW', 'customer', '$2y$10$iusesomecrazystrings22', '2b447b75', ''),
(66, 'amit', '', 'Amit kaka', 1902360862, 'syedamit48892@gmail.com', '', 163, 'malibagh', 'Dhak', '$2y$12$AwVAz5xrraDt0aoJMa5.z.qgXz1b8yQDyQzz.buaq/klTuem4vWZW', 'customer', '$2y$10$iusesomecrazystrings22', '7c77aab9', 'verified'),
(67, 'Rayhan', 'Himel', 'Meeeee', 1778700365, 'rayhanhimel1997@gmail.com', '', 11, 'MalibBazar Road', 'Dhaka', '$2y$10$iusesomecrazystrings2uz/HkvnvHFd41nowL3oLCmiMEM4CLQyW', 'customer', '$2y$10$iusesomecrazystrings22', '3531a17333', 'verified'),
(70, 'Rubaiya', '', 'Rubaiya', 1778700365, 'rubaiya1530@gmail.com', '', 1, 'Bazar Raad', 'Malibagh,Dhaka', '$2y$12$3iBfweZLSs/dFcRO3j.I0ewm5g4TtbprHddrS/PYTQfL2NXLh0WBy', 'customer', '$2y$10$iusesomecrazystrings22', '056c8aa4', ''),
(71, 'mahedi', 'himnej', 'mahedi', 1768909874, 'mahedi7789@gmail.com', '', 163, 'Malibagh Chowdhury Para ', '', '$2y$12$uCLrsChJa9X0lwl95lRne.rAdFBKkRHEiFXyxwUe8uH2VjU5qdj92', 'customer', '$2y$10$iusesomecrazystrings22', '9930b188', ''),
(73, 'dshbgvjhds', '', 'sksrana', 2147483647, 'sksrana2010@gmail.com', '', 5, 'Stamford University', '', '$2y$12$YEqygsb7WwjyC1ZmXpxY.uMVmrHIoZkZVPYIUirOVKoYHYKya4hyS', 'customer', '$2y$10$iusesomecrazystrings22', '99c46e4d', 'verified'),
(74, 'Subroto', 'Sarker', 'Suboto', 1717969253, 'subroto@gmail.com', '', 163, 'Malibagh ', '', '$2y$12$SJ0CuWwUevx05G/IX6xM9ORE7VqV3Uguhv5Z7ynbJL.eDvWt0QDqq', 'customer', '$2y$10$iusesomecrazystrings22', '42796b0a', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_order`
--
ALTER TABLE `confirm_order`
  ADD PRIMARY KEY (`confirm_order_id`);

--
-- Indexes for table `order_list`
--
ALTER TABLE `order_list`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `schedule_time`
--
ALTER TABLE `schedule_time`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `confirm_order`
--
ALTER TABLE `confirm_order`
  MODIFY `confirm_order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=387;

--
-- AUTO_INCREMENT for table `order_list`
--
ALTER TABLE `order_list`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=994;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=192;

--
-- AUTO_INCREMENT for table `schedule_time`
--
ALTER TABLE `schedule_time`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
