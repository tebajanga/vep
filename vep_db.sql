-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 28, 2017 at 05:15 AM
-- Server version: 5.7.17-0ubuntu0.16.04.1
-- PHP Version: 7.0.8-0ubuntu0.16.04.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vep_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `company_id` int(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `owner` varchar(100) NOT NULL,
  `location` varchar(255) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `website` varchar(150) NOT NULL,
  `logo` longtext NOT NULL,
  `admin_email` varchar(150) NOT NULL,
  `marketing_document` longtext NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`company_id`, `name`, `owner`, `location`, `phone_number`, `website`, `logo`, `admin_email`, `marketing_document`, `updated_at`, `created_at`) VALUES
(12, 'Nyanda Entertainment', 'Elijah & John', 'Dar es Salaam', '+255222129309', 'www.nyandaentertainment.com', 'goat.jpeg', 'admin@nyandaentertainment.com', 'Anold_Mini Presentation.ppt', NULL, '2017-01-28 02:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `latitude` int(15) NOT NULL,
  `longitude` int(15) NOT NULL,
  `start_date` timestamp NULL DEFAULT NULL,
  `end_date` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `description`, `location`, `latitude`, `longitude`, `start_date`, `end_date`, `updated_at`, `created_at`) VALUES
(2, 'Foods Event', 'Event about all foods', 'Ukonga Jeti', 50, 100, '2017-01-25 21:00:00', '2017-01-27 21:00:00', NULL, '2017-01-26 06:42:42'),
(3, 'Technology Event', 'All about technologies', 'Ubungo Riverside', 100, 300, '2017-01-26 21:00:00', '2017-01-27 21:00:00', NULL, '2017-01-26 07:16:14'),
(4, 'Culture Event', 'Event about different culture issues.', 'Majumba Sita', 280, 180, '2017-01-27 21:00:00', '2017-01-29 21:00:00', NULL, '2017-01-26 10:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `stand_id` int(50) NOT NULL,
  `company_id` int(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`stand_id`, `company_id`, `updated_at`, `created_at`) VALUES
(3, 12, NULL, '2017-01-28 02:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `stands`
--

CREATE TABLE `stands` (
  `stand_id` int(50) NOT NULL,
  `event_id` int(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` varchar(15) NOT NULL,
  `size` varchar(100) NOT NULL,
  `capacity` varchar(100) NOT NULL,
  `thumbnail` longtext NOT NULL,
  `status` varchar(6) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stands`
--

INSERT INTO `stands` (`stand_id`, `event_id`, `name`, `description`, `price`, `size`, `capacity`, `thumbnail`, `status`, `updated_at`, `created_at`) VALUES
(2, 2, 'Front Stand1', 'Hall Front Stand #01', 'TZS 10,000', '100ft x 150ft', '800 People', 'stand_01.jpg', 'Free', NULL, '2017-01-26 22:04:02'),
(3, 2, 'Front Stand2', 'Front Hall Stand #2', 'TZS 5,000', '250ft x 180ft', '500 People', 'stand_02.jpg', 'Booked', '2017-01-28 02:09:23', '2017-01-26 22:45:56'),
(4, 2, 'Front Stand3', 'Hall Front Stand #3', 'TZS 7,500', '400ft x 500ft', '420 People', 'stand_03.jpg', 'Free', NULL, '2017-01-26 23:02:42'),
(5, 2, 'Front Stand4', 'Hall Front Stand #4', 'TZS 8,000', '350ft x 400ft', '700 People', 'stand_04.jpg', 'Free', NULL, '2017-01-26 23:28:09'),
(6, 3, 'Side A', 'Hall Stand Side A', 'TZS 7,000', '350ft x 500ft', '600 People', 'stand02_01.jpg', 'Free', NULL, '2017-01-27 11:50:36'),
(7, 3, 'Side B', 'Hall stand Side B', 'TZS 2,500', '100ft x 120ft', '120 People', 'stand02_02.jpg', 'Free', NULL, '2017-01-27 11:55:53'),
(8, 3, 'Side C', 'Hall stand Side C', 'TZS 11,000', '400ft x 200ft', '900 People', 'stand02_03.jpg', 'Free', NULL, '2017-01-27 11:55:53'),
(9, 3, 'Side D', 'Hall stand Side D', 'TZS 6,000', '250ft x 200ft', '700 People', 'stand02_04.jpg', 'Free', NULL, '2017-01-27 12:04:15'),
(10, 3, 'Side E', 'Hall stand Side E', 'TZS 9,000', '310ft x 200ft', '650 People', 'stand02_05.jpg', 'Free', NULL, '2017-01-27 12:04:15'),
(11, 4, 'GF Section1A', 'Hall stand Groud Floor Section 1A', 'TZS 3,500', '210ft x 150ft', '200 People', 'stand03_01.jpg', 'Free', NULL, '2017-01-27 12:14:33'),
(12, 4, 'GF Section1B', 'Hall stand Ground Floor Section 1B', 'TZS 7,000', '300ft x 200ft', '400 People', 'stand03_02.jpg', 'Free', NULL, '2017-01-27 12:14:33'),
(13, 4, 'GF Section1C', 'Hall stand Ground Floor Section 1C', 'TZS 5,000', '250ft x 200ft', '350 People', 'stand03_03.jpg', 'Free', NULL, '2017-01-27 12:17:37'),
(14, 4, 'GF Section 2', 'Hall stand Ground Floor Section 2', 'TZS 15,000', '600ft x 700ft', '1300 People', 'stand03_04.jpg', 'Free', NULL, '2017-01-27 12:17:37'),
(15, 4, 'GF Section 3A', 'Hall stand Ground Floor Section 3A', 'TZS 9,000', '310ft x 200ft', '500 People', 'stand03_05.jpg', 'Free', NULL, '2017-01-27 12:23:23'),
(16, 4, 'GF Section 3B', 'Hall stand Ground Floor Section 3B', 'TZS 8,500', '300ft x 250ft', '600 People', 'stand03_06.jpg', 'Free', NULL, '2017-01-27 12:23:23'),
(17, 4, 'GF Section 3C', 'Hall stand Ground Floor Section 3C ', 'TZS 12,000', '600ft x 800ft', '1500 People', 'stand03_07.jpg', 'Free', NULL, '2017-01-27 12:25:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(50) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email` varchar(150) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `stand_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`stand_id`,`company_id`);

--
-- Indexes for table `stands`
--
ALTER TABLE `stands`
  ADD PRIMARY KEY (`stand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`stand_id`,`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `company_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `stands`
--
ALTER TABLE `stands`
  MODIFY `stand_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(50) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
