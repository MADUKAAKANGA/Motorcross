-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2024 at 11:57 AM
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
-- Database: `motorcross`
--

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `event_name` varchar(255) NOT NULL,
  `event_date` date NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `poster` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `event_name`, `event_date`, `location`, `description`, `poster`) VALUES
(2, 'Motorcross', '2024-08-06', 'Whistling moran', '100cc only', 'C:\\xampp\\htdocs\\MOTORCROSS\\images\\Vintage Car Show Event Square Video.jpeg'),
(3, 'MOTOR', '2024-08-02', 'DD', 'DD', 'images/car-8.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `ticket_number` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `role` enum('racer','fan') DEFAULT NULL,
  `vehicle_type` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_number`, `name`, `email`, `role`, `vehicle_type`) VALUES
(1, '', 'Mandela ', 'maduka.akanga@strathmore.edu', 'racer', 'Bajaj'),
(6, '1063', 'Mandela234', 'maduka.akanga@strathmore.e', 'racer', 'Bajaj231'),
(7, '1064', 'Mandela2345', 'maduka.akanga@strathmore.edf', 'racer', 'Bajaj2312111');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `password` varchar(255) NOT NULL,
  `userrole` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email_address`, `phone_number`, `username`, `dob`, `password`, `userrole`) VALUES
(1, 'OSAMA OTERO2211ed', 'madukaakanga12s2@gmail.com', '22323232321s', 'sircharlse22019d2@gmail.com', '2024-07-09', '1234', '3'),
(2, 'MANDELA', 'maduka@gmail.com', '0700770509', 'madd', '2024-07-02', 'MMAmaduka', '3'),
(3, 'mandela', 'mandela@gmail.com', '0707770659', ',mandela', '2024-07-07', '1212', '3'),
(4, 'MANDELA', 'maduka@gmail.com', '0700770509', 'Maduka', '2024-07-03', '1212', '3'),
(5, 'The Mandela', 'themandela@gmail.com', '0700770470', 'The Maduka', '2024-07-09', '$2y$10$ezVHEwemvJIDxhDl6.xQ7OO8RrImpndxP3lHkDw98Aez2wu2FkxAW', 'admin'),
(6, 'THEMANDELA', 'THEmaduka@gmail.com', '0700770509', 'maadd', '2024-07-09', '$2y$10$xatLJAvvo4B8t2C..oFx1uOWX9TSkHmBTtRJv48xZbKGAxqK.hNdS', 'racer'),
(7, 'Admin', 'admin1@gmail.com', '0700777060', 'admin1', '2024-07-03', '$2y$10$ASegEh9DxembYvJDExm7/eDtd9tA9drgQGmQQwo9If/9JGXMprhd2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_number` (`ticket_number`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
