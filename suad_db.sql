-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 04:54 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suad_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `role` enum('patient','doctor','admin') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `role`, `created_at`) VALUES
(1, 'Sucad', 'sucaad@gmail.com', '$2y$10$TVpxDUhYO6ME9vExTSZt6eG4OCYgjpfsOOJqSgPSPA0eFl.p7je/W', '4555836', 'patient', '2025-05-19 11:52:37'),
(2, 'Sacaada', 'sacaada@gmail.com', '$2y$10$tcKgjen.eNitrHMeEr2tye1RkZwFn2hnfdbzsWgCZG1cN8la4P5m2', '4555638', 'doctor', '2025-05-19 11:58:50'),
(3, 'Degan', 'dagan@gmail.com', '$2y$10$TVpxDUhYO6ME9vExTSZt6eG4OCYgjpfsOOJqSgPSPA0eFl.p7je/W', '4555638', 'admin', '2025-05-19 12:01:54'),
(5, 'Sucaad ', 'sucaad1@gmail.com', '$2y$10$/ChrhXcbelGXkgBOxKIdxuqVgejoZKdbkOF/xAoWf5O4POEvHxk62', '4555638', 'patient', '2025-05-19 12:18:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
