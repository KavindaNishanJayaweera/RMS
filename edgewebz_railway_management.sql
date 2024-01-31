-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 06, 2023 at 01:58 AM
-- Server version: 5.7.42
-- PHP Version: 8.1.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edgewebz_railway_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE `admin_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_details`
--

INSERT INTO `admin_details` (`id`, `user_id`, `name`, `phone`, `created_at`, `updated_at`) VALUES
(2, 13, 'Madushan Nayanajith', '4324234', '2022-12-15 00:14:18', '2023-07-21 17:46:11');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `passenger` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `email` text NOT NULL,
  `phone_number` text NOT NULL,
  `country` text NOT NULL,
  `address` text NOT NULL,
  `postal_code` text NOT NULL,
  `city` text NOT NULL,
  `train_id` text NOT NULL,
  `from_stop` text NOT NULL,
  `to_stop` text NOT NULL,
  `tickets` text NOT NULL,
  `booking_total` double NOT NULL,
  `date` date DEFAULT NULL,
  `status` text NOT NULL,
  `payment_id` text,
  `method` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `passenger_details`
--

CREATE TABLE `passenger_details` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` text NOT NULL,
  `last_name` text NOT NULL,
  `phone_number` text NOT NULL,
  `country` text,
  `address` text,
  `postal_code` text,
  `city` text,
  `profile_picture` text,
  `royalty_deduction` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

CREATE TABLE `trains` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `route` text NOT NULL,
  `departure` text NOT NULL,
  `arrival` text NOT NULL,
  `departure_time` time NOT NULL,
  `no_of_passengers` text NOT NULL,
  `fee` double NOT NULL,
  `latitude` text,
  `longitude` text,
  `status` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `name`, `route`, `departure`, `arrival`, `departure_time`, `no_of_passengers`, `fee`, `latitude`, `longitude`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Train 1', 'Awissawella-Colombo', 'Awissawella', 'Colombo', '06:05:00', '250', 20, '6.9546', '80.2074', 'active', '2023-07-15 11:01:17', '2023-07-24 17:00:38'),
(3, 'PODI MENIKE', 'Colombo - Jaffna', 'Colombo', 'Jaffna', '04:15:00', '150', 25, '9.6667', '80.0000', 'active', '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(4, 'Abc', 'Rambbukkana - colombo', 'Rambukkana', 'Colombo', '01:30:00', '250', 20, 'Rambukkana', 'Kalaniya', 'active', '2023-08-05 00:39:49', '2023-08-05 00:41:21'),
(5, 'ELLA ODYSSEY', 'Colombo - Badulla', 'Colombo', 'Badulla', '01:06:00', '300', 15, '6.9895', '81.0557', 'active', '2023-08-05 04:39:00', '2023-08-05 04:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `train_stops`
--

CREATE TABLE `train_stops` (
  `id` int(11) NOT NULL,
  `train_id` int(11) NOT NULL,
  `stop_name` text NOT NULL,
  `distance` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train_stops`
--

INSERT INTO `train_stops` (`id`, `train_id`, `stop_name`, `distance`, `created_at`, `updated_at`) VALUES
(1, 2, 'Awissawella', 0, '2023-07-15 11:01:17', '2023-07-15 11:01:17'),
(2, 2, 'Hanwella', 35, '2023-07-15 11:01:17', '2023-07-15 11:01:17'),
(3, 2, 'Nugegoda', 55, '2023-07-15 11:01:17', '2023-07-15 11:01:17'),
(4, 2, 'Maharagama', 78, '2023-07-15 11:01:17', '2023-07-15 11:01:17'),
(6, 2, 'Colombo', 120, '2023-07-15 11:12:24', '2023-07-15 11:12:24'),
(7, 3, 'Colombo', 0, '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(8, 3, 'Anuradhapura', 120, '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(9, 3, 'Talaimannar', 200, '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(10, 3, 'Vavuniya', 250, '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(11, 3, 'Kilinochchi', 300, '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(12, 3, 'Pallai', 356, '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(13, 3, 'Jaffna', 398, '2023-08-04 17:44:47', '2023-08-04 17:44:47'),
(14, 4, 'Rambukkana', 0, '2023-08-05 00:39:49', '2023-08-05 00:39:49'),
(15, 4, 'polgahwela', 20, '2023-08-05 00:39:49', '2023-08-05 00:39:49'),
(16, 4, 'avissawella', 35, '2023-08-05 00:39:49', '2023-08-05 00:39:49'),
(18, 5, 'Colombo', 0, '2023-08-05 04:39:00', '2023-08-05 04:39:00'),
(19, 5, 'Peradeniya', 115, '2023-08-05 04:39:00', '2023-08-05 04:39:00'),
(20, 5, 'Kandy', 121, '2023-08-05 04:39:00', '2023-08-05 04:39:00'),
(21, 5, 'Hatton', 173, '2023-08-05 04:39:00', '2023-08-05 04:39:00'),
(22, 5, 'Nanuoya', 207, '2023-08-05 04:39:00', '2023-08-05 04:39:00'),
(23, 5, 'Haputale', 300, '2023-08-05 04:39:00', '2023-08-05 04:39:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1 - Admin, 2- Customer',
  `email_verified` text COLLATE utf8mb4_unicode_ci,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `user_role`, `email_verified`, `status`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(13, 'admin123@gmail.com', '$2y$10$v6GA/d7boThgRtSgKbSf0.GaCuJBW8UeMewBIbClQbdDAuWn56Bwi', '1', 'yes', 'active', NULL, NULL, '2022-12-15 00:14:18', '2023-07-04 11:44:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger_details`
--
ALTER TABLE `passenger_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trains`
--
ALTER TABLE `trains`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train_stops`
--
ALTER TABLE `train_stops`
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
-- AUTO_INCREMENT for table `admin_details`
--
ALTER TABLE `admin_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `passenger_details`
--
ALTER TABLE `passenger_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trains`
--
ALTER TABLE `trains`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `train_stops`
--
ALTER TABLE `train_stops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
