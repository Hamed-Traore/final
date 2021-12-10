-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2021 at 06:20 PM
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
-- Database: `eventsystemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(10) NOT NULL,
  `creation_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `event_type` varchar(50) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `colours` varchar(50) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `Cake_size` varchar(20) DEFAULT NULL,
  `budget` decimal(19,2) DEFAULT NULL,
  `event_details` varchar(300) NOT NULL,
  `users_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `creation_date`, `event_type`, `title`, `colours`, `start_date`, `end_date`, `Cake_size`, `budget`, `event_details`, `users_id`) VALUES
(6, '2021-11-27 16:00:39', 'Corporate', 'AAAAAAAAAA', 'AAAAAAA', '2021-11-27', '2021-12-12', 'Small', '1122233141.00', 'AZZ', 2),
(7, '2021-11-27 16:03:07', 'Others', 'yooooooooooo', 'red-blue', '2021-11-27', '2021-12-05', 'Large', '10000.00', 'cooolllllllllllllllllllll', 2),
(8, '2021-11-30 23:01:19', 'Private', 'any', 'red', '2021-11-30', '2021-12-09', 'Large', '123455454.00', 'details', 7),
(26, '2021-12-09 16:10:02', NULL, 'SECOND    ', 'red', '2021-12-10', '2021-12-18', 'null', '33333.00', 'AAAAAAAAAAAA', 8),
(27, '2021-12-09 16:36:03', 'Corporate', 'fdgfghd', 'fg', '2021-12-09', '2021-12-19', NULL, '1223.00', 'GFDG', 8),
(28, '2021-12-10 15:29:18', 'Corporate', 'Hamed\'s Birthday', 'Red-white', '2022-02-27', '2022-02-27', NULL, '20000.00', 'I want a every nice party full of colours', 9);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(10) NOT NULL,
  `location_name` varchar(50) DEFAULT NULL,
  `contact` varchar(20) DEFAULT NULL,
  `opening_time` time DEFAULT NULL,
  `details` varchar(300) DEFAULT NULL,
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `contact`, `opening_time`, `details`, `event_id`) VALUES
(14, 'BASSAM', '1122233345', '16:07:00', '', 26),
(15, 'GHD', '1222', '20:35:00', 'GHDF', 27),
(16, 'Accra', '2400123412', '20:30:00', 'it\' is a \"soirée\" ', 28);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `payment_date` date DEFAULT NULL,
  `paymentMethod` varchar(30) DEFAULT NULL,
  `Name_on_card` varchar(50) DEFAULT NULL,
  `card_num` int(16) DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `CVV` int(3) DEFAULT NULL,
  `event_id` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_date`, `paymentMethod`, `Name_on_card`, `card_num`, `amount_paid`, `expire_date`, `CVV`, `event_id`) VALUES
(1, NULL, 'Credit card', 'yoris', 123344, '1222333.00', '2021-12-01', 777, NULL),
(2, NULL, 'Debit card', 'ARAEZR', 11122, '1223.00', '2021-12-21', 122, NULL),
(9, NULL, 'Credit card', 'EEEEEEEEEE', 2147483647, '33333.00', '2021-12-31', 155, 26),
(10, NULL, 'Credit card', 'FDNG', 1122, '1223.00', '2021-12-10', 111, 27),
(11, NULL, 'Debit card', 'Hamed Traore', 2147483647, '20000.00', '2023-11-17', 234, 28);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `Full_name` varchar(100) DEFAULT NULL,
  `salary` decimal(10,2) DEFAULT NULL,
  `role` varchar(50) DEFAULT NULL,
  `phone_number` int(15) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `country` varchar(30) DEFAULT NULL,
  `Status` enum('Completed','In progress','Not started','') NOT NULL,
  `event_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `Full_name`, `salary`, `role`, `phone_number`, `city`, `country`, `Status`, `event_id`) VALUES
(5, 'Antoine Griezman', '2000.00', 'chief of organizing comitie', 243146739, 'Acrra', 'Ghana', 'In progress', 28);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` int(15) NOT NULL,
  `passwords` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `firstname`, `lastname`, `email`, `phone_number`, `passwords`) VALUES
(1, 'a', 'a', 'zz', 1, 'A'),
(2, 'Hamed', 'Traore', 'hamed.traore@ashesi.edu.gh', 1234567890, 'hamed'),
(3, 'hamed', 'traore', 'hamed@gmail.com', 1234567890, '11befe1b03f596c805ed'),
(4, 'yoris', 'jhon', 'yorishamed007@gmail.com', 987654321, '11befe1b03f596c805ed'),
(5, 'hhhh', 'aaaa', 'hamd@gmail.com', 2147483647, '11befe1b03f596c805ed'),
(6, 'HHHHH', 'HHHHH', 'hamed.traore@ashesi.edu', 2147483647, '11befe1b03f596c805ed03864def873d'),
(7, 'hamed', 'ha^pa', 'hamedyoris@gmail.com', 2147483647, 'ab4f63f9ac65152575886860dde480a1'),
(8, 'jemi', 'kouadio', 'jemi@gmail.com', 1234456565, '739b7af086e8c8873d6c8c7378f224c8'),
(9, 'yoyo', 'kaka', 'azerty@gmail.com', 1234567890, 'ab4f63f9ac65152575886860dde480a1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`),
  ADD KEY `users_id` (`users_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`),
  ADD KEY `users_id` (`event_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `user_id` (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `events`
--
ALTER TABLE `events`
  ADD CONSTRAINT `users_events` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_event` FOREIGN KEY (`event_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
