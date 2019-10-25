-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2019 at 10:19 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_ordering`
--

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `username`, `password`, `address`, `created_at`) VALUES
(1, 'admin123', '$2y$10$Q3emsh1n/gRKAoASXEID3eoX2i.ZGD6Kq8yK7YWFXrxDH18jFDYCm', NULL, '2019-06-24 03:05:54');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `code` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `price` double(10,2) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`code`, `name`, `image`, `price`, `description`) VALUES
('B01', 'Ramlee Burger', 'images/burger-1.jpg', 15.90, 'Beef patty, topped with cheesy sunny side up and tomato'),
('B02', 'US Burger', 'images/burger-2.jpg', 15.90, 'Classic cheeseburger, topped with beef ham, lettuce and tomato'),
('B03', 'Satay Burger', 'images/burger-3.jpg', 12.90, 'Deep Fried Chicken, topped with Malaysian peanut dressing'),
('B04', 'Cheeseburger', 'images/burger-4.jpeg', 12.90, 'Juicy beef patty topped with cheddar sided with classic French fries'),
('B05', 'Beefacon', 'images/burger-5.jpeg', 19.90, 'Juicy beef patty topped with savoury beef bacon and freshly cut onion'),
('B06', 'Grilled Chicken Burger', 'images/burger-6.jpeg', 12.90, 'Classic grilled chicken with cheddar slice and tomato'),
('D01', 'Zesty Orange', 'images/drink-1.jpg', 3.90, ''),
('D02', 'Flamingo Burst', 'images/drink-2.jpg', 5.90, ''),
('D03', 'Chocolate Milkshake', 'images/drink-3.jpeg', 8.90, ''),
('D04', 'Triple Shake', 'images/drink-4.jpeg', 9.90, ''),
('D05', 'Vanilla Milkshake', 'images/drink-5.jpeg', 8.90, ''),
('D06', 'Berries shake', 'images/drink-6.jpeg', 9.90, ''),
('M01', 'Tacos', 'images/mexican-1.jpeg', 8.90, 'Crispy corn shell filled with lean ground beef, colby jack cheese, lettuce, and our home-made hot sauce'),
('M02', 'Burrito', 'images/mexican-2.jpeg', 9.90, 'Flour Tortilla filled with Spanish rice, boiled beans, lettuce, salsa, meat, guacamole, cheese, and sour cream'),
('M03', 'Nachos', 'images/mexican-3.jpeg', 5.90, 'Tortilla chips topped with mayo & cheese'),
('P01', 'Veggie Galore', 'images/pizza-1.jpg', 15.90, 'Lantern peppers, onions, and olive'),
('P02', 'Beef Pepperoni', 'images/pizza-2.jpg', 15.90, 'Beef Pepperoni and Raisins'),
('P03', 'Crispy Thins', 'images/pizza-3.jpg', 15.90, 'Bacons, mushrooms, olive, and red peppers'),
('P04', 'Chicken Pepperoni', 'images/pizza-4.jpg', 15.90, 'Chicken pepperoni, tomatoes, and red peppers'),
('P05', 'Tuna Sensation', 'images/pizza-5.jpg', 15.90, 'Tuna, olive, and veggie'),
('P06', 'Cheesy Overload', 'images/pizza-6.jpg', 15.90, 'Simply cheese and olive'),
('S01', 'Popcorn Chicken', 'images/side-1.jpeg', 8.90, ''),
('S02', 'Korean Style Fried Chicken', 'images/side-2.jpeg', 10.90, ''),
('S03', 'Popcorn Chicken', 'images/side-3.jpeg', 5.90, ''),
('S04', 'Chicken Nuggets', 'images/side-4.jpeg', 6.90, ''),
('S05', 'Calamari Rings', 'images/side-5.jpeg', 5.90, ''),
('S06', 'Twisted Fries', 'images/side-6.jpeg', 5.90, '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `orderID` int(10) NOT NULL,
  `memberID` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `quantity` int(2) DEFAULT NULL,
  `price` float(5,2) DEFAULT NULL,
  `ordered_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`orderID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
